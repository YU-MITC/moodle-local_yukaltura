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

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLikeOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLike extends KalturaObjectBase {
    /**
     * The id of the entry that the like belongs to
     *
     * @var string
     */
    public $entryId = null;

    /**
     * The id of user that the like belongs to
     *
     * @var string
     */
    public $userId = null;

    /**
     * The date of the like's creation
     *
     * @var int
     */
    public $createdAt = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLikeListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaLike
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
abstract class KalturaLikeBaseFilter extends KalturaRelatedFilter {
    /**
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     *
     * @var string
     */
    public $entryIdIn = null;

    /**
     *
     * @var string
     */
    public $userIdEqual = null;

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
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLikeFilter extends KalturaLikeBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaLikeService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Like Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Check whether like exists.
     * @param string $entryid - id of media entry.
     * @param string $userid - user id.
     * @return bool - if 'like' exists, return true.
     */
    public function checkLikeExists($entryid, $userid = null) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("like_like", "checkLikeExists", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * Like media.
     * @param string $entryid - id of media entry.
     * @return bool - true of false.
     */
    public function like($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("like_like", "like", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
        return $resultobject;
    }

    /**
     * List up kaltura like object.
     * @param KalturaLikeFilter $filter - instance of KalturaLikeFilter.
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaLikeListResponse - instance of KalturaLikeListResponse.
     */
    public function listAction(KalturaLikeFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("like_like", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaLikeListResponse");
        return $resultobject;
    }

    /**
     * Unlike media.
     * @param string $entryid - id of media entry.
     * @return bool - true or false.
     */
    public function unlike($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("like_like", "unlike", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $resultobject = (bool) $resultobject;
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
class KalturaLikeClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaLikeService
     */
    public $like = null;

    /**
     * Constructor of Kaltura Like Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->like = new KalturaLikeService($client);
    }

    /**
     * Get instance of this plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaLikeClientPlugin - instance of KalturaLikeClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaLikeClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('like' => $this->like);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'like';
    }
}
