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
class KalturaScheduleEventClassificationType extends KalturaEnumBase {
    /** @var public event */
    const PUBLIC_EVENT = 1;
    /** @var private event */
    const PRIVATE_EVENT = 2;
    /** @var confidential event */
    const CONFIDENTIAL_EVENT = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventRecurrenceType extends KalturaEnumBase {
    /** @var none */
    const NONE = 0;
    /** @var recurring */
    const RECURRING = 1;
    /** @var recurrence */
    const RECURRENCE = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventStatus extends KalturaEnumBase {
    /** @var cancelled */
    const CANCELLED = 1;
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
class KalturaScheduleEventType extends KalturaEnumBase {
    /** @var record */
    const RECORD = 1;
    /** @var live stream */
    const LIVE_STREAM = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleResourceStatus extends KalturaEnumBase {
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
class KalturaCameraScheduleResourceOrderBy extends KalturaEnumBase {
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
class KalturaEntryScheduleEventOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by priorixy */
    const PRIORITY_ASC = "+priority";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by summary */
    const SUMMARY_ASC = "+summary";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by priority */
    const PRIORITY_DESC = "-priority";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by summary */
    const SUMMARY_DESC = "-summary";
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
class KalturaLiveEntryScheduleResourceOrderBy extends KalturaEnumBase {
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
class KalturaLiveStreamScheduleEventOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by priority */
    const PRIORITY_ASC = "+priority";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by summary */
    const SUMMARY_ASC = "+summary";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by priority */
    const PRIORITY_DESC = "-priority";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by summary */
    const SUMMARY_DESC = "-summary";
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
class KalturaLocationScheduleResourceOrderBy extends KalturaEnumBase {
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
class KalturaRecordScheduleEventOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by priority */
    const PRIORITY_ASC = "+priority";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by summary */
    const SUMMARY_ASC = "+summary";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by priority */
    const PRIORITY_DESC = "-priority";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by summary */
    const SUMMARY_DESC = "-summary";
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
class KalturaScheduleEventOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by priority */
    const PRIORITY_ASC = "+priority";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by summary */
    const SUMMARY_ASC = "+summary";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by priority */
    const PRIORITY_DESC = "-priority";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by summary */
    const SUMMARY_DESC = "-summary";
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
class KalturaScheduleEventRecurrenceDay extends KalturaEnumBase {
    /** @var friday */
    const FRIDAY = "FR";
    /** @var monday */
    const MONDAY = "MO";
    /** @var saturday */
    const SATURDAY = "SA";
    /** @var sunday */
    const SUNDAY = "SU";
    /** @var thusday */
    const THURSDAY = "TH";
    /** @var thuesda */
    const TUESDAY = "TU";
    /** @var wednesday */
    const WEDNESDAY = "WE";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventRecurrenceFrequency extends KalturaEnumBase {
    /** @var daily */
    const DAILY = "days";
    /** @var hourly */
    const HOURLY = "hours";
    /** @var minutely */
    const MINUTELY = "minutes";
    /** @var monthly */
    const MONTHLY = "months";
    /** @var secondly */
    const SECONDLY = "seconds";
    /** @var weekly */
    const WEEKLY = "weeks";
    /** @var yearly */
    const YEARLY = "years";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventResourceOrderBy extends KalturaEnumBase {
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
class KalturaScheduleResourceOrderBy extends KalturaEnumBase {
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
class KalturaScheduleEventRecurrence extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var KalturaScheduleEventRecurrenceFrequency
     */
    public $frequency = null;

    /**
     *
     * @var int
     */
    public $until = null;

    /**
     * TimeZone String
     *
     * @var string
     */
    public $timeZone = null;

    /**
     *
     * @var int
     */
    public $count = null;

    /**
     *
     * @var int
     */
    public $interval = null;

    /**
     * Comma separated numbers between 0 to 59
     *
     * @var string
     */
    public $bySecond = null;

    /**
     * Comma separated numbers between 0 to 59
     *
     * @var string
     */
    public $byMinute = null;

    /**
     * Comma separated numbers between 0 to 23
     *
     * @var string
     */
    public $byHour = null;

    /**
     * Comma separated of KalturaScheduleEventRecurrenceDay
     * Each byDay value can also be preceded by a positive (+n) or negative (-n) integer.
     * If present, this indicates the nth occurrence of the specific day within the MONTHLY or YEARLY RRULE.
     * For example, within a MONTHLY rule, +1MO (or simply 1MO) represents the first Monday within the month,
     * whereas -1MO represents the last Monday of the month.
     * If an integer modifier is not present, it means all days of this type within the specified frequency.
     * For example, within a MONTHLY rule, MO represents all Mondays within the month.
     *
     * @var string
     */
    public $byDay = null;

    /**
     * Comma separated of numbers between -31 to 31, excluding 0.
     *      For example, -10 represents the tenth to the last day of the month.
     *
     * @var string
     */
    public $byMonthDay = null;

    /**
     * Comma separated of numbers between -366 to 366, excluding 0.
     * For example, -1 represents the last day of the year (December 31st) and
     * -306 represents the 306th to the last day of the year (March 1st).
     *
     * @var string
     */
    public $byYearDay = null;

    /**
     * Comma separated of numbers between -53 to 53, excluding 0.
     * This corresponds to weeks according to week numbering.
     * A week is defined as a seven day period, starting on the day of the week defined to be the week start.
     * Week number one of the calendar year is the first week which contains at least four (4) days in that calendar year.
     * This rule part is only valid for YEARLY frequency.
     * For example, 3 represents the third week of the year.
     *
     * @var string
     */
    public $byWeekNumber = null;

    /**
     * Comma separated numbers between 1 to 12
     *
     * @var string
     */
    public $byMonth = null;

    /**
     * Comma separated of numbers between -366 to 366, excluding 0.
     * Corresponds to the nth occurrence within the set of events specified by the rule.
     * It must only be used in conjunction with another byrule part.
     * For example "the last work day of the month" could be represented as: frequency=MONTHLY;byDay=MO,TU,WE,TH,FR;byOffset=-1
     * Each byOffset value can include a positive (+n) or negative (-n) integer.
     * If present, this indicates the nth occurrence of the specific occurrence within the set of events specified by the rule.
     *
     * @var string
     */
    public $byOffset = null;

    /**
     *
     * @var KalturaScheduleEventRecurrenceDay
     */
    public $weekStartDay = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduleEvent extends KalturaObjectBase {
    /**
     * Auto-generated unique identifier
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
    public $parentId = null;

    /**
     * Defines a short summary or subject for the event
     *
     * @var string
     */
    public $summary = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaScheduleEventStatus
     */
    public $status = null;

    /**
     *
     * @var int
     */
    public $startDate = null;

    /**
     *
     * @var int
     */
    public $endDate = null;

    /**
     *
     * @var string
     */
    public $referenceId = null;

    /**
     *
     * @var KalturaScheduleEventClassificationType
     */
    public $classificationType = null;

    /**
     * Specifies the global position for the activity
     *
     * @var float
     */
    public $geoLatitude = null;

    /**
     * Specifies the global position for the activity
     *
     * @var float
     */
    public $geoLongitude = null;

    /**
     * Defines the intended venue for the activity
     *
     * @var string
     */
    public $location = null;

    /**
     *
     * @var string
     */
    public $organizer = null;

    /**
     *
     * @var string
     */
    public $ownerId = null;

    /**
     * The value for the priority field.
     *
     * @var int
     */
    public $priority = null;

    /**
     * Defines the revision sequence number.
     *
     * @var int
     */
    public $sequence = null;

    /**
     *
     * @var KalturaScheduleEventRecurrenceType
     */
    public $recurrenceType = null;

    /**
     * Duration in seconds
     *
     * @var int
     */
    public $duration = null;

    /**
     * Used to represent contact information or alternately a reference to contact information.
     *
     * @var string
     */
    public $contact = null;

    /**
     * Specifies non-processing information intended to provide a comment to the calendar user.
     *
     * @var string
     */
    public $comment = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaScheduleEventRecurrence
     */
    public $recurrence;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventResource extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $eventId = null;

    /**
     *
     * @var int
     */
    public $resourceId = null;

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
     * Last update as Unix timestamp (In seconds)
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduleResource extends KalturaObjectBase {
    /**
     * Auto-generated unique identifier
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
    public $partnerId = null;

    /**
     * Defines a short name
     *
     * @var string
     */
    public $name = null;

    /**
     * Defines a unique system-name
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
     * @var KalturaScheduleResourceStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $tags = null;

    /**
     * Creation date as Unix timestamp (In seconds)
     *
     * @var int
     */
    public $createdAt = null;

    /**
     * Last update as Unix timestamp (In seconds)
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCameraScheduleResource extends KalturaScheduleResource {
    /**
     * URL of the stream
     *
     * @var string
     */
    public $streamUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryScheduleEvent extends KalturaScheduleEvent {
    /**
     * Entry to be used as template during content ingestion
     *
     * @var string
     */
    public $templateEntryId = null;

    /**
     * Entries that associated with this event
     *
     * @var string
     */
    public $entryIds = null;

    /**
     * Categories that associated with this event
     *
     * @var string
     */
    public $categoryIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryScheduleResource extends KalturaScheduleResource {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLocationScheduleResource extends KalturaScheduleResource {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaScheduleEvent
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
class KalturaScheduleEventResourceListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaScheduleEventResource
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
class KalturaScheduleResourceListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaScheduleResource
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
class KalturaLiveStreamScheduleEvent extends KalturaEntryScheduleEvent {
    /**
     * Defines the expected audience.
     *
     * @var int
     */
    public $projectedAudience = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRecordScheduleEvent extends KalturaEntryScheduleEvent {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduleEventBaseFilter extends KalturaRelatedFilter {
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
     * @var string
     */
    public $parentIdNotIn = null;

    /**
     *
     * @var KalturaScheduleEventStatus
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
    public $endDateGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $endDateLessThanOrEqual = null;

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
    public $ownerIdEqual = null;

    /**
     *
     * @var string
     */
    public $ownerIdIn = null;

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
     * @var KalturaScheduleEventRecurrenceType
     */
    public $recurrenceTypeEqual = null;

    /**
     *
     * @var string
     */
    public $recurrenceTypeIn = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduleEventResourceBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var int
     */
    public $eventIdEqual = null;

    /**
     *
     * @var string
     */
    public $eventIdIn = null;

    /**
     *
     * @var int
     */
    public $resourceIdEqual = null;

    /**
     *
     * @var string
     */
    public $resourceIdIn = null;

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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaScheduleResourceBaseFilter extends KalturaRelatedFilter {
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
     * @var KalturaScheduleResourceStatus
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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventFilter extends KalturaScheduleEventBaseFilter {
    /**
     *
     * @var string
     */
    public $resourceIdsLike = null;

    /**
     *
     * @var string
     */
    public $resourceIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $resourceIdsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $parentResourceIdsLike = null;

    /**
     *
     * @var string
     */
    public $parentResourceIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $parentResourceIdsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $templateEntryCategoriesIdsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $templateEntryCategoriesIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $resourceSystemNamesMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $templateEntryCategoriesIdsLike = null;

    /**
     *
     * @var string
     */
    public $resourceSystemNamesMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $resourceSystemNamesLike = null;

    /**
     *
     * @var string
     */
    public $resourceIdEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventResourceFilter extends KalturaScheduleEventResourceBaseFilter {
    /**
     * Find event-resource objects that associated with the event, if none found, find by its parent event
     *
     * @var int
     */
    public $eventIdOrItsParentIdEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleResourceFilter extends KalturaScheduleResourceBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCameraScheduleResourceBaseFilter extends KalturaScheduleResourceFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEntryScheduleEventBaseFilter extends KalturaScheduleEventFilter {
    /**
     *
     * @var string
     */
    public $templateEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdsLike = null;

    /**
     *
     * @var string
     */
    public $entryIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $entryIdsMultiLikeAnd = null;

    /**
     *
     * @var string
     */
    public $categoryIdsLike = null;

    /**
     *
     * @var string
     */
    public $categoryIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $categoryIdsMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveEntryScheduleResourceBaseFilter extends KalturaScheduleResourceFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLocationScheduleResourceBaseFilter extends KalturaScheduleResourceFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCameraScheduleResourceFilter extends KalturaCameraScheduleResourceBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryScheduleEventFilter extends KalturaEntryScheduleEventBaseFilter {
    /**
     *
     * @var string
     */
    public $parentCategoryIdsLike = null;

    /**
     *
     * @var string
     */
    public $parentCategoryIdsMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $parentCategoryIdsMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveEntryScheduleResourceFilter extends KalturaLiveEntryScheduleResourceBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLocationScheduleResourceFilter extends KalturaLocationScheduleResourceBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaLiveStreamScheduleEventBaseFilter extends KalturaEntryScheduleEventFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaRecordScheduleEventBaseFilter extends KalturaEntryScheduleEventFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamScheduleEventFilter extends KalturaLiveStreamScheduleEventBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaRecordScheduleEventFilter extends KalturaRecordScheduleEventBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaScheduleEventService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Schedule Event Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new KalturaScheduleEvent object
     * @param KalturaScheduleEvent $scheduleevent - object to add.
     * @return KalturaScheduleEvent - object after added.
     */
    public function add(KalturaScheduleEvent $scheduleevent) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEvent", $scheduleevent->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleevent", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEvent");
        return $resultobject;
    }

    /**
     * Add new bulk upload batch job
     * @param file $filedata - file data to upload.
     * @param KalturaBulkUploadICalJobData $bulkuploaddata - batch job data.
     * @return KalturaBulkUpload - bulk upload object.
     */
    public function addFromBulkUpload($filedata, KalturaBulkUploadICalJobData $bulkuploaddata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        $this->client->queueServiceActionCall("schedule_scheduleevent", "addFromBulkUpload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Mark the KalturaScheduleEvent object as cancelled
     * @param int $scheduleeventid - id of kaltura schedule event.
     * @return KalturaScheduleEvent - cancelled event object.
     */
    public function cancel($scheduleeventid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleeventid", $scheduleeventid);
        $this->client->queueServiceActionCall("schedule_scheduleevent", "cancel", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEvent");
        return $resultobject;
    }

    /**
     * Mark the KalturaScheduleEvent object as deleted
     * @param int $scheduleeventid - id of schedule event.
     * @return KalturaScheduleEvent - deleted event object.
     */
    public function delete($scheduleeventid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->queueServiceActionCall("schedule_scheduleevent", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEvent");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaScheduleEvent object by ID
     * @param int $scheduleeventid - id of schedule event.
     * @return KalturaScheduleEvent - searched object.
     */
    public function get($scheduleeventid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->queueServiceActionCall("schedule_scheduleevent", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEvent");
        return $resultobject;
    }

    /**
     * List conflicting events for resourcesIds by event's dates
     * @param string $resourceids - Comma separated
     * @param KalturaScheduleEvent $scheduleevent - Schedule event object.
     * @param string $scheduleeventidtoignore  - Schedule event id to ignore.
     * @return KalturaScheduleEventListResponse - list object.
     */
    public function getConflicts($resourceids, KalturaScheduleEvent $scheduleevent, $scheduleeventidtoignore = null) {
        $kparams = array();
        $this->client->addParam($kparams, "resourceIds", $resourceids);
        $this->client->addParam($kparams, "scheduleEvent", $scheduleevent->toParams());
        $this->client->addParam($kparams, "scheduleEventIdToIgnore", $scheduleeventidtoignore);
        $this->client->queueServiceActionCall("schedule_scheduleevent", "getConflicts", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventListResponse");
        return $resultobject;
    }

    /**
     * List KalturaScheduleEvent objects
     * @param KalturaScheduleEventFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaScheduleEventListResponse - list object.
     */
    public function listAction(KalturaScheduleEventFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("schedule_scheduleevent", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaScheduleEvent object
     * @param int $scheduleeventid - id of kaltura schedule event.
     * @param KalturaScheduleEvent $scheduleevent - id of schedule event.
     * @return KalturaScheduleEvent - schedule event object.
     */
    public function update($scheduleeventid, KalturaScheduleEvent $scheduleevent) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->addParam($kparams, "scheduleEvent", $scheduleevent->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleevent", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEvent");
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
class KalturaScheduleResourceService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Schedule Resource Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new KalturaScheduleResource object
     * @param KalturaScheduleResource $scheduleresource - schedule resource object to add.
     * @return KalturaScheduleResource - schedule resource object after added.
     */
    public function add(KalturaScheduleResource $scheduleresource) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleResource", $scheduleresource->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleresource", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleResource");
        return $resultobject;
    }

    /**
     * Add new bulk upload batch job
     * @param file $filedata - file data to upload.
     * @param KalturaBulkUploadCsvJobData $bulkuploaddata - Bulk upload data.
     * @return KalturaBulkUpload - Bulk upload object after added.
     */
    public function addFromBulkUpload($filedata, KalturaBulkUploadCsvJobData $bulkuploaddata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        $this->client->queueServiceActionCall("schedule_scheduleresource", "addFromBulkUpload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Mark the KalturaScheduleResource object as deleted
     * @param int $scheduleresourceid - id of schedule resource.
     * @return KalturaScheduleResource - schedule resource object after deleted.
     */
    public function delete($scheduleresourceid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->queueServiceActionCall("schedule_scheduleresource", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleResource");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaScheduleResource object by ID
     * @param int $scheduleresourceid - id of schedule resource.
     * @return KalturaScheduleResource - searched object.
     */
    public function get($scheduleresourceid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->queueServiceActionCall("schedule_scheduleresource", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleResource");
        return $resultobject;
    }

    /**
     * List KalturaScheduleResource objects
     * @param KalturaScheduleResourceFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaScheduleResourceListResponse - list object.
     */
    public function listAction(KalturaScheduleResourceFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("schedule_scheduleresource", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleResourceListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaScheduleResource object
     * @param int $scheduleresourceid - id of schedule resource.
     * @param KalturaScheduleResource $scheduleresource - schedule resource object to update.
     * @return KalturaScheduleResource - schedule resource object after update.
     */
    public function update($scheduleresourceid, KalturaScheduleResource $scheduleresource) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->addParam($kparams, "scheduleResource", $scheduleresource->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleresource", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleResource");
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
class KalturaScheduleEventResourceService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Schedule Event Resource Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new KalturaScheduleEventResource object
     * @param KalturaScheduleEventResource $scheduleeventresource - schedule event resource object to add.
     * @return KalturaScheduleEventResource - schedule event resource object after added.
     */
    public function add(KalturaScheduleEventResource $scheduleeventresource) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventResource", $scheduleeventresource->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleeventresource", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventResource");
        return $resultobject;
    }

    /**
     * Mark the KalturaScheduleEventResource object as deleted
     * @param int $scheduleeventid - id of kaltura schedule event resource.
     * @param int $scheduleresourceid - id of schedule resource.
     */
    public function delete($scheduleeventid, $scheduleresourceid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->queueServiceActionCall("schedule_scheduleeventresource", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve a KalturaScheduleEventResource object by ID
     * @param int $scheduleeventid - id of schedule event.
     * @param int $scheduleresourceid - id of schedule resource.
     * @return KalturaScheduleEventResource - searched object.
     */
    public function get($scheduleeventid, $scheduleresourceid) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->queueServiceActionCall("schedule_scheduleeventresource", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventResource");
        return $resultobject;
    }

    /**
     * List KalturaScheduleEventResource objects
     * @param KalturaScheduleEventResourceFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaScheduleEventResourceListResponse - list object.
     */
    public function listAction(KalturaScheduleEventResourceFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("schedule_scheduleeventresource", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventResourceListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaScheduleEventResource object
     * @param int $scheduleeventid - id of schedule event.
     * @param int $scheduleresourceid - id of schedule resource.
     * @param KalturaScheduleEventResource $scheduleeventresource - schedule event resource object to update.
     * @return KalturaScheduleEventResource - schedule event resource object after updated.
     */
    public function update($scheduleeventid, $scheduleresourceid, KalturaScheduleEventResource $scheduleeventresource) {
        $kparams = array();
        $this->client->addParam($kparams, "scheduleEventId", $scheduleeventid);
        $this->client->addParam($kparams, "scheduleResourceId", $scheduleresourceid);
        $this->client->addParam($kparams, "scheduleEventResource", $scheduleeventresource->toParams());
        $this->client->queueServiceActionCall("schedule_scheduleeventresource", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaScheduleEventResource");
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
class KalturaScheduleClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaScheduleEventService
     */
    public $scheduleEvent = null;

    /**
     * @var KalturaScheduleResourceService
     */
    public $scheduleResource = null;

    /**
     * @var KalturaScheduleEventResourceService
     */
    public $scheduleEventResource = null;

    /**
     * Constructor of Kaltura Schedule Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->scheduleEvent = new KalturaScheduleEventService($client);
        $this->scheduleResource = new KalturaScheduleResourceService($client);
        $this->scheduleEventResource = new KalturaScheduleEventResourceService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaScheduleClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaScheduleClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'scheduleEvent' => $this->scheduleEvent,
            'scheduleResource' => $this->scheduleResource,
            'scheduleEventResource' => $this->scheduleEventResource,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'schedule';
    }
}

