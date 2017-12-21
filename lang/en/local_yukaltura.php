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
 * Kaltura media assignment locallib
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'YU Kaltura Media Local Libraries';
$string['hostedconn'] = 'Kaltura Hosted Solution (SaaS)';
$string['ceconn'] = 'Kaltura CE';
$string['conn_heading_title'] = 'Kaltura hosted and CE settings';
$string['conn_heading_desc'] = 'Input the type of connection you would like to use (KalturaCE or the hosted Kaltura server) and enter in the credentials related to the connection you are using.';
$string['conn_server'] = 'Connection Server';
$string['conn_server_desc'] = 'Select whether you are connecting to a hosted account on whether you are connect to your own Kaltura CE server';
$string['server_uri'] = 'Server URI';
$string['server_uri_desc'] = 'Type in the server URI you want to connect to.  Otherwise just type in the default settings';
$string['hosted_login'] = 'Hosted account login';
$string['hosted_login_desc'] = 'Login username that is used to log into the Kaltura site';
$string['hosted_password'] = 'Hosted account password';
$string['hosted_password_desc'] = 'Password that is used to log into the Kaltura site';
$string['player_regular_light'] = 'Player light (6709421)';
$string['player_regular_dark'] = 'Player dark (6709411)';
$string['custom_player'] = 'Custom player';
$string['kaltura_player_resource'] = 'Kaltura resource player';
$string['kaltura_player_resource_desc'] = 'Player used to play-back media for Media Resources.  This player will appear as the default player for new Media Resources. However it may be overridden if the <b>Override media resource player setting</b> is unchecked';
$string['kaltura_player_resource_custom'] = 'Custom UIConf';
$string['kaltura_player_resource_custom_desc'] = 'Only used if you have a custom resource player UIConf ID';
$string['kaltura_player'] = 'Kaltura player';
$string['kaltura_player_desc'] = 'Player used to play-back media for Media Assignments';
$string['kaltura_player_custom'] = 'Custom UIConf';
$string['kaltura_player_custom_desc'] = 'Only used if you have a custom assignment player UIConf ID';
$string['conn_status_title'] = 'Connection status';
$string['conn_success'] = 'Successfully logged in with credentials';
$string['conn_failed'] = 'Unable to login.  Please verify your credentials and connection settings and try again';
$string['test_connection'] = 'Test connection to Kaltura server';
$string['click_test_button'] = 'Click button to test the connection';
$string['start'] = 'Start';
$string['flashminimum'] = 'Flash player version 9 and above is required. <a href=\"http://get.adobe.com/flashplayer/\">Upgrade your flash version</a>';
$string['upload_successful'] = 'Media uploaded successfully.  Remember to save/submit.';
$string['media_converting'] = 'The media is still converting.  Please check the status of the media at a later time.';
$string['media_converting'] = 'The media is still converting.  Please check the status of the media at a later time.';
$string['conn_failed_alt'] = 'Connection with Kaltura is currently unavailable.  Please inform your administrator.';
$string['player_resource_override'] = 'Override media resource player setting';
$string['player_resource_override_desc'] = 'Check this option to override the individual Media Resource player selection.  This will force all Media Resource activities to use the selected <b>Kaltura resource player</b>';
$string['enable_html5'] = 'Enable HTML5 flavour';
$string['enable_html5_desc'] = 'Check this setting to enable to use of the HTML5 flavours when viewing media';
$string['media_error'] = 'There was an error processing this media.  Please try another media';
$string['media_bad'] = 'Please do not use this media';
$string['kaltura_general'] = 'General Settings';
$string['kaltura_kalmediapres_title'] = 'Kaltura Media Presentation Settings';
$string['kaltura_kcw_title'] = 'Kaltura Content Wizard (KCW) Settings';
$string['kaltura_kalmediares_title'] = 'Kaltura Media Resource Settings';
$string['kaltura_kalmediaassign_title'] = 'Kaltura Media Assignment Settings';
$string['filter_player_width'] = 'Embedded player width';
$string['filter_player_width_desc'] = 'Width of the embedded player';
$string['filter_player_height'] = 'Embedded player height';
$string['filter_player_height_desc'] = 'Height of the embedded player';
$string['filter_player'] = 'Embedded player height';
$string['filter_player_desc'] = 'Height of the embedded player';
$string['filter_custom'] = 'Custom embedded UIConf ID';
$string['filter_custom_desc'] = 'Only used if you have a custom player for embedding media';
$string['player_filter'] = 'Embedded player';
$string['player_filter_desc'] = 'Player used by the Kaltura filter plug-in when embedding media on the page';
$string['kaltura_filter_title'] = 'Embedded player used via the File Picker (Kaltura Filter) settings';
$string['kaltura_mymedia_title'] = 'My Media Settings';
$string['nine'] = '9';
$string['eighteen'] = '18';
$string['twentyone'] = '21';
$string['twentyfour'] = '24';
$string['twentyseven'] = '27';
$string['thirty'] = '30';
$string['mymedia_items_per_page'] = 'Medias per page';
$string['mymedia_items_per_page_desc'] = 'The number of media to display on a single page';
$string['mymedia_limited_access'] = 'Limited access';
$string['mymedia_limited_access_desc'] = 'Set a limit to access My Media.';
$string['mymedia_access_rule'] = 'Access check rule';
$string['mymedia_access_rule_desc'] = 'Selected rule is used to check access permission to My Media.';
$string['mymedia_contain_firstname'] = 'Contains keyword in firstname';
$string['mymedia_not_contain_firstname'] = 'Not contain keyword in firstname';
$string['mymedia_contain_lastname'] = 'Contains keyword in lastname';
$string['mymedia_not_contain_lastname'] = 'Not contain keyword in lastname';
$string['mymedia_contain_email'] = 'Contains keyword in mail address';
$string['mymedia_not_contain_email'] = 'Not contain keyword in mail address';
$string['mymedia_access_keyword'] = 'Keyword';
$string['mymedia_access_keyword_desc'] = 'Users who contains (or do not contains) this keyword are allowed to use My Media.';
$string['enable_webcam'] = 'Enable webcamera recording';
$string['enable_webcam_desc'] = 'Check this setting to enable to use of the webcamera recording and uploading.';
$string['application_name'] = 'Application name';
$string['application_name_desc'] = 'The application name is the name reported back to the Kaltura server to be used for aggregation by application in the user level reports';
$string['player_mymedia_screen_recorder'] = 'Default screen recorder widget (9780761)';
$string['kaltura_reports'] = 'Kaltura reports';
$string['kaltura_kalreports_heading'] = 'Kaltura Reports Settings';
$string['report_server_uri'] = 'Reports server URI';
$string['report_server_uri_desc'] = 'Type in the Kaltura reporting server URI you want to connect to';
$string['kalmediaassign_player_height'] = 'Player height';
$string['kalmediaassign_player_height_desc'] = 'Adjust this setting if your Kaltura player is being cut off when submitting and/or viewing media submissions.';
$string['kalmediaassign_player_width'] = 'Player width';
$string['kalmediaassign_player_width_desc'] = 'Adjust this setting if your Kaltura player is being cut off when submitting and/or viewing media submissions.';

