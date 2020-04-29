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
require_once(dirname(__FILE__) . "/KalturaContentDistributionClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionFeedSpecVersion extends KalturaEnumBase {
    /** @var version 1 */
    const VERSION_1 = "1";
    /** @var version 2 */
    const VERSION_2 = "2";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfileOrderBy extends KalturaEnumBase {
    /** @var order by created */
    const CREATED_AT_ASC = "+createdAt";
    /** @var order by updated */
    const UPDATED_AT_ASC = "+updatedAt";
    /** @var order by created */
    const CREATED_AT_DESC = "-createdAt";
    /** @var order by updated */
    const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProviderOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProvider extends KalturaDistributionProvider {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionJobProviderData extends KalturaConfigurableDistributionJobProviderData {
    /**
     *
     * @var string
     */
    public $videoAssetFilePath = null;

    /**
     *
     * @var string
     */
    public $thumbAssetFilePath = null;

    /**
     *
     * @var string
     */
    public $captionAssetIds = null;

    /**
     *
     * @var string
     */
    public $sftpDirectory = null;

    /**
     *
     * @var string
     */
    public $sftpMetadataFilename = null;

    /**
     *
     * @var string
     */
    public $currentPlaylists = null;

    /**
     *
     * @var string
     */
    public $newPlaylists = null;

    /**
     *
     * @var string
     */
    public $submitXml = null;

    /**
     *
     * @var string
     */
    public $updateXml = null;

    /**
     *
     * @var string
     */
    public $deleteXml = null;

    /**
     *
     * @var string
     */
    public $googleClientId = null;

    /**
     *
     * @var string
     */
    public $googleClientSecret = null;

    /**
     *
     * @var string
     */
    public $googleTokenData = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfile extends KalturaConfigurableDistributionProfile {
    /**
     *
     * @var KalturaYouTubeDistributionFeedSpecVersion
     */
    public $feedSpecVersion = null;

    /**
     *
     * @var string
     */
    public $username = null;

    /**
     *
     * @var string
     */
    public $notificationEmail = null;

    /**
     *
     * @var string
     */
    public $sftpHost = null;

    /**
     *
     * @var int
     */
    public $sftpPort = null;

    /**
     *
     * @var string
     */
    public $sftpLogin = null;

    /**
     *
     * @var string
     */
    public $sftpPublicKey = null;

    /**
     *
     * @var string
     */
    public $sftpPrivateKey = null;

    /**
     *
     * @var string
     */
    public $sftpBaseDir = null;

    /**
     *
     * @var string
     */
    public $ownerName = null;

    /**
     *
     * @var string
     */
    public $defaultCategory = null;

    /**
     *
     * @var string
     */
    public $allowComments = null;

    /**
     *
     * @var string
     */
    public $allowEmbedding = null;

    /**
     *
     * @var string
     */
    public $allowRatings = null;

    /**
     *
     * @var string
     */
    public $allowResponses = null;

    /**
     *
     * @var string
     */
    public $commercialPolicy = null;

    /**
     *
     * @var string
     */
    public $ugcPolicy = null;

    /**
     *
     * @var string
     */
    public $target = null;

    /**
     *
     * @var string
     */
    public $adServerPartnerId = null;

    /**
     *
     * @var bool
     */
    public $enableAdServer = null;

    /**
     *
     * @var bool
     */
    public $allowPreRollAds = null;

    /**
     *
     * @var bool
     */
    public $allowPostRollAds = null;

    /**
     *
     * @var string
     */
    public $strict = null;

    /**
     *
     * @var string
     */
    public $overrideManualEdits = null;

    /**
     *
     * @var string
     */
    public $urgentReference = null;

    /**
     *
     * @var string
     */
    public $allowSyndication = null;

    /**
     *
     * @var string
     */
    public $hideViewCount = null;

    /**
     *
     * @var string
     */
    public $allowAdsenseForVideo = null;

    /**
     *
     * @var string
     */
    public $allowInvideo = null;

    /**
     *
     * @var bool
     */
    public $allowMidRollAds = null;

    /**
     *
     * @var string
     */
    public $instreamStandard = null;

    /**
     *
     * @var string
     */
    public $instreamTrueview = null;

    /**
     *
     * @var string
     */
    public $claimType = null;

    /**
     *
     * @var string
     */
    public $blockOutsideOwnership = null;

    /**
     *
     * @var string
     */
    public $captionAutosync = null;

    /**
     *
     * @var bool
     */
    public $deleteReference = null;

    /**
     *
     * @var bool
     */
    public $releaseClaims = null;

    /**
     *
     * @var string
     */
    public $apiAuthorizeUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYouTubeDistributionProviderBaseFilter extends KalturaDistributionProviderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProviderFilter extends KalturaYouTubeDistributionProviderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaYouTubeDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionProfileFilter extends KalturaYouTubeDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaYouTubeDistributionClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Youtube Distribution Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaYouTubeDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaYouTubeDistributionClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array();
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'youTubeDistribution';
    }
}
