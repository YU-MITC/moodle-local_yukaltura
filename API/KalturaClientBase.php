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
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

error_reporting(E_STRICT);

/**
 * MultiRequestSubResult
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class MultiRequestSubResult implements ArrayAccess {
    /**
     * Constructor of MultiRequestResult
     * @param object $value - internal data.
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * Get internal data as string.
     * @return object - internal data.
     */
    public function __toString() {
        return '{' . $this->value . '}';
    }

    /**
     * Get parameter value by name (key).
     * @param string $name - name (key) of parameter.
     * @return object - value of parameter.
     */
    public function __get($name) {
        return new MultiRequestSubResult($this->value . ':' . $name);
    }

    /**
     * Returns wheter offset is set.
     * @param string $offset - offset name.
     * @return bool - this function always returns true.
     */
    public function offsetExists($offset) {
        return true;
    }

    /**
     * Returns offset value.
     * @param string $offset - offset name.
     * @return object - offset value.
     */
    public function offsetGet($offset) {
        return new MultiRequestSubResult($this->value . ':' . $offset);
    }

    /**
     * Sets offset parameter.
     * @param string $offset - offset name.
     * @param object $value - offset value.
     */
    public function offsetSet($offset, $value) {
    }

    /**
     * Unsets offset parameter.
     * @param string $offset - offset name.
     */
    public function offsetUnset($offset) {
    }
}

/**
 * Kaltura Null
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNull {
    /** @var this object */
    private static $instance;

    /**
     * Constructor of KalturaNull.
     */
    private function __construct() {
    }

    /**
     * Get instance.
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c();
        }
        return self::$instance;
    }

    /**
     * Get class name.
     */
    public function __toString() {
        return '';
    }

}

