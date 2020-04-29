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

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

error_reporting(E_STRICT);

require_once(dirname(__FILE__) . "/KalturaClientBase.php");

/**
 * Kaltura List Response.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaListResponse extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $totalCount = null;
}

/**
 * Kaltura Base Restriction.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseRestriction extends KalturaObjectBase {
}

/**
 * Kaltura Access Control.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControl extends KalturaObjectBase {
    /**
     * The id of the Access Control Profile
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
     * The name of the Access Control Profile
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Access Control Profile
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Access Control Profile
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * True if this Conversion Profile is the default
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Array of Access Control Restrictions
     *
     * @var array of KalturaBaseRestriction
     */
    public $restrictions;

    /**
     * Indicates that the access control profile is new and should be handled
     * using KalturaAccessControlProfile object and accessControlProfile service
     *
     * @var bool
     */
    public $containsUnsuportedRestrictions = null;
}

/**
 * Kaltura Context Type Holder.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContextTypeHolder extends KalturaObjectBase {
    /**
     * The type of the condition context
     *
     * @var KalturaContextType
     */
    public $type = null;
}

/**
 * Kaltura Access Control Context Type Holder.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlContextTypeHolder extends KalturaContextTypeHolder {
}

/**
 * Kaltura Access Control Message.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlMessage extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $message = null;

    /**
     *
     * @var string
     */
    public $code = null;
}

/**
 * Kaltura Client Rule Action.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRuleAction extends KalturaObjectBase {
    /**
     * The type of the action
     *
     * @var KalturaRuleActionType
     */
    public $type = null;
}

/**
 * Kaltura Condition.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCondition extends KalturaObjectBase {
    /**
     * The type of the access control condition
     *
     * @var KalturaConditionType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var bool
     */
    public $not = null;
}

/**
 * Kaltura Rule.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRule extends KalturaObjectBase {
    /**
     * Short Rule Description
     *
     * @var string
     */
    public $description = null;

    /**
     * Rule Custom Data to allow saving rule specific information
     *
     * @var string
     */
    public $ruleData = null;

    /**
     * Message to be thrown to the player in case the rule is fulfilled
     *
     * @var string
     */
    public $message = null;

    /**
     * Code to be thrown to the player in case the rule is fulfilled
     *
     * @var string
     */
    public $code = null;

    /**
     * Actions to be performed by the player in case the rule is fulfilled
     *
     * @var array of KalturaRuleAction
     */
    public $actions;

    /**
     * Conditions to validate the rule
     *
     * @var array of KalturaCondition
     */
    public $conditions;

    /**
     * Indicates what contexts should be tested by this rule
     *
     * @var array of KalturaContextTypeHolder
     */
    public $contexts;

    /**
     * Indicates that this rule is enough and no need to continue checking the rest of the rules
     *
     * @var bool
     */
    public $stopProcessing = null;

    /**
     * Indicates if we should force ks validation for admin ks users as well
     *
     * @var KalturaNullableBoolean
     */
    public $forceAdminValidation = null;
}

