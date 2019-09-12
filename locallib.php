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
 * Local libraries of YU Kaltura Media package
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2019 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once(dirname(__FILE__) . '/API/KalturaClient.php');
require_once(dirname(__FILE__) . '/kaltura_entries.class.php');

defined('MOODLE_INTERNAL') || die();

require_login();

/**
 * KALTURA_PLUGIN_NAME - local plugin name.
 */
define('KALTURA_PLUGIN_NAME', 'local_yukaltura');

/**
 * KALTURA_DEFAULT_URI - URL of Kaltura SaaS Edition.
 */
define('KALTURA_DEFAULT_URI', 'https://www.kaltura.com');

/**
 * KALTURA_REPORT_DEFAULT_URI - Report page URL of Kaltura SaaS Edition.
 */
define('KALTURA_REPORT_DEFAULT_URI', 'https://apps.kaltura.com/hosted_pages');

/**
 * KALTURA_PLAYER_PLAYERREGULARDARK - UiConf id of KDP dark.
 */
define('KALTURA_PLAYER_PLAYERREGULARDARK', 6709411);

/**
 * KALTURA_PLAYER_PLAYERREGULARLIGHT - UiConf id of KDP light.
 */
define('KALTURA_PLAYER_PLAYERREGULARLIGHT', 6709421);

/**
 * KALTURA_PLAYER_PLAYERMEDIAPRESENTATION - UiConf Kaltura Media Presentation.
 */
define('KALTURA_PLAYER_PLAYERMEDIAPRESENTATION', 4860481);

/**
 * KALTURA_ASSIGN_MEDIA_WIDTH - Player width of Kaltura Media Assignment.
 */
 define('KALTURA_ASSIGN_MEDIA_WIDTH', 400);

/**
 * KALTURA_ASSIGN_MEDIA_HEIGHT - Player height of Kaltura Media Assignment.
 */
define('KALTURA_ASSIGN_MEDIA_HEIGHT', 365);

/**
 * KALTURA_ASSIGN_POPUP_MEDIA_WIDTH - Pop up Player width of Kaltura Media Assignment.
 */
define('KALTURA_ASSIGN_POPUP_MEDIA_WIDTH', 500);

/**
 * KALTURA_ASSIGN_POPUP_MEDIA_WIDTH - Pop up Player height of Kaltura Media Assignment.
 */
define('KALTURA_ASSIGN_POPUP_MEDIA_HEIGHT', 460);

/**
 * YUI panel popup border adjustment to make the embedded video look centered.
 */
define('KALTURA_POPUP_WIDTH_ADJUSTMENT', 30);

/**
 * YUI panel popup border adjustment to make the embedded video look centered.
 */
define('KALTURA_POPUP_HEIGHT_ADJUSTMENT', 50);

/**
 * Time lengh (sec) of Kaltura Session.
 */
define('KALTURA_SESSION_LENGTH', 10800); // Three hours.

/**
 * Label of Access Restriction.
 */
define('KALTURA_IPADDRESS_ANY', 'ANY');

/**
 * Label of Access Restriction.
 */
define('KALTURA_IPADDRESS_INT', 'INTERNAL');

/**
 * Moodle database key name of access control (internal).
 */
define('KALTURA_INTERNAL_ACCESS_CONFIG_NAME', 'access_control_internal_id');

/**
 * Moodle database key name of access control.
 */
define('KALTURA_INTERNAL_ACCESS_CONTROL_NAME', 'Internal Access');

/**
 * Access control (internal only) description for Kaltura Server.
 */
define('KALTURA_INTERNAL_ACCESS_CONTROL_DESC', 'Access conrtorl for internal only');

/**
 * Access control (inetrnal only) system name for Kaltura Server.
 */
define('KALTURA_INTERNAL_ACCESS_CONTROL_SYSTEM_NAME', 'moodleprofile');

/**
 * Access control (inetrnal only) name for Kaltura Server.
 */
define('KALTURA_DEFAULT_ACCESS_CONTROL_NAME', 'Default');

/**
 * Access control (default) name for Kaltura Server.
 */
define('KALTURA_DEFAULT_ACCESS_CONTROL_DESC', 'Default access control profile');

/**
 * Access control (default) system name for Kaltura Server.
 */
define('KALTURA_DEFAULT_ACCESS_CONTROL_SYSTEM_NAME', 'Default');

/**
 * Moodle database key name of access control (default).
 */
define('KALTURA_DEFAULT_ACCESS_CONFIG_NAME', 'access_control_default_id');

/**
 * Image width for desktop theme.
 */
define('KALTURA_IMAGE_DESKTOP_WIDTH', 640);

/**
 * Image height for desktop theme.
 */
define('KALTURA_IMAGE_DESKTOP_HEIGHT', 480);

/**
 * Image width for mobile theme.
 */
define('KALTURA_IMAGE_MOBILE_WIDTH', 320);

/**
 * Image height for mobile theme.
 */
define('KALTURA_IMAGE_MOBILE_HEIGHT', 240);

/**
 * Initialize the kaltura account and obtain the secrets and partner ID
 *
 * @param string $login - username (email address)
 * @param string $password - password
 * @param string $uri - URI
 *
 * @return boolean - true on success or false
 */
function local_yukaltura_initialize_account($login, $password, $uri = '') {
    global $CFG;

    try {
        $configobj = new KalturaConfiguration(0);

        $configobj->clientTag = local_yukaltura_create_client_tag();

        if (!empty($CFG->proxyhost)) {
            $configobj->proxyHost = $CFG->proxyhost;
            $configobj->proxyPort = $CFG->proxyport;
            $configobj->proxyType = $CFG->proxytype;
            $configobj->proxyUser = ($CFG->proxyuser) ? $CFG->proxyuser : null;
            $configobj->proxyPassword = ($CFG->proxypassword && $CFG->proxyuser) ? $CFG->proxypassword : null;
        }

        if (!empty($uri)) {
            $configobj->serviceUrl = $uri;
        }

        $configobj->serviceUrl = local_yukaltura_get_host();
        $configobj->cdnUrl = local_yukaltura_get_host();

        $clientobj = new KalturaClient($configobj);

        if (empty($clientobj)) {
            return false;
        }

        $adminsession = $clientobj->adminUser->login($login, $password);

        $clientobj->setKs($adminsession);

        $userinfo = $clientobj->partner->getInfo();

        if (isset($userinfo->secret)) {
            set_config('secret', $userinfo->secret, KALTURA_PLUGIN_NAME);
        }

        if (isset($userinfo->adminSecret)) {
            set_config('adminsecret', $userinfo->adminSecret, KALTURA_PLUGIN_NAME);
        }

        if (isset($userinfo->id)) {
            set_config('partner_id', $userinfo->id, KALTURA_PLUGIN_NAME);
        }

        // Check if this is a hosted initialization.
        $connectiontype = get_config(KALTURA_PLUGIN_NAME, 'conn_server');

        if (0 == strcmp('hosted', $connectiontype)) {

            // May need to set the URI setting.
            // Beause if was originally disabled then the form will not submit the default URI.
            set_config('uri', KALTURA_DEFAULT_URI, KALTURA_PLUGIN_NAME);

            local_yukaltura_send_initialization($adminsession);

        }

        return true;

    } catch (KalturaException $ex) {
        return false;

    } catch (KalturaClientException $ex) {
        return false;
    }
}

/**
 * Uninitialize the kaltura account.
 */
function local_yukaltura_uninitialize_account() {
    set_config('secret', '', KALTURA_PLUGIN_NAME);
    set_config('adminsecret', '', KALTURA_PLUGIN_NAME);
    set_config('partner_id', '', KALTURA_PLUGIN_NAME);
}

/**
 * Send initializations information to the Kaltura server
 *
 * @param string $session - The Kaltura session string
 */
function local_yukaltura_send_initialization($session) {
    $plugin = new stdClass();
    // We always want the version information even if it was already loaded by something else.
    include(dirname(__FILE__).'/version.php');

    $ch = curl_init();

    $uri = "http://corp.kaltura.com/signup/activate_application?".
           "type=moodle&kaltura_version={$plugin->version}&system_version={$plugin->system_version}&ks={$session}";

    $options = array(CURLOPT_URL => $uri,
                     CURLOPT_POST => false,
                     CURLOPT_RETURNTRANSFER => true);

    curl_setopt_array($ch, $options);

    curl_exec($ch);
    curl_close($ch);
}

