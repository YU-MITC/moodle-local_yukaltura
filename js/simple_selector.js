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

 /**
  * @module local_yukaltura/simple_uploader
  */

var modalX = 0;
var modalY = 0;

var timer = false;

/**
 * This function reflects change of sort option.
 * @access private
 * @param none
 * @return nothing
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
 * @return nothing
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
 * @return nothing
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
 * @return nothing
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
 * @access private
 * @param none
 * @return nothing
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
 * @access private
 * @param none
 * @return nothing
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
 * @return nothing
 */
function replaceAddMediaLabel(str) {
    parent.document.getElementById("id_add_media").value = str;
}

/**
 * This function print modal window of player properties.
 * @param {string} - URL of selector page.
 * @return nothing
 */
function fadeInPropertiesWindow(selectorURL) {
    // Avoidance of duplicatable execute.
    $(this).blur();  // Unfocous.
    if ($("#modal_window")[0]) {
        return false;
    }

    // Save scroll position of base window.
    var dElm = document.documentElement;
    var dBody = document.body;
    modalX = dElm.scrollLeft || dBody.scrollLeft;   // X value of current position.
    modalY = dElm.scrollTop || dBody.scrollTop;     // Y value of current position.
    // Print overlay.
    $("body").append("<div id=\"media_properties_panel\"></div>");
    $("body").append("<div id=\"modal_window\"></div>");
    $("#modal_window").fadeIn("slow");

    // Cetering content.
    centeringModalSyncer("#media_properties_panel");

    $("#media_properties_panel").fadeIn("slow");
    $("#media_properties_panel").html("<iframe src=\"" + selectorURL + "\" width=\"100%\" height=\"100%\">");

    // Centering content.
    centeringModalSyncer("#media_properties_panel");

    $(parent.window).resize(function() {
        centeringModalSyncer("#media_properties_panel");
    });

}

/**
 * This function deletes modal window of player properties.
 * @access private
 * @param none
 * @return nothing
 */
function fadeOutPropertiesWindow() {

    // Restore scroll position of base window.
    window.scrollTo( modalX , modalY );

    // Fade-out and delete modal window of player properties.
    $("#modal_window", parent.document).fadeOut("slow");
    $("#modal_window", parent.document).remove();
    $("#media_properties_panel", parent.document).fadeOut("slow");
    $("#media_properties_panel", parent.document).remove();
}

/**
 * This function is callback for player dimension.
 * @access private
 * @param none
 * @return nothing
 */
function handlePlayerDimensionChange() {
    var width = document.getElementById("media_prop_width").value;
    var height = document.getElementById("media_prop_height").value;
    var regex = /^\d{2,4}$/;
    if (regex.test(width) == true && regex.test(height) == true) {
        document.getElementById("submit_btn").disabled = false;
        document.getElementById("submit_btn").style.opacity = "1.0";
    } else {
        document.getElementById("submit_btn").disabled = true;
        document.getElementById("submit_btn").style.opacity = "0.5";
    }
}


/**
 * This function is callback for player dimension.
 * @access private
 * @param none
 * @return nothing
 */
function handlePlayerSizeSelect() {
    var sizeSelect = document.getElementById("media_prop_size");
    var index = document.getElementById("media_prop_size").selectedIndex;
    if (index == sizeSelect.options.length - 1) {
        document.getElementById("media_prop_width").disabled = false;
        document.getElementById("media_prop_height").disabled = false;
        document.getElementById("submit_btn").disabled = true;
        document.getElementById("submit_btn").style.opacity = "0.5";
    }
    else {
        document.getElementById("media_prop_width").value = "";
        document.getElementById("media_prop_height").value = "";
        document.getElementById("media_prop_width").disabled = true;
        document.getElementById("media_prop_height").disabled = true;
        document.getElementById("submit_btn").disabled = false;
        document.getElementById("submit_btn").style.opacity = "1.0";
    }
}

/**
 * This function checks letter of name.
 * @access private
 * @param {string} - media title
 * @return {bool} - if check is passed, return "true". Otherwise return "false".
 */
