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
 * Embed media selector script
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2021 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../config.php');
global $CFG;
require_once($CFG->dirroot . '/local/yukaltura/locallib.php');

global $SESSION, $USER, $COURSE, $PAGE, $SITE;

$page = optional_param('page', 0, PARAM_INT);
$sort = optional_param('sort', 'recent', PARAM_TEXT);
$simplesearch = '';
$medias = 0;

$PAGE->set_context(context_system::instance());
$PAGE->set_cacheable(false);
$header = format_string($SITE->shortname).": simple_selector";

$PAGE->set_pagetype('simple_selector');
$PAGE->set_url('/local/yukaltura/simple_selector.php');
$PAGE->set_course($COURSE);
$PAGE->set_pagelayout('embedded');
$PAGE->set_title($header);
$PAGE->set_heading($header);
$PAGE->add_body_class('mymedia-index');

require_login();

$PAGE->requires->css('/local/yukaltura/css/simple_selector.css', true);
$PAGE->requires->js_call_amd('local_yukaltura/simpleselector', 'init',
                             array($CFG->wwwroot . "/local/yukaltura/simple_selector.php", null));

// Connect to Kaltura server.
$kaltura = new yukaltura_connection();
$connection = $kaltura->get_connection(false, true, KALTURA_SESSION_LENGTH);

if (!$connection) {
    $url = new moodle_url('/admin/settings.php', array('section' => 'local_yukaltura'));
    throw new moodle_exception('conn_failed', 'local_yukaltura', $url);
}

$partnerid = local_yukaltura_get_partner_id();
$loginsession = '';

if ($data = data_submitted() and confirm_sesskey()) {

    // Make sure the user has the capability to search, and if the required parameter is set.
    if (has_capability('local/yukaltura:search_selector', $PAGE->context, $USER) && isset($data->simple_search_name)) {

        $data->simple_search_name = clean_param($data->simple_search_name, PARAM_NOTAGS);

        if (isset($data->simple_search_btn_name)) {
            $SESSION->local_yukaltura->selector = $data->simple_search_name;
        } else if (isset($data->clear_simple_search_btn_name)) {
            $SESSION->local_yukaltura->selector = '';
        }
    } else {
        // Clear the session variable in case the user's permissions were revoked during a search.
        $SESSION->local_yukaltura->selector = '';
    }
}

$context = context_user::instance($USER->id);

/** @var core_renderer $OUTPUT */
$OUTPUT;

echo $OUTPUT->header();

require_capability('local/yukaltura:view_selector', $context, $USER);

$renderer = $PAGE->get_renderer('local_yukaltura');

if (local_yukaltura_get_mymedia_permission()) {
    try {

        if (!$connection) {
            throw new Exception(get_string('conn_failed', 'local_yukaltura'));
        }

        $perpage = 9;

        if (empty($perpage)) {
            $perpage = MYMEDIA_ITEMS_PER_PAGE;
        }

        $SESSION->selectorsort = $sort;

        // Check if the sesison data is set.
        if (isset($SESSION->local_yukaltura->selector) && !empty($SESSION->local_yukaltura->selector)) {
            $medialist = local_yukaltura_search_mymedia_medias($connection, $SESSION->local_yukaltura->selector,
                                                               $page + 1, $perpage, $sort);
        } else {
            $medialist = local_yukaltura_search_mymedia_medias($connection, '', $page + 1, $perpage, $sort);
        }

        $total = $medialist->totalCount;

        if ($medialist instanceof KalturaMediaListResponse &&  0 < $medialist->totalCount ) {
            $medialist = $medialist->objects;

            $page = $renderer->paging_bar($total,
                                          $page,
                                          $perpage,
                                          new moodle_url('/local/yukaltura/simple_selector.php',
                                                         array('sort' => $sort)));

            $verstr = trim($CFG->release);
            $num = preg_match('/^[0-9]+/', $verstr, $matches);
            if ($num >= 1) {
                $vernum = (int)$matches[0];
                if ($vernum <= 2 && strpos($page, '<nav ') !== false) {
                    $index = strpos($page, '<nav ');
                    $first = substr($page, 0, $index + 5);
                    $second = substr($page, $index + 5);
                    $page = $first . 'class="mymedia pagingbar"' . $second;
                }
            }

            echo $renderer->create_options_table_upper($page, '', $SESSION->local_yukaltura->selector);

            echo $renderer->create_media_table($medialist);

            echo $renderer->create_options_table_lower($page);
        } else {

            echo $renderer->create_options_table_upper($page, '', $SESSION->local_yukaltura->selector);
            echo '<br><br><p align="center">'. get_string('no_media', 'local_yukaltura') . '</p>';
            echo $renderer->create_options_table_lower($page);

        }

        echo $renderer->create_selector_submit_form();

    } catch (Exception $ex) {
        throw new moodle_exception('problem_viewing', 'local_yukaltura');
    }
} else {
    echo $renderer->create_permission_message();
}

echo $OUTPUT->footer();
