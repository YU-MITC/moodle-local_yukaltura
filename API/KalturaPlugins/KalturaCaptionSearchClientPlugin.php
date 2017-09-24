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

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaCaptionClientPlugin.php");

require_login();

class KalturaCaptionAssetItemFilter extends KalturaCaptionAssetFilter
{
    /**
     * 
     *
     * @var string
     */
    public $contentLike = null;

    /**
     * 
     *
     * @var string
     */
    public $contentMultiLikeOr = null;

    /**
     * 
     *
     * @var string
     */
    public $contentMultiLikeAnd = null;

    /**
     * 
     *
     * @var string
     */
    public $partnerDescriptionLike = null;

    /**
     * 
     *
     * @var string
     */
    public $partnerDescriptionMultiLikeOr = null;

    /**
     * 
     *
     * @var string
     */
    public $partnerDescriptionMultiLikeAnd = null;

    /**
     * 
     *
     * @var KalturaLanguage
     */
    public $languageEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $languageIn = null;

    /**
     * 
     *
     * @var string
     */
    public $labelEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $labelIn = null;

    /**
     * 
     *
     * @var int
     */
    public $startTimeGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $startTimeLessThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $endTimeGreaterThanOrEqual = null;

    /**
     * 
     *
     * @var int
     */
    public $endTimeLessThanOrEqual = null;


}

class KalturaCaptionAssetItem extends KalturaObjectBase
{
    /**
     * The Caption Asset object
     * 
     *
     * @var KalturaCaptionAsset
     */
    public $asset;

    /**
     * The entry object
     * 
     *
     * @var KalturaBaseEntry
     */
    public $entry;

    /**
     * 
     *
     * @var int
     */
    public $startTime = null;

    /**
     * 
     *
     * @var int
     */
    public $endTime = null;

    /**
     * 
     *
     * @var string
     */
    public $content = null;


}

class KalturaCaptionAssetItemListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaCaptionAssetItem
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


class KalturaCaptionAssetItemService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    function search(KalturaBaseEntryFilter $entryFilter = null, KalturaCaptionAssetItemFilter $itemFilter = null, KalturaFilterPager $itemPager = null) {
        $kparams = array();
        if ($entryFilter !== null) {
            $this->client->addParam($kparams, "entryFilter", $entryFilter->toParams());
        }
        if ($itemFilter !== null) {
            $this->client->addParam($kparams, "captionAssetItemFilter", $itemFilter->toParams());
        }
        if ($itemPager !== null) {
            $this->client->addParam($kparams, "captionAssetItemPager", $itemPager->toParams());
        }
        $this->client->queueServiceActionCall("captionsearch_captionassetitem", "search", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaCaptionAssetItemListResponse");
        return $resultObject;
    }
}
class KalturaCaptionSearchClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaCaptionSearchClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaCaptionAssetItemService
     */
    public $captionAssetItem = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->captionAssetItem = new KalturaCaptionAssetItemService($client);
    }

    /**
     * @return KalturaCaptionSearchClientPlugin
     */
    public static function get(KalturaClient $client) {
        if(!self::$instance) {
            self::$instance = new KalturaCaptionSearchClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('captionAssetItem' => $this->captionAssetItem);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'captionSearch';
    }
}
