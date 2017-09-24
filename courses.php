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
 * YU Kaltura courses page
 *
 * @package    local
 * @subpackage yukaltura
 * @copyright  (C) 2013 Remote-Learner http://www.remote-learner.net
 * @copyright  (C) 2016-2017 Yamaguchi University <info-cc@ml.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once($CFG->dirroot . '/local/yukaltura/locallib.php');

require_login();

global $PAGE, $DB;

$id = optional_param('course_id', 0, PARAM_INT);
$action = optional_param('action', '', PARAM_TEXT);
$query = optional_param('query', '', PARAM_TEXT);

$PAGE->set_context(context_system::instance());

if ($action == 'search') {
    if (($courses = search_course($query)) === false) {
        echo "An error occured on the server";
        die;
    }
    $renderer = $PAGE->get_renderer('local_yukaltura');
    echo $renderer->render_courses($courses, $query, 'search');
}

if ($action == 'autocomplete') {
    if (($courses = search_course($query)) === false) {
        echo json_encode(array('failure' => true, 'message' => 'An error occured on the server'));
        die;
    }
    $data = new stdClass();
    $data->courses = $courses;
    $crs = new stdClass();
    $crs->data = $data;

    echo json_encode($crs);
}

if ($action == 'recent_courses') {
    if (($courses = recent_course_history_listing()) === false) {
        echo "An error occured on the server";
        die;
    }
    $renderer = $PAGE->get_renderer('local_yukaltura');
    echo $renderer->render_courses($courses, '', 'recent_courses');
}

if ($action == 'select_course') {
    if ($fullname = $DB->get_field('course', 'fullname', array('id' => $id))) {
        $reporturl  = get_config(KALTURA_PLUGIN_NAME, 'report_uri');
        $session = local_yukaltura_generate_weak_kaltura_session($id, $fullname);
        if (!empty($session)) {
            echo json_encode(array('url' => urlencode("{$reporturl}/index.php/plugin/CategoryMediaReportAction?hpks={$session}")));
            die;
        }
    }
    echo json_encode(array('failure' => true, 'message' => 'An error occured on the server'));
}
