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
class KalturaBusinessProcessAbortNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated timestamp */
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
class KalturaBusinessProcessNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated timestamp */
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
class KalturaBusinessProcessProvider extends KalturaEnumBase {
    /** @var activiti */
    const ACTIVITI = "activitiBusinessProcessNotification.Activiti";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessServerOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
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
class KalturaBusinessProcessServerStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = "1";
    /** @var enabled */
    const ENABLED = "2";
    /** @var deleted */
    const DELETED = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessSignalNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated timestamp */
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
class KalturaBusinessProcessStartNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated timestamp */
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
class KalturaBusinessProcessCase extends KalturaObjectBase {
    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $businessProcessId = null;

    /**
     * @var int
     */
    public $businessProcessStartNotificationTemplateId = null;

    /**
     * @var bool
     */
    public $suspended = null;

    /**
     * @var string
     */
    public $activityId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessServer extends KalturaObjectBase {
    /**
     * Auto generated identifier
     * @var int
     */
    public $id = null;

    /**
     * Server creation date as Unix timestamp (In seconds)
     * @var int
     */
    public $createdAt = null;

    /**
     * Server update date as Unix timestamp (In seconds)
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $systemName = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var KalturaBusinessProcessServerStatus
     */
    public $status = null;

    /**
     * The type of the server, this is auto filled by the derived server object
     * @var KalturaBusinessProcessProvider
     */
    public $type = null;

    /**
     * The dc of the server
     * @var int
     */
    public $dc = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessNotificationTemplate extends KalturaEventNotificationTemplate {
    /**
     * Define the integrated BPM server id
     * @var int
     */
    public $serverId = null;

    /**
     * Define the integrated BPM process id
     * @var string
     */
    public $processId = null;

    /**
     * Code to load the main triggering object
     * @var string
     */
    public $mainObjectCode = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessServerBaseFilter extends KalturaFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var string
     */
    public $idNotIn = null;

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
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * @var string
     */
    public $partnerIdIn = null;

    /**
     * @var KalturaBusinessProcessServerStatus
     */
    public $statusEqual = null;

    /**
     * @var KalturaBusinessProcessServerStatus
     */
    public $statusNotEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;

    /**
     * @var string
     */
    public $statusNotIn = null;

    /**
     * @var KalturaBusinessProcessProvider
     */
    public $typeEqual = null;

    /**
     * @var string
     */
    public $typeIn = null;

    /**
     * @var int
     */
    public $dcEqual = null;

    /**
     * @var int
     */
    public $dcEqOrNull = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessServerListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaBusinessProcessServer
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
class KalturaBusinessProcessAbortNotificationTemplate extends KalturaBusinessProcessNotificationTemplate {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessNotificationDispatchJobData extends KalturaEventNotificationDispatchJobData {
    /**
     * @var KalturaBusinessProcessServer
     */
    public $server;

    /**
     * @var string
     */
    public $caseId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessServerFilter extends KalturaBusinessProcessServerBaseFilter {
    /**
     * @var KalturaNullableBoolean
     */
    public $currentDcOrExternal = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $currentDc = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessSignalNotificationTemplate extends KalturaBusinessProcessNotificationTemplate {
    /**
     * Define the message to be sent
     * @var string
     */
    public $message = null;

    /**
     * Define the event that waiting to the signal
     * @var string
     */
    public $eventId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessStartNotificationTemplate extends KalturaBusinessProcessNotificationTemplate {
    /**
     * Abort the process automatically if the triggering object deleted
     * @var bool
     */
    public $abortOnDeletion = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessNotificationTemplateBaseFilter extends KalturaEventNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessNotificationTemplateFilter extends KalturaBusinessProcessNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessAbortNotificationTemplateBaseFilter
extends KalturaBusinessProcessNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessSignalNotificationTemplateBaseFilter
extends KalturaBusinessProcessNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBusinessProcessStartNotificationTemplateBaseFilter
extends KalturaBusinessProcessNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessAbortNotificationTemplateFilter extends KalturaBusinessProcessAbortNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessSignalNotificationTemplateFilter extends KalturaBusinessProcessSignalNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessStartNotificationTemplateFilter extends KalturaBusinessProcessStartNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBusinessProcessCaseService extends KalturaServiceBase {
    /**
     * Constructor of Business Process Case Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Abort business-process case
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param int $businessprocessstartnotificationtemplateid - template id.
     */
    public function abort($objecttype, $objectid, $businessprocessstartnotificationtemplateid) {
        $kparams = array();
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->addParam($kparams, "businessProcessStartNotificationTemplateId",
                                $businessprocessstartnotificationtemplateid);
        $this->client->queueServiceActionCall("businessprocessnotification_businessprocesscase", "abort", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * List business-process cases
     * @param string $objecttype - object type.
     * @param string $objectid  - object id.
     * @return array - array of business processes.
     */
    public function listAction($objecttype, $objectid) {
        $kparams = array();
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->queueServiceActionCall("businessprocessnotification_businessprocesscase", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Server business-process case diagram
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param int $businessprocessstartnotificationtemplateid - template of business process.
     * @return file - file data.
     */
    public function serveDiagram($objecttype, $objectid, $businessprocessstartnotificationtemplateid) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->addParam($kparams, "businessProcessStartNotificationTemplateId",
                                $businessprocessstartnotificationtemplateid);
        $this->client->queueServiceActionCall("businessprocessnotification_businessprocesscase", "serveDiagram", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
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
class KalturaBusinessProcessNotificationClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaBusinessProcessCaseService
     */
    public $businessProcessCase = null;

    /**
     * Constructor of Kaltura Business Process Notification Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->businessProcessCase = new KalturaBusinessProcessCaseService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of Kaltura Client.
     * @return KalturaBusinessProcessNotificationClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaBusinessProcessNotificationClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('businessProcessCase' => $this->businessProcessCase);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'businessProcessNotification';
    }
}
