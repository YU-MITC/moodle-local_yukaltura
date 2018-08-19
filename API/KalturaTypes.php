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

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once("KalturaClientBase.php");

/**
 * Kaltura Base Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseRestriction extends KalturaObjectBase
{

}

/**
 * Kaltura Access Control class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControl extends KalturaObjectBase
{
    /**
     * The id of the Access Control Profile
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
 * Kaltura Search Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSearchItem extends KalturaObjectBase
{

}

/**
 * Kaltura Filetr class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Acecss Control Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Access Control Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlFilter extends KalturaAccessControlBaseFilter
{

}

/**
 * Kaltura Filter Pager class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Access Control List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaAccessControl
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
 * Kaltura Object Base class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     */
    public $storageSize = null;

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
     */
    public $lastLoginTime = null;

    /**
     *
     *
     * @var int
     */
    public $statusUpdatedAt = null;

    /**
     *
     *
     * @var int
     */
    public $deletedAt = null;

    /**
     *
     *
     * @var bool
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
     */
    public $roleNames = null;

    /**
     *
     *
     * @var bool
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
 * Kaltura Admin User class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUser extends KalturaUser
{

}

/**
 * Kaltura Dynamic Enum class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDynamicEnum extends KalturaObjectBase
{

}

/**
 * Kaltura Operation Attributes class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaOperationAttributes extends KalturaObjectBase
{

}

/**
 * Kaltura Base Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntry extends KalturaObjectBase
{
    /**
     * Auto generated 10 characters alphanumeric string
     *
     *
     * @var string
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
     */
    public $status = null;

    /**
     * Entry moderation status
     *
     *
     * @var KalturaEntryModerationStatus
     */
    public $moderationStatus = null;

    /**
     * Number of moderation requests waiting for this entry
     *
     *
     * @var int
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
     */
    public $createdAt = null;

    /**
     * Entry update date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     * Calculated rank
     *
     *
     * @var float
     */
    public $rank = null;

    /**
     * The total (sum) of all votes
     *
     *
     * @var int
     */
    public $totalRank = null;

    /**
     * Number of votes
     *
     *
     * @var int
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
     *
     * @var string
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
     */
    public $replacingEntryId = null;

    /**
     * ID of the entry that will be replaced when the replacement approved and this entry is ready
     *
     *
     * @var string
     */
    public $replacedEntryId = null;

    /**
     * Status of the replacement readiness and approval
     *
     *
     * @var KalturaEntryReplacementStatus
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
 * Kaltura Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaResource extends KalturaObjectBase
{

}

/**
 * Kaltura Remote Path class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemotePath extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $storageProfileId = null;

    /**
     *
     *
     * @var string
     */
    public $uri = null;

}

/**
 * Kaltura Remote Path List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRemotePathListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaRemotePath
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
 * Kaltura Base Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     *
     * @var string
     */
    public $statusIn = null;

    /**
     * This filter should be in use for retrieving only entries,
     * not at few specific {@link ?object=KalturaEntryStatus KalturaEntryStatus} (comma separated).
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
 * Kaltura Base Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Base Entry List Reponse class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBaseEntry
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
 * Kaltura Moderation Flag class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationFlag extends KalturaObjectBase
{
    /**
     * Moderation flag id
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
     *
     * @var KalturaModerationFlagType
     */
    public $flagType = null;

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
 * Kaltura Moderation Flag List Reponse class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationFlagListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaModerationFlag
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
 * Kaltura Entry Context Data Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Entry Context Data Result class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Bult Upload Plugin Data class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Bulk Upload Result class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResult extends KalturaObjectBase
{
    /**
     * The id of the result
     *
     *
     * @var int
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
 * Kaltura Bulk Upload class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Bulk Upload List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBulkUpload
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
 * Kaltura Category class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategory extends KalturaObjectBase
{
    /**
     * The id of the Category
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
    public $parentId = null;

    /**
     *
     *
     * @var int
     */
    public $depth = null;

    /**
     *
     *
     * @var int
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
     */
    public $fullName = null;

    /**
     * Number of entries in this Category (including child categories)
     *
     *
     * @var int
     */
    public $entriesCount = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     *
     * @var int
     */
    public $createdAt = null;

}

