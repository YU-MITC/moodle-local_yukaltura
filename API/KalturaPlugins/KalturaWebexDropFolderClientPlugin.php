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
require_once(dirname(__FILE__) . "/KalturaDropFolderClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderFileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by filename */
    const FILE_NAME_ASC = "+fileName";
    /** @var order by file size */
    const FILE_SIZE_ASC = "+fileSize";
    /** @var order by file size */
    const FILE_SIZE_LAST_SET_AT_ASC = "+fileSizeLastSetAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by parsed flavor */
    const PARSED_FLAVOR_ASC = "+parsedFlavor";
    /** @var order by parsed slug */
    const PARSED_SLUG_ASC = "+parsedSlug";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by filename */
    const FILE_NAME_DESC = "-fileName";
    /** @var order by file size */
    const FILE_SIZE_DESC = "-fileSize";
    /** @var order by file size */
    const FILE_SIZE_LAST_SET_AT_DESC = "-fileSizeLastSetAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by parsed flavor */
    const PARSED_FLAVOR_DESC = "-parsedFlavor";
    /** @var order by slug */
    const PARSED_SLUG_DESC = "-parsedSlug";
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
class KalturaWebexDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by update */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
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
class KalturaWebexDropFolder extends KalturaDropFolder {
    /**
     *
     * @var string
     */
    public $webexUserId = null;

    /**
     *
     * @var string
     */
    public $webexPassword = null;

    /**
     *
     * @var int
     */
    public $webexSiteId = null;

    /**
     *
     * @var string
     */
    public $webexPartnerId = null;

    /**
     *
     * @var string
     */
    public $webexServiceUrl = null;

    /**
     *
     * @var string
     */
    public $webexHostIdMetadataFieldName = null;

    /**
     *
     * @var bool
     */
    public $deleteFromRecycleBin = null;

    /**
     *
     * @var string
     */
    public $webexServiceType = null;

    /**
     *
     * @var int
     */
    public $deleteFromTimestamp = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderFile extends KalturaDropFolderFile {
    /**
     *
     * @var int
     */
    public $recordingId = null;

    /**
     *
     * @var string
     */
    public $webexHostId = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $confId = null;

    /**
     *
     * @var string
     */
    public $contentUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderContentProcessorJobData extends KalturaDropFolderContentProcessorJobData {
    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $webexHostId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaWebexDropFolderBaseFilter extends KalturaDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaWebexDropFolderFileBaseFilter extends KalturaDropFolderFileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderFileFilter extends KalturaWebexDropFolderFileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderFilter extends KalturaWebexDropFolderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebexDropFolderClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Webex Drop Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaWebexDropFolderClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaWebexDropFolderClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'WebexDropFolder';
    }
}

