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
require_once(dirname(__FILE__) . "/KalturaDrmClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyAnalogVideoOPL extends KalturaEnumBase {
    /** @var min 100 */
    const MIN_100 = 100;
    /** @var min 150 */
    const MIN_150 = 150;
    /** @var min 200 */
    const MIN_200 = 200;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyCompressedDigitalVideoOPL extends KalturaEnumBase {
    /** @var min 400 */
    const MIN_400 = 400;
    /** @var min 500 */
    const MIN_500 = 500;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyDigitalAudioOPL extends KalturaEnumBase {
    /** @var min 100 */
    const MIN_100 = 100;
    /** @var min 150 */
    const MIN_150 = 150;
    /** @var min 200 */
    const MIN_200 = 200;
    /** @var min 250 */
    const MIN_250 = 250;
    /** @var min 300 */
    const MIN_300 = 300;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyLicenseRemovalPolicy extends KalturaEnumBase {
    /** @var fixed from expiration */
    const FIXED_FROM_EXPIRATION = 1;
    /** @var entry scheduling end */
    const ENTRY_SCHEDULING_END = 2;
    /** @var none */
    const NONE = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyMinimumLicenseSecurityLevel extends KalturaEnumBase {
    /** @var non commercial quality */
    const NON_COMMERCIAL_QUALITY = 150;
    /** @var commercial quality */
    const COMMERCIAL_QUALITY = 2000;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyUncompressedDigitalVideoOPL extends KalturaEnumBase {
    /** @var min 100 */
    const MIN_100 = 100;
    /** @var min 250 */
    const MIN_250 = 250;
    /** @var min 270 */
    const MIN_270 = 270;
    /** @var min 300 */
    const MIN_300 = 300;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyAnalogVideoOPId extends KalturaEnumBase {
    /** @var explicit analog tv */
    const EXPLICIT_ANALOG_TV = "2098DE8D-7DDD-4BAB-96C6-32EBB6FABEA3";
    /** @var best effor explicit analog tv */
    const BEST_EFFORT_EXPLICIT_ANALOG_TV = "225CD36F-F132-49EF-BA8C-C91EA28E4369";
    /** @var image constraint video */
    const IMAGE_CONSTRAINT_VIDEO = "811C5110-46C8-4C6E-8163-C0482A15D47E";
    /** @var agc and color stripe */
    const AGC_AND_COLOR_STRIPE = "C3FD11C6-F8B7-4D20-B008-1DB17D61F2DA";
    /** @var image constraint monitor */
    const IMAGE_CONSTRAINT_MONITOR = "D783A191-E083-4BAF-B2DA-E69F910B3772";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyCopyEnablerType extends KalturaEnumBase {
    /** @var css */
    const CSS = "3CAF2814-A7AB-467C-B4DF-54ACC56C66DC";
    /** @var prinetr */
    const PRINTER = "3CF2E054-F4D5-46cd-85A6-FCD152AD5FBE";
    /** @var device */
    const DEVICE = "6848955D-516B-4EB0-90E8-8F6D5A77B85F";
    /** @var clipboard */
    const CLIPBOARD = "6E76C588-C3A9-47ea-A875-546D5209FF38";
    /** @var sdc */
    const SDC = "79F78A0D-0B69-401e-8A90-8BEF30BCE192";
    /** @var sdc preview */
    const SDC_PREVIEW = "81BD9AD4-A720-4ea1-B510-5D4E6FFB6A4D";
    /** @var aacs */
    const AACS = "C3CF56E0-7FF2-4491-809F-53E21D3ABF07";
    /** @var helix */
    const HELIX = "CCB0B4E3-8B46-409e-A998-82556E3F5AF4";
    /** @var cprm */
    const CPRM = "CDD801AD-A577-48DB-950E-46D5F1592FAE";
    /** @var pc */
    const PC = "CE480EDE-516B-40B3-90E1-D6CFC47630C5";
    /** @var sdc limited */
    const SDC_LIMITED = "E6785609-64CC-4bfa-B82D-6B619733B746";
    /** @var orange book cd */
    const ORANGE_BOOK_CD = "EC930B7D-1F2D-4682-A38B-8AB977721D0D";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyDigitalAudioOPId extends KalturaEnumBase {
    /** @var scms */
    const SCMS = "6D5CFA59-C250-4426-930E-FAC72C8FCFA6";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPlayEnablerType extends KalturaEnumBase {
    /** @var helix */
    const HELIX = "002F9772-38A0-43E5-9F79-0F6361DCC62A";
    /** @var hdcp wivu */
    const HDCP_WIVU = "1B4542E3-B5CF-4C99-B3BA-829AF46C92F8";
    /** @var airplay */
    const AIRPLAY = "5ABF0F0D-DC29-4B82-9982-FD8E57525BFC";
    /** @var unknown */
    const UNKNOWN = "786627D8-C2A6-44BE-8F88-08AE255B01A";
    /** @var hdcp miracast */
    const HDCP_MIRACAST = "A340C256-0941-4D4C-AD1D-0B6735C0CB24";
    /** @var unknown */
    const UNKNOWN_520 = "B621D91F-EDCC-4035-8D4B-DC71760D43E9";
    /** @var dtcp */
    const DTCP = "D685030B-0F4F-43A6-BBAD-356F1EA0049A";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPolicyOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyProfileOrderBy extends KalturaEnumBase {
    /** @var order by id */
    const ID_ASC = "+id";
    /** @var order by name */
    const NAME_ASC = "+name";
    /** @var order by id */
    const ID_DESC = "-id";
    /** @var order by name */
    const NAME_DESC = "-name";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyAnalogVideoOPIdHolder extends KalturaObjectBase {
    /**
     * The type of the play enabler
     *
     * @var KalturaPlayReadyAnalogVideoOPId
     */
    public $type = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyContentKey extends KalturaObjectBase {
    /**
     * Guid - key id of the specific content
     *
     * @var string
     */
    public $keyId = null;

    /**
     * License content key 64 bit encoded
     *
     * @var string
     */
    public $contentKey = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyCopyEnablerHolder extends KalturaObjectBase {
    /**
     * The type of the copy enabler
     *
     * @var KalturaPlayReadyCopyEnablerType
     */
    public $type = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyDigitalAudioOPIdHolder extends KalturaObjectBase {
    /**
     * The type of the play enabler
     *
     * @var KalturaPlayReadyDigitalAudioOPId
     */
    public $type = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlayReadyRight extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPolicy extends KalturaDrmPolicy {
    /**
     *
     * @var int
     */
    public $gracePeriod = null;

    /**
     *
     * @var KalturaPlayReadyLicenseRemovalPolicy
     */
    public $licenseRemovalPolicy = null;

    /**
     *
     * @var int
     */
    public $licenseRemovalDuration = null;

    /**
     *
     * @var KalturaPlayReadyMinimumLicenseSecurityLevel
     */
    public $minSecurityLevel = null;

    /**
     *
     * @var array of KalturaPlayReadyRight
     */
    public $rights;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyLicenseDetails extends KalturaObjectBase {
    /**
     * PlayReady policy object
     *
     * @var KalturaPlayReadyPolicy
     */
    public $policy;

    /**
     * License begin date
     *
     * @var int
     */
    public $beginDate = null;

    /**
     * License expiration date
     *
     * @var int
     */
    public $expirationDate = null;

    /**
     * License removal date
     *
     * @var int
     */
    public $removalDate = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPlayEnablerHolder extends KalturaObjectBase {
    /**
     * The type of the play enabler
     *
     * @var KalturaPlayReadyPlayEnablerType
     */
    public $type = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyCopyRight extends KalturaPlayReadyRight {
    /**
     *
     * @var int
     */
    public $copyCount = null;

    /**
     *
     * @var array of KalturaPlayReadyCopyEnablerHolder
     */
    public $copyEnablers;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPlayRight extends KalturaPlayReadyRight {
    /**
     *
     * @var KalturaPlayReadyAnalogVideoOPL
     */
    public $analogVideoOPL = null;

    /**
     *
     * @var array of KalturaPlayReadyAnalogVideoOPIdHolder
     */
    public $analogVideoOutputProtectionList;

    /**
     *
     * @var KalturaPlayReadyDigitalAudioOPL
     */
    public $compressedDigitalAudioOPL = null;

    /**
     *
     * @var KalturaPlayReadyCompressedDigitalVideoOPL
     */
    public $compressedDigitalVideoOPL = null;

    /**
     *
     * @var array of KalturaPlayReadyDigitalAudioOPIdHolder
     */
    public $digitalAudioOutputProtectionList;

    /**
     *
     * @var KalturaPlayReadyDigitalAudioOPL
     */
    public $uncompressedDigitalAudioOPL = null;

    /**
     *
     * @var KalturaPlayReadyUncompressedDigitalVideoOPL
     */
    public $uncompressedDigitalVideoOPL = null;

    /**
     *
     * @var int
     */
    public $firstPlayExpiration = null;

    /**
     *
     * @var array of KalturaPlayReadyPlayEnablerHolder
     */
    public $playEnablers;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyProfile extends KalturaDrmProfile {
    /**
     *
     * @var string
     */
    public $keySeed = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlayReadyPolicyBaseFilter extends KalturaDrmPolicyFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaPlayReadyProfileBaseFilter extends KalturaDrmProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyPolicyFilter extends KalturaPlayReadyPolicyBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyProfileFilter extends KalturaPlayReadyProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaPlayReadyDrmService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Play Ready Drm Sservice.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Generate key id and content key for PlayReady encryption
     * @return KalturaPlayReadyContentKey - object.
     */
    public function generateKey() {
        $kparams = array();
        $this->client->queueServiceActionCall("playready_playreadydrm", "generateKey", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlayReadyContentKey");
        return $resultobject;
    }

    /**
     * Get content keys for input key ids
     * @param string $keyids - comma separated key id's
     * @return array - list of id.
     */
    public function getContentKeys($keyids) {
        $kparams = array();
        $this->client->addParam($kparams, "keyIds", $keyids);
        $this->client->queueServiceActionCall("playready_playreadydrm", "getContentKeys", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "array");
        return $resultobject;
    }

    /**
     * Get content key and key id for the given entry
     * @param string $entryid - id of media entry.
     * @param bool $createifmissing - Create entry content key if there exists the entry.
     * @return KalturaPlayReadyContentKey
     */
    public function getEntryContentKey($entryid, $createifmissing = false) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "createIfMissing", $createifmissing);
        $this->client->queueServiceActionCall("playready_playreadydrm", "getEntryContentKey", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlayReadyContentKey");
        return $resultobject;
    }

    /**
     * Get Play Ready policy and dates for license creation
     * @param string $keyid - id of content key.
     * @param string $deviceid - id of device id.
     * @param int $devicetype - device type.
     * @param string $entryid - id of media entry.
     * @param string $referrer - 64base encoded
     * @return KalturaPlayReadyLicenseDetails - Play Ready policy and dates.
     */
    public function getLicenseDetails($keyid, $deviceid, $devicetype, $entryid = null, $referrer = null) {
        $kparams = array();
        $this->client->addParam($kparams, "keyId", $keyid);
        $this->client->addParam($kparams, "deviceId", $deviceid);
        $this->client->addParam($kparams, "deviceType", $devicetype);
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "referrer", $referrer);
        $this->client->queueServiceActionCall("playready_playreadydrm", "getLicenseDetails", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaPlayReadyLicenseDetails");
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
class KalturaPlayReadyClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaPlayReadyDrmService
     */
    public $playReadyDrm = null;

    /**
     * Constructor of Kaltura Play Ready Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->playReadyDrm = new KalturaPlayReadyDrmService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient
     * @return KalturaPlayReadyClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaPlayReadyClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('playReadyDrm' => $this->playReadyDrm);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'playReady';
    }
}
