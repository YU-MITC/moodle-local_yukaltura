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
class KalturaVarPartnerUsageItem extends KalturaObjectBase {
    /**
     * Partner ID
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Partner name
     *
     * @var string
     */
    public $partnerName = null;

    /**
     * Partner status
     *
     * @var KalturaPartnerStatus
     */
    public $partnerStatus = null;

    /**
     * Partner package
     *
     * @var int
     */
    public $partnerPackage = null;

    /**
     * Partner creation date (Unix timestamp)
     *
     * @var int
     */
    public $partnerCreatedAt = null;

    /**
     * Number of player loads in the specific date range
     *
     * @var int
     */
    public $views = null;

    /**
     * Number of plays in the specific date range
     *
     * @var int
     */
    public $plays = null;

    /**
     * Number of new entries created during specific date range
     *
     * @var int
     */
    public $entriesCount = null;

    /**
     * Total number of entries
     *
     * @var int
     */
    public $totalEntriesCount = null;

    /**
     * Number of new video entries created during specific date range
     *
     * @var int
     */
    public $videoEntriesCount = null;

    /**
     * Number of new image entries created during specific date range
     *
     * @var int
     */
    public $imageEntriesCount = null;

    /**
     * Number of new audio entries created during specific date range
     *
     * @var int
     */
    public $audioEntriesCount = null;

    /**
     * Number of new mix entries created during specific date range
     *
     * @var int
     */
    public $mixEntriesCount = null;

    /**
     * The total bandwidth usage during the given date range (in MB)
     *
     * @var float
     */
    public $bandwidth = null;

    /**
     * The total storage consumption (in MB)
     *
     * @var float
     */
    public $totalStorage = null;

    /**
     * The added storage consumption (new uploads) during the given date range (in MB)
     *
     * @var float
     */
    public $storage = null;

    /**
     * The deleted storage consumption (new uploads) during the given date range (in MB)
     *
     * @var float
     */
    public $deletedStorage = null;

    /**
     * The peak amount of storage consumption during the given date range for the specific publisher
     *
     * @var float
     */
    public $peakStorage = null;

    /**
     * The average amount of storage consumption during the given date range for the specific publisher
     *
     * @var float
     */
    public $avgStorage = null;

    /**
     * The combined amount of bandwidth and storage consumed during the given date range for the specific publisher
     *
     * @var float
     */
    public $combinedStorageBandwidth = null;

    /**
     * Amount of transcoding usage in MB
     *
     * @var float
     */
    public $transcodingUsage = null;

    /**
     * TGhe date at which the report was taken - Unix Timestamp
     *
     * @var string
     */
    public $dateId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerUsageListResponse extends KalturaListResponse {
    /**
     *
     * @var KalturaVarPartnerUsageItem
     */
    public $total;

    /**
     *
     * @var array of KalturaVarPartnerUsageItem
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
class KalturaVarPartnerUsageTotalItem extends KalturaVarPartnerUsageItem {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVarConsoleService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Var Cosole Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Function which calulates partner usage of a group of a VAR's sub-publishers
     * @param KalturaPartnerFilter $partnerfilter - filter object.
     * @param KalturaReportInputFilter $usagefilter - pager object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaPartnerUsageListResponse
     */
    public function getPartnerUsage(KalturaPartnerFilter $partnerfilter = null, KalturaReportInputFilter $usagefilter = null,
                                    KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($partnerfilter !== null) {
            $this->client->addParam($kparams, "partnerFilter", $partnerfilter->toParams());
        }
        if ($usagefilter !== null) {
            $this->client->addParam($kparams, "usageFilter", $usagefilter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("varconsole_varconsole", "getPartnerUsage", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartnerUsageListResponse");
        return $resultobject;
    }

    /**
     * Function to change a sub-publisher's status
     * @param int $id - id of var console.
     * @param int $status - update status.
     */
    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("varconsole_varconsole", "updateStatus", $kparams);
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
class KalturaVarConsoleClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaVarConsoleService
     */
    public $varConsole = null;

    /**
     * Constructor of Kaltura Var Console Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->varConsole = new KalturaVarConsoleService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaVarConsoleClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaVarConsoleClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('varConsole' => $this->varConsole);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'varConsole';
    }
}