/**
 * KalturaClientBase
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientBase {
    /** @var json format */
    const KALTURA_SERVICE_FORMAT_JSON = 1;
    /** @var xml format */
    const KALTURA_SERVICE_FORMAT_XML = 2;
    /** @var php format */
    const KALTURA_SERVICE_FORMAT_PHP = 3;

    /** @var KS V2 constants */
    const RANDOM_SIZE = 16;

    /** @var field expiry */
    const FIELD_EXPIRY = '_e';
    /** @var field type */
    const FIELD_TYPE = '_t';
    /** @var field user */
    const FIELD_USER = '_u';
    /** @var method is post */
    const METHOD_POST = 'POST';
    /** @var method is get */
    const METHOD_GET = 'GET';

    /**
     * @var KalturaConfiguration
     */
    protected $config;

    /**
     * @var array
     */
    protected $clientConfiguration = array();

    /**
     * @var array
     */
    protected $requestConfiguration = array();

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

    /**
     * @var Array of response headers
     */
    private $responseHeaders = array();

    /**
     * path to save served results
     * @var string
     */
    protected $destinationPath = null;

    /**
     * return served results without unserializing them
     * @var boolean
     */
    protected $returnServedResult = null;

    /**
     * Get service object.
     * @param string $servicename - service name.
     * @return object - this function always returns null.
     */
    public function __get($servicename) {
        if (isset($this->pluginServices[$servicename])) {
            return $this->pluginServices[$servicename];
        }

        return null;
    }

    /**
     * Kaltura client constructor
     *
     * @param KalturaConfiguration $config - instance of KalturaConfiguration.
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

    /**
     * Store response headers into array.
     * @param string $ch - channel of array.
     * @param string $string - string of response header.
     */
    public function readHeader($ch, $string) {
        array_push($this->responseHeaders, $string);
        return strlen($string);
    }

    /**
     * Retrive response headers.
     * @return array - array of response header.
     */
    public function getResponseHeaders() {
        return $this->responseHeaders;
    }

    /**
     * Get service url.
     * @return string - service url.
     */
    public function getServeUrl() {
        if (count($this->callsQueue) != 1) {
            return null;
        }
        $params = array();
        $files = array();
        $this->log("service url: [" . $this->config->serviceUrl . "]");

        // Append the basic params.
        $this->addParam($params, "format", $this->config->format);

        foreach ($this->clientConfiguration as $param => $value) {
            $this->addParam($params, $param, $value);
        }

        $call = $this->callsQueue[0];
        $this->resetRequest();

        $params = array_merge($params, $call->params);
        $signature = $this->signature($params);
        $this->addParam($params, "kalsig", $signature);

        $url = $this->config->serviceUrl . "/api_v3/service/{$call->service}/action/{$call->action}";
        $url .= '?' . http_build_query($params);
        $this->log("Returned url [$url]");
        return $url;
    }

    /**
     * Store service and action call into request queue.
     * @param string $service - service name.
     * @param string $action - action name.
     * @param array $params - array of parameters.
     * @param array $files - array of file object.
     */
    public function queueServiceActionCall($service, $action, $params = array(), $files = array()) {
        foreach ($this->requestConfiguration as $param => $value) {
            $this->addParam($params, $param, $value);
        }

        $call = new KalturaServiceActionCall($service, $action, $params, $files);
        $this->callsQueue[] = $call;
    }

    /**
     * Reset request queue.
     */
    protected function resetRequest() {
        $this->destinationPath = null;
        $this->returnServedResult = false;
        $this->isMultiRequest = false;
        $this->callsQueue = array();
    }

    /**
     * Call all API service that are in queue
     * @return object - execution result of action call stored into head of queue.
     */
    public function doQueue() {
        if ($this->isMultiRequest && ($this->destinationPath || $this->returnServedResult)) {
            $this->resetRequest();
            throw new KalturaClientException("Downloading files is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_DOWNLOAD_IN_MULTIREQUEST);
        }

        if (count($this->callsQueue) == 0) {
            $this->resetRequest();
            return null;
        }

        $starttime = microtime(true);

        $params = array();
        $files = array();
        $this->log("service url: [" . $this->config->serviceUrl . "]");

        // Append the basic params.
        $this->addParam($params, "format", $this->config->format);
        $this->addParam($params, "ignoreNull", true);

        foreach ($this->clientConfiguration as $param => $value) {
            $this->addParam($params, $param, $value);
        }

        $url = $this->config->serviceUrl."/api_v3/service";
        if ($this->isMultiRequest) {
            $url .= "/multirequest";
            $i = 0;
            foreach ($this->callsQueue as $call) {
                $callparams = $call->getParamsForMultiRequest($i);
                $callfiles = $call->getFilesForMultiRequest($i);
                $params = array_merge($params, $callparams);
                $files = array_merge($files, $callfiles);
                $i++;
            }
        } else {
            $call = $this->callsQueue[0];
            $url .= "/{$call->service}/action/{$call->action}";
            $params = array_merge($params, $call->params);
            $files = $call->files;
        }

        $signature = $this->signature($params);
        $this->addParam($params, "kalsig", $signature);

        try {
            list($postresult, $error) = $this->doHttpRequest($url, $params, $files);
        } catch (Exception $e) {
            $this->resetRequest();
            throw $e;
        }

        if ($error) {
            $this->resetRequest();
            throw new KalturaClientException($error, KalturaClientException::ERROR_GENERIC);
        } else {
            // Print server debug info to log.
            $servername = null;
            $serversession = null;
            foreach ($this->responseHeaders as $curheader) {
                $splittedheader = explode(':', $curheader, 2);
                if ($splittedheader[0] == 'X-Me') {
                    $servername = trim($splittedheader[1]);
                } else if ($splittedheader[0] == 'X-Kaltura-Session') {
                    $serversession = trim($splittedheader[1]);
                }
            }
            if (!is_null($servername) || !is_null($serversession)) {
                $this->log("server: [{$servername}], session: [{$serversession}]");
            }

            $this->log("result (serialized): " . $postresult);

            if ($this->returnServedResult) {
                $result = $postresult;
            } else if ($this->destinationPath) {
                if (!$postresult) {
                    $this->resetRequest();
                    throw new KalturaClientException("failed to download file", KalturaClientException::ERROR_READ_FAILED);
                }
            } else if ($this->config->format == self::KALTURA_SERVICE_FORMAT_PHP) {
                $result = @unserialize($postresult);

                if ($result === false && serialize(false) !== $postresult) {
                    $this->resetRequest();
                    throw new KalturaClientException("failed to unserialize server result\n$postresult",
                                                     KalturaClientException::ERROR_UNSERIALIZE_FAILED);
                }
                $dump = print_r($result, true);
                $this->log("result (object dump): " . $dump);
            } else if ($this->config->format == self::KALTURA_SERVICE_FORMAT_JSON) {
                $result = json_decode($postresult);
                if (is_null($result) && strtolower($postresult) !== 'null') {
                    $this->resetRequest();
                    throw new KalturaClientException("failed to unserialize server result\n$postresult",
                                                     KalturaClientException::ERROR_UNSERIALIZE_FAILED);
                }
                $result = $this->jsObjectToClientObject($result);
                $dump = print_r($result, true);
                $this->log("result (object dump): " . $dump);
            } else {
                $this->resetRequest();
                throw new KalturaClientException("unsupported format: $postresult",
                                                 KalturaClientException::ERROR_FORMAT_NOT_SUPPORTED);
            }
        }
        $this->resetRequest();

        $endtime = microtime(true);

        $this->log("execution time for [".$url."]: [" . ($endtime - $starttime) . "]");

        return $result;
    }

    /**
     * Sorts array recursively.
     * @param array $array - array of parameter.
     * @param int $flags - flags.
     * @return boolean - this function always returns true.
     */
    protected function ksortRecursive(&$array, $flags = null) {
        ksort($array, $flags);
        foreach ($array as &$arr) {
            if (is_array($arr)) {
                $this->ksortRecursive($arr, $flags);
            }
        }
        return true;
    }

    /**
     * Sign array of parameters.
     * @param array $params - array of parameters.
     * @return string - md5 digest of signature.
     */
    private function signature($params) {
        $this->ksortRecursive($params);
        return md5($this->jsonEncode($params));
    }

    /**
     * Send http request by using curl (if available) or php stream_context
     * @param string $url - url.
     * @param array $params - array of parameters.
     * @param array $files - array of file objects.
     * @return array - array of result and error.
     */
    protected function doHttpRequest($url, $params = array(), $files = array()) {
        if (function_exists('curl_init')) {
            return $this->doCurl($url, $params, $files);
        }

        if ($this->destinationPath || $this->returnServedResult) {
            throw new KalturaClientException(
                "Downloading files is not supported with stream context http request, please use curl.",
                KalturaClientException::ERROR_DOWNLOAD_NOT_SUPPORTED);
        }
        return $this->doPostRequest($url, $params, $files);
    }

    /**
     * Curl HTTP POST Request
     * @param string $url - url.
     * @param array $params - array of parameters.
     * @param array $files - array of file object.
     * @return array - array of of result and error.
     */
    private function doCurl($url, $params = array(), $files = array()) {
        $requestheaders = $this->config->requestHeaders;

        $params = $this->jsonEncode($params);
        $this->log("curl: $url");
        $this->log("post: $params");
        if ($this->config->format == self::KALTURA_SERVICE_FORMAT_JSON) {
            $requestheaders[] = 'Accept: application/json';
        }

        $this->responseHeaders = array();
        $cookies = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($this->config->method == self::METHOD_POST) {
            curl_setopt($ch, CURLOPT_POST, 1);
            if (count($files) > 0) {
                $params = array('json' => $params);
                foreach ($files as $key => $file) {
                    // The usage of the @filename API for file uploading is deprecated since PHP 5.5.
                    // CURLFile must be used instead.
                    if (PHP_VERSION_ID >= 50500) {
                        $params[$key] = new \CURLFile($file);
                    } else {
                        // Let curl know its a file.
                        $params[$key] = "@" . $file;
                    }
                }
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            } else {
                $requestheaders[] = 'Content-Type: application/json';
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            }
        }
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
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
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
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

        // Set SSL verification.
        if (!$this->getConfig()->verifySSL) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        } else if ($this->getConfig()->sslCertificatePath) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_CAINFO, $this->getConfig()->sslCertificatePath);
        }

        // Set custom headers.
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestheaders);

        // Save response headers.
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, array($this, 'readHeader'));

        $destinationresource = null;
        if ($this->destinationPath) {
            $destinationresource = fopen($this->destinationPath, "wb");
            curl_setopt($ch, CURLOPT_FILE, $destinationresource);
        } else {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        }

        $result = curl_exec($ch);

        if ($destinationresource) {
            fclose($destinationresource);
        }

        $curlerror = curl_error($ch);
        curl_close($ch);
        return array($result, $curlerror);
    }

    /**
     * HTTP stream context request
     * @param string $url - url.
     * @param array $params - array of parameters.
     * @param array $files - array of file objects.
     * @return array - array of result and error.
     */
    private function doPostRequest($url, $params = array(), $files = array()) {
        if (count($files) > 0) {
            throw new KalturaClientException("Uploading files is not supported with stream context http request, please use curl.",
                                             KalturaClientException::ERROR_UPLOAD_NOT_SUPPORTED);
        }
        $formatteddata = http_build_query($params , "", "&");
        $this->log("post: $url?$formatteddata");

        $params = array('http' => array("method" => "POST",
                                        "User-Agent: " . $this->config->userAgent . "\r\n" . "Accept-language: en\r\n" .
                                        "Content-type: application/x-www-form-urlencoded\r\n",
                                        "content" => $formatteddata));

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
            throw new KalturaClientException("Problem with $url, $phperrormsg",
                                             KalturaClientException::ERROR_CONNECTION_FAILED);
        }
        $response = @stream_get_contents($fp);
        if ($response === false) {
            throw new KalturaClientException("Problem reading data from $url, $phperrormsg",
                                             KalturaClientException::ERROR_READ_FAILED);
        }
        return array($response, '');
    }

    /**
     * Set return served result.
     * @param boolean $returnservedresult - served result.
     */
    public function setReturnServedResult($returnservedresult) {
        $this->returnServedResult = $returnservedresult;
    }

    /**
     * Get served result.
     * @return boolean - served result.
     */
    public function getReturnServedResult() {
        return $this->returnServedResult;
    }

    /**
     * Set destination path.
     * @param string $destinationpath - destination path.
     */
    public function setDestinationPath($destinationpath) {
        $this->destinationPath = $destinationpath;
    }

    /**
     * Get destination path.
     * @return string
     */
    public function getDestinationPath() {
        return $this->destinationPath;
    }

    /**
     * Get configuration object.
     * @return KalturaConfiguration - configuration object.
     */
    public function getConfig() {
        return $this->config;
    }

    /**
     * Set configuration object.
     * @param KalturaConfiguration $config - instance of KalturaConfiguration.
     */
    public function setConfig(KalturaConfiguration $config) {
        $this->config = $config;

        $logger = $this->config->getLogger();
        if ($logger instanceof IKalturaLogger) {
            $this->shouldLog = true;
        }
    }

    /**
     * Set client configuration object.
     * @param KalturaClientConfiguration $configuration - instance of KalturaClientConfiguration.
     */
    public function setClientConfiguration(KalturaClientConfiguration $configuration) {
        $params = get_class_vars('KalturaClientConfiguration');
        foreach ($params as $param => $value) {
            if (is_null($configuration->$param)) {
                if (isset($this->clientConfiguration[$param])) {
                    unset($this->clientConfiguration[$param]);
                }
            } else {
                $this->clientConfiguration[$param] = $configuration->$param;
            }
        }
    }

    /**
     * Set request configuration.
     * @param KalturaRequestConfiguration $configuration - request configuration object.
     */
    public function setRequestConfiguration(KalturaRequestConfiguration $configuration) {
        $params = get_class_vars('KalturaRequestConfiguration');
        foreach ($params as $param => $value) {
            if (is_null($configuration->$param)) {
                if (isset($this->requestConfiguration[$param])) {
                    unset($this->requestConfiguration[$param]);
                }
            } else {
                $this->requestConfiguration[$param] = $configuration->$param;
            }
        }
    }

    /**
     * Add parameter to array of parameters that is passed by reference.
     * @param array $params - array of parameters.
     * @param string $paramname - parameeter name.
     * @param string $paramvalue - parameter value.
     */
    public function addParam(array &$params, $paramname, $paramvalue) {
        if ($paramvalue === null) {
            return;
        }

        if ($paramvalue instanceof KalturaNull) {
            $params[$paramname . '__null'] = '';
            return;
        }

        if (is_object($paramvalue) && $paramvalue instanceof KalturaObjectBase) {
            $params[$paramname] = array('objectType' => get_class($paramvalue));

            foreach ($paramvalue as $prop => $val) {
                $this->addParam($params[$paramname], $prop, $val);
            }

            return;
        }

        if (is_bool($paramvalue)) {
            $params[$paramname] = $paramvalue;
            return;
        }

        if (!is_array($paramvalue)) {
            $params[$paramname] = (string)$paramvalue;
            return;
        }

        $params[$paramname] = array();
        if ($paramvalue) {
            foreach ($paramvalue as $subparamname => $subparamvalue) {
                $this->addParam($params[$paramname], $subparamname, $subparamvalue);
            }
        } else {
            $params[$paramname]['-'] = '';
        }
    }

    /**
     * Convert js object to client object.
     * @param mixed $value - javascript object.
     * @return mixed - client object.
     */
    public function jsObjectToClientObject($value) {
        if (is_array($value)) {
            foreach ($value as &$item) {
                $item = $this->jsObjectToClientObject($item);
            }
        }

        if (is_object($value)) {
            if (isset($value->message) && isset($value->code)) {
                if ($this->isMultiRequest) {
                    if (isset($value->args)) {
                        $value->args = (array) $value->args;
                    }
                    return (array) $value;
                }
                throw new KalturaException($value->message, $value->code, $value->args);
            }

            if (!isset($value->objectType)) {
                throw new KalturaClientException("Response format not supported - objectType is required for all objects",
                                                 KalturaClientException::ERROR_FORMAT_NOT_SUPPORTED);
            }

            $objecttype = $value->objectType;
            $object = new $objecttype();
            $attributes = get_object_vars($value);
            foreach ($attributes as $attribute => $attributevalue) {
                if ($attribute === 'objectType') {
                    continue;
                }

                $object->$attribute = $this->jsObjectToClientObject($attributevalue);
            }

            $value = $object;
        }

        return $value;
    }

    /**
     * Encodes objects.
     * @param mixed $value - json string.
     * @return string - eoncoded string.
     */
    public function jsonEncode($value) {
        return json_encode($this->unsetNull($value));
    }

    /**
     * Unset null object.
     * @param object $object - object to unset.
     * @return array - array of unset object.
     */
    protected function unsetNull($object) {
        if (!is_array($object) && !is_object($object)) {
            return $object;
        }
        if (is_object($object) && $object instanceof MultiRequestSubResult) {
            return "$object";
        }
        $array = (array)$object;
        foreach ($array as $key => $value) {
            if (is_null($value)) {
                unset($array[$key]);
            } else {
                $array[$key] = $this->unsetNull($value);
            }
        }

        if (is_object($object)) {
            $array['objectType'] = get_class($object);
        }

        return $array;
    }

    /**
     * Validate the result object and throw exception if its an error
     *
     * @param object $resultobject - result object.
     */
    public function throwExceptionIfError($resultobject) {
        if ($this->isError($resultobject)) {
            throw new KalturaException($resultobject["message"], $resultobject["code"], $resultobject["args"]);
        }
    }

    /**
     * Checks whether the result object is an error.
     * @param object $resultobject - result object.
     * @return boolean - whether result object is an error.
     */
    public function isError($resultobject) {
        return (is_array($resultobject) && isset($resultobject["message"]) && isset($resultobject["code"]));
    }

    /**
     * Validate that the passed object type is of the expected type.
     * @param object $resultobject - result object.
     * @param string $objecttype - object type.
     */
    public function validateObjectType($resultobject, $objecttype) {
        $knownnativetypes = array("boolean", "integer", "double", "string");
        if (is_null($resultobject) ||
            (in_array(gettype($resultobject), $knownnativetypes) && in_array($objecttype, $knownnativetypes))) {
            return; // We do not check native simple types.
        } else if (is_object($resultobject)) {
            if (!($resultobject instanceof $objecttype)) {
                throw new KalturaClientException("Invalid object type - not instance of $objecttype",
                                                 KalturaClientException::ERROR_INVALID_OBJECT_TYPE);
            }
        } else if (class_exists($objecttype) && is_subclass_of($objecttype, 'KalturaEnumBase')) {
            $enum = new ReflectionClass($objecttype);
            $values = array_map('strval', $enum->getConstants());
            if (!in_array($resultobject, $values)) {
                throw new KalturaClientException("Invalid enum value",
                                                 KalturaClientException::ERROR_INVALID_ENUM_VALUE);
            }
        } else if (gettype($resultobject) !== $objecttype) {
            throw new KalturaClientException("Invalid object type",
                                             KalturaClientException::ERROR_INVALID_OBJECT_TYPE);
        }
    }

    /**
     * Start multi request.
     */
    public function startMultiRequest() {
        $this->isMultiRequest = true;
    }

    /**
     * Do multi request.
     * @return object - result object.
     */
    public function doMultiRequest() {
        return $this->doQueue();
    }

    /**
     * Whether this object is multi request.
     * @return boolean - wheter this object is multi object.
     */
    public function isMultiRequest() {
        return $this->isMultiRequest;
    }

    /**
     * Get multi request queue size.
     * @return int - queue size.
     */
    public function getMultiRequestQueueSize() {
        return count($this->callsQueue);
    }

    /**
     * Get multi request result.
     * @return object - result object.
     */
    public function getMultiRequestResult() {
        return new MultiRequestSubResult($this->getMultiRequestQueueSize() . ':result');
    }

    /**
     * Store log message.
     * @param string $msg - mesasge.
     */
    protected function log($msg) {
        if ($this->shouldLog) {
            $this->config->getLogger()->log($msg);
        }
    }

    /**
     * Return a list of parameter used to a new start debug on the destination server api
     * @link http://kb.zend.com/index.php?View=entry&EntryID=434
     * @param string $url - url.
     * @return array - array of parameters.
     */
    protected function getZendDebuggerParams($url) {
        $params = array();
        $passthruparams = array('debug_host', 'debug_fastfile', 'debug_port', 'start_debug', 'send_debug_header',
                                'send_sess_end', 'debug_jit', 'debug_stop', 'use_remote');

        foreach ($passthruparams as $param) {
            if (isset($_COOKIE[$param])) {
                $params[$param] = $_COOKIE[$param];
            }
        }

        $params['original_url'] = $url;
        // To create a new debug session.
        $params['debug_session_id'] = microtime(true);

        return $params;
    }

    /**
     * Generate kaltura session string (version 1).
     * @param string $adminsecretforsigning - admin srecret.
     * @param string $userid - username as string.
     * @param int $type - login account type.
     * @param int $partnerid - partner id.
     * @param int $expiry - session expire time.
     * @param string $privileges - privileges.
     * @return string - session string.
     */
    public function generateSession($adminsecretforsigning, $userid, $type, $partnerid, $expiry = 86400, $privileges = '') {
        $rand = rand(0, 32000);
        $expiry = time() + $expiry;
        $fields = array ($partnerid, $partnerid, $expiry, $type, $rand, $userid, $privileges);
        $info = implode(";", $fields);

        $signature = $this->hash($adminsecretforsigning, $info);
        $strtohash = $signature . "|" . $info;
        $encodedstr = base64_encode($strtohash);

        return $encodedstr;
    }

    /**
     * Generate kaltura session string (version 2)
     * @param string $adminsecretforsigning - admin secret.
     * @param string $userid - username as string.
     * @param int $type - login account type.
     * @param int $partnerid - partner id.
     * @param int $expiry - session expire time.
     * @param string $privileges - plivileges.
     * @return string - session string.
     */
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

    /**
     * Encrypt message by using AES.
     * @param string $key - ecnryption key.
     * @param string $message - message string to encrypt.
     * @return string - encrypted message.
     */
    protected static function aesEncrypt($key, $message) {
        // No need for an IV since we add a random string to the message anyway.
        $iv = str_repeat("\0", 16);
        $key = substr(sha1($key, true), 0, 16);
        // Pad with null byte to be compatible with mcrypt PKCS#5 padding.
        // See http://thefsb.tumblr.com/post/110749271235/using-opensslendecrypt-in-php-instead-of as reference.
        $blocksize = 16;
        if (strlen($message) % $blocksize) {
            $padlength = $blocksize - strlen($message) % $blocksize;
            $message .= str_repeat("\0", $padlength);
        }
        return openssl_encrypt($message, 'AES-128-CBC', $key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv);
    }

    /**
     * Get hash value (mesasge digest).
     * @param string $salt - salt for sha1.
     * @param string $str - message to hash.
     * @return - message digest by sha1.
     */
    private function hash ($salt, $str) {
        return sha1($salt.$str);
    }

    /**
     * Get kaltura Null value.
     * @return KalturaNull - this object.
     */
    public static function getKalturaNullValue() {
        return KalturaNull::getInstance();
    }

}

