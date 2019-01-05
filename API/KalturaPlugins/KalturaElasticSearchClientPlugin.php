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
class KalturaESearchItemType extends KalturaEnumBase {
    /** @var exact match */
    const EXACT_MATCH = 1;
    /** @var partial */
    const PARTIAL = 2;
    /** @var starts with */
    const STARTS_WITH = 3;
    /** @var exists */
    const EXISTS = 4;
    /** @var range */
    const RANGE = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchOperatorType extends KalturaEnumBase {
    /** @var and op */
    const AND_OP = 1;
    /** @var or op */
    const OR_OP = 2;
    /** @var not op */
    const NOT_OP = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCaptionFieldName extends KalturaEnumBase {
    /** @var caption content */
    const CAPTION_CONTENT = "caption_assets.lines.content";
    /** @var caption end time */
    const CAPTION_END_TIME = "caption_assets.lines.end_time";
    /** @var caption start time */
    const CAPTION_START_TIME = "caption_assets.lines.start_time";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCategoryFieldName extends KalturaEnumBase {
    /** @var CATEGORY_CONTRIBUTION_POLICY */
    const CATEGORY_CONTRIBUTION_POLICY = "contribution_policy";
    /** @var CATEGORY_CREATED_AT */
    const CATEGORY_CREATED_AT = "created_at";
    /** @var CATEGORY_DEPTH */
    const CATEGORY_DEPTH = "depth";
    /** @var CATEGORY_DESCRIPTION */
    const CATEGORY_DESCRIPTION = "description";
    /** @var CATEGORY_DIRECT_ENTRIES_COUNT */
    const CATEGORY_DIRECT_ENTRIES_COUNT = "direct_entries_count";
    /** @var CATEGORY_DIRECT_SUB_CATEGORIES_COUNT */
    const CATEGORY_DIRECT_SUB_CATEGORIES_COUNT = "direct_sub_categories_count";
    /** @var CATEGORY_DISPLAY_IN_SEARCH */
    const CATEGORY_DISPLAY_IN_SEARCH = "display_in_search";
    /** @var CATEGORY_ENTRIES_COUNT */
    const CATEGORY_ENTRIES_COUNT = "entries_count";
    /** @var CATEGORY_FULL_IDS */
    const CATEGORY_FULL_IDS = "full_ids";
    /** @var CATEGORY_FULL_NAME */
    const CATEGORY_FULL_NAME = "full_name";
    /** @var CATEGORY_INHERITANCE_TYPE */
    const CATEGORY_INHERITANCE_TYPE = "inheritance_type";
    /** @var CATEGORY_INHERITED_PARENT_ID */
    const CATEGORY_INHERITED_PARENT_ID = "inherited_parent_id";
    /** @var CATEGORY_KUSER_ID */
    const CATEGORY_KUSER_ID = "kuser_id";
    /** @var CATEGORY_KUSER_IDS */
    const CATEGORY_KUSER_IDS = "kuser_ids";
    /** @var CATEGORY_MEMBERS_COUNT */
    const CATEGORY_MEMBERS_COUNT = "members_count";
    /** @var CATEGORY_MODERATION */
    const CATEGORY_MODERATION = "moderation";
    /** @var CATEGORY_NAME */
    const CATEGORY_NAME = "name";
    /** @var CATEGORY_PARENT_ID */
    const CATEGORY_PARENT_ID = "parent_id";
    /** @var CATEGORY_PENDING_ENTRIES_COUNT */
    const CATEGORY_PENDING_ENTRIES_COUNT = "pending_entries_count";
    /** @var CATEGORY_PENDING_MEMBERS_COUNT */
    const CATEGORY_PENDING_MEMBERS_COUNT = "pending_members_count";
    /** @var CATEGORY_PRIVACY */
    const CATEGORY_PRIVACY = "privacy";
    /** @var CATEGORY_PRIVACY_CONTEXT */
    const CATEGORY_PRIVACY_CONTEXT = "privacy_context";
    /** @var CATEGORY_PRIVACY_CONTEXTS */
    const CATEGORY_PRIVACY_CONTEXTS = "privacy_contexts";
    /** @var CATEGORY_REFERENCE_ID */
    const CATEGORY_REFERENCE_ID = "reference_id";
    /** @var CATEGORY_TAGS */
    const CATEGORY_TAGS = "tags";
    /** @var CATEGORY_UPDATED_AT */
    const CATEGORY_UPDATED_AT = "updated_at";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCategoryOrderByFieldName extends KalturaEnumBase {
    /** @var  */
    const CATEGORY_CREATED_AT = "created_at";
    /** @var  */
    const CATEGORY_UPDATED_AT = "updated_at";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCuePointFieldName extends KalturaEnumBase {
    /** @var CUE_POINT_ANSWERS */
    const CUE_POINT_ANSWERS = "cue_points.cue_point_answers";
    /** @var CUE_POINT_END_TIME */
    const CUE_POINT_END_TIME = "cue_points.cue_point_end_time";
    /** @var CUE_POINT_EXPLANATION */
    const CUE_POINT_EXPLANATION = "cue_points.cue_point_explanation";
    /** @var CUE_POINT_HINT */
    const CUE_POINT_HINT = "cue_points.cue_point_hint";
    /** @var CUE_POINT_ID */
    const CUE_POINT_ID = "cue_points.cue_point_id";
    /** @var CUE_POINT_NAME */
    const CUE_POINT_NAME = "cue_points.cue_point_name";
    /** @var CUE_POINT_QUESTION */
    const CUE_POINT_QUESTION = "cue_points.cue_point_question";
    /** @var CUE_POINT_START_TIME */
    const CUE_POINT_START_TIME = "cue_points.cue_point_start_time";
    /** @var CUE_POINT_SUB_TYPE */
    const CUE_POINT_SUB_TYPE = "cue_points.cue_point_sub_type";
    /** @var CUE_POINT_TAGS */
    const CUE_POINT_TAGS = "cue_points.cue_point_tags";
    /** @var CUE_POINT_TEXT */
    const CUE_POINT_TEXT = "cue_points.cue_point_text";
    /** @var CUE_POINT_TYPE */
    const CUE_POINT_TYPE = "cue_points.cue_point_type";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchEntryFieldName extends KalturaEnumBase {
    /** @var ENTRY_ID */
    const ENTRY_ID = "_id";
    /** @var ENTRY_ACCESS_CONTROL_ID */
    const ENTRY_ACCESS_CONTROL_ID = "access_control_id";
    /** @var ENTRY_ADMIN_TAGS */
    const ENTRY_ADMIN_TAGS = "admin_tags";
    /** @var ENTRY_CATEGORIES */
    const ENTRY_CATEGORIES = "categories";
    /** @var ENTRY_CATEGORY_NAME */
    const ENTRY_CATEGORY_NAME = "categories.name";
    /** @var ENTRY_CATEGORY_IDS */
    const ENTRY_CATEGORY_IDS = "category_ids";
    /** @var ENTRY_CONVERSION_PROFILE_ID */
    const ENTRY_CONVERSION_PROFILE_ID = "conversion_profile_id";
    /** @var ENTRY_CREATED_AT */
    const ENTRY_CREATED_AT = "created_at";
    /** @var ENTRY_CREATOR_ID */
    const ENTRY_CREATOR_ID = "creator_kuser_id";
    /** @var ENTRY_CREDIT */
    const ENTRY_CREDIT = "credit";
    /** @var ENTRY_DESCRIPTION */
    const ENTRY_DESCRIPTION = "description";
    /** @var NTRY_END_DATE */
    const ENTRY_END_DATE = "end_date";
    /** @var ENTRY_ENTITLED_USER_EDIT */
    const ENTRY_ENTITLED_USER_EDIT = "entitled_kusers_edit";
    /** @var ENTRY_ENTITLED_USER_PUBLISH */
    const ENTRY_ENTITLED_USER_PUBLISH = "entitled_kusers_publish";
    /** @var ENTRY_TYPE */
    const ENTRY_TYPE = "entry_type";
    /** @var ENTRY_EXTERNAL_SOURCE_TYPE */
    const ENTRY_EXTERNAL_SOURCE_TYPE = "external_source_type";
    /** @var ENTRY_USER_ID */
    const ENTRY_USER_ID = "kuser_id";
    /** @var ENTRY_LENGTH_IN_MSECS */
    const ENTRY_LENGTH_IN_MSECS = "length_in_msecs";
    /** @var ENTRY_MEDIA_TYPE */
    const ENTRY_MEDIA_TYPE = "media_type";
    /** @var ENTRY_MODERATION_STATUS */
    const ENTRY_MODERATION_STATUS = "moderation_status";
    /** @var ENTRY_NAME */
    const ENTRY_NAME = "name";
    /** @var NTRY_PARENT_ENTRY_ID */
    const ENTRY_PARENT_ENTRY_ID = "parent_id";
    /** @var ENTRY_PUSH_PUBLISH */
    const ENTRY_PUSH_PUBLISH = "push_publish";
    /** @var  ENTRY_RECORDED_ENTRY_ID */
    const ENTRY_RECORDED_ENTRY_ID = "recorded_entry_id";
    /** @var ENTRY_RECORDED_ENTRY_ID */
    const ENTRY_REDIRECT_ENTRY_ID = "redirect_entry_id";
    /** @var ENTRY_REFERENCE_ID */
    const ENTRY_REFERENCE_ID = "reference_id";
    /** @var ENTRY_SITE_URL */
    const ENTRY_SITE_URL = "site_url";
    /** @var ENTRY_SOURCE_TYPE */
    const ENTRY_SOURCE_TYPE = "source_type";
    /** @var NTRY_START_DATE */
    const ENTRY_START_DATE = "start_date";
    /** @var ENTRY_TAGS */
    const ENTRY_TAGS = "tags";
    /** @var NTRY_TEMPLATE_ENTRY_ID */
    const ENTRY_TEMPLATE_ENTRY_ID = "template_entry_id";
    /** @var ENTRY_UPDATED_AT */
    const ENTRY_UPDATED_AT = "updated_at";
    /** @var ENTRY_VIEWS */
    const ENTRY_VIEWS = "views";
    /** @var ENTRY_VOTES */
    const ENTRY_VOTES = "votes";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchEntryOrderByFieldName extends KalturaEnumBase {
    /** @var ENTRY_CREATED_AT */
    const ENTRY_CREATED_AT = "created_at";
    /** @var ENTRY_END_DATE */
    const ENTRY_END_DATE = "end_date";
    /** @var ENTRY_NAME */
    const ENTRY_NAME = "name.keyword";
    /** @var ENTRY_START_DATE */
    const ENTRY_START_DATE = "start_date";
    /** @var ENTRY_UPDATED_AT */
    const ENTRY_UPDATED_AT = "updated_at";
    /** @var ENTRY_VIEWS */
    const ENTRY_VIEWS = "views";
    /** @var ENTRY_VOTES */
    const ENTRY_VOTES = "votes";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchSortOrder extends KalturaEnumBase {
    /** @var ORDER_BY_ASC */
    const ORDER_BY_ASC = "asc";
    /** @var ORDER_BY_DESC */
    const ORDER_BY_DESC = "desc";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUserFieldName extends KalturaEnumBase {
    /** @var USER_CREATED_AT */
    const USER_CREATED_AT = "created_at";
    /** @var USER_EMAIL */
    const USER_EMAIL = "email";
    /** @var USER_FIRST_NAME */
    const USER_FIRST_NAME = "first_name";
    /** @var USER_GROUP_IDS */
    const USER_GROUP_IDS = "group_ids";
    /** @var USER_TYPE */
    const USER_TYPE = "kuser_type";
    /** @var USER_LAST_NAME */
    const USER_LAST_NAME = "last_name";
    /** @var USER_PERMISSION_NAMES */
    const USER_PERMISSION_NAMES = "permission_names";
    /** @var USER_ROLE_IDS */
    const USER_ROLE_IDS = "role_ids";
    /** @var USER_SCREEN_NAME */
    const USER_SCREEN_NAME = "screen_name";
    /** @var USER_TAGS */
    const USER_TAGS = "tags";
    /** @var USER_UPDATED_AT */
    const USER_UPDATED_AT = "updated_at";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUserOrderByFieldName extends KalturaEnumBase {
    /** @var USER_CREATED_AT */
    const USER_CREATED_AT = "created_at";
    /** @var USER_UPDATED_AT */
    const USER_UPDATED_AT = "updated_at";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaESearchBaseItem extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaESearchItemData extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $highlight = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchItemDataResult extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $totalCount = null;

    /**
     *
     * @var array of KalturaESearchItemData
     */
    public $items;

    /**
     *
     * @var string
     */
    public $itemsType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaESearchOrderByItem extends KalturaObjectBase {
    /**
     *
     * @var KalturaESearchSortOrder
     */
    public $sortOrder = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchOrderBy extends KalturaObjectBase {
    /**
     *
     * @var array of KalturaESearchOrderByItem
     */
    public $orderItems;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchOperator extends KalturaESearchBaseItem {
    /**
     *
     * @var KalturaESearchOperatorType
     */
    public $operator = null;

    /**
     *
     * @var array of KalturaESearchBaseItem
     */
    public $searchItems;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchParams extends KalturaObjectBase {
    /**
     *
     * @var KalturaESearchOperator
     */
    public $searchOperator;

    /**
     *
     * @var string
     */
    public $objectStatuses = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var KalturaESearchOrderBy
     */
    public $orderBy;

    /**
     *
     * @var bool
     */
    public $useHighlight = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchRange extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $greaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $lessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $greaterThan = null;

    /**
     *
     * @var int
     */
    public $lessThan = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaESearchResult extends KalturaObjectBase {
    /**
     *
     * @var KalturaObjectBase
     */
    public $object;

    /**
     *
     * @var string
     */
    public $highlight = null;

    /**
     *
     * @var array of KalturaESearchItemDataResult
     */
    public $itemsData;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchResponse extends KalturaObjectBase {
    /**
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;

    /**
     *
     * @var array of KalturaESearchResult
     * @readonly
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
class KalturaESearchCaptionItemData extends KalturaESearchItemData {
    /**
     *
     * @var string
     */
    public $line = null;

    /**
     *
     * @var int
     */
    public $startsAt = null;

    /**
     *
     * @var int
     */
    public $endsAt = null;

    /**
     *
     * @var string
     */
    public $language = null;

    /**
     *
     * @var string
     */
    public $captionAssetId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCategoryOrderByItem extends KalturaESearchOrderByItem {
    /**
     *
     * @var KalturaESearchCategoryOrderByFieldName
     */
    public $sortField = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCategoryResult extends KalturaESearchResult {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCuePointItemData extends KalturaESearchItemData {
    /**
     *
     * @var string
     */
    public $cuePointType = null;

    /**
     *
     * @var string
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
    public $text = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     *
     * @var string
     */
    public $startTime = null;

    /**
     *
     * @var string
     */
    public $endTime = null;

    /**
     *
     * @var string
     */
    public $subType = null;

    /**
     *
     * @var string
     */
    public $question = null;

    /**
     *
     * @var string
     */
    public $answers = null;

    /**
     *
     * @var string
     */
    public $hint = null;

    /**
     *
     * @var string
     */
    public $explanation = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchEntryOrderByItem extends KalturaESearchOrderByItem {
    /**
     *
     * @var KalturaESearchEntryOrderByFieldName
     */
    public $sortField = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchEntryResult extends KalturaESearchResult {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaESearchItem extends KalturaESearchBaseItem {
    /**
     *
     * @var string
     */
    public $searchTerm = null;

    /**
     *
     * @var KalturaESearchItemType
     */
    public $itemType = null;

    /**
     *
     * @var KalturaESearchRange
     */
    public $range;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchMetadataItemData extends KalturaESearchItemData {
    /**
     *
     * @var string
     */
    public $xpath = null;

    /**
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     * @var int
     */
    public $metadataFieldId = null;

    /**
     *
     * @var string
     */
    public $valueText = null;

    /**
     *
     * @var int
     */
    public $valueInt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchQuery extends KalturaESearchBaseItem {
    /**
     *
     * @var string
     */
    public $eSearchQuery = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUserOrderByItem extends KalturaESearchOrderByItem {
    /**
     *
     * @var KalturaESearchUserOrderByFieldName
     */
    public $sortField = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUserResult extends KalturaESearchResult {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCaptionItem extends KalturaESearchItem {
    /**
     *
     * @var KalturaESearchCaptionFieldName
     */
    public $fieldName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCategoryItem extends KalturaESearchItem {
    /**
     *
     * @var KalturaESearchCategoryFieldName
     */
    public $fieldName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchCuePointItem extends KalturaESearchItem {
    /**
     *
     * @var KalturaESearchCuePointFieldName
     */
    public $fieldName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchEntryItem extends KalturaESearchItem {
    /**
     *
     * @var KalturaESearchEntryFieldName
     */
    public $fieldName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchMetadataItem extends KalturaESearchItem {
    /**
     *
     * @var string
     */
    public $xpath = null;

    /**
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     * @var int
     */
    public $metadataFieldId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUnifiedItem extends KalturaESearchItem {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchUserItem extends KalturaESearchItem {
    /**
     *
     * @var KalturaESearchUserFieldName
     */
    public $fieldName = null;
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura ESearch Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get allowed search types.
     * @param KalturaESearchItem  $searchitem - instance of KalturaESearchItem.
     * @return array - array of search type.
     */
    public function getAllowedSearchTypes(KalturaESearchItem $searchitem) {
        $kparams = array();
        $this->client->addParam($kparams, "searchItem", $searchitem->toParams());
        $this->client->queueServiceActionCall("elasticsearch_esearch", "getAllowedSearchTypes", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Search category.
     * @param KalturaESearchParams $searchparams - instance of KalturaESearchParams.
     * @param KalturaPager $pager - instance of KalturaPager.
     * @return KalturaESearchResponse - instance of KalturaESearchResponse.
     */
    public function searchCategory(KalturaESearchParams $searchparams, KalturaPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "searchParams", $searchparams->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("elasticsearch_esearch", "searchCategory", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaESearchResponse");
        return $resultobject;
    }

    /**
     * Search entry by uging elastic search.
     * @param KalturaESearchParams $searchparams - instance of KalturaESearchParams.
     * @param KalturaPager $pager - instance of KalturaPager.
     * @return KalturaESearchResponse - instance of KalturaESearchResponse.
     */
    public function searchEntry(KalturaESearchParams $searchparams, KalturaPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "searchParams", $searchparams->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("elasticsearch_esearch", "searchEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaESearchResponse");
        return $resultobject;
    }

    /**
     * Search user by using elastic search.
     * @param KalturaESearchParams $searchparams - instance of KalturaESearchParams.
     * @param KalturaPager $pager - instance of KalturaPager.
     * @return KalturaESearchResponse - instance of KalturaESearchResponse.
     */
    public function searchUser(KalturaESearchParams $searchparams, KalturaPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "searchParams", $searchparams->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("elasticsearch_esearch", "searchUser", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaESearchResponse");
        return $resultobject;
    }
}
/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaElasticSearchClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaESearchService
     */
    public $eSearch = null;

    /**
     * Constructor of Kaltura ElasticSearch Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->eSearch = new KalturaESearchService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaElasticSearchClientPlugin - instance of KalturaElasticSearchClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaElasticSearchClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'eSearch' => $this->eSearch,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'elasticSearch';
    }
}
