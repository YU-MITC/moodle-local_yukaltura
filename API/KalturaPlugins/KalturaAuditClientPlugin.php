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

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

/**
 * Kaltura Audit Trial Action class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailAction
{
    const CREATED = "CREATED";
    const COPIED = "COPIED";
    const CHANGED = "CHANGED";
    const DELETED = "DELETED";
    const VIEWED = "VIEWED";
    const CONTENT_VIEWED = "CONTENT_VIEWED";
    const FILE_SYNC_CREATED = "FILE_SYNC_CREATED";
    const RELATION_ADDED = "RELATION_ADDED";
    const RELATION_REMOVED = "RELATION_REMOVED";
}

/**
 * Kaltura Audit Trial Context class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailContext
{
    const CLIENT = -1;
    const SCRIPT = 0;
    const PS2 = 1;
    const API_V3 = 2;
}

/**
 * Kaltura Audit Trial File Syndication class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFileSyncType
{
    const FILE = 1;
    const LINK = 2;
    const URL = 3;
}

/**
 * Kaltura Audit Trial Object Type class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailObjectType
{
    const ACCESS_CONTROL = "accessControl";
    const ADMIN_KUSER = "adminKuser";
    const BATCH_JOB = "BatchJob";
    const CATEGORY = "category";
    const CONVERSION_PROFILE_2 = "conversionProfile2";
    const EMAIL_INGESTION_PROFILE = "EmailIngestionProfile";
    const ENTRY = "entry";
    const FILE_SYNC = "FileSync";
    const FLAVOR_ASSET = "flavorAsset";
    const THUMBNAIL_ASSET = "thumbAsset";
    const FLAVOR_PARAMS = "flavorParams";
    const THUMBNAIL_PARAMS = "thumbParams";
    const FLAVOR_PARAMS_CONVERSION_PROFILE = "flavorParamsConversionProfile";
    const FLAVOR_PARAMS_OUTPUT = "flavorParamsOutput";
    const THUMBNAIL_PARAMS_OUTPUT = "thumbParamsOutput";
    const KSHOW = "kshow";
    const KSHOW_KUSER = "KshowKuser";
    const KUSER = "kuser";
    const MEDIA_INFO = "mediaInfo";
    const MODERATION = "moderation";
    const PARTNER = "Partner";
    const ROUGHCUT = "roughcutEntry";
    const SYNDICATION = "syndicationFeed";
    const UI_CONF = "uiConf";
    const UPLOAD_TOKEN = "UploadToken";
    const WIDGET = "widget";
    const METADATA = "Metadata";
    const METADATA_PROFILE = "MetadataProfile";
    const USER_LOGIN_DATA = "UserLoginData";
    const USER_ROLE = "UserRole";
    const PERMISSION = "Permission";
}

/**
 * Kaltura Audit Trial OrderBy class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const PARSED_AT_ASC = "+parsedAt";
    const PARSED_AT_DESC = "-parsedAt";
}

/**
 * Kaltura Audit Trial Status class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailStatus
{
    const PENDING = 1;
    const READY = 2;
    const FAILED = 3;
}

/**
 * Kaltura Audit Trial Information class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAuditTrailInfo extends KalturaObjectBase
{

}

/**
 * Kaltura Audit Trial class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrail extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Indicates when the data was parsed
     *
     * @var int
     */
    public $parsedAt = null;

    /**
     *
     *
     * @var KalturaAuditTrailStatus
     */
    public $status = null;

    /**
     *
     *
     * @var KalturaAuditTrailObjectType
     */
    public $auditObjectType = null;

    /**
     *
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     *
     * @var string
     */
    public $relatedObjectId = null;

    /**
     *
     *
     * @var KalturaAuditTrailObjectType
     */
    public $relatedObjectType = null;

    /**
     *
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     *
     * @var int
     */
    public $masterPartnerId = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $requestId = null;

    /**
     *
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     *
     * @var KalturaAuditTrailAction
     */
    public $action = null;

    /**
     *
     *
     * @var KalturaAuditTrailInfo
     */
    public $data;

    /**
     *
     *
     * @var string
     */
    public $ks = null;

    /**
     *
     *
     * @var KalturaAuditTrailContext
     */
    public $context = null;

    /**
     * The API service and action that called and caused this audit
     *
     * @var string
     */
    public $entryPoint = null;

    /**
     *
     *
     * @var string
     */
    public $serverName = null;

    /**
     *
     *
     * @var string
     */
    public $ipAddress = null;

    /**
     *
     *
     * @var string
     */
    public $userAgent = null;

    /**
     *
     *
     * @var string
     */
    public $clientTag = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var string
     */
    public $errorDescription = null;

}

