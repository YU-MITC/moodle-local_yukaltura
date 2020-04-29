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
require_once(dirname(__FILE__) . "/KalturaIntegrationClientPlugin.php");
require_once(dirname(__FILE__) . "/KalturaTranscriptClientPlugin.php");

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVoicebaseJobProviderData extends KalturaIntegrationJobProviderData {
    /**
     * Entry ID
     *
     * @var string
     */
    public $entryId = null;

    /**
     * Flavor ID
     *
     * @var string
     */
    public $flavorAssetId = null;

    /**
     * input Transcript-asset ID
     *
     * @var string
     */
    public $transcriptId = null;

    /**
     * Caption formats
     *
     * @var string
     */
    public $captionAssetFormats = null;

    /**
     * Api key for service provider
     *
     * @var string
     */
    public $apiKey = null;

    /**
     * Api key for service provider
     *
     * @var string
     */
    public $apiPassword = null;

    /**
     * Transcript content language
     *
     * @var KalturaLanguage
     */
    public $spokenLanguage = null;

    /**
     * Transcript Content location
     *
     * @var string
     */
    public $fileLocation = null;

    /**
     * should replace remote media content
     *
     * @var bool
     */
    public $replaceMediaContent = null;

    /**
     * additional parameters to send to VoiceBase
     *
     * @var string
     */
    public $additionalParameters = null;
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaVoicebaseClientPlugin extends KalturaClientPlugin {
    /**
     * Constructor of Kaltura Voicebase Client Plugin.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of KalturaClient.
     * @return KalturaVoicebaseClientPlugin - object.
     */
    public static function get(KalturaClient $client) {
        return new KalturaVoicebaseClientPlugin($client);
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
        return 'voicebase';
    }
}
