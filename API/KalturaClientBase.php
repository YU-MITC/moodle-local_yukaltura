<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

/**
 * Multi Request SubResult class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class MultiRequestSubResult
{
    public function __construct($value) {
        $this->value = $value;
    }

    public function __toString() {
        return '{' . $this->value . '}';
    }

    public function __get($name) {
        return new MultiRequestSubResult($this->value . ':' . $name);
    }
}

/**
 * Kaltura Null class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNull
{
    private static $instance;

    private function __construct() {

    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c();
        }
        return self::$instance;
    }

    public function __toString() {
        return '';
    }

}

/**
 * Kaltura ClientBase class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientBase
{
    const KALTURA_SERVICE_FORMAT_JSON = 1;
    const KALTURA_SERVICE_FORMAT_XML  = 2;
    const KALTURA_SERVICE_FORMAT_PHP  = 3;

    // KS V2 constants.
    const RANDOM_SIZE = 16;

    const FIELD_EXPIRY = '_e';
    const FIELD_TYPE = '_t';
    const FIELD_USER = '_u';

    /**
     * @var string
     */
    protected $apiVersion = null;

    /**
     * @var KalturaConfiguration
     */
    protected $config;

    /**
     * @var string
     */
    private $ks;

    /**
     * @var boolean
     */
    private $shouldLog = false;

    /**
     * @var bool
     */
    private $isMultiRequest = false;

    /**
     * @var unknown_type
     */
    private $callsQueue = array();

    /**
     * Array of all plugin services
     *
     * @var array<KalturaServiceBase>
     */
    protected $pluginServices = array();

    public function __get($servicename) {
        if (isset($this->pluginServices[$servicename])) {
            return $this->pluginServices[$servicename];
        }
        return null;
    }

    /**
     * Kaltura client constructor
     *
     * @param KalturaConfiguration $config
     */
    public function __construct(KalturaConfiguration $config) {
        $this->config = $config;

        $logger = $this->config->getLogger();
        if ($logger) {
            $this->shouldLog = true;
        }

        // Load all plugins.
        $pluginsfolder = realpath(dirname(__FILE__)) . '/KalturaPlugins';
        if (is_dir($pluginsfolder)) {
            $dir = dir($pluginsfolder);
            while (false !== $filename = $dir->read()) {
                $matches = null;
                if (preg_match('/^([^.]+).php$/', $filename, $matches)) {
                    require_once("$pluginsfolder/$filename");

                    $pluginclass = $matches[1];
                    if (!class_exists($pluginclass) || !in_array('IKalturaClientPlugin', class_implements($pluginclass))) {
                        continue;
                    }
                    $plugin = call_user_func(array($pluginclass, 'get'), $this);
                    if (!($plugin instanceof IKalturaClientPlugin)) {
                        continue;
                    }
                    $pluginname = $plugin->getName();
                    $services = $plugin->getServices();
                    foreach ($services as $servicename => $service) {
                        $service->setClient($this);
                        $this->pluginServices[$servicename] = $service;
                    }
                }
            }
        }
    }

    public function getServeUrl() {
        if (count($this->callsQueue) != 1) {
            return null;
        }
        $params = array();
        $files = array();
        $this->log("service url: [" . $this->config->serviceUrl . "]");

        // Append the basic params.
        $this->addParam($params, "apiVersion", $this->apiVersion);
        $this->addParam($params, "format", $this->config->format);
        $this->addParam($params, "clientTag", $this->config->clientTag);

        $call = $this->callsQueue[0];
        $this->callsQueue = array();
        $this->isMultiRequest = false;

        $params = array_merge($params, $call->params);
        $signature = $this->signature($params);
        $this->addParam($params, "kalsig", $signature);

        $url = $this->config->serviceUrl . "/api_v3/index.php?service={$call->service}&action={$call->action}";
        $url .= '&' . http_build_query($params);
        $this->log("Returned url [$url]");
        return $url;
    }

    public function queueServiceActionCall($service, $action, $params = array(), $files = array()) {
        // In start session partner id is optional (default -1). if partner id was not set, use the one in the config.
        if (!isset($params["partnerId"]) || $params["partnerId"] === -1) {
            $params["partnerId"] = $this->config->partnerId;
        }

        $this->addParam($params, "ks", $this->ks);

        $call = new KalturaServiceActionCall($service, $action, $params, $files);
        $this->callsQueue[] = $call;
    }

    /**
     * Call all API service that are in queue
     *
     * @return unknown
     */
    public function doQueue() {
        if (count($this->callsQueue) == 0) {
            $this->isMultiRequest = false;
            return null;
        }

        $starttime = microtime(true);

        $params = array();
        $files = array();
        $this->log("service url: [" . $this->config->serviceUrl . "]");

        // Append the basic params.
        $this->addParam($params, "apiVersion", $this->apiVersion);
        $this->addParam($params, "format", $this->config->format);
        $this->addParam($params, "clientTag", $this->config->clientTag);

        $url = $this->config->serviceUrl."/api_v3/index.php?service=";
        if ($this->isMultiRequest) {
            $url .= "multirequest";
            $i = 1;
            foreach ($this->callsQueue as $call) {
                $callparams = $call->getParamsForMultiRequest($i++);
                $params = array_merge($params, $callparams);
                $files = array_merge($files, $call->files);
            }
        } else {
            $call = $this->callsQueue[0];
            $url .= $call->service."&action=".$call->action;
            $params = array_merge($params, $call->params);
            $files = $call->files;
        }

        // Reset.
        $this->callsQueue = array();
        $this->isMultiRequest = false;

        $signature = $this->signature($params);
        $this->addParam($params, "kalsig", $signature);

        list($postresult, $error) = $this->doHttpRequest($url, $params, $files);

        if ($error) {
            throw new KalturaClientException($error, KalturaClientException::ERROR_GENERIC);
        } else {
            $this->log("result (serialized): " . $postresult);

            if ($this->config->format == self::KALTURA_SERVICE_FORMAT_PHP) {
                $result = @unserialize($postresult);

                if ($result === false && serialize(false) !== $postresult) {
                    throw new KalturaClientException("failed to unserialize server result\n$postresult",
                                                     KalturaClientException::ERROR_UNSERIALIZE_FAILED);
                }
                $dump = print_r($result, true);
                $this->log("result (object dump): " . $dump);
            } else {
                throw new KalturaClientException("unsupported format: $postresult",
                                                 KalturaClientException::ERROR_FORMAT_NOT_SUPPORTED);
            }
        }

        $endtime = microtime (true);

        $this->log("execution time for [".$url."]: [" . ($endtime - $starttime) . "]");

        return $result;
    }

    /**
     * Sign array of parameters
     *
     * @param array $params
     * @return string
     */
    private function signature($params) {
        ksort($params);
        $str = "";
        foreach ($params as $k => $v) {
            $str .= $k.$v;
        }
        return md5($str);
    }

    /**
     * Send http request by using curl (if available) or php stream_context
     *
     * @param string $url
     * @param parameters $params
     * @return array of result and error
     */
    private function doHttpRequest($url, $params = array(), $files = array()) {
        if (function_exists('curl_init')) {
            return $this->doCurl($url, $params, $files);
        } else {
            return $this->doPostRequest($url, $params, $files);
        }
    }

    /**
     * Curl HTTP POST Request
     *
     * @param string $url
     * @param array $params
     * @return array of result and error
     */
    private function doCurl($url, $params = array(), $files = array()) {
        $cookies = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if (count($files) > 0) {
            foreach ($files as &$file) {
                $file = "@".$file;
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, array_merge($params, $files));
        } else {
            $opt = http_build_query($params, null, "&");
            $this->log("curl: $url&$opt");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $opt);
        }
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->config->userAgent);
        if (count($files) > 0) {
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        } else {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->config->curlTimeout);
        }

        if ($this->config->startZendDebuggerSession === true) {
            $zenddebuggerparams = $this->getZendDebuggerParams($url);
             $cookies = array_merge($cookies, $zenddebuggerparams);
        }

        if (count($cookies) > 0) {
            $cookiesstr = http_build_query($cookies, null, '; ');
            curl_setopt($ch, CURLOPT_COOKIE, $cookiesstr);
        }

        if (isset($this->config->proxyHost)) {
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, false);
            curl_setopt($ch, CURLOPT_PROXY, $this->config->proxyHost);
            if (isset($this->config->proxyPort)) {
                curl_setopt($ch, CURLOPT_PROXYPORT, $this->config->proxyPort);
            }
            if (isset($this->config->proxyUser)) {
                curl_setopt($ch, CURLOPT_PROXYUSERPWD, $this->config->proxyUser.':'.$this->config->proxyPassword);
            }
            if (isset($this->config->proxyType) && $this->config->proxyType === 'SOCKS5') {
                curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
            }
        }

        $result = curl_exec($ch);
        $curlerror = curl_error($ch);
        curl_close($ch);
        return array($result, $curlerror);
    }

    /**
     * HTTP stream context request
     *
     * @param string $url
     * @param array $params
     * @return array of result and error
     */
    private function doPostRequest($url, $params = array(), $files = array()) {
        if (count($files) > 0) {
            throw new KalturaClientException("Uploading files is not supported with stream context http request, please use curl",
                                             KalturaClientException::ERROR_UPLOAD_NOT_SUPPORTED);
        }

        $formatteddata = http_build_query($params , "", "&");
        $params = array('http' => array(
                    "method" => "POST",
                    "Accept-language: en\r\n".
                    "Content-type: application/x-www-form-urlencoded\r\n",
                    "content" => $formatteddata
                  ));

        if (isset($this->config->proxyType) && $this->config->proxyType === 'SOCKS5') {
            throw new KalturaClientException("Cannot use SOCKS5 without curl installed.",
                                             KalturaClientException::ERROR_CONNECTION_FAILED);
        }
        if (isset($this->config->proxyHost)) {
            $proxyhost = 'tcp://' . $this->config->proxyHost;
            if (isset($this->config->proxyPort)) {
                $proxyhost = $proxyhost . ":" . $this->config->proxyPort;
            }
            $params['http']['proxy'] = $proxyhost;
            $params['http']['request_fulluri'] = true;
            if (isset($this->config->proxyUser)) {
                $auth = base64_encode($this->config->proxyUser.':'.$this->config->proxyPassword);
                $params['http']['header'] = 'Proxy-Authorization: Basic ' . $auth;
            }
        }

        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if (!$fp) {
            $phperrormsg = "";
            throw new KalturaClientException("Problem with $url, $phperrormsg", KalturaClientException::ERROR_CONNECTION_FAILED);
        }
        $response = @stream_get_contents($fp);
        if ($response === false) {
            throw new KalturaClientException("Problem reading data from $url, $phpErrorMsg",
                                             KalturaClientException::ERROR_READ_FAILED);
        }
        return array($response, '');
    }

    /**
     * @return string
     */
    public function getKs() {
        return $this->ks;
    }

    /**
     * @param string $ks
     */
    public function setKs($ks) {
        $this->ks = $ks;
    }

    /**
     * @return KalturaConfiguration
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * @param KalturaConfiguration $config
     */
    public function setConfig(KalturaConfiguration $config) {
        $this->config = $config;

        $logger = $this->config->getLogger();
        if ($logger instanceof IKalturaLogger) {
            $this->shouldLog = true;
        }
    }

    /**
     * Add parameter to array of parameters that is passed by reference
     *
     * @param arrat $params
     * @param string $paramName
     * @param string $paramValue
     */
    public function addParam(&$params, $paramname, $paramvalue) {
        if ($paramvalue === null) {
            return;
        }
        if ($paramvalue instanceof KalturaNull) {
            $params[$paramname . '__null'] = '';
            return;
        }

        if (is_object($paramvalue) && $paramvalue instanceof KalturaObjectBase) {
            $this->addParam($params, "$paramname:objectType", get_class($paramvalue));
            foreach ($paramvalue as $prop => $val) {
                $this->addParam($params, "$paramname:$prop", $val);
            }
            return;
        }

        if (!is_array($paramvalue)) {
            $params[$paramname] = (string)$paramvalue;
            return;
        }

        if ($paramvalue) {
            foreach ($paramvalue as $subparamname => $subparamvalue) {
                $this->addParam($params, "$paramname:$subparamname", $subparamvalue);
            }
        } else {
            $this->addParam($params, "$paramname:-", "");
        }
    }

    /**
     * Validate the result object and throw exception if its an error
     *
     * @param object $resultobject
     */
    public function throwExceptionIfError($resultobject) {
        if ($this->isError($resultobject)) {
            throw new KalturaException($resultobject["message"], $resultobject["code"]);
        }
    }

    /**
     * Checks whether the result object is an error
     *
     * @param object $resultobject
     */
    public function isError($resultobject) {
        return (is_array($resultobject) && isset($resultobject["message"]) && isset($resultobject["code"]));
    }

    /**
     * Validate that the passed object type is of the expected type
     *
     * @param unknown_type $resultobject
     * @param unknown_type $objectType
     */
    public function validateObjectType($resultobject, $objecttype) {
        if (is_object($resultobject)) {
            if (!($resultobject instanceof $objecttype)) {
                throw new KalturaClientException("Invalid object type",
                                                 KalturaClientException::ERROR_INVALID_OBJECT_TYPE);
            }
        } else if (gettype($resultobject) !== "NULL" && gettype($resultobject) !== $objecttype) {
            throw new KalturaClientException("Invalid object type",
                                             KalturaClientException::ERROR_INVALID_OBJECT_TYPE);
        }
    }

    public function startMultiRequest() {
        $this->isMultiRequest = true;
    }

    public function doMultiRequest() {
        return $this->doQueue();
    }

    public function isMultiRequest() {
        return $this->isMultiRequest;
    }

    public function getMultiRequestQueueSize() {
        return count($this->callsQueue);
    }

    public function getMultiRequestResult() {
        return new MultiRequestSubResult($this->getMultiRequestQueueSize() . ':result');
    }

    /**
     * @param string $msg
     */
    protected function log($msg) {
        if ($this->shouldLog) {
            $this->config->getLogger()->log($msg);
        }
    }

    /**
     * Return a list of parameter used to a new start debug on the destination server api
     * @link http://kb.zend.com/index.php?View=entry&EntryID=434
     * @param $url
     */
    protected function getZendDebuggerParams($url) {
        $params = array();
        $passthruparams = array('debug_host',
            'debug_fastfile',
            'debug_port',
            'start_debug',
            'send_debug_header',
            'send_sess_end',
            'debug_jit',
            'debug_stop',
            'use_remote');

        foreach ($passthruparams as $param) {
            if (isset($_COOKIE[$param])) {
                $params[$param] = $_COOKIE[$param];
            }
        }

        $params['original_url'] = $url;
        $params['debug_session_id'] = microtime(true); // To create a new debug session.

        return $params;
    }

    public function generateSession($adminsecretforsigning, $userid, $type, $partnerid, $expiry = 86400, $privileges = '') {
        $rand = rand(0, 32000);
        $expiry = time() + $expiry;
        $fields = array(
            $partnerid,
            $partnerid,
            $expiry,
            $type,
            $rand,
            $userid,
            $privileges
        );
        $info = implode(";", $fields);

        $signature = $this->hash($adminsecretforsigning, $info);
        $strtohash = $signature . "|" . $info;
        $encodedstr = base64_encode($strtohash);

        return $encodedstr;
    }

    private function hash ($salt, $str) {
        return sha1($salt.$str);
    }

    /**
     * @return KalturaNull
     */
    public static function getKalturaNullValue() {

        return KalturaNull::getInstance();
    }

    public static function generateSessionV2($adminsecretforsigning, $userid, $type, $partnerid, $expiry, $privileges) {
        // Build fields array.
        $fields = array();
        foreach (explode(',', $privileges) as $privilege) {
            $privilege = trim($privilege);
            if (!$privilege) {
                continue;
            }
            if ($privilege == '*') {
                $privilege = 'all:*';
            }
            $splittedprivilege = explode(':', $privilege, 2);
            if (count($splittedprivilege) > 1) {
                $fields[$splittedprivilege[0]] = $splittedprivilege[1];
            } else {
                $fields[$splittedprivilege[0]] = '';
            }
        }
        $fields[self::FIELD_EXPIRY] = time() + $expiry;
        $fields[self::FIELD_TYPE] = $type;
        $fields[self::FIELD_USER] = $userid;

        // Build fields string.
        $fieldsstr = http_build_query($fields, '', '&');
        $rand = '';
        for ($i = 0; $i < self::RANDOM_SIZE; $i++) {
                $rand .= chr(rand(0, 0xff));
        }
        $fieldsstr = $rand . $fieldsstr;
        $fieldsstr = sha1($fieldsstr, true) . $fieldsstr;

        // Encrypt and encode.
        $encryptedfields = self::aesEncrypt($adminsecretforsigning, $fieldsstr);
        $decodedks = "v2|{$partnerid}|" . $encryptedfields;
        return str_replace(array('+', '/'), array('-', '_'), base64_encode($decodedks));
    }

    protected static function aesEncrypt($key, $message) {
        /**
         * return mcrypt_encrypt(
         * MCRYPT_RIJNDAEL_128,
         * substr(sha1($key, true), 0, 16),
         * $message,
         * MCRYPT_MODE_CBC,
         * str_repeat("\0", 16)
         * );
         */
         return openssl_encrypt($message, "AES-256-CBC", substr(sha1($key, true), 0, 16), 0, str_repeat("\0", 16));
    }
}

