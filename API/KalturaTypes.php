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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
require_once("KalturaClientBase.php");

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseRestriction extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAccessControl extends KalturaObjectBase
{
    /**
     * The id of the Access Control Profile
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The name of the Access Control Profile
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Access Control Profile
     *
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Access Control Profile
     *
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * True if this Conversion Profile is the default
     *
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Array of Access Control Restrictions
     *
     *
     * @var array of KalturaBaseRestriction
     */
    public $restrictions;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaSearchItem extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilter extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $orderBy = null;

    /**
     *
     *
     * @var KalturaSearchItem
     */
    public $advancedSearch;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAccessControlBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

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

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAccessControlFilter extends KalturaAccessControlBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterPager extends KalturaObjectBase
{
    /**
     * The number of objects to retrieve. (Default is 30, maximum page size is 500).
     *
     *
     * @var int
     */
    public $pageSize = null;

    /**
     * The page number for which {pageSize} of objects should be retrieved (Default is 1).
     *
     *
     * @var int
     */
    public $pageIndex = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAccessControlListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaAccessControl
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUser extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $screenName = null;

    /**
     * DEPRECATED
     *
     * @var string
     */
    public $fullName = null;

    /**
     *
     *
     * @var string
     */
    public $email = null;

    /**
     *
     *
     * @var int
     */
    public $dateOfBirth = null;

    /**
     *
     *
     * @var string
     */
    public $country = null;

    /**
     *
     *
     * @var string
     */
    public $state = null;

    /**
     *
     *
     * @var string
     */
    public $city = null;

    /**
     *
     *
     * @var string
     */
    public $zip = null;

    /**
     *
     *
     * @var string
     */
    public $thumbnailUrl = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
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
     *
     * @var KalturaGender
     */
    public $gender = null;

    /**
     *
     *
     * @var KalturaUserStatus
     */
    public $status = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
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
     *
     * @var int
     */
    public $indexedPartnerDataInt = null;

    /**
     *
     *
     * @var string
     */
    public $indexedPartnerDataString = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $storageSize = null;

    /**
     *
     *
     * @var string
     * @insertonly
     */
    public $password = null;

    /**
     *
     *
     * @var string
     */
    public $firstName = null;

    /**
     *
     *
     * @var string
     */
    public $lastName = null;

    /**
     *
     *
     * @var bool
     */
    public $isAdmin = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $lastLoginTime = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $statusUpdatedAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $deletedAt = null;

    /**
     *
     *
     * @var bool
     * @readonly
     */
    public $loginEnabled = null;

    /**
     *
     *
     * @var string
     */
    public $roleIds = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $roleNames = null;

    /**
     *
     *
     * @var bool
     * @readonly
     */
    public $isAccountOwner = null;

    /**
     *
     *
     * @var string
     */
    public $allowedPartnerIds = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAdminUser extends KalturaUser
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicEnum extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaOperationAttributes extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseEntry extends KalturaObjectBase
{
    /**
     * Auto generated 10 characters alphanumeric string
     *
     *
     * @var string
     * @readonly
     */
    public $id = null;

    /**
     * Entry name (Min 1 chars)
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * Entry description
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The ID of the user who is the owner of this entry
     *
     *
     * @var string
     */
    public $userId = null;

    /**
     * Entry tags
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     * Entry admin tags can be updated only by administrators
     *
     *
     * @var string
     */
    public $adminTags = null;

    /**
     *
     *
     * @var string
     */
    public $categories = null;

    /**
     *
     *
     * @var string
     */
    public $categoriesIds = null;

    /**
     *
     *
     * @var KalturaEntryStatus
     * @readonly
     */
    public $status = null;

    /**
     * Entry moderation status
     *
     *
     * @var KalturaEntryModerationStatus
     * @readonly
     */
    public $moderationStatus = null;

    /**
     * Number of moderation requests waiting for this entry
     *
     *
     * @var int
     * @readonly
     */
    public $moderationCount = null;

    /**
     * The type of the entry, this is auto filled by the derived entry object
     *
     *
     * @var KalturaEntryType
     */
    public $type = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * Entry update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     * Calculated rank
     *
     *
     * @var float
     * @readonly
     */
    public $rank = null;

    /**
     * The total (sum) of all votes
     *
     *
     * @var int
     * @readonly
     */
    public $totalRank = null;

    /**
     * Number of votes
     *
     *
     * @var int
     * @readonly
     */
    public $votes = null;

    /**
     *
     *
     * @var int
     */
    public $groupId = null;

    /**
     * Can be used to store various partner related data as a string
     *
     *
     * @var string
     */
    public $partnerData = null;

    /**
     * Download URL for the entry
     *
     *
     * @var string
     * @readonly
     */
    public $downloadUrl = null;

    /**
     * Indexed search text for full text search
     *
     * @var string
     * @readonly
     */
    public $searchText = null;

    /**
     * License type used for this entry
     *
     *
     * @var KalturaLicenseType
     */
    public $licenseType = null;

    /**
     * Version of the entry data
     *
     * @var int
     * @readonly
     */
    public $version = null;

    /**
     * Thumbnail URL
     *
     *
     * @var string
     * @insertonly
     */
    public $thumbnailUrl = null;

    /**
     * The Access Control ID assigned to this entry (null when not set, send -1 to remove)
     *
     *
     * @var int
     */
    public $accessControlId = null;

    /**
     * Entry scheduling start date (null when not set, send -1 to remove)
     *
     *
     * @var int
     */
    public $startDate = null;

    /**
     * Entry scheduling end date (null when not set, send -1 to remove)
     *
     *
     * @var int
     */
    public $endDate = null;

    /**
     * Entry external reference id
     *
     *
     * @var string
     */
    public $referenceId = null;

    /**
     * ID of temporary entry that will replace this entry when it's approved and ready for replacement
     *
     *
     * @var string
     * @readonly
     */
    public $replacingEntryId = null;

    /**
     * ID of the entry that will be replaced when the replacement approved and this entry is ready
     *
     *
     * @var string
     * @readonly
     */
    public $replacedEntryId = null;

    /**
     * Status of the replacement readiness and approval
     *
     *
     * @var KalturaEntryReplacementStatus
     * @readonly
     */
    public $replacementStatus = null;

    /**
     * Can be used to store various partner related data as a numeric value
     *
     *
     * @var int
     */
    public $partnerSortValue = null;

    /**
     * Override the default ingestion profile
     *
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     * ID of source root entry, used for clipped, skipped and cropped entries that created from another entry
     *
     *
     * @var string
     * @readonly
     */
    public $rootEntryId = null;

    /**
     * clipping, skipping and cropping attributes that used to create this entry
     *
     *
     * @var array of KalturaOperationAttributes
     */
    public $operationAttributes;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaResource extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRemotePath extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $storageProfileId = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $uri = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRemotePathListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaRemotePath
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseEntryBaseFilter extends KalturaFilter
{
    /**
     * This filter should be in use for retrieving only a specific entry (identified by its entryId).
     * @var string
     *
     * @var string
     */
    public $idEqual = null;

    /**
     * This filter should be in use for retrieving few specific entries
     * (string should include comma separated list of entryId strings).
     * @var string
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     *
     * @var string
     */
    public $idNotIn = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry names
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $nameLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry names,
     * while applying an OR logic to retrieve entries that contain at least one input string
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $nameMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry names,
     * while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $nameMultiLikeAnd = null;

    /**
     * This filter should be in use for retrieving entries with a specific name.
     * @var string
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     * This filter should be in use for retrieving only entries
     * which were uploaded by/assigned to users of a specific Kaltura Partner (identified by Partner ID).
     * @var int
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * This filter should be in use for retrieving only entries within Kaltura network
     * which were uploaded by/assigned to users of few Kaltura Partners
     * (string should include comma separated list of PartnerIDs).
     * @var string
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     * This filter parameter should be in use for retrieving only entries,
     * uploaded by/assigned to a specific user (identified by user Id).
     * @var string
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry tags
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $tagsLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * while applying an OR logic to retrieve entries that contain at least one input string
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $tagsMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $tagsMultiLikeAnd = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It should include only one string to search for in entry tags set by an ADMIN user
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $adminTagsLike = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags,
     * set by an ADMIN user, while applying an OR logic to retrieve entries that contain at least one input string
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $adminTagsMultiLikeOr = null;

    /**
     * This filter should be in use for retrieving specific entries.
     * It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user,
     * while applying an AND logic to retrieve entries that contain all input strings
     * (no wildcards, spaces are treated as part of the string).
     * @var string
     *
     * @var string
     */
    public $adminTagsMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $categoriesMatchAnd = null;

    /**
     *
     *
     * @var string
     */
    public $categoriesMatchOr = null;

    /**
     *
     *
     * @var string
     */
    public $categoriesIdsMatchAnd = null;

    /**
     *
     *
     * @var string
     */
    public $categoriesIdsMatchOr = null;

    /**
     * This filter should be in use for retrieving only entries,
     * at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.
     * @var KalturaEntryStatus
     *
     * @var KalturaEntryStatus
     */
    public $statusEqual = null;

    /**
     * This filter should be in use for retrieving only entries,
     * not at a specific {@link ?object=KalturaEntryStatus KalturaEntryStatus}.
     * @var KalturaEntryStatus
     *
     * @var KalturaEntryStatus
     */
    public $statusNotEqual = null;

    /**
     * This filter should be in use for retrieving only entries,
     * at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
     * @dynamicType KalturaEntryStatus
     *
     * @var string
     */
    public $statusIn = null;

    /**
     * This filter should be in use for retrieving only entries,
     * not at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
     * @dynamicType KalturaEntryStatus
     *
     * @var string
     */
    public $statusNotIn = null;

    /**
     *
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatusEqual = null;

    /**
     *
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatusNotEqual = null;

    /**
     *
     *
     * @var string
     */
    public $moderationStatusIn = null;

    /**
     *
     *
     * @var string
     */
    public $moderationStatusNotIn = null;

    /**
     *
     *
     * @var KalturaEntryType
     */
    public $typeEqual = null;

    /**
     * This filter should be in use for retrieving entries of few {@link ?object=KalturaEntryType KalturaEntryType}
     * (string should include a comma separated list of {@link ?object=KalturaEntryType KalturaEntryType} enumerated parameters).
     * @dynamicType KalturaEntryType
     *
     * @var string
     */
    public $typeIn = null;

    /**
     * This filter parameter should be in use for retrieving only entries
     * which were created at Kaltura system after a specific time/date (standard timestamp format).
     * @var int
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * This filter parameter should be in use for retrieving only entries
     * which were created at Kaltura system before a specific time/date (standard timestamp format).
     * @var int
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
    public $groupIdEqual = null;

    /**
     * This filter should be in use for retrieving specific entries
     * while search match the input string within all of the following metadata attributes:
     * name, description, tags, adminTags.
     * @var string
     *
     * @var string
     */
    public $searchTextMatchAnd = null;

    /**
     * This filter should be in use for retrieving specific entries
     * while search match the input string within at least one of the following metadata attributes:
     * name, description, tags, adminTags.
     * @var string
     *
     * @var string
     */
    public $searchTextMatchOr = null;

    /**
     *
     *
     * @var int
     */
    public $accessControlIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $accessControlIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $startDateGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $startDateLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $startDateGreaterThanOrEqualOrNull = null;

    /**
     *
     *
     * @var int
     */
    public $startDateLessThanOrEqualOrNull = null;

    /**
     *
     *
     * @var int
     */
    public $endDateGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $endDateLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $endDateGreaterThanOrEqualOrNull = null;

    /**
     *
     *
     * @var int
     */
    public $endDateLessThanOrEqualOrNull = null;

    /**
     *
     *
     * @var string
     */
    public $referenceIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $referenceIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $replacingEntryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $replacingEntryIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $replacedEntryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $replacedEntryIdIn = null;

    /**
     *
     *
     * @var KalturaEntryReplacementStatus
     */
    public $replacementStatusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $replacementStatusIn = null;

    /**
     *
     *
     * @var int
     */
    public $partnerSortValueGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $partnerSortValueLessThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $rootEntryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $rootEntryIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $tagsNameMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $tagsAdminTagsMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $tagsAdminTagsNameMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $tagsNameMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $tagsAdminTagsMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $tagsAdminTagsNameMultiLikeAnd = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseEntryFilter extends KalturaBaseEntryBaseFilter
{
    /**
     *
     *
     * @var string
     */
    public $freeText = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $isRoot = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseEntryListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBaseEntry
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaModerationFlag extends KalturaObjectBase
{
    /**
     * Moderation flag id
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The user id that added the moderation flag
     *
     * @var string
     * @readonly
     */
    public $userId = null;

    /**
     * The type of the moderation flag (entry or user)
     *
     * @var KalturaModerationObjectType
     * @readonly
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
     * @readonly
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
     *
     * @var KalturaModerationFlagType
     */
    public $flagType = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaModerationFlagListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaModerationFlag
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntryContextDataParams extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $referrer = null;

    /**
     *
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     *
     * @var string
     */
    public $streamerType = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntryContextDataResult extends KalturaObjectBase
{
    /**
     *
     *
     * @var bool
     */
    public $isSiteRestricted = null;

    /**
     *
     *
     * @var bool
     */
    public $isCountryRestricted = null;

    /**
     *
     *
     * @var bool
     */
    public $isSessionRestricted = null;

    /**
     *
     *
     * @var bool
     */
    public $isIpAddressRestricted = null;

    /**
     *
     *
     * @var bool
     */
    public $isUserAgentRestricted = null;

    /**
     *
     *
     * @var int
     */
    public $previewLength = null;

    /**
     *
     *
     * @var bool
     */
    public $isScheduledNow = null;

    /**
     *
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
     *
     * @var string
     */
    public $storageProfileIds = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadPluginData extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $field = null;

    /**
     *
     *
     * @var string
     */
    public $value = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadResult extends KalturaObjectBase
{
    /**
     * The id of the result
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     * The id of the parent job
     *
     *
     * @var int
     */
    public $bulkUploadJobId = null;

    /**
     * The index of the line in the CSV
     *
     *
     * @var int
     */
    public $lineIndex = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var KalturaBulkUploadAction
     */
    public $action = null;

    /**
     *
     *
     * @var string
     */
    public $entryId = null;

    /**
     *
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     *
     * @var KalturaBulkUploadResultObjectType
     */
    public $bulkUploadResultObjectType = null;

    /**
     *
     *
     * @var int
     */
    public $entryStatus = null;

    /**
     * The data as recieved in the csv
     *
     *
     * @var string
     */
    public $rowData = null;

    /**
     *
     *
     * @var string
     */
    public $title = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

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
    public $url = null;

    /**
     *
     *
     * @var string
     */
    public $contentType = null;

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
    public $accessControlProfileId = null;

    /**
     *
     *
     * @var string
     */
    public $category = null;

    /**
     *
     *
     * @var int
     */
    public $scheduleStartDate = null;

    /**
     *
     *
     * @var int
     */
    public $scheduleEndDate = null;

    /**
     *
     *
     * @var string
     */
    public $thumbnailUrl = null;

    /**
     *
     *
     * @var bool
     */
    public $thumbnailSaved = null;

    /**
     *
     *
     * @var string
     */
    public $partnerData = null;

    /**
     *
     *
     * @var string
     */
    public $errorDescription = null;

    /**
     *
     *
     * @var array of KalturaBulkUploadPluginData
     */
    public $pluginsData;

    /**
     *
     *
     * @var string
     */
    public $sshPrivateKey = null;

    /**
     *
     *
     * @var string
     */
    public $sshPublicKey = null;

    /**
     *
     *
     * @var string
     */
    public $sshKeyPassphrase = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUpload extends KalturaObjectBase
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
     * @var string
     */
    public $uploadedBy = null;

    /**
     *
     *
     * @var string
     */
    public $uploadedByUserId = null;

    /**
     *
     *
     * @var int
     */
    public $uploadedOn = null;

    /**
     *
     *
     * @var int
     */
    public $numOfEntries = null;

    /**
     *
     *
     * @var KalturaBatchJobStatus
     */
    public $status = null;

    /**
     *
     *
     * @var string
     */
    public $logFileUrl = null;

    /**
     * DEPRECATED
     *
     * @var string
     */
    public $csvFileUrl = null;

    /**
     *
     *
     * @var string
     */
    public $bulkFileUrl = null;

    /**
     *
     *
     * @var KalturaBulkUploadType
     */
    public $bulkUploadType = null;

    /**
     *
     *
     * @var array of KalturaBulkUploadResult
     */
    public $results;

    /**
     *
     *
     * @var string
     */
    public $error = null;

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
    public $fileName = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBulkUpload
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategory extends KalturaObjectBase
{
    /**
     * The id of the Category
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     */
    public $parentId = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $depth = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The name of the Category.
     * The following characters are not allowed: '<', '>', ','
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * The full name of the Category
     *
     *
     * @var string
     * @readonly
     */
    public $fullName = null;

    /**
     * Number of entries in this Category (including child categories)
     *
     *
     * @var int
     * @readonly
     */
    public $entriesCount = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaCategoryBaseFilter extends KalturaFilter
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
    public $parentIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $parentIdIn = null;

    /**
     *
     *
     * @var int
     */
    public $depthEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fullNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $fullNameStartsWith = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryFilter extends KalturaCategoryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaCategory
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaConversionProfileAssetParamsBaseFilter extends KalturaFilter
{
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
    public $assetParamsIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $assetParamsIdIn = null;

    /**
     *
     *
     * @var KalturaFlavorReadyBehaviorType
     */
    public $readyBehaviorEqual = null;

    /**
     *
     *
     * @var string
     */
    public $readyBehaviorIn = null;

    /**
     *
     *
     * @var KalturaAssetParamsOrigin
     */
    public $originEqual = null;

    /**
     *
     *
     * @var string
     */
    public $originIn = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaConversionProfileBaseFilter extends KalturaFilter
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
     * @var KalturaConversionProfileStatus
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
    public $nameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

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
     * @var string
     */
    public $defaultEntryIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $defaultEntryIdIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfileFilter extends KalturaConversionProfileBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetParamsBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     *
     * @var KalturaNullableBoolean
     */
    public $isSystemDefaultEqual = null;

    /**
     *
     *
     * @var string
     */
    public $tagsEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetParamsFilter extends KalturaAssetParamsBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfileAssetParamsFilter extends KalturaConversionProfileAssetParamsBaseFilter
{
    /**
     *
     *
     * @var KalturaConversionProfileFilter
     */
    public $conversionProfileIdFilter;

    /**
     *
     *
     * @var KalturaAssetParamsFilter
     */
    public $assetParamsIdFilter;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfileAssetParams extends KalturaObjectBase
{
    /**
     * The id of the conversion profile
     *
     *
     * @var int
     * @readonly
     */
    public $conversionProfileId = null;

    /**
     * The id of the asset params
     *
     *
     * @var int
     * @readonly
     */
    public $assetParamsId = null;

    /**
     * The ingestion origin of the asset params
     *
     *
     * @var KalturaFlavorReadyBehaviorType
     */
    public $readyBehavior = null;

    /**
     * The ingestion origin of the asset params
     *
     *
     * @var KalturaAssetParamsOrigin
     */
    public $origin = null;

    /**
     * Asset params system name
     *
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

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfileAssetParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaConversionProfileAssetParams
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCropDimensions extends KalturaObjectBase
{
    /**
     * Crop left point
     *
     *
     * @var int
     */
    public $left = null;

    /**
     * Crop top point
     *
     *
     * @var int
     */
    public $top = null;

    /**
     * Crop width
     *
     *
     * @var int
     */
    public $width = null;

    /**
     * Crop height
     *
     *
     * @var int
     */
    public $height = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfile extends KalturaObjectBase
{
    /**
     * The id of the Conversion Profile
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var KalturaConversionProfileStatus
     */
    public $status = null;

    /**
     * The name of the Conversion Profile
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Conversion Profile
     *
     *
     * @var string
     */
    public $systemName = null;

    /**
     * Comma separated tags
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     * The description of the Conversion Profile
     *
     *
     * @var string
     */
    public $description = null;

    /**
     * ID of the default entry to be used for template data
     *
     *
     * @var string
     */
    public $defaultEntryId = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * List of included flavor ids (comma separated)
     *
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     * Indicates that this conversion profile is system default
     *
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Indicates that this conversion profile is partner default
     *
     *
     * @var bool
     * @readonly
     */
    public $isPartnerDefault = null;

    /**
     * Cropping dimensions
     * DEPRECATED
     *
     * @var KalturaCropDimensions
     */
    public $cropDimensions;

    /**
     * Clipping start position (in miliseconds)
     * DEPRECATED
     *
     * @var int
     */
    public $clipStart = null;

    /**
     * Clipping duration (in miliseconds)
     * DEPRECATED
     *
     * @var int
     */
    public $clipDuration = null;

    /**
     * XSL to transform ingestion MRSS XML
     *
     *
     * @var string
     */
    public $xslTransformation = null;

    /**
     * ID of default storage profile to be used for linked net-storage file syncs
     *
     *
     * @var int
     */
    public $storageProfileId = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaConversionProfile
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDataEntry extends KalturaBaseEntry
{
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
     * @insertonly
     */
    public $retrieveDataContentByGet = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDataEntryBaseFilter extends KalturaBaseEntryFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDataEntryFilter extends KalturaDataEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDataListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDataEntry
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConversionAttribute extends KalturaObjectBase
{
    /**
     * The id of the flavor params, set to null for source flavor
     *
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     * Attribute name
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * Attribute value
     *
     *
     * @var string
     */
    public $value = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEmailIngestionProfile extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

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
     * @var string
     */
    public $emailAddress = null;

    /**
     *
     *
     * @var string
     */
    public $mailboxId = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var int
     */
    public $conversionProfile2Id = null;

    /**
     *
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatus = null;

    /**
     *
     *
     * @var KalturaEmailIngestionProfileStatus
     * @readonly
     */
    public $status = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var string
     */
    public $defaultCategory = null;

    /**
     *
     *
     * @var string
     */
    public $defaultUserId = null;

    /**
     *
     *
     * @var string
     */
    public $defaultTags = null;

    /**
     *
     *
     * @var string
     */
    public $defaultAdminTags = null;

    /**
     *
     *
     * @var int
     */
    public $maxAttachmentSizeKbytes = null;

    /**
     *
     *
     * @var int
     */
    public $maxAttachmentsPerMail = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlayableEntry extends KalturaBaseEntry
{
    /**
     * Number of plays
     *
     *
     * @var int
     * @readonly
     */
    public $plays = null;

    /**
     * Number of views
     *
     *
     * @var int
     * @readonly
     */
    public $views = null;

    /**
     * The width in pixels
     *
     *
     * @var int
     * @readonly
     */
    public $width = null;

    /**
     * The height in pixels
     *
     *
     * @var int
     * @readonly
     */
    public $height = null;

    /**
     * The duration in seconds
     *
     *
     * @var int
     * @readonly
     */
    public $duration = null;

    /**
     * The duration in miliseconds
     *
     *
     * @var int
     * @readonly
     */
    public $msDuration = null;

    /**
     * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
     *
     *
     * @var KalturaDurationType
     * @readonly
     */
    public $durationType = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaEntry extends KalturaPlayableEntry
{
    /**
     * The media type of the entry
     *
     *
     * @var KalturaMediaType
     * @insertonly
     */
    public $mediaType = null;

    /**
     * Override the default conversion quality
     * DEPRECATED - use conversionProfileId instead
     *
     * @var string
     * @insertonly
     */
    public $conversionQuality = null;

    /**
     * The source type of the entry
     *
     * @var KalturaSourceType
     * @insertonly
     */
    public $sourceType = null;

    /**
     * The search provider type used to import this entry
     *
     * @var KalturaSearchProviderType
     * @insertonly
     */
    public $searchProviderType = null;

    /**
     * The ID of the media in the importing site
     *
     * @var string
     * @insertonly
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
     * @readonly
     */
    public $mediaDate = null;

    /**
     * The URL used for playback. This is not the download URL.
     *
     * @var string
     * @readonly
     */
    public $dataUrl = null;

    /**
     * Comma separated flavor params ids that exists for this media entry
     *
     *
     * @var string
     * @readonly
     */
    public $flavorParamsIds = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAsset extends KalturaObjectBase
{
    /**
     * The ID of the Flavor Asset
     *
     *
     * @var string
     * @readonly
     */
    public $id = null;

    /**
     * The entry ID of the Flavor Asset
     *
     *
     * @var string
     * @readonly
     */
    public $entryId = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The version of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $version = null;

    /**
     * The size (in KBytes) of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $size = null;

    /**
     * Tags used to identify the Flavor Asset in various scenarios
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     * The file extension
     *
     *
     * @var string
     * @insertonly
     */
    public $fileExt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $deletedAt = null;

    /**
     * System description, error message, warnings and failure cause.
     *
     * @var string
     * @readonly
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

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorAsset extends KalturaAsset
{
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     *
     * @var int
     * @insertonly
     */
    public $flavorParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $height = null;

    /**
     * The overall bitrate (in KBits) of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $bitrate = null;

    /**
     * The frame rate (in FPS) of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $frameRate = null;

    /**
     * True if this Flavor Asset is the original source
     *
     *
     * @var bool
     * @readonly
     */
    public $isOriginal = null;

    /**
     * True if this Flavor Asset is playable in KDP
     *
     *
     * @var bool
     * @readonly
     */
    public $isWeb = null;

    /**
     * The container format
     *
     *
     * @var string
     * @readonly
     */
    public $containerFormat = null;

    /**
     * The video codec
     *
     *
     * @var string
     * @readonly
     */
    public $videoCodecId = null;

    /**
     * The status of the Flavor Asset
     *
     *
     * @var KalturaFlavorAssetStatus
     * @readonly
     */
    public $status = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaContentResource extends KalturaResource
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
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
    public $sizeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $sizeLessThanOrEqual = null;

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

    /**
     *
     *
     * @var int
     */
    public $deletedAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $deletedAtLessThanOrEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilter extends KalturaAssetBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorAssetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaFlavorAsset
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaString extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $value = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetParams extends KalturaObjectBase
{
    /**
     * The id of the Flavor Params
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /*
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * The name of the Flavor Params
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * System name of the Flavor Params
     *
     *
     * @var string
     */
    public $systemName = null;

    /**
     * The description of the Flavor Params
     *
     *
     * @var string
     */
    public $description = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * True if those Flavor Params are part of system defaults
     *
     *
     * @var KalturaNullableBoolean
     * @readonly
     */
    public $isSystemDefault = null;

    /**
     * The Flavor Params tags are used to identify the flavor for different usage (e.g. web, hd, mobile)
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     * Array of partner permisison names that required for using this asset params
     *
     *
     * @var array of KalturaString
     */
    public $requiredPermissions;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorParams extends KalturaAssetParams
{
    /**
     * The video codec of the Flavor Params
     *
     *
     * @var KalturaVideoCodec
     */
    public $videoCodec = null;

    /**
     * The video bitrate (in KBits) of the Flavor Params
     *
     *
     * @var int
     */
    public $videoBitrate = null;

    /**
     * The audio codec of the Flavor Params
     *
     *
     * @var KalturaAudioCodec
     */
    public $audioCodec = null;

    /**
     * The audio bitrate (in KBits) of the Flavor Params
     *
     *
     * @var int
     */
    public $audioBitrate = null;

    /**
     * The number of audio channels for "downmixing"
     *
     *
     * @var int
     */
    public $audioChannels = null;

    /**
     * The audio sample rate of the Flavor Params
     *
     *
     * @var int
     */
    public $audioSampleRate = null;

    /**
     * The desired width of the Flavor Params
     *
     *
     * @var int
     */
    public $width = null;

    /**
     * The desired height of the Flavor Params
     *
     *
     * @var int
     */
    public $height = null;

    /**
     * The frame rate of the Flavor Params
     *
     *
     * @var int
     */
    public $frameRate = null;

    /**
     * The gop size of the Flavor Params
     *
     *
     * @var int
     */
    public $gopSize = null;

    /**
     * The list of conversion engines (comma separated)
     *
     *
     * @var string
     */
    public $conversionEngines = null;

    /**
     * The list of conversion engines extra params (separated with "|")
     *
     *
     * @var string
     */
    public $conversionEnginesExtraParams = null;

    /**
     *
     *
     * @var bool
     */
    public $twoPass = null;

    /**
     *
     *
     * @var int
     */
    public $deinterlice = null;

    /**
     *
     *
     * @var int
     */
    public $rotate = null;

    /**
     *
     *
     * @var string
     */
    public $operators = null;

    /**
     *
     *
     * @var int
     */
    public $engineVersion = null;

    /**
     * The container format of the Flavor Params
     *
     *
     * @var KalturaContainerFormat
     */
    public $format = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorAssetWithParams extends KalturaObjectBase
{
    /**
     * The Flavor Asset (Can be null when there are params without asset)
     *
     *
     * @var KalturaFlavorAsset
     */
    public $flavorAsset;

    /**
     * The Flavor Params
     *
     *
     * @var KalturaFlavorParams
     */
    public $flavorParams;

    /**
     * The entry id
     *
     *
     * @var string
     */
    public $entryId = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFlavorParamsBaseFilter extends KalturaAssetParamsFilter
{
    /**
     *
     *
     * @var KalturaContainerFormat
     */
    public $formatEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorParamsFilter extends KalturaFlavorParamsBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaFlavorParams
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamBitrate extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $bitrate = null;

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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamEntry extends KalturaMediaEntry
{
    /**
     * The message to be presented when the stream is offline
     *
     *
     * @var string
     */
    public $offlineMessage = null;

    /**
     * The stream id as provided by the provider
     *
     *
     * @var string
     * @readonly
     */
    public $streamRemoteId = null;

    /**
     * The backup stream id as provided by the provider
     *
     *
     * @var string
     * @readonly
     */
    public $streamRemoteBackupId = null;

    /**
     * Array of supported bitrates
     *
     *
     * @var array of KalturaLiveStreamBitrate
     */
    public $bitrates;

    /**
     *
     *
     * @var string
     */
    public $primaryBroadcastingUrl = null;

    /**
     *
     *
     * @var string
     */
    public $secondaryBroadcastingUrl = null;

    /**
     *
     *
     * @var string
     */
    public $streamName = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamAdminEntry extends KalturaLiveStreamEntry
{
    /**
     * The broadcast primary ip
     *
     *
     * @var string
     */
    public $encodingIP1 = null;

    /**
     * The broadcast secondary ip
     *
     *
     * @var string
     */
    public $encodingIP2 = null;

    /**
     * The broadcast password
     *
     *
     * @var string
     */
    public $streamPassword = null;

    /**
     * The broadcast username
     *
     *
     * @var string
     * @readonly
     */
    public $streamUsername = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPlayableEntryBaseFilter extends KalturaBaseEntryFilter
{
    /**
     *
     *
     * @var int
     */
    public $durationLessThan = null;

    /**
     *
     *
     * @var int
     */
    public $durationGreaterThan = null;

    /**
     *
     *
     * @var int
     */
    public $durationLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $durationGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $msDurationLessThan = null;

    /**
     *
     *
     * @var int
     */
    public $msDurationGreaterThan = null;

    /**
     *
     *
     * @var int
     */
    public $msDurationLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $msDurationGreaterThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $durationTypeMatchOr = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlayableEntryFilter extends KalturaPlayableEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMediaEntryBaseFilter extends KalturaPlayableEntryFilter
{
    /**
     *
     *
     * @var KalturaMediaType
     */
    public $mediaTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $mediaTypeIn = null;

    /**
     *
     *
     * @var int
     */
    public $mediaDateGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $mediaDateLessThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $flavorParamsIdsMatchOr = null;

    /**
     *
     *
     * @var string
     */
    public $flavorParamsIdsMatchAnd = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaEntryFilter extends KalturaMediaEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaLiveStreamEntryBaseFilter extends KalturaMediaEntryFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamEntryFilter extends KalturaLiveStreamEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaLiveStreamEntry
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearch extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $keyWords = null;

    /**
     *
     *
     * @var KalturaSearchProviderType
     */
    public $searchSource = null;

    /**
     *
     *
     * @var KalturaMediaType
     */
    public $mediaType = null;

    /**
     * Use this field to pass dynamic data for searching
     * For example - if you set this field to "mymovies_$partner_id"
     * The $partner_id will be automatically replcaed with your real partner Id
     *
     *
     * @var string
     */
    public $extraData = null;

    /**
     *
     *
     * @var string
     */
    public $authData = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchResult extends KalturaSearch
{
    /**
     *
     *
     * @var string
     */
    public $id = null;

    /**
     *
     *
     * @var string
     */
    public $title = null;

    /**
     *
     *
     * @var string
     */
    public $thumbUrl = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

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
    public $url = null;

    /**
     *
     *
     * @var string
     */
    public $sourceLink = null;

    /**
     *
     *
     * @var string
     */
    public $credit = null;

    /**
     *
     *
     * @var KalturaLicenseType
     */
    public $licenseType = null;

    /**
     *
     *
     * @var string
     */
    public $flashPlaybackType = null;


}

class KalturaMediaListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMediaEntry
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMixEntry extends KalturaPlayableEntry
{
    /**
     * Indicates whether the user has submited a real thumbnail to the mix (Not the one that was generated automaticaly)
     *
     *
     * @var bool
     * @readonly
     */
    public $hasRealThumbnail = null;

    /**
     * The editor type used to edit the metadata
     *
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
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMixEntryBaseFilter extends KalturaPlayableEntryFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMixEntryFilter extends KalturaMixEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMixListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMixEntry
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaClientNotification extends KalturaObjectBase
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaKeyValue extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $key = null;

    /**
     *
     *
     * @var string
     */
    public $value = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartner extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

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
    public $website = null;

    /**
     *
     *
     * @var string
     */
    public $notificationUrl = null;

    /**
     *
     *
     * @var int
     */
    public $appearInSearch = null;

    /**
     *
     *
     * @var int
     * @readonly
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
     *
     * @var string
     */
    public $adminEmail = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var KalturaCommercialUseType
     */
    public $commercialUse = null;

    /**
     *
     *
     * @var string
     */
    public $landingPage = null;

    /**
     *
     *
     * @var string
     */
    public $userLandingPage = null;

    /**
     *
     *
     * @var string
     */
    public $contentCategories = null;

    /**
     *
     *
     * @var KalturaPartnerType
     */
    public $type = null;

    /**
     *
     *
     * @var string
     */
    public $phone = null;

    /**
     *
     *
     * @var string
     */
    public $describeYourself = null;

    /**
     *
     *
     * @var bool
     */
    public $adultContent = null;

    /**
     *
     *
     * @var string
     */
    public $defConversionProfileType = null;

    /**
     *
     *
     * @var int
     */
    public $notify = null;

    /**
     *
     *
     * @var KalturaPartnerStatus
     * @readonly
     */
    public $status = null;

    /**
     *
     *
     * @var int
     */
    public $allowQuickEdit = null;

    /**
     *
     *
     * @var int
     */
    public $mergeEntryLists = null;

    /**
     *
     *
     * @var string
     */
    public $notificationsConfig = null;

    /**
     *
     *
     * @var int
     */
    public $maxUploadSize = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerPackage = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $secret = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $adminSecret = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $cmsPassword = null;

    /**
     *
     *
     * @var int
     */
    public $allowMultiNotification = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $adminLoginUsersQuota = null;

    /**
     *
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
     *
     * @var array of KalturaKeyValue
     * @insertonly
     */
    public $additionalParams;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerUsage extends KalturaObjectBase
{
    /**
     * Partner total hosting in GB on the disk
     *
     *
     * @var float
     * @readonly
     */
    public $hostingGB = null;

    /**
     * percent of usage out of partner's package. if usageGB is 5 and package is 10GB, this value will be 50
     *
     *
     * @var float
     * @readonly
     */
    public $Percent = null;

    /**
     * package total BW - actually this is usage, which represents BW+storage
     *
     *
     * @var int
     * @readonly
     */
    public $packageBW = null;

    /**
     * total usage in GB - including bandwidth and storage
     *
     *
     * @var int
     * @readonly
     */
    public $usageGB = null;

    /**
     * date when partner reached the limit of his package (timestamp)
     *
     *
     * @var int
     * @readonly
     */
    public $reachedLimitDate = null;

    /**
     * a semi-colon separated list of comma-separated key-values to represent a usage graph.
     * keys could be 1-12 for a year view (1,1.2;2,1.1;3,0.9;...;12,1.4;)
     * keys could be 1-[28,29,30,31] depending on the requested month, for a daily view in a given month (1,0.4;2,0.2;...;31,0.1;)
     *
     *
     * @var string
     * @readonly
     */
    public $usageGraph = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPermissionItem extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var KalturaPermissionItemType
     * @readonly
     */
    public $type = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPermissionItemBaseFilter extends KalturaFilter
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
     * @var KalturaPermissionItemType
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemFilter extends KalturaPermissionItemBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPermissionItem
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermission extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var KalturaPermissionType
     * @readonly
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
     * @var string
     */
    public $friendlyName = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var KalturaPermissionStatus
     */
    public $status = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $dependsOnPermissionNames = null;

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
    public $permissionItemsIds = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var string
     */
    public $partnerGroup = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPermissionBaseFilter extends KalturaFilter
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
     * @var KalturaPermissionType
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
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $nameIn = null;

    /**
     *
     *
     * @var string
     */
    public $friendlyNameLike = null;

    /**
     *
     *
     * @var string
     */
    public $descriptionLike = null;

    /**
     *
     *
     * @var KalturaPermissionStatus
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
    public $dependsOnPermissionNamesMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $dependsOnPermissionNamesMultiLikeAnd = null;

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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionFilter extends KalturaPermissionBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPermission
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaEntryFilterForPlaylist extends KalturaMediaEntryFilter
{
    /**
     *
     *
     * @var int
     */
    public $limit = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaylist extends KalturaBaseEntry
{
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
     *
     * @var array of KalturaMediaEntryFilterForPlaylist
     */
    public $filters;

    /**
     *
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
     * @readonly
     */
    public $plays = null;

    /**
     * Number of views
     *
     * @var int
     * @readonly
     */
    public $views = null;

    /**
     * The duration in seconds
     *
     * @var int
     * @readonly
     */
    public $duration = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPlaylistBaseFilter extends KalturaBaseEntryFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaylistFilter extends KalturaPlaylistBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaylistListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPlaylist
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportInputFilter extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $fromDate = null;

    /**
     *
     *
     * @var int
     */
    public $toDate = null;

    /**
     *
     *
     * @var string
     */
    public $keywords = null;

    /**
     *
     *
     * @var bool
     */
    public $searchInTags = null;

    /**
     *
     *
     * @var bool
     */
    public $searchInAdminTags = null;

    /**
     *
     *
     * @var string
     */
    public $categories = null;

    /**
     * time zone offset in minutes
     *
     * @var int
     */
    public $timeZoneOffset = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportGraph extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $id = null;

    /**
     *
     *
     * @var string
     */
    public $data = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportTotal extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $header = null;

    /**
     *
     *
     * @var string
     */
    public $data = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportTable extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     * @readonly
     */
    public $header = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $data = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchResultResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaSearchResult
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var bool
     * @readonly
     */
    public $needMediaInfo = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchAuthData extends KalturaObjectBase
{
    /**
     * The authentication data that further should be used for search
     *
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStartWidgetSessionResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $ks = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $userId = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStatsEvent extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $clientVer = null;

    /**
     *
     *
     * @var KalturaStatsEventType
     */
    public $eventType = null;

    /**
     * the client's timestamp of this event
     *
     *
     * @var float
     */
    public $eventTimestamp = null;

    /**
     * a unique string generated by the client that will represent the client-side session:
     * the primary component will pass it on to other components that sprout from it.
     *
     * @var string
     */
    public $sessionId = null;

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
    public $entryId = null;

    /**
     * the UV cookie - creates in the operational system and should be passed on ofr every event
     *
     * @var string
     */
    public $uniqueViewer = null;

    /**
     *
     *
     * @var string
     */
    public $widgetId = null;

    /**
     *
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
     * @readonly
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

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStatsKmcEvent extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $clientVer = null;

    /**
     *
     *
     * @var string
     */
    public $kmcEventActionPath = null;

    /**
     *
     *
     * @var KalturaStatsKmcEventType
     */
    public $kmcEventType = null;

    /**
     * the client's timestamp of this event
     *
     *
     * @var float
     */
    public $eventTimestamp = null;

    /**
     * a unique string generated by the client that will represent the client-side session:
     * the primary component will pass it on to other components that sprout from it.
     *
     * @var string
     */
    public $sessionId = null;

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
    public $entryId = null;

    /**
     *
     *
     * @var string
     */
    public $widgetId = null;

    /**
     *
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
     * @readonly
     */
    public $userIp = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCEError extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     * @readonly
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
    public $browser = null;

    /**
     *
     *
     * @var string
     */
    public $serverIp = null;

    /**
     *
     *
     * @var string
     */
    public $serverOs = null;

    /**
     *
     *
     * @var string
     */
    public $phpVersion = null;

    /**
     *
     *
     * @var string
     */
    public $ceAdminEmail = null;

    /**
     *
     *
     * @var string
     */
    public $type = null;

    /**
     *
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var string
     */
    public $data = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStorageProfile extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     * @readonly
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
    public $systemName = null;

    /**
     *
     *
     * @var string
     */
    public $desciption = null;

    /**
     *
     *
     * @var KalturaStorageProfileStatus
     */
    public $status = null;

    /**
     *
     *
     * @var KalturaStorageProfileProtocol
     */
    public $protocol = null;

    /**
     *
     *
     * @var string
     */
    public $storageUrl = null;

    /**
     *
     *
     * @var string
     */
    public $storageBaseDir = null;

    /**
     *
     *
     * @var string
     */
    public $storageUsername = null;

    /**
     *
     *
     * @var string
     */
    public $storagePassword = null;

    /**
     *
     *
     * @var bool
     */
    public $storageFtpPassiveMode = null;

    /**
     *
     *
     * @var string
     */
    public $deliveryHttpBaseUrl = null;

    /**
     *
     *
     * @var string
     */
    public $deliveryRmpBaseUrl = null;

    /**
     *
     *
     * @var string
     */
    public $deliveryIisBaseUrl = null;

    /**
     *
     *
     * @var int
     */
    public $minFileSize = null;

    /**
     *
     *
     * @var int
     */
    public $maxFileSize = null;

    /**
     *
     *
     * @var string
     */
    public $flavorParamsIds = null;

    /**
     *
     *
     * @var int
     */
    public $maxConcurrentConnections = null;

    /**
     *
     *
     * @var string
     */
    public $pathManagerClass = null;

    /**
     *
     *
     * @var string
     */
    public $urlManagerClass = null;

    /**
     *
     *
     * @var array of KalturaKeyValue
     */
    public $urlManagerParams;

    /**
     * No need to create enum for temp field
     *
     *
     * @var int
     */
    public $trigger = null;

    /**
     * Delivery Priority
     *
     *
     * @var int
     */
    public $deliveryPriority = null;

    /**
     *
     *
     * @var KalturaStorageProfileDeliveryStatus
     */
    public $deliveryStatus = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaStorageProfileBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     *
     * @var KalturaStorageProfileStatus
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
     * @var KalturaStorageProfileProtocol
     */
    public $protocolEqual = null;

    /**
     *
     *
     * @var string
     */
    public $protocolIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStorageProfileFilter extends KalturaStorageProfileBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStorageProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaStorageProfile
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseSyndicationFeed extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $feedUrl = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * link a playlist that will set what content the feed will include
     * if empty, all content will be included in feed
     *
     *
     * @var string
     */
    public $playlistId = null;

    /**
     * feed name
     *
     *
     * @var string
     */
    public $name = null;

    /**
     * feed status
     *
     *
     * @var KalturaSyndicationFeedStatus
     * @readonly
     */
    public $status = null;

    /**
     * feed type
     *
     *
     * @var KalturaSyndicationFeedType
     * @insertonly
     */
    public $type = null;

    /**
     * Base URL for each video, on the partners site
     * This is required by all syndication types.
     *
     * @var string
     */
    public $landingPage = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * allow_embed tells google OR yahoo weather to allow embedding the video on google OR yahoo video results
     * or just to provide a link to the landing page.
     * it is applied on the video-player_loc property in the XML (google)
     * and addes media-player tag (yahoo)
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
     *
     * @var int
     */
    public $flavorParamId = null;

    /**
     *
     *
     * @var bool
     */
    public $transcodeExistingContent = null;

    /**
     *
     *
     * @var bool
     */
    public $addToDefaultConversionProfile = null;

    /**
     *
     *
     * @var string
     */
    public $categories = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseSyndicationFeedBaseFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseSyndicationFeedFilter extends KalturaBaseSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseSyndicationFeedListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBaseSyndicationFeed
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSyndicationFeedEntryCount extends KalturaObjectBase
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbAsset extends KalturaAsset
{
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     *
     * @var int
     * @insertonly
     */
    public $thumbParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     *
     * @var int
     * @readonly
     */
    public $height = null;

    /**
     * The status of the asset
     *
     *
     * @var KalturaThumbAssetStatus
     * @readonly
     */
    public $status = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbParams extends KalturaAssetParams
{
    /**
     *
     *
     * @var KalturaThumbCropType
     */
    public $cropType = null;

    /**
     *
     *
     * @var int
     */
    public $quality = null;

    /**
     *
     *
     * @var int
     */
    public $cropX = null;

    /**
     *
     *
     * @var int
     */
    public $cropY = null;

    /**
     *
     *
     * @var int
     */
    public $cropWidth = null;

    /**
     *
     *
     * @var int
     */
    public $cropHeight = null;

    /**
     *
     *
     * @var float
     */
    public $videoOffset = null;

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

    /**
     *
     *
     * @var float
     */
    public $scaleWidth = null;

    /**
     *
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
     *
     * @var KalturaContainerFormat
     */
    public $format = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbAssetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaThumbAsset
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaThumbParamsBaseFilter extends KalturaAssetParamsFilter
{
    /**
     *
     *
     * @var KalturaContainerFormat
     */
    public $formatEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbParamsFilter extends KalturaThumbParamsBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaThumbParams
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUiConf extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
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
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var KalturaUiConfObjType
     */
    public $objType = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $objTypeAsString = null;

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

    /**
     *
     *
     * @var string
     */
    public $htmlParams = null;

    /**
     *
     *
     * @var string
     */
    public $swfUrl = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $confFilePath = null;

    /**
     *
     *
     * @var string
     */
    public $confFile = null;

    /**
     *
     *
     * @var string
     */
    public $confFileFeatures = null;

    /**
     *
     *
     * @var string
     */
    public $confVars = null;

    /**
     *
     *
     * @var bool
     */
    public $useCdn = null;

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
    public $swfUrlVersion = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * Entry creation date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var KalturaUiConfCreationMode
     */
    public $creationMode = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaUiConfBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $nameLike = null;

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
     * @var KalturaUiConfObjType
     */
    public $objTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $objTypeIn = null;

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

    /**
     *
     *
     * @var KalturaUiConfCreationMode
     */
    public $creationModeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $creationModeIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUiConfFilter extends KalturaUiConfBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUiConfListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUiConf
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUiConfTypeInfo extends KalturaObjectBase
{
    /**
     * UiConf Type
     *
     *
     * @var KalturaUiConfObjType
     */
    public $type = null;

    /**
     * Available versions
     *
     *
     * @var array of KalturaString
     */
    public $versions;

    /**
     * The direcotry this type is saved at
     *
     *
     * @var string
     */
    public $directory = null;

    /**
     * Filename for this UiConf type
     *
     *
     * @var string
     */
    public $filename = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     */
    public $uploadTokenId = null;

    /**
     *
     *
     * @var int
     */
    public $fileSize = null;

    /**
     *
     *
     * @var KalturaUploadErrorCode
     */
    public $errorCode = null;

    /**
     *
     *
     * @var string
     */
    public $errorDescription = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadToken extends KalturaObjectBase
{
    /**
     * Upload token unique ID
     *
     * @var string
     * @readonly
     */
    public $id = null;

    /**
     * Partner ID of the upload token
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * User id for the upload token
     *
     * @var string
     * @readonly
     */
    public $userId = null;

    /**
     * Status of the upload token
     *
     * @var KalturaUploadTokenStatus
     * @readonly
     */
    public $status = null;

    /**
     * Name of the file for the upload token,
     * can be empty when the upload token is created and will be updated internally after the file is uploaded.
     *
     * @var string
     * @insertonly
     */
    public $fileName = null;

    /**
     * File size in bytes, can be empty
     * when the upload token is created and will be updated internally after the file is uploaded.
     *
     * @var float
     * @insertonly
     */
    public $fileSize = null;

    /**
     * Uploaded file size in bytes, can be used to identify how many bytes were uploaded before resuming.
     *
     * @var float
     * @readonly
     */
    public $uploadedFileSize = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * Last update date as Unix timestamp (In seconds)
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaUploadTokenBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
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
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     *
     * @var KalturaUploadTokenStatus
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadTokenFilter extends KalturaUploadTokenBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadTokenListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUploadToken
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRole extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

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
     * @var KalturaUserRoleStatus
     */
    public $status = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $permissionNames = null;

    /**
     *
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaUserRoleBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $nameIn = null;

    /**
     *
     *
     * @var string
     */
    public $descriptionLike = null;

    /**
     *
     *
     * @var KalturaUserRoleStatus
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleFilter extends KalturaUserRoleBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUserRole
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;


}

abstract class KalturaUserBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $screenNameLike = null;

    /**
     *
     *
     * @var string
     */
    public $screenNameStartsWith = null;

    /**
     *
     *
     * @var string
     */
    public $emailLike = null;

    /**
     *
     *
     * @var string
     */
    public $emailStartsWith = null;

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
     * @var KalturaUserStatus
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
     * @var bool
     */
    public $isAdminEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserFilter extends KalturaUserBaseFilter
{
    /**
     *
     *
     * @var string
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
     * @var bool
     */
    public $loginEnabledEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUser
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWidget extends KalturaObjectBase
{
    /**
     *
     *
     * @var string
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var string
     */
    public $sourceWidgetId = null;

    /**
     *
     *
     * @var string
     * @readonly
     */
    public $rootWidgetId = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

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
    public $uiConfId = null;

    /**
     *
     *
     * @var KalturaWidgetSecurityType
     */
    public $securityType = null;

    /**
     *
     *
     * @var int
     */
    public $securityPolicy = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
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
     *
     * @var string
     * @readonly
     */
    public $widgetHTML = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaWidgetBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
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
     * @var string
     */
    public $sourceWidgetIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $rootWidgetIdEqual = null;

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
    public $entryIdEqual = null;

    /**
     *
     *
     * @var int
     */
    public $uiConfIdEqual = null;

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
     * @var string
     */
    public $partnerDataLike = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWidgetFilter extends KalturaWidgetBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWidgetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaWidget
     * @readonly
     */
    public $objects;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPartnerBaseFilter extends KalturaFilter
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
     * @var string
     */
    public $nameLike = null;

    /**
     *
     *
     * @var string
     */
    public $nameMultiLikeOr = null;

    /**
     *
     *
     * @var string
     */
    public $nameMultiLikeAnd = null;

    /**
     *
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     *
     * @var KalturaPartnerStatus
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
    public $partnerPackageEqual = null;

    /**
     *
     *
     * @var int
     */
    public $partnerPackageGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $partnerPackageLessThanOrEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerNameDescriptionWebsiteAdminNameAdminEmailLike = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerFilter extends KalturaPartnerBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryRestriction extends KalturaBaseRestriction
{
    /**
     * Country restriction type (Allow or deny)
     *
     *
     * @var KalturaCountryRestrictionType
     */
    public $countryRestrictionType = null;

    /**
     * Comma separated list of country codes to allow to deny
     *
     *
     * @var string
     */
    public $countryList = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDirectoryRestriction extends KalturaBaseRestriction
{
    /**
     * Kaltura directory restriction type
     *
     *
     * @var KalturaDirectoryRestrictionType
     */
    public $directoryRestrictionType = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIpAddressRestriction extends KalturaBaseRestriction
{
    /**
     * Ip address restriction type (Allow or deny)
     *
     *
     * @var KalturaIpAddressRestrictionType
     */
    public $ipAddressRestrictionType = null;

    /**
     * Comma separated list of ip address to allow to deny
     *
     *
     * @var string
     */
    public $ipAddressList = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSessionRestriction extends KalturaBaseRestriction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPreviewRestriction extends KalturaSessionRestriction
{
    /**
     * The preview restriction length
     *
     *
     * @var int
     */
    public $previewLength = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSiteRestriction extends KalturaBaseRestriction
{
    /**
     * The site restriction type (allow or deny)
     *
     *
     * @var KalturaSiteRestrictionType
     */
    public $siteRestrictionType = null;

    /**
     * Comma separated list of sites (domains) to allow or deny
     *
     *
     * @var string
     */
    public $siteList = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAgentRestriction extends KalturaBaseRestriction
{
    /**
     * User agent restriction type (Allow or deny)
     *
     *
     * @var KalturaUserAgentRestrictionType
     */
    public $userAgentRestrictionType = null;

    /**
     * A comma seperated list of user agent regular expressions
     *
     *
     * @var string
     */
    public $userAgentRegexList = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchCondition extends KalturaSearchItem
{
    /**
     *
     *
     * @var string
     */
    public $field = null;

    /**
     *
     *
     * @var string
     */
    public $value = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchComparableCondition extends KalturaSearchCondition
{
    /**
     *
     *
     * @var KalturaSearchConditionComparison
     */
    public $comparison = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchOperator extends KalturaSearchItem
{
    /**
     *
     *
     * @var KalturaSearchOperatorType
     */
    public $type = null;

    /**
     *
     *
     * @var array of KalturaSearchItem
     */
    public $items;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseJobBaseFilter extends KalturaFilter
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
     * @var int
     */
    public $idGreaterThanOrEqual = null;

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
    public $partnerIdNotIn = null;

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
    public $processorExpirationGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $processorExpirationLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $executionAttemptsGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $executionAttemptsLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $lockVersionGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $lockVersionLessThanOrEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseJobFilter extends KalturaBaseJobBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBatchJobBaseFilter extends KalturaBaseJobFilter
{
    /**
     *
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     *
     * @var KalturaBatchJobType
     */
    public $jobTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $jobTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $jobTypeNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $jobSubTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $jobSubTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $jobSubTypeNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $onStressDivertToEqual = null;

    /**
     *
     *
     * @var string
     */
    public $onStressDivertToIn = null;

    /**
     *
     *
     * @var string
     */
    public $onStressDivertToNotIn = null;

    /**
     *
     *
     * @var KalturaBatchJobStatus
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
    public $statusNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $abortEqual = null;

    /**
     *
     *
     * @var int
     */
    public $checkAgainTimeoutGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $checkAgainTimeoutLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $progressGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $progressLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $updatesCountGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $updatesCountLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $priorityGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $priorityLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $priorityEqual = null;

    /**
     *
     *
     * @var string
     */
    public $priorityIn = null;

    /**
     *
     *
     * @var string
     */
    public $priorityNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $twinJobIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $twinJobIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $twinJobIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $bulkJobIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $bulkJobIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $bulkJobIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $parentJobIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $parentJobIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $parentJobIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $rootJobIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $rootJobIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $rootJobIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $queueTimeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $queueTimeLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $finishTimeGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $finishTimeLessThanOrEqual = null;

    /**
     *
     *
     * @var KalturaBatchJobErrorTypes
     */
    public $errTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $errTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $errTypeNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $errNumberEqual = null;

    /**
     *
     *
     * @var string
     */
    public $errNumberIn = null;

    /**
     *
     *
     * @var string
     */
    public $errNumberNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $fileSizeLessThan = null;

    /**
     *
     *
     * @var int
     */
    public $fileSizeGreaterThan = null;

    /**
     *
     *
     * @var bool
     */
    public $lastWorkerRemoteEqual = null;

    /**
     *
     *
     * @var int
     */
    public $schedulerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $schedulerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $schedulerIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $workerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $workerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $workerIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $batchIndexEqual = null;

    /**
     *
     *
     * @var string
     */
    public $batchIndexIn = null;

    /**
     *
     *
     * @var string
     */
    public $batchIndexNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $lastSchedulerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $lastSchedulerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $lastSchedulerIdNotIn = null;

    /**
     *
     *
     * @var int
     */
    public $lastWorkerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $lastWorkerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $lastWorkerIdNotIn = null;

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
    public $dcNotIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaControlPanelCommandBaseFilter extends KalturaFilter
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
    public $createdByIdEqual = null;

    /**
     *
     *
     * @var KalturaControlPanelCommandType
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
     * @var KalturaControlPanelCommandTargetType
     */
    public $targetTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $targetTypeIn = null;

    /**
     *
     *
     * @var KalturaControlPanelCommandStatus
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
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMailJobBaseFilter extends KalturaBaseJobFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaNotificationBaseFilter extends KalturaBaseJobFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBatchJobFilter extends KalturaBatchJobBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaControlPanelCommandFilter extends KalturaControlPanelCommandBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMailJobFilter extends KalturaMailJobBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationFilter extends KalturaNotificationBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBatchJobFilterExt extends KalturaBatchJobFilter
{
    /**
     *
     *
     * @var string
     */
    public $jobTypeAndSubTypeIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetParamsOutputBaseFilter extends KalturaAssetParamsFilter
{
    /**
     *
     *
     * @var int
     */
    public $assetParamsIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $assetParamsVersionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $assetIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $assetVersionEqual = null;

    /**
     *
     *
     * @var KalturaContainerFormat
     */
    public $formatEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFlavorAssetBaseFilter extends KalturaAssetFilter
{
    /**
     *
     *
     * @var KalturaFlavorAssetStatus
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
    public $statusNotIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsFilter
{
    /**
     *
     *
     * @var int
     */
    public $flavorParamsIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $flavorParamsVersionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $flavorAssetIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $flavorAssetVersionEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMediaFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorParamsOutputFilter extends KalturaFlavorParamsOutputBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMediaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMediaInfoBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
     */
    public $flavorAssetIdEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaThumbAssetBaseFilter extends KalturaAssetFilter
{
    /**
     *
     *
     * @var KalturaThumbAssetStatus
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
    public $statusNotIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaThumbParamsOutputBaseFilter extends KalturaThumbParamsFilter
{
    /**
     *
     *
     * @var int
     */
    public $thumbParamsIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $thumbParamsVersionEqual = null;

    /**
     *
     *
     * @var string
     */
    public $thumbAssetIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $thumbAssetVersionEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetParamsOutputFilter extends KalturaAssetParamsOutputBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorAssetFilter extends KalturaFlavorAssetBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFlavorParamsFilter extends KalturaMediaFlavorParamsBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFlavorParamsOutputFilter extends KalturaMediaFlavorParamsOutputBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaInfoFilter extends KalturaMediaInfoBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbAssetFilter extends KalturaThumbAssetBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbParamsOutputFilter extends KalturaThumbParamsOutputBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaLiveStreamAdminEntryBaseFilter extends KalturaLiveStreamEntryFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveStreamAdminEntryFilter extends KalturaLiveStreamAdminEntryBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAdminUserBaseFilter extends KalturaUserFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaUserLoginDataBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var string
     */
    public $loginEmailEqual = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAdminUserFilter extends KalturaAdminUserBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaGoogleVideoSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGoogleVideoSyndicationFeedFilter extends KalturaGoogleVideoSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaITunesSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaITunesSyndicationFeedFilter extends KalturaITunesSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaTubeMogulSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTubeMogulSyndicationFeedFilter extends KalturaTubeMogulSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLoginDataFilter extends KalturaUserLoginDataBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaYahooSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaYahooSyndicationFeedFilter extends KalturaYahooSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaApiActionPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaApiParameterPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiActionPermissionItemFilter extends KalturaApiActionPermissionItemBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiParameterPermissionItemFilter extends KalturaApiParameterPermissionItemBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaGenericSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenericSyndicationFeedFilter extends KalturaGenericSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaGenericXsltSyndicationFeedBaseFilter extends KalturaGenericSyndicationFeedFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenericXsltSyndicationFeedFilter extends KalturaGenericXsltSyndicationFeedBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaClipAttributes extends KalturaOperationAttributes
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetParamsResourceContainer extends KalturaResource
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetResource extends KalturaContentResource
{
    /**
     * ID of the source asset
     *
     * @var string
     */
    public $assetId = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetsParamsResourceContainers extends KalturaResource
{
    /**
     * Array of resources associated with asset params ids
     *
     * @var array of KalturaAssetParamsResourceContainer
     */
    public $resources;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDataCenterContentResource extends KalturaContentResource
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntryResource extends KalturaContentResource
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFileSyncResource extends KalturaContentResource
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOperationResource extends KalturaContentResource
{
    /**
     * Only KalturaEntryResource and KalturaAssetResource are supported
     *
     * @var KalturaContentResource
     */
    public $resource;

    /**
     *
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUrlResource extends KalturaContentResource
{
    /**
     * Remote URL, FTP, HTTP or HTTPS
     *
     * @var string
     */
    public $url = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRemoteStorageResource extends KalturaUrlResource
{
    /**
     * ID of storage profile to be associated with the created file sync, used for file serving URL composing.
     *
     * @var int
     */
    public $storageProfileId = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRemoteStorageResources extends KalturaContentResource
{
    /**
     * Array of remote stoage resources
     *
     * @var array of KalturaRemoteStorageResource
     */
    public $resources;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaServerFileResource extends KalturaDataCenterContentResource
{
    /**
     * Full path to the local file
     *
     * @var string
     */
    public $localFilePath = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSshUrlResource extends KalturaUrlResource
{
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadedFileTokenResource extends KalturaDataCenterContentResource
{
    /**
     * Token that returned from upload.upload action or uploadToken.add action.
     *
     * @var string
     */
    public $token = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWebcamTokenResource extends KalturaDataCenterContentResource
{
    /**
     * Token that returned from media server such as FMS or red5.
     *
     * @var string
     */
    public $token = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetParamsOutput extends KalturaAssetParams
{
    /**
     *
     *
     * @var int
     */
    public $assetParamsId = null;

    /**
     *
     *
     * @var string
     */
    public $assetParamsVersion = null;

    /**
     *
     *
     * @var string
     */
    public $assetId = null;

    /**
     *
     *
     * @var string
     */
    public $assetVersion = null;

    /**
     *
     *
     * @var int
     */
    public $readyBehavior = null;

    /**
     * The container format of the Flavor Params
     *
     *
     * @var KalturaContainerFormat
     */
    public $format = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFlavorParamsOutput extends KalturaFlavorParams
{
    /**
     *
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     *
     *
     * @var string
     */
    public $commandLinesStr = null;

    /**
     *
     *
     * @var string
     */
    public $flavorParamsVersion = null;

    /**
     *
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     *
     *
     * @var string
     */
    public $flavorAssetVersion = null;

    /**
     *
     *
     * @var int
     */
    public $readyBehavior = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFlavorParamsOutput extends KalturaFlavorParamsOutput
{

}

class KalturaMediaFlavorParams extends KalturaFlavorParams
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaThumbParamsOutput extends KalturaThumbParams
{
    /**
     *
     *
     * @var int
     */
    public $thumbParamsId = null;

    /**
     *
     *
     * @var string
     */
    public $thumbParamsVersion = null;

    /**
     *
     *
     * @var string
     */
    public $thumbAssetId = null;

    /**
     *
     *
     * @var string
     */
    public $thumbAssetVersion = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiActionPermissionItem extends KalturaPermissionItem
{
    /**
     *
     *
     * @var string
     */
    public $service = null;

    /**
     *
     *
     * @var string
     */
    public $action = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiParameterPermissionItem extends KalturaPermissionItem
{
    /**
     *
     *
     * @var string
     */
    public $object = null;

    /**
     *
     *
     * @var string
     */
    public $parameter = null;

    /**
     *
     *
     * @var KalturaApiParameterPermissionItemAction
     */
    public $action = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenericSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     * feed description
     *
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed landing page (i.e publisher website)
     *
     *
     * @var string
     */
    public $feedLandingPage = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenericXsltSyndicationFeed extends KalturaGenericSyndicationFeed
{
    /**
     *
     *
     * @var string
     */
    public $xslt = null;

    /**
     * This parameter determines which custom metadata fields of type related-entry should be
     * expanded to contain the kaltura MRSS feed of the related entry. Related-entry fields not
     * included in this list will contain only the related entry id.
     * This property contains a list xPaths in the Kaltura MRSS.
     *
     *
     * @var array of KalturaString
     */
    public $itemXpathsToExtend;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGoogleVideoSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     *
     *
     * @var KalturaGoogleSyndicationFeedAdultValues
     */
    public $adultContent = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaITunesSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     * feed description
     *
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed language
     *
     *
     * @var string
     */
    public $language = null;

    /**
     * feed landing page (i.e publisher website)
     *
     *
     * @var string
     */
    public $feedLandingPage = null;

    /**
     * author/publisher name
     *
     *
     * @var string
     */
    public $ownerName = null;

    /**
     * publisher email
     *
     *
     * @var string
     */
    public $ownerEmail = null;

    /**
     * podcast thumbnail
     *
     *
     * @var string
     */
    public $feedImageUrl = null;

    /**
     *
     *
     * @var KalturaITunesSyndicationFeedCategories
     * @readonly
     */
    public $category = null;

    /**
     *
     *
     * @var KalturaITunesSyndicationFeedAdultValues
     */
    public $adultContent = null;

    /**
     *
     *
     * @var string
     */
    public $feedAuthor = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTubeMogulSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     *
     *
     * @var KalturaTubeMogulSyndicationFeedCategories
     * @readonly
     */
    public $category = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaYahooSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     *
     *
     * @var KalturaYahooSyndicationFeedCategories
     * @readonly
     */
    public $category = null;

    /**
     *
     *
     * @var KalturaYahooSyndicationFeedAdultValues
     */
    public $adultContent = null;

    /**
     * feed description
     *
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * feed landing page (i.e publisher website)
     *
     *
     * @var string
     */
    public $feedLandingPage = null;

}