/**
 * Kaltura Category Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Category Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryFilter extends KalturaCategoryBaseFilter
{

}

/**
 * Kaltura Catefory List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaCategory
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
 * Kaltura Conversion Profile Asset Params Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Conversion Profile Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Conversion Profile Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileFilter extends KalturaConversionProfileBaseFilter
{

}

/**
 * Kaltura Asset Params Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsFilter extends KalturaAssetParamsBaseFilter
{

}

/**
 * Kaltura Conversion Profile Asset Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Conversion Profile Asset Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParams extends KalturaObjectBase
{
    /**
     * The id of the conversion profile
     *
     *
     * @var int
     */
    public $conversionProfileId = null;

    /**
     * The id of the asset params
     *
     *
     * @var int
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
 * Kaltura Conversion Profile Asset Params List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaConversionProfileAssetParams
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
 * Kaltura Crop Dimensions class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Conversion Profile class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfile extends KalturaObjectBase
{
    /**
     * The id of the Conversion Profile
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
 * Kaltura Conversion Profile List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaConversionProfile
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
 * Kaltura Data Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     */
    public $retrieveDataContentByGet = null;

}

/**
 * Kaltura Data Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDataEntryBaseFilter extends KalturaBaseEntryFilter
{

}

/**
 * Kaltura Data Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryFilter extends KalturaDataEntryBaseFilter
{

}

/**
 * Kaltura Data List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDataEntry
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
 * Kaltura Conversion Attribute class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Email Ingestion Profile class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfile extends KalturaObjectBase
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
     */
    public $status = null;

    /**
     *
     *
     * @var string
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
 * Kaltura Playable Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntry extends KalturaBaseEntry
{
    /**
     * Number of plays
     *
     *
     * @var int
     */
    public $plays = null;

    /**
     * Number of views
     *
     *
     * @var int
     */
    public $views = null;

    /**
     * The width in pixels
     *
     *
     * @var int
     */
    public $width = null;

    /**
     * The height in pixels
     *
     *
     * @var int
     */
    public $height = null;

    /**
     * The duration in seconds
     *
     *
     * @var int
     */
    public $duration = null;

    /**
     * The duration in miliseconds
     *
     *
     * @var int
     */
    public $msDuration = null;

    /**
     * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
     *
     *
     * @var KalturaDurationType
     */
    public $durationType = null;

}

/**
 * Kaltura Media Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntry extends KalturaPlayableEntry
{
    /**
     * The media type of the entry
     *
     *
     * @var KalturaMediaType
     */
    public $mediaType = null;

    /**
     * Override the default conversion quality
     * DEPRECATED - use conversionProfileId instead
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
     *
     * @var string
     */
    public $flavorParamsIds = null;

}

/**
 * Kaltura Asset class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAsset extends KalturaObjectBase
{
    /**
     * The ID of the Flavor Asset
     *
     *
     * @var string
     */
    public $id = null;

    /**
     * The entry ID of the Flavor Asset
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
     * The version of the Flavor Asset
     *
     *
     * @var int
     */
    public $version = null;

    /**
     * The size (in KBytes) of the Flavor Asset
     *
     *
     * @var int
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
     */
    public $fileExt = null;

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

    /**
     *
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

}

/**
 * Kaltura Flabor Asset class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAsset extends KalturaAsset
{
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     *
     * @var int
     */
    public $flavorParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     *
     * @var int
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     *
     * @var int
     */
    public $height = null;

    /**
     * The overall bitrate (in KBits) of the Flavor Asset
     *
     *
     * @var int
     */
    public $bitrate = null;

    /**
     * The frame rate (in FPS) of the Flavor Asset
     *
     *
     * @var int
     */
    public $frameRate = null;

    /**
     * True if this Flavor Asset is the original source
     *
     *
     * @var bool
     */
    public $isOriginal = null;

    /**
     * True if this Flavor Asset is playable in KDP
     *
     *
     * @var bool
     */
    public $isWeb = null;

    /**
     * The container format
     *
     *
     * @var string
     */
    public $containerFormat = null;

    /**
     * The video codec
     *
     *
     * @var string
     */
    public $videoCodecId = null;

    /**
     * The status of the Flavor Asset
     *
     *
     * @var KalturaFlavorAssetStatus
     */
    public $status = null;

}

