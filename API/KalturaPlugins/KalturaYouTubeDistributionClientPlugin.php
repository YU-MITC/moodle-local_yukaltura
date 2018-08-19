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
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.php');
defined('MOODLE_INTERNAL') || die();

require_once(dirname(__FILE__) . "/../KalturaClientBase.php");
require_once(dirname(__FILE__) . "/../KalturaEnums.php");
require_once(dirname(__FILE__) . "/../KalturaTypes.php");
require_once(dirname(__FILE__) . "/KalturaContentDistributionClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfileOrderBy
{
    const CREATED_AT_ASC = "+createdAt";
    const CREATED_AT_DESC = "-createdAt";
    const UPDATED_AT_ASC = "+updatedAt";
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProviderOrderBy
{
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYouTubeDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYouTubeDistributionProviderBaseFilter extends KalturaDistributionProviderFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfileFilter extends KalturaYouTubeDistributionProfileBaseFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProviderFilter extends KalturaYouTubeDistributionProviderBaseFilter
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfile extends KalturaConfigurableDistributionProfile
{
    /**
     *
     *
     * @var string
     */
    public $username = null;

    /**
     *
     *
     * @var string
     */
    public $notificationEmail = null;

    /**
     *
     *
     * @var string
     */
    public $sftpHost = null;

    /**
     *
     *
     * @var string
     */
    public $sftpLogin = null;

    /**
     *
     *
     * @var string
     */
    public $sftpPublicKey = null;

    /**
     *
     *
     * @var string
     */
    public $sftpPrivateKey = null;

    /**
     *
     *
     * @var string
     */
    public $sftpBaseDir = null;

    /**
     *
     *
     * @var string
     */
    public $ownerName = null;

    /**
     *
     *
     * @var string
     */
    public $defaultCategory = null;

    /**
     *
     *
     * @var string
     */
    public $allowComments = null;

    /**
     *
     *
     * @var string
     */
    public $allowEmbedding = null;

    /**
     *
     *
     * @var string
     */
    public $allowRatings = null;

    /**
     *
     *
     * @var string
     */
    public $allowResponses = null;

    /**
     *
     *
     * @var string
     */
    public $commercialPolicy = null;

    /**
     *
     *
     * @var string
     */
    public $ugcPolicy = null;

    /**
     *
     *
     * @var string
     */
    public $target = null;

    /**
     *
     *
     * @var string
     */
    public $adServerPartnerId = null;

    /**
     *
     *
     * @var bool
     */
    public $enableAdServer = null;

    /**
     *
     *
     * @var bool
     */
    public $allowPreRollAds = null;

    /**
     *
     *
     * @var bool
     */
    public $allowPostRollAds = null;

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProvider extends KalturaDistributionProvider
{

}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2014 Kaltura Inc.
 * @copyright (C) 2016-2018 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionClientPlugin extends KalturaClientPlugin
{
    /**
     * @var KalturaYouTubeDistributionClientPlugin
     */
    protected static $instance;

    protected function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * @return KalturaYouTubeDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        if (!self::$instance) {
            self::$instance = new KalturaYouTubeDistributionClientPlugin($client);
        }
        return self::$instance;
    }

    /**
     * @return array<KalturaServiceBase>
     */
    public function getServices() {
        $services = array(
        );
        return $services;
    }

    /**
     * @return string
     */
    public function getName() {
        return 'youTubeDistribution';
    }
}
