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
require_once(dirname(__FILE__) . "/KalturaEventNotificationClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationTemplatePriority extends KalturaEnumBase {
    /** @var high */
    const HIGH = 1;
    /** @var normal */
    const NORMAL = 3;
    /** @var low */
    const LOW = 5;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationFormat extends KalturaEnumBase {
    /** @var html */
    const HTML = "1";
    /** @var text */
    const TEXT = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationRecipientProviderType extends KalturaEnumBase {
    /** @var static list */
    const STATIC_LIST = "1";
    /** @var category */
    const CATEGORY = "2";
    /** @var user */
    const USER = "3";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationTemplateOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by id */
    const ID_DESC = "-id";
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
class KalturaEmailNotificationRecipient extends KalturaObjectBase {
    /**
     * Recipient e-mail address
     *
     * @var KalturaStringValue
     */
    public $email;

    /**
     * Recipient name
     *
     * @var KalturaStringValue
     */
    public $name;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEmailNotificationRecipientJobData extends KalturaObjectBase {
    /**
     * Provider type of the job data.
     *
     * @var KalturaEmailNotificationRecipientProviderType
     */
    public $providerType = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEmailNotificationRecipientProvider extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserProviderFilter extends KalturaFilter {
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
    public $permissionNamesMatchAnd = null;

    /**
     *
     * @var string
     */
    public $permissionNamesMatchOr = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationCategoryRecipientJobData extends KalturaEmailNotificationRecipientJobData {
    /**
     *
     * @var KalturaCategoryUserFilter
     */
    public $categoryUserFilter;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationCategoryRecipientProvider extends KalturaEmailNotificationRecipientProvider {
    /**
     * The ID of the category whose subscribers should receive the email notification.
     *
     * @var KalturaStringValue
     */
    public $categoryId;

    /**
     * The IDs of the categories whose subscribers should receive the email notification.
     *
     * @var KalturaStringValue
     */
    public $categoryIds;

    /**
     *
     * @var KalturaCategoryUserProviderFilter
     */
    public $categoryUserFilter;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationParameter extends KalturaEventNotificationParameter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationStaticRecipientJobData extends KalturaEmailNotificationRecipientJobData {
    /**
     * Email to emails and names
     *
     * @var array of KalturaKeyValue
     */
    public $emailRecipients;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationStaticRecipientProvider extends KalturaEmailNotificationRecipientProvider {
    /**
     * Email to emails and names
     *
     * @var array of KalturaEmailNotificationRecipient
     */
    public $emailRecipients;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationTemplate extends KalturaEventNotificationTemplate {
    /**
     * Define the email body format
     *
     * @var KalturaEmailNotificationFormat
     */
    public $format = null;

    /**
     * Define the email subject
     *
     * @var string
     */
    public $subject = null;

    /**
     * Define the email body content
     *
     * @var string
     */
    public $body = null;

    /**
     * Define the email sender email
     *
     * @var string
     */
    public $fromEmail = null;

    /**
     * Define the email sender name
     *
     * @var string
     */
    public $fromName = null;

    /**
     * Email recipient emails and names
     *
     * @var KalturaEmailNotificationRecipientProvider
     */
    public $to;

    /**
     * Email recipient emails and names
     *
     * @var KalturaEmailNotificationRecipientProvider
     */
    public $cc;

    /**
     * Email recipient emails and names
     *
     * @var KalturaEmailNotificationRecipientProvider
     */
    public $bcc;

    /**
     * Default email addresses to whom the reply should be sent.
     *
     * @var KalturaEmailNotificationRecipientProvider
     */
    public $replyTo;

    /**
     * Define the email priority
     *
     * @var KalturaEmailNotificationTemplatePriority
     */
    public $priority = null;

    /**
     * Email address that a reading confirmation will be sent
     *
     * @var string
     */
    public $confirmReadingTo = null;

    /**
     * Hostname to use in Message-Id and Received headers and as default HELLO string.
     * If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
     *
     * @var string
     */
    public $hostname = null;

    /**
     * Sets the message ID to be used in the Message-Id header.
     * If empty, a unique id will be generated.
     *
     * @var string
     */
    public $messageID = null;

    /**
     * Adds a e-mail custom header
     *
     * @var array of KalturaKeyValue
     */
    public $customHeaders;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationUserRecipientJobData extends KalturaEmailNotificationRecipientJobData {
    /**
     *
     * @var KalturaUserFilter
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
class KalturaEmailNotificationUserRecipientProvider extends KalturaEmailNotificationRecipientProvider {
    /**
     *
     * @var KalturaUserFilter
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
class KalturaEmailNotificationDispatchJobData extends KalturaEventNotificationDispatchJobData {
    /**
     * Define the email sender email
     *
     * @var string
     */
    public $fromEmail = null;

    /**
     * Define the email sender name
     *
     * @var string
     */
    public $fromName = null;

    /**
     * Email recipient emails and names, key is mail address and value is the name
     *
     * @var KalturaEmailNotificationRecipientJobData
     */
    public $to;

    /**
     * Email cc emails and names, key is mail address and value is the name
     *
     * @var KalturaEmailNotificationRecipientJobData
     */
    public $cc;

    /**
     * Email bcc emails and names, key is mail address and value is the name
     *
     * @var KalturaEmailNotificationRecipientJobData
     */
    public $bcc;

    /**
     * Email addresses that a replies should be sent to, key is mail address and value is the name
     *
     * @var KalturaEmailNotificationRecipientJobData
     */
    public $replyTo;

    /**
     * Define the email priority
     *
     * @var KalturaEmailNotificationTemplatePriority
     */
    public $priority = null;

    /**
     * Email address that a reading confirmation will be sent to
     *
     * @var string
     */
    public $confirmReadingTo = null;

    /**
     * Hostname to use in Message-Id and Received headers and as default HELO string.
     * If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
     *
     * @var string
     */
    public $hostname = null;

    /**
     * Sets the message ID to be used in the Message-Id header.
     * If empty, a unique id will be generated.
     *
     * @var string
     */
    public $messageID = null;

    /**
     * Adds a e-mail custom header
     *
     * @var array of KalturaKeyValue
     */
    public $customHeaders;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaEmailNotificationTemplateBaseFilter extends KalturaEventNotificationTemplateFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationTemplateFilter extends KalturaEmailNotificationTemplateBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailNotificationClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Email Notification Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaEmailNotificationClientPlugin - instnce of KalturaEmailNotificationClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaEmailNotificationClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'emailNotification';
    }
}
