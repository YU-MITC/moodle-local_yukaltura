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
class KalturaFileSyncOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const READY_AT_ASC = "+readyAt";
    const READY_AT_DESC = "-readyAt";
    const SYNC_TIME_ASC = "+syncTime";
    const SYNC_TIME_DESC = "-syncTime";
    const FILE_SIZE_ASC = "+fileSize";
    const FILE_SIZE_DESC = "-fileSize";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncStatus
{
    const ERROR = -1;
    const PENDING = 1;
    const READY = 2;
    const DELETED = 3;
    const PURGED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncType
{
    const FILE = 1;
    const LINK = 2;
    const URL = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFileSyncBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     *
     * @var KalturaFileSyncObjectType
     */
    public $fileObjectTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fileObjectTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $objectIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $objectIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $versionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $versionIn = null;

    /**
     *
     *
     * @var int
     */
    public $objectSubTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $objectSubTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $dcEqual = null;

    /**
     *
     *
     * @var string
     */
    public $dcIn = null;

    /**
     *
     *
     * @var int
     */
    public $originalEqual = null;

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
     * @var int
     */
    public $readyAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $readyAtLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $syncTimeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $syncTimeLessThanOrEqual = null;

    /**
     *
     *
     * @var KalturaFileSyncStatus
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
     * @var KalturaFileSyncType
     */
    public $fileTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fileTypeIn = null;

    /**
     *
     *
     * @var int
     */
    public $linkedIdEqual = null;

    /**
     *
     *
     * @var int
     */
    public $linkCountGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $linkCountLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $fileSizeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $fileSizeLessThanOrEqual = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncFilter extends KalturaFileSyncBaseFilter
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
class KalturaFileSyncClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaFileSyncClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * @return KalturaFileSyncClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaFileSyncClientPlugin($client);
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
        return 'fileSync';
    }
}
