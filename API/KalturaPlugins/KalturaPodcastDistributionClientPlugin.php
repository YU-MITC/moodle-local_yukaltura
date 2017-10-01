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

class KalturaPodcastDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaPodcastDistributionProviderOrderBy
{
}

abstract class KalturaPodcastDistributionProfileBaseFilter extends KalturaDistributionProfileFilter
{

}

abstract class KalturaPodcastDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

class KalturaPodcastDistributionProfileFilter extends KalturaPodcastDistributionProfileBaseFilter
{

}

class KalturaPodcastDistributionProviderFilter extends KalturaPodcastDistributionProviderBaseFilter
{

}

class KalturaPodcastDistributionProfile extends KalturaDistributionProfile
{
    /**
     * 
     *
     * @var string
     */
    public $xsl = null;

    /**
     * 
     *
     * @var string
     * @readonly
     */
    public $feedId = null;

    /**
     * 
     *
     * @var int
     */
    public $metadataProfileId = null;


}

class KalturaPodcastDistributionProvider extends KalturaDistributionProvider
{

}

class KalturaPodcastDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaPodcastDistributionClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client)
    {
        parent::__construct($client);
    }

    /**
     * @return KalturaPodcastDistributionClientPlugin
     */
    public static function get(KalturaClient $client)
    {
        if(!self::$instance)
            self::$instance = new KalturaPodcastDistributionClientPlugin($client);
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
        return 'podcastDistribution';
    }
}