/**
 * Interface Kaltura Client Plugin
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface IKalturaClientPlugin {
    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaClientPlugin - object.
     */
    public static function get(KalturaClient $client);

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices();

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName();
}

/**
 * Kaltura Client Plugin
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaClientPlugin implements IKalturaClientPlugin {
    /**
     * Constructor of KalturaClientPlugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    protected function __construct(KalturaClient $client) {

    }
}

/**
 * Kaltura Service Action Call
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServiceActionCall {
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
     * Contruct new Kaltura service action call, if params array contain sub arrays (for objects), it will be flattened.
     * @param string $service - service name.
     * @param string $action - action name.
     * @param array $params - array of parameters.
     * @param array $files - array of file object.
     */
    public function __construct($service, $action, $params = array(), $files = array()) {
        $this->service = $service;
        $this->action = $action;
        $this->params = $this->parseParams($params);
        $this->files = $files;
    }

    /**
     * Parse params array and sub arrays (for objects).
     * @param array $params - array of parameters.
     * @return array - array of new parameters.
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
     * Return the parameters for a multi request.
     * @param int $multirequestindex - multi request index.
     * @return array - array of multi request parameters.
     */
    public function getParamsForMultiRequest($multirequestindex) {
        $multirequestparams = array();
        $multirequestparams[$multirequestindex]['service'] = $this->service;
        $multirequestparams[$multirequestindex]['action'] = $this->action;
        foreach ($this->params as $key => $val) {
            $multirequestparams[$multirequestindex][$key] = $val;
        }
        return $multirequestparams;
    }

    /**
     * Return the parameters for a multi request.
     * @param int $multirequestindex - multi request index.
     * @return array - array of multi request parameters.
     */
    public function getFilesForMultiRequest($multirequestindex) {
        $multirequestparams = array();
        foreach ($this->files as $key => $val) {
            $multirequestparams["$multirequestindex:$key"] = $val;
        }
        return $multirequestparams;
    }
}

