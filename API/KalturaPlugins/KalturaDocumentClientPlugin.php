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
 * This file is part of Kaltura Client API.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <info-cc@ml.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

class KalturaDocumentEntryOrderBy
{
    const NAME_ASC = "+name";
    const NAME_DESC = "-name";
    const MODERATION_COUNT_ASC = "+moderationCount";
    const MODERATION_COUNT_DESC = "-moderationCount";
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const RANK_ASC = "+rank";
    const RANK_DESC = "-rank";
    const START_DATE_ASC = "+startDate";
    const START_DATE_DESC = "-startDate";
    const END_DATE_ASC = "+endDate";
    const END_DATE_DESC = "-endDate";
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
}

class KalturaDocumentFlavorParamsOrderBy
{
}

class KalturaDocumentFlavorParamsOutputOrderBy
{
}

class KalturaDocumentType
{
    const DOCUMENT = 11;
    const SWF = 12;
    const PDF = 13;
}

class KalturaPdfFlavorParamsOrderBy
{
}

class KalturaPdfFlavorParamsOutputOrderBy
{
}

class KalturaSwfFlavorParamsOrderBy
{
}

class KalturaSwfFlavorParamsOutputOrderBy
{
}

class KalturaDocumentEntry extends KalturaBaseEntry
{
    /**
     * The type of the document
     *
     * @var KalturaDocumentType
     * @insertonly
     */
    public $documentType = null;

    /**
     * Comma separated asset params ids that exists for this media entry
     *
     *
     * @var string
     * @readonly
     */
    public $assetParamsIds = null;


}

abstract class KalturaDocumentEntryBaseFilter extends KalturaBaseEntryFilter
{
    /**
     *
     *
     * @var KalturaDocumentType
     */
    public $documentTypeEqual = null;

    /**
     *
     *
     * @var string
     */
    public $documentTypeIn = null;

    /**
     *
     *
     * @var string
     */
    public $assetParamsIdsMatchOr = null;

    /**
     *
     *
     * @var string
     */
    public $assetParamsIdsMatchAnd = null;


}

class KalturaDocumentEntryFilter extends KalturaDocumentEntryBaseFilter
{

}

class KalturaDocumentListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaDocumentEntry
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

abstract class KalturaDocumentFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

abstract class KalturaDocumentFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

abstract class KalturaPdfFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

abstract class KalturaPdfFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

abstract class KalturaSwfFlavorParamsBaseFilter extends KalturaFlavorParamsFilter
{

}

abstract class KalturaSwfFlavorParamsOutputBaseFilter extends KalturaFlavorParamsOutputFilter
{

}

class KalturaDocumentFlavorParamsFilter extends KalturaDocumentFlavorParamsBaseFilter
{

}

class KalturaDocumentFlavorParamsOutputFilter extends KalturaDocumentFlavorParamsOutputBaseFilter
{

}

class KalturaPdfFlavorParamsFilter extends KalturaPdfFlavorParamsBaseFilter
{

}

class KalturaPdfFlavorParamsOutputFilter extends KalturaPdfFlavorParamsOutputBaseFilter
{

}

class KalturaSwfFlavorParamsFilter extends KalturaSwfFlavorParamsBaseFilter
{

}

class KalturaSwfFlavorParamsOutputFilter extends KalturaSwfFlavorParamsOutputBaseFilter
{

}

class KalturaDocumentFlavorParamsOutput extends KalturaFlavorParamsOutput
{

}

class KalturaDocumentFlavorParams extends KalturaFlavorParams
{

}

class KalturaPdfFlavorParamsOutput extends KalturaFlavorParamsOutput
{
    /**
     *
     *
     * @var bool
     */
    public $readonly = null;


}

class KalturaPdfFlavorParams extends KalturaFlavorParams
{
    /**
     *
     *
     * @var bool
     */
    public $readonly = null;


}

class KalturaSwfFlavorParamsOutput extends KalturaFlavorParamsOutput
{

}

class KalturaSwfFlavorParams extends KalturaFlavorParams
{

}


class KalturaDocumentsService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function addFromEntry($sourceentryid, KalturaDocumentEntry $documententry = null, $paramsid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceEntryId", $sourceentryid);
        if ($documententry !== null) {
            $this->client->addParam($kparams, "documentEntry", $documententry->toParams());
        }
        $this->client->addParam($kparams, "sourceFlavorParamsId", $paramsid);
        $this->client->queueServiceActionCall("document_documents", "addFromEntry", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentEntry");
        return $resultobject;
    }

    public function addFromFlavorAsset($flavorassetid, KalturaDocumentEntry $documententry = null) {
        $kparams = array();
        $this->client->addParam($kparams, "sourceFlavorAssetId", $flavorassetid);
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

    public function convert($entryid, $profileid = null, array $attributes = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "conversionProfileId", $profileid);
        if ($attributes !== null) {
            foreach ($attributes as $index => $obj) {
                $this->client->addParam($kparams, "dynamicConversionAttributes:$index", $obj->toParams());
            }
        }
        $this->client->queueServiceActionCall("document_documents", "convert", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

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
        $this->client->queueServiceActionCall("document_documents", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDocumentListResponse");
        return $resultobject;
    }

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

    public function serve($entryid, $flavorassetid = null, $forceproxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorAssetId", $flavorassetid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall('document_documents', 'serve', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }

    public function serveByFlavorParamsId($entryid, $flavorparamsid = null, $forceproxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorParamsId", $flavorparamsid);
        $this->client->addParam($kparams, "forceProxy", $forceproxy);
        $this->client->queueServiceActionCall('document_documents', 'serveByFlavorParamsId', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

class KalturaDocumentClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaDocumentClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaDocumentsService
     */
    public $documents = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->documents = new KalturaDocumentsService($client);
    }

    /**
     * @return KalturaDocumentClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaDocumentClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('documents' => $this->documents);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'document';
    }
}
