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
require_once(dirname(__FILE__) . "/KalturaMetadataClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConfigurableDistributionProfileOrderBy
{
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
class KalturaDistributionAction
{
    const SUBMIT = 1;
    const UPDATE = 2;
    const DELETE = 3;
    const FETCH_REPORT = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionErrorType
{
    const MISSING_FLAVOR = 1;
    const MISSING_THUMBNAIL = 2;
    const MISSING_METADATA = 3;
    const INVALID_DATA = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionFieldRequiredStatus
{
    const NOT_REQUIRED = 0;
    const REQUIRED_BY_PROVIDER = 1;
    const REQUIRED_BY_PARTNER = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileActionStatus
{
    const DISABLED = 1;
    const AUTOMATIC = 2;
    const MANUAL = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileOrderBy
{
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
class KalturaDistributionProfileStatus
{
    const DISABLED = 1;
    const ENABLED = 2;
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProtocol
{
    const FTP = 1;
    const SCP = 2;
    const SFTP = 3;
    const HTTP = 4;
    const HTTPS = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderOrderBy
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
class KalturaDistributionProviderType
{
    const GENERIC = "1";
    const SYNDICATION = "2";
    const YOUTUBE = "youTubeDistribution.YOUTUBE";
    const YOUTUBE_API = "youtubeApiDistribution.YOUTUBE_API";
    const DAILYMOTION = "dailymotionDistribution.DAILYMOTION";
    const PODCAST = "podcastDistribution.PODCAST";
    const TVCOM = "tvComDistribution.TVCOM";
    const FREEWHEEL = "freewheelDistribution.FREEWHEEL";
    const FREEWHEEL_GENERIC = "freewheelGenericDistribution.FREEWHEEL_GENERIC";
    const HULU = "huluDistribution.HULU";
    const DOUBLECLICK = "doubleClickDistribution.DOUBLECLICK";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorType
{
    const CUSTOM_ERROR = 0;
    const STRING_EMPTY = 1;
    const STRING_TOO_LONG = 2;
    const STRING_TOO_SHORT = 3;
    const INVALID_FORMAT = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionFlag
{
    const NONE = 0;
    const SUBMIT_REQUIRED = 1;
    const DELETE_REQUIRED = 2;
    const UPDATE_REQUIRED = 3;
    const ENABLE_REQUIRED = 4;
    const DISABLE_REQUIRED = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const SUBMITTED_AT_ASC = "+submittedAt";
    const SUBMITTED_AT_DESC = "-submittedAt";
    const SUNRISE_ASC = "+sunrise";
    const SUNRISE_DESC = "-sunrise";
    const SUNSET_ASC = "+sunset";
    const SUNSET_DESC = "-sunset";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionStatus
{
    const PENDING = 0;
    const QUEUED = 1;
    const READY = 2;
    const DELETED = 3;
    const SUBMITTING = 4;
    const UPDATING = 5;
    const DELETING = 6;
    const ERROR_SUBMITTING = 7;
    const ERROR_UPDATING = 8;
    const ERROR_DELETING = 9;
    const REMOVED = 10;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionSunStatus
{
    const BEFORE_SUNRISE = 1;
    const AFTER_SUNRISE = 2;
    const AFTER_SUNSET = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfileOrderBy
{
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
class KalturaGenericDistributionProviderActionOrderBy
{
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
class KalturaGenericDistributionProviderOrderBy
{
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
class KalturaGenericDistributionProviderParser
{
    const XSL = 1;
    const XPATH = 2;
    const REGEX = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderStatus
{
    const ACTIVE = 2;
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationDistributionProfileOrderBy
{
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
class KalturaSyndicationDistributionProviderOrderBy
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
class KalturaDistributionThumbDimensions extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $width = null;

    /**
     *
     *
     * @var int
     */
    public $height = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionProfile extends KalturaObjectBase
{
    /**
     * Auto generated unique id
     *
     *
     * @var int
     */
    public $id = null;

    /**
     * Profile creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Profile last update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var KalturaDistributionProviderType
     */
    public $providerType = null;

    /**
     *
     *
     * @var string
     */
    public $name = null;

    /**
     *
     *
     * @var KalturaDistributionProfileStatus
     */
    public $status = null;

    /**
     *
     *
     * @var KalturaDistributionProfileActionStatus
     */
    public $submitEnabled = null;

    /**
     *
     *
     * @var KalturaDistributionProfileActionStatus
     */
    public $updateEnabled = null;

    /**
     *
     *
     * @var KalturaDistributionProfileActionStatus
     */
    public $deleteEnabled = null;

    /**
     *
     *
     * @var KalturaDistributionProfileActionStatus
     */
    public $reportEnabled = null;

    /**
     * Comma separated flavor params ids that should be auto converted
     *
     * @var string
     */
    public $autoCreateFlavors = null;

    /**
     * Comma separated thumbnail params ids that should be auto generated
     *
     * @var string
     */
    public $autoCreateThumb = null;

    /**
     * Comma separated flavor params ids that should be submitted if ready
     *
     * @var string
     */
    public $optionalFlavorParamsIds = null;

    /**
     * Comma separated flavor params ids that required to be readt before submission
     *
     * @var string
     */
    public $requiredFlavorParamsIds = null;

    /**
     * Thumbnail dimensions that should be submitted if ready
     *
     * @var array of KalturaDistributionThumbDimensions
     */
    public $optionalThumbDimensions;

    /**
     * Thumbnail dimensions that required to be readt before submission
     *
     * @var array of KalturaDistributionThumbDimensions
     */
    public $requiredThumbDimensions;

    /**
     * If entry distribution sunrise not specified that will be the default since entry creation time, in seconds
     *
     * @var int
     */
    public $sunriseDefaultOffset = null;

    /**
     * If entry distribution sunset not specified that will be the default since entry creation time, in seconds
     *
     * @var int
     */
    public $sunsetDefaultOffset = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionProfileBaseFilter extends KalturaFilter
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
     * @var KalturaDistributionProfileStatus
     */
    public $statusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $statusIn = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileFilter extends KalturaDistributionProfileBaseFilter
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
class KalturaDistributionProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDistributionProfile
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
abstract class KalturaDistributionValidationError extends KalturaObjectBase
{
    /**
     *
     *
     * @var KalturaDistributionAction
     */
    public $action = null;

    /**
     *
     *
     * @var KalturaDistributionErrorType
     */
    public $errorType = null;

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
class KalturaEntryDistribution extends KalturaObjectBase
{
    /**
     * Auto generated unique id
     *
     *
     * @var int
     */
    public $id = null;

    /**
     * Entry distribution creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Entry distribution last update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Entry distribution submission date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $submittedAt = null;

    /**
     *
     *
     * @var string
     */
    public $entryId = null;

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
    public $distributionProfileId = null;

    /**
     *
     *
     * @var KalturaEntryDistributionStatus
     */
    public $status = null;

    /**
     *
     *
     * @var KalturaEntryDistributionSunStatus
     */
    public $sunStatus = null;

    /**
     *
     *
     * @var KalturaEntryDistributionFlag
     */
    public $dirtyStatus = null;

    /**
     * Comma separated thumbnail asset ids
     *
     * @var string
     */
    public $thumbAssetIds = null;

    /**
     * Comma separated flavor asset ids
     *
     * @var string
     */
    public $flavorAssetIds = null;

    /**
     * Entry distribution publish time as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $sunrise = null;

    /**
     * Entry distribution un-publish time as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $sunset = null;

    /**
     * The id as returned from the distributed destination
     *
     * @var string
     */
    public $remoteId = null;

    /**
     * The plays as retrieved from the remote destination reports
     *
     * @var int
     */
    public $plays = null;

    /**
     * The views as retrieved from the remote destination reports
     *
     * @var int
     */
    public $views = null;

    /**
     *
     *
     * @var array of KalturaDistributionValidationError
     */
    public $validationErrors;

    /**
     *
     *
     * @var KalturaBatchJobErrorTypes
     */
    public $errorType = null;

    /**
     *
     *
     * @var int
     */
    public $errorNumber = null;

    /**
     *
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasSubmitResultsLog = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasSubmitSentDataLog = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasUpdateResultsLog = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasUpdateSentDataLog = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasDeleteResultsLog = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $hasDeleteSentDataLog = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryDistributionBaseFilter extends KalturaFilter
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
    public $submittedAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $submittedAtLessThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $entryIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $distributionProfileIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $distributionProfileIdIn = null;

    /**
     *
     *
     * @var KalturaEntryDistributionStatus
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
     * @var KalturaEntryDistributionFlag
     */
    public $dirtyStatusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $dirtyStatusIn = null;

    /**
     *
     *
     * @var int
     */
    public $sunriseGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $sunriseLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $sunsetGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $sunsetLessThanOrEqual = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionFilter extends KalturaEntryDistributionBaseFilter
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
class KalturaEntryDistributionListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaEntryDistribution
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
abstract class KalturaDistributionProviderBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var KalturaDistributionProviderType
     */
    public $typeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $typeIn = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderFilter extends KalturaDistributionProviderBaseFilter
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
abstract class KalturaDistributionProvider extends KalturaObjectBase
{
    /**
     *
     *
     * @var KalturaDistributionProviderType
     */
    public $type = null;

    /**
     *
     *
     * @var string
     */
    public $name = null;

    /**
     *
     *
     * @var bool
     */
    public $scheduleUpdateEnabled = null;

    /**
     *
     *
     * @var bool
     */
    public $availabilityUpdateEnabled = null;

    /**
     *
     *
     * @var bool
     */
    public $deleteInsteadUpdate = null;

    /**
     *
     *
     * @var int
     */
    public $intervalBeforeSunrise = null;

    /**
     *
     *
     * @var int
     */
    public $intervalBeforeSunset = null;

    /**
     *
     *
     * @var string
     */
    public $updateRequiredEntryFields = null;

    /**
     *
     *
     * @var string
     */
    public $updateRequiredMetadataXPaths = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDistributionProvider
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
class KalturaGenericDistributionProvider extends KalturaDistributionProvider
{
    /**
     * Auto generated
     *
     *
     * @var int
     */
    public $id = null;

    /**
     * Generic distribution provider creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Generic distribution provider last update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var bool
     */
    public $isDefault = null;

    /**
     *
     *
     * @var KalturaGenericDistributionProviderStatus
     */
    public $status = null;

    /**
     *
     *
     * @var string
     */
    public $optionalFlavorParamsIds = null;

    /**
     *
     *
     * @var string
     */
    public $requiredFlavorParamsIds = null;

    /**
     *
     *
     * @var array of KalturaDistributionThumbDimensions
     */
    public $optionalThumbDimensions;

    /**
     *
     *
     * @var array of KalturaDistributionThumbDimensions
     */
    public $requiredThumbDimensions;

    /**
     *
     *
     * @var string
     */
    public $editableFields = null;

    /**
     *
     *
     * @var string
     */
    public $mandatoryFields = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
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
     * @var bool
     */
    public $isDefaultEqual = null;

    /**
     *
     *
     * @var string
     */
    public $isDefaultIn = null;

    /**
     *
     *
     * @var KalturaGenericDistributionProviderStatus
     */
    public $statusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $statusIn = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderFilter extends KalturaGenericDistributionProviderBaseFilter
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
class KalturaGenericDistributionProviderListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaGenericDistributionProvider
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
class KalturaGenericDistributionProviderAction extends KalturaObjectBase
{
    /**
     * Auto generated
     *
     *
     * @var int
     */
    public $id = null;

    /**
     * Generic distribution provider action creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Generic distribution provider action last update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     */
    public $genericDistributionProviderId = null;

    /**
     *
     *
     * @var KalturaDistributionAction
     */
    public $action = null;

    /**
     *
     *
     * @var KalturaGenericDistributionProviderStatus
     */
    public $status = null;

    /**
     *
     *
     * @var KalturaGenericDistributionProviderParser
     */
    public $resultsParser = null;

    /**
     *
     *
     * @var KalturaDistributionProtocol
     */
    public $protocol = null;

    /**
     *
     *
     * @var string
     */
    public $serverAddress = null;

    /**
     *
     *
     * @var string
     */
    public $remotePath = null;

    /**
     *
     *
     * @var string
     */
    public $remoteUsername = null;

    /**
     *
     *
     * @var string
     */
    public $remotePassword = null;

    /**
     *
     *
     * @var string
     */
    public $editableFields = null;

    /**
     *
     *
     * @var string
     */
    public $mandatoryFields = null;

    /**
     *
     *
     * @var string
     */
    public $mrssTransformer = null;

    /**
     *
     *
     * @var string
     */
    public $mrssValidator = null;

    /**
     *
     *
     * @var string
     */
    public $resultsTransformer = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDistributionProviderActionBaseFilter extends KalturaFilter
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
    public $genericDistributionProviderIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $genericDistributionProviderIdIn = null;

    /**
     *
     *
     * @var KalturaDistributionAction
     */
    public $actionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $actionIn = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderActionFilter extends KalturaGenericDistributionProviderActionBaseFilter
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
class KalturaGenericDistributionProviderActionListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaGenericDistributionProviderAction
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
class KalturaContentDistributionSearchItem extends KalturaSearchItem
{
    /**
     *
     *
     * @var bool
     */
    public $noDistributionProfiles = null;

    /**
     *
     *
     * @var int
     */
    public $distributionProfileId = null;

    /**
     *
     *
     * @var KalturaEntryDistributionSunStatus
     */
    public $distributionSunStatus = null;

    /**
     *
     *
     * @var KalturaEntryDistributionFlag
     */
    public $entryDistributionFlag = null;

    /**
     *
     *
     * @var KalturaEntryDistributionStatus
     */
    public $entryDistributionStatus = null;

    /**
     *
     *
     * @var bool
     */
    public $hasEntryDistributionValidationErrors = null;

    /**
     * Comma seperated validation error types
     *
     * @var string
     */
    public $entryDistributionValidationErrors = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConfigurableDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
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
abstract class KalturaGenericDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
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
abstract class KalturaSyndicationDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
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
abstract class KalturaSyndicationDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
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
class KalturaConfigurableDistributionProfileFilter extends KalturaConfigurableDistributionProfileBaseFilter
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
class KalturaGenericDistributionProfileFilter extends KalturaGenericDistributionProfileBaseFilter
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
class KalturaSyndicationDistributionProfileFilter extends KalturaSyndicationDistributionProfileBaseFilter
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
class KalturaSyndicationDistributionProviderFilter extends KalturaSyndicationDistributionProviderBaseFilter
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
class KalturaDistributionFieldConfig extends KalturaObjectBase
{
    /**
     * A value taken from a connector field enum which associates the current configuration to that connector field
     * Field enum class should be returned by the provider's getFieldEnumClass function.
     *
     * @var string
     */
    public $fieldName = null;

    /**
     * A string that will be shown to the user as the field name in error messages related to the current field
     *
     * @var string
     */
    public $userFriendlyFieldName = null;

    /**
     * An XSLT string that extracts the right value from the Kaltura entry MRSS XML.
     * The value of the current connector field will be the one that is returned from transforming the Kaltura entry MRSS XML using this XSLT string.
     *
     * @var string
     */
    public $entryMrssXslt = null;

    /**
     * Is the field required to have a value for submission ?
     *
     * @var KalturaDistributionFieldRequiredStatus
     */
    public $isRequired = null;

    /**
     * Trigger distribution update when this field changes or not ?
     *
     * @var bool
     */
    public $updateOnChange = null;

    /**
     * Entry column or metadata xpath that should trigger an update
     * TODO: find a better solution for this
     *
     * @var array of KalturaString
     */
    public $updateParams;

    /**
     * Is this field config is the default for the distribution provider?
     *
     * @var bool
     */
    public $isDefault = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConfigurableDistributionProfile extends KalturaDistributionProfile
{
    /**
     *
     *
     * @var array of KalturaDistributionFieldConfig
     */
    public $fieldConfigArray;

    /**
     *
     *
     * @var array of KalturaString
     */
    public $itemXpathsToExtend;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfileAction extends KalturaObjectBase
{
    /**
     *
     *
     * @var KalturaDistributionProtocol
     */
    public $protocol = null;

    /**
     *
     *
     * @var string
     */
    public $serverUrl = null;

    /**
     *
     *
     * @var string
     */
    public $serverPath = null;

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
     * @var bool
     */
    public $ftpPassiveMode = null;

    /**
     *
     *
     * @var string
     */
    public $httpFieldName = null;

    /**
     *
     *
     * @var string
     */
    public $httpFileName = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfile extends KalturaDistributionProfile
{
    /**
     *
     *
     * @var int
     */
    public $genericProviderId = null;

    /**
     *
     *
     * @var KalturaGenericDistributionProfileAction
     */
    public $submitAction;

    /**
     *
     *
     * @var KalturaGenericDistributionProfileAction
     */
    public $updateAction;

    /**
     *
     *
     * @var KalturaGenericDistributionProfileAction
     */
    public $deleteAction;

    /**
     *
     *
     * @var KalturaGenericDistributionProfileAction
     */
    public $fetchReportAction;

    /**
     *
     *
     * @var string
     */
    public $updateRequiredEntryFields = null;

    /**
     *
     *
     * @var string
     */
    public $updateRequiredMetadataXPaths = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationDistributionProfile extends KalturaDistributionProfile
{
    /**
     *
     *
     * @var string
     */
    public $xsl = null;

    /**
     *
     *
     * @var string
     */
    public $feedId = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorInvalidData extends KalturaDistributionValidationError
{
    /**
     *
     *
     * @var string
     */
    public $fieldName = null;

    /**
     *
     *
     * @var KalturaDistributionValidationErrorType
     */
    public $validationErrorType = null;

    /**
     * Parameter of the validation error
     * For example, minimum value for KalturaDistributionValidationErrorType::STRING_TOO_SHORT validation error
     *
     * @var string
     */
    public $validationErrorParam = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorInvalidMetadata extends KalturaDistributionValidationErrorInvalidData
{
    /**
     *
     *
     * @var int
     */
    public $metadataProfileId = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingFlavor extends KalturaDistributionValidationError
{
    /**
     *
     *
     * @var string
     */
    public $flavorParamsId = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingMetadata extends KalturaDistributionValidationError
{
    /**
     *
     *
     * @var string
     */
    public $fieldName = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingThumbnail extends KalturaDistributionValidationError
{
    /**
     *
     *
     * @var KalturaDistributionThumbDimensions
     */
    public $dimensions;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationDistributionProvider extends KalturaDistributionProvider
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
class KalturaDistributionProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaDistributionProfile $distributionprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "distributionProfile", $distributionprofile->toParams());
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfile");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfile");
        return $resultobject;
    }

    public function update($id, KalturaDistributionProfile $distributionprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "distributionProfile", $distributionprofile->toParams());
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfile");
        return $resultobject;
    }

    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfile");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaDistributionProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfileListResponse");
        return $resultobject;
    }

    public function listByPartner(KalturaPartnerFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_distributionprofile", "listByPartner", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProfileListResponse");
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
class KalturaEntryDistributionService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaEntryDistribution $entrydistribution) {
        $kparams = array();
        $this->client->addParam($kparams, "entryDistribution", $entrydistribution->toParams());
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function validate($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "validate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function update($id, KalturaEntryDistribution $entrydistribution) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "entryDistribution", $entrydistribution->toParams());
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaEntryDistributionFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistributionListResponse");
        return $resultobject;
    }

    public function submitAdd($id, $submitwhenready = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "submitWhenReady", $submitwhenready);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitAdd", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function submitUpdate($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitUpdate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function submitFetchReport($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitFetchReport", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function submitDelete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitDelete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function retrySubmit($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "retrySubmit", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryDistribution");
        return $resultobject;
    }

    public function serveSentData($id, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall('contentdistribution_entrydistribution', 'serveSentData', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveReturnedData($id, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall('contentdistribution_entrydistribution', 'serveReturnedData', $kparams);
        $resultobject = $this->client->getServeUrl();
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
class KalturaDistributionProviderService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function listAction(KalturaDistributionProviderFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_distributionprovider", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDistributionProviderListResponse");
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
class KalturaGenericDistributionProviderService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaGenericDistributionProvider $genericdistributionprovider) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProvider", $genericdistributionprovider->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProvider");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProvider");
        return $resultobject;
    }

    public function update($id, KalturaGenericDistributionProvider $genericdistributionprovider) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "genericDistributionProvider", $genericdistributionprovider->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProvider");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaGenericDistributionProviderFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderListResponse");
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
class KalturaGenericDistributionProviderActionService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaGenericDistributionProviderAction $genericdistributionprovideraction) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderAction", $genericdistributionprovideraction->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addMrssTransform($id, $xsldata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xslData", $xsldata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransform", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addMrssTransformFromFile($id, $xslfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xslFile", $xslfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransformFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addMrssValidate($id, $xsddata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xsdData", $xsddata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addMrssValidateFromFile($id, $xsdfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidateFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addResultsTransform($id, $transformdata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "transformData", $transformdata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransform", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function addResultsTransformFromFile($id, $transformfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "transformFile", $transformfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransformFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function getByProviderId($genericdistributionproviderid, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "getByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function updateByProviderId($genericdistributionproviderid, $actiontype, KalturaGenericDistributionProviderAction $genericdistributionprovideraction) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->addParam($kparams, "genericDistributionProviderAction", $genericdistributionprovideraction->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "updateByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function update($id, KalturaGenericDistributionProviderAction $genericdistributionprovideraction) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "genericDistributionProviderAction", $genericdistributionprovideraction->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function deleteByProviderId($genericdistributionproviderid, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "deleteByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaGenericDistributionProviderActionFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderActionListResponse");
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
class KalturaTvComService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function getFeed($distributionprofileid, $hash) {
        $kparams = array();
        $this->client->addParam($kparams, "distributionProfileId", $distributionprofileid);
        $this->client->addParam($kparams, "hash", $hash);
        $this->client->queueServiceActionCall("tvcomdistribution_tvcom", "getFeed", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
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
class KalturaContentDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaContentDistributionClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaDistributionProfileService
     */
    public $distributionProfile = null;

    /**
     * @var KalturaEntryDistributionService
     */
    public $entryDistribution = null;

    /**
     * @var KalturaDistributionProviderService
     */
    public $distributionProvider = null;

    /**
     * @var KalturaGenericDistributionProviderService
     */
    public $genericDistributionProvider = null;

    /**
     * @var KalturaGenericDistributionProviderActionService
     */
    public $genericDistributionProviderAction = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->distributionProfile = new KalturaDistributionProfileService($client);
        $this->entryDistribution = new KalturaEntryDistributionService($client);
        $this->distributionProvider = new KalturaDistributionProviderService($client);
        $this->genericDistributionProvider = new KalturaGenericDistributionProviderService($client);
        $this->genericDistributionProviderAction = new KalturaGenericDistributionProviderActionService($client);
    }

    /**
     * @return KalturaContentDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaContentDistributionClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'distributionProfile' => $this->distributionProfile,
            'entryDistribution' => $this->entryDistribution,
            'distributionProvider' => $this->distributionProvider,
            'genericDistributionProvider' => $this->genericDistributionProvider,
            'genericDistributionProviderAction' => $this->genericDistributionProviderAction,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'contentDistribution';
    }
}
