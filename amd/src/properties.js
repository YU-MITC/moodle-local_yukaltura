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
 * @copyright  (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module local_yukaltura/properties
 */

define(['jquery'], function($) {

    return {
        /**
         * Initial function.
         * @access public
         * @param {string} propertiesUrl - url of media properties page.
         */
        init: function(propertiesUrl, invalidName, emptySize, invalidCustomSize, invalidSize) {

            var modalX = 0;
            var modalY = 0;
            var timer = false;

            /**
             * This function centerize modal window.
             * @param {object} contentPanel - HTML element of content panel.
             */
            function centeringModalSyncer(contentPanel) {
                if (timer !== false) {
                    clearTimeout(timer);
                }
                timer = setTimeout(function() {
                    $(contentPanel).css({"width": "400px", "height": "400px"});
                    $(contentPanel).css({"font-size": "14px"});

                    // Get width and height of window.
                    var w = $(window).width();
                    var h = $(window).height();

                    // Get width and height of modal content.
                    var cw = $(contentPanel).outerWidth();
                    var ch = $(contentPanel).outerHeight();

                    // Execute centering of modal window.
                    $(contentPanel).css({"left": ((w - cw) / 2) + "px", "top": ((h - ch) / 2) + "px"});
                }, 200);
            }

            /**
             * This function checks letter of name.
             * @param {string} str - media title
             * @return {bool} - if check is passed, return "true". Otherwise return "false".
             */
            function checkNameString(str) {
                var regex = /["$%&'~\^\\`\/]/;
                if (regex.test(str) === true) {
                    return false;
                }

                return true;
            }

            /**
             * This function checks player size.
             * @param {int} width - player width set by user.
             * @param {int} height - player height set by user.
             * @return {bool} - if palyer size is appropriate, return "true". Otherwise return "false".
             */
            function checkPlayerDimension(width, height) {
                if (width < 200 || height < 200) {
                    return false;
                } else if (width > 1280 || height > 1280) {
                    return false;
                }

                return true;
            }

            /**
             * This function print modal window of player properties.
             * @param {string} url - URL of selector page.
             * @return {bool} - if fade-in modal window, return true;
             */
            function fadeInPropertiesWindow(url) {
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
                $("#media_properties_panel").html("<iframe src=\"" + url + "\" width=\"100%\" height=\"100%\">");

                // Centering content.
                centeringModalSyncer("#media_properties_panel");

                $(parent.window).resize(function() {
                    centeringModalSyncer("#media_properties_panel");
                });

                return true;
            }

            /**
             * This function deletes modal window of player properties.
             */
            function fadeOutPropertiesWindow() {

                // Restore scroll position of base window.
                window.scrollTo(modalX, modalY);

                // Fade-out and delete modal window of player properties.
                $("#modal_window", parent.document).fadeOut("slow");
                $("#modal_window", parent.document).remove();
                $("#media_properties_panel", parent.document).fadeOut("slow");
                $("#media_properties_panel", parent.document).remove();
            }

            /**
             * This function is callback for player dimension.
             */
            function handlePlayerDimensionChange() {
                var flag = false;
                var widthStr = $("#media_prop_width").val();
                var heightStr = $("#media_prop_height").val();
                var regex = /^\d{2,4}$/;
                if (regex.test(widthStr) === true && regex.test(heightStr) === true) {
                    var widthInt = parseInt(widthStr);
                    var heightInt = parseInt(heightStr);
                    flag = checkPlayerDimension(widthInt, heightInt);
                }

                if (flag === true) {
                    $("#submit_btn").prop("disabled", false);
                    $("#submit_btn").css({opacity: "1.0"});
                } else {
                    $("#submit_btn").prop("disabled", true);
                    $("#submit_btn").css({opacity: "0.5"});
                }
            }

            /**
             * This function is callback for player dimension.
             */
            function handlePlayerSizeSelect() {
                var index = $("#media_prop_size").prop("selectedIndex");
                if (index == $("#media_prop_size").children("option").length - 1) {
                    $("#media_prop_width").prop("disabled", false);
                    $("#media_prop_height").prop("disabled", false);
                    $("#submit_btn").prop("disabled", true);
                    $("#submit_btn").css({opacity: "0.5"});
                } else {
                    $("#media_prop_width").val("");
                    $("#media_prop_height").val("");
                    $("#media_prop_width").prop("disabled", true);
                    $("#media_prop_height").prop("disabled", true);
                    $("#submit_btn").prop("disabled", false);
                    $("#submit_btn").css({opacity: "1.0"});
                }
            }

            /**
             * This function is callback for OK button on player properties window.
             * @acecss public
             * @return {bool} - if fade-out modal window, return true.
             */
            function propertiesSubmitClick() {
                var str = $("#media_prop_name").val();

                str = str.trim();

                if (checkNameString(str) === false) {
                    window.alert(invalidName);
                    return false;
                }

                var index = $("#media_prop_size").prop("selectedIndex");

                var width = "";
                var height = "";

                if (index == $("#media_prop_size").children("option").length - 1) {
                    if ($("#media_prop_width").value === "" ||
                        $("#media_prop_height").value === "") {
                        window.alert(emptySize);
                        return false;
                    } else {
                        width = $("#media_prop_width").val();
                        height = $("#media_prop_height").val();
                        width = width.trim();
                        height = height.trim();
                        var regex = /^\d{2,4}$/;
                        if (regex.test(width) === false || regex.test(height) === false) {
                            window.alert(invalidCustomSize);
                            return false;
                        }
                    }
                } else {
                    var dimension = $("#media_prop_size option:selected").text();
                    var dimensionArray = dimension.match(/\d{2,4}/g);
                    if (dimensionArray === null || dimensionArray.length != 2) {
                        window.alert(invalidSize);
                        return false;
                    }
                    width = dimensionArray[0];
                    height = dimensionArray[1];
                }

                if (checkPlayerDimension(parseInt(width), parseInt(height)) === false) {
                    window.alert(invalidSize);
                    return false;
                }

                $("#width", parent.document).val(width);
                $("#height", parent.document).val(height);
                $("media_title", parent.document).val(str);
                $("#uiconf_id", parent.document).val($("#media_prop_player").val());

                // Delete modal window of player propertieds.
                fadeOutPropertiesWindow();

                return true;
            }

            /**
             * This function describe module parameters to mod_form.
             */
            function loadPropertiesParameter() {
                $("#media_prop_name").val($("#media_title", parent.document).val());
                var uiconfid = $("#uiconf_id", parent.document).val();
                var flag = false;
                for (var i = 0; i < $("#media_prop_player").children("option").length; i++) {
                    if ($("#media_prop_player option:eq(" + i + ")").val() == uiconfid) {
                        $("#media_prop_player").prop("selectedIndex", i);
                        flag = true;
                    }
                }

                if (flag === false) {
                    $("#media_prop_player").prop("selectedIndex", 0);
                }

                var width = $("#width", parent.document).val();
                var height = $("#height", parent.document).val();
                var dimension = width + 'x' + height;
                $("#media_prop_width").prop("disabled", false);
                $("#media_prop_height").prop("disabled", false);
                if (width !== "" && width != "0" && height !== "" && height != "0") {
                    for (var j = 0; j < $("#media_prop_size").children("option").length; j++) {
                        if ($("#media_prop_size option:eq(" + j + ")").text().indexOf(dimension) != -1) {
                            $("#media_prop_size").prop("selectedIndex", j);
                            $("#media_prop_width").prop("disabled", true);
                            $("#media_prop_height").prop("disabled", true);
                        }
                    }

                    if ($("#media_prop_width").prop("disabled") === false) {
                        var index = $("#media_prop_size").children("option").length - 1;
                        $("#media_prop_size").prop("selectedIndex", index);
                        $("#media_prop_width").val(width);
                        $("#media_prop_height").val(height);
                    }
                } else {
                    $("#media_prop_width").val("");
                    $("#media_prop_height").val("");
                    $("#media_prop_size").prop("selectedIndex", 0);
                }
            }

            $("#id_media_properties").on("click", function() {
                fadeInPropertiesWindow(propertiesUrl);
            });

            $("#media_prop_size").on("change", function() {
                handlePlayerSizeSelect();
            });

            $("#media_prop_width").on("change", function() {
                handlePlayerDimensionChange();
            });

            $("#media_prop_height").on("change", function() {
                handlePlayerDimensionChange();
            });

            $("#submit_btn").on("click", function() {
                propertiesSubmitClick();
            });

            $("#cancel_btn").on("click", function() {
                fadeOutPropertiesWindow();
            });

            if ($(location).attr("pathname").indexOf("media_properties.php") != -1) {
                loadPropertiesParameter();
            }
        }
    };
});