/**
 * Kaltura Content Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaContentResource extends KalturaResource
{

}

/**
 * Kaltura Asset Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetFilter extends KalturaAssetBaseFilter
{

}

/**
 * Kaltura Flavor Asset List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaFlavorAsset
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
 * Kaltura String class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParams extends KalturaObjectBase
{
    /**
     * The id of the Flavor Params
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
     */
    public $createdAt = null;

    /**
     * True if those Flavor Params are part of system defaults
     *
     *
     * @var KalturaNullableBoolean
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
 * Kaltura Flavor Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Asset With Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Params Base Filetr class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsFilter extends KalturaFlavorParamsBaseFilter
{

}

/**
 * Kaltura Flavor Params List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaFlavorParams
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
 * Kaltura Live Stream Bitrate class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Live Stream Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     */
    public $streamRemoteId = null;

    /**
     * The backup stream id as provided by the provider
     *
     *
     * @var string
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
 * Kaltura Live Stream Admin Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     */
    public $streamUsername = null;

}

/**
 * Kaltura Playable Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Playable Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryFilter extends KalturaPlayableEntryBaseFilter
{

}

/**
 * Kaltura Media Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Media Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryFilter extends KalturaMediaEntryBaseFilter
{

}

/**
 * Kaltura Live Stream Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveStreamEntryBaseFilter extends KalturaMediaEntryFilter
{

}

/**
 * Kaltura Live Stream Entry Filter
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryFilter extends KalturaLiveStreamEntryBaseFilter
{

}

/**
 * Kaltura Live Stream List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaLiveStreamEntry
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
 * Kaltura Search class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Search Result class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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

/**
 * Kaltura Media List Response class.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMediaEntry
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
 * Kaltura Mix Entry class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntry extends KalturaPlayableEntry
{
    /**
     * Indicates whether the user has submited a real thumbnail to the mix (Not the one that was generated automaticaly)
     *
     *
     * @var bool
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
 * Kaltura Mix Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMixEntryBaseFilter extends KalturaPlayableEntryFilter
{

}

/**
 * Kaltura Mix Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryFilter extends KalturaMixEntryBaseFilter
{

}

/**
 * Kaltura Mix List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMixEntry
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
 * Kaltura Client Notification class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Key Value class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Partner class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartner extends KalturaObjectBase
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
     */
    public $partnerPackage = null;

    /**
     *
     *
     * @var string
     */
    public $secret = null;

    /**
     *
     *
     * @var string
     */
    public $adminSecret = null;

    /**
     *
     *
     * @var string
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
     */
    public $additionalParams;

}

/**
 * Kaltura Partner Usage class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerUsage extends KalturaObjectBase
{
    /**
     * Partner total hosting in GB on the disk
     *
     *
     * @var float
     */
    public $hostingGB = null;

    /**
     * percent of usage out of partner's package. if usageGB is 5 and package is 10GB, this value will be 50
     *
     *
     * @var float
     */
    public $Percent = null;

    /**
     * package total BW - actually this is usage, which represents BW+storage
     *
     *
     * @var int
     */
    public $packageBW = null;

    /**
     * total usage in GB - including bandwidth and storage
     *
     *
     * @var int
     */
    public $usageGB = null;

    /**
     * date when partner reached the limit of his package (timestamp)
     *
     *
     * @var int
     */
    public $reachedLimitDate = null;

    /**
     * a semi-colon separated list of comma-separated key-values to represent a usage graph.
     * keys could be 1-12 for a year view (1,1.2;2,1.1;3,0.9;...;12,1.4;)
     * keys could be 1-[28,29,30,31] depending on the requested month, for a daily view in a given month (1,0.4;2,0.2;...;31,0.1;)
     *
     *
     * @var string
     */
    public $usageGraph = null;

}

