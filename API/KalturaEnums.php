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

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

error_reporting(E_STRICT);

require_once(dirname(__FILE__) . "/KalturaClientBase.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppearInListType extends KalturaEnumBase {
    /** @var partner only */
    const PARTNER_ONLY = 1;
    /** @var category members only */
    const CATEGORY_MEMBERS_ONLY = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsDeletePolicy extends KalturaEnumBase {
    /** @var keep */
    const KEEP = 0;
    /** @var delete */
    const DELETE = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsOrigin extends KalturaEnumBase {
    /** @var convert */
    const CONVERT = 0;
    /** @var ingest */
    const INGEST = 1;
    /** @var convert when missing */
    const CONVERT_WHEN_MISSING = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobErrorTypes extends KalturaEnumBase {
    /** @var app */
    const APP = 0;
    /** @var runtime */
    const RUNTIME = 1;
    /** @var http */
    const HTTP = 2;
    /** @var curl */
    const CURL = 3;
    /** @var kaltura api */
    const KALTURA_API = 4;
    /** @var kaltura client */
    const KALTURA_CLIENT = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 0;
    /** @var queued */
    const QUEUED = 1;
    /** @var processing */
    const PROCESSING = 2;
    /** @var processed */
    const PROCESSED = 3;
    /** @var movefile */
    const MOVEFILE = 4;
    /** @var finished */
    const FINISHED = 5;
    /** @var failed */
    const FAILED = 6;
    /** @var aborted */
    const ABORTED = 7;
    /** @var almost done */
    const ALMOST_DONE = 8;
    /** @var retry */
    const RETRY = 9;
    /** @var fatal */
    const FATAL = 10;
    /** @var dont process*/
    const DONT_PROCESS = 11;
    /** @var finished partially */
    const FINISHED_PARTIALLY = 12;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBitRateMode extends KalturaEnumBase {
    /** @var cbr */
    const CBR = 1;
    /** @var vbr */
    const VBR = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 1;
    /** @var active */
    const ACTIVE = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var rejected */
    const REJECTED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryStatus extends KalturaEnumBase {
    /** @var updating */
    const UPDATING = 1;
    /** @var active */
    const ACTIVE = 2;
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
class KalturaCategoryUserPermissionLevel extends KalturaEnumBase {
    /** @var manager */
    const MANAGER = 0;
    /** @var moderator */
    const MODERATOR = 1;
    /** @var contributor */
    const CONTRIBUTOR = 2;
    /** @var member */
    const MEMBER = 3;
    /** @var none */
    const NONE = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var pending */
    const PENDING = 2;
    /** @var not active */
    const NOT_ACTIVE = 3;
    /** @var deleted */
    const DELETED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaChinaCacheAlgorithmType extends KalturaEnumBase {
    /** @var sha1 */
    const SHA1 = 1;
    /** @var sha256 */
    const SHA256 = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCommercialUseType extends KalturaEnumBase {
    /** @var non commercial use */
    const NON_COMMERCIAL_USE = 0;
    /** @var commercial use */
    const COMMERCIAL_USE = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContributionPolicyType extends KalturaEnumBase {
    /** @var all */
    const ALL = 1;
    /** @var members with contribution permission */
    const MEMBERS_WITH_CONTRIBUTION_PERMISSION = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 1;
    /** @var handled */
    const HANDLED = 2;
    /** @var done */
    const DONE = 3;
    /** @var failed */
    const FAILED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandTargetType extends KalturaEnumBase {
    /** @var data center */
    const DATA_CENTER = 1;
    /** @var scheduler */
    const SCHEDULER = 2;
    /** @var job type */
    const JOB_TYPE = 3;
    /** @var job */
    const JOB = 4;
    /** @var batch */
    const BATCH = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandType extends KalturaEnumBase {
    /** @var kill */
    const KILL = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCountryRestrictionType extends KalturaEnumBase {
    /** @var restrict country list */
    const RESTRICT_COUNTRY_LIST = 0;
    /** @var allow country list */
    const ALLOW_COUNTRY_LIST = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDVRStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 0;
    /** @var enabled */
    const ENABLED = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 0;
    /** @var deleted */
    const DELETED = 1;
    /** @var staging in */
    const STAGING_IN = 2;
    /** @var staging out */
    const STAGING_OUT = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDirectoryRestrictionType extends KalturaEnumBase {
    /** @var dont display */
    const DONT_DISPLAY = 0;
    /** @var display with link */
    const DISPLAY_WITH_LINK = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEditorType extends KalturaEnumBase {
    /** @var simple */
    const SIMPLE = 1;
    /** @var advanced */
    const ADVANCED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfileStatus extends KalturaEnumBase {
    /** @var inactive */
    const INACTIVE = 0;
    /** @var active */
    const ACTIVE = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryDisplayInSearchType extends KalturaEnumBase {
    /** @var system */
    const SYSTEM = -1;
    /** @var none */
    const NONE = 0;
    /** @var partner only */
    const PARTNER_ONLY = 1;
    /** @var kaltura network */
    const KALTURA_NETWORK = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryModerationStatus extends KalturaEnumBase {
    /** @var pending moderation */
    const PENDING_MODERATION = 1;
    /** @var approved */
    const APPROVED = 2;
    /** @var rejected */
    const REJECTED = 3;
    /** @var deleted */
    const DELETED = 4;
    /** @var flagged for review */
    const FLAGGED_FOR_REVIEW = 5;
    /** @var auto approved */
    const AUTO_APPROVED = 6;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeRecordingStatus extends KalturaEnumBase {
    /** @var stopped */
    const STOPPED = 0;
    /** @var on going */
    const ON_GOING = 1;
    /** @var done */
    const DONE = 2;
    /** @var dissmissed */
    const DISMISSED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeStatus extends KalturaEnumBase {
    /** @var stoppoed */
    const STOPPED = 0;
    /** @var playable */
    const PLAYABLE = 1;
    /** @var broadcasting */
    const BROADCASTING = 2;
    /** @var authenticated */
    const AUTHENTICATED = 3;
    /** @var marked for deletion */
    const MARKED_FOR_DELETION = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFeatureStatusType extends KalturaEnumBase {
    /** @var lock category */
    const LOCK_CATEGORY = 1;
    /** @var category */
    const CATEGORY = 2;
    /** @var category entry */
    const CATEGORY_ENTRY = 3;
    /** @var entry */
    const ENTRY = 4;
    /** @var category user */
    const CATEGORY_USER = 5;
    /** @var user */
    const USER = 6;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetStatus extends KalturaEnumBase {
    /** @var error */
    const ERROR = -1;
    /** @var queued */
    const QUEUED = 0;
    /** @var converting */
    const CONVERTING = 1;
    /** @var ready */
    const READY = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var not applicable */
    const NOT_APPLICABLE = 4;
    /** @var temp */
    const TEMP = 5;
    /** @var wait for convert */
    const WAIT_FOR_CONVERT = 6;
    /** @var importing */
    const IMPORTING = 7;
    /** @var validating */
    const VALIDATING = 8;
    /** @var exporting */
    const EXPORTING = 9;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorReadyBehaviorType extends KalturaEnumBase {
    /** @var no impact */
    const NO_IMPACT = 0;
    /** @var inherit flavor params */
    const INHERIT_FLAVOR_PARAMS = 0;
    /** @var requeued */
    const REQUIRED = 1;
    /** @var optional */
    const OPTIONAL = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGender extends KalturaEnumBase {
    /** @var unknown */
    const UNKNOWN = 0;
    /** @var male */
    const MALE = 1;
    /** @var female */
    const FEMALE = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUserStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 0;
    /** @var deleted */
    const DELETED = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaInheritanceType extends KalturaEnumBase {
    /** @var inherit */
    const INHERIT = 1;
    /** @var manual */
    const MANUAL = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIpAddressRestrictionType extends KalturaEnumBase {
    /** @var restrict list */
    const RESTRICT_LIST = 0;
    /** @var allow list */
    const ALLOW_LIST = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLicenseType extends KalturaEnumBase {
    /** @var unknown */
    const UNKNOWN = -1;
    /** @var none */
    const NONE = 0;
    /** @var copyrighted */
    const COPYRIGHTED = 1;
    /** @var public domain */
    const PUBLIC_DOMAIN = 2;
    /** @var creativecommons attribution */
    const CREATIVECOMMONS_ATTRIBUTION = 3;
    /** @var creativecommons attribution share alike */
    const CREATIVECOMMONS_ATTRIBUTION_SHARE_ALIKE = 4;
    /** @var creativecommons attribution no derivatives */
    const CREATIVECOMMONS_ATTRIBUTION_NO_DERIVATIVES = 5;
    /** @var creativecommons attribution non commercial */
    const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL = 6;
    /** @var creativecommons attribution non commercial share alike */
    const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_SHARE_ALIKE = 7;
    /** @var creativecommons attribution non commercial no derivatives */
    const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_NO_DERIVATIVES = 8;
    /** @var gfdl */
    const GFDL = 9;
    /** @var gpl */
    const GPL = 10;
    /** @var affero gpl */
    const AFFERO_GPL = 11;
    /** @var lgpl */
    const LGPL = 12;
    /** @var bsd */
    const BSD = 13;
    /** @var apache */
    const APACHE = 14;
    /** @var moziila */
    const MOZILLA = 15;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLimitFlavorsRestrictionType extends KalturaEnumBase {
    /** @var restrict list */
    const RESTRICT_LIST = 0;
    /** @var allow list */
    const ALLOW_LIST = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLivePublishStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 0;
    /** @var enabled */
    const ENABLED = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportExportType extends KalturaEnumBase {
    /** @var partner total all */
    const PARTNER_TOTAL_ALL = 1;
    /** @var partner total live */
    const PARTNER_TOTAL_LIVE = 2;
    /** @var entry time line all */
    const ENTRY_TIME_LINE_ALL = 11;
    /** @var entry time line live */
    const ENTRY_TIME_LINE_LIVE = 12;
    /** @var location all */
    const LOCATION_ALL = 21;
    /** @var location live */
    const LOCATION_LIVE = 22;
    /** @var syndication all */
    const SYNDICATION_ALL = 31;
    /** @var syndication live */
    const SYNDICATION_LIVE = 32;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStatsEventType extends KalturaEnumBase {
    /** @var live */
    const LIVE = 1;
    /** @var dvr */
    const DVR = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMailJobStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 1;
    /** @var sent */
    const SENT = 2;
    /** @var error */
    const ERROR = 3;
    /** @var queued */
    const QUEUED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaType extends KalturaEnumBase {
    /** @var video */
    const VIDEO = 1;
    /** @var image */
    const IMAGE = 2;
    /** @var audio */
    const AUDIO = 5;
    /** @var live stream flash */
    const LIVE_STREAM_FLASH = 201;
    /** @var live stream windows media */
    const LIVE_STREAM_WINDOWS_MEDIA = 202;
    /** @var live stream real media */
    const LIVE_STREAM_REAL_MEDIA = 203;
    /** @var live stream quicktime */
    const LIVE_STREAM_QUICKTIME = 204;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationFlagType extends KalturaEnumBase {
    /** @var sexual content */
    const SEXUAL_CONTENT = 1;
    /** @var violent repulsive */
    const VIOLENT_REPULSIVE = 2;
    /** @var harmful dangerous */
    const HARMFUL_DANGEROUS = 3;
    /** @var spam commercials */
    const SPAM_COMMERCIALS = 4;
    /** @var copyright */
    const COPYRIGHT = 5;
    /** @var terms of use violation */
    const TERMS_OF_USE_VIOLATION = 6;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMrssExtensionMode extends KalturaEnumBase {
    /** @var append */
    const APPEND = 1;
    /** @var replace */
    const REPLACE = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationObjectType extends KalturaEnumBase {
    /** @var entry */
    const ENTRY = 1;
    /** @var kshow */
    const KSHOW = 2;
    /** @var user */
    const USER = 3;
    /** @var batch job */
    const BATCH_JOB = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 1;
    /** @var sent */
    const SENT = 2;
    /** @var error */
    const ERROR = 3;
    /** @var should resend */
    const SHOULD_RESEND = 4;
    /** @var error resending */
    const ERROR_RESENDING = 5;
    /** @var sent synch */
    const SENT_SYNCH = 6;
    /** @var queued */
    const QUEUED = 7;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationType extends KalturaEnumBase {
    /** @var entry add */
    const ENTRY_ADD = 1;
    /** @var enter update permissions */
    const ENTR_UPDATE_PERMISSIONS = 2;
    /** @var entry delete */
    const ENTRY_DELETE = 3;
    /** @var entry block */
    const ENTRY_BLOCK = 4;
    /** @var entry update */
    const ENTRY_UPDATE = 5;
    /** @var entry update thumbnail */
    const ENTRY_UPDATE_THUMBNAIL = 6;
    /** @var entry update moderation */
    const ENTRY_UPDATE_MODERATION = 7;
    /** @var user add */
    const USER_ADD = 21;
    /** @var user banned */
    const USER_BANNED = 26;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNullableBoolean extends KalturaEnumBase {
    /** @var null value */
    const NULL_VALUE = -1;
    /** @var false value */
    const FALSE_VALUE = 0;
    /** @var true value */
    const TRUE_VALUE = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerGroupType extends KalturaEnumBase {
    /** @var publisher */
    const PUBLISHER = 1;
    /** @var var group */
    const VAR_GROUP = 2;
    /** @var group */
    const GROUP = 3;
    /** @var template */
    const TEMPLATE = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerStatus extends KalturaEnumBase {
    /** @var deleted */
    const DELETED = 0;
    /** @var active */
    const ACTIVE = 1;
    /** @var blocked */
    const BLOCKED = 2;
    /** @var full block */
    const FULL_BLOCK = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerType extends KalturaEnumBase {
    /** @var kmc */
    const KMC = 1;
    /** @var wiki */
    const WIKI = 100;
    /** @var wordpress */
    const WORDPRESS = 101;
    /** @var drupal */
    const DRUPAL = 102;
    /** @var dekiwiki */
    const DEKIWIKI = 103;
    /** @var moodle */
    const MOODLE = 104;
    /** @var community edition */
    const COMMUNITY_EDITION = 105;
    /** @var joomla */
    const JOOMLA = 106;
    /** @var blackboard */
    const BLACKBOARD = 107;
    /** @var sakai */
    const SAKAI = 108;
    /** @var admin console */
    const ADMIN_CONSOLE = 109;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var blocked */
    const BLOCKED = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionType extends KalturaEnumBase {
    /** @var normal */
    const NORMAL = 1;
    /** @var special feature */
    const SPECIAL_FEATURE = 2;
    /** @var plugin */
    const PLUGIN = 3;
    /** @var partner group */
    const PARTNER_GROUP = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistType extends KalturaEnumBase {
    /** @var static list */
    const STATIC_LIST = 3;
    /** @var dynamic */
    const DYNAMIC = 10;
    /** @var external */
    const EXTERNAL = 101;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPrivacyType extends KalturaEnumBase {
    /** @var all */
    const ALL = 1;
    /** @var authenticated users */
    const AUTHENTICATED_USERS = 2;
    /** @var members only */
    const MEMBERS_ONLY = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRecordStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 0;
    /** @var appended */
    const APPENDED = 1;
    /** @var per session */
    const PER_SESSION = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRecordingStatus extends KalturaEnumBase {
    /** @var stopped */
    const STOPPED = 0;
    /** @var paused */
    const PAUSED = 1;
    /** @var active */
    const ACTIVE = 2;
    /** @var disabled */
    const DISABLED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileStatus extends KalturaEnumBase {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileType extends KalturaEnumBase {
    /** @var include fields */
    const INCLUDE_FIELDS = 1;
    /** @var exclude fields */
    const EXCLUDE_FIELDS = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseType extends KalturaEnumBase {
    /** @var response type json */
    const RESPONSE_TYPE_JSON = 1;
    /** @var response type xml */
    const RESPONSE_TYPE_XML = 2;
    /** @var response type php */
    const RESPONSE_TYPE_PHP = 3;
    /** @var response type php array */
    const RESPONSE_TYPE_PHP_ARRAY = 4;
    /** @var response type html */
    const RESPONSE_TYPE_HTML = 7;
    /** @var response type mrss */
    const RESPONSE_TYPE_MRSS = 8;
    /** @var response type jsonp */
    const RESPONSE_TYPE_JSONP = 9;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchedulerStatusType extends KalturaEnumBase {
    /** @var running batches count */
    const RUNNING_BATCHES_COUNT = 1;
    /** @var running batches cpu */
    const RUNNING_BATCHES_CPU = 2;
    /** @var running batches memory */
    const RUNNING_BATCHES_MEMORY = 3;
    /** @var running batches network */
    const RUNNING_BATCHES_NETWORK = 4;
    /** @var running batches disc io */
    const RUNNING_BATCHES_DISC_IO = 5;
    /** @var running batches disc space */
    const RUNNING_BATCHES_DISC_SPACE = 6;
    /** @var running batches is running */
    const RUNNING_BATCHES_IS_RUNNING = 7;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchOperatorType extends KalturaEnumBase {
    /** @var search and */
    const SEARCH_AND = 1;
    /** @var search or */
    const SEARCH_OR = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchProviderType extends KalturaEnumBase {
    /** @var flickr */
    const FLICKR = 3;
    /** @var youtube */
    const YOUTUBE = 4;
    /** @var myspace */
    const MYSPACE = 7;
    /** @var photobucket */
    const PHOTOBUCKET = 8;
    /** @var jamendo */
    const JAMENDO = 9;
    /** @var ccmixter */
    const CCMIXTER = 10;
    /** @var nypl */
    const NYPL = 11;
    /** @var current */
    const CURRENT = 12;
    /** @var media commons */
    const MEDIA_COMMONS = 13;
    /** @var kaltura */
    const KALTURA = 20;
    /** @var kaltura user clips */
    const KALTURA_USER_CLIPS = 21;
    /** @var archive org */
    const ARCHIVE_ORG = 22;
    /** @var kaltura partner */
    const KALTURA_PARTNER = 23;
    /** @var metacafe */
    const METACAFE = 24;
    /** @var search proxy */
    const SEARCH_PROXY = 28;
    /** @var partner specific */
    const PARTNER_SPECIFIC = 100;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var disabled */
    const DISABLED = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var not regstered */
    const NOT_REGISTERED = 4;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionType extends KalturaEnumBase {
    /** @var user */
    const USER = 0;
    /** @var admin */
    const ADMIN = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSiteRestrictionType extends KalturaEnumBase {
    /** @var restrict site list */
    const RESTRICT_SITE_LIST = 0;
    /** @var allow site list */
    const ALLOW_SITE_LIST = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsEventType extends KalturaEnumBase {
    /** @var widget loaded */
    const WIDGET_LOADED = 1;
    /** @var media loaded */
    const MEDIA_LOADED = 2;
    /** @var play */
    const PLAY = 3;
    /** @var play reached 25 */
    const PLAY_REACHED_25 = 4;
    /** @var play reached 50 */
    const PLAY_REACHED_50 = 5;
    /** @var play reached 75 */
    const PLAY_REACHED_75 = 6;
    /** @var play reached 100 */
    const PLAY_REACHED_100 = 7;
    /** @var open edit */
    const OPEN_EDIT = 8;
    /** @var open viral */
    const OPEN_VIRAL = 9;
    /** @var open download */
    const OPEN_DOWNLOAD = 10;
    /** @var open report */
    const OPEN_REPORT = 11;
    /** @var buffer start */
    const BUFFER_START = 12;
    /** @var buffer end */
    const BUFFER_END = 13;
    /** @var open full screen */
    const OPEN_FULL_SCREEN = 14;
    /** @var close full screen */
    const CLOSE_FULL_SCREEN = 15;
    /** @var replay */
    const REPLAY = 16;
    /** @var seek */
    const SEEK = 17;
    /** @var open upload */
    const OPEN_UPLOAD = 18;
    /** @var save publish */
    const SAVE_PUBLISH = 19;
    /** @var close editor */
    const CLOSE_EDITOR = 20;
    /** @var bumper played */
    const PRE_BUMPER_PLAYED = 21;
    /** @var bumper played */
    const POST_BUMPER_PLAYED = 22;
    /** @var bumper clicked */
    const BUMPER_CLICKED = 23;
    /** @var preroll started */
    const PREROLL_STARTED = 24;
    /** @var midroll started */
    const MIDROLL_STARTED = 25;
    /** @var postroll started */
    const POSTROLL_STARTED = 26;
    /** @var overlay started */
    const OVERLAY_STARTED = 27;
    /** @var preroll clicked */
    const PREROLL_CLICKED = 28;
    /** @var midroll clicked */
    const MIDROLL_CLICKED = 29;
    /** @var postroll clicked */
    const POSTROLL_CLICKED = 30;
    /** @var overlay clicked */
    const OVERLAY_CLICKED = 31;
    /** @var preroll 25 */
    const PREROLL_25 = 32;
    /** @var preroll 50 */
    const PREROLL_50 = 33;
    /** @var preroll 75 */
    const PREROLL_75 = 34;
    /** @var midroll 25 */
    const MIDROLL_25 = 35;
    /** @var midroll 50 */
    const MIDROLL_50 = 36;
    /** @var midroll 75 */
    const MIDROLL_75 = 37;
    /** @var postroll 25 */
    const POSTROLL_25 = 38;
    /** @var postroll 50 */
    const POSTROLL_50 = 39;
    /** @var postroll 75 */
    const POSTROLL_75 = 40;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsFeatureType extends KalturaEnumBase {
    /** @var none */
    const NONE = 0;
    /** @var related */
    const RELATED = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsKmcEventType extends KalturaEnumBase {
    /** @var content page view */
    const CONTENT_PAGE_VIEW = 1001;
    /** @var content add playlist */
    const CONTENT_ADD_PLAYLIST = 1010;
    /** @var content edit playlist */
    const CONTENT_EDIT_PLAYLIST = 1011;
    /** @var content delete playlist */
    const CONTENT_DELETE_PLAYLIST = 1012;
    /** @var content edit entry */
    const CONTENT_EDIT_ENTRY = 1013;
    /** @var content change thumbnail */
    const CONTENT_CHANGE_THUMBNAIL = 1014;
    /** @var content add tags */
    const CONTENT_ADD_TAGS = 1015;
    /** @var content remove tags */
    const CONTENT_REMOVE_TAGS = 1016;
    /** @var content add admin tags */
    const CONTENT_ADD_ADMIN_TAGS = 1017;
    /** @var content remove admin tags */
    const CONTENT_REMOVE_ADMIN_TAGS = 1018;
    /** @var content download */
    const CONTENT_DOWNLOAD = 1019;
    /** @var content approve moderation */
    const CONTENT_APPROVE_MODERATION = 1020;
    /** @var content reject moderation */
    const CONTENT_REJECT_MODERATION = 1021;
    /** @var content bulk upload */
    const CONTENT_BULK_UPLOAD = 1022;
    /** @var content admin kcw upload */
    const CONTENT_ADMIN_KCW_UPLOAD = 1023;
    /** @var account change partner info */
    const ACCOUNT_CHANGE_PARTNER_INFO = 1030;
    /** @var account change login info */
    const ACCOUNT_CHANGE_LOGIN_INFO = 1031;
    /** @var account contact us usage */
    const ACCOUNT_CONTACT_US_USAGE = 1032;
    /** @var account update server setting */
    const ACCOUNT_UPDATE_SERVER_SETTINGS = 1033;
    /** @var account account overview */
    const ACCOUNT_ACCOUNT_OVERVIEW = 1034;
    /** @var account access control */
    const ACCOUNT_ACCESS_CONTROL = 1035;
    /** @var account transcoding settings */
    const ACCOUNT_TRANSCODING_SETTINGS = 1036;
    /** @var account account upgrade */
    const ACCOUNT_ACCOUNT_UPGRADE = 1037;
    /** @var account save server settings */
    const ACCOUNT_SAVE_SERVER_SETTINGS = 1038;
    /** @var account access control delete */
    const ACCOUNT_ACCESS_CONTROL_DELETE = 1039;
    /** @var account save transcoding settings */
    const ACCOUNT_SAVE_TRANSCODING_SETTINGS = 1040;
    /** @var login */
    const LOGIN = 1041;
    /** @var dashboard import content */
    const DASHBOARD_IMPORT_CONTENT = 1042;
    /** @var dashboard update content */
    const DASHBOARD_UPDATE_CONTENT = 1043;
    /** @var dashboard account contact us */
    const DASHBOARD_ACCOUNT_CONTACT_US = 1044;
    /** @var dashboard view reports */
    const DASHBOARD_VIEW_REPORTS = 1045;
    /** @var dashboard embed player */
    const DASHBOARD_EMBED_PLAYER = 1046;
    /** @var dashboard emved playlist */
    const DASHBOARD_EMBED_PLAYLIST = 1047;
    /** @var dashboard customize players */
    const DASHBOARD_CUSTOMIZE_PLAYERS = 1048;
    /** @var app studio new player single video */
    const APP_STUDIO_NEW_PLAYER_SINGLE_VIDEO = 1050;
    /** @var app studio new player playlist */
    const APP_STUDIO_NEW_PLAYER_PLAYLIST = 1051;
    /** @var app studio new player multi tab playlist */
    const APP_STUDIO_NEW_PLAYER_MULTI_TAB_PLAYLIST = 1052;
    /** @var app studio edit player single video */
    const APP_STUDIO_EDIT_PLAYER_SINGLE_VIDEO = 1053;
    /** @var app studio edit player playlist */
    const APP_STUDIO_EDIT_PLAYER_PLAYLIST = 1054;
    /** @var app studio edit player multi tab playlist */
    const APP_STUDIO_EDIT_PLAYER_MULTI_TAB_PLAYLIST = 1055;
    /** @var app studio duplicate player */
    const APP_STUDIO_DUPLICATE_PLAYER = 1056;
    /** @var content content go to page */
    const CONTENT_CONTENT_GO_TO_PAGE = 1057;
    /** @var content delete item */
    const CONTENT_DELETE_ITEM = 1058;
    /** @var content delete mix */
    const CONTENT_DELETE_MIX = 1059;
    /** @var reports and analytics bandwidth usage tab */
    const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_TAB = 1070;
    /** @var reports and analytics content reports tab */
    const REPORTS_AND_ANALYTICS_CONTENT_REPORTS_TAB = 1071;
    /** @var reports and analytics users and community reports tab */
    const REPORTS_AND_ANALYTICS_USERS_AND_COMMUNITY_REPORTS_TAB = 1072;
    /** @var reports and analytics top contributors */
    const REPORTS_AND_ANALYTICS_TOP_CONTRIBUTORS = 1073;
    /** @var reports and analytics map overlays */
    const REPORTS_AND_ANALYTICS_MAP_OVERLAYS = 1074;
    /** @var reports and analytics top syndications */
    const REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS = 1075;
    /** @var reports and analytics top content */
    const REPORTS_AND_ANALYTICS_TOP_CONTENT = 1076;
    /** @var reports and analytics content dropoff */
    const REPORTS_AND_ANALYTICS_CONTENT_DROPOFF = 1077;
    /** @var reports and analytics content interactions */
    const REPORTS_AND_ANALYTICS_CONTENT_INTERACTIONS = 1078;
    /** @var reports and analytics content contributions */
    const REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS = 1079;
    /** @var reports and analytics video drill down */
    const REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN = 1080;
    /** @var reports and analytics drill down interaction */
    const REPORTS_AND_ANALYTICS_CONTENT_DRILL_DOWN_INTERACTION = 1081;
    /** @var reports and analytics content contributions drilldown */
    const REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS_DRILLDOWN = 1082;
    /** @var reports and analytics video drill down dropoff */
    const REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN_DROPOFF = 1083;
    /** @var reports and analytics map overlays drilldown */
    const REPORTS_AND_ANALYTICS_MAP_OVERLAYS_DRILLDOWN = 1084;
    /** @var reports and analytics top syndications drill down */
    const REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS_DRILL_DOWN = 1085;
    /** @var reports and analytics bandwidth usage view monthly */
    const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_MONTHLY = 1086;
    /** @var reports and analytics bandwidth usage view yearly */
    const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_YEARLY = 1087;
    /** @var cntent entry drilldown */
    const CONTENT_ENTRY_DRILLDOWN = 1088;
    /** @var content open preview and embed */
    const CONTENT_OPEN_PREVIEW_AND_EMBED = 1089;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileDeliveryStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var blocked */
    const BLOCKED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileReadyBehavior extends KalturaEnumBase {
    /** @var no impact */
    const NO_IMPACT = 0;
    /** @var required */
    const REQUIRED = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileStatus extends KalturaEnumBase {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedStatus extends KalturaEnumBase {
    /** @var deleted */
    const DELETED = -1;
    /** @var active */
    const ACTIVE = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedType extends KalturaEnumBase {
    /** @var google video */
    const GOOGLE_VIDEO = 1;
    /** @var yahoo */
    const YAHOO = 2;
    /** @var itunes */
    const ITUNES = 3;
    /** @var tube mogul */
    const TUBE_MOGUL = 4;
    /** @var kaltura */
    const KALTURA = 5;
    /** @var kaltura xslt */
    const KALTURA_XSLT = 6;
    /** @var roku direct publisher */
    const ROKU_DIRECT_PUBLISHER = 7;
    /** @var opera tv snap */
    const OPERA_TV_SNAP = 8;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetStatus extends KalturaEnumBase {
    /** @var error */
    const ERROR = -1;
    /** @var queued */
    const QUEUED = 0;
    /** @var capturing */
    const CAPTURING = 1;
    /** @var ready */
    const READY = 2;
    /** @var deleted */
    const DELETED = 3;
    /** @var importing */
    const IMPORTING = 7;
    /** @var exporting */
    const EXPORTING = 9;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbCropType extends KalturaEnumBase {
    /** @var resize */
    const RESIZE = 1;
    /** @var reseize with padding */
    const RESIZE_WITH_PADDING = 2;
    /** @var crop */
    const CROP = 3;
    /** @var crop from top */
    const CROP_FROM_TOP = 4;
    /** @var resize with force */
    const RESIZE_WITH_FORCE = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfCreationMode extends KalturaEnumBase {
    /** @var wizard */
    const WIZARD = 2;
    /** @var advanced */
    const ADVANCED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfObjType extends KalturaEnumBase {
    /** @var player */
    const PLAYER = 1;
    /** @var contribution wizard */
    const CONTRIBUTION_WIZARD = 2;
    /** @var simple editor */
    const SIMPLE_EDITOR = 3;
    /** @var advanced editor */
    const ADVANCED_EDITOR = 4;
    /** @var playlist */
    const PLAYLIST = 5;
    /** @var app studio */
    const APP_STUDIO = 6;
    /** @var krecord */
    const KRECORD = 7;
    /** @var player */
    const PLAYER_V3 = 8;
    /** @var kmc account */
    const KMC_ACCOUNT = 9;
    /** @var kmc analytics */
    const KMC_ANALYTICS = 10;
    /** @var kmc content */
    const KMC_CONTENT = 11;
    /** @var dashboard */
    const KMC_DASHBOARD = 12;
    /** @var kmc login */
    const KMC_LOGIN = 13;
    /** @var player sl */
    const PLAYER_SL = 14;
    /** @var clientside encoder */
    const CLIENTSIDE_ENCODER = 15;
    /** @var kmc general */
    const KMC_GENERAL = 16;
    /** @var kmc roles and premissions */
    const KMC_ROLES_AND_PERMISSIONS = 17;
    /** @var clipper */
    const CLIPPER = 18;
    /** @var ksr */
    const KSR = 19;
    /** @var kupload */
    const KUPLOAD = 20;
    /** @var webcasting */
    const WEBCASTING = 21;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUpdateMethodType extends KalturaEnumBase {
    /** @var manual */
    const MANUAL = 0;
    /** @var automatic */
    const AUTOMATIC = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadErrorCode extends KalturaEnumBase {
    /** @var no error */
    const NO_ERROR = 0;
    /** @var general error */
    const GENERAL_ERROR = 1;
    /** @var partial upload */
    const PARTIAL_UPLOAD = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = 0;
    /** @var partial uplaod */
    const PARTIAL_UPLOAD = 1;
    /** @var full upload */
    const FULL_UPLOAD = 2;
    /** @var closed */
    const CLOSED = 3;
    /** @var timed out */
    const TIMED_OUT = 4;
    /** @var deleted */
    const DELETED = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserAgentRestrictionType extends KalturaEnumBase {
    /** @var restrict list */
    const RESTRICT_LIST = 0;
    /** @var allow list */
    const ALLOW_LIST = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserJoinPolicyType extends KalturaEnumBase {
    /** @var auto join */
    const AUTO_JOIN = 1;
    /** @var request to join */
    const REQUEST_TO_JOIN = 2;
    /** @var not allowed */
    const NOT_ALLOWED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var blocked */
    const BLOCKED = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserStatus extends KalturaEnumBase {
    /** @var blocked */
    const BLOCKED = 0;
    /** @var active */
    const ACTIVE = 1;
    /** @var deleted */
    const DELETED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserType extends KalturaEnumBase {
    /** @var user */
    const USER = 0;
    /** @var group */
    const GROUP = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaViewMode extends KalturaEnumBase {
    /** @var preview */
    const PREVIEW = 0;
    /** @var allow all */
    const ALLOW_ALL = 1;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetSecurityType extends KalturaEnumBase {
    /** @var none */
    const NONE = 1;
    /** @var timehash */
    const TIMEHASH = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAkamaiUniversalStreamType extends KalturaEnumBase {
    /** @var hd iphone ipad live */
    const HD_IPHONE_IPAD_LIVE = "HD iPhone/iPad Live";
    /** @var univeral streaming live */
    const UNIVERSAL_STREAMING_LIVE = "Universal Streaming Live";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAmazonS3StorageProfileFilesPermissionLevel extends KalturaEnumBase {
    /** @var acl authenticated read */
    const ACL_AUTHENTICATED_READ = "authenticated-read";
    /** @var acl private */
    const ACL_PRIVATE = "private";
    /** @var acl public read */
    const ACL_PUBLIC_READ = "public-read";
    /** @var acl public read write */
    const ACL_PUBLIC_READ_WRITE = "public-read-write";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAmazonS3StorageProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiActionPermissionItemOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiParameterPermissionItemAction extends KalturaEnumBase {
    /** @var usage */
    const USAGE = "all";
    /** @var insert */
    const INSERT = "insert";
    /** @var read */
    const READ = "read";
    /** @var update */
    const UPDATE = "update";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaApiParameterPermissionItemOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenHashType extends KalturaEnumBase {
    /** @var md5 */
    const MD5 = "MD5";
    /** @var sha1 */
    const SHA1 = "SHA1";
    /** @var sha256 */
    const SHA256 = "SHA256";
    /** @var sha512 */
    const SHA512 = "SHA512";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetOrderBy extends KalturaEnumBase {
    /** @var order by cerated */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by deleted */
    const DELETED_AT_ASC = "+deletedAt";
    /** @var order by size */
    const SIZE_ASC = "+size";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by deleted */
    const DELETED_AT_DESC = "-deletedAt";
    /** @var order by size */
    const SIZE_DESC = "-size";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAssetType extends KalturaEnumBase {
    /** @var attachment */
    const ATTACHMENT = "attachment.Attachment";
    /** @var caption */
    const CAPTION = "caption.Caption";
    /** @var documment */
    const DOCUMENT = "document.Document";
    /** @var image */
    const IMAGE = "document.Image";
    /** @var pdf */
    const PDF = "document.PDF";
    /** @var swf */
    const SWF = "document.SWF";
    /** @var time thumb asset */
    const TIMED_THUMB_ASSET = "thumbCuePoint.timedThumb";
    /** @var transcript */
    const TRANSCRIPT = "transcript.Transcript";
    /** @var widevine flavor */
    const WIDEVINE_FLAVOR = "widevine.WidevineFlavor";
    /** @var flavor */
    const FLAVOR = "1";
    /** @var thumbnail */
    const THUMBNAIL = "2";
    /** @var live */
    const LIVE = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAudioCodec extends KalturaEnumBase {
    /** @var none */
    const NONE = "";
    /** @var aac */
    const AAC = "aac";
    /** @var aache */
    const AACHE = "aache";
    /** @var ac3 */
    const AC3 = "ac3";
    /** @var amrnb */
    const AMRNB = "amrnb";
    /** @var copy */
    const COPY = "copy";
    /** @var eac3 */
    const EAC3 = "eac3";
    /** @var mp3 */
    const MP3 = "mp3";
    /** @var mpeg2 */
    const MPEG2 = "mpeg2";
    /** @var pcm */
    const PCM = "pcm";
    /** @var vorbis */
    const VORBIS = "vorbis";
    /** @var wma */
    const WMA = "wma";
    /** @var wmapro */
    const WMAPRO = "wmapro";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryCloneOptions extends KalturaEnumBase {
    /** @var ad cue points */
    const AD_CUE_POINTS = "adCuePoint.AD_CUE_POINTS";
    /** @var annotation cue points */
    const ANNOTATION_CUE_POINTS = "annotation.ANNOTATION_CUE_POINTS";
    /** @var code cue points */
    const CODE_CUE_POINTS = "codeCuePoint.CODE_CUE_POINTS";
    /** @var thumb cue points */
    const THUMB_CUE_POINTS = "thumbCuePoint.THUMB_CUE_POINTS";
    /** @var users */
    const USERS = "1";
    /** @var categories */
    const CATEGORIES = "2";
    /** @var child entries */
    const CHILD_ENTRIES = "3";
    /** @var access control */
    const ACCESS_CONTROL = "4";
    /** @var metadata */
    const METADATA = "5";
    /** @var flavors */
    const FLAVORS = "6";
    /** @var captions */
    const CAPTIONS = "7";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var uesr id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by playlist */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobObjectType extends KalturaEnumBase {
    /** @var entry distribution */
    const ENTRY_DISTRIBUTION = "contentDistribution.EntryDistribution";
    /** @var drop folder file */
    const DROP_FOLDER_FILE = "dropFolderXmlBulkUpload.DropFolderFile";
    /** @var metadata */
    const METADATA = "metadata.Metadata";
    /** @var metadata profile */
    const METADATA_PROFILE = "metadata.MetadataProfile";
    /** @var scheduled task profile */
    const SCHEDULED_TASK_PROFILE = "scheduledTask.ScheduledTaskProfile";
    /** @var entry */
    const ENTRY = "1";
    /** @var category */
    const CATEGORY = "2";
    /** @var file sync */
    const FILE_SYNC = "3";
    /** @var asset */
    const ASSET = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by estimated effort */
    const ESTIMATED_EFFORT_ASC = "+estimatedEffort";
    /** @var order by execution attempts */
    const EXECUTION_ATTEMPTS_ASC = "+executionAttempts";
    /** @var order by finish time */
    const FINISH_TIME_ASC = "+finishTime";
    /** @var order by lock version */
    const LOCK_VERSION_ASC = "+lockVersion";
    /** @var order by priority */
    const PRIORITY_ASC = "+priority";
    /** @var order by queue time */
    const QUEUE_TIME_ASC = "+queueTime";
    /** @var order by status */
    const STATUS_ASC = "+status";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by estimated effort */
    const ESTIMATED_EFFORT_DESC = "-estimatedEffort";
    /** @var order by execution attempts */
    const EXECUTION_ATTEMPTS_DESC = "-executionAttempts";
    /** @var order by finish time */
    const FINISH_TIME_DESC = "-finishTime";
    /** @var order by lock version */
    const LOCK_VERSION_DESC = "-lockVersion";
    /** @var order by priority */
    const PRIORITY_DESC = "-priority";
    /** @var order by queue time */
    const QUEUE_TIME_DESC = "-queueTime";
    /** @var order by status */
    const STATUS_DESC = "-status";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBatchJobType extends KalturaEnumBase {
    /** @var parse multi language caption asset */
    const PARSE_MULTI_LANGUAGE_CAPTION_ASSET = "caption.parsemultilanguagecaptionasset";
    /** @var parse caption asset */
    const PARSE_CAPTION_ASSET = "captionSearch.parseCaptionAsset";
    /** @var distribution delete */
    const DISTRIBUTION_DELETE = "contentDistribution.DistributionDelete";
    /** @var convert */
    const CONVERT = "0";
    /** @var distribution disable */
    const DISTRIBUTION_DISABLE = "contentDistribution.DistributionDisable";
    /** @var distribution enable */
    const DISTRIBUTION_ENABLE = "contentDistribution.DistributionEnable";
    /** @var distribution fetch report */
    const DISTRIBUTION_FETCH_REPORT = "contentDistribution.DistributionFetchReport";
    /** @var distribution submit */
    const DISTRIBUTION_SUBMIT = "contentDistribution.DistributionSubmit";
    /** @var distribution sync */
    const DISTRIBUTION_SYNC = "contentDistribution.DistributionSync";
    /** @var distribution update */
    const DISTRIBUTION_UPDATE = "contentDistribution.DistributionUpdate";
    /** @var distribution folder content processor */
    const DROP_FOLDER_CONTENT_PROCESSOR = "dropFolder.DropFolderContentProcessor";
    /** @var drop folder watcher */
    const DROP_FOLDER_WATCHER = "dropFolder.DropFolderWatcher";
    /** @var event notification handler */
    const EVENT_NOTIFICATION_HANDLER = "eventNotification.EventNotificationHandler";
    /** @var integration */
    const INTEGRATION = "integration.Integration";
    /** @var scheduled task */
    const SCHEDULED_TASK = "scheduledTask.ScheduledTask";
    /** @var index tags */
    const INDEX_TAGS = "tagSearch.IndexTagsByPrivacyContext";
    /** @var tags resolve */
    const TAG_RESOLVE = "tagSearch.TagResolve";
    /** @var virus scan */
    const VIRUS_SCAN = "virusScan.VirusScan";
    /** @var widevine repository */
    const WIDEVINE_REPOSITORY_SYNC = "widevine.WidevineRepositorySync";
    /** @var import */
    const IMPORT = "1";
    /** @var delete */
    const DELETE = "2";
    /** @var flatten */
    const FLATTEN = "3";
    /** @var bulk upload */
    const BULKUPLOAD = "4";
    /** @var dvd creator */
    const DVDCREATOR = "5";
    /** @var downlaod */
    const DOWNLOAD = "6";
    /** @var ooconvert */
    const OOCONVERT = "7";
    /** @var convery profile */
    const CONVERT_PROFILE = "10";
    /** @var post convert */
    const POSTCONVERT = "11";
    /** @var extract media */
    const EXTRACT_MEDIA = "14";
    /** @var mail */
    const MAIL = "15";
    /** @var notification */
    const NOTIFICATION = "16";
    /** @var cleanup */
    const CLEANUP = "17";
    /** @var scheduler helper */
    const SCHEDULER_HELPER = "18";
    /** @var bulk download */
    const BULKDOWNLOAD = "19";
    /** @var db cleanup */
    const DB_CLEANUP = "20";
    /** @var provision provide */
    const PROVISION_PROVIDE = "21";
    /** @var convert collection */
    const CONVERT_COLLECTION = "22";
    /** @var storage export */
    const STORAGE_EXPORT = "23";
    /** @var provision delete */
    const PROVISION_DELETE = "24";
    /** @var storage delete */
    const STORAGE_DELETE = "25";
    /** @var email ingestion */
    const EMAIL_INGESTION = "26";
    /** @var metadata import */
    const METADATA_IMPORT = "27";
    /** @var metadata transform */
    const METADATA_TRANSFORM = "28";
    /** @var file sync import */
    const FILESYNC_IMPORT = "29";
    /** @var capture thumb */
    const CAPTURE_THUMB = "30";
    /** @var delete file */
    const DELETE_FILE = "31";
    /** @var index */
    const INDEX = "32";
    /** @var move category entries */
    const MOVE_CATEGORY_ENTRIES = "33";
    /** @var copy */
    const COPY = "34";
    /** @var concat */
    const CONCAT = "35";
    /** @var convert live segment */
    const CONVERT_LIVE_SEGMENT = "36";
    /** @var copy partner */
    const COPY_PARTNER = "37";
    /** @var vlidate live media serves */
    const VALIDATE_LIVE_MEDIA_SERVERS = "38";
    /** @var sync category privacy context */
    const SYNC_CATEGORY_PRIVACY_CONTEXT = "39";
    /** @var live repory export */
    const LIVE_REPORT_EXPORT = "40";
    /** @var recalculate cache */
    const RECALCULATE_CACHE = "41";
    /** @var live to vod */
    const LIVE_TO_VOD = "42";
    /** @var copy captions */
    const COPY_CAPTIONS = "43";
    /** @var chunked encode job scheduler */
    const CHUNKED_ENCODE_JOB_SCHEDULER = "44";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadAction extends KalturaEnumBase {
    /** @var cancel */
    const CANCEL = "scheduleBulkUpload.CANCEL";
    /** @var add */
    const ADD = "1";
    /** @var update */
    const UPDATE = "2";
    /** @var delete */
    const DELETE = "3";
    /** @var replace */
    const REPLACE = "4";
    /** @var transform xslt */
    const TRANSFORM_XSLT = "5";
    /** @var add or update */
    const ADD_OR_UPDATE = "6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadObjectType extends KalturaEnumBase {
    /** @var schedule event */
    const SCHEDULE_EVENT = "scheduleBulkUpload.SCHEDULE_EVENT";
    /** @var schedule resource */
    const SCHEDULE_RESOURCE = "scheduleBulkUpload.SCHEDULE_RESOURCE";
    /** @var entry */
    const ENTRY = "1";
    /** @var category */
    const CATEGORY = "2";
    /** @var user */
    const USER = "3";
    /** @var category user */
    const CATEGORY_USER = "4";
    /** @var category entry */
    const CATEGORY_ENTRY = "5";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadResultStatus extends KalturaEnumBase {
    /** @var error */
    const ERROR = "1";
    /** @var ok */
    const OK = "2";
    /** @var in progress */
    const IN_PROGRESS = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadType extends KalturaEnumBase {
    /** @var csv */
    const CSV = "bulkUploadCsv.CSV";
    /** @var filter */
    const FILTER = "bulkUploadFilter.FILTER";
    /** @var xml */
    const XML = "bulkUploadXml.XML";
    /** @var drop folder xml */
    const DROP_FOLDER_XML = "dropFolderXmlBulkUpload.DROP_FOLDER_XML";
    /** @var ical */
    const ICAL = "scheduleBulkUpload.ICAL";
    /** @var drop folder ical */
    const DROP_FOLDER_ICAL = "scheduleDropFolder.DROP_FOLDER_ICAL";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryAdvancedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryIdentifierField extends KalturaEnumBase {
    /** @var full name */
    const FULL_NAME = "fullName";
    /** @var id */
    const ID = "id";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by depth */
    const DEPTH_ASC = "+depth";
    /** @var order by direct entries count */
    const DIRECT_ENTRIES_COUNT_ASC = "+directEntriesCount";
    /** @var order by direct sub categories count */
    const DIRECT_SUB_CATEGORIES_COUNT_ASC = "+directSubCategoriesCount";
    /** @var order by entries count */
    const ENTRIES_COUNT_ASC = "+entriesCount";
    /** @var order by full name */
    const FULL_NAME_ASC = "+fullName";
    /** @var order by members count */
    const MEMBERS_COUNT_ASC = "+membersCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by depth */
    const DEPTH_DESC = "-depth";
    /** @var order by direct entries count */
    const DIRECT_ENTRIES_COUNT_DESC = "-directEntriesCount";
    /** @var order by direct sub categories count */
    const DIRECT_SUB_CATEGORIES_COUNT_DESC = "-directSubCategoriesCount";
    /** @var order by entries count */
    const ENTRIES_COUNT_DESC = "-entriesCount";
    /** @var order by full name */
    const FULL_NAME_DESC = "-fullName";
    /** @var order by members count */
    const MEMBERS_COUNT_DESC = "-membersCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCloneComponentSelectorType extends KalturaEnumBase {
    /** @var include component */
    const INCLUDE_COMPONENT = "0";
    /** @var exclude component */
    const EXCLUDE_COMPONENT = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConditionType extends KalturaEnumBase {
    /** @var event notification field */
    const EVENT_NOTIFICATION_FIELD = "eventNotification.BooleanField";
    /** @var event notification object changed */
    const EVENT_NOTIFICATION_OBJECT_CHANGED = "eventNotification.ObjectChanged";
    /** @var metadata field changed */
    const METADATA_FIELD_CHANGED = "metadata.FieldChanged";
    /** @var metadata field compare */
    const METADATA_FIELD_COMPARE = "metadata.FieldCompare";
    /** @var metadata field match */
    const METADATA_FIELD_MATCH = "metadata.FieldMatch";
    /** @var authenticated */
    const AUTHENTICATED = "1";
    /** @var country */
    const COUNTRY = "2";
    /** @var ip address */
    const IP_ADDRESS = "3";
    /** @var site */
    const SITE = "4";
    /** @var user agent */
    const USER_AGENT = "5";
    /** @var field match */
    const FIELD_MATCH = "6";
    /** @var field compare */
    const FIELD_COMPARE = "7";
    /** @var asset properties compare */
    const ASSET_PROPERTIES_COMPARE = "8";
    /** @var user role */
    const USER_ROLE = "9";
    /** @var geo distance */
    const GEO_DISTANCE = "10";
    /** @var or operator */
    const OR_OPERATOR = "11";
    /** @var hash */
    const HASH = "12";
    /** @var delivery profile */
    const DELIVERY_PROFILE = "13";
    /** @var active egde validate */
    const ACTIVE_EDGE_VALIDATE = "14";
    /** @var anonymous */
    const ANONYMOUS_IP = "15";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContainerFormat extends KalturaEnumBase {
    /** @var */
    const _3GP = "3gp";
    /** @var applehttp */
    const APPLEHTTP = "applehttp";
    /** @var avi */
    const AVI = "avi";
    /** @var bmp */
    const BMP = "bmp";
    /** @var copy */
    const COPY = "copy";
    /** @var flv */
    const FLV = "flv";
    /** @var hls */
    const HLS = "hls";
    /** @var isma */
    const ISMA = "isma";
    /** @var ismv */
    const ISMV = "ismv";
    /** @var jpg */
    const JPG = "jpg";
    /** @var m2ts */
    const M2TS = "m2ts";
    /** @var m4v */
    const M4V = "m4v";
    /** @var mkv */
    const MKV = "mkv";
    /** @var mov */
    const MOV = "mov";
    /** @var mp3 */
    const MP3 = "mp3";
    /** @var mp4 */
    const MP4 = "mp4";
    /** @var mpeg */
    const MPEG = "mpeg";
    /** @var mpegts */
    const MPEGTS = "mpegts";
    /** @var mxf */
    const MXF = "mxf";
    /** @var ogg */
    const OGG = "ogg";
    /** @var ogv */
    const OGV = "ogv";
    /** @var pdf */
    const PDF = "pdf";
    /** @var png */
    const PNG = "png";
    /** @var swf */
    const SWF = "swf";
    /** @var wav */
    const WAV = "wav";
    /** @var webm */
    const WEBM = "webm";
    /** @var wma */
    const WMA = "wma";
    /** @var wmv */
    const WMV = "wmv";
    /** @var wvm */
    const WVM = "wvm";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaContextType extends KalturaEnumBase {
    /** @var play */
    const PLAY = "1";
    /** @var download */
    const DOWNLOAD = "2";
    /** @var thumbnail */
    const THUMBNAIL = "3";
    /** @var metadata */
    const METADATA = "4";
    /** @var export */
    const EXPORT = "5";
    /** @var serve */
    const SERVE = "6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaControlPanelCommandOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = "1";
    /** @var enabled */
    const ENABLED = "2";
    /** @var deleted */
    const DELETED = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileType extends KalturaEnumBase {
    /** @var media */
    const MEDIA = "1";
    /** @var live stream */
    const LIVE_STREAM = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var pertner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by wight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiAppleHttpManifestOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHdsOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileAkamaiHttpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericAppleHttpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHdsOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericHttpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericRtmpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileGenericSilverLightOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileLiveAppleHttpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileRtmpOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileType extends KalturaEnumBase {
    /** @var edge cast http */
    const EDGE_CAST_HTTP = "edgeCast.EDGE_CAST_HTTP";
    /** @var edge cast rtmp */
    const EDGE_CAST_RTMP = "edgeCast.EDGE_CAST_RTMP";
    /** @var kontiki http */
    const KONTIKI_HTTP = "kontiki.KONTIKI_HTTP";
    /** @var velocix hds */
    const VELOCIX_HDS = "velocix.VELOCIX_HDS";
    /** @var velocix hls */
    const VELOCIX_HLS = "velocix.VELOCIX_HLS";
    /** @var apple http */
    const APPLE_HTTP = "1";
    /** @var hds */
    const HDS = "3";
    /** @var http */
    const HTTP = "4";
    /** @var rtmp */
    const RTMP = "5";
    /** @var rtsp */
    const RTSP = "6";
    /** @var silver light */
    const SILVER_LIGHT = "7";
    /** @var akamai hls direct */
    const AKAMAI_HLS_DIRECT = "10";
    /** @var akamai hls manifest */
    const AKAMAI_HLS_MANIFEST = "11";
    /** @var akamai hd */
    const AKAMAI_HD = "12";
    /** @var akamai hds */
    const AKAMAI_HDS = "13";
    /** @var akamai http */
    const AKAMAI_HTTP = "14";
    /** @var akamai rtmp */
    const AKAMAI_RTMP = "15";
    /** @var akamai rtsp */
    const AKAMAI_RTSP = "16";
    /** @var akamai sss */
    const AKAMAI_SS = "17";
    /** @var generic hls */
    const GENERIC_HLS = "21";
    /** @var generic hds */
    const GENERIC_HDS = "23";
    /** @var generic http */
    const GENERIC_HTTP = "24";
    /** @var generic hls manifest */
    const GENERIC_HLS_MANIFEST = "25";
    /** @var generic hds manifest */
    const GENERIC_HDS_MANIFEST = "26";
    /** @var generic ss */
    const GENERIC_SS = "27";
    /** @var generic rtmp */
    const GENERIC_RTMP = "28";
    /** @var level3 hls */
    const LEVEL3_HLS = "31";
    /** @var level3 http */
    const LEVEL3_HTTP = "34";
    /** @var level3 rtmp */
    const LEVEL3_RTMP = "35";
    /** @var limelight http */
    const LIMELIGHT_HTTP = "44";
    /** @var limelight rtmp */
    const LIMELIGHT_RTMP = "45";
    /** @var local path apple http */
    const LOCAL_PATH_APPLE_HTTP = "51";
    /** @var local path hds */
    const LOCAL_PATH_HDS = "53";
    /** @var local path http */
    const LOCAL_PATH_HTTP = "54";
    /** @var local path rtmp */
    const LOCAL_PATH_RTMP = "55";
    /** @var vod packager hls */
    const VOD_PACKAGER_HLS = "61";
    /** @var vod package hds */
    const VOD_PACKAGER_HDS = "63";
    /** @var vod packager mss */
    const VOD_PACKAGER_MSS = "67";
    /** @var vod pacjager dash */
    const VOD_PACKAGER_DASH = "68";
    /** @var vod packager hls manfest */
    const VOD_PACKAGER_HLS_MANIFEST = "69";
    /** @var live hls */
    const LIVE_HLS = "1001";
    /** @var live hds */
    const LIVE_HDS = "1002";
    /** @var live dash */
    const LIVE_DASH = "1003";
    /** @var live rtmp */
    const LIVE_RTMP = "1005";
    /** @var live hls 10 multicast */
    const LIVE_HLS_TO_MULTICAST = "1006";
    /** @var live packager hls */
    const LIVE_PACKAGER_HLS = "1007";
    /** @var live packager hds */
    const LIVE_PACKAGER_HDS = "1008";
    /** @var live packager dash */
    const LIVE_PACKAGER_DASH = "1009";
    /** @var live packager mss */
    const LIVE_PACKAGER_MSS = "1010";
    /** @var live akamai hds */
    const LIVE_AKAMAI_HDS = "1013";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryServerNodeOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by heartbeast time */
    const HEARTBEAT_TIME_ASC = "+heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by heartbeat time */
    const HEARTBEAT_TIME_DESC = "-heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var @artner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var conrol id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var reference entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmSchemeName extends KalturaEnumBase {
    /** @var playready cenc */
    const PLAYREADY_CENC = "drm.PLAYREADY_CENC";
    /** @var widevine cenc */
    const WIDEVINE_CENC = "drm.WIDEVINE_CENC";
    /** @var fairplay */
    const FAIRPLAY = "fairplay.FAIRPLAY";
    /** @var playready */
    const PLAYREADY = "playReady.PLAYREADY";
    /** @var widevine */
    const WIDEVINE = "widevine.WIDEVINE";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDurationType extends KalturaEnumBase {
    /** @var long */
    const LONG = "long";
    /** @var medium */
    const MEDIUM = "medium";
    /** @var not available */
    const NOT_AVAILABLE = "notavailable";
    /** @var short */
    const SHORT = "short";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaESearchLanguage extends KalturaEnumBase {
    /** @var arabic */
    const ARABIC = "Arabic";
    /** @var basque */
    const BASQUE = "Basque";
    /** @var brazilian */
    const BRAZILIAN = "Brazilian";
    /** @var bulgarian */
    const BULGARIAN = "Bulgarian";
    /** @var catalan */
    const CATALAN = "Catalan";
    /** @var chinese */
    const CHINESE = "Chinese";
    /** @var czech */
    const CZECH = "Czech";
    /** @var danish */
    const DANISH = "Danish";
    /** @var dutch */
    const DUTCH = "Dutch";
    /** @var english */
    const ENGLISH = "English";
    /** @var finish */
    const FINNISH = "Finnish";
    /** @var french */
    const FRENCH = "French";
    /** @var galician */
    const GALICIAN = "Galician";
    /** @var german */
    const GERMAN = "German";
    /** @var greek */
    const GREEK = "Greek";
    /** @var hindi */
    const HINDI = "Hindi";
    /** @var hungrian */
    const HUNGRIAN = "Hungarian";
    /** @var indonesian */
    const INDONESIAN = "Indonesian";
    /** @var italian */
    const ITALIAN = "Italian";
    /** @var japanese */
    const JAPANESE = "Japanese";
    /** @var korean */
    const KOREAN = "Korean";
    /** @var latvian */
    const LATVIAN = "Latvian";
    /** @var lithuanian */
    const LITHUANIAN = "Lithuanian";
    /** @var norwegian */
    const NORWEGIAN = "Norwegian";
    /** @var persian */
    const PERSIAN = "Persian";
    /** @var portuguese */
    const PORTUGUESE = "Prtuguese";
    /** @var romanian */
    const ROMANIAN = "Romanian";
    /** @var russian */
    const RUSSIAN = "Russian";
    /** @var sorani */
    const SORANI = "Sorani";
    /** @var spanish */
    const SPANISH = "Spanish";
    /** @var swedish */
    const SWEDISH = "Swedish";
    /** @var thai */
    const THAI = "Thai";
    /** @var turkish */
    const TURKISH = "Turkish";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEdgeServerNodeOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by hearbeat */
    const HEARTBEAT_TIME_ASC = "+heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by heartbeat */
    const HEARTBEAT_TIME_DESC = "-heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryIdentifierField extends KalturaEnumBase {
    /** @var id */
    const ID = "id";
    /** @var reference */
    const REFERENCE_ID = "referenceId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryReplacementStatus extends KalturaEnumBase {
    /** @var none */
    const NONE = "0";
    /** @var approved but not ready */
    const APPROVED_BUT_NOT_READY = "1";
    /** @var ready but not approved */
    const READY_BUT_NOT_APPROVED = "2";
    /** @var not ready and not approved */
    const NOT_READY_AND_NOT_APPROVED = "3";
    /** @var failed */
    const FAILED = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeType extends KalturaEnumBase {
    /** @var live primary */
    const LIVE_PRIMARY = "0";
    /** @var live backup */
    const LIVE_BACKUP = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryStatus extends KalturaEnumBase {
    /** @var error importing */
    const ERROR_IMPORTING = "-2";
    /** @var error converting */
    const ERROR_CONVERTING = "-1";
    /** @var scan failure */
    const SCAN_FAILURE = "virusScan.ScanFailure";
    /** @var import */
    const IMPORT = "0";
    /** @var infected */
    const INFECTED = "virusScan.Infected";
    /** @var preconvert */
    const PRECONVERT = "1";
    /** @var ready */
    const READY = "2";
    /** @var deleted */
    const DELETED = "3";
    /** @var pending */
    const PENDING = "4";
    /** @var moderate */
    const MODERATE = "5";
    /** @var blocked */
    const BLOCKED = "6";
    /** @var no content */
    const NO_CONTENT = "7";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryType extends KalturaEnumBase {
    /** @var automatic */
    const AUTOMATIC = "-1";
    /** @var external media */
    const EXTERNAL_MEDIA = "externalMedia.externalMedia";
    /** @var media clip */
    const MEDIA_CLIP = "1";
    /** @var mix */
    const MIX = "2";
    /** @var playlist */
    const PLAYLIST = "5";
    /** @var data */
    const DATA = "6";
    /** @var live stream */
    const LIVE_STREAM = "7";
    /** @var live channel */
    const LIVE_CHANNEL = "8";
    /** @var document */
    const DOCUMENT = "10";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media type */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var createtor id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var refeernce id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAssetObjectType extends KalturaEnumBase {
    /** @var ui conf */
    const UI_CONF = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAssetOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAssetStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = "0";
    /** @var uploading */
    const UPLOADING = "1";
    /** @var reay */
    const READY = "2";
    /** @var deleted */
    const DELETED = "3";
    /** @var error */
    const ERROR = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileSyncObjectType extends KalturaEnumBase {
    /** @var distribution profile */
    const DISTRIBUTION_PROFILE = "contentDistribution.DistributionProfile";
    /** @var entry distribution */
    const ENTRY_DISTRIBUTION = "contentDistribution.EntryDistribution";
    /** @var generic distribution action */
    const GENERIC_DISTRIBUTION_ACTION = "contentDistribution.GenericDistributionAction";
    /** @var email notification template */
    const EMAIL_NOTIFICATION_TEMPLATE = "emailNotification.EmailNotificationTemplate";
    /** @var http notification template */
    const HTTP_NOTIFICATION_TEMPLATE = "httpNotification.HttpNotificationTemplate";
    /** @var entry */
    const ENTRY = "1";
    /** @var uiconf */
    const UICONF = "2";
    /** @var batch job */
    const BATCHJOB = "3";
    /** @var asset */
    const ASSET = "4";
    /** @var flavor asset */
    const FLAVOR_ASSET = "4";
    /** @var metadata */
    const METADATA = "5";
    /** @var metadata profile */
    const METADATA_PROFILE = "6";
    /** @var syndication feed */
    const SYNDICATION_FEED = "7";
    /** @var conversion profile */
    const CONVERSION_PROFILE = "8";
    /** @var file asset */
    const FILE_ASSET = "9";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by deleted */
    const DELETED_AT_ASC = "+deletedAt";
    /** @var order by size */
    const SIZE_ASC = "+size";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by deleted */
    const DELETED_AT_DESC = "-deletedAt";
    /** @var order by size */
    const SIZE_DESC = "-size";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by bname */
    const NAME_ASC = "+name";
    /** @var order by playlist id */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGenericXsltSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by playlist */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGeoCoderType extends KalturaEnumBase {
    /** @var kaltura */
    const KALTURA = "1";
    /** @var max mind */
    const MAX_MIND = "2";
    /** @var digital element */
    const DIGITAL_ELEMENT = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGoogleSyndicationFeedAdultValues extends KalturaEnumBase {
    /** @var no */
    const NO = "No";
    /** @var yes */
    const YES = "Yes";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGoogleVideoSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by playlist */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUserOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeedAdultValues extends KalturaEnumBase {
    /** @var clean */
    const CLEAN = "clean";
    /** @var no */
    const NO = "no";
    /** @var yes */
    const YES = "yes";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeedCategories extends KalturaEnumBase {
    /** @var arts */
    const ARTS = "Arts";
    /** @var arts design */
    const ARTS_DESIGN = "Arts/Design";
    /** @var arts fashion beauty */
    const ARTS_FASHION_BEAUTY = "Arts/Fashion &amp; Beauty";
    /** @var arts food */
    const ARTS_FOOD = "Arts/Food";
    /** @var arts literature */
    const ARTS_LITERATURE = "Arts/Literature";
    /** @var arts pefroming  arts */
    const ARTS_PERFORMING_ARTS = "Arts/Performing Arts";
    /** @var arts visual arts */
    const ARTS_VISUAL_ARTS = "Arts/Visual Arts";
    /** @var business */
    const BUSINESS = "Business";
    /** @var business business news */
    const BUSINESS_BUSINESS_NEWS = "Business/Business News";
    /** @var business careers */
    const BUSINESS_CAREERS = "Business/Careers";
    /** @var business investing */
    const BUSINESS_INVESTING = "Business/Investing";
    /** @var business management marketing */
    const BUSINESS_MANAGEMENT_MARKETING = "Business/Management &amp; Marketing";
    /** @var business shopping */
    const BUSINESS_SHOPPING = "Business/Shopping";
    /** @var comedy */
    const COMEDY = "Comedy";
    /** @var education */
    const EDUCATION = "Education";
    /** @var education technology */
    const EDUCATION_TECHNOLOGY = "Education/Education Technology";
    /** @var education higher education */
    const EDUCATION_HIGHER_EDUCATION = "Education/Higher Education";
    /** @var education k 12 */
    const EDUCATION_K_12 = "Education/K-12";
    /** @var education language course */
    const EDUCATION_LANGUAGE_COURSES = "Education/Language Courses";
    /** @var education training */
    const EDUCATION_TRAINING = "Education/Training";
    /** @var games hobbies */
    const GAMES_HOBBIES = "Games &amp; Hobbies";
    /** @var game hobbies automorive */
    const GAMES_HOBBIES_AUTOMOTIVE = "Games &amp; Hobbies/Automotive";
    /** @var game hobbies aviation */
    const GAMES_HOBBIES_AVIATION = "Games &amp; Hobbies/Aviation";
    /** @var games hobbies hobbies */
    const GAMES_HOBBIES_HOBBIES = "Games &amp; Hobbies/Hobbies";
    /** @var games hobbies other games */
    const GAMES_HOBBIES_OTHER_GAMES = "Games &amp; Hobbies/Other Games";
    /** @var games hobbies video games */
    const GAMES_HOBBIES_VIDEO_GAMES = "Games &amp; Hobbies/Video Games";
    /** @var government organizations */
    const GOVERNMENT_ORGANIZATIONS = "Government &amp; Organizations";
    /** @var government organizations local */
    const GOVERNMENT_ORGANIZATIONS_LOCAL = "Government &amp; Organizations/Local";
    /** @var government organizations national */
    const GOVERNMENT_ORGANIZATIONS_NATIONAL = "Government &amp; Organizations/National";
    /** @var government organizations non profit */
    const GOVERNMENT_ORGANIZATIONS_NON_PROFIT = "Government &amp; Organizations/Non-Profit";
    /** @var government organizations regional */
    const GOVERNMENT_ORGANIZATIONS_REGIONAL = "Government &amp; Organizations/Regional";
    /** @var health */
    const HEALTH = "Health";
    /** @var health alternative health */
    const HEALTH_ALTERNATIVE_HEALTH = "Health/Alternative Health";
    /** @var health fitness nutrition */
    const HEALTH_FITNESS_NUTRITION = "Health/Fitness &amp; Nutrition";
    /** @var health self help */
    const HEALTH_SELF_HELP = "Health/Self-Help";
    /** @var health sexuality */
    const HEALTH_SEXUALITY = "Health/Sexuality";
    /** @var kids family */
    const KIDS_FAMILY = "Kids &amp; Family";
    /** @var music */
    const MUSIC = "Music";
    /** @var news politics */
    const NEWS_POLITICS = "News &amp; Politics";
    /** @var religion spirituality */
    const RELIGION_SPIRITUALITY = "Religion &amp; Spirituality";
    /** @var religion spirituality buddhism */
    const RELIGION_SPIRITUALITY_BUDDHISM = "Religion &amp; Spirituality/Buddhism";
    /** @var relgion spirituality christianity */
    const RELIGION_SPIRITUALITY_CHRISTIANITY = "Religion &amp; Spirituality/Christianity";
    /** @var relgion spirituality hinduism */
    const RELIGION_SPIRITUALITY_HINDUISM = "Religion &amp; Spirituality/Hinduism";
    /** @var relgion spirituality islam */
    const RELIGION_SPIRITUALITY_ISLAM = "Religion &amp; Spirituality/Islam";
    /** @var relgion spirituality judaism */
    const RELIGION_SPIRITUALITY_JUDAISM = "Religion &amp; Spirituality/Judaism";
    /** @var relgion spirituality other */
    const RELIGION_SPIRITUALITY_OTHER = "Religion &amp; Spirituality/Other";
    /** @var relgion spirituality spirituality */
    const RELIGION_SPIRITUALITY_SPIRITUALITY = "Religion &amp; Spirituality/Spirituality";
    /** @var science medicine */
    const SCIENCE_MEDICINE = "Science &amp; Medicine";
    /** @var science medicine medicine */
    const SCIENCE_MEDICINE_MEDICINE = "Science &amp; Medicine/Medicine";
    /** @var science medicine natural sciences */
    const SCIENCE_MEDICINE_NATURAL_SCIENCES = "Science &amp; Medicine/Natural Sciences";
    /** @var science medicine social sciences */
    const SCIENCE_MEDICINE_SOCIAL_SCIENCES = "Science &amp; Medicine/Social Sciences";
    /** @var society culture */
    const SOCIETY_CULTURE = "Society &amp; Culture";
    /** @var society culture history */
    const SOCIETY_CULTURE_HISTORY = "Society &amp; Culture/History";
    /** @var society culture personal journals */
    const SOCIETY_CULTURE_PERSONAL_JOURNALS = "Society &amp; Culture/Personal Journals";
    /** @var society culture philosophy */
    const SOCIETY_CULTURE_PHILOSOPHY = "Society &amp; Culture/Philosophy";
    /** @var society culture places travel */
    const SOCIETY_CULTURE_PLACES_TRAVEL = "Society &amp; Culture/Places &amp; Travel";
    /** @var sports recreation */
    const SPORTS_RECREATION = "Sports &amp; Recreation";
    /** @var sports recreation amateur */
    const SPORTS_RECREATION_AMATEUR = "Sports &amp; Recreation/Amateur";
    /** @var sports recreation college high school */
    const SPORTS_RECREATION_COLLEGE_HIGH_SCHOOL = "Sports &amp; Recreation/College &amp; High School";
    /** @var sports recreation outdoor */
    const SPORTS_RECREATION_OUTDOOR = "Sports &amp; Recreation/Outdoor";
    /** @var sports recreation */
    const SPORTS_RECREATION_PROFESSIONAL = "Sports &amp; Recreation/Professional";
    /** @var tv film */
    const TV_FILM = "TV &amp; Film";
    /** @var technology */
    const TECHNOLOGY = "Technology";
    /** @var technology gadgets */
    const TECHNOLOGY_GADGETS = "Technology/Gadgets";
    /** @var technology podcasting */
    const TECHNOLOGY_PODCASTING = "Technology/Podcasting";
    /** @var technology software how to */
    const TECHNOLOGY_SOFTWARE_HOW_TO = "Technology/Software How-To";
    /** @var technology tech news */
    const TECHNOLOGY_TECH_NEWS = "Technology/Tech News";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaITunesSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by id */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLanguage extends KalturaEnumBase {
    /** @var abaza */
    const ABQ = "Abaza";
    /** @var abkhazian */
    const AB = "Abkhazian";
    /** @var abnaki western */
    const ABE = "Abnaki Western";
    /** @var abure */
    const ABU = "Abure";
    /** @var achang */
    const ACN = "Achang";
    /** @var achinese */
    const ACE = "Achinese";
    /** @var achterhooks */
    const ACT = "Achterhooks";
    /** @var achumawi */
    const ACV = "Achumawi";
    /** @var adjoukrou */
    const ADJ = "Adioukrou";
    /** @var adyghe adygei */
    const ADY = "Adyghe; Adygei";
    /** @var adynyamathanha */
    const ADT = "Adynyamathanha";
    /** @var afade */
    const AAL = "Afade";
    /** @var afar */
    const AA = "Afar";
    /** @var afrikaans */
    const AF = "Afrikaans";
    /** @var aghem */
    const AGQ = "Aghem";
    /** @var aghul */
    const AGX = "Aghul";
    /** @var aguacateco */
    const AGU = "Aguacateco";
    /** @var aguaruna */
    const AGR = "Aguaruna";
    /** @var ainu */
    const AIN = "Ainu (Japan)";
    /** @var akkadian */
    const AKK = "Akkadian";
    /** @var aklaon */
    const AKL = "Aklanon";
    /** @var akum */
    const AKU = "Akum";
    /** @var alabama */
    const AKZ = "Alabama";
    /** @var albanian */
    const SQ = "Albanian";
    /** @var albanian */
    const ALN = "Albanian (Gheg)";
    /** @var albanian */
    const ALS = "Albanian (Tosk)";
    /** @var aleut */
    const ALE = "Aleut";
    /** @var alq */
    const ALQ = "Algonquin";
    /** @var alt */
    const ALT = "Altai (Southern)";
    /** @var am */
    const AM = "Amharic";
    /** @var rme */
    const RME = "Angloromani";
    /** @var apj */
    const APJ = "Apache (Jicarilla)";
    /** @var apw */
    const APW = "Apache (Western)";
    /** @var ar */
    const AR = "Arabic";
    /** @var arb */
    const ARB = "Arabic (standard)";
    /** @var arabic tunisian spoken */
    const B_T = "Arabic Tunisian Spoken";
    /** @var aramaic */
    const ARC = "Aramaic";
    /** @var aramaic samaritan */
    const SAM = "Aramaic Samaritan";
    /** @var arapaho */
    const ARP = "Arapaho";
    /** @var araucanian */
    const ARN = "Araucanian";
    /** @var arikara */
    const ARI = "Arikara";
    /** @var armenian */
    const HY = "Armenian";
    /** @var aromanian */
    const RUP = "Aromanian";
    /** @var assamse */
    const AS_ = "Assamese";
    /** @var assiniboine */
    const ASB = "Assiniboine";
    /** @var assyrian neo-aramaic */
    const AII = "Assyrian Neo-Aramaic";
    /** @var asturian */
    const AST = "Asturian";
    /** @var atikamekw */
    const ATJ = "Atikamekw";
    /** @var awadhi */
    const AWA = "Awadhi";
    /** @var aymara */
    const AY = "Aymara";
    /** @var azerbaijani */
    const AZ = "Azerbaijani";
    /** @var babine */
    const BCR = "Babine";
    /** @var badaga */
    const BFQ = "Badaga";
    /** @var bai */
    const BDJ = "Bai";
    /** @var balinese */
    const BAN = "Balinese";
    /** @var bakochi southern */
    const BCC = "Balochi Southern";
    /** @var balti */
    const BFT = "Balti";
    /** @var baluchi */
    const BAL = "Baluchi";
    /** @var basa */
    const BAS = "Basa (Cameroon)";
    /** @var bashkir */
    const BA = "Bashkir";
    /** @var basque */
    const EU = "Basque";
    /** @var bararian */
    const BAR = "Bavarian";
    /** @var beaver */
    const BEA = "Beaver";
    /** @var beja */
    const BEJ = "Beja";
    /** @var bemba */
    const BEM = "Bemba (Zambia)";
    /** @var bengali */
    const BN = "Bengali (Bangla)";
    /** @var betwai */
    const BEW = "Betawi";
    /** @var bezhta */
    const KAP = "Bezhta";
    /** @var bhili */
    const BHB = "Bhili";
    /** @var bhojpuri */
    const BHO = "Bhojpuri";
    /** @var bhutani */
    const DZ = "Bhutani";
    /** @var bihari */
    const BH = "Bihari";
    /** @var bikol */
    const BIK = "Bikol";
    /** @var bini */
    const BIN = "Bini";
    /** @var bishnupriya manuipuri */
    const BPY = "Bishnupriya Manipuri";
    /** @var bislama */
    const BI = "Bislama";
    /** @var breton */
    const BR = "Breton";
    /** @var buginese */
    const BUG = "Buginese";
    /** @var bulgarian */
    const BG = "Bulgarian";
    /** @var buriat */
    const BUA = "Buriat";
    /** @var burmese */
    const MY = "Burmese";
    /** @var byelorussian */
    const BE = "Byelorussian (Belarusian)";
    /** @var caddo */
    const CAD = "Caddo";
    /** @var cambodian */
    const KM = "Cambodian";
    /** @var cantonese */
    const YUE = "Cantonese";
    /** @var carrier */
    const CRX = "Carrier";
    /** @var carrier */
    const CAF = "Carrier Southern";
    /** @var catalan */
    const CA = "Catalan";
    /** @var catawba */
    const CHC = "Catawba";
    /** @var cayuga */
    const CAY = "Cayuga";
    /** @var cebuano */
    const CEB = "Cebuano";
    /** @var chagatai */
    const CHG = "Chagatai";
    /** @var chaldean */
    const CLD = "Chaldean Neo-Aramaic";
    /** @var cherokee */
    const CHR = "Cherokee";
    /** @var cheyenne */
    const CHY = "Cheyenne";
    /** @var chickasaw */
    const CIC = "Chickasaw";
    /** @var chilcotin */
    const CLC = "Chilcotin";
    /** @var chinese */
    const ZH = "Chinese";
    /** @var chinook jargon */
    const CHN = "Chinook jargon";
    /** @var chipeyan */
    const CHP = "Chipewyan";
    /** @var chippewa */
    const CIW = "Chippewa";
    /** @var choctaw */
    const CHO = "Choctaw";
    /** @var chor */
    const CAA = "Chor";
    /** @var chukot */
    const CKT = "Chukot";
    /** @var cimbrian */
    const CIM = "Cimbrian";
    /** @var clallam klallam */
    const CLM = "Clallam Klallam";
    /** @var chochimi */
    const COJ = "Cochimi";
    /** @var cocopa */
    const COC = "Cocopa";
    /** @var colgnian */
    const KSH = "Colognian";
    /** @var comanche */
    const COM = "Comanche";
    /** @var comorian */
    const SWB = "Comorian";
    /** @var comox */
    const COO = "Comox";
    /** @var coptic */
    const COP = "Coptic";
    /** @var corsican */
    const CO = "Corsican";
    /** @var creek */
    const MUS = "Creek";
    /** @var crimean tatar */
    const CRH = "Crimean Tatar";
    /** @var croatian */
    const HR = "Croatian";
    /** @var cupeo */
    const CUP = "Cupeo";
    /** @var czech */
    const CS = "Czech";
    /** @var dakota */
    const DAK = "Dakota";
    /** @var danish */
    const DA = "Danish";
    /** @var dargawa */
    const DAR = "Dargwa";
    /** @var dari */
    const PRD = "Dari (Persian)";
    /** @var dari */
    const GBZ = "Dari Zoroastrian";
    /** @var dehu */
    const DHV = "Dehu";
    /** @var delaware */
    const DEL = "Delaware";
    /** @var dinka */
    const DIN = "Dinka";
    /** @var dogri */
    const DOI = "Dogri (generic)";
    /** @var dogrib */
    const DGR = "Dogrib";
    /** @var dolgan */
    const DLG = "Dolgan";
    /** @var dong */
    const DOH = "Dong";
    /** @var duala */
    const DUA = "Duala";
    /** @var dungan */
    const DNG = "Dungan";
    /** @var dutch */
    const NL = "Dutch";
    /** @var dyula */
    const DYU = "Dyula";
    /** @var e */
    const EEE = "E";
    /** @var emillian */
    const EGL = "Emilian";
    /** @var english */
    const EN = "English";
    /** @var english */
    const EN_US = "English (American)";
    /** @var english */
    const EN_GB = "English (British)";
    /** @var english */
    const ENM = "English Middle (1100-1500)";
    /** @var ezyra */
    const MYV = "Erzya";
    /** @var eseperanto */
    const EO = "Esperanto";
    /** @var estonian */
    const ET = "Estonian";
    /** @var even */
    const EVE = "Even";
    /** @var evenki */
    const EVN = "Evenki";
    /** @var faeroese */
    const FO = "Faeroese";
    /** @var fala */
    const FAX = "Fala";
    /** @var fang */
    const FAN = "Fang (Equatorial Guinea)";
    /** @var farsi */
    const FA = "Farsi";
    /** @var fiji */
    const FJ = "Fiji";
    /** @var filipino */
    const FIL = "Filipino";
    /** @var finnish */
    const FI = "Finnish";
    /** @var finnish */
    const FIT = "Finnish (Tornedalen)";
    /** @var fon */
    const FON = "Fon";
    /** @var franco-prove */
    const FRP = "Franco-Prove";
    /** @var frankish */
    const FRK = "Frankish";
    /** @var french */
    const FR = "French";
    /** @var frisian */
    const FY = "Frisian";
    /** @var frisian northern */
    const FRR = "Frisian Northern";
    /** @var friulian */
    const FUR = "Friulian";
    /** @var fur */
    const FVR = "Fur";
    /** @var ga */
    const GAA = "Ga";
    /** @var gaelic */
    const GV = "Gaelic (Manx)";
    /** @var faelic */
    const GD = "Gaelic (Scottish)";
    /** @var gagauz */
    const GAG = "Gagauz";
    /** @var galician */
    const GL = "Galician";
    /** @var gan */
    const GAN = "Gan";
    /** @var geez */
    const GEZ = "Geez";
    /** @var georgian */
    const KA = "Georgian";
    /** @var german */
    const DE = "German";
    /** @var german hutterite */
    const GEH = "German Hutterite";
    /** @var german pennsylvania */
    const PDC = "German Pennsylvania";
    /** @var gilbertese */
    const GIL = "Gilbertese";
    /** @var gilyak nivkh */
    const NIV = "Gilyak Nivkh";
    /** @var gitxsan */
    const GIT = "Gitxsan";
    /** @var greek */
    const EL = "Greek";
    /** @var greek */
    const GRC = "Greek Ancient (to 1453)";
    /** @var greenlandic */
    const KL = "Greenlandic";
    /** @var guariani */
    const GN = "Guarani";
    /** @var gujarati */
    const GU = "Gujarati";
    /** @var gwichin */
    const GWI = "Gwichin";
    /** @var haida */
    const HAI = "Haida";
    /** @var hainanese */
    const HNN = "Hainanese";
    /** @var haisla */
    const HAS = "Haisla";
    /** @var hakka */
    const HAK = "Hakka";
    /** @var halkomelem */
    const HUR = "Halkomelem";
    /** @var han */
    const HAA = "Han";
    /** @var hanji */
    const HNI = "Hani";
    /** @var hausa */
    const HA = "Hausa";
    /** @var hawaiian */
    const HAW = "Hawaiian";
    /** @var hebrew */
    const HE = "Hebrew";
    /** @var hebrew */
    const IW = "Hebrew";
    /** @var heiltsuk */
    const HEI = "Heiltsuk";
    /** @var hidatsa */
    const HID = "Hidatsa";
    /** @var hiligynon */
    const HIL = "Hiligaynon";
    /** @var hindi */
    const HI = "Hindi";
    /** @var hmong */
    const HMN = "Hmong";
    /** @var hokkien */
    const HKK = "Hokkien";
    /** @var hopi */
    const HOP = "Hopi";
    /** @var huizhou */
    const CZH = "Huizhou Chinese";
    /** @var hungarian */
    const HU = "Hungarian";
    /** @var icelandic */
    const IS = "Icelandic";
    /** @var ikposo */
    const KPO = "Ikposo";
    /** @var iloko */
    const ILO = "Iloko";
    /** @var inari sami */
    const SMN = "Inari Sami";
    /** @var indonesian */
    const IN = "Indonesian";
    /** @var indonesian */
    const ID = "Indonesian";
    /** @var ingrian */
    const IZH = "Ingrian";
    /** @var ingush */
    const INH = "Ingush";
    /** @var interlingua */
    const IA = "Interlingua";
    /** @var interlingue */
    const IE = "Interlingue";
    /** @var inuktitut */
    const IU = "Inuktitut";
    /** @var inupiak */
    const IK = "Inupiak";
    /** @var irish */
    const GA = "Irish";
    /** @var italian */
    const IT = "Italian";
    /** @var itelmen */
    const ITL = "Itelmen";
    /** @var japanese */
    const JA = "Japanese";
    /** @var japanese */
    const JV = "Javanese";
    /** @var jinyu chinese */
    const CJY = "Jinyu Chinese";
    /** @var jju */
    const KAJ = "Jju";
    /** @var judeo-crimean tatar */
    const JCT = "Judeo-Crimean Tatar";
    /** @var judeo-georgian */
    const JGE = "Judeo-Georgian";
    /** @var jutish */
    const JUT = "Jutish";
    /** @var kadardian */
    const KBD = "Kabardian";
    /** @var kabuverdianu */
    const KEA = "Kabuverdianu";
    /** @var kabyle */
    const KAB = "Kabyle";
    /** @var kachichi */
    const KFR = "Kachchi";
    /** @var kajkavian */
    const KJV = "Kaikavian literary language (Kajkavian)";
    /** @var kalmyk oirat */
    const XAL = "Kalmyk Oirat";
    /** @var kannada */
    const KN = "Kannada";
    /** @var kansa */
    const KSK = "Kansa";
    /** @var karachay-balkar */
    const KRC = "Karachay-Balkar";
    /** @var karagas */
    const KIM = "Karagas";
    /** @var karaim */
    const KDR = "Karaim";
    /** @var karakalpak */
    const KAA = "Karakalpak";
    /** @var karelian */
    const KRL = "Karelian";
    /** @var kashmiri */
    const KS = "Kashmiri";
    /** @var kashubian */
    const CSB = "Kashubian";
    /** @var kaska */
    const KKZ = "Kaska";
    /** @var kawi */
    const KAW = "Kawi";
    /** @var kazakh */
    const KK = "Kazakh";
    /** @var khakas */
    const KJH = "Khakas";
    /** @var khakaj trukic */
    const KLJ = "Khalaj Turkic";
    /** @var khanty */
    const KCA = "Khanty";
    /** @var khasi */
    const KHA = "Khasi";
    /** @var khmeri horthern */
    const KXM = "Khmer Northern";
    /** @var kicjapoo */
    const KIC = "Kickapoo";
    /** @var runada */
    const RW = "Kinyarwanda (Ruanda)";
    /** @var kiowa */
    const KIO = "Kiowa";
    /** @var krighiz */
    const KY = "Kirghiz";
    /** @var kirundi */
    const RN = "Kirundi (Rundi)";
    /** @var klingon tlhIngan-Hol */
    const TLH = "Klingon tlhIngan-Hol";
    /** @var kodava */
    const KFA = "Kodava";
    /** @var komi-permyak */
    const KOI = "Komi-Permyak";
    /** @var *konkani */
    const KOK = "Konkani (generic)";
    /** @var konkani */
    const KNN = "Konkani (specific)";
    /** @var konkani */
    const GOM = "Konkani Goan";
    /** @var korean */
    const KO = "Korean";
    /** @var koryak */
    const KPY = "Koryak";
    /** @var kosraean */
    const KOS = "Kosraean";
    /** @var kotava */
    const AVK = "Kotava";
    /** @var kpella */
    const KPE = "Kpelle";
    /** @var kumiai */
    const DIH = "Kumiai";
    /** @var kumyk */
    const KUM = "Kumyk";
    /** @var kurdish */
    const KU = "Kurdish";
    /** @var kutenai */
    const KUT = "Kutenai";
    /** @var kwakiutil */
    const KWK = "Kwakiutl";
    /** @var laal */
    const GDM = "Laal";
    /** @var ladin */
    const LLD = "Ladin";
    /** @var ladino */
    const LAD = "Ladino";
    /** @var lahnda */
    const LAH = "Lahnda";
    /** @var lahu */
    const LHU = "Lahu";
    /** @var lak */
    const LBE = "Lak";
    /** @var laki */
    const LKI = "Laki";
    /** @var lakota */
    const LKT = "Lakota";
    /** @var laothian */
    const LO = "Laothian";
    /** @var latin */
    const LA = "Latin";
    /** @var latvian */
    const LV = "Latvian (Lettish)";
    /** @var laz */
    const LZZ = "Laz";
    /** @var lezghian */
    const LEZ = "Lezghian";
    /** @var ligurian */
    const LIJ = "Ligurian";
    /** @var lillooet */
    const LIL = "Lillooet";
    /** @var limbu */
    const LIF = "Limbu";
    /** @var limburgish */
    const LI = "Limburgish ( Limburger)";
    /** @var lingala */
    const LN = "Lingala";
    /** @var lithuanian */
    const LT = "Lithuanian";
    /** @var lojban */
    const JBO = "Lojban";
    /** @var loma */
    const LOM = "Loma (Liberia)";
    /** @var lombard */
    const LMO = "Lombard";
    /** @var low german */
    const NDS = "Low German Low Saxon";
    /** @var lozi */
    const LOZ = "Lozi";
    /** @var luba-lulua */
    const LUA = "Luba-Lulua";
    /** @var lucumi */
    const LUQ = "Lucumi";
    /** @var ludian */
    const LUD = "Ludian";
    /** @var lule sami */
    const SMJ = "Lule Sami";
    /** @var lunda */
    const LUN = "Lunda";
    /** @var luo */
    const LUO = "Luo (Kenya and Tanzania)";
    /** @var lushootseed */
    const LUT = "Lushootseed";
    /** @var macedonian */
    const MK = "Macedonian";
    /** @var madurese */
    const MAD = "Madurese";
    /** @var magahi */
    const MAG = "Magahi";
    /** @var maithili */
    const MAI = "Maithili";
    /** @var malagasy */
    const MG = "Malagasy";
    /** @var malay */
    const MS = "Malay";
    /** @var malayalam */
    const ML = "Malayalam";
    /** @var malectie-passamaquoddy */
    const PQM = "Malecite-Passamaquoddy";
    /** @var maltese */
    const MT = "Maltese";
    /** @var manchu */
    const MNC = "Manchu";
    /** @var mandaic */
    const MID = "Mandaic";
    /** @var mandan */
    const MHQ = "Mandan";
    /** @var mandarin chinese */
    const CMN = "Mandarin Chinese";
    /** @var mansi */
    const MNS = "Mansi";
    /** @var maori */
    const MI = "Maori";
    /** @var maranao */
    const MRW = "Maranao";
    /** @var marathi */
    const MR = "Marathi";
    /** @var mari */
    const CHM = "Mari (Russia)";
    /** @var marwari */
    const MWR = "Marwari";
    /** @var masai */
    const MAS = "Masai";
    /** @var mayo */
    const MFY = "Mayo";
    /** @var meitei */
    const MNI = "Meitei";
    /** @var mende */
    const MEN = "Mende (Sierra Leone)";
    /** @var manominee */
    const MEZ = "Menominee";
    /** @var micmac */
    const MIC = "Micmac";
    /** @var min bei chinese */
    const MNP = "Min Bei Chinese";
    /** @var min dong chinese */
    const CDO = "Min Dong Chinese";
    /** @var minangkabau */
    const MIN = "Minangkabau";
    /** @var mingrelian */
    const XMF = "Mingrelian";
    /** @var mirandese */
    const MWL = "Mirandese";
    /** @var mohawk */
    const MOH = "Mohawk";
    /** @var moksha */
    const MDF = "Moksha";
    /** @var moldavian */
    const MO = "Moldavian";
    /** @var mongolian */
    const MN = "Mongolian";
    /** @var morisyen */
    const MFE = "Morisyen";
    /** @var mossi */
    const MOS = "Mossi";
    /** @var mozarabic */
    const MXI = "Mozarabic";
    /** @var multilingual */
    const MU = "Multilingual";
    /** @var muong */
    const MTQ = "Muong";
    /** @var nama */
    const NAQ = "Nama (Namibia)";
    /** @var nanai */
    const GLD = "Nanai";
    /** @var naskapi */
    const NSK = "Naskapi";
    /** @var nauru */
    const NA = "Nauru";
    /** @var neapolitan */
    const NAP = "Neapolitan";
    /** @var nepali */
    const NE = "Nepali";
    /** @var newari nepal bhasa */
    const NEW_ = "Newari Nepal Bhasa";
    /** @var nganasan */
    const NIO = "Nganasan";
    /** @var nisgaa */
    const NCG = "Nisgaa";
    /** @var niuean */
    const NIU = "Niuean";
    /** @var nogal */
    const NOG = "Nogai";
    /** @var norse old */
    const NON = "Norse Old";
    /** @var nothern sotho pedi sepedi */
    const NSO = "Northern Sotho Pedi Sepedi";
    /** @var norwegian */
    const NO = "Norwegian";
    /** @var novial */
    const NOV = "Novial";
    /** @var nyamwezi */
    const NYM = "Nyamwezi";
    /** @var nyoro */
    const NYO = "Nyoro";
    /** @var nyugah */
    const NYS = "Nyungah";
    /** @var occitan */
    const OC = "Occitan";
    /** @var ojigwa central */
    const OJC = "Ojibwa Central";
    /** @var ojibwa eastern */
    const OJG = "Ojibwa Eastern";
    /** @var ojibwa northwestern */
    const OJB = "Ojibwa Northwestern";
    /** @var ojibwa severn */
    const OJS = "Ojibwa Severn";
    /** @var ojibwa western */
    const OJW = "Ojibwa Western";
    /** @var okinawan central */
    const RYU = "Okinawan Central";
    /** @var old english */
    const ANG = "Old English";
    /** @var oneida */
    const ONE = "Oneida";
    /** @var onondaga */
    const ONO = "Onondaga";
    /** @var oriya */
    const OR_ = "Oriya";
    /** @var oromo */
    const OM = "Oromo (Afan, Galla)";
    /** @var ottawa */
    const OTW = "Ottawa";
    /** @var paipai */
    const PPI = "Paipai";
    /** @var palauan */
    const PAU = "Palauan";
    /** @var pamanga */
    const PAM = "Pampanga";
    /** @var pangasinan */
    const PAG = "Pangasinan";
    /** @var papiamento */
    const PAP = "Papiamento";
    /** @var pashto */
    const PS = "Pashto (Pushto)";
    /** @var persian */
    const PRP = "Persian";
    /** @var persian */
    const PRS = "Persian (Dari)";
    /** @var pfaelzisch */
    const PFL = "Pfaelzisch";
    /** @var picard */
    const PCD = "Picard";
    /** @var piedmontese */
    const PMS = "Piedmontese";
    /** @var pirah */
    const MYP = "Pirah";
    /** @var pitcairn-norfolk */
    const PIH = "Pitcairn-Norfolk";
    /** @var plautdietsch */
    const PDT = "Plautdietsch";
    /** @var polish */
    const PL = "Polish";
    /** @var pontic */
    const PNT = "Pontic";
    /** @var portuguese */
    const PT = "Portuguese";
    /** @var potawatomi */
    const POT = "Potawatomi";
    /** @var prussian */
    const PRG = "Prussian";
    /** @var pulaar */
    const FUC = "Pulaar";
    /** @var punjabi */
    const PA = "Punjabi";
    /** @var qashqai */
    const QXQ = "Qashqai";
    /** @var qawasqar */
    const ALC = "Qawasqar";
    /** @var quechua */
    const QU = "Quechua";
    /** @var quich central */
    const QUC = "Quich Central";
    /** @var raranui */
    const RAP = "Rapanui";
    /** @var rarotongan */
    const RAR = "Rarotongan";
    /** @var reserved */
    const QTZ = "Reserved for local use.";
    /** @var rhaeto-romance */
    const RM = "Rhaeto-Romance";
    /** @var romagnol */
    const RGN = "Romagnol";
    /** @var romani kalo finnish */
    const RMF = "Romani Kalo Finnish";
    /** @var romani sinte */
    const RMO = "Romani Sinte";
    /** @var romanian */
    const RO = "Romanian";
    /** @var romanian */
    const RUO = "Romanian Istro";
    /** @var romanian */
    const RUQ = "Romanian Megleno";
    /** @var romany */
    const ROM = "Romany";
    /** @var runion creole french */
    const RCF = "Runion Creole French";
    /** @var russian */
    const RU = "Russian";
    /** @var rusyn */
    const RUE = "Rusyn";
    /** @var saint lucian creole french */
    const ACF = "Saint Lucian Creole French";
    /** @var sakha */
    const SAH = "Sakha";
    /** @var salar */
    const SLR = "Salar";
    /** @var salish straits */
    const STR = "Salish Straits";
    /** @var sami kildin */
    const SJD = "Sami Kildin";
    /** @var samoan */
    const SM = "Samoan";
    /** @var sangro */
    const SG = "Sangro";
    /** @var sanskrit */
    const SA = "Sanskrit";
    /** @var santali */
    const SAT = "Santali";
    /** @var saramaccan */
    const SRM = "Saramaccan";
    /** @var sardinian sassarese */
    const SDC = "Sardinian Sassarese";
    /** @var saterland frisian */
    const STQ = "Saterland Frisian";
    /** @var saxon upper */
    const SXU = "Saxon Upper";
    /** @var scots */
    const SCO = "Scots";
    /** @var sechelt */
    const SEC = "Sechelt";
    /** @var seediq */
    const TRV = "Seediq";
    /** @var sekani */
    const SEK = "Sekani";
    /** @var selkup */
    const SEL = "Selkup";
    /** @var seneca */
    const SEE = "Seneca";
    /** @var serbian */
    const SR = "Serbian";
    /** @var serbo-croatian */
    const SH = "Serbo-Croatian";
    /** @var seri */
    const SEI = "Seri";
    /** @var sesotho */
    const ST = "Sesotho";
    /** @var setswana */
    const TN = "Setswana";
    /** @var shawnee */
    const SJW = "Shawnee";
    /** @var shona */
    const SN = "Shona";
    /** @var shor */
    const CJS = "Shor";
    /** @var shoshoni */
    const SHH = "Shoshoni";
    /** @var shuswap */
    const SHS = "Shuswap";
    /** @var sicilian */
    const SCN = "Sicilian";
    /** @var sidamo */
    const SID = "Sidamo";
    /** @var siliesian */
    const SZL = "Silesian";
    /** @var sindhi */
    const SD = "Sindhi";
    /** @var sinhalese */
    const SI = "Sinhalese";
    /** @var siswati */
    const SS = "Siswati";
    /** @var skolt sami */
    const SMS = "Skolt Sami";
    /** @var slavey north */
    const SCS = "Slavey North";
    /** @var slavey south */
    const XSL = "Slavey South";
    /** @var slovak */
    const SK = "Slovak";
    /** @var slovenian */
    const SL = "Slovenian";
    /** @var somali */
    const SO = "Somali";
    /** @var soninke */
    const SNK = "Soninke";
    /** @var sorbian lower */
    const DSB = "Sorbian Lower";
    /** @var sorbian upper */
    const HSB = "Sorbian Upper";
    /** @var southern sami */
    const SMA = "Southern Sami";
    /** @var spanish */
    const ES = "Spanish";
    /** @var sranan */
    const SRN = "Sranan";
    /** @var stoney */
    const STO = "Stoney";
    /** @var sudovian */
    const XSV = "Sudovian";
    /** @var sumerian */
    const SUX = "Sumerian";
    /** @var sundanese */
    const SU = "Sundanese";
    /** @var svan */
    const SVA = "Svan";
    /** @var swabian */
    const SWG = "Swabian";
    /** @var swahili */
    const SW = "Swahili (Kiswahili)";
    /** @var swedish */
    const SV = "Swedish";
    /** @var swedish */
    const SWL = "Swedish Sign Language";
    /** @var swiss german alemaniic alsatian */
    const GSW = "Swiss German Alemannic Alsatian";
    /** @var syriac */
    const SYR = "Syriac";
    /** @var tabassaran */
    const TAB = "Tabassaran";
    /** @var tachawit */
    const SHY = "Tachawit";
    /** @var tachelhit */
    const SHI = "Tachelhit";
    /** @var tagalog */
    const TL = "Tagalog";
    /** @var tabganwa */
    const TBW = "Tagbanwa";
    /** @var tagish */
    const TGX = "Tagish";
    /** @var tahltan */
    const THT = "Tahltan";
    /** @var tai na */
    const TDD = "Tai Na";
    /** @var tajik */
    const TG = "Tajik";
    /** @var talysh */
    const TLY = "Talysh";
    /** @var tamajaq tawallammat */
    const TTQ = "Tamajaq Tawallammat";
    /** @var tamasheq */
    const TAQ = "Tamasheq";
    /** @var tamazight central atlas */
    const TZM = "Tamazight Central Atlas";
    /** @var tamil */
    const TA = "Tamil";
    /** @var tarahumara central */
    const TAR = "Tarahumara Central";
    /** @var tat muslim */
    const TTT = "Tat Muslim";
    /** @var tatar */
    const TT = "Tatar";
    /** @var telugu */
    const TE = "Telugu";
    /** @var teo chew */
    const TEO = "Teo Chew";
    /** @var tetum */
    const TET = "Tetum";
    /** @var thai */
    const TH = "Thai";
    /** @var thai */
    const NOD = "Thai (Northern)";
    /** @var thai northeastern */
    const TTS = "Thai Northeastern";
    /** @var thompson */
    const THP = "Thompson";
    /** @var tibetan */
    const BO = "Tibetan";
    /** @var tigre */
    const TIG = "Tigre";
    /** @var tigrinya */
    const TI = "Tigrinya";
    /** @var tlingit */
    const TLI = "Tlingit";
    /** @var toda */
    const TCX = "Toda";
    /** @var tohono oodham */
    const OOD = "Tohono Oodham";
    /** @var tok pisin */
    const TPI = "Tok Pisin";
    /** @var tonga */
    const TO = "Tonga";
    /** @var tonga */
    const TOG = "Tonga (Nyasa)";
    /** @var */
    const DDO = "Tsez";
    /** @var tsimshian */
    const TSI = "Tsimshian";
    /** @var tsonga */
    const TS = "Tsonga";
    /** @var tulu */
    const TCY = "Tulu";
    /** @var tumbuka */
    const TUM = "Tumbuka";
    /** @var tumzabt */
    const MZB = "Tumzabt";
    /** @var tupinamb */
    const TPN = "Tupinamb";
    /** @var trkana */
    const TUV = "Turkana";
    /** @var turkish */
    const TR = "Turkish";
    /** @var turlish ottoman */
    const OTA = "Turkish Ottoman";
    /** @var turkmen */
    const TK = "Turkmen";
    /** @var tuscarora */
    const TUS = "Tuscarora";
    /** @var tuvalu */
    const TVL = "Tuvalu";
    /** @var tuvinian */
    const TYV = "Tuvinian";
    /** @var twi */
    const TW = "Twi";
    /** @var ubykh */
    const UBY = "Ubykh";
    /** @var udi */
    const UDI = "Udi";
    /** @var udmurt */
    const UDM = "Udmurt";
    /** @var uighur */
    const UG = "Uighur";
    /** @var ukrainian */
    const UK = "Ukrainian";
    /** @var undefined */
    const UN = "Undefined";
    /** @var urdu */
    const UR = "Urdu";
    /** @var urum */
    const UUM = "Urum";
    /** @var uzbek */
    const UZ = "Uzbek";
    /** @var venetian */
    const VEC = "Venetian";
    /** @var veps */
    const VEP = "Veps";
    /** @var vietnamese */
    const VI = "Vietnamese";
    /** @var volapuk */
    const VO = "Volapuk";
    /** @var voro */
    const VOR = "Voro";
    /** @var votic */
    const VOT = "Votic";
    /** @var vro */
    const VRO = "Vro";
    /** @var worani */
    const AUC = "Waorani";
    /** @var waray */
    const WAR = "Waray (Philippines)";
    /** @var welsh */
    const CY = "Welsh";
    /** @var western */
    const PES = "Western Farsi";
    /** @var western neo-aramic */
    const AMW = "Western Neo-Aramaic";
    /** @var wiyot */
    const WIY = "Wiyot";
    /** @var wolof */
    const WO = "Wolof";
    /** @var wu chinese */
    const WUU = "Wu Chinese";
    /** @var wymysorys */
    const WYM = "Wymysorys";
    /** @var xhosa */
    const XH = "Xhosa";
    /** @var yanesha */
    const AME = "Yanesha";
    /** @var yiddish */
    const YI = "Yiddish";
    /** @var yiddish */
    const JI = "Yiddish";
    /** @var yoruba */
    const YO = "Yoruba";
    /** @var zapotecc isthmus */
    const ZAI = "Zapotec Isthmus";
    /** @var zarma */
    const DJE = "Zarma";
    /** @var zulu */
    const ZU = "Zulu";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLanguageCode extends KalturaEnumBase {
    /** @var aa */
    const AA = "aa";
    /** @var ab */
    const AB = "ab";
    /** @var af */
    const AF = "af";
    /** @var am */
    const AM = "am";
    /** @var ar */
    const AR = "ar";
    /** @var as */
    const AS_ = "as";
    /** @var ay */
    const AY = "ay";
    /** @var az */
    const AZ = "az";
    /** @var ba */
    const BA = "ba";
    /** @var be */
    const BE = "be";
    /** @var bg */
    const BG = "bg";
    /** @var bh */
    const BH = "bh";
    /** @var bi */
    const BI = "bi";
    /** @var bn */
    const BN = "bn";
    /** @var bo */
    const BO = "bo";
    /** @var br */
    const BR = "br";
    /** @var ca */
    const CA = "ca";
    /** @var co */
    const CO = "co";
    /** @var cs */
    const CS = "cs";
    /** @var cy */
    const CY = "cy";
    /** @var da */
    const DA = "da";
    /** @var de */
    const DE = "de";
    /** @var dz */
    const DZ = "dz";
    /** @var el */
    const EL = "el";
    /** @var en */
    const EN = "en";
    /** @var en gb */
    const EN_GB = "en_gb";
    /** @var en us */
    const EN_US = "en_us";
    /** @var eo */
    const EO = "eo";
    /** @var es */
    const ES = "es";
    /** @var et */
    const ET = "et";
    /** @var eu */
    const EU = "eu";
    /** @var fa */
    const FA = "fa";
    /** @var fi */
    const FI = "fi";
    /** @var fj */
    const FJ = "fj";
    /** @var fo */
    const FO = "fo";
    /** @var fr */
    const FR = "fr";
    /** @var fy */
    const FY = "fy";
    /** @var ga */
    const GA = "ga";
    /** @var gd */
    const GD = "gd";
    /** @var gl */
    const GL = "gl";
    /** @var gn */
    const GN = "gn";
    /** @var gu */
    const GU = "gu";
    /** @var gv */
    const GV = "gv";
    /** @var ha */
    const HA = "ha";
    /** @var he */
    const HE = "he";
    /** @var hi */
    const HI = "hi";
    /** @var hr */
    const HR = "hr";
    /** @var hu */
    const HU = "hu";
    /** @var hy */
    const HY = "hy";
    /** @var ia */
    const IA = "ia";
    /** @var id */
    const ID = "id";
    /** @var ie */
    const IE = "ie";
    /** @var ik */
    const IK = "ik";
    /** @var in */
    const IN = "in";
    /** @var is */
    const IS = "is";
    /** @var it */
    const IT = "it";
    /** @var iu */
    const IU = "iu";
    /** @var iw */
    const IW = "iw";
    /** @var ja */
    const JA = "ja";
    /** @var ji */
    const JI = "ji";
    /** @var jv */
    const JV = "jv";
    /** @var ka */
    const KA = "ka";
    /** @var kk */
    const KK = "kk";
    /** @var kl */
    const KL = "kl";
    /** @var km */
    const KM = "km";
    /** @var kn */
    const KN = "kn";
    /** @var ko */
    const KO = "ko";
    /** @var ks */
    const KS = "ks";
    /** @var ku */
    const KU = "ku";
    /** @var ky */
    const KY = "ky";
    /** @var la */
    const LA = "la";
    /** @var li */
    const LI = "li";
    /** @var ln */
    const LN = "ln";
    /** @var lo */
    const LO = "lo";
    /** @var lt */
    const LT = "lt";
    /** @var lv */
    const LV = "lv";
    /** @var mg */
    const MG = "mg";
    /** @var mi */
    const MI = "mi";
    /** @var mk */
    const MK = "mk";
    /** @var ml */
    const ML = "ml";
    /** @var mn */
    const MN = "mn";
    /** @var mo */
    const MO = "mo";
    /** @var mr */
    const MR = "mr";
    /** @var ms */
    const MS = "ms";
    /** @var mt */
    const MT = "mt";
    /** @var multilingual */
    const MU = "multilingual";
    /** @var my */
    const MY = "my";
    /** @var na */
    const NA = "na";
    /** @var ne */
    const NE = "ne";
    /** @var nl */
    const NL = "nl";
    /** @var no */
    const NO = "no";
    /** @var oc */
    const OC = "oc";
    /** @var om */
    const OM = "om";
    /** @var or */
    const OR_ = "or";
    /** @var pa */
    const PA = "pa";
    /** @var pl */
    const PL = "pl";
    /** @var ps */
    const PS = "ps";
    /** @var pt */
    const PT = "pt";
    /** @var qu */
    const QU = "qu";
    /** @var rm */
    const RM = "rm";
    /** @var rn */
    const RN = "rn";
    /** @var ro */
    const RO = "ro";
    /** @var ru */
    const RU = "ru";
    /** @var rw */
    const RW = "rw";
    /** @var sa */
    const SA = "sa";
    /** @var sd */
    const SD = "sd";
    /** @var sg */
    const SG = "sg";
    /** @var sh */
    const SH = "sh";
    /** @var si */
    const SI = "si";
    /** @var sk */
    const SK = "sk";
    /** @var sl */
    const SL = "sl";
    /** @var sm */
    const SM = "sm";
    /** @var sn */
    const SN = "sn";
    /** @var so */
    const SO = "so";
    /** @var sq */
    const SQ = "sq";
    /** @var sr */
    const SR = "sr";
    /** @var ss */
    const SS = "ss";
    /** @var st */
    const ST = "st";
    /** @var su */
    const SU = "su";
    /** @var sv */
    const SV = "sv";
    /** @var sw */
    const SW = "sw";
    /** @var ta */
    const TA = "ta";
    /** @var te */
    const TE = "te";
    /** @var tg */
    const TG = "tg";
    /** @var th */
    const TH = "th";
    /** @var ti */
    const TI = "ti";
    /** @var tk */
    const TK = "tk";
    /** @var tl */
    const TL = "tl";
    /** @var tn */
    const TN = "tn";
    /** @var to */
    const TO = "to";
    /** @var tr */
    const TR = "tr";
    /** @var ts */
    const TS = "ts";
    /** @var tt */
    const TT = "tt";
    /** @var tw */
    const TW = "tw";
    /** @var ug */
    const UG = "ug";
    /** @var uk */
    const UK = "uk";
    /** @var ur */
    const UR = "ur";
    /** @var uz */
    const UZ = "uz";
    /** @var vi */
    const VI = "vi";
    /** @var vo */
    const VO = "vo";
    /** @var wo */
    const WO = "wo";
    /** @var xh */
    const XH = "xh";
    /** @var yi */
    const YI = "yi";
    /** @var yo */
    const YO = "yo";
    /** @var zh */
    const ZH = "zh";
    /** @var zu */
    const ZU = "zu";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveAssetOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by deleted */
    const DELETED_AT_ASC = "+deletedAt";
    /** @var order by size */
    const SIZE_ASC = "+size";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by deleted */
    const DELETED_AT_DESC = "-deletedAt";
    /** @var order by size */
    const SIZE_DESC = "-size";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelCompareAttribute extends KalturaEnumBase {
    /** @var access ctonrol id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media tyoe */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** ms duration */
    const MS_DURATION = "msDuration";
    /** partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var freference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replicing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by first broadcast */
    const FIRST_BROADCAST_ASC = "+firstBroadcast";
    /** @var order by last boadcast */
    const LAST_BROADCAST_ASC = "+lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by first boradcast */
    const FIRST_BROADCAST_DESC = "-firstBroadcast";
    /** @var order by last broadcast */
    const LAST_BROADCAST_DESC = "-lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by start time */
    const START_TIME_ASC = "+startTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by start time */
    const START_TIME_DESC = "-startTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = "2";
    /** @var deleted */
    const DELETED = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentTriggerType extends KalturaEnumBase {
    /** @var channel relative */
    const CHANNEL_RELATIVE = "1";
    /** @var absolute time */
    const ABSOLUTE_TIME = "2";
    /** @var segment start relative */
    const SEGMENT_START_RELATIVE = "3";
    /** @var segment end relative */
    const SEGMENT_END_RELATIVE = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentType extends KalturaEnumBase {
    /** @var video and audio */
    const VIDEO_AND_AUDIO = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media type */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by firsy broadcast*/
    const FIRST_BROADCAST_ASC = "+firstBroadcast";
    /** @var order by last broadcast */
    const LAST_BROADCAST_ASC = "+lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by first broadcast */
    const FIRST_BROADCAST_DESC = "-firstBroadcast";
    /** @var order by last broadcast */
    const LAST_BROADCAST_DESC = "-lastBroadcast";
    /** @var order by ;last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by srart date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportOrderBy extends KalturaEnumBase {
    /** @var name */
    const NAME_ASC = "+name";
    /** @var audience */
    const AUDIENCE_DESC = "-audience";
    /** @var event time */
    const EVENT_TIME_DESC = "-eventTime";
    /** @var plays */
    const PLAYS_DESC = "-plays";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportType extends KalturaEnumBase {
    /** @var entry geo time line */
    const ENTRY_GEO_TIME_LINE = "ENTRY_GEO_TIME_LINE";
    /** @var entry syndication total */
    const ENTRY_SYNDICATION_TOTAL = "ENTRY_SYNDICATION_TOTAL";
    /** @var entry time line */
    const ENTRY_TIME_LINE = "ENTRY_TIME_LINE";
    /** @var entry total */
    const ENTRY_TOTAL = "ENTRY_TOTAL";
    /** @var partner total */
    const PARTNER_TOTAL = "PARTNER_TOTAL";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media type */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamAdminEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by first broadcast */
    const FIRST_BROADCAST_ASC = "+firstBroadcast";
    /** @var order by last broadcast */
    const LAST_BROADCAST_ASC = "+lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by first broadcast */
    const FIRST_BROADCAST_DESC = "-firstBroadcast";
    /** @var order by last boradcast */
    const LAST_BROADCAST_DESC = "-lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by wight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media date */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by first boradcast */
    const FIRST_BROADCAST_ASC = "+firstBroadcast";
    /** @var order by last boradcast */
    const LAST_BROADCAST_ASC = "+lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by first broadcast */
    const FIRST_BROADCAST_DESC = "-firstBroadcast";
    /** @var order by last broadcast */
    const LAST_BROADCAST_DESC = "-lastBroadcast";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sor value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMailType extends KalturaEnumBase {
    /** @var mail type kaltura newsletter */
    const MAIL_TYPE_KALTURA_NEWSLETTER = "10";
    /** @var mail type added to favorites */
    const MAIL_TYPE_ADDED_TO_FAVORITES = "11";
    /** @var mail type added to clip favorites */
    const MAIL_TYPE_ADDED_TO_CLIP_FAVORITES = "12";
    /** @var mail type new comment in profile */
    const MAIL_TYPE_NEW_COMMENT_IN_PROFILE = "13";
    /** @var mail type clip added your kaltura */
    const MAIL_TYPE_CLIP_ADDED_YOUR_KALTURA = "20";
    /** @var mail type video added */
    const MAIL_TYPE_VIDEO_ADDED = "21";
    /** @var mail type roughcut created */
    const MAIL_TYPE_ROUGHCUT_CREATED = "22";
    /** @var mail type added kaltura to your favorites */
    const MAIL_TYPE_ADDED_KALTURA_TO_YOUR_FAVORITES = "23";
    /** @var mail type new comment in kaltura */
    const MAIL_TYPE_NEW_COMMENT_IN_KALTURA = "24";
    /** @var mail type clip added */
    const MAIL_TYPE_CLIP_ADDED = "30";
    /** @var mail type video created */
    const MAIL_TYPE_VIDEO_CREATED = "31";
    /** @var mail type added kaltura to his favorites */
    const MAIL_TYPE_ADDED_KALTURA_TO_HIS_FAVORITES = "32";
    /** @var mail type new comment in kaltura you contributed */
    const MAIL_TYPE_NEW_COMMENT_IN_KALTURA_YOU_CONTRIBUTED = "33";
    /** @var mail type clip contributed */
    const MAIL_TYPE_CLIP_CONTRIBUTED = "40";
    /** @var mail type roughcut created subscribed */
    const MAIL_TYPE_ROUGHCUT_CREATED_SUBSCRIBED = "41";
    /** @var mail type added kaltura to his favorites subscribed */
    const MAIL_TYPE_ADDED_KALTURA_TO_HIS_FAVORITES_SUBSCRIBED = "42";
    /** @var mail type new comment in kaltura you sbscribed */
    const MAIL_TYPE_NEW_COMMENT_IN_KALTURA_YOU_SUBSCRIBED = "43";
    /** @var mail type register confirm */
    const MAIL_TYPE_REGISTER_CONFIRM = "50";
    /** @var mail type password reset */
    const MAIL_TYPE_PASSWORD_RESET = "51";
    /** @var mail type login mail reset */
    const MAIL_TYPE_LOGIN_MAIL_RESET = "52";
    /** @var mail type register confirm video service */
    const MAIL_TYPE_REGISTER_CONFIRM_VIDEO_SERVICE = "54";
    /** @var mail type video ready */
    const MAIL_TYPE_VIDEO_READY = "60";
    /** @var mail type video is ready */
    const MAIL_TYPE_VIDEO_IS_READY = "62";
    /** @var mail type bulk download ready */
    const MAIL_TYPE_BULK_DOWNLOAD_READY = "63";
    /** @var mail type bulkupload finished */
    const MAIL_TYPE_BULKUPLOAD_FINISHED = "64";
    /** @var mail type bulkupload failed */
    const MAIL_TYPE_BULKUPLOAD_FAILED = "65";
    /** @var mail type bulkupload aborted */
    const MAIL_TYPE_BULKUPLOAD_ABORTED = "66";
    /** @var mail type notify err */
    const MAIL_TYPE_NOTIFY_ERR = "70";
    /** @var mail type account upgrade confirm */
    const MAIL_TYPE_ACCOUNT_UPGRADE_CONFIRM = "80";
    /** @var mail type video service notice */
    const MAIL_TYPE_VIDEO_SERVICE_NOTICE = "81";
    /** @var mail type video service notice limit reached */
    const MAIL_TYPE_VIDEO_SERVICE_NOTICE_LIMIT_REACHED = "82";
    /** @var mail type video service notice account locked */
    const MAIL_TYPE_VIDEO_SERVICE_NOTICE_ACCOUNT_LOCKED = "83";
    /** @var mail type video service notice account deleted */
    const MAIL_TYPE_VIDEO_SERVICE_NOTICE_ACCOUNT_DELETED = "84";
    /** @var mail type video service notice upgrade offer */
    const MAIL_TYPE_VIDEO_SERVICE_NOTICE_UPGRADE_OFFER = "85";
    /** @var mail type account reactive confirm */
    const MAIL_TYPE_ACCOUNT_REACTIVE_CONFIRM = "86";
    /** @var mail type system user reset password */
    const MAIL_TYPE_SYSTEM_USER_RESET_PASSWORD = "110";
    /** @var mail type system user reset password success */
    const MAIL_TYPE_SYSTEM_USER_RESET_PASSWORD_SUCCESS = "111";
    /** @var mail type system user new password */
    const MAIL_TYPE_SYSTEM_USER_NEW_PASSWORD = "112";
    /** @var mail type system user credentials saved */
    const MAIL_TYPE_SYSTEM_USER_CREDENTIALS_SAVED = "113";
    /** @var mail type live report export success */
    const MAIL_TYPE_LIVE_REPORT_EXPORT_SUCCESS = "130";
    /** @var mail type live report export failure */
    const MAIL_TYPE_LIVE_REPORT_EXPORT_FAILURE = "131";
    /** @var mail type live report export abort */
    const MAIL_TYPE_LIVE_REPORT_EXPORT_ABORT = "132";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMatchConditionType extends KalturaEnumBase {
    /** @var match any */
    const MATCH_ANY = "1";
    /** @var match all */
    const MATCH_ALL = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var media date */
    const MEDIA_DATE = "mediaDate";
    /** @var media type */
    const MEDIA_TYPE = "mediaType";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var flavor params ids */
    const FLAVOR_PARAMS_IDS = "flavorParamsIds";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaInfoOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaParserType extends KalturaEnumBase {
    /** @var mediainfo */
    const MEDIAINFO = "0";
    /** @var ffmpeg */
    const FFMPEG = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaServerNodeOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by heartbead time */
    const HEARTBEAT_TIME_ASC = "+heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by heartbead time */
    const HEARTBEAT_TIME_DESC = "-heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced enty id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by parnter sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationFlagStatus extends KalturaEnumBase {
    /** @var pending */
    const PENDING = "1";
    /** @var moderated */
    const MODERATED = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaModerationObjectType extends KalturaEnumBase {
    /** @var entry */
    const ENTRY = "2";
    /** @var user */
    const USER = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerOrderBy extends KalturaEnumBase {
    /** @var order by admin email */
    const ADMIN_EMAIL_ASC = "+adminEmail";
    /** @var order by admin name */
    const ADMIN_NAME_ASC = "+adminName";
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by status */
    const STATUS_ASC = "+status";
    /** @var order by website */
    const WEBSITE_ASC = "+website";
    /** @var order by admin email */
    const ADMIN_EMAIL_DESC = "-adminEmail";
    /** @var order by admin name */
    const ADMIN_NAME_DESC = "-adminName";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by status */
    const STATUS_DESC = "-status";
    /** @var order by website */
    const WEBSITE_DESC = "-website";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemType extends KalturaEnumBase {
    /** @var api action item */
    const API_ACTION_ITEM = "kApiActionPermissionItem";
    /** @var api parameter item */
    const API_PARAMETER_ITEM = "kApiParameterPermissionItem";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var last played */
    const LAST_PLAYED_AT = "lastPlayedAt";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var ms duration */
    const MS_DURATION = "msDuration";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var plays */
    const PLAYS = "plays";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
    /** @var views */
    const VIEWS = "views";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var duration type */
    const DURATION_TYPE = "durationType";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayableEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaybackProtocol extends KalturaEnumBase {
    /** @var apple http */
    const APPLE_HTTP = "applehttp";
    /** @var apple http to mc */
    const APPLE_HTTP_TO_MC = "applehttp_to_mc";
    /** @var auto */
    const AUTO = "auto";
    /** @var akamai hd */
    const AKAMAI_HD = "hdnetwork";
    /** @var akamai hds */
    const AKAMAI_HDS = "hdnetworkmanifest";
    /** @var hds */
    const HDS = "hds";
    /** @var hls */
    const HLS = "hls";
    /** @var http */
    const HTTP = "http";
    /** @var mpeg dash */
    const MPEG_DASH = "mpegdash";
    /** @var multicast sl */
    const MULTICAST_SL = "multicast_silverlight";
    /** @var rtmp */
    const RTMP = "rtmp";
    /** @var rtsp */
    const RTSP = "rtsp";
    /** @var silver light */
    const SILVER_LIGHT = "sl";
    /** @var url */
    const URL = "url";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistCompareAttribute extends KalturaEnumBase {
    /** @var access control id */
    const ACCESS_CONTROL_ID = "accessControlId";
    /** @var created */
    const CREATED_AT = "createdAt";
    /** @var end date */
    const END_DATE = "endDate";
    /** @var moderation count */
    const MODERATION_COUNT = "moderationCount";
    /** @var moderation status */
    const MODERATION_STATUS = "moderationStatus";
    /** @var partner id */
    const PARTNER_ID = "partnerId";
    /** @var partner sort value */
    const PARTNER_SORT_VALUE = "partnerSortValue";
    /** @var rank */
    const RANK = "rank";
    /** @var replacement status */
    const REPLACEMENT_STATUS = "replacementStatus";
    /** @var start date */
    const START_DATE = "startDate";
    /** @var status */
    const STATUS = "status";
    /** @var total rank */
    const TOTAL_RANK = "totalRank";
    /** @var type */
    const TYPE = "type";
    /** @var updated */
    const UPDATED_AT = "updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistMatchAttribute extends KalturaEnumBase {
    /** @var admin tags */
    const ADMIN_TAGS = "adminTags";
    /** @var categories ids */
    const CATEGORIES_IDS = "categoriesIds";
    /** @var creator id */
    const CREATOR_ID = "creatorId";
    /** @var description */
    const DESCRIPTION = "description";
    /** @var group id */
    const GROUP_ID = "groupId";
    /** @var id */
    const ID = "id";
    /** @var name */
    const NAME = "name";
    /** @var reference id */
    const REFERENCE_ID = "referenceId";
    /** @var replaced entry id */
    const REPLACED_ENTRY_ID = "replacedEntryId";
    /** @var replacing entry id */
    const REPLACING_ENTRY_ID = "replacingEntryId";
    /** @var search text */
    const SEARCH_TEXT = "searchText";
    /** @var tags */
    const TAGS = "tags";
    /** @var user id */
    const USER_ID = "userId";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner sort value */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by moderayion count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order partner sort value */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizUserEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportInterval extends KalturaEnumBase {
    /** @var days */
    const DAYS = "days";
    /** @var months */
    const MONTHS = "months";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportType extends KalturaEnumBase {
    /** @var quiz */
    const QUIZ = "quiz.QUIZ";
    /** @var quiz aggerate by question */
    const QUIZ_AGGREGATE_BY_QUESTION = "quiz.QUIZ_AGGREGATE_BY_QUESTION";
    /** @var quiz user aggergate by question */
    const QUIZ_USER_AGGREGATE_BY_QUESTION = "quiz.QUIZ_USER_AGGREGATE_BY_QUESTION";
    /** @var quiz user percentage */
    const QUIZ_USER_PERCENTAGE = "quiz.QUIZ_USER_PERCENTAGE";
    /** @var top content */
    const TOP_CONTENT = "1";
    /** @var content dropoff */
    const CONTENT_DROPOFF = "2";
    /** @var content interactions */
    const CONTENT_INTERACTIONS = "3";
    /** @var map overlay */
    const MAP_OVERLAY = "4";
    /** @var top contributions */
    const TOP_CONTRIBUTORS = "5";
    /** @var top syndication */
    const TOP_SYNDICATION = "6";
    /** @var content contributions */
    const CONTENT_CONTRIBUTIONS = "7";
    /** @var user engagement */
    const USER_ENGAGEMENT = "11";
    /** @var specific user engagement */
    const SPECIFIC_USER_ENGAGEMENT = "12";
    /** @var user top content */
    const USER_TOP_CONTENT = "13";
    /** @var user content dropoff */
    const USER_CONTENT_DROPOFF = "14";
    /** @var user content interactions */
    const USER_CONTENT_INTERACTIONS = "15";
    /** @var applications */
    const APPLICATIONS = "16";
    /** @var user usage */
    const USER_USAGE = "17";
    /** @var specific user usage */
    const SPECIFIC_USER_USAGE = "18";
    /** @var var usage */
    const VAR_USAGE = "19";
    /** @var top creators */
    const TOP_CREATORS = "20";
    /** @var platforms */
    const PLATFORMS = "21";
    /** @var operating syste */
    const OPERATING_SYSTEM = "22";
    /** @var browsers */
    const BROWSERS = "23";
    /** @var live */
    const LIVE = "24";
    /** @var top playback context */
    const TOP_PLAYBACK_CONTEXT = "25";
    /** @var vpaas usage */
    const VPAAS_USAGE = "26";
    /** @var partner usage */
    const PARTNER_USAGE = "201";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRuleActionType extends KalturaEnumBase {
    /** @var drm policy */
    const DRM_POLICY = "drm.DRM_POLICY";
    /** @var block */
    const BLOCK = "1";
    /** @var preview */
    const PREVIEW = "2";
    /** @var limit flavors*/
    const LIMIT_FLAVORS = "3";
    /** @var add to storage */
    const ADD_TO_STORAGE = "4";
    /** @var limit delivery profiles */
    const LIMIT_DELIVERY_PROFILES = "5";
    /** @var serve from remote server */
    const SERVE_FROM_REMOTE_SERVER = "6";
    /** @var request host regex */
    const REQUEST_HOST_REGEX = "7";
    /** @var limit thumbnail capture */
    const LIMIT_THUMBNAIL_CAPTURE = "8";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchemaType extends KalturaEnumBase {
    /** @var bulk upload result xml */
    const BULK_UPLOAD_RESULT_XML = "bulkUploadXml.bulkUploadResultXML";
    /** @var bulk upload xml */
    const BULK_UPLOAD_XML = "bulkUploadXml.bulkUploadXML";
    /** @var ingest api */
    const INGEST_API = "cuePoint.ingestAPI";
    /** @var serve api */
    const SERVE_API = "cuePoint.serveAPI";
    /** @var drop folder xml */
    const DROP_FOLDER_XML = "dropFolderXmlBulkUpload.dropFolderXml";
    /** @var syndication */
    const SYNDICATION = "syndication";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchConditionComparison extends KalturaEnumBase {
    /** @var equal */
    const EQUAL = "1";
    /** @var greater than */
    const GREATER_THAN = "2";
    /** @var gerator than or equal */
    const GREATER_THAN_OR_EQUAL = "3";
    /** @var less than */
    const LESS_THAN = "4";
    /** @var less than or equal */
    const LESS_THAN_OR_EQUAL = "5";
    /** @var not equal */
    const NOT_EQUAL = "6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by heartbeat time */
    const HEARTBEAT_TIME_ASC = "+heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by heartbeat time */
    const HEARTBEAT_TIME_DESC = "-heartbeatTime";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeType extends KalturaEnumBase {
    /** @var wowza media server */
    const WOWZA_MEDIA_SERVER = "wowza.WOWZA_MEDIA_SERVER";
    /** @var edge */
    const EDGE = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSourceType extends KalturaEnumBase {
    /** @var limelight live */
    const LIMELIGHT_LIVE = "limeLight.LIVE_STREAM";
    /** @var velocix live */
    const VELOCIX_LIVE = "velocix.VELOCIX_LIVE";
    /** @var file */
    const FILE = "1";
    /** @var webcam */
    const WEBCAM = "2";
    /** @var url */
    const URL = "5";
    /** @var search provider */
    const SEARCH_PROVIDER = "6";
    /** @var akamai live */
    const AKAMAI_LIVE = "29";
    /** @var manual live stream */
    const MANUAL_LIVE_STREAM = "30";
    /** @var akamai universal live */
    const AKAMAI_UNIVERSAL_LIVE = "31";
    /** @var live stream */
    const LIVE_STREAM = "32";
    /** @var live channel */
    const LIVE_CHANNEL = "33";
    /** @var recorded live */
    const RECORDED_LIVE = "34";
    /** @var clip */
    const CLIP = "35";
    /** @var kaltura recorded live */
    const KALTURA_RECORDED_LIVE = "36";
    /** @var lecture capture */
    const LECTURE_CAPTURE = "37";
    /** @var live stream onextdata captions */
    const LIVE_STREAM_ONTEXTDATA_CAPTIONS = "42";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileProtocol extends KalturaEnumBase {
    /** @var kontiki */
    const KONTIKI = "kontiki.KONTIKI";
    /** @var kaltura dc */
    const KALTURA_DC = "0";
    /** @var ftp */
    const FTP = "1";
    /** @var scp */
    const SCP = "2";
    /** @var sftp */
    const SFTP = "3";
    /** @var s3 */
    const S3 = "6";
    /** @var local */
    const LOCAL = "7";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedEntriesOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by recent */
    const RECENT = "recent";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTaggedObjectType extends KalturaEnumBase {
    /** @var entry */
    const ENTRY = "1";
    /** @var category */
    const CATEGORY = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by deleted */
    const DELETED_AT_ASC = "+deletedAt";
    /** @var order by size */
    const SIZE_ASC = "+size";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by deleted */
    const DELETED_AT_DESC = "-deletedAt";
    /** @var order by size */
    const SIZE_DESC = "-size";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeedCategories extends KalturaEnumBase {
    /** @var animals and pets */
    const ANIMALS_AND_PETS = "Animals &amp; Pets";
    /** @var arts and animation */
    const ARTS_AND_ANIMATION = "Arts &amp; Animation";
    /** @var autos */
    const AUTOS = "Autos";
    /** @var comedy */
    const COMEDY = "Comedy";
    /** @var commercials promotional*/
    const COMMERCIALS_PROMOTIONAL = "Commercials/Promotional";
    /** @var entertainment */
    const ENTERTAINMENT = "Entertainment";
    /** @var family and kikds */
    const FAMILY_AND_KIDS = "Family &amp; Kids";
    /** @var how to or instructional or diy */
    const HOW_TO_INSTRUCTIONAL_DIY = "How To/Instructional/DIY";
    /** @var music */
    const MUSIC = "Music";
    /** @var news and blogs */
    const NEWS_AND_BLOGS = "News &amp; Blogs";
    /** @var science and technology */
    const SCIENCE_AND_TECHNOLOGY = "Science &amp; Technology";
    /** @var sports */
    const SPORTS = "Sports";
    /** @var travel and places */
    const TRAVEL_AND_PLACES = "Travel &amp; Places";
    /** @var video games */
    const VIDEO_GAMES = "Video Games";
    /** @var vlogs and people */
    const VLOGS_PEOPLE = "Vlogs &amp; People";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTubeMogulSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by playlist */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order by type */
    const TYPE_ASC = "+type";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by playlist */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order by type */
    const TYPE_DESC = "-type";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by creatd */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryExtendedStatus extends KalturaEnumBase {
    /** @var playback complete */
    const PLAYBACK_COMPLETE = "viewHistory.PLAYBACK_COMPLETE";
    /** @var playback started */
    const PLAYBACK_STARTED = "viewHistory.PLAYBACK_STARTED";
    /** @var viewed */
    const VIEWED = "viewHistory.VIEWED";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryStatus extends KalturaEnumBase {
    /** @var quiz submitted */
    const QUIZ_SUBMITTED = "quiz.3";
    /** @var active */
    const ACTIVE = "1";
    /** @var deleted */
    const DELETED = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryType extends KalturaEnumBase {
    /** @var quiz */
    const QUIZ = "quiz.QUIZ";
    /** @var view history */
    const VIEW_HISTORY = "viewHistory.VIEW_HISTORY";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserLoginDataOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVideoCodec extends KalturaEnumBase {
    /** @var none */
    const NONE = "";
    /** @var apch */
    const APCH = "apch";
    /** @var apcn */
    const APCN = "apcn";
    /** @var apco */
    const APCO = "apco";
    /** @var apcs */
    const APCS = "apcs";
    /** @var copy */
    const COPY = "copy";
    /** @var enxhd */
    const DNXHD = "dnxhd";
    /** @var dv */
    const DV = "dv";
    /** @var flv */
    const FLV = "flv";
    /** @var h263 */
    const H263 = "h263";
    /** @var h264 */
    const H264 = "h264";
    /** @var h264b */
    const H264B = "h264b";
    /** @var h264h */
    const H264H = "h264h";
    /** @var h264m */
    const H264M = "h264m";
    /** @var h265 */
    const H265 = "h265";
    /** @var mpeg2 */
    const MPEG2 = "mpeg2";
    /** @var mpeg4 */
    const MPEG4 = "mpeg4";
    /** @var theora */
    const THEORA = "theora";
    /** @var vp6 */
    const VP6 = "vp6";
    /** @var vp8 */
    const VP8 = "vp8";
    /** @var vp9 */
    const VP9 = "vp9";
    /** @var wmv2 */
    const WMV2 = "wmv2";
    /** @var vmv3 */
    const WMV3 = "wmv3";
    /** @var wvc1a */
    const WVC1A = "wvc1a";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeedAdultValues extends KalturaEnumBase {
    /** @var adult */
    const ADULT = "adult";
    /** @var non adult */
    const NON_ADULT = "nonadult";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeedCategories extends KalturaEnumBase {
    /** @var action */
    const ACTION = "Action";
    /** @var animals */
    const ANIMALS = "Animals";
    /** @var art and animation */
    const ART_AND_ANIMATION = "Art &amp; Animation";
    /** @var commercials */
    const COMMERCIALS = "Commercials";
    /** @var entertainment and tv */
    const ENTERTAINMENT_AND_TV = "Entertainment &amp; TV";
    /** @var family */
    const FAMILY = "Family";
    /** @var food */
    const FOOD = "Food";
    /** @var funny videos */
    const FUNNY_VIDEOS = "Funny Videos";
    /** @var games */
    const GAMES = "Games";
    /** @var health and beuty */
    const HEALTH_AND_BEAUTY = "Health &amp; Beauty";
    /** @var how to */
    const HOW_TO = "How-To";
    /** @var movies and shorts */
    const MOVIES_AND_SHORTS = "Movies &amp; Shorts";
    /** @var music */
    const MUSIC = "Music";
    /** @var news and politics */
    const NEWS_AND_POLITICS = "News &amp; Politics";
    /** @var people and vlogs */
    const PEOPLE_AND_VLOGS = "People &amp; Vlogs";
    /** @var products and tech */
    const PRODUCTS_AND_TECH = "Products &amp; Tech.";
    /** @var science and environment */
    const SCIENCE_AND_ENVIRONMENT = "Science &amp; Environment";
    /** @var sports */
    const SPORTS = "Sports";
    /** @var transportation */
    const TRANSPORTATION = "Transportation";
    /** @var travel */
    const TRAVEL = "Travel";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYahooSyndicationFeedOrderBy extends KalturaEnumBase {
    /** @var order created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order name */
    const NAME_ASC = "+name";
    /** @var order playlist */
    const PLAYLIST_ID_ASC = "+playlistId";
    /** @var order type */
    const TYPE_ASC = "+type";
    /** @var order updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order name */
    const NAME_DESC = "-name";
    /** @var order id */
    const PLAYLIST_ID_DESC = "-playlistId";
    /** @var order type */
    const TYPE_DESC = "-type";
    /** @var order updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

