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
 * My Media display library
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2019 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(dirname(dirname(dirname(__FILE__))) . '/lib/tablelib.php');

/**
 * Renderer class of local_yukaltura
 * @package local_yukaltura
 * @copyright  (C) 2016-2019 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class local_yukaltura_renderer extends plugin_renderer_base {

    /**
     * This function outputs a table layout for display media
     *
     * @param array $medialist - array of Kaltura media entry objects
     *
     * @return string - HTML markup for media table
     */
    public function create_media_table($medialist = array()) {
        $output = '';
        $maxcolumns = 3;

        $attr = array('border' => '0', 'align' => 'center', 'id' => 'selector_media');

        $output .= html_writer::start_tag('table', $attr);

        $row = 0;
        $col = 0;

        foreach ($medialist as $key => $media) {
            if ($col == 0) {
                $output .= html_writer::start_tag('tr');
            }

            $attr = array();

            if ($row == 0) {
                $attr = array('class' => 'selector_entry', 'align' => 'center', 'width' => '25%');
            } else {
                $attr = array('class' => 'selector_entry', 'align' => 'center');
            }

            $output .= html_writer::start_tag('td', $attr);
            if (KalturaEntryStatus::READY == $media->status) {
                $output .= $this->create_media_entry_markup($media, true);
            } else {
                $output .= $this->create_media_entry_markup($media, false);
            }

            $output .= html_writer::end_tag('td');

            $col = $col + 1;
            if ($col == $maxcolumns) {
                $row = $row + 1;
                $col = 0;
                $output .= html_writer::end_tag('tr');
            }
        }

        if ($col >= 1) {
            $output .= html_writer::end_tag('tr');
        }

        $output .= html_writer::end_tag('table');

        return $output;
    }

    /**
     * This function creates HTML markup used to sort the media listing.
     * @param string $url - URL of selector page,
     * @return string - HTML markup for sorting pulldown.
     */
    public function create_sort_option($url = '') {
        global $SESSION;

        $recent = null;
        $old = null;
        $nameasc = null;
        $namedesc = null;

        if (empty($url) || $url == '') {
            $url = '/local/yukaltura/simple_selector.php';
        }

        $sorturl = new moodle_url($url);
        $sorturl .= "?sort=";

        if (isset($SESSION->selectorsort) && !empty($SESSION->selectorsort)) {
            $sort = $SESSION->selectorsort;
            if ($sort == 'recent') {
                $recent = "selected";
            } else if ($sort == 'old') {
                $old = "selected";
            } else if ($sort == 'name_asc') {
                $nameasc = "selected";
            } else if ($sort == 'name_desc') {
                $namedesc = "selected";
            } else {
                $recent = "selected";
            }
        } else {
            $recent = "selected";
        }

        $sort = '';

        $attr = array('cellpadding' => '0', 'border' => 0);

        $sort .= html_writer::start_tag('table', $attr);

        $sort .= html_writer::start_tag('tr');

        $attr = array('valign' => 'middle');

        $sort .= html_writer::start_tag('td', $attr);

        $sort .= get_string('sortby', 'local_yukaltura').':';
        $sort .= '&nbsp;';

        $sort .= html_writer::end_tag('td');
        $sort .= html_writer::start_tag('td');
        $sort .= '&nbsp;';
        $sort .= html_writer::start_tag('select', array('id' => 'selectorSort'));

        $attr = array('value' => $sorturl . 'recent');

        if ($recent != null) {
            $attr['selected'] = 'selected';
        }

        $sort .= html_writer::tag('option', get_string('mostrecent', 'local_yukaltura'), $attr);

        $attr = array('value' => $sorturl . 'old');

        if ($old != null) {
            $attr['selected'] = 'selected';
        }

        $sort .= html_writer::tag('option', get_string('oldest', 'local_yukaltura'), $attr);

        $attr = array('value' => $sorturl . 'name_asc');

        if ($nameasc != null) {
            $attr['selected'] = 'selected';
        }

        $sort .= html_writer::tag('option', get_string('medianameasc', 'local_yukaltura'), $attr);

        $attr = array('value' => $sorturl . 'name_desc');

        if ($namedesc != null) {
            $attr['selected'] = 'selected';
        }

        $sort .= html_writer::tag('option', get_string('medianamedesc', 'local_yukaltura'), $attr);

        $sort .= html_writer::end_tag('select');

        $sort .= html_writer::end_tag('td');
        $sort .= html_writer::end_tag('tr');
        $sort .= html_writer::end_tag('table');

        return $sort;
    }


    /**
     * This function creates HTML markup used to display table upper options.
     *
     * @param string $page - HTML text (paging markup).
     * @param string $url - URL of selector page.
     * @param string $searchkeyword - searchkeyword.
     * @return string - HTML text added sorting pulldown.
     */
    public function create_options_table_upper($page, $url = '', $searchkeyword = '') {
        global $USER;

        $output = '';

        $simplesearch = '';

        $context = context_user::instance($USER->id);

        if (has_capability('local/yukaltura:search_selector', $context, $USER)) {
            $simplesearch = $this->create_search_markup($url, $searchkeyword);
        }

        $output .= $simplesearch;

        if (!empty($page)) {
            $attr = array('border' => 0, 'width' => '100%');
            $output .= html_writer::start_tag('table', $attr);

            $output .= html_writer::start_tag('tr');

            $attr = array('colspan' => 3, 'align' => 'center');
            $output .= html_writer::start_tag('td', $attr);

            $output .= $page;

            $output .= html_writer::end_tag('td');

            $output .= html_writer::end_tag('tr');

            $output .= html_writer::end_tag('table');
        }

        return $output;
    }

    /**
     * This function creates HTML markup used to display table lower options.
     *
     * @param string $page - HTML text (paging markup).
     * @return string - HTML markup for sorting pulldown.
     */
    public function create_options_table_lower($page) {

        $output = '';

        $attr = array('border' => 0, 'width' => '100%');
        $output .= html_writer::start_tag('table', $attr);

        $output .= html_writer::start_tag('tr');

        $attr = array('colspan' => 3, 'align' => 'center');
        $output .= html_writer::start_tag('td', $attr);

        $output .= $page;

        $output .= html_writer::end_tag('td');

        $output .= html_writer::end_tag('tr');

        $output .= html_writer::end_tag('table');

        return $output;
    }

    /**
     * This function creates HTML markup used to display the media name
     *
     * @param string $name - name of media entry.
     *
     * @return string - HTML markup for media name part.
     */
    public function create_media_name_markup($name) {

        $output = '';
        $attr = array('class' => 'selector media name',
                        'title' => $name);

        $output .= html_writer::start_tag('div', $attr);
        $output .= html_writer::tag('label', $name);
        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * This function creates HTML markup used to display the media thumbnail
     *
     * @param string $url - thumbnail URL
     * @param string $alt - alternate text
     * @param string $entryid - id of Kaltura Media entry.
     *
     * @return string - HTML markup
     */
    public function create_media_thumbnail_markup($url, $alt, $entryid) {

        $output = '';

        $attr   = array('class' => 'selector media thumbnail');
        $output .= html_writer::start_tag('div', $attr);

        $attr    = array('src' => $url . '/width/120/height/90/type/3',
                         'class' => 'media_thumbnail',
                         'id' => $entryid,
                         'alt' => $alt,
                         'height' => '90',
                         'width'  => '120',
                         'title' => $alt);

        $output .= html_writer::empty_tag('img', $attr);

        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * This function creates HTML markup used to display the media created daytime.
     *
     * @param string $date - name of media
     *
     * @return string - HTML markup
     */
    public function create_media_created_markup($date) {

        $output = '';
        $attr = array('class' => 'selector media created',
                      'title' => userdate($date));

        $output .= html_writer::start_tag('div', $attr);
        $output .= html_writer::tag('label', userdate($date));
        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * This function creates HTML markup for a media entry
     *
     * @param obj $entry - Kaltura media object
     * @param bool $entryready - true if entry is ready,
     *
     * @return string - HTML Markup for media entry.
     */
    public function create_media_entry_markup($entry, $entryready = true) {

        $output = '';

        $attr = array('class' => 'selector media entry',
                      'align' => 'center',
                      'id' => $entry->id);

        $output .= html_writer::start_tag('div', $attr);

        $originalurl = $entry->thumbnailUrl;

        $httppattern = '/^http:\/\/[A-Za-z0-9\-\.]{1,61}\//';
        $httpspattern = '/^https:\/\/[A-Za-z0-9\-\.]{1,61}\//';

        $replace = local_yukaltura_get_host() . '/';

        $modifiedurl = preg_replace($httpspattern, $replace, $originalurl, 1, $count);
        if ($count != 1) {
            $modifiedurl = preg_replace($httppattern, $replace, $originalurl, 1, $count);
            if ($count != 1) {
                $modifiedurl = $originalurl;
            }
        }

        if ($entryready) {

            $output .= $this->create_media_thumbnail_markup($modifiedurl,
                                                            $entry->name, $entry->id);
        } else {

            $output .= $this->create_media_thumbnail_markup($modifiedurl,
                                                            $entry->name, $entry->id);
        }

        $type = "video";

        if (KalturaMediaType::IMAGE == $entry->mediaType) {
            $type = "image";
        }

        if (KalturaMediaType::AUDIO == $entry->mediaType) {
            $type = "audio";
        }

        $attr = array('type' => 'hidden',
                       'name' => $entry->id . '_filetype',
                       'id' => $entry->id . '_filetype',
                       'value' => $type);
        $output .= html_writer::start_tag('input', $attr);

        $attr = array('type' => 'hidden',
                       'name' => $entry->id . '_width',
                       'id' => $entry->id . '_width',
                       'value' => $entry->width);
        $output .= html_writer::start_tag('input', $attr);

        $attr = array('type' => 'hidden',
                       'name' => $entry->id . '_height',
                       'id' => $entry->id . '_height',
                       'value' => $entry->height);
        $output .= html_writer::start_tag('input', $attr);

        $output .= html_writer::end_tag('div');

        $attr = array('id' => 'description_'. $entry->id, 'style' => 'display: none;');
        $output .= html_writer::start_tag('div', $attr);
        if ($entry->description != null && $entry->description != '') {
            $output .= $entry->description;
        }
        $output .= html_writer::end_tag('div');

        // Add entry to cache.
        KalturaStaticEntries::add_entry_object($entry);
        return $output;

    }

    /**
     * This function creates HTML markup for a search tool box.
     * @param string $url - URL of selector page.
     * @param string $searchkeyword - search keyword.
     * @return string - HTML markup for search tool box.
     */
    public function create_search_markup($url = '', $searchkeyword = '') {
        global $SESSION;

        if (empty($url) || $url == '') {
            $url = '/local/yukaltura/simple_selector.php';
        }

        $output = '';

        $attr = array('id' => 'simple_search_container',
                      'class' => 'selector simple search container');

        $output .= html_writer::start_tag('span', $attr);

        $attr = array('method' => 'post',
                      'action' => new moodle_url($url),
                      'class' => 'selector search form');

        $output .= html_writer::start_tag('form', $attr);

        $attr = array('align' => 'right', 'border' => '0', 'cellpadding' => '0');

        $output .= html_writer::start_tag('table', $attr);

        $output .= html_writer::start_tag('tr');
        $output .= html_writer::start_tag('td');

        $attr = array('cellpadding' => '0', 'border' => 0);

        $output .= html_writer::start_tag('table', $attr);

        $output .= html_writer::start_tag('tr');

        $attr = array('valign' => 'middle');

        $output .= html_writer::start_tag('td', $attr);

        $attr = array('for' => 'simple_search', 'id' => 'search_label');
        $output .= get_string('search', 'local_yukaltura') . ':';
        $output .= '&nbsp;';

        $output .= html_writer::end_tag('td');
        $output .= html_writer::start_tag('td', $attr);

        $output .= '&nbsp;';

        $defaultvalue = (isset($searchkeyword) && !empty($searchkeyword)) ? $searchkeyword : '';
        $attr = array('type' => 'text',
                      'id' => 'simple_search',
                      'class' => 'selector simple search',
                      'name' => 'simple_search_name',
                      'size' => '30',
                      'value' => $defaultvalue,
                      'title' => get_string('search_text_tooltip', 'local_yukaltura'),
                      'style' => 'display: inline;');

        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('td');
        $output .= html_writer::end_tag('tr');
        $output .= html_writer::end_tag('table');

        $attr = array('type' => 'hidden',
                      'id' => 'sesskey_id',
                      'name' => 'sesskey',
                      'value' => sesskey());

        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('td');

        $output .= html_writer::start_tag('td');

        $attr = array('type' => 'submit',
                      'id'   => 'simple_search_btn',
                      'name' => 'simple_search_btn_name',
                      'value' => get_string('search', 'local_yukaltura'),
                      'class' => 'selector simple search button',
                      'title' => get_string('search', 'local_yukaltura'));

        $output .= html_writer::empty_tag('input', $attr);

        $attr   = array('type' => 'submit',
                        'id'   => 'clear_simple_search_btn',
                        'name' => 'clear_simple_search_btn_name',
                        'value' => get_string('search_clear', 'local_yukaltura'),
                        'class' => 'selector simple search button clear',
                        'title' => get_string('search_clear', 'local_yukaltura'));

        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('td');
        $output .= html_writer::end_tag('tr');

        $output .= html_writer::end_tag('table');

        $output .= html_writer::end_tag('form');

        $output .= html_writer::end_tag('span');

        return $output;
    }

    /**
     * This function creates HTML markup for loading screen.
     *
     * @return string - HTML markup for loading screen.
     */
    public function create_loading_screen_markup() {

        $output = '';

        $attr = array('id' => 'wait');
        $output .= html_writer::start_tag('div', $attr);

        $attr = array('class' => 'hd');
        $output .= html_writer::tag('div', '', $attr);

        $attr = array('class' => 'bd');

        $output .= html_writer::tag('div', '', $attr);

        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * This function creates HTML markup for selected media name, submit button, and cancel button.
     * @param string $type - Module type.
     * @return string - HTML markup for selected media name, submit button, and cancel button.
     */
    public function create_selector_submit_form($type = '') {
        $output = '';

        $output .= get_string('selected_media', 'local_yukaltura') . ' : ';

        $attr = array('id' => 'select_name', 'name' => 'select_name');
        $output .= html_writer::start_tag('span', $attr);
        $output .= 'N/A';
        $output .= html_writer::end_tag('span');

        $output .= '<br>';

        if ($type != 'atto') {

            $attr = array('type' => 'hidden', 'id' => 'select_id', 'name' => 'select_id', 'value' => '');
            $output .= html_writer::empty_tag('input', $attr);

            $attr = array('type' => 'hidden', 'id' => 'select_thumbnail', 'name' => 'select_thumbnail', 'value' => '');
            $output .= html_writer::empty_tag('input', $attr);

            $attr = array('border' => '0', 'align' => 'right', 'cellpadding' => '10');
            $output .= html_writer::start_tag('table', $attr);

            $output .= html_writer::start_tag('tr', array());

            $output .= html_writer::start_tag('td', array());

            $attr = array('type' => 'button', 'id' => 'submit_btn', 'name' => 'submit_btn',
                      'value' => get_string('ok_label', 'local_yukaltura'), 'disabled' => 'true');
            $output .= html_writer::empty_tag('input', $attr);

            $output .= html_writer::end_tag('td');

            $output .= html_writer::start_tag('td', array());

            $attr = array('type' => 'button', 'id' => 'cancel_btn', 'name' => 'cancel_btn',
                          'value' => get_string('cancel_label', 'local_yukaltura'));
            $output .= html_writer::empty_tag('input', $attr);

            $output .= html_writer::end_tag('td');

            $output .= html_writer::end_tag('tr');

            $output .= html_writer::end_tag('table');
        }

        return $output;
    }

    /**
     * This function creates HTML markup used to display media properties.
     *
     * @return string - HTML markup for media properties.
     */
    public function create_properties_markup() {
        $output = '';

        // Panel markup to set media properties.

        $attr = array('class' => 'media_properties_header');
        $output .= html_writer::tag('div', '<center>' . get_string('media_prop_header', 'local_yukaltura') . '</center>', $attr);
        $output .= html_writer::start_tag('br', array());

        $attr = array('class' => 'media_properties_body');

        $propertiesmarkup = $this->get_media_preferences_markup();

        $output .= html_writer::tag('div', $propertiesmarkup, $attr);

        $output .= html_writer::start_tag('br', array());
        $output .= html_writer::start_tag('br', array());

        $output .= $this->create_properties_submit_markup();

        return $output;
    }

    /**
     * Create player properties panel markup.  Default values are loaded from
     * the javascript (see function "handle_cancel" in kaltura.js
     *
     * @return string - HTML markup of media preferences.
     */
    public function get_media_preferences_markup() {
        $output = '';

        // Display name input box.
        $attr = array('for' => 'media_prop_name');
        $output .= html_writer::tag('label', get_string('media_prop_name', 'local_yukaltura'), $attr);
        $output .= '&nbsp;';

        $attr = array('type' => 'text',
                      'id' => 'media_prop_name',
                      'name' => 'media_prop_name',
                      'size' => '40',
                      'value' => '',
                      'maxlength' => '100');
        $output .= html_writer::empty_tag('input', $attr);
        $output .= html_writer::empty_tag('br');
        $output .= html_writer::empty_tag('br');

        // Display section element for player design.
        $attr = array('for' => 'media_prop_player');
        $output .= html_writer::tag('label', get_string('media_prop_player', 'local_yukaltura'), $attr);
        $output .= '&nbsp;';

        list($options, $defaultoption) = $this->get_media_resource_players();

        $attr = array('id' => 'media_prop_player');

        $output .= html_writer::select($options, 'media_prop_player', $defaultoption, false, $attr);
        $output .= html_writer::empty_tag('br');
        $output .= html_writer::empty_tag('br');

        // Display player size drop down button.
        $attr = array('for' => 'media_prop_size');
        $output .= html_writer::tag('label', get_string('media_prop_size', 'local_yukaltura'), $attr);
        $output .= '&nbsp;';

        $options = array(0 => get_string('media_prop_size_large', 'local_yukaltura'),
                         1 => get_string('media_prop_size_small', 'local_yukaltura'),
                         2 => get_string('media_prop_size_custom', 'local_yukaltura')
                         );

        $attr = array('id' => 'media_prop_size');
        $selected = !empty($defaults) ? $defaults['media_prop_size'] : array();

        $output .= html_writer::select($options, 'media_prop_size', $selected, array(), $attr);

        // Display custom player size.
        $output .= '&nbsp;&nbsp;';

        $attr = array('type' => 'text',
                      'id' => 'media_prop_width',
                      'name' => 'media_prop_width',
                      'value' => '',
                      'maxlength' => '4',
                      'size' => '4'
                      );
        $output .= html_writer::empty_tag('input', $attr);

        $output .= '&nbsp;x&nbsp;';

        $attr = array('type' => 'text',
                      'id' => 'media_prop_height',
                      'name' => 'media_prop_height',
                      'value' => '',
                      'maxlength' => '4',
                      'size' => '4'
                      );
        $output .= html_writer::empty_tag('input', $attr);

        return $output;
    }

    /**
     * This function returns an array of media resource players.
     *
     * If the override configuration option is checked, then this function will
     * only return a single array entry with the overridden player
     *
     * @return array - First element will be an array whose keys are player ids
     * and values are player name.  Second element will be the default selected
     * player.  The default player is determined by the Kaltura configuraiton
     * settings (local_yukaltura).
     */
    public function get_media_resource_players() {

        // Get user's players.
        $players = local_yukaltura_get_custom_players();

        // Kaltura regular player selection.
        $choices = array(KALTURA_PLAYER_PLAYERREGULARDARK  => get_string('player_regular_dark', 'local_yukaltura'),
                         KALTURA_PLAYER_PLAYERREGULARLIGHT => get_string('player_regular_light', 'local_yukaltura'),
                         );

        if (!empty($players)) {
            $choices = $choices + $players;
        }

        // Set default player only if the user is adding a new activity instance.
        $defaultplayerid = local_yukaltura_get_player_uiconf('player_resource');

        // If the default player id does not exist in the list of choice.
        // Then the user must be using a custom player id, add it to the list.
        if (!array_key_exists($defaultplayerid, $choices)) {
            $choices = $choices + array($defaultplayerid => get_string('custom_player', 'local_yukaltura'));
        }

        // Check if player selection is globally overridden.
        if (local_yukaltura_get_player_override()) {
            return array(array( $defaultplayerid => $choices[$defaultplayerid]),
                         $defaultplayerid
                        );
        }

        return array($choices, $defaultplayerid);
    }

    /**
     * This function creates HTML markup used to display properties submit block.
     *
     * @return string - HTML markup for propertied submit block.
     */
    public function create_properties_submit_markup() {
        $output = '';

        $attr = array('border' => '0', 'align' => 'right', 'cellpadding' => '0');
        $output .= html_writer::start_tag('table', $attr);

        $output .= html_writer::start_tag('tr', array());

        $output .= html_writer::start_tag('td', array());

        $attr = array('type' => 'button', 'id' => 'submit_btn', 'name' => 'submit_btn',
                      'value' => 'OK');
        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('td');

        $output .= html_writer::start_tag('td', array());

        $attr = array('type' => 'button', 'id' => 'cancel_btn', 'name' => 'cancel_btn',
                      'value' => 'Cancel, Close');
        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('td');

        $output .= html_writer::end_tag('tr');

        $output .= html_writer::end_tag('table');

        return $output;

    }

    /**
     * This function creates HTML markup used to display no permission message.
     *
     * @return string - HTML markup for no permission message.
     */
    public function create_permission_message() {
        $output = '';

        $output .= html_writer::start_tag('center');

        $output .= get_string('permission_disable', 'local_yukaltura');

        $output .= html_writer::empty_tag('br');
        $output .= html_writer::empty_tag('br');

        $attr = array('type' => 'button',
                      'name' => 'faedeout',
                      'id' => 'fadeout',
                      'value' => 'Close'
                     );

        $output .= html_writer::empty_tag('input', $attr);

        $output .= html_writer::end_tag('center');

        return $output;
    }

    /**
     * This function creates HTML markup used to print hidden parameters for atto plugin.
     *
     * @return string - HTML markup for atto plugin.
     */
    public function create_atto_hidden_markup() {
        $output = '';

        $kalturahost = local_yukaltura_get_host();
        $partnerid = local_yukaltura_get_partner_id();
        $uiconfid = local_yukaltura_get_player_uiconf('player_atto');
        list($playerwidth, $playerheight) = local_yukaltura_get_atto_player_dimension();

        $attr = array('type' => 'hidden',
                      'name' => 'kalturahost',
                      'id' => 'kalturahost',
                      'value' => $kalturahost
                     );

        $output .= html_writer::empty_tag('input', $attr);

        $attr = array('type' => 'hidden',
                      'name' => 'partnerid',
                      'id' => 'partnerid',
                      'value' => $partnerid
                     );

        $output .= html_writer::empty_tag('input', $attr);

        $attr = array('type' => 'hidden',
                      'name' => 'uiconfid',
                      'id' => 'uiconfid',
                      'value' => $uiconfid
                     );

        $output .= html_writer::empty_tag('input', $attr);

        $attr = array('type' => 'hidden',
                      'name' => 'player_width',
                      'id' => 'player_width',
                      'value' => $playerwidth
                     );

        $output .= html_writer::empty_tag('input', $attr);

        $attr = array('type' => 'hidden',
                      'name' => 'player_height',
                      'id' => 'player_height',
                      'value' => $playerheight
                     );

        $output .= html_writer::empty_tag('input', $attr);

        return $output;
    }
}