/**
 * Log in with the user's credentials.  General a kaltura session locally
 *
 * @param boolean $admin - true to login as an administrator or false to login as user.
 * @param string $privileges - privleges give to the user.
 * @param int $expiry - number of seconds to keep the session alive.
 * @param boolean $testconn - use of test connection.
 *
 * @return obj - KalturaClient
 */
function local_yukaltura_login($admin = false, $privileges = '', $expiry = 10800, $testconn = false) {
    global $USER;

    list($login, $password) = local_yukaltura_get_credentials();

    if (empty($login) || empty($password)) {
        return false;
    }

    $configobj = local_yukaltura_get_configuration_obj();

    if (empty($configobj) || !($configobj instanceof KalturaConfiguration)) {
        return false;
    }

    $clientobj = new KalturaClient($configobj);

    if (empty($clientobj)) {
        return false;
    }

    $partnerid = get_config(KALTURA_PLUGIN_NAME, 'partner_id');

    $servermode = get_config(KALTURA_PLUGIN_NAME, 'conn_server');

    if ($servermode == 'hosted') {
        if (isloggedin()) {
            $username = $USER->username;
        } else {
            $username = null;
        }
    } else {
        $username = local_yukaltura_get_loginname();
    }

    if ($admin) {
        $secret = get_config(KALTURA_PLUGIN_NAME, 'adminsecret');
        $session = $clientobj->session->start($secret, $username, KalturaSessionType::ADMIN, $partnerid);
    } else {
        $secret = get_config(KALTURA_PLUGIN_NAME, 'secret');
        $session = $clientobj->session->start($secret, $username, KalturaSessionType::USER, $partnerid);
    }

    if (!empty($session)) {

        $clientobj->setKs($session);

        if ($testconn) {
            $result = local_yukaltura_test_connection($clientobj);

            if (empty($result)) {
                return false;
            }
        }

        return $clientobj;

    } else {
        return false;
    }
}

/**
 * This function is refactored code from login(). It only generates and
 * returns a user Kaltura session. The session value returned is mainly used for
 * inclusion into the video markup flashvars query string.
 *
 * @param bool $admin - must use admin permission.
 * @param string $medialist - privilege string.
 * @return array - an array of Kaltura media entry ids
 */
function local_yukaltura_generate_kaltura_session($admin = false, $medialist = array()) {
    global $USER;

    $configobj = local_yukaltura_get_configuration_obj();

    if (empty($configobj) || !($configobj instanceof KalturaConfiguration)) {
        return false;
    }

    $clientobj = new KalturaClient($configobj);

    if (empty($clientobj) || empty($medialist)) {
        return false;
    }

    $privilege = 'sview:' . implode(',sview:', $medialist);

    $partnerid = get_config(KALTURA_PLUGIN_NAME, 'partner_id');

    $servermode = get_config(KALTURA_PLUGIN_NAME, 'conn_server');

    if ($servermode == 'hosted') {
        if (isloggedin()) {
            $username = $USER->username;
        } else {
            $username = null;
        }
    } else {
        $username = local_yukaltura_get_loginname();
    }

    if ($admin) {
        $secret = get_config(KALTURA_PLUGIN_NAME, 'adminsecret');
        $session = $clientobj->session->start($secret, $username, KalturaSessionType::ADMIN, $partnerid);
    } else {
        $secret = get_config(KALTURA_PLUGIN_NAME, 'secret');
        $session = $clientobj->session->start($secret, $username, KalturaSessionType::USER, $partnerid);
    }

    return $session;
}

/**
 * Returns an login name.
 * @return object - if there exists a login name, returns the login name as string. Otherwise, returns false.
 */
function local_yukaltura_get_loginname() {
    $login = false;
    $login = get_config(KALTURA_PLUGIN_NAME, 'login');
    return $login;
}

/**
 * Returns an array with the login and password as values respectively
 *
 * @return array - login, password or an array of false values if none were found.
 */
function local_yukaltura_get_credentials() {

    $login = false;
    $password = false;

    $login = get_config(KALTURA_PLUGIN_NAME, 'login');
    $password = get_config(KALTURA_PLUGIN_NAME, 'password');

    return array($login, $password);
}

/**
 * Retrieve an instance of the KalturaConfiguration class
 *
 * @return obj - KalturaConfiguration object
 */
function local_yukaltura_get_configuration_obj() {
    global $CFG;

    $partnerid = local_yukaltura_get_partner_id();

    if (empty($partnerid)) {
        return false;
    }

    $configobj = new KalturaConfiguration($partnerid);
    $configobj->serviceUrl = local_yukaltura_get_host();
    $configobj->cdnUrl = local_yukaltura_get_host();
    $configobj->clientTag = local_yukaltura_create_client_tag();

    if (!empty($CFG->proxyhost)) {
        $configobj->proxyHost = $CFG->proxyhost;
        $configobj->proxyPort = $CFG->proxyport;
        $configobj->proxyType = $CFG->proxytype;
        $configobj->proxyUser = ($CFG->proxyuser) ? $CFG->proxyuser : null;
        $configobj->proxyPassword = ($CFG->proxypassword && $CFG->proxyuser) ? $CFG->proxypassword : null;
    }
    return $configobj;
}

/**
 * Returns the test connection markup
 * @return string - HTML markup for test connection
 */
function local_yukaltura_testconnection_markup() {

    $markup = '';

    $markup .= html_writer::start_tag('center');

    $attr = array('id' => 'open_button',
                  'value' => get_string('start', 'local_yukaltura'),
                  'type' => 'button');
    $markup .= html_writer::tag('input', '', $attr);

    $markup .= html_writer::end_tag('center');

    return $markup;
}

/**
 * Retrieve a list of all the custom players available to the account.
 *
 * @return string|bool - The session ID string value or false on error.
 */
function local_yukaltura_get_custom_players() {

    try {
        $customplayers = array();

        $clientobj = local_yukaltura_login(true, '');

        if (empty($clientobj)) {
            return $customplayers;
        }

        $allowedtypes = array(KalturaUiConfObjType::PLAYER, KalturaUiConfObjType::PLAYER_V3);

        $filter = new KalturaUiConfFilter();
        $filter->objTypeEqual = implode(',', $allowedtypes);
        $filter->tagsMultiLikeOr = 'player';

        $players = $clientobj->uiConf->listAction($filter, null);

        if ((!empty($players->objects)) && ($players instanceof KalturaUiConfListResponse)) {
            foreach ($players->objects as $uiconfid => $player) {

                $customplayers["{$player->id}"] = "{$player->name} ({$player->id})";
            }
        }

        return $customplayers;
    } catch (KalturaClientException $ex) {
        return false;
    } catch (KalturaException $ex) {
        return false;
    }
}

/**
 * Retrieves the default player UIConf ID or the custom UIConf ID
 *
 * @param string $type - type of player uiconf to return, accepted values
 * are player, uploader and presentation
 *
 * @return int - UiConf id of the type of player requested.
 */
function local_yukaltura_get_player_uiconf($type = 'player') {

    $uiconf = 0;

    switch ($type) {
        case 'player':
        case 'player_mymedia';
        case 'player_resource':
        case 'res_uploader':
        case 'pres_uploader':
        case 'presentation':
        case 'mymedia_uploader':
        case 'mymedia_screen_recorder':
        case 'assign_uploader':
        case 'player_atto':
        case 'simple_uploader';

            $uiconf = get_config(KALTURA_PLUGIN_NAME, $type);

            if (empty($uiconf)) {
                $uiconf = get_config(KALTURA_PLUGIN_NAME, "{$type}_custom");
            }
            break;
        default:
            break;
    }

    return $uiconf;
}

/**
 * Retrives the player resource override configuration value
 *
 * @return string - 1 if override is required, else 0
 */
function local_yukaltura_get_player_override() {
    return get_config(KALTURA_PLUGIN_NAME, 'player_resource_override');
}

/**
 * Return the host URI and removes trailing slash
 *
 * @return string - host URI
 */
function local_yukaltura_get_host() {

    $uri = get_config(KALTURA_PLUGIN_NAME, 'uri');

    // Remove trailing slash.
    $trailingslash = strrpos($uri, '/') + 1;
    $length = strlen($uri);

    if ($trailingslash == $length) {
        $uri = rtrim($uri, '/');
    }

    return $uri;
}

/**
 * Return the partner Id
 *
 * @return int - partner Id
 */
