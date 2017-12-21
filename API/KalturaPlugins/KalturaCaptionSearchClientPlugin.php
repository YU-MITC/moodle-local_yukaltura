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
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaCaptionClientPlugin.php");


/**
 * Kaltura Caption Asset Item Filter class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
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

/**
 * Kaltura Caption Asset Item class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
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

/**
 * Kaltura Caption Asset Item List Response class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItemListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaCaptionAssetItem
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
 * Kaltura Caption Asset Item Service class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCaptionAssetItemService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    public function search(KalturaBaseEntryFilter $entryfilter = null, KalturaCaptionAssetItemFilter $captionassetitemfilter = null, KalturaFilterPager $captionassetitempager = null) {
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
}

/**
 * Kaltura Caption Search Client Plugin class
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
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
        if (!self::$instance) {
            self::$instance = new KalturaCaptionSearchClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'captionAssetItem' => $this->captionAssetItem,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'captionSearch';
    }
}
