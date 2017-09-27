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
 * This file is part of Kaltura Client API.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <info-cc@ml.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaCuePointClientPlugin.php");

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

class KalturaAnnotationOrderBy
{
    const END_TIME_ASC = "+endTime";
    const END_TIME_DESC = "-endTime";
    const DURATION_ASC = "+duration";
    const DURATION_DESC = "-duration";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const START_TIME_ASC = "+startTime";
    const START_TIME_DESC = "-startTime";
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
}

class KalturaAnnotation extends KalturaCuePoint
{
    /**
     *
     *
     * @var string
     * @insertonly
     */
    public $parentId = null;

    /**
     *
     *
     * @var string
     */
    public $text = null;

    /**
     * End time in milliseconds
     *
     * @var int
     */
    public $endTime = null;

    /**
     * Duration in milliseconds
     *
     * @var int
     * @readonly
     */
    public $duration = null;


}

abstract class KalturaAnnotationBaseFilter extends KalturaCuePointFilter
{
    /**
     *
     *
     * @var string
     */
    public $parentIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $parentIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $textLike = null;

    /**
     *
     *
     * @var string
     */
    public $textMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $textMultiLikeAnd = null;

    /**
     *
     *
     * @var int
     */
    public $endTimeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $endTimeLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $durationGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $durationLessThanOrEqual = null;


}

class KalturaAnnotationFilter extends KalturaAnnotationBaseFilter
{

}

class KalturaAnnotationListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaAnnotation
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;


}


class KalturaAnnotationService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaAnnotation $annotation) {
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

    public function update($id, KalturaAnnotation $annotation) {
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

    public function listAction(KalturaAnnotationFilter $filter = null, KalturaFilterPager $pager = null) {
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

    public function serveBulk(KalturaCuePointFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall('annotation_annotation', 'serveBulk', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

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
        return $resultobject;
    }
}
class KalturaAnnotationClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaAnnotationClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaAnnotationService
     */
    public $annotation = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->annotation = new KalturaAnnotationService($client);
    }

    /**
     * @return KalturaAnnotationClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaAnnotationClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('annotation' => $this->annotation);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'annotation';
    }
}