/**
 * Kaltura Service Base
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaServiceBase {
    /**
     * @var KalturaClient.
     */
    protected $client;

    /**
     * Initialize the service keeping reference to the KalturaClient.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        $this->client = $client;
    }

    /**
     * Set client object.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function setClient(KalturaClient $client) {
        $this->client = $client;
    }
}

/**
 * Kaltura Enum Base
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEnumBase {
}

/**
 * Kaltura Object Base
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaObjectBase {
    /**
     * @var array
     */
    public $relatedObjects;

    /**
     * Constructor of KalturaObjectBase.
     * @param array $params - array of parameters.
     */
    public function __construct($params = array()) {
        foreach ($params as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new KalturaClientException("property [{$key}] does not exist on object [".get_class($this)."]",
                                                 KalturaClientException::ERROR_INVALID_OBJECT_FIELD);
            }
            $this->$key = $value;
        }
    }

    /**
     * Add parameter if not null.
     * @param array $params - array of params.
     * @param string $paramname - parameter name.
     * @param object $paramvalue - parameter value.
     */
    protected function addIfNotNull(&$params, $paramname, $paramvalue) {
        if ($paramvalue !== null) {
            if ($paramvalue instanceof KalturaObjectBase) {
                $params[$paramname] = $paramvalue->toParams();
            } else {
                $params[$paramname] = $paramvalue;
            }
        }
    }

    /**
     * Get this object as parameter array.
     * @return array - array of parameters.
     */
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
 * Kaltura Exception
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaException extends Exception {
    /** @var arguments */
    private $arguments;

    /**
     * Constructor of KalturaException.
     * @param string $message - error message.
     * @param int $code - error code.
     * @param array $arguments - array of argument.
     */
    public function __construct($message, $code, $arguments) {
        $this->code = $code;
        $this->arguments = $arguments;
        parent::__construct($message);
    }

    /**
     * Get arguments.
     * @return array - array of argument.
     */
    public function getArguments() {
        return $this->arguments;
    }

    /**
     * Get argument.
     * @param string $argument - argument name.
     * @return object - argument object.
     */
    public function getArgument($argument) {
        if ($this->arguments && isset($this->arguments[$argument])) {
            return $this->arguments[$argument];
        }

        return null;
    }
}

