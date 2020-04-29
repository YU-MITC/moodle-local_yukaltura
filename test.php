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
 * @copyright  (C) 2016-2020 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/locallib.php');

defined('MOODLE_INTERNAL') || die();

global $CFG, $USER, $PAGE;

$context = get_context_instance(CONTEXT_SYSTEM);

$url = new moodle_url('/local/yukaltura/test.php');

$PAGE->set_url($url);
$PAGE->set_context($context);

require_login();

echo $OUTPUT->header();

require_capability('moodle/site:config', $context);

$session = local_yukaltura_login(false, true, '', 2);

if ($session) {
    echo 'Connection successful';
} else {
    echo 'Connection not successful.';
}
