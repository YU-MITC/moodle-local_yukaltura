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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

error_reporting(E_STRICT);

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaEventNotificationClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationAuthenticationMethod extends KalturaEnumBase {
    /** @var any safe */
    const ANYSAFE = -18;
    /** @var any */
    const ANY = -17;
    /** @var basic */
    const BASIC = 1;
    /** @var digest */
    const DIGEST = 2;
    /** @var gssnegotiate */
    const GSSNEGOTIATE = 4;
    /** @var ntlm */
    const NTLM = 8;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationMethod extends KalturaEnumBase {
    /** @var get */
    const GET = 1;
    /** @var post */
    const POST = 2;
    /** @var put */
    const PUT = 3;
    /** @var delete */
    const DELETE = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationSslVersion extends KalturaEnumBase {
    /** @var v2 */
    const V2 = 2;
    /** @var v3 */
    const V3 = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationCertificateType extends KalturaEnumBase {
    /** @var der */
    const DER = "DER";
    /** @var eng */
    const ENG = "ENG";
    /** @var pem */
    const PEM = "PEM";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationSslKeyType extends KalturaEnumBase {
    /** @var der */
    const DER = "DER";
    /** @var eng */
    const ENG = "ENG";
    /** @var pem */
    const PEM = "PEM";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotification extends KalturaObjectBase {
    /**
     * Object that triggered the notification
     *
     * @var KalturaObjectBase
     */
    public $object;

    /**
     * Object type that triggered the notification
     *
     * @var KalturaEventNotificationEventObjectType
     */
    public $eventObjectType = null;

    /**
     * ID of the batch job that execute the notification
     *
     * @var int
     */
    public $eventNotificationJobId = null;

    /**
     * ID of the template that triggered the notification
     *
     * @var int
     */
    public $templateId = null;

    /**
     * Name of the template that triggered the notification
     *
     * @var string
     */
    public $templateName = null;

    /**
     * System name of the template that triggered the notification
     *
     * @var string
     */
    public $templateSystemName = null;

    /**
     * Ecent type that triggered the notification
     *
     * @var KalturaEventNotificationEventType
     */
    public $eventType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaHttpNotificationData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationDataFields extends KalturaHttpNotificationData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationDataText extends KalturaHttpNotificationData {
    /**
     *
     * @var KalturaStringValue
     */
    public $content;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationObjectData extends KalturaHttpNotificationData {
    /**
     * Kaltura API object type
     *
     * @var string
     */
    public $apiObjectType = null;

    /**
     * Data format
     *
     * @var KalturaResponseType
     */
    public $format = null;

    /**
     * Ignore null attributes during serialization
     *
     * @var bool
     */
    public $ignoreNull = null;

    /**
     * PHP code
     *
     * @var string
     */
    public $code = null;

    /**
     * An array of pattern-replacement pairs used for data string regex replacements
     *
     * @var array of KalturaKeyValue
     */
    public $dataStringReplacements;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationTemplate extends KalturaEventNotificationTemplate {
    /**
     * Remote server URL
     *
     * @var string
     */
    public $url = null;

    /**
     * Request method.
     *
     * @var KalturaHttpNotificationMethod
     */
    public $method = null;

    /**
     * Data to send.
     *
     * @var KalturaHttpNotificationData
     */
    public $data;

    /**
     * The maximum number of seconds to allow cURL functions to execute.
     *
     * @var int
     */
    public $timeout = null;

    /**
     * The number of seconds to wait while trying to connect.
     *      Must be larger than zero.
     *
     * @var int
     */
    public $connectTimeout = null;

    /**
     * A username to use for the connection.
     *
     * @var string
     */
    public $username = null;

    /**
     * A password to use for the connection.
     *
     * @var string
     */
    public $password = null;

    /**
     * The HTTP authentication method to use.
     *
     * @var KalturaHttpNotificationAuthenticationMethod
     */
    public $authenticationMethod = null;

    /**
     * The SSL version (2 or 3) to use.
     *      By default PHP will try to determine this itself, although in some cases this must be set manually.
     *
     * @var KalturaHttpNotificationSslVersion
     */
    public $sslVersion = null;

    /**
     * SSL certificate to verify the peer with.
     *
     * @var string
     */
    public $sslCertificate = null;

    /**
     * The format of the certificate.
     *
     * @var KalturaHttpNotificationCertificateType
     */
    public $sslCertificateType = null;

    /**
     * The password required to use the certificate.
     *
     * @var string
     */
    public $sslCertificatePassword = null;

    /**
     * The identifier for the crypto engine of the private SSL key specified in ssl key.
     *
     * @var string
     */
    public $sslEngine = null;

    /**
     * The identifier for the crypto engine used for asymmetric crypto operations.
     *
     * @var string
     */
    public $sslEngineDefault = null;

    /**
     * The key type of the private SSL key specified in ssl key - PEM / DER / ENG.
     *
     * @var KalturaHttpNotificationSslKeyType
     */
    public $sslKeyType = null;

    /**
     * Private SSL key.
     *
     * @var string
     */
    public $sslKey = null;

    /**
     * The secret password needed to use the private SSL key specified in ssl key.
     *
     * @var string
     */
    public $sslKeyPassword = null;

    /**
     * Adds a e-mail custom header
     *
     * @var array of KalturaKeyValue
     */
    public $customHeaders;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationDispatchJobData extends KalturaEventNotificationDispatchJobData {
    /**
     * Remote server URL
     *
     * @var string
     */
    public $url = null;

    /**
     * Request method.
     *
     * @var KalturaHttpNotificationMethod
     */
    public $method = null;

    /**
     * Data to send.
     *
     * @var string
     */
    public $data = null;

    /**
     * The maximum number of seconds to allow cURL functions to execute.
     *
     * @var int
     */
    public $timeout = null;

    /**
     * The number of seconds to wait while trying to connect.
     *      Must be larger than zero.
     *
     * @var int
     */
    public $connectTimeout = null;

    /**
     * A username to use for the connection.
     *
     * @var string
     */
    public $username = null;

    /**
     * A password to use for the connection.
     *
     * @var string
     */
    public $password = null;

    /**
     * The HTTP authentication method to use.
     *
     * @var KalturaHttpNotificationAuthenticationMethod
     */
    public $authenticationMethod = null;

    /**
     * The SSL version (2 or 3) to use.
     *      By default PHP will try to determine this itself, although in some cases this must be set manually.
     *
     * @var KalturaHttpNotificationSslVersion
     */
    public $sslVersion = null;

    /**
     * SSL certificate to verify the peer with.
     *
     * @var string
     */
    public $sslCertificate = null;

    /**
     * The format of the certificate.
     *
     * @var KalturaHttpNotificationCertificateType
     */
    public $sslCertificateType = null;

    /**
     * The password required to use the certificate.
     *
     * @var string
     */
    public $sslCertificatePassword = null;

    /**
     * The identifier for the crypto engine of the private SSL key specified in ssl key.
     *
     * @var string
     */
    public $sslEngine = null;

    /**
     * The identifier for the crypto engine used for asymmetric crypto operations.
     *
     * @var string
     */
    public $sslEngineDefault = null;

    /**
     * The key type of the private SSL key specified in ssl key - PEM / DER / ENG.
     *
     * @var KalturaHttpNotificationSslKeyType
     */
    public $sslKeyType = null;

    /**
     * Private SSL key.
     *
     * @var string
     */
    public $sslKey = null;

    /**
     * The secret password needed to use the private SSL key specified in ssl key.
     *
     * @var string
     */
    public $sslKeyPassword = null;

    /**
     * Adds a e-mail custom header
     *
     * @var array of KalturaKeyValue
     */
    public $customHeaders;

    /**
     * The secret to sign the notification with
     *
     * @var string
     */
    public $signSecret = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaHttpNotificationTemplateBaseFilter extends KalturaEventNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationTemplateFilter extends KalturaHttpNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaHttpNotificationClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Http Notification Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaHttpNotificationClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaHttpNotificationClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'httpNotification';
    }
}
