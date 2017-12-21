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
 * Kaltura Post installation and migration code.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
require_once(dirname(dirname(__FILE__)) . '/locallib.php');

defined('MOODLE_INTERNAL') || die();

/**
 * This function install XML DB to Moodle.
 *
 * @return boolean - true if error does not occur.
 *
 */
function xmldb_local_yukaltura_install() {

    // Copy plug configuration data.
    migrate_configuration_data();

    // Create new Kaltura media resource/presentations from old resource types.
    migrate_resource_data();

    // Create new Kaltura media assignment from old assignment type and update all,
    // user data pertaining to that assignment.
    migrate_assignment_data();

    return true;
}

/**
 * This function migrates old media assignment type data and creates new Kaltura
 * media assignment modules from the old data.  Updates the course modules table
 * to refer to the newly created media assignment module.  Updates the
 * grade_items table to refer to the newly created assignment module.  If grades
 * are found in the grade_grades table, create a new media assignment submission
 * record using the data from the old media assignment submission record and
 * remove the old assignment submission data.  Lastly the old assignment record
 * is remove.
 *
 */
function migrate_assignment_data() {
    global $DB;

    $dbman             = $DB->get_manager();
    $assigntableexists = false;
    $moduleexists      = false;
    $rebuildcourses    = array();

    $table = new xmldb_table('assignment');
    if ($dbman->table_exists($table)) {
        $assigntableexists = true;
    }

    if ($module = $DB->get_record('modules', array('name' => 'kalmediaassign'))) {
        $moduleexists = true;
    }

    if ($assigntableexists && $moduleexists) {

        try {
            $params = array('assignmenttype' => 'kaltura');
            $oldassignments = $DB->get_records('assignment', $params);

            if (!empty($oldassignments)) {

                foreach ($oldassignments as $assignment) {

                    $courseid                  = $assignment->course;
                    $rebuildcourses[$courseid] = $courseid;
                    $kalmediaassignobj         = create_new_kalmediaassign($assignment);
                    $kalmediaassignid          = add_new_kalmediaassign($kalmediaassignobj);

                    if ($kalmediaassignid) {

                        // Update calendar event.
                        update_calendar_event($kalmediaassignid, $assignment->id);

                        /*
                         * Update course modules record for the media assignment by
                         * setting it to point to the new kalmediaassign instance.
                         */
                        $oldassignmentcm = get_coursemodule_from_instance('assignment', $assignment->id);

                        if (empty($oldassignmentcm)) {
                            continue;
                        }

                        $cm           = new stdClass();
                        $cm->id       = $oldassignmentcm->id;
                        $cm->module   = $module->id;
                        $cm->instance = $kalmediaassignid;

                        /*
                         * Replace the old assignment type reference with a reference to the new
                         *  assignment module
                         */
                        if ($DB->update_record('course_modules', $cm)) {

                            $param = array('itemtype'     => 'mod',
                                           'itemmodule'   => 'assignment',
                                           'iteminstance' => $assignment->id);

                            $gradeitem = $DB->get_record('grade_items', $param);

                            /*
                             * If this assignment has a grade item then update the references to point to the new
                             * assignment module
                             */
                            if (!empty($gradeitem)) {

                                // Now update the grade_items record.
                                $gradeitem->itemmodule   = 'kalmediaassign';
                                $gradeitem->iteminstance = $kalmediaassignid;

                                if ($DB->update_record('grade_items', $gradeitem)) {

                                    $param = array('itemid' => $gradeitem->id);
                                    $gradegrades = $DB->get_records('grade_grades', $param, 'id,userid');

                                    if (!empty($gradegrades)) {

                                        foreach ($gradegrades as $gradegrade) {

                                            $param = array('assignment' => $assignment->id,
                                                           'userid' => $gradegrade->userid);
                                            $assignsub = $DB->get_record('assignment_submissions', $param);

                                            if (!empty($assignsub) && !empty($assignsub->data1)) {

                                                // Create new user assignment submission.
                                                create_new_kalmediaassign_submission($kalmediaassignid, $assignsub);

                                                // Remove old submission.
                                                $param = array('id' => $assignsub->id);
                                                $DB->delete_records('assignment_submissions', $param);

                                            } // End of if submission exists.

                                        } // End of foreach loop grade_grades.

                                    } // End of if empty grade_grades.

                                } // End of if update grade item failed.

                            } // End of if grade item exists.

                            // Delete old assignment record.
                            $param = array('id' => $assignment->id);
                            $DB->delete_records('assignment', $param);
                        }
                    }
                }
            }
        } catch (Exception $ex) {
            $errormessage = 'Data migration error(' .  $ex->getMessage() . ')';
            print_error($errormessage, 'local_yukaltura');
        }
    }

    foreach ($rebuildcourses as $courseid) {
        rebuild_course_cache($courseid);
    }

}

