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
require_once("KalturaEnums.php");
require_once("KalturaTypes.php");

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

/**
 * Kaltura Access Control Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaAccessControl $accessControl) {
        $kparams = array();
        $this->client->addParam($kparams, "accessControl", $accessControl->toParams());
        $this->client->queueServiceActionCall("accesscontrol", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControl");
        return $resultobject;
    }

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

    public function update($id, KalturaAccessControl $accessControl) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "accessControl", $accessControl->toParams());
        $this->client->queueServiceActionCall("accesscontrol", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAccessControl");
        return $resultobject;
    }

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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAdminUserService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function updatePassword($email, $password, $newEmail = "", $newPassword = "") {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "newEmail", $newEmail);
        $this->client->addParam($kparams, "newPassword", $newPassword);
        $this->client->queueServiceActionCall("adminuser", "updatePassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAdminUser");
        return $resultobject;
    }

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

    public function login($email, $password, $partnerId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "email", $email);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "partnerId", $partnerId);
        $this->client->queueServiceActionCall("adminuser", "login", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function setInitialPassword($hashKey, $newPassword) {
        $kparams = array();
        $this->client->addParam($kparams, "hashKey", $hashKey);
        $this->client->addParam($kparams, "newPassword", $newPassword);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function addContent($entryId, KalturaResource $resource) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function addFromUploadedFile(KalturaBaseEntry $entry, $uploadTokenId, $type = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
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

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function getRemotePaths($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("baseentry", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    public function update($entryId, KalturaBaseEntry $baseEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "baseEntry", $baseEntry->toParams());
        $this->client->queueServiceActionCall("baseentry", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    public function updateContent($entryId, KalturaResource $resource, $conversionProfileId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        $this->client->queueServiceActionCall("baseentry", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    public function getByIds($entryIds) {
        $kparams = array();
        $this->client->addParam($kparams, "entryIds", $entryIds);
        $this->client->queueServiceActionCall("baseentry", "getByIds", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function upload($fileData) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("baseentry", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function updateThumbnailJpeg($entryId, $fileData) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("baseentry", "updateThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    public function updateThumbnailFromUrl($entryId, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
        $this->client->addParam($kparams, "timeOffset", $timeOffset);
        $this->client->queueServiceActionCall("baseentry", "updateThumbnailFromSourceEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntry");
        return $resultobject;
    }

    public function flag(KalturaModerationFlag $moderationFlag) {
        $kparams = array();
        $this->client->addParam($kparams, "moderationFlag", $moderationFlag->toParams());
        $this->client->queueServiceActionCall("baseentry", "flag", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function reject($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("baseentry", "reject", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function approve($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("baseentry", "approve", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listFlags($entryId, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function anonymousRank($entryId, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function getContextData($entryId, KalturaEntryContextDataParams $contextDataParams) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkUploadService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add($conversionProfileId, $csvFileData, $bulkUploadType = null, $uploadedBy = null) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        $kfiles = array();
        $this->client->addParam($kfiles, "csvFileData", $csvFileData);
        $this->client->addParam($kparams, "bulkUploadType", $bulkUploadType);
        $this->client->addParam($kparams, "uploadedBy", $uploadedBy);
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
 * Kaltura Category Service
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function update($conversionProfileId, $assetParamsId,
                           KalturaConversionProfileAssetParams $conversionProfileAssetParams) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        $this->client->addParam($kparams, "assetParamsId", $assetParamsId);
        $this->client->addParam($kparams, "conversionProfileAssetParams", $conversionProfileAssetParams->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function add(KalturaConversionProfile $conversionProfile) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfile", $conversionProfile->toParams());
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

    public function update($id, KalturaConversionProfile $conversionProfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "conversionProfile", $conversionProfile->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDataService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaDataEntry $dataEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "dataEntry", $dataEntry->toParams());
        $this->client->queueServiceActionCall("data", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataEntry");
        return $resultobject;
    }

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function update($entryId, KalturaDataEntry $documentEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
        $this->client->queueServiceActionCall("data", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDataEntry");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function serve($entryId, $version = -1, $forceProxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "version", $version);
        $this->client->addParam($kparams, "forceProxy", $forceProxy);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function addFromUploadedFile(KalturaDocumentEntry $documentEntry, $uploadTokenId) {
        $kparams = array();
        $this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
        $this->client->queueServiceActionCall("document", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function addFromEntry($sourceEntryId, KalturaDocumentEntry $documentEntry = null, $sourceFlavorParamsId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
        if ($documentEntry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
        $this->client->queueServiceActionCall("document", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function addFromFlavorAsset($sourceFlavorAssetId, KalturaDocumentEntry $documentEntry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
        if ($documentEntry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
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

    public function convert($entryId, $conversionProfileId = null, array $dynamicConversionAttributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        if ($dynamicConversionAttributes !== null) {
            foreach($dynamicConversionAttributes as $index => $obj) {
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

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function update($entryId, KalturaDocumentEntry $documentEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "documentEntry", $documentEntry->toParams());
        $this->client->queueServiceActionCall("document", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function upload($fileData) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("document", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function convertPptToSwf($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("document", "convertPptToSwf", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function serve($entryId, $flavorAssetId = null, $forceProxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "flavorAssetId", $flavorAssetId);
        $this->client->addParam($kparams, "forceProxy", $forceProxy);
        $this->client->queueServiceActionCall('document', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveByFlavorParamsId($entryId, $flavorParamsId = null, $forceProxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
        $this->client->addParam($kparams, "forceProxy", $forceProxy);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaEmailIngestionProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaEmailIngestionProfile $EmailIP) {
        $kparams = array();
        $this->client->addParam($kparams, "EmailIP", $EmailIP->toParams());
        $this->client->queueServiceActionCall("emailingestionprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaEmailIngestionProfile");
        return $resultobject;
    }

    public function getByEmailAddress($emailAddress) {
        $kparams = array();
        $this->client->addParam($kparams, "emailAddress", $emailAddress);
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

    public function update($id, KalturaEmailIngestionProfile $EmailIP) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "EmailIP", $EmailIP->toParams());
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

    public function addMediaEntry(KalturaMediaEntry $mediaEntry, $uploadTokenId, $emailProfId, $fromAddress, $emailMsgId) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
        $this->client->addParam($kparams, "emailProfId", $emailProfId);
        $this->client->addParam($kparams, "fromAddress", $fromAddress);
        $this->client->addParam($kparams, "emailMsgId", $emailMsgId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorAssetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add($entryId, KalturaFlavorAsset $flavorAsset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "flavorAsset", $flavorAsset->toParams());
        $this->client->queueServiceActionCall("flavorasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    public function update($id, KalturaFlavorAsset $flavorAsset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "flavorAsset", $flavorAsset->toParams());
        $this->client->queueServiceActionCall("flavorasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaFlavorAsset");
        return $resultobject;
    }

    public function setContent($id, KalturaContentResource $contentResource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentResource->toParams());
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

    public function getByEntryId($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function getWebPlayableByEntryId($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("flavorasset", "getWebPlayableByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function convert($entryId, $flavorParamsId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
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

    public function getUrl($id, $storageId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageId);
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

    public function getDownloadUrl($id, $useCdn = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "useCdn", $useCdn);
        $this->client->queueServiceActionCall("flavorasset", "getDownloadUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function getFlavorAssetsWithParams($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaFlavorParamsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaFlavorParams $flavorParams) {
        $kparams = array();
        $this->client->addParam($kparams, "flavorParams", $flavorParams->toParams());
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

    public function update($id, KalturaFlavorParams $flavorParams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "flavorParams", $flavorParams->toParams());
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

    public function getByConversionProfileId($conversionProfileId) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLiveStreamService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaLiveStreamAdminEntry $liveStreamEntry, $sourceType = null) {
        $kparams = array();
        $this->client->addParam($kparams, "liveStreamEntry", $liveStreamEntry->toParams());
        $this->client->addParam($kparams, "sourceType", $sourceType);
        $this->client->queueServiceActionCall("livestream", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamAdminEntry");
        return $resultobject;
    }

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function update($entryId, KalturaLiveStreamAdminEntry $liveStreamEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "liveStreamEntry", $liveStreamEntry->toParams());
        $this->client->queueServiceActionCall("livestream", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamAdminEntry");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function updateOfflineThumbnailJpeg($entryId, $fileData) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("livestream", "updateOfflineThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLiveStreamEntry");
        return $resultobject;
    }

    public function updateOfflineThumbnailFromUrl($entryId, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function addContent($entryId, KalturaResource $resource = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function addFromUrl(KalturaMediaEntry $mediaEntry, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
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

    public function addFromSearchResult(KalturaMediaEntry $mediaEntry = null, KalturaSearchResult $searchResult = null) {
        $kparams = array();
        if ($mediaEntry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        }
        if ($searchResult !== null) {
            $this->client->addParam($kparams, "searchResult", $searchResult->toParams());
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

    public function addFromUploadedFile(KalturaMediaEntry $mediaEntry, $uploadTokenId) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
        $this->client->queueServiceActionCall("media", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function addFromRecordedWebcam(KalturaMediaEntry $mediaEntry, $webcamTokenId) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        $this->client->addParam($kparams, "webcamTokenId", $webcamTokenId);
        $this->client->queueServiceActionCall("media", "addFromRecordedWebcam", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function addFromEntry($sourceEntryId, KalturaMediaEntry $mediaEntry = null, $sourceFlavorParamsId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
        if ($mediaEntry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
        $this->client->queueServiceActionCall("media", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function addFromFlavorAsset($sourceFlavorAssetId, KalturaMediaEntry $mediaEntry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
        if ($mediaEntry !== null) {
            $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
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

    public function convert($entryId, $conversionProfileId = null, array $dynamicConversionAttributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        if ($dynamicConversionAttributes !== null) {
            foreach($dynamicConversionAttributes as $index => $obj) {
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

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function update($entryId, KalturaMediaEntry $mediaEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "mediaEntry", $mediaEntry->toParams());
        $this->client->queueServiceActionCall("media", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function updateContent($entryId, KalturaResource $resource, $conversionProfileId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
        $this->client->queueServiceActionCall("media", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("media", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function approveReplace($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("media", "approveReplace", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function cancelReplace($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function upload($fileData) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("media", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function updateThumbnail($entryId, $timeOffset, $flavorParamsId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "timeOffset", $timeOffset);
        $this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
        $this->client->queueServiceActionCall("media", "updateThumbnail", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset, $flavorParamsId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "sourceEntryId", $sourceEntryId);
        $this->client->addParam($kparams, "timeOffset", $timeOffset);
        $this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
        $this->client->queueServiceActionCall("media", "updateThumbnailFromSourceEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function updateThumbnailJpeg($entryId, $fileData) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("media", "updateThumbnailJpeg", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMediaEntry");
        return $resultobject;
    }

    public function updateThumbnailFromUrl($entryId, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function requestConversion($entryId, $fileFormat) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "fileFormat", $fileFormat);
        $this->client->queueServiceActionCall("media", "requestConversion", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    public function flag(KalturaModerationFlag $moderationFlag) {
        $kparams = array();
        $this->client->addParam($kparams, "moderationFlag", $moderationFlag->toParams());
        $this->client->queueServiceActionCall("media", "flag", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function reject($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("media", "reject", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function approve($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("media", "approve", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function listFlags($entryId, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function anonymousRank($entryId, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMixingService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaMixEntry $mixEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "mixEntry", $mixEntry->toParams());
        $this->client->queueServiceActionCall("mixing", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    public function get($entryId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function update($entryId, KalturaMixEntry $mixEntry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "mixEntry", $mixEntry->toParams());
        $this->client->queueServiceActionCall("mixing", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    public function delete($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function cloneAction($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->queueServiceActionCall("mixing", "clone", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    public function appendMediaEntry($mixEntryId, $mediaEntryId) {
        $kparams = array();
        $this->client->addParam($kparams, "mixEntryId", $mixEntryId);
        $this->client->addParam($kparams, "mediaEntryId", $mediaEntryId);
        $this->client->queueServiceActionCall("mixing", "appendMediaEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMixEntry");
        return $resultobject;
    }

    public function requestFlattening($entryId, $fileFormat, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "fileFormat", $fileFormat);
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

    public function getMixesByMediaId($mediaEntryId) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaEntryId", $mediaEntryId);
        $this->client->queueServiceActionCall("mixing", "getMixesByMediaId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function getReadyMediaEntries($mixId, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "mixId", $mixId);
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

    public function anonymousRank($entryId, $rank) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaNotificationService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function getClientNotification($entryId, $type) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPartnerService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function register(KalturaPartner $partner, $cmsPassword = "") {
        $kparams = array();
        $this->client->addParam($kparams, "partner", $partner->toParams());
        $this->client->addParam($kparams, "cmsPassword", $cmsPassword);
        $this->client->queueServiceActionCall("partner", "register", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    public function update(KalturaPartner $partner, $allowEmpty = false) {
        $kparams = array();
        $this->client->addParam($kparams, "partner", $partner->toParams());
        $this->client->addParam($kparams, "allowEmpty", $allowEmpty);
        $this->client->queueServiceActionCall("partner", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPartner");
        return $resultobject;
    }

    public function getSecrets($partnerId, $adminEmail, $cmsPassword) {
        $kparams = array();
        $this->client->addParam($kparams, "partnerId", $partnerId);
        $this->client->addParam($kparams, "adminEmail", $adminEmail);
        $this->client->addParam($kparams, "cmsPassword", $cmsPassword);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPermissionItemService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaPermissionItem $permissionItem) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItem", $permissionItem->toParams());
        $this->client->queueServiceActionCall("permissionitem", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    public function get($permissionItemId) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionItemId);
        $this->client->queueServiceActionCall("permissionitem", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    public function update($permissionItemId, KalturaPermissionItem $permissionItem) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionItemId);
        $this->client->addParam($kparams, "permissionItem", $permissionItem->toParams());
        $this->client->queueServiceActionCall("permissionitem", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermissionItem");
        return $resultobject;
    }

    public function delete($permissionItemId) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionItemId", $permissionItemId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function get($permissionName) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionName);
        $this->client->queueServiceActionCall("permission", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPermission");
        return $resultobject;
    }

    public function update($permissionName, KalturaPermission $permission) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionName);
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

    public function delete($permissionName) {
        $kparams = array();
        $this->client->addParam($kparams, "permissionName", $permissionName);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlaylistService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaPlaylist $playlist, $updateStats = false) {
        $kparams = array();
        $this->client->addParam($kparams, "playlist", $playlist->toParams());
        $this->client->addParam($kparams, "updateStats", $updateStats);
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

    public function update($id, KalturaPlaylist $playlist, $updateStats = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "playlist", $playlist->toParams());
        $this->client->addParam($kparams, "updateStats", $updateStats);
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

    public function cloneAction($id, KalturaPlaylist $newPlaylist = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        if ($newPlaylist !== null) {
            $this->client->addParam($kparams, "newPlaylist", $newPlaylist->toParams());
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

    public function executeFromContent($playlistType, $playlistContent, $detailed = "") {
        $kparams = array();
        $this->client->addParam($kparams, "playlistType", $playlistType);
        $this->client->addParam($kparams, "playlistContent", $playlistContent);
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

    public function executeFromFilters(array $filters, $totalResults, $detailed = "") {
        $kparams = array();
        foreach($filters as $index => $obj) {
            $this->client->addParam($kparams, "filters:$index", $obj->toParams());
        }
        $this->client->addParam($kparams, "totalResults", $totalResults);
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

    public function getStatsFromContent($playlistType, $playlistContent) {
        $kparams = array();
        $this->client->addParam($kparams, "playlistType", $playlistType);
        $this->client->addParam($kparams, "playlistContent", $playlistContent);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaReportService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function getGraphs($reportType, KalturaReportInputFilter $reportInputFilter, $dimension = null, $objectIds = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reportType);
        $this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
        $this->client->addParam($kparams, "dimension", $dimension);
        $this->client->addParam($kparams, "objectIds", $objectIds);
        $this->client->queueServiceActionCall("report", "getGraphs", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    public function getTotal($reportType, KalturaReportInputFilter $reportInputFilter, $objectIds = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reportType);
        $this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
        $this->client->addParam($kparams, "objectIds", $objectIds);
        $this->client->queueServiceActionCall("report", "getTotal", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportTotal");
        return $resultobject;
    }

    public function getTable($reportType, KalturaReportInputFilter $reportInputFilter, KalturaFilterPager $pager,
                      $order = null, $objectIds = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportType", $reportType);
        $this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
        $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->addParam($kparams, "order", $order);
        $this->client->addParam($kparams, "objectIds", $objectIds);
        $this->client->queueServiceActionCall("report", "getTable", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaReportTable");
        return $resultobject;
    }

    public function getUrlForReportAsCsv($reportTitle, $reportText, $headers, $reportType,
                                         KalturaReportInputFilter $reportInputFilter, $dimension = null,
                                         KalturaFilterPager $pager = null, $order = null, $objectIds = null) {
        $kparams = array();
        $this->client->addParam($kparams, "reportTitle", $reportTitle);
        $this->client->addParam($kparams, "reportText", $reportText);
        $this->client->addParam($kparams, "headers", $headers);
        $this->client->addParam($kparams, "reportType", $reportType);
        $this->client->addParam($kparams, "reportInputFilter", $reportInputFilter->toParams());
        $this->client->addParam($kparams, "dimension", $dimension);
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->addParam($kparams, "order", $order);
        $this->client->addParam($kparams, "objectIds", $objectIds);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function getMediaInfo(KalturaSearchResult $searchResult) {
        $kparams = array();
        $this->client->addParam($kparams, "searchResult", $searchResult->toParams());
        $this->client->queueServiceActionCall("search", "getMediaInfo", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSearchResult");
        return $resultobject;
    }

    public function searchUrl($mediaType, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "mediaType", $mediaType);
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

    public function externalLogin($searchSource, $userName, $password) {
        $kparams = array();
        $this->client->addParam($kparams, "searchSource", $searchSource);
        $this->client->addParam($kparams, "userName", $userName);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSessionService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function start($secret, $userId = "", $type = 0, $partnerId = null, $expiry = 86400, $privileges = null) {
        $kparams = array();
        $this->client->addParam($kparams, "secret", $secret);
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "partnerId", $partnerId);
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

    public function impersonate($secret, $impersonatedPartnerId, $userId = "", $type = 0, $partnerId = null,
                         $expiry = 86400, $privileges = null) {
        $kparams = array();
        $this->client->addParam($kparams, "secret", $secret);
        $this->client->addParam($kparams, "impersonatedPartnerId", $impersonatedPartnerId);
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->addParam($kparams, "type", $type);
        $this->client->addParam($kparams, "partnerId", $partnerId);
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

    public function startWidgetSession($widgetId, $expiry = 86400) {
        $kparams = array();
        $this->client->addParam($kparams, "widgetId", $widgetId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function kmcCollect(KalturaStatsKmcEvent $kmcEvent) {
        $kparams = array();
        $this->client->addParam($kparams, "kmcEvent", $kmcEvent->toParams());
        $this->client->queueServiceActionCall("stats", "kmcCollect", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function reportKceError(KalturaCEError $kalturaCEError) {
        $kparams = array();
        $this->client->addParam($kparams, "kalturaCEError", $kalturaCEError->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStorageProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaStorageProfile $storageProfile) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfile", $storageProfile->toParams());
        $this->client->queueServiceActionCall("storageprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfile");
        return $resultobject;
    }

    public function updateStatus($storageId, $status) {
        $kparams = array();
        $this->client->addParam($kparams, "storageId", $storageId);
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

    public function get($storageProfileId) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfileId", $storageProfileId);
        $this->client->queueServiceActionCall("storageprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaStorageProfile");
        return $resultobject;
    }

    public function update($storageProfileId, KalturaStorageProfile $storageProfile) {
        $kparams = array();
        $this->client->addParam($kparams, "storageProfileId", $storageProfileId);
        $this->client->addParam($kparams, "storageProfile", $storageProfile->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSyndicationFeedService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaBaseSyndicationFeed $syndicationFeed) {
        $kparams = array();
        $this->client->addParam($kparams, "syndicationFeed", $syndicationFeed->toParams());
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

    public function update($id, KalturaBaseSyndicationFeed $syndicationFeed) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "syndicationFeed", $syndicationFeed->toParams());
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

    public function getEntryCount($feedId) {
        $kparams = array();
        $this->client->addParam($kparams, "feedId", $feedId);
        $this->client->queueServiceActionCall("syndicationfeed", "getEntryCount", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaSyndicationFeedEntryCount");
        return $resultobject;
    }

    public function requestConversion($feedId) {
        $kparams = array();
        $this->client->addParam($kparams, "feedId", $feedId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbAssetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add($entryId, KalturaThumbAsset $thumbAsset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "thumbAsset", $thumbAsset->toParams());
        $this->client->queueServiceActionCall("thumbasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function setContent($id, KalturaContentResource $contentResource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentResource->toParams());
        $this->client->queueServiceActionCall("thumbasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function update($id, KalturaThumbAsset $thumbAsset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "thumbAsset", $thumbAsset->toParams());
        $this->client->queueServiceActionCall("thumbasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function serveByEntryId($entryId, $thumbParamId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "thumbParamId", $thumbParamId);
        $this->client->queueServiceActionCall('thumbasset', 'serveByEntryId', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serve($thumbAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
        $this->client->queueServiceActionCall('thumbasset', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function setAsDefault($thumbAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
        $this->client->queueServiceActionCall("thumbasset", "setAsDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function generateByEntryId($entryId, $destThumbParamsId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "destThumbParamsId", $destThumbParamsId);
        $this->client->queueServiceActionCall("thumbasset", "generateByEntryId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function generate($entryId, KalturaThumbParams $thumbParams, $sourceAssetId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
        $this->client->addParam($kparams, "sourceAssetId", $sourceAssetId);
        $this->client->queueServiceActionCall("thumbasset", "generate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function regenerate($thumbAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
        $this->client->queueServiceActionCall("thumbasset", "regenerate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function get($thumbAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
        $this->client->queueServiceActionCall("thumbasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function getByEntryId($entryId) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function addFromUrl($entryId, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
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

    public function addFromImage($entryId, $fileData) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("thumbasset", "addFromImage", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaThumbAsset");
        return $resultobject;
    }

    public function delete($thumbAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbAssetId", $thumbAssetId);
        $this->client->queueServiceActionCall("thumbasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function getUrl($id, $storageId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaThumbParamsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaThumbParams $thumbParams) {
        $kparams = array();
        $this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
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

    public function update($id, KalturaThumbParams $thumbParams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "thumbParams", $thumbParams->toParams());
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

    public function getByConversionProfileId($conversionProfileId) {
        $kparams = array();
        $this->client->addParam($kparams, "conversionProfileId", $conversionProfileId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUiConfService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaUiConf $uiConf) {
        $kparams = array();
        $this->client->addParam($kparams, "uiConf", $uiConf->toParams());
        $this->client->queueServiceActionCall("uiconf", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUiConf");
        return $resultobject;
    }

    public function update($id, KalturaUiConf $uiConf) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "uiConf", $uiConf->toParams());
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function upload($fileData) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->queueServiceActionCall("upload", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    public function getUploadedFileTokenByFileName($fileName) {
        $kparams = array();
        $this->client->addParam($kparams, "fileName", $fileName);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUploadTokenService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaUploadToken $uploadToken = null) {
        $kparams = array();
        if ($uploadToken !== null) {
            $this->client->addParam($kparams, "uploadToken", $uploadToken->toParams());
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

    public function get($uploadTokenId) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
        $this->client->queueServiceActionCall("uploadtoken", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadToken");
        return $resultobject;
    }

    public function upload($uploadTokenId, $fileData, $resume = false, $finalChunk = true, $resumeAt = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $fileData);
        $this->client->addParam($kparams, "resume", $resume);
        $this->client->addParam($kparams, "finalChunk", $finalChunk);
        $this->client->addParam($kparams, "resumeAt", $resumeAt);
        $this->client->queueServiceActionCall("uploadtoken", "upload", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUploadToken");
        return $resultobject;
    }

    public function delete($uploadTokenId) {
        $kparams = array();
        $this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUserRoleService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function add(KalturaUserRole $userRole) {
        $kparams = array();
        $this->client->addParam($kparams, "userRole", $userRole->toParams());
        $this->client->queueServiceActionCall("userrole", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    public function get($userRoleId) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userRoleId);
        $this->client->queueServiceActionCall("userrole", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    public function update($userRoleId, KalturaUserRole $userRole) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userRoleId);
        $this->client->addParam($kparams, "userRole", $userRole->toParams());
        $this->client->queueServiceActionCall("userrole", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUserRole");
        return $resultobject;
    }

    public function delete($userRoleId) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userRoleId);
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

    public function cloneAction($userRoleId) {
        $kparams = array();
        $this->client->addParam($kparams, "userRoleId", $userRoleId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

    public function update($userId, KalturaUser $user) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
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

    public function get($userId) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->queueServiceActionCall("user", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    public function getByLoginId($loginId) {
        $kparams = array();
        $this->client->addParam($kparams, "loginId", $loginId);
        $this->client->queueServiceActionCall("user", "getByLoginId", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaUser");
        return $resultobject;
    }

    public function delete($userId) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
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

    public function notifyBan($userId) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->queueServiceActionCall("user", "notifyBan", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function login($partnerId, $userId, $password, $expiry = 86400, $privileges = "*") {
        $kparams = array();
        $this->client->addParam($kparams, "partnerId", $partnerId);
        $this->client->addParam($kparams, "userId", $userId);
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

    public function loginByLoginId($loginId, $password, $partnerId = null, $expiry = 86400, $privileges = "*") {
        $kparams = array();
        $this->client->addParam($kparams, "loginId", $loginId);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "partnerId", $partnerId);
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

    public function updateLoginData($oldLoginId, $password, $newLoginId = "", $newPassword = "",
                             $newFirstName = null, $newLastName = null) {
        $kparams = array();
        $this->client->addParam($kparams, "oldLoginId", $oldLoginId);
        $this->client->addParam($kparams, "password", $password);
        $this->client->addParam($kparams, "newLoginId", $newLoginId);
        $this->client->addParam($kparams, "newPassword", $newPassword);
        $this->client->addParam($kparams, "newFirstName", $newFirstName);
        $this->client->addParam($kparams, "newLastName", $newLastName);
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

    public function setInitialPassword($hashKey, $newPassword) {
        $kparams = array();
        $this->client->addParam($kparams, "hashKey", $hashKey);
        $this->client->addParam($kparams, "newPassword", $newPassword);
        $this->client->queueServiceActionCall("user", "setInitialPassword", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function enableLogin($userId, $loginId, $password = null) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->addParam($kparams, "loginId", $loginId);
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

    public function disableLogin($userId = null, $loginId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "userId", $userId);
        $this->client->addParam($kparams, "loginId", $loginId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaXInternalService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function xAddBulkDownload($entryIds, $flavorParamsId = "") {
        $kparams = array();
        $this->client->addParam($kparams, "entryIds", $entryIds);
        $this->client->addParam($kparams, "flavorParamsId", $flavorParamsId);
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
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
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

