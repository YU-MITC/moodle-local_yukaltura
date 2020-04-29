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
class KalturaUnicornDistributionProfileOrderBy extends KalturaEnumBase {
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
class KalturaUnicornDistributionProviderOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornDistributionProvider extends KalturaDistributionProvider {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornDistributionJobProviderData extends KalturaConfigurableDistributionJobProviderData {
    /**
     * The Catalog GUID the video is in or will be ingested into.
     *
     * @var string
     */
    public $catalogGuid = null;

    /**
     * The Title assigned to the video. The Foreign Key will be used if no title is provided.
     *
     * @var string
     */
    public $title = null;

    /**
     * Indicates that the media content changed and therefore the job should wait for HTTP callback notification to be closed.
     *
     * @var bool
     */
    public $mediaChanged = null;

    /**
     * Flavor asset version.
     *
     * @var string
     */
    public $flavorAssetVersion = null;

    /**
     * The schema and host name to the Kaltura server, e.g. http://www.kaltura.com
     *
     * @var string
     */
    public $notificationBaseUrl = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornDistributionProfile extends KalturaConfigurableDistributionProfile {
    /**
     * The email address associated with the Upload User, used to authorize the incoming request.
     *
     * @var string
     */
    public $username = null;

    /**
     * The password used in association with the email to determine if the Upload User is authorized the incoming request.
     *
     * @var string
     */
    public $password = null;

    /**
     * The name of the Domain that the Upload User should have access to, Used for authentication.
     *
     * @var string
     */
    public $domainName = null;

    /**
     * The Channel GUID assigned to this Publication Rule. Must be a valid Channel in the Domain that was used in authentication.
     *
     * @var string
     */
    public $channelGuid = null;

    /**
     * The API host URL that the Upload User should have access to, Used for HTTP content submission.
     *
     * @var string
     */
    public $apiHostUrl = null;

    /**
     * The GUID of the Customer Domain in the Unicorn system obtained by contacting your Unicorn representative.
     *
     * @var string
     */
    public $domainGuid = null;

    /**
     * The GUID for the application in which to record metrics and enforce business rules obtained
     * through your Unicorn representative.
     *
     * @var string
     */
    public $adFreeApplicationGuid = null;

    /**
     * The flavor-params that will be used for the remote asset.
     *
     * @var int
     */
    public $remoteAssetParamsId = null;

    /**
     * The remote storage that should be used for the remote asset.
     *
     * @var string
     */
    public $storageProfileId = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUnicornDistributionProviderBaseFilter extends KalturaDistributionProviderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornDistributionProviderFilter extends KalturaUnicornDistributionProviderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaUnicornDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornDistributionProfileFilter extends KalturaUnicornDistributionProfileBaseFilter {
}


/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaUnicornService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Unicorn Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Notify.
     * @param int $id - Distribution job id
     */
    public function notify($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("unicorndistribution_unicorn", "notify", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "null");
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
class KalturaUnicornDistributionClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaUnicornService
     */
    public $unicorn = null;

    /**
     * Constructor of Kaltura Unicron Distribution Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->unicorn = new KalturaUnicornService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaUnicornDistributionClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaUnicornDistributionClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('unicorn' => $this->unicorn);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'unicornDistribution';
    }
}