/**
 * Updates the calendar event entry to refer to the new media assignment
 * instance
 *
 * @param int $newassignmentid - Id of new assignment instance
 * @param int $oldassignmentid - Id of old assignment instance
 */
function update_calendar_event($newassignmentid, $oldassignmentid) {
    global $DB;

    $param = array('modulename' => 'assignment',
                   'instance' => $oldassignmentid);
    $event = $DB->get_record('event', $param);

    if (!empty($event)) {
        $event->modulename = 'kalmediaassign';
        $event->instance = $newassignmentid;

        $DB->update_record('event', $event);
    }
}

/**
 * This function migrates old resource data from the resource_old table and
 * creates new kaltura media resource/presentations modules with the old data.
 * Updates the course modules table to point to the new media
 * resource/presentation modules.  Removes old resource data from the
 * resource_old table as well as from the resource table
 *
 */
function migrate_resource_data() {
    global $CFG, $DB;

    $dbman              = $DB->get_manager();
    $moduletableexists  = false;
    $resourceoldexists  = false;

    // Check if the mdl_resource_old table exists and has any entries.
    // If so then we may have old resource activites to upgrade.
    $table = new xmldb_table('resource_old');
    if ($dbman->table_exists($table)) {
        $resourceoldexists = true;
    }

    // If resource old exists run through the upgrade steps to migrate the data into individual modules.
    if ($resourceoldexists) {

        // Check of the kalmediares module exists and include it's lib.php.
        $moduletableexists = kalmediares_exists($dbman);

        if ($moduletableexists) {
            require_once($CFG->dirroot.'/mod/kalmediares/lib.php');
        }

        // Check of the kalmediapres module exists and include it's lib.php.
        $moduletableexists = kalmediapres_exists($dbman);

        if ($moduletableexists) {
            require_once($CFG->dirroot.'/mod/kalmediapres/lib.php');
        }

        $params = array('migrated' => 0,
                       'vr' => 'kalturamedia',
                       'vp' => 'kalturaswfdoc');
        $sql = "SELECT *
                FROM {resource_old}
                WHERE migrated = :migrated
                AND (type = :vr OR type = :vp)";

        $kalturaoldresources = $DB->get_records_sql($sql, $params);

        // If old resources have been found then we must convert them into new plugins.
        if (!empty($kalturaoldresources)) {

            foreach ($kalturaoldresources as $oldresource) {

                // If a kalture media resoruce is found.
                if (0 == strcmp('kalturamedia', $oldresource->type)) {

                    // Get module information for the kaltura media resource and add a new instance.
                    if (!$module = $DB->get_record('modules', array('name' => 'kalmediares'))) {
                        continue;
                    }

                    // Create an instance of the Kaltura media resource.
                    $kalmediaresobj    = create_new_kalmediares($oldresource);
                    $kalmediaresinstid = kalmediares_add_instance($kalmediaresobj);

                    // If add instance was successful.
                    if ($kalmediaresinstid) {

                        /*
                         * Update course modules record for the media resourse
                         * by setting it to point to the new kalmediares instance.
                         */
                        $cm = new stdClass();
                        $cm->id       = $oldresource->cmid;
                        $cm->module   = $module->id;
                        $cm->instance = $kalmediaresinstid;

                        // If update successful remove references to the obsolete media resource.
                        if (!is_null($oldresource->cmid) && $DB->update_record('course_modules', $cm)) {

                            // Remove old instance of the resource/kalturamedia module from the resource table.
                            $param = array('id' => $oldresource->id);
                            $DB->delete_records('resource', $param);

                            // Remove the record of the old instance from the resource_old table.
                            $DB->delete_records('resource_old', $param);

                        } else { // Remove instance from module table.

                            $param = array('id' => $kalmediaresinstid);
                            $DB->delete_records('kalmediares', $param);
                        }
                    }

                } else if (0 == strcmp('kalturaswfdoc', $oldresource->type)) {
                    // If Kaltura media presentation is found.

                    // Get module information for the kaltura media presention and add a new instance.
                    if (!$module = $DB->get_record('modules', array('name' => 'kalmediapres'))) {
                        continue;
                    }

                    // Create an instance of the Kaltura media presentation.
                    $kalmediapresobj    = create_new_kalmediapres($oldresource);
                    $kalmediapresinstid = kalmediapres_add_instance($kalmediapresobj);

                    // If add instance was successful.
                    if ($kalmediapresinstid) {

                        /*
                         * Update course modules record for the media presentation
                         *  by setting it to point to the new kalmediares instance.
                         */
                        $cm = new stdClass();
                        $cm->id       = $oldresource->cmid;
                        $cm->module   = $module->id;
                        $cm->instance = $kalmediapresinstid;

                        // If update successful remove references to the obsolete media resource.
                        if ($DB->update_record('course_modules', $cm)) {

                            // Remove old instance of the resource/kalturaswfdoc module from the resource table.
                            $param = array('id' => $oldresource->id);
                            $DB->delete_records('resource', $param);

                            // Remove the record of the old instance from the resource_old table.
                            $DB->delete_records('resource_old', $param);

                        } else { // Remove instance from module table.

                            $param = array('id' => $kalmediapresinstid);
                            $DB->delete_records('kalmediares', $param);
                        }
                    }
                }
            }
        }
    }
}