/**
 * Kaltura Permission Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPermissionItem extends KalturaObjectBase
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
     * @var KalturaPermissionItemType
     */
    public $type = null;

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
    public $tags = null;

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
 * Kaltura Permission Item Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Permission Item Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemFilter extends KalturaPermissionItemBaseFilter
{

}

/**
 * Kaltura Permission Item List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPermissionItem
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
 * Kaltura Permission class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermission extends KalturaObjectBase
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
     * @var KalturaPermissionType
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
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
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
 * Kaltura Permission Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Permission Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionFilter extends KalturaPermissionBaseFilter
{

}

/**
 * Kaltura Permission List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPermission
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
 * Kaltura Media Entry Filter For Playlist class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Playlist class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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

}

/**
 * Kaltura Playlist Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlaylistBaseFilter extends KalturaBaseEntryFilter
{

}

/**
 * Kaltura Playlist Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistFilter extends KalturaPlaylistBaseFilter
{

}

/**
 * Kaltura Playlist List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaPlaylist
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
 * Kaltura Report Input Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Report Graph class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Report Total class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Report Table class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportTable extends KalturaObjectBase
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

    /**
     *
     *
     * @var int
     */
    public $totalCount = null;

}

/**
 * Kaltura Search Result Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchResultResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaSearchResult
     */
    public $objects;

    /**
     *
     *
     * @var bool
     */
    public $needMediaInfo = null;

}

/**
 * Kaltura Search Auth Data class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Start Widget Session Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStartWidgetSessionResponse extends KalturaObjectBase
{
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
    public $ks = null;

    /**
     *
     *
     * @var string
     */
    public $userId = null;

}

/**
 * Kaltura Stats Event class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Stats Kmc Event class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
     */
    public $userIp = null;

}

/**
 * Kaltura CE Error class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCEError extends KalturaObjectBase
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
 * Kaltura Storeage Profile class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfile extends KalturaObjectBase
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
    public $createdAt = null;

    /**
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
 * Kaltura Storage Profile Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Storage Profile Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileFilter extends KalturaStorageProfileBaseFilter
{

}

/**
 * Kaltura Storaget Profile List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaStorageProfile
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
 * Kaltura Base Syndication Freed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseSyndicationFeed extends KalturaObjectBase
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
    public $feedUrl = null;

    /**
     *
     *
     * @var int
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
     */
    public $status = null;

    /**
     * feed type
     *
     *
     * @var KalturaSyndicationFeedType
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
 * Kaltura Base Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBaseSyndicationFeedBaseFilter extends KalturaFilter
{

}

/**
 * Kaltura Base Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseSyndicationFeedFilter extends KalturaBaseSyndicationFeedBaseFilter
{

}

/**
 * Kaltura Base Syndication Feed List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseSyndicationFeedListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaBaseSyndicationFeed
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
 * Kaltura Syndication Feed Entry Count class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Thumb Asset class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAsset extends KalturaAsset
{
    /**
     * The Flavor Params used to create this Flavor Asset
     *
     *
     * @var int
     */
    public $thumbParamsId = null;

    /**
     * The width of the Flavor Asset
     *
     *
     * @var int
     */
    public $width = null;

    /**
     * The height of the Flavor Asset
     *
     *
     * @var int
     */
    public $height = null;

    /**
     * The status of the asset
     *
     *
     * @var KalturaThumbAssetStatus
     */
    public $status = null;

}

/**
 * Kaltura Thumb Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Thumb Asset List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaThumbAsset
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
 * Kaltura Thumb Params Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Thumb Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsFilter extends KalturaThumbParamsBaseFilter
{

}

/**
 * Kaltura Thumb Params List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaThumbParams
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
 * Kaltura UiConf class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConf extends KalturaObjectBase
{
    /**
     *
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
     *
     * @var string
     */
    public $description = null;

    /**
     *
     *
     * @var int
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
     *
     * @var KalturaUiConfCreationMode
     */
    public $creationMode = null;

}

