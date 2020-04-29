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
require_once(dirname(__FILE__) . "/KalturaCuePointClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnswerCuePointOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by start time */
    const START_TIME_ASC = "+startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_ASC = "+triggeredAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by start time */
    const START_TIME_DESC = "-startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_DESC = "-triggeredAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuestionCuePointOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
    /** @var order by start time */
    const START_TIME_ASC = "+startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_ASC = "+triggeredAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by partner */
    const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
    /** @var order by start time */
    const START_TIME_DESC = "-startTime";
    /** @var order by triggered */
    const TRIGGERED_AT_DESC = "-triggeredAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaOptionalAnswer extends KalturaObjectBase {
    /**
     *
     * @var string
     */
    public $key = null;

    /**
     *
     * @var string
     */
    public $text = null;

    /**
     *
     * @var float
     */
    public $weight = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isCorrect = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuiz extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $version = null;

    /**
     * Array of key value ui related objects
     *
     * @var array of KalturaKeyValue
     */
    public $uiAttributes;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $showResultOnAnswer = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $showCorrectKeyOnAnswer = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $allowAnswerUpdate = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $showCorrectAfterSubmission = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $allowDownload = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $showGradeAfterSubmission = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnswerCuePoint extends KalturaCuePoint {
    /**
     *
     * @var string
     */
    public $parentId = null;

    /**
     *
     * @var string
     */
    public $quizUserEntryId = null;

    /**
     *
     * @var string
     */
    public $answerKey = null;

    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isCorrect = null;

    /**
     * Array of string
     *
     * @var array of KalturaString
     */
    public $correctAnswerKeys;

    /**
     *
     * @var string
     */
    public $explanation = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuestionCuePoint extends KalturaCuePoint {
    /**
     * Array of key value answerKey->optionAnswer objects
     *
     * @var array of KalturaOptionalAnswer
     */
    public $optionalAnswers;

    /**
     *
     * @var string
     */
    public $hint = null;

    /**
     *
     * @var string
     */
    public $question = null;

    /**
     *
     * @var string
     */
    public $explanation = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizAdvancedFilter extends KalturaSearchItem {
    /**
     *
     * @var KalturaNullableBoolean
     */
    public $isQuiz = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaQuiz
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
class KalturaQuizFilter extends KalturaRelatedFilter {
    /**
     * This filter should be in use for retrieving only a specific quiz entry (identified by its entryId).
     *
     * @var string
     */
    public $entryIdEqual = null;

    /**
     * This filter should be in use for retrieving few specific quiz entries
     * (string should include comma separated list of entryId strings).
     *
     * @var string
     */
    public $entryIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaAnswerCuePointBaseFilter extends KalturaCuePointFilter {
    /**
     *
     * @var string
     */
    public $parentIdEqual = null;

    /**
     *
     * @var string
     */
    public $parentIdIn = null;

    /**
     *
     * @var string
     */
    public $quizUserEntryIdEqual = null;

    /**
     *
     * @var string
     */
    public $quizUserEntryIdIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaQuestionCuePointBaseFilter extends KalturaCuePointFilter {
    /**
     *
     * @var string
     */
    public $questionLike = null;

    /**
     *
     * @var string
     */
    public $questionMultiLikeOr = null;

    /**
     *
     * @var string
     */
    public $questionMultiLikeAnd = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAnswerCuePointFilter extends KalturaAnswerCuePointBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuestionCuePointFilter extends KalturaQuestionCuePointBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizUserEntryFilter extends KalturaQuizUserEntryBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaQuizService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Quiz Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows to add a quiz to an entry.
     * @param string $entryid - id of media entry.
     * @param KalturaQuiz $quiz - quiz object to add.
     * @return KalturaQuiz - quiz object after added.
     */
    public function add($entryid, KalturaQuiz $quiz) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "quiz", $quiz->toParams());
        $this->client->queueServiceActionCall("quiz_quiz", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaQuiz");
        return $resultobject;
    }

    /**
     * Allows to get a quiz.
     * @param string $entryid - id of media entry.
     * @return KalturaQuiz - quiz object.
     */
    public function get($entryid) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->queueServiceActionCall("quiz_quiz", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaQuiz");
        return $resultobject;
    }

    /**
     * Sends a with an api request for pdf from quiz object
     * @param string $entryid - id of media entry.
     * @param int $quizoutputtype  - quiz output type.
     * @return string - url.
     */
    public function getUrl($entryid, $quizoutputtype) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "quizOutputType", $quizoutputtype);
        $this->client->queueServiceActionCall("quiz_quiz", "getUrl", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "string");
        return $resultobject;
    }

    /**
     * List quiz objects by filter and pager.
     * @param KalturaQuizFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaQuizListResponse - list object.
     */
    public function listAction(KalturaQuizFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("quiz_quiz", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaQuizListResponse");
        return $resultobject;
    }

    /**
     * Creates a pdf from quiz object
     * The Output type defines the file format in which the quiz will be generated
     * Currently only PDF files are supported
     * @param string $entryid - id of media entry.
     * @param int $quizoutputtype - quiz output type.
     * @return file
     */
    public function serve($entryid, $quizoutputtype) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "quizOutputType", $quizoutputtype);
        $this->client->queueServiceActionCall("quiz_quiz", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * Allows to update a quiz.
     * @param string $entryid - id of media entry.
     * @param KalturaQuiz $quiz - quiz object.
     * @return KalturaQuiz - quiz object.
     */
    public function update($entryid, KalturaQuiz $quiz) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "quiz", $quiz->toParams());
        $this->client->queueServiceActionCall("quiz_quiz", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaQuiz");
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
class KalturaQuizClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaQuizService
     */
    public $quiz = null;

    /**
     * Constructor of Kaltura Quiz Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->quiz = new KalturaQuizService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaQuizClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaQuizClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('quiz' => $this->quiz);
        return $services;
    }

    /**
     * Get class name.
     * @return string- class name.
     */
    public function getName() {
        return 'quiz';
    }
}
