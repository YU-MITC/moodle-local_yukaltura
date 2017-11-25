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
 * YU Kaltura Local Libraries setting script
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <info-cc@ml.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/locallib.php');

defined('MOODLE_INTERNAL') || die();

require_login();

$param = optional_param('section', '', PARAM_TEXT);

/*
 * $enableapicalls is a flag to enable the settings page to make API calls to
 * Kaltura.  This is done to reduce API calls when they are not needed/used.
 *
 * The API has to be called under the following criteria:
 * - Displaying the Kaltura settings page
 * - Upgrade settings page is displayed
 * (when a new plug-in is detected and is to be installed) -
 * - A global search is performed (searching from the administration block)
 */

// Check for specific reference to display the Kaltura settings page.
$settingspage = !strcmp(KALTURA_PLUGIN_NAME, $param);

// Check if the upgrade page is being displayed.
$upgradepage = isset($_SERVER['REQUEST_URI']) ? strpos($_SERVER['REQUEST_URI'], "/admin/upgradesettings.php") : false;

// Check if a global search was performed.
$globalsearchpage = isset($_SERVER['REQUEST_URI']) ? strpos($_SERVER['REQUEST_URI'], "/admin/search.php") : false;

$enableapicalls = $settingspage || $upgradepage || $globalsearchpage;

