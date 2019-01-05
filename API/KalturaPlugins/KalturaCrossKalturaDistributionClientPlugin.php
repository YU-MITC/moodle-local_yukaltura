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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProfileOrderBy extends KalturaEnumBase {
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
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProviderOrderBy extends KalturaEnumBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProvider extends KalturaDistributionProvider {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionJobProviderData extends KalturaConfigurableDistributionJobProviderData {
    /**
     * Key-value array where the keys are IDs of distributed flavor assets in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedFlavorAssets = null;

    /**
     * Key-value array where the keys are IDs of distributed thumb assets in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedThumbAssets = null;

    /**
     * Key-value array where the keys are IDs of distributed metadata objects in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedMetadata = null;

    /**
     * Key-value array where the keys are IDs of distributed caption assets in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedCaptionAssets = null;

    /**
     * Key-value array where the keys are IDs of distributed cue points in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedCuePoints = null;

    /**
     * Key-value array where the keys are IDs of distributed thumb cue points in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedThumbCuePoints = null;

    /**
     * Key-value array where the keys are IDs of distributed timed thumb assets in the source account
     * and the values are the matching IDs in the target account.
     * @var string
     */
    public $distributedTimedThumbAssets = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProfile extends KalturaConfigurableDistributionProfile {
    /**
     * @var string
     */
    public $targetServiceUrl = null;

    /**
     * @var int
     */
    public $targetAccountId = null;

    /**
     * @var string
     */
    public $targetLoginId = null;

    /**
     * @var string
     */
    public $targetLoginPassword = null;

    /**
     * @var string
     */
    public $metadataXslt = null;

    /**
     * @var array of KalturaStringValue
     */
    public $metadataXpathsTriggerUpdate;

    /**
     * @var bool
     */
    public $distributeCaptions = null;

    /**
     * @var bool
     */
    public $distributeCuePoints = null;

    /**
     * @var bool
     */
    public $distributeRemoteFlavorAssetContent = null;

    /**
     * @var bool
     */
    public $distributeRemoteThumbAssetContent = null;

    /**
     * @var bool
     */
    public $distributeRemoteCaptionAssetContent = null;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapAccessControlProfileIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapConversionProfileIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapMetadataProfileIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapStorageProfileIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapFlavorParamsIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapThumbParamsIds;

    /**
     * @var array of KalturaKeyValue
     */
    public $mapCaptionParamsIds;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCrossKalturaDistributionProviderBaseFilter extends KalturaDistributionProviderFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProviderFilter extends KalturaCrossKalturaDistributionProviderBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaCrossKalturaDistributionProfileBaseFilter extends KalturaConfigurableDistributionProfileFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionProfileFilter extends KalturaCrossKalturaDistributionProfileBaseFilter {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2019 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaCrossKalturaDistributionClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Cross Kaltura Distribution Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaCrossKalturaDistributionClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaCrossKalturaDistributionClientPlugin($client);
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
        return 'crossKalturaDistribution';
    }
}
