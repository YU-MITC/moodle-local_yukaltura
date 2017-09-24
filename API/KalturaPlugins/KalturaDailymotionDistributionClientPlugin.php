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

class KalturaDailymotionDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaDailymotionDistributionProviderOrderBy
{
}

abstract class KalturaDailymotionDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

abstract class KalturaDailymotionDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

class KalturaDailymotionDistributionProfileFilter extends KalturaDailymotionDistributionProfileBaseFilter
{

}

class KalturaDailymotionDistributionProviderFilter extends KalturaDailymotionDistributionProviderBaseFilter
{

}

class KalturaDailymotionDistributionProfile extends KalturaDistributionProfile
{
    /**
     * 
     *
     * @var string
     */
    public $user = null;

    /**
     * 
     *
     * @var string
     */
    public $password = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileId = null;


}

class KalturaDailymotionDistributionProvider extends KalturaDistributionProvider
{

}

class KalturaDailymotionDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaDailymotionDistributionClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * @return KalturaDailymotionDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if(!self::$instance)
            self::$instance = new KalturaDailymotionDistributionClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'dailymotionDistribution';
    }
}
