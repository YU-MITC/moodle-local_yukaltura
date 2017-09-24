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
require_once(dirname(__FILE__) . "/KalturaContentDistributionClientPlugin.php");

require_login();

class KalturaTVComDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

class KalturaTVComDistributionProviderOrderBy
{
}

abstract class KalturaTVComDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter
{

}

abstract class KalturaTVComDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

class KalturaTVComDistributionProfileFilter extends KalturaTVComDistributionProfileBaseFilter
{

}

class KalturaTVComDistributionProviderFilter extends KalturaTVComDistributionProviderBaseFilter
{

}

class KalturaTVComDistributionProfile extends KalturaConfigurableDistributionProfile
{
    /**
     * 
     *
     * @var int
     */
    public $metadataProfileId = null;

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
    public $feedTitle = null;

    /**
     * 
     *
     * @var string
     */
    public $feedLink = null;

    /**
     * 
     *
     * @var string
     */
    public $feedDescription = null;

    /**
     * 
     *
     * @var string
     */
    public $feedLanguage = null;

    /**
     * 
     *
     * @var string
     */
    public $feedCopyright = null;

    /**
     * 
     *
     * @var string
     */
    public $feedImageTitle = null;

    /**
     * 
     *
     * @var string
     */
    public $feedImageUrl = null;

    /**
     * 
     *
     * @var string
     */
    public $feedImageLink = null;

    /**
     * 
     *
     * @var int
     */
    public $feedImageWidth = null;

    /**
     * 
     *
     * @var int
     */
    public $feedImageHeight = null;


}

class KalturaTVComDistributionProvider extends KalturaDistributionProvider
{

}

class KalturaTvComDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaTvComDistributionClientPlugin
     */
    protected static $instance;

    /**
     * @var KalturaTvComService
     */
    public $tvCom = null;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->tvCom = new KalturaTvComService($client);
    }

    /**
     * @return KalturaTvComDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if(!self::$instance) {
            self::$instance = new KalturaTvComDistributionClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array('tvCom' => $this->tvCom);
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'tvComDistribution';
    }
}

