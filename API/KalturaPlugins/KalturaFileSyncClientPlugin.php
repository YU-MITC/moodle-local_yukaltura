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
class KalturaFileSyncStatus extends KalturaEnumBase {
    /** @var error */
    const ERROR = -1;
    /** @var pending */
    const PENDING = 1;
    /** @var ready */
    const READY = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var purged */
    const PURGED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncType extends KalturaEnumBase {
    /** @var file */
    const FILE = 1;
    /** @var link */
    const LINK = 2;
    /** @var url */
    const URL = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by file size */
    const FILE_SIZE_ASC = "+fileSize";
    /** @var order by ready */
    const READY_AT_ASC = "+readyAt";
    /** @var order by sync time */
    const SYNC_TIME_ASC = "+syncTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by version */
    const VERSION_ASC = "+version";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by file size */
    const FILE_SIZE_DESC = "-fileSize";
    /** @var order by ready */
    const READY_AT_DESC = "-readyAt";
    /** @var order by sync time */
    const SYNC_TIME_DESC = "-syncTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by version */
    const VERSION_DESC = "-version";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSync extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaFileSyncObjectType
     */
    public $fileObjectType = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var string
     */
    public $version = null;

    /**
     *
     * @var int
     */
    public $objectSubType = null;

    /**
     *
     * @var string
     */
    public $dc = null;

    /**
     *
     * @var int
     */
    public $original = null;

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
    public $readyAt = null;

    /**
     *
     * @var int
     */
    public $syncTime = null;

    /**
     *
     * @var KalturaFileSyncStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaFileSyncType
     */
    public $fileType = null;

    /**
     *
     * @var int
     */
    public $linkedId = null;

    /**
     *
     * @var int
     */
    public $linkCount = null;

    /**
     *
     * @var string
     */
    public $fileRoot = null;

    /**
     *
     * @var string
     */
    public $filePath = null;

    /**
     *
     * @var float
     */
    public $fileSize = null;

    /**
     *
     * @var string
     */
    public $fileUrl = null;

    /**
     *
     * @var string
     */
    public $fileContent = null;

    /**
     *
     * @var float
     */
    public $fileDiscSize = null;

    /**
     *
     * @var bool
     */
    public $isCurrentDc = null;

    /**
     *
     * @var bool
     */
    public $isDir = null;

    /**
     *
     * @var int
     */
    public $originalId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFileSync
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
abstract class KalturaFileSyncBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var KalturaFileSyncObjectType
     */
    public $fileObjectTypeEqual = null;

    /**
     *
     * @var string
     */
    public $fileObjectTypeIn = null;

    /**
     *
     * @var string
     */
    public $objectIdEqual = null;

    /**
     *
     * @var string
     */
    public $objectIdIn = null;

    /**
     *
     * @var string
     */
    public $versionEqual = null;

    /**
     *
     * @var string
     */
    public $versionIn = null;

    /**
     *
     * @var int
     */
    public $objectSubTypeEqual = null;

    /**
     *
     * @var string
     */
    public $objectSubTypeIn = null;

    /**
     *
     * @var string
     */
    public $dcEqual = null;

    /**
     *
     * @var string
     */
    public $dcIn = null;

    /**
     *
     * @var int
     */
    public $originalEqual = null;

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
    public $readyAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $readyAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $syncTimeGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $syncTimeLessThanOrEqual = null;

    /**
     *
     * @var KalturaFileSyncStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaFileSyncType
     */
    public $fileTypeEqual = null;

    /**
     *
     * @var string
     */
    public $fileTypeIn = null;

    /**
     *
     * @var int
     */
    public $linkedIdEqual = null;

    /**
     *
     * @var int
     */
    public $linkCountGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $linkCountLessThanOrEqual = null;

    /**
     *
     * @var float
     */
    public $fileSizeGreaterThanOrEqual = null;

    /**
     *
     * @var float
     */
    public $fileSizeLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncFilter extends KalturaFileSyncBaseFilter {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $currentDc = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura File Sync Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalutaClient.
     * @return KalturaFileSyncClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaFileSyncClientPlugin($client);
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
        return 'fileSync';
    }
}