$string['kalmediaassign_popup_player_height'] = 'Popup player height';
$string['kalmediaassign_popup_player_height_desc'] = 'Adjust this setting if your Kaltura player is being cut off when submitting and/or popup viewing media submissions.';
$string['kalmediaassign_popup_player_width'] = 'Popup player width';
$string['kalmediaassign_popup_player_width_desc'] = 'Adjust this setting if your Kaltura player is being cut off when submitting and/or popup viewing media submissions.';

$string['enable_reports'] = 'Enable reports';
$string['enable_reports_desc'] = 'Kaltura reports are only compatible with Kaltura version Falcon or above';
$string['internal_ipaddress'] = 'Internal IP Address';
$string['internal_ipaddress_desc'] = 'A global setting to internal IP address / subnet used in your organization. For example, the IP address is written like 192.168.1.1, and the subnet is written like 192.168.1.0/24. If you need multiple IP address and subnet, those must be separated by whitespace(s).';

// Copy string from repository.
$string['connection_status'] = 'Connection Status';
$string['connected'] = 'Connection to Kaltura successful';
$string['not_connected'] = 'Connection to Kaltura failed';
$string['rootcategory'] = 'Root category path';
$string['rootcategory_desc'] = '<p>Set the root category path to create a category/sub-category structure, in the KMC, to organize all of the Moodle course categories. For example: <b>Sites>My Moodle Site</b>, will create a KMC category called "Sites" and a sub category called "My Moodle Site".  All of your Moodle course categories will created as a sub directories of "My Moodle Site".</p>';
$string['rootcategory_warning'] = 'The root category has already been set.  If you change the name all Moodle course category related data on the KMC will be lost';
$string['rootcategory_created'] = 'Root category created with the following structure <b>{$a}</b>';
$string['rootcategory_create'] = 'Please specify a root category.';
$string['unable_to_create'] = 'Unable to create root category as <b>{$a}</b>.  Please Choose another name(s) for the root category';
$string['resetroot'] = 'Reset category location';
$string['confirm_category_reset'] = '<p>Are you sure you want to reset the root category location?</p><p>If you perform this action, all media course sharing and usage information in Moodle will be lost.</p><p>If you accidentially click "continue", it is possible to get your information back, but only if you set the category path back to the <b>original</b> value.</p><p>Choose wisely.</p>';
$string['category_reset_complete'] = '<b>Root category has been reset</b>';

