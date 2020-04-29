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

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeXmlNodeType extends KalturaEnumBase {
    /** @var changed */
    const CHANGED = 1;
    /** @var added */
    const ADDED = 2;
    /** @var removed */
    const REMOVED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailContext extends KalturaEnumBase {
    /** @var client */
    const CLIENT = -1;
    /** @var script */
    const SCRIPT = 0;
    /** @var ps2 */
    const PS2 = 1;
    /** @var api_v3 */
    const API_V3 = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFileSyncType extends KalturaEnumBase {
    /** @var file */
    const FILE = 1;
    /** @var link */
    const LINK = 2;
    /** @var URL */
    const URL = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 1;
    /** @var ready */
    const READY = 2;
    /** @var failed */
    const FAILED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailAction extends KalturaEnumBase {
    /** @var changed */
    const CHANGED = "CHANGED";
    /** @var content viewed */
    const CONTENT_VIEWED = "CONTENT_VIEWED";
    /** @var copied */
    const COPIED = "COPIED";
    /** @var created */
    const CREATED = "CREATED";
    /** @var deleted */
    const DELETED = "DELETED";
    /** @var file sync created */
    const FILE_SYNC_CREATED = "FILE_SYNC_CREATED";
    /** @var relation added */
    const RELATION_ADDED = "RELATION_ADDED";
    /** @var relation removed */
    const RELATION_REMOVED = "RELATION_REMOVED";
    /** @var viewed */
    const VIEWED = "VIEWED";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailObjectType extends KalturaEnumBase {
    /** @var batch job */
    const BATCH_JOB = "BatchJob";
    /** @var email ingestion profile */
    const EMAIL_INGESTION_PROFILE = "EmailIngestionProfile";
    /** @var file sync */
    const FILE_SYNC = "FileSync";
    /** @var kshow kuser */
    const KSHOW_KUSER = "KshowKuser";
    /** @var metadata */
    const METADATA = "Metadata";
    /** @var metadata profile */
    const METADATA_PROFILE = "MetadataProfile";
    /** @var parter */
    const PARTNER = "Partner";
    /** @var permission */
    const PERMISSION = "Permission";
    /** @var upload token */
    const UPLOAD_TOKEN = "UploadToken";
    /** @var user login data */
    const USER_LOGIN_DATA = "UserLoginData";
    /** @var user role */
    const USER_ROLE = "UserRole";
    /** @var access control */
    const ACCESS_CONTROL = "accessControl";
    /** @var category */
    const CATEGORY = "category";
    /** @var conversion profile 2 */
    const CONVERSION_PROFILE_2 = "conversionProfile2";
    /** @var entry */
    const ENTRY = "entry";
    /** @var flavor asset */
    const FLAVOR_ASSET = "flavorAsset";
    /** @var flavor params */
    const FLAVOR_PARAMS = "flavorParams";
    /** @var flavor params conversion profile */
    const FLAVOR_PARAMS_CONVERSION_PROFILE = "flavorParamsConversionProfile";
    /** @var flavor params output */
    const FLAVOR_PARAMS_OUTPUT = "flavorParamsOutput";
    /** @var kshow */
    const KSHOW = "kshow";
    /** @var kuser */
    const KUSER = "kuser";
    /** @var media info */
    const MEDIA_INFO = "mediaInfo";
    /** @var moderation */
    const MODERATION = "moderation";
    /** @var roughcut */
    const ROUGHCUT = "roughcutEntry";
    /** @var syndication */
    const SYNDICATION = "syndicationFeed";
    /** @var thumbnail asset */
    const THUMBNAIL_ASSET = "thumbAsset";
    /** @var thumbnail params */
    const THUMBNAIL_PARAMS = "thumbParams";
    /** @var thumbnail params output */
    const THUMBNAIL_PARAMS_OUTPUT = "thumbParamsOutput";
    /** @var ui conf */
    const UI_CONF = "uiConf";
    /** @var widget */
    const WIDGET = "widget";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by parsed */
    const PARSED_AT_ASC = "+parsedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by parsed */
    const PARSED_AT_DESC = "-parsedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAuditTrailInfo extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrail extends KalturaObjectBase {
    /**
     * @var int
     */
    public $id = null;

    /**
     * @var int
     */
    public $createdAt = null;

    /**
     * Indicates when the data was parsed
     * @var int
     */
    public $parsedAt = null;

    /**
     * @var KalturaAuditTrailStatus
     */
    public $status = null;

    /**
     * @var KalturaAuditTrailObjectType
     */
    public $auditObjectType = null;

    /**
     * @var string
     */
    public $objectId = null;

    /**
     * @var string
     */
    public $relatedObjectId = null;

    /**
     * @var KalturaAuditTrailObjectType
     */
    public $relatedObjectType = null;

    /**
     * @var string
     */
    public $entryId = null;

    /**
     * @var int
     */
    public $masterPartnerId = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var string
     */
    public $requestId = null;

    /**
     * @var string
     */
    public $userId = null;

    /**
     * @var KalturaAuditTrailAction
     */
    public $action = null;

    /**
     * @var KalturaAuditTrailInfo
     */
    public $data;

    /**
     *
     * @var string
     */
    public $ks = null;

    /**
     * @var KalturaAuditTrailContext
     */
    public $context = null;

    /**
     * The API service and action that called and caused this audit
     * @var string
     */
    public $entryPoint = null;

    /**
     * @var string
     */
    public $serverName = null;

    /**
     * @var string
     */
    public $ipAddress = null;

    /**
     * @var string
     */
    public $userAgent = null;

    /**
     * @var string
     */
    public $clientTag = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var string
     */
    public $errorDescription = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeItem extends KalturaObjectBase {
    /**
     * @var string
     */
    public $descriptor = null;

    /**
     * @var string
     */
    public $oldValue = null;

    /**
     * @var string
     */
    public $newValue = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeInfo extends KalturaAuditTrailInfo {
    /**
     * @var array of KalturaAuditTrailChangeItem
     */
    public $changedItems;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailChangeXmlNode extends KalturaAuditTrailChangeItem {
    /**
     * @var KalturaAuditTrailChangeXmlNodeType
     */
    public $type = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFileSyncCreateInfo extends KalturaAuditTrailInfo {
    /**
     * @var string
     */
    public $version = null;

    /**
     * @var int
     */
    public $objectSubType = null;

    /**
     * @var int
     */
    public $dc = null;

    /**
     * @var bool
     */
    public $original = null;

    /**
     * @var KalturaAuditTrailFileSyncType
     */
    public $fileType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaAuditTrail
     */
    public $objects;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailTextInfo extends KalturaAuditTrailInfo {
    /**
     * @var string
     */
    public $info = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAuditTrailBaseFilter extends KalturaRelatedFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $parsedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $parsedAtLessThanOrEqual = null;

    /**
     * @var KalturaAuditTrailStatus
     */
    public $statusEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;

    /**
     * @var KalturaAuditTrailObjectType
     */
    public $auditObjectTypeEqual = null;

    /**
     * @var string
     */
    public $auditObjectTypeIn = null;

    /**
     * @var string
     */
    public $objectIdEqual = null;

    /**
     * @var string
     */
    public $objectIdIn = null;

    /**
     * @var string
     */
    public $relatedObjectIdEqual = null;

    /**
     * @var string
     */
    public $relatedObjectIdIn = null;

    /**
     * @var KalturaAuditTrailObjectType
     */
    public $relatedObjectTypeEqual = null;

    /**
     * @var string
     */
    public $relatedObjectTypeIn = null;

    /**
     * @var string
     */
    public $entryIdEqual = null;

    /**
     * @var string
     */
    public $entryIdIn = null;

    /**
     * @var int
     */
    public $masterPartnerIdEqual = null;

    /**
     * @var string
     */
    public $masterPartnerIdIn = null;

    /**
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * @var string
     */
    public $partnerIdIn = null;

    /**
     * @var string
     */
    public $requestIdEqual = null;

    /**
     * @var string
     */
    public $requestIdIn = null;

    /**
     * @var string
     */
    public $userIdEqual = null;

    /**
     * @var string
     */
    public $userIdIn = null;

    /**
     * @var KalturaAuditTrailAction
     */
    public $actionEqual = null;

    /**
     * @var string
     */
    public $actionIn = null;

    /**
     * @var string
     */
    public $ksEqual = null;

    /**
     * @var KalturaAuditTrailContext
     */
    public $contextEqual = null;

    /**
     * @var string
     */
    public $contextIn = null;

    /**
     * @var string
     */
    public $entryPointEqual = null;

    /**
     * @var string
     */
    public $entryPointIn = null;

    /**
     * @var string
     */
    public $serverNameEqual = null;

    /**
     * @var string
     */
    public $serverNameIn = null;

    /**
     * @var string
     */
    public $ipAddressEqual = null;

    /**
     * @var string
     */
    public $ipAddressIn = null;

    /**
     * @var string
     */
    public $clientTagEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailFilter extends KalturaAuditTrailBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditTrailService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Audit Trial Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add an audit trail object and audit trail content associated with Kaltura object
     * @param KalturaAuditTrail $audittrail - instance of KalturaAuditTrail.
     * @return KalturaAuditTrail - instance of KalturaAuditTrail.
     */
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

    /**
     * Retrieve an audit trail object by id.
     * @param int $id - id of kaltura audit trail.
     * @return KalturaAuditTrail - instance of KalturaAuditTrail.
     */
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

    /**
     * List audit trail objects by filter and pager
     * @param KalturaAuditTrailFilter $filter - instance of KalturaAuditTrailFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaAuditTrailListResponse - instance of KalturaAuditTrailListResponse.
     */
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuditClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaAuditTrailService
     */
    public $auditTrail = null;

    /**
     * Constructor of Kaltura Audit Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->auditTrail = new KalturaAuditTrailService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaAuditClientPlugin - instance of KalturaAuditClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaAuditClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('auditTrail' => $this->auditTrail);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'audit';
    }
}