function local_yukaltura_get_partner_id() {
    return get_config(KALTURA_PLUGIN_NAME, 'partner_id');
}

/**
 * Return the admin secret
 *
 * @return string - admin secret
 */
function local_yukaltura_get_admin_secret() {
    return get_config(KALTURA_PLUGIN_NAME, 'adminsecret');
}

/**
 * Return the user secret
 *
 * @return string - user secret
 */
function local_yukaltura_get_secret() {
    return get_config(KALTURA_PLUGIN_NAME, 'secret');
}

/**
 * Return the publiser name
 *
 * @return string - publisher name
 */
function local_yukaltura_get_publisher_name() {
    return get_config(KALTURA_PLUGIN_NAME, 'login');
}

/**
 * Initialize the KalturaUser object
 *
 * @param bool $admin - true to set isAdmin
 *
 * @return object - KalturaUser object
 */
function local_yukaltura_init_kaltura_user($admin = false) {
    global $USER;

    $user               = new KalturaUser();
    $user->id           = $USER->username;
    $user->screenName   = $USER->username;
    $user->email        = $USER->email;
    $user->firstName    = $USER->firstname;
    $user->lastName     = $USER->lastname;
    $user->isAdmin      = $admin;

    return $user;
}

/**
 * Create html image markup string.
 *
 * @param object $entryobj - KalturaMediaEntry object.
 * @param string $title - media title used to alt property.
 * @param string $theme - moodle theme, is desktop or mobile.
 * @param int $maxwidth - maximum width of thumbnail.
 * @param int $maxheight - maximum height of thumbnail.
 * @return string - image markup.
 */
function local_yukaltura_create_image_markup($entryobj, $title, $theme,
                                           $maxwidth = KALTURA_IMAGE_DESKTOP_WIDTH,
                                           $maxheight = KALTURA_IMAGE_DESKTOP_HEIGHT) {

    $output = '';

    $originalsource = $entryobj->dataUrl;

    $httppattern = '/^http:\/\/[A-Za-z0-9\-\.]{1,61}\//';
    $httpspattern = '/^https:\/\/[A-Za-z0-9\-\.]{1,61}\//';

    $replace = local_yukaltura_get_host() . '/';

    $modifiedsource = preg_replace($httpspattern, $replace, $originalsource, 1, $count);
    if ($count != 1) {
            $modifiedsource = preg_replace($httppattern, $replace, $originalsource, 1, $count);
        if ($count != 1) {
            $modifiedsource = $originalsource;
        }
    }

    if (0 == strcmp($theme, 'mymobile')) {
        $maxwidth = KALTURA_IMAGE_MOBILE_WIDTH;
        $maxheight = KALTURA_IAMGE_MOBILE_HEIGHT;
    }

    if ($entryobj->width > $maxwidth || $entryobj->height > $maxheight) {
        $originalwidth = $entryobj->width;
        $originalheight = $entryobj->height;

        $ratiowidth = $entryobj->width / $maxwidth;
        $ratioheight = $entryobj->height / $maxheight;
        if ($ratiowidth >= $ratioheight) {
            $modifiedwidth = $entryobj->width / $ratiowidth;
            $modifiedheight = $entryobj->height / $ratiowidth;
        } else {
            $modifiedwidth = $entryobj->width / $ratioheight;
            $modifiedheight = $entryobj->height / $ratioheight;
        }

        list($beforestr, $afterstr) = preg_split('/\/def_height\//', $modifiedsource);
        $afterstr = strstr($afterstr, '/');
        $modifiedsource = $beforestr . '/def_height/' . $entryobj->height . $afterstr;
        list($beforestr, $afterstr) = preg_split('/\/def_width\//', $modifiedsource);
        $afterstr = strstr($afterstr, '/');
        $modifiedsource = $beforestr . '/def_width/' . $entryobj->width . $afterstr;

        $linksource = $modifiedsource;

        list($beforestr, $afterstr) = preg_split('/\/def_height\//', $linksource);
        $afterstr = strstr($afterstr, '/');
        $linksource = $beforestr . '/def_height/' . $originalheight . $afterstr;
        list($beforestr, $afterstr) = preg_split('/\/def_width\//', $linksource);
        $afterstr = strstr($afterstr, '/');
        $linksource = $beforestr . '/def_width/' . $originalwidth . $afterstr;

        $output .= '<a href="' . $linksource . '" target="_new">';
        $output .= '<img src="' . $modifiedsource . '" width="' . $modifiedwidth;
        $output .= '" height="' . $modifiedheight . '" alt="' . $title . '" title = "' . $title . '" border="0"/>';
        $output .= '</a>';
    } else {
        $output .= '<img src="' . $modifiedsource . '" width="' . $entryobj->width;
        $output .= '" height="' . $entryobj->height. '" alt="' . $title . '" title = "' . $title . '" border="0"/>';
    }

    return $output;
}

/**
 * This functions returns the HTML markup for the Kaltura iframe player.
 *
 * @param obj $entryobj - KalturaMedia object
 * @param int $uiconfid - player ui_conf_id (optional).  If no value is specified the
 * default player will be used.
 * @param string $session - A kaltura session string
 * @param int $uid - a unique identifier, this value is appented to 'kaltura_player_'
 * and is used as the id of the object tag
 *
 * @return string - HTML markup
 */
function local_yukaltura_get_iframeembed_code($entryobj, $uiconfid = 0, $session = '', $uid = 0) {

    if (!local_yukaltura_is_valid_entry_object($entryobj)) {
        return 'Unable to play media ('. $entryobj->id . ') please contact your site administrator.';
    }

    if (0 == $uid) {
        $uid  = floor(microtime(true));
        $uid .= '_' . mt_rand();
    }

    $host = local_yukaltura_get_host();
    $flashvars = local_yukaltura_get_kwidget_flashvars($entryobj->creatorId, $session);
    if (KalturaMediaType::IMAGE == $entryobj->mediaType) {
        $varstr = '&amp;IframeCustomPluginCss1=' .  new moodle_url('/local/yukaltura/css/hiddenPlayButton.css');
        $flashvars .= $varstr;
    }

    if (empty($uiconfid)) {
        $uiconf = local_yukaltura_get_player_uiconf('player');
    } else {
        $uiconf = $uiconfid;
    }

    $originalurl = $entryobj->thumbnailUrl;

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

    $output = '';

    $now = time();

    $output .= "<iframe src=\"{$host}/p/{$entryobj->partnerId}/";
    $output .= "sp/{$entryobj->partnerId}00/embedIframeJs/uiconf_id/{$uiconf}/";
    $output .= "partner_id/{$entryobj->partnerId}?";
    $output .= "iframeembed=true&playerId=kaltura_player_{$now}&entry_id={$entryobj->id}\" ";
    $output .= "width=\"$entryobj->width\" height=\"{$entryobj->height}\" ";
    $output .= "allowfullscreen webkitallowfullscreen mozAllowFullScreen frameborder=\"0\"></iframe>" . PHP_EOL;

    return $output;
}


/**
 * This functions returns the HTML markup for the Kaltura dynamic player.
 *
 * @param obj $entryobj - KalturaMedia object
 * @param int $uiconfid - player ui_conf_id (optional).  If no value is specified the
 * default player will be used.
 * @param string $session - A kaltura session string
 * @param int $uid - a unique identifier, this value is appented to 'kaltura_player_'
 * and is used as the id of the object tag
 *
 * @return string - HTML markup
 */
