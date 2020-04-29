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
class KalturaSystemPartnerUsageItem extends KalturaObjectBase {
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
     * The change in storage consumption (new uploads) during the given date range (in MB)
     *
     * @var float
     */
    public $storage = null;

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
    public $combinedBandwidthStorage = null;

    /**
     * Amount of deleted storage in MB
     *
     * @var float
     */
    public $deletedStorage = null;

    /**
     * Amount of transcoding usage in MB
     *
     * @var float
     */
    public $transcodingUsage = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSystemPartnerUsageFilter extends KalturaFilter {
    /**
     * Date range from
     *
     * @var int
     */
    public $fromDate = null;

    /**
     * Date range to
     *
     * @var int
     */
    public $toDate = null;

    /**
     * Time zone offset
     *
     * @var int
     */
    public $timezoneOffset = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSystemPartnerUsageListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaSystemPartnerUsageItem
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
class KalturaSystemPartnerFilter extends KalturaPartnerFilter {
    /**
     *
     * @var int
     */
    public $partnerParentIdEqual = null;

    /**
     *
     * @var string
     */
    public $partnerParentIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSystemPartnerClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura System Partner Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaSystemPartnerClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaSystemPartnerClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'systemPartner';
    }
}
