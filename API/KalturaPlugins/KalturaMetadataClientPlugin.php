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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataObjectType
{
    const ENTRY = "1";
    const ANNOTATION = "annotationMetadata.Annotation";
    const AD_CUE_POINT = "adCuePointMetadata.AdCuePoint";
    const CODE_CUE_POINT = "codeCuePointMetadata.CodeCuePoint";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataOrderBy
{
    const METADATA_PROFILE_VERSION_ASC = "+metadataProfileVersion";
    const METADATA_PROFILE_VERSION_DESC = "-metadataProfileVersion";
    const VERSION_ASC = "+version";
    const VERSION_DESC = "-version";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileCreateMode
{
    const API = 1;
    const KMC = 2;
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileStatus
{
    const ACTIVE = 1;
    const DEPRECATED = 2;
    const TRANSFORMING = 3;
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataStatus
{
    const VALID = 1;
    const INVALID = 2;
    const DELETED = 3;
}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMetadataBaseFilter extends KalturaFilter
{
    /**
     * 
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileIdEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileVersionEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileVersionGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileVersionLessThanOrEqual = null;

    /**
     * 
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectTypeEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $objectIdEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $objectIdIn = null;

    /**
     * 
     *
     * @var int
     */
    public $versionEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $versionGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $versionLessThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * 
     *
     * @var KalturaMetadataStatus
     */
    public $statusEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $statusIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataFilter extends KalturaMetadataBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadata extends KalturaObjectBase
{
    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $metadataProfileId = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $metadataProfileVersion = null;

    /**
     * 
     *
     * @var KalturaMetadataObjectType
     * @readonly
     */
    public $metadataObjectType = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $objectId = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $version = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     * 
     *
     * @var KalturaMetadataStatus
     * @readonly
     */
    public $status = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $xml = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaMetadata
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
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaMetadataProfileBaseFilter extends KalturaFilter
{
    /**
     * 
     *
     * @var int
     */
    public $idEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     * 
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectTypeEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $versionEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     * 
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     * 
     *
     * @var KalturaMetadataProfileStatus
     */
    public $statusEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $statusIn = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileFilter extends KalturaMetadataProfileBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfile extends KalturaObjectBase
{
    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     * 
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectType = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $version = null;

    /**
     * 
     *
     * @var string
     */
    public $name = null;

    /**
     * 
     *
     * @var string
     */
    public $systemName = null;

    /**
     * 
     *
     * @var string
     */
    public $description = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     * 
     *
     * @var KalturaMetadataProfileStatus
     * @readonly
     */
    public $status = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $xsd = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $views = null;

    /**
     * 
     *
     * @var KalturaMetadataProfileCreateMode
     */
    public $createMode = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaMetadataProfile
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileField extends KalturaObjectBase
{
    /**
     * 
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $xPath = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $key = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $label = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileFieldListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaMetadataProfileField
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
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataSearchItem extends KalturaSearchOperator
{
    /**
     * 
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     * 
     *
     * @var string
     */
    public $orderBy = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null)
    {
        parent::__construct($client);
    }

    function listAction(KalturaMetadataFilter $filter = null, KalturaFilterPager $pager = null)
    {
        $kparams = array();
        if ($filter !== null)
            $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null)
            $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->queueServiceActionCall("metadata_metadata", "list", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataListResponse");
        return $resultobject;
    }

    function add($metadataProfileId, $objectType, $objectId, $xmlData)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
        $this->client->addParam($kparams, "objectType", $objectType);
        $this->client->addParam($kparams, "objectId", $objectId);
        $this->client->addParam($kparams, "xmlData", $xmlData);
        $this->client->queueServiceActionCall("metadata_metadata", "add", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function addFromFile($metadataProfileId, $objectType, $objectId, $xmlFile)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
        $this->client->addParam($kparams, "objectType", $objectType);
        $this->client->addParam($kparams, "objectId", $objectId);
        $kfiles = array();
        $this->client->addParam($kfiles, "xmlFile", $xmlFile);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function addFromUrl($metadataProfileId, $objectType, $objectId, $url)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
        $this->client->addParam($kparams, "objectType", $objectType);
        $this->client->addParam($kparams, "objectId", $objectId);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromUrl", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function addFromBulk($metadataProfileId, $objectType, $objectId, $url)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
        $this->client->addParam($kparams, "objectType", $objectType);
        $this->client->addParam($kparams, "objectId", $objectId);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromBulk", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function delete($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "delete", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    function invalidate($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "invalidate", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    function get($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "get", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function update($id, $xmlData = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xmlData", $xmlData);
        $this->client->queueServiceActionCall("metadata_metadata", "update", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function updateFromFile($id, $xmlFile = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xmlFile", $xmlFile);
        $this->client->queueServiceActionCall("metadata_metadata", "updateFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    function serve($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadata', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataProfileService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null)
    {
        parent::__construct($client);
    }

    function listAction(KalturaMetadataProfileFilter $filter = null, KalturaFilterPager $pager = null)
    {
        $kparams = array();
        if ($filter !== null)
            $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null)
            $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->queueServiceActionCall("metadata_metadataprofile", "list", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfileListResponse");
        return $resultobject;
    }

    function listFields($metadataProfileId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataProfileId);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "listFields", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfileFieldListResponse");
        return $resultobject;
    }

    function add(KalturaMetadataProfile $metadataProfile, $xsdData, $viewsData = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
        $this->client->addParam($kparams, "xsdData", $xsdData);
        $this->client->addParam($kparams, "viewsData", $viewsData);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "add", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function addFromFile(KalturaMetadataProfile $metadataProfile, $xsdFile, $viewsFile = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdFile);
        $this->client->addParam($kfiles, "viewsFile", $viewsFile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "addFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function delete($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "delete", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    function get($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "get", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function update($id, KalturaMetadataProfile $metadataProfile, $xsdData = null, $viewsData = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "metadataProfile", $metadataProfile->toParams());
        $this->client->addParam($kparams, "xsdData", $xsdData);
        $this->client->addParam($kparams, "viewsData", $viewsData);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "update", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function revert($id, $toVersion)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "toVersion", $toVersion);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "revert", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function updateDefinitionFromFile($id, $xsdFile)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdFile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "updateDefinitionFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function updateViewsFromFile($id, $viewsFile)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "viewsFile", $viewsFile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "updateViewsFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    function serve($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadataprofile', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    function serveView($id)
    {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadataprofile', 'serveView', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetadataClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaMetadataClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaMetadataService
     */
    public $metadata = null;

    /**
     * @var KalturaMetadataProfileService
     */
    public $metadataProfile = null;

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
        $this->metadata = new KalturaMetadataService($client);
        $this->metadataProfile = new KalturaMetadataProfileService($client);
    }

    /**
     * @return KalturaMetadataClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaMetadataClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices()
    {
        $services = array(
            'metadata' => $this->metadata,
            'metadataProfile' => $this->metadataProfile,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'metadata';
    }
}