/**
 * Kaltura Access Control Profile.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlProfile extends KalturaObjectBase {
    /**
     * The id of the Access Control Profile
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
     * The name of the Access Control Profile
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Access Control Profile
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Access Control Profile
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Update time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * True if this access control profile is the partner default
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Array of access control rules
     *
     * @var array of KalturaRule
     */
    public $rules;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaKeyValue extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $key = null;

    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlScope extends KalturaObjectBase {
    /**
     * URL to be used to test domain conditions.
     *
     * @var string
     */
    public $referrer = null;

    /**
     * IP to be used to test geographic location conditions.
     *
     * @var string
     */
    public $ip = null;

    /**
     * Kaltura session to be used to test session and user conditions.
     *
     * @var string
     */
    public $ks = null;

    /**
     * Browser or client application to be used to test agent conditions.
     *
     * @var string
     */
    public $userAgent = null;

    /**
     * Unix timestamp (In seconds) to be used to test entry scheduling, keep null to use now.
     *
     * @var int
     */
    public $time = null;

    /**
     * Indicates what contexts should be tested. No contexts means any context.
     *
     * @var array of KalturaAccessControlContextTypeHolder
     */
    public $contexts;

    /**
     * Array of hashes to pass to the access control profile scope
     *
     * @var array of KalturaKeyValue
     */
    public $hashes;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportFilter extends KalturaObjectBase {
    /**
     * The dimension whose values should be filtered
     *
     * @var string
     */
    public $dimension = null;

    /**
     * The (comma separated) values to include in the filter
     *
     * @var string
     */
    public $values = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnalyticsFilter extends KalturaObjectBase {
    /**
     * Query start time (in local time) MM/dd/yyyy HH:mi
     *
     * @var string
     */
    public $from_time = null;

    /**
     * Query end time (in local time) MM/dd/yyyy HH:mi
     *
     * @var string
     */
    public $to_time = null;

    /**
     * Comma separated metrics list
     *
     * @var string
     */
    public $metrics = null;

    /**
     * Timezone offset from UTC (in minutes)
     *
     * @var float
     */
    public $utcOffset = null;

    /**
     * Comma separated dimensions list
     *
     * @var string
     */
    public $dimensions = null;

    /**
     * Array of filters
     *
     * @var array of KalturaReportFilter
     */
    public $filters;

    /**
     * Query order by metric/dimension
     *
     * @var string
     */
    public $orderBy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiExceptionArg extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppToken extends KalturaObjectBase {
    /**
     * The id of the application token
     *
     * @var string
     */
    public $id = null;

    /**
     * The application token
     *
     * @var string
     */
    public $token = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Creation time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Update time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Application token status
     *
     * @var KalturaAppTokenStatus
     */
    public $status = null;

    /**
     * Expiry time of current token (unix timestamp in seconds)
     *
     * @var int
     */
    public $expiry = null;

    /**
     * Type of KS (Kaltura Session) that created using the current token
     *
     * @var KalturaSessionType
     */
    public $sessionType = null;

    /**
     * User id of KS (Kaltura Session) that created using the current token
     *
     * @var string
     */
    public $sessionUserId = null;

    /**
     * Expiry duration of KS (Kaltura Session) that created using the current token (in seconds)
     *
     * @var int
     */
    public $sessionDuration = null;

    /**
     * Comma separated privileges to be applied on KS (Kaltura Session) that created using the current token
     *
     * @var string
     */
    public $sessionPrivileges = null;

    /**
     *
     * @var KalturaAppTokenHashType
     */
    public $hashType = null;

    /**
     *
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
class KalturaAsset extends KalturaObjectBase {
    /**
     * The ID of the Flavor Asset
     *
     * @var string
     */
    public $id = null;

    /**
     * The entry ID of the Flavor Asset
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * The version of the Flavor Asset
     *
     * @var int
     */
    public $version = null;

    /**
     * The size (in KBytes) of the Flavor Asset
     *
     * @var int
     */
    public $size = null;

    /**
     * Tags used to identify the Flavor Asset in various scenarios
     *
     * @var string
     */
    public $tags = null;

    /**
     * The file extension
     *
     * @var string
     */
    public $fileExt = null;

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
    public $deletedAt = null;

    /**
     * System description, error message, warnings and failure cause.
     *
     * @var string
     */
    public $description = null;

    /**
     * Partner private data
     *
     * @var string
     */
    public $partnerData = null;

    /**
     * Partner friendly description
     *
     * @var string
     */
    public $partnerDescription = null;

    /**
     * Comma separated list of source flavor params ids
     *
     * @var string
     */
    public $actualSourceAssetParamsIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaString extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParams extends KalturaObjectBase {
    /**
     * The id of the Flavor Params
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
     * The name of the Flavor Params
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Flavor Params
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Flavor Params
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * True if those Flavor Params are part of system defaults
     *
     * @var KalturaNullableBoolean
     */
    public $isSystemDefault = null;

    /**
     * The Flavor Params tags are used to identify the flavor for different usage (e.g. web, hd, mobile)
     *
     * @var string
     */
    public $tags = null;

    /**
     * Array of partner permisison names that required for using this asset params
     *
     * @var array of KalturaString
     */
    public $requiredPermissions;

    /**
     * Id of remote storage profile that used to get the source, zero indicates Kaltura data center
     *
     * @var int
     */
    public $sourceRemoteStorageProfileId = null;

    /**
     * Comma seperated ids of remote storage profiles that the flavor distributed to, the distribution done by the conversion engine
     *
     * @var int
     */
    public $remoteStorageProfileIds = null;

    /**
     * Media parser type to be used for post-conversion validation
     *
     * @var KalturaMediaParserType
     */
    public $mediaParserType = null;

    /**
     * Comma seperated ids of source flavor params this flavor is created from
     *
     * @var string
     */
    public $sourceAssetParamsIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaResource extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaContentResource extends KalturaResource{
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsResourceContainer extends KalturaResource {
    /**
     * The content resource to associate with asset params
     *
     * @var KalturaContentResource
     */
    public $resource;

    /**
     * The asset params to associate with the reaource
     *
     * @var int
     */
    public $assetParamsId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetServeOptions extends KalturaObjectBase {
    /**
     *
     * @var bool
     */
    public $download = null;

    /**
     *
     * @var string
     */
    public $referrer = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaOperationAttributes extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntry extends KalturaObjectBase {
    /**
     * Auto generated 10 characters alphanumeric string
     *
     * @var string
     */
    public $id = null;

    /**
     * Entry name (Min 1 chars)
     *
     * @var string
     */
    public $name = null;

    /**
     * Entry description
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * The ID of the user who is the owner of this entry
     *
     * @var string
     */
    public $userId = null;

    /**
     * The ID of the user who created this entry
     *
     * @var string
     */
    public $creatorId = null;

    /**
     * Entry tags
     *
     * @var string
     */
    public $tags = null;

    /**
     * Entry admin tags can be updated only by administrators
     *
     * @var string
     */
    public $adminTags = null;

    /**
     * Comma separated list of full names of categories to which this entry belongs.
     * Only categories that don't have entitlement (privacy context) are listed,
     * to retrieve the full list of categories, use the categoryEntry.list action.
     *
     * @var string
     */
    public $categories = null;

    /**
     * Comma separated list of ids of categories to which this entry belongs.
     * Only categories that don't have entitlement (privacy context) are listed,
     * to retrieve the full list of categories, use the categoryEntry.list action.
     *
     * @var string
     */
    public $categoriesIds = null;

    /**
     *
     * @var KalturaEntryStatus
     */
    public $status = null;

    /**
     * Entry moderation status
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatus = null;

    /**
     * Number of moderation requests waiting for this entry
     *
     * @var int
     */
    public $moderationCount = null;

    /**
     * The type of the entry, this is auto filled by the derived entry object
     *
     * @var KalturaEntryType
     */
    public $type = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Entry update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * The calculated average rank. rank = totalRank / votes
     *
     * @var float
     */
    public $rank = null;

    /**
     * The sum of all rank values submitted to the baseEntry.anonymousRank action
     *
     * @var int
     */
    public $totalRank = null;

    /**
     * A count of all requests made to the baseEntry.anonymousRank action
     *
     * @var int
     */
    public $votes = null;

    /**
     *
     * @var int
     */
    public $groupId = null;

    /**
     * Can be used to store various partner related data as a string
     *
     * @var string
     */
    public $partnerData = null;

    /**
     * Download URL for the entry
     *
     * @var string
     */
    public $downloadUrl = null;

    /**
     * Indexed search text for full text search
     *
     * @var string
     */
    public $searchText = null;

    /**
     * License type used for this entry
     *
     * @var KalturaLicenseType
     */
    public $licenseType = null;

    /**
     * Version of the entry data
     *
     * @var int
     */
    public $version = null;

    /**
     * Thumbnail URL
     *
     * @var string
     */
    public $thumbnailUrl = null;

    /**
     * The Access Control ID assigned to this entry (null when not set, send -1 to remove)
     *
     * @var int
     */
    public $accessControlId = null;

    /**
     * Entry scheduling start date (null when not set, send -1 to remove)
     *
     * @var int
     */
    public $startDate = null;

    /**
     * Entry scheduling end date (null when not set, send -1 to remove)
     *
     * @var int
     */
    public $endDate = null;

    /**
     * Entry external reference id
     *
     * @var string
     */
    public $referenceId = null;

    /**
     * ID of temporary entry that will replace this entry when it's approved and ready for replacement
     *
     * @var string
     */
    public $replacingEntryId = null;

    /**
     * ID of the entry that will be replaced when the replacement approved and this entry is ready
     *
     * @var string
     */
    public $replacedEntryId = null;

    /**
     * Status of the replacement readiness and approval
     *
     * @var KalturaEntryReplacementStatus
     */
    public $replacementStatus = null;

    /**
     * Can be used to store various partner related data as a numeric value
     *
     * @var int
     */
    public $partnerSortValue = null;

    /**
     * Override the default ingestion profile
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     * IF not empty, points to an entry ID the should replace this current entry's id.
     *
     * @var string
     */
    public $redirectEntryId = null;

    /**
     * ID of source root entry, used for clipped, skipped and cropped entries that created from another entry
     *
     * @var string
     */
    public $rootEntryId = null;

    /**
     * ID of source root entry, used for defining entires association
     *
     * @var string
     */
    public $parentEntryId = null;

    /**
     * clipping, skipping and cropping attributes that used to create this entry
     *
     * @var array of KalturaOperationAttributes
     */
    public $operationAttributes;

    /**
     * list of user ids that are entitled to edit the entry (no server enforcement)
     * The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
     *
     * @var string
     */
    public $entitledUsersEdit = null;

    /**
     * list of user ids that are entitled to publish the entry (no server enforcement)
     * The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
     *
     * @var string
     */
    public $entitledUsersPublish = null;

    /**
     * list of user ids that are entitled to view the entry (no server enforcement)
     * The difference between entitledUsersEdit, entitledUsersPublish and entitledUsersView is applicative only
     *
     * @var string
     */
    public $entitledUsersView = null;

    /**
     * Comma seperated string of the capabilities of the entry. Any capability needed can be added to this list.
     *
     * @var string
     */
    public $capabilities = null;

    /**
     * Template entry id
     *
     * @var string
     */
    public $templateEntryId = null;

    /**
     * should we display this entry in search
     *
     * @var KalturaEntryDisplayInSearchType
     */
    public $displayInSearch = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseEntryCloneOptionItem extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseResponseProfile extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseSyndicationFeed extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $feedUrl = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * link a playlist that will set what content the feed will include
     *      if empty, all content will be included in feed
     *
     * @var string
     */
    public $playlistId = null;

    /**
     * feed name
     *
     * @var string
     */
    public $name = null;

    /**
     * feed status
     *
     * @var KalturaSyndicationFeedStatus
     */
    public $status = null;

    /**
     * feed type
     *
     * @var KalturaSyndicationFeedType
     */
    public $type = null;

    /**
     * Base URL for each video, on the partners site
     *      This is required by all syndication types.
     *
     * @var string
     */
    public $landingPage = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * allow_embed tells google OR yahoo weather to allow embedding the video on google OR yahoo video results
     *      or just to provide a link to the landing page.
     *      it is applied on the video-player_loc property in the XML (google)
     *      and addes media-player tag (yahoo)
     *
     * @var bool
     */
    public $allowEmbed = null;

    /**
     * Select a uiconf ID as player skin to include in the kwidget url
     *
     * @var int
     */
    public $playerUiconfId = null;

    /**
     *
     * @var int
     */
    public $flavorParamId = null;

    /**
     *
     * @var bool
     */
    public $transcodeExistingContent = null;

    /**
     *
     * @var bool
     */
    public $addToDefaultConversionProfile = null;

    /**
     *
     * @var string
     */
    public $categories = null;

    /**
     *
     * @var int
     */
    public $storageId = null;

    /**
     *
     * @var KalturaSyndicationFeedEntriesOrderBy
     */
    public $entriesOrderBy = null;

    /**
     * Should enforce entitlement on feed entries
     *
     * @var bool
     */
    public $enforceEntitlement = null;

    /**
     * Set privacy context for search entries that assiged to private and public categories within a category privacy context.
     *
     * @var string
     */
    public $privacyContext = null;

    /**
     * Update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var bool
     */
    public $useCategoryEntries = null;

    /**
     * Feed content-type header value
     *
     * @var string
     */
    public $feedContentTypeHeader = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaJobData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchHistoryData extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     *
     * @var int
     */
    public $workerId = null;

    /**
     *
     * @var int
     */
    public $batchIndex = null;

    /**
     *
     * @var int
     */
    public $timeStamp = null;

    /**
     *
     * @var string
     */
    public $message = null;

    /**
     *
     * @var int
     */
    public $errType = null;

    /**
     *
     * @var int
     */
    public $errNumber = null;

    /**
     *
     * @var string
     */
    public $hostName = null;

    /**
     *
     * @var string
     */
    public $sessionId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJob extends KalturaObjectBase {
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
    public $deletedAt = null;

    /**
     *
     * @var int
     */
    public $lockExpiration = null;

    /**
     *
     * @var int
     */
    public $executionAttempts = null;

    /**
     *
     * @var int
     */
    public $lockVersion = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var string
     */
    public $entryName = null;

    /**
     *
     * @var KalturaBatchJobType
     */
    public $jobType = null;

    /**
     *
     * @var int
     */
    public $jobSubType = null;

    /**
     *
     * @var KalturaJobData
     */
    public $data;

    /**
     *
     * @var KalturaBatchJobStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $abort = null;

    /**
     *
     * @var int
     */
    public $checkAgainTimeout = null;

    /**
     *
     * @var string
     */
    public $message = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var int
     */
    public $priority = null;

    /**
     *
     * @var array of KalturaBatchHistoryData
     */
    public $history;

    /**
     * The id of the bulk upload job that initiated this job
     *
     * @var int
     */
    public $bulkJobId = null;

    /**
     *
     * @var int
     */
    public $batchVersion = null;

    /**
     * When one job creates another - the parent should set this parentJobId to be its own id.
     *
     * @var int
     */
    public $parentJobId = null;

    /**
     * The id of the root parent job
     *
     * @var int
     */
    public $rootJobId = null;

    /**
     * The time that the job was pulled from the queue
     *
     * @var int
     */
    public $queueTime = null;

    /**
     * The time that the job was finished or closed as failed
     *
     * @var int
     */
    public $finishTime = null;

    /**
     *
     * @var KalturaBatchJobErrorTypes
     */
    public $errType = null;

    /**
     *
     * @var int
     */
    public $errNumber = null;

    /**
     *
     * @var int
     */
    public $estimatedEffort = null;

    /**
     *
     * @var int
     */
    public $urgency = null;

    /**
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     *
     * @var int
     */
    public $workerId = null;

    /**
     *
     * @var int
     */
    public $batchIndex = null;

    /**
     *
     * @var int
     */
    public $lastSchedulerId = null;

    /**
     *
     * @var int
     */
    public $lastWorkerId = null;

    /**
     *
     * @var int
     */
    public $dc = null;

    /**
     *
     * @var string
     */
    public $jobObjectId = null;

    /**
     *
     * @var int
     */
    public $jobObjectType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayerDeliveryType extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $label = null;

    /**
     *
     * @var array of KalturaKeyValue
     */
    public $flashvars;

    /**
     *
     * @var string
     */
    public $minVersion = null;

    /**
     *
     * @var bool
     */
    public $enabledByDefault = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayerEmbedCodeType extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $label = null;

    /**
     *
     * @var bool
     */
    public $entryOnly = null;

    /**
     *
     * @var string
     */
    public $minVersion = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchLanguageItem extends KalturaObjectBase {
    /**
     *
     * @var KalturaESearchLanguage
     */
    public $eSerachLanguage = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartner extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $website = null;

    /**
     *
     * @var string
     */
    public $notificationUrl = null;

    /**
     *
     * @var int
     */
    public $appearInSearch = null;

    /**
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * deprecated - lastName and firstName replaces this field
     *
     * @var string
     */
    public $adminName = null;

    /**
     *
     * @var string
     */
    public $adminEmail = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaCommercialUseType
     */
    public $commercialUse = null;

    /**
     *
     * @var string
     */
    public $landingPage = null;

    /**
     *
     * @var string
     */
    public $userLandingPage = null;

    /**
     *
     * @var string
     */
    public $contentCategories = null;

    /**
     *
     * @var KalturaPartnerType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $phone = null;

    /**
     *
     * @var string
     */
    public $describeYourself = null;

    /**
     *
     * @var bool
     */
    public $adultContent = null;

    /**
     *
     * @var string
     */
    public $defConversionProfileType = null;

    /**
     *
     * @var int
     */
    public $notify = null;

    /**
     *
     * @var KalturaPartnerStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $allowQuickEdit = null;

    /**
     *
     * @var int
     */
    public $mergeEntryLists = null;

    /**
     *
     * @var string
     */
    public $notificationsConfig = null;

    /**
     *
     * @var int
     */
    public $maxUploadSize = null;

    /**
     *
     * @var int
     */
    public $partnerPackage = null;

    /**
     *
     * @var string
     */
    public $secret = null;

    /**
     *
     * @var string
     */
    public $adminSecret = null;

    /**
     *
     * @var string
     */
    public $cmsPassword = null;

    /**
     *
     * @var int
     */
    public $allowMultiNotification = null;

    /**
     *
     * @var int
     */
    public $adminLoginUsersQuota = null;

    /**
     *
     * @var string
     */
    public $adminUserId = null;

    /**
     * firstName and lastName replace the old (deprecated) adminName
     *
     * @var string
     */
    public $firstName = null;

    /**
     * lastName and firstName replace the old (deprecated) adminName
     *
     * @var string
     */
    public $lastName = null;

    /**
     * country code (2char) - this field is optional
     *
     * @var string
     */
    public $country = null;

    /**
     * state code (2char) - this field is optional
     *
     * @var string
     */
    public $state = null;

    /**
     *
     * @var array of KalturaKeyValue
     */
    public $additionalParams;

    /**
     *
     * @var int
     */
    public $publishersQuota = null;

    /**
     *
     * @var KalturaPartnerGroupType
     */
    public $partnerGroupType = null;

    /**
     *
     * @var bool
     */
    public $defaultEntitlementEnforcement = null;

    /**
     *
     * @var string
     */
    public $defaultDeliveryType = null;

    /**
     *
     * @var string
     */
    public $defaultEmbedCodeType = null;

    /**
     *
     * @var array of KalturaPlayerDeliveryType
     */
    public $deliveryTypes;

    /**
     *
     * @var array of KalturaPlayerEmbedCodeType
     */
    public $embedCodeTypes;

    /**
     *
     * @var int
     */
    public $templatePartnerId = null;

    /**
     *
     * @var bool
     */
    public $ignoreSeoLinks = null;

    /**
     *
     * @var string
     */
    public $host = null;

    /**
     *
     * @var string
     */
    public $cdnHost = null;

    /**
     *
     * @var bool
     */
    public $isFirstLogin = null;

    /**
     *
     * @var string
     */
    public $logoutUrl = null;

    /**
     *
     * @var int
     */
    public $partnerParentId = null;

    /**
     *
     * @var string
     */
    public $crmId = null;

    /**
     *
     * @var string
     */
    public $referenceId = null;

    /**
     *
     * @var bool
     */
    public $timeAlignedRenditions = null;

    /**
     *
     * @var array of KalturaESearchLanguageItem
     */
    public $eSearchLanguages;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaValue extends KalturaObjectBase {
    /**
     *
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
class KalturaBooleanValue extends KalturaValue {
    /**
     *
     * @var bool
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadPluginData extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $field = null;

    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResult extends KalturaObjectBase {
    /**
     * The id of the result
     *
     * @var int
     */
    public $id = null;

    /**
     * The id of the parent job
     *
     * @var int
     */
    public $bulkUploadJobId = null;

    /**
     * The index of the line in the CSV
     *
     * @var int
     */
    public $lineIndex = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaBulkUploadResultStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaBulkUploadAction
     */
    public $action = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var int
     */
    public $objectStatus = null;

    /**
     *
     * @var KalturaBulkUploadObjectType
     */
    public $bulkUploadResultObjectType = null;

    /**
     * The data as recieved in the csv
     *
     * @var string
     */
    public $rowData = null;

    /**
     *
     * @var string
     */
    public $partnerData = null;

    /**
     *
     * @var string
     */
    public $objectErrorDescription = null;

    /**
     *
     * @var array of KalturaBulkUploadPluginData
     */
    public $pluginsData;

    /**
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     * @var string
     */
    public $errorCode = null;

    /**
     *
     * @var int
     */
    public $errorType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUpload extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $uploadedBy = null;

    /**
     *
     * @var string
     */
    public $uploadedByUserId = null;

    /**
     *
     * @var int
     */
    public $uploadedOn = null;

    /**
     *
     * @var int
     */
    public $numOfEntries = null;

    /**
     *
     * @var KalturaBatchJobStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $logFileUrl = null;

    /**
     *
     * @var string
     */
    public $csvFileUrl = null;

    /**
     *
     * @var string
     */
    public $bulkFileUrl = null;

    /**
     *
     * @var KalturaBulkUploadType
     */
    public $bulkUploadType = null;

    /**
     *
     * @var array of KalturaBulkUploadResult
     */
    public $results;

    /**
     *
     * @var string
     */
    public $error = null;

    /**
     *
     * @var KalturaBatchJobErrorTypes
     */
    public $errorType = null;

    /**
     *
     * @var int
     */
    public $errorNumber = null;

    /**
     *
     * @var string
     */
    public $fileName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var int
     */
    public $numOfObjects = null;

    /**
     *
     * @var KalturaBulkUploadObjectType
     */
    public $bulkUploadObjectType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBulkUploadObjectData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCEError extends KalturaObjectBase {
    /**
     *
     * @var string
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
    public $browser = null;

    /**
     *
     * @var string
     */
    public $serverIp = null;

    /**
     *
     * @var string
     */
    public $serverOs = null;

    /**
     *
     * @var string
     */
    public $phpVersion = null;

    /**
     *
     * @var string
     */
    public $ceAdminEmail = null;

    /**
     *
     * @var string
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
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
class KalturaCategory extends KalturaObjectBase {
    /**
     * The id of the Category
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $parentId = null;

    /**
     *
     * @var int
     */
    public $depth = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * The name of the Category.
     * The following characters are not allowed: '<', '>', ','
     *
     * @var string
     */
    public $name = null;

    /**
     * The full name of the Category
     *
     * @var string
     */
    public $fullName = null;

    /**
     * The full ids of the Category
     *
     * @var string
     */
    public $fullIds = null;

    /**
     * Number of entries in this Category (including child categories)
     *
     * @var int
     */
    public $entriesCount = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Category description
     *
     * @var string
     */
    public $description = null;

    /**
     * Category tags
     *
     * @var string
     */
    public $tags = null;

    /**
     * If category will be returned for list action.
     *
     * @var KalturaAppearInListType
     */
    public $appearInList = null;

    /**
     * defines the privacy of the entries that assigned to this category
     *
     * @var KalturaPrivacyType
     */
    public $privacy = null;

    /**
     * If Category members are inherited from parent category or set manualy.
     *
     * @var KalturaInheritanceType
     */
    public $inheritanceType = null;

    /**
     * Who can ask to join this category
     *
     * @var KalturaUserJoinPolicyType
     */
    public $userJoinPolicy = null;

    /**
     * Default permissionLevel for new users
     *
     * @var KalturaCategoryUserPermissionLevel
     */
    public $defaultPermissionLevel = null;

    /**
     * Category Owner (User id)
     *
     * @var string
     */
    public $owner = null;

    /**
     * Number of entries that belong to this category directly
     *
     * @var int
     */
    public $directEntriesCount = null;

    /**
     * Category external id, controlled and managed by the partner.
     *
     * @var string
     */
    public $referenceId = null;

    /**
     * who can assign entries to this category
     *
     * @var KalturaContributionPolicyType
     */
    public $contributionPolicy = null;

    /**
     * Number of active members for this category
     *
     * @var int
     */
    public $membersCount = null;

    /**
     * Number of pending members for this category
     *
     * @var int
     */
    public $pendingMembersCount = null;

    /**
     * Set privacy context for search entries that assiged to private and public categories.
     * the entries will be private if the search context is set with those categories.
     *
     * @var string
     */
    public $privacyContext = null;

    /**
     * comma separated parents that defines a privacyContext for search
     *
     * @var string
     */
    public $privacyContexts = null;

    /**
     * Status
     *
     * @var KalturaCategoryStatus
     */
    public $status = null;

    /**
     * The category id that this category inherit its members and members permission (for contribution and join)
     *
     * @var int
     */
    public $inheritedParentId = null;

    /**
     * Can be used to store various partner related data as a numeric value
     *
     * @var int
     */
    public $partnerSortValue = null;

    /**
     * Can be used to store various partner related data as a string
     *
     * @var string
     */
    public $partnerData = null;

    /**
     * Enable client side applications to define how to sort the category child categories
     *
     * @var KalturaCategoryOrderBy
     */
    public $defaultOrderBy = null;

    /**
     * Number of direct children categories
     *
     * @var int
     */
    public $directSubCategoriesCount = null;

    /**
     * Moderation to add entries to this category by users that are not of permission level Manager or Moderator.
     *
     * @var KalturaNullableBoolean
     */
    public $moderation = null;

    /**
     * Nunber of pending moderation entries
     *
     * @var int
     */
    public $pendingEntriesCount = null;

    /**
     * Flag indicating that the category is an aggregation category
     *
     * @var KalturaNullableBoolean
     */
    public $isAggregationCategory = null;

    /**
     * List of aggregation channels the category belongs to
     *
     * @var string
     */
    public $aggregationCategories = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntry extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $categoryId = null;

    /**
     * entry id
     *
     * @var string
     */
    public $entryId = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * The full ids of the Category
     *
     * @var string
     */
    public $categoryFullIds = null;

    /**
     * CategroyEntry status
     *
     * @var KalturaCategoryEntryStatus
     */
    public $status = null;

    /**
     * CategroyEntry creator puser ID
     *
     * @var string
     */
    public $creatorUserId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUser extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $categoryId = null;

    /**
     * User id
     *
     * @var string
     */
    public $userId = null;

    /**
     * Partner id
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Permission level
     *
     * @var KalturaCategoryUserPermissionLevel
     */
    public $permissionLevel = null;

    /**
     * Status
     *
     * @var KalturaCategoryUserStatus
     */
    public $status = null;

    /**
     * CategoryUser creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * CategoryUser update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Update method can be either manual or automatic to distinguish
     * between manual operations (for example in KMC) on automatic - using bulk upload
     *
     * @var KalturaUpdateMethodType
     */
    public $updateMethod = null;

    /**
     * The full ids of the Category
     *
     * @var string
     */
    public $categoryFullIds = null;

    /**
     * Set of category-related permissions for the current category user.
     *
     * @var string
     */
    public $permissionNames = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientConfiguration extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $clientTag = null;

    /**
     *
     * @var string
     */
    public $apiVersion = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClientNotification extends KalturaObjectBase {
    /**
     * The URL where the notification should be sent to
     *
     * @var string
     */
    public $url = null;

    /**
     * The serialized notification data to send
     *
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
abstract class KalturaContext extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContextDataResult extends KalturaObjectBase {
    /**
     * Array of messages as received from the rules that invalidated
     *
     * @var array of KalturaString
     */
    public $messages;

    /**
     * Array of actions as received from the rules that invalidated
     *
     * @var array of KalturaRuleAction
     */
    public $actions;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommand extends KalturaObjectBase {
    /**
     * The id of the Category
     *
     * @var int
     */
    public $id = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Creator name
     *
     * @var string
     */
    public $createdBy = null;

    /**
     * Update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Updater name
     *
     * @var string
     */
    public $updatedBy = null;

    /**
     * Creator id
     *
     * @var int
     */
    public $createdById = null;

    /**
     * The id of the scheduler that the command refers to
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     * The id of the scheduler worker that the command refers to
     *
     * @var int
     */
    public $workerId = null;

    /**
     * The id of the scheduler worker as configured in the ini file
     *
     * @var int
     */
    public $workerConfiguredId = null;

    /**
     * The name of the scheduler worker that the command refers to
     *
     * @var int
     */
    public $workerName = null;

    /**
     * The index of the batch process that the command refers to
     *
     * @var int
     */
    public $batchIndex = null;

    /**
     * The command type - stop / start / config
     *
     * @var KalturaControlPanelCommandType
     */
    public $type = null;

    /**
     * The command target type - data center / scheduler / job / job type
     *
     * @var KalturaControlPanelCommandTargetType
     */
    public $targetType = null;

    /**
     * The command status
     *
     * @var KalturaControlPanelCommandStatus
     */
    public $status = null;

    /**
     * The reason for the command
     *
     * @var string
     */
    public $cause = null;

    /**
     * Command description
     *
     * @var string
     */
    public $description = null;

    /**
     * Error description
     *
     * @var string
     */
    public $errorDescription = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionAttribute extends KalturaObjectBase {
    /**
     * The id of the flavor params, set to null for source flavor
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     * Attribute name
     *
     * @var string
     */
    public $name = null;

    /**
     * Attribute value
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCropDimensions extends KalturaObjectBase {
    /**
     * Crop left point
     *
     * @var int
     */
    public $left = null;

    /**
     * Crop top point
     *
     * @var int
     */
    public $top = null;

    /**
     * Crop width
     *
     * @var int
     */
    public $width = null;

    /**
     * Crop height
     *
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
abstract class KalturaPluginReplacementOptionsItem extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryReplacementOptions extends KalturaObjectBase {
    /**
     * If true manually created thumbnails will not be deleted on entry replacement
     *
     * @var int
     */
    public $keepManualThumbnails = null;

    /**
     * Array of plugin replacement options
     *
     * @var array of KalturaPluginReplacementOptionsItem
     */
    public $pluginOptionItems;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfile extends KalturaObjectBase {
    /**
     * The id of the Conversion Profile
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
     * @var KalturaConversionProfileStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaConversionProfileType
     */
    public $type = null;

    /**
     * The name of the Conversion Profile
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Conversion Profile
     *
     * @var string
     */
    public $systemName = null;

    /**
     * Comma separated tags
     *
     * @var string
     */
    public $tags = null;

    /**
     * The description of the Conversion Profile
     *
     * @var string
     */
    public $description = null;

    /**
     * ID of the default entry to be used for template data
     *
     * @var string
     */
    public $defaultEntryId = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * List of included flavor ids (comma separated)
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     * Indicates that this conversion profile is system default
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Indicates that this conversion profile is partner default
     *
     * @var bool
     */
    public $isPartnerDefault = null;

    /**
     * Cropping dimensions
     *
     * @var KalturaCropDimensions
     */
    public $cropDimensions;

    /**
     * Clipping start position (in miliseconds)
     *
     * @var int
     */
    public $clipStart = null;

    /**
     * Clipping duration (in miliseconds)
     *
     * @var int
     */
    public $clipDuration = null;

    /**
     * XSL to transform ingestion MRSS XML
     *
     * @var string
     */
    public $xslTransformation = null;

    /**
     * ID of default storage profile to be used for linked net-storage file syncs
     *
     * @var int
     */
    public $storageProfileId = null;

    /**
     * Media parser type to be used for extract media
     *
     * @var KalturaMediaParserType
     */
    public $mediaParserType = null;

    /**
     * Should calculate file conversion complexity
     *
     * @var KalturaNullableBoolean
     */
    public $calculateComplexity = null;

    /**
     * Defines the tags that should be used to define 'collective'/group/multi-flavor processing,
     *      like 'mbr' or 'ism'
     *
     * @var string
     */
    public $collectionTags = null;

    /**
     * JSON string with array of "condition,profile-id" pairs.
     *
     * @var string
     */
    public $conditionalProfiles = null;

    /**
     * When set, the ExtractMedia job should detect the source file GOP using this value as the max calculated period
     *
     * @var int
     */
    public $detectGOP = null;

    /**
     * XSL to transform ingestion Media Info XML
     *
     * @var string
     */
    public $mediaInfoXslTransformation = null;

    /**
     * Default replacement options to be applied to entries
     *
     * @var KalturaEntryReplacementOptions
     */
    public $defaultReplacementOptions;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParams extends KalturaObjectBase {
    /**
     * The id of the conversion profile
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     * The id of the asset params
     *
     * @var int
     */
    public $assetParamsId = null;

    /**
     * The ingestion origin of the asset params
     *
     * @var KalturaFlavorReadyBehaviorType
     */
    public $readyBehavior = null;

    /**
     * The ingestion origin of the asset params
     *
     * @var KalturaAssetParamsOrigin
     */
    public $origin = null;

    /**
     * Asset params system name
     *
     * @var string
     */
    public $systemName = null;

    /**
     * Starts conversion even if the decision layer reduced the configuration to comply with the source
     *
     * @var KalturaNullableBoolean
     */
    public $forceNoneComplied = null;

    /**
     * Specifies how to treat the flavor after conversion is finished
     *
     * @var KalturaAssetParamsDeletePolicy
     */
    public $deletePolicy = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isEncrypted = null;

    /**
     *
     * @var float
     */
    public $contentAwareness = null;

    /**
     *
     * @var int
     */
    public $chunkedEncodeMode = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $twoPass = null;

    /**
     *
     * @var string
     */
    public $tags = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConvertCollectionFlavorData extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var int
     */
    public $flavorParamsOutputId = null;

    /**
     *
     * @var int
     */
    public $readyBehavior = null;

    /**
     *
     * @var int
     */
    public $videoBitrate = null;

    /**
     *
     * @var int
     */
    public $audioBitrate = null;

    /**
     *
     * @var string
     */
    public $destFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $destFileSyncRemoteUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCoordinate extends KalturaObjectBase {
    /**
     *
     * @var float
     */
    public $latitude = null;

    /**
     *
     * @var float
     */
    public $longitude = null;

    /**
     *
     * @var string
     */
    public $name = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntry extends KalturaBaseEntry {
    /**
     * The data of the entry
     *
     * @var string
     */
    public $dataContent = null;

    /**
     * indicator whether to return the object for get action with the dataContent field.
     *
     * @var bool
     */
    public $retrieveDataContentByGet = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlRecognizer extends KalturaObjectBase {
    /**
     * The hosts that are recognized
     *
     * @var string
     */
    public $hosts = null;

    /**
     * The URI prefix we use for security
     *
     * @var string
     */
    public $uriPrefix = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizer extends KalturaObjectBase {
    /**
     * Window
     *
     * @var int
     */
    public $window = null;

    /**
     * key
     *
     * @var string
     */
    public $key = null;

    /**
     *
     * @var bool
     */
    public $limitIpAddress = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSearchItem extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFilter extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $orderBy = null;

    /**
     *
     * @var KalturaSearchItem
     */
    public $advancedSearch;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRelatedFilter extends KalturaFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAssetBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdIn = null;

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
    public $sizeGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $sizeLessThanOrEqual = null;

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
    public $deletedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $deletedAtLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetFilter extends KalturaAssetBaseFilter {
    /**
     *
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
class KalturaDeliveryProfile extends KalturaObjectBase {
    /**
     * The id of the Delivery
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
     * The name of the Delivery
     *
     * @var string
     */
    public $name = null;

    /**
     * Delivery type
     *
     * @var KalturaDeliveryProfileType
     */
    public $type = null;

    /**
     * System name of the delivery
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Delivery
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Update time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaPlaybackProtocol
     */
    public $streamerType = null;

    /**
     *
     * @var string
     */
    public $url = null;

    /**
     * the host part of the url
     *
     * @var string
     */
    public $hostName = null;

    /**
     *
     * @var KalturaDeliveryStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaUrlRecognizer
     */
    public $recognizer;

    /**
     *
     * @var KalturaUrlTokenizer
     */
    public $tokenizer;

    /**
     * True if this is the systemwide default for the protocol
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * the object from which this object was cloned (or 0)
     *
     * @var int
     */
    public $parentId = null;

    /**
     * Comma separated list of supported media protocols. f.i. rtmpe
     *
     * @var string
     */
    public $mediaProtocols = null;

    /**
     * priority used for ordering similar delivery profiles
     *
     * @var int
     */
    public $priority = null;

    /**
     * Extra query string parameters that should be added to the url
     *
     * @var string
     */
    public $extraParams = null;

    /**
     * A filter that can be used to include additional assets in the URL (e.g. captions)
     *
     * @var KalturaAssetFilter
     */
    public $supplementaryAssetsFilter;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncDescriptor extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $fileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $fileEncryptionKey = null;

    /**
     * The translated path as used by the scheduler
     *
     * @var string
     */
    public $fileSyncRemoteUrl = null;

    /**
     *
     * @var int
     */
    public $fileSyncObjectSubType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDestFileSyncDescriptor extends KalturaFileSyncDescriptor {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPager extends KalturaObjectBase {
    /**
     * The number of objects to retrieve. (Default is 30, maximum page size is 500).
     *
     * @var int
     */
    public $pageSize = null;

    /**
     * The page number for which {pageSize} of objects should be retrieved (Default is 1).
     *
     * @var int
     */
    public $pageIndex = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFilterPager extends KalturaPager{
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileMapping extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $parentProperty = null;

    /**
     *
     * @var string
     */
    public $filterProperty = null;

    /**
     *
     * @var bool
     */
    public $allowNull = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDetachedResponseProfile extends KalturaBaseResponseProfile {
    /**
     * Friendly name
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var KalturaResponseProfileType
     */
    public $type = null;

    /**
     * Comma separated fields list to be included or excluded
     *
     * @var string
     */
    public $fields = null;

    /**
     *
     * @var KalturaRelatedFilter
     */
    public $filter;

    /**
     *
     * @var KalturaFilterPager
     */
    public $pager;

    /**
     *
     * @var array of KalturaDetachedResponseProfile
     */
    public $relatedProfiles;

    /**
     *
     * @var array of KalturaResponseProfileMapping
     */
    public $mappings;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPluginData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPlaybackPluginData extends KalturaPluginData {
    /**
     *
     * @var KalturaDrmSchemeName
     */
    public $scheme = null;

    /**
     *
     * @var string
     */
    public $licenseURL = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaObject extends KalturaObjectBase {
    /**
     *
     * @var map
     */
    public $relatedObjects;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfile extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

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
     * @var string
     */
    public $emailAddress = null;

    /**
     *
     * @var string
     */
    public $mailboxId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var int
     */
    public $conversionProfile2Id = null;

    /**
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatus = null;

    /**
     *
     * @var KalturaEmailIngestionProfileStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $createdAt = null;

    /**
     *
     * @var string
     */
    public $defaultCategory = null;

    /**
     *
     * @var string
     */
    public $defaultUserId = null;

    /**
     *
     * @var string
     */
    public $defaultTags = null;

    /**
     *
     * @var string
     */
    public $defaultAdminTags = null;

    /**
     *
     * @var int
     */
    public $maxAttachmentSizeKbytes = null;

    /**
     *
     * @var int
     */
    public $maxAttachmentsPerMail = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStringValue extends KalturaValue {
    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryServerNode extends KalturaObjectBase {
    /**
     * unique auto-generated identifier
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var int
     */
    public $serverNodeId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

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
     * @var KalturaEntryServerNodeStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaEntryServerNodeType
     */
    public $serverType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaObjectIdentifier extends KalturaObjectBase {
    /**
     * Comma separated string of enum values denoting which features of the item need to be included in the MRSS
     *
     * @var string
     */
    public $extendedFeatures = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExtendingItemMrssParameter extends KalturaObjectBase {
    /**
     * XPath for the extending item
     *
     * @var string
     */
    public $xpath = null;

    /**
     * Object identifier
     *
     * @var KalturaObjectIdentifier
     */
    public $identifier;

    /**
     * Mode of extension - append to MRSS or replace the xpath content.
     *
     * @var KalturaMrssExtensionMode
     */
    public $extensionMode = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntry extends KalturaBaseEntry {
    /**
     * Number of plays
     *
     * @var int
     */
    public $plays = null;

    /**
     * Number of views
     *
     * @var int
     */
    public $views = null;

    /**
     * The last time the entry was played
     *
     * @var int
     */
    public $lastPlayedAt = null;

    /**
     * The width in pixels
     *
     * @var int
     */
    public $width = null;

    /**
     * The height in pixels
     *
     * @var int
     */
    public $height = null;

    /**
     * The duration in seconds
     *
     * @var int
     */
    public $duration = null;

    /**
     * The duration in miliseconds
     *
     * @var int
     */
    public $msDuration = null;

    /**
     * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
     *
     * @var KalturaDurationType
     */
    public $durationType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStreamContainer extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $type = null;

    /**
     *
     * @var int
     */
    public $trackIndex = null;

    /**
     *
     * @var string
     */
    public $language = null;

    /**
     *
     * @var int
     */
    public $channelIndex = null;

    /**
     *
     * @var string
     */
    public $label = null;

    /**
     *
     * @var string
     */
    public $channelLayout = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntry extends KalturaPlayableEntry {
    /**
     * The media type of the entry
     *
     * @var KalturaMediaType
     */
    public $mediaType = null;

    /**
     * Override the default conversion quality
     *
     * @var string
     */
    public $conversionQuality = null;

    /**
     * The source type of the entry
     *
     * @var KalturaSourceType
     */
    public $sourceType = null;

    /**
     * The search provider type used to import this entry
     *
     * @var KalturaSearchProviderType
     */
    public $searchProviderType = null;

    /**
     * The ID of the media in the importing site
     *
     * @var string
     */
    public $searchProviderId = null;

    /**
     * The user name used for credits
     *
     * @var string
     */
    public $creditUserName = null;

    /**
     * The URL for credits
     *
     * @var string
     */
    public $creditUrl = null;

    /**
     * The media date extracted from EXIF data (For images) as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $mediaDate = null;

    /**
     * The URL used for playback. This is not the download URL.
     *
     * @var string
     */
    public $dataUrl = null;

    /**
     * Comma separated flavor params ids that exists for this media entry
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     * True if trim action is disabled for this entry
     *
     * @var KalturaNullableBoolean
     */
    public $isTrimDisabled = null;

    /**
     * Array of streams that exists on the entry
     *
     * @var array of KalturaStreamContainer
     */
    public $streams;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeatureStatus extends KalturaObjectBase {
    /**
     *
     * @var KalturaFeatureStatusType
     */
    public $type = null;

    /**
     *
     * @var int
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAsset extends KalturaObjectBase {
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
     * @var KalturaFileAssetObjectType
     */
    public $fileAssetObjectType = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $fileExt = null;

    /**
     *
     * @var int
     */
    public $version = null;

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
     * @var KalturaFileAssetStatus
     */
    public $status = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileContainer extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $filePath = null;

    /**
     *
     * @var string
     */
    public $encryptionKey = null;

    /**
     *
     * @var int
     */
    public $fileSize = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAsset extends KalturaAsset {
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     * @var int
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     * @var int
     */
    public $height = null;

    /**
     * The overall bitrate (in KBits) of the Flavor Asset
     *
     * @var int
     */
    public $bitrate = null;

    /**
     * The frame rate (in FPS) of the Flavor Asset
     *
     * @var float
     */
    public $frameRate = null;

    /**
     * True if this Flavor Asset is the original source
     *
     * @var bool
     */
    public $isOriginal = null;

    /**
     * True if this Flavor Asset is playable in KDP
     *
     * @var bool
     */
    public $isWeb = null;

    /**
     * The container format
     *
     * @var string
     */
    public $containerFormat = null;

    /**
     * The video codec
     *
     * @var string
     */
    public $videoCodecId = null;

    /**
     * The status of the Flavor Asset
     *
     * @var KalturaFlavorAssetStatus
     */
    public $status = null;

    /**
     * The language of the flavor asset
     *
     * @var KalturaLanguage
     */
    public $language = null;

    /**
     * The label of the flavor asset
     *
     * @var string
     */
    public $label = null;

    /**
     * Is default flavor asset of the entry
     * (This field will be taken into account selectign which audio flavor will be selected as default)
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetUrlOptions extends KalturaObjectBase {
    /**
     * The name of the downloaded file
     *
     * @var string
     */
    public $fileName = null;

    /**
     *
     * @var string
     */
    public $referrer = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParams extends KalturaAssetParams {
    /**
     * The video codec of the Flavor Params
     *
     * @var KalturaVideoCodec
     */
    public $videoCodec = null;

    /**
     * The video bitrate (in KBits) of the Flavor Params
     *
     * @var int
     */
    public $videoBitrate = null;

    /**
     * The audio codec of the Flavor Params
     *
     * @var KalturaAudioCodec
     */
    public $audioCodec = null;

    /**
     * The audio bitrate (in KBits) of the Flavor Params
     *
     * @var int
     */
    public $audioBitrate = null;

    /**
     * The number of audio channels for "downmixing"
     *
     * @var int
     */
    public $audioChannels = null;

    /**
     * The audio sample rate of the Flavor Params
     *
     * @var int
     */
    public $audioSampleRate = null;

    /**
     * The desired width of the Flavor Params
     *
     * @var int
     */
    public $width = null;

    /**
     * The desired height of the Flavor Params
     *
     * @var int
     */
    public $height = null;

    /**
     * The frame rate of the Flavor Params
     *
     * @var float
     */
    public $frameRate = null;

    /**
     * The gop size of the Flavor Params
     *
     * @var int
     */
    public $gopSize = null;

    /**
     * The list of conversion engines (comma separated)
     *
     * @var string
     */
    public $conversionEngines = null;

    /**
     * The list of conversion engines extra params (separated with "|")
     *
     * @var string
     */
    public $conversionEnginesExtraParams = null;

    /**
     *
     * @var bool
     */
    public $twoPass = null;

    /**
     *
     * @var int
     */
    public $deinterlice = null;

    /**
     *
     * @var int
     */
    public $rotate = null;

    /**
     *
     * @var string
     */
    public $operators = null;

    /**
     *
     * @var int
     */
    public $engineVersion = null;

    /**
     * The container format of the Flavor Params
     *
     * @var KalturaContainerFormat
     */
    public $format = null;

    /**
     *
     * @var int
     */
    public $aspectRatioProcessingMode = null;

    /**
     *
     * @var int
     */
    public $forceFrameToMultiplication16 = null;

    /**
     *
     * @var int
     */
    public $isGopInSec = null;

    /**
     *
     * @var int
     */
    public $isAvoidVideoShrinkFramesizeToSource = null;

    /**
     *
     * @var int
     */
    public $isAvoidVideoShrinkBitrateToSource = null;

    /**
     *
     * @var int
     */
    public $isVideoFrameRateForLowBrAppleHls = null;

    /**
     *
     * @var string
     */
    public $multiStream = null;

    /**
     *
     * @var float
     */
    public $anamorphicPixels = null;

    /**
     *
     * @var int
     */
    public $isAvoidForcedKeyFrames = null;

    /**
     *
     * @var int
     */
    public $forcedKeyFramesMode = null;

    /**
     *
     * @var int
     */
    public $isCropIMX = null;

    /**
     *
     * @var int
     */
    public $optimizationPolicy = null;

    /**
     *
     * @var int
     */
    public $maxFrameRate = null;

    /**
     *
     * @var int
     */
    public $videoConstantBitrate = null;

    /**
     *
     * @var int
     */
    public $videoBitrateTolerance = null;

    /**
     *
     * @var string
     */
    public $watermarkData = null;

    /**
     *
     * @var string
     */
    public $subtitlesData = null;

    /**
     *
     * @var int
     */
    public $isEncrypted = null;

    /**
     *
     * @var float
     */
    public $contentAwareness = null;

    /**
     *
     * @var int
     */
    public $chunkedEncodeMode = null;

    /**
     *
     * @var int
     */
    public $clipOffset = null;

    /**
     *
     * @var int
     */
    public $clipDuration = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetWithParams extends KalturaObjectBase {
    /**
     * The Flavor Asset (Can be null when there are params without asset)
     *
     * @var KalturaFlavorAsset
     */
    public $flavorAsset;

    /**
     * The Flavor Params
     *
     * @var KalturaFlavorParams
     */
    public $flavorParams;

    /**
     * The entry id
     *
     * @var string
     */
    public $entryId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOutput extends KalturaFlavorParams {
    /**
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     *
     * @var string
     */
    public $commandLinesStr = null;

    /**
     *
     * @var string
     */
    public $flavorParamsVersion = null;

    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var string
     */
    public $flavorAssetVersion = null;

    /**
     *
     * @var int
     */
    public $readyBehavior = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchedulerStatus extends KalturaObjectBase {
    /**
     * The id of the Category
     *
     * @var int
     */
    public $id = null;

    /**
     * The configured id of the scheduler
     *
     * @var int
     */
    public $schedulerConfiguredId = null;

    /**
     * The configured id of the job worker
     *
     * @var int
     */
    public $workerConfiguredId = null;

    /**
     * The type of the job worker.
     *
     * @var KalturaBatchJobType
     */
    public $workerType = null;

    /**
     * The status type
     *
     * @var KalturaSchedulerStatusType
     */
    public $type = null;

    /**
     * The status value
     *
     * @var int
     */
    public $value = null;

    /**
     * The id of the scheduler
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     * The id of the worker
     *
     * @var int
     */
    public $workerId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchedulerConfig extends KalturaObjectBase {
    /**
     * The id of the Category
     *
     * @var int
     */
    public $id = null;

    /**
     * Creator name
     *
     * @var string
     */
    public $createdBy = null;

    /**
     * Updater name
     *
     * @var string
     */
    public $updatedBy = null;

    /**
     * Id of the control panel command that created this config item
     *
     * @var string
     */
    public $commandId = null;

    /**
     * The status of the control panel command
     *
     * @var string
     */
    public $commandStatus = null;

    /**
     * The id of the scheduler
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     * The configured id of the scheduler
     *
     * @var int
     */
    public $schedulerConfiguredId = null;

    /**
     * The name of the scheduler
     *
     * @var string
     */
    public $schedulerName = null;

    /**
     * The id of the job worker
     *
     * @var int
     */
    public $workerId = null;

    /**
     * The configured id of the job worker
     *
     * @var int
     */
    public $workerConfiguredId = null;

    /**
     * The name of the job worker
     *
     * @var string
     */
    public $workerName = null;

    /**
     * The name of the variable
     *
     * @var string
     */
    public $variable = null;

    /**
     * The part of the variable
     *
     * @var string
     */
    public $variablePart = null;

    /**
     * The value of the variable
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchedulerWorker extends KalturaObjectBase {
    /**
     * The id of the Worker
     *
     * @var int
     */
    public $id = null;

    /**
     * The id as configured in the batch config
     *
     * @var int
     */
    public $configuredId = null;

    /**
     * The id of the Scheduler
     *
     * @var int
     */
    public $schedulerId = null;

    /**
     * The id of the scheduler as configured in the batch config
     *
     * @var int
     */
    public $schedulerConfiguredId = null;

    /**
     * The worker type
     *
     * @var KalturaBatchJobType
     */
    public $type = null;

    /**
     * The friendly name of the type
     *
     * @var string
     */
    public $typeName = null;

    /**
     * The scheduler name
     *
     * @var string
     */
    public $name = null;

    /**
     * Array of the last statuses
     *
     * @var array of KalturaSchedulerStatus
     */
    public $statuses;

    /**
     * Array of the last configs
     *
     * @var array of KalturaSchedulerConfig
     */
    public $configs;

    /**
     * Array of jobs that locked to this worker
     *
     * @var array of KalturaBatchJob
     */
    public $lockedJobs;

    /**
     * Avarage time between creation and queue time
     *
     * @var int
     */
    public $avgWait = null;

    /**
     * Avarage time between queue time end finish time
     *
     * @var int
     */
    public $avgWork = null;

    /**
     * last status time
     *
     * @var int
     */
    public $lastStatus = null;

    /**
     * last status formated
     *
     * @var string
     */
    public $lastStatusStr = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduler extends KalturaObjectBase {
    /**
     * The id of the Scheduler
     *
     * @var int
     */
    public $id = null;

    /**
     * The id as configured in the batch config
     *
     * @var int
     */
    public $configuredId = null;

    /**
     * The scheduler name
     *
     * @var string
     */
    public $name = null;

    /**
     * The host name
     *
     * @var string
     */
    public $host = null;

    /**
     * Array of the last statuses
     *
     * @var array of KalturaSchedulerStatus
     */
    public $statuses;

    /**
     * Array of the last configs
     *
     * @var array of KalturaSchedulerConfig
     */
    public $configs;

    /**
     * Array of the workers
     *
     * @var array of KalturaSchedulerWorker
     */
    public $workers;

    /**
     * creation time
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * last status time
     *
     * @var int
     */
    public $lastStatus = null;

    /**
     * last status formated
     *
     * @var string
     */
    public $lastStatusStr = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUser extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var string
     */
    public $groupId = null;

    /**
     *
     * @var KalturaGroupUserStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIntegerValue extends KalturaValue {
    /**
     *
     * @var int
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaBatchJob
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
class KalturaMediaInfo extends KalturaObjectBase {
    /**
     * The id of the media info
     *
     * @var int
     */
    public $id = null;

    /**
     * The id of the related flavor asset
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     * The file size
     *
     * @var int
     */
    public $fileSize = null;

    /**
     * The container format
     *
     * @var string
     */
    public $containerFormat = null;

    /**
     * The container id
     *
     * @var string
     */
    public $containerId = null;

    /**
     * The container profile
     *
     * @var string
     */
    public $containerProfile = null;

    /**
     * The container duration
     *
     * @var int
     */
    public $containerDuration = null;

    /**
     * The container bit rate
     *
     * @var int
     */
    public $containerBitRate = null;

    /**
     * The video format
     *
     * @var string
     */
    public $videoFormat = null;

    /**
     * The video codec id
     *
     * @var string
     */
    public $videoCodecId = null;

    /**
     * The video duration
     *
     * @var int
     */
    public $videoDuration = null;

    /**
     * The video bit rate
     *
     * @var int
     */
    public $videoBitRate = null;

    /**
     * The video bit rate mode
     *
     * @var KalturaBitRateMode
     */
    public $videoBitRateMode = null;

    /**
     * The video width
     *
     * @var int
     */
    public $videoWidth = null;

    /**
     * The video height
     *
     * @var int
     */
    public $videoHeight = null;

    /**
     * The video frame rate
     *
     * @var float
     */
    public $videoFrameRate = null;

    /**
     * The video display aspect ratio (dar)
     *
     * @var float
     */
    public $videoDar = null;

    /**
     *
     * @var int
     */
    public $videoRotation = null;

    /**
     * The audio format
     *
     * @var string
     */
    public $audioFormat = null;

    /**
     * The audio codec id
     *
     * @var string
     */
    public $audioCodecId = null;

    /**
     * The audio duration
     *
     * @var int
     */
    public $audioDuration = null;

    /**
     * The audio bit rate
     *
     * @var int
     */
    public $audioBitRate = null;

    /**
     * The audio bit rate mode
     *
     * @var KalturaBitRateMode
     */
    public $audioBitRateMode = null;

    /**
     * The number of audio channels
     *
     * @var int
     */
    public $audioChannels = null;

    /**
     * The audio sampling rate
     *
     * @var int
     */
    public $audioSamplingRate = null;

    /**
     * The audio resolution
     *
     * @var int
     */
    public $audioResolution = null;

    /**
     * The writing library
     *
     * @var string
     */
    public $writingLib = null;

    /**
     * The data as returned by the mediainfo command line
     *
     * @var string
     */
    public $rawData = null;

    /**
     *
     * @var string
     */
    public $multiStreamInfo = null;

    /**
     *
     * @var int
     */
    public $scanType = null;

    /**
     *
     * @var string
     */
    public $multiStream = null;

    /**
     *
     * @var int
     */
    public $isFastStart = null;

    /**
     *
     * @var string
     */
    public $contentStreams = null;

    /**
     *
     * @var int
     */
    public $complexityValue = null;

    /**
     *
     * @var float
     */
    public $maxGOP = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaInfoListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMediaInfo
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
class KalturaFlavorParamsOutputListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFlavorParamsOutput
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
class KalturaThumbAsset extends KalturaAsset {
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     * @var int
     */
    public $thumbParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     * @var int
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     * @var int
     */
    public $height = null;

    /**
     * The status of the asset
     *
     * @var KalturaThumbAssetStatus
     */
    public $status = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParams extends KalturaAssetParams {
    /**
     *
     * @var KalturaThumbCropType
     */
    public $cropType = null;

    /**
     *
     * @var int
     */
    public $quality = null;

    /**
     *
     * @var int
     */
    public $cropX = null;

    /**
     *
     * @var int
     */
    public $cropY = null;

    /**
     *
     * @var int
     */
    public $cropWidth = null;

    /**
     *
     * @var int
     */
    public $cropHeight = null;

    /**
     *
     * @var float
     */
    public $videoOffset = null;

    /**
     *
     * @var int
     */
    public $width = null;

    /**
     *
     * @var int
     */
    public $height = null;

    /**
     *
     * @var float
     */
    public $scaleWidth = null;

    /**
     *
     * @var float
     */
    public $scaleHeight = null;

    /**
     * Hexadecimal value
     *
     * @var string
     */
    public $backgroundColor = null;

    /**
     * Id of the flavor params or the thumbnail params to be used as source for the thumbnail creation
     *
     * @var int
     */
    public $sourceParamsId = null;

    /**
     * The container format of the Flavor Params
     *
     * @var KalturaContainerFormat
     */
    public $format = null;

    /**
     * The image density (dpi) for example: 72 or 96
     *
     * @var int
     */
    public $density = null;

    /**
     * Strip profiles and comments
     *
     * @var bool
     */
    public $stripProfiles = null;

    /**
     * Create thumbnail from the videoLengthpercentage second
     *
     * @var int
     */
    public $videoOffsetInPercentage = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOutput extends KalturaThumbParams {
    /**
     *
     * @var int
     */
    public $thumbParamsId = null;

    /**
     *
     * @var string
     */
    public $thumbParamsVersion = null;

    /**
     *
     * @var string
     */
    public $thumbAssetId = null;

    /**
     *
     * @var string
     */
    public $thumbAssetVersion = null;

    /**
     *
     * @var int
     */
    public $rotate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOutputListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaThumbParamsOutput
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
class KalturaLiveStreamConfiguration extends KalturaObjectBase {
    /**
     *
     * @var KalturaPlaybackProtocol
     */
    public $protocol = null;

    /**
     *
     * @var string
     */
    public $url = null;

    /**
     *
     * @var string
     */
    public $publishUrl = null;

    /**
     *
     * @var string
     */
    public $backupUrl = null;

    /**
     *
     * @var string
     */
    public $streamName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamPushPublishConfiguration extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $publishUrl = null;

    /**
     *
     * @var string
     */
    public $backupPublishUrl = null;

    /**
     *
     * @var string
     */
    public $port = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryRecordingOptions extends KalturaObjectBase {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $shouldCopyEntitlement = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $shouldCopyScheduling = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $shouldCopyThumbnail = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $shouldMakeHidden = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveEntry extends KalturaMediaEntry {
    /**
     * The message to be presented when the stream is offline
     *
     * @var string
     */
    public $offlineMessage = null;

    /**
     * Recording Status Enabled/Disabled
     *
     * @var KalturaRecordStatus
     */
    public $recordStatus = null;

    /**
     * DVR Status Enabled/Disabled
     *
     * @var KalturaDVRStatus
     */
    public $dvrStatus = null;

    /**
     * Window of time which the DVR allows for backwards scrubbing (in minutes)
     *
     * @var int
     */
    public $dvrWindow = null;

    /**
     * Elapsed recording time (in msec) up to the point where the live stream was last stopped (unpublished).
     *
     * @var int
     */
    public $lastElapsedRecordingTime = null;

    /**
     * Array of key value protocol->live stream url objects
     *
     * @var array of KalturaLiveStreamConfiguration
     */
    public $liveStreamConfigurations;

    /**
     * Recorded entry id
     *
     * @var string
     */
    public $recordedEntryId = null;

    /**
     * Flag denoting whether entry should be published by the media server
     *
     * @var KalturaLivePublishStatus
     */
    public $pushPublishEnabled = null;

    /**
     * Array of publish configurations
     *
     * @var array of KalturaLiveStreamPushPublishConfiguration
     */
    public $publishConfigurations;

    /**
     * The first time in which the entry was broadcast
     *
     * @var int
     */
    public $firstBroadcast = null;

    /**
     * The Last time in which the entry was broadcast
     *
     * @var int
     */
    public $lastBroadcast = null;

    /**
     * The time (unix timestamp in milliseconds) in which the entry broadcast started or 0 when the entry is off the air
     *
     * @var float
     */
    public $currentBroadcastStartTime = null;

    /**
     *
     * @var KalturaLiveEntryRecordingOptions
     */
    public $recordingOptions;

    /**
     * the status of the entry of type EntryServerNodeStatus
     *
     * @var KalturaEntryServerNodeStatus
     */
    public $liveStatus = null;

    /**
     * The chunk duration value in milliseconds
     *
     * @var int
     */
    public $segmentDuration = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $explicitLive = null;

    /**
     *
     * @var KalturaViewMode
     */
    public $viewMode = null;

    /**
     *
     * @var KalturaRecordingStatus
     */
    public $recordingStatus = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannel extends KalturaLiveEntry {
    /**
     * Playlist id to be played
     *
     * @var string
     */
    public $playlistId = null;

    /**
     * Indicates that the segments should be repeated for ever
     *
     * @var KalturaNullableBoolean
     */
    public $repeat = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegment extends KalturaObjectBase {
    /**
     * Unique identifier
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
     * Segment creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Segment update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Segment name
     *
     * @var string
     */
    public $name = null;

    /**
     * Segment description
     *
     * @var string
     */
    public $description = null;

    /**
     * Segment tags
     *
     * @var string
     */
    public $tags = null;

    /**
     * Segment could be associated with the main stream, as additional stream or as overlay
     *
     * @var KalturaLiveChannelSegmentType
     */
    public $type = null;

    /**
     *
     * @var KalturaLiveChannelSegmentStatus
     */
    public $status = null;

    /**
     * Live channel id
     *
     * @var string
     */
    public $channelId = null;

    /**
     * Entry id to be played
     *
     * @var string
     */
    public $entryId = null;

    /**
     * Segment start time trigger type
     *
     * @var KalturaLiveChannelSegmentTriggerType
     */
    public $triggerType = null;

    /**
     * Live channel segment that the trigger relates to
     *
     * @var int
     */
    public $triggerSegmentId = null;

    /**
     * Segment play start time, in mili-seconds, according to trigger type
     *
     * @var float
     */
    public $startTime = null;

    /**
     * Segment play duration time, in mili-seconds
     *
     * @var float
     */
    public $duration = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryServerNodeRecordingInfo extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $recordedEntryId = null;

    /**
     *
     * @var int
     */
    public $duration = null;

    /**
     *
     * @var KalturaEntryServerNodeRecordingStatus
     */
    public $recordingStatus = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportExportParams extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $entryIds = null;

    /**
     *
     * @var string
     */
    public $recpientEmail = null;

    /**
     * Time zone offset in minutes (between client to UTC)
     *
     * @var int
     */
    public $timeZoneOffset = null;

    /**
     * Optional argument that allows controlling the prefix of the exported csv url
     *
     * @var string
     */
    public $applicationUrlTemplate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportExportResponse extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $referenceJobId = null;

    /**
     *
     * @var string
     */
    public $reportEmail = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportInputFilter extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $entryIds = null;

    /**
     *
     * @var int
     */
    public $fromTime = null;

    /**
     *
     * @var int
     */
    public $toTime = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $live = null;

    /**
     *
     * @var KalturaLiveReportOrderBy
     */
    public $orderBy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStats extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $audience = null;

    /**
     *
     * @var int
     */
    public $dvrAudience = null;

    /**
     *
     * @var float
     */
    public $avgBitrate = null;

    /**
     *
     * @var int
     */
    public $bufferTime = null;

    /**
     *
     * @var int
     */
    public $plays = null;

    /**
     *
     * @var int
     */
    public $secondsViewed = null;

    /**
     *
     * @var int
     */
    public $startEvent = null;

    /**
     *
     * @var int
     */
    public $timestamp = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStatsEvent extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     * an integer representing the type of event being sent from the player
     *
     * @var KalturaLiveStatsEventType
     */
    public $eventType = null;

    /**
     * a unique string generated by the client that will represent the client-side session:
     * the primary component will pass it on to other components that sprout from it
     *
     * @var string
     */
    public $sessionId = null;

    /**
     * incremental sequence of the event
     *
     * @var int
     */
    public $eventIndex = null;

    /**
     * buffer time in seconds from the last 10 seconds
     *
     * @var int
     */
    public $bufferTime = null;

    /**
     * bitrate used in the last 10 seconds
     *
     * @var int
     */
    public $bitrate = null;

    /**
     * the referrer of the client
     *
     * @var string
     */
    public $referrer = null;

    /**
     *
     * @var bool
     */
    public $isLive = null;

    /**
     * the event start time as string
     *
     * @var string
     */
    public $startTime = null;

    /**
     * delivery type used for this stream
     *
     * @var KalturaPlaybackProtocol
     */
    public $deliveryType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamBitrate extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $bitrate = null;

    /**
     *
     * @var int
     */
    public $width = null;

    /**
     *
     * @var int
     */
    public $height = null;

    /**
     *
     * @var string
     */
    public $tags = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntry extends KalturaLiveEntry {
    /**
     * The stream id as provided by the provider
     *
     * @var string
     */
    public $streamRemoteId = null;

    /**
     * The backup stream id as provided by the provider
     *
     * @var string
     */
    public $streamRemoteBackupId = null;

    /**
     * Array of supported bitrates
     *
     * @var array of KalturaLiveStreamBitrate
     */
    public $bitrates;

    /**
     *
     * @var string
     */
    public $primaryBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $secondaryBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $primaryRtspBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $secondaryRtspBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $streamName = null;

    /**
     * The stream url
     *
     * @var string
     */
    public $streamUrl = null;

    /**
     * HLS URL - URL for live stream playback on mobile device
     *
     * @var string
     */
    public $hlsStreamUrl = null;

    /**
     * URL Manager to handle the live stream URL (for instance, add token)
     *
     * @var string
     */
    public $urlManager = null;

    /**
     * The broadcast primary ip
     *
     * @var string
     */
    public $encodingIP1 = null;

    /**
     * The broadcast secondary ip
     *
     * @var string
     */
    public $encodingIP2 = null;

    /**
     * The broadcast password
     *
     * @var string
     */
    public $streamPassword = null;

    /**
     * The broadcast username
     *
     * @var string
     */
    public $streamUsername = null;

    /**
     * The Streams primary server node id
     *
     * @var int
     */
    public $primaryServerNodeId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamParams extends KalturaObjectBase {
    /**
     * Bit rate of the stream. (i.e. 900)
     *
     * @var int
     */
    public $bitrate = null;

    /**
     * flavor asset id
     *
     * @var string
     */
    public $flavorId = null;

    /**
     * Stream's width
     *
     * @var int
     */
    public $width = null;

    /**
     * Stream's height
     *
     * @var int
     */
    public $height = null;

    /**
     * Live stream's codec
     *
     * @var string
     */
    public $codec = null;

    /**
     * Live stream's farme rate
     *
     * @var int
     */
    public $frameRate = null;

    /**
     * Live stream's key frame interval
     *
     * @var float
     */
    public $keyFrameInterval = null;

    /**
     * Live stream's language
     *
     * @var string
     */
    public $language = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseEntryBaseFilter extends KalturaRelatedFilter {
    /**
     * This filter should be in use for retrieving only a specific entry (identified by its entryId).
     *
     * @var string
     */
    public $idEqual = null;

    /**
     * This filter should be in use for retrieving few specific entries
     * (string should include comma separated list of entryId strings).
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var string
     */
    public $idNotIn = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry names (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $nameLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry names,
     * while applying an OR logic to retrieve entries that contain at least one input string
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $nameMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry names,
     * while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $nameMultiLikeAnd = null;

    /**
     * This filter should be in use for retrieving entries with a specific name.
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     * This filter should be in use for retrieving only entries
     * which were uploaded by/assigned to users of a specific Kaltura Partner (identified by Partner ID).
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * This filter should be in use for retrieving only entries within Kaltura network
     * which were uploaded by/assigned to users of few Kaltura Partners
     * (string should include comma separated list of PartnerIDs)
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     * This filter parameter should be in use for retrieving only entries,
     * uploaded by/assigned to a specific user (identified by user Id).
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     * @var string
     */
    public $userIdNotIn = null;

    /**
     *
     * @var string
     */
    public $creatorIdEqual = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry tags
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $tagsLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * while applying an OR logic to retrieve entries that contain at least one input string
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry tags set by an ADMIN user
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $adminTagsLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * set by an ADMIN user, while applying an OR logic to retrieve entries
     * that contain at least one input string (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $adminTagsMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * set by an ADMIN user, while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     *
     * @var string
     */
    public $adminTagsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $categoriesMatchAnd = null;

    /**
     * All entries within these categories or their child categories.
     *
     * @var string
     */
    public $categoriesMatchOr = null;

    /**
     *
     * @var string
     */
    public $categoriesNotContains = null;

    /**
     *
     * @var string
     */
    public $categoriesIdsMatchAnd = null;

    /**
     * All entries of the categories, excluding their child categories.
     *      To include entries of the child categories, use categoryAncestorIdIn, or categoriesMatchOr.
     *
     * @var string
     */
    public $categoriesIdsMatchOr = null;

    /**
     *
     * @var string
     */
    public $categoriesIdsNotContains = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $categoriesIdsEmpty = null;

    /**
     * This filter should be in use for retrieving only entries, at a specific {
     *
     * @var KalturaEntryStatus
     */
    public $statusEqual = null;

    /**
     * This filter should be in use for retrieving only entries, not at a specific {
     *
     * @var KalturaEntryStatus
     */
    public $statusNotEqual = null;

    /**
     * This filter should be in use for retrieving only entries, at few specific {
     *
     * @var string
     */
    public $statusIn = null;

    /**
     * This filter should be in use for retrieving only entries, not at few specific {
     *
     * @var string
     */
    public $statusNotIn = null;

    /**
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatusEqual = null;

    /**
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatusNotEqual = null;

    /**
     *
     * @var string
     */
    public $moderationStatusIn = null;

    /**
     *
     * @var string
     */
    public $moderationStatusNotIn = null;

    /**
     *
     * @var KalturaEntryType
     */
    public $typeEqual = null;

    /**
     * This filter should be in use for retrieving entries of few {
     *
     * @var string
     */
    public $typeIn = null;

    /**
     * This filter parameter should be in use for retrieving only entries
     * which were created at Kaltura system after a specific time/date (standard timestamp format).
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * This filter parameter should be in use for retrieving only entries
     * which were created at Kaltura system before a specific time/date (standard timestamp format).
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
    public $totalRankLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $totalRankGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $groupIdEqual = null;

    /**
     * This filter should be in use for retrieving specific entries while search match the input string
     * within all of the following metadata attributes: name, description, tags, adminTags.
     *
     * @var string
     */
    public $searchTextMatchAnd = null;

    /**
     * This filter should be in use for retrieving specific entries
     * while search match the input string within at least one of the following metadata attributes:
     * name, description, tags, adminTags.
     *
     * @var string
     */
    public $searchTextMatchOr = null;

    /**
     *
     * @var int
     */
    public $accessControlIdEqual = null;

    /**
     *
     * @var string
     */
    public $accessControlIdIn = null;

    /**
     *
     * @var int
     */
    public $startDateGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $startDateLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $startDateGreaterThanOrEqualOrNull = null;

    /**
     *
     * @var int
     */
    public $startDateLessThanOrEqualOrNull = null;

    /**
     *
     * @var int
     */
    public $endDateGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $endDateLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $endDateGreaterThanOrEqualOrNull = null;

    /**
     *
     * @var int
     */
    public $endDateLessThanOrEqualOrNull = null;

    /**
     *
     * @var string
     */
    public $referenceIdEqual = null;

    /**
     *
     * @var string
     */
    public $referenceIdIn = null;

    /**
     *
     * @var string
     */
    public $replacingEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $replacingEntryIdIn = null;

    /**
     *
     * @var string
     */
    public $replacedEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $replacedEntryIdIn = null;

    /**
     *
     * @var KalturaEntryReplacementStatus
     */
    public $replacementStatusEqual = null;

    /**
     *
     * @var string
     */
    public $replacementStatusIn = null;

    /**
     *
     * @var int
     */
    public $partnerSortValueGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $partnerSortValueLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $rootEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $rootEntryIdIn = null;

    /**
     *
     * @var string
     */
    public $parentEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entitledUsersEditMatchAnd = null;

    /**
     *
     * @var string
     */
    public $entitledUsersEditMatchOr = null;

    /**
     *
     * @var string
     */
    public $entitledUsersPublishMatchAnd = null;

    /**
     *
     * @var string
     */
    public $entitledUsersPublishMatchOr = null;

    /**
     *
     * @var string
     */
    public $entitledUsersViewMatchAnd = null;

    /**
     *
     * @var string
     */
    public $entitledUsersViewMatchOr = null;

    /**
     *
     * @var string
     */
    public $tagsNameMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsAdminTagsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsAdminTagsNameMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsNameMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $tagsAdminTagsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $tagsAdminTagsNameMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryFilter extends KalturaBaseEntryBaseFilter {
    /**
     *
     * @var string
     */
    public $freeText = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isRoot = null;

    /**
     *
     * @var string
     */
    public $categoriesFullNameIn = null;

    /**
     * All entries within this categoy or in child categories
     *
     * @var string
     */
    public $categoryAncestorIdIn = null;

    /**
     * The id of the original entry
     *
     * @var string
     */
    public $redirectFromEntryId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlayableEntryBaseFilter extends KalturaBaseEntryFilter {
    /**
     *
     * @var int
     */
    public $lastPlayedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $lastPlayedAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $durationLessThan = null;

    /**
     *
     * @var int
     */
    public $durationGreaterThan = null;

    /**
     *
     * @var int
     */
    public $durationLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $durationGreaterThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $durationTypeMatchOr = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryFilter extends KalturaPlayableEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaEntryBaseFilter extends KalturaPlayableEntryFilter {
    /**
     *
     * @var KalturaMediaType
     */
    public $mediaTypeEqual = null;

    /**
     *
     * @var string
     */
    public $mediaTypeIn = null;

    /**
     *
     * @var KalturaSourceType
     */
    public $sourceTypeEqual = null;

    /**
     *
     * @var KalturaSourceType
     */
    public $sourceTypeNotEqual = null;

    /**
     *
     * @var string
     */
    public $sourceTypeIn = null;

    /**
     *
     * @var string
     */
    public $sourceTypeNotIn = null;

    /**
     *
     * @var int
     */
    public $mediaDateGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $mediaDateLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $flavorParamsIdsMatchOr = null;

    /**
     *
     * @var string
     */
    public $flavorParamsIdsMatchAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryFilter extends KalturaMediaEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryFilterForPlaylist extends KalturaMediaEntryFilter {
    /**
     *
     * @var int
     */
    public $limit = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntry extends KalturaPlayableEntry {
    /**
     * Indicates whether the user has submited a real thumbnail to the mix (Not the one that was generated automaticaly)
     *
     * @var bool
     */
    public $hasRealThumbnail = null;

    /**
     * The editor type used to edit the metadata
     *
     * @var KalturaEditorType
     */
    public $editorType = null;

    /**
     * The xml data of the mix
     *
     * @var string
     */
    public $dataContent = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationFlag extends KalturaObjectBase {
    /**
     * Moderation flag id
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
     * The user id that added the moderation flag
     *
     * @var string
     */
    public $userId = null;

    /**
     * The type of the moderation flag (entry or user)
     *
     * @var KalturaModerationObjectType
     */
    public $moderationObjectType = null;

    /**
     * If moderation flag is set for entry, this is the flagged entry id
     *
     * @var string
     */
    public $flaggedEntryId = null;

    /**
     * If moderation flag is set for user, this is the flagged user id
     *
     * @var string
     */
    public $flaggedUserId = null;

    /**
     * The moderation flag status
     *
     * @var KalturaModerationFlagStatus
     */
    public $status = null;

    /**
     * The comment that was added to the flag
     *
     * @var string
     */
    public $comments = null;

    /**
     *
     * @var KalturaModerationFlagType
     */
    public $flagType = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerStatistics extends KalturaObjectBase {
    /**
     * Package total allowed bandwidth and storage
     *
     * @var int
     */
    public $packageBandwidthAndStorage = null;

    /**
     * Partner total hosting in GB on the disk
     *
     * @var float
     */
    public $hosting = null;

    /**
     * Partner total bandwidth in GB
     *
     * @var float
     */
    public $bandwidth = null;

    /**
     * total usage in GB - including bandwidth and storage
     *
     * @var int
     */
    public $usage = null;

    /**
     * Percent of usage out of partner's package. if usage is 5GB and package is 10GB, this value will be 50
     *
     * @var float
     */
    public $usagePercent = null;

    /**
     * date when partner reached the limit of his package (timestamp)
     *
     * @var int
     */
    public $reachedLimitDate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerUsage extends KalturaObjectBase {
    /**
     * Partner total hosting in GB on the disk
     *
     * @var float
     */
    public $hostingGB = null;

    /**
     * percent of usage out of partner's package. if usageGB is 5 and package is 10GB, this value will be 50
     *
     * @var float
     */
    public $Percent = null;

    /**
     * package total BW - actually this is usage, which represents BW+storage
     *
     * @var int
     */
    public $packageBW = null;

    /**
     * total usage in GB - including bandwidth and storage
     *
     * @var float
     */
    public $usageGB = null;

    /**
     * date when partner reached the limit of his package (timestamp)
     *
     * @var int
     */
    public $reachedLimitDate = null;

    /**
     * a semi-colon separated list of comma-separated key-values to represent a usage graph.
     * keys could be 1-12 for a year view (1,1.2;2,1.1;3,0.9;...;12,1.4;)
     * keys could be 1-[28,29,30,31] depending on the requested month,
     * for a daily view in a given month (1,0.4;2,0.2;...;31,0.1;)
     *
     * @var string
     */
    public $usageGraph = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermission extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var KalturaPermissionType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $friendlyName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaPermissionStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $dependsOnPermissionNames = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var string
     */
    public $permissionItemsIds = null;

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
     * @var string
     */
    public $partnerGroup = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPermissionItem extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var KalturaPermissionItemType
     */
    public $type = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $tags = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaybackSource extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $deliveryProfileId = null;

    /**
     * source format according to delivery profile streamer type (applehttp, mpegdash etc.)
     *
     * @var string
     */
    public $format = null;

    /**
     * comma separated string according to deliveryProfile media protocols ('http,https' etc.)
     *
     * @var string
     */
    public $protocols = null;

    /**
     * comma separated string of flavor ids
     *
     * @var string
     */
    public $flavorIds = null;

    /**
     *
     * @var string
     */
    public $url = null;

    /**
     * drm data object containing relevant license url ,scheme name and certificate
     *
     * @var array of KalturaDrmPlaybackPluginData
     */
    public $drm;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaybackContext extends KalturaObjectBase {
    /**
     *
     * @var array of KalturaPlaybackSource
     */
    public $sources;

    /**
     *
     * @var array of KalturaFlavorAsset
     */
    public $flavorAssets;

    /**
     * Array of actions as received from the rules that invalidated
     *
     * @var array of KalturaRuleAction
     */
    public $actions;

    /**
     * Array of actions as received from the rules that invalidated
     *
     * @var array of KalturaAccessControlMessage
     */
    public $messages;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylist extends KalturaBaseEntry {
    /**
     * Content of the playlist -
     * XML if the playlistType is dynamic
     * text if the playlistType is static
     * url if the playlistType is mRss
     *
     * @var string
     */
    public $playlistContent = null;

    /**
     *
     * @var array of KalturaMediaEntryFilterForPlaylist
     */
    public $filters;

    /**
     * Maximum count of results to be returned in playlist execution
     *
     * @var int
     */
    public $totalResults = null;

    /**
     * Type of playlist
     *
     * @var KalturaPlaylistType
     */
    public $playlistType = null;

    /**
     * Number of plays
     *
     * @var int
     */
    public $plays = null;

    /**
     * Number of views
     *
     * @var int
     */
    public $views = null;

    /**
     * The duration in seconds
     *
     * @var int
     */
    public $duration = null;

    /**
     * The url for this playlist
     *
     * @var string
     */
    public $executeUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemotePath extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $storageProfileId = null;

    /**
     *
     * @var string
     */
    public $uri = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlResource extends KalturaContentResource {
    /**
     * Remote URL, FTP, HTTP or HTTPS
     *
     * @var string
     */
    public $url = null;

    /**
     * Force Import Job
     *
     * @var bool
     */
    public $forceAsyncDownload = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemoteStorageResource extends KalturaUrlResource {
    /**
     * ID of storage profile to be associated with the created file sync, used for file serving URL composing.
     *
     * @var int
     */
    public $storageProfileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReport extends KalturaObjectBase {
    /**
     * Report id
     *
     * @var int
     */
    public $id = null;

    /**
     * Partner id associated with the report
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Report name
     *
     * @var string
     */
    public $name = null;

    /**
     * Used to identify system reports in a friendly way
     *
     * @var string
     */
    public $systemName = null;

    /**
     * Report description
     *
     * @var string
     */
    public $description = null;

    /**
     * Report query
     *
     * @var string
     */
    public $query = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportBaseTotal extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
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
class KalturaReportGraph extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
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
class KalturaReportInputBaseFilter extends KalturaObjectBase {
    /**
     * Start date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $fromDate = null;

    /**
     * End date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $toDate = null;

    /**
     * Start day as string (YYYYMMDD)
     *
     * @var string
     */
    public $fromDay = null;

    /**
     * End date as string (YYYYMMDD)
     *
     * @var string
     */
    public $toDay = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportResponse extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $columns = null;

    /**
     *
     * @var array of KalturaString
     */
    public $results;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportTable extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $header = null;

    /**
     *
     * @var string
     */
    public $data = null;

    /**
     *
     * @var int
     */
    public $totalCount = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportTotal extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $header = null;

    /**
     *
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
class KalturaRequestConfiguration extends KalturaObjectBase {
    /**
     * Impersonated partner id
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Kaltura API session
     *
     * @var string
     */
    public $ks = null;

    /**
     * Response profile - this attribute will be automatically unset after every API call.
     *
     * @var KalturaBaseResponseProfile
     */
    public $responseProfile;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfile extends KalturaDetachedResponseProfile {
    /**
     * Auto generated numeric identifier
     *
     * @var int
     */
    public $id = null;

    /**
     * Unique system name
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * Creation time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Update time as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaResponseProfileStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $version = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileCacheRecalculateOptions extends KalturaObjectBase {
    /**
     * Maximum number of keys to recalculate
     *
     * @var int
     */
    public $limit = null;

    /**
     * Class name
     *
     * @var string
     */
    public $cachedObjectType = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var string
     */
    public $startObjectKey = null;

    /**
     *
     * @var string
     */
    public $endObjectKey = null;

    /**
     *
     * @var int
     */
    public $jobCreatedAt = null;

    /**
     *
     * @var bool
     */
    public $isFirstLoop = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileCacheRecalculateResults extends KalturaObjectBase {
    /**
     * Last recalculated id
     *
     * @var string
     */
    public $lastObjectKey = null;

    /**
     * Number of recalculated keys
     *
     * @var int
     */
    public $recalculated = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScope extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearch extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $keyWords = null;

    /**
     *
     * @var KalturaSearchProviderType
     */
    public $searchSource = null;

    /**
     *
     * @var KalturaMediaType
     */
    public $mediaType = null;

    /**
     * Use this field to pass dynamic data for searching
     *      For example - if you set this field to "mymovies_$partner_id"
     *      The $partner_id will be automatically replcaed with your real partner Id
     *
     * @var string
     */
    public $extraData = null;

    /**
     *
     * @var string
     */
    public $authData = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchAuthData extends KalturaObjectBase {
    /**
     * The authentication data that further should be used for search
     *
     * @var string
     */
    public $authData = null;

    /**
     * Login URL when user need to sign-in and authorize the search
     *
     * @var string
     */
    public $loginUrl = null;

    /**
     * Information when there was an error
     *
     * @var string
     */
    public $message = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchResult extends KalturaSearch {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $title = null;

    /**
     *
     * @var string
     */
    public $thumbUrl = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var string
     */
    public $url = null;

    /**
     *
     * @var string
     */
    public $sourceLink = null;

    /**
     *
     * @var string
     */
    public $credit = null;

    /**
     *
     * @var KalturaLicenseType
     */
    public $licenseType = null;

    /**
     *
     * @var string
     */
    public $flashPlaybackType = null;

    /**
     *
     * @var string
     */
    public $fileExt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchResultResponse extends KalturaObjectBase {
    /**
     *
     * @var array of KalturaSearchResult
     */
    public $objects;

    /**
     *
     * @var bool
     */
    public $needMediaInfo = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaServerNode extends KalturaObjectBase {
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
    public $heartbeatTime = null;

    /**
     * serverNode name
     *
     * @var string
     */
    public $name = null;

    /**
     * serverNode uniqe system name
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     * serverNode hostName
     *
     * @var string
     */
    public $hostName = null;

    /**
     *
     * @var KalturaServerNodeStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaServerNodeType
     */
    public $type = null;

    /**
     * serverNode tags
     *
     * @var string
     */
    public $tags = null;

    /**
     * DC where the serverNode is located
     *
     * @var int
     */
    public $dc = null;

    /**
     * Id of the parent serverNode
     *
     * @var string
     */
    public $parentId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionInfo extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $ks = null;

    /**
     *
     * @var KalturaSessionType
     */
    public $sessionType = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var int
     */
    public $expiry = null;

    /**
     *
     * @var string
     */
    public $privileges = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSourceFileSyncDescriptor extends KalturaFileSyncDescriptor {
    /**
     * The translated path as used by the scheduler
     *
     * @var string
     */
    public $actualFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $assetId = null;

    /**
     *
     * @var int
     */
    public $assetParamsId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStartWidgetSessionResponse extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $ks = null;

    /**
     *
     * @var string
     */
    public $userId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsEvent extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $clientVer = null;

    /**
     *
     * @var KalturaStatsEventType
     */
    public $eventType = null;

    /**
     * the client's timestamp of this event
     *
     * @var float
     */
    public $eventTimestamp = null;

    /**
     * a unique string generated by the client that will represent the client-side session:
     * the primary component will pass it on to other components that sprout from it
     *
     * @var string
     */
    public $sessionId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     * the UV cookie - creates in the operational system and should be passed on ofr every event
     *
     * @var string
     */
    public $uniqueViewer = null;

    /**
     *
     * @var string
     */
    public $widgetId = null;

    /**
     *
     * @var int
     */
    public $uiconfId = null;

    /**
     * the partner's user id
     *
     * @var string
     */
    public $userId = null;

    /**
     * the timestamp along the video when the event happend
     *
     * @var int
     */
    public $currentPoint = null;

    /**
     * the duration of the video in milliseconds - will make it much faster than quering the db for each entry
     *
     * @var int
     */
    public $duration = null;

    /**
     * will be retrieved from the request of the user
     *
     * @var string
     */
    public $userIp = null;

    /**
     * the time in milliseconds the event took
     *
     * @var int
     */
    public $processDuration = null;

    /**
     * the id of the GUI control - will be used in the future to better understand what the user clicked
     *
     * @var string
     */
    public $controlId = null;

    /**
     * true if the user ever used seek in this session
     *
     * @var bool
     */
    public $seek = null;

    /**
     * timestamp of the new point on the timeline of the video after the user seeks
     *
     * @var int
     */
    public $newPoint = null;

    /**
     * the referrer of the client
     *
     * @var string
     */
    public $referrer = null;

    /**
     * will indicate if the event is thrown for the first video in the session
     *
     * @var bool
     */
    public $isFirstInSession = null;

    /**
     * kaltura application name
     *
     * @var string
     */
    public $applicationId = null;

    /**
     *
     * @var int
     */
    public $contextId = null;

    /**
     *
     * @var KalturaStatsFeatureType
     */
    public $featureType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsKmcEvent extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $clientVer = null;

    /**
     *
     * @var string
     */
    public $kmcEventActionPath = null;

    /**
     *
     * @var KalturaStatsKmcEventType
     */
    public $kmcEventType = null;

    /**
     * the client's timestamp of this event
     *
     * @var float
     */
    public $eventTimestamp = null;

    /**
     * a unique string generated by the client that will represent the client-side session:
     * the primary component will pass it on to other components that sprout from it
     *
     * @var string
     */
    public $sessionId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var string
     */
    public $widgetId = null;

    /**
     *
     * @var int
     */
    public $uiconfId = null;

    /**
     * the partner's user id
     *
     * @var string
     */
    public $userId = null;

    /**
     * will be retrieved from the request of the user
     *
     * @var string
     */
    public $userIp = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfile extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

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
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $desciption = null;

    /**
     *
     * @var KalturaStorageProfileStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaStorageProfileProtocol
     */
    public $protocol = null;

    /**
     *
     * @var string
     */
    public $storageUrl = null;

    /**
     *
     * @var string
     */
    public $storageBaseDir = null;

    /**
     *
     * @var string
     */
    public $storageUsername = null;

    /**
     *
     * @var string
     */
    public $storagePassword = null;

    /**
     *
     * @var bool
     */
    public $storageFtpPassiveMode = null;

    /**
     *
     * @var int
     */
    public $minFileSize = null;

    /**
     *
     * @var int
     */
    public $maxFileSize = null;

    /**
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     *
     * @var int
     */
    public $maxConcurrentConnections = null;

    /**
     *
     * @var string
     */
    public $pathManagerClass = null;

    /**
     *
     * @var array of KalturaKeyValue
     */
    public $pathManagerParams;

    /**
     * No need to create enum for temp field
     *
     * @var int
     */
    public $trigger = null;

    /**
     * Delivery Priority
     *
     * @var int
     */
    public $deliveryPriority = null;

    /**
     *
     * @var KalturaStorageProfileDeliveryStatus
     */
    public $deliveryStatus = null;

    /**
     *
     * @var KalturaStorageProfileReadyBehavior
     */
    public $readyBehavior = null;

    /**
     * Flag sugnifying that the storage exported content should be deleted when soure entry is deleted
     *
     * @var int
     */
    public $allowAutoDelete = null;

    /**
     * Indicates to the local file transfer manager to create a link to the file instead of copying it
     *
     * @var bool
     */
    public $createFileLink = null;

    /**
     * Holds storage profile export rules
     *
     * @var array of KalturaRule
     */
    public $rules;

    /**
     * Delivery profile ids
     *
     * @var array of KalturaKeyValue
     */
    public $deliveryProfileIds;

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

    /**
     *
     * @var bool
     */
    public $shouldExportThumbs = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedEntryCount extends KalturaObjectBase {
    /**
     * the total count of entries that should appear in the feed without flavor filtering
     *
     * @var int
     */
    public $totalEntryCount = null;

    /**
     * count of entries that will appear in the feed (including all relevant filters)
     *
     * @var int
     */
    public $actualEntryCount = null;

    /**
     * count of entries that requires transcoding in order to be included in feed
     *
     * @var int
     */
    public $requireTranscodingCount = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConf extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     * Name of the uiConf, this is not a primary key
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
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaUiConfObjType
     */
    public $objType = null;

    /**
     *
     * @var string
     */
    public $objTypeAsString = null;

    /**
     *
     * @var int
     */
    public $width = null;

    /**
     *
     * @var int
     */
    public $height = null;

    /**
     *
     * @var string
     */
    public $htmlParams = null;

    /**
     *
     * @var string
     */
    public $swfUrl = null;

    /**
     *
     * @var string
     */
    public $confFilePath = null;

    /**
     *
     * @var string
     */
    public $confFile = null;

    /**
     *
     * @var string
     */
    public $confFileFeatures = null;

    /**
     *
     * @var string
     */
    public $config = null;

    /**
     *
     * @var string
     */
    public $confVars = null;

    /**
     *
     * @var bool
     */
    public $useCdn = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var string
     */
    public $swfUrlVersion = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaUiConfCreationMode
     */
    public $creationMode = null;

    /**
     *
     * @var string
     */
    public $html5Url = null;

    /**
     * UiConf version
     *
     * @var string
     */
    public $version = null;

    /**
     *
     * @var string
     */
    public $partnerTags = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfTypeInfo extends KalturaObjectBase {
    /**
     * UiConf Type
     *
     * @var KalturaUiConfObjType
     */
    public $type = null;

    /**
     * Available versions
     *
     * @var array of KalturaString
     */
    public $versions;

    /**
     * The direcotry this type is saved at
     *
     * @var string
     */
    public $directory = null;

    /**
     * Filename for this UiConf type
     *
     * @var string
     */
    public $filename = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadResponse extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $uploadTokenId = null;

    /**
     *
     * @var int
     */
    public $fileSize = null;

    /**
     *
     * @var KalturaUploadErrorCode
     */
    public $errorCode = null;

    /**
     *
     * @var string
     */
    public $errorDescription = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadToken extends KalturaObjectBase {
    /**
     * Upload token unique ID
     *
     * @var string
     */
    public $id = null;

    /**
     * Partner ID of the upload token
     *
     * @var int
     */
    public $partnerId = null;

    /**
     * User id for the upload token
     *
     * @var string
     */
    public $userId = null;

    /**
     * Status of the upload token
     *
     * @var KalturaUploadTokenStatus
     */
    public $status = null;

    /**
     * Name of the file for the upload token, can be empty
     * when the upload token is created and will be updated internally after the file is uploaded
     *
     * @var string
     */
    public $fileName = null;

    /**
     * File size in bytes, can be empty
     * when the upload token is created and will be updated internally after the file is uploaded
     *
     * @var float
     */
    public $fileSize = null;

    /**
     * Uploaded file size in bytes, can be used to identify how many bytes were uploaded before resuming
     *
     * @var float
     */
    public $uploadedFileSize = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Upload url - to explicitly determine to which domain to adress the uploadToken->upload call
     *
     * @var string
     */
    public $uploadUrl = null;

    /**
     * autoFinalize - Should the upload be finalized once the file size on disk matches the file size reproted
     * when adding the upload token.
     *
     * @var KalturaNullableBoolean
     */
    public $autoFinalize = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUser extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaUserType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $screenName = null;

    /**
     *
     * @var string
     */
    public $fullName = null;

    /**
     *
     * @var string
     */
    public $email = null;

    /**
     *
     * @var int
     */
    public $dateOfBirth = null;

    /**
     *
     * @var string
     */
    public $country = null;

    /**
     *
     * @var string
     */
    public $state = null;

    /**
     *
     * @var string
     */
    public $city = null;

    /**
     *
     * @var string
     */
    public $zip = null;

    /**
     *
     * @var string
     */
    public $thumbnailUrl = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     * Admin tags can be updated only by using an admin session
     *
     * @var string
     */
    public $adminTags = null;

    /**
     *
     * @var KalturaGender
     */
    public $gender = null;

    /**
     *
     * @var KalturaUserStatus
     */
    public $status = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Can be used to store various partner related data as a string
     *
     * @var string
     */
    public $partnerData = null;

    /**
     *
     * @var int
     */
    public $indexedPartnerDataInt = null;

    /**
     *
     * @var string
     */
    public $indexedPartnerDataString = null;

    /**
     *
     * @var int
     */
    public $storageSize = null;

    /**
     *
     * @var string
     */
    public $password = null;

    /**
     *
     * @var string
     */
    public $firstName = null;

    /**
     *
     * @var string
     */
    public $lastName = null;

    /**
     *
     * @var bool
     */
    public $isAdmin = null;

    /**
     *
     * @var KalturaLanguageCode
     */
    public $language = null;

    /**
     *
     * @var int
     */
    public $lastLoginTime = null;

    /**
     *
     * @var int
     */
    public $statusUpdatedAt = null;

    /**
     *
     * @var int
     */
    public $deletedAt = null;

    /**
     *
     * @var bool
     */
    public $loginEnabled = null;

    /**
     *
     * @var string
     */
    public $roleIds = null;

    /**
     *
     * @var string
     */
    public $roleNames = null;

    /**
     *
     * @var bool
     */
    public $isAccountOwner = null;

    /**
     *
     * @var string
     */
    public $allowedPartnerIds = null;

    /**
     *
     * @var string
     */
    public $allowedPartnerPackages = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUserEntry extends KalturaObjectBase {
    /**
     * unique auto-generated identifier
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaUserEntryStatus
     */
    public $status = null;

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
     * @var KalturaUserEntryType
     */
    public $type = null;

    /**
     *
     * @var KalturaUserEntryExtendedStatus
     */
    public $extendedStatus = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserLoginData extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $loginEmail = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRole extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaUserRoleStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $permissionNames = null;

    /**
     *
     * @var string
     */
    public $tags = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidget extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $sourceWidgetId = null;

    /**
     *
     * @var string
     */
    public $rootWidgetId = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var int
     */
    public $uiConfId = null;

    /**
     *
     * @var KalturaWidgetSecurityType
     */
    public $securityType = null;

    /**
     *
     * @var int
     */
    public $securityPolicy = null;

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
     * Can be used to store various partner related data as a string
     *
     * @var string
     */
    public $partnerData = null;

    /**
     *
     * @var string
     */
    public $widgetHTML = null;

    /**
     * Should enforce entitlement on feed entries
     *
     * @var bool
     */
    public $enforceEntitlement = null;

    /**
     * Set privacy context for search entries
     * that assiged to private and public categories within a category privacy context.
     *
     * @var string
     */
    public $privacyContext = null;

    /**
     * Addes the HTML5 script line to the widget's embed code
     *
     * @var bool
     */
    public $addEmbedHtml5Support = null;

    /**
     *
     * @var string
     */
    public $roles = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBatchJobBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     * @var int
     */
    public $idGreaterThanOrEqual = null;

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
    public $partnerIdNotIn = null;

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
    public $executionAttemptsGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $executionAttemptsLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $lockVersionGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $lockVersionLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var KalturaBatchJobType
     */
    public $jobTypeEqual = null;

    /**
     *
     * @var string
     */
    public $jobTypeIn = null;

    /**
     *
     * @var string
     */
    public $jobTypeNotIn = null;

    /**
     *
     * @var int
     */
    public $jobSubTypeEqual = null;

    /**
     *
     * @var string
     */
    public $jobSubTypeIn = null;

    /**
     *
     * @var string
     */
    public $jobSubTypeNotIn = null;

    /**
     *
     * @var KalturaBatchJobStatus
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
     * @var int
     */
    public $priorityGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $priorityLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $priorityEqual = null;

    /**
     *
     * @var string
     */
    public $priorityIn = null;

    /**
     *
     * @var string
     */
    public $priorityNotIn = null;

    /**
     *
     * @var int
     */
    public $batchVersionGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $batchVersionLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $batchVersionEqual = null;

    /**
     *
     * @var int
     */
    public $queueTimeGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $queueTimeLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $finishTimeGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $finishTimeLessThanOrEqual = null;

    /**
     *
     * @var KalturaBatchJobErrorTypes
     */
    public $errTypeEqual = null;

    /**
     *
     * @var string
     */
    public $errTypeIn = null;

    /**
     *
     * @var string
     */
    public $errTypeNotIn = null;

    /**
     *
     * @var int
     */
    public $errNumberEqual = null;

    /**
     *
     * @var string
     */
    public $errNumberIn = null;

    /**
     *
     * @var string
     */
    public $errNumberNotIn = null;

    /**
     *
     * @var int
     */
    public $estimatedEffortLessThan = null;

    /**
     *
     * @var int
     */
    public $estimatedEffortGreaterThan = null;

    /**
     *
     * @var int
     */
    public $urgencyLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $urgencyGreaterThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobFilter extends KalturaBatchJobBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlBlockAction extends KalturaRuleAction {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlLimitDeliveryProfilesAction extends KalturaRuleAction {
    /**
     * Comma separated list of delivery profile ids
     *
     * @var string
     */
    public $deliveryProfileIds = null;

    /**
     *
     * @var bool
     */
    public $isBlockedList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlLimitFlavorsAction extends KalturaRuleAction {
    /**
     * Comma separated list of flavor ids
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     *
     * @var bool
     */
    public $isBlockedList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlLimitThumbnailCaptureAction extends KalturaRuleAction {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaAccessControl
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
class KalturaAccessControlModifyRequestHostRegexAction extends KalturaRuleAction {
    /**
     * Request host regex pattern
     *
     * @var string
     */
    public $pattern = null;

    /**
     * Request host regex replacment
     *
     * @var string
     */
    public $replacement = null;

    /**
     * serverNodeId to generate replacment host from
     *
     * @var int
     */
    public $replacmenServerNodeId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlPreviewAction extends KalturaRuleAction {
    /**
     *
     * @var int
     */
    public $limit = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaAccessControlProfile
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
class KalturaAccessControlServeRemoteEdgeServerAction extends KalturaRuleAction {
    /**
     * Comma separated list of edge servers playBack should be done from
     *
     * @var string
     */
    public $edgeServerIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUser extends KalturaUser {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAmazonS3StorageProfile extends KalturaStorageProfile {
    /**
     *
     * @var KalturaAmazonS3StorageProfileFilesPermissionLevel
     */
    public $filesPermissionInS3 = null;

    /**
     *
     * @var string
     */
    public $s3Region = null;

    /**
     *
     * @var string
     */
    public $sseType = null;

    /**
     *
     * @var string
     */
    public $sseKmsKeyId = null;

    /**
     *
     * @var string
     */
    public $signatureType = null;

    /**
     *
     * @var string
     */
    public $endPoint = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiActionPermissionItem extends KalturaPermissionItem {
    /**
     *
     * @var string
     */
    public $service = null;

    /**
     *
     * @var string
     */
    public $action = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiParameterPermissionItem extends KalturaPermissionItem {
    /**
     *
     * @var string
     */
    public $object = null;

    /**
     *
     * @var string
     */
    public $parameter = null;

    /**
     *
     * @var KalturaApiParameterPermissionItemAction
     */
    public $action = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAppTokenBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
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
     * @var KalturaAppTokenStatus
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
    public $sessionUserIdEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaAppToken
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
class KalturaAssetParamsOutput extends KalturaAssetParams {
    /**
     *
     * @var int
     */
    public $assetParamsId = null;

    /**
     *
     * @var string
     */
    public $assetParamsVersion = null;

    /**
     *
     * @var string
     */
    public $assetId = null;

    /**
     *
     * @var string
     */
    public $assetVersion = null;

    /**
     *
     * @var int
     */
    public $readyBehavior = null;

    /**
     * The container format of the Flavor Params
     *
     * @var KalturaContainerFormat
     */
    public $format = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetPropertiesCompareCondition extends KalturaCondition {
    /**
     * Array of key/value objects that holds the property and the value to find and compare on an asset object
     *
     * @var array of KalturaKeyValue
     */
    public $properties;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetsParamsResourceContainers extends KalturaResource {
    /**
     * Array of resources associated with asset params ids
     *
     * @var array of KalturaAssetParamsResourceContainer
     */
    public $resources;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAttributeCondition extends KalturaSearchItem {
    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAuthenticatedCondition extends KalturaCondition {
    /**
     * The privelege needed to remove the restriction
     *
     * @var array of KalturaStringValue
     */
    public $privileges;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryCloneOptionComponent extends KalturaBaseEntryCloneOptionItem {
    /**
     *
     * @var KalturaBaseEntryCloneOptions
     */
    public $itemType = null;

    /**
     * condition rule (include/exclude)
     *
     * @var KalturaCloneComponentSelectorType
     */
    public $rule = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaBaseEntry
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
abstract class KalturaBaseSyndicationFeedBaseFilter extends KalturaFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseSyndicationFeedListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaBaseSyndicationFeed
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
class KalturaBulkDownloadJobData extends KalturaJobData {
    /**
     * Comma separated list of entry ids
     *
     * @var string
     */
    public $entryIds = null;

    /**
     * Flavor params id to use for conversion
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     * The id of the requesting user
     *
     * @var string
     */
    public $puserId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBulkUploadBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $uploadedOnGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $uploadedOnLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $uploadedOnEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaBatchJobStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var KalturaBulkUploadObjectType
     */
    public $bulkUploadObjectTypeEqual = null;

    /**
     *
     * @var string
     */
    public $bulkUploadObjectTypeIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadCategoryData extends KalturaBulkUploadObjectData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadCategoryEntryData extends KalturaBulkUploadObjectData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadCategoryUserData extends KalturaBulkUploadObjectData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadEntryData extends KalturaBulkUploadObjectData {
    /**
     * Selected profile id for all bulk entries
     *
     * @var int
     */
    public $conversionProfileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     * The screen name of the user
     *
     * @var string
     */
    public $uploadedBy = null;

    /**
     * Selected profile id for all bulk entries
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     * Created by the API
     *
     * @var string
     */
    public $resultsFileLocalPath = null;

    /**
     * Created by the API
     *
     * @var string
     */
    public $resultsFileUrl = null;

    /**
     * Number of created entries
     *
     * @var int
     */
    public $numOfEntries = null;

    /**
     * Number of created objects
     *
     * @var int
     */
    public $numOfObjects = null;

    /**
     * The bulk upload file path
     *
     * @var string
     */
    public $bulkUploadObjectType = null;

    /**
     * Friendly name of the file, used to be recognized later in the logs.
     *
     * @var string
     */
    public $fileName = null;

    /**
     * Data pertaining to the objects being uploaded
     *
     * @var KalturaBulkUploadObjectData
     */
    public $objectData;

    /**
     * Type of bulk upload
     *
     * @var KalturaBulkUploadType
     */
    public $type = null;

    /**
     * Recipients of the email for bulk upload success/failure
     *
     * @var string
     */
    public $emailRecipients = null;

    /**
     * Number of objects that finished on error status
     *
     * @var int
     */
    public $numOfErrorObjects = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaBulkUpload
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
class KalturaBulkUploadResultCategory extends KalturaBulkUploadResult {
    /**
     *
     * @var string
     */
    public $relativePath = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $referenceId = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var int
     */
    public $appearInList = null;

    /**
     *
     * @var int
     */
    public $privacy = null;

    /**
     *
     * @var int
     */
    public $inheritanceType = null;

    /**
     *
     * @var int
     */
    public $userJoinPolicy = null;

    /**
     *
     * @var int
     */
    public $defaultPermissionLevel = null;

    /**
     *
     * @var string
     */
    public $owner = null;

    /**
     *
     * @var int
     */
    public $contributionPolicy = null;

    /**
     *
     * @var int
     */
    public $partnerSortValue = null;

    /**
     *
     * @var bool
     */
    public $moderation = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResultCategoryEntry extends KalturaBulkUploadResult {
    /**
     *
     * @var int
     */
    public $categoryId = null;

    /**
     *
     * @var string
     */
    public $entryId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResultCategoryUser extends KalturaBulkUploadResult {
    /**
     *
     * @var int
     */
    public $categoryId = null;

    /**
     *
     * @var string
     */
    public $categoryReferenceId = null;

    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var int
     */
    public $permissionLevel = null;

    /**
     *
     * @var int
     */
    public $updateMethod = null;

    /**
     *
     * @var int
     */
    public $requiredObjectStatus = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResultEntry extends KalturaBulkUploadResult {
    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var string
     */
    public $title = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var string
     */
    public $url = null;

    /**
     *
     * @var string
     */
    public $contentType = null;

    /**
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     *
     * @var int
     */
    public $accessControlProfileId = null;

    /**
     *
     * @var string
     */
    public $category = null;

    /**
     *
     * @var int
     */
    public $scheduleStartDate = null;

    /**
     *
     * @var int
     */
    public $scheduleEndDate = null;

    /**
     *
     * @var int
     */
    public $entryStatus = null;

    /**
     *
     * @var string
     */
    public $thumbnailUrl = null;

    /**
     *
     * @var bool
     */
    public $thumbnailSaved = null;

    /**
     *
     * @var string
     */
    public $sshPrivateKey = null;

    /**
     *
     * @var string
     */
    public $sshPublicKey = null;

    /**
     *
     * @var string
     */
    public $sshKeyPassphrase = null;

    /**
     *
     * @var string
     */
    public $creatorId = null;

    /**
     *
     * @var string
     */
    public $entitledUsersEdit = null;

    /**
     *
     * @var string
     */
    public $entitledUsersPublish = null;

    /**
     *
     * @var string
     */
    public $ownerId = null;

    /**
     *
     * @var string
     */
    public $referenceId = null;

    /**
     *
     * @var string
     */
    public $templateEntryId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResultUser extends KalturaBulkUploadResult {
    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var string
     */
    public $screenName = null;

    /**
     *
     * @var string
     */
    public $email = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var int
     */
    public $dateOfBirth = null;

    /**
     *
     * @var string
     */
    public $country = null;

    /**
     *
     * @var string
     */
    public $state = null;

    /**
     *
     * @var string
     */
    public $city = null;

    /**
     *
     * @var string
     */
    public $zip = null;

    /**
     *
     * @var int
     */
    public $gender = null;

    /**
     *
     * @var string
     */
    public $firstName = null;

    /**
     *
     * @var string
     */
    public $lastName = null;

    /**
     *
     * @var string
     */
    public $group = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadUserData extends KalturaBulkUploadObjectData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptureThumbJobData extends KalturaJobData {
    /**
     *
     * @var KalturaFileContainer
     */
    public $fileContainer;

    /**
     * The translated path as used by the scheduler
     *
     * @var string
     */
    public $actualSrcFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $srcFileSyncRemoteUrl = null;

    /**
     *
     * @var int
     */
    public $thumbParamsOutputId = null;

    /**
     *
     * @var string
     */
    public $thumbAssetId = null;

    /**
     *
     * @var string
     */
    public $srcAssetId = null;

    /**
     *
     * @var KalturaAssetType
     */
    public $srcAssetType = null;

    /**
     *
     * @var string
     */
    public $thumbPath = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryAdvancedFilter extends KalturaSearchItem {
    /**
     *
     * @var string
     */
    public $categoriesMatchOr = null;

    /**
     *
     * @var string
     */
    public $categoryEntryStatusIn = null;

    /**
     *
     * @var KalturaCategoryEntryAdvancedOrderBy
     */
    public $orderBy = null;

    /**
     *
     * @var int
     */
    public $categoryIdEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaCategoryEntry
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
class KalturaCategoryIdentifier extends KalturaObjectIdentifier {
    /**
     * Identifier of the object
     *
     * @var KalturaCategoryIdentifierField
     */
    public $identifier = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaCategory
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
class KalturaCategoryUserAdvancedFilter extends KalturaSearchItem {
    /**
     *
     * @var string
     */
    public $memberIdEq = null;

    /**
     *
     * @var string
     */
    public $memberIdIn = null;

    /**
     *
     * @var string
     */
    public $memberPermissionsMatchOr = null;

    /**
     *
     * @var string
     */
    public $memberPermissionsMatchAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaCategoryUser
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
class KalturaClipAttributes extends KalturaOperationAttributes {
    /**
     * Offset in milliseconds
     *
     * @var int
     */
    public $offset = null;

    /**
     * Duration in milliseconds
     *
     * @var int
     */
    public $duration = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCompareCondition extends KalturaCondition {
    /**
     * Value to evaluate against the field and operator
     *
     * @var KalturaIntegerValue
     */
    public $value;

    /**
     * Comparing operator
     *
     * @var KalturaSearchConditionComparison
     */
    public $comparison = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDataCenterContentResource extends KalturaContentResource {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConcatAttributes extends KalturaOperationAttributes {
    /**
     * The resource to be concatenated
     *
     * @var KalturaDataCenterContentResource
     */
    public $resource;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConcatJobData extends KalturaJobData {
    /**
     * Source files to be concatenated
     *
     * @var array of KalturaString
     */
    public $srcFiles;

    /**
     * Output file
     *
     * @var string
     */
    public $destFilePath = null;

    /**
     * Flavor asset to be ingested with the output
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     * Clipping offset in seconds
     *
     * @var float
     */
    public $offset = null;

    /**
     * Clipping duration in seconds
     *
     * @var float
     */
    public $duration = null;

    /**
     * duration of the concated video
     *
     * @var float
     */
    public $concatenatedDuration = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaControlPanelCommandBaseFilter extends KalturaFilter {
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
    public $createdByIdEqual = null;

    /**
     *
     * @var KalturaControlPanelCommandType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var KalturaControlPanelCommandTargetType
     */
    public $targetTypeEqual = null;

    /**
     *
     * @var string
     */
    public $targetTypeIn = null;

    /**
     *
     * @var KalturaControlPanelCommandStatus
     */
    public $statusEqual = null;

    /**
     *
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
class KalturaControlPanelCommandListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaControlPanelCommand
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
class KalturaConvartableJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $srcFileSyncLocalPath = null;

    /**
     * The translated path as used by the scheduler
     *
     * @var string
     */
    public $actualSrcFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $srcFileSyncRemoteUrl = null;

    /**
     *
     * @var array of KalturaSourceFileSyncDescriptor
     */
    public $srcFileSyncs;

    /**
     *
     * @var int
     */
    public $engineVersion = null;

    /**
     *
     * @var int
     */
    public $flavorParamsOutputId = null;

    /**
     *
     * @var KalturaFlavorParamsOutput
     */
    public $flavorParamsOutput;

    /**
     *
     * @var int
     */
    public $mediaInfoId = null;

    /**
     *
     * @var int
     */
    public $currentOperationSet = null;

    /**
     *
     * @var int
     */
    public $currentOperationIndex = null;

    /**
     *
     * @var array of KalturaKeyValue
     */
    public $pluginData;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaConversionProfileAssetParams
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
class KalturaConversionProfileListResponse extends KalturaListResponse
{
    /**
     *
     * @var array of KalturaConversionProfile
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
class KalturaConvertLiveSegmentJobData extends KalturaJobData {
    /**
     * Live stream entry id
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var string
     */
    public $assetId = null;

    /**
     * Primary or secondary media server
     *
     * @var KalturaEntryServerNodeType
     */
    public $mediaServerIndex = null;

    /**
     * The index of the file within the entry
     *
     * @var int
     */
    public $fileIndex = null;

    /**
     * The recorded live media
     *
     * @var string
     */
    public $srcFilePath = null;

    /**
     * The output file
     *
     * @var string
     */
    public $destFilePath = null;

    /**
     * Duration of the live entry including all recorded segments including the current
     *
     * @var float
     */
    public $endTime = null;

    /**
     * The data output file
     *
     * @var string
     */
    public $destDataFilePath = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConvertProfileJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $inputFileSyncLocalPath = null;

    /**
     * The height of last created thumbnail, will be used to comapare if this thumbnail is the best we can have.
     *
     * @var int
     */
    public $thumbHeight = null;

    /**
     * The bit rate of last created thumbnail, will be used to comapare if this thumbnail is the best we can have.
     *
     * @var int
     */
    public $thumbBitrate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCopyPartnerJobData extends KalturaJobData {
    /**
     * Id of the partner to copy from
     *
     * @var int
     */
    public $fromPartnerId = null;

    /**
     * Id of the partner to copy to
     *
     * @var int
     */
    public $toPartnerId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCountryRestriction extends KalturaBaseRestriction {
    /**
     * Country restriction type (Allow or deny)
     *
     * @var KalturaCountryRestrictionType
     */
    public $countryRestrictionType = null;

    /**
     * Comma separated list of country codes to allow to deny
     *
     * @var string
     */
    public $countryList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDataEntry
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
class KalturaDeleteFileJobData extends KalturaJobData
{
    /**
     *
     * @var string
     */
    public $localFileSyncPath = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeleteJobData extends KalturaJobData {
    /**
     * The filter should return the list of objects that need to be deleted.
     *
     * @var KalturaFilter
     */
    public $filter;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiAppleHttpManifest extends KalturaDeliveryProfile {
    /**
     * Should we use timing parameters - clipTo / seekFrom
     *
     * @var bool
     */
    public $supportClipping = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHds extends KalturaDeliveryProfile {
    /**
     * Should we use timing parameters - clipTo / seekFrom
     *
     * @var bool
     */
    public $supportClipping = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHttp extends KalturaDeliveryProfile {
    /**
     * Should we use intelliseek
     *
     * @var bool
     */
    public $useIntelliseek = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileBaseFilter extends KalturaFilter {
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
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

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
     * @var KalturaPlaybackProtocol
     */
    public $streamerTypeEqual = null;

    /**
     *
     * @var KalturaDeliveryStatus
     */
    public $statusEqual = null;

    /**
     *
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
class KalturaDeliveryProfileCondition extends KalturaCondition {
    /**
     * The delivery ids that are accepted by this condition
     *
     * @var array of KalturaIntegerValue
     */
    public $deliveryProfileIds;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericAppleHttp extends KalturaDeliveryProfile {
    /**
     *
     * @var string
     */
    public $pattern = null;

    /**
     * rendererClass
     *
     * @var string
     */
    public $rendererClass = null;

    /**
     * Enable to make playManifest redirect to the domain of the delivery profile
     *
     * @var KalturaNullableBoolean
     */
    public $manifestRedirect = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHds extends KalturaDeliveryProfile {
    /**
     *
     * @var string
     */
    public $pattern = null;

    /**
     * rendererClass
     *
     * @var string
     */
    public $rendererClass = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHttp extends KalturaDeliveryProfile {
    /**
     *
     * @var string
     */
    public $pattern = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericSilverLight extends KalturaDeliveryProfile {
    /**
     *
     * @var string
     */
    public $pattern = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDeliveryProfile
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
class KalturaDeliveryProfileLiveAppleHttp extends KalturaDeliveryProfile {
    /**
     *
     * @var bool
     */
    public $disableExtraAttributes = null;

    /**
     *
     * @var bool
     */
    public $forceProxy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileRtmp extends KalturaDeliveryProfile {
    /**
     * enforceRtmpe
     *
     * @var bool
     */
    public $enforceRtmpe = null;

    /**
     * a prefix that is added to all stream urls (replaces storageProfile::rtmpPrefix)
     *
     * @var string
     */
    public $prefix = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileVodPackagerPlayServer extends KalturaDeliveryProfile {
    /**
     *
     * @var bool
     */
    public $adStitchingEnabled = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryServerNode extends KalturaServerNode {
    /**
     * Delivery profile ids
     *
     * @var array of KalturaKeyValue
     */
    public $deliveryProfileIds;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDirectoryRestriction extends KalturaBaseRestriction {
    /**
     * Kaltura directory restriction type
     *
     * @var KalturaDirectoryRestrictionType
     */
    public $directoryRestrictionType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmEntryContextPluginData extends KalturaPluginData {
    /**
     * For the uDRM we give the drm context data which is a json encoding of an array containing the uDRM data
     *      for each flavor that is required from this getContextData request.
     *
     * @var string
     */
    public $flavorData = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCategoryUserBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var int
     */
    public $categoryIdEqual = null;

    /**
     *
     * @var string
     */
    public $categoryIdIn = null;

    /**
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     * @var KalturaCategoryUserPermissionLevel
     */
    public $permissionLevelEqual = null;

    /**
     *
     * @var string
     */
    public $permissionLevelIn = null;

    /**
     *
     * @var KalturaCategoryUserStatus
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
     * @var KalturaUpdateMethodType
     */
    public $updateMethodEqual = null;

    /**
     *
     * @var string
     */
    public $updateMethodIn = null;

    /**
     *
     * @var string
     */
    public $categoryFullIdsStartsWith = null;

    /**
     *
     * @var string
     */
    public $categoryFullIdsEqual = null;

    /**
     *
     * @var string
     */
    public $permissionNamesMatchAnd = null;

    /**
     *
     * @var string
     */
    public $permissionNamesMatchOr = null;

    /**
     *
     * @var string
     */
    public $permissionNamesNotContains = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserFilter extends KalturaCategoryUserBaseFilter {
    /**
     * Return the list of categoryUser that are not inherited from parent category - only the direct categoryUsers.
     *
     * @var bool
     */
    public $categoryDirectMembers = null;

    /**
     * Free text search on user id or screen name
     *
     * @var string
     */
    public $freeText = null;

    /**
     * Return a list of categoryUser that related to the userId in this field by groups
     *
     * @var string
     */
    public $relatedGroupsByUserId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUserBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var KalturaUserType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var string
     */
    public $screenNameLike = null;

    /**
     *
     * @var string
     */
    public $screenNameStartsWith = null;

    /**
     *
     * @var string
     */
    public $emailLike = null;

    /**
     *
     * @var string
     */
    public $emailStartsWith = null;

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
     * @var KalturaUserStatus
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
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $firstNameStartsWith = null;

    /**
     *
     * @var string
     */
    public $lastNameStartsWith = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isAdminEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserFilter extends KalturaUserBaseFilter {
    /**
     *
     * @var string
     */
    public $idOrScreenNameStartsWith = null;

    /**
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $loginEnabledEqual = null;

    /**
     *
     * @var string
     */
    public $roleIdEqual = null;

    /**
     *
     * @var string
     */
    public $roleIdsEqual = null;

    /**
     *
     * @var string
     */
    public $roleIdsIn = null;

    /**
     *
     * @var string
     */
    public $firstNameOrLastNameStartsWith = null;

    /**
     * Permission names filter expression
     *
     * @var string
     */
    public $permissionNamesMultiLikeOr = null;

    /**
     * Permission names filter expression
     *
     * @var string
     */
    public $permissionNamesMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryContext extends KalturaContext {
    /**
     * The entry ID in the context of which the playlist should be built
     *
     * @var string
     */
    public $entryId = null;

    /**
     * Is this a redirected entry followup?
     *
     * @var KalturaNullableBoolean
     */
    public $followEntryRedirect = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryContextDataParams extends KalturaAccessControlScope {
    /**
     * Id of the current flavor.
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     * The tags of the flavors that should be used for playback.
     *
     * @var string
     */
    public $flavorTags = null;

    /**
     * Playback streamer type: RTMP, HTTP, appleHttps, rtsp, sl.
     *
     * @var string
     */
    public $streamerType = null;

    /**
     * Protocol of the specific media object.
     *
     * @var string
     */
    public $mediaProtocol = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryContextDataResult extends KalturaContextDataResult {
    /**
     *
     * @var bool
     */
    public $isSiteRestricted = null;

    /**
     *
     * @var bool
     */
    public $isCountryRestricted = null;

    /**
     *
     * @var bool
     */
    public $isSessionRestricted = null;

    /**
     *
     * @var bool
     */
    public $isIpAddressRestricted = null;

    /**
     *
     * @var bool
     */
    public $isUserAgentRestricted = null;

    /**
     *
     * @var int
     */
    public $previewLength = null;

    /**
     *
     * @var bool
     */
    public $isScheduledNow = null;

    /**
     *
     * @var bool
     */
    public $isAdmin = null;

    /**
     * http/rtmp/hdnetwork
     *
     * @var string
     */
    public $streamerType = null;

    /**
     * http/https, rtmp/rtmpe
     *
     * @var string
     */
    public $mediaProtocol = null;

    /**
     *
     * @var string
     */
    public $storageProfilesXML = null;

    /**
     * Array of messages as received from the access control rules that invalidated
     *
     * @var array of KalturaString
     */
    public $accessControlMessages;

    /**
     * Array of actions as received from the access control rules that invalidated
     *
     * @var array of KalturaRuleAction
     */
    public $accessControlActions;

    /**
     * Array of allowed flavor assets according to access control limitations and requested tags
     *
     * @var array of KalturaFlavorAsset
     */
    public $flavorAssets;

    /**
     * The duration of the entry in milliseconds
     *
     * @var int
     */
    public $msDuration = null;

    /**
     * Array of allowed flavor assets according to access control limitations and requested tags
     *
     * @var map
     */
    public $pluginData;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryCuePointSearchFilter extends KalturaSearchItem {
    /**
     *
     * @var string
     */
    public $cuePointsFreeText = null;

    /**
     *
     * @var string
     */
    public $cuePointTypeIn = null;

    /**
     *
     * @var int
     */
    public $cuePointSubTypeEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryIdentifier extends KalturaObjectIdentifier {
    /**
     * Identifier of the object
     *
     * @var KalturaEntryIdentifierField
     */
    public $identifier = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryLiveStats extends KalturaLiveStats {
    /**
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     * @var int
     */
    public $peakAudience = null;

    /**
     *
     * @var int
     */
    public $peakDvrAudience = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryServerNodeBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdIn = null;

    /**
     *
     * @var int
     */
    public $serverNodeIdEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

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
     * @var KalturaEntryServerNodeStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaEntryServerNodeType
     */
    public $serverTypeEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaEntryServerNode
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
abstract class KalturaBooleanField extends KalturaBooleanValue {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeatureStatusListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFeatureStatus
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
class KalturaFileAssetListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFileAsset
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
class KalturaFlattenJobData extends KalturaJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFlavorAsset
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
class KalturaFlavorParamsListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaFlavorParams
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
class KalturaGenericSyndicationFeed extends KalturaBaseSyndicationFeed {
    /**
     * feed description
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed landing page (i.e publisher website)
     *
     * @var string
     */
    public $feedLandingPage = null;

    /**
     * entry filter
     *
     * @var KalturaBaseEntryFilter
     */
    public $entryFilter;

    /**
     * page size
     *
     * @var int
     */
    public $pageSize = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGoogleVideoSyndicationFeed extends KalturaBaseSyndicationFeed {
    /**
     *
     * @var KalturaGoogleSyndicationFeedAdultValues
     */
    public $adultContent = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUserListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaGroupUser
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
class KalturaHashCondition extends KalturaCondition {
    /**
     * hash name
     *
     * @var string
     */
    public $hashName = null;

    /**
     * hash secret
     *
     * @var string
     */
    public $hashSecret = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeed extends KalturaBaseSyndicationFeed {
    /**
     * feed description
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed language
     *
     * @var string
     */
    public $language = null;

    /**
     * feed landing page (i.e publisher website)
     *
     * @var string
     */
    public $feedLandingPage = null;

    /**
     * author/publisher name
     *
     * @var string
     */
    public $ownerName = null;

    /**
     * publisher email
     *
     * @var string
     */
    public $ownerEmail = null;

    /**
     * podcast thumbnail
     *
     * @var string
     */
    public $feedImageUrl = null;

    /**
     *
     * @var KalturaITunesSyndicationFeedCategories
     */
    public $category = null;

    /**
     *
     * @var KalturaITunesSyndicationFeedAdultValues
     */
    public $adultContent = null;

    /**
     *
     * @var string
     */
    public $feedAuthor = null;

    /**
     * true in case you want to enfore the palylist order on the
     *
     * @var KalturaNullableBoolean
     */
    public $enforceOrder = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImportJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $srcFileUrl = null;

    /**
     *
     * @var string
     */
    public $destFileLocalPath = null;

    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var int
     */
    public $fileSize = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIndexAdvancedFilter extends KalturaSearchItem {
    /**
     *
     * @var int
     */
    public $indexIdGreaterThan = null;

    /**
     *
     * @var int
     */
    public $depthGreaterThanEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIndexJobData extends KalturaJobData {
    /**
     * The filter should return the list of objects that need to be reindexed.
     *
     * @var KalturaFilter
     */
    public $filter;

    /**
     * Indicates the last id that reindexed, used when the batch crached, to re-run from the last crash point.
     *
     * @var int
     */
    public $lastIndexId = null;

    /**
     * Indicates the last depth that reindexed, used when the batch crached, to re-run from the last crash point.
     *
     * @var int
     */
    public $lastIndexDepth = null;

    /**
     * Indicates that the object columns and attributes values should be recalculated before reindexed.
     *
     * @var bool
     */
    public $shouldUpdate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIpAddressRestriction extends KalturaBaseRestriction {
    /**
     * Ip address restriction type (Allow or deny)
     *
     * @var KalturaIpAddressRestrictionType
     */
    public $ipAddressRestrictionType = null;

    /**
     * Comma separated list of ip address to allow to deny
     *
     * @var string
     */
    public $ipAddressList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLimitFlavorsRestriction extends KalturaBaseRestriction {
    /**
     * Limit flavors restriction type (Allow or deny)
     *
     * @var KalturaLimitFlavorsRestrictionType
     */
    public $limitFlavorsRestrictionType = null;

    /**
     * Comma separated list of flavor params ids to allow to deny
     *
     * @var string
     */
    public $flavorParamsIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaLiveChannel
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
class KalturaLiveChannelSegmentListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaLiveChannelSegment
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
class KalturaLiveEntryServerNode extends KalturaEntryServerNode {
    /**
     * parameters of the stream we got
     *
     * @var array of KalturaLiveStreamParams
     */
    public $streams;

    /**
     *
     * @var array of KalturaLiveEntryServerNodeRecordingInfo
     */
    public $recordingInfo;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportExportJobData extends KalturaJobData {
    /**
     *
     * @var int
     */
    public $timeReference = null;

    /**
     *
     * @var int
     */
    public $timeZoneOffset = null;

    /**
     *
     * @var string
     */
    public $entryIds = null;

    /**
     *
     * @var string
     */
    public $outputPath = null;

    /**
     *
     * @var string
     */
    public $recipientEmail = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStatsListResponse extends KalturaListResponse {
    /**
     *
     * @var KalturaLiveStats
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
class KalturaLiveStreamListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaLiveStreamEntry
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
class KalturaLiveStreamPushPublishRTMPConfiguration extends KalturaLiveStreamPushPublishConfiguration {
    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var string
     */
    public $password = null;

    /**
     *
     * @var string
     */
    public $streamName = null;

    /**
     *
     * @var string
     */
    public $applicationName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveToVodJobData extends KalturaJobData {
    /**
     * $vod Entry Id
     *
     * @var string
     */
    public $vodEntryId = null;

    /**
     * live Entry Id
     *
     * @var string
     */
    public $liveEntryId = null;

    /**
     * total VOD Duration
     *
     * @var float
     */
    public $totalVodDuration = null;

    /**
     * last Segment Duration
     *
     * @var float
     */
    public $lastSegmentDuration = null;

    /**
     * amf Array File Path
     *
     * @var string
     */
    public $amfArray = null;

    /**
     * last live to vod sync time
     *
     * @var int
     */
    public $lastCuePointSyncTime = null;

    /**
     * last segment drift
     *
     * @var int
     */
    public $lastSegmentDrift = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMailJobData extends KalturaJobData {
    /**
     *
     * @var KalturaMailType
     */
    public $mailType = null;

    /**
     *
     * @var int
     */
    public $mailPriority = null;

    /**
     *
     * @var KalturaMailJobStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $recipientName = null;

    /**
     *
     * @var string
     */
    public $recipientEmail = null;

    /**
     * kuserId
     *
     * @var int
     */
    public $recipientId = null;

    /**
     *
     * @var string
     */
    public $fromName = null;

    /**
     *
     * @var string
     */
    public $fromEmail = null;

    /**
     *
     * @var string
     */
    public $bodyParams = null;

    /**
     *
     * @var string
     */
    public $subjectParams = null;

    /**
     *
     * @var string
     */
    public $templatePath = null;

    /**
     *
     * @var KalturaLanguageCode
     */
    public $language = null;

    /**
     *
     * @var int
     */
    public $campaignId = null;

    /**
     *
     * @var int
     */
    public $minSendDate = null;

    /**
     *
     * @var bool
     */
    public $isHtml = null;

    /**
     *
     * @var string
     */
    public $separator = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMatchCondition extends KalturaCondition {
    /**
     *
     * @var array of KalturaStringValue
     */
    public $values;

    /**
     *
     * @var KalturaMatchConditionType
     */
    public $matchType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaInfoBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
     */
    public $flavorAssetIdEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMediaEntry
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
class KalturaMixListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMixEntry
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
class KalturaModerationFlagListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaModerationFlag
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
class KalturaMoveCategoryEntriesJobData extends KalturaJobData {
    /**
     * Source category id
     *
     * @var int
     */
    public $srcCategoryId = null;

    /**
     * Destination category id
     *
     * @var int
     */
    public $destCategoryId = null;

    /**
     * Saves the last category id that its entries moved completely
     *      In case of crash the batch will restart from that point
     *
     * @var int
     */
    public $lastMovedCategoryId = null;

    /**
     * Saves the last page index of the child categories filter pager
     *      In case of crash the batch will restart from that point
     *
     * @var int
     */
    public $lastMovedCategoryPageIndex = null;

    /**
     * Saves the last page index of the category entries filter pager
     *      In case of crash the batch will restart from that point
     *
     * @var int
     */
    public $lastMovedCategoryEntryPageIndex = null;

    /**
     * All entries from all child categories will be moved as well
     *
     * @var bool
     */
    public $moveFromChildren = null;

    /**
     * Destination categories fallback ids
     *
     * @var string
     */
    public $destCategoryFullIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     * @var KalturaNotificationType
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $typeAsString = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var KalturaNotificationStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $data = null;

    /**
     *
     * @var int
     */
    public $numberOfAttempts = null;

    /**
     *
     * @var string
     */
    public $notificationResult = null;

    /**
     *
     * @var KalturaNotificationObjectType
     */
    public $objType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaObjectListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaObject
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
class KalturaOrCondition extends KalturaCondition {
    /**
     *
     * @var array of KalturaCondition
     */
    public $conditions;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPartnerBaseFilter extends KalturaFilter {
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
     * @var string
     */
    public $idNotIn = null;

    /**
     *
     * @var string
     */
    public $nameLike = null;

    /**
     *
     * @var string
     */
    public $nameMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $nameMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var KalturaPartnerStatus
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
    public $partnerPackageEqual = null;

    /**
     *
     * @var int
     */
    public $partnerPackageGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $partnerPackageLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $partnerPackageIn = null;

    /**
     *
     * @var KalturaPartnerGroupType
     */
    public $partnerGroupTypeEqual = null;

    /**
     *
     * @var string
     */
    public $partnerNameDescriptionWebsiteAdminNameAdminEmailLike = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaPartner
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
class KalturaPermissionItemListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaPermissionItem
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
class KalturaPermissionListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaPermission
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
class KalturaPlaylistListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaPlaylist
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
class KalturaProvisionJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $streamID = null;

    /**
     *
     * @var string
     */
    public $backupStreamID = null;

    /**
     *
     * @var string
     */
    public $rtmp = null;

    /**
     *
     * @var string
     */
    public $encoderIP = null;

    /**
     *
     * @var string
     */
    public $backupEncoderIP = null;

    /**
     *
     * @var string
     */
    public $encoderPassword = null;

    /**
     *
     * @var string
     */
    public $encoderUsername = null;

    /**
     *
     * @var int
     */
    public $endDate = null;

    /**
     *
     * @var string
     */
    public $returnVal = null;

    /**
     *
     * @var int
     */
    public $mediaType = null;

    /**
     *
     * @var string
     */
    public $primaryBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $secondaryBroadcastingUrl = null;

    /**
     *
     * @var string
     */
    public $streamName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizUserEntry extends KalturaUserEntry {
    /**
     *
     * @var float
     */
    public $score = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRecalculateCacheJobData extends KalturaJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemotePathListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaRemotePath
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
abstract class KalturaReportBaseFilter extends KalturaFilter {
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
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportInputFilter extends KalturaReportInputBaseFilter {
    /**
     * Search keywords to filter objects
     *
     * @var string
     */
    public $keywords = null;

    /**
     * Search keywords in onjects tags
     *
     * @var bool
     */
    public $searchInTags = null;

    /**
     * Search keywords in onjects admin tags
     *
     * @var bool
     */
    public $searchInAdminTags = null;

    /**
     * Search onjects in specified categories
     *
     * @var string
     */
    public $categories = null;

    /**
     * Time zone offset in minutes
     *
     * @var int
     */
    public $timeZoneOffset = null;

    /**
     * Aggregated results according to interval
     *
     * @var KalturaReportInterval
     */
    public $interval = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaReport
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
abstract class KalturaResponseProfileBaseFilter extends KalturaFilter {
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

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
     * @var KalturaResponseProfileStatus
     */
    public $statusEqual = null;

    /**
     *
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
class KalturaResponseProfileHolder extends KalturaBaseResponseProfile {
    /**
     * Auto generated numeric identifier
     *
     * @var int
     */
    public $id = null;

    /**
     * Unique system name
     *
     * @var string
     */
    public $systemName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaResponseProfile
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
class KalturaSchedulerListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaScheduler
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
class KalturaSchedulerWorkerListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaSchedulerWorker
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
class KalturaSearchCondition extends KalturaSearchItem {
    /**
     *
     * @var string
     */
    public $field = null;

    /**
     *
     * @var string
     */
    public $value = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchOperator extends KalturaSearchItem {
    /**
     *
     * @var KalturaSearchOperatorType
     */
    public $type = null;

    /**
     *
     * @var array of KalturaSearchItem
     */
    public $items;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaServerNodeBaseFilter extends KalturaFilter {
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
    public $heartbeatTimeGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $heartbeatTimeLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $nameIn = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var string
     */
    public $hostNameLike = null;

    /**
     *
     * @var string
     */
    public $hostNameMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $hostNameMultiLikeAnd = null;

    /**
     *
     * @var KalturaServerNodeStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaServerNodeType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

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
    public $parentIdLike = null;

    /**
     *
     * @var string
     */
    public $parentIdMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $parentIdMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaServerNode
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
class KalturaSessionResponse extends KalturaStartWidgetSessionResponse {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionRestriction extends KalturaBaseRestriction {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSiteRestriction extends KalturaBaseRestriction {
    /**
     * The site restriction type (allow or deny)
     *
     * @var KalturaSiteRestrictionType
     */
    public $siteRestrictionType = null;

    /**
     * Comma separated list of sites (domains) to allow or deny
     *
     * @var string
     */
    public $siteList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageAddAction extends KalturaRuleAction {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $serverUrl = null;

    /**
     *
     * @var string
     */
    public $serverUsername = null;

    /**
     *
     * @var string
     */
    public $serverPassword = null;

    /**
     *
     * @var string
     */
    public $serverPrivateKey = null;

    /**
     *
     * @var string
     */
    public $serverPublicKey = null;

    /**
     *
     * @var string
     */
    public $serverPassPhrase = null;

    /**
     *
     * @var bool
     */
    public $ftpPassiveMode = null;

    /**
     *
     * @var string
     */
    public $srcFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $srcFileSyncId = null;

    /**
     *
     * @var string
     */
    public $destFileSyncStoredPath = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaStorageProfileBaseFilter extends KalturaFilter {
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
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var KalturaStorageProfileStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaStorageProfileProtocol
     */
    public $protocolEqual = null;

    /**
     *
     * @var string
     */
    public $protocolIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaStorageProfile
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
class KalturaSyncCategoryPrivacyContextJobData extends KalturaJobData {
    /**
     * category id
     *
     * @var int
     */
    public $categoryId = null;

    /**
     * Saves the last category entry creation date that was updated
     *      In case of crash the batch will restart from that point
     *
     * @var int
     */
    public $lastUpdatedCategoryEntryCreatedAt = null;

    /**
     * Saves the last sub category creation date that was updated
     *      In case of crash the batch will restart from that point
     *
     * @var int
     */
    public $lastUpdatedCategoryCreatedAt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaThumbAsset
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
class KalturaThumbParamsListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaThumbParams
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
class KalturaThumbnailServeOptions extends KalturaAssetServeOptions {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeed extends KalturaBaseSyndicationFeed {
    /**
     *
     * @var KalturaTubeMogulSyndicationFeedCategories
     */
    public $category = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUiConfBaseFilter extends KalturaFilter {
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
     * @var string
     */
    public $nameLike = null;

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
     * @var KalturaUiConfObjType
     */
    public $objTypeEqual = null;

    /**
     *
     * @var string
     */
    public $objTypeIn = null;

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
     * @var KalturaUiConfCreationMode
     */
    public $creationModeEqual = null;

    /**
     *
     * @var string
     */
    public $creationModeIn = null;

    /**
     *
     * @var string
     */
    public $versionEqual = null;

    /**
     *
     * @var string
     */
    public $versionMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $versionMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $partnerTagsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $partnerTagsMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUiConf
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
abstract class KalturaUploadTokenBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var KalturaUploadTokenStatus
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
    public $fileNameEqual = null;

    /**
     *
     * @var float
     */
    public $fileSizeEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUploadToken
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
class KalturaUrlRecognizerAkamaiG2O extends KalturaUrlRecognizer {
    /**
     * headerData
     *
     * @var string
     */
    public $headerData = null;

    /**
     * headerSign
     *
     * @var string
     */
    public $headerSign = null;

    /**
     * timeout
     *
     * @var int
     */
    public $timeout = null;

    /**
     * salt
     *
     * @var string
     */
    public $salt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerAkamaiHttp extends KalturaUrlTokenizer {
    /**
     * param
     *
     * @var string
     */
    public $paramName = null;

    /**
     *
     * @var string
     */
    public $rootDir = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerAkamaiRtmp extends KalturaUrlTokenizer {
    /**
     * profile
     *
     * @var string
     */
    public $profile = null;

    /**
     * Type
     *
     * @var string
     */
    public $type = null;

    /**
     *
     * @var string
     */
    public $aifp = null;

    /**
     *
     * @var bool
     */
    public $usePrefix = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerAkamaiRtsp extends KalturaUrlTokenizer {
    /**
     * host
     *
     * @var string
     */
    public $host = null;

    /**
     * Cp-Code
     *
     * @var int
     */
    public $cpcode = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerAkamaiSecureHd extends KalturaUrlTokenizer {
    /**
     *
     * @var string
     */
    public $paramName = null;

    /**
     *
     * @var string
     */
    public $aclPostfix = null;

    /**
     *
     * @var string
     */
    public $customPostfixes = null;

    /**
     *
     * @var string
     */
    public $useCookieHosts = null;

    /**
     *
     * @var string
     */
    public $rootDir = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerBitGravity extends KalturaUrlTokenizer {
    /**
     * hashPatternRegex
     *
     * @var string
     */
    public $hashPatternRegex = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerChinaCache extends KalturaUrlTokenizer {
    /**
     *
     * @var KalturaChinaCacheAlgorithmType
     */
    public $algorithmId = null;

    /**
     *
     * @var int
     */
    public $keyId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerCht extends KalturaUrlTokenizer {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerCloudFront extends KalturaUrlTokenizer
{
    /**
     *
     * @var string
     */
    public $keyPairId = null;

    /**
     *
     * @var string
     */
    public $rootDir = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerKs extends KalturaUrlTokenizer {
    /**
     *
     * @var bool
     */
    public $usePath = null;

    /**
     *
     * @var string
     */
    public $additionalUris = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerLevel3 extends KalturaUrlTokenizer {
    /**
     * paramName
     *
     * @var string
     */
    public $paramName = null;

    /**
     * expiryName
     *
     * @var string
     */
    public $expiryName = null;

    /**
     * gen
     *
     * @var string
     */
    public $gen = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerLimeLight extends KalturaUrlTokenizer {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerVelocix extends KalturaUrlTokenizer {
    /**
     * hdsPaths
     *
     * @var string
     */
    public $hdsPaths = null;

    /**
     * tokenParamName
     *
     * @var string
     */
    public $paramName = null;

    /**
     * secure URL prefix
     *
     * @var string
     */
    public $authPrefix = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUrlTokenizerVnpt extends KalturaUrlTokenizer {
    /**
     *
     * @var int
     */
    public $tokenizationFormat = null;

    /**
     *
     * @var bool
     */
    public $shouldIncludeClientIp = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserAgentRestriction extends KalturaBaseRestriction {
    /**
     * User agent restriction type (Allow or deny)
     *
     * @var KalturaUserAgentRestrictionType
     */
    public $userAgentRestrictionType = null;

    /**
     * A comma seperated list of user agent regular expressions
     *
     * @var string
     */
    public $userAgentRegexList = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUserEntry
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
class KalturaUserListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUser
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
class KalturaUserLoginDataListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUserLoginData
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
class KalturaUserRoleCondition extends KalturaCondition {
    /**
     * Comma separated list of role ids
     *
     * @var string
     */
    public $roleIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaUserRole
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
class KalturaValidateActiveEdgeCondition extends KalturaCondition {
    /**
     * Comma separated list of edge servers to validate are active
     *
     * @var string
     */
    public $edgeServerIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaWidgetBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     * @var string
     */
    public $sourceWidgetIdEqual = null;

    /**
     *
     * @var string
     */
    public $rootWidgetIdEqual = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var int
     */
    public $uiConfIdEqual = null;

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
     * @var string
     */
    public $partnerDataLike = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaWidget
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
class KalturaYahooSyndicationFeed extends KalturaBaseSyndicationFeed {
    /**
     *
     * @var KalturaYahooSyndicationFeedCategories
     */
    public $category = null;

    /**
     *
     * @var KalturaYahooSyndicationFeedAdultValues
     */
    public $adultContent = null;

    /**
     * feed description
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed landing page (i.e publisher website)
     *
     * @var string
     */
    public $feedLandingPage = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAccessControlBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAccessControlProfileBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

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
class KalturaAkamaiProvisionJobData extends KalturaProvisionJobData {
    /**
     *
     * @var string
     */
    public $wsdlUsername = null;

    /**
     *
     * @var string
     */
    public $wsdlPassword = null;

    /**
     *
     * @var string
     */
    public $cpcode = null;

    /**
     *
     * @var string
     */
    public $emailId = null;

    /**
     *
     * @var string
     */
    public $primaryContact = null;

    /**
     *
     * @var string
     */
    public $secondaryContact = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAkamaiUniversalProvisionJobData extends KalturaProvisionJobData {
    /**
     *
     * @var int
     */
    public $streamId = null;

    /**
     *
     * @var string
     */
    public $systemUserName = null;

    /**
     *
     * @var string
     */
    public $systemPassword = null;

    /**
     *
     * @var string
     */
    public $domainName = null;

    /**
     *
     * @var KalturaDVRStatus
     */
    public $dvrEnabled = null;

    /**
     *
     * @var int
     */
    public $dvrWindow = null;

    /**
     *
     * @var string
     */
    public $primaryContact = null;

    /**
     *
     * @var string
     */
    public $secondaryContact = null;

    /**
     *
     * @var KalturaAkamaiUniversalStreamType
     */
    public $streamType = null;

    /**
     *
     * @var string
     */
    public $notificationEmail = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnonymousIPCondition extends KalturaMatchCondition {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenFilter extends KalturaAppTokenBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAssetParamsBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isSystemDefaultEqual = null;

    /**
     *
     * @var string
     */
    public $tagsEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetResource extends KalturaContentResource {
    /**
     * ID of the source asset
     *
     * @var string
     */
    public $assetId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseSyndicationFeedFilter extends KalturaBaseSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadFilter extends KalturaBulkUploadBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCategoryBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $idNotIn = null;

    /**
     *
     * @var int
     */
    public $parentIdEqual = null;

    /**
     *
     * @var string
     */
    public $parentIdIn = null;

    /**
     *
     * @var int
     */
    public $depthEqual = null;

    /**
     *
     * @var string
     */
    public $fullNameEqual = null;

    /**
     *
     * @var string
     */
    public $fullNameStartsWith = null;

    /**
     *
     * @var string
     */
    public $fullNameIn = null;

    /**
     *
     * @var string
     */
    public $fullIdsEqual = null;

    /**
     *
     * @var string
     */
    public $fullIdsStartsWith = null;

    /**
     *
     * @var string
     */
    public $fullIdsMatchOr = null;

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
     * @var KalturaAppearInListType
     */
    public $appearInListEqual = null;

    /**
     *
     * @var KalturaPrivacyType
     */
    public $privacyEqual = null;

    /**
     *
     * @var string
     */
    public $privacyIn = null;

    /**
     *
     * @var KalturaInheritanceType
     */
    public $inheritanceTypeEqual = null;

    /**
     *
     * @var string
     */
    public $inheritanceTypeIn = null;

    /**
     *
     * @var string
     */
    public $referenceIdEqual = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $referenceIdEmpty = null;

    /**
     *
     * @var KalturaContributionPolicyType
     */
    public $contributionPolicyEqual = null;

    /**
     *
     * @var int
     */
    public $membersCountGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $membersCountLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $pendingMembersCountGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $pendingMembersCountLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $privacyContextEqual = null;

    /**
     *
     * @var KalturaCategoryStatus
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
    public $inheritedParentIdEqual = null;

    /**
     *
     * @var string
     */
    public $inheritedParentIdIn = null;

    /**
     *
     * @var int
     */
    public $partnerSortValueGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $partnerSortValueLessThanOrEqual = null;

    /**
     *
     * @var string
     */
    public $aggregationCategoriesMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $aggregationCategoriesMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCategoryEntryBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var int
     */
    public $categoryIdEqual = null;

    /**
     *
     * @var string
     */
    public $categoryIdIn = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdIn = null;

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
     * @var string
     */
    public $categoryFullIdsStartsWith = null;

    /**
     *
     * @var KalturaCategoryEntryStatus
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
    public $creatorUserIdEqual = null;

    /**
     *
     * @var string
     */
    public $creatorUserIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandFilter extends KalturaControlPanelCommandBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConversionProfileAssetParamsBaseFilter extends KalturaRelatedFilter {
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
    public $assetParamsIdEqual = null;

    /**
     *
     * @var string
     */
    public $assetParamsIdIn = null;

    /**
     *
     * @var KalturaFlavorReadyBehaviorType
     */
    public $readyBehaviorEqual = null;

    /**
     *
     * @var string
     */
    public $readyBehaviorIn = null;

    /**
     *
     * @var KalturaAssetParamsOrigin
     */
    public $originEqual = null;

    /**
     *
     * @var string
     */
    public $originIn = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConversionProfileBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaConversionProfileStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaConversionProfileType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

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
     * @var string
     */
    public $defaultEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $defaultEntryIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConvertCollectionJobData extends KalturaConvartableJobData {
    /**
     *
     * @var string
     */
    public $destDirLocalPath = null;

    /**
     *
     * @var string
     */
    public $destDirRemoteUrl = null;

    /**
     *
     * @var string
     */
    public $destFileName = null;

    /**
     *
     * @var string
     */
    public $inputXmlLocalPath = null;

    /**
     *
     * @var string
     */
    public $inputXmlRemoteUrl = null;

    /**
     *
     * @var string
     */
    public $commandLinesStr = null;

    /**
     *
     * @var array of KalturaConvertCollectionFlavorData
     */
    public $flavors;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConvertJobData extends KalturaConvartableJobData {
    /**
     *
     * @var string
     */
    public $destFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $destFileSyncRemoteUrl = null;

    /**
     *
     * @var string
     */
    public $logFileSyncLocalPath = null;

    /**
     *
     * @var string
     */
    public $logFileSyncRemoteUrl = null;

    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var string
     */
    public $remoteMediaId = null;

    /**
     *
     * @var string
     */
    public $customData = null;

    /**
     *
     * @var array of KalturaDestFileSyncDescriptor
     */
    public $extraDestFileSyncs;

    /**
     *
     * @var string
     */
    public $engineMessage = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCountryCondition extends KalturaMatchCondition {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileFilter extends KalturaDeliveryProfileBaseFilter {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isLive = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericRtmp extends KalturaDeliveryProfileRtmp {
    /**
     *
     * @var string
     */
    public $pattern = null;

    /**
     * rendererClass
     *
     * @var string
     */
    public $rendererClass = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileVodPackagerHls extends KalturaDeliveryProfileVodPackagerPlayServer {
    /**
     *
     * @var bool
     */
    public $allowFairplayOffline = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEdgeServerNode extends KalturaDeliveryServerNode {
    /**
     * Delivery server playback Domain
     *
     * @var string
     */
    public $playbackDomain = null;

    /**
     * Overdie edge server default configuration - json format
     *
     * @var string
     */
    public $config = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEndUserReportInputFilter extends KalturaReportInputFilter {
    /**
     *
     * @var string
     */
    public $application = null;

    /**
     *
     * @var string
     */
    public $userIds = null;

    /**
     *
     * @var string
     */
    public $playbackContext = null;

    /**
     *
     * @var string
     */
    public $ancestorPlaybackContext = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryIndexAdvancedFilter extends KalturaIndexAdvancedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryReferrerLiveStats extends KalturaEntryLiveStats {
    /**
     *
     * @var string
     */
    public $referrer = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryResource extends KalturaContentResource {
    /**
     * ID of the source entry
     *
     * @var string
     */
    public $entryId = null;

    /**
     * ID of the source flavor params, set to null to use the source flavor
     *
     * @var int
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
class KalturaEntryServerNodeFilter extends KalturaEntryServerNodeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExtractMediaJobData extends KalturaConvartableJobData {
    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     * @var bool
     */
    public $calculateComplexity = null;

    /**
     *
     * @var bool
     */
    public $extractId3Tags = null;

    /**
     * The data output file
     *
     * @var string
     */
    public $destDataFilePath = null;

    /**
     *
     * @var int
     */
    public $detectGOP = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFairPlayPlaybackPluginData extends KalturaDrmPlaybackPluginData {
    /**
     *
     * @var string
     */
    public $certificate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaIntegerField extends KalturaIntegerValue {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFieldCompareCondition extends KalturaCompareCondition {
    /**
     * Field to evaluate
     *
     * @var KalturaIntegerField
     */
    public $field;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaStringField extends KalturaStringValue {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFieldMatchCondition extends KalturaMatchCondition {
    /**
     * Field to evaluate
     *
     * @var KalturaStringField
     */
    public $field;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFileAssetBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaFileAssetObjectType
     */
    public $fileAssetObjectTypeEqual = null;

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
     * @var KalturaFileAssetStatus
     */
    public $statusEqual = null;

    /**
     *
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
class KalturaFileSyncResource extends KalturaContentResource {
    /**
     * The object type of the file sync object
     *
     * @var int
     */
    public $fileSyncObjectType = null;

    /**
     * The object sub-type of the file sync object
     *
     * @var int
     */
    public $objectSubType = null;

    /**
     * The object id of the file sync object
     *
     * @var string
     */
    public $objectId = null;

    /**
     * The version of the file sync object
     *
     * @var string
     */
    public $version = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericXsltSyndicationFeed extends KalturaGenericSyndicationFeed {
    /**
     *
     * @var string
     */
    public $xslt = null;

    /**
     *
     * @var array of KalturaExtendingItemMrssParameter
     */
    public $itemXpathsToExtend;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGeoDistanceCondition extends KalturaMatchCondition {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGeoTimeLiveStats extends KalturaEntryLiveStats {
    /**
     *
     * @var KalturaCoordinate
     */
    public $city;

    /**
     *
     * @var KalturaCoordinate
     */
    public $country;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGroupUserBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     * @var string
     */
    public $groupIdEqual = null;

    /**
     *
     * @var string
     */
    public $groupIdIn = null;

    /**
     *
     * @var KalturaGroupUserStatus
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
class KalturaIpAddressCondition extends KalturaMatchCondition {
    /**
     * allow internal ips
     *
     * @var bool
     */
    public $acceptInternalIps = null;

    /**
     * http header name for extracting the ip
     *
     * @var string
     */
    public $httpHeader = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveAsset extends KalturaFlavorAsset {
    /**
     *
     * @var string
     */
    public $multicastIP = null;

    /**
     *
     * @var int
     */
    public $multicastPort = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveChannelSegmentBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaLiveChannelSegmentStatus
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
    public $channelIdEqual = null;

    /**
     *
     * @var string
     */
    public $channelIdIn = null;

    /**
     *
     * @var float
     */
    public $startTimeGreaterThanOrEqual = null;

    /**
     *
     * @var float
     */
    public $startTimeLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveParams extends KalturaFlavorParams {
    /**
     * Suffix to be added to the stream name after the entry id {entry_id}_{stream_suffix},
     * e.g. for entry id 0_kjdu5jr6 and suffix 1, the stream name will be 0_kjdu5jr6_1
     *
     * @var string
     */
    public $streamSuffix = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParams extends KalturaFlavorParams {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaInfoFilter extends KalturaMediaInfoBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaServerNode extends KalturaDeliveryServerNode {
    /**
     * Media server application name
     *
     * @var string
     */
    public $applicationName = null;

    /**
     * Media server playback port configuration by protocol and format
     *
     * @var array of KalturaKeyValue
     */
    public $mediaServerPortConfig;

    /**
     * Media server playback Domain configuration by protocol and format
     *
     * @var array of KalturaKeyValue
     */
    public $mediaServerPlaybackDomainConfig;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaOperationResource extends KalturaContentResource {
    /**
     * Only KalturaEntryResource and KalturaAssetResource are supported
     *
     * @var KalturaContentResource
     */
    public $resource;

    /**
     *
     * @var array of KalturaOperationAttributes
     */
    public $operationAttributes;

    /**
     * ID of alternative asset params to be used instead of the system default flavor params
     *
     * @var int
     */
    public $assetParamsId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerFilter extends KalturaPartnerBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPermissionBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaPermissionType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

    /**
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $nameIn = null;

    /**
     *
     * @var string
     */
    public $friendlyNameLike = null;

    /**
     *
     * @var string
     */
    public $descriptionLike = null;

    /**
     *
     * @var KalturaPermissionStatus
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
    public $dependsOnPermissionNamesMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $dependsOnPermissionNamesMultiLikeAnd = null;

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
abstract class KalturaPermissionItemBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaPermissionItemType
     */
    public $typeEqual = null;

    /**
     *
     * @var string
     */
    public $typeIn = null;

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
    public $tagsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

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
class KalturaPlaybackContextOptions extends KalturaEntryContextDataParams {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPostConvertJobData extends KalturaConvartableJobData {
    /**
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     * Indicates if a thumbnail should be created
     *
     * @var bool
     */
    public $createThumb = null;

    /**
     * The path of the created thumbnail
     *
     * @var string
     */
    public $thumbPath = null;

    /**
     * The position of the thumbnail in the media file
     *
     * @var int
     */
    public $thumbOffset = null;

    /**
     * The height of the movie, will be used to comapare if this thumbnail is the best we can have
     *
     * @var int
     */
    public $thumbHeight = null;

    /**
     * The bit rate of the movie, will be used to comapare if this thumbnail is the best we can have
     *
     * @var int
     */
    public $thumbBitrate = null;

    /**
     *
     * @var string
     */
    public $customData = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPreviewRestriction extends KalturaSessionRestriction {
    /**
     * The preview restriction length
     *
     * @var int
     */
    public $previewLength = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRecalculateResponseProfileCacheJobData extends KalturaRecalculateCacheJobData {
    /**
     * http / https
     *
     * @var string
     */
    public $protocol = null;

    /**
     *
     * @var KalturaSessionType
     */
    public $ksType = null;

    /**
     *
     * @var array of KalturaIntegerValue
     */
    public $userRoles;

    /**
     * Class name
     *
     * @var string
     */
    public $cachedObjectType = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var string
     */
    public $startObjectKey = null;

    /**
     *
     * @var string
     */
    public $endObjectKey = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRegexCondition extends KalturaMatchCondition {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemoteStorageResources extends KalturaContentResource {
    /**
     * Array of remote stoage resources
     *
     * @var array of KalturaRemoteStorageResource
     */
    public $resources;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileFilter extends KalturaResponseProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSearchComparableAttributeCondition extends KalturaAttributeCondition {
    /**
     *
     * @var KalturaSearchConditionComparison
     */
    public $comparison = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchComparableCondition extends KalturaSearchCondition {
    /**
     *
     * @var KalturaSearchConditionComparison
     */
    public $comparison = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSearchMatchAttributeCondition extends KalturaAttributeCondition {
    /**
     *
     * @var bool
     */
    public $not = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchMatchCondition extends KalturaSearchCondition {
    /**
     *
     * @var bool
     */
    public $not = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeFilter extends KalturaServerNodeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSiteCondition extends KalturaMatchCondition {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSshImportJobData extends KalturaImportJobData {
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
class KalturaStorageDeleteJobData extends KalturaStorageJobData {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageExportJobData extends KalturaStorageJobData {
    /**
     *
     * @var bool
     */
    public $force = null;

    /**
     *
     * @var bool
     */
    public $createLink = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileFilter extends KalturaStorageProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStringResource extends KalturaContentResource {
    /**
     * Textual content
     *
     * @var string
     */
    public $content = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfFilter extends KalturaUiConfBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenFilter extends KalturaUploadTokenBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUserEntryBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $idNotIn = null;

    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdIn = null;

    /**
     *
     * @var string
     */
    public $entryIdNotIn = null;

    /**
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     * @var string
     */
    public $userIdNotIn = null;

    /**
     *
     * @var KalturaUserEntryStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     * @var KalturaUserEntryType
     */
    public $typeEqual = null;

    /**
     *
     * @var KalturaUserEntryExtendedStatus
     */
    public $extendedStatusEqual = null;

    /**
     *
     * @var string
     */
    public $extendedStatusIn = null;

    /**
     *
     * @var string
     */
    public $extendedStatusNotIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUserLoginDataBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var string
     */
    public $loginEmailEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUserRoleBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $nameIn = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var string
     */
    public $descriptionLike = null;

    /**
     *
     * @var KalturaUserRoleStatus
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
    public $tagsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

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
class KalturaWidgetFilter extends KalturaWidgetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlFilter extends KalturaAccessControlBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlProfileFilter extends KalturaAccessControlProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAmazonS3StorageExportJobData extends KalturaStorageExportJobData {
    /**
     *
     * @var KalturaAmazonS3StorageProfileFilesPermissionLevel
     */
    public $filesPermissionInS3 = null;

    /**
     *
     * @var string
     */
    public $s3Region = null;

    /**
     *
     * @var string
     */
    public $sseType = null;

    /**
     *
     * @var string
     */
    public $sseKmsKeyId = null;

    /**
     *
     * @var string
     */
    public $signatureType = null;

    /**
     *
     * @var string
     */
    public $endPoint = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAmazonS3StorageProfileBaseFilter extends KalturaStorageProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnonymousIPContextField extends KalturaStringField {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsFilter extends KalturaAssetParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaBaseEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaBaseEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobFilterExt extends KalturaBatchJobFilter {
    /**
     *
     * @var string
     */
    public $jobTypeAndSubTypeIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryFilter extends KalturaCategoryEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryFilter extends KalturaCategoryBaseFilter {
    /**
     *
     * @var string
     */
    public $freeText = null;

    /**
     *
     * @var string
     */
    public $membersIn = null;

    /**
     *
     * @var string
     */
    public $nameOrReferenceIdStartsWith = null;

    /**
     *
     * @var string
     */
    public $managerEqual = null;

    /**
     *
     * @var string
     */
    public $memberEqual = null;

    /**
     *
     * @var string
     */
    public $fullNameStartsWithIn = null;

    /**
     * not includes the category itself (only sub categories)
     *
     * @var string
     */
    public $ancestorIdIn = null;

    /**
     *
     * @var string
     */
    public $idOrInheritedParentIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaConstantXsltSyndicationFeed extends KalturaGenericXsltSyndicationFeed {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileFilter extends KalturaConversionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsFilter extends KalturaConversionProfileAssetParamsBaseFilter {
    /**
     *
     * @var KalturaConversionProfileFilter
     */
    public $conversionProfileIdFilter;

    /**
     *
     * @var KalturaAssetParamsFilter
     */
    public $assetParamsIdFilter;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCoordinatesContextField extends KalturaStringField {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCountryContextField extends KalturaStringField {
    /**
     * The ip geo coder engine to be used
     *
     * @var KalturaGeoCoderType
     */
    public $geoCoderType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaDataEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaDataEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileAkamaiAppleHttpManifestBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileAkamaiHdsBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileAkamaiHttpBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileGenericAppleHttpBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileGenericHdsBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileGenericHttpBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileGenericSilverLightBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileLiveAppleHttpBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileRtmpBaseFilter extends KalturaDeliveryProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryServerNodeBaseFilter extends KalturaServerNodeFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaDocumentEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaDocumentEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEvalBooleanField extends KalturaBooleanField {
    /**
     * PHP code
     *
     * @var string
     */
    public $code = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEvalStringField extends KalturaStringField {
    /**
     * PHP code
     *
     * @var string
     */
    public $code = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaExternalMediaEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaExternalMediaEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAssetFilter extends KalturaFileAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericDataCenterContentResource extends KalturaDataCenterContentResource {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGoogleVideoSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUserFilter extends KalturaGroupUserBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaITunesSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIpAddressContextField extends KalturaStringField {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaLiveChannelCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaLiveChannelMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentFilter extends KalturaLiveChannelSegmentBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaLiveEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaLiveEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaLiveStreamAdminEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaLiveStreamAdminEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaLiveStreamEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaLiveStreamEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaMediaEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaMediaEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOutput extends KalturaFlavorParamsOutput {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaMixEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaMixEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaObjectIdField extends KalturaStringField {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionFilter extends KalturaPermissionBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemFilter extends KalturaPermissionItemBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaPlayableEntryCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaPlayableEntryMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistCompareAttributeCondition extends KalturaSearchComparableAttributeCondition {
    /**
     *
     * @var KalturaPlaylistCompareAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistMatchAttributeCondition extends KalturaSearchMatchAttributeCondition {
    /**
     *
     * @var KalturaPlaylistMatchAttribute
     */
    public $attribute = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSshUrlResource extends KalturaUrlResource {
    /**
     * SSH private key
     *
     * @var string
     */
    public $privateKey = null;

    /**
     * SSH public key
     *
     * @var string
     */
    public $publicKey = null;

    /**
     * Passphrase for SSH keys
     *
     * @var string
     */
    public $keyPassphrase = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTimeContextField extends KalturaIntegerField {
    /**
     * Time offset in seconds since current time
     *
     * @var int
     */
    public $offset = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaTubeMogulSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserAgentCondition extends KalturaRegexCondition {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserAgentContextField extends KalturaStringField {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEmailContextField extends KalturaStringField {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryFilter extends KalturaUserEntryBaseFilter {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $userIdEqualCurrent = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isAnonymous = null;

    /**
     *
     * @var string
     */
    public $privacyContextEqual = null;

    /**
     *
     * @var string
     */
    public $privacyContextIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserLoginDataFilter extends KalturaUserLoginDataBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleFilter extends KalturaUserRoleBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWebcamTokenResource extends KalturaDataCenterContentResource {
    /**
     * Token that returned from media server such as FMS or red5.
     *
     * @var string
     */
    public $token = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYahooSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAdminUserBaseFilter extends KalturaUserFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAmazonS3StorageProfileFilter extends KalturaAmazonS3StorageProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaApiActionPermissionItemBaseFilter extends KalturaPermissionItemFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaApiParameterPermissionItemBaseFilter extends KalturaPermissionItemFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAssetParamsOutputBaseFilter extends KalturaAssetParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDataEntryBaseFilter extends KalturaBaseEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiAppleHttpManifestFilter extends KalturaDeliveryProfileAkamaiAppleHttpManifestBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHdsFilter extends KalturaDeliveryProfileAkamaiHdsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHttpFilter extends KalturaDeliveryProfileAkamaiHttpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericAppleHttpFilter extends KalturaDeliveryProfileGenericAppleHttpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHdsFilter extends KalturaDeliveryProfileGenericHdsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHttpFilter extends KalturaDeliveryProfileGenericHttpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericSilverLightFilter extends KalturaDeliveryProfileGenericSilverLightBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileLiveAppleHttpFilter extends KalturaDeliveryProfileLiveAppleHttpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileRtmpFilter extends KalturaDeliveryProfileRtmpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryServerNodeFilter extends KalturaDeliveryServerNodeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFlavorAssetBaseFilter extends KalturaAssetFilter {
    /**
     *
     * @var int
     */
    public $flavorParamsIdEqual = null;

    /**
     *
     * @var string
     */
    public $flavorParamsIdIn = null;

    /**
     *
     * @var KalturaFlavorAssetStatus
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFlavorParamsBaseFilter extends KalturaAssetParamsFilter {
    /**
     *
     * @var KalturaContainerFormat
     */
    public $formatEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericSyndicationFeedFilter extends KalturaGenericSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGoogleVideoSyndicationFeedFilter extends KalturaGoogleVideoSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeedFilter extends KalturaITunesSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaOperaSyndicationFeed extends KalturaConstantXsltSyndicationFeed {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlaylistBaseFilter extends KalturaBaseEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaQuizUserEntryBaseFilter extends KalturaUserEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRokuSyndicationFeed extends KalturaConstantXsltSyndicationFeed {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerFileResource extends KalturaGenericDataCenterContentResource {
    /**
     * Full path to the local file
     *
     * @var string
     */
    public $localFilePath = null;

    /**
     * Should keep original file (false = mv, true = cp)
     *
     * @var bool
     */
    public $keepOriginalFile = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaThumbAssetBaseFilter extends KalturaAssetFilter {
    /**
     *
     * @var int
     */
    public $thumbParamsIdEqual = null;

    /**
     *
     * @var string
     */
    public $thumbParamsIdIn = null;

    /**
     *
     * @var KalturaThumbAssetStatus
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaThumbParamsBaseFilter extends KalturaAssetParamsFilter {
    /**
     *
     * @var KalturaContainerFormat
     */
    public $formatEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeedFilter extends KalturaTubeMogulSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadedFileTokenResource extends KalturaGenericDataCenterContentResource {
    /**
     * Token that returned from upload.upload action or uploadToken.add action.
     *
     * @var string
     */
    public $token = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeedFilter extends KalturaYahooSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserFilter extends KalturaAdminUserBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiActionPermissionItemFilter extends KalturaApiActionPermissionItemBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiParameterPermissionItemFilter extends KalturaApiParameterPermissionItemBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsOutputFilter extends KalturaAssetParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryFilter extends KalturaDataEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDeliveryProfileGenericRtmpBaseFilter extends KalturaDeliveryProfileRtmpFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEdgeServerNodeBaseFilter extends KalturaDeliveryServerNodeFilter {
    /**
     *
     * @var string
     */
    public $playbackDomainLike = null;

    /**
     *
     * @var string
     */
    public $playbackDomainMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $playbackDomainMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetFilter extends KalturaFlavorAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsFilter extends KalturaFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericXsltSyndicationFeedBaseFilter extends KalturaGenericSyndicationFeedFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntry extends KalturaLiveStreamEntry {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaServerNodeBaseFilter extends KalturaDeliveryServerNodeFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistFilter extends KalturaPlaylistBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetFilter extends KalturaThumbAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsFilter extends KalturaThumbParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericRtmpFilter extends KalturaDeliveryProfileGenericRtmpBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEdgeServerNodeFilter extends KalturaEdgeServerNodeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsFilter {
    /**
     *
     * @var int
     */
    public $flavorParamsIdEqual = null;

    /**
     *
     * @var string
     */
    public $flavorParamsVersionEqual = null;

    /**
     *
     * @var string
     */
    public $flavorAssetIdEqual = null;

    /**
     *
     * @var string
     */
    public $flavorAssetVersionEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericXsltSyndicationFeedFilter extends KalturaGenericXsltSyndicationFeedBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveAssetBaseFilter extends KalturaFlavorAssetFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveParamsBaseFilter extends KalturaFlavorParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaFlavorParamsBaseFilter extends KalturaFlavorParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaServerNodeFilter extends KalturaMediaServerNodeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMixEntryBaseFilter extends KalturaPlayableEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaThumbParamsOutputBaseFilter extends KalturaThumbParamsFilter {
    /**
     *
     * @var int
     */
    public $thumbParamsIdEqual = null;

    /**
     *
     * @var string
     */
    public $thumbParamsVersionEqual = null;

    /**
     *
     * @var string
     */
    public $thumbAssetIdEqual = null;

    /**
     *
     * @var string
     */
    public $thumbAssetVersionEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOutputFilter extends KalturaFlavorParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveAssetFilter extends KalturaLiveAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveParamsFilter extends KalturaLiveParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsFilter extends KalturaMediaFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryFilter extends KalturaMixEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOutputFilter extends KalturaThumbParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveEntryBaseFilter extends KalturaMediaEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryFilter extends KalturaLiveEntryBaseFilter {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isLive = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isRecordedEntryIdEmpty = null;

    /**
     *
     * @var string
     */
    public $hasMediaServerHostname = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOutputFilter extends KalturaMediaFlavorParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveChannelBaseFilter extends KalturaLiveEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveStreamEntryBaseFilter extends KalturaLiveEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelFilter extends KalturaLiveChannelBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryFilter extends KalturaLiveStreamEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveStreamAdminEntryBaseFilter extends KalturaLiveStreamEntryFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryFilter extends KalturaLiveStreamAdminEntryBaseFilter {
}

