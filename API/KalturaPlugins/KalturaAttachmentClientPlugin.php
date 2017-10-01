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

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

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

class KalturaAttachmentAssetStatus
{
    const ERROR = -1;
    const QUEUED = 0;
    const READY = 2;
    const DELETED = 3;
    const IMPORTING = 7;
}

class KalturaAttachmentType
{
    const TEXT = "1";
    const MEDIA = "2";
    const DOCUMENT = "3";
}

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
     * @readonly
     */
    public $status = null;


}

class KalturaAttachmentAssetListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaAttachmentAsset
     * @readonly
     */
    public $objects;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $totalCount = null;


}

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

class KalturaAttachmentAssetFilter extends KalturaAttachmentAssetBaseFilter
{

}


class KalturaAttachmentAssetService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null)
    {
        parent::__construct($client);
    }

    function add($entryId, KalturaAttachmentAsset $attachmentAsset)
    {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "attachmentAsset", $attachmentAsset->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "add", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    function setContent($id, KalturaContentResource $contentResource)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentResource->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "setContent", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    function update($id, KalturaAttachmentAsset $attachmentAsset)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "attachmentAsset", $attachmentAsset->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "update", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    function getUrl($id, $storageId = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageId);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    function getRemotePaths($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "getRemotePaths", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaRemotePathListResponse");
        return $resultobject;
    }

    function serve($attachmentAssetId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentAssetId);
        $this->client->queueServiceActionCall('attachment_attachmentasset', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    function get($attachmentAssetId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentAssetId);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "get", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAsset");
        return $resultobject;
    }

    function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null)
    {
        $kparams = array();
        if ($filter !== null)
            $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null)
            $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->queueServiceActionCall("attachment_attachmentasset", "list", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaAttachmentAssetListResponse");
        return $resultobject;
    }

    function delete($attachmentAssetId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "attachmentAssetId", $attachmentAssetId);
        $this->client->queueServiceActionCall("attachment_attachmentasset", "delete", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }
}
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

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
        $this->attachmentAsset = new KalturaAttachmentAssetService($client);
    }

    /**
     * @return KalturaAttachmentClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaAttachmentClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices()
    {
        $services = array(
            'attachmentAsset' => $this->attachmentAsset,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'attachment';
    }
}