if ($hassiteconfig) {

    global $SESSION;

    // Add local plug-in configuration settings link to the navigation block.
    $settings = new admin_settingpage('local_yukaltura', get_string('pluginname', 'local_yukaltura'));
    $ADMIN->add('localplugins', $settings);

    $settings->add(new admin_setting_heading('kaltura_conn_heading',
                                             get_string('conn_heading_title', 'local_yukaltura'),
                                             get_string('conn_heading_desc', 'local_yukaltura')));

    // Connection status headers.
    $initialized = false;

    // Check to see if the username, password or uri has changed.
    $login = get_config(KALTURA_PLUGIN_NAME, 'login');
    $loginprevious = get_config(KALTURA_PLUGIN_NAME, 'login_previous');
    $password = get_config(KALTURA_PLUGIN_NAME, 'password');
    $passwordprevious = get_config(KALTURA_PLUGIN_NAME, 'password_previous');
    $uri = get_config(KALTURA_PLUGIN_NAME, 'uri');
    $uriprevious = get_config(KALTURA_PLUGIN_NAME, 'uri_previous');

    // Check if a new URI has been entered.
    $newuri = ( ($uri && !$uriprevious) || (0 != strcmp($uri, $uriprevious)) ) ? true : false;

    // Must be the first time they saved data.  Retrieve Kaltura account and initiate becon to kaltura.
    $newlogin = ( ($login && !$loginprevious) || (0 != strcmp($login, $loginprevious)) ) ? true : false;

    // If the login is the same check if the user updated the password.
    $newpasswd = ( ($password && !$passwordprevious) || (0 != strcmp($password, $passwordprevious)) ) ? true : false;

    if ($newuri || $newlogin || $newpasswd) {

        $uri = get_config(KALTURA_PLUGIN_NAME, 'uri');

        $initialized = local_yukaltura_initialize_account($login, $password, $uri);

        if (empty($initialized)) {
            local_yukaltura_uninitialize_account();
        }

        set_config('uri_previous', $uri, KALTURA_PLUGIN_NAME);
        set_config('login_previous', $login, KALTURA_PLUGIN_NAME);
        set_config('password_previous', $password, KALTURA_PLUGIN_NAME);

        unset($SESSION->kaltura_con);
        unset($SESSION->kaltura_con_timeout);
        unset($SESSION->kaltura_con_timestarted);

    } else {

        /*
           May need to set the URI setting beause if was originally
           disabled then the form will not submit the default URI.
        */
        $connectiontype = get_config(KALTURA_PLUGIN_NAME, 'conn_server');

        if (0 == strcmp('hosted', $connectiontype)) {

            set_config('uri', KALTURA_DEFAULT_URI, KALTURA_PLUGIN_NAME);
        }

    }

    if ($enableapicalls) {

        $session = local_yukaltura_login(true, '', KALTURA_SESSION_LENGTH, true);

        if (!empty($session)) {
            $settings->add(new admin_setting_heading('conn_status', get_string('conn_status_title', 'local_yukaltura'),
                                                     get_string('conn_success', 'local_yukaltura')));
        } else {
            $settings->add(new admin_setting_heading('conn_status', get_string('conn_status_title', 'local_yukaltura'),
                                                     get_string('conn_failed', 'local_yukaltura')));
        }
    }

    $kaltura = new yukaltura_connection();
    $connection = $kaltura->get_connection(true, KALTURA_SESSION_LENGTH);

    if (!empty($connection)) {
        $control = local_yukaltura_get_default_access_control($connection);

        if (is_null($control)) {
            $result = local_yukaltura_create_default_access_control($connection);
        }

        $ipaddress = get_config(KALTURA_PLUGIN_NAME, 'internal_ipaddress');
        $ipaddressprevious = get_config(KALTURA_PLUGIN_NAME, 'internal_ipaddress_previous');

        if ($ipaddress == null && $ipaddressprevious == null ||
            $ipaddress != null && 0 == strcmp($ipaddress, $ipaddressprevious)) {
            $control = local_yukaltura_get_internal_access_control($connection);
            if (!is_null($control)) {
                $restriction = $control->restrictions[0];
                $addresses = $restriction->ipAddressList;
                if ($addresses != null and $addresses != '') {
                    $addressarray = explode(",", $addresses);
                    if (count($addressarray) >= 2) {
                        $addresses = implode(" ", $addressarray);
                        set_config('internal_ipaddress', $addresses, KALTURA_PLUGIN_NAME);
                        set_config('internal_ipaddress_previous', $addresses, KALTURA_PLUGIN_NAME);
                    }
                }
            }
        } else if ($ipaddress != null && 0 != strcmp($ipaddress, $ipaddressprevious) &&
                   0 != strcmp($ipaddress, '0.0.0.0/0')) {
            $control = local_yukaltura_get_internal_access_control($connection);

            if (is_null($control)) {
                $result = local_yukaltura_create_internal_access_control($connection);
                set_config(KALTURA_INTERNAL_ACCESS_CONFIG_NAME, $result->id, KALTURA_PLUGIN_NAME);
            } else {
                $result = local_yukaltura_update_internal_access_control($connection, $control->id);
            }

            set_config('internal_ipaddress_previous', $ipaddress, KALTURA_PLUGIN_NAME);
        }

        // Get root category name.
        $rootcategory = get_config(KALTURA_PLUGIN_NAME, 'rootcategory');
        // Get root category id.
        $rootcategoryid = get_config(KALTURA_PLUGIN_NAME, 'rootcategory_id');

        if (!empty($rootcategory) && $rootcategory != null && $rootcategory != '') {
            // First check if root category path already exists.  If the path exists then use it.
            $existingrootcategory = local_yukaltura_category_path_exists($connection, $rootcategory);

            if ($existingrootcategory) {
                set_config('rootcategory_id', $existingrootcategory->id, KALTURA_PLUGIN_NAME);
            } else {
                $result = local_yukaltura_create_root_category($connection);
                if (is_array($result) && array_key_exists($result[0], $result) &&
                    array_key_exists($result[1], $result)) {
                    $rootcategory   = $result[0];
                    $rootcategoryid = $result[1];
                    set_config('rootcategory', $rootcategory, KALTURA_PLUGIN_NAME);
                    set_config('rootcategory_id', $rootcategoryid, KALTURA_PLUGIN_NAME);
                }
            }
        }
    }

    // Server Connection.
    $choices = array('hosted' => get_string('hostedconn', 'local_yukaltura'),
                     'ce' => get_string('ceconn', 'local_yukaltura')
                     );

    $adminsetting = new admin_setting_configselect('conn_server', get_string('conn_server', 'local_yukaltura'),
                                get_string('conn_server_desc', 'local_yukaltura'), 'hosted', $choices);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Connection URI.
    $adminsetting = new admin_setting_configtext('uri', get_string('server_uri', 'local_yukaltura'),
                       get_string('server_uri_desc', 'local_yukaltura'), KALTURA_DEFAULT_URI, PARAM_URL);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Kaltura login.
    $adminsetting = new admin_setting_configtext('login', get_string('hosted_login', 'local_yukaltura'),
                       get_string('hosted_login_desc', 'local_yukaltura'), '', PARAM_TEXT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Kaltura password.
    $adminsetting = new admin_setting_configpasswordunmask('password',
                       get_string('hosted_password', 'local_yukaltura'),
                       get_string('hosted_password_desc', 'local_yukaltura'), '');
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Kaltura regular player selection.
    if ($enableapicalls) {
        $players = local_yukaltura_get_custom_players();
    }

    // Kaltura Media Assignment section.
    $settings->add(new admin_setting_heading('kaltura_kalmediaassign_heading',
                   get_string('kaltura_kalmediaassign_title', 'local_yukaltura'), ''));

    $choices = array(KALTURA_PLAYER_PLAYERREGULARDARK  => get_string('player_regular_dark', 'local_yukaltura'),
                     KALTURA_PLAYER_PLAYERREGULARLIGHT => get_string('player_regular_light', 'local_yukaltura'),
                     );

    if (!empty($players)) {
        $choices = $choices + $players;
    }

    $choices[0] = get_string('custom_player', 'local_yukaltura');

    $adminsetting = new admin_setting_configselect('player',
                                                   get_string('kaltura_player', 'local_yukaltura'),
                                                   get_string('kaltura_player_desc', 'local_yukaltura'),
                                                   KALTURA_PLAYER_PLAYERREGULARDARK, $choices);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('player_custom',
                                                 get_string('kaltura_player_custom', 'local_yukaltura'),
                                                 get_string('kaltura_player_custom_desc', 'local_yukaltura'),
                                                 '', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('kalmediaassign_player_width',
                                                 get_string('kalmediaassign_player_width',
                                                 'local_yukaltura'),
                                                 get_string('kalmediaassign_player_width_desc',
                                                 'local_yukaltura'), '400', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('kalmediaassign_player_height',
                                                 get_string('kalmediaassign_player_height', 'local_yukaltura'),
                                                 get_string('kalmediaassign_player_height_desc', 'local_yukaltura'),
                                                 '365', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('kalmediaassign_popup_player_width',
                                                 get_string('kalmediaassign_popup_player_width',
                                                 'local_yukaltura'),
                                                 get_string('kalmediaassign_popup_player_width_desc',
                                                 'local_yukaltura'), '500', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('kalmediaassign_popup_player_height',
                                                 get_string('kalmediaassign_popup_player_height',
                                                 'local_yukaltura'),
                                                 get_string('kalmediaassign_popup_player_height_desc', 'local_yukaltura'),
                                                 '460', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Kaltura Media Resource section.
    $settings->add(new admin_setting_heading('kaltura_kalmediares_heading',
                                             get_string('kaltura_kalmediares_title', 'local_yukaltura'), ''));

    $adminsetting = new admin_setting_configselect('player_resource',
                                                   get_string('kaltura_player_resource', 'local_yukaltura'),
                                                   get_string('kaltura_player_resource_desc', 'local_yukaltura'),
                                                   KALTURA_PLAYER_PLAYERREGULARDARK, $choices);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('player_resource_custom',
                                                 get_string('kaltura_player_resource_custom', 'local_yukaltura'),
                                                 get_string('kaltura_player_resource_custom_desc', 'local_yukaltura'),
                                                 '', PARAM_INT);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Override checkbox.
    $adminsetting = new admin_setting_configcheckbox('player_resource_override',
                                                     get_string('player_resource_override', 'local_yukaltura'),
                                                     get_string('player_resource_override_desc', 'local_yukaltura'), '0');
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // Kaltura My Media settings.
    $settings->add(new admin_setting_heading('kaltura_mymedia_heading',
                   get_string('kaltura_mymedia_title', 'local_yukaltura'), ''));

    $adminsetting = new admin_setting_configcheckbox('enable_webcam',
                                                     get_string('enable_webcam', 'local_yukaltura'),
                                                     get_string('enable_webcam_desc', 'local_yukaltura'), '0');
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configcheckbox('mymedia_limited_access',
                                                     get_string('mymedia_limited_access', 'local_yukaltura'),
                                                     get_string('mymedia_limited_access_desc', 'local_yukaltura'), '0');
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $choices = array('contain_lastname' => get_string('mymedia_contain_lastname', 'local_yukaltura'),
                     'not_contain_lastname' => get_string('mymedia_not_contain_lastname', 'local_yukaltura'),
                     'contain_firstname' => get_string('mymedia_contain_firstname', 'local_yukaltura'),
                     'not_contain_firstname' => get_string('mymedia_not_contain_firstname', 'local_yukaltura'),
                     'contain_email' => get_string('mymedia_contain_email', 'local_yukaltura'),
                     'not_contain_email' => get_string('mymedia_not_contain_email', 'local_yukaltura'));

    $adminsetting = new admin_setting_configselect('mymedia_access_rule',
                                                   get_string('mymedia_access_rule', 'local_yukaltura'),
                                                   get_string('mymedia_access_rule_desc', 'local_yukaltura'),
                                                   'contain_lastname', $choices);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('mymedia_access_keyword',
                                                 get_string('mymedia_access_keyword', 'local_yukaltura'),
                                                 get_string('mymedia_access_keyword_desc', 'local_yukaltura'),
                                                 '', PARAM_NOTAGS);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $perpage  = array(9 => get_string('nine', 'local_yukaltura'),
                      18 => get_string('eighteen', 'local_yukaltura'),
                      21 => get_string('twentyone', 'local_yukaltura'),
                      24 => get_string('twentyfour', 'local_yukaltura'),
                      27 => get_string('twentyseven', 'local_yukaltura'),
                      30 => get_string('thirty', 'local_yukaltura'));

    $adminsetting = new admin_setting_configselect('mymedia_items_per_page',
                                                   get_string('mymedia_items_per_page', 'local_yukaltura'),
                                                   get_string('mymedia_items_per_page_desc', 'local_yukaltura'),
                                                   9, $perpage);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('rootcategory',
                                                 get_string('rootcategory', 'local_yukaltura'),
                                                 get_string('rootcategory_desc', 'local_yukaltura'),
                                                 'Moodle', PARAM_NOTAGS);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    // General Setting Seciton.
    $settings->add(new admin_setting_heading('kaltura_general_heading',
                   get_string('kaltura_general', 'local_yukaltura'), ''));

    $adminsetting = new admin_setting_configcheckbox('enable_html5',
                                                     get_string('enable_html5', 'local_yukaltura'),
                                                     get_string('enable_html5_desc', 'local_yukaltura'), '1');
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $adminsetting = new admin_setting_configtext('mymedia_application_name',
                                                 get_string('application_name', 'local_yukaltura'),
                                                 get_string('application_name_desc', 'local_yukaltura'),
                                                 'Moodle', PARAM_NOTAGS);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $addresses = '';

    $kaltura = new yukaltura_connection();
    $connection = $kaltura->get_connection(true, KALTURA_SESSION_LENGTH);

    if (!empty($connection)) {
        $control = local_yukaltura_get_internal_access_control($connection);
        if (!is_null($control)) {
            $restriction = $control->restrictions[0];
            $addresses = $restriction->ipAddressList;
            if ($addresses != null and $addresses != '') {
                $addressarray = explode(",", $addresses);
                if (count($addressarray) >= 2) {
                    $addresses = implode(" ", $addressarray);
                    set_config('internal_ipaddress', $addresses, KALTURA_PLUGIN_NAME);
                }
            } else {
                $addresses = '';
            }
        }
    }

    $adminsetting = new admin_setting_configtext('internal_ipaddress',
                                                 get_string('internal_ipaddress', 'local_yukaltura'),
                                                 get_string('internal_ipaddress_desc', 'local_yukaltura'),
                                                 '0.0.0.0/0', PARAM_NOTAGS);
    $adminsetting->plugin = KALTURA_PLUGIN_NAME;
    $settings->add($adminsetting);

    $jsmodule = array(
        'name'     => 'local_yukaltura',
        'fullpath' => '/local/yukaltura/js/yukaltura.js',
        'requires' => array('base', 'dom', 'node'),
        );

    $testscript = $CFG->wwwroot . '/local/yukaltura/test.php';
    $PAGE->requires->js_init_call('M.local_yukaltura.init', array(), true, $jsmodule);
}
