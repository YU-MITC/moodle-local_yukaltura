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
 * Moodle course unit test for Kaltura
 *
 * @package    local_yukaltura
 * @copyright  (C) 2008-2013 Remote-Learner Inc http://www.remote-learner.net
 * @copyright  (C) 2016-2017 Yamaguchi University <info-cc@ml.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/local/yukaltura/locallib.php');

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

class yukaltura_course_testcase extends advanced_testcase {

    protected function setUp() {
        parent::setUp();
        $this->resetAfterTest(true);
    }

    /**
     * Test that searching for courses returns valid results
     */
    public function test_search_course() {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $this->setUser($user);

        $course1 = $this->getDataGenerator()->create_course(array('idnumber' => 'id1',
                                                                  'fullname' => 'course10',
                                                                  'shortname' => 'crs1'
                                                                 ));
        $course2 = $this->getDataGenerator()->create_course(array('idnumber' => 'id2',
                                                                  'fullname' => 'course11',
                                                                  'shortname' => 'crs2'
                                                                 ));
        $course3 = $this->getDataGenerator()->create_course(array('idnumber' => 'id3',
                                                                  'fullname' => 'course20',
                                                                  'shortname' => 'crs3'
                                                                 ));

        $role = $DB->get_record('role', array('shortname' => 'manager'));
        $plugin = enrol_get_plugin('manual');

        $courses = array($course1, $course2, $course3);

        foreach ($courses as $course) {
            $coursecontext = context_course::instance($course->id);
            $instance = $DB->get_record('enrol', array('courseid' => $course->id, 'enrol' => 'manual'));
            $plugin->enrol_user($instance, $user->id, $role->id);
            assign_capability('local/yukaltura:view_report', CAP_ALLOW, $role->id, $coursecontext);
        }

        assign_capability('local/yukaltura:view_report', CAP_ALLOW, $role->id, $coursecontext);

        $search1 = search_course('course1');
        $search2 = search_course('crs1');
        // Non-existing course.
        $search3 = search_course('course3');

        $expected = array(
            (object)array(
                'id' => '2',
                'fullname' => 'course10',
                'shortname' => 'crs1',
                'idnumber' => 'id1'
            ),
            (object)array(
                'id' => '3',
                'fullname' => 'course11',
                'shortname' => 'crs2',
                'idnumber' => 'id2'
            )
        );

        $this->assertEquals($expected, $search1);

        $expected = array(
            (object)array(
                'id' => '2',
                'fullname' => 'course10',
                'shortname' => 'crs1',
                'idnumber' => 'id1'
            )
        );
        $this->assertEquals($expected, $search2);
        $this->assertEmpty($search3);
    }

    /**
     * Test Moodle course listing from log table
     *
     * @param array $expected An array of expected courses
     * @dataProvider course_provider
     */
    public function test_recent_course_history_listing($expected) {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $this->setUser($user);

        $course1 = $this->getDataGenerator()->create_course(array('idnumber' => 'id1',
                                                                  'fullname' => 'course1',
                                                                  'shortname' => 'crs1'
                                                                 ));
        $course2 = $this->getDataGenerator()->create_course(array('idnumber' => 'id2',
                                                                  'fullname' => 'course2',
                                                                  'shortname' => 'crs2'
                                                                 ));
        $course3 = $this->getDataGenerator()->create_course(array('idnumber' => 'id3',
                                                                  'fullname' => 'course3',
                                                                  'shortname' => 'crs3'
                                                                 ));
        $course4 = $this->getDataGenerator()->create_course(array('idnumber' => 'id4',
                                                                  'fullname' => 'course4',
                                                                  'shortname' => 'crs4'
                                                                 ));
        $course5 = $this->getDataGenerator()->create_course(array('idnumber' => 'id5',
                                                                  'fullname' => 'course5',
                                                                  'shortname' => 'crs5'
                                                                  ));

        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362280000',
                                                    'courseid' => $course5->id,
                                                    'userid' => $user->id
                                                   ));
        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362290100',
                                                    'courseid' => $course2->id,
                                                    'userid' => $user->id
                                                    ));
        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362280200',
                                                    'courseid' => $course1->id,
                                                    'userid' => $user->id
                                                   ));
        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362280400',
                                                    'courseid' => $course4->id,
                                                    'userid' => $user->id
                                                   ));
        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362280300',
                                                    'courseid' => $course3->id,
                                                    'userid' => $user->id
                                                   ));
        $DB->insert_record('user_lastaccess', array('timeaccess' => '1362290200',
                                                    'courseid' => -1,
                                                    'userid' => $user->id
                                                   ));

        $role = $DB->get_record('role', array('shortname' => 'manager'));
        $plugin = enrol_get_plugin('manual');

        // Return only 4 courses.
        set_config('recent_courses_display_limit', 4, KALTURA_PLUGIN_NAME);

        $courses = array($course1, $course2, $course3, $course4);

        foreach ($courses as $course) {
            $coursecontext = context_course::instance($course->id);
            $instance = $DB->get_record('enrol', array('courseid' => $course->id, 'enrol' => 'manual'));
            $plugin->enrol_user($instance, $user->id, $role->id);
            assign_capability('local/yukaltura:view_report', CAP_ALLOW, $role->id, $coursecontext);
        }

        $actual = recent_course_history_listing();

        $this->assertEquals($expected, $actual);
    }

    /**
     * Data provider for Moodle courses
     *
     * @return array An array of Moodle courses
     */
    public function course_provider() {
        $data = array(
            (object) array(
                'id' => '3',
                'idnumber' => 'id2',
                'fullname' => 'course2',
                'shortname' => 'crs2'
            ),
            (object) array(
                'id' => '5',
                'idnumber' => 'id4',
                'fullname' => 'course4',
                'shortname' => 'crs4'
            ),
            (object) array(
                'id' => '4',
                'idnumber' => 'id3',
                'fullname' => 'course3',
                'shortname' => 'crs3'
            ),
            (object) array(
                'id' => '2',
                'idnumber' => 'id1',
                'fullname' => 'course1',
                'shortname' => 'crs1'
            )
        );

        return array(array($data));
    }

}
