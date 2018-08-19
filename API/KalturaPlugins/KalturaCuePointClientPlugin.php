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
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const START_TIME_ASC = "+startTime";
    const START_TIME_DESC = "-startTime";
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointStatus
{
    const READY = 1;
    const DELETED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointType
{
    const ANNOTATION = "annotation.Annotation";
    const AD = "adCuePoint.Ad";
    const CODE = "codeCuePoint.Code";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCuePoint extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $id = null;

    /**
     *
     *
     * @var KalturaCuePointType
     */
    public $cuePointType = null;

    /**
     *
     *
     * @var KalturaCuePointStatus
     */
    public $status = null;

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
    public $partnerId = null;

    /**
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     * Start tim ein milliseconds
     *
     * @var int
     */
    public $startTime = null;

    /**
     *
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     *
     * @var string
     */
    public $partnerData = null;

    /**
     *
     *
     * @var int
     */
    public $partnerSortValue = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $forceStop = null;

    /**
     *
     *
     * @var int
     */
    public $thumbOffset = null;

    /**
     *
     *
     * @var string
     */
    public $systemName = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCuePointBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     *
     * @var KalturaCuePointType
     */
    public $cuePointTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $cuePointTypeIn = null;

    /**
     *
     *
     * @var KalturaCuePointStatus
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
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $tagsLike = null;

    /**
     *
     *
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

    /**
     *
     *
     * @var int
     */
    public $startTimeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $startTimeLessThanOrEqual = null;

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
     * @var int
     */
    public $partnerSortValueEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerSortValueIn = null;

    /**
     *
     *
     * @var int
     */
    public $partnerSortValueGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $partnerSortValueLessThanOrEqual = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $forceStopEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointFilter extends KalturaCuePointBaseFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaCuePoint
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function serveBulk(KalturaCuePointFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall('cuepoint_cuepoint', 'serveBulk', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

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
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCuePointClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaCuePointClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaCuePointService
     */
    public $cuePoint = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->cuePoint = new KalturaCuePointService($client);
    }

    /**
     * @return KalturaCuePointClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaCuePointClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'cuePoint' => $this->cuePoint,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'cuePoint';
    }
}
