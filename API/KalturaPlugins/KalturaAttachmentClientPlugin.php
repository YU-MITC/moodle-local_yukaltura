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

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

/**
 * Kaltura Attachment Asset OrderBy class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetOrderBy
{
    const SIZE_ASC = "+size";
    const SIZE_DESC = "-size";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const DELETED_AT_ASC = "+deletedAt";
    const DELETED_AT_DESC = "-deletedAt";
}

/**
 * Kaltura Attachment Asset Status class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetStatus
{
    const ERROR = -1;
    const QUEUED = 0;
    const READY = 2;
    const DELETED = 3;
    const IMPORTING = 7;
}

/**
 * Kaltura Attachment Type class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentType
{
    const TEXT = "1";
    const MEDIA = "2";
    const DOCUMENT = "3";
}

/**
 * Kaltura Attachment Asset class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAsset extends KalturaAsset
{
    /**
     * The filename of the attachment asset content
     *
     * @var string
     */
    public $filename = null;

    /**
     * Attachment asset title
     *
     * @var string
     */
    public $title = null;

    /**
     * The attachment format
     *
     * @var KalturaAttachmentType
     */
    public $format = null;

    /**
     * The status of the asset
     *
     *
     * @var KalturaAttachmentAssetStatus
     */
    public $status = null;

}

/**
 * Kaltura Attachment Asset List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaAttachmentAsset
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
 * Kaltura Attachment Asset Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAttachmentAssetBaseFilter extends KalturaAssetFilter
{
    /**
     *
     *
     * @var KalturaAttachmentType
     */
    public $formatEqual = null;

    /**
     *
     *
     * @var string
     */
    public $formatIn = null;

    /**
     *
     *
     * @var KalturaAttachmentAssetStatus
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
 * Kaltura Attachment Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetFilter extends KalturaAttachmentAssetBaseFilter
{

}

/**
 * Kaltura Attachment Asset Service class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentAssetService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function serve($attachmentassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentassetid);
        $this->client->queueServiceActionCall('attachment_attachmentasset', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

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
        return $resultobject;
    }
}

/**
 * Kaltura Attachment Client Plugin class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAttachmentClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaAttachmentClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaAttachmentAssetService
     */
    public $attachmentAsset = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->attachmentAsset = new KalturaAttachmentAssetService($client);
    }

    /**
     * @return KalturaAttachmentClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaAttachmentClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('attachmentAsset' => $this->attachmentAsset);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'attachment';
    }
}
