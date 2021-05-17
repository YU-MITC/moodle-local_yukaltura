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
 * Test script for YU Kaltura Media Local Libaries
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2021 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../config.php');
global $CFG;
require_once($CFG->dirroot . '/local/yukaltura/locallib.php');

global $USER, $PAGE;

$PAGE->set_url('/local/yukaltura/test.php');
$PAGE->set_context(context_system::instance());

require_login();

/** @var core_renderer $OUTPUT */
$OUTPUT;

echo $OUTPUT->header();

require_capability('moodle/site:config', $PAGE->context);

$session = local_yukaltura_login(false, true, '', 2);

if ($session) {
    echo 'Connection successful';
} else {
    echo 'Connection not successful.';
}