/**
 * IKaltura Client Plugin interface
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface IKalturaClientPlugin {
    /**
     * @return KalturaClientPlugin
     */
    public static function get(KalturaClient $client);

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices();

    /**
     * @return string
     */
    public function getName();
}

/**
 * Kaltura Client Pluginclass
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaClientPlugin implements IKalturaClientPlugin
{
    protected function __construct(KalturaClient $client) {

    }
}

/**
 * Kaltura Serivce Action Call class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServiceActionCall
{
    /**
     * @var string
     */
    public $service;

    /**
     * @var string
     */
    public $action;


    /**
     * @var array
     */
    public $params;

    /**
     * @var array
     */
    public $files;

    /**
     * Contruct new Kaltura service action call, if params array contain sub arrays (for objects), it will be flattened
     *
     * @param string $service
     * @param string $action
     * @param array $params
     * @param array $files
     */
    public function __construct($service, $action, $params = array(), $files = array()) {
        $this->service = $service;
        $this->action = $action;
        $this->params = $this->parseParams($params);
        $this->files = $files;
    }

    /**
     * Parse params array and sub arrays (for objects)
     *
     * @param array $params
     */
    public function parseParams(array $params) {
        $newparams = array();
        foreach ($params as $key => $val) {
            if (is_array($val)) {
                $newparams[$key] = $this->parseParams($val);
            } else {
                $newparams[$key] = $val;
            }
        }
        return $newparams;
    }

    /**
     * Return the parameters for a multi request
     *
     * @param int $multirequestindex
     */
    public function getParamsForMultiRequest($multirequestindex) {
        $multirequestparams = array();
        $multirequestparams[$multirequestindex.":service"] = $this->service;
        $multirequestparams[$multirequestindex.":action"] = $this->action;
        foreach ($this->params as $key => $val) {
            $multirequestparams[$multirequestindex.":".$key] = $val;
        }
        return $multirequestparams;
    }
}

