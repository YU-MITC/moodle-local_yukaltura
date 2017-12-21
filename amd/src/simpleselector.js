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
 * @copyright  (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module local_yukaltura/simpleselector
 */

define(['jquery'], function($) {

    return {
        /**
         * Initial function.
         * @access public
         * @param {string} selectorUrl - url of simple selector page.
         * @param {string} replaceLabel - label of media replace button.
         */
        init: function(selectorUrl, replaceLabel) {

            var modalX = 0;
            var modalY = 0;
            var timer = false;

            /**
             * This function reflects change of sort option.
             * @access public
             */
            function changeSort() {
                // Get url.
                var url = $("#selectorSort").val();
                // Change url of selector window.
                location.href = url;
            }

            /**
             * This is callback function for thumbnail click.
             * @access private
             * @param {object} e - event object of target image.
             */
            function clickThumbnailImage(e) {
                var selectId = e.target.id;
                var selectName = e.target.alt;
                var selectThumbnail = e.target.src;

                selectThumbnail = selectThumbnail.replace(/width\/\d+/g, "width/150");
                selectThumbnail = selectThumbnail.replace(/height\/\d+/g, "height/100");

                // Get entry id of selected media.
                $("#select_id").val(selectId);
                // Get name of selected media.
                $("#select_name").html(selectName);
                // Get thumbnail of selected media.
                $("#select_thumbnail").val(selectThumbnail);

                // Enable OK button.
                $("#submit_btn").prop("disabled", false);
                $("#submit_btn").css({opacity: "1.0"});
            }

            /**
             * This function centerize modal window.
             * @access private
             * @param {object} contentPanel - HTML element of content panel.
             */
            function centeringModalSyncer(contentPanel) {
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
            }

            /**
             * This function print modal window.
             * @access private
             * @param {string} url - URL of simple selector web page.
             * @return {bool} - if fade-in modal window, return true.
             */
            function fadeInSelectorWindow(url) {
                // Avoidance of duplicatable execute.
                $(this).blur(); // Unfocus base window.
                if ($("#modal_window")[0]) {
                    return false;
                }

                // Save scroll position of base window.
                var dElm = document.documentElement;
                var dBody = document.body;
                modalX = dElm.scrollLeft || dBody.scrollLeft; // X value of current position.
                modalY = dElm.scrollTop || dBody.scrollTop;  // Y value of current position.
                // Print ovaerlay.
                $("body").append("<div id=\"selector_content\"></div>");
                $("body").append("<div id=\"modal_window\"></div>");
                $("#modal_window").fadeIn("slow");

                // Centering content.
                centeringModalSyncer("#selector_content");
                // Fade-in content.
                $("#selector_content").fadeIn("slow");
                // Set url of content.
                $("#selector_content").html("<iframe src=\"" + url + "\" width=\"100%\" height=\"100%\">");

                // Cntering content.
                centeringModalSyncer("#selector_content");

                $(parent.window).resize(function() {
                    centeringModalSyncer("#selector_content");
                });

                return true;
            }

            /**
             * This function delete modal window.
             * @access public
             */
            function fadeOutSelectorWindow() {

                // Restore scroll position of base window.
                window.scrollTo(modalX, modalY);

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
                var selectId = $("#select_id").val();
                // Get name of selected media.
                var selectName = $("#select_name").html();
                // Get thumbnail of selected media.
                var selectThumbnail = $("#select_thumbnail").val();

                if (selectId !== null && selectId !== "") {
                    if ($("#entry_id") !== null) {
                        $("#entry_id", parent.document).val($("#select_id").val());
                    }

                    var idName = $("#id_name", parent.document);

                    if (idName !== null) {
                        idName.val($("#select_name").html());
                    }

                    var desc = "";

                    var selectDesc = $("#description_" + selectId);
                    if (selectDesc !== null) {
                        desc = selectDesc.html();
                        desc = desc.replace(/\n/g, "<br />");
                    }

                    desc = "<p>" + desc + "<br /></p>";

                    var editor = $("#id_introeditoreditable", parent.document);

                    if (editor !== null) {
                        editor.html(desc);
                    }

                    if ($("#media_thumbnail", parent.document) !== null) {
                        $("#media_thumbnail", parent.document).prop("src", selectThumbnail);
                        $("#media_thumbnail", parent.document).prop("alt", selectName);
                        $("#media_thumbnail", parent.document).prop("title", selectName);
                    }

                    var idMediaProperties = $("#id_media_properties", parent.document);
                    if (idMediaProperties !== null) {
                        idMediaProperties.css({visibility: "visible"});
                    }

                    var submitMedia = $("#submit_media", parent.document);
                    if (submitMedia !== null) {
                        submitMedia.prop("disabled", false);
                    }

                    // Fade-out modal windoiw.
                    fadeOutSelectorWindow();
                }
            }

            /**
             * This function replaces "Add Media" label when membed media is selected.
             * @access private
             * @param {string} str - Label of "Add Media" button.
             */
            function replaceAddMediaLabel(str) {
                $("#id_add_media", parent.document).val(str);
            }

            $("#id_add_media").on("click", function() {
                fadeInSelectorWindow(selectorUrl);
            });

            $("#selectorSort").on("change", function() {
                changeSort();
            });

            $("#submit_btn").on("click", function() {
                selectorSubmitClick();
            });

            $("#cancel_btn").on("click", function() {
                fadeOutSelectorWindow();
            });

            $("#fadeout").on("click", function() {
                fadeOutSelectorWindow();
            });

            if ($(location).attr("pathname").indexOf("simple_selector.php") != -1) {
                $(".media_thumbnail").on("click", function(e) {
                    clickThumbnailImage(e);
                });
            } else {
                $("#media_thumbnail").on("change", function() {
                    replaceAddMediaLabel(replaceLabel);
                });
            }

        }
    };
});
