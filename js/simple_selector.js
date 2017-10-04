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
 * Simple Secctor script for kaltura media embed.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/*global $:false unsed:false undef:false jQuery:true */
/* global $ */

var modalX = 0;
var modalY = 0;

var timer = false;

/**
 * This function reflects change of sort option.
 * @access public
 */
function changeSort() {
    // Get url.
    var url = document.getElementById("selectorSort").value;
    // Change url of selector window.
    location.href = url;
}

/**
 * This is callback function for thumbnail click.
 * @access private
 * @param {int} - entry ID of selected media.
 * @param {string} - title of selected media.
 * @param {string} - tag of selected thumbnail.
 */
function clickThumbnailImage(select_id, select_name, select_thumbnail) {
    // Get entry id of selected media.
    document.getElementById("select_id").value = select_id;
    // Get name of selected media.
    document.getElementById("select_name").innerHTML = select_name;
    // Get thumbnail of selected media.
    document.getElementById("select_thumbnail").value = select_thumbnail;

    // Enable OK button.
    document.getElementById("submit_btn").disabled = false;
    document.getElementById("submit_btn").style.opacity = "1.0";
}

/**
 * This function centerize modal window.
 * @access private
 * @param {object} - HTML element of content panel.
 */
function centeringModalSyncer(content_panel){
    if (timer !== false){
        clearTimeout(timer);
    }
    timer = setTimeout(function() {
        // Get width and height of window.
        var w = $(window).width();
        var h = $(window).height();

        // Get width and height of modal content.
        var cw = $(content_panel).outerWidth();
        var ch = $(content_panel).outerHeight();

        // Execute centering of modal window.
        $(content_panel).css({"left": ((w - cw) / 2) + "px","top": ((h - ch) / 2) + "px"});
    }, 200);
}

/**
 * This function print modal window.
 * @access private
 * @param {string} - URL of simple selector web page.
 */
function fadeInSelectorWindow(selectorURL) {
    // Avoidance of duplicatable execute.
    $(this).blur(); // Unfocus base window.
    if ($("#modal_window")[0]) {
        return false;
    }

    // Save scroll position of base window.
    var dElm = document.documentElement;
    var dBody = document.body;
    modalX = dElm.scrollLeft || dBody.scrollLeft;   // X value of current position.
    modalY = dElm.scrollTop || dBody.scrollTop;     // Y value of current position.
    // Print ovaerlay.
    $("body").append("<div id=\"selector_content\"></div>");
    $("body").append("<div id=\"modal_window\"></div>");
    $("#modal_window").fadeIn("slow");

    // Centering content.
    centeringModalSyncer("#selector_content");
    // Fade-in content.
    $("#selector_content").fadeIn("slow");
    // Set url of content.
    $("#selector_content").html("<iframe src=\"" + selectorURL + "\" width=\"100%\" height=\"100%\">");

    // Cntering content.
    centeringModalSyncer("#selector_content");

    $(parent.window).resize(function() {
        centeringModalSyncer("#selector_content");
    });
}

/**
 * This function delete modal window.
 * @access public
 */
function fadeOutSelectorWindow() {

    // Restore scroll position of base window.
    window.scrollTo( modalX , modalY );

    // Fade-out and delete modal contet and modal window.
    $("#modal_window", parent.document).fadeOut("slow");
    $("#modal_window", parent.document).remove();
    $("#selector_content", parent.document).fadeOut("slow");
    $("#selector_content", parent.document).remove();
}

/**
 * This function is callback for OK button click.
 * @access public
 */
function selectorSubmitClick() {
    // Get entry id of selected media.
    var select_id = document.getElementById("select_id").value;
    // Get name of selected media.
    var select_name = document.getElementById("select_name").innerHTML;
    // Get thumbnail of selected media.
    var select_thumbnail = document.getElementById("select_thumbnail").value;

    if (select_id !== null && select_id != "") {
        if (parent.document.getElementById("entry_id") !== null) {
            parent.document.getElementById("entry_id").value = document.getElementById("select_id").value;
        }

        var id_name = parent.document.getElementById("id_name");

        if (id_name !== null) {
            id_name.value = document.getElementById("select_name").innerHTML;
        }

        var desc = "";

        var select_desc = document.getElementById("description_" + select_id);
        if (select_desc !== null) {
            desc = select_desc.innerHTML;
            desc = desc.replace(/\n/g, "<br />");
        }

            desc = "<p>" + desc + "<br /></p>";

        var editor = parent.document.getElementById("id_introeditoreditable");

        if (editor !== null) {
            editor.innerHTML = desc;
        }

        if (parent.document.getElementById("media_thumbnail") !== null) {
            parent.document.getElementById("media_thumbnail").src = select_thumbnail;
            parent.document.getElementById("media_thumbnail").alt = select_name;
            parent.document.getElementById("media_thumbnail").title = select_name;
        }

        var id_media_properties = parent.document.getElementById("id_media_properties");
        if (id_media_properties !== null) {
            id_media_properties.style.visibility = "visible";
        }

        var submit_media = parent.document.getElementById("submit_media");
        if (submit_media !== null) {
            submit_media.disabled = false;
        }

        // Fade-out modal windoiw.
        fadeOutSelectorWindow();
    }
}

/**
 * This function replaces "Add Media" label when membed media is selected.
 * @access private
 * @param {string} - Label of "Add Media" button.
 */
function replaceAddMediaLabel(str) {
    parent.document.getElementById("id_add_media").value = str;
}
