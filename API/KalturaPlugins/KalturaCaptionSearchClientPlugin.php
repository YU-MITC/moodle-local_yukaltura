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
require_once(dirname(__FILE__) . "/KalturaCaptionClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItem extends KalturaObjectBase {
    /**
     * The Caption Asset object.
     * @var KalturaCaptionAsset
     */
    public $asset;

    /**
     * The entry object
     * @var KalturaBaseEntry
     */
    public $entry;

    /**
     * @var int
     */
    public $startTime = null;

    /**
     * @var int
     */
    public $endTime = null;

    /**
     * @var string
     */
    public $content = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItemListResponse extends KalturaListResponse {
    /**
     * @var array of KalturaCaptionAssetItem
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
class KalturaEntryCaptionAssetSearchItem extends KalturaSearchItem {
    /**
     * @var string
     */
    public $contentLike = null;

    /**
     * @var string
     */
    public $contentMultiLikeOr = null;

    /**
     * @var string
     */
    public $contentMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItemFilter extends KalturaCaptionAssetFilter {
    /**
     * @var string
     */
    public $contentLike = null;

    /**
     * @var string
     */
    public $contentMultiLikeOr = null;

    /**
     * @var string
     */
    public $contentMultiLikeAnd = null;

    /**
     * @var string
     */
    public $partnerDescriptionLike = null;

    /**
     * @var string
     */
    public $partnerDescriptionMultiLikeOr = null;

    /**
     * @var string
     */
    public $partnerDescriptionMultiLikeAnd = null;

    /**
     * @var KalturaLanguage
     */
    public $languageEqual = null;

    /**
     * @var string
     */
    public $languageIn = null;

    /**
     * @var string
     */
    public $labelEqual = null;

    /**
     * @var string
     */
    public $labelIn = null;

    /**
     * @var int
     */
    public $startTimeGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $startTimeLessThanOrEqual = null;

    /**
     * @var int
     */
    public $endTimeGreaterThanOrEqual = null;

    /**
     * @var int
     */
    public $endTimeLessThanOrEqual = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItemService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Caption Asset Item Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * List caption asset items by filter and pager
     * @param string $captionassetid - id of kaltura caption asset.
     * @param KalturaCaptionAssetItemFilter $captionassetitemfilter - instance of KalturaCaptionAssetItemFilter.
     * @param KalturaFilterPager $captionassetitempager - instance of KalturaFilterPager.
     * @return KalturaCaptionAssetItemListResponse - instance of KalturaCaptionAssetItemListResponse.
     */
    public function listAction($captionassetid, KalturaCaptionAssetItemFilter $captionassetitemfilter = null,
                               KalturaFilterPager $captionassetitempager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "captionAssetId", $captionassetid);
        if ($captionassetitemfilter !== null) {
            $this->client->addParam($kparams, "captionAssetItemFilter", $captionassetitemfilter->toParams());
        }
        if ($captionassetitempager !== null) {
            $this->client->addParam($kparams, "captionAssetItemPager", $captionassetitempager->toParams());
        }
        $this->client->queueServiceActionCall("captionsearch_captionassetitem", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAssetItemListResponse");
        return $resultobject;
    }

    /**
     * Search caption asset items by filter, pager and free text.
     * @param KalturaBaseEntryFilter $entryfilter - instance of KalturaBaseEntryFilter.
     * @param KalturaCaptionAssetItemFilter $captionassetitemfilter - instance of KalturaCaptionAssetItemFilter.
     * @param KalturaFilterPager $captionassetitempager - instance of KalturaFilterPager.
     * @return KalturaCaptionAssetItemListResponse - instance of KalturaCaptionAssetItemListResponse.
     */
    public function search(KalturaBaseEntryFilter $entryfilter = null,
                           KalturaCaptionAssetItemFilter $captionassetitemfilter = null,
                           KalturaFilterPager $captionassetitempager = null) {
        $kparams = array();
        if ($entryfilter !== null) {
            $this->client->addParam($kparams, "entryFilter", $entryfilter->toParams());
        }
        if ($captionassetitemfilter !== null) {
            $this->client->addParam($kparams, "captionAssetItemFilter", $captionassetitemfilter->toParams());
        }
        if ($captionassetitempager !== null) {
            $this->client->addParam($kparams, "captionAssetItemPager", $captionassetitempager->toParams());
        }
        $this->client->queueServiceActionCall("captionsearch_captionassetitem", "search", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaCaptionAssetItemListResponse");
        return $resultobject;
    }

    /**
     * Search caption asset items by filter, pager and free text.
     * @param KalturaBaseEntryFilter $entryfilter - instance of KalturaBaseEntryFilter.
     * @param KalturaCaptionAssetItemFilter $captionassetitemfilter - instance of KalturaCaptionAssetItemFilter.
     * @param KalturaFilterPager $captionassetitempager - instance of KalturaFilterPager.
     * @return KalturaBaseEntryListResponse - instance of KalturaBaseEntryListResponse.
     */
    public function searchEntries(KalturaBaseEntryFilter $entryfilter = null,
                                  KalturaCaptionAssetItemFilter $captionassetitemfilter = null,
                                  KalturaFilterPager $captionassetitempager = null) {
        $kparams = array();
        if ($entryfilter !== null) {
            $this->client->addParam($kparams, "entryFilter", $entryfilter->toParams());
        }
        if ($captionassetitemfilter !== null) {
            $this->client->addParam($kparams, "captionAssetItemFilter", $captionassetitemfilter->toParams());
        }
        if ($captionassetitempager !== null) {
            $this->client->addParam($kparams, "captionAssetItemPager", $captionassetitempager->toParams());
        }
        $this->client->queueServiceActionCall("captionsearch_captionassetitem", "searchEntries", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBaseEntryListResponse");
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
class KalturaCaptionSearchClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaCaptionAssetItemService
     */
    public $captionAssetItem = null;

    /**
     * Constructor of Kaltura Caption Asset Item Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->captionAssetItem = new KalturaCaptionAssetItemService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaCaptionSearchClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaCaptionSearchClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('captionAssetItem' => $this->captionAssetItem);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'captionSearch';
    }
}
