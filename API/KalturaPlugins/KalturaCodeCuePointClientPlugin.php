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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCodeCuePointOrderBy
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
abstract class KalturaCodeCuePointBaseFilter extends KalturaCuePointFilter
{
    /**
     *
     *
     * @var string
     */
    public $codeLike = null;

    /**
     *
     *
     * @var string
     */
    public $codeMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $codeMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $codeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $codeIn = null;

    /**
     *
     *
     * @var string
     */
    public $descriptionLike = null;

    /**
     *
     *
     * @var string
     */
    public $descriptionMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $descriptionMultiLikeAnd = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCodeCuePointFilter extends KalturaCodeCuePointBaseFilter
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
class KalturaCodeCuePoint extends KalturaCuePoint
{
    /**
     *
     *
     * @var string
     */
    public $code = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCodeCuePointClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaCodeCuePointClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * @return KalturaCodeCuePointClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaCodeCuePointClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'codeCuePoint';
    }
}
