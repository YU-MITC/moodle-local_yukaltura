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
class KalturaDistributionAction extends KalturaEnumBase {
    /** @var submit */
    const SUBMIT = 1;
    /** @var update */
    const UPDATE = 2;
    /** @var delete */
    const DELETE = 3;
    /** @var fetch_report */
    const FETCH_REPORT = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionErrorType extends KalturaEnumBase {
    /** @var missing_flavor */
    const MISSING_FLAVOR = 1;
    /** @var missing_thumbnail */
    const MISSING_THUMBNAIL = 2;
    /** @var missing_metadata */
    const MISSING_METADATA = 3;
    /** @var invalid_data */
    const INVALID_DATA = 4;
    /** @var missing_asset */
    const MISSING_ASSET = 5;
    /** @var condition_not_met */
    const CONDITION_NOT_MET = 6;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionFieldRequiredStatus extends KalturaEnumBase {
    /** @var not_required */
    const NOT_REQUIRED = 0;
    /** @var required_by_probider */
    const REQUIRED_BY_PROVIDER = 1;
    /** @var required_by_partner */
    const REQUIRED_BY_PARTNER = 2;
    /** @var required_for_automatic_distribution */
    const REQUIRED_FOR_AUTOMATIC_DISTRIBUTION = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileActionStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var automatic */
    const AUTOMATIC = 2;
    /** @var manual */
    const MANUAL = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var enabled */
    const ENABLED = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProtocol extends KalturaEnumBase {
    /** @var ftp */
    const FTP = 1;
    /** @var scp */
    const SCP = 2;
    /** @var sftp */
    const SFTP = 3;
    /** @var http */
    const HTTP = 4;
    /** @var https */
    const HTTPS = 5;
    /** @var aspera */
    const ASPERA = 10;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorType extends KalturaEnumBase {
    /** @var custom_error */
    const CUSTOM_ERROR = 0;
    /** @var string_empty */
    const STRING_EMPTY = 1;
    /** @var string_tool_long */
    const STRING_TOO_LONG = 2;
    /** @var string_too_short */
    const STRING_TOO_SHORT = 3;
    /** @var invalid_format */
    const INVALID_FORMAT = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionFlag extends KalturaEnumBase {
    /** @var none */
    const NONE = 0;
    /** @var submit_required */
    const SUBMIT_REQUIRED = 1;
    /** @var delete_required */
    const DELETE_REQUIRED = 2;
    /** @var update_required */
    const UPDATE_REQUIRED = 3;
    /** @var enable_required */
    const ENABLE_REQUIRED = 4;
    /** @var disable_required */
    const DISABLE_REQUIRED = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 0;
    /** @var queued */
    const QUEUED = 1;
    /** @var ready */
    const READY = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var submitting */
    const SUBMITTING = 4;
    /** @var updating */
    const UPDATING = 5;
    /** @var deleting */
    const DELETING = 6;
    /** @var error_submitting */
    const ERROR_SUBMITTING = 7;
    /** @var error_updating */
    const ERROR_UPDATING = 8;
    /** @var error_deleting */
    const ERROR_DELETING = 9;
    /** @var removed */
    const REMOVED = 10;
    /** @var import_submitting */
    const IMPORT_SUBMITTING = 11;
    /** @var import_updating */
    const IMPORT_UPDATING = 12;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionSunStatus extends KalturaEnumBase {
    /** @var before_sunrise */
    const BEFORE_SUNRISE = 1;
    /** @var after_sunrise */
    const AFTER_SUNRISE = 2;
    /** @var after_sunset */
    const AFTER_SUNSET = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderParser extends KalturaEnumBase {
    /** @var xsl */
    const XSL = 1;
    /** @var xpath */
    const XPATH = 2;
    /** @var regex */
    const REGEX = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConfigurableDistributionProfileOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var updated timestamp */
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
class KalturaDistributionProfileOrderBy extends KalturaEnumBase {
    /** @var created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var created timetamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var updated timestamp */
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
class KalturaDistributionProviderOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderType extends KalturaEnumBase {
    /** @var avn */
    const AVN = "avnDistribution.AVN";
    /** @var comcast mrss */
    const COMCAST_MRSS = "comcastMrssDistribution.COMCAST_MRSS";
    /** @var cross kaltura */
    const CROSS_KALTURA = "crossKalturaDistribution.CROSS_KALTURA";
    /** @var daily motion */
    const DAILYMOTION = "dailymotionDistribution.DAILYMOTION";
    /** @var double click */
    const DOUBLECLICK = "doubleClickDistribution.DOUBLECLICK";
    /** @var facebook */
    const FACEBOOK = "facebookDistribution.FACEBOOK";
    /** @var freewheel */
    const FREEWHEEL = "freewheelDistribution.FREEWHEEL";
    /** @var freewheel generic */
    const FREEWHEEL_GENERIC = "freewheelGenericDistribution.FREEWHEEL_GENERIC";
    /** @var ftp */
    const FTP = "ftpDistribution.FTP";
    /** @var ftp scheduled */
    const FTP_SCHEDULED = "ftpDistribution.FTP_SCHEDULED";
    /** @var hulu */
    const HULU = "huluDistribution.HULU";
    /** @var idetic */
    const IDETIC = "ideticDistribution.IDETIC";
    /** @var metro pcs */
    const METRO_PCS = "metroPcsDistribution.METRO_PCS";
    /** @var msn */
    const MSN = "msnDistribution.MSN";
    /** @var quickplay */
    const QUICKPLAY = "quickPlayDistribution.QUICKPLAY";
    /** @var unicorn */
    const UNICORN = "unicornDistribution.UNICORN";
    /** @var yahoo */
    const YAHOO = "yahooDistribution.YAHOO";
    /** @var youtube */
    const YOUTUBE = "youTubeDistribution.YOUTUBE";
    /** @var youtube api */
    const YOUTUBE_API = "youtubeApiDistribution.YOUTUBE_API";
    /** @var genecit */
    const GENERIC = "1";
    /** @var syndication */
    const SYNDICATION = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by submitted timestamp */
    const SUBMITTED_AT_ASC = "+submittedAt";
    /** @var order by sunrise */
    const SUNRISE_ASC = "+sunrise";
    /** @var order by sunset */
    const SUNSET_ASC = "+sunset";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by submitted timestamp */
    const SUBMITTED_AT_DESC = "-submittedAt";
    /** @var order by sunrise */
    const SUNRISE_DESC = "-sunrise";
    /** @var order by sunset */
    const SUNSET_DESC = "-sunset";
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
class KalturaGenericDistributionProfileOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
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
class KalturaGenericDistributionProviderActionOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
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
class KalturaGenericDistributionProviderOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var updated timestamp */
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
class KalturaSyndicationDistributionProfileOrderBy extends KalturaEnumBase {
    /** @var created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var updated timestamp */
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
abstract class KalturaAssetDistributionCondition extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetDistributionRule extends KalturaObjectBase {
    /**
     * The validation error description that will be set on the "data" property
     * on KalturaDistributionValidationErrorMissingAsset if rule was not fulfilled
     * @var string
     */
    public $validationError = null;

    /**
     * An array of asset distribution conditions
     * @var array of KalturaAssetDistributionCondition
     */
    public $assetDistributionConditions;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionFieldConfig extends KalturaObjectBase {
    /**
     * A value taken from a connector field enum which associates the current configuration to that connector field
     * Field enum class should be returned by the provider's getFieldEnumClass function.
     * @var string
     */
    public $fieldName = null;

    /**
     * A string that will be shown to the user as the field name in error messages related to the current field
     * @var string
     */
    public $userFriendlyFieldName = null;

    /**
     * An XSLT string that extracts the right value from the Kaltura entry MRSS XML.
     * The value of the current connector field will be the one that is returned
     * from transforming the Kaltura entry MRSS XML using this XSLT string.
     * @var string
     */
    public $entryMrssXslt = null;

    /**
     * Is the field required to have a value for submission ?
     * @var KalturaDistributionFieldRequiredStatus
     */
    public $isRequired = null;

    /**
     * Trigger distribution update when this field changes or not ?
     * @var bool
     */
    public $updateOnChange = null;

    /**
     * Entry column or metadata xpath that should trigger an update
     * @var array of KalturaString
     */
    public $updateParams;

    /**
     * Is this field config is the default for the distribution provider?
     * @var bool
     */
    public $isDefault = null;

    /**
     * Is an error on this field going to trigger deletion of distributed content?
     * @var bool
     */
    public $triggerDeleteOnError = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionJobProviderData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionThumbDimensions extends KalturaObjectBase {
    /**
     * @var int
     */
    public $width = null;

    /**
     * @var int
     */
    public $height = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionProfile extends KalturaObjectBase {
    /**
     * Auto generated unique id
     * @var int
     */
    public $id = null;

    /**
     * Profile creation date as Unix timestamp (In seconds)
     * @var int
     */
    public $createdAt = null;

    /**
     * Profile last update date as Unix timestamp (In seconds)
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var KalturaDistributionProviderType
     */
    public $providerType = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var KalturaDistributionProfileStatus
     */
    public $status = null;

    /**
     * @var KalturaDistributionProfileActionStatus
     */
    public $submitEnabled = null;

    /**
     * @var KalturaDistributionProfileActionStatus
     */
    public $updateEnabled = null;

    /**
     * @var KalturaDistributionProfileActionStatus
     */
    public $deleteEnabled = null;

    /**
     * @var KalturaDistributionProfileActionStatus
     */
    public $reportEnabled = null;

    /**
     * Comma separated flavor params ids that should be auto converted
     * @var string
     */
    public $autoCreateFlavors = null;

    /**
     * Comma separated thumbnail params ids that should be auto generated
     * @var string
     */
    public $autoCreateThumb = null;

    /**
     * Comma separated flavor params ids that should be submitted if ready
     * @var string
     */
    public $optionalFlavorParamsIds = null;

    /**
     * Comma separated flavor params ids that required to be ready before submission
     * @var string
     */
    public $requiredFlavorParamsIds = null;

    /**
     * Thumbnail dimensions that should be submitted if ready
     * @var array of KalturaDistributionThumbDimensions
     */
    public $optionalThumbDimensions;

    /**
     * Thumbnail dimensions that required to be readt before submission
     * @var array of KalturaDistributionThumbDimensions
     */
    public $requiredThumbDimensions;

    /**
     * Asset Distribution Rules for assets that should be submitted if ready
     * @var array of KalturaAssetDistributionRule
     */
    public $optionalAssetDistributionRules;

    /**
     * Assets Asset Distribution Rules for assets that are required to be ready before submission
     * @var array of KalturaAssetDistributionRule
     */
    public $requiredAssetDistributionRules;

    /**
     * If entry distribution sunrise not specified that will be the default since entry creation time, in seconds
     * @var int
     */
    public $sunriseDefaultOffset = null;

    /**
     * If entry distribution sunset not specified that will be the default since entry creation time, in seconds
     * @var int
     */
    public $sunsetDefaultOffset = null;

    /**
     * The best external storage to be used to download the asset files from
     * @var int
     */
    public $recommendedStorageProfileForDownload = null;

    /**
     * The best Kaltura data center to be used to download the asset files to
     * @var int
     */
    public $recommendedDcForDownload = null;

    /**
     * The best Kaltura data center to be used to execute the distribution job
     * @var int
     */
    public $recommendedDcForExecute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionProvider extends KalturaObjectBase {
    /**
     * @var KalturaDistributionProviderType
     */
    public $type = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var bool
     */
    public $scheduleUpdateEnabled = null;

    /**
     * @var bool
     */
    public $availabilityUpdateEnabled = null;

    /**
     * @var bool
     */
    public $deleteInsteadUpdate = null;

    /**
     * @var int
     */
    public $intervalBeforeSunrise = null;

    /**
     * @var int
     */
    public $intervalBeforeSunset = null;

    /**
     * @var string
     */
    public $updateRequiredEntryFields = null;

    /**
     * @var string
     */
    public $updateRequiredMetadataXPaths = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionRemoteMediaFile extends KalturaObjectBase {
    /**
     * @var string
     */
    public $version = null;

    /**
     * @var string
     */
    public $assetId = null;

    /**
     * @var string
     */
    public $remoteId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionValidationError extends KalturaObjectBase {
    /**
     * @var KalturaDistributionAction
     */
    public $action = null;

    /**
     * @var KalturaDistributionErrorType
     */
    public $errorType = null;

    /**
     * @var string
     */
    public $description = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistribution extends KalturaObjectBase {
    /**
     * Auto generated unique id
     * @var int
     */
    public $id = null;

    /**
     * Entry distribution creation date as Unix timestamp (In seconds)
     * @var int
     */
    public $createdAt = null;

    /**
     * Entry distribution last update date as Unix timestamp (In seconds)
     * @var int
     */
    public $updatedAt = null;

    /**
     * Entry distribution submission date as Unix timestamp (In seconds)
     * @var int
     */
    public $submittedAt = null;

    /**
     * @var string
     */
    public $entryId = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var int
     */
    public $distributionProfileId = null;

    /**
     * @var KalturaEntryDistributionStatus
     */
    public $status = null;

    /**
     * @var KalturaEntryDistributionSunStatus
     */
    public $sunStatus = null;

    /**
     * @var KalturaEntryDistributionFlag
     */
    public $dirtyStatus = null;

    /**
     * Comma separated thumbnail asset ids
     * @var string
     */
    public $thumbAssetIds = null;

    /**
     * Comma separated flavor asset ids
     * @var string
     */
    public $flavorAssetIds = null;

    /**
     * Comma separated asset ids
     * @var string
     */
    public $assetIds = null;

    /**
     * Entry distribution publish time as Unix timestamp (In seconds)
     * @var int
     */
    public $sunrise = null;

    /**
     * Entry distribution un-publish time as Unix timestamp (In seconds)
     * @var int
     */
    public $sunset = null;

    /**
     * The id as returned from the distributed destination
     * @var string
     */
    public $remoteId = null;

    /**
     * The plays as retrieved from the remote destination reports
     * @var int
     */
    public $plays = null;

    /**
     * The views as retrieved from the remote destination reports
     * @var int
     */
    public $views = null;

    /**
     * @var array of KalturaDistributionValidationError
     */
    public $validationErrors;

    /**
     * @var KalturaBatchJobErrorTypes
     */
    public $errorType = null;

    /**
     * @var int
     */
    public $errorNumber = null;

    /**
     * @var string
     */
    public $errorDescription = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasSubmitResultsLog = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasSubmitSentDataLog = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasUpdateResultsLog = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasUpdateSentDataLog = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasDeleteResultsLog = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $hasDeleteSentDataLog = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfileAction extends KalturaObjectBase {
    /**
     * @var KalturaDistributionProtocol
     */
    public $protocol = null;

    /**
     * @var string
     */
    public $serverUrl = null;

    /**
     * @var string
     */
    public $serverPath = null;

    /**
     * @var string
     */
    public $username = null;

    /**
     * @var string
     */
    public $password = null;

    /**
     * @var bool
     */
    public $ftpPassiveMode = null;

    /**
     * @var string
     */
    public $httpFieldName = null;

    /**
     * @var string
     */
    public $httpFileName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderAction extends KalturaObjectBase {
    /**
     * Auto generated
     * @var int
     */
    public $id = null;

    /**
     * Generic distribution provider action creation date as Unix timestamp (In seconds)
     * @var int
     */
    public $createdAt = null;

    /**
     * Generic distribution provider action last update date as Unix timestamp (In seconds)
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var int
     */
    public $genericDistributionProviderId = null;

    /**
     * @var KalturaDistributionAction
     */
    public $action = null;

    /**
     * @var KalturaGenericDistributionProviderStatus
     */
    public $status = null;

    /**
     * @var KalturaGenericDistributionProviderParser
     */
    public $resultsParser = null;

    /**
     * @var KalturaDistributionProtocol
     */
    public $protocol = null;

    /**
     * @var string
     */
    public $serverAddress = null;

    /**
     * @var string
     */
    public $remotePath = null;

    /**
     * @var string
     */
    public $remoteUsername = null;

    /**
     * @var string
     */
    public $remotePassword = null;

    /**
     * @var string
     */
    public $editableFields = null;

    /**
     * @var string
     */
    public $mandatoryFields = null;

    /**
     * @var string
     */
    public $mrssTransformer = null;

    /**
     * @var string
     */
    public $mrssValidator = null;

    /**
     * @var string
     */
    public $resultsTransformer = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProvider extends KalturaDistributionProvider {
    /**
     * Auto generated
     * @var int
     */
    public $id = null;

    /**
     * Generic distribution provider creation date as Unix timestamp (In seconds)
     * @var int
     */
    public $createdAt = null;

    /**
     * Generic distribution provider last update date as Unix timestamp (In seconds)
     * @var int
     */
    public $updatedAt = null;

    /**
     * @var int
     */
    public $partnerId = null;

    /**
     * @var bool
     */
    public $isDefault = null;

    /**
     * @var KalturaGenericDistributionProviderStatus
     */
    public $status = null;

    /**
     * @var string
     */
    public $optionalFlavorParamsIds = null;

    /**
     * @var string
     */
    public $requiredFlavorParamsIds = null;

    /**
     * @var array of KalturaDistributionThumbDimensions
     */
    public $optionalThumbDimensions;

    /**
     * @var array of KalturaDistributionThumbDimensions
     */
    public $requiredThumbDimensions;

    /**
     * @var string
     */
    public $editableFields = null;

    /**
     * @var string
     */
    public $mandatoryFields = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetDistributionPropertyCondition extends KalturaAssetDistributionCondition {
    /**
     * The property name to look for, this will match to a getter on the asset object.
     * Should be camelCase naming convention (defining "myPropertyName" will look for getMyPropertyName())
     * @var string
     */
    public $propertyName = null;

    /**
     * The value to compare
     * @var string
     */
    public $propertyValue = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConfigurableDistributionJobProviderData extends KalturaDistributionJobProviderData {
    /**
     * @var string
     */
    public $fieldValues = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConfigurableDistributionProfile extends KalturaDistributionProfile {
    /**
     * @var array of KalturaDistributionFieldConfig
     */
    public $fieldConfigArray;

    /**
     * @var array of KalturaExtendingItemMrssParameter
     */
    public $itemXpathsToExtend;

    /**
     * When checking custom XSLT conditions using the fieldConfigArray -
     * address only categories associated with the entry via the categoryEntry object.
     * @var bool
     */
    public $useCategoryEntries = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContentDistributionSearchItem extends KalturaSearchItem {
    /**
     * @var bool
     */
    public $noDistributionProfiles = null;

    /**
     * @var int
     */
    public $distributionProfileId = null;

    /**
     * @var KalturaEntryDistributionSunStatus
     */
    public $distributionSunStatus = null;

    /**
     * @var KalturaEntryDistributionFlag
     */
    public $entryDistributionFlag = null;

    /**
     * @var KalturaEntryDistributionStatus
     */
    public $entryDistributionStatus = null;

    /**
     * @var bool
     */
    public $hasEntryDistributionValidationErrors = null;

    /**
     * Comma seperated validation error types
     * @var string
     */
    public $entryDistributionValidationErrors = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionJobData extends KalturaJobData {
    /**
     * @var int
     */
    public $distributionProfileId = null;

    /**
     * @var KalturaDistributionProfile
     */
    public $distributionProfile;

    /**
     * @var int
     */
    public $entryDistributionId = null;

    /**
     * @var KalturaEntryDistribution.
     */
    public $entryDistribution;

    /**
     * Id of the media in the remote system.
     * @var string
     */
    public $remoteId = null;

    /**
     * @var KalturaDistributionProviderType
     */
    public $providerType = null;

    /**
     * Additional data that relevant for the provider only.
     * @var KalturaDistributionJobProviderData
     */
    public $providerData;

    /**
     * The results as returned from the remote destination.
     * @var string
     */
    public $results = null;

    /**
     * The data as sent to the remote destination.
     * @var string
     */
    public $sentData = null;

    /**
     * Stores array of media files that submitted to the destination site
     * Could be used later for media update
     * @var array of KalturaDistributionRemoteMediaFile
     */
    public $mediaFiles;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDistributionProfileBaseFilter extends KalturaFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * @var KalturaDistributionProfileStatus
     */
    public $statusEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaDistributionProfile
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
abstract class KalturaDistributionProviderBaseFilter extends KalturaFilter {
    /**
     * @var KalturaDistributionProviderType
     */
    public $typeEqual = null;

    /**
     * @var string
     */
    public $typeIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaDistributionProvider
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
class KalturaDistributionValidationErrorConditionNotMet extends KalturaDistributionValidationError {
    /**
     * @var string
     */
    public $conditionName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorInvalidData extends KalturaDistributionValidationError {
    /**
     * @var string
     */
    public $fieldName = null;

    /**
     * @var KalturaDistributionValidationErrorType
     */
    public $validationErrorType = null;

    /**
     * Parameter of the validation error
     * For example, minimum value for KalturaDistributionValidationErrorType::STRING_TOO_SHORT validation error
     * @var string
     */
    public $validationErrorParam = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingAsset extends KalturaDistributionValidationError {
    /**
     * @var string
     */
    public $data = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingFlavor extends KalturaDistributionValidationError {
    /**
     * @var string
     */
    public $flavorParamsId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingMetadata extends KalturaDistributionValidationError {
    /**
     * @var string
     */
    public $fieldName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorMissingThumbnail extends KalturaDistributionValidationError {
    /**
     * @var KalturaDistributionThumbDimensions
     */
    public $dimensions;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaEntryDistribution
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
class KalturaGenericDistributionJobProviderData extends KalturaDistributionJobProviderData {
    /**
     * @var string
     */
    public $xml = null;

    /**
     * @var string
     */
    public $resultParseData = null;

    /**
     * @var KalturaGenericDistributionProviderParser
     */
    public $resultParserType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfile extends KalturaDistributionProfile {
    /**
     * @var int
     */
    public $genericProviderId = null;

    /**
     * @var KalturaGenericDistributionProfileAction
     */
    public $submitAction;

    /**
     * @var KalturaGenericDistributionProfileAction
     */
    public $updateAction;

    /**
     * @var KalturaGenericDistributionProfileAction
     */
    public $deleteAction;

    /**
     * @var KalturaGenericDistributionProfileAction
     */
    public $fetchReportAction;

    /**
     * @var string
     */
    public $updateRequiredEntryFields = null;

    /**
     * @var string
     */
    public $updateRequiredMetadataXPaths = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDistributionProviderActionBaseFilter extends KalturaFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $genericDistributionProviderIdEqual = null;

    /**
     * @var string
     */
    public $genericDistributionProviderIdIn = null;

    /**
     * @var KalturaDistributionAction
     */
    public $actionEqual = null;

    /**
     * @var string
     */
    public $actionIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderActionListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaGenericDistributionProviderAction
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
class KalturaGenericDistributionProviderListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaGenericDistributionProvider
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
class KalturaSyndicationDistributionProfile extends KalturaDistributionProfile {
    /**
     * @var string
     */
    public $xsl = null;

    /**
     * @var string
     */
    public $feedId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationDistributionProvider extends KalturaDistributionProvider {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionDeleteJobData extends KalturaDistributionJobData {
    /**
     * Flag signifying that the associated distribution item should not be moved to 'removed' status
     *
     * @var bool
     */
    public $keepDistributionItem = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionFetchReportJobData extends KalturaDistributionJobData {
    /**
     * @var int
     */
    public $plays = null;

    /**
     * @var int
     */
    public $views = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileFilter extends KalturaDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderFilter extends KalturaDistributionProviderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionSubmitJobData extends KalturaDistributionJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionUpdateJobData extends KalturaDistributionJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionValidationErrorInvalidMetadata extends KalturaDistributionValidationErrorInvalidData {
    /**
     * @var int
     */
    public $metadataProfileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryDistributionBaseFilter extends KalturaRelatedFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $submittedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $submittedAtLessThanOrEqual = null;

    /**
     * @var string
     */
    public $entryIdEqual = null;

    /**
     * @var string
     */
    public $entryIdIn = null;

    /**
     * @var int
     */
    public $distributionProfileIdEqual = null;

    /**
     * @var string
     */
    public $distributionProfileIdIn = null;

    /**
     * @var KalturaEntryDistributionStatus
     */
    public $statusEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaEntryDistributionFlag
     */
    public $dirtyStatusEqual = null;

    /**
     * @var string
     */
    public $dirtyStatusIn = null;

    /**
     * @var int
     */
    public $sunriseGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $sunriseLessThanOrEqual = null;

    /**
     * @var int
     */
    public $sunsetGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $sunsetLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderActionFilter extends KalturaGenericDistributionProviderActionBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConfigurableDistributionProfileBaseFilter extends KalturaDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionDisableJobData extends KalturaDistributionUpdateJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionEnableJobData extends KalturaDistributionUpdateJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionFilter extends KalturaEntryDistributionBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDistributionProfileBaseFilter extends KalturaDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDistributionProviderBaseFilter extends KalturaDistributionProviderFilter {
    /**
     * @var int
     */
    public $idEqual = null;

    /**
     * @var string
     */
    public $idIn = null;

    /**
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * @var string
     */
    public $partnerIdIn = null;

    /**
     * @var KalturaNullableBoolean
     */
    public $isDefaultEqual = null;

    /**
     * @var string
     */
    public $isDefaultIn = null;

    /**
     * @var KalturaGenericDistributionProviderStatus
     */
    public $statusEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSyndicationDistributionProfileBaseFilter extends KalturaDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSyndicationDistributionProviderBaseFilter extends KalturaDistributionProviderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConfigurableDistributionProfileFilter extends KalturaConfigurableDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProfileFilter extends KalturaGenericDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderFilter extends KalturaGenericDistributionProviderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationDistributionProfileFilter extends KalturaSyndicationDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura ActivityBusinessProcessNotificationClientPlugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Distribution Profile.
     * @param KalturaDistributionProfile $distributionprofile - Distribution profile to updated.
     * @return KalturaDistributionProfile. - distribution profile after updated.
     */
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

    /**
     * Delete Distribution Profile by id
     * @param int $id - id of distribution profile.
     */
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
    }

    /**
     * Get Distribution Profile by id
     * @param int $id - id of distribution profile.
     * @return KalturaDistributionProfile - object.
     */
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

    /**
     * List all distribution providers.
     * @param KalturaDistributionProfileFilter $filter - instance of KalturaDistributionProfileFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaDistributionProfileListResponse - list object.
     */
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

    /**
     * List by partner
     * @param KalturaPartnerFilter $filter - instance of KalturaPartnerFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaDistributionProfileListResponse - list object.
     */
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

    /**
     * Update Distribution Profile by id.
     * @param {nt $id - id of distribution profile.
     * @param KalturaDistributionProfile $distributionprofile - KalturaDistributionProfile.
     * @return KalturaDistributionProfile - instance of KalturaDistributionProfile.
     */
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

    /**
     * Update Distribution Profile status by id.
     * @param int $id - id of distribution profile.
     * @param int $status - status of update of distribution profile.
     * @return KalturaDistributionProfile - distribution profile after updated.
     */
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDistributionService extends KalturaServiceBase {
    /**
     * Constructor of KalturaEntryDistributionService.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Entry Distribution
     * @param KalturaEntryDistribution $entrydistribution - instance of KalturaEntryDistribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Delete Entry Distribution by id.
     * @param int $id - id of entry distribution.
     */
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
    }

    /**
     * Get Entry Distribution by id.
     * @param int $id - id of entry distribution.
     * @return KalturaEntryDistribution - object.
     */
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

    /**
     * List all distribution providers.
     * @param KalturaEntryDistributionFilter $filter - KalturaEntryDistributionFilter.
     * @param KalturaFilterPager $pager - KalturaFilterPager $pager.
     * @return KalturaEntryDistributionListResponse
     */
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

    /**
     * Retries last submit action.
     * @param {int} $id - id of entry distribution.
     * @return {object} - instance of KalturaEntryDistribution.
     */
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

    /**
     * Serves entry distribution returned data.
     * @param int $id - id of entry distribution.
     * @param int $actiontype -  action type.
     * @return file
     */
    public function serveReturnedData($id, $actiontype) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "serveReturnedData", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves entry distribution sent data
     * @param int $id - id of entry distribution.
     * @param int $actiontype - action type.
     * @return file - file data.
     */
    public function serveSentData($id, $actiontype) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_entrydistribution", "serveSentData", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Submits Entry Distribution to the remote destination
     * @param int $id - id of entry distribution.
     * @param bool $submitwhenready - submit when reay (true of false).
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Deletes Entry Distribution from the remote destination
     * @param int $id - id of entry distribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Submits Entry Distribution report request.
     * @param int $id - id of entry distribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Submits Entry Distribution changes to the remote destination.
     * @param int $id - id of entry distribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Update Entry Distribution by id.
     * @param int $id - id of entry distribution.
     * @param KalturaEntryDistribution $entrydistribution - instance of KalturaEntryDistribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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

    /**
     * Validates Entry Distribution by id for submission
     * @param int $id - id of entry distribution.
     * @return KalturaEntryDistribution - instance of KalturaEntryDistribution.
     */
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDistributionProviderService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Distribution Provider Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * List all distribution providers
     * @param KalturaDistributionProviderFilter $filter - instance of KalturaDistributionProviderFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaDistributionProviderListResponse - instance of KalturaDistributionProviderListResponse.
     */
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
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Generic Distribution Provider Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Generic Distribution Provider
     * @param KalturaGenericDistributionProvider $genericdistributionprovider - instance of KalturaGenericDistributionProvider.
     * @return KalturaGenericDistributionProvider - instance of KalturaGenericDistributionProvider.
     */
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

    /**
     * Delete Generic Distribution Provider by id
     * @param int $id - id of generic distribution provider.
     */
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
    }

    /**
     * Get Generic Distribution Provider by id
     * @param int $id - id of generic distribution provider.
     * @return KalturaGenericDistributionProvider - instance of KalturaGenericDistributionProvider.
     */
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

    /**
     * List all distribution providers.
     * @param KalturaGenericDistributionProviderFilter $filter - instance of KalturaGenericDistributionProviderFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaGenericDistributionProviderListResponse - list object.
     */
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

    /**
     * Update Generic Distribution Provider by id
     * @param int $id - id of generic distribution provider.
     * @param KalturaGenericDistributionProvider $genericdistributionprovider - object to updated.
     * @return KalturaGenericDistributionProvider - object after update
     */
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericDistributionProviderActionService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Generic Distribution Provider.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Generic Distribution Provider Action.
     * @param KalturaGenericDistributionProviderAction $genericdistributionprovideraction - object to added.
     * @return KalturaGenericDistributionProviderAction - object after added.
     */
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

    /**
     * Add MRSS transform file to generic distribution provider action.
     * @param int $id - The id of the generic distribution provider action
     * @param string $xsldata - XSL MRSS transformation data.
     * @return KalturaGenericDistributionProviderAction - instance of KalturaGenericDistributionProviderAction.
     */
    public function addMrssTransform($id, $xsldata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xslData", $xsldata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addMrssTransform", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Add MRSS transform file to generic distribution provider action.
     * @param int $id - The id of the generic distribution provider action.
     * @param file $xslfile - XSL MRSS transformation file.
     * @return KalturaGenericDistributionProviderAction - instance of KalturaGenericDistributionProviderAction.
     */
    public function addMrssTransformFromFile($id, $xslfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xslFile", $xslfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addMrssTransformFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Add MRSS validate file to generic distribution provider action
     * @param int $id - The id of the generic distribution provider action.
     * @param string $xsddata - XSD MRSS validatation data.
     * @return KalturaGenericDistributionProviderAction - instance of KalturaGenericDistributionProviderAction.
     */
    public function addMrssValidate($id, $xsddata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xsdData", $xsddata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addMrssValidate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Add MRSS validate file to generic distribution provider action.
     * @param int $id - The id of the generic distribution provider action.
     * @param file $xsdfile - XSD MRSS validatation file.
     * @return KalturaGenericDistributionProviderAction - object after added.
     */
    public function addMrssValidateFromFile($id, $xsdfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addMrssValidateFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Add results transform file to generic distribution provider action.
     * @param int $id - The id of the generic distribution provider action.
     * @param string $transformdata - Transformation data xsl, xPath or regex.
     * @return KalturaGenericDistributionProviderAction - object after added.
     */
    public function addResultsTransform($id, $transformdata) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "transformData", $transformdata);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addResultsTransform", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Add MRSS transform file to generic distribution provider action.
     * @param int $id - The id of the generic distribution provider action.
     * @param file $transformfile - Transformation file xsl, xPath or regex.
     * @return KalturaGenericDistributionProviderAction - object after added.
     */
    public function addResultsTransformFromFile($id, $transformfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "transformFile", $transformfile);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "addResultsTransformFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * Delete Generic Distribution Provider Action by id.
     * @param int $id - id of generic distribution provider.
     */
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
    }

    /**
     * Delete Generic Distribution Provider Action by provider id.
     * @param int $genericdistributionproviderid - id of generic distribution provider.
     * @param int $actiontype - action type.
     */
    public function deleteByProviderId($genericdistributionproviderid, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "deleteByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Generic Distribution Provider Action by id.
     * @param int $id - id of generic distribution provider.
     * @return KalturaGenericDistributionProviderAction - object.
     */
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

    /**
     * Get Generic Distribution Provider Action by provider id.
     * @param int $genericdistributionproviderid - id of generic distribution provider.
     * @param int $actiontype - action type.
     * @return KalturaGenericDistributionProviderAction - object.
     */
    public function getByProviderId($genericdistributionproviderid, $actiontype) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "getByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
        return $resultobject;
    }

    /**
     * List all distribution providers.
     * @param KalturaGenericDistributionProviderActionFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaGenericDistributionProviderActionListResponse - list object.
     */
    public function listAction(KalturaGenericDistributionProviderActionFilter $filter = null,
                               KalturaFilterPager $pager = null) {
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

    /**
     * Update Generic Distribution Provider Action by id.
     * @param int $id - generic distribution provider.
     * @param KalturaGenericDistributionProviderAction $genericdistributionprovideraction - object to updated.
     * @return KalturaGenericDistributionProviderAction - object after updated.
     */
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

    /**
     * Update Generic Distribution Provider Action by provider id.
     * @param int $genericdistributionproviderid - id of generic distribution provider.
     * @param int $actiontype - action type.
     * @param KalturaGenericDistributionProviderAction $genericdistributionprovideraction - object to updated.
     * @return KalturaGenericDistributionProviderAction - object after updated.
     */
    public function updateByProviderId($genericdistributionproviderid, $actiontype,
                                       KalturaGenericDistributionProviderAction $genericdistributionprovideraction) {
        $kparams = array();
        $this->client->addParam($kparams, "genericDistributionProviderId", $genericdistributionproviderid);
        $this->client->addParam($kparams, "actionType", $actiontype);
        $this->client->addParam($kparams, "genericDistributionProviderAction", $genericdistributionprovideraction->toParams());
        $this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction",
                                              "updateByProviderId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGenericDistributionProviderAction");
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
class KalturaContentDistributionClientPlugin extends KalturaClientPlugin {
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

    /**
     * Constructor of Kaltura Content Distribution Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->distributionProfile = new KalturaDistributionProfileService($client);
        $this->entryDistribution = new KalturaEntryDistributionService($client);
        $this->distributionProvider = new KalturaDistributionProviderService($client);
        $this->genericDistributionProvider = new KalturaGenericDistributionProviderService($client);
        $this->genericDistributionProviderAction = new KalturaGenericDistributionProviderActionService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return  KalturaContentDistributionClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaContentDistributionClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
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
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'contentDistribution';
    }
}
