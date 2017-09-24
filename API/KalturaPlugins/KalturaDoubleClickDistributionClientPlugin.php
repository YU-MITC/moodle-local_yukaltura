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
require_once(dirname(__FILE__) . "/KalturaContentDistributionClientPlugin.php");

class KalturaDoubleClickDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaDoubleClickDistributionProviderOrderBy
{
}

abstract class KalturaDoubleClickDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter
{

}

abstract class KalturaDoubleClickDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

class KalturaDoubleClickDistributionProfileFilter extends KalturaDoubleClickDistributionProfileBaseFilter
{

}

class KalturaDoubleClickDistributionProviderFilter extends KalturaDoubleClickDistributionProviderBaseFilter
{

}

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

class KalturaDoubleClickDistributionProvider extends KalturaDistributionProvider
{

}


class KalturaDoubleClickService extends KalturaServiceBase
{
    function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    function getFeed($distributionProfileId, $hash, $page = 1, $period = -1) {
        $kparams = array();
        $this->client->addParam($kparams, "distributionProfileId", $distributionProfileId);
        $this->client->addParam($kparams, "hash", $hash);
        $this->client->addParam($kparams, "page", $page);
        $this->client->addParam($kparams, "period", $period);
        $this->client->queueServiceActionCall('doubleclickdistribution_doubleclick', 'getFeed', $kparams);
        $resultObject = $this->client->getServeUrl();
        return $resultObject;
    }
}
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

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->doubleClick = new KalturaDoubleClickService($client);
    }

    /**
     * @return KalturaDoubleClickDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if(!self::$instance)
            self::$instance = new KalturaDoubleClickDistributionClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
            'doubleClick' => $this->doubleClick,
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'doubleClickDistribution';
    }
}

