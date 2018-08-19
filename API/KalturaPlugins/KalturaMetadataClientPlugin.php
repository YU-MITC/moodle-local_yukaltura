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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataObjectType
{
    const ENTRY = "1";
    const ANNOTATION = "annotationMetadata.Annotation";
    const AD_CUE_POINT = "adCuePointMetadata.AdCuePoint";
    const CODE_CUE_POINT = "codeCuePointMetadata.CodeCuePoint";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileCreateMode
{
    const API = 1;
    const KMC = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileStatus
{
    const ACTIVE = 1;
    const DEPRECATED = 2;
    const TRANSFORMING = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataStatus
{
    const VALID = 1;
    const INVALID = 2;
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataFilter extends KalturaMetadataBaseFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadata extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     *
     * @var int
     */
    public $metadataProfileVersion = null;

    /**
     *
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectType = null;

    /**
     *
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     *
     * @var int
     */
    public $version = null;

    /**
     *
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var KalturaMetadataStatus
     */
    public $status = null;

    /**
     *
     *
     * @var string
     */
    public $xml = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMetadata
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileFilter extends KalturaMetadataProfileBaseFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfile extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var int
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
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var KalturaMetadataProfileStatus
     */
    public $status = null;

    /**
     *
     *
     * @var string
     */
    public $xsd = null;

    /**
     *
     *
     * @var string
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMetadataProfile
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileField extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     */
    public $id = null;

    /**
     *
     *
     * @var string
     */
    public $xPath = null;

    /**
     *
     *
     * @var string
     */
    public $key = null;

    /**
     *
     *
     * @var string
     */
    public $label = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileFieldListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaMetadataProfileField
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function listAction(KalturaMetadataFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("metadata_metadata", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataListResponse");
        return $resultobject;
    }

    public function add($metadataprofileid, $objecttype, $objectid, $xmldata) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataprofileid);
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->addParam($kparams, "xmlData", $xmldata);
        $this->client->queueServiceActionCall("metadata_metadata", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function addFromFile($metadataprofileid, $objecttype, $objectid, $xmlfile) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataprofileid);
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $kfiles = array();
        $this->client->addParam($kfiles, "xmlFile", $xmlfile);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function addFromUrl($metadataprofileid, $objecttype, $objectid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataprofileid);
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function addFromBulk($metadataprofileid, $objecttype, $objectid, $url) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataprofileid);
        $this->client->addParam($kparams, "objectType", $objecttype);
        $this->client->addParam($kparams, "objectId", $objectid);
        $this->client->addParam($kparams, "url", $url);
        $this->client->queueServiceActionCall("metadata_metadata", "addFromBulk", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function invalidate($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "invalidate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function update($id, $xmldata = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xmlData", $xmldata);
        $this->client->queueServiceActionCall("metadata_metadata", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function updateFromFile($id, $xmlfile = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xmlFile", $xmlfile);
        $this->client->queueServiceActionCall("metadata_metadata", "updateFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    public function serve($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadata', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function listAction(KalturaMetadataProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("metadata_metadataprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfileListResponse");
        return $resultobject;
    }

    public function listFields($metadataprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfileId", $metadataprofileid);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "listFields", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfileFieldListResponse");
        return $resultobject;
    }

    public function add(KalturaMetadataProfile $metadataprofile, $xsddata, $viewsdata = null) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfile", $metadataprofile->toParams());
        $this->client->addParam($kparams, "xsdData", $xsddata);
        $this->client->addParam($kparams, "viewsData", $viewsdata);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function addFromFile(KalturaMetadataProfile $metadataprofile, $xsdfile, $viewsfile = null) {
        $kparams = array();
        $this->client->addParam($kparams, "metadataProfile", $metadataprofile->toParams());
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdfile);
        $this->client->addParam($kfiles, "viewsFile", $viewsfile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "addFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
        return $resultobject;
    }

    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function update($id, KalturaMetadataProfile $metadataprofile, $xsddata = null, $viewsdata = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "metadataProfile", $metadataprofile->toParams());
        $this->client->addParam($kparams, "xsdData", $xsddata);
        $this->client->addParam($kparams, "viewsData", $viewsdata);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function revert($id, $toversion) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "toVersion", $toversion);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "revert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function updateDefinitionFromFile($id, $xsdfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xsdFile", $xsdfile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "updateDefinitionFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function updateViewsFromFile($id, $viewsfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "viewsFile", $viewsfile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "updateViewsFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    public function serve($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadataprofile', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveView($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall('metadata_metadataprofile', 'serveView', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->metadata = new KalturaMetadataService($client);
        $this->metadataProfile = new KalturaMetadataProfileService($client);
    }

    /**
     * @return KalturaMetadataClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaMetadataClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'metadata' => $this->metadata,
            'metadataProfile' => $this->metadataProfile,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'metadata';
    }
}
