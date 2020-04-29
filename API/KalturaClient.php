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
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

error_reporting(E_STRICT);

require_once(dirname(__FILE__) . "/KalturaClientBase.php");
require_once(dirname(__FILE__) . "/KalturaEnums.php");
require_once(dirname(__FILE__) . "/KalturaTypes.php");

/**
 * Kaltura Access Control Profile Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Access Control Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function add new access control profile.
     * @param KalturaAccessControlProfile $accesscontrolprofile - KalturaAccessControl has description of access control profile.
     * @return KalturaAccessControlProfile - instance of KalturaAccessControlProfile.
     */
    public function add(KalturaAccessControlProfile $accesscontrolprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "accessControlProfile", $accesscontrolprofile->toParams());
        $this->client->queueServiceActionCall("accesscontrolprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControlProfile");
        return $resultobject;
    }

    /**
     * This function delete Access Control Profile by id.
     * @param int $id - id of access control profile user want to delete.
     * @return object - this function return "null".
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("accesscontrolprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * This function get Access Control Profile by id.
     * @param int $id - access control profile id.
     * @return KalturaAccessControlProfile - instance of KalturaAccessControlProfile.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("accesscontrolprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControlProfile");
        return $resultobject;
    }

    /**
     * This function list access control profiles by filter and pager.
     * @param KalturaAccessControlProfileFilter $filter - instance of KalturaAccessControlProfileFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaAccessControlProfileListResponse - instance of KalturaAccessControlProfileListResponse.
     */
    public function listAction(KalturaAccessControlProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("accesscontrolprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControlProfileListResponse");
        return $resultobject;
    }

    /**
     * This function update Access Control Profile.
     * @param int $id - id of access control profile.
     * @param KalturaAccessControlProfile $accesscontrolprofile - object has description of access control profile.
     * @return KalturaAccessControlProfile - instance of KalturaAccessControlProfile after update.
     */
    public function update($id, KalturaAccessControlProfile $accesscontrolprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "accessControlProfile", $accesscontrolprofile->toParams());
        $this->client->queueServiceActionCall("accesscontrolprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControlProfile");
        return $resultobject;
    }
}

/**
 * Kaltura Access Control Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Access Control Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function add new access control profile.
     * @param KalturaAccessControl $accesscontrol - object has description of access control profile.
     * @return KalturaAccessControl - instance of KalturaAccessControl.
     */
    public function add(KalturaAccessControl $accesscontrol) {
        $kparams = array();
        $this->client->addParam($kparams, "accessControl", $accesscontrol->toParams());
        $this->client->queueServiceActionCall("accesscontrol", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControl");
        return $resultobject;
    }

    /**
     * This function delete Access Control Profile by id.
     * @param int $id - id of access control profile user want to delete.
     * @return object - this function return "null".
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("accesscontrol", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * This function get Access Control Profile by id.
     * @param int $id - access control profile id.
     * @return KalturaAccessControl - instance of KalturaAccessControl.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("accesscontrol", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControl");
        return $resultobject;
    }

    /**
     * This function list access control profiles by filter and pager.
     * @param KalturaAccessControlFilter $filter - instance of KalturaAccessControlFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaAccessControlListResponse - instance of KalturaAccessControlListResponse.
     */
    public function listAction(KalturaAccessControlFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("accesscontrol", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControlListResponse");
        return $resultobject;
    }

    /**
     * This function update Access Control Profile.
     * @param int $id - id of access control profile.
     * @param KalturaAccessControl $accesscontrol - instance of KalturaAccessControl has description of access control profile.
     * @return KalturaAccessControl - instance of KalturaAccessControl after update.
     */
    public function update($id, KalturaAccessControl $accesscontrol) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "accessControl", $accesscontrol->toParams());
        $this->client->queueServiceActionCall("accesscontrol", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControl");
        return $resultobject;
    }
}

