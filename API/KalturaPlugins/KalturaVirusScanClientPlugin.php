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

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");

class KalturaVirusFoundAction
{
    const NONE = 0;
    const DELETE = 1;
    const CLEAN_NONE = 2;
    const CLEAN_DELETE = 3;
}

class KalturaVirusScanEngineType
{
    const SYMANTEC_SCAN_ENGINE = "symantecScanEngine.SymantecScanEngine";
    const SYMANTEC_SCAN_JAVA_ENGINE = "symantecScanEngine.SymantecScanJavaEngine";
}

class KalturaVirusScanProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaVirusScanProfileStatus
{
    const DISABLED = 1;
    const ENABLED = 2;
    const DELETED = 3;
}

abstract class KalturaVirusScanProfileBaseFilter extends KalturaFilter
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
    public $nameEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $nameLike = null;

    /**
     * 
     *
     * @var KalturaVirusScanProfileStatus
     */
    public $statusEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $statusIn = null;

    /**
     * 
     *
     * @var KalturaVirusScanEngineType
     */
    public $engineTypeEqual = null;

    /**
     * 
     *
     * @var string
     */
    public $engineTypeIn = null;


}

class KalturaVirusScanProfileFilter extends KalturaVirusScanProfileBaseFilter
{

}

class KalturaVirusScanProfile extends KalturaObjectBase
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
     * @readonly
     */
    public $partnerId = null;

    /**
     * 
     *
     * @var string
     */
    public $name = null;

    /**
     * 
     *
     * @var KalturaVirusScanProfileStatus
     */
    public $status = null;

    /**
     * 
     *
     * @var KalturaVirusScanEngineType
     */
    public $engineType = null;

    /**
     * 
     *
     * @var KalturaBaseEntryFilter
     */
    public $entryFilter;

    /**
     * 
     *
     * @var KalturaVirusFoundAction
     */
    public $actionIfInfected = null;


}

class KalturaVirusScanProfileListResponse extends KalturaObjectBase
{
    /**
     * 
     *
     * @var array of KalturaVirusScanProfile
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


class KalturaVirusScanProfileService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null)
    {
        parent::__construct($client);
    }

    function listAction(KalturaVirusScanProfileFilter $filter = null, KalturaFilterPager $pager = null)
    {
        $kparams = array();
        if ($filter !== null)
            $this->client->addParam($kparams, "filter", $filter->toParams());
        if ($pager !== null)
            $this->client->addParam($kparams, "pager", $pager->toParams());
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "list", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaVirusScanProfileListResponse");
        return $resultObject;
    }

    function add(KalturaVirusScanProfile $profile)
    {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfile", $profile->toParams());
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "add", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
        return $resultObject;
    }

    function get($profileId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $profileId);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "get", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
        return $resultObject;
    }

    function update($scanProfileId, KalturaVirusScanProfile $scanProfile)
    {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $scanProfileId);
        $this->client->addParam($kparams, "virusScanProfile", $scanProfile->toParams());
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "update", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
        return $resultObject;
    }

    function delete($scanProfileId)
    {
        $kparams = array();
        $this->client->addParam($kparams, "virusScanProfileId", $scanProfileId);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "delete", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "KalturaVirusScanProfile");
        return $resultObject;
    }

    function scan($flavorAssetId, $scanProfileId = null)
    {
        $kparams = array();
        $this->client->addParam($kparams, "flavorAssetId", $flavorAssetId);
        $this->client->addParam($kparams, "virusScanProfileId", $scanProfileId);
        $this->client->queueServiceActionCall("virusscan_virusscanprofile", "scan", $kparams);
        if ($this->client->isMultiRequest())
            return $this->client->getMultiRequestResult();
        $resultObject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultObject);
        $this->client->validateObjectType($resultObject, "integer");
        return $resultObject;
    }
}
class KalturaVirusScanClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaVirusScanClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaVirusScanProfileService
     */
    public $virusScanProfile = null;

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
        $this->virusScanProfile = new KalturaVirusScanProfileService($client);
    }

    /**
     * @return KalturaVirusScanClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaVirusScanClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices()
    {
        $services = array(
            'virusScanProfile' => $this->virusScanProfile,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'virusScan';
    }
}

