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
class KalturaDropFolderContentFileHandlerMatchPolicy
{
    const ADD_AS_NEW = 1;
    const MATCH_EXISTING_OR_ADD_AS_NEW = 2;
    const MATCH_EXISTING_OR_KEEP_IN_FOLDER = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileDeletePolicy
{
    const MANUAL_DELETE = 1;
    const AUTO_DELETE = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileErrorCode
{
    const ERROR_UPDATE_ENTRY = "1";
    const ERROR_ADD_ENTRY = "2";
    const FLAVOR_NOT_FOUND = "3";
    const FLAVOR_MISSING_IN_FILE_NAME = "4";
    const SLUG_REGEX_NO_MATCH = "5";
    const ERROR_READING_FILE = "6";
    const ERROR_DOWNLOADING_FILE = "7";
    const LOCAL_FILE_WRONG_SIZE = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_SIZE";
    const LOCAL_FILE_WRONG_CHECKSUM = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_CHECKSUM";
    const ERROR_WRITING_TEMP_FILE = "dropFolderXmlBulkUpload.ERROR_WRITING_TEMP_FILE";
    const ERROR_ADDING_BULK_UPLOAD = "dropFolderXmlBulkUpload.ERROR_ADDING_BULK_UPLOAD";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileHandlerType
{
    const CONTENT = "1";
    const XML = "dropFolderXmlBulkUpload.XML";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const FILE_NAME_ASC = "+fileName";
    const FILE_NAME_DESC = "-fileName";
    const FILE_SIZE_ASC = "+fileSize";
    const FILE_SIZE_DESC = "-fileSize";
    const FILE_SIZE_LAST_SET_AT_ASC = "+fileSizeLastSetAt";
    const FILE_SIZE_LAST_SET_AT_DESC = "-fileSizeLastSetAt";
    const PARSED_SLUG_ASC = "+parsedSlug";
    const PARSED_SLUG_DESC = "-parsedSlug";
    const PARSED_FLAVOR_ASC = "+parsedFlavor";
    const PARSED_FLAVOR_DESC = "-parsedFlavor";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileStatus
{
    const UPLOADING = 1;
    const PENDING = 2;
    const WAITING = 3;
    const HANDLED = 4;
    const IGNORE = 5;
    const DELETED = 6;
    const PURGED = 7;
    const NO_MATCH = 8;
    const ERROR_HANDLING = 9;
    const ERROR_DELETING = 10;
    const DOWNLOADING = 11;
    const ERROR_DOWNLOADING = 12;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderStatus
{
    const DISABLED = 0;
    const ENABLED = 1;
    const DELETED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderType
{
    const LOCAL = "1";
    const FTP = "2";
    const SCP = "3";
    const SFTP = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFtpDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemoteDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScpDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSftpDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSshDropFolderOrderBy
{
    const ID_ASC = "+id";
    const ID_DESC = "-id";
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDropFolderFileHandlerConfig extends KalturaObjectBase
{
    /**
     *
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $handlerType = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolder extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $name = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var KalturaDropFolderType
     */
    public $type = null;

    /**
     *
     *
     * @var KalturaDropFolderStatus
     */
    public $status = null;

    /**
     *
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     *
     *
     * @var int
     */
    public $dc = null;

    /**
     *
     *
     * @var string
     */
    public $path = null;

    /**
     * The ammount of time, in seconds, that should pass so that a file with no change in size we'll be treated as "finished uploading to folder"
     *
     * @var int
     */
    public $fileSizeCheckInterval = null;

    /**
     *
     *
     * @var KalturaDropFolderFileDeletePolicy
     */
    public $fileDeletePolicy = null;

    /**
     *
     *
     * @var int
     */
    public $autoFileDeleteDays = null;

    /**
     *
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $fileHandlerType = null;

    /**
     *
     *
     * @var string
     */
    public $fileNamePatterns = null;

    /**
     *
     *
     * @var KalturaDropFolderFileHandlerConfig
     */
    public $fileHandlerConfig;

    /**
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     *
     * @var string
     */
    public $ignoreFileNamePatterns = null;

    /**
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAt = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDropFolderBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $nameLike = null;

    /**
     *
     *
     * @var KalturaDropFolderType
     */
    public $typeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     *
     * @var KalturaDropFolderStatus
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
     * @var int
     */
    public $conversionProfileIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $conversionProfileIdIn = null;

    /**
     *
     *
     * @var int
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
     * @var string
     */
    public $pathLike = null;

    /**
     *
     *
     * @var KalturaDropFolderFileHandlerType
     */
    public $fileHandlerTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fileHandlerTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $fileNamePatternsLike = null;

    /**
     *
     *
     * @var string
     */
    public $fileNamePatternsMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $fileNamePatternsMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $tagsLike = null;

    /**
     *
     *
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

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

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFilter extends KalturaDropFolderBaseFilter
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
class KalturaDropFolderListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDropFolder
     */
    public $objects;

    /**
     *
     *
     * @var int
     */
    public $totalCount = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFile extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var int
     */
    public $dropFolderId = null;

    /**
     *
     *
     * @var string
     */
    public $fileName = null;

    /**
     *
     *
     * @var int
     */
    public $fileSize = null;

    /**
     *
     *
     * @var int
     */
    public $fileSizeLastSetAt = null;

    /**
     *
     *
     * @var KalturaDropFolderFileStatus
     */
    public $status = null;

    /**
     *
     *
     * @var string
     */
    public $parsedSlug = null;

    /**
     *
     *
     * @var string
     */
    public $parsedFlavor = null;

    /**
     *
     *
     * @var KalturaDropFolderFileErrorCode
     */
    public $errorCode = null;

    /**
     *
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     *
     * @var string
     */
    public $lastModificationTime = null;

    /**
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAt = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDropFolderFileBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $dropFolderIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $dropFolderIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $fileNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fileNameIn = null;

    /**
     *
     *
     * @var string
     */
    public $fileNameLike = null;

    /**
     *
     *
     * @var KalturaDropFolderFileStatus
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
     * @var string
     */
    public $parsedSlugEqual = null;

    /**
     *
     *
     * @var string
     */
    public $parsedSlugIn = null;

    /**
     *
     *
     * @var string
     */
    public $parsedSlugLike = null;

    /**
     *
     *
     * @var string
     */
    public $parsedFlavorEqual = null;

    /**
     *
     *
     * @var string
     */
    public $parsedFlavorIn = null;

    /**
     *
     *
     * @var string
     */
    public $parsedFlavorLike = null;

    /**
     *
     *
     * @var KalturaDropFolderFileErrorCode
     */
    public $errorCodeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $errorCodeIn = null;

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

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileFilter extends KalturaDropFolderFileBaseFilter
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
class KalturaDropFolderFileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDropFolderFile
     */
    public $objects;

    /**
     *
     *
     * @var int
     */
    public $totalCount = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRemoteDropFolderBaseFilter extends KalturaDropFolderFilter
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
class KalturaRemoteDropFolderFilter extends KalturaRemoteDropFolderBaseFilter
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
abstract class KalturaFtpDropFolderBaseFilter extends KalturaRemoteDropFolderFilter
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
abstract class KalturaSshDropFolderBaseFilter extends KalturaRemoteDropFolderFilter
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
class KalturaSshDropFolderFilter extends KalturaSshDropFolderBaseFilter
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
abstract class KalturaScpDropFolderBaseFilter extends KalturaSshDropFolderFilter
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
abstract class KalturaSftpDropFolderBaseFilter extends KalturaSshDropFolderFilter
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
class KalturaFtpDropFolderFilter extends KalturaFtpDropFolderBaseFilter
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
class KalturaScpDropFolderFilter extends KalturaScpDropFolderBaseFilter
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
class KalturaSftpDropFolderFilter extends KalturaSftpDropFolderBaseFilter
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
class KalturaDropFolderFileResource extends KalturaDataCenterContentResource
{
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
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderContentFileHandlerConfig extends KalturaDropFolderFileHandlerConfig
{
    /**
     *
     *
     * @var KalturaDropFolderContentFileHandlerMatchPolicy
     */
    public $contentMatchPolicy = null;

    /**
     * Regular expression that defines valid file names to be handled.
     * The following might be extracted from the file name and used if defined:
     * - (?P<referenceId>\w+) - will be used as the drop folder file's parsed slug.
     * - (?P<flavorName>\w+)  - will be used as the drop folder file's parsed flavor.
     *
     *
     * @var string
     */
    public $slugRegex = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRemoteDropFolder extends KalturaDropFolder
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
class KalturaFtpDropFolder extends KalturaRemoteDropFolder
{
    /**
     *
     *
     * @var string
     */
    public $host = null;

    /**
     *
     *
     * @var int
     */
    public $port = null;

    /**
     *
     *
     * @var string
     */
    public $username = null;

    /**
     *
     *
     * @var string
     */
    public $password = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSshDropFolder extends KalturaRemoteDropFolder
{
    /**
     *
     *
     * @var string
     */
    public $host = null;

    /**
     *
     *
     * @var int
     */
    public $port = null;

    /**
     *
     *
     * @var string
     */
    public $username = null;

    /**
     *
     *
     * @var string
     */
    public $password = null;

    /**
     *
     *
     * @var string
     */
    public $privateKey = null;

    /**
     *
     *
     * @var string
     */
    public $publicKey = null;

    /**
     *
     *
     * @var string
     */
    public $passPhrase = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScpDropFolder extends KalturaSshDropFolder
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
class KalturaSftpDropFolder extends KalturaSshDropFolder
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
class KalturaDropFolderService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderFileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDropFolderClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaDropFolderClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaDropFolderService
     */
    public $dropFolder = null;

    /**
     * @var KalturaDropFolderFileService
     */
    public $dropFolderFile = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->dropFolder = new KalturaDropFolderService($client);
        $this->dropFolderFile = new KalturaDropFolderFileService($client);
    }

    /**
     * @return KalturaDropFolderClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaDropFolderClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'dropFolder' => $this->dropFolder,
            'dropFolderFile' => $this->dropFolderFile,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dropFolder';
    }
}
