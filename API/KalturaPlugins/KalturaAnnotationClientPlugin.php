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
require_once(dirname(__FILE__) . "/KalturaCuePointClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotationOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by time duration */
    const DURATION_ASC = "+duration";
    /** @var order by end time */
    const END_TIME_ASC = "+endTime";
    /** @var order by partner id */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by start time */
    const START_TIME_ASC = "+startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_ASC = "+triggeredAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by time duration */
    const DURATION_DESC = "-duration";
    /** @var order by end time */
    const END_TIME_DESC = "-endTime";
    /** @var order by partner id */
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotation extends KalturaCuePoint {
    /**
     * @var string
     */
    public $parentId = null;

    /**
     * @var string
     */
    public $text = null;

    /**
     * End time in milliseconds
     * @var int
     */
    public $endTime = null;

    /**
     * Duration in milliseconds
     * @var int
     */
    public $duration = null;

    /**
     * Depth in the tree
     * @var int
     */
    public $depth = null;

    /**
     * Number of all descendants
     * @var int
     */
    public $childrenCount = null;

    /**
     * Number of children, first generation only.
     * @var int
     */
    public $directChildrenCount = null;

    /**
     * Is the annotation public.
     * @var KalturaNullableBoolean
     */
    public $isPublic = null;

    /**
     * Should the cue point get indexed on the entry.
     * @var KalturaNullableBoolean
     */
    public $searchableOnEntry = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotationListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaAnnotation
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
abstract class KalturaAnnotationBaseFilter extends KalturaCuePointFilter {
    /**
     * @var string
     */
    public $parentIdEqual = null;

    /**
     * @var string
     */
    public $parentIdIn = null;

    /**
     * @var string
     */
    public $textLike = null;

    /**
     * @var string
     */
    public $textMultiLikeOr = null;

    /**
     * @var string
     */
    public $textMultiLikeAnd = null;

    /**
     * @var int
     */
    public $endTimeGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $endTimeLessThanOrEqual = null;

    /**
     * @var int
     */
    public $durationGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $durationLessThanOrEqual = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $isPublicEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotationFilter extends KalturaAnnotationBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotationService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Annotation Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add an annotation object associated with an entry
     * @param KalturaCuePoint $annotation - instance of KalturaCuePoint.
     * @return KalturaAnnotation - instance of KalturaAnnotation
     */
    public function add(KalturaCuePoint $annotation) {
        $kparams = array();
        $this->client->addParam($kparams, "annotation", $annotation->toParams());
        $this->client->queueServiceActionCall("annotation_annotation", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAnnotation");
        return $resultobject;
    }

    /**
     * Allows you to add multiple cue points objects by uploading XML that contains multiple cue point definitions
     * @param file $filedata - instance of file data.
     * @return KalturaCuePointListResponse - instance of KalturaCuePointListResponse
     */
    public function addFromBulk($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("annotation_annotation", "addFromBulk", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePointListResponse");
        return $resultobject;
    }

    /**
     * Clone cuePoint with id to given entry
     * @param string $id - id of cuePoint.
     * @param string $entryid - id of kaltura media entry.
     * @return KalturaCuePoint
     */
    public function cloneAction($id, $entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("annotation_annotation", "clone", $kparams);
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
     * @return int - number of cuePoint.
     */
    public function count(KalturaCuePointFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("annotation_annotation", "count", $kparams);
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
     * @param string $id - id of cuePoint.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("annotation_annotation", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve an CuePoint object by id
     * @param string $id - id of cuePoint
     * @return KalturaCuePoint - instance of KalturaCuePoint.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("annotation_annotation", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCuePoint");
        return $resultobject;
    }

    /**
     * List annotation objects by filter and pager
     * @param KalturaCuePointFilter $filter - instance of KalturaCuePointFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaAnnotationListResponse - instance of KalturaAnnotationListResponse.
     */
    public function listAction(KalturaCuePointFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("annotation_annotation", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAnnotationListResponse");
        return $resultobject;
    }

    /**
     * Download multiple cue points objects as XML definitions
     * @param KalturaCuePointFilter $filter - instance of KalturaCuePointFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return {object} - file data.
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
        $this->client->queueServiceActionCall("annotation_annotation", "serveBulk", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update annotation by id
     * @param string $id - id of kaltura cuePoint.
     * @param KalturaCuePoint $annotation - instance of KalturaCuePoint.
     * @return KalturaAnnocation - instance of KalturaAnnotation.
     */
    public function update($id, KalturaCuePoint $annotation) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "annotation", $annotation->toParams());
        $this->client->queueServiceActionCall("annotation_annotation", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAnnotation");
        return $resultobject;
    }

    /**
     * Update cuePoint status by id
     * @param string $id - id of kaltura cuePoint.
     * @param int $status - update status.
     */
    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("annotation_annotation", "updateStatus", $kparams);
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnnotationClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaAnnotationService
     */
    public $annotation = null;

    /**
     * Constructor of Kaltura Annocation Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->annotation = new KalturaAnnotationService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalutraAnnocationClientPlugin - instance of KalturaAnnotationClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaAnnotationClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('annotation' => $this->annotation);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'annotation';
    }
}

