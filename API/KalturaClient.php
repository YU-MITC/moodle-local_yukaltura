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
require_once("KalturaEnums.php");
require_once("KalturaTypes.php");

/**
 * Kaltura Access Control Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlService extends KalturaServiceBase
{
    /**
     * Constructor of Kaltura Access Control Service.
     * @param {object} $client - instance of KalturaClinet.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function add new access control profile.
     * @param {object} $accesscontrol - instance of KalturaAccessControl has description of access control profile.
     * @return {object} - instance of KalturaAccessControl.
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
     * This function get Access Control Profile by id.
     * @param {int} $id - access control profile id.
     * @return {object} - instance of KalturaAccessControl.
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
     * This function update Access Control Profile.
     * @param {int} $id - id of access control profile.
     * @param {object} $accesscontrol - instance of KalturaAccessControl has description of access control profile.
     * @return {object} - instance of KalturaAccessControl after update.
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

    /**
     * This function delete Access Control Profile by id.
     * @param {int} $id - id of access control profile user want to delete.
     * @return {object} - this function return "null".
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
        return $resultobject;
    }

    /**
     * This function list access control profiles by filter and pager.
     * @param {object} $filter - instance of KalturaAccessControlFilter.
     * @param {object} $pager - instance of KalturaFilterPager.
     * @return {object} - instance of KalturaAccessControlListResponse.
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
}

/**
 * Kaltura Admin User Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserService extends KalturaServiceBase
{
    /**
     * Constructor of Kaltura Admin User Service.
     * @param {object} $client - instance of KalturaClinet.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * This function update admin user password and email.
     * @param {string} $email - current email address.
     * @param {string} $password - current password.
     * @param {string} $newemail - new email address.
     * @param {string} $newpassword - new password.
     * @return {object} - instance of KalturaAdminUser.
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

    /**
     * This function reset admin user password and sent it to the users email address.
     * @param {string} $email - email address.
     * @return {object} - this function return "null".
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
        return $resultobject;
    }

    /**
     * This function get an admin session using admin email and password (Used for login to the KMC application).
     * @param {string} $email - email address of admin user.
     * @param {string} $password - password of admin user.
     * @param {int} - $partnerid - partner ID of admin user.
     * @return {string} - session string.
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
     * This func tion set initial password of admin user.
     * @param {string} $haskkey - has key (admin secret).
     * @param {string} $newpassword - new password of admin user.
     * @return {object} - this function return "null".
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
        return $resultobject;
    }
}

/**
 * Kaltura Base Entry Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBaseEntryService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function updateContent($entryid, KalturaResource $resource, $conversionprofileid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->queueServiceActionCall("baseentry", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Bulk Upload Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add($conversionprofileid, $csvfiledata, $bulkuploadtype = null, $uploadedby = null) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $kfiles = array();
        $this->client->addParam($kfiles, "csvFileData", $csvfiledata);
        $this->client->addParam($kparams, "bulkUploadType", $bulkuploadtype);
        $this->client->addParam($kparams, "uploadedBy", $uploadedby);
        $this->client->queueServiceActionCall("bulkupload", "add", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

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

    public function serve($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('bulkupload', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveLog($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('bulkupload', 'serveLog', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

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
}

/**
 * Kaltura Category Entry Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryEntryService extends KalturaServiceBase {
    function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Activate CategoryEntry when it is pending moderation
     * @param string $entryid
     * @param int $categoryid
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
     *
     * @param KalturaCategoryEntry $categoryentry
     * @return KalturaCategoryEntry
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
     * Add from bulk upload.
     * @param KalturaBulkServiceData $bulkuploaddata
     * @param KalturaBulkUploadCategoryEntryData $bulkuploadcategoryentrydata
     * @return KalturaBulkUpload
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
     * Delete CategoryEntry.
     * @param string $entryid
     * @param int $categoryid
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
     * Index CategoryEntry by Id.
     * @param string $entryid
     * @param int $categoryid
     * @param bool $shouldupdate
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
     * List all categoryEntry.
     * @param KalturaCategoryEntryFilter $filter
     * @param KalturaFilterPager $pager
     * @return KalturaCategoryEntryListResponse
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
     * Activate CategoryEntry when it is pending moderation.
     * @param string $entrid
     * @param int $categoryid
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
     * Update privacy context from the category.
     * @param string $entryid
     * @param int $categoryid
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
 * Kaltura Category Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCategoryService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("category", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaCategoryFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
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
}

/**
 * Kaltura Conversion Profile Asset Params Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileAssetParamsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
 * Kaltura Conversion Profile Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaConversionProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function getDefault() {
        $kparams = array();
        $this->client->queueServiceActionCall("conversionprofile", "getDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaConversionProfile");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Data Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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

    public function serve($entryid, $version = -1, $forceproxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall('data', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * Kaltura Document Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function addFromUploadedFile(KalturaDocumentEntry $documententry, $uploadtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->queueServiceActionCall("document", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function addFromEntry($sourceentryid, KalturaDocumentEntry $documententry = null, $sourceflavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        if ($documententry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $sourceflavorparamsid);
        $this->client->queueServiceActionCall("document", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function addFromFlavorAsset($sourceflavorassetid, KalturaDocumentEntry $documententry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $sourceflavorassetid);
        if ($documententry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        }
        $this->client->queueServiceActionCall("document", "addFromFlavorAsset", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function convert($entryid, $conversionprofileid = null, array $dynamicconversionattributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        if ($dynamicconversionattributes !== null) {
            foreach ($dynamicconversionattributes as $index => $obj) {
                $this->client->addParam($kparams, "dynamicConversionAttributes:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("document", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("document", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function update($entryid, KalturaDocumentEntry $documententry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        $this->client->queueServiceActionCall("document", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listAction(KalturaDocumentEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("document", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentListResponse");
        return $resultobject;
    }

    public function upload($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("document", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function convertPptToSwf($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document", "convertPptToSwf", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function serve($entryid, $flavorassetid = null, $forceproxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorAssetId", $flavorassetid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall('document', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveByFlavorParamsId($entryid, $flavorparamsid = null, $forceproxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall('document', 'serveByFlavorParamsId', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * Kaltura Email Ingestion Profile Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Flavor Asset Servicec
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function convert($entryid, $flavorparamsid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("flavorasset", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

    public function getUrl($id, $storageid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->queueServiceActionCall("flavorasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

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
}

/**
 * Kaltura Flavor Params Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Live Streaming Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaLiveStreamAdminEntry $livestreamentry, $sourcetype = null) {
        $kparams = array();
        $this->client->addParam($kparams, "liveStreamEntry", $livestreamentry->toParams());
        $this->client->addParam($kparams, "sourceType", $sourcetype);
        $this->client->queueServiceActionCall("livestream", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamAdminEntry");
        return $resultobject;
    }

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

    public function update($entryid, KalturaLiveStreamAdminEntry $livestreamentry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "liveStreamEntry", $livestreamentry->toParams());
        $this->client->queueServiceActionCall("livestream", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamAdminEntry");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Media Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMediaService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

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

    public function updateContent($entryid, KalturaResource $resource, $conversionprofileid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->queueServiceActionCall("media", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }
}

/**
 * Kaltura Mixing Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixingService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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

    public function requestFlattening($entryid, $fileformat, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "fileFormat", $fileformat);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("mixing", "requestFlattening", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

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
        return $resultobject;
    }
}

/**
 * Kaltura Notification Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
 * Kaltura Partner Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function register(KalturaPartner $partner, $cmspassword = "") {
        $kparams = array();
        $this->client->addParam($kparams, "partner", $partner->toParams());
        $this->client->addParam($kparams, "cmsPassword", $cmspassword);
        $this->client->queueServiceActionCall("partner", "register", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

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

    public function getUsage($year = "", $month = 1, $resolution = "days") {
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
}

/**
 * Kaltura Permission Item Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Permission Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Playlist Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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

    public function execute($id, $detailed = "") {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "detailed", $detailed);
        $this->client->queueServiceActionCall("playlist", "execute", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function executeFromContent($playlisttype, $playlistcontent, $detailed = "") {
        $kparams = array();
        $this->client->addParam($kparams, "playlistType", $playlisttype);
        $this->client->addParam($kparams, "playlistContent", $playlistcontent);
        $this->client->addParam($kparams, "detailed", $detailed);
        $this->client->queueServiceActionCall("playlist", "executeFromContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function executeFromFilters(array $filters, $totalresults, $detailed = "") {
        $kparams = array();
        foreach ($filters as $index => $obj) {
            $this->client->addParam($kparams, "filters:$index", $obj->toParams());
        }
        $this->client->addParam($kparams, "totalResults", $totalresults);
        $this->client->addParam($kparams, "detailed", $detailed);
        $this->client->queueServiceActionCall("playlist", "executeFromFilters", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

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
}

/**
 * Kaltura Report Serice
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Schema Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSchemaService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function serve($type) {
        $kparams = array();
        $this->client->addParam($kparams, "type", $type);
        $this->client->queueServiceActionCall('schema', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * Kaltura Search Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSearchService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Session Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function end() {
        $kparams = array();
        $this->client->queueServiceActionCall("session", "end", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

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
 * Kaltura Stats Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStatsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function collect(KalturaStatsEvent $event) {
        $kparams = array();
        $this->client->addParam($kparams, "event", $event->toParams());
        $this->client->queueServiceActionCall("stats", "collect", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
 * Kaltura Storage Profile Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Syndication Feed Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura System Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSystemService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura ThumAsset Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function serveByEntryId($entryid, $thumbparamid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "thumbParamId", $thumbparamid);
        $this->client->queueServiceActionCall('thumbasset', 'serveByEntryId', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serve($thumbassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbassetid);
        $this->client->queueServiceActionCall('thumbasset', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

    public function getUrl($id, $storageid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->queueServiceActionCall("thumbasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

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
}

/**
 * Kaltura ThumbParams Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura UiConf Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Upload Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura Upload Token Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura User Role Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura User Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function get($userid) {
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
        return $resultobject;
    }

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

    public function loginByLoginId($loginid, $password, $partnerid = null, $expiry = 86400, $privileges = "*") {
        $kparams = array();
        $this->client->addParam($kparams, "loginId", $loginid);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "partnerId", $partnerid);
        $this->client->addParam($kparams, "expiry", $expiry);
        $this->client->addParam($kparams, "privileges", $privileges);
        $this->client->queueServiceActionCall("user", "loginByLoginId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
        return $resultobject;
    }

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
}

/**
 * Kaltura Widget Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaWidgetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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
}

/**
 * Kaltura XInternal Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaXInternalService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function xAddBulkDownload($entryids, $flavorparamsid = "") {
        $kparams = array();
        $this->client->addParam($kparams, "entryIds", $entryids);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->queueServiceActionCall("xinternal", "xAddBulkDownload", $kparams);
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
 * Kaltura Client class.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaClient extends KalturaClientBase
{
    /**
     * @var API Version
     */
    protected $apiVersion = '3.1.4';

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
     * Base Entry Service
     * @var KalturaBaseEntryService
     */
    public $baseEntry = null;

    /**
     * Bulk upload service is used to upload & manage bulk uploads using CSV files
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
     * Document service
     * DEPRECATED
     * @var KalturaDocumentService
     */
    public $document = null;

    /**
     * EmailIngestionProfile service lets you manage email ingestion profile records
     * @var KalturaEmailIngestionProfileService
     */
    public $EmailIngestionProfile = null;

    /**
     * Retrieve information and invoke actions on Flavor Asset
     * @var KalturaFlavorAssetService
     */
    public $flavorAsset = null;

    /**
     * Add & Manage Flavor Params
     * @var KalturaFlavorParamsService
     */
    public $flavorParams = null;

    /**
     * Live Stream service lets you manage live stream channels
     * @var KalturaLiveStreamService
     */
    public $liveStream = null;

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
     * partner service allows you to change/manage your partner personal details and settings as well
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
     * Playlists could be static (containing a fixed list of entries) or dynamic (baseed on a filter)
     * @var KalturaPlaylistService
     */
    public $playlist = null;

    /**
     * api for getting reports data by the report type and some inputFilter
     * @var KalturaReportService
     */
    public $report = null;

    /**
     * Expose the schema definitions for syndication MRSS, bulk upload XML and other schema types.
     *
     * @var KalturaSchemaService
     */
    public $schema = null;

    /**
     * Search service allows you to search for media in various media providers
     * This service is being used mostly by the CW component
     * @var KalturaSearchService
     */
    public $search = null;

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
     *
     * @var KalturaUploadService
     */
    public $upload = null;

    /**
     *
     * @var KalturaUploadTokenService
     */
    public $uploadToken = null;

    /**
     * UserRole service lets you create and manage user roles
     * @var KalturaUserRoleService
     */
    public $userRole = null;

    /**
     * Manage partner users on Kaltura's side
     * The userId in kaltura is the unique Id in the partner's system,
     * and the [partnerId,Id] couple are unique key in kaltura's DB.
     * @var KalturaUserService
     */
    public $user = null;

    /**
     * widget service for full widget management
     * @var KalturaWidgetService
     */
    public $widget = null;

    /**
     * Internal Service is used for actions that are used internally in Kaltura applications
     * and might be changed in the future without any notice.
     * @var KalturaXInternalService
     */
    public $xInternal = null;

    /**
     * Kaltura client constructor
     *
     * @param KalturaConfiguration $config
     */
    public function __construct(KalturaConfiguration $config) {
        parent::__construct($config);

        $this->accessControl = new KalturaAccessControlService($this);
        $this->adminUser = new KalturaAdminUserService($this);
        $this->baseEntry = new KalturaBaseEntryService($this);
        $this->bulkUpload = new KalturaBulkUploadService($this);
        $this->category = new KalturaCategoryService($this);
        $this->categoryEntry = new KalturaCategoryEntryService($this);
        $this->conversionProfileAssetParams = new KalturaConversionProfileAssetParamsService($this);
        $this->conversionProfile = new KalturaConversionProfileService($this);
        $this->data = new KalturaDataService($this);
        $this->document = new KalturaDocumentService($this);
        $this->EmailIngestionProfile = new KalturaEmailIngestionProfileService($this);
        $this->flavorAsset = new KalturaFlavorAssetService($this);
        $this->flavorParams = new KalturaFlavorParamsService($this);
        $this->liveStream = new KalturaLiveStreamService($this);
        $this->media = new KalturaMediaService($this);
        $this->mixing = new KalturaMixingService($this);
        $this->notification = new KalturaNotificationService($this);
        $this->partner = new KalturaPartnerService($this);
        $this->permissionItem = new KalturaPermissionItemService($this);
        $this->permission = new KalturaPermissionService($this);
        $this->playlist = new KalturaPlaylistService($this);
        $this->report = new KalturaReportService($this);
        $this->schema = new KalturaSchemaService($this);
        $this->search = new KalturaSearchService($this);
        $this->session = new KalturaSessionService($this);
        $this->stats = new KalturaStatsService($this);
        $this->storageProfile = new KalturaStorageProfileService($this);
        $this->syndicationFeed = new KalturaSyndicationFeedService($this);
        $this->system = new KalturaSystemService($this);
        $this->thumbAsset = new KalturaThumbAssetService($this);
        $this->thumbParams = new KalturaThumbParamsService($this);
        $this->uiConf = new KalturaUiConfService($this);
        $this->upload = new KalturaUploadService($this);
        $this->uploadToken = new KalturaUploadTokenService($this);
        $this->userRole = new KalturaUserRoleService($this);
        $this->user = new KalturaUserService($this);
        $this->widget = new KalturaWidgetService($this);
        $this->xInternal = new KalturaXInternalService($this);
    }
}