/**
 * Kaltura Admin User Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Admin User Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function get an admin session using admin email and password (Used for login to the KMC application).
     * @param string $email - email address of admin user.
     * @param string $password - password of admin user.
     * @param int $partnerid - partner ID of admin user.
     * @return string - session string.
     */
    public function login($email, $password, $partnerid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->queueServiceActionCall("adminuser", "login", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * This function reset admin user password and sent it to the users email address.
     * @param string $email - email address.
     * @return object - this function return "null".
     */
    public function resetPassword($email) {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->queueServiceActionCall("adminuser", "resetPassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * This func tion set initial password of admin user.
     * @param string $hashkey - has key (admin secret).
     * @param string $newpassword - new password of admin user.
     * @return object - this function return "null".
     */
    public function setInitialPassword($hashkey, $newpassword) {
        $kparams = array();
        $this->client->addParam($kparams, "hashKey", $hashkey);
        $this->client->addParam($kparams, "newPassword", $newpassword);
        $this->client->queueServiceActionCall("adminuser", "setInitialPassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * This function update admin user password and email.
     * @param string $email - current email address.
     * @param string $password - current password.
     * @param string $newemail - new email address.
     * @param string $newpassword - new password.
     * @return KalturaAdminUser - instance of KalturaAdminUser.
     */
    public function updatePassword($email, $password, $newemail = "", $newpassword = "") {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "newEmail", $newemail);
        $this->client->addParam($kparams, "newPassword", $newpassword);
        $this->client->queueServiceActionCall("adminuser", "updatePassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAdminUser");
        return $resultobject;
    }
}

/**
 * KalturaAnalyticService.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnalyticsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Analytics Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function reports query action allows to get a analytics data for specific query dimensions, metrics and filters.
     * @param KalturaAnalyticsFilter $filter - The analytics query filter.
     * @param KalturaFilterPager $pager - The analytics query result pager.
     * @return KalturaReportResponse - instance of KalturaReportResponse.
     */
    public function query(KalturaAnalyticsFilter $filter, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("analytics", "query", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportResponse");
        return $resultobject;
    }
}

/**
 * KalturaAppTokenService.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAppTokenService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura App Token Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new application authentication token
     * @param KalturaAppToken $apptoken - application authentication token to add.
     * @return KalturaAppToken - application authentication token after added.
     */
    public function add(KalturaAppToken $apptoken) {
        $kparams = array();
        $this->client->addParam($kparams, "appToken", $apptoken->toParams());
        $this->client->queueServiceActionCall("apptoken", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAppToken");
        return $resultobject;
    }

    /**
     * Delete application authentication token by id
     * @param string $id - id ot apptoken.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("apptoken", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get application authentication token by id
     * @param string $id - id of apptoken.
     * @return KalturaAppToken - apptoken.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("apptoken", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAppToken");
        return $resultobject;
    }

    /**
     * List application authentication tokens by filter and pager.
     * @param KalturaAppTokenFilter $filter - apptoken filetr object.
     * @param KalturaFilterPager $pager - filter pager object.
     * @return KalturaAppTokenListResponse - instance of KalturaAppTokenListResponse.
     */
    public function listAction(KalturaAppTokenFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("apptoken", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAppTokenListResponse");
        return $resultobject;
    }

    /**
     * Starts a new KS (kaltura Session) based on application authentication token id
     * @param string $id - Application token id.
     * @param string $tokenhash - Hashed token, built of sha1 on current KS concatenated with the application token.
     * @param string $userid - Session user id, will be ignored if a different user id already defined on the application token.
     * @param int $type - Session type, will be ignored if a different session type already defined on the application token.
     * @param int $expiry - Session expiry (in seconds).
     * @return KalturaSessionInfo - session information.
     */
    public function startSession($id, $tokenhash, $userid = null, $type = null, $expiry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "tokenHash", $tokenhash);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->queueServiceActionCall("apptoken", "startSession", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSessionInfo");
        return $resultobject;
    }

    /**
     * Update application authentication token by id.
     * @param string $id - id of apptoken.
     * @param KalturaAppToken $apptoken - apptoken object to update.
     * @return KalturaAppToken - apptoken object after update.
     */
    public function update($id, KalturaAppToken $apptoken) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "appToken", $apptoken->toParams());
        $this->client->queueServiceActionCall("apptoken", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAppToken");
        return $resultobject;
    }
}

/**
 * Kaltura BaseEntry Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Base Entry Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Generic add entry, should be used when the uploaded entry type is not known.
     * @param KalturaBaseEntry $entry - entry object to add.
     * @param string $type - entry type.
     * @return KalturaBaseEntry - entry object after add.
     */
    public function add(KalturaBaseEntry $entry, $type = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall("baseentry", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Attach content resource to entry in status NO_MEDIA
     * @param string $entryid - id of media entry.
     * @param KalturaResource $resource - resource to attach.
     * @return KalturaBaseEntry - media entry object after attach.
     */
    public function addContent($entryid, KalturaResource $resource) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->queueServiceActionCall("baseentry", "addContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Generic add entry using an uploaded file, should be used when the uploaded entry type is not known.
     * @param KalturaBaseEntry $entry - media entry object.
     * @param string $uploadtokenid - id of upload token, the id assigns uploaded file to add int media entry.
     * @param string $type - media type.
     * @return KalturaBaseEntry - media entry object after add.
     */
    public function addFromUploadedFile(KalturaBaseEntry $entry, $uploadtokenid, $type = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall("baseentry", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Anonymously rank an entry, no validation is done on duplicate rankings.
     * @param string $entryid - id of media entry.
     * @param int $rank - rank.
     */
    public function anonymousRank($entryid, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "rank", $rank);
        $this->client->queueServiceActionCall("baseentry", "anonymousRank", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Approve the entry and mark the pending flags (if any) as moderated (this will make the entry playable).
     * @param string $entryid - id of media entry.
     */
    public function approve($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("baseentry", "approve", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Clone an entry with optional attributes to apply to the clone
     * @param string $entryid - Id of media entry to clone
     * @param array $cloneoptions - clone options.
     * @return KalturaBaseEntry - media entry object after clone.
     */
    public function cloneAction($entryid, array $cloneoptions = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        if ($cloneoptions !== null) {
            foreach ($cloneoptions as $index => $obj) {
                $this->client->addParam($kparams, "cloneOptions:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("baseentry", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Count base entries by filter.
     * @param KalturaBaseEntryFilter $filter - Entry filter object.
     * @return int - number of baes entry.
     */
    public function count(KalturaBaseEntryFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("baseentry", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete an entry.
     * @param string $entryid - id of media entry to delete
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("baseentry", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Export storage profile.
     * @param string $entryid - id of media entry.
     * @param int $storageprofileid - id of storage profile.
     * @return KalturaBaseEntry - media entry object.
     */
    public function export($entryid, $storageprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "storageProfileId", $storageprofileid);
        $this->client->queueServiceActionCall("baseentry", "export", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Flag inappropriate entry for moderation.
     * @param KalturaModerationFlag $moderationflag - moderation flag.
     */
    public function flag(KalturaModerationFlag $moderationflag) {
        $kparams = array();
        $this->client->addParam($kparams, "moderationFlag", $moderationflag->toParams());
        $this->client->queueServiceActionCall("baseentry", "flag", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get base entry by ID.
     * @param string $entryid - id of media entry.
     * @param int $version - desired version of the data
     * @return KalturaBaseEntry - media entry object.
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("baseentry", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Get an array of KalturaBaseEntry objects by a comma-separated list of ids.
     * @param string $entryids  - Comma separated string of entry ids
     * @return array - array ob media entry object.
     */
    public function getByIds($entryids) {
        $kparams = array();
        $this->client->addParam($kparams, "entryIds", $entryids);
        $this->client->queueServiceActionCall("baseentry", "getByIds", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * This action delivers entry-related data, based on the user's context:
     * access control, restriction, playback format and storage information.
     * @param string $entryid - id of media entry.
     * @param KalturaEntryContextDataParams $contextdataparams - content data parameters.
     * @return KalturaEntryContextDataResult - context data result.
     */
    public function getContextData($entryid, KalturaEntryContextDataParams $contextdataparams) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "contextDataParams", $contextdataparams->toParams());
        $this->client->queueServiceActionCall("baseentry", "getContextData", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryContextDataResult");
        return $resultobject;
    }

    /**
     * This action delivers all data relevant for player
     * @param string $entryid - id of media entry.
     * @param KalturaPlaybackContextOptions $contextdataparams - context data parameters.
     * @return KalturaPlaybackContext - playback context.
     */
    public function getPlaybackContext($entryid, KalturaPlaybackContextOptions $contextdataparams) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "contextDataParams", $contextdataparams->toParams());
        $this->client->queueServiceActionCall("baseentry", "getPlaybackContext", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaybackContext");
        return $resultobject;
    }

    /**
     * Get remote storage existing paths for the asset.
     * @param string $entryid - id of media entry.
     * @return KalturaRemotePathListResponse - remote path list.
     */
    public function getRemotePaths($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("baseentry", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    /**
     * Index an entry by id.
     * @param string $id - id of media entry.
     * @param bool $shouldupdate - whether update exist entry.
     * @return int - index.
     */
    public function index($id, $shouldupdate = true) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("baseentry", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * List base entries by filter with paging support.
     * @param KalturaBaseEntryFilter $filter - Entry filter
     * @param KalturaFilterPager $pager - Pager
     * @return KalturaBaseEntryListResponse - list of base entry.
     */
    public function listAction(KalturaBaseEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("baseentry", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntryListResponse");
        return $resultobject;
    }

    /**
     * List base entries by filter according to reference id
     * @param string $refid - Entry Reference ID
     * @param KalturaFilterPager $pager - Pager
     * @return KalturaBaseEntryListResponse - list of base entry.
     */
    public function listByReferenceId($refid, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "refId", $refid);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("baseentry", "listByReferenceId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntryListResponse");
        return $resultobject;
    }

    /**
     * List all pending flags for the entry.
     * @param string $entryid - id of media entry.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaModerationFlagListResponse - moderation flag list.
     */
    public function listFlags($entryid, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("baseentry", "listFlags", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaModerationFlagListResponse");
        return $resultobject;
    }

    /**
     * Reject the entry and mark the pending flags (if any) as moderated (this will make the entry non-playable).
     * @param string $entryid - id of media entry.
     */
    public function reject($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("baseentry", "reject", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update base entry. Only the properties that were set will be updated.
     * @param string $entryid - Entry id to update
     * @param KalturaBaseEntry $baseentry - Base entry metadata to update
     * @return KalturaBaseEntry - base entry object after update.
     */
    public function update($entryid, KalturaBaseEntry $baseentry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "baseEntry", $baseentry->toParams());
        $this->client->queueServiceActionCall("baseentry", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Update the content resource associated with the entry.
     * @param string $entryid - Entry id to update
     * @param KalturaResource $resource - Resource to be used to replace entry content
     * @param int $conversionprofileid - The conversion profile id to be used on the entry
     * @param KalturaEntryReplacementOptions $advancedoptions - Additional update content options
     * @return KalturaBaseEntry - base entry object after update.
     */
    public function updateContent($entryid, KalturaResource $resource, $conversionprofileid = null,
                                  KalturaEntryReplacementOptions $advancedoptions = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        if ($advancedoptions !== null) {
            $this->client->addParam($kparams, "advancedoptions", $advancedoptions->toParams());
        }
        $this->client->queueServiceActionCall("baseentry", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Update entry thumbnail from a different entry by a specified time offset (in seconds).
     * @param string $entryid - Media entry id
     * @param string $sourceentryid - Media entry id
     * @param int $timeoffset - Time offset (in seconds)
     * @return KalturaBaseEntry - base entry object after update.
     */
    public function updateThumbnailFromSourceEntry($entryid, $sourceentryid, $timeoffset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        $this->client->addParam($kparams, "timeOffset", $timeoffset);
        $this->client->queueServiceActionCall("baseentry", "updateThumbnailFromSourceEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Update entry thumbnail using url.
     * @param string $entryid - Media entry id
     * @param string $url - File url
     * @return KalturaBaseEntry - base entry object after update.
     */
    public function updateThumbnailFromUrl($entryid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("baseentry", "updateThumbnailFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Update entry thumbnail using a raw jpeg file.
     * @param string $entryid - Media entry id
     * @param file $filedata - Jpeg file data
     * @return KalturaBaseEntry - base entry object after update.
     */
    public function updateThumbnailJpeg($entryid, $filedata) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("baseentry", "updateThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Upload a file to Kaltura, that can be used to create an entry.
     * @param file $filedata - The file data
     * @return string - object type of file data.
     */
    public function upload($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("baseentry", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }
}

/**
 * Kaltura BulkUpload Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura BulkUpload Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Aborts the bulk upload and all its child jobs
     * @param bigint $id - Job id
     * @return KalturaBulkUpload - aborted bulkupload object.
     */
    public function abort($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload", "abort", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Add new bulk upload batch job
     * Conversion profile id can be specified in the API or in the CSV file, the one in the CSV file will be stronger.
     * If no conversion profile was specified, partner's default will be used
     * @param int $conversionprofileid - convertion profile id to use for converting the current bulk (-1 to use partner's default)
     * @param file $csvfiledata - Bulk upload file
     * @param string $bulkuploadtype - bulk upload type.
     * @param string $uploadedby - upload source.
     * @param string $filename - Friendly name of the file, used to be recognized later in the logs.
     * @return KalturaBulkUpload
     */
    public function add($conversionprofileid, $csvfiledata, $bulkuploadtype = null, $uploadedby = null, $filename = null) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $kfiles = array();
        $this->client->addParam($kfiles, "csvFileData", $csvfiledata);
        $this->client->addParam($kparams, "bulkUploadType", $bulkuploadtype);
        $this->client->addParam($kparams, "uploadedBy", $uploadedby);
        $this->client->addParam($kparams, "fileName", $filename);
        $this->client->queueServiceActionCall("bulkupload", "add", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Get bulk upload batch job by id
     * @param int $id - id of batch job.
     * @return KalturaBulkUpload - bulkupload object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * List bulk upload batch jobs.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaBulkUploadListResponse - list of bulkupload
     */
    public function listAction(KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("bulkupload", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUploadListResponse");
        return $resultobject;
    }

    /**
     * Serve action returan the original file.
     * @param int $id - bathc job id
     * @return file - original file of batch job.
     */
    public function serve($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * ServeLog action returan the original file.
     * @param bigint $id - batch job id.
     * @return file - original file of batch job.
     */
    public function serveLog($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload", "serveLog", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }
}

/**
 * Kaltura CategoryEntry Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura CategoryEntry Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Activate CategoryEntry when it is pending moderation
     * @param string $entryid - id of categoryentry.
     * @param int $categoryid - id of category.
     */
    public function activate($entryid, $categoryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->queueServiceActionCall("categoryentry", "activate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Add new CategoryEntry
     * @param KalturaCategoryEntry $categoryentry - categoryentry object to add.
     * @return KalturaCategoryEntry - categoryentry object after add.
     */
    public function add(KalturaCategoryEntry $categoryentry) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryEntry", $categoryentry->toParams());
        $this->client->queueServiceActionCall("categoryentry", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryEntry");
        return $resultobject;
    }

    /**
     * Add new CategoryEntry from bulk upload content.
     * @param KalturaBulkServiceData $bulkuploaddata - bulkupload service data.
     * @param KalturaBulkUploadCategoryEntryData $bulkuploadcategoryentrydata - bulkupload categoryentry data to add.
     * @return KalturaBulkUpload - bulkupload object after add.
     */
    public function addFromBulkUpload(KalturaBulkServiceData $bulkuploaddata,
                                      KalturaBulkUploadCategoryEntryData $bulkuploadcategoryentrydata = null) {
        $kparams = array();
        $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        if ($bulkuploadcategoryentrydata !== null) {
            $this->client->addParam($kparams, "bulkUploadCategoryEntryData", $bulkuploadcategoryentrydata->toParams());
        }
        $this->client->queueServiceActionCall("categoryentry", "addFromBulkUpload", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Delete CategoryEntry
     * @param string $entryid - id of media entry.
     * @param int $categoryid - id fo category.
     */
    public function delete($entryid, $categoryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->queueServiceActionCall("categoryentry", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Index CategoryEntry by Id
     * @param string $entryid - id of media entry.
     * @param int $categoryid - id of category.
     * @param bool $shouldupdate - whether existing category must be updated.
     * @return int
     */
    public function index($entryid, $categoryid, $shouldupdate = true) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("categoryentry", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * List all categoryEntry
     * @param KalturaCategoryEntryFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaCategoryEntryListResponse - list of categoryentry.
     */
    public function listAction(KalturaCategoryEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("categoryentry", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryEntryListResponse");
        return $resultobject;
    }

    /**
     * Activate CategoryEntry when it is pending moderation
     * @param string $entryid - media entry id.
     * @param int $categoryid - category id.
     */
    public function reject($entryid, $categoryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->queueServiceActionCall("categoryentry", "reject", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update privacy context from the category
     * @param string $entryid - id of media entry.
     * @param int $categoryid - category id.
     */
    public function syncPrivacyContext($entryid, $categoryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->queueServiceActionCall("categoryentry", "syncPrivacyContext", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura Category Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Category Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Category.
     * @param KalturaCategory $category - category object to add.
     * @return KalturaCategory - category object after add.
     */
    public function add(KalturaCategory $category) {
        $kparams = array();
        $this->client->addParam($kparams, "category", $category->toParams());
        $this->client->queueServiceActionCall("category", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategory");
        return $resultobject;
    }

    /**
     * Add new category from bulk upload content.
     * @param file $filedata - uploaded file data.
     * @param KalturaBulkUploadJobData $bulkuploaddata - bulk upload data.
     * @param KalturaBulkUploadCategoryData $bulkuploadcategorydata - bulk upload category data.
     * @return KalturaBulkUpload - bulkupload object after added.
     */
    public function addFromBulkUpload($filedata, KalturaBulkUploadJobData $bulkuploaddata = null,
                                      KalturaBulkUploadCategoryData $bulkuploadcategorydata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        if ($bulkuploadcategorydata !== null) {
            $this->client->addParam($kparams, "bulkUploadCategoryData", $bulkuploadcategorydata->toParams());
        }
        $this->client->queueServiceActionCall("category", "addFromBulkUpload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Delete a Category
     * @param int $id - category id.
     * @param int $moveentriestoparentcategory - if tis parameter is set to 1, entries are moved to parent category.
     */
    public function delete($id, $moveentriestoparentcategory = 1) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "moveEntriesToParentCategory", $moveentriestoparentcategory);
        $this->client->queueServiceActionCall("category", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Category by id.
     * @param int $id - category id.
     * @return KalturaCategory - category object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("category", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategory");
        return $resultobject;
    }

    /**
     * Index Category by id.
     * @param int $id - category id.
     * @param bool $shouldupdate - whether existing category is updated.
     * @return int - index.
     */
    public function index($id, $shouldupdate = true) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("category", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * List all categories.
     * @param KalturaCategoryFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaCategoryListResponse - list of category.
     */
    public function listAction(KalturaCategoryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("category", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryListResponse");
        return $resultobject;
    }

    /**
     * Move categories that belong to the same parent category to a target categroy -
     * enabled only for ks with disable entitlement.
     * @param string $categoryids - category ids.
     * @param int $targetcategoryparentid - id of parent category .
     * @return bool - move status.
     */
    public function move($categoryids, $targetcategoryparentid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryIds", $categoryids);
        $this->client->addParam($kparams, "targetCategoryParentId", $targetcategoryparentid);
        $this->client->queueServiceActionCall("category", "move", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * Unlock categories.
     */
    public function unlockCategories() {
        $kparams = array();
        $this->client->queueServiceActionCall("category", "unlockCategories", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update Category
     * @param int $id - id of category.
     * @param KalturaCategory $category - category object to update.
     * @return KalturaCategory - category object after update.
     */
    public function update($id, KalturaCategory $category) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "category", $category->toParams());
        $this->client->queueServiceActionCall("category", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategory");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryUserService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Category User Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Activate CategoryUser
     * @param int $categoryid - category id.
     * @param string $userid - user id.
     * @return KalturaCategoryUser - category user object.
     */
    public function activate($categoryid, $userid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("categoryuser", "activate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUser");
        return $resultobject;
    }

    /**
     * Add new CategoryUser.
     * @param KalturaCategoryUser $categoryuser - category user to add.
     * @return KalturaCategoryUser - category user after add.
     */
    public function add(KalturaCategoryUser $categoryuser) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryUser", $categoryuser->toParams());
        $this->client->queueServiceActionCall("categoryuser", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUser");
        return $resultobject;
    }

    /**
     * Add new CategoryUser from bulk upload content.
     * @param file $filedata - file data.
     * @param KalturaBulkUploadJobData $bulkuploaddata - bulkupload data.
     * @param KalturaBulkUploadCategoryUserData $bulkuploadcategoryuserdata - bulkupload categoryuser data.
     * @return KalturaBulkUpload - bulkupload object after add.
     */
    public function addFromBulkUpload($filedata, KalturaBulkUploadJobData $bulkuploaddata = null,
                                      KalturaBulkUploadCategoryUserData $bulkuploadcategoryuserdata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        if ($bulkuploadcategoryuserdata !== null) {
            $this->client->addParam($kparams, "bulkUploadCategoryUserData", $bulkuploadcategoryuserdata->toParams());
        }
        $this->client->queueServiceActionCall("categoryuser", "addFromBulkUpload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Copy all memeber from parent category
     * @param int $categoryid - category id.
     */
    public function copyFromCategory($categoryid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->queueServiceActionCall("categoryuser", "copyFromCategory", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Reject CategoryUser
     * @param int $categoryid - category id.
     * @param string $userid - user id.
     * @return KalturaCategoryUser - categoryuser object after deactivate.
     */
    public function deactivate($categoryid, $userid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("categoryuser", "deactivate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUser");
        return $resultobject;
    }

    /**
     * Delete a CategoryUser.
     * @param int $categoryid - category id.
     * @param string $userid - user id.
     */
    public function delete($categoryid, $userid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("categoryuser", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get CategoryUser by id.
     * @param int $categoryid - category id.
     * @param string $userid - user id.
     * @return KalturaCategoryUser - category user object.
     */
    public function get($categoryid, $userid) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("categoryuser", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUser");
        return $resultobject;
    }

    /**
     * Index CategoryUser by userid and category id
     * @param string $userid - user id.
     * @param int $categoryid - category id.
     * @param bool $shouldupdate - whether existing category must be updated.
     * @return int - update status.
     */
    public function index($userid, $categoryid, $shouldupdate = true) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("categoryuser", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * List all categories
     * @param KalturaCategoryUserFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaCategoryUserListResponse - list of categoryuser.
     */
    public function listAction(KalturaCategoryUserFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("categoryuser", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUserListResponse");
        return $resultobject;
    }

    /**
     * Update CategoryUser by id.
     * @param int $categoryid - caetgory id.
     * @param string $userid - user id.
     * @param KalturaCategoryUser $categoryuser - categoryuser object to update.
     * @param bool $override - to override manual changes
     * @return KalturaCategoryUser - categoryuser object after update.
     */
    public function update($categoryid, $userid, KalturaCategoryUser $categoryuser, $override = false) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "categoryUser", $categoryuser->toParams());
        $this->client->addParam($kparams, "override", $override);
        $this->client->queueServiceActionCall("categoryuser", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCategoryUser");
        return $resultobject;
    }
}

/**
 * Kaltura Conversion Profile Asset Params Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Conversion Profile Asset Params Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Lists asset parmas of conversion profile by ID
     * @param KalturaConversionProfileAssetParamsFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaConversionProfileAssetParamsListResponse - list of conversion profile asset.
     */
    public function listAction(KalturaConversionProfileAssetParamsFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("conversionprofileassetparams", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfileAssetParamsListResponse");
        return $resultobject;
    }

    /**
     * Update asset parmas of conversion profile by ID
     * @param int $conversionprofileid - conversion profile id.
     * @param int $assetparamsid - asset params id.
     * @param KalturaConversionProfileAssetParams $conversionprofileassetparams - conversion profile asset params to update.
     * @return KalturaConversionProfileAssetParams - conversion profile asset params after update.
     */
    public function update($conversionprofileid, $assetparamsid,
                           KalturaConversionProfileAssetParams $conversionprofileassetparams) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->addParam($kparams, "assetParamsId", $assetparamsid);
        $this->client->addParam($kparams, "conversionProfileAssetParams", $conversionprofileassetparams->toParams());
        $this->client->queueServiceActionCall("conversionprofileassetparams", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfileAssetParams");
        return $resultobject;
    }
}

/**
 * Kaltura Conversion Profile Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Conversion Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Conversion Profile.
     * @param KalturaConversionProfile $conversionprofile - conversion profile object to add.
     * @return KalturaConversionProfile - conversion profile oabject after add.
     */
    public function add(KalturaConversionProfile $conversionprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfile", $conversionprofile->toParams());
        $this->client->queueServiceActionCall("conversionprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }

    /**
     * Delete Conversion Profile by ID
     * @param int $id - conversion profile id.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("conversionprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Conversion Profile by ID
     * @param int $id - conversion profile id.
     * @return KalturaConversionProfile - conversion profile object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("conversionprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }

    /**
     * Get the partner's default conversion profile.
     * @param string $type - conversion type.
     * @return KalturaConversionProfile - conversion profile object as default.
     */
    public function getDefault($type = null) {
        $kparams = array();
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall("conversionprofile", "getDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }

    /**
     * List Conversion Profiles by filter with paging support.
     * @param KalturaConversionProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaConversionProfileListResponse - list of conversion profile.
     */
    public function listAction(KalturaConversionProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("conversionprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfileListResponse");
        return $resultobject;
    }

    /**
     * Set Conversion Profile to be the partner default
     * @param int $id - conversion profile id.
     * @return KalturaConversionProfile - conversion profile object as default.
     */
    public function setAsDefault($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("conversionprofile", "setAsDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }

    /**
     * Update Conversion Profile by ID.
     * @param int $id - conversion profile id.
     * @param KalturaConversionProfile $conversionprofile - conversion profile object to update.
     * @return KalturaConversionProfile - conversion profile object after update.
     */
    public function update($id, KalturaConversionProfile $conversionprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "conversionProfile", $conversionprofile->toParams());
        $this->client->queueServiceActionCall("conversionprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }
}

/**
 * Kaltura Data Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Data Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new data entry.
     * @param KalturaDataEntry $dataentry - Data entry to add.
     * @return KalturaDataEntry - Data entry after add.
     */
    public function add(KalturaDataEntry $dataentry) {
        $kparams = array();
        $this->client->addParam($kparams, "dataEntry", $dataentry->toParams());
        $this->client->queueServiceActionCall("data", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataEntry");
        return $resultobject;
    }

    /**
     * Update the dataContent of data entry using a resource
     * @param string $entryid - media entry id.
     * @param KalturaGenericDataCenterContentResource $resource - content resource object.
     * @return string - update status.
     */
    public function addContent($entryid, KalturaGenericDataCenterContentResource $resource) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->queueServiceActionCall("data", "addContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Delete a data entry.
     * @param string $entryid - Data entry id to delete
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("data", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get data entry by ID.
     * @param string $entryid - Data entry id.
     * @param int $version - desired version of the data
     * @return KalturaDataEntry - data entry object.
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("data", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataEntry");
        return $resultobject;
    }

    /**
     * List data entries by filter with paging support.
     * @param KalturaDataEntryFilter $filter - Document entry filter
     * @param KalturaFilterPager $pager - Pager
     * @return KalturaDataListResponse - list of data entry.
     */
    public function listAction(KalturaDataEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("data", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataListResponse");
        return $resultobject;
    }

    /**
     * Serve action returan the file from dataContent field.
     * @param string $entryid - Data entry id
     * @param int $version - desired version of the data
     * @param bool $forceproxy - Force to get the content without redirect
     * @return file - file object.
     */
    public function serve($entryid, $version = -1, $forceproxy = false) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }

        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall("data", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update data entry. Only the properties that were set will be updated.
     * @param string $entryid - Data entry id to update
     * @param KalturaDataEntry $documententry - Data entry metadata to update.
     * @return KalturaDataEntry - data entry object after update.
     */
    public function update($entryid, KalturaDataEntry $documententry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        $this->client->queueServiceActionCall("data", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataEntry");
        return $resultobject;
    }
}

/**
 * Kaltura Delivery Profile Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDeliveryProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Delivery Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new delivery.
     * @param KalturaDeliveryProfile $delivery - delivery profile object to add.
     * @return KalturaDeliveryProfile - delivery object after add.
     */
    public function add(KalturaDeliveryProfile $delivery) {
        $kparams = array();
        $this->client->addParam($kparams, "delivery", $delivery->toParams());
        $this->client->queueServiceActionCall("deliveryprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDeliveryProfile");
        return $resultobject;
    }

    /**
     * Add delivery based on existing delivery.
     * Provide valid sourceDeliveryId.
     * @param int $deliveryid - delivery id.
     * @return KalturaDeliveryProfile - delivery object.
     */
    public function cloneAction($deliveryid) {
        $kparams = array();
        $this->client->addParam($kparams, "deliveryId", $deliveryid);
        $this->client->queueServiceActionCall("deliveryprofile", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDeliveryProfile");
        return $resultobject;
    }

    /**
     * Get delivery by id
     * @param string $id - id of delivery profile.
     * @return KalturaDeliveryProfile - delivery profile object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("deliveryprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDeliveryProfile");
        return $resultobject;
    }

    /**
     * Retrieve a list of available delivery depends on the filter given
     * @param KalturaDeliveryProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaDeliveryProfileListResponse - list of delivery profile.
     */
    public function listAction(KalturaDeliveryProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("deliveryprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDeliveryProfileListResponse");
        return $resultobject;
    }

    /**
     * Update exisiting delivery.
     * @param string $id - id of delivery profile.
     * @param KalturaDeliveryProfile $delivery - delivery profile.
     * @return KalturaDeliveryProfile - delivery profile object.
     */
    public function update($id, KalturaDeliveryProfile $delivery) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "delivery", $delivery->toParams());
        $this->client->queueServiceActionCall("deliveryprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDeliveryProfile");
        return $resultobject;
    }
}

/**
 * Kaltura Email Ingestion Profile Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Email Ingestion Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * EmailIngestionProfile Add action allows you to add a EmailIngestionProfile to Kaltura DB.
     * @param KalturaEmailIngestionProfile $emailip - Mandatory input parameter of type KalturaEmailIngestionProfile
     * @return KalturaEmailIngestionProfile - email ingestion profile object after add.
     */
    public function add(KalturaEmailIngestionProfile $emailip) {
        $kparams = array();
        $this->client->addParam($kparams, "EmailIP", $emailip->toParams());
        $this->client->queueServiceActionCall("emailingestionprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEmailIngestionProfile");
        return $resultobject;
    }

    /**
     * Add KalturaMediaEntry from email ingestion
     * @param KalturaMediaEntry $mediaentry - Media entry metadata
     * @param string $uploadtokenid - Upload token id
     * @param int $emailprofid - email profile id.
     * @param string $fromaddress - from address.
     * @param string $emailmsgid - email message id.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addMediaEntry(KalturaMediaEntry $mediaentry, $uploadtokenid, $emailprofid, $fromaddress, $emailmsgid) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->addParam($kparams, "emailProfId", $emailprofid);
        $this->client->addParam($kparams, "fromAddress", $fromaddress);
        $this->client->addParam($kparams, "emailMsgId", $emailmsgid);
        $this->client->queueServiceActionCall("emailingestionprofile", "addMediaEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Delete an existing EmailIngestionProfile
     * @param int $id - id of email ingestion profile.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("emailingestionprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve a EmailIngestionProfile by id
     * @param int $id - id of email ingestion profile.
     * @return KalturaEmailIngestionProfile - email ingestion profile object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("emailingestionprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEmailIngestionProfile");
        return $resultobject;
    }

    /**
     * Retrieve a EmailIngestionProfile by email address
     * @param string $emailaddress - email address.
     * @return KalturaEmailIngestionProfile - email ingestion profile object.
     */
    public function getByEmailAddress($emailaddress) {
        $kparams = array();
        $this->client->addParam($kparams, "emailAddress", $emailaddress);
        $this->client->queueServiceActionCall("emailingestionprofile", "getByEmailAddress", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEmailIngestionProfile");
        return $resultobject;
    }

    /**
     * Update an existing EmailIngestionProfile
     * @param int $id - id of email ingestion profile.
     * @param KalturaEmailIngestionProfile $emailip - eimail ip.
     * @return KalturaEmailIngestionProfile - email ingestion profile object.
     */
    public function update($id, KalturaEmailIngestionProfile $emailip) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "EmailIP", $emailip->toParams());
        $this->client->queueServiceActionCall("emailingestionprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEmailIngestionProfile");
        return $resultobject;
    }
}

/**
 * Kaltura Entry Server Node Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEntryServerNodeService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Entry Server Node Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get server node by id.
     * @param string $id - id of entry server node.
     * @return KalturaEntryServerNode - entry server node object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("entryservernode", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryServerNode");
        return $resultobject;
    }

    /**
     * List server nodes.
     * @param KalturaEntryServerNodeFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaEntryServerNodeListResponse - list of entry server node.
     */
    public function listAction(KalturaEntryServerNodeFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("entryservernode", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryServerNodeListResponse");
        return $resultobject;
    }

    /**
     * Update entry server node.
     * @param int $id - server node id.
     * @param KalturaEntryServerNode $entryservernode - server node object to update.
     * @return KalturaEntryServerNode - server node after update.
     */
    public function update($id, KalturaEntryServerNode $entryservernode) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "entryServerNode", $entryservernode->toParams());
        $this->client->queueServiceActionCall("entryservernode", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEntryServerNode");
        return $resultobject;
    }

    /**
     * Validates server node still registered on entry.
     * @param int $id - entry server node id
     */
    public function validateRegisteredEntryServerNode($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("entryservernode", "validateRegisteredEntryServerNode", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura File Asset Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFileAssetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura File Asset Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new file asset.
     * @param KalturaFileAsset $fileasset - file asset to add.
     * @return KalturaFileAsset - file asset after add.
     */
    public function add(KalturaFileAsset $fileasset) {
        $kparams = array();
        $this->client->addParam($kparams, "fileAsset", $fileasset->toParams());
        $this->client->queueServiceActionCall("fileasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFileAsset");
        return $resultobject;
    }

    /**
     * Delete file asset by id.
     * @param int $id - file asset id.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("fileasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get file asset by id.
     * @param int $id - file asset id.
     * @return KalturaFileAsset - file asset object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("fileasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFileAsset");
        return $resultobject;
    }

    /**
     * List file assets by filter and pager
     * @param KalturaFileAssetFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaFileAssetListResponse - file asset object.
     */
    public function listAction(KalturaFileAssetFilter $filter, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("fileasset", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFileAssetListResponse");
        return $resultobject;
    }

    /**
     * Serve file asset by id.
     * @param int $id - file asset id.
     * @return file - file asset object.
     */
    public function serve($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("fileasset", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Set content of file asset.
     * @param int $id - file asset id.
     * @param KalturaContentResource $contentresource - content resource object to set into file asset.
     * @return KalturaFileAsset - file asset object after set.
     */
    public function setContent($id, KalturaContentResource $contentresource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentresource->toParams());
        $this->client->queueServiceActionCall("fileasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFileAsset");
        return $resultobject;
    }

    /**
     * Update file asset by id.
     * @param int $id - id of file asset.
     * @param KalturaFileAsset $fileasset - file asset object to update.
     * @return KalturaFileAsset - file asset object after update.
     */
    public function update($id, KalturaFileAsset $fileasset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "fileAsset", $fileasset->toParams());
        $this->client->queueServiceActionCall("fileasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFileAsset");
        return $resultobject;
    }
}

/**
 * Kaltura Flavor Asset service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Flavor Asset Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add flavor asset.
     * @param string $entryid - id of media entry.
     * @param KalturaFlavorAsset $flavorasset - flavor asset to add.
     * @return KalturaFlavorAsset - flavor asset after add.
     */
    public function add($entryid, KalturaFlavorAsset $flavorasset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorAsset", $flavorasset->toParams());
        $this->client->queueServiceActionCall("flavorasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    /**
     * Add and convert new Flavor Asset for Entry with specific Flavor Params
     * @param string $entryid - id of media entry.
     * @param int $flavorparamsid - flavor params id.
     * @param int $priority - priority of conversion batch job.
     */
    public function convert($entryid, $flavorparamsid, $priority = 0) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->addParam($kparams, "priority", $priority);
        $this->client->queueServiceActionCall("flavorasset", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Delete Flavor Asset by ID
     * @param string $id - id of flavor asset.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Delete all local file syncs for this asset.
     * @param string $assetid - flavor asset id.
     */
    public function deleteLocalContent($assetid) {
        $kparams = array();
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->queueServiceActionCall("flavorasset", "deleteLocalContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Manually export an asset.
     * @param string $assetid - flavor asset id.
     * @param int $storageprofileid - storage profile id.
     * @return KalturaFlavorAsset - flavor asset object.
     */
    public function export($assetid, $storageprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->addParam($kparams, "storageProfileId", $storageprofileid);
        $this->client->queueServiceActionCall("flavorasset", "export", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    /**
     * Get Flavor Asset by ID.
     * @param string $id - id of flavor asset.
     * @return KalturaFlavorAsset - flavor asset.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    /**
     * Get Flavor Assets for Entry
     * @param string $entryid - id of media entry.
     * @return array - array of flavor asset.
     */
    public function getByEntryId($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("flavorasset", "getByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get download URL for the Flavor Asset
     * @param string $id - id of flavor asset.
     * @param bool $usecdn - whether cdn is used.
     * @return string - Download URL of flavor asset.
     */
    public function getDownloadUrl($id, $usecdn = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "useCdn", $usecdn);
        $this->client->queueServiceActionCall("flavorasset", "getDownloadUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Get Flavor Asset with the relevant Flavor Params (Flavor Params can exist without Flavor Asset & vice versa).
     * @param string $entryid - id of media entry.
     * @return array - array of flavor asset.
     */
    public function getFlavorAssetsWithParams($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("flavorasset", "getFlavorAssetsWithParams", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get remote storage existing paths for the asset.
     * @param string $id - id of flavor asset.
     * @return KalturaRemotePathListResponse - list of remote path.
     */
    public function getRemotePaths($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorasset", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    /**
     * Get download URL for the asset.
     * @param string $id - flavor asset.
     * @param int $storageid - id of storage profile.
     * @param bool $forceproxy - whether proxy is used.
     * @param KalturaFlavorAssetUrlOptions $options - options.
     * @return string - Download URL for the flavor asset.
     */
    public function getUrl($id, $storageid = null, $forceproxy = false, KalturaFlavorAssetUrlOptions $options = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        if ($options !== null) {
            $this->client->addParam($kparams, "options", $options->toParams());
        }
        $this->client->queueServiceActionCall("flavorasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Get volume map by entry id.
     * @param string $flavorid - Flavor id
     * @return file - volume map file.
     */
    public function getVolumeMap($flavorid) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "flavorId", $flavorid);
        $this->client->queueServiceActionCall("flavorasset", "getVolumeMap", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Get web playable Flavor Assets for Entry.
     * @param string $entryid - id of media entry,
     * @return array - array of flavor asset.
     */
    public function getWebPlayableByEntryId($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("flavorasset", "getWebPlayableByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * List Flavor Assets by filter and pager
     * @param KalturaAssetFilter $filter - filter object,
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaFlavorAssetListResponse - list of flavor asset.
     */
    public function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("flavorasset", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAssetListResponse");
        return $resultobject;
    }

    /**
     * Reconvert Flavor Asset by ID.
     * @param string $id - Flavor Asset ID
     */
    public function reconvert($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorasset", "reconvert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Serve cmd line to transcode the ad.
     * @param string $assetid - flavor asset id.
     * @param string $ffprobejson - ffprobe json parameters.
     * @param string $duration - duration time.
     * @return string - serve status.
     */
    public function serveAdStitchCmd($assetid, $ffprobejson = null, $duration = null) {
        $kparams = array();
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->addParam($kparams, "ffprobeJson", $ffprobejson);
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->queueServiceActionCall("flavorasset", "serveAdStitchCmd", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Set a given flavor as the original flavor
     * @param string $assetid - flavor asset id.
     */
    public function setAsSource($assetid) {
        $kparams = array();
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->queueServiceActionCall("flavorasset", "setAsSource", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update content of flavor asset
     * @param string $id - id of flavor asset.
     * @param KalturaContentResource $contentresource - content resource.
     * @return KalturaFlavorAsset - flavor asset.
     */
    public function setContent($id, KalturaContentResource $contentresource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentresource->toParams());
        $this->client->queueServiceActionCall("flavorasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    /**
     * Update flavor asset.
     * @param string $id - id of flavor asset.
     * @param KalturaFlavorAsset $flavorasset - flavor asset object.
     * @return KalturaFlavorAsset - flavor asset object.
     */
    public function update($id, KalturaFlavorAsset $flavorasset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "flavorAsset", $flavorasset->toParams());
        $this->client->queueServiceActionCall("flavorasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }
}

/**
 * Kaltura Flavor Params Output Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsOutputService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Flavor Params Output Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get flavor params output object by ID.
     * @param int $id - id of flavor params output.
     * @return KalturaFlavorParamsOutput - flavor params output object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorparamsoutput", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParamsOutput");
        return $resultobject;
    }

    /**
     * List flavor params output objects by filter and pager.
     * @param KalturaFlavorParamsOutputFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaFlavorParamsOutputListResponse - list of flavor params outout object.
     */
    public function listAction(KalturaFlavorParamsOutputFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("flavorparamsoutput", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParamsOutputListResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Flavor Params Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Flavor Params Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Flavor Params
     * @param KalturaFlavorParams $flavorparams - flavor params object to add.
     * @return KalturaFlavorParams - flavor params object after add.
     */
    public function add(KalturaFlavorParams $flavorparams) {
        $kparams = array();
        $this->client->addParam($kparams, "flavorParams", $flavorparams->toParams());
        $this->client->queueServiceActionCall("flavorparams", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParams");
        return $resultobject;
    }

    /**
     * Delete Flavor Params by ID
     * @param int $id - flavor params id.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorparams", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Flavor Params by ID
     * @param int $id - flavor params id.
     * @return KalturaFlavorParams - flavor params object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("flavorparams", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParams");
        return $resultobject;
    }

    /**
     * Get Flavor Params by Conversion Profile ID
     * @param int $conversionprofileid - conversion profile id.
     * @return array - array of flavor params.
     */
    public function getByConversionProfileId($conversionprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->queueServiceActionCall("flavorparams", "getByConversionProfileId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * List Flavor Params by filter with paging support (By default - all system default params will be listed too)
     * @param KalturaFlavorParamsFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaFlavorParamsListResponse - list of flavor params.
     */
    public function listAction(KalturaFlavorParamsFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("flavorparams", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParamsListResponse");
        return $resultobject;
    }

    /**
     * Update Flavor Params by ID
     * @param int $id - flavor params id.
     * @param KalturaFlavorParams $flavorparams - flavor params object to update.
     * @return KalturaFlavorParams - flavor params object after update.
     */
    public function update($id, KalturaFlavorParams $flavorparams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "flavorParams", $flavorparams->toParams());
        $this->client->queueServiceActionCall("flavorparams", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorParams");
        return $resultobject;
    }
}

/**
 * Kaltura Group User Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaGroupUserService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Group User Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new GroupUser.
     * @param KalturaGroupUser $groupuser - group user.
     * @return KalturaGroupUser - group user object.
     */
    public function add(KalturaGroupUser $groupuser) {
        $kparams = array();
        $this->client->addParam($kparams, "groupUser", $groupuser->toParams());
        $this->client->queueServiceActionCall("groupuser", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGroupUser");
        return $resultobject;
    }

    /**
     * Delete by userId and groupId
     * @param string $userid - id of user.
     * @param string $groupid - id of group.
     */
    public function delete($userid, $groupid) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "groupId", $groupid);
        $this->client->queueServiceActionCall("groupuser", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * List all GroupUsers.
     * @param KalturaGroupUserFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaGroupUserListResponse - list of group user.
     */
    public function listAction(KalturaGroupUserFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("groupuser", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaGroupUserListResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Live Channel Segment Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelSegmentService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Live Channel Segment Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new live channel segment.
     * @param KalturaLiveChannelSegment $livechannelsegment - live channel segment object to add.
     * @return KalturaLiveChannelSegment - live channel segment object after add.
     */
    public function add(KalturaLiveChannelSegment $livechannelsegment) {
        $kparams = array();
        $this->client->addParam($kparams, "liveChannelSegment", $livechannelsegment->toParams());
        $this->client->queueServiceActionCall("livechannelsegment", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannelSegment");
        return $resultobject;
    }

    /**
     * Delete live channel segment by id
     * @param int $id - id of live channel segment.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livechannelsegment", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get live channel segment by id
     * @param int $id - id of live channel segment.
     * @return KalturaLiveChannelSegment - live channel segment object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livechannelsegment", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannelSegment");
        return $resultobject;
    }

    /**
     * List live channel segments by filter and pager
     * @param KalturaLiveChannelSegmentFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaLiveChannelSegmentListResponse - list of live channel segment.
     */
    public function listAction(KalturaLiveChannelSegmentFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("livechannelsegment", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannelSegmentListResponse");
        return $resultobject;
    }

    /**
     * Update live channel segment by id.
     * @param bigint $id - id of live channel segment.
     * @param KalturaLiveChannelSegment $livechannelsegment - live channel segment object.
     * @return KalturaLiveChannelSegment - live channel segment object.
     */
    public function update($id, KalturaLiveChannelSegment $livechannelsegment) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "liveChannelSegment", $livechannelsegment->toParams());
        $this->client->queueServiceActionCall("livechannelsegment", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannelSegment");
        return $resultobject;
    }
}

/**
 * Kaltura Live Channel Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveChannelService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Live Channel Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds new live channel.
     * @param KalturaLiveChannel $livechannel - Live channel metadata
     * @return KalturaLiveChannel - live channel object.
     */
    public function add(KalturaLiveChannel $livechannel) {
        $kparams = array();
        $this->client->addParam($kparams, "liveChannel", $livechannel->toParams());
        $this->client->queueServiceActionCall("livechannel", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannel");
        return $resultobject;
    }

    /**
     * Append recorded video to live entry.
     * @param string $entryid - Live entry id
     * @param string $assetid - Live asset id
     * @param string $mediaserverindex - media server index.
     * @param KalturaDataCenterContentResource $resource - content resource.
     * @param float $duration - duration in seconds.
     * @param bool $islastchunk - Is this the last recorded chunk in the current session (i.e. following a stream stop event).
     * @return KalturaLiveEntry - live entry object.
     */
    public function appendRecording($entryid, $assetid, $mediaserverindex, KalturaDataCenterContentResource $resource,
                                    $duration, $islastchunk = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->addParam($kparams, "isLastChunk", $islastchunk);
        $this->client->queueServiceActionCall("livechannel", "appendRecording", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Create recorded entry id if it doesn't exist and make sure it happens on the DC that the live entry was created on.
     * @param string $entryid - Live entry id
     * @param string $mediaserverindex - Media server index primary / secondary.
     * @param int $liveentrystatus - The status KalturaEntryServerNodeStatus::PLAYABLE | KalturaEntryServerNodeStatus::BROADCASTING.
     * @return KalturaLiveEntry - live entry object.
     */
    public function createRecordedEntry($entryid, $mediaserverindex, $liveentrystatus) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "liveEntryStatus", $liveentrystatus);
        $this->client->queueServiceActionCall("livechannel", "createRecordedEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Delete a live channel.
     * @param string $id - Live channel id to delete
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livechannel", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get live channel by ID.
     * @param string $id - Live channel id.
     * @return KalturaLiveChannel - live channel object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livechannel", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannel");
        return $resultobject;
    }

    /**
     * Delivering the status of a live channel (on-air/offline)
     * @param string $id - ID of the live channel
     * @return bool - whether it is live entry.
     */
    public function isLive($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livechannel", "isLive", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * List live channels by filter with paging support.
     * @param KalturaLiveChannelFilter $filter - Live channel filter
     * @param KalturaFilterPager $pager - Pager
     * @return KalturaLiveChannelListResponse - list of live channel object.
     */
    public function listAction(KalturaLiveChannelFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("livechannel", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannelListResponse");
        return $resultobject;
    }

    /**
     * Register media server to live entry.
     * @param string $entryid - Live entry id
     * @param string $hostname - Media server host name.
     * @param string $mediaserverindex - Media server index primary / secondary.
     * @param string $applicationname - The application to which entry is being broadcast.
     * @param int $liveentrystatus - KalturaEntryServerNodeStatus::PLAYABLE | KalturaEntryServerNodeStatus::BROADCASTING.
     * @param bool $shouldcreaterecordedentry - wheter crate recorded entry.
     * @return KalturaLiveEntry - live entry object.
     */
    public function registerMediaServer($entryid, $hostname, $mediaserverindex, $applicationname = null, $liveentrystatus = 1,
                                        $shouldcreaterecordedentry = true) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "hostname", $hostname);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "applicationName", $applicationname);
        $this->client->addParam($kparams, "liveEntryStatus", $liveentrystatus);
        $this->client->addParam($kparams, "shouldCreateRecordedEntry", $shouldcreaterecordedentry);
        $this->client->queueServiceActionCall("livechannel", "registerMediaServer", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Set recorded video to live entry
     * @param string $entryid - Live entry id
     * @param string $mediaserverindex - media server index.
     * @param KalturaDataCenterContentResource $resource - content resource.
     * @param float $duration - duration in seconds.
     * @param string $recordedentryid - recorded entry id
     * @param int $flavorparamsid - Recorded entry Id
     * @return KalturaLiveEntry
     */
    public function setRecordedContent($entryid, $mediaserverindex, KalturaDataCenterContentResource $resource, $duration,
                                       $recordedentryid = null, $flavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->addParam($kparams, "recordedEntryId", $recordedentryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("livechannel", "setRecordedContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Unregister media server from live entry.
     * @param string $entryid - Live entry id.
     * @param string $hostname - Media server host name.
     * @param string $mediaserverindex - Media server index primary / secondary.
     * @return KalturaLiveEntry - live entry object.
     */
    public function unregisterMediaServer($entryid, $hostname, $mediaserverindex) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "hostname", $hostname);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->queueServiceActionCall("livechannel", "unregisterMediaServer", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Update live channel. Only the properties that were set will be updated.
     * @param string $id - Live channel id to update.
     * @param KalturaLiveChannel $livechannel - Live channel metadata to update.
     * @return KalturaLiveChannel - live channel object.
     */
    public function update($id, KalturaLiveChannel $livechannel) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "liveChannel", $livechannel->toParams());
        $this->client->queueServiceActionCall("livechannel", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveChannel");
        return $resultobject;
    }

    /**
     * Validates all registered media servers
     * @param string $entryid - Live entry id.
     */
    public function validateRegisteredMediaServers($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("livechannel", "validateRegisteredMediaServers", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura Client Live Reports Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveReportsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Live Reports Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Export live reports to CSV file.
     * @param int $reporttype - report type.
     * @param KalturaLiveReportExportParams $params - live report export params.
     * @return KalturaLiveReportExportResponse -  live report export.
     */
    public function exportToCsv($reporttype, KalturaLiveReportExportParams $params) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "params", $params->toParams());
        $this->client->queueServiceActionCall("livereports", "exportToCsv", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveReportExportResponse");
        return $resultobject;
    }

    /**
     * Get events.
     * @param string $reporttype - report type.
     * @param KalturaLiveReportInputFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return array - array of events of live report.
     */
    public function getEvents($reporttype, KalturaLiveReportInputFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("livereports", "getEvents", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get report.
     * @param string $reporttype - report type.
     * @param KalturaLiveReportInputFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaLiveStatsListResponse - list of live stats.
     */
    public function getReport($reporttype, KalturaLiveReportInputFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("livereports", "getReport", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStatsListResponse");
        return $resultobject;
    }

    /**
     * Will serve a requested report.
     * @param string $id - the requested id.
     * @return string - report status.
     */
    public function serveReport($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("livereports", "serveReport", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }
}

/**
 * Kaltura Live Stats Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStatsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Live Stats Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Will write to the event log a single line representing the event.
     * KalturaStatsEvent $event.
     * @param KalturaLiveStatsEvent $event - live stats event.
     * @return bool - log writer status.
     */
    public function collect(KalturaLiveStatsEvent $event) {
        $kparams = array();
        $this->client->addParam($kparams, "event", $event->toParams());
        $this->client->queueServiceActionCall("livestats", "collect", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }
}

/**
 * Kaltura Live Stream Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Live Stream Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds new live stream entry.
     * The entry will be queued for provision.
     * @param KalturaLiveStreamEntry $livestreamentry - Live stream entry metadata.
     * @param string $sourcetype - Live stream source type.
     * @return KalturaLiveStreamEntry - live stream entry object.
     */
    public function add(KalturaLiveStreamEntry $livestreamentry, $sourcetype = null) {
        $kparams = array();
        $this->client->addParam($kparams, "liveStreamEntry", $livestreamentry->toParams());
        $this->client->addParam($kparams, "sourceType", $sourcetype);
        $this->client->queueServiceActionCall("livestream", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Add new pushPublish configuration to entry
     * @param string $entryid - id of media entry.
     * @param string $protocol - ptorocol.
     * @param string $url - url string.
     * @param KalturaLiveStreamConfiguration $livestreamconfiguration - live stream configuration.
     * @return KalturaLiveStreamEntry - live stream entry.
     */
    public function addLiveStreamPushPublishConfiguration($entryid, $protocol, $url = null,
                                                          KalturaLiveStreamConfiguration $livestreamconfiguration = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "protocol", $protocol);
        $this->client->addParam($kparams, "url", $url);
        if ($livestreamconfiguration !== null) {
            $this->client->addParam($kparams, "liveStreamConfiguration", $livestreamconfiguration->toParams());
        }
        $this->client->queueServiceActionCall("livestream", "addLiveStreamPushPublishConfiguration", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Append recorded video to live entry.
     * @param string $entryid - Live entry id.
     * @param string $assetid - Live asset id.
     * @param string $mediaserverindex - media server index.
     * @param KalturaDataCenterContentResource $resource - content resource.
     * @param float $duration - duration time in seconds.
     * @param bool $islastchunk - Is this the last recorded chunk in the current session (i.e. following a stream stop event).
     * @return KalturaLiveEntry - live entry object.
     */
    public function appendRecording($entryid, $assetid, $mediaserverindex, KalturaDataCenterContentResource $resource,
                                    $duration, $islastchunk = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->addParam($kparams, "isLastChunk", $islastchunk);
        $this->client->queueServiceActionCall("livestream", "appendRecording", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Authenticate live-stream entry against stream token and partner limitations
     * @param string $entryid - Live stream entry id
     * @param string $token - Live stream broadcasting token
     * @param string $hostname - Media server host name
     * @param string $mediaserverindex - Media server index primary / secondary
     * @param string $applicationname - The application to which entry is being broadcast
     * @return KalturaLiveStreamEntry - live stream entry object.
     */
    public function authenticate($entryid, $token, $hostname = null, $mediaserverindex = null, $applicationname = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "token", $token);
        $this->client->addParam($kparams, "hostname", $hostname);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "applicationName", $applicationname);
        $this->client->queueServiceActionCall("livestream", "authenticate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Creates perioding metadata sync-point events on a live stream
     * @param string $entryid - Kaltura live-stream entry id.
     * @param int $interval - Events interval in seconds.
     * @param int $duration - time duration in seconds.
     */
    public function createPeriodicSyncPoints($entryid, $interval, $duration) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "interval", $interval);
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->queueServiceActionCall("livestream", "createPeriodicSyncPoints", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Create recorded entry id if it doesn't exist and make sure it happens on the DC that the live entry was created on.
     * @param string $entryid - Live entry id
     * @param string $mediaserverindex - Media server index primary / secondary
     * @param int $liveentrystatus - The status KalturaEntryServerNodeStatus::PLAYABLE | KalturaEntryServerNodeStatus::BROADCASTING
     * @return KalturaLiveEntry - live entry object.
     */
    public function createRecordedEntry($entryid, $mediaserverindex, $liveentrystatus) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "liveEntryStatus", $liveentrystatus);
        $this->client->queueServiceActionCall("livestream", "createRecordedEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Delete a live stream entry.
     * @param string $entryid - Live stream entry id to delete
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("livestream", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get live stream entry by ID.
     * @param string $entryid - Live stream entry id
     * @param int $version - Desired version of the data
     * @return KalturaLiveStreamEntry - live stream entry object.
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("livestream", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Delivering the status of a live stream (on-air/offline) if it is possible.
     * @param string $id - ID of the live stream.
     * @param string $protocol - Protocol of the stream to test.
     * @return bool - whether entry is live.
     */
    public function isLive($id, $protocol) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "protocol", $protocol);
        $this->client->queueServiceActionCall("livestream", "isLive", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * List live stream entries by filter with paging support.
     * @param KalturaLiveStreamEntryFilter $filter - Live stream entry filter
     * @param KalturaFilterPager $pager - Pager
     * @return KalturaLiveStreamListResponse - list of live stream object.
     */
    public function listAction(KalturaLiveStreamEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("livestream", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamListResponse");
        return $resultobject;
    }

    /**
     * Regenerate new secure token for liveStream.
     * @param string $entryid - Live stream entry id to regenerate secure token for
     */
    public function regenerateStreamToken($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("livestream", "regenerateStreamToken", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Register media server to live entry.
     * @param string $entryid - Live entry id
     * @param string $hostname - Media server host name
     * @param string $mediaserverindex - Media server index primary / secondary
     * @param string $applicationname - The application to which entry is being broadcast
     * @param int $liveentrystatus - The status KalturaEntryServerNodeStatus::PLAYABLE | KalturaEntryServerNodeStatus::BROADCASTING
     * @param bool $shouldcreaterecordedentry - whether should create recorded entry.
     * @return KalturaLiveEntry - live entry object.
     */
    public function registerMediaServer($entryid, $hostname, $mediaserverindex, $applicationname = null, $liveentrystatus = 1,
                                        $shouldcreaterecordedentry = true) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "hostname", $hostname);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "applicationName", $applicationname);
        $this->client->addParam($kparams, "liveEntryStatus", $liveentrystatus);
        $this->client->addParam($kparams, "shouldCreateRecordedEntry", $shouldcreaterecordedentry);
        $this->client->queueServiceActionCall("livestream", "registerMediaServer", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Remove push publish configuration from entry
     * @param string $entryid - media entry id.
     * @param string $protocol - protocol.
     * @return KalturaLiveStreamEntry - live stream entry.
     */
    public function removeLiveStreamPushPublishConfiguration($entryid, $protocol) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "protocol", $protocol);
        $this->client->queueServiceActionCall("livestream", "removeLiveStreamPushPublishConfiguration", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Set recorded video to live entry.
     * @param string $entryid - Live entry id
     * @param string $mediaserverindex - media server index.
     * @param KalturaDataCenterContentResource $resource - content resource.
     * @param float $duration - time duration in seconds
     * @param string $recordedentryid - Recorded entry Id.
     * @param int $flavorparamsid - Recorded entry Id.
     * @return KalturaLiveEntry - live entry.
     */
    public function setRecordedContent($entryid, $mediaserverindex, KalturaDataCenterContentResource $resource, $duration,
                                       $recordedentryid = null, $flavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "duration", $duration);
        $this->client->addParam($kparams, "recordedEntryId", $recordedentryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("livestream", "setRecordedContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Unregister media server from live entry
     * @param string $entryid  - Live entry id
     * @param string $hostname - Media server host name
     * @param string $mediaserverindex - Media server index primary / secondary
     * @return KalturaLiveEntry - live entry object.
     */
    public function unregisterMediaServer($entryid, $hostname, $mediaserverindex) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "hostname", $hostname);
        $this->client->addParam($kparams, "mediaServerIndex", $mediaserverindex);
        $this->client->queueServiceActionCall("livestream", "unregisterMediaServer", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveEntry");
        return $resultobject;
    }

    /**
     * Update live stream entry. Only the properties that were set will be updated.
     * @param string $entryid - Live stream entry id to update
     * @param KalturaLiveStreamEntry $livestreamentry - Live stream entry metadata to update
     * @return KalturaLiveStreamEntry - live stream entry.
     */
    public function update($entryid, KalturaLiveStreamEntry $livestreamentry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "liveStreamEntry", $livestreamentry->toParams());
        $this->client->queueServiceActionCall("livestream", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Update entry thumbnail using url.
     * @param string $entryid - Live stream entry id
     * @param string $url - File url
     * @return KalturaLiveStreamEntry - live stream entry object.
     */
    public function updateOfflineThumbnailFromUrl($entryid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("livestream", "updateOfflineThumbnailFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Update live stream entry thumbnail using a raw jpeg file.
     * @param string $entryid - Live stream entry id.
     * @param file $filedata - Jpeg file data.
     * @return KalturaLiveStreamEntry.
     */
    public function updateOfflineThumbnailJpeg($entryid, $filedata) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("livestream", "updateOfflineThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    /**
     * Validates all registered media servers.
     * @param string $entryid - Live entry id.
     */
    public function validateRegisteredMediaServers($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("livestream", "validateRegisteredMediaServers", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura MediaInfor Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaInfoService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura MediaInfo Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * List media info objects by filter and pager.
     * @param KalturaMediaInfoFilter $filter - filter pbject
     * @param KalturaFilterPager $pager - pager object
     * @return KalturaMediaInfoListResponse - list of mediainfo.
     */
    public function listAction(KalturaMediaInfoFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("mediainfo", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaInfoListResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Media Entry Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Media Entry Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add entry.
     * @param KalturaMediaEntry $entry - media entry object to add.
     * @return KalturaMediaEntry - media entry object after add.
     */
    public function add(KalturaMediaEntry $entry) {
        $kparams = array();
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->queueServiceActionCall("media", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Add content to media entry which is not yet associated with content (therefore is in status NO_CONTENT).
     * If the requirement is to replace the entry's associated content, use action updateContent.
     * @param string $entryid - id of media entry.
     * @param KalturaResource $resource - resource object.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addContent($entryid, KalturaResource $resource = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        if ($resource !== null) {
            $this->client->addParam($kparams, "resource", $resource->toParams());
        }
        $this->client->queueServiceActionCall("media", "addContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Adds new media entry by importing an HTTP or FTP URL.
     * The entry will be queued for import and then for conversion.
     * This action should be exposed only to the batches
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @param string $url - An HTTP or FTP URL
     * @param int $bulkuploadid - The id of the bulk upload job
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromBulk(KalturaMediaEntry $mediaentry, $url, $bulkuploadid) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->addParam($kparams, "url", $url);
        $this->client->addParam($kparams, "bulkUploadId", $bulkuploadid);
        $this->client->queueServiceActionCall("media", "addFromBulk", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Copy entry into new entry
     * @param string $sourceentryid - Media entry id to copy from.
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @param int $sourceflavorparamsid - The flavor to be used as the new entry source.
     * @return KalturaMediaEntry - media entry object after copy.
     */
    public function addFromEntry($sourceentryid, KalturaMediaEntry $mediaentry = null, $sourceflavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        if ($mediaentry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $sourceflavorparamsid);
        $this->client->queueServiceActionCall("media", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Copy flavor asset into new entry.
     * @param string $sourceflavorassetid - Flavor asset id to be used as the new entry source.
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromFlavorAsset($sourceflavorassetid, KalturaMediaEntry $mediaentry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $sourceflavorassetid);
        if ($mediaentry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        }
        $this->client->queueServiceActionCall("media", "addFromFlavorAsset", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Add new entry after the file was recored on the server and the token id exists.
     * @param KalturaMediaEntry $mediaentry - Media entry metadata
     * @param string $webcamtokenid - Token id for the recored webcam file
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromRecordedWebcam(KalturaMediaEntry $mediaentry, $webcamtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->addParam($kparams, "webcamTokenId", $webcamtokenid);
        $this->client->queueServiceActionCall("media", "addFromRecordedWebcam", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Adds new media entry by importing the media file from a search provider.
     * This action should be used with the search service result.
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @param KalturaSearchResult $searchresult - Result object from search service.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromSearchResult(KalturaMediaEntry $mediaentry = null, KalturaSearchResult $searchresult = null) {
        $kparams = array();
        if ($mediaentry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        }
        if ($searchresult !== null) {
            $this->client->addParam($kparams, "searchResult", $searchresult->toParams());
        }
        $this->client->queueServiceActionCall("media", "addFromSearchResult", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Add new entry after the specific media file was uploaded and the upload token id exists
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @param string $uploadtokenid - Upload token id.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromUploadedFile(KalturaMediaEntry $mediaentry, $uploadtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->queueServiceActionCall("media", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Adds new media entry by importing an HTTP or FTP URL.
     * The entry will be queued for import and then for conversion.
     * @param KalturaMediaEntry $mediaentry - Media entry metadata.
     * @param string $url - An HTTP or FTP URL.
     * @return KalturaMediaEntry - media entry object.
     */
    public function addFromUrl(KalturaMediaEntry $mediaentry, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("media", "addFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Anonymously rank a media entry, no validation is done on duplicate rankings.
     * @param string $entryid - id of media entry.
     * @param int $rank - ranking.
     */
    public function anonymousRank($entryid, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "rank", $rank);
        $this->client->queueServiceActionCall("media", "anonymousRank", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Approve the media entry and mark the pending flags (if any) as moderated (this will make the entry playable).
     * @param string $entryid - id of media entry.
     */
    public function approve($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "approve", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Approves media replacement.
     * @param string $entryid - Media entry id to replace
     * @return KalturaMediaEntry - media entry object.
     */
    public function approveReplace($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "approveReplace", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Add new bulk upload batch job.
     * Conversion profile id can be specified in the API or in the CSV file, the one in the CSV file will be stronger.
     * If no conversion profile was specified, partner's default will be used.
     * @param file $filedata - file data.
     * @param KalturaBulkUploadJobData $bulkuploaddata - bulkupload data object.
     * @param KalturaBulkUploadEntryData $bulkuploadentrydata - bulkupload entry data.
     * @return KalturaBulkUpload - bulkupload entry object.
     */
    public function bulkUploadAdd($filedata, KalturaBulkUploadJobData $bulkuploaddata = null,
                                  KalturaBulkUploadEntryData $bulkuploadentrydata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        if ($bulkuploadentrydata !== null) {
            $this->client->addParam($kparams, "bulkUploadEntryData", $bulkuploadentrydata->toParams());
        }
        $this->client->queueServiceActionCall("media", "bulkUploadAdd", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Cancels media replacement.
     * @param string $entryid - Media entry id to cancel.
     * @return KalturaMediaEntry - media entry object.
     */
    public function cancelReplace($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "cancelReplace", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Convert entry.
     * @param string $entryid - Media entry id
     * @param int $conversionprofileid - id of conversion profile.
     * @param array $dynamicconversionattributes - dynamic conversion attributes.
     * @return int - conversion status.
     */
    public function convert($entryid, $conversionprofileid = null, array $dynamicconversionattributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        if ($dynamicconversionattributes !== null) {
            foreach ($dynamicconversionattributes as $index => $obj) {
                $this->client->addParam($kparams, "dynamicConversionAttributes:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("media", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "double");
        return $resultobject;
    }

    /**
     * Count media entries by filter.
     * @param KalturaMediaEntryFilter $filter - Media entry filter
     * @return int - number of media entries.
     */
    public function count(KalturaMediaEntryFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("media", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete a media entry.
     * @param string $entryid - Media entry id to delete
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Flag inappropriate media entry for moderation.
     * @param KalturaModerationFlag $moderationflag - moderation flag.
     */
    public function flag(KalturaModerationFlag $moderationflag) {
        $kparams = array();
        $this->client->addParam($kparams, "moderationFlag", $moderationflag->toParams());
        $this->client->queueServiceActionCall("media", "flag", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get media entry by ID.
     * @param string $entryid - Media entry id.
     * @param int $version - Desired version of the data.
     * @return KalturaMediaEntry - media entry.
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("media", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Get MRSS by entry id.
     * XML will return as an escaped string.
     * @param string $entryid - Entry id.
     * @param array $extendingitemsarray - array of extending items.
     * @param string $features - features.
     * @return string - mrss.
     */
    public function getMrss($entryid, array $extendingitemsarray = null, $features = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        if ($extendingitemsarray !== null) {
            foreach ($extendingitemsarray as $index => $obj) {
                $this->client->addParam($kparams, "extendingItemsArray:$index", $obj->toParams());
            }
        }
        $this->client->addParam($kparams, "features", $features);
        $this->client->queueServiceActionCall("media", "getMrss", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Get volume map by entry id.
     * @param string $entryid - Entry id.
     * @return file - file object.
     */
    public function getVolumeMap($entryid) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "getVolumeMap", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * List media entries by filter with paging support.
     * @param KalturaMediaEntryFilter $filter - Media entry filter.
     * @param KalturaFilterPager $pager - Pager.
     * @return KalturaMediaListResponse - list of media entry.
     */
    public function listAction(KalturaMediaEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("media", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaListResponse");
        return $resultobject;
    }

    /**
     * List all pending flags for the media entry
     * @param string $entryid - if od media entry,
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaModerationFlagListResponse - list of moderation flag.
     */
    public function listFlags($entryid, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("media", "listFlags", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaModerationFlagListResponse");
        return $resultobject;
    }

    /**
     * Reject the media entry and mark the pending flags (if any) as moderated (this will make the entry non playable)
     * @param string $entryid - id of media entry.
     */
    public function reject($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("media", "reject", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Request a new conversion job, this can be used to convert the media entry to a different format.
     * @param string $entryid - Media entry id.
     * @param string $fileformat - Format to convert
     * @return int - conversion status.
     */
    public function requestConversion($entryid, $fileformat) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "fileFormat", $fileformat);
        $this->client->queueServiceActionCall("media", "requestConversion", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Update media entry. Only the properties that were set will be updated.
     * @param string $entryid - Media entry id to update
     * @param KalturaMediaEntry $mediaentry - Media entry metadata to update
     * @return KalturaMediaEntry - media entry object.
     */
    public function update($entryid, KalturaMediaEntry $mediaentry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mediaEntry", $mediaentry->toParams());
        $this->client->queueServiceActionCall("media", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Replace content associated with the media entry.
     * @param string $entryid - Media entry id to update.
     * @param KalturaResource $resource - Resource to be used to replace entry media content.
     * @param int $conversionprofileid The - conversion profile id to be used on the entry.
     * @param KalturaEntryReplacementOptions $advancedoptions Additional update content options.
     * @return KalturaMediaEntry
     */
    public function updateContent($entryid, KalturaResource $resource, $conversionprofileid = null,
                                  KalturaEntryReplacementOptions $advancedoptions = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        if ($advancedoptions !== null) {
            $this->client->addParam($kparams, "advancedOptions", $advancedoptions->toParams());
        }
        $this->client->queueServiceActionCall("media", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Update media entry thumbnail by a specified time offset (In seconds)
     * If flavor params id not specified, source flavor will be used by default
     * @param string $entryid - Media entry id.
     * @param int $timeoffset - Time offset (in seconds).
     * @param int $flavorparamsid - The flavor params id to be used.
     * @return KalturaMediaEntry - media entry object.
     */
    public function updateThumbnail($entryid, $timeoffset, $flavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "timeOffset", $timeoffset);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("media", "updateThumbnail", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Update media entry thumbnail from a different entry by a specified time offset (In seconds).
     * If flavor params id not specified, source flavor will be used by default.
     * @param string $entryid - Media entry id.
     * @param string $sourceentryid - Media entry id.
     * @param int $timeoffset - Time offset (in seconds)
     * @param int $flavorparamsid - The flavor params id to be used
     * @return KalturaMediaEntry - media entry object.
     */
    public function updateThumbnailFromSourceEntry($entryid, $sourceentryid, $timeoffset, $flavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        $this->client->addParam($kparams, "timeOffset", $timeoffset);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("media", "updateThumbnailFromSourceEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Update entry thumbnail using url.
     * @param string $entryid - Media entry id.
     * @param string $url - File url of thumbnail.
     * @return KalturaBaseEntry - base entry object.
     */
    public function updateThumbnailFromUrl($entryid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("media", "updateThumbnailFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    /**
     * Update media entry thumbnail using a raw jpeg file.
     * @param string $entryid - Media entry id.
     * @param file $filedata - Jpeg file data.
     * @return KalturaMediaEntry - media entry object.
     */
    public function updateThumbnailJpeg($entryid, $filedata) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("media", "updateThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    /**
     * Upload a media file to Kaltura, then the file can be used to create a media entry.
     * @param file $filedata - The file data.
     * @return string - upload status.
     */
    public function upload($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("media", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }
}

/**
 * Kaltura Mixing Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixingService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Mixing Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new mix.
     * If the dataContent is null, a default timeline will be created.
     * @param KalturaMixEntry $mixentry - Mix entry metadata to add.
     * @return KalturaMixEntry - mixe entry object after add.
     */
    public function add(KalturaMixEntry $mixentry) {
        $kparams = array();
        $this->client->addParam($kparams, "mixEntry", $mixentry->toParams());
        $this->client->queueServiceActionCall("mixing", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    /**
     * Anonymously rank a mix entry, no validation is done on duplicate rankings
     * @param string $entryid - id of media entry.
     * @param int $rank - ranking.
     */
    public function anonymousRank($entryid, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "rank", $rank);
        $this->client->queueServiceActionCall("mixing", "anonymousRank", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Appends a media entry to a the end of the mix timeline, this will save the mix timeline as a new version.
     * @param string $mixentryid - Mix entry to append to its timeline.
     * @param string $mediaentryid - Media entry to append to the timeline.
     * @return KalturaMixEntry - mix entry object.
     */
    public function appendMediaEntry($mixentryid, $mediaentryid) {
        $kparams = array();
        $this->client->addParam($kparams, "mixEntryId", $mixentryid);
        $this->client->addParam($kparams, "mediaEntryId", $mediaentryid);
        $this->client->queueServiceActionCall("mixing", "appendMediaEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    /**
     * Clones an existing mix.
     * @param string $entryid - Mix entry id to clone.
     * @return KalturaMixEntry - mix entry object.
     */
    public function cloneAction($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("mixing", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    /**
     * Count mix entries by filter.
     * @param KalturaMediaEntryFilter $filter - Media entry filter
     * @return int - number of media entries.
     */
    public function count(KalturaMediaEntryFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("mixing", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete a mix entry.
     * @param string $entryid - Mix entry id to delete.
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("mixing", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get mix entry by id.
     * @param string $entryid - Mix entry id.
     * @param int $version - Desired version of the data.
     * @return KalturaMixEntry - Mix entry object.
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("mixing", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    /**
     * Get the mixes in which the media entry is included.
     * @param string $mediaentryid - media entry id.
     * @return array - array of media entry.
     */
    public function getMixesByMediaId($mediaentryid) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntryId", $mediaentryid);
        $this->client->queueServiceActionCall("mixing", "getMixesByMediaId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get all ready media entries that exist in the given mix id.
     * @param string $mixid - mix entry id.
     * @param int $version - Desired version to get the data from
     * @return array - array of media entry.
     */
    public function getReadyMediaEntries($mixid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "mixId", $mixid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("mixing", "getReadyMediaEntries", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * List entries by filter with paging support.
     * Return parameter is an array of mix entries.
     * @param KalturaMixEntryFilter $filter - Mix entry filter.
     * @param KalturaFilterPager $pager - Pager.
     * @return KalturaMixListResponse - list of mix entry object.
     */
    public function listAction(KalturaMixEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("mixing", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixListResponse");
        return $resultobject;
    }

    /**
     * Update mix entry. Only the properties that were set will be updated.
     * @param string $entryid - Mix entry id to update
     * @param KalturaMixEntry $mixentry - Mix entry metadata to update.
     * @return KalturaMixEntry - mix entry object.
     */
    public function update($entryid, KalturaMixEntry $mixentry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "mixEntry", $mixentry->toParams());
        $this->client->queueServiceActionCall("mixing", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }
}

/**
 * Kaltura Notification Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Notification Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Return the notifications for a specific entry id and type
     * @param string $entryid - id of media entry.
     * @param int $type - entry type.
     * @return KalturaClientNotification - notification object.
     */
    public function getClientNotification($entryid, $type) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall("notification", "getClientNotification", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaClientNotification");
        return $resultobject;
    }
}

/**
 * Kaltura Partner Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Partner Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Count partner's existing sub-publishers (count includes the partner itself).
     * @param KalturaPartnerFilter $filter - filter object.
     * @return int - number of media entry.
     */
    public function count(KalturaPartnerFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("partner", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Retrieve partner object by Id.
     * @param int $id - id of media entry.
     * @return KalturaPartner - partner object.
     */
    public function get($id = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("partner", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    /**
     * Retrieve all info attributed to the partner.
     * This action expects no parameters. It returns information for the current KS partnerId.
     * @return KalturaPartner - partner object.
     */
    public function getInfo() {
        $kparams = array();
        $this->client->queueServiceActionCall("partner", "getInfo", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    /**
     * Retrieve partner secret and admin secret.
     * @param int $partnerid - partner id.
     * @param string $adminemail - admin email.
     * @param string $cmspassword - cms password.
     * @return KalturaPartner - partner object.
     */
    public function getSecrets($partnerid, $adminemail, $cmspassword) {
        $kparams = array();
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "adminEmail", $adminemail);
        $this->client->addParam($kparams, "cmsPassword", $cmspassword);
        $this->client->queueServiceActionCall("partner", "getSecrets", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    /**
     * Get usage statistics for a partner.
     * Calculation is done according to partner's package.
     * @return KalturaPartnerStatistics - partner statistics.
     */
    public function getStatistics() {
        $kparams = array();
        $this->client->queueServiceActionCall("partner", "getStatistics", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartnerStatistics");
        return $resultobject;
    }

    /**
     * Get usage statistics for a partner.
     * Calculation is done according to partner's package.
     * Additional data returned is a graph points of streaming usage in a timeframe.
     * The resolution can be "days" or "months".
     * @param int $year - year.
     * @param int $month - month.
     * @param string $resolution - resolution.
     * @return KalturaPartnerUsage - partner usage.
     */
    public function getUsage($year = "", $month = 1, $resolution = null) {
        $kparams = array();
        $this->client->addParam($kparams, "year", $year);
        $this->client->addParam($kparams, "month", $month);
        $this->client->addParam($kparams, "resolution", $resolution);
        $this->client->queueServiceActionCall("partner", "getUsage", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartnerUsage");
        return $resultobject;
    }

    /**
     * List partners by filter with paging support
     * Current implementation will only list the sub partners of the partner initiating the api call (using the current KS).
     * This action is only partially implemented to support listing sub partners of a VAR partner.
     * @param KalturaPartnerFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaPartnerListResponse - list of partner object.
     */
    public function listAction(KalturaPartnerFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("partner", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartnerListResponse");
        return $resultobject;
    }

    /**
     * List partner's current processes' statuses.
     * @return KalturaFeatureStatusListResponse - list of fearure status.
     */
    public function listFeatureStatus() {
        $kparams = array();
        $this->client->queueServiceActionCall("partner", "listFeatureStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFeatureStatusListResponse");
        return $resultobject;
    }

    /**
     * Retrieve a list of partner objects which the current user is allowed to access.
     * @param KalturaPartnerFilter $partnerfilter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaPartnerListResponse - list of partner.
     */
    public function listPartnersForUser(KalturaPartnerFilter $partnerfilter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($partnerfilter !== null) {
            $this->client->addParam($kparams, "partnerFilter", $partnerfilter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("partner", "listPartnersForUser", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartnerListResponse");
        return $resultobject;
    }

    /**
     * Create a new Partner object
     * @param KalturaPartner $partner - partner object.
     * @param string $cmspassword - cms password.
     * @param int $templatepartnerid - template partner id.
     * @param bool $silent - whether slitent mode.
     * @return KalturaPartner - partner object.
     */
    public function register(KalturaPartner $partner, $cmspassword = "", $templatepartnerid = null, $silent = false) {
        $kparams = array();
        $this->client->addParam($kparams, "partner", $partner->toParams());
        $this->client->addParam($kparams, "cmsPassword", $cmspassword);
        $this->client->addParam($kparams, "templatePartnerId", $templatepartnerid);
        $this->client->addParam($kparams, "silent", $silent);
        $this->client->queueServiceActionCall("partner", "register", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    /**
     * Update details and settings of an existing partner
     * @param KalturaPartner $partner - partner object.
     * @param bool $allowempty - allow empty.
     * @return KalturaPartner - partner object.
     */
    public function update(KalturaPartner $partner, $allowempty = false) {
        $kparams = array();
        $this->client->addParam($kparams, "partner", $partner->toParams());
        $this->client->addParam($kparams, "allowEmpty", $allowempty);
        $this->client->queueServiceActionCall("partner", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }
}

/**
 * Kaltura Permission Item Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Permission Item Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new permission item object to the account.
     * This action is available only to Kaltura system administrators.
     * @param KalturaPermissionItem $permissionitem - The new permission item to add.
     * @return KalturaPermissionItem - permission item object after add.
     */
    public function add(KalturaPermissionItem $permissionitem) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItem", $permissionitem->toParams());
        $this->client->queueServiceActionCall("permissionitem", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    /**
     * Deletes an existing permission item object.
     * This action is available only to Kaltura system administrators.
     * @param int $permissionitemid - The permission item's unique identifier.
     * @return KalturaPermissionItem - permission item object.
     */
    public function delete($permissionitemid) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionitemid);
        $this->client->queueServiceActionCall("permissionitem", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    /**
     * Retrieves a permission item object using its ID.
     * @param int $permissionitemid - The permission item's unique identifier.
     * @return KalturaPermissionItem - permission item object.
     */
    public function get($permissionitemid) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionitemid);
        $this->client->queueServiceActionCall("permissionitem", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    /**
     * Lists permission item objects that are associated with an account.
     * @param KalturaPermissionItemFilter $filter - A filter used to exclude specific types of permission items.
     * @param KalturaFilterPager $pager - A limit for the number of records to display on a page.
     * @return KalturaPermissionItemListResponse - list of permission item.
     */
    public function listAction(KalturaPermissionItemFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("permissionitem", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItemListResponse");
        return $resultobject;
    }

    /**
     * Updates an existing permission item object.
     * This action is available only to Kaltura system administrators.
     * @param int $permissionitemid - The permission item's unique identifier
     * @param KalturaPermissionItem $permissionitem - The permission item's unique identifier
     * @return KalturaPermissionItem - permission item.
     */
    public function update($permissionitemid, KalturaPermissionItem $permissionitem) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionitemid);
        $this->client->addParam($kparams, "permissionItem", $permissionitem->toParams());
        $this->client->queueServiceActionCall("permissionitem", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }
}

/**
 * Kaltura Permission Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Permission Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new permission object to the account.
     * @param KalturaPermission $permission - The new permission.
     * @return KalturaPermission - permission object.
     */
    public function add(KalturaPermission $permission) {
        $kparams = array();
        $this->client->addParam($kparams, "permission", $permission->toParams());
        $this->client->queueServiceActionCall("permission", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermission");
        return $resultobject;
    }

    /**
     * Deletes an existing permission object.
     * @param string $permissionname - The name assigned to the permission.
     * @return KalturaPermission - permission object.
     */
    public function delete($permissionname) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionname);
        $this->client->queueServiceActionCall("permission", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermission");
        return $resultobject;
    }

    /**
     * Retrieves a permission object using its ID.
     * @param string $permissionname - The name assigned to the permission.
     * @return KalturaPermission - permission object.
     */
    public function get($permissionname) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionname);
        $this->client->queueServiceActionCall("permission", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermission");
        return $resultobject;
    }

    /**
     * Retrieves a list of permissions that apply to the current KS.
     * @return string
     */
    public function getCurrentPermissions() {
        $kparams = array();
        $this->client->queueServiceActionCall("permission", "getCurrentPermissions", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Lists permission objects that are associated with an account.
     * Blocked permissions are listed unless you use a filter to exclude them.
     * Blocked permissions are listed unless you use a filter to exclude them.
     * @param KalturaPermissionFilter $filter - A filter used to exclude specific types of permissions
     * @param KalturaFilterPager $pager - A limit for the number of records to display on a page
     * @return KalturaPermissionListResponse - list of permission.
     */
    public function listAction(KalturaPermissionFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("permission", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionListResponse");
        return $resultobject;
    }

    /**
     * Updates an existing permission object.
     * @param string $permissionname - The name assigned to the permission.
     * @param KalturaPermission $permission -  permission object to update.
     * @return KalturaPermission - permission object after update.
     */
    public function update($permissionname, KalturaPermission $permission) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionname);
        $this->client->addParam($kparams, "permission", $permission->toParams());
        $this->client->queueServiceActionCall("permission", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermission");
        return $resultobject;
    }
}

/**
 * Kaltura Playlist Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Playlist Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new playlist.
     * Note that all entries used in a playlist will become public and may appear in KalturaNetwork.
     * @param KalturaPlaylist $playlist - play list.
     * @param bool $updatestats - Indicates that the playlist statistics attributes should be updated synchronously now.
     * @return KalturaPlaylist - play list object.
     */
    public function add(KalturaPlaylist $playlist, $updatestats = false) {
        $kparams = array();
        $this->client->addParam($kparams, "playlist", $playlist->toParams());
        $this->client->addParam($kparams, "updateStats", $updatestats);
        $this->client->queueServiceActionCall("playlist", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylist");
        return $resultobject;
    }

    /**
     * Clone an existing playlist.
     * @param string $id - id of the playlist to clone.
     * @param KalturaPlaylist $newplaylist - Parameters defined here will override the ones in the cloned playlist.
     * @return KalturaPlaylist - play list object.
     */
    public function cloneAction($id, KalturaPlaylist $newplaylist = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        if ($newplaylist !== null) {
            $this->client->addParam($kparams, "newPlaylist", $newplaylist->toParams());
        }
        $this->client->queueServiceActionCall("playlist", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylist");
        return $resultobject;
    }

    /**
     * Delete existing playlist
     * @param string $id - id of playlist.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("playlist", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve playlist for playing purpose
     * @param string $id - id of playlist.
     * @param string $detailed - detailed.
     * @param KalturaContext $playlistcontext - playlist context.
     * @param KalturaMediaEntryFilterForPlaylist $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return array
     */
    public function execute($id, $detailed = "", KalturaContext $playlistcontext = null,
                            KalturaMediaEntryFilterForPlaylist $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "detailed", $detailed);
        if ($playlistcontext !== null) {
            $this->client->addParam($kparams, "playlistContext", $playlistcontext->toParams());
        }
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("playlist", "execute", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Retrieve playlist for playing purpose, based on content
     * @param int $playlisttype - playlist type.
     * @param string $playlistcontent - playlist content.
     * @param string $detailed - detailed.
     * @param KalturaFilterPager $pager - pager.
     * @return array - array of playlist.
     */
    public function executeFromContent($playlisttype, $playlistcontent, $detailed = "", KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "playlistType", $playlisttype);
        $this->client->addParam($kparams, "playlistContent", $playlistcontent);
        $this->client->addParam($kparams, "detailed", $detailed);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("playlist", "executeFromContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Revrieve playlist for playing purpose, based on media entry filters.
     * @param array $filters - array of filter.
     * @param int $totalresults - total results.
     * @param string $detailed - detailed.
     * @param KalturaFilterPager $pager - pager.
     * @return array - array of playlist.
     */
    public function executeFromFilters(array $filters, $totalresults, $detailed = "1", KalturaFilterPager $pager = null) {
        $kparams = array();
        foreach ($filters as $index => $obj) {
            $this->client->addParam($kparams, "filters:$index", $obj->toParams());
        }
        $this->client->addParam($kparams, "totalResults", $totalresults);
        $this->client->addParam($kparams, "detailed", $detailed);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("playlist", "executeFromFilters", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Retrieve a playlist
     * @param string $id - playlist id.
     * @param int $version - Desired version of the data
     * @return KalturaPlaylist - playlist object.
     */
    public function get($id, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("playlist", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylist");
        return $resultobject;
    }

    /**
     * Retrieve playlist statistics.
     * @param int $playlisttype - playlist type.
     * @param string $playlistcontent - playlist content.
     * @return KalturaPlaylist - playlist object.
     */
    public function getStatsFromContent($playlisttype, $playlistcontent) {
        $kparams = array();
        $this->client->addParam($kparams, "playlistType", $playlisttype);
        $this->client->addParam($kparams, "playlistContent", $playlistcontent);
        $this->client->queueServiceActionCall("playlist", "getStatsFromContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylist");
        return $resultobject;
    }

    /**
     * List available playlists.
     * @param KalturaPlaylistFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaPlaylistListResponse - list of playlist.
     */
    public function listAction(KalturaPlaylistFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("playlist", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylistListResponse");
        return $resultobject;
    }

    /**
     * Update existing playlist.
     * Note - you cannot change playlist type. updated playlist must be of the same type.
     * @param string $id - id of playlist.
     * @param KalturaPlaylist $playlist - playlist object to update.
     * @param bool $updatestats - update stats.
     * @return KalturaPlaylist - playlist object after update.
     */
    public function update($id, KalturaPlaylist $playlist, $updatestats = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "playlist", $playlist->toParams());
        $this->client->addParam($kparams, "updateStats", $updatestats);
        $this->client->queueServiceActionCall("playlist", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlaylist");
        return $resultobject;
    }
}

/**
 * Kaltura Report Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Report Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Execute report.
     * @param int $id - id of report.
     * @param array $params - array of parameters.
     * @return KalturaReportResponse - report response object.
     */
    public function execute($id, array $params = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        if ($params !== null) {
            foreach ($params as $index => $obj) {
                $this->client->addParam($kparams, "params:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("report", "execute", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportResponse");
        return $resultobject;
    }

    /**
     * Get base total.
     * Report getBaseTotal action allows to get a the total base for storage reports
     * @param string $reporttype - report type.
     * @param KalturaReportInputFilter $reportinputfilter - report input filter.
     * @param string $objectids - one ID or more (separated by ',') of specific objects to query.
     * @return array - array of reports.
     */
    public function getBaseTotal($reporttype, KalturaReportInputFilter $reportinputfilter, $objectids = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "reportInputFilter", $reportinputfilter->toParams());
        $this->client->addParam($kparams, "objectIds", $objectids);
        $this->client->queueServiceActionCall("report", "getBaseTotal", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get report as CSV file.
     * @param int $id - id of report.
     * @param array $params - array of parameters.
     * @return file - file object.
     */
    public function getCsv($id, array $params = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }

        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        if ($params !== null) {
            foreach ($params as $index => $obj) {
                $this->client->addParam($kparams, "params:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("report", "getCsv", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Returns report CSV file executed by string params with the following convention: param1=value1;param2=value2
     * @param int $id - id of report.
     * @param string $params - parameters.
     * @return file - file object.
     */
    public function getCsvFromStringParams($id, $params = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "params", $params);
        $this->client->queueServiceActionCall("report", "getCsvFromStringParams", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Report getGraphs action allows to get a graph data for a specific report.
     * @param string $reporttype - report type.
     * @param KalturaReportInputFilter $reportinputfilter - report input filter.
     * @param string $dimension - dimension.
     * @param string $objectids - one ID or more (separated by ',') of specific objects to query
     * @return array
     */
    public function getGraphs($reporttype, KalturaReportInputFilter $reportinputfilter, $dimension = null, $objectids = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "reportInputFilter", $reportinputfilter->toParams());
        $this->client->addParam($kparams, "dimension", $dimension);
        $this->client->addParam($kparams, "objectIds", $objectids);
        $this->client->queueServiceActionCall("report", "getGraphs", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Report getTable action allows to get a graph data for a specific report.
     * @param string $reporttype - report type.
     * @param KalturaReportInputFilter $reportinputfilter - report input filter.
     * @param KalturaFilterPager $pager - pager.
     * @param string $order - order.
     * @param string $objectids - one ID or more (separated by ',') of specific objects to query
     * @return KalturaReportTable - report table table.
     */
    public function getTable($reporttype, KalturaReportInputFilter $reportinputfilter, KalturaFilterPager $pager,
                             $order = null, $objectids = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "reportInputFilter", $reportinputfilter->toParams());
        $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->addParam($kparams, "order", $order);
        $this->client->addParam($kparams, "objectIds", $objectids);
        $this->client->queueServiceActionCall("report", "getTable", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportTable");
        return $resultobject;
    }

    /**
     * Report getTotal action allows to get a graph data for a specific report.
     * @param string $reporttype - report type.
     * @param KalturaReportInputFilter $reportinputfilter - report input filter.
     * @param string $objectids - one ID or more (separated by ',') of specific objects to query.
     * @return KalturaReportTotal - report total object.
     */
    public function getTotal($reporttype, KalturaReportInputFilter $reportinputfilter, $objectids = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "reportInputFilter", $reportinputfilter->toParams());
        $this->client->addParam($kparams, "objectIds", $objectids);
        $this->client->queueServiceActionCall("report", "getTotal", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportTotal");
        return $resultobject;
    }

    /**
     * Will create a Csv file for the given report and return the URL to access it.
     * @param string $reporttitle - The title of the report to display at top of CSV.
     * @param string $reporttext - The text of the filter of the report.
     * @param string $headers - The headers of the columns.
     * @param string $reporttype - report type.
     * @param KalturaReportInputFilter $reportinputfilter - report input filter.
     * @param string $dimension - dimension.
     * @param KalturaFilterPager $pager - pager.
     * @param string $order - order.
     * @param string $objectids - one ID or more (separated by ',') of specific objects to query.
     * @return string - url for csv file.
     */
    public function getUrlForReportAsCsv($reporttitle, $reporttext, $headers, $reporttype,
                                         KalturaReportInputFilter $reportinputfilter, $dimension = null,
                                         KalturaFilterPager $pager = null, $order = null, $objectids = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportTitle", $reporttitle);
        $this->client->addParam($kparams, "reportText", $reporttext);
        $this->client->addParam($kparams, "headers", $headers);
        $this->client->addParam($kparams, "reportType", $reporttype);
        $this->client->addParam($kparams, "reportInputFilter", $reportinputfilter->toParams());
        $this->client->addParam($kparams, "dimension", $dimension);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->addParam($kparams, "order", $order);
        $this->client->addParam($kparams, "objectIds", $objectids);
        $this->client->queueServiceActionCall("report", "getUrlForReportAsCsv", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Will serve a requested report.
     * @param string $id - the requested id.
     * @return string - serve status.
     */
    public function serve($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("report", "serve", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaResponseProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Response Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new response profile.
     * @param KalturaResponseProfile $addresponseprofile - response profile to add.
     * @return KalturaResponseProfile - response profile aftet add.
     */
    public function add(KalturaResponseProfile $addresponseprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "addResponseProfile", $addresponseprofile->toParams());
        $this->client->queueServiceActionCall("responseprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfile");
        return $resultobject;
    }

    /**
     * Clone an existing response profile.
     * @param int $id - id of kaltura media.
     * @param KalturaResponseProfile $profile - response profile.
     * @return KalturaResponseProfile - response profile.
     */
    public function cloneAction($id, KalturaResponseProfile $profile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "profile", $profile->toParams());
        $this->client->queueServiceActionCall("responseprofile", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfile");
        return $resultobject;
    }

    /**
     * Delete response profile by id
     * @param int $id - id of response profile to delete.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("responseprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get response profile by id.
     * @param bigint $id - id of response profile.
     * @return KalturaResponseProfile - response profile.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("responseprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfile");
        return $resultobject;
    }

    /**
     * List response profiles by filter and pager.
     * @param KalturaResponseProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaResponseProfileListResponse - response profile.
     */
    public function listAction(KalturaResponseProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("responseprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfileListResponse");
        return $resultobject;
    }

    /**
     * Recalculate response profile cached objects.
     * @param KalturaResponseProfileCacheRecalculateOptions $options - options.
     * @return KalturaResponseProfileCacheRecalculateResults - recalculate results.
     */
    public function recalculate(KalturaResponseProfileCacheRecalculateOptions $options) {
        $kparams = array();
        $this->client->addParam($kparams, "options", $options->toParams());
        $this->client->queueServiceActionCall("responseprofile", "recalculate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfileCacheRecalculateResults");
        return $resultobject;
    }

    /**
     * Update response profile by id.
     * @param int $id - id of response profile.
     * @param KalturaResponseProfile $updateresponseprofile - response profile.
     * @return KalturaResponseProfile - response profile.
     */
    public function update($id, KalturaResponseProfile $updateresponseprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "updateResponseProfile", $updateresponseprofile->toParams());
        $this->client->queueServiceActionCall("responseprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfile");
        return $resultobject;
    }

    /**
     * Update response profile status by id
     * @param int $id - id of response profile.
     * @param int $status - status.
     * @return KalturaResponseProfile - response profile.
     */
    public function updateStatus($id, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("responseprofile", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaResponseProfile");
        return $resultobject;
    }
}

/**
 * Kaltura Schema Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchemaService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Schema Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Serves the requested XSD according to the type and name.
     * @param string $type - type.
     * @return file - file object.
     */
    public function serve($type) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall("schema", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }
}

/**
 * Kaltura Search Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Search Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * External login.
     * @param int $searchsource - search source.
     * @param string $username - username.
     * @param string $password - password.
     * @return KalturaSearchAuthData - authentication data.
     */
    public function externalLogin($searchsource, $username, $password) {
        $kparams = array();
        $this->client->addParam($kparams, "searchSource", $searchsource);
        $this->client->addParam($kparams, "userName", $username);
        $this->client->addParam($kparams, "password", $password);
        $this->client->queueServiceActionCall("search", "externalLogin", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSearchAuthData");
        return $resultobject;
    }

    /**
     * Retrieve extra information about media found in search action.
     * Some providers return only part of the fields needed to create entry from, use this action to get the rest of the fields.
     * @param KalturaSearchResult $searchresult - object extends KalturaSearch and has all fields required for media:add.
     * @return KalturaSearchResult - search result object.
     */
    public function getMediaInfo(KalturaSearchResult $searchresult) {
        $kparams = array();
        $this->client->addParam($kparams, "searchResult", $searchresult->toParams());
        $this->client->queueServiceActionCall("search", "getMediaInfo", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSearchResult");
        return $resultobject;
    }

    /**
     * Search for media in one of the supported media providers.
     * @param KalturaSearch $search - A KalturaSearch object contains the search keywords, media provider and media type
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaSearchResultResponse - search result.
     */
    public function search(KalturaSearch $search, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "search", $search->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("search", "search", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSearchResultResponse");
        return $resultobject;
    }

    /**
     * Search for media given a specific URL
     * Kaltura supports a searchURL action on some of the media providers.
     * This action will return a KalturaSearchResult object based on a given URL (assuming the media provider is supported)
     * @param int $mediatype - media type.
     * @param string $url - URL string.
     * @return KalturaSearchResult - search result.
     */
    public function searchUrl($mediatype, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaType", $mediatype);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("search", "searchUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSearchResult");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaServerNodeService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Server Node Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a server node to the Kaltura DB.
     * @param KalturaServerNode $servernode - server node to add.
     * @return KalturaServerNode - server node after add.
     */
    public function add(KalturaServerNode $servernode) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNode", $servernode->toParams());
        $this->client->queueServiceActionCall("servernode", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }

    /**
     * Delete server node by id.
     * @param string $servernodeid - id of server node.
     */
    public function delete($servernodeid) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNodeId", $servernodeid);
        $this->client->queueServiceActionCall("servernode", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Disable server node by id.
     * @param string $servernodeid - server node id.
     * @return KalturaServernode - server node object.
     */
    public function disable($servernodeid) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNodeId", $servernodeid);
        $this->client->queueServiceActionCall("servernode", "disable", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }

    /**
     * Enable server node by id.
     * @param string $servernodeid - server node id.
     * @return KalturaServerNode - server node object.
     */
    public function enable($servernodeid) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNodeId", $servernodeid);
        $this->client->queueServiceActionCall("servernode", "enable", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }

    /**
     * Get server node by id.
     * @param int $servernodeid - server node id.
     * @return KalturaServerNode - server node object.
     */
    public function get($servernodeid) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNodeId", $servernodeid);
        $this->client->queueServiceActionCall("servernode", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }

    /**
     * List server nodes.
     * @param KalturaServerNodeFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaServerNodeListResponse - list of server node.
     */
    public function listAction(KalturaServerNodeFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("servernode", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNodeListResponse");
        return $resultobject;
    }

    /**
     * Update server node status
     * @param string $hostname - host name.
     * @param KalturaServerNode $servernode - server node to update.
     * @return KalturaServerNode - server node after update.
     */
    public function reportStatus($hostname, KalturaServerNode $servernode = null) {
        $kparams = array();
        $this->client->addParam($kparams, "hostName", $hostname);
        if ($servernode !== null) {
            $this->client->addParam($kparams, "serverNode", $servernode->toParams());
        }
        $this->client->queueServiceActionCall("servernode", "reportStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }

    /**
     * Update server node by id.
     * @param int $servernodeid - server node id.
     * @param KalturaServerNode $servernode - server node object to update.
     * @return KalturaServerNode - server node object after update.
     */
    public function update($servernodeid, KalturaServerNode $servernode) {
        $kparams = array();
        $this->client->addParam($kparams, "serverNodeId", $servernodeid);
        $this->client->addParam($kparams, "serverNode", $servernode->toParams());
        $this->client->queueServiceActionCall("servernode", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaServerNode");
        return $resultobject;
    }
}

/**
 * Kaltura Session Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Session Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * End a session with the Kaltura server, making the current KS invalid.
     */
    public function end() {
        $kparams = array();
        $this->client->queueServiceActionCall("session", "end", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Parse session key and return its info
     * @param string $session - The KS to be parsed, keep it empty to use current session.
     * @return KalturaSessionInfo - session information object.
     */
    public function get($session = null) {
        $kparams = array();
        $this->client->addParam($kparams, "session", $session);
        $this->client->queueServiceActionCall("session", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSessionInfo");
        return $resultobject;
    }

    /**
     * Start an impersonated session with Kaltura's server.
     * The result KS is the session key that you should pass to all services that requires a ticket.
     * @param string $secret - should be the secret (admin or user) of the original partnerId (not impersonatedPartnerId).
     * @param int $impersonatedpartnerid - impersonated partner id.
     * @param string $userid - impersonated user id.
     * @param int $type - type.
     * @param int $partnerid - partner id.
     * @param int $expiry - KS expiry time in seconds
     * @param string $privileges - privileges.
     * @return string - session string.
     */
    public function impersonate($secret, $impersonatedpartnerid, $userid = "", $type = 0, $partnerid = null,
                                $expiry = 86400, $privileges = null) {
        $kparams = array();
        $this->client->addParam($kparams, "secret", $secret);
        $this->client->addParam($kparams, "impersonatedPartnerId", $impersonatedpartnerid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->queueServiceActionCall("session", "impersonate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Start an impersonated session with Kaltura's server.
     * The result KS info contains the session key that you should pass to all services that requires a ticket.
     * Type, expiry and privileges won't be changed if they're not set
     * @param string $session - The old KS of the impersonated partner
     * @param int $type - Type of the new KS
     * @param int $expiry - Expiry time in seconds of the new KS
     * @param string $privileges - Privileges of the new KS
     * @return KalturaSessionInfo - session information object.
     */
    public function impersonateByKs($session, $type = null, $expiry = null, $privileges = null) {
        $kparams = array();
        $this->client->addParam($kparams, "session", $session);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->queueServiceActionCall("session", "impersonateByKs", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSessionInfo");
        return $resultobject;
    }

    /**
     * Start a session with Kaltura's server.
     * The result KS is the session key that you should pass to all services that requires a ticket.
     * @param string $secret - Remember to provide the correct secret according to the sessionType you want
     * @param string $userid - user id.
     * @param int $type - Regular session or Admin session
     * @param int $partnerid - partner id.
     * @param int $expiry - KS expiry time in seconds
     * @param string $privileges - privilieges.
     * @return string - session string.
     */
    public function start($secret, $userid = "", $type = 0, $partnerid = null, $expiry = 86400, $privileges = null) {
        $kparams = array();
        $this->client->addParam($kparams, "secret", $secret);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->queueServiceActionCall("session", "start", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Start a session for Kaltura's flash widgets
     * @param string $widgetid - widget id.
     * @param int $expiry - session expiry.
     * @return KalturaStartWidgetSessionResponse - start widget session.
     */
    public function startWidgetSession($widgetid, $expiry = 86400) {
        $kparams = array();
        $this->client->addParam($kparams, "widgetId", $widgetid);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->queueServiceActionCall("session", "startWidgetSession", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStartWidgetSessionResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Stats Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Stats Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Will write to the event log a single line representing the event.
     * client version - will help interprete the line structure.
     * different client versions might have slightly different data/data formats in the line
     * event_id - number is the row number in yuval's excel
     * datetime - same format as MySql's datetime - can change and should reflect the time zone
     * session id - can be some big random number or guid
     * partner id
     * entry id
     * unique viewer
     * widget id
     * ui_conf id
     * uid - the puser id as set by the ppartner
     * current point - in milliseconds
     * duration - milliseconds
     * user ip
     * process duration - in milliseconds
     * control id
     * seek
     * new point
     * referrer
     * KalturaStatsEvent $event
     * @param KalturaStatsEvent $event - stats event object.
     * @return bool - whether stats event is collected.
     */
    public function collect(KalturaStatsEvent $event) {
        $kparams = array();
        $this->client->addParam($kparams, "event", $event->toParams());
        $this->client->queueServiceActionCall("stats", "collect", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * Will collect the kmcEvent sent form the KMC client
     * this will actually be an empty function because all events will be sent
     * using GET and will anyway be logged in the apache log.
     * @param KalturaStatsKmcEvent $kmcevent - kmc event object.
     */
    public function kmcCollect(KalturaStatsKmcEvent $kmcevent) {
        $kparams = array();
        $this->client->addParam($kparams, "kmcEvent", $kmcevent->toParams());
        $this->client->queueServiceActionCall("stats", "kmcCollect", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Use this action to report device capabilities to the kaltura server.
     * @param string $data - data string.
     */
    public function reportDeviceCapabilities($data) {
        $kparams = array();
        $this->client->addParam($kparams, "data", $data);
        $this->client->queueServiceActionCall("stats", "reportDeviceCapabilities", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Use this action to report errors to the kaltura server.
     * @param string $errorcode - error code.
     * @param string $errormessage - error message.
     */
    public function reportError($errorcode, $errormessage) {
        $kparams = array();
        $this->client->addParam($kparams, "errorCode", $errorcode);
        $this->client->addParam($kparams, "errorMessage", $errormessage);
        $this->client->queueServiceActionCall("stats", "reportError", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Report KCE Error.
     * @param KalturaCEError $kalturaceerror - kaltura ce error.
     * @return KalturaCEError - kaltura ce error object.
     */
    public function reportKceError(KalturaCEError $kalturaceerror) {
        $kparams = array();
        $this->client->addParam($kparams, "kalturaCEError", $kalturaceerror->toParams());
        $this->client->queueServiceActionCall("stats", "reportKceError", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCEError");
        return $resultobject;
    }
}

/**
 * Kaltura Storage Profile Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Storage Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a storage profile to the Kaltura DB.
     * @param KalturaStorageProfile $storageprofile - storage profile to add.
     * @return KalturaStorageProfile - storage profile after add.
     */
    public function add(KalturaStorageProfile $storageprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfile", $storageprofile->toParams());
        $this->client->queueServiceActionCall("storageprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfile");
        return $resultobject;
    }

    /**
     * Get storage profile by id.
     * @param int $storageprofileid - storage profile id.
     * @return KalturaStorageProfile - storage profile object.
     */
    public function get($storageprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfileId", $storageprofileid);
        $this->client->queueServiceActionCall("storageprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfile");
        return $resultobject;
    }

    /**
     * List storage profile.
     * @param KalturaStorageProfileFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaStorageProfileListResponse - list of storage profile.
     */
    public function listAction(KalturaStorageProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("storageprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfileListResponse");
        return $resultobject;
    }

    /**
     * Update storage profile by id.
     * @param int $storageprofileid - id of storage profile.
     * @param KalturaStorageProfile $storageprofile - storage profile object to update.
     * @return KalturaStorageProfile - storage profile object afer update.
     */
    public function update($storageprofileid, KalturaStorageProfile $storageprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfileId", $storageprofileid);
        $this->client->addParam($kparams, "storageProfile", $storageprofile->toParams());
        $this->client->queueServiceActionCall("storageprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfile");
        return $resultobject;
    }

    /**
     * Update storage status by id.
     * @param int $storageid - storage id.
     * @param int $status - status.
     */
    public function updateStatus($storageid, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->addParam($kparams, "status", $status);
        $this->client->queueServiceActionCall("storageprofile", "updateStatus", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura Syndication Feed Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Syndication Feed Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Syndication Feed.
     * @param KalturaBaseSyndicationFeed $syndicationfeed - syndication feed object to add.
     * @return KalturaBaseSyndicationFeed - syndication feed object after add.
     */
    public function add(KalturaBaseSyndicationFeed $syndicationfeed) {
        $kparams = array();
        $this->client->addParam($kparams, "syndicationFeed", $syndicationfeed->toParams());
        $this->client->queueServiceActionCall("syndicationfeed", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseSyndicationFeed");
        return $resultobject;
    }

    /**
     * Delete Syndication Feed by ID
     * @param string $id - id of syndication feed.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("syndicationfeed", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Syndication Feed by ID.
     * @param string $id - syndication feed id.
     * @return KalturaBaseSyndicationFeed - syndication feed object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("syndicationfeed", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseSyndicationFeed");
        return $resultobject;
    }

    /**
     * Get entry count for a syndication feed.
     * @param string $feedid - syndication feed id.
     * @return KalturaSyndicationFeedEntryCount - syndication feed entry count.
     */
    public function getEntryCount($feedid) {
        $kparams = array();
        $this->client->addParam($kparams, "feedId", $feedid);
        $this->client->queueServiceActionCall("syndicationfeed", "getEntryCount", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSyndicationFeedEntryCount");
        return $resultobject;
    }

    /**
     * List Syndication Feeds by filter with paging support
     * @param KalturaBaseSyndicationFeedFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaBaseSyndicationFeedListResponse - list of base syndication feed.
     */
    public function listAction(KalturaBaseSyndicationFeedFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("syndicationfeed", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseSyndicationFeedListResponse");
        return $resultobject;
    }

    /**
     * Request conversion for all entries that doesnt have the required flavor param
     * returns a comma-separated ids of conversion jobs
     * @param string $feedid - feed id.
     * @return string - conversion object.
     */
    public function requestConversion($feedid) {
        $kparams = array();
        $this->client->addParam($kparams, "feedId", $feedid);
        $this->client->queueServiceActionCall("syndicationfeed", "requestConversion", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Update Syndication Feed by ID
     * @param string $id - syndication feed id.
     * @param KalturaBaseSyndicationFeed $syndicationfeed - syndication feed object.
     * @return KalturaBaseSyndicationFeed - syndication feed object.
     */
    public function update($id, KalturaBaseSyndicationFeed $syndicationfeed) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "syndicationFeed", $syndicationfeed->toParams());
        $this->client->queueServiceActionCall("syndicationfeed", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseSyndicationFeed");
        return $resultobject;
    }
}

/**
 * Kaltura System Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSystemService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura System Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get system service time.
     * @return int - system service time.
     */
    public function getTime() {
        $kparams = array();
        $this->client->queueServiceActionCall("system", "getTime", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Get version.
     * @return string - version string.
     */
    public function getVersion() {
        $kparams = array();
        $this->client->queueServiceActionCall("system", "getVersion", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Send ping request and receive response.
     * @return bool - whether system is active.
     */
    public function ping() {
        $kparams = array();
        $this->client->queueServiceActionCall("system", "ping", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * Send ping request to database and receive response.
     * @return bool - whether system is active.
     */
    public function pingDatabase() {
        $kparams = array();
        $this->client->queueServiceActionCall("system", "pingDatabase", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }
}

/**
 * Kaltura Thumb Asset Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Thumb Asset Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add thumbnail asset.
     * @param string $entryid - media entry id.
     * @param KalturaThumbAsset $thumbasset - thumb asset object to add.
     * @return KalturaThumbAsset - thumb asset object after add.
     */
    public function add($entryid, KalturaThumbAsset $thumbasset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "thumbAsset", $thumbasset->toParams());
        $this->client->queueServiceActionCall("thumbasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Add new thumb asset from image file.
     * @param string $entryid - media entry id.
     * @param file $filedata - file data.
     * @return KalturaThumbAsset - thumb asset object.
     */
    public function addFromImage($entryid, $filedata) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("thumbasset", "addFromImage", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Add thumb asset from URL.
     * @param string $entryid - media entry id.
     * @param string $url - URL string to add.
     * @return KalturaThumbAsset - thumb asset object after add.
     */
    public function addFromUrl($entryid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("thumbasset", "addFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Delete thumb asset by id.
     * @param string $thumbassetid - thumb asset id.
     */
    public function delete($thumbassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->queueServiceActionCall("thumbasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Manually export an asset.
     * @param string $assetid - thumb asset id.
     * @param int $storageprofileid - storage profile id.
     * @return KalturaFlavorAsset - flavor asset object.
     */
    public function export($assetid, $storageprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "assetId", $assetid);
        $this->client->addParam($kparams, "storageProfileId", $storageprofileid);
        $this->client->queueServiceActionCall("thumbasset", "export", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    /**
     * Generate new thumnail asset.
     * @param string $entryid - media entry id.
     * @param KalturaThumbParams $thumbparams - thumb params.
     * @param string $sourceassetid - Id of the source asset to be used as source for the thumbnail generation.
     * @return KalturaThumbAsset - thumb asset object.
     */
    public function generate($entryid, KalturaThumbParams $thumbparams, $sourceassetid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "thumbParams", $thumbparams->toParams());
        $this->client->addParam($kparams, "sourceAssetId", $sourceassetid);
        $this->client->queueServiceActionCall("thumbasset", "generate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Generate new thumbnail asset by entry id.
     * @param string $entryid - media entry id.
     * @param int $destthumbparamsid - Indicate the id of the ThumbParams to be generate this thumbnail by.
     * @return KalturaThumbAsset - thumb asset object.
     */
    public function generateByEntryId($entryid, $destthumbparamsid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "destThumbParamsId", $destthumbparamsid);
        $this->client->queueServiceActionCall("thumbasset", "generateByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Get thumb asset object.
     * @param string $thumbassetid - thumb asset id.
     * @return KalturaThumbAsset - thumb asset object.
     */
    public function get($thumbassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->queueServiceActionCall("thumbasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Get thumb asset list by entry id.
     * @param string $entryid - media entry id.
     * @return array - array of thum asset object.
     */
    public function getByEntryId($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("thumbasset", "getByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get remote storage existing paths for the asset.
     * @param string $id - thumb asset id.
     * @return KalturaRemotePathListResponse - list of remote path.
     */
    public function getRemotePaths($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("thumbasset", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    /**
     * Get download URL for the asset.
     * @param string $id - id of thumb asset.
     * @param int $storageid - storage id.
     * @param KalturaThumbParams $thumbparams - thumb params.
     * @return string - URL string.
     */
    public function getUrl($id, $storageid = null, KalturaThumbParams $thumbparams = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        if ($thumbparams !== null) {
            $this->client->addParam($kparams, "thumbParams", $thumbparams->toParams());
        }
        $this->client->queueServiceActionCall("thumbasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * List Thumbnail Assets by filter and pager.
     * @param KalturaAssetFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaThumbAssetListResponse - list of thumb asset.
     */
    public function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("thumbasset", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAssetListResponse");
        return $resultobject;
    }

    /**
     * Re-generate thumb asset by id.
     * @param string $thumbassetid - id of thumb asset.
     * @return KalturaThumbAsset - thumb asset object.
     */
    public function regenerate($thumbassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->queueServiceActionCall("thumbasset", "regenerate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Serves thumbnail by its id.
     * @param string $thumbassetid - thumb asset id.
     * @param int $version - version.
     * @param KalturaThumbParams $thumbparams - thumb params.
     * @param KalturaThumbnailServeOptions $options - options.
     * @return file - thumbnail file object.
     */
    public function serve($thumbassetid, $version = null, KalturaThumbParams $thumbparams = null,
                          KalturaThumbnailServeOptions $options = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->addParam($kparams, "version", $version);
        if ($thumbparams !== null) {
            $this->client->addParam($kparams, "thumbParams", $thumbparams->toParams());
        }
        if ($options !== null) {
            $this->client->addParam($kparams, "options", $options->toParams());
        }
        $this->client->queueServiceActionCall("thumbasset", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves thumbnail by entry id and thumnail params id.
     * @param string $entryid - media entry id.
     * @param int $thumbparamid - If not set, default thumbnail will be used.
     * @return file - file object.
     */
    public function serveByEntryId($entryid, $thumbparamid = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "thumbParamId", $thumbparamid);
        $this->client->queueServiceActionCall("thumbasset", "serveByEntryId", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Tags the thumbnail as DEFAULT_THUMB and removes that tag from all other thumbnail assets of the entry.
     * Create a new file sync link on the entry thumbnail that points to the thumbnail asset file sync.
     * @param string $thumbassetid - thumb asset id.
     */
    public function setAsDefault($thumbassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->queueServiceActionCall("thumbasset", "setAsDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update content of thumbnail asset
     * @param string $id - id of thumb asset.
     * @param KalturaContentResource $contentresource - content resource.
     * @return KalturaThumbAsset - thumb asset after update.
     */
    public function setContent($id, KalturaContentResource $contentresource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentresource->toParams());
        $this->client->queueServiceActionCall("thumbasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    /**
     * Update thumbnail asset.
     * @param string $id - thumb asset id.
     * @param KalturaThumbAsset $thumbasset - thumb asset to update.
     * @return KalturaThumbAsset - thumb aset object after update.
     */
    public function update($id, KalturaThumbAsset $thumbasset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "thumbAsset", $thumbasset->toParams());
        $this->client->queueServiceActionCall("thumbasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }
}

/**
 * Kaltura Thumb Params Output Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsOutputService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Thumb Params output Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get thumb params output object by ID.
     * @param int $id - id of thumb params output.
     * @return KalturaThumbParamsOutput - thumb params output object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("thumbparamsoutput", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParamsOutput");
        return $resultobject;
    }

    /**
     * List thumb params output objects by filter and pager.
     * @param KalturaThumbParamsOutputFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaThumbParamsOutputListResponse - list of thumb params output.
     */
    public function listAction(KalturaThumbParamsOutputFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("thumbparamsoutput", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParamsOutputListResponse");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Thumb Params Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Thumb Params
     * @param KalturaThumbParams $thumbparams - thumb params object to add.
     * @return KalturaThumbParams - thumb paramas object after add.
     */
    public function add(KalturaThumbParams $thumbparams) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbParams", $thumbparams->toParams());
        $this->client->queueServiceActionCall("thumbparams", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParams");
        return $resultobject;
    }

    /**
     * Delete Thumb Params by ID.
     * @param int $id - thumb params id.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("thumbparams", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Thumb Params by ID.
     * @param int $id - thumb params id.
     * @return KalturaThumbParams - thumb params object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("thumbparams", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParams");
        return $resultobject;
    }

    /**
     * Get Thumb Params by Conversion Profile ID.
     * @param int $conversionprofileid - conversion profile id.
     * @return array - array of thumb params.
     */
    public function getByConversionProfileId($conversionprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->queueServiceActionCall("thumbparams", "getByConversionProfileId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * List Thumb Params by filter with paging support (By default - all system default params will be listed too)
     * @param KalturaThumbParamsFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaThumbParamsListResponse - list of thumb params.
     */
    public function listAction(KalturaThumbParamsFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("thumbparams", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParamsListResponse");
        return $resultobject;
    }

    /**
     * Update Thumb Params by ID.
     * @param int $id - thumb params id.
     * @param KalturaThumbParams $thumbparams - thumb params object to update.
     * @return KalturaThumbParams - thumb params after update.
     */
    public function update($id, KalturaThumbParams $thumbparams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "thumbParams", $thumbparams->toParams());
        $this->client->queueServiceActionCall("thumbparams", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbParams");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Uni Conf Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * UIConf Add action allows you to add a UIConf to Kaltura DB.
     * @param KalturaUiConf $uiconf - Mandatory input parameter of type KalturaUiConf.
     * @return KalturaUiConf - uiconf object.
     */
    public function add(KalturaUiConf $uiconf) {
        $kparams = array();
        $this->client->addParam($kparams, "uiConf", $uiconf->toParams());
        $this->client->queueServiceActionCall("uiconf", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConf");
        return $resultobject;
    }

    /**
     * Clone an existing UIConf.
     * @param int $id - id of uiconf.
     * @return KalturaUiConf - uiconf object.
     */
    public function cloneAction($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("uiconf", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConf");
        return $resultobject;
    }

    /**
     * Delete an existing UIConf.
     * @param int $id - uiconfi id.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("uiconf", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Retrieve a UIConf by id.
     * @param int $id - uiconf id.
     * @return KalturaUiConf - uiconf object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("uiconf", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConf");
        return $resultobject;
    }

    /**
     * Retrieve a list of all available versions by object type.
     * @return array - array of available versions.
     */
    public function getAvailableTypes() {
        $kparams = array();
        $this->client->queueServiceActionCall("uiconf", "getAvailableTypes", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Retrieve a list of available UIConfs.
     * @param KalturaUiConfFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaUiConfListResponse - list of uiconf.
     */
    public function listAction(KalturaUiConfFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("uiconf", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConfListResponse");
        return $resultobject;
    }

    /**
     * Retrieve a list of available template UIConfs.
     * @param KalturaUiConfFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaUiConfListResponse - list of uiconf.
     */
    public function listTemplates(KalturaUiConfFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("uiconf", "listTemplates", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConfListResponse");
        return $resultobject;
    }

    /**
     * Update an existing UIConf.
     * @param int $id - uiconf id.
     * @param KalturaUiConf $uiconf - uiconf object.
     * @return KalturaUiConf - uiconf object.
     */
    public function update($id, KalturaUiConf $uiconf) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "uiConf", $uiconf->toParams());
        $this->client->queueServiceActionCall("uiconf", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConf");
        return $resultobject;
    }
}

/**
 * Kaltura Upload Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Upload Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Get uploaded file token by file name.
     * @param string $filename - file name.
     * @return KalturaUploadResponse - kaltura upload.
     */
    public function getUploadedFileTokenByFileName($filename) {
        $kparams = array();
        $this->client->addParam($kparams, "fileName", $filename);
        $this->client->queueServiceActionCall("upload", "getUploadedFileTokenByFileName", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadResponse");
        return $resultobject;
    }

    /**
     * Upload file.
     * @param file $filedata - The file data.
     * @return string - upload status.
     */
    public function upload($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("upload", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }
}

/**
 * Kaltura Upload Token Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura UploadToken Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds new upload token to upload a file.
     * @param KalturaUploadToken $uploadtoken - upload token object.
     * @return KalturaUploadToken - upload token object.
     */
    public function add(KalturaUploadToken $uploadtoken = null) {
        $kparams = array();
        if ($uploadtoken !== null) {
            $this->client->addParam($kparams, "uploadToken", $uploadtoken->toParams());
        }
        $this->client->queueServiceActionCall("uploadtoken", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadToken");
        return $resultobject;
    }

    /**
     * Deletes the upload token by upload token id.
     * @param string $uploadtokenid - id of upload token.
     */
    public function delete($uploadtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->queueServiceActionCall("uploadtoken", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get upload token by id.
     * @param string $uploadtokenid - id of upload token.
     * @return KalturaUploadToken - upload token object.
     */
    public function get($uploadtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->queueServiceActionCall("uploadtoken", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadToken");
        return $resultobject;
    }

    /**
     * List upload token by filter with pager support.
     * When using a user session the service will be restricted to users objects only.
     * @param KalturaUploadTokenFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaUploadTokenListResponse - list of upload token.
     */
    public function listAction(KalturaUploadTokenFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("uploadtoken", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadTokenListResponse");
        return $resultobject;
    }

    /**
     * Upload a file using the upload token id, returns an error on failure
     * (an exception will be thrown when using one of the Kaltura clients)
     * Chunks can be uploaded in parallel and they will be appended according to their resumeAt position.
     * A parallel upload session should have three stages:
     * 1. A single upload with resume=false and finalChunk=false
     * 2. Parallel upload requests each with resume=true,finalChunk=false and the expected resumetAt position.
     * If a chunk fails to upload it can be re-uploaded.
     * 3. After all of the chunks have been uploaded a final chunk (can be of zero size) should be uploaded
     * with resume=true, finalChunk=true and the expected resumeAt position.
     * In case an UPLOAD_TOKEN_CANNOT_MATCH_EXPECTED_SIZE exception.
     * has been returned (indicating not all of the chunks were appended yet) the final request can be retried.
     * @param string $uploadtokenid - id of upload token.
     * @param file $filedata - file data.
     * @param bool $resume - whether this chunk is resume.
     * @param bool $finalchunk - whether this is final chunk.
     * @param float $resumeat - file offset position of this chunk.
     * @return KalturaUploadToken - upload token object.
     */
    public function upload($uploadtokenid, $filedata, $resume = false, $finalchunk = true, $resumeat = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->addParam($kparams, "resume", $resume);
        $this->client->addParam($kparams, "finalChunk", $finalchunk);
        $this->client->addParam($kparams, "resumeAt", $resumeat);
        $this->client->queueServiceActionCall("uploadtoken", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadToken");
        return $resultobject;
    }
}

/**
 * Kaltura User Entry Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserEntryService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura User Entry Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a user_entry to the Kaltura DB.
     * @param KalturaUserEntry $userentry - user entry object.
     * @return KalturaUserEntry - user entry object.
     */
    public function add(KalturaUserEntry $userentry) {
        $kparams = array();
        $this->client->addParam($kparams, "userEntry", $userentry->toParams());
        $this->client->queueServiceActionCall("userentry", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserEntry");
        return $resultobject;
    }

    /**
     * Bulk Delete users by using filter.
     * @param KalturaUserEntryFilter $filter - filter object.
     * @return int - delete status.
     */
    public function bulkDelete(KalturaUserEntryFilter $filter) {
        $kparams = array();
        $this->client->addParam($kparams, "filter", $filter->toParams());
        $this->client->queueServiceActionCall("userentry", "bulkDelete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete user by id.
     * @param int $id - user id.
     * @return KalturaUserEntry - user entry object.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("userentry", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserEntry");
        return $resultobject;
    }

    /**
     * Get user entry object.
     * @param string $id - user id.
     * @return KalturaUserEntry - user entry.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("userentry", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserEntry");
        return $resultobject;
    }

    /**
     * List users.
     * @param KalturaUserEntryFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaUserEntryListResponse - list of user entry.
     */
    public function listAction(KalturaUserEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("userentry", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserEntryListResponse");
        return $resultobject;
    }

    /**
     * Submit quiz user entry.
     * Submits the quiz so that it's status will be submitted and calculates the score for the quiz.
     * @param int $id - user id.
     * @return KalturaQuizUserEntry - quiz user entry object.
     */
    public function submitQuiz($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("userentry", "submitQuiz", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaQuizUserEntry");
        return $resultobject;
    }

    /**
     * Update user entry.
     * @param int $id - user id.
     * @param KalturaUserEntry $userentry - user entry object.
     */
    public function update($id, KalturaUserEntry $userentry) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "userEntry", $userentry->toParams());
        $this->client->queueServiceActionCall("userentry", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura Client User Role Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura User Role Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new user role object to the account.
     * @param KalturaUserRole $userrole - A new role.
     * @return KalturaUserRole - user role object.
     */
    public function add(KalturaUserRole $userrole) {
        $kparams = array();
        $this->client->addParam($kparams, "userRole", $userrole->toParams());
        $this->client->queueServiceActionCall("userrole", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    /**
     * Creates a new user role object that is a duplicate of an existing role.
     * @param int $userroleid The user role's unique identifier
     * @return KalturaUserRole - user role object.
     */
    public function cloneAction($userroleid) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userroleid);
        $this->client->queueServiceActionCall("userrole", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    /**
     * Deletes an existing user role object.
     * @param int $userroleid - The user role's unique identifier
     * @return KalturaUserRole - user role object.
     */
    public function delete($userroleid) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userroleid);
        $this->client->queueServiceActionCall("userrole", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    /**
     * Retrieves a user role object using its ID.
     * @param int $userroleid - The user role's unique identifier.
     * @return KalturaUserRole - user role object.
     */
    public function get($userroleid) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userroleid);
        $this->client->queueServiceActionCall("userrole", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    /**
     * Lists user role objects that are associated with an account.
     * Blocked user roles are listed unless you use a filter to exclude them.
     * Deleted user roles are not listed unless you use a filter to include them.
     * @param KalturaUserRoleFilter $filter - A filter used to exclude specific types of user roles
     * @param KalturaFilterPager $pager - A limit for the number of records to display on a page
     * @return KalturaUserRoleListResponse - list of user role.
     */
    public function listAction(KalturaUserRoleFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("userrole", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRoleListResponse");
        return $resultobject;
    }

    /**
     * Updates an existing user role object.
     * @param int $userroleid - The user role's unique identifier
     * @param KalturaUserRole $userrole - The user role's unique identifier
     * @return KalturaUserRole - user role object.
     */
    public function update($userroleid, KalturaUserRole $userrole) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userroleid);
        $this->client->addParam($kparams, "userRole", $userrole->toParams());
        $this->client->queueServiceActionCall("userrole", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }
}

/**
 * Kaltura User Service.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura User Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Adds a new user to an existing account in the Kaltura database.
     * Input param $id is the unique identifier in the partner's system.
     * @param KalturaUser $user - The new user
     * @return KalturaUser - user object.
     */
    public function add(KalturaUser $user) {
        $kparams = array();
        $this->client->addParam($kparams, "user", $user->toParams());
        $this->client->queueServiceActionCall("user", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Add from bulkupload.
     * @param file $filedata - file data.
     * @param KalturaBulkUploadJobData $bulkuploaddata - bulkupload data.
     * @param KalturaBulkUploadUserData $bulkuploaduserdata - bulkupload user data.
     * @return KalturaBulkUpload - bulkupload object.
     */
    public function addFromBulkUpload($filedata, KalturaBulkUploadJobData $bulkuploaddata = null,
                                      KalturaBulkUploadUserData $bulkuploaduserdata = null) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        if ($bulkuploaddata !== null) {
            $this->client->addParam($kparams, "bulkUploadData", $bulkuploaddata->toParams());
        }
        if ($bulkuploaduserdata !== null) {
            $this->client->addParam($kparams, "bulkUploadUserData", $bulkuploaduserdata->toParams());
        }
        $this->client->queueServiceActionCall("user", "addFromBulkUpload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Action which checks whether user login.
     * @param KalturaUserLoginDataFilter $filter - filter object.
     * @return bool - wheter user login.
     */
    public function checkLoginDataExists(KalturaUserLoginDataFilter $filter) {
        $kparams = array();
        $this->client->addParam($kparams, "filter", $filter->toParams());
        $this->client->queueServiceActionCall("user", "checkLoginDataExists", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * Deletes a user from a partner account.
     * @param string $userid - The user's unique identifier in the partner's system.
     * @return KalturaUser - user object.
     */
    public function delete($userid) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("user", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Disables a user's ability to log into a partner account using an email address and a password.
     * You may use either a userId or a loginId parameter for this action.
     * @param string $userid - The user's unique identifier in the partner's system.
     * @param string $loginid - The user's email address that identifies the user for login.
     * @return KalturaUser - user object.
     */
    public function disableLogin($userid = null, $loginid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "loginId", $loginid);
        $this->client->queueServiceActionCall("user", "disableLogin", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Enables a user to log into a partner account using an email address and a password.
     * @param string $userid - The user's unique identifier in the partner's system.
     * @param string $loginid - The user's email address that identifies the user for login.
     * @param string $password - The user's password.
     * @return KalturaUser
     */
    public function enableLogin($userid, $loginid, $password = null) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "loginId", $loginid);
        $this->client->addParam($kparams, "password", $password);
        $this->client->queueServiceActionCall("user", "enableLogin", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Retrieves a user object for a specified user ID.
     * @param string $userid - The user's unique identifier in the partner's system.
     * @return KalturaUser - user object.
     */
    public function get($userid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("user", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Retrieves a user object for a user's login ID and partner ID.
     * A login ID is the email address used by a user to log into the system.
     * @param string $loginid - The user's email address that identifies the user for login
     * @return KalturaUser - user object.
     */
    public function getByLoginId($loginid) {
        $kparams = array();
        $this->client->addParam($kparams, "loginId", $loginid);
        $this->client->queueServiceActionCall("user", "getByLoginId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Index an entry by id.
     * @param string $id - user id.
     * @param bool $shouldupdate - whether existing user.
     * @return string - index.
     */
    public function index($id, $shouldupdate = true) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("user", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Lists user objects that are associated with an account.
     * Blocked users are listed unless you use a filter to exclude them.
     * Deleted users are not listed unless you use a filter to include them.
     * @param KalturaUserFilter $filter - filter used to exclude specific types of users
     * @param KalturaFilterPager $pager - A limit for the number of records to display on a page
     * @return KalturaUserListResponse - list of user object.
     */
    public function listAction(KalturaUserFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("user", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserListResponse");
        return $resultobject;
    }

    /**
     * Logs a user into a partner account with a partner ID, a partner user ID (puser), and a user password.
     * @param int $partnerid - The identifier of the partner account
     * @param string $userid - The user's unique identifier in the partner's system
     * @param string $password - The user's password
     * @param int $expiry - The requested time (in seconds) before the generated KS expires (default is 24 hours).
     * @param string $privileges - Special privileges.
     * @return string - login status.
     */
    public function login($partnerid, $userid, $password, $expiry = 86400, $privileges = "*") {
        $kparams = array();
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->queueServiceActionCall("user", "login", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Loges a user to the destination account as long the ks user id exists.
     * in the desc acount and the loginData id match for both accounts.
     * @param int $requestedpartnerid - partner id.
     * @return KalturaSessionResponse - session string.
     */
    public function loginByKs($requestedpartnerid) {
        $kparams = array();
        $this->client->addParam($kparams, "requestedPartnerId", $requestedpartnerid);
        $this->client->queueServiceActionCall("user", "loginByKs", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSessionResponse");
        return $resultobject;
    }

    /**
     * Logs a user into a partner account with a user login ID and a user password.
     * @param string $loginid - The user's email address that identifies the user for login
     * @param string $password - The user's password
     * @param int $partnerid - The identifier of the partner account
     * @param int $expiry - The requested time (in seconds) before the generated KS expires (default is 24 hours).
     * @param string $privileges - Special privileges
     * @param string $otp - The user's one-time password
     * @return string - login status.
     */
    public function loginByLoginId($loginid, $password, $partnerid = null, $expiry = 86400, $privileges = "*", $otp = null) {
        $kparams = array();
        $this->client->addParam($kparams, "loginId", $loginid);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->addParam($kparams, "otp", $otp);
        $this->client->queueServiceActionCall("user", "loginByLoginId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Notifies that a user is banned from an account.
     * @param string $userid - The user's unique identifier in the partner's system
     */
    public function notifyBan($userid) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("user", "notifyBan", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Reset user's password and send the user an email to generate a new one.
     * @param string $email - The user's email address (login email).
     */
    public function resetPassword($email) {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->queueServiceActionCall("user", "resetPassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Set initial users password.
     * @param string $hashkey - The hash key used to identify the user (retrieved by email)
     * @param string $newpassword - The new password to set for the user
     */
    public function setInitialPassword($hashkey, $newpassword) {
        $kparams = array();
        $this->client->addParam($kparams, "hashKey", $hashkey);
        $this->client->addParam($kparams, "newPassword", $newpassword);
        $this->client->queueServiceActionCall("user", "setInitialPassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Updates an existing user object.
     * You can also use this action to update the userId.
     * @param string $userid - The user's unique identifier in the partner's system
     * @param KalturaUser $user - Id The user's unique identifier in the partner's system
     * @return KalturaUser - user object.
     */
    public function update($userid, KalturaUser $user) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "user", $user->toParams());
        $this->client->queueServiceActionCall("user", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    /**
     * Updates a user's login data: email, password, name.
     * @param string $oldloginid - The user's current email address that identified the user for login
     * @param string $password - The user's current email address that identified the user for login
     * @param string $newloginid - Optional, The user's email address that will identify the user for login
     * @param string $newpassword - Optional, The user's new password
     * @param string $newfirstname - Optional, The user's new first name
     * @param string $newlastname - Optional, The user's new last name
     */
    public function updateLoginData($oldloginid, $password, $newloginid = "", $newpassword = "",
                                    $newfirstname = null, $newlastname = null) {
        $kparams = array();
        $this->client->addParam($kparams, "oldLoginId", $oldloginid);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "newLoginId", $newloginid);
        $this->client->addParam($kparams, "newPassword", $newpassword);
        $this->client->addParam($kparams, "newFirstName", $newfirstname);
        $this->client->addParam($kparams, "newLastName", $newlastname);
        $this->client->queueServiceActionCall("user", "updateLoginData", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Widget Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new widget, can be attached to entry or kshow.
     * SourceWidget is ignored.
     * @param KalturaWidget $widget - widget object.
     * @return KalturaWidget - widget object.
     */
    public function add(KalturaWidget $widget) {
        $kparams = array();
        $this->client->addParam($kparams, "widget", $widget->toParams());
        $this->client->queueServiceActionCall("widget", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaWidget");
        return $resultobject;
    }

    /**
     * Add widget based on existing widget.
     * Must provide valid sourceWidgetId
     * @param KalturaWidget $widget - widget object.
     * @return KalturaWidget - widget object.
     */
    public function cloneAction(KalturaWidget $widget) {
        $kparams = array();
        $this->client->addParam($kparams, "widget", $widget->toParams());
        $this->client->queueServiceActionCall("widget", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaWidget");
        return $resultobject;
    }

    /**
     * Get widget by id.
     * @param string $id - id of widget.
     * @return KalturaWidget - widget object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("widget", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaWidget");
        return $resultobject;
    }

    /**
     * Retrieve a list of available widget depends on the filter given.
     * @param KalturaWidgetFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaWidgetListResponse - list of widget object.
     */
    public function listAction(KalturaWidgetFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("widget", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaWidgetListResponse");
        return $resultobject;
    }

    /**
     * Update exisiting widget.
     * @param string $id - id of widget.
     * @param KalturaWidget $widget - widget object.
     * @return KalturaWidget - widget object.
     */
    public function update($id, KalturaWidget $widget) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "widget", $widget->toParams());
        $this->client->queueServiceActionCall("widget", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaWidget");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 20182020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClient extends KalturaClientBase {
    /**
     * Manage access control profiles
     * @var KalturaAccessControlProfileService
     */
    public $accessControlProfile = null;

    /**
     * Add & Manage Access Controls
     * @var KalturaAccessControlService
     */
    public $accessControl = null;

    /**
     * Manage details for the administrative user
     * @var KalturaAdminUserService
     */
    public $adminUser = null;

    /**
     * Api for getting analytics data
     * @var KalturaAnalyticsService
     */
    public $analytics = null;

    /**
     * Manage application authentication tokens
     * @var KalturaAppTokenService
     */
    public $appToken = null;

    /**
     * Base Entry Service
     * @var KalturaBaseEntryService
     */
    public $baseEntry = null;

    /**
     * Bulk upload service is used to upload & manage bulk uploads using CSV files.
     *  This service manages only entry bulk uploads.
     * @var KalturaBulkUploadService
     */
    public $bulkUpload = null;

    /**
     * Add & Manage CategoryEntry - assign entry to category
     * @var KalturaCategoryEntryService
     */
    public $categoryEntry = null;

    /**
     * Add & Manage Categories
     * @var KalturaCategoryService
     */
    public $category = null;

    /**
     * Add & Manage CategoryUser - membership of a user in a category
     * @var KalturaCategoryUserService
     */
    public $categoryUser = null;

    /**
     * Manage the connection between Conversion Profiles and Asset Params
     * @var KalturaConversionProfileAssetParamsService
     */
    public $conversionProfileAssetParams = null;

    /**
     * Add & Manage Conversion Profiles
     * @var KalturaConversionProfileService
     */
    public $conversionProfile = null;

    /**
     * Data service lets you manage data content (textual content)
     * @var KalturaDataService
     */
    public $data = null;

    /**
     * Delivery service is used to control delivery objects
     * @var KalturaDeliveryProfileService
     */
    public $deliveryProfile = null;

    /**
     * EmailIngestionProfile service lets you manage email ingestion profile records
     * @var KalturaEmailIngestionProfileService
     */
    public $EmailIngestionProfile = null;

    /**
     * Base class for entry server node
     * @var KalturaEntryServerNodeService
     */
    public $entryServerNode = null;

    /**
     * Manage file assets
     * @var KalturaFileAssetService
     */
    public $fileAsset = null;

    /**
     * Retrieve information and invoke actions on Flavor Asset
     * @var KalturaFlavorAssetService
     */
    public $flavorAsset = null;

    /**
     * Flavor Params Output service
     * @var KalturaFlavorParamsOutputService
     */
    public $flavorParamsOutput = null;

    /**
     * Add & Manage Flavor Params
     * @var KalturaFlavorParamsService
     */
    public $flavorParams = null;

    /**
     * Add & Manage GroupUser
     * @var KalturaGroupUserService
     */
    public $groupUser = null;

    /**
     * Manage live channel segments
     * @var KalturaLiveChannelSegmentService
     */
    public $liveChannelSegment = null;

    /**
     * Live Channel service lets you manage live channels
     * @var KalturaLiveChannelService
     */
    public $liveChannel = null;

    /**
     * @var KalturaLiveReportsService
     */
    public $liveReports = null;

    /**
     * Stats Service
     * @var KalturaLiveStatsService
     */
    public $liveStats = null;

    /**
     * Live Stream service lets you manage live stream entries
     * @var KalturaLiveStreamService
     */
    public $liveStream = null;

    /**
     * Media Info service
     * @var KalturaMediaInfoService
     */
    public $mediaInfo = null;

    /**
     * Media service lets you upload and manage media files (images / videos & audio)
     * @var KalturaMediaService
     */
    public $media = null;

    /**
     * A Mix is an XML unique format invented by Kaltura, it allows the user to create a mix of videos and images,
     * in and out points, transitions, text overlays, soundtrack, effects and much more...
     * Mixing service lets you create a new mix, manage its metadata and make basic manipulations.
     * @var KalturaMixingService
     */
    public $mixing = null;

    /**
     * Notification Service
     * @var KalturaNotificationService
     */
    public $notification = null;

    /**
     * Partner service allows you to change/manage your partner personal details and settings as well
     * @var KalturaPartnerService
     */
    public $partner = null;

    /**
     * PermissionItem service lets you create and manage permission items
     * @var KalturaPermissionItemService
     */
    public $permissionItem = null;

    /**
     * Permission service lets you create and manage user permissions
     * @var KalturaPermissionService
     */
    public $permission = null;

    /**
     * Playlist service lets you create,manage and play your playlists
     *  Playlists could be static (containing a fixed list of entries) or dynamic (baseed on a filter)
     * @var KalturaPlaylistService
     */
    public $playlist = null;

    /**
     * Api for getting reports data by the report type and some inputFilter
     * @var KalturaReportService
     */
    public $report = null;

    /**
     * Manage response profiles
     * @var KalturaResponseProfileService
     */
    public $responseProfile = null;

    /**
     * Expose the schema definitions for syndication MRSS, bulk upload XML and other schema types.
     * @var KalturaSchemaService
     */
    public $schema = null;

    /**
     * Search service allows you to search for media in various media providers
     *  This service is being used mostly by the CW component
     * @var KalturaSearchService
     */
    public $search = null;

    /**
     * Server Node service
     * @var KalturaServerNodeService
     */
    public $serverNode = null;

    /**
     * Session service
     * @var KalturaSessionService
     */
    public $session = null;

    /**
     * Stats Service
     * @var KalturaStatsService
     */
    public $stats = null;

    /**
     * Storage Profiles service
     * @var KalturaStorageProfileService
     */
    public $storageProfile = null;

    /**
     * Add & Manage Syndication Feeds
     * @var KalturaSyndicationFeedService
     */
    public $syndicationFeed = null;

    /**
     * System service is used for internal system helpers & to retrieve system level information
     * @var KalturaSystemService
     */
    public $system = null;

    /**
     * Retrieve information and invoke actions on Thumb Asset
     * @var KalturaThumbAssetService
     */
    public $thumbAsset = null;

    /**
     * Thumbnail Params Output service
     * @var KalturaThumbParamsOutputService
     */
    public $thumbParamsOutput = null;

    /**
     * Add & Manage Thumb Params
     * @var KalturaThumbParamsService
     */
    public $thumbParams = null;

    /**
     * UiConf service lets you create and manage your UIConfs for the various flash components
     * This service is used by the KMC-ApplicationStudio
     * @var KalturaUiConfService
     */
    public $uiConf = null;

    /**
     * @var KalturaUploadService
     */
    public $upload = null;

    /**
     * @var KalturaUploadTokenService
     */
    public $uploadToken = null;

    /**
     * @var KalturaUserEntryService
     */
    public $userEntry = null;

    /**
     * UserRole service lets you create and manage user roles
     * @var KalturaUserRoleService
     */
    public $userRole = null;

    /**
     * Manage partner users on Kaltura's side
     * The userId in kaltura is the unique Id in the partner's system, and the [partnerId,Id] couple are unique key in kaltura's DB
     * @var KalturaUserService
     */
    public $user = null;

    /**
     * Widget service for full widget management
     * @var KalturaWidgetService
     */
    public $widget = null;

    /**
     * Kaltura client constructor.
     *
     * @param KalturaConfiguration $config - configuration object.
     */
    public function __construct(KalturaConfiguration $config) {
        parent::__construct($config);

        $this->setClientTag('php5:17-12-02');
        $this->setApiVersion('3.3.0');

        $this->accessControlProfile = new KalturaAccessControlProfileService($this);
        $this->accessControl = new KalturaAccessControlService($this);
        $this->adminUser = new KalturaAdminUserService($this);
        $this->analytics = new KalturaAnalyticsService($this);
        $this->appToken = new KalturaAppTokenService($this);
        $this->baseEntry = new KalturaBaseEntryService($this);
        $this->bulkUpload = new KalturaBulkUploadService($this);
        $this->categoryEntry = new KalturaCategoryEntryService($this);
        $this->category = new KalturaCategoryService($this);
        $this->categoryUser = new KalturaCategoryUserService($this);
        $this->conversionProfileAssetParams = new KalturaConversionProfileAssetParamsService($this);
        $this->conversionProfile = new KalturaConversionProfileService($this);
        $this->data = new KalturaDataService($this);
        $this->deliveryProfile = new KalturaDeliveryProfileService($this);
        $this->EmailIngestionProfile = new KalturaEmailIngestionProfileService($this);
        $this->entryServerNode = new KalturaEntryServerNodeService($this);
        $this->fileAsset = new KalturaFileAssetService($this);
        $this->flavorAsset = new KalturaFlavorAssetService($this);
        $this->flavorParamsOutput = new KalturaFlavorParamsOutputService($this);
        $this->flavorParams = new KalturaFlavorParamsService($this);
        $this->groupUser = new KalturaGroupUserService($this);
        $this->liveChannelSegment = new KalturaLiveChannelSegmentService($this);
        $this->liveChannel = new KalturaLiveChannelService($this);
        $this->liveReports = new KalturaLiveReportsService($this);
        $this->liveStats = new KalturaLiveStatsService($this);
        $this->liveStream = new KalturaLiveStreamService($this);
        $this->mediaInfo = new KalturaMediaInfoService($this);
        $this->media = new KalturaMediaService($this);
        $this->mixing = new KalturaMixingService($this);
        $this->notification = new KalturaNotificationService($this);
        $this->partner = new KalturaPartnerService($this);
        $this->permissionItem = new KalturaPermissionItemService($this);
        $this->permission = new KalturaPermissionService($this);
        $this->playlist = new KalturaPlaylistService($this);
        $this->report = new KalturaReportService($this);
        $this->responseProfile = new KalturaResponseProfileService($this);
        $this->schema = new KalturaSchemaService($this);
        $this->search = new KalturaSearchService($this);
        $this->serverNode = new KalturaServerNodeService($this);
        $this->session = new KalturaSessionService($this);
        $this->stats = new KalturaStatsService($this);
        $this->storageProfile = new KalturaStorageProfileService($this);
        $this->syndicationFeed = new KalturaSyndicationFeedService($this);
        $this->system = new KalturaSystemService($this);
        $this->thumbAsset = new KalturaThumbAssetService($this);
        $this->thumbParamsOutput = new KalturaThumbParamsOutputService($this);
        $this->thumbParams = new KalturaThumbParamsService($this);
        $this->uiConf = new KalturaUiConfService($this);
        $this->upload = new KalturaUploadService($this);
        $this->uploadToken = new KalturaUploadTokenService($this);
        $this->userEntry = new KalturaUserEntryService($this);
        $this->userRole = new KalturaUserRoleService($this);
        $this->user = new KalturaUserService($this);
        $this->widget = new KalturaWidgetService($this);
    }

    /**
     * Set client tag.
     * @param string $clienttag - client tag.
     */
    public function setClientTag($clienttag) {
        $this->clientConfiguration['clientTag'] = $clienttag;
    }

    /**
     * Get client tag.
     * @return string - client tag.
     */
    public function getClientTag() {
        if (isset($this->clientConfiguration['clientTag'])) {
            return $this->clientConfiguration['clientTag'];
        }

        return null;
    }

    /**
     * Set API version.
     * @param string $apiversion - API version.
     */
    public function setApiVersion($apiversion) {
        $this->clientConfiguration['apiVersion'] = $apiversion;
    }

    /**
     * Get API version.
     * @return string - API version.
     */
    public function getApiVersion() {
        if (isset($this->clientConfiguration['apiVersion'])) {
            return $this->clientConfiguration['apiVersion'];
        }

        return null;
    }

    /**
     * Impersonated partner id
     * @param int $partnerid - partner id.
     */
    public function setPartnerId($partnerid) {
        $this->requestConfiguration['partnerId'] = $partnerid;
    }

    /**
     * Impersonated partner id
     * @return int - partner id.
     */
    public function getPartnerId() {
        if (isset($this->requestConfiguration['partnerId'])) {
            return $this->requestConfiguration['partnerId'];
        }

        return null;
    }

    /**
     * Kaltura API session
     * @param string $ks - session string.
     */
    public function setKs($ks) {
        $this->requestConfiguration['ks'] = $ks;
    }

    /**
     * Kaltura API session
     * @return string - session string.
     */
    public function getKs() {
        if (isset($this->requestConfiguration['ks'])) {
            return $this->requestConfiguration['ks'];
        }

        return null;
    }

    /**
     * Kaltura API session
     * @param string $sessionid - session id.
     */
    public function setSessionId($sessionid) {
        $this->requestConfiguration['ks'] = $sessionid;
    }

    /**
     * Kaltura API session
     * @return string
     */
    public function getSessionId() {
        if (isset($this->requestConfiguration['ks'])) {
            return $this->requestConfiguration['ks'];
        }

        return null;
    }

    /**
     * Response profile - this attribute will be automatically unset after every API call.
     * @param KalturaBaseResponseProfile $responseprofile - response profile.
     */
    public function setResponseProfile(KalturaBaseResponseProfile $responseprofile) {
        $this->requestConfiguration['responseProfile'] = $responseprofile;
    }

    /**
     * Response profile - this attribute will be automatically unset after every API call.
     * @return KalturaBaseResponseProfile
     */
    public function getResponseProfile() {
        if (isset($this->requestConfiguration['responseProfile'])) {
            return $this->requestConfiguration['responseProfile'];
        }

        return null;
    }

    /**
     * Clear all volatile configuration parameters
     */
    public function resetRequest() {
        parent::resetRequest();
        unset($this->requestConfiguration['responseProfile']);
    }
}