/**
 * Kaltura Audit Trial Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAuditTrailBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $parsedAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $parsedAtLessThanOrEqual = null;

    /**
     *
     *
     * @var KalturaAuditTrailStatus
     */
    public $statusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     *
     * @var KalturaAuditTrailObjectType
     */
    public $auditObjectTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $auditObjectTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $objectIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $objectIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $relatedObjectIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $relatedObjectIdIn = null;

    /**
     *
     *
     * @var KalturaAuditTrailObjectType
     */
    public $relatedObjectTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $relatedObjectTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $entryIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $masterPartnerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $masterPartnerIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $requestIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $requestIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     *
     * @var KalturaAuditTrailAction
     */
    public $actionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $actionIn = null;

    /**
     *
     *
     * @var string
     */
    public $ksEqual = null;

    /**
     *
     *
     * @var KalturaAuditTrailContext
     */
    public $contextEqual = null;

    /**
     *
     *
     * @var string
     */
    public $contextIn = null;

    /**
     *
     *
     * @var string
     */
    public $entryPointEqual = null;

    /**
     *
     *
     * @var string
     */
    public $entryPointIn = null;

    /**
     *
     *
     * @var string
     */
    public $serverNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $serverNameIn = null;

    /**
     *
     *
     * @var string
     */
    public $ipAddressEqual = null;

    /**
     *
     *
     * @var string
     */
    public $ipAddressIn = null;

    /**
     *
     *
     * @var string
     */
    public $clientTagEqual = null;

}

/**
 * Kaltura Audit Trial Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFilter extends KalturaAuditTrailBaseFilter
{

}

/**
 * Kaltura Audit Trial List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaAuditTrail
     */
    public $objects;

    /**
     *
     *
     * @var int
     */
    public $totalCount = null;

}

/**
 * Kaltura Audit Trial Change Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeItem extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $descriptor = null;

    /**
     *
     *
     * @var string
     */
    public $oldValue = null;

    /**
     *
     *
     * @var string
     */
    public $newValue = null;

}

/**
 * Kaltura Audit Trial Change Information class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeInfo extends KalturaAuditTrailInfo
{
    /**
     *
     *
     * @var array of KalturaAuditTrailChangeItem
     */
    public $changedItems;

}

/**
 * Kaltura Audit Trial File Sync Creation Information class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFileSyncCreateInfo extends KalturaAuditTrailInfo
{
    /**
     *
     *
     * @var string
     */
    public $version = null;

    /**
     *
     *
     * @var int
     */
    public $objectSubType = null;

    /**
     *
     *
     * @var int
     */
    public $dc = null;

    /**
     *
     *
     * @var bool
     */
    public $original = null;

    /**
     *
     *
     * @var KalturaAuditTrailFileSyncType
     */
    public $fileType = null;

}

/**
 * Kaltura Audit Trial Text Information class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailTextInfo extends KalturaAuditTrailInfo
{
    /**
     *
     *
     * @var string
     */
    public $info = null;

}

/**
 * Kaltura Audit Trial Service class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaAuditTrail $audittrail) {
        $kparams = array();
        $this->client->addParam($kparams, "auditTrail", $audittrail->toParams());
        $this->client->queueServiceActionCall("audit_audittrail", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAuditTrail");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("audit_audittrail", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAuditTrail");
        return $resultobject;
    }

    public function listAction(KalturaAuditTrailFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("audit_audittrail", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAuditTrailListResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Audit Client Plugin class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaAuditClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaAuditTrailService
     */
    public $auditTrail = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->auditTrail = new KalturaAuditTrailService($client);
    }

    /**
     * @return KalturaAuditClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaAuditClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('auditTrail' => $this->auditTrail);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'audit';
    }
}