/**
 * Update Kaltura 1.9 configuration settings to 2.1 spec settings.
 * This function also removes all of the old 1.9 player configurations
 *
 */
function migrate_configuration_data() {
    global $DB;

    $param    = array('plugin' => 'block_yukaltura');
    $records  = $DB->get_records('config_plugins', $param);
    $namemap = configuration_data_mapping();

    if (empty($records)) {
        return true;
    }

    foreach ($records as $record) {
        switch ($record->name) {
            case 'kaltura_conn_server':
            case 'kaltura_uri':
            case 'kaltura_login':
            case 'kaltura_password':
            case 'kaltura_secret':
            case 'kaltura_adminsecret':
            case 'kaltura_partner_id':
            case 'internal_ipaddress':

                $name = $record->name;

                if (array_key_exists($name , $namemap)) {

                    $record->plugin = 'local_yukaltura';
                    $record->name = $namemap[$name ];

                    $DB->update_record('config_plugins', $record);
                }

                break;
            default:

                $param = array ('id' => $record->id);
                $DB->delete_records('config_plugins', $param);
                break;
        }

    }

}

/**
 * Constructs and returns an array of Moodle 1.9 kaltura configuration name
 * mappings where the key is the 1.9 configuraiton name and the value is the 2.1
 * configuration name
 *
 * @return array - array key 1.9 names, value 2.1 names
 */
function configuration_data_mapping() {
    return array('kaltura_conn_server' => 'conn_server',
                 'kaltura_uri'         => 'uri',
                 'kaltura_login'       => 'login',
                 'kaltura_password'    => 'password',
                 'kaltura_secret'      => 'secret',
                 'kaltura_adminsecret' => 'adminsecret',
                 'kaltura_partner_id'  => 'partner_id');
}

/**
 * Adds a new instance of the kaltura media assignment
 *
 * @param object $kalmediaassign - a kaltura media assignment instance object
 * @return int - id of the newly inserted record or false
 */
function add_new_kalmediaassign($kalmediaassign) {
    global $DB;

    $id = $DB->insert_record('kalmediaassign', $kalmediaassign);

    return $id;
}

/**
 * Construct a kaltura media assignmentobject using parameters from a Moodle 1.9
 * kaltura media assignment type
 *
 * @param object $oldassignment - kaltura media assignment object (ver: Moodle 1.9)
 * @return object - kaltura media assignment object (var: Moodle 2.1)
 */
function create_new_kalmediaassign($oldassignment) {

    $kalmediaassign = new stdClass();

    $kalmediaassign->course           = $oldassignment->course;
    $kalmediaassign->name             = $oldassignment->name;
    $kalmediaassign->intro            = $oldassignment->intro;
    $kalmediaassign->introformat      = $oldassignment->introformat;
    $kalmediaassign->timeavailable    = $oldassignment->timeavailable;
    $kalmediaassign->timedue          = $oldassignment->timedue;
    $kalmediaassign->preventlate      = $oldassignment->preventlate;
    $kalmediaassign->resubmit         = $oldassignment->resubmit;
    $kalmediaassign->emailteachers    = $oldassignment->emailteachers;
    $kalmediaassign->grade            = $oldassignment->grade;
    $kalmediaassign->timecreated      = $oldassignment->timemodified;

    return $kalmediaassign;
}

/**
 * Adds a new instance of the kaltura media assignment submission
 *
 * @param int $kalmediaassignid - Id of the kaltura media assignment the submission is for
 * @param object $oldassignsub - old media assignment submission object
 * @return int - id of the newly inserted record or false
 */
