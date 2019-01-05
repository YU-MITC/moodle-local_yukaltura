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
 * YU Kaltura check media conversion status AND returns the embedded media markup
 *
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2019 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/local/yukaltura/locallib.php');

$entryid  = required_param('entry_id', PARAM_TEXT);
$height   = optional_param('height', 0, PARAM_INT);
$width    = optional_param('width', 0, PARAM_INT);
$uiconfid = optional_param('uiconf_id', 0, PARAM_INT);
$title    = optional_param('media_title', '', PARAM_TEXT);
$widget   = optional_param('widget', 'kdp', PARAM_TEXT);
$courseid = required_param('courseid', PARAM_INT);

defined('MOODLE_INTERNAL') || die();

require_login();

$thumbnail = '';
$data = new stdClass();
$entryobj = null;

// If request is for a kaltura dynamic player get the entry object, disregarding the entry object status.
if (0 == strcmp($widget, 'kdp')) {

    $entryobj = local_yukaltura_get_ready_entry_object($entryid, false);

    // Determine the type of media (See KALDEV-28).
    if (!local_yukaltura_media_type_valid($entryobj)) {
        $entryobj = local_yukaltura_get_ready_entry_object($entryobj->id, false);
    }

    $entryobj->height = !empty($height) ? $height : $entryobj->height;
    $entryobj->width = !empty($width) ? $width : $entryobj->width;

    $data = $entryobj;

    if (KalturaEntryStatus::READY == (string) $entryobj->status) {

        // Create the user KS session.
        $session = local_yukaltura_generate_kaltura_session(true, array($entryobj->id));

        $data->markup = local_yukaltura_get_iframeembed_code($entryobj, $uiconfid, $courseid, $session);

        if (local_yukaltura_has_mobile_flavor_enabled() && local_yukaltura_get_enable_html5()) {
            $data->script = 'kAddedScript = false; kCheckAddScript();';
        }

    } else {
        switch ((string) $entryobj->status) {
            case KalturaEntryStatus::ERROR_IMPORTING:
                $data->markup = get_string('media_error', 'local_yukaltura');
                break;
            case KalturaEntryStatus::ERROR_CONVERTING:
                $data->markup = get_string('media_error', 'local_yukaltura');
                break;
            case KalturaEntryStatus::INFECTED:
                $data->markup = get_string('media_bad', 'local_yukaltura');
                break;
        }
    }

} else if (0 == strcmp($widget, 'kpdp')) {
    // If request is for a kaltura presentation dynamic player, get the entry object only when it is ready.
    $entryobj = local_yukaltura_get_ready_entry_object($entryid);

    $adminmode = optional_param('admin_mode', 0, PARAM_INT);
    $adminmode = empty($adminmode) ? false : true;

    $data->markup = local_yukaltura_get_kdp_presentation_player($entryobj, $adminmode);

    // Pre-set the height and width of the media presentation popup panel.
    $data->height = 400;
    $data->width = 780;

}

$data = json_encode($data);

echo $data;

die();
