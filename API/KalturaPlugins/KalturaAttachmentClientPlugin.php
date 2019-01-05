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
class KalturaAttachmentAssetStatus extends KalturaEnumBase {
    /** @var ERROR */
    const ERROR = -1;
    /** @var QUEUED */
    const QUEUED = 0;
    /** @var READY */
    const READY = 2;
    /** @var DELETED */
    const DELETED = 3;
    /** @var IMPORTING */
    const IMPORTING = 7;
    /** @var EXPORTING */
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
class KalturaAttachmentAssetOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by deleted timestamp */
    const DELETED_AT_ASC = "+deletedAt";
    /** @var order by file size */
    const SIZE_ASC = "+size";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by created timestamp */
    const DELETED_AT_DESC = "-deletedAt";
    /** @var order by file size */
    const SIZE_DESC = "-size";
    /** @var order by updated timestamp */
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
class KalturaAttachmentType extends KalturaEnumBase {
    /** @var text */
    const TEXT = "1";
    /** @var media */
    const MEDIA = "2";
    /** @var document */
    const DOCUMENT = "3";
    /** @var json */
    const JSON = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAsset extends KalturaAsset {
    /**
     * The filename of the attachment asset content
     * @var string
     */
    public $filename = null;

    /**
     * Attachment asset title
     * @var string
     */
    public $title = null;

    /**
     * The attachment format
     * @var KalturaAttachmentType
     */
    public $format = null;

    /**
     * The status of the asset
     * @var KalturaAttachmentAssetStatus
     * @readonly
     */
    public $status = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaAttachmentAsset
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
class KalturaAttachmentServeOptions extends KalturaAssetServeOptions {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAttachmentAssetBaseFilter extends KalturaAssetFilter {
    /**
     * @var KalturaAttachmentType
     */
    public $formatEqual = null;

    /**
     * @var string
     */
    public $formatIn = null;

    /**
     * @var KalturaAttachmentAssetStatus
     */
    public $statusEqual = null;

    /**
     * @var string
     */
    public $statusIn = null;

    /**
     * @var string
     */
    public $statusNotIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetFilter extends KalturaAttachmentAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Attachment Asset Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add attachment asset
     * @param string $entryid - id of kaltura media entry.
     * @param KalturaAttachmentAsset $attachmentasset - instance of KalturaAttachmentAsset.
     * @return KalturaAttachmentAsset - instance of KalturaAttachmentAsset.
     */
    public function add($entryid, KalturaAttachmentAsset $attachmentasset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "attachmentAsset", $attachmentasset->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    /**
     * Delete attachment asset.
     * @param string $attachmentassetid - id of kaltura attachment asset.
     */
    public function delete($attachmentassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentassetid);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get object.
     * @param string $attachmentassetid - id of kaltura attachment asset.
     * @return KalturaAttachmentAsset - instance of KalturaAttachmentAsset.
     */
    public function get($attachmentassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentassetid);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    /**
     * Get remote storage existing paths for the asset.
     * @param string $id - id of kaltura attachment asset.
     * @return KalturaRemotePathListResponse - instance of KalturaRemotePathListResponse.
     */
    public function getRemotePaths($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    /**
     * Get download URL for the asset
     * @param string $id - id of kaltura attachment asset.
     * @param int $storageid  - id of external storage.
     * @return string - url of external storage.
     */
    public function getUrl($id, $storageid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * List attachment Assets by filter and pager
     * @param KalturaAssetFilter $filter - instance of KalturaAssetFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaAttachmentAssetListResponse - instance of KalturaAttachmentAssetListResponse.
     */
    public function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("attachment_attachmentasset", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAssetListResponse");
        return $resultobject;
    }

    /**
     * Serves attachment by its id
     * @param string $attachmentassetid - id of kaltura attachment asset.
     * @param KalturaAttachmentServeOptions $serveoptions - instance of KalturaAttachmentServeOptions.
     * @return file - file data.
     */
    public function serve($attachmentassetid, KalturaAttachmentServeOptions $serveoptions = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentassetid);
        if ($serveoptions !== null) {
            $this->client->addParam($kparams, "serveOptions", $serveoptions->toParams());
        }
        $this->client->queueServiceActionCall("attachment_attachmentasset", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update content of attachment asset.
     * @param string $id - id of kaltura attachment asset.
     * @param KalturaContentResource $contentresource - instance of KalturaContentResource.
     * @return KalturaAttachmentAsset - instance of KalturaAttachmentAsset.
     */
    public function setContent($id, KalturaContentResource $contentresource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentresource->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    /**
     * Update attachment asset.
     * @param string $id - id of kaltura attachment asset.
     * @param KalturaAttachmentAsset $attachmentasset - instance of KalturaAttachmentAsset.
     * @return KalturaAttachmentAsset - instance of KalturaAttachmentAsset.
     */
    public function update($id, KalturaAttachmentAsset $attachmentasset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "attachmentAsset", $attachmentasset->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
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
class KalturaAttachmentClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaAttachmentAssetService
     */
    public $attachmentAsset = null;

    /**
     * Constructor of Kaltura Attachment Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->attachmentAsset = new KalturaAttachmentAssetService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaAttachmentClientPlugin - instance of KalturaAttachmentClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaAttachmentClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('attachmentAsset' => $this->attachmentAsset);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'attachment';
    }
}