function checkNameString(str) {
    var regex = /["$%&'~\^\\`\/]/;
    if (regex.test(str) == true) {
        return false;
    }

    return true;
}

/**
 * This function checks player size.
 * @access private
 * @param {int} - player width set by user.
 * @param {int} - player height set by user.
 * @return {bool} - if palyer size is appropriate, return "true". Otherwise return "false".
 */
function checkPlayerDimension(width, height) {
    if (width < 200 || height < 200) {
        alert("Player size is too small.");
        return false;
    }
    else if (width > 1280 || height > 1280) {
        alert("Player size is too large.");
        return false;
    }

    return true;
}

/**
 * Retrieve OS type.
 * @acecss private
 * @param none
 * @return {string} - os type.
 */
function getOperatingSytstem() {
    var os;
    var ua = navigator.userAgent;

    if (ua.match(/iPhone|iPad/)) {
        os = "iOS";
    }
    else if (ua.match(/Android/)) {
        os = "Android";
    }
    else if (ua.match(/Linux/)) {
        os = "Linux";
    }
    else if (ua.match(/Win(dows)/)) {
        os = "Windows";
    }
    else if (ua.match(/Mac|PPC/)) {
        os = "Mac OS";
    }
    else {
        os = "Other";
    }

    return os;
}

/**
 * This function is callback for OK button on player properties window.
 * @acecss pivate
 * @param none
 * @return nothing
 */
function propertiesSubmitClick() {
    var str = document.getElementById("media_prop_name").value;

    str = str.trim();

    if (checkNameString(str) == false) {
        alert("There is deprecated letter(s) in <Name>.");
        return false;
    }

    var converted_name = "";

    if (str !== null) {
        var os = getOperatingSytstem();

        if (os.match("Windows")) {
            var str_array = str.split("");  // Convert string to char array.
            var utf8Array = Encoding.convert(str_array, "UTF8", "AUTO"); // Convert character code.
            converted_name = utf8Array.join(""); // Convert char array ro string.
        }
        else {
            converted_name = str;
        }
    }

    var sizeSelect = document.getElementById("media_prop_size");
    var index = document.getElementById("media_prop_size").selectedIndex;

    var width = "";
    var height = "";

    if (index == sizeSelect.options.length - 1) {
        if (document.getElementById("media_prop_width").value == '' ||
            document.getElementById("media_prop_height").value == '') {
            alert("Please input custom player size(width,height).");
            return false;
        }
        else {
            width = document.getElementById("media_prop_width").value;
            height = document.getElementById("media_prop_height").value;
            width = width.trim();
            height = height.trim();
            var regex = /^\d{2,4}$/;
            if (regex.test(width) == false || regex.test(height) == false) {
                alert("Custom player size(width,height) is a wrong dimension.");
                return false;
            }
        }
    }
    else {
        var dimension = document.getElementById("media_prop_size").options[index].text;
        var strArray = dimension.match(/\d{2,4}/g);
        if (strArray === null || strArray.length != 2) {
            alert("Player size(width,height) is a wrong dimension.");
            return false;
        }
        width = strArray[0];
        height = strArray[1];
    }

    if (checkPlayerDimension(parseInt(width), parseInt(height)) == false) {
        alert("Player size(width,height) is a wrong dimension.");
        return false;
    }

    parent.document.getElementById("width").value = width;
    parent.document.getElementById("height").value = height;

    parent.document.getElementById("media_title").value = converted_name;

    parent.document.getElementById("uiconf_id").value = document.getElementById("media_prop_player").value;

    // Delete modal window of player propertieds.
    fadeOutPropertiesWindow();
}


/**
 * This function describe module parameters to mod_form.
 * @access private
 * @param none
 * @return nothing
 */
function loadPropertiesParameter() {
    document.getElementById("media_prop_name").value = parent.document.getElementById("media_title").value;

    var playerSelect = document.getElementById("media_prop_player");
    var uiconf_id = parent.document.getElementById("uiconf_id").value;
    var flag = false;
    for (var i = 0; i < playerSelect.options.length; i++) {
        if (playerSelect.options[i].value == uiconf_id) {
            playerSelect.options[i].selected = true;
            flag = true;
        }
    }

    if (flag == false) {
        playerSelect.options[0].selected = true;
    }

    var sizeSelect = document.getElementById("media_prop_size");
    var width = parent.document.getElementById("width").value;
    var height = parent.document.getElementById("height").value;
    var dimension = width + 'x' + height;

    document.getElementById("media_prop_width").disabled = false;
    document.getElementById("media_prop_height").disabled = false;

    if (width != '' && width != "0" && height != "" && height != "0") {
        for (i = 0; i < sizeSelect.options.length; i++) {
            if (sizeSelect.options[i].label.indexOf(dimension) != -1) {
                sizeSelect.options[i].selected = true;
                document.getElementById("media_prop_width").disabled = true;
                document.getElementById("media_prop_height").disabled = true;
            }
        }

        if (document.getElementById("media_prop_width").disabled == false) {
            var index = sizeSelect.options.length - 1;
            sizeSelect.options[index].selected = true;
            document.getElementById("media_prop_width").value = width;
            document.getElementById("media_prop_height").value = height;
        }
    }
    else {
        document.getElementById("media_prop_width").value = "";
        document.getElementById("media_prop_height").value = "";
        sizeSelect.options[0].selected = true;
    }
}
