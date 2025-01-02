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
 * @copyright (C) 2018-2025 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


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
 * @copyright (C) 2018-2025 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeedItemInfo extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $itemXPath = null;

    /**
     *
     * @var string
     */
    public $itemPublishDateXPath = null;

    /**
     *
     * @var string
     */
    public $itemUniqueIdentifierXPath = null;

    /**
     *
     * @var string
     */
    public $itemContentFileSizeXPath = null;

    /**
     *
     * @var string
     */
    public $itemContentUrlXPath = null;

    /**
     *
     * @var string
     */
    public $itemContentBitrateXPath = null;

    /**
     *
     * @var string
     */
    public $itemHashXPath = null;

    /**
     *
     * @var string
     */
    public $itemContentXpath = null;

    /**
     *
     * @var string
     */
    public $contentBitrateAttributeName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2025 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeedDropFolder extends KalturaDropFolder {
    /**
     *
     * @var int
     */
    public $itemHandlingLimit = null;

    /**
     *
     * @var KalturaFeedItemInfo
     */
    public $feedItemInfo;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2025 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeedDropFolderFile extends KalturaDropFolderFile {
    /**
     * MD5 or Sha1 encrypted string
     *
     * @var string
     */
    public $hash = null;

    /**
     * Path of the original Feed content XML
     *
     * @var string
     */
    public $feedXmlPath = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2025 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeedDropFolderClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Drop Folder Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instalce of KalturaClient.
     * @return KalturaFeedDropFolderClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaFeedDropFolderClientPlugin($client);
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
        return 'FeedDropFolder';
    }
}
