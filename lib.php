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
 * YU Kaltura Local Libraries.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2021 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Print specific headers if needed.
 */
function local_yukaltura_before_http_headers() {
    global $PAGE;

    if ($PAGE->has_set_url()) {
        $paths = [
            '/local/yukaltura/media_properties.php',
            '/local/yukaltura/simple_selector.php'
        ];
        foreach ($paths as $path) {
            if ($PAGE->url->compare(new moodle_url($path), URL_MATCH_BASE)) {
                header('Access-Control-Allow-Origin: *');
                break;
            }
        }
    }

}
