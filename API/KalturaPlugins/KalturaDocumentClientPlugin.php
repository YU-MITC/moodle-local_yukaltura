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
class KalturaDocumentType extends KalturaEnumBase {
    /** @var document */
    const DOCUMENT = 11;
    /** @var swf */
    const SWF = 12;
    /** @var pdf */
    const PDF = 13;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryOrderBy extends KalturaEnumBase {
    /** @var order by created timestamp */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated timestamp */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created timestamp */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated timestamp */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by weight */
    const WEIGHT_DESC = "-weight";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParamsOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParamsOutputOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntry extends KalturaBaseEntry {
    /**
     * The type of the document
     *
     * @var KalturaDocumentType
     */
    public $documentType = null;

    /**
     * Comma separated asset params ids that exists for this media entry
     *
     * @var string
     */
    public $assetParamsIds = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaDocumentEntry
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
class KalturaDocumentFlavorParams extends KalturaFlavorParams {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParams extends KalturaFlavorParams {
    /**
     * @var int
     */
    public $densityWidth = null;

    /**
     * @var int
     */
    public $densityHeight = null;

    /**
     * @var int
     */
    public $sizeWidth = null;

    /**
     * @var int
     */
    public $sizeHeight = null;

    /**
     * @var int
     */
    public $depth = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParams extends KalturaFlavorParams {
    /**
     * @var bool
     */
    public $readonly = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParams extends KalturaFlavorParams {
    /**
     * @var int
     */
    public $flashVersion = null;

    /**
     * @var bool
     */
    public $poly2Bitmap = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentFlavorParamsOutput extends KalturaFlavorParamsOutput {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParamsOutput extends KalturaFlavorParamsOutput {
    /**
     * @var int
     */
    public $densityWidth = null;

    /**
     * @var int
     */
    public $densityHeight = null;

    /**
     * @var int
     */
    public $sizeWidth = null;

    /**
     * @var int
     */
    public $sizeHeight = null;

    /**
     * @var int
     */
    public $depth = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParamsOutput extends KalturaFlavorParamsOutput {
    /**
     * @var bool
     */
    public $readonly = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParamsOutput extends KalturaFlavorParamsOutput {
    /**
     * @var int
     */
    public $flashVersion = null;

    /**
     * @var bool
     */
    public $poly2Bitmap = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDocumentEntryBaseFilter extends KalturaBaseEntryFilter {
    /**
     * @var KalturaDocumentType
     */
    public $documentTypeEqual = null;

    /**
     * @var string
     */
    public $documentTypeIn = null;

    /**
     * @var string
     */
    public $assetParamsIdsMatchOr = null;

    /**
     * @var string
     */
    public $assetParamsIdsMatchAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentEntryFilter extends KalturaDocumentEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDocumentFlavorParamsBaseFilter extends KalturaFlavorParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaImageFlavorParamsBaseFilter extends KalturaFlavorParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPdfFlavorParamsBaseFilter extends KalturaFlavorParamsFilter {

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSwfFlavorParamsBaseFilter extends KalturaFlavorParamsFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentFlavorParamsFilter extends KalturaDocumentFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParamsFilter extends KalturaImageFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParamsFilter extends KalturaPdfFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParamsFilter extends KalturaSwfFlavorParamsBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDocumentFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaImageFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPdfFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaSwfFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentFlavorParamsOutputFilter extends KalturaDocumentFlavorParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaImageFlavorParamsOutputFilter extends KalturaImageFlavorParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPdfFlavorParamsOutputFilter extends KalturaPdfFlavorParamsOutputBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaSwfFlavorParamsOutputFilter extends KalturaSwfFlavorParamsOutputBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentsService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura DocumentService.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Copy entry into new entry
     * @param string $sourceentryid - Document entry id to copy from
     * @param KalturaDocumentEntry $documententry - Document entry metadata
     * @param int $sourceflavorparamsid - The flavor to be used as the new entry source,
     * source flavor will be used if not specified.
     * @return  KalturaDocumentEntry - instance of KalturaDocumentEntry.
     */
    public function addFromEntry($sourceentryid, KalturaDocumentEntry $documententry = null, $sourceflavorparamsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        if ($documententry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $sourceflavorparamsid);
        $this->client->queueServiceActionCall("document_documents", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Copy flavor asset into new entry.
     * @param string $sourceflavorassetid - Flavor asset id to be used as the new entry source.
     * @param KalturaDocumentEntry $documententry - Document entry metadata.
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry.
     */
    public function addFromFlavorAsset($sourceflavorassetid, KalturaDocumentEntry $documententry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $sourceflavorassetid);
        if ($documententry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        }
        $this->client->queueServiceActionCall("document_documents", "addFromFlavorAsset", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Add new document entry after the specific document file was uploaded and the upload token id exists
     * @param KalturaDocumentEntry $documententry - Document entry metadata.
     * @param string $uploadtokenid - Upload token id,
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry.
     */
    public function addFromUploadedFile(KalturaDocumentEntry $documententry, $uploadtokenid) {
        $kparams = array();
        $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        $this->client->addParam($kparams, "uploadTokenId", $uploadtokenid);
        $this->client->queueServiceActionCall("document_documents", "addFromUploadedFile", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Approves document replacement
     * @param string $entryid - Document entry id to replace.
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry.
     */
    public function approveReplace($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document_documents", "approveReplace", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Cancels document replacement
     * @param string $entryid - Document entry id to cancel
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry
     */
    public function cancelReplace($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document_documents", "cancelReplace", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Convert entry
     * @param string $entryid - Document entry id
     * @param int $conversionprofileid - conversion pfoile id.
     * @param array $dynamicconversionattributes - array of dynamic conversion attribute.
     * @return int - conversion status.
     */
    public function convert($entryid, $conversionprofileid = null, array $dynamicconversionattributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        if ($dynamicconversionattributes !== null) {
            foreach ($dynamicconversionattributes as $index => $obj) {
                $this->client->addParam($kparams, "dynamicConversionAttributes:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("document_documents", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "double");
        return $resultobject;
    }

    /**
     * This will queue a batch job for converting the document file to swf
     Returns the URL where the new swf will be available
     * @param string $entryid - id of media entry.
     * @return string - conversion status.
     */
    public function convertPptToSwf($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document_documents", "convertPptToSwf", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Delete a document entry.
     * @param string $entryid - Document entry id to delete
     */
    public function delete($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("document_documents", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get document entry by ID.
     * @param string $entryid - Document entry id
     * @param int $version - Desired version of the data
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry
     */
    public function get($entryid, $version = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "version", $version);
        $this->client->queueServiceActionCall("document_documents", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * List document entries by filter with paging support.
     * @param KalturaDocumentEntryFilter $filter - instance of KalturaDocumentEntryFilter(Document entry filter)
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager
     * @return KalturaDocumentListResponse - instance of KalturaDocumentListResponse
     */
    public function listAction(KalturaDocumentEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("document_documents", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentListResponse");
        return $resultobject;
    }

    /**
     * Serves the file content
     * @param string $entryid - Document entry id
     * @param string $flavorassetid - Flavor asset id
     * @param bool $forceproxy - Force to get the content without redirect
     * @return file - file data
     */
    public function serve($entryid, $flavorassetid = null, $forceproxy = false) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorAssetId", $flavorassetid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall("document_documents", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Serves the file content
     * @param string $entryid - Document entry id
     * @param string $flavorparamsid - Flavor params id
     * @param bool $forceproxy - Force to get the content without redirect
     * @return file - instance of file
     */
    public function serveByFlavorParamsId($entryid, $flavorparamsid = null, $forceproxy = false) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall("document_documents", "serveByFlavorParamsId", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Update document entry. Only the properties that were set will be updated.
     * @param string $entryid - Document entry id to update
     * @param KalturaDocumentEntry $documententry - Document entry metadata to update
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry
     */
    public function update($entryid, KalturaDocumentEntry $documententry) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        $this->client->queueServiceActionCall("document_documents", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Replace content associated with the given document entry.
     * @param string $entryid - Document entry id to update
     * @param KalturaResource $resource - Resource to be used to replace entry doc content
     * @param int $conversionprofileid - The conversion profile id to be used on the entry
     * @return KalturaDocumentEntry - instance of KalturaDocumentEntry
     */
    public function updateContent($entryid, KalturaResource $resource, $conversionprofileid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "resource", $resource->toParams());
        $this->client->addParam($kparams, "conversionProfileId", $conversionprofileid);
        $this->client->queueServiceActionCall("document_documents", "updateContent", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    /**
     * Upload a document file to Kaltura, then the file can be used to create a document entry.
     * @param file $filedata - The file data
     * @return string - upload status.
     */
    public function upload($filedata) {
        $kparams = array();
        $kfiles = array();
        $this->client->addParam($kfiles, "fileData", $filedata);
        $this->client->queueServiceActionCall("document_documents", "upload", $kparams, $kfiles);
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
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDocumentClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaDocumentsService
     */
    public $documents = null;

    /**
     * Constructor of Kaltura Document Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->documents = new KalturaDocumentsService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaDocumentClientPlugin - instance of KalturaDocumentClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaDocumentClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase
     */
    public function getServices() {
        $services = array('documents' => $this->documents);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name
     */
    public function getName() {
        return 'document';
    }
}