/**
 * Kaltura UiConf Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura UiConf Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfFilter extends KalturaUiConfBaseFilter
{

}

/**
 * Kaltura UiConf List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUiConf
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
 * Kaltura UiConf Type Information class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Upload Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Upload Token class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadToken extends KalturaObjectBase
{
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
     * Name of the file for the upload token,
     * can be empty when the upload token is created and will be updated internally after the file is uploaded.
     *
     * @var string
     */
    public $fileName = null;

    /**
     * File size in bytes, can be empty
     * when the upload token is created and will be updated internally after the file is uploaded.
     *
     * @var float
     */
    public $fileSize = null;

    /**
     * Uploaded file size in bytes, can be used to identify how many bytes were uploaded before resuming.
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

}

/**
 * Kaltura Upload Token Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Upload Token Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenFilter extends KalturaUploadTokenBaseFilter
{

}

/**
 * Kaltura Upload Token List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUploadToken
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
 * Kaltura User Role class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRole extends KalturaObjectBase
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
 * Kaltura User Role Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura User Role Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleFilter extends KalturaUserRoleBaseFilter
{

}

/**
 * Kaltura User Role List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUserRole
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
 * Kaltura User Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
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
 * Kaltura User Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura User List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaUser
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
 * Kaltura Widget class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidget extends KalturaObjectBase
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
    public $sourceWidgetId = null;

    /**
     *
     *
     * @var string
     */
    public $rootWidgetId = null;

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
     */
    public $createdAt = null;

    /**
     *
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
     *
     * @var string
     */
    public $widgetHTML = null;

}

