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
class KalturaPollService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Poll Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Add Action.
     * @param string $polltype - polling type.
     * @return string - added status.
     */
    public function add($polltype = "SINGLE_ANONYMOUS") {
        $kparams = array();
        $this->client->addParam($kparams, "pollType", $polltype);
        $this->client->queueServiceActionCall("poll_poll", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Vote Action.
     * @param string $pollid - polling type.
     * @param string $userid - user id.
     * @return string - added status.
     */
    public function getVote($pollid, $userid) {
        $kparams = array();
        $this->client->addParam($kparams, "pollId", $pollid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->queueServiceActionCall("poll_poll", "getVote", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Get Votes Action.
     * @param string $pollid - polling id
     * @param string $answerids - answer IDs.
     * @return string - voted status.
     */
    public function getVotes($pollid, $answerids) {
        $kparams = array();
        $this->client->addParam($kparams, "pollId", $pollid);
        $this->client->addParam($kparams, "answerIds", $answerids);
        $this->client->queueServiceActionCall("poll_poll", "getVotes", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * Get resetVotes Action
     * @param string $pollid - polling id.
     */
    public function resetVotes($pollid) {
        $kparams = array();
        $this->client->addParam($kparams, "pollId", $pollid);
        $this->client->queueServiceActionCall("poll_poll", "resetVotes", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
    }

    /**
     * Vote Action
     * @param string $pollid - polling id.
     * @param string $userid - user id.
     * @param string $answerids - id of answers.
     * @return string - vote status.
     */
    public function vote($pollid, $userid, $answerids) {
        $kparams = array();
        $this->client->addParam($kparams, "pollId", $pollid);
        $this->client->addParam($kparams, "userId", $userid);
        $this->client->addParam($kparams, "answerIds", $answerids);
        $this->client->queueServiceActionCall("poll_poll", "vote", $kparams);
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
class KalturaPollClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaPollService
     */
    public $poll = null;

    /**
     * Constructor of Kaltura Poll Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->poll = new KalturaPollService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaPollClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaPollClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('poll' => $this->poll);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'poll';
    }
}