/**
 * Kaltura Client Exception
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientException extends Exception {
    /** @var error generic */
    const ERROR_GENERIC = -1;
    /** @var error unserialize failed */
    const ERROR_UNSERIALIZE_FAILED = -2;
    /** @var error format not supported */
    const ERROR_FORMAT_NOT_SUPPORTED = -3;
    /** @var error upload not supported */
    const ERROR_UPLOAD_NOT_SUPPORTED = -4;
    /** @var error coonection failed */
    const ERROR_CONNECTION_FAILED = -5;
    /** @var error read failed */
    const ERROR_READ_FAILED = -6;
    /** @var error invalid partner id */
    const ERROR_INVALID_PARTNER_ID = -7;
    /** @var error invalid object type */
    const ERROR_INVALID_OBJECT_TYPE = -8;
    /** @var error invalid object field */
    const ERROR_INVALID_OBJECT_FIELD = -9;
    /** @var error download not supported */
    const ERROR_DOWNLOAD_NOT_SUPPORTED = -10;
    /** @var error download in multi request*/
    const ERROR_DOWNLOAD_IN_MULTIREQUEST = -11;
    /** @var error action in multi request */
    const ERROR_ACTION_IN_MULTIREQUEST = -12;
    /** @var error invalid enum value */
    const ERROR_INVALID_ENUM_VALUE = -13;
}

