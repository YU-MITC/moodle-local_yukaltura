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
class KalturaVirusFoundAction extends KalturaEnumBase {
    /** @var none */
    const NONE = 0;
    /** @var delete */
    const DELETE = 1;
    /** @var clean none */
    const CLEAN_NONE = 2;
    /** @var clean delete */
    const CLEAN_DELETE = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanJobResult extends KalturaEnumBase {
    /** @var scan error */
    const SCAN_ERROR = 1;
    /** @var file is clean */
    const FILE_IS_CLEAN = 2;
    /** @var file was cleaned */
    const FILE_WAS_CLEANED = 3;
    /** @var file infected */
    const FILE_INFECTED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanProfileStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var enabled */
    const ENABLED = 2;
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
class KalturaVirusScanEngineType extends KalturaEnumBase {
    /** @var calmav scan engine */
    const CLAMAV_SCAN_ENGINE = "clamAVScanEngine.ClamAV";
    /** @var symantec scan direct engine */
    const SYMANTEC_SCAN_DIRECT_ENGINE = "symantecScanEngine.SymantecScanDirectEngine";
    /** @var symantec scan engine */
    const SYMANTEC_SCAN_ENGINE = "symantecScanEngine.SymantecScanEngine";
    /** @var symantec scan java engine */
    const SYMANTEC_SCAN_JAVA_ENGINE = "symantecScanEngine.SymantecScanJavaEngine";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanProfileOrderBy extends KalturaEnumBase {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanProfile extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

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
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var KalturaVirusScanProfileStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaVirusScanEngineType
     */
    public $engineType = null;

    /**
     *
     * @var KalturaBaseEntryFilter
     */
    public $entryFilter;

    /**
     *
     * @var KalturaVirusFoundAction
     */
    public $actionIfInfected = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaParseCaptionAssetJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $captionAssetId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanJobData extends KalturaJobData {
    /**
     *
     * @var KalturaFileContainer
     */
    public $fileContainer;

    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var KalturaVirusScanJobResult
     */
    public $scanResult = null;

    /**
     *
     * @var KalturaVirusFoundAction
     */
    public $virusFoundAction = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaVirusScanProfileBaseFilter extends KalturaFilter {
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
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $nameLike = null;

    /**
     *
     * @var KalturaVirusScanProfileStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaVirusScanEngineType
     */
    public $engineTypeEqual = null;

    /**
     *
     * @var string
     */
    public $engineTypeIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaVirusScanProfile
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
class KalturaVirusScanProfileFilter extends KalturaVirusScanProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVirusScanProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Scan Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add an virus scan profile object and virus scan profile content associated with Kaltura object
     * @param KalturaVirusScanProfile $virusscanprofile - visu scan profile to add.
     * @return KalturaVirusScanProfile - virus scan profile after added.
     */
    public function add(KalturaVirusScanProfile $virusscanprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfile", $virusscanprofile->toParams());
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaVirusScanProfile");
        return $resultobject;
    }

    /**
     * Mark the virus scan profile as deleted
     * @param int $virusscanprofileid - id of virus scan profile.
     * @return KalturaVirusScanProfile - virus scan profile after deleted.
     */
    public function delete($virusscanprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $virusscanprofileid);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaVirusScanProfile");
        return $resultobject;
    }

    /**
     * Retrieve an virus scan profile object by id
     * @param int $virusscanprofileid - id of virus scan profile.
     * @return KalturaVirusScanProfile - searched object.
     */
    public function get($virusscanprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $virusscanprofileid);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaVirusScanProfile");
        return $resultobject;
    }

    /**
     * List virus scan profile objects by filter and pager
     * @param KalturaVirusScanProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaVirusScanProfileListResponse - list object.
     */
    public function listAction(KalturaVirusScanProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaVirusScanProfileListResponse");
        return $resultobject;
    }

    /**
     * Scan flavor asset according to virus scan profile
     * @param string $flavorassetid - id of flavor asset.
     * @param int $virusscanprofileid - id of virus scan profile.
     * @return int - virus scan profile id.
     */
    public function scan($flavorassetid, $virusscanprofileid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "flavorAssetId", $flavorassetid);
        $this->client->addParam($kparams, "virusScanProfileId", $virusscanprofileid);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "scan", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Update exisitng virus scan profile, it is possible to update the virus scan profile id too
     * @param int $virusscanprofileid - id of virus scan profile.
     * @param KalturaVirusScanProfile $virusscanprofile - virus scan profile to update.
     * @return KalturaVirusScanProfile - virus scan profile after updated.
     */
    public function update($virusscanprofileid, KalturaVirusScanProfile $virusscanprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $virusscanprofileid);
        $this->client->addParam($kparams, "virusScanProfile", $virusscanprofile->toParams());
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaVirusScanProfile");
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
class KalturaVirusScanClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaVirusScanProfileService
     */
    public $virusScanProfile = null;

    /**
     * Constructor of Kaltura Virus Scan Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->virusScanProfile = new KalturaVirusScanProfileService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaVirusScanClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaVirusScanClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('virusScanProfile' => $this->virusScanProfile);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'virusScan';
    }
}
