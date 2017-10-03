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
class KalturaDailymotionDistributionProfileOrderBy
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
class KalturaDailymotionDistributionProviderOrderBy
{
}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDailymotionDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDailymotionDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDailymotionDistributionProfileFilter extends KalturaDailymotionDistributionProfileBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDailymotionDistributionProviderFilter extends KalturaDailymotionDistributionProviderBaseFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
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

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDailymotionDistributionProvider extends KalturaDistributionProvider
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDailymotionDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaDailymotionDistributionClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
    }

    /**
     * @return KalturaDailymotionDistributionClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaDailymotionDistributionClientPlugin($client);
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices()
    {
        $services = array(
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dailymotionDistribution';
    }
}
