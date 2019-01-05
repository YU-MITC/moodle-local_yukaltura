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

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTag extends KalturaObjectBase {
    /**
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     * @var string
     * @readonly
     */
    public $tag = null;

    /**
     *
     * @var KalturaTaggedObjectType
     * @readonly
     */
    public $taggedObjectType = null;

    /**
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     * @var int
     * @readonly
     */
    public $instanceCount = null;

    /**
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaIndexTagsByPrivacyContextJobData extends KalturaJobData {
    /**
     *
     * @var int
     */
    public $changedCategoryId = null;

    /**
     *
     * @var string
     */
    public $deletedPrivacyContexts = null;

    /**
     *
     * @var string
     */
    public $addedPrivacyContexts = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTagFilter extends KalturaFilter {
    /**
     *
     * @var KalturaTaggedObjectType
     */
    public $objectTypeEqual = null;

    /**
     *
     * @var string
     */
    public $tagEqual = null;

    /**
     *
     * @var string
     */
    public $tagStartsWith = null;

    /**
     *
     * @var int
     */
    public $instanceCountEqual = null;

    /**
     *
     * @var int
     */
    public $instanceCountIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaTagListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaTag
     * @readonly
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
class KalturaTagService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Tag Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Action goes over all tags with instanceCount==0 and checks whether they need to be removed from the DB.
     * Returns number of removed tags.
     * @return int - number of removed tags.
     */
    public function deletePending() {
        $kparams = array();
        $this->client->queueServiceActionCall("tagsearch_tag", "deletePending", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "integer");
        return $resultobject;
    }

    /**
     * Index category entry tags.
     * @param int $categoryid - category id.
     * @param string $pctodecrement - PC to decrement.
     * @param string $pctoincrement - PC to increment.
     */
    public function indexCategoryEntryTags($categoryid, $pctodecrement, $pctoincrement) {
        $kparams = array();
        $this->client->addParam($kparams, "categoryId", $categoryid);
        $this->client->addParam($kparams, "pcToDecrement", $pctodecrement);
        $this->client->addParam($kparams, "pcToIncrement", $pctoincrement);
        $this->client->queueServiceActionCall("tagsearch_tag", "indexCategoryEntryTags", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Search tags.
     * @param KalturaTagFilter $tagfilter - tag filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaTagListResponse - list object.
     */
    public function search(KalturaTagFilter $tagfilter, KalturaFilterPager $pager = null) {
        $kparams = array();
        $this->client->addParam($kparams, "tagFilter", $tagfilter->toParams());
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("tagsearch_tag", "search", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaTagListResponse");
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
class KalturaTagSearchClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaTagService
     */
    public $tag = null;

    /**
     * Constructor of Kaltura Tag Search Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->tag = new KalturaTagService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaTagSearchClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaTagSearchClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('tag' => $this->tag);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'tagSearch';
    }
}