/**
 * Kaltura Widget Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Widget Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetFilter extends KalturaWidgetBaseFilter
{

}

/**
 * Kaltura Widget List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaWidget
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
 * Kaltura Partner Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Partner Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerFilter extends KalturaPartnerBaseFilter
{

}

/**
 * Kaltura Country Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Directory Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura IP Address Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Session Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionRestriction extends KalturaBaseRestriction
{

}

/**
 * Kaltura Preview Rerstriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Site Restriction
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura User Agent Restriction class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Search Condition class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Search Comparable Condition class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Search Operator class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Base Job Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Base Job Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseJobFilter extends KalturaBaseJobBaseFilter
{

}

/**
 * Kaltura Batch Job Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Control Panel Command Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Mail Job Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMailJobBaseFilter extends KalturaBaseJobFilter
{

}

/**
 * Kaltura Notification Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaNotificationBaseFilter extends KalturaBaseJobFilter
{

}

/**
 * Kaltura Batch Job Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobFilter extends KalturaBatchJobBaseFilter
{

}

/**
 * Kaltura Control Panel Command Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandFilter extends KalturaControlPanelCommandBaseFilter
{

}

/**
 * Kaltura Mail Job Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMailJobFilter extends KalturaMailJobBaseFilter
{

}

/**
 * Kaltura Notification Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationFilter extends KalturaNotificationBaseFilter
{

}

/**
 * Kaltura Batch Job Filter Ext class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Output Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Asset Base Filter
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Params Output Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Media Flavor Params Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

/**
 * Kaltura Flavor Params Output Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOutputFilter extends KalturaFlavorParamsOutputBaseFilter
{

}

/**
 * Kaltura Media Flavor Params Output Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMediaFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

/**
 * Kaltura Media Information Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Thumb Asset Baset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Thumb Params Output Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Output Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsOutputFilter extends KalturaAssetParamsOutputBaseFilter
{

}

/**
 * Kaltura Flavor Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetFilter extends KalturaFlavorAssetBaseFilter
{

}

/**
 * Kaltura Media Flavor Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsFilter extends KalturaMediaFlavorParamsBaseFilter
{

}

/**
 * Kaltura Media Flavor Params Output Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOutputFilter extends KalturaMediaFlavorParamsOutputBaseFilter
{

}

/**
 * Kaltura Media Information Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaInfoFilter extends KalturaMediaInfoBaseFilter
{

}

/**
 * Kaltura Thumb Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetFilter extends KalturaThumbAssetBaseFilter
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
class KalturaThumbParamsOutputFilter extends KalturaThumbParamsOutputBaseFilter
{

}

/**
 * Kaltura Live Stream Admin Entry Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveStreamAdminEntryBaseFilter extends KalturaLiveStreamEntryFilter
{

}

/**
 * Kaltura Live Stream Admin Entry Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryFilter extends KalturaLiveStreamAdminEntryBaseFilter
{

}

/**
 * Kaltura Admin User Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAdminUserBaseFilter extends KalturaUserFilter
{

}

/**
 * Kaltura User Login Data Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Admin User Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserFilter extends KalturaAdminUserBaseFilter
{

}

/**
 * Kaltura Google Video Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGoogleVideoSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * Kaltura Google Video Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGoogleVideoSyndicationFeedFilter extends KalturaGoogleVideoSyndicationFeedBaseFilter
{

}

/**
 * Kaltura iTunes Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaITunesSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * Kaltura iTunes Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeedFilter extends KalturaITunesSyndicationFeedBaseFilter
{

}

/**
 * Kaltura TubeMogul Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaTubeMogulSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * Kaltura TubeMogul Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeedFilter extends KalturaTubeMogulSyndicationFeedBaseFilter
{

}

/**
 * Kaltura User Login Data Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserLoginDataFilter extends KalturaUserLoginDataBaseFilter
{

}

/**
 * Kaltura Yahoo Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYahooSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * Kaltura Yahoo Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeedFilter extends KalturaYahooSyndicationFeedBaseFilter
{

}

/**
 * Kaltura API Action Permission Item Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaApiActionPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

/**
 * Kaltura API Parameter Permission Item Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaApiParameterPermissionItemBaseFilter extends KalturaPermissionItemFilter
{

}

/**
 * Kaltura API Action Permission Item Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiActionPermissionItemFilter extends KalturaApiActionPermissionItemBaseFilter
{

}

/**
 * Kaltura API Parameter Permission Item Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiParameterPermissionItemFilter extends KalturaApiParameterPermissionItemBaseFilter
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
abstract class KalturaGenericSyndicationFeedBaseFilter extends KalturaBaseSyndicationFeedFilter
{

}

/**
 * Kaltura Generic Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericSyndicationFeedFilter extends KalturaGenericSyndicationFeedBaseFilter
{

}

/**
 * Kaltura Generic Xslt Syndication Feed Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaGenericXsltSyndicationFeedBaseFilter extends KalturaGenericSyndicationFeedFilter
{

}

/**
 * Kaltura Generic Xslt Syndication Feed Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericXsltSyndicationFeedFilter extends KalturaGenericXsltSyndicationFeedBaseFilter
{

}

/**
 * Kaltura Clip Attributes class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Resource Container class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Resource Containers class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Data Center Content Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDataCenterContentResource extends KalturaContentResource
{

}

/**
 * Kaltura Entry Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura File Sync Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Operation Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Url Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Remote Storage Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Remote Storage Resources class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Server File Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura SSH Url Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Uploaded File Token Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Webcam Token Resource class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Asset Params Output class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Flavor Params Output class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Media Flavor Params Output class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOutput extends KalturaFlavorParamsOutput
{

}

/**
 * Kaltura Media Flavor Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParams extends KalturaFlavorParams
{

}

/**
 * Kaltura Media Flavor Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura API Action Permission Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura API Parameter Permission Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Generic Syndication Feed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Genetic Xslt Syndication class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Google Video Syndication Feed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura iTunes Syndication Feed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura TubeMogul Syndication Feed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     *
     *
     * @var KalturaTubeMogulSyndicationFeedCategories
     */
    public $category = null;

}

/**
 * Kaltura Yahoo Syndication Feed class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeed extends KalturaBaseSyndicationFeed
{
    /**
     *
     *
     * @var KalturaYahooSyndicationFeedCategories
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
