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
class KalturaMetadataProfileCreateMode extends KalturaEnumBase {
    /** @var API */
    const API = 1;
    /** @var KMC */
    const KMC = 2;
    /** @var APP */
    const APP = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileStatus extends KalturaEnumBase {
    /** @var ACTIVE */
    const ACTIVE = 1;
    /** @var DEPRECATED */
    const DEPRECATED = 2;
    /** @var TRANSFORMING */
    const TRANSFORMING = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataStatus extends KalturaEnumBase {
    /** @var VALID */
    const VALID = 1;
    /** @var INVALID */
    const INVALID = 2;
    /** @var DELETED */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataObjectType extends KalturaEnumBase {
    /** @var AD_CUE_POINT */
    const AD_CUE_POINT = "adCuePointMetadata.AdCuePoint";
    /** @var ANNOTATION */
    const ANNOTATION = "annotationMetadata.Annotation";
    /** @var CODE_CUE_POINT */
    const CODE_CUE_POINT = "codeCuePointMetadata.CodeCuePoint";
    /** @var ANSWER_CUE_POINT */
    const ANSWER_CUE_POINT = "quiz.AnswerCuePoint";
    /** @var QUESTION_CUE_POINT */
    const QUESTION_CUE_POINT = "quiz.QuestionCuePoint";
    /** @var THUMB_CUE_POINT */
    const THUMB_CUE_POINT = "thumbCuePointMetadata.thumbCuePoint";
    /** @var ENTRY */
    const ENTRY = "1";
    /** @var CATEGORY */
    const CATEGORY = "2";
    /** @var USER */
    const USER = "3";
    /** @var PARTNER */
    const PARTNER = "4";
    /** @var DYNAMIC_OBJECT */
    const DYNAMIC_OBJECT = "5";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by metadata profile version */
    const METADATA_PROFILE_VERSION_ASC = "+metadataProfileVersion";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by version */
    const VERSION_ASC = "+version";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by metadata profile */
    const METADATA_PROFILE_VERSION_DESC = "-metadataProfileVersion";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by version */
    const VERSION_DESC = "-version";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
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
class KalturaMetadata extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     * @var int
     */
    public $metadataProfileVersion = null;

    /**
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectType = null;

    /**
     *
     * @var string
     */
    public $objectId = null;

    /**
     *
     * @var int
     */
    public $version = null;

    /**
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaMetadataStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $xml = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfile extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectType = null;

    /**
     *
     * @var int
     */
    public $version = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var int
     */
    public $createdAt = null;

    /**
     *
     * @var int
     */
    public $updatedAt = null;

    /**
     *
     * @var KalturaMetadataProfileStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $xsd = null;

    /**
     *
     * @var string
     */
    public $views = null;

    /**
     *
     * @var string
     */
    public $xslt = null;

    /**
     *
     * @var KalturaMetadataProfileCreateMode
     */
    public $createMode = null;

    /**
     *
     * @var bool
     */
    public $disableReIndexing = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileField extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var string
     */
    public $xPath = null;

    /**
     *
     * @var string
     */
    public $key = null;

    /**
     *
     * @var string
     */
    public $label = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImportMetadataJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $srcFileUrl = null;

    /**
     *
     * @var string
     */
    public $destFileLocalPath = null;

    /**
     *
     * @var int
     */
    public $metadataId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMetadata
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
abstract class KalturaMetadataProfileBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectTypeEqual = null;

    /**
     *
     * @var string
     */
    public $metadataObjectTypeIn = null;

    /**
     *
     * @var int
     */
    public $versionEqual = null;

    /**
     *
     * @var string
     */
    public $nameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     *
     * @var KalturaMetadataProfileStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaMetadataProfileCreateMode
     */
    public $createModeEqual = null;

    /**
     *
     * @var KalturaMetadataProfileCreateMode
     */
    public $createModeNotEqual = null;

    /**
     *
     * @var string
     */
    public $createModeIn = null;

    /**
     *
     * @var string
     */
    public $createModeNotIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileFieldListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMetadataProfileField
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
class KalturaMetadataProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaMetadataProfile
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
class KalturaMetadataReplacementOptionsItem extends KalturaPluginReplacementOptionsItem {
    /**
     * If true custom-metadata transferred to temp entry on entry replacement
     *
     * @var bool
     */
    public $shouldCopyMetadata = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataResponseProfileMapping extends KalturaResponseProfileMapping {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTransformMetadataJobData extends KalturaJobData {
    /**
     *
     * @var string
     */
    public $srcXslPath = null;

    /**
     *
     * @var int
     */
    public $srcVersion = null;

    /**
     *
     * @var int
     */
    public $destVersion = null;

    /**
     *
     * @var string
     */
    public $destXsdPath = null;

    /**
     *
     * @var int
     */
    public $metadataProfileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCompareMetadataCondition extends KalturaCompareCondition {
    /**
     * May contain the full xpath to the field in three formats
     *      1. Slashed xPath, e.g. /metadata/myElementName
     *      2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
     *      3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
     *
     * @var string
     */
    public $xPath = null;

    /**
     * Metadata profile id
     *
     * @var int
     */
    public $profileId = null;

    /**
     * Metadata profile system name
     *
     * @var string
     */
    public $profileSystemName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDynamicObjectSearchItem extends KalturaSearchOperator {
    /**
     *
     * @var string
     */
    public $field = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMatchMetadataCondition extends KalturaMatchCondition {
    /**
     * May contain the full xpath to the field in three formats
     *      1. Slashed xPath, e.g. /metadata/myElementName
     *      2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
     *      3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
     *
     * @var string
     */
    public $xPath = null;

    /**
     * Metadata profile id
     *
     * @var int
     */
    public $profileId = null;

    /**
     * Metadata profile system name
     *
     * @var string
     */
    public $profileSystemName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaMetadataBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var int
     */
    public $metadataProfileIdEqual = null;

    /**
     *
     * @var string
     */
    public $metadataProfileIdIn = null;

    /**
     *
     * @var int
     */
    public $metadataProfileVersionEqual = null;

    /**
     *
     * @var int
     */
    public $metadataProfileVersionGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $metadataProfileVersionLessThanOrEqual = null;

    /**
     * When null, default is KalturaMetadataObjectType::ENTRY
     *
     * @var KalturaMetadataObjectType
     */
    public $metadataObjectTypeEqual = null;

    /**
     *
     * @var string
     */
    public $objectIdEqual = null;

    /**
     *
     * @var string
     */
    public $objectIdIn = null;

    /**
     *
     * @var int
     */
    public $versionEqual = null;

    /**
     *
     * @var int
     */
    public $versionGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $versionLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     *
     * @var KalturaMetadataStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataFieldChangedCondition extends KalturaMatchCondition {
    /**
     * May contain the full xpath to the field in three formats
     * 1. Slashed xPath, e.g. /metadata/myElementName
     * 2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
     * 3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
     *
     * @var string
     */
    public $xPath = null;

    /**
     * Metadata profile id
     *
     * @var int
     */
    public $profileId = null;

    /**
     * Metadata profile system name
     *
     * @var string
     */
    public $profileSystemName = null;

    /**
     *
     * @var string
     */
    public $versionA = null;

    /**
     *
     * @var string
     */
    public $versionB = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataProfileFilter extends KalturaMetadataProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataSearchItem extends KalturaSearchOperator {
    /**
     *
     * @var int
     */
    public $metadataProfileId = null;

    /**
     *
     * @var string
     */
    public $orderBy = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataField extends KalturaStringField {
    /**
     * May contain the full xpath to the field in three formats
     * 1. Slashed xPath, e.g. /metadata/myElementName
     * 2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
     * 3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
     *
     * @var string
     */
    public $xPath = null;

    /**
     * Metadata profile id
     *
     * @var int
     */
    public $profileId = null;

    /**
     * Metadata profile system name
     *
     * @var string
     */
    public $profileSystemName = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataFilter extends KalturaMetadataBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Metadata Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a metadata object and metadata content associated with Kaltura object
     * @param int $metadataprofileid - metadata profile id.
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param string $xmldata - XML metadata.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Allows you to add a metadata xml data from remote URL.
     Enables different permissions than addFromUrl action.
     * @param int $metadataprofileid - metadata profile id.
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param string $url - XML metadata remote url.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Allows you to add a metadata object and metadata file associated with Kaltura object
     * @param int $metadataprofileid - metadata profile id.
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param file $xmlfile - XML metadata.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Allows you to add a metadata xml data from remote URL
     * @param int $metadataprofileid - metadata profile id.
     * @param string $objecttype - object type.
     * @param string $objectid - object id.
     * @param string $url - XML metadata remote url.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Delete an existing metadata
     * @param int $id - metadata id.
     */
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
    }

    /**
     * Retrieve a metadata object by id.
     * @param int $id - metadata id.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Index metadata by id, will also index the related object
     * @param string $id - metadata id.
     * @param bool $shouldupdate - true of false.
     * @return int - index of metadata.
     */
    public function index($id, $shouldupdate) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "shouldUpdate", $shouldupdate);
        $this->client->queueServiceActionCall("metadata_metadata", "index", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Mark existing metadata as invalid
     * Used by batch metadata transform
     * @param int $id - metadata id.
     * @param int $version - Enable update only if the metadata object version did not change by other process
     */
    public function invalidate($id, $version = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("metadata_metadata", "invalidate", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * List metadata objects by filter and pager
     * @param KalturaMetadataFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaMetadataListResponse - list object.
     */
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

    /**
     * Serves metadata XML file
     * @param int $id - metadata id.
     * @return file - xml file.
     */
    public function serve($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadata", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update an existing metadata object with new XML content
     * @param int $id - metadata id.
     * @param string $xmldata - XML metadata
     * @param int $version - Enable update only if the metadata object version did not change by other process
     * @return KalturaMetadata - metadata object.
     */
    public function update($id, $xmldata = null, $version = null) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "xmlData", $xmldata);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("metadata_metadata", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
        return $resultobject;
    }

    /**
     * Update an existing metadata object with new XML file
     * @param int $id - metadata id.
     * @param file $xmlfile - XML metadata.
     * @return KalturaMetadata - metadata object.
     */
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

    /**
     * Action transforms current metadata object XML using a provided XSL.
     * @param int $id - metadata id.
     * @param file $xslfile - XSL file.
     * @return KalturaMetadata - metadata object.
     */
    public function updateFromXSL($id, $xslfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xslFile", $xslfile);
        $this->client->queueServiceActionCall("metadata_metadata", "updateFromXSL", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadata");
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
class KalturaMetadataProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Metadata Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a metadata profile object and metadata profile content associated with Kaltura object type
     * @param KalturaMetadataProfile $metadataprofile - instance of KalturaMetadataProfile.
     * @param string $xsddata - XSD metadata definition
     * @param string $viewsdata - UI views definition
     * @return KalturaMetadataProfile - metadata profile object.
     */
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

    /**
     * Allows you to add a metadata profile object and metadata profile file associated with Kaltura object type
     * @param KalturaMetadataProfile $metadataprofile - instance of KalturaMetadataProfile.
     * @param file $xsdfile - XSD metadata definition.
     * @param file $viewsfile - UI views definition.
     * @return KalturaMetadataProfile - metadata profile object.
     */
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

    /**
     * Delete an existing metadata profile
     * @param int $id  - metadata id.
     */
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
    }

    /**
     * Retrieve a metadata profile object by id
     * @param int $id - metadata id.
     * @return KalturaMetadataProfile - metadata profile object.
     */
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

    /**
     * List metadata profile objects by filter and pager
     * @param KalturaMetadataProfileFilter $filter - filter object .
     * @param KalturaFilterPager $pager - pager object .
     * @return KalturaMetadataProfileListResponse - list object.
     */
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

    /**
     * List metadata profile fields by metadata profile id
     * @param int $metadataprofileid - metadata profile id.
     * @return KalturaMetadataProfileFieldListResponse - list object.
     */
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

    /**
     * Update an existing metadata object definition file
     * @param int $id - metadata id.
     * @param int $toversion - version.
     * @return KalturaMetadataProfile - metadata profile.
     */
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

    /**
     * Serves metadata profile XSD file
     * @param int $id - metadata id.
     * @return file - xsd file data.
     */
    public function serve($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves metadata profile view file
     * @param int $id - metadata profile id.
     * @return file - file data.
     */
    public function serveView($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "serveView", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update an existing metadata object
     * @param int $id - metadata id.
     * @param KalturaMetadataProfile $metadataprofile - instance of KalturaMetadataProfile.
     * @param string $xsddata - XSD metadata definition.
     * @param string $viewsdata - UI views definition.
     * @return KalturaMetadataProfile - metadata profile.
     */
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

    /**
     * Update an existing metadata object definition file
     * @param int $id - metadata id.
     * @param file $xsdfile - XSD metadata definition
     * @return KalturaMetadataProfile - metadata profile.
     */
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

    /**
     * Update an existing metadata object xslt file
     * @param int $id - metadata id.
     * @param file $xsltfile - XSLT file, will be executed on every metadata add/update
     * @return KalturaMetadataProfile - metadata profile.
     */
    public function updateTransformationFromFile($id, $xsltfile) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $kfiles = array();
        $this->client->addParam($kfiles, "xsltFile", $xsltfile);
        $this->client->queueServiceActionCall("metadata_metadataprofile", "updateTransformationFromFile", $kparams, $kfiles);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaMetadataProfile");
        return $resultobject;
    }

    /**
     * Update an existing metadata object views file
     * @param int $id - metadata id.
     * @param file $viewsfile - UI views file.
     * @return KalturaMetadataProfile - metadata profile.
     */
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
}
/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaMetadataClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaMetadataService
     */
    public $metadata = null;

    /**
     * @var KalturaMetadataProfileService
     */
    public $metadataProfile = null;

    /**
     * Constructor of Kaltura Metadata Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->metadata = new KalturaMetadataService($client);
        $this->metadataProfile = new KalturaMetadataProfileService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaMetadataClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaMetadataClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'metadata' => $this->metadata,
            'metadataProfile' => $this->metadataProfile,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'metadata';
    }
}

