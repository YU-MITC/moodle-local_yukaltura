<?php
// This file is part of Moodle - http://moodle.org
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
 * YU Kaltura Media Properties page
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2021 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../config.php');
global $CFG;
require_once($CFG->dirroot . '/local/yukaltura/locallib.php');

global $SESSION, $USER, $COURSE, $OUTPUT, $PAGE, $SITE;

$PAGE->set_context(context_course::instance($COURSE->id));
$PAGE->set_cacheable(false);

$header  = format_string($SITE->shortname).": " . get_string('media_prop_header', 'local_yukaltura');

$PAGE->set_url('/local/yukaltura/media_properties.php');

$PAGE->set_pagetype('player-properties');
$PAGE->set_pagelayout('embedded');
$PAGE->set_title($header);
$PAGE->set_heading("");
$PAGE->add_body_class('player-properties');
$PAGE->requires->css('/local/yukaltura/css/simple_selector.css', true);
$PAGE->requires->js_call_amd('local_yukaltura/properties', 'init',
                             array(
                                 $CFG->wwwroot . "/local/yukaltura/media_properties.php",
                                 get_string('invalid_name', 'local_yukaltura'),
                                 get_string('empty_size', 'local_yukaltura'),
                                 get_string('invalid_custom_size', 'local_yukaltura'),
                                 get_string('invalid_size', 'local_yukaltura')
                             )
                            );

echo $OUTPUT->header();

// Connect to Kaltura server.
$kaltura = new yukaltura_connection();
$connection = $kaltura->get_connection(false, true, KALTURA_SESSION_LENGTH);

if (!$connection) {
    $url = new moodle_url('/admin/settings.php', array('section' => 'local_yukaltura'));
    throw new moodle_exception('conn_failed', 'local_yukaltura', $url);
}

$partnerid = local_yukaltura_get_partner_id();
$loginsession = '';

$renderer = $PAGE->get_renderer('local_yukaltura');

try {

    echo $renderer->create_properties_markup();

} catch (Exception $ex) {
    throw new moodle_exception('problem_viewing', 'local_yukaltura');
}

echo $OUTPUT->footer();