/**
 * Kaltura Service Base class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaServiceBase
{
    /**
     * @var KalturaClient
     */
    protected $client;

    /**
     * Initialize the service keeping reference to the KalturaClient
     *
     * @param KalturaClient $client
     */
    public function __construct(KalturaClient $client = null) {
        $this->client = $client;
    }

    /**
     * @param KalturaClient $client
     */
    public function setClient(KalturaClient $client) {
        $this->client = $client;
    }
}

/**
 * Kaltura Access Object Base class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaObjectBase
{
    protected function addIfNotNull(&$params, $paramname, $paramvalue) {
        if ($paramvalue !== null) {
            if ($paramvalue instanceof KalturaObjectBase) {
                $params[$paramname] = $paramvalue->toParams();
            } else {
                $params[$paramname] = $paramvalue;
            }
        }
    }

    public function toParams() {
        $params = array();
        $params["objectType"] = get_class($this);
        foreach ($this as $prop => $val) {
            $this->addIfNotNull($params, $prop, $val);
        }
        return $params;
    }
}

/**
 * Kaltura Exception class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaException extends Exception
{
    public function __construct($message, $code) {
        $this->code = $code;
        parent::__construct($message);
    }
}

/**
 * Kaltura Client Exception class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientException extends Exception
{
    const ERROR_GENERIC = -1;
    const ERROR_UNSERIALIZE_FAILED = -2;
    const ERROR_FORMAT_NOT_SUPPORTED = -3;
    const ERROR_UPLOAD_NOT_SUPPORTED = -4;
    const ERROR_CONNECTION_FAILED = -5;
    const ERROR_READ_FAILED = -6;
    const ERROR_INVALID_PARTNER_ID = -7;
    const ERROR_INVALID_OBJECT_TYPE = -8;
}

/**
 * Kaltura Configuration class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConfiguration
{
    private $logger;

    public $serviceUrl               = "http://www.kaltura.com/";
    public $partnerId                = null;
    public $format                   = 3;
    public $clientTag                = "php5";
    public $curlTimeout              = 10;
    public $userAgent                = '';
    public $startZendDebuggerSession = false;
    public $proxyHost                = null;
    public $proxyPort                = null;
    public $proxyType                = 'HTTP';
    public $proxyUser                = null;
    public $proxyPassword            = '';




    /**
     * Constructs new Kaltura configuration object
     *
     */
    public function __construct($partnerid = -1) {
        if (!is_numeric($partnerid)) {
            throw new KalturaClientException("Invalid partner id", KalturaClientException::ERROR_INVALID_PARTNER_ID);
        }
        $this->partnerId = $partnerid;
    }

    /**
     * Set logger to get kaltura client debug logs
     *
     * @param IKalturaLogger $log
     */
    public function setLogger(IKalturaLogger $log) {
        $this->logger = $log;
    }

    /**
     * Gets the logger (Internal client use)
     *
     * @return IKalturaLogger
     */
    public function getLogger() {
        return $this->logger;
    }
}

/**
 * Kaltura IKaltura Logger interface
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface IKalturaLogger
{
    public function log($msg);
}