function create_new_kalmediaassign_submission($kalmediaassignid, $oldassignsub) {
    global $DB;

    $kalmediaassignsub                       = new stdClass();
    $kalmediaassignsub->mediaassignid          = $kalmediaassignid;
    $kalmediaassignsub->userid               = $oldassignsub->userid;
    $kalmediaassignsub->entry_id             = $oldassignsub->data1;
    $kalmediaassignsub->grade                = $oldassignsub->grade;
    $kalmediaassignsub->submissioncomment    = $oldassignsub->submissioncomment;
    $kalmediaassignsub->format               = $oldassignsub->format;
    $kalmediaassignsub->teacher              = $oldassignsub->teacher;
    $kalmediaassignsub->mailed               = $oldassignsub->mailed;
    $kalmediaassignsub->timemarked           = $oldassignsub->timemarked;
    $kalmediaassignsub->timecreated          = $oldassignsub->timecreated;
    $kalmediaassignsub->timemodified         = $oldassignsub->timemodified;

    $id = $DB->insert_record('kalmediaassign_submission', $kalmediaassignsub);

    return $id;
}

/**
 * Construct a kaltura media resource object using parameters from a Moodle 1.9
 * kaltura meia resource
 *
 * @param object $oldresource - kaltura media resource object (ver: Moodle 1.9)
 * @return object - kaltura media resource object (var: Moodle 2.1)
 */
function create_new_kalmediares($oldresource) {

    $kalmediares = new stdClass();

    $kalmediares->course       = $oldresource->course;
    $kalmediares->name         = $oldresource->name;
    $kalmediares->intro        = $oldresource->intro;
    $kalmediares->introformat  = $oldresource->introformat;
    $kalmediares->entry_id     = $oldresource->alltext;
    $kalmediares->media_title  = $oldresource->name;
    $kalmediares->uiconf_id    = KALTURA_PLAYER_PLAYERREGULARDARK;
    $kalmediares->widescreen   = 0;
    $kalmediares->height       = 365;
    $kalmediares->width        = 400;
    $kalmediares->access       = KALTURA_INTERNAL_IPADDRESS_ANY;

    return $kalmediares;
}

/**
 * Construct a kaltura media presentation object using parameters from a Moodle
 * 1.9 kaltura media resource
 *
 * @param object $oldresource - kaltura media presentation object (ver: Moodle 1.9)
 * @return object - kaltura media presentation object (var: Moodle 2.1)
 */
function create_new_kalmediapres($oldresource) {

    $kalmediapres = new stdClass();

    $kalmediapres->course         = $oldresource->course;
    $kalmediapres->name           = $oldresource->name;
    $kalmediapres->intro          = $oldresource->intro;
    $kalmediapres->introformat    = $oldresource->introformat;
    $kalmediapres->entry_id       = $oldresource->alltext;
    $kalmediapres->media_entry_id = $oldresource->alltext;
    $kalmediapres->doc_entry_id   = $oldresource->alltext;
    $kalmediapres->media_title    = $oldresource->name;
    $kalmediapres->uiconf_id      = KALTURA_PLAYER_PLAYERMEDIAPRESENTATION;
    $kalmediapres->widescreen     = 0;
    $kalmediapres->height         = 365;
    $kalmediapres->width          = 400;

    return $kalmediapres;
}


/**
 * Check if the Kaltura media assignment table schema exists
 *
 * @param object $dbman - Database manager
 * @return bool - true if exists, else false
 */
function kalmediaassign_exists($dbman) {
    global $CFG;

    // Check of the Kaltura media resource plugin exists.
    $table = new xmldb_table('kalmediaassign');

    if (!$dbman->table_exists($table)) {
        return false;
    }

    if (!file_exists($CFG->dirroot.'/mod/kalmediaassign/lib.php')) {
        return false;
    }

    return true;
}

/**
 * Check if the Kaltura media resource table schema exists
 *
 * @param object $dbman - Database manager
 * @return bool - true if exists, else false
 */
function kalmediares_exists($dbman) {
    global $CFG;

    // Check of the Kaltura media resource plugin exists.
    $table = new xmldb_table('kalmediares');

    if (!$dbman->table_exists($table)) {
        return false;
    }

    if (!file_exists($CFG->dirroot.'/mod/kalmediares/lib.php')) {
        return false;
    }

    return true;
}

/**
 * Check if the Kaltura media presentation table schema exists
 *
 * @param object $dbman - Database manager
 * @return bool - true if exists, else false
 */
function kalmediapres_exists($dbman) {
    global $CFG;

    // Check of the Kaltura media pres plugin exists.
    $table = new xmldb_table('kalmediapres');

    if (!$dbman->table_exists($table)) {
        return false;
    }

    if (!file_exists($CFG->dirroot.'/mod/kalmediapres/lib.php')) {
        return false;
    }

    return true;
}
