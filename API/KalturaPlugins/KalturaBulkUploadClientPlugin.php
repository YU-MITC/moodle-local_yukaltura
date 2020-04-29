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

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class KalturaBulkServiceData extends KalturaObjectBase {
}

/**
 * Kaltura Client API.
 *
 * @package   local_yukaltura
 * @copyright (C) 2018 Kaltura Inc.
 * @copyright (C) 2018-2020 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaBulkService extends KalturaServiceBase {
    /**
     * Constructor of Kaltura Bulk Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client = null) {
        parent::__construct($client);
    }

    /**
     * Aborts the bulk upload and all its child jobs
     * @param {nt $id - Job id
     * @return KalturaBulkUpload - instance of KalturaBulkUpload.
     */
    public function abort($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload_bulk", "abort", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * Get bulk upload batch job by id
     * @param int $id - id of batch job.
     * @return KalturaBulkUpload - instance of KalturaBulkUpload.
     */
    public function get($id) {
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload_bulk", "get", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUpload");
        return $resultobject;
    }

    /**
     * List bulk upload batch jobs
     * @param KalturaBulkUploadFilter $bulkuploadfilter - instance of KalturaBulkUploadFilter
     * @param KalturaFilterPager $pager - instance of KalturaFilterPager.
     * @return KalturaBulkUploadListResponse - instance of KalturaBulkUploadListResponse.
     */
    public function listAction(KalturaBulkUploadFilter $bulkuploadfilter = null, KalturaFilterPager $pager = null) {
        $kparams = array();
        if ($bulkuploadfilter !== null) {
            $this->client->addParam($kparams, "bulkUploadFilter", $bulkuploadfilter->toParams());
        }
        if ($pager !== null) {
            $this->client->addParam($kparams, "pager", $pager->toParams());
        }
        $this->client->queueServiceActionCall("bulkupload_bulk", "list", $kparams);
        if ($this->client->isMultiRequest()) {
            return $this->client->getMultiRequestResult();
        }
        $resultobject = $this->client->doQueue();
        $this->client->throwExceptionIfError($resultobject);
        $this->client->validateObjectType($resultobject, "KalturaBulkUploadListResponse");
        return $resultobject;
    }

    /**
     * Serve action returns the original file.
     * @param int $id - Job id
     * @return file - file data.
     */
    public function serve($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload_bulk", "serve", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
    }

    /**
     * ServeLog action returns the log file for the bulk-upload job.
     * @param int $id - Job id
     * @return file - file data.
     */
    public function serveLog($id) {
        if ($this->client->isMultiRequest()) {
            throw new KalturaClientException("Action is not supported as part of multi-request.",
                                             KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
        }
        $kparams = array();
        $this->client->addParam($kparams, "id", $id);
        $this->client->queueServiceActionCall("bulkupload_bulk", "serveLog", $kparams);
        if (!$this->client->getDestinationPath() && !$this->client->getReturnServedResult()) {
            return $this->client->getServeUrl();
        }
        return $this->client->doQueue();
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
class KalturaBulkUploadClientPlugin extends KalturaClientPlugin {
    /**
     * @var KalturaBulkService
     */
    public $bulk = null;

    /**
     * Constructor of Kaltura BulkUpload Service.
     * @param KalturaClient $client - instance of KalturaClient.
     */
    public function __construct(KalturaClient $client) {
        parent::__construct($client);
        $this->bulk = new KalturaBulkService($client);
    }

    /**
     * Get object.
     * @param KalturaClient $client - instance of Kaltura Client.
     * @return KalturaBulkUploadClientPlugin - instance of KalturaBulkUploadClientPlugin
     */
    public static function get(KalturaClient $client) {
        return new KalturaBulkUploadClientPlugin($client);
    }

    /**
     * Get services.
     * @return array - array of KalturaServiceBase.
     */
    public function getServices() {
        $services = array('bulk' => $this->bulk);
        return $services;
    }

    /**
     * Get plugin name.
     * @return string - class name.
     */
    public function getName() {
        return 'bulkUpload';
    }
}

