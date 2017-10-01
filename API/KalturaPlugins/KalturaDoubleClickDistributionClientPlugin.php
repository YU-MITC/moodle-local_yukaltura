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
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaContentDistributionClientPlugin.php");
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProviderOrderBy
{
}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDoubleClickDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDoubleClickDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProfileFilter extends KalturaDoubleClickDistributionProfileBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProviderFilter extends KalturaDoubleClickDistributionProviderBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProfile extends KalturaConfigurableDistributionProfile
{
    /**
     * 
     *
     * @var string
     */
    public $channelTitle = null;

    /**
     * 
     *
     * @var string
     */
    public $channelLink = null;

    /**
     * 
     *
     * @var string
     */
    public $channelDescription = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $feedUrl = null;

    /**
     * 
     *
     * @var string
     */
    public $cuePointsProvider = null;

    /**
     * 
     *
     * @var string
     */
    public $itemsPerPage = null;

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionProvider extends KalturaDistributionProvider
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null)
    {
        parent::__construct($client);
    }

    function getFeed($distributionProfileId, $hash, $page = 1, $period = -1)
    {
        $kparams = array();
        $this->client->addParam($kparams, "distributionProfileId", $distributionProfileId);
        $this->client->addParam($kparams, "hash", $hash);
        $this->client->addParam($kparams, "page", $page);
        $this->client->addParam($kparams, "period", $period);
        $this->client->queueServiceActionCall('doubleclickdistribution_doubleclick', 'getFeed', $kparams);
        $resultobject = $this->client->getServeUrl();
        return $resultobject;
    }
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleClickDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaDoubleClickDistributionClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaDoubleClickService
     */
    public $doubleClick = null;

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
        $this->doubleClick = new KalturaDoubleClickService($client);
    }

    /**
     * @return KalturaDoubleClickDistributionClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaDoubleClickDistributionClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices()
    {
        $services = array(
            'doubleClick' => $this->doubleClick,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'doubleClickDistribution';
    }
}
