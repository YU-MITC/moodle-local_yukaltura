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
 * @copyright  (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/local/yukaltura/locallib.php');

if (!defined('MOODLE_INTERNAL')) {
    // It must be included from a Moodle page.
    die('Direct access to this script is forbidden.');
}

global $SESSION, $USER, $COURSE;

$PAGE->set_context(context_system::instance());

$header  = format_string($SITE->shortname).": Media Properties";

$PAGE->set_url('/local/yukaltura/media_properties.php');
$PAGE->set_course($COURSE);

$PAGE->set_pagetype('mymedia-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title($header);
$PAGE->set_heading($header);
$PAGE->add_body_class('mymedia-index');
$PAGE->requires->js('/local/yukaltura/js/encoding.js', true);
$PAGE->requires->js('/local/yukaltura/js/jquery-3.0.0.js', true);
$PAGE->requires->js('/local/yukaltura/js/simple_selector.js', true);
$PAGE->requires->css('/local/yukaltura/css/simple_selector.css', true);

// Connect to Kaltura server.
$kaltura = new yukaltura_connection();
$connection = $kaltura->get_connection(true, KALTURA_SESSION_LENGTH);

if (!$connection) {
    $url = new moodle_url('/admin/settings.php', array('section' => 'local_yukaltura'));
    print_error('conn_failed', 'local_yukaltura', $url);
}

$partnerid    = local_yukaltura_get_partner_id();
$loginsession = '';

$context = context_user::instance($USER->id);

$renderer = $PAGE->get_renderer('local_yukaltura');

echo '<!DOCTYPE html>';
echo '<html lang="ja">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<link rel="stylesheet" type="text/css" href="css/simple_selector.css">';
echo '<title>Simple Selector</title>';
echo '<script src="js/simple_selector.js"></script>';
echo '<script src="js/jquery-1.2.6.js"></script>';
echo '<script src="js/jquery-3.0.0.js"></script>';
echo '<script src="js/encoding.js"></script>';
echo '</head>';
echo '<body text="black" bgcolor="white" link="blue" alink="red" vlink="purple" onload="loadPropertiesParameter()">';

try {

    echo $renderer->create_properties_markup();

} catch (Exception $ex) {
    $errormessage = 'View - error main page(' .  $ex->getMessage() . ')';
    print_error($errormessage, 'local_yukaltura');
    echo get_string('problem_viewing', 'local_yukaltura');
    echo $ex->getMessage();
}

echo '</body>';
echo '</html>';

