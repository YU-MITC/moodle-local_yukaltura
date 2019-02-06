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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var active */
    const ACTIVE = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationEventObjectType extends KalturaEnumBase {
    /** @var ad cue point */
    const AD_CUE_POINT = "adCuePointEventNotifications.AdCuePoint";
    /** @var annocation */
    const ANNOTATION = "annotationEventNotifications.Annotation";
    /** @var attachement asset */
    const ATTACHMENT_ASSET = "attachmentAssetEventNotifications.AttachmentAsset";
    /** @var caption asset */
    const CAPTION_ASSET = "captionAssetEventNotifications.CaptionAsset";
    /** @var code cue point */
    const CODE_CUE_POINT = "codeCuePointEventNotifications.CodeCuePoint";
    /** @var distribution profile */
    const DISTRIBUTION_PROFILE = "contentDistributionEventNotifications.DistributionProfile";
    /** @var entry distribution */
    const ENTRY_DISTRIBUTION = "contentDistributionEventNotifications.EntryDistribution";
    /** @var cue point */
    const CUE_POINT = "cuePointEventNotifications.CuePoint";
    /** @var drop folder */
    const DROP_FOLDER = "dropFolderEventNotifications.DropFolder";
    /** @var drop folder file */
    const DROP_FOLDER_FILE = "dropFolderEventNotifications.DropFolderFile";
    /** @var metadata */
    const METADATA = "metadataEventNotifications.Metadata";
    /** @var transcript asset */
    const TRANSCRIPT_ASSET = "transcriptAssetEventNotifications.TranscriptAsset";
    /** @var entry */
    const ENTRY = "1";
    /** @var category */
    const CATEGORY = "2";
    /** @var asset */
    const ASSET = "3";
    /** @var flavor asset */
    const FLAVORASSET = "4";
    /** @var thumbasset */
    const THUMBASSET = "5";
    /** @var kuser */
    const KUSER = "8";
    /** @var accesscontrol */
    const ACCESSCONTROL = "9";
    /** @var batchjob */
    const BATCHJOB = "10";
    /** @var bulkuploadresult */
    const BULKUPLOADRESULT = "11";
    /** @var categorykuser */
    const CATEGORYKUSER = "12";
    /** @var conversionprofile */
    const CONVERSIONPROFILE2 = "14";
    /** @var flavorparams */
    const FLAVORPARAMS = "15";
    /** @var flavorparamsconversionprofile */
    const FLAVORPARAMSCONVERSIONPROFILE = "16";
    /** @var flavorparamsoutput */
    const FLAVORPARAMSOUTPUT = "17";
    /** @var genericsyndicationfeed */
    const GENERICSYNDICATIONFEED = "18";
    /** @var kusertouserroile */
    const KUSERTOUSERROLE = "19";
    /** @var patrner */
    const PARTNER = "20";
    /** @var permission */
    const PERMISSION = "21";
    /** @var permission item */
    const PERMISSIONITEM = "22";
    /** @var permission to permissin item */
    const PERMISSIONTOPERMISSIONITEM = "23";
    /** @var scheduler */
    const SCHEDULER = "24";
    /** @var scheduler config */
    const SCHEDULERCONFIG = "25";
    /** @var scheduler status */
    const SCHEDULERSTATUS = "26";
    /** @var scheduler worker */
    const SCHEDULERWORKER = "27";
    /** @var storage profile */
    const STORAGEPROFILE = "28";
    /** @var syndicationfeed */
    const SYNDICATIONFEED = "29";
    /** @var thumbparams */
    const THUMBPARAMS = "31";
    /** @var thumbparamsoutput */
    const THUMBPARAMSOUTPUT = "32";
    /** @var uploadtoken */
    const UPLOADTOKEN = "33";
    /** @var userlogindata */
    const USERLOGINDATA = "34";
    /** @var userrole */
    const USERROLE = "35";
    /** @var widget */
    const WIDGET = "36";
    /** @var category entry */
    const CATEGORYENTRY = "37";
    /** @var live stream */
    const LIVE_STREAM = "38";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationEventType extends KalturaEnumBase {
    /** @var integration job closed */
    const INTEGRATION_JOB_CLOSED = "integrationEventNotifications.INTEGRATION_JOB_CLOSED";
    /** @var batch job status */
    const BATCH_JOB_STATUS = "1";
    /** @var object addred */
    const OBJECT_ADDED = "2";
    /** @var object changed */
    const OBJECT_CHANGED = "3";
    /** @var object copied */
    const OBJECT_COPIED = "4";
    /** @var object created */
    const OBJECT_CREATED = "5";
    /** @var object data changed */
    const OBJECT_DATA_CHANGED = "6";
    /** @var object deleted */
    const OBJECT_DELETED = "7";
    /** @var object erased */
    const OBJECT_ERASED = "8";
    /** @var object ready for replacement */
    const OBJECT_READY_FOR_REPLACMENT = "9";
    /** @var object saved */
    const OBJECT_SAVED = "10";
    /** @var object updated */
    const OBJECT_UPDATED = "11";
    /** @var object replaced */
    const OBJECT_REPLACED = "12";
    /** @var object ready for index */
    const OBJECT_READY_FOR_INDEX = "13";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateOrderBy extends KalturaEnumBase {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateType extends KalturaEnumBase {
    /** @var bpm abort */
    const BPM_ABORT = "businessProcessNotification.BusinessProcessAbort";
    /** @var bpm signal */
    const BPM_SIGNAL = "businessProcessNotification.BusinessProcessSignal";
    /** @var bpm start */
    const BPM_START = "businessProcessNotification.BusinessProcessStart";
    /** @var email */
    const EMAIL = "emailNotification.Email";
    /** @var http */
    const HTTP = "httpNotification.Http";
    /** @var push */
    const PUSH = "pushNotification.Push";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationParameter extends KalturaObjectBase {
    /**
     * The key in the subject and body to be replaced with the dynamic value
     *
     * @var string
     */
    public $key = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     * The dynamic value to be placed in the final output
     *
     * @var KalturaStringValue
     */
    public $value;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplate extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaEventNotificationTemplateType
     */
    public $type = null;

    /**
     *
     * @var KalturaEventNotificationTemplateStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Define that the template could be dispatched manually from the API
     *
     * @var bool
     */
    public $manualDispatchEnabled = null;

    /**
     * Define that the template could be dispatched automatically by the system
     *
     * @var bool
     */
    public $automaticDispatchEnabled = null;

    /**
     * Define the event that should trigger this notification
     *
     * @var KalturaEventNotificationEventType
     */
    public $eventType = null;

    /**
     * Define the object that raied the event that should trigger this notification
     *
     * @var KalturaEventNotificationEventObjectType
     */
    public $eventObjectType = null;

    /**
     * Define the conditions that cause this notification to be triggered
     *
     * @var array of KalturaCondition
     */
    public $eventConditions;

    /**
     * Define the content dynamic parameters
     *
     * @var array of KalturaEventNotificationParameter
     */
    public $contentParameters;

    /**
     * Define the content dynamic parameters
     *
     * @var array of KalturaEventNotificationParameter
     */
    public $userParameters;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventFieldCondition extends KalturaCondition {
    /**
     * The field to be evaluated at runtime
     *
     * @var KalturaBooleanField
     */
    public $field;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationArrayParameter extends KalturaEventNotificationParameter {
    /**
     *
     * @var array of KalturaString
     */
    public $values;

    /**
     * Used to restrict the values to close list
     *
     * @var array of KalturaStringValue
     */
    public $allowedValues;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationDispatchJobData extends KalturaJobData {
    /**
     *
     * @var int
     */
    public $templateId = null;

    /**
     * Define the content dynamic parameters
     *
     * @var array of KalturaKeyValue
     */
    public $contentParameters;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationScope extends KalturaScope {
    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var KalturaEventNotificationEventObjectType
     */
    public $scopeObjectType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEventNotificationTemplateBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var KalturaEventNotificationTemplateType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var KalturaEventNotificationTemplateStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaEventNotificationTemplate
     */
    public $objects;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventObjectChangedCondition extends KalturaCondition {
    /**
     * Comma seperated column names to be tested
     *
     * @var string
     */
    public $modifiedColumns = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateFilter extends KalturaEventNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationTemplateService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Event Notification Template Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This action allows for the creation of new backend event types in the system.
     * This action requires access to the Kaltura server Admin Console.
     * If you're looking to register to existing event types, please use the clone action instead.
     * @param KalturaEventNotificationTemplate $eventnotificationtemplate - templated object.
     * @return KalturaEventNotificationTemplate - template object.
     */
    public function add(KalturaEventNotificationTemplate $eventnotificationtemplate) {
        $kparams = array();
        $this->client->addParam($kparams, "eventNotificationTemplate", $eventnotificationtemplate->toParams());
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplate");
        return $resultobject;
    }

    /**
     * This action allows registering to various backend event.
     * Use this action to create notifications that will react to events such as new video was uploaded
     * or metadata field was updated. To see the list of available event types, call the listTemplates action.
     * @param int $id - Source template to clone
     * @param KalturaEventNotificationTemplate $eventnotificationtemplate -  template object.
     * @return KalturaEventNotificationTemplate - template object.
     */
    public function cloneAction($id, KalturaEventNotificationTemplate $eventnotificationtemplate = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        if ($eventnotificationtemplate !== null) {
            $this->client->addParam($kparams, "eventNotificationTemplate", $eventnotificationtemplate->toParams());
        }
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplate");
        return $resultobject;
    }

    /**
     * Delete an event notification template object
     * @param int $id - id of kaltura event notification.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Dispatch event notification object by id
     * @param int $id - id of kaltura event notification.
     * @param KalturaEventNotificationScope $scope - scope object.
     * @return int - id of kaltura notification object.
     */
    public function dispatch($id, KalturaEventNotificationScope $scope) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "scope", $scope->toParams());
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "dispatch", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Retrieve an event notification template object by id
     * @param int $id - id of kaltura event notification template.
     * @return KalturaEventNotificationTemplate - instance of KalturaEventNotificationTemplate.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplate");
        return $resultobject;
    }

    /**
     * List event notification template objects
     * @param KalturaEventNotificationTemplateFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object .
     * @return KalturaEventNotificationTemplateListResponse - list object.
     */
    public function listAction(KalturaEventNotificationTemplateFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplateListResponse");
        return $resultobject;
    }

    /**
     * List event notification order by partner.
     * @param KalturaPartnerFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return {object} - instance of KalturaEventNotificationTemplateListResponse.
     */
    public function listByPartner(KalturaPartnerFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "listByPartner", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplateListResponse");
        return $resultobject;
    }

    /**
     * Action lists the template partner event notification templates.
     * @param KalturaEventNotificationTemplateFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaEventNotificationTemplateListResponse - list object.
     */
    public function listTemplates(KalturaEventNotificationTemplateFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "listTemplates", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplateListResponse");
        return $resultobject;
    }

    /**
     * Register to a queue from which event messages will be provided according to given template.
     * Queue will be created if not already exists
     * @param string $notificationtemplatesystemname - Existing push notification template system name.
     * @param KalturaPushNotificationParams $pushnotificationparams - params.
     * @return KalturaPushNotificationData - pus notification object.
     */
    public function register($notificationtemplatesystemname, KalturaPushNotificationParams $pushnotificationparams) {
        $kparams = array();
        $this->client->addParam($kparams, "notificationTemplateSystemName", $notificationtemplatesystemname);
        $this->client->addParam($kparams, "pushNotificationParams", $pushnotificationparams->toParams());
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "register", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPushNotificationData");
        return $resultobject;
    }

    /**
     * Clear queue messages.
     * @param string $notificationtemplatesystemname - Existing push notification template system name
     * @param KalturaPushNotificationParams $pushnotificationparams - params.
     * @param string $command - Command to be sent to push server.
     */
    public function sendCommand($notificationtemplatesystemname, KalturaPushNotificationParams $pushnotificationparams, $command) {
        $kparams = array();
        $this->client->addParam($kparams, "notificationTemplateSystemName", $notificationtemplatesystemname);
        $this->client->addParam($kparams, "pushNotificationParams", $pushnotificationparams->toParams());
        $this->client->addParam($kparams, "command", $command);
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "sendCommand", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update an existing event notification template object.
     * @param int $id - id of event notification template
     * @param KalturaEventNotificationTemplate $eventnotificationtemplate - template object to update.
     * @return KalturaEventNotificationTemplate - template object after update.
     */
    public function update($id, KalturaEventNotificationTemplate $eventnotificationtemplate) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "eventNotificationTemplate", $eventnotificationtemplate->toParams());
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplate");
        return $resultobject;
    }

    /**
     * Update event notification template status by id
     * @param int $id - id of kaltura event notification template.
     * @param int $status - update status.
     * @return KalturaEventNotificationTemplate - template object.
     */
    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEventNotificationTemplate");
        return $resultobject;
    }
}
/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEventNotificationClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaEventNotificationTemplateService
     */
    public $eventNotificationTemplate = null;

    /**
     * Constructor of Kaltura Event notification Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->eventNotificationTemplate = new KalturaEventNotificationTemplateService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaEventNotificationClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaEventNotificationClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'eventNotificationTemplate' => $this->eventNotificationTemplate,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'eventNotification';
    }
}

