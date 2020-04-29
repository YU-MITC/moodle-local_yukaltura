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
class KalturaExternalMediaEntryOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by duration */
    const DURATION_ASC = "+duration";
    /** @var order by end date */
    const END_DATE_ASC = "+endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_ASC = "+mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_ASC = "+moderationCount";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by plays */
    const PLAYS_ASC = "+plays";
    /** @var order by rank */
    const RANK_ASC = "+rank";
    /** @var order by recent */
    const RECENT_ASC = "+recent";
    /** @var order by start date */
    const START_DATE_ASC = "+startDate";
    /** @var order by total rank */
    const TOTAL_RANK_ASC = "+totalRank";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by views */
    const VIEWS_ASC = "+views";
    /** @var order by weight */
    const WEIGHT_ASC = "+weight";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by duration */
    const DURATION_DESC = "-duration";
    /** @var order by end date */
    const END_DATE_DESC = "-endDate";
    /** @var order by last played */
    const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
    /** @var order by media type */
    const MEDIA_TYPE_DESC = "-mediaType";
    /** @var order by moderation count */
    const MODERATION_COUNT_DESC = "-moderationCount";
    /** @var order by name */
    const NAME_DESC = "-name";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by plays */
    const PLAYS_DESC = "-plays";
    /** @var order by rank */
    const RANK_DESC = "-rank";
    /** @var order by recent */
    const RECENT_DESC = "-recent";
    /** @var order by start date */
    const START_DATE_DESC = "-startDate";
    /** @var order by total rank */
    const TOTAL_RANK_DESC = "-totalRank";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
    /** @var order by views */
    const VIEWS_DESC = "-views";
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
class KalturaExternalMediaSourceType extends KalturaEnumBase {
    /** @var media source type is intercall */
    const INTERCALL = "InterCall";
    /** @var media source type is youtube */
    const YOUTUBE = "YouTube";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaEntry extends KalturaMediaEntry {
    /**
     * The source type of the external media
     *
     * @var KalturaExternalMediaSourceType
     */
    public $externalSourceType = null;

    /**
     * Comma separated asset params ids that exists for this external media entry
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
class KalturaExternalMediaEntryListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaExternalMediaEntry
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
abstract class KalturaExternalMediaEntryBaseFilter extends KalturaMediaEntryFilter {
    /**
     *
     * @var KalturaExternalMediaSourceType
     */
    public $externalSourceTypeEqual = null;

    /**
     *
     * @var string
     */
    public $externalSourceTypeIn = null;

    /**
     *
     * @var string
     */
    public $assetParamsIdsMatchOr = null;

    /**
     *
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
class KalturaExternalMediaEntryFilter extends KalturaExternalMediaEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaExternalMediaService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura External Media Service Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add external media entry
     * @param KalturaExternalMediaEntry $entry - instance of KalturaExternalMediaEntry.
     * @return KalturaExternalMediaEntry - instance of KalturaExternalMediaEntry,
     */
    public function add(KalturaExternalMediaEntry $entry) {
        $kparams = array();
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaExternalMediaEntry");
        return $resultobject;
    }

    /**
     * Count media entries by filter.
     * @param  KalturaExternalMediaEntryFilter $filter - filter object.
     * @return int - number of media entries.
     */
    public function count(KalturaExternalMediaEntryFilter $filter = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "count", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Delete a external media entry.
     * @param string $id - External media entry id to delete
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Get external media entry by ID.
     * @param string $id - External media entry id.
     * @return KalturaExternalMediaEntry - instance of KalturaExternalMediaEntry,
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaExternalMediaEntry");
        return $resultobject;
    }

    /**
     * List media entries by filter with paging support.
     * @param KalturaExternalMediaEntryFilter $filter - filter object (External media entry filter).
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaExternalMediaEntryListResponse - list object.
     */
    public function listAction(KalturaExternalMediaEntryFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaExternalMediaEntryListResponse");
        return $resultobject;
    }

    /**
     * Update external media entry. Only the properties that were set will be updated.
     * @param string $id - External media entry id to update.
     * @param KalturaExternalMediaEntry $entry - external media entry object.
     * @return KalturaExternalMediaEntry - object after updated.
     */
    public function update($id, KalturaExternalMediaEntry $entry) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "entry", $entry->toParams());
        $this->client->queueServiceActionCall("externalmedia_externalmedia", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaExternalMediaEntry");
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
class KalturaExternalMediaClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaExternalMediaService
     */
    public $externalMedia = null;

    /**
     * Constructor of Kaltura External Media Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->externalMedia = new KalturaExternalMediaService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaExternalMediaClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaExternalMediaClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'externalMedia' => $this->externalMedia,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'externalMedia';
    }
}