function local_yukaltura_get_dynamicembed_code($entryobj, $uiconfid = 0, $session = '', $uid = 0) {

    if (!local_yukaltura_is_valid_entry_object($entryobj)) {
        return 'Unable to play media ('. $entryobj->id . ') please contact your site administrator.';
    }

    if (0 == $uid) {
        $uid  = floor(microtime(true));
        $uid .= '_' . mt_rand();
    }

    $host = local_yukaltura_get_host();
    $flashvars = local_yukaltura_get_kdp_flashvars($entryobj->creatorId, $session);
    if (KalturaMediaType::IMAGE == $entryobj->mediaType) {
        $varstr = '&amp;IframeCustomPluginCss1=' .  new moodle_url('/local/yukaltura/css/hiddenPlayButton.css');
        $flashvars .= $varstr;
    }

    if (empty($uiconfid)) {
        $uiconf = local_yukaltura_get_player_uiconf('player');
    } else {
        $uiconf = $uiconfid;
    }

    $originalurl = $entryobj->thumbnailUrl;

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

    $output = '';

    $now = time();
    $flashvars = local_yukaltura_get_kwidget_flashvars($entryobj->creatorId, $session);

    $output .= "<script src=\"{$host}/p/{$entryobj->partnerId}/sp/{$entryobj->partnerId}00/embedIframeJs/";
    $output .= "uiconf_id/{$uiconf}/partner_id/{$entryobj->partnerId}\"></script>" . PHP_EOL;
    $output .= "<div id=\"kaltura_player_{$now}\" style=\"width: {$entryobj->width}px; height: {$entryobj->height}px;\">";
    $output .= "</div>" . PHP_EOL;
    $output .= "<script>" . PHP_EOL;
    $output .= "kWidget.embed({" . PHP_EOL;
    $output .= "\"targetId\": \"kaltura_player_{$now}\"," . PHP_EOL;
    $output .= "\"wid\": \"_" . $entryobj->partnerId . "\"," . PHP_EOL;
    $output .= "\"uiconf_id\": {$uiconf}," . PHP_EOL;
    $output .= "\"flashvars\": {{$flashvars}}," . PHP_EOL;
    $output .= "\"cache_st\": {$now}," . PHP_EOL;
    $output .= "\"entry_id\": \"{$entryobj->id}\"" . PHP_EOL;
    $output .= "});" . PHP_EOL;
    $output .= "</script>" . PHP_EOL;

    return $output;
}

/**
 * This function returns a string of flash variables required for Kaltura
 * analytics
 *
 * @param string $creatorname - username or media creator.
 * @param string $session - Kaltura session string.
 * @return string - query string of flash variables.
 *
 */
function local_yukaltura_get_kwidget_flashvars($creatorname = '', $session = '') {
    global $USER;

    if (isloggedin()) {
        $flashvars = "\"userId\": \"{$USER->username}\"";
    } else {
        $flashvars = '';
    }

    if (!empty($flashvars)) {
        $flashvars .= ",";
    }

    $applicationname = get_config(KALTURA_PLUGIN_NAME, 'mymedia_application_name');

    $applicationname = empty($applicationname) ? 'Moodle' : $applicationname;

    $flashvars .= "\"applicationName\": \"{$applicationname}\"";;

    if ('' != $creatorname) {
        return $flashvars;
    }

    $kaltura = new yukaltura_connection();
    $connection = $kaltura->get_connection(true, KALTURA_SESSION_LENGTH);

    if (!$connection) {
        return '';
    }

    $category = local_yukaltura_create_user_category($connection, $creatorname);

    if ($category) {
        if (!empty($flashvars)) {
            $flashvars .= ",";
        }

        $flashvars .= "\"playbackContext\" : \"{$category->id}\"";
    }

    return $flashvars;
}

/**
 * This function returns a string of flash variables required for Kaltura
 * analytics
 *
 * @param string $creatorname - username or media creator.
 * @param string $session - Kaltura session string.
 * @return string - query string of flash variables.
 *
 */
function local_yukaltura_get_kdp_flashvars($creatorname = '', $session = '') {
    global $USER;

    if (isloggedin()) {
        $flashvars = "userId={$USER->username}";
    } else {
        $flashvars = '';
    }
    if (!empty($session)) {
        if (!empty($flashvars)) {
            $flashvars .= ",";
        }
        $flashvars .= '&amp;ks='. $session;
    }

    $applicationname = get_config(KALTURA_PLUGIN_NAME, 'mymedia_application_name');

    $applicationname = empty($applicationname) ? 'Moodle' : $applicationname;

    if (!empty($flashvars)) {
        $flashvars .= ",";
    }

    $flashvars .= '&amp;applicationName='.$applicationname;

    if ('' != $creatorname) {
        return $flashvars;
    }

    $kaltura = new yukaltura_connection();
    $connection = $kaltura->get_connection(true, KALTURA_SESSION_LENGTH);

    if (!$connection) {
        return '';
    }

    $category = local_yukaltura_create_user_category($connection, $creatorname);

    if ($category) {
        if (!empty($flashvars)) {
            $flashvars .= ",";
        }
        $flashvars .= '&amp;playbackContext=' . $category->id;
    }

    return $flashvars;
}

/**
 * This function returns player dimension for atto plugin.
 *
 * @return object - dimension of atto player.
 *
 */
function local_yukaltura_get_atto_player_dimension() {
    $width = get_config(KALTURA_PLUGIN_NAME, 'atto_player_width');
    $height = get_config(KALTURA_PLUGIN_NAME, 'atto_player_height');

    if (empty($width) || $width == null) {
        $width = 0;
    }

    if (empty($height) || $height == null) {
        $height = 0;
    }

    return [$width, $height];
}

/**
 * This function returns root categories.
 *
 * @return array - root categories.
 *
 */
function local_yukaltura_get_root_category() {

    $rootid = '';
    $rootpath = '';

    if (!function_exists('local_yukaltura_create_user_category')) {
        return null;
    }

    $rootid   = get_config(KALTURA_PLUGIN_NAME, 'rootcategory_id');
    $rootpath = get_config(KALTURA_PLUGIN_NAME, 'rootcategory');

    if (empty($rootid) || empty($rootpath)) {
        return null;
    }

    return array('id' => $rootid, 'name' => $rootpath);
}

/**
 * This function checks for the existance of required entry object
 * properties.  See KALDEV-28 for details.
 *
 * @param object $entryobj - entry object
 * @return bool - true if valid, else false
 */
