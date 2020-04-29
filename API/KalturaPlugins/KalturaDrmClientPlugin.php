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
class KalturaDrmLicenseExpirationPolicy extends KalturaEnumBase {
    /** @var fixed duration */
    const FIXED_DURATION = 1;
    /** @var entry scheduling end */
    const ENTRY_SCHEDULING_END = 2;
    /** @var unlimited */
    const UNLIMITED = 3;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPolicyStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var deleted */
    const DELETED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmProfileStatus extends KalturaEnumBase {
    /** @var active */
    const ACTIVE = 1;
    /** @var deleted */
    const DELETED = 2;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmLicenseScenario extends KalturaEnumBase {
    /** @var protection */
    const PROTECTION = "playReady.PROTECTION";
    /** @var purchase */
    const PURCHASE = "playReady.PURCHASE";
    /** @var rental */
    const RENTAL = "playReady.RENTAL";
    /** @var subscription */
    const SUBSCRIPTION = "playReady.SUBSCRIPTION";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmLicenseType extends KalturaEnumBase {
    /** @var no persistent */
    const NON_PERSISTENT = "playReady.NON_PERSISTENT";
    /** @var persistent */
    const PERSISTENT = "playReady.PERSISTENT";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPolicyOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmProfileOrderBy extends KalturaEnumBase {
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
class KalturaDrmProviderType extends KalturaEnumBase {
    /** @var fiarplay */
    const FAIRPLAY = "fairplay.FAIRPLAY";
    /** @var play ready */
    const PLAY_READY = "playReady.PLAY_READY";
    /** @var widevine */
    const WIDEVINE = "widevine.WIDEVINE";
    /** @var cenc */
    const CENC = "1";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmLicenseAccessDetails extends KalturaObjectBase {
    /**
     * Drm policy name
     *
     * @var string
     */
    public $policy = null;

    /**
     * movie duration in seconds
     *
     * @var int
     */
    public $duration = null;

    /**
     * playback window in seconds
     *
     * @var int
     */
    public $absolute_duration = null;

    /**
     *
     * @var array of KalturaKeyValue
     */
    public $licenseParams;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPolicy extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

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
    public $description = null;

    /**
     *
     * @var KalturaDrmProviderType
     */
    public $provider = null;

    /**
     *
     * @var KalturaDrmPolicyStatus
     */
    public $status = null;

    /**
     *
     * @var KalturaDrmLicenseScenario
     */
    public $scenario = null;

    /**
     *
     * @var KalturaDrmLicenseType
     */
    public $licenseType = null;

    /**
     *
     * @var KalturaDrmLicenseExpirationPolicy
     */
    public $licenseExpirationPolicy = null;

    /**
     * Duration in days the license is effective
     *
     * @var int
     */
    public $duration = null;

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
     * @var array of KalturaKeyValue
     */
    public $licenseParams;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmProfile extends KalturaObjectBase {
    /**
     *
     * @var int
     */
    public $id = null;

    /**
     *
     * @var int
     */
    public $partnerId = null;

    /**
     *
     * @var string
     */
    public $name = null;

    /**
     *
     * @var string
     */
    public $description = null;

    /**
     *
     * @var KalturaDrmProviderType
     */
    public $provider = null;

    /**
     *
     * @var KalturaDrmProfileStatus
     */
    public $status = null;

    /**
     *
     * @var string
     */
    public $licenseServerUrl = null;

    /**
     *
     * @var string
     */
    public $defaultPolicy = null;

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
     * @var string
     */
    public $signingKey = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaAccessControlDrmPolicyAction extends KalturaRuleAction {
    /**
     * Drm policy id
     *
     * @var int
     */
    public $policyId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaDrmPolicyBaseFilter extends KalturaFilter {
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
    public $nameLike = null;

    /**
     *
     * @var string
     */
    public $systemNameLike = null;

    /**
     *
     * @var KalturaDrmProviderType
     */
    public $providerEqual = null;

    /**
     *
     * @var string
     */
    public $providerIn = null;

    /**
     *
     * @var KalturaDrmPolicyStatus
     */
    public $statusEqual = null;

    /**
     *
     * @var string
     */
    public $statusIn = null;

    /**
     *
     * @var KalturaDrmLicenseScenario
     */
    public $scenarioEqual = null;

    /**
     *
     * @var string
     */
    public $scenarioIn = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPolicyListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDrmPolicy
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
abstract class KalturaDrmProfileBaseFilter extends KalturaFilter {
    /**
     *
     * @var int
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
    public $nameLike = null;

    /**
     *
     * @var KalturaDrmProviderType
     */
    public $providerEqual = null;

    /**
     *
     * @var string
     */
    public $providerIn = null;

    /**
     *
     * @var KalturaDrmProfileStatus
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
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmProfileListResponse extends KalturaListResponse {
    /**
     *
     * @var array of KalturaDrmProfile
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
class KalturaDrmPolicyFilter extends KalturaDrmPolicyBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmProfileFilter extends KalturaDrmProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaDrmPolicyService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Drm Policy Service
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new DrmPolicy object
     * @param KalturaDrmPolicy $drmpolicy - object to add.
     * @return KalturaDrmPolicy - object after added.
     */
    public function add(KalturaDrmPolicy $drmpolicy) {
        $kparams = array();
        $this->client->addParam($kparams, "drmPolicy", $drmpolicy->toParams());
        $this->client->queueServiceActionCall("drm_drmpolicy", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmPolicy");
        return $resultobject;
    }

    /**
     * Mark the KalturaDrmPolicy object as deleted
     * @param int $drmpolicyid - id of DRM policy
     * @return KalturaDrmPolicy - object after deleted.
     */
    public function delete($drmpolicyid) {
        $kparams = array();
        $this->client->addParam($kparams, "drmPolicyId", $drmpolicyid);
        $this->client->queueServiceActionCall("drm_drmpolicy", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmPolicy");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaDrmPolicy object by ID
     * @param int $drmpolicyid - id of DRM policy.
     * @return KalturaDrmPolicy - object.
     */
    public function get($drmpolicyid) {
        $kparams = array();
        $this->client->addParam($kparams, "drmPolicyId", $drmpolicyid);
        $this->client->queueServiceActionCall("drm_drmpolicy", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmPolicy");
        return $resultobject;
    }

    /**
     * List KalturaDrmPolicy objects
     * @param KalturaDrmPolicyFilter $filter - filter object.
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaDrmPolicyListResponse - list object.
     */
    public function listAction(KalturaDrmPolicyFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("drm_drmpolicy", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmPolicyListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaDrmPolicy object
     * @param int $drmpolicyid - id of DRM policy.
     * @param KalturaDrmPolicy $drmpolicy - object to updated.
     * @return KalturaDrmPolicy - object after updated.
     */
    public function update($drmpolicyid, KalturaDrmPolicy $drmpolicy) {
        $kparams = array();
        $this->client->addParam($kparams, "drmPolicyId", $drmpolicyid);
        $this->client->addParam($kparams, "drmPolicy", $drmpolicy->toParams());
        $this->client->queueServiceActionCall("drm_drmpolicy", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmPolicy");
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
class KalturaDrmProfileService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Drm Profile Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Allows you to add a new DrmProfile object
     * @param KalturaDrmProfile $drmprofile - object to add.
     * @return KalturaDrmProfile - object after added.
     */
    public function add(KalturaDrmProfile $drmprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "drmProfile", $drmprofile->toParams());
        $this->client->queueServiceActionCall("drm_drmprofile", "add", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfile");
        return $resultobject;
    }

    /**
     * Mark the KalturaDrmProfile object as deleted
     * @param int $drmprofileid - id of Kaltura DRM Profile.
     * @return KalturaDrmProfile - object after deleted.
     */
    public function delete($drmprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "drmProfileId", $drmprofileid);
        $this->client->queueServiceActionCall("drm_drmprofile", "delete", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfile");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaDrmProfile object by ID
     * @param int $drmprofileid - id of Kaltura Drm Profile.
     * @return KalturaDrmProfile - object.
     */
    public function get($drmprofileid) {
        $kparams = array();
        $this->client->addParam($kparams, "drmProfileId", $drmprofileid);
        $this->client->queueServiceActionCall("drm_drmprofile", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfile");
        return $resultobject;
    }

    /**
     * Retrieve a KalturaDrmProfile object by provider, if no specific profile defined return default profile
     * @param string $provider - provider name.
     * @return KalturaDrmProfile - object.
     */
    public function getByProvider($provider) {
        $kparams = array();
        $this->client->addParam($kparams, "provider", $provider);
        $this->client->queueServiceActionCall("drm_drmprofile", "getByProvider", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfile");
        return $resultobject;
    }

    /**
     * List KalturaDrmProfile objects
     * @param KalturaDrmProfileFilter $filter - filter object .
     * @param KalturaFilterPager $pager - pager object.
     * @return KalturaDrmProfileListResponse - list object.
     */
    public function listAction(KalturaDrmProfileFilter $filter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($filter !== null) {
            $this->client->addParam($kparams, "filter", $filter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("drm_drmprofile", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfileListResponse");
        return $resultobject;
    }

    /**
     * Update an existing KalturaDrmProfile object
     * @param int $drmprofileid - id of kaltura drm profile.
     * @param KalturaDrmProfile $drmprofile - object to update.
     * @return KalturaDrmProfile - object after updated.
     */
    public function update($drmprofileid, KalturaDrmProfile $drmprofile) {
        $kparams = array();
        $this->client->addParam($kparams, "drmProfileId", $drmprofileid);
        $this->client->addParam($kparams, "drmProfile", $drmprofile->toParams());
        $this->client->queueServiceActionCall("drm_drmprofile", "update", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmProfile");
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
class KalturaDrmLicenseAccessService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Drm License Access Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * GetAccessAction
     * @param string $entryid - id of media entry.
     * @param string $flavorids - id of flavor.
     * @param string $referrer - referrer.
     * @return KalturaDrmLicenseAccessDetails - object.
     */
    public function getAccess($entryid, $flavorids, $referrer) {
        $kparams = array();
        $this->client->addParam($kparams, "entryId", $entryid);
        $this->client->addParam($kparams, "flavorIds", $flavorids);
        $this->client->addParam($kparams, "referrer", $referrer);
        $this->client->queueServiceActionCall("drm_drmlicenseaccess", "getAccess", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaDrmLicenseAccessDetails");
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
class KalturaDrmClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaDrmPolicyService
     */
    public $drmPolicy = null;

    /**
     * @var KalturaDrmProfileService
     */
    public $drmProfile = null;

    /**
     * @var KalturaDrmLicenseAccessService
     */
    public $drmLicenseAccess = null;

    /**
     * Constructor of Kaltura Drm Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->drmPolicy = new KalturaDrmPolicyService($client);
        $this->drmProfile = new KalturaDrmProfileService($client);
        $this->drmLicenseAccess = new KalturaDrmLicenseAccessService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaDrmClientPlugin - instance of KalturaDrmClientPlugin.
     */
    public static function get(KalturaClient $client) {
        return new KalturaDrmClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array(
            'drmPolicy' => $this->drmPolicy,
            'drmProfile' => $this->drmProfile,
            'drmLicenseAccess' => $this->drmLicenseAccess,
        );
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'drm';
    }
}
