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

class KalturaShortLinkOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
    const EXPIRES_AT_ASC = "+expiresAt";
    const EXPIRES_AT_DESC = "-expiresAt";
}

class KalturaShortLinkStatus
{
    const DISABLED = 1;
    const ENABLED = 2;
    const DELETED = 3;
}

abstract class KalturaShortLinkBaseFilter extends KalturaFilter
{
    /**
     *
     *
     * @var int
     */
    public $idEqual = null;

    /**
     *
     *
     * @var string
     */
    public $idIn = null;

    /**
     *
     *
     * @var int
     */
    public $createdAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $createdAtLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $updatedAtLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $expiresAtGreaterThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $expiresAtLessThanOrEqual = null;

    /**
     *
     *
     * @var int
     */
    public $partnerIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $partnerIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $userIdEqual = null;

    /**
     *
     *
     * @var string
     */
    public $userIdIn = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameEqual = null;

    /**
     *
     *
     * @var string
     */
    public $systemNameIn = null;

    /**
     *
     *
     * @var KalturaShortLinkStatus
     */
    public $statusEqual = null;

    /**
     *
     *
     * @var string
     */
    public $statusIn = null;


}

class KalturaShortLinkFilter extends KalturaShortLinkBaseFilter
{

}

class KalturaShortLink extends KalturaObjectBase
{
    /**
     *
     *
     * @var int
     * @readonly
     */
    public $id = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $createdAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $updatedAt = null;

    /**
     *
     *
     * @var int
     */
    public $expiresAt = null;

    /**
     *
     *
     * @var int
     * @readonly
     */
    public $partnerId = null;

    /**
     *
     *
     * @var string
     */
    public $userId = null;

    /**
     *
     *
     * @var string
     */
    public $name = null;

    /**
     *
     *
     * @var string
     */
    public $systemName = null;

    /**
     *
     *
     * @var string
     */
    public $fullUrl = null;

    /**
     *
     *
     * @var KalturaShortLinkStatus
     */
    public $status = null;


}

class KalturaShortLinkListResponse extends KalturaObjectBase
{
    /**
     *
     *
     * @var array of KalturaShortLink
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


class KalturaShortLinkService extends KalturaServiceBase
{
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

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

    public function gotoAction($id, $proxy = false) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->addParam($kparams, "proxy", $proxy);
        $this->client->queueServiceActionCall('shortlink_shortlink', 'goto', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}
class KalturaShortLinkClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaShortLinkClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaShortLinkService
     */
    public $shortLink = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->shortLink = new KalturaShortLinkService($client);
    }

    /**
     * @return KalturaShortLinkClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaShortLinkClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('shortLink' => $this->shortLink);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'shortLink';
    }
}