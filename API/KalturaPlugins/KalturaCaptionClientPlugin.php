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
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetOrderBy
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetStatus
{
    const ERROR = -1;
    const QUEUED = 0;
    const READY = 2;
    const DELETED = 3;
    const IMPORTING = 7;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsOrderBy
{
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionType
{
    const SRT = "1";
    const DFXP = "2";
}

/**
 * Kaltura Caption Asset class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAsset extends KalturaAsset
{
    /**
     * The Caption Params used to create this Caption Asset
     * 
     *
     * @var int
     * @insertonly
     */
    public $captionParamsId = null;

    /**
     * The language of the caption asset content
     * 
     *
     * @var KalturaLanguage
     */
    public $language = null;

    /**
     * The language of the caption asset content
     * 
     *
     * @var KalturaLanguageCode
     * @readonly
     */
    public $languageCode = null;

    /**
     * Is default caption asset of the entry
     * 
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Friendly label
     * 
     *
     * @var string
     */
    public $label = null;

    /**
     * The caption format
     * 
     *
     * @var KalturaCaptionType
     * @insertonly
     */
    public $format = null;

    /**
     * The status of the asset
     * 
     *
     * @var KalturaCaptionAssetStatus
     * @readonly
     */
    public $status = null;

}

/**
 * Kaltura Caption Asset List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaCaptionAsset
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

/**
 * Kaltura Caption Params class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParams extends KalturaAssetParams
{
    /**
     * The language of the caption content
     * 
     *
     * @var KalturaLanguage
     * @insertonly
     */
    public $language = null;

    /**
     * Is default caption asset of the entry
     * 
     *
     * @var KalturaNullableBoolean
     */
    public $isDefault = null;

    /**
     * Friendly label
     * 
     *
     * @var string
     */
    public $label = null;

    /**
     * The caption format
     * 
     *
     * @var KalturaCaptionType
     * @insertonly
     */
    public $format = null;

    /**
     * Id of the caption params or the flavor params to be used as source for the caption creation
     *
     * @var int
     */
    public $sourceParamsId = null;

}

/**
 * Kaltura Caption Params Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCaptionParamsBaseFilter extends KalturaAssetParamsFilter
{
    /**
     * 
     *
     * @var KalturaCaptionType
     */
    public $formatEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $formatIn = null;

}

/**
 * Kaltura Caption Params Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsFilter extends KalturaCaptionParamsBaseFilter
{

}

/**
 * Kaltura Caption Params List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaCaptionParams
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

/**
 * Kaltura Caption Asset Base Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCaptionAssetBaseFilter extends KalturaAssetFilter
{
    /**
     * 
     *
     * @var KalturaCaptionType
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
     * @var KalturaCaptionAssetStatus
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
 * Kaltura Caption Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetFilter extends KalturaCaptionAssetBaseFilter
{

}

/**
 * Kaltura Caption Asset Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetService extends KalturaServiceBase
{
    /**
     * Constructor
     * @param KalturaClient $client - client object
     */
    function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add Caption Asset to emdia entry
     * @param string entryid - id of media entry.
     * @param KalturaCaptionAsset #captionasset - caption asset
     * @return obj - result object
     */
    function add($entryid, KalturaCaptionAsset $captionasset) {
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

    function setContent($id, KalturaContentResource $contentResource) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "contentResource", $contentResource->toParams());
        $this->client->queueServiceActionCall("caption_captionasset", "setContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    function update($id, KalturaCaptionAsset $captionAsset) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "captionAsset", $captionAsset->toParams());
        $this->client->queueServiceActionCall("caption_captionasset", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    function serveByEntryId($entryId, $captionParamId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryId);
        $this->client->addParam($kparams, "captionParamId", $captionParamId);
        $this->client->queueServiceActionCall('caption_captionasset', 'serveByEntryId', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    function getUrl($id, $storageId = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "storageId", $storageId);
        $this->client->queueServiceActionCall("caption_captionasset", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    function getRemotePaths($id) {
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

    function serve($captionAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionAssetId);
        $this->client->queueServiceActionCall('caption_captionasset', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    function setAsDefault($captionAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionAssetId);
        $this->client->queueServiceActionCall("caption_captionasset", "setAsDefault", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    function get($captionAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionAssetId);
        $this->client->queueServiceActionCall("caption_captionasset", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAsset");
        return $resultobject;
    }

    function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null) {
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

    function delete($captionAssetId) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionAssetId);
        $this->client->queueServiceActionCall("caption_captionasset", "delete", $kparams);
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
 * Kaltura Caption Params Service class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionParamsService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    function add(KalturaCaptionParams $captionParams) {
        $kparams = array();
        $this->client->addParam($kparams, "captionParams", $captionParams->toParams());
        $this->client->queueServiceActionCall("caption_captionparams", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParams");
        return $resultobject;
    }

    function get($id) {
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

    function update($id, KalturaCaptionParams $captionParams) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "captionParams", $captionParams->toParams());
        $this->client->queueServiceActionCall("caption_captionparams", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionParams");
        return $resultobject;
    }

    function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("caption_captionparams", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    function listAction(KalturaCaptionParamsFilter $filter = null, KalturaFilterPager $pager = null) {
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
}

/**
 * Kaltura Caption Client Plugin class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaCaptionClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaCaptionAssetService
     */
    public $captionAsset = null;

    /**
     * @var KalturaCaptionParamsService
     */
    public $captionParams = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->captionAsset = new KalturaCaptionAssetService($client);
        $this->captionParams = new KalturaCaptionParamsService($client);
    }

    /**
     * @return KalturaCaptionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaCaptionClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'captionAsset' => $this->captionAsset,
            'captionParams' => $this->captionParams
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'caption';
    }
}
