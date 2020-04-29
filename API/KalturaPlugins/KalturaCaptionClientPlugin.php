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

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetStatus extends KalturaEnumBase {
    /** @var error */
    const ERROR = -1;
    /** @var queued */
    const QUEUED = 0;
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetOrderBy extends KalturaEnumBase {
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionType extends KalturaEnumBase {
    /** @var srt */
    const SRT = "1";
    /** @var dfxp */
    const DFXP = "2";
    /** @var webvtt */
    const WEBVTT = "3";
    /** @var cap */
    const CAP = "4";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAsset extends KalturaAsset {
    /**
     * The Caption Params used to create this Caption Asset
     * @var int
     */
    public $captionParamsId = null;

    /**
     * The language of the caption asset content
     * @var KalturaLanguage
     */
    public $language = null;

    /**
     * The language of the caption asset content
     * @var KalturaLanguageCode
     */
    public $languageCode = null;

    /**
     * Is default caption asset of the entry
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Friendly label
     *
     * @var string
     */
    public $label = null;

    /**
     * The caption format
     *
     * @var KalturaCaptionType
     */
    public $format = null;

    /**
     * The status of the asset
     * @var KalturaCaptionAssetStatus
     */
    public $status = null;

    /**
     * The parent id of the asset
     * @var string
     */
    public $parentId = null;

    /**
     * The Accuracy of the caption content
     * @var int
     */
    public $accuracy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParams extends KalturaAssetParams {
    /**
     * The language of the caption content
     * @var KalturaLanguage
     */
    public $language = null;

    /**
     * Is default caption asset of the entry
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Friendly label
     * @var string
     */
    public $label = null;

    /**
     * The caption format
     * @var KalturaCaptionType
     */
    public $format = null;

    /**
     * Id of the caption params or the flavor params to be used as source for the caption creation
     * @var int
     */
    public $sourceParamsId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaCaptionAsset
     */
    public $objects;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaCaptionParams
     */
    public $objects;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCopyCaptionsJobData extends KalturaJobData {
    /**
     * source entry Id
     * @var string
     */
    public $sourceEntryId = null;

    /**
     * entry Id
     * @var string
     */
    public $entryId = null;

    /**
     * clip offset
     *
     * @var int
     */
    public $offset = null;

    /**
     * clip duration
     * @var int
     */
    public $duration = null;

    /**
     * @var bool
     */
    public $fullCopy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaParseMultiLanguageCaptionAssetJobData extends KalturaJobData {
    /**
     * @var string
     */
    public $multiLanaguageCaptionAssetId = null;

    /**
     * @var string
     */
    public $entryId = null;

    /**
     * @var string
     */
    public $fileLocation = null;

    /**
     * @var string
     */
    public $fileEncryptionKey = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCaptionAssetBaseFilter extends KalturaAssetFilter {
    /**
     * @var int
     */
    public $captionParamsIdEqual = null;

    /**
     * @var string
     */
    public $captionParamsIdIn = null;

    /**
     * @var KalturaCaptionType
     */
    public $formatEqual = null;

    /**
     * @var string
     */
    public $formatIn = null;

    /**
     * @var KalturaCaptionAssetStatus
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCaptionParamsBaseFilter extends KalturaAssetParamsFilter {
    /**
     * @var KalturaCaptionType
     */
    public $formatEqual = null;

    /**
     * @var string
     */
    public $formatIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetFilter extends KalturaCaptionAssetBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsFilter extends KalturaCaptionParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Caption Asset Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add caption asset
     * @param string $entryid - id of media entry,
     * @param KalturaCaptionAsset $captionasset - instance of KalturaCaptionAsset.
     * @return KalturaCaptionAsset - added object.
     */
    public function add($entryid, KalturaCaptionAsset $captionasset) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "captionAsset", $captionasset->toParams());
        $this->client->queueServiceActionCall("caption_captionasset", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    /**
     * Delete caption asset
     * @param string $captionassetid - id of caption asset.
     */
    public function delete($captionassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        $this->client->queueServiceActionCall("caption_captionasset", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get caption asset by id.
     * @param string $captionassetid - id of caption asset.
     * @return KalturaCaptionAsset - instance of KalturaCaptionAsset
     */
    public function get($captionassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        $this->client->queueServiceActionCall("caption_captionasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    /**
     * Get remote storage existing paths for the asset
     * @param string $id - id of remote storage.
     * @return KalturaRemotePathListResponse - instance of KalturaRemotePathListResponse
     */
    public function getRemotePaths($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("caption_captionasset", "getRemotePaths", $kparams);
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
     * @param string $id - id of caption asset.
     * @param int $storageid - id of remote storage.
     * @return string - download URL.
     */
    public function getUrl($id, $storageid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageid);
        $this->client->queueServiceActionCall("caption_captionasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * List caption Assets by filter and pager
     * @param KalturaAssetFilter $filter - instance of KalturaAssetFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaCaptionAssetListResponse
     */
    public function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("caption_captionasset", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAssetListResponse");
        return $resultobject;
    }

    /**
     * Serves caption by its id
     * @param string $captionassetid - id of caption asset.
     * @return file - file data.
     */
    public function serve($captionassetid) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        $this->client->queueServiceActionCall("caption_captionasset", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves caption by entry id and thumnail params id
     * @param string $entryid - id of media enytry.
     * @param int $captionparamid - If not set, default caption will be used.
     * @return file - file data.
     */
    public function serveByEntryId($entryid, $captionparamid = null) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "captionParamId", $captionparamid);
        $this->client->queueServiceActionCall("caption_captionasset", "serveByEntryId", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves caption by its id converting it to segmented WebVTT
     * @param string $captionassetid - id of caption aset.
     * @param int $segmentduration - segment duration.
     * @param int $segmentindex - segment index.
     * @param int $localtimestamp - loca timestamp.
     * @return file - file data.
     */
    public function serveWebVTT($captionassetid, $segmentduration = 30, $segmentindex = null, $localtimestamp = 10000) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        $this->client->addParam($kparams, "segmentDuration", $segmentduration);
        $this->client->addParam($kparams, "segmentIndex", $segmentindex);
        $this->client->addParam($kparams, "localTimestamp", $localtimestamp);
        $this->client->queueServiceActionCall("caption_captionasset", "serveWebVTT", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Markss the caption as default and removes that mark from all other caption assets of the entry.
     * @param string $captionassetid - id of caption asset.
     */
    public function setAsDefault($captionassetid) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        $this->client->queueServiceActionCall("caption_captionasset", "setAsDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Update content of caption asset
     * @param string $id - id of caption asset.
     * @param KalturaContentResource $contentresource - instance of KalturaContentResource.
     * @return KalturaCaptionAsset - instance of KalturaCaptionAsset.
     */
    public function setContent($id, KalturaContentResource $contentresource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentresource->toParams());
        $this->client->queueServiceActionCall("caption_captionasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    /**
     * Update caption asset
     * @param string $id - id of caption asset.
     * @param KalturaCaptionAsset $captionasset - instance of KalturaCaptionAsset.
     * @return KalturaCaptionAsset - instance of KalturaCaptionAsset.
     */
    public function update($id, KalturaCaptionAsset $captionasset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "captionAsset", $captionasset->toParams());
        $this->client->queueServiceActionCall("caption_captionasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Caption Params Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add new Caption Params
     * @param KalturaCaptionParams $captionparams - instance of KalturaCaptionParams.
     * @return KalturaCaptionParams - instance of KalturaCaptionParams.
     */
    public function add(KalturaCaptionParams $captionparams) {
        $kparams = array();
        $this->client->addParam($kparams, "captionParams", $captionparams->toParams());
        $this->client->queueServiceActionCall("caption_captionparams", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParams");
        return $resultobject;
    }

    /**
     * Delete Caption Params by ID
     * @param int $id - id of kaltura caption params.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("caption_captionparams", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get Caption Params by ID.
     * @param int $id - id of kaltura caption params.
     * @return KalturaCaptionParams - instance of KalturaCaptionParams.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("caption_captionparams", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParams");
        return $resultobject;
    }

    /**
     * List Caption Params by filter with paging support (By default - all system default params will be listed too)
     * @param KalturaCaptionParamsFilter $filter - instance of KalturaCaptionParamsFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaCaptionParamsListResponse - instance of KalturaCaptionParamsListResponse.
     */
    public function listAction(KalturaCaptionParamsFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("caption_captionparams", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParamsListResponse");
        return $resultobject;
    }

    /**
     * Update Caption Params by ID
     * @param int $id - id of kaltura caption params.
     * @param KalturaCaptionParams $captionparams - instance of KalturaCaptionParams.
     * @return KalturaCaptionParams - instance of KalturaCaptionParams.
     */
    public function update($id, KalturaCaptionParams $captionparams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "captionParams", $captionparams->toParams());
        $this->client->queueServiceActionCall("caption_captionparams", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParams");
        return $resultobject;
    }
}
/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaCaptionAssetService
     */
    public $captionAsset = null;

    /**
     * @var KalturaCaptionParamsService
     */
    public $captionParams = null;

    /**
     * Constructor of Kaltura Caption Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->captionAsset = new KalturaCaptionAssetService($client);
        $this->captionParams = new KalturaCaptionParamsService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaCaptionClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaCaptionClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('captionAsset' => $this->captionAsset, 'captionParams' => $this->captionParams);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'caption';
    }
}