/**
 * Kaltura Configuration
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConfiguration {
    /** @var logger */
    private $logger;

    /** @var service url */
    public $serviceUrl = "http://www.kaltura.com/";
    /** @var format */
    public $format = KalturaClientBase::KALTURA_SERVICE_FORMAT_PHP;
    /** @var curl timeout */
    public $curlTimeout = 120;
    /** @var user agent */
    public $userAgent = '';
    /** @var start zend debugger session */
    public $startZendDebuggerSession = false;
    /** @var proxy host */
    public $proxyHost = null;
    /** @var proxy port */
    public $proxyPort = null;
    /** @var proxy type */
    public $proxyType = 'HTTP';
    /** @var proxy user */
    public $proxyUser = null;
    /** @var proxy password */
    public $proxyPassword = '';
    /** @var verify ssl */
    public $verifySSL = true;
    /** @var ssl certification path */
    public $sslCertificatePath = null;
    /** @var request headers */
    public $requestHeaders = array();
    /** @var method */
    public $method = KalturaClientBase::METHOD_POST;

    /**
     * Set logger to get kaltura client debug logs.
     * @param IKalturaLogger $log - log object.
     */
    public function setLogger(IKalturaLogger $log) {
        $this->logger = $log;
    }

    /**
     * Gets the logger (Internal client use).
     * @return IKalturaLogger
     */
    public function getLogger() {
        return $this->logger;
    }
}

/**
 * Kaltura Logger Interface
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
interface IKalturaLogger {
    /**
     * Write log message.
     * @param string $msg - message.
     */
    public function log($msg);
}
