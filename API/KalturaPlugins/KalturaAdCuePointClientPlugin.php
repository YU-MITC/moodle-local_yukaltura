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
class KalturaAdCuePointOrderBy extends KalturaEnumBase {
    /** @var order of created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order of time duration */
    const DURATION_ASC = "+duration";
    /** @var order of end time */
    const END_TIME_ASC = "+endTime";
    /** @var order of partner id */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order of start time */
    const START_TIME_ASC = "+startTime";
    /** @var order of triggered */
    const TRIGGERED_AT_ASC = "+triggeredAt";
    /** @var order of updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order of created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order of created timestamp */
    const DURATION_DESC = "-duration";
    /** @var order of time duration */
    const END_TIME_DESC = "-endTime";
    /** @var order of partner id */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order of start time */
    const START_TIME_DESC = "-startTime";
    /** @var order of triggered */
    const TRIGGERED_AT_DESC = "-triggeredAt";
    /** @var order of updated timestamp */
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
class KalturaAdProtocolType extends KalturaEnumBase {
    /** @var custom protocol */
    const CUSTOM = "0";
    /** @var vast version 1 */
    const VAST = "1";
    /** @var vast version 2 */
    const VAST_2_0 = "2";
    /** @var vpaid */
    const VPAID = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdType extends KalturaEnumBase {
    /** @var video */
    const VIDEO = "1";
    /** @var overlay */
    const OVERLAY = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePoint extends KalturaCuePoint {
    /**
     * @var KalturaAdProtocolType
     */
    public $protocolType = null;

    /**
     * @var string
     */
    public $sourceUrl = null;

    /**
     * @var KalturaAdType
     */
    public $adType = null;

    /**
     * @var string
     */
    public $title = null;

    /**
     * @var int
     */
    public $endTime = null;

    /**
     * Duration in milliseconds
     * @var int
     */
    public $duration = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAdCuePointBaseFilter extends KalturaCuePointFilter {
    /**
     * @var KalturaAdProtocolType
     */
    public $protocolTypeEqual = null;

    /**
     * @var string
     */
    public $protocolTypeIn = null;

    /**
     * @var string
     */
    public $titleLike = null;

    /**
     * @var string
     */
    public $titleMultiLikeOr = null;

    /**
     * @var string
     */
    public $titleMultiLikeAnd = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePointFilter extends KalturaAdCuePointBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePointClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura AdCue Point Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of Kaltura Client.
     * @return KalturaAdCuePointClientPlugin - instance of KalturaAdCuePointClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaAdCuePointClientPlugin($client);
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
        return 'adCuePoint';
    }
}
