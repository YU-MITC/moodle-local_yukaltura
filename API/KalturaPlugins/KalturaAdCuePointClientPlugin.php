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
require_once(dirname(__FILE__) . "/KalturaCuePointClientPlugin.php");

/**
 * Kaltura Ad Cue Point OrderBy class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePointOrderBy
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

/**
 * Kaltura Ad Protocol Type class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdProtocolType
{
    const CUSTOM = "0";
    const VAST = "1";
    const VAST_2_0 = "2";
    const VPAID = "3";
}

/**
 * Kaltura Ad Type class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdType
{
    const VIDEO = "1";
    const OVERLAY = "2";
}

/**
 * Kaltura Ad Cue Point Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAdCuePointBaseFilter extends KalturaCuePointFilter
{
    /**
     *
     *
     * @var KalturaAdProtocolType
     */
    public $protocolTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $protocolTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $titleLike = null;

    /**
     *
     *
     * @var string
     */
    public $titleMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $titleMultiLikeAnd = null;

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

/**
 * Kaltura Ad Cue Point Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePointFilter extends KalturaAdCuePointBaseFilter
{

}

/**
 * Kaltura Ad Cue Point class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePoint extends KalturaCuePoint
{
    /**
     *
     *
     * @var KalturaAdProtocolType
     */
    public $protocolType = null;

    /**
     *
     *
     * @var string
     */
    public $sourceUrl = null;

    /**
     *
     *
     * @var KalturaAdType
     */
    public $adType = null;

    /**
     *
     *
     * @var string
     */
    public $title = null;

    /**
     *
     *
     * @var int
     */
    public $endTime = null;

    /**
     * Duration in milliseconds
     *
     * @var int
     */
    public $duration = null;

}

/**
 * Kaltura Ad Cue Point Client Plugin class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdCuePointClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaAdCuePointClientPlugin
     */
    protected static $instance;

    /**
     * Contructor.
     * @param KalturaClient $client - Kaltura Client object
     */
    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get the client plugin instance.
     * @param KalturaClient $client - Kaltura Client object.
     * @return KalturaAdCuePointClientPlugin - instance.
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaAdCuePointClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * Get services.
     * @return array - array of <KalturaServiceBase>
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * Return class name.
     * @return string - class name
     */
    public function getName() {
        return 'adCuePoint';
    }
}