function local_yukaltura_is_valid_entry_object($entryobj) {
    if (isset($entryobj->mediaType)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Retrieves an entry object and cache the object only if the entry status is
 * set to 'ready'.  If the second parameter is set to true, this function will
 * only return an entry object if the status is set to true.  Otherwise it will
 * return false.
 *
 * @param string $entryid - entry id of Kaltura Media.
 * @param bool $readyonly - true if this function is the only return an entry object
 * when the entry status is set to 'ready'.
 * False, to return the entry object regardless of it's status.
 *
 * @return mixed - entry object, or false (depending on the entry status and the
 * second prameter
 */
function local_yukaltura_get_ready_entry_object($entryid, $readyonly = true) {

    try {
        $clientobj = local_yukaltura_login(true, '');

        if (empty($clientobj)) {
            return false;
        }

        // Check if the entry object is cached.
        $entryobj = KalturaStaticEntries::get_entry($entryid, $clientobj->baseEntry, false);

        if (!empty($entryobj)) {
            return $entryobj;
        }

        try {
            // Check if the entry object is ready, by making an API call.
            $entryobj = $clientobj->baseEntry->get($entryid);
        } catch (Exception $ex1) {
            return false;
        }

        if (empty($entryobj) || empty($entryobj->status)) {
            return false;
        }

        // If the entry object is ready then return it.
        if (KalturaEntryStatus::READY == $entryobj->status) {

            KalturaStaticEntries::add_entry_object($entryobj);

            return $entryobj;

        } else {
            // If it's not ready, check if the request is for a ready only object.

            if (true === $readyonly) {
                $entryobj = false;
            }
        }

        return $entryobj;

    } catch (Exception $ex2) {
        // Connection failed for some reason.  Maybe proxy settings?
        $errormessage = 'check conversion(' . $ex2->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return false;
    }
}

/**
 * Check that the account has mobile flavours enabled
 *
 * @return bool - true if enabled, otherwise false
 */
function local_yukaltura_has_mobile_flavor_enabled() {

    $filter = new KalturaPermissionFilter();
    $filter->nameEqual = 'FEATURE_MOBILE_FLAVORS';

    $pager = new KalturaFilterPager();
    $pager->pageSize = 30;
    $pager->pageIndex = 1;

    try {
        $clientobj = local_yukaltura_login(true);

        if (empty($clientobj)) {
            throw new Exception("Unable to connect");
        }

        $results = $clientobj->permission->listAction($filter, $pager);

        if ( 0 == count($results->objects) ||
            $results->objects[0]->status != KalturaPermissionStatus::ACTIVE) {

            throw new Exception("partner doesn't have permission");

        }

        return true;

    } catch (Exception $ex) {
        $errormessage = 'mobile flavor on(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return false;
    }
}

/**
 * This function test connection to kaltura server.
 * @param obj $clientobj - Kaltura Client
 * @return mixed - list of permission if succeeded, false if failed.
 */
function local_yukaltura_test_connection($clientobj) {
    $results = false;

    $filter = new KalturaPermissionFilter();
    $filter->nameEqual = 'KMC_READ_ONLY';

    $pager = new KalturaFilterPager();
    $pager->pageSize = 30;
    $pager->pageIndex = 1;

    try {

        $results = $clientobj->permission->listAction($filter, $pager);

        return $results;

    } catch (Exception $ex) {
        $errormessage = 'test connection(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return false;
    }
}

/**
 * Return the Kaltura HTML5 javascript library URL
 * @param int $uiconfid - uiconf_id of the player to use
 *
 * @return string - url to the Kaltura HTML5 library URL
 */
function local_yukaltura_html5_javascript_url($uiconfid) {

    $host = local_yukaltura_get_host();
    $partnerid = local_yukaltura_get_partner_id();

    return "{$host}/p/{$partnerid}/sp/{$partnerid}00/embedIframeJs/uiconf_id/{$uiconfid}/partner_id/{$partnerid}";

}

/**
 * Retrives the enable html 5 flavour configuration option
 *
 * @return string - 1 if enabled, else 0
 */
function local_yukaltura_get_enable_html5() {
    return get_config(KALTURA_PLUGIN_NAME, 'enable_html5');
}

/**
 * This function saves standard media metadata
 *
 * @param obj $connection - Kaltura connection object
 * @param string $entryid - Kaltura media id
 * @param array $param - array of properties to update (accepted keys/value
 * pairs 'name', 'tags', 'desc', 'catids')
 *
 * @return bool - true of successful or false
 */
function local_yukaltura_update_media_metadata($connection, $entryid, $param) {

    $mediaentry = new KalturaMediaEntry();

    if (array_key_exists('name', $param)) {
        $mediaentry->name = $param['name'];
    }

    if (array_key_exists('tags', $param)) {
        $mediaentry->tags = $param['tags'];
    }

    if (array_key_exists('desc', $param)) {
        $mediaentry->description = $param['desc'];
    }

    $result = $connection->media->update($entryid, $mediaentry);

    if (!$result instanceof KalturaMediaEntry) {
        return false;
    }

    return true;

}

/**
 * This function validates media objects.  Checks to see if the media is of a
 * media type "mix".  If so, then an API call is made to get all media entries
 * that make up the mix. If the mix contains one entry then only the one entry
 * is returned.  If the mix contains more than one entry then boolean true is
 * returned.  This function will one day become deprecated; but it for now it is
 * needed because of KALDEV-28
 *
 * @param object $entryobj - entry object
 *
 * @return boolean - true of the entry type is valid, false if invliad AND the
 * id parameter of the entry_object is overwritten and must be retrieve from the
 * kaltura server again
 */
function local_yukaltura_media_type_valid($entryobj) {
    try {
        $clientobj = local_yukaltura_login(true, '');

        if (empty($clientobj)) {
            throw new Exception('Invalid client object');
        }

        // If we encounter a entry of type "mix", we must find the regular "video" type and display that for playback.
        if (KalturaEntryType::MIX == $entryobj->type and
            0 >= $entryobj->duration) {

            // This call returns an array of "video" type entries that exist in the "mix" entry.
            $mediaentries = $clientobj->mixing->getReadyMediaEntries($entryobj->id);

            if (!empty($mediaentries)) {

                if (count($mediaentries) == 1) {
                    $entryobj->id = $mediaentries[0]->id;
                    return false;
                } else {
                    return true;
                }

            }
        }
    } catch (Exception $ex) {
        // Connection failed for some reason.  Maybe proxy settings?
        $errormessage = 'convert to valid entry type(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return false;
    }

}

/**
 * This function deletes a media from the Kaltura server
 *
 * @param obj $connection - Kaltura connection object
 * @param string $entryid - Kaltura media entry id
 *
 * @return bool - true of success, false
 */
function local_yukaltura_delete_media($connection, $entryid) {

    return $connection->media->delete($entryid);
}

/**
 * This function determins whether Moodle is at 2.2 or newer.
 *
 * @return bool - true if this version of Moodle is newer than Moodel 2.3rc1 otherwise false
 */
function local_yukaltura_is_moodle_pre_twothree() {
    // Retrieve the release number from the config table.
    $release = get_config('', 'release');

    // If version is empty for some reason, return false and hope it works out okay.
    if (empty($release)) {
        return false;
    }

    // Parse the release number.
    $releasenum = substr($release, 0, 3);

    // If this version of Moodle is lerger then Moodle 2.3rc1.
    if (0 == strcmp($releasenum, '2.2')) {
        return true;
    } else if (0 == strcmp($releasenum, '2.1')) {
        return true;
    } else if (0 == strcmp($releasenum, '2.0')) {
        return true;
    } else {
        return false;
    }
}

/**
 * This function creates a client tag used to identify API requests to the
 * Kaltura server
 * @return string - client tag
 */
function local_yukaltura_create_client_tag() {

    $clienttag      = 'moodle';
    $release        = get_config('', 'release');
    $releasearray   = explode(' ', $release);
    $kalturaversion = get_config(KALTURA_PLUGIN_NAME, 'version');

    if (!empty($releasearray) && is_array($releasearray)) {
        $clienttag .= '_' . $releasearray[0];
    }

    $clienttag .= "_k_{$kalturaversion}";

    return $clienttag;

}

/**
 * This function returns HTML markup and javascript required to use kwidget to
 * embed the HTML5 video markup. As of KALDEV-201, this function is used
 * exclusively by the filter plug-in because of the issues faced by Moodle's
 * caching filtered text and the XHR loading of course section by the MyMobile
 * theme.
 *
 * @param obj $entryobj - Kaltura media object
 * @param int $uiconfid - player ui_conf_id (optional).  If no value is specified the
 * default player will be used.
 * @param string $session - A kaltura session string
 * @param int $uid - a unique identifier, this value is appented to 'kaltura_player_'
 * and is used as the id of the object tag
 * @return string - HTML tags of kwidget player.
 *
 */
function local_yukaltura_get_kwidget_code($entryobj, $uiconfid = 0, $session = '', $uid = 0) {

    if (!local_yukaltura_is_valid_entry_object($entryobj)) {
        return 'Unable to play media ('. $entryobj->id . ') please contact your site administrator.';
    }

    if (0 == $uid) {
        $uid  = floor(microtime(true));
        $uid .= '_' . mt_rand();
    }

    $kwidgetflashvar = local_yukaltura_get_kwidget_flashvars($entryobj->creatorId, $session);

    if (KalturaMediaType::IMAGE == $entryobj->mediaType) {
        $kwidgetflashvar .= ", 'IframeCustomPluginCss1' : '". new moodle_url('/local/yukaltura/css/hiddenPlayButton.css') . "'";
    }

    if (empty($uiconfid)) {
        $uiconf = local_yukaltura_get_player_uiconf('player');
    } else {
        $uiconf = $uiconfid;
    }

    $markup = '';
    $markup .= "<div id=\"kaltura_player_{$uid}\" style=\"width:{$entryobj->width}px;height:{$entryobj->height}px;\">" . PHP_EOL;
    $markup .= "    <span property=\"dc:description\" content=\"{$entryobj->description}\"></span>" . PHP_EOL;
    $markup .= "    <span property=\"media:title\" content=\"{$entryobj->name}\"></span>" . PHP_EOL;
    $markup .= "    <span property=\"media:width\" content=\"{$entryobj->width}\"></span>" . PHP_EOL;
    $markup .= "    <span property=\"media:height\" content=\"{$entryobj->height}\"></span>". PHP_EOL;
    $markup .= "</div>" . PHP_EOL;
    $markup .= "<script language=javascript>". PHP_EOL;
    $markup .= "    if (document.readyState === \"complete\") {" . PHP_EOL;
    $markup .= "        local_yukaltura_kwidget_{$entryobj->id}();" . PHP_EOL;
    $markup .= "    } else {" . PHP_EOL;
    $markup .= "        window.addEventListener(\"onload\", ";
    $markup .= "function() { local_yukaltura_kwidget_{$entryobj->id}(); }, false);" . PHP_EOL;
    $markup .= "        document.addEventListener(\"DOMContentLoaded\", ";
    $markup .= "function () { local_yukaltura_kwidget_{$entryobj->id}(); }, false);" . PHP_EOL;
    $markup .= "    }" . PHP_EOL;
    $markup .= PHP_EOL;
    $markup .= "    function local_yukaltura_kwidget_{$entryobj->id}() {" . PHP_EOL;
    $markup .= "        console.log('calling kwidget.embed for - kaltura_player_{$uid}');" . PHP_EOL;
    $markup .= "        kWidget.embed({" . PHP_EOL;
    $markup .= "            'targetId': 'kaltura_player_{$uid}'," . PHP_EOL;
    $markup .= "            'wid': '_{$entryobj->partnerId}'," . PHP_EOL;
    $markup .= "            'uiconf_id' : '{$uiconf}'," . PHP_EOL;
    $markup .= "            'entry_id'  : '{$entryobj->id}'," . PHP_EOL;
    $markup .= "            'width'     : '{$entryobj->width}'," . PHP_EOL;
    $markup .= "            'height'    : '{$entryobj->height}'," . PHP_EOL;
    $markup .= "            'flashvars' :{" . PHP_EOL;
    $markup .= "                'externalInterfaceDisabled' : false," . PHP_EOL;
    $markup .= "                'autoPlay' : false{$kwidgetflashvar}" . PHP_EOL;
    $markup .= "            }" . PHP_EOL;
    $markup .= "        });" . PHP_EOL;
    $markup .= "    }". PHP_EOL;
    $markup .= "</script>";

    return $markup;
}

/**
 * Kaltura connection class
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class yukaltura_connection {

    /** @var object - kaltura connection object */
    private static $connection  = null;
    /** @var int - time length until session is expired. */
    private static $timeout = 0;
    /** @var int - start time of Kaltura session. */
    private static $timestarted = 0;

    /**
     * Constructor for Kaltura connection class.
     *
     * @param int $timeout - Length of timeout for Kaltura session in minutes
     */
    public function __construct($timeout = KALTURA_SESSION_LENGTH) {
        self::$connection = local_yukaltura_login(true, '', $timeout);
        if (!empty(self::$connection)) {
            self::$timestarted = time();
            self::$timeout = $timeout;
        }
    }

    /**
     * Get the connection object.  Pass true to renew the connection
     *
     * @param bool $admin if true, get connection as admin, otherwise, as user.
     * @param int $timeout seconds to keep the session alive, if zero is passed the
     * last time out value will be used
     * @return object A Kaltura KalturaClient object
     */
    public function get_connection($admin, $timeout = 0) {
        self::$connection = local_yukaltura_login($admin, '', $timeout);
        return self::$connection;
    }

    /**
     * Return the number of seconds the session is alive for
     * @return int - number of seconds the session is set to live
     */
    public function get_timeout() {

        return self::$timeout;
    }

    /**
     * Return the time the session started
     * @return int - unix timestamp
     */
    public function get_timestarted() {
        return self::$timestarted;
    }

    /**
     * Descruct connnection instance.
     */
    public function __destruct() {
        global $SESSION;

        $SESSION->kaltura_con             = serialize(self::$connection);
        $SESSION->kaltura_con_timeout     = self::$timeout;
        $SESSION->kaltura_con_timestarted = self::$timestarted;

    }

}

/**
 * This function retrieve client ip address.
 *
 * @param bool $checkproxy - if true, check proxy forwarder variable.
 *
 * @return string - client ip address.
 */
function local_yukaltura_get_client_ipaddress($checkproxy = true) {

    if ($checkproxy && local_yukaltura_get_server_variable('HTTP_CLIENT_IP') != null) {
        $ip = local_yukaltura_get_server_variable('HTTP_CLIENT_IP');
    } else if ($checkproxy && local_yukaltura_get_server_variable('HTTP_X_FORWARDED_FOR') != null) {
        $ip = getServer('HTTP_X_FORWARDED_FOR');
    } else { // Not through a proxy.
        $ip = local_yukaltura_get_server_variable('REMOTE_ADDR');
    }
    return $ip;
}

/**
 * This function retrieve server variables.
 *
 * @param string $key - server variable name.
 * @param string $default  - return this value if there does not exist the variable.
 *
 * @return string - value of the variable.
 */
function local_yukaltura_get_server_variable($key, $default = null) {
    return (isset($_SERVER[$key])) ? $_SERVER[$key] : $default;
}

/**
 * This function checks whether the IP address of the client is internal.
 *
 * @param string $ipaddress - IP address of client.
 *
 * @return bool - true if the IP adrress is internal, otherwise false.
 */
function local_yukaltura_check_internal($ipaddress) {
    try {
        $addresslist = get_config(KALTURA_PLUGIN_NAME, 'internal_ipaddress');

        $subnetarray = array();
        if (strpos($addresslist, ' ') === false) {
            $subnetarray[] = $addresslist;
        } else {
            $subnetarray = explode(" ", $addresslist);
        }

        foreach ($subnetarray as $subnet) {
            if ($subnet == "0.0.0.0" || $subnet == "0.0.0.0/0") {
                return true;
            }

            if (strpos($subnet, '/') === false) {
                if ($ipaddress == $subnet) {
                    return true;
                }
            }

            $elements = explode("/", $subnet);

            if (count($elements) == 2) {
                $networkaddress = $elements[0];
                $networkprefix = (int)$elements[1];
                $segments = explode(".", $networkaddress);
                if (count($segments) == 4 &&
                    (int)$segments[0] >= 0 && (int)$segments[0] <= 255 &&
                    (int)$segments[1] >= 0 && (int)$segments[1] <= 255 &&
                    (int)$segments[2] >= 0 && (int)$segments[2] <= 255 &&
                    (int)$segments[3] >= 0 && (int)$segments[3] <= 255 &&
                    $networkprefix >= 1 && $networkprefix <= 32) {

                    if (check_ipaddress_in_range($ipaddress, $subnet)) {
                        return true;
                    }
                }
            }
        }
    } catch (Exception $ex) {
        return false;
    }

    return false;
}

/**
 * This function checks whether the IP address of the client is within a predetermined range.
 *
 * @param string $ip - IP address.
 * @param string $range - range of IP address.
 *
 * @return bool - true if the IP adrress is within the predetermined range, otherwise false.
 */
function check_ipaddress_in_range($ip, $range) {
    try {
        if (!($ip = ip2long($ip))) {
            return false;
        }

        if (strpos($range, '/') !== false) { // Case in subnet.
            list($net, $mask) = explode('/', $range);

            if (!($net = ip2long($net))) {
                return false;
            }

            if (is_numeric($mask)) {
                $mask = long2ip(bindec(str_repeat('1', $mask) . str_repeat('0', 32 - $mask)));
            }

            if (!($mask = ip2long($mask))) {
                return false;
            }

            return (($ip & $mask) === ($net & $mask)) ? true : false;
        } else if (strpos($range, '-') !== false) {  // Case in range.
            $range = explode('-', $range);
            if (!($range[0] = ip2long($range[0]))) {
                return false;
            }
            if (!($range[1] = ip2long($range[1]))) {
                return false;
            }
            return ($range[0] <= $ip && $ip <= $range[1]) ? true : false;

        } else if ($range = ip2long($range)) {
            return ($range === $ip) ? true : false;
        }
    } catch (Exception $ex) {
        return false;
    }

    return false;
}

/**
 * This function retrieves defaul access control of Kaltura server.
 *
 * @param object $connection - connection object for Kaltura server.
 *
 * @return object - object of defaul access control.
 */
function local_yukaltura_get_default_access_control($connection) {
    try {
        $result = $connection->accessControl->listAction();

        if (is_null($result)) {
            return null;
        }

        $controllist = $result->objects;

        if (is_null($controllist) or count($controllist) == 0) {
            return null;
        }

        foreach ($controllist as $control) {
            if ($control->name == KALTURA_DEFAULT_ACCESS_CONTROL_NAME and
                $control->systemName == KALTURA_DEFAULT_ACCESS_CONTROL_SYSTEM_NAME) {
                return $control;
            }
        }
    } catch (Exception $ex) {
        $errormessage = 'Error in local_yukaltura_get_default_access_control(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return null;
    }

    return null;
}

/**
 * This function retrieves internal access control of Kaltura server.
 *
 * @param object $connection - connection object for Kaltura server.
 *
 * @return object - object of internal access control.
 */
function local_yukaltura_get_internal_access_control($connection) {
    try {
        $result = $connection->accessControl->listAction();

        if (is_null($result)) {
            return null;
        }

        $controllist = $result->objects;

        if (is_null($controllist) or count($controllist) == 0) {
            return null;
        }

        foreach ($controllist as $control) {
            if ($control->name == KALTURA_INTERNAL_ACCESS_CONTROL_NAME and
                $control->systemName == KALTURA_INTERNAL_ACCESS_CONTROL_SYSTEM_NAME) {
                return $control;
            }
        }
    } catch (Exception $ex) {
        $errormessage = 'Error in local_yukaltura_get_internal_control(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return null;
    }

    return null;
}

/**
 * This function creates default access control of Kaltura server.
 *
 * @param object $connection - connection object for Kaltura server.
 *
 * @return object - object of internal access control.
 */
function local_yukaltura_create_default_access_control($connection) {
    $control = new KalturaAccessControl();

    try {
        $control->name = KALTURA_DEFAULT_ACCESS_CONTROL_NAME;
        $control->systemName = KALTURA_DEFAULT_ACCESS_CONTROL_SYSTEM_NAME;
        $control->description = KALTURA_DEFAULT_ACCESS_CONTROL_DESC;
        $control->isDefault = KalturaNullableBoolean::TRUE_VALUE;
        $control->restrictions = array();
        $control = $connection->accessControl->add($control);
    } catch (Exception $ex) {
        $errormessage = 'Error in local_yukaltura_create_default_access_control(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return null;
    }

    return $control;
}

/**
 * This function creates internal access control of Kaltura server.
 *
 * @param object $connection - connection object for Kaltura server.
 *
 * @return object - object of internal access control.
 */
function local_yukaltura_create_internal_access_control($connection) {
    $control = new KalturaAccessControl();

    try {
        $control->name = KALTURA_INTERNAL_ACCESS_CONTROL_NAME;
        $control->systemName = KALTURA_INTERNAL_ACCESS_CONTROL_SYSTEM_NAME;
        $control->description = KALTURA_INTERNAL_ACCESS_CONTROL_DESC;
        $control->isDefault = KalturaNullableBoolean::NULL_VALUE;
        $restriction = new KalturaIpAddressRestriction();
        $restriction->ipAddressRestrictionType = KalturaIpAddressRestrictionType::ALLOW_LIST;

        $addresses = get_config(KALTURA_PLUGIN_NAME, 'internal_ipaddress');

        if ($addresses != null and $addresses != '') {
            $addressarray = explode(" ", $addresses);
            if (count($addressarray) >= 2) {
                $addresses = implode(",", $addressarray);
            }
        }

        $restriction->ipAddressList = $addresses;
        $control->restrictions = array($restriction);
        $control = $connection->accessControl->add($control);
    } catch (Exception $ex) {
        $errormessage = 'Error in local_yukaltura_create_internal_access_control(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return null;
    }

    return $control;
}

/**
 * This function updates internal access control of Kaltura server.
 *
 * @param object $connection - connection object for Kaltura server.
 * @param int $id - id of access control.
 *
 * @return bool - true if update is scceeded, otherwise false.
 */
function local_yukaltura_update_internal_access_control($connection, $id) {
    $control = new KalturaAccessControl();

    try {
        $control->id = $id;
        $control->name = KALTURA_INTERNAL_ACCESS_CONTROL_NAME;
        $control->systemName = KALTURA_INTERNAL_ACCESS_CONTROL_SYSTEM_NAME;
        $control->description = KALTURA_INTERNAL_ACCESS_CONTROL_DESC;
        $control->isDefault = KalturaNullableBoolean::NULL_VALUE;
        $restriction = new KalturaIpAddressRestriction();
        $restriction->ipAddressRestrictionType = KalturaIpAddressRestrictionType::ALLOW_LIST;

        $addresses = get_config(KALTURA_PLUGIN_NAME, 'internal_ipaddress');

        if ($addresses != null and $addresses != '') {
            $addressarray = explode(" ", $addresses);
            if (count($addressarray) >= 2) {
                $addresses = implode(",", $addressarray);
            }
        }

        $restriction->ipAddressList = $addresses;
        $control->restrictions = array($restriction);
        $connection->accessControl->update($id, $control);
    } catch (Exception $ex) {
        $errormessage = 'Error in local_yukaltura_update_internal_profile(' . $ex->getMessage() . ')';
        print_error($errormessage, 'local_yukaltura');
        return null;
    }
    return $control;
}

/**
 * This function checks if the user can use My Media..
 *
 * @return - true if user can use My Media, otherwise false.
 */
function local_yukaltura_get_mymedia_permission() {
    global $USER;

    $check = get_config(KALTURA_PLUGIN_NAME, 'mymedia_limited_access');
    $keyword = get_config(KALTURA_PLUGIN_NAME, 'mymedia_access_keyword');

    if ($check == '0' || $keyword == null || $keyword == '') {
        return true;
    }

    $rule = get_config(KALTURA_PLUGIN_NAME, 'mymedia_access_rule');

    if ($rule == 'contain_firstname' && strpos($USER->firstname, $keyword) !== false) {
        return true;
    } else if ($rule == 'not_contain_firstname' && strpos($USER->firstname, $keyword) === false) {
        return true;
    } else if ($rule == 'contain_lastname' && strpos($USER->lastname, $keyword) !== false) {
        return true;
    } else if ($rule == 'not_contain_lastname' && strpos($USER->lastname, $keyword) === false) {
        return true;
    } else if ($rule == 'contain_email' && strpos($USER->email, $keyword) !== false) {
        return true;
    } else if ($rule == 'not_contain_email' && strpos($USER->email, $keyword) === false) {
        return true;
    }

    return false;
}

/**
 * Create the root category structure.
 *
 * @param obj $connection - Kaltura connection object
 * @return mixed - an array with the root category path and the root category id
 *  or false if something wrong happened
 */
function local_yukaltura_create_root_category($connection) {

    $first = true;
    $parentid = '';
    $categories = array();
    $rootcategory = get_config(KALTURA_PLUGIN_NAME, 'rootcategory');
    $duplicate = false;

    // Split categories into an array.
    if (!empty($rootcategory)) {
        $categories = explode('>', $rootcategory);
    }

    $categorytocreated = '';

    // Check if categories already exist in the KMC.
    foreach ($categories as $categoryname) {

        if (empty($categorytocreated)) {
            $categorytocreated = $categoryname;
        } else {
            $categorytocreated = $categorytocreated . '>' . $categoryname;
        }

        // Check if the category already exists. If any exists then we cannot create the category.
        if (local_yukaltura_category_path_exists($connection, $categorytocreated)) {
            $duplicate = true;
            break;
        }
    }

    // If thre is a duplicate, the user must specify a different root category format.
    if ($duplicate) {
        return false;
    }

    $result = null;

    // Create categories.
    foreach ($categories as $categoryname) {

        if ($first) {
            $result = local_yukaltura_create_category($connection, $categoryname);
        } else {
            $result = local_yukaltura_create_category($connection, $categoryname, $parentid);
        }

        if (!empty($result)) {

            if ($first) {
                $rootcategory = $result->name;
            } else {
                $rootcategory .= '>' . $result->name;
            }

            $first = false;
            $parentid = $result->id;
        }
    }

    // Save configuration.
    set_config('rootcategory', $rootcategory, KALTURA_PLUGIN_NAME);
    set_config('rootcategory_id', $result->id, KALTURA_PLUGIN_NAME);

    return array($rootcategory, $result->id);
}

/**
 * Create a category in the KMC.  If a perent id is passed then the category
 * will be created as a sub category of the parent id
 *
 * @param object $connection - Kaltura connection object
 * @param string $name - category name
 * @param int $parentid - (optional) parent id
 * @return object - KalturaCategory if category was created, otherwise false
 */
function local_yukaltura_create_category($connection, $name, $parentid = 0) {

    if (empty($name)) {
        return false;
    }

    $category = new KalturaCategory();
    $category->name = $name;

    if (!empty($parentid)) {
        $category->parentId = $parentid;
    }

    $result = $connection->category->add($category);

    if ($result instanceof KalturaCategory) {
        return $result;
    }

    return false;
}

/**
 * Checks if a specific category has a matching fullName value
 * @param obj $connection - Kaltura connection object
 * @param int $categoryid - category id
 * @param string $path - category fullName path
 * @return bool - true if category with fullName path exists. Else false
 */
function local_yukaltura_category_id_path_exists($connection, $categoryid, $path) {
    if (empty($path) || empty($categoryid)) {
        return false;
    }

    $filter = new KalturaCategoryFilter();
    $filter->fullNameEqual = $path;
    $filter->idEqual = $categoryid;
    $result = $connection->category->listAction($filter);

    if ($result instanceof KalturaCategoryListResponse &&
        1 == $result->totalCount) {

        if ($result->objects[0] instanceof KalturaCategory) {
            return $result->objects[0];
        }
    }

    return false;

}

/**
 * Checks if a category path exists, if path exists then it returns the
 * a KalturaCategory object.  Otherwise false.  The API does not allow searching
 * for categories (using the 'category' service) by name
 *
 * @param object $connection - An instance of the yukaltura_connection class.
 * @param string $path - The Kaltura root path.
 * @return bool|KalturaCategory - A KalturaCategory if path exists, otherwise false
 */
function local_yukaltura_category_path_exists($connection, $path) {
    global $SESSION;

    if (empty($path)) {
        return false;
    }

    // Retrieve access data from the session global.
    if (isset($SESSION->kalrepo)) {

        if (isset($SESSION->kalrepo["$path"]) && !empty($SESSION->kalrepo["$path"])) {
            // Gonen - 2nd change - unserialize the found object before returning.
            $obj = unserialize($SESSION->kalrepo["$path"]);
            if ($obj !== false) {
                return $obj;
            }
        }
    } else {
        $SESSION->kalrepo = array(array());
    }

    $filter = new KalturaCategoryFilter();
    $filter->fullNameEqual = $path;
    $result = $connection->category->listAction($filter);

    if ($result instanceof KalturaCategoryListResponse &&
        1 <= $result->totalCount) {

        if ($result->objects[0] instanceof KalturaCategory) {
            // Gonen - 1st change - save serialized object to session.
            $SESSION->kalrepo["$path"] = serialize($result->objects[0]);
            return $result->objects[0];
        }
    }

    return false;
}

/**
 * This function creates a Kaltura category, if one doesn't exist, whose name is
 * the Moodle username; and returns the category
 *
 * @param obj $connection - Kaltura connection object
 * @param int $username - Moodle username
 *
 * @return mixed - KalturaCategory object, or false if it failed to create one
 */
function local_yukaltura_create_user_category($connection, $username) {

    // Get the root category path.
    $rootpath = get_config(KALTURA_PLUGIN_NAME, 'rootcategory');

    // Check if the root category path is an empty string.
    if (empty($rootpath)) {
        return false;
    }
    $path = $rootpath . '>' . $username;

    // Check if the category exists.
    $usercategory = local_yukaltura_category_path_exists($connection, $path);

    if (!$usercategory) {

        $rootid = get_config(KALTURA_PLUGIN_NAME, 'rootcategory_id');

        // Create category.
        $usercategory = local_yukaltura_create_category($connection, $username, $rootid);

        if (!$usercategory) {
            return false;
        }
    }

    return $usercategory;
}

/**
 * Refactored code from search_own_medias(), except it also returns medias
 * that are still being converted.
 *
 * @param object $connection - Kaltura connection object
 * @param string $search - Search string (optional)
 * @param int $pageindex - Pager index
 * @param int $mediasperpage - Number of medias to display on a single page (optional override)
 * @param string $sort - Optional sort (most recent or alphabetical)
 *
 * @return array - List of medias
 */
function local_yukaltura_search_mymedia_medias($connection, $search = '', $pageindex = 0, $mediasperpage = 0, $sort = null) {

    global $USER;

    $results = array();

    // Create filter.
    $filter = local_yukaltura_create_mymedia_filter($search, $sort);

    // Filter medias with the user's username as the user id.
    $filter->userIdEqual = $USER->username;

    // Create pager object.
    $pager = local_yukaltura_create_pager($pageindex, $mediasperpage);

    // Get results.
    $results = $connection->media->listAction($filter, $pager);

    return $results;

}

/**
 * This function returns a KalturaMediaEntryFilter object with specific
 * properties based on the arguments passed.  A freeText search is used when
 * name and tags are not empty.  A tagsMultiLikeOr is used when tags is not
 * empty.  A nameMultiLikeOr is used when name is not empty
 *
 * @param string $name - media name search criteria
 * @param string $tags - media tags serach criteria
 * @param string $multioverride - (optional) generic search criteria override.  Forces the
 * function to use tagsNameMultiLikeOr search filter
 *
 * @return obj - KalturaMediaEntryFilter object
 */
function local_yukaltura_create_media_filter($name, $tags, $multioverride = '') {

    $filter = new KalturaMediaEntryFilter();

    if (!empty($multioverride)) {
        $searchname = explode(' ', $multioverride);

        // Removing duplicate search terms.
        $search = array_flip(array_flip($searchname));

        $filter->tagsNameMultiLikeOr = implode(',', $search);

    } else if (!empty($name) && !empty($tags)) {
        // If name and tag is not empty use tagsNameMultiLikeOr search.
        $searchtags = explode(' ', $tags);
        $searchname = explode(' ', $name);

        // Removing duplicate search terms.
        $search = array_flip(array_flip(array_merge($searchtags, $searchname)));

        $filter->tagsNameMultiLikeOr = implode(',', $search);

    } else if (!empty($tags)) {

        $searchtags = explode(' ', $tags);
        $searchtags = implode(',', $searchtags);
        $filter->tagsMultiLikeOr = $searchtags;
    } else if (!empty($name)) {

        $searchname = explode(' ', $name);
        $searchname = implode(',', $searchname);
        $filter->nameMultiLikeOr = $searchname;
    }

    $filter->orderBy = 'name';

    return $filter;
}

/**
 * Refactored code from create_media_filter(), except it only uses
 * tagsNameMultiLikeOr and uses KalturaEntryStatus::READY, KalturaEntryStatus::
 * PRECONVERT, KalturaEntryStatus::IMPORT to retrieve medias that are still
 * being converted.
 *
 * @param string $search - Media search string (separated by spaces)
 * @param string $sort - Optional sort (most recent or alphabetical)
 * @return obj - KalturaMediaEntryFilter object
 */
function local_yukaltura_create_mymedia_filter($search, $sort = null) {

    $filter = new KalturaMediaEntryFilter();

    $searchname = explode(' ', $search);

    // Removing duplicate search terms.
    $searchname = array_flip(array_flip($searchname));

    $filter->freeText = implode(',', $searchname);

    $filter->statusIn = KalturaEntryStatus::READY .','.
                        KalturaEntryStatus::PRECONVERT .','.
                        KalturaEntryStatus::IMPORT;

    if ($sort == 'recent') {
        $filter->orderBy = KalturaBaseEntryOrderBy::CREATED_AT_DESC;
    } else if ($sort == 'old') {
        $filter->orderBy = KalturaBaseEntryOrderBy::CREATED_AT_ASC;
    } else if ($sort == 'name_asc') {
         $filter->orderBy = KalturaBaseEntryOrderBy::NAME_ASC;
    } else if ($sort == 'name_desc') {
         $filter->orderBy = KalturaBaseEntryOrderBy::NAME_DESC;
    } else {
        $filter->orderBy = KalturaBaseEntryOrderBy::CREATED_AT_DESC;
    }

    return $filter;
}


/**
 * This function creates and returns a KalturaFilterPager object.  If a page
 * index greater than 0 is passed, the pager object will be created with a
 * pageIndex equal to the parameter.  The size of the page is determined by the
 * itemsperpage plug-in configuration setting.
 *
 * @param int $pageindex - pager index value
 * @param int $itemsperpage - number of items to display on a page (optinal override)
 *
 * @return obj - KalturaFilterPager object
 */
function local_yukaltura_create_pager($pageindex = 0, $itemsperpage = 0) {

    $page = new KalturaFilterPager();

    if (empty($itemsperpage)) {
        $page->pageSize = get_config(KALTURA_PLUGIN_NAME, 'mymedia_items_per_page');
    } else {
        $page->pageSize = $itemsperpage;
    }

    if (0 <= (int) $pageindex) {
        $page->pageIndex = '+' . (int) $pageindex;
    } else {
        $page->pageIndex = 0;
    }

    return $page;

}

/**
 * This function checks if the user can use webcamera.
 *
 * @return - true if user can use webcamera, otherwise false.
 */
function local_yukaltura_get_webcam_permission() {
    $check = get_config(KALTURA_PLUGIN_NAME, 'enable_webcam');

    if ($check == '1') {
        return true;
    } else {
        return false;
    }
}
