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
 * YU Kaltura static entries class
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2018 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * Thanks to Gonen Radai
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/local/yukaltura/locallib.php');

defined('MOODLE_INTERNAL') || die();

require_login();

/**
 * Kaltura static entries class.
 *
 * @package local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class KalturaStaticEntries {

    /** @var array of Kaltura Media entry. */
    private static $entries = array();

    /**
     * Retrieve all entry objects that have been seralized and stored in the
     * session global
     */
    public function __construct() {

        global $SESSION;

        if (!isset($SESSION->kaltura_entries)) {

            $SESSION->kaltura_entries = array();
        } else {

            foreach ($SESSION->kaltura_entries as $entryid => $data) {

                if (!array_key_exists($entryid, self::$entries)) {
                    self::$entries[$entryid] = unserialize($data);
                }
            }
        }
    }

    /**
     * Add an entry object directory to the array
     *
     * @param object $entryobj - an entry object
     * @return nothing
     */
    public static function add_entry_object($entryobj) {
        if (!array_key_exists($entryobj->id, self::$entries)) {
            $key = $entryobj->id;
            self::$entries[$key] = $entryobj;
        }
    }

    /**
     * Retrieve an entry object.  First verify if the object has already been
     * cached.  If not, retreive the object via API calls.  Else just return the
     * object
     * @param string $entryid - entry id to retrieve
     * @param object $baseentryservice - a KalturaBaseEntryService object
     * @param bool $fetch - true to make an API call if the entry object doesn't exist.
     * @return mixed - entry object or false if it was not found
     */
    public static function get_entry($entryid, $baseentryservice, $fetch = true) {

        if (!array_key_exists($entryid, self::$entries)) {
            if ($fetch) {
                self::get_entry_from_api($entryid, $baseentryservice);
            } else {
                return false;
            }

        }

        return self::$entries[$entryid];
    }

    /**
     * Makes an API call to retrieve an entry object and store the object in the
     * static entries list.
     * @param string $entryid - id of kaltura media entry.
     * @param object $baseentryservice - a KalturaBaseEntryService object.
     * @return - nothing.
     */
    private static function get_entry_from_api($entryid, $baseentryservice) {

        $entryobj = $baseentryservice->get($entryid);

        // Put entry object in array.
        self::$entries[$entryid] = $entryobj;
    }

    /**
     * Return a list of entry objects
     * @param array $entryids an entry id
     * @param object $baseentryservice a KalturaBaseEntryService object
     * @return array array of entry objects with the entry id as the key
     */
    public static function list_entries($entryids = array(), $baseentryservice) {

        $returnedentries = array();
        $fetchentriesfromapi = array();

        foreach ($entryids as $key => $entryid) {

            if (array_key_exists($entryid, self::$entries)) {
                $returnedentries[$key] = self::$entries[$entryid];
            } else {
                $fetchentriesfromapi[$key] = $entryid;
            }
        }

        self::list_entries_from_api($fetchentriesfromapi, $baseentryservice);

        // Populate the "blanks" in $returnedEntries with the results from the API.
        foreach ($fetchentriesfromapi as $key => $id) {

            if (array_key_exists($id, self::$entries)) {
                $returnedentries[$key] = self::$entries[$id];
            }
        }

        return $returnedentries;
    }


    /**
     * Retrieve a list of entry objects; and store the objects in the static
     * array.
     *
     * @param array $entryids array of entry ids to retreive
     * @param object $baseentryservice a KalturaBaseEntryService object
     * @return nothing
     */
    private static function list_entries_from_api($entryids = array(), $baseentryservice) {

        // Perform baseEntry->listAction() call.
        $filter = new KalturaBaseEntryFilter();
        $filter->idIn = implode(',', $entryids);
        $result = $baseentryservice->listAction($filter);

        // Put entry objects in array.
        foreach ($result->objects as $entry) {
            self::$entries[$entry->id] = $entry;
        }
    }


    /**
     * Remove an entry from cache.
     *
     * @param string $entryid - id of Kaltura Media entry
     * @return nothing
     */
    public static function remove_entry($entryid) {
        global $SESSION;

        if (array_key_exists($entryid, self::$entries)) {
            unset(self::$entries[$entryid]);

            if (array_key_exists($entryid, $SESSION->kaltura_entries)) {
                unset($SESSION->kaltura_entries[$entryid]);
            }
        }
    }


    /**
     * All stored entry objects will be serialized and stored in the PHP session
     * global.
     */
    public function __destruct() {
        global $SESSION;

        foreach (self::$entries as $entryid => $data) {

            if (!array_key_exists($entryid, $SESSION->kaltura_entries)) {
                $SESSION->kaltura_entries[$entryid] = serialize($data);
            }

        }
    }
}
