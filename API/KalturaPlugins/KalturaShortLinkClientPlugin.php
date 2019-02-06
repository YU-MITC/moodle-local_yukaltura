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
class KalturaShortLinkStatus extends KalturaEnumBase {
    /** @var disabled */
    const DISABLED = 1;
    /** @var enabled */
    const ENABLED = 2;
    /** @var deleted */
    const DELETED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaShortLinkOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by expires */
    const EXPIRES_AT_ASC = "+expiresAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by expires */
    const EXPIRES_AT_DESC = "-expiresAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaShortLink extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $id = null;

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
     * @var int
     */
    public $expiresAt = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $userId = null;

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
    public $fullUrl = null;

    /**
     *
     * @var KalturaShortLinkStatus
     */
    public $status = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaShortLinkBaseFilter extends KalturaFilter {
    /**
     *
     * @var string
     */
    public $idEqual = null;

    /**
     *
     * @var string
     */
    public $idIn = null;

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
     * @var int
     */
    public $expiresAtGreaterThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $expiresAtLessThanOrEqual = null;

    /**
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     * @var string
     */
    public $userIdIn = null;

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
     * @var KalturaShortLinkStatus
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaShortLinkListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaShortLink
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
class KalturaShortLinkFilter extends KalturaShortLinkBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaShortLinkService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Short Link Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a short link object
     * @param KalturaShortLink $shortlink - short link object to add.
     * @return KalturaShortLink - short link object after added.
     */
    public function add(KalturaShortLink $shortlink) {
        $kparams = array();
        $this->client->addParam($kparams, "shortLink", $shortlink->toParams());
        $this->client->queueServiceActionCall("shortlink_shortlink", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaShortLink");
        return $resultobject;
    }

    /**
     * Mark the short link as deleted
     * @param string $id - id of short link.
     * @return KalturaShortLink - short link object after deleted.
     */
    public function delete($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("shortlink_shortlink", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaShortLink");
        return $resultobject;
    }

    /**
     * Retrieve an short link object by id
     * @param string $id - id of short link.
     * @return KalturaShortLink - searched object.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("shortlink_shortlink", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaShortLink");
        return $resultobject;
    }

    /**
     * Serves short link.
     * @param string $id - id of shor link.
     * @param bool $proxy - Proxy the response instead of redirect
     * @return file - file object.
     */
    public function gotoAction($id, $proxy = false) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "proxy", $proxy);
        $this->client->queueServiceActionCall("shortlink_shortlink", "goto", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * List short link objects by filter and pager
     * @param KalturaShortLinkFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaShortLinkListResponse - list object.
     */
    public function listAction(KalturaShortLinkFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("shortlink_shortlink", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaShortLinkListResponse");
        return $resultobject;
    }

    /**
     * Update exisitng short link
     * @param string $id - id of short link.
     * @param KalturaShortLink $shortlink - short link object to update.
     * @return KalturaShortLink - short link object after updated.
     */
    public function update($id, KalturaShortLink $shortlink) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "shortLink", $shortlink->toParams());
        $this->client->queueServiceActionCall("shortlink_shortlink", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaShortLink");
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
class KalturaShortLinkClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaShortLinkService
     */
    public $shortLink = null;

    /**
     * Constructor of Kaltura Short Link Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->shortLink = new KalturaShortLinkService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaShortLinkClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaShortLinkClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('shortLink' => $this->shortLink);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'shortLink';
    }
}

