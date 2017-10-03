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
 * Media properties script for kaltura media embed.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2017 Yamaguchi University (info-cc@ml.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/* global $ */

/**
 * @module local_yukaltura/properties
 */

require(['jquery', 'jqueryui'], function($, jqui) {
    var modalX = 0;
    var modalY = 0;

    var timer = false;

    return {
        init: function() {
            $("submit_btn").click(function() {
                propertiesSubmitClick();
            });
            $("cancel_btn").click(function() {
                fadeOutPropertiesWindow();
            });
            $("add_media").click(function() {
                fadeInPropertiesWindow();
            });
        };

        /**
         * This function print modal window of player properties.
         * @param {string} - URL of selector page.
         */
        fadeInPropertiesWindow: function() {
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

        };

        /**
         * This function deletes modal window of player properties.
         * @access private
         */
        fadeOutPropertiesWindow: function() {

            // Restore scroll position of base window.
            window.scrollTo(modalX, modalY);

            // Fade-out and delete modal window of player properties.
            $("#modal_window", parent.document).fadeOut("slow");
            $("#modal_window", parent.document).remove();
            $("#media_properties_panel", parent.document).fadeOut("slow");
            $("#media_properties_panel", parent.document).remove();
        };

        /**
         * This function is callback for player dimension.
         * @access public
         */
        handlePlayerDimensionChange: function() {
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
         */
        handlePlayerSizeSelect: function() {
            var sizeSelect = document.getElementById("media_prop_size");
            var index = document.getElementById("media_prop_size").selectedIndex;
            if (index == sizeSelect.options.length - 1) {
                document.getElementById("media_prop_width").disabled = false;
                document.getElementById("media_prop_height").disabled = false;
                document.getElementById("submit_btn").disabled = true;
                document.getElementById("submit_btn").style.opacity = "0.5";
            } else {
                document.getElementById("media_prop_width").value = "";
                document.getElementById("media_prop_height").value = "";
                document.getElementById("media_prop_width").disabled = true;
                document.getElementById("media_prop_height").disabled = true;
                document.getElementById("submit_btn").disabled = false;
                document.getElementById("submit_btn").style.opacity = "1.0";
            }
        }

        /**
         * This function is callback for OK button on player properties window.
         * @acecss public
         */
        propertiesSubmitClick: function() {
            var str = document.getElementById("media_prop_name").value;

            str = str.trim();

            if (checkNameString(str) == false) {
                alert("There is deprecated letter(s) in <Name>.");
                return false;
            }

            var convertedName = "";

            if (str !== null) {
                var os = getOperatingSytstem();

                if (os.match("Windows")) {
                    var strArray = str.split("");  // Convert string to char array.
                    var utf8Array = Encoding.convert(strArray, "UTF8", "AUTO"); // Convert character code.
                    convertedName = utf8Array.join(""); // Convert char array ro string.
                } else {
                    convertedName = str;
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

            parent.document.getElementById("media_title").value = convertedName;

            parent.document.getElementById("uiconf_id").value = document.getElementById("media_prop_player").value;

            // Delete modal window of player propertieds.
            fadeOutPropertiesWindow();
        }


        /**
         * This function describe module parameters to mod_form.
         * @access public
         */
        loadPropertiesParameter: function() {
            document.getElementById("media_prop_name").value = parent.document.getElementById("media_title").value;

            var playerSelect = document.getElementById("media_prop_player");
            var uiconfid = parent.document.getElementById("uiconf_id").value;
            var flag = false;
            for (var i = 0; i < playerSelect.options.length; i++) {
                if (playerSelect.options[i].value == uiconfid) {
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
            } else {
                document.getElementById("media_prop_width").value = "";
                document.getElementById("media_prop_height").value = "";
                sizeSelect.options[0].selected = true;
            }
        }
    };

    /**
     * This function centerize modal window.
     * @access private
     * @param {object} - HTML element of content panel.
     */
    var centeringModalSyncer = function(contentPanel) {
        if (timer !== false) {
            clearTimeout(timer);
        }
        timer = setTimeout(function() {
            // Get width and height of window.
            var w = $(window).width();
            var h = $(window).height();

            // Get width and height of modal content.
            var cw = $(contentPanel).outerWidth();
            var ch = $(contentPanel).outerHeight();

            // Execute centering of modal window.
            $(contentPanel).css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px"});
        }, 200);
    };

    /**
     * This function checks letter of name.
     * @access private
     * @param {string} - media title
     * @return {bool} - if check is passed, return "true". Otherwise return "false".
     */
    var checkNameString = function(str) {
        var regex = /["$%&'~\^\\`\/]/;
        if (regex.test(str) == true) {
            return false;
        }

        return true;
    };

    /**
     * This function checks player size.
     * @access private
     * @param {int} - player width set by user.
     * @param {int} - player height set by user.
     * @return {bool} - if palyer size is appropriate, return "true". Otherwise return "false".
     */
    var checkPlayerDimension = function(width, height) {
        if (width < 200 || height < 200) {
            alert("Player size is too small.");
            return false;
        }
        else if (width > 1280 || height > 1280) {
            alert("Player size is too large.");
            return false;
        }

        return true;
    };

    /**
     * Retrieve OS type.
     * @acecss private
     * @return {string} - os type.
     */
    var getOperatingSytstem = function() {
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
    };
});
