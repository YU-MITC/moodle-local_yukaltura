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
class KalturaDeleteFlavorsLogicType extends KalturaEnumBase {
    /** @var keep list delete others */
    const KEEP_LIST_DELETE_OTHERS = 1;
    /** @var delete list */
    const DELETE_LIST = 2;
    /** @var delete keep smallest */
    const DELETE_KEEP_SMALLEST = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskAddOrRemoveType extends KalturaEnumBase {
    /** @var add */
    const ADD = 1;
    /** @var remove */
    const REMOVE = 2;
    /** @var move */
    const MOVE = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfileStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var active */
    const ACTIVE = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var suspended */
    const SUSPENDED = 4;
    /** @var dry run only */
    const DRY_RUN_ONLY = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaObjectFilterEngineType extends KalturaEnumBase {
    /** @var entry */
    const ENTRY = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaObjectTaskType extends KalturaEnumBase {
    /** @var distribute */
    const DISTRIBUTE = "scheduledTaskContentDistribution.Distribute";
    /** @var dispatch event notification */
    const DISPATCH_EVENT_NOTIFICATION = "scheduledTaskEventNotification.DispatchEventNotification";
    /** @var execute metadata xslt */
    const EXECUTE_METADATA_XSLT = "scheduledTaskMetadata.ExecuteMetadataXslt";
    /** @var delete entry */
    const DELETE_ENTRY = "1";
    /** @var modify categories */
    const MODIFY_CATEGORIES = "2";
    /** @var delete entry flavors */
    const DELETE_ENTRY_FLAVORS = "3";
    /** @var convert entry flabors */
    const CONVERT_ENTRY_FLAVORS = "4";
    /** @var delete local content */
    const DELETE_LOCAL_CONTENT = "5";
    /** @var storage export */
    const STORAGE_EXPORT = "6";
    /** @var modify entry */
    const MODIFY_ENTRY = "7";
    /** @var mail notification */
    const MAIL_NOTIFICATION = "8";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by last execution started */
    const LAST_EXECUTION_STARTED_AT_ASC = "+lastExecutionStartedAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by last execution started */
    const LAST_EXECUTION_STARTED_AT_DESC = "-lastExecutionStartedAt";
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
abstract class KalturaObjectTask extends KalturaObjectBase {
    /**
     *
     * @var KalturaObjectTaskType
     */
    public $type = null;

    /**
     *
     * @var bool
     */
    public $stopProcessingOnError = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfile extends KalturaObjectBase {
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
     * @var KalturaScheduledTaskProfileStatus
     */
    public $status = null;

    /**
     * The type of engine to use to list objects using the given "objectFilter"
     *
     * @var KalturaObjectFilterEngineType
     */
    public $objectFilterEngineType = null;

    /**
     * A filter object (inherits KalturaFilter) that is used to list objects for scheduled tasks
     *
     * @var KalturaFilter
     */
    public $objectFilter;

    /**
     * A list of tasks to execute on the founded objects
     *
     * @var array of KalturaObjectTask
     */
    public $objectTasks;

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
     *
     * @var int
     */
    public $lastExecutionStartedAt = null;

    /**
     * The maximum number of result count allowed to be processed by this profile per execution
     *
     * @var int
     */
    public $maxTotalCountAllowed = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConvertEntryFlavorsObjectTask extends KalturaObjectTask {
    /**
     * Comma separated list of flavor param ids to convert
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     * Should reconvert when flavor already exists?
     *
     * @var bool
     */
    public $reconvert = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeleteEntryFlavorsObjectTask extends KalturaObjectTask {
    /**
     * The logic to use to choose the flavors for deletion
     *
     * @var KalturaDeleteFlavorsLogicType
     */
    public $deleteType = null;

    /**
     * Comma separated list of flavor param ids to delete or keep
     *
     * @var string
     */
    public $flavorParamsIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeleteEntryObjectTask extends KalturaObjectTask {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeleteLocalContentObjectTask extends KalturaObjectTask {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMailNotificationObjectTask extends KalturaObjectTask {
    /**
     * The mail to send the notification to
     *
     * @var string
     */
    public $mailTo = null;

    /**
     * The sender in the mail
     *
     * @var string
     */
    public $sender = null;

    /**
     * The subject of the entry
     *
     * @var string
     */
    public $subject = null;

    /**
     * The message to send in the notification mail
     *
     * @var string
     */
    public $message = null;

    /**
     * The footer of the message to send in the notification mail
     *
     * @var string
     */
    public $footer = null;

    /**
     * The basic link for the KMC site
     *
     * @var string
     */
    public $link = null;

    /**
     * Send the mail to each user
     *
     * @var bool
     */
    public $sendToUsers = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModifyCategoriesObjectTask extends KalturaObjectTask {
    /**
     * Should the object task add or remove categories?
     *
     * @var KalturaScheduledTaskAddOrRemoveType
     */
    public $addRemoveType = null;

    /**
     * The list of category ids to add or remove
     *
     * @var array of KalturaIntegerValue
     */
    public $categoryIds;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModifyEntryObjectTask extends KalturaObjectTask {
    /**
     * The input metadata profile id
     *
     * @var int
     */
    public $inputMetadataProfileId = null;

    /**
     * array of {input metadata xpath location,entry field} objects
     *
     * @var array of KalturaKeyValue
     */
    public $inputMetadata;

    /**
     * The output metadata profile id
     *
     * @var int
     */
    public $outputMetadataProfileId = null;

    /**
     * array of {output metadata xpath location,entry field} objects
     *
     * @var array of KalturaKeyValue
     */
    public $outputMetadata;

    /**
     * The input user id to set on the entry
     *
     * @var string
     */
    public $inputUserId = null;

    /**
     * The input entitled users edit to set on the entry
     *
     * @var string
     */
    public $inputEntitledUsersEdit = null;

    /**
     * The input entitled users publish to set on the entry
     *
     * @var string
     */
    public $inputEntitledUsersPublish = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskJobData extends KalturaJobData {
    /**
     *
     * @var int
     */
    public $maxResults = null;

    /**
     *
     * @var string
     */
    public $resultsFilePath = null;

    /**
     *
     * @var int
     */
    public $referenceTime = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduledTaskProfileBaseFilter extends KalturaFilter {
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
     * @var KalturaScheduledTaskProfileStatus
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

    /**
     *
     * @var int
     */
    public $lastExecutionStartedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $lastExecutionStartedAtLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaScheduledTaskProfile
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
class KalturaStorageExportObjectTask extends KalturaObjectTask {
    /**
     * Storage profile id
     *
     * @var string
     */
    public $storageId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfileFilter extends KalturaScheduledTaskProfileBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduledTaskProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Scheduled Task Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add a new scheduled task profile
     * @param KalturaScheduledTaskProfile $scheduledtaskprofile - scheduled task profile object to add.
     * @return KalturaScheduledTaskProfile - scheduled task profile after added.
     */
    public function add(KalturaScheduledTaskProfile $scheduledtaskprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduledTaskProfile", $scheduledtaskprofile->toParams());
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduledTaskProfile");
        return $resultobject;
    }

    /**
     * Delete a scheduled task profile
     * @param int $id - id of scheduled task profile.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve a scheduled task profile by id
     * @param int $id - id of scheduled task,
     * @return KalturaScheduledTaskProfile - searched object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduledTaskProfile");
        return $resultobject;
    }

    /**
     * Get dry run result.
     * @param int $requestid - request id.
     * @return KalturaObjectListResponse - list object.
     */
    public function getDryRunResults($requestid) {
        $kparams = array();
        $this->client->addParam($kparams, "requestId", $requestid);
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "getDryRunResults", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaObjectListResponse");
        return $resultobject;
    }

    /**
     * List scheduled task profiles
     * @param KalturaScheduledTaskProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaScheduledTaskProfileListResponse - list object.
     */
    public function listAction(KalturaScheduledTaskProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduledTaskProfileListResponse");
        return $resultobject;
    }

    /**
     * Request dry run.
     * @param int $scheduledtaskprofileid - id of scheduled task profile.
     * @param int $maxresults - maximum number of result.
     * @return int - execution status.
     */
    public function requestDryRun($scheduledtaskprofileid, $maxresults = 500) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduledTaskProfileId", $scheduledtaskprofileid);
        $this->client->addParam($kparams, "maxResults", $maxresults);
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "requestDryRun", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Update an existing scheduled task profile
     * @param int $id - id of scheduled task profile.
     * @param KalturaScheduledTaskProfile $scheduledtaskprofile - scheduled task profile to update.
     * @return KalturaScheduledTaskProfile - schedule task profile object after update.
     */
    public function update($id, KalturaScheduledTaskProfile $scheduledtaskprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "scheduledTaskProfile", $scheduledtaskprofile->toParams());
        $this->client->queueServiceActionCall("scheduledtask_scheduledtaskprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduledTaskProfile");
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
class KalturaScheduledTaskClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaScheduledTaskProfileService
     */
    public $scheduledTaskProfile = null;

    /**
     * Constructor of Kaltura Schedule Bulk Upload Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->scheduledTaskProfile = new KalturaScheduledTaskProfileService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaScheduledTaskClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaScheduledTaskClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('scheduledTaskProfile' => $this->scheduledTaskProfile);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'scheduledTask';
    }
}