// Properties panel.
$string['media_properties'] = 'Media Properties';
$string['media_prop_header'] = 'Media Properties';
$string['media_prop_name'] = 'Name:';
$string['media_prop_player'] = 'Player design:';
$string['media_prop_dimensions'] = 'Player dimensions:';
$string['media_prop_size'] = 'Player size:';
$string['media_prop_size_large'] = 'Large (400x365)';
$string['media_prop_size_small'] = 'Small (260x260)';
$string['media_prop_size_custom'] = 'Custom size';
$string['custom_player'] = 'Custom player';
$string['invalid_name'] = 'There is deprecated letter(s) in name.';
$string['empty_size'] = 'Please input custom player size(width,height).';
$string['invalid_custom_size'] = 'Custom player size(width,height) is a wrong dimension.';
$string['invalid_size'] = 'Player size(width,height) is a wrong dimension.';

// Simple selector.
$string['selected_media'] = 'Selected Media';

// Troubles.
$string['no_media'] = 'No media found';
$string['problem_viewing'] = 'There is a problem displaying the page.  Please try again or contact your site administrator';
$string['permission_disable'] = 'You don\'t have permission to use kaltura media.';

// Screen recorder.
$string['screenrecorder'] = 'Screen Recording';
$string['loadingwait'] = 'Loading. This may take a few minutes.';

// Capabilities.
$string['yukaltura:view_report'] = 'View Kaltura reports';
$string['yukaltura:view_selector'] = 'View media';
$string['yukaltura:search_selector'] = 'Search media';

// Search.
$string['search'] = 'Search';
$string['search_clear'] = 'Clear';
$string['search_text_tooltip'] = 'Enter media name or tags';

// Sorting.
$string['sortby'] = 'Sort by';
$string['mostrecent'] = 'Most recent';
$string['oldest'] = 'Oldest';
$string['medianameasc'] = 'Media name (ascending)';
$string['medianamedesc'] = 'Media name (descending)';

// Kaltura reports.
$string['kaltura_report_navbar'] = 'Kaltura Course Media Reports';
$string['header_kaltura_reports'] = 'Kaltura Reports';
$string['no_capability'] = 'You don\'t have the capability to view this report';
$string['report_disabled'] = 'Kaltura reporting has been disabled.  Please enable it in the Kaltura Package Libraries local plug-in';
$string['kaltura_course_reports'] = 'Kaltura Course Media Reports';
$string['clear'] = 'Clear';
$string['course_name'] = 'Course name:';
$string['found_course'] = 'Found {$a} course(s):';
$string['no_recent_course'] = 'There are currently no recently visited courses to display';
$string['no_course_result'] = 'No course results for "{$a}"';
$string['recent_course_view'] = 'Recently viewed course(s):';
$string['recent_courses_display_limit'] = 'Recent courses display limit';
$string['recent_courses_display_limit_desc'] = 'The limit of the number of recently viewed courses to display';
$string['search'] = 'Search';
$string['search_courses_display_limit'] = 'Course search display limit';
$string['search_courses_display_limit_desc'] = 'The limit of the number of courses to display from a search';
$string['repo_not_installed'] = 'The Kaltura repository needs to be installed to view this file';
