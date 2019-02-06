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
require_once(dirname(__FILE__) . "/KalturaFileSyncClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTrackEntryEventType extends KalturaEnumBase {
    /** @var uploaded file */
    const UPLOADED_FILE = 1;
    /** @var webcam completed */
    const WEBCAM_COMPLETED = 2;
    /** @var import started */
    const IMPORT_STARTED = 3;
    /** @var add entry */
    const ADD_ENTRY = 4;
    /** @var update entry */
    const UPDATE_ENTRY = 5;
    /** @var deleted entry */
    const DELETED_ENTRY = 6;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfAdminOrderBy extends KalturaEnumBase {
    /** @var order of created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order of updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order of created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order of updated timestamp */
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
class KalturaTrackEntry extends KalturaObjectBase {
    /**
     * @var int
     */
    public $id = null;

    /**
     * @var KalturaTrackEntryEventType
     */
    public $trackEventType = null;

    /**
     * @var string
     */
    public $psVersion = null;

    /**
     * @var string
     */
    public $context = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var string
     */
    public $entryId = null;

    /**
     * @var string
     */
    public $hostName = null;

    /**
     * @var string
     */
    public $userId = null;

    /**
     * @var string
     */
    public $changedProperties = null;

    /**
     * @var string
     */
    public $paramStr1 = null;

    /**
     * @var string
     */
    public $paramStr2 = null;

    /**
     * @var string
     */
    public $paramStr3 = null;

    /**
     * @var string
     */
    public $ks = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var int
     */
    public $createdAt = null;

    /**
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var string
     */
    public $userIp = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfAdmin extends KalturaUiConf {
    /**
     * @var bool
     */
    public $isPublic = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTrackEntryListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaTrackEntry
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
class KalturaUiConfAdminListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaUiConfAdmin
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
abstract class KalturaUiConfAdminBaseFilter extends KalturaUiConfFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfAdminFilter extends KalturaUiConfAdminBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminConsoleClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Admin Console Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaAdminConsoleClientPlugin - instance of KalturaAdminConsoleClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaAdminConsoleClientPlugin($client);
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
        return 'adminConsole';
    }
}

