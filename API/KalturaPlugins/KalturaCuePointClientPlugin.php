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
class KalturaCuePointStatus extends KalturaEnumBase {
    /** @var ready */
    const READY = 1;
    /** @var deleted */
    const DELETED = 2;
    /** @var handled */
    const HANDLED = 3;
    /** @var pending */
    const PENDING = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizOutputType extends KalturaEnumBase {
    /** @var pdf */
    const PDF = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbCuePointSubType extends KalturaEnumBase {
    /** @var silde */
    const SLIDE = 1;
    /** @var chapter */
    const CHAPTER = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointOrderBy extends KalturaEnumBase {
    /** @var order by createdtimestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by start time */
    const START_TIME_ASC = "+startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_ASC = "+triggeredAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by chapter */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by start time */
    const START_TIME_DESC = "-startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_DESC = "-triggeredAt";
    /** @var order by updated timestamp */
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
class KalturaCuePointType extends KalturaEnumBase {
    /** @var adCuePoint AD */
    const AD = "adCuePoint.Ad";
    /** @var annotation */
    const ANNOTATION = "annotation.Annotation";
    /** @var code */
    const CODE = "codeCuePoint.Code";
    /** @var event */
    const EVENT = "eventCuePoint.Event";
    /** @var quiz answer */
    const QUIZ_ANSWER = "quiz.QUIZ_ANSWER";
    /** @var quiz question */
    const QUIZ_QUESTION = "quiz.QUIZ_QUESTION";
    /** @var thumb */
    const THUMB = "thumbCuePoint.Thumb";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCuePoint extends KalturaObjectBase {
    /**
     * @var string
     */
    public $id = null;

    /**
     * @var KalturaCuePointType
     */
    public $cuePointType = null;

    /**
     * @var KalturaCuePointStatus
     */
    public $status = null;

    /**
     * @var string
     */
    public $entryId = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var int
     */
    public $createdAt = null;

    /**
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var int
     */
    public $triggeredAt = null;

    /**
     * @var string
     */
    public $tags = null;

    /**
     * Start time in milliseconds
     * @var int
     */
    public $startTime = null;

    /**
     * @var string
     */
    public $userId = null;

    /**
     * @var string
     */
    public $partnerData = null;

    /**
     * @var int
     */
    public $partnerSortValue = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $forceStop = null;

    /**
     * @var int
     */
    public $thumbOffset = null;

    /**
     * @var string
     */
    public $systemName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaCuePoint
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
abstract class KalturaCuePointBaseFilter extends KalturaRelatedFilter {
    /**
     * @var string
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var KalturaCuePointType
     */
    public $cuePointTypeEqual = null;

    /**
     * @var string
     */
    public $cuePointTypeIn = null;

    /**
     * @var KalturaCuePointStatus
     */
    public $statusEqual = null;

    /**

     * @var string
     */
    public $statusIn = null;

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
    public $triggeredAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $triggeredAtLessThanOrEqual = null;

    /**
     * @var string
     */
    public $tagsLike = null;

    /**
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     * @var string
     */
    public $tagsMultiLikeAnd = null;

    /**
     * @var int
     */
    public $startTimeGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $startTimeLessThanOrEqual = null;

    /**
     * @var string
     */
    public $userIdEqual = null;

    /**
     * @var string
     */
    public $userIdIn = null;

    /**
     * @var int
     */
    public $partnerSortValueEqual = null;

    /**
     * @var string
     */
    public $partnerSortValueIn = null;

    /**
     * @var int
     */
    public $partnerSortValueGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $partnerSortValueLessThanOrEqual = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $forceStopEqual = null;

    /**
     * @var string
     */
    public $systemNameEqual = null;

    /**
     * @var string
     */
    public $systemNameIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointFilter extends KalturaCuePointBaseFilter {
    /**
     * @var string
     */
    public $freeText = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $userIdEqualCurrent = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $userIdCurrent = null;
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Cue Point Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add an cue point object associated with an entry
     * @param KalturaCuePoint $cuepoint - object to add.
     * @return KalturaCuePoint - added object.
     */
    public function add(KalturaCuePoint $cuepoint) {
        $kparams = array();
        $this->client->addParam($kparams, "cuePoint", $cuepoint->toParams());
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePoint");
        return $resultobject;
    }

    /**
     * Allows you to add multiple cue points objects by uploading XML that contains multiple cue point definitions
     * @param file $filedata - file data.
     * @return KalturaCuePointListResponse - instance of KalturaCuePointListResponse.
     */
    public function addFromBulk($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "addFromBulk", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePointListResponse");
        return $resultobject;
    }

    /**
     * Clone cuePoint with id to given entry.
     * @param string $id - id of kaltura cue point.
     * @param string $entryid - id of kaltura media entry.
     * @return KalturaCuePoint - cloned object.
     */
    public function cloneAction($id, $entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePoint");
        return $resultobject;
    }

    /**
     * Count cue point objects by filter.
     * @param KalturaCuePointFilter $filter - instance of KalturaCuePointFilter.
     * @return int - number of cue point.
     */
    public function count(KalturaCuePointFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete cue point by id, and delete all children cue points
     * @param string $id - id of cue point.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve an CuePoint object by id
     * @param string $id - id of cue point.
     * @return KalturaCuePoint - object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePoint");
        return $resultobject;
    }

    /**
     * List cue point objects by filter and pager.
     * @param KalturaCuePointFilter $filter - instance of KalturaCuePointFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaCuePointListResponse - instance of KalturaCuePointListResponse.
     */
    public function listAction(KalturaCuePointFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePointListResponse");
        return $resultobject;
    }

    /**
     * Download multiple cue points objects as XML definitions.
     * @param  KalturaCuePointFilter $filter - instance of KalturaCuePointFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return file - file data.
     */
    public function serveBulk(KalturaCuePointFilter $filter = null, KalturaFilterPager $pager = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "serveBulk", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update cue point by id.
     * @param string $id - id of cue point.
     * @param  KalturaCuePoint $cuepoint - instance of KalturaCuePoint.
     * @return KalturaCuePoint - updated object.
     */
    public function update($id, KalturaCuePoint $cuepoint) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "cuePoint", $cuepoint->toParams());
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePoint");
        return $resultobject;
    }

    /**
     * Update cuePoint status by id.
     * @param string $id - id of cue point.
     * @param int $status - update status of cue point.
     */
    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("cuepoint_cuepoint", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
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
class KalturaCuePointClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaCuePointService
     */
    public $cuePoint = null;

    /**
     * Constructor of Kaltura CuePoint Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->cuePoint = new KalturaCuePointService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaCuePointClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaCuePointClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('cuePoint' => $this->cuePoint);
        return $services;
    }

    /**
     * Get plugin name.
     * @return {string} - class name.
     */
    public function getName() {
        return 'cuePoint';
    }
}
