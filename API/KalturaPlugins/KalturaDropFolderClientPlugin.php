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
require_once(dirname(__FILE__) . "/KalturaMetadataClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderContentFileHandlerMatchPolicy extends KalturaEnumBase {
    /** @var add as new */
    const ADD_AS_NEW = 1;
    /** @var match existing or add as new */
    const MATCH_EXISTING_OR_ADD_AS_NEW = 2;
    /** @var match existing or keep in folder */
    const MATCH_EXISTING_OR_KEEP_IN_FOLDER = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileDeletePolicy extends KalturaEnumBase {
    /** @var manual delete */
    const MANUAL_DELETE = 1;
    /** @var auto delete */
    const AUTO_DELETE = 2;
    /** @var auto delete when entry is ready */
    const AUTO_DELETE_WHEN_ENTRY_IS_READY = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileStatus extends KalturaEnumBase {
    /** @var uploading */
    const UPLOADING = 1;
    /** @var pending */
    const PENDING = 2;
    /** @var waiting */
    const WAITING = 3;
    /** @var handled */
    const HANDLED = 4;
    /** @var ignore */
    const IGNORE = 5;
    /** @var deleted */
    const DELETED = 6;
    /** @var purged */
    const PURGED = 7;
    /** @var no match */
    const NO_MATCH = 8;
    /** @var error handling */
    const ERROR_HANDLING = 9;
    /** @var error deleting */
    const ERROR_DELETING = 10;
    /** @var downloading */
    const DOWNLOADING = 11;
    /** @var error downloading */
    const ERROR_DOWNLOADING = 12;
    /** @var processing */
    const PROCESSING = 13;
    /** @var parsed */
    const PARSED = 14;
    /** @var detectd */
    const DETECTED = 15;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 0;
    /** @var enabled */
    const ENABLED = 1;
    /** @var deleted */
    const DELETED = 2;
    /** @var error */
    const ERROR = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderErrorCode extends KalturaEnumBase {
    /** @var error connect */
    const ERROR_CONNECT = "1";
    /** @var error authenticate */
    const ERROR_AUTHENTICATE = "2";
    /** @var error get phisical file list */
    const ERROR_GET_PHISICAL_FILE_LIST = "3";
    /** @var error get db file list */
    const ERROR_GET_DB_FILE_LIST = "4";
    /** @var drop folder app error */
    const DROP_FOLDER_APP_ERROR = "5";
    /** @var content match policy undefined */
    const CONTENT_MATCH_POLICY_UNDEFINED = "6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileErrorCode extends KalturaEnumBase {
    /** @var error adding bulk upload */
    const ERROR_ADDING_BULK_UPLOAD = "dropFolderXmlBulkUpload.ERROR_ADDING_BULK_UPLOAD";
    /** @var error add content resource */
    const ERROR_ADD_CONTENT_RESOURCE = "dropFolderXmlBulkUpload.ERROR_ADD_CONTENT_RESOURCE";
    /** @var error in bulk upload */
    const ERROR_IN_BULK_UPLOAD = "dropFolderXmlBulkUpload.ERROR_IN_BULK_UPLOAD";
    /** @var error writing temp file */
    const ERROR_WRITING_TEMP_FILE = "dropFolderXmlBulkUpload.ERROR_WRITING_TEMP_FILE";
    /** @var local file wroing checksum */
    const LOCAL_FILE_WRONG_CHECKSUM = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_CHECKSUM";
    /** @var local file wrong size */
    const LOCAL_FILE_WRONG_SIZE = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_SIZE";
    /** @var malformd xml file */
    const MALFORMED_XML_FILE = "dropFolderXmlBulkUpload.MALFORMED_XML_FILE";
    /** @var xml file size exceed limit */
    const XML_FILE_SIZE_EXCEED_LIMIT = "dropFolderXmlBulkUpload.XML_FILE_SIZE_EXCEED_LIMIT";
    /** @var error update entry */
    const ERROR_UPDATE_ENTRY = "1";
    /** @var error add entry */
    const ERROR_ADD_ENTRY = "2";
    /** @var flavor not found */
    const FLAVOR_NOT_FOUND = "3";
    /** @var flavor missing in file name */
    const FLAVOR_MISSING_IN_FILE_NAME = "4";
    /** @var slug regex no match */
    const SLUG_REGEX_NO_MATCH = "5";
    /** @var error reading file */
    const ERROR_READING_FILE = "6";
    /** @var error downloading file */
    const ERROR_DOWNLOADING_FILE = "7";
    /** @var error update file */
    const ERROR_UPDATE_FILE = "8";
    /** @var error adding content processor */
    const ERROR_ADDING_CONTENT_PROCESSOR = "10";
    /** @var error in content processor */
    const ERROR_IN_CONTENT_PROCESSOR = "11";
    /** @var error deleting file */
    const ERROR_DELETING_FILE = "12";
    /** @var file no match */
    const FILE_NO_MATCH = "13";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileHandlerType extends KalturaEnumBase {
    /** @var xml */
    const XML = "dropFolderXmlBulkUpload.XML";
    /** @var ical */
    const ICAL = "scheduleDropFolder.ICAL";
    /** @var content */
    const CONTENT = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by file name */
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
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by file name */
    const FILE_NAME_DESC = "-fileName";
    /** @var order by file size */
    const FILE_SIZE_DESC = "-fileSize";
    /** @var order by file size */
    const FILE_SIZE_LAST_SET_AT_DESC = "-fileSizeLastSetAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by parsed flavor */
    const PARSED_FLAVOR_DESC = "-parsedFlavor";
    /** @var order by parsed slug */
    const PARSED_SLUG_DESC = "-parsedSlug";
    /** @var order by updated timestamp */
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
class KalturaDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timestamp */
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
class KalturaDropFolderType extends KalturaEnumBase {
    /** @var feed */
    const FEED = "FeedDropFolder.FEED";
    /** @var webex */
    const WEBEX = "WebexDropFolder.WEBEX";
    /** @var local */
    const LOCAL = "1";
    /** @var ftp */
    const FTP = "2";
    /** @var scp */
    const SCP = "3";
    /** @var sftp */
    const SFTP = "4";
    /** @var s3 */
    const S3 = "6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFtpDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timestamp */
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
class KalturaRemoteDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timestamp */
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
class KalturaScpDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timestamp */
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
class KalturaSftpDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timestamp */
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
class KalturaSshDropFolderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated timesatmp */
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
abstract class KalturaDropFolderFileHandlerConfig extends KalturaObjectBase {
    /**
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $handlerType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolder extends KalturaObjectBase {
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
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaDropFolderType
     */
    public $type = null;

    /**
     *
     * @var KalturaDropFolderStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     *
     * @var int
     */
    public $dc = null;

    /**
     *
     * @var string
     */
    public $path = null;

    /**
     * The ammount of time, in seconds,
     * that should pass so that a file with no change in size we'll be treated as "finished uploading to folder"
     *
     * @var int
     */
    public $fileSizeCheckInterval = null;

    /**
     *
     * @var KalturaDropFolderFileDeletePolicy
     */
    public $fileDeletePolicy = null;

    /**
     *
     * @var int
     */
    public $autoFileDeleteDays = null;

    /**
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $fileHandlerType = null;

    /**
     *
     * @var string
     */
    public $fileNamePatterns = null;

    /**
     *
     * @var KalturaDropFolderFileHandlerConfig
     */
    public $fileHandlerConfig;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var KalturaDropFolderErrorCode
     */
    public $errorCode = null;

    /**
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     * @var string
     */
    public $ignoreFileNamePatterns = null;

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
    public $lastAccessedAt = null;

    /**
     *
     * @var bool
     */
    public $incremental = null;

    /**
     *
     * @var int
     */
    public $lastFileTimestamp = null;

    /**
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     * @var string
     */
    public $categoriesMetadataFieldName = null;

    /**
     *
     * @var bool
     */
    public $enforceEntitlement = null;

    /**
     *
     * @var bool
     */
    public $shouldValidateKS = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFile extends KalturaObjectBase {
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
     * @var int
     */
    public $dropFolderId = null;

    /**
     *
     * @var string
     */
    public $fileName = null;

    /**
     *
     * @var float
     */
    public $fileSize = null;

    /**
     *
     * @var int
     */
    public $fileSizeLastSetAt = null;

    /**
     *
     * @var KalturaDropFolderFileStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaDropFolderType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $parsedSlug = null;

    /**
     *
     * @var string
     */
    public $parsedFlavor = null;

    /**
     *
     * @var string
     */
    public $parsedUserId = null;

    /**
     *
     * @var int
     */
    public $leadDropFolderFileId = null;

    /**
     *
     * @var int
     */
    public $deletedDropFolderFileId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var KalturaDropFolderFileErrorCode
     */
    public $errorCode = null;

    /**
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     * @var string
     */
    public $lastModificationTime = null;

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
    public $uploadStartDetectedAt = null;

    /**
     *
     * @var int
     */
    public $uploadEndDetectedAt = null;

    /**
     *
     * @var int
     */
    public $importStartedAt = null;

    /**
     *
     * @var int
     */
    public $importEndedAt = null;

    /**
     *
     * @var int
     */
    public $batchJobId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDropFolderBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     * @var string
     */
    public $nameLike = null;

    /**
     *
     * @var KalturaDropFolderType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var KalturaDropFolderStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var int
     */
    public $conversionProfileIdEqual = null;

    /**
     *
     * @var string
     */
    public $conversionProfileIdIn = null;

    /**
     *
     * @var int
     */
    public $dcEqual = null;

    /**
     *
     * @var string
     */
    public $dcIn = null;

    /**
     *
     * @var string
     */
    public $pathEqual = null;

    /**
     *
     * @var string
     */
    public $pathLike = null;

    /**
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $fileHandlerTypeEqual = null;

    /**
     *
     * @var string
     */
    public $fileHandlerTypeIn = null;

    /**
     *
     * @var string
     */
    public $fileNamePatternsLike = null;

    /**
     *
     * @var string
     */
    public $fileNamePatternsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $fileNamePatternsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $tagsLike = null;

    /**
     *
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

    /**
     *
     * @var KalturaDropFolderErrorCode
     */
    public $errorCodeEqual = null;

    /**
     *
     * @var string
     */
    public $errorCodeIn = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderContentFileHandlerConfig extends KalturaDropFolderFileHandlerConfig {
    /**
     *
     * @var KalturaDropFolderContentFileHandlerMatchPolicy
     */
    public $contentMatchPolicy = null;

    /**
     * Regular expression that defines valid file names to be handled.
     *      The following might be extracted from the file name and used if defined:
     *      - (?P<referenceId>\w+) - will be used as the drop folder file's parsed slug.
     *      - (?P<flavorName>\w+)  - will be used as the drop folder file's parsed flavor.
     *
     * @var string
     */
    public $slugRegex = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderContentProcessorJobData extends KalturaJobData {
    /**
     *
     * @var int
     */
    public $dropFolderId = null;

    /**
     *
     * @var string
     */
    public $dropFolderFileIds = null;

    /**
     *
     * @var string
     */
    public $parsedSlug = null;

    /**
     *
     * @var KalturaDropFolderContentFileHandlerMatchPolicy
     */
    public $contentMatchPolicy = null;

    /**
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     *
     * @var string
     */
    public $parsedUserId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDropFolderFileBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     * @var int
     */
    public $dropFolderIdEqual = null;

    /**
     *
     * @var string
     */
    public $dropFolderIdIn = null;

    /**
     *
     * @var string
     */
    public $fileNameEqual = null;

    /**
     *
     * @var string
     */
    public $fileNameIn = null;

    /**
     *
     * @var string
     */
    public $fileNameLike = null;

    /**
     *
     * @var KalturaDropFolderFileStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var string
     */
    public $statusNotIn = null;

    /**
     *
     * @var string
     */
    public $parsedSlugEqual = null;

    /**
     *
     * @var string
     */
    public $parsedSlugIn = null;

    /**
     *
     * @var string
     */
    public $parsedSlugLike = null;

    /**
     *
     * @var string
     */
    public $parsedFlavorEqual = null;

    /**
     *
     * @var string
     */
    public $parsedFlavorIn = null;

    /**
     *
     * @var string
     */
    public $parsedFlavorLike = null;

    /**
     *
     * @var int
     */
    public $leadDropFolderFileIdEqual = null;

    /**
     *
     * @var int
     */
    public $deletedDropFolderFileIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var KalturaDropFolderFileErrorCode
     */
    public $errorCodeEqual = null;

    /**
     *
     * @var string
     */
    public $errorCodeIn = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDropFolderFile
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
class KalturaDropFolderListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDropFolder
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
abstract class KalturaRemoteDropFolder extends KalturaDropFolder {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileFilter extends KalturaDropFolderFileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFilter extends KalturaDropFolderBaseFilter {
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFtpDropFolder extends KalturaRemoteDropFolder {
    /**
     *
     * @var string
     */
    public $host = null;

    /**
     *
     * @var int
     */
    public $port = null;

    /**
     *
     * @var string
     */
    public $username = null;

    /**
     *
     * @var string
     */
    public $password = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSshDropFolder extends KalturaRemoteDropFolder {
    /**
     *
     * @var string
     */
    public $host = null;

    /**
     *
     * @var int
     */
    public $port = null;

    /**
     *
     * @var string
     */
    public $username = null;

    /**
     *
     * @var string
     */
    public $password = null;

    /**
     *
     * @var string
     */
    public $privateKey = null;

    /**
     *
     * @var string
     */
    public $publicKey = null;

    /**
     *
     * @var string
     */
    public $passPhrase = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderImportJobData extends KalturaSshImportJobData {
    /**
     *
     * @var int
     */
    public $dropFolderFileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRemoteDropFolderBaseFilter extends KalturaDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScpDropFolder extends KalturaSshDropFolder {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSftpDropFolder extends KalturaSshDropFolder {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileResource extends KalturaGenericDataCenterContentResource {
    /**
     * Id of the drop folder file object
     *
     * @var int
     */
    public $dropFolderFileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemoteDropFolderFilter extends KalturaRemoteDropFolderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFtpDropFolderBaseFilter extends KalturaRemoteDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSshDropFolderBaseFilter extends KalturaRemoteDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFtpDropFolderFilter extends KalturaFtpDropFolderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSshDropFolderFilter extends KalturaSshDropFolderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScpDropFolderBaseFilter extends KalturaSshDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSftpDropFolderBaseFilter extends KalturaSshDropFolderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScpDropFolderFilter extends KalturaScpDropFolderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSftpDropFolderFilter extends KalturaSftpDropFolderBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Drop Folder Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new KalturaDropFolder object
     * @param KalturaDropFolder $dropfolder - object to add.
     * @return KalturaDropFolder - object after added.
     */
    public function add(KalturaDropFolder $dropfolder) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolder", $dropfolder->toParams());
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
    }

    /**
     * Mark the KalturaDropFolder object as deleted
     * @param int $dropfolderid - id of Drop Folder.
     * @return KalturaDropFolder - instance of KalturaDropFolder.
     */
    public function delete($dropfolderid) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderId", $dropfolderid);
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
    }

    /**
     * FreeExclusive KalturaDropFolder object
     * @param int $dropfolderid - id of drop folder.
     * @param string $errorcode - error code.
     * @param string $errordescription - error description.
     * @return KalturaDropFolder - instance of KalturaDropFolder.
     */
    public function freeExclusiveDropFolder($dropfolderid, $errorcode = null, $errordescription = null) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderId", $dropfolderid);
        $this->client->addParam($kparams, "errorCode", $errorcode);
        $this->client->addParam($kparams, "errorDescription", $errordescription);
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "freeExclusiveDropFolder", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaDropFolder object by ID
     * @param int $dropfolderid - id of drop filder.
     * @return KalturaDropFolder - instance of KalturaDropFolder.
     */
    public function get($dropfolderid) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderId", $dropfolderid);
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
    }

    /**
     * GetExclusive KalturaDropFolder object
     * @param string $tag - tag of drop folder.
     * @param int $maxtime - max time
     * @return KalturaDropFolder - instance of KalturaDropFolder.
     */
    public function getExclusiveDropFolder($tag, $maxtime) {
        $kparams = array();
        $this->client->addParam($kparams, "tag", $tag);
        $this->client->addParam($kparams, "maxTime", $maxtime);
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "getExclusiveDropFolder", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
    }

    /**
     * List KalturaDropFolder objects
     * @param KalturaDropFolderFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaDropFolderListResponse - list object.
     */
    public function listAction(KalturaDropFolderFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaDropFolder object
     * @param int $dropfolderid - id of drop folder.
     * @param KalturaDropFolder $dropfolder - object to update.
     * @return KalturaDropFolder - object after update.
     */
    public function update($dropfolderid, KalturaDropFolder $dropfolder) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderId", $dropfolderid);
        $this->client->addParam($kparams, "dropFolder", $dropfolder->toParams());
        $this->client->queueServiceActionCall("dropfolder_dropfolder", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolder");
        return $resultobject;
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
class KalturaDropFolderFileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Drop Folder File Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new KalturaDropFolderFile object
     * @param KalturaDropFolderFile $dropfolderfile - instance of KalturaDropFolderFile.
     * @return KalturaDropFolderFile - instance of KalturaDropFolderFile.
     */
    public function add(KalturaDropFolderFile $dropfolderfile) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFile", $dropfolderfile->toParams());
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
    }

    /**
     * Mark the KalturaDropFolderFile object as deleted
     * @param int $dropfolderfileid - id of drop folder file.
     * @return KalturaDropFolderFile - object after deleted.
     */
    public function delete($dropfolderfileid) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFileId", $dropfolderfileid);
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaDropFolderFile object by ID
     * @param int $dropfolderfileid - id of drop folder file,
     * @return KalturaDropFolderFile - object.
     */
    public function get($dropfolderfileid) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFileId", $dropfolderfileid);
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
    }

    /**
     * Set the KalturaDropFolderFile status to ignore (KalturaDropFolderFileStatus::IGNORE)
     * @param int $dropfolderfileid - id of drop folder file.
     * @return KalturaDropFolderFile - object.
     */
    public function ignore($dropfolderfileid) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFileId", $dropfolderfileid);
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "ignore", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
    }

    /**
     * List KalturaDropFolderFile objects
     * @param KalturaDropFolderFileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaDropFolderFileListResponse - list object.
     */
    public function listAction(KalturaDropFolderFileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFileListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaDropFolderFile object
     * @param int $dropfolderfileid - id of drop folder file.
     * @param KalturaDropFolderFile $dropfolderfile - object to update.
     * @return KalturaDropFolderFile - object after update.
     */
    public function update($dropfolderfileid, KalturaDropFolderFile $dropfolderfile) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFileId", $dropfolderfileid);
        $this->client->addParam($kparams, "dropFolderFile", $dropfolderfile->toParams());
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
    }

    /**
     * Update status of KalturaDropFolderFile
     * @param int $dropfolderfileid - id of kaltura drop folder file.
     * @param int $status - update status.
     * @return KalturaDropFolderFile - object after updated.
     */
    public function updateStatus($dropfolderfileid, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "dropFolderFileId", $dropfolderfileid);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("dropfolder_dropfolderfile", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDropFolderFile");
        return $resultobject;
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
class KalturaDropFolderClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaDropFolderService
     */
    public $dropFolder = null;

    /**
     * @var KalturaDropFolderFileService
     */
    public $dropFolderFile = null;

    /**
     * Constructor of Kaltura Drop Folder Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->dropFolder = new KalturaDropFolderService($client);
        $this->dropFolderFile = new KalturaDropFolderFileService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaDropFolderClientPlugin - instance of KalturaDropFolderClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaDropFolderClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'dropFolder' => $this->dropFolder,
            'dropFolderFile' => $this->dropFolderFile,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'dropFolder';
    }
}
