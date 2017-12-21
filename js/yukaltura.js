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
 * YU Kaltura local libraries script
 *
 * @package    local_yukaltura
 * @copyright  (C) 2014 Kaltura Inc.
 * @copyright  (C) 2016-2017 Yamaguchi University (gh-cc@mlex.cc.yamaguchi-u.ac.jp)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

M.local_yukaltura = {};

M.local_yukaltura = {
    Y: null,
    transaction: {},

    init: function(Y) {
        this.Y = Y;

        // Check for an instance of the Kaltura connection type element.
        if (Y.DOM.byId("id_s_local_yukaltura_conn_server")) {

            // Retrieve the connection type Node.
            var connectionType = Y.one('#id_s_local_yukaltura_conn_server');

            // Check for the selected option.
            var connectionTypeDom = Y.Node.getDOMNode(connectionType);

            // Check if the first option is selected.
            if (0 == connectionTypeDom.selectedIndex) {

                // Disable the URI setting.
                Y.DOM.byId("id_s_local_yukaltura_uri").disabled = true;
            } else {
                // Enable the URI setting.
                Y.DOM.byId("id_s_local_yukaltura_uri").disabled = false;
            }

            // Add 'change' event to the connection type selection drop down.
            connectionType.on('change', function(e) {
                e.preventDefault();
                var connectionUri = Y.DOM.byId("id_s_local_yukaltura_uri");

                if (connectionUri.disabled) {
                    connectionUri.disabled = false;
                } else {
                    connectionUri.disabled = true;
                }
            });

            // Add a 'change' event to the Kaltura player selection drop down.
            var kalturaPlayer = Y.one('#id_s_local_yukaltura_player');

            // Check for the selected option.
            var kalturaPlayerDom = Y.Node.getDOMNode(kalturaPlayer);

            var length = kalturaPlayerDom.length - 1;

            if (length == kalturaPlayerDom.selectedIndex) {

                Y.DOM.byId('id_s_local_yukaltura_player_custom').disabled = false;
            } else {
                Y.DOM.byId('id_s_local_yukaltura_player_custom').disabled = true;
            }

            kalturaPlayer.on('change', function(e) {
                e.preventDefault();
                var kalturaCustomPlayer = Y.DOM.byId("id_s_local_yukaltura_player_custom");

                var kalturaPlayerDom = Y.Node.getDOMNode(e.target);

                var length = kalturaPlayerDom.length - 1;

                if (length == kalturaPlayerDom.selectedIndex) {
                    kalturaCustomPlayer.disabled = false;
                } else {
                    kalturaCustomPlayer.disabled = true;
                }
            });

            // Add a 'change' event to the Kaltura resource player selection drop down.
            var kalturaPlayerResource = Y.one('#id_s_local_yukaltura_player_resource');

            // Check for the selected option.
            var kalturaPlayerResourceDom = Y.Node.getDOMNode(kalturaPlayerResource);

            length = kalturaPlayerResourceDom.length - 1;

            if (length == kalturaPlayerResourceDom.selectedIndex) {
                Y.DOM.byId('id_s_local_yukaltura_player_resource_custom').disabled = false;
            } else {
                Y.DOM.byId('id_s_local_yukaltura_player_resource_custom').disabled = true;
            }

            kalturaPlayerResource.on('change', function(e) {
                e.preventDefault();
                var kalturaCustomPlayerResource = Y.DOM.byId("id_s_local_yukaltura_player_resource_custom");

                var kalturaPlayerResourceDom = Y.Node.getDOMNode(e.target);

                var length = kalturaPlayerResourceDom.length - 1;

                if (length == kalturaPlayerResourceDom.selectedIndex) {
                    kalturaCustomPlayerResource.disabled = false;
                } else {
                    kalturaCustomPlayerResource.disabled = true;
                }

            });

        }

    },

    /**
     * Perform course searching with auto-complete
     */
    search_course: function() {

        YUI({filter: 'raw'}).use("autocomplete", function(Y) {
            var searchTxt = Y.one('#kaltura_search_txt');
            var kalturaSearch = document.getElementById("kaltura_search_txt");
            var searchBtn = Y.one('#kaltura_search_btn');
            var clearBtn = Y.one('#kaltura_clear_btn');

            searchTxt.plug(Y.Plugin.AutoComplete, {
                resultTextLocator: 'fullname',
                enableCache: false,
                minQueryLength: 2,
                resultListLocator: 'data.courses',
                resultFormatter: function(query, results) {
                    return Y.Array.map(results, function(result) {
                        var course = result.raw;
                        if (course.shortname) {
                            return course.fullname + " (" + course.shortname + ")";
                        }
                        return course.fullname;
                    });
                },
                source: 'courses.php?query={query}&action=autocomplete',
                on: {
                    select: function(e) {
                        e.preventDefault();
                        Y.io('courses.php', {
                            method: 'POST',
                            data: {course_id: e.result.raw.id, action: 'select_course'},
                            on: {
                                success: function(id, result) {
                                    var data = Y.JSON.parse(result.responseText);
                                    if (data.failure && data.failure == true) {
                                        window.alert(data.message);
                                    } else {
                                        document.getElementById('resourceobject').src = decodeURIComponent(data.url);
                                    }
                                }
                            }
                        });
                    }
                }
            });

            kalturaSearch.onkeypress = function(e) {
                e.preventDefault();
                // Enter is pressed.
                if (e.keyCode === 13) {
                    var query = searchTxt.get('value');
                    // Don't accept an empty search string.
                    if (!(/^\s*$/.test(query))) {
                        document.getElementById('resourceobject').src = 'courses.php?action=search&query=' + query;
                        // Lose focus of the auto-suggest menu.
                        kalturaSearch.blur();
                    }
                }
            };

            searchBtn.on('click', function(e) {
                e.preventDefault();
                var query = searchTxt.get('value');
                // Don't accept an empty search string.
                if (!(/^\s*$/.test(query))) {
                    document.getElementById('resourceobject').src = 'courses.php?action=search&query=' + query;
                    kalturaSearch.blur();
                }
            });

            clearBtn.on('click', function(e) {
                e.preventDefault();
                searchTxt.set("value", "");
            });

        });

    },

    get_thumbnail_url: function(entryId) {

        YUI().use("io-base", "json-parse", "node", function(Y) {
            var location = M.local_yukaltura.dataroot + entryId;

            Y.io(location);

            function check_conversion_status(id, o) {
                if ('' != o.responseText) {
                    var data = Y.JSON.parse(o.responseText);
                    var imgTag = Y.one("#media_thumbnail");
                    if (data.thumbnailUrl != imgTag.get("src")) {
                        imgTag.set("src", data.thumbnailUrl);
                        imgTag.set("alt", data.name);
                        imgTag.set("title", data.name);
                    }
                }
            }

            Y.on('io:complete', check_conversion_status, Y);

        });

    },

    loading_panel: {},

    show_loading: function() {
        M.local_yukaltura.loading_panel = new Y.YUI2.widget.Panel("wait",
            {width: "240px", fixedcenter: true, close: false, draggable: false, zindex: 4, modal: true, visible: false});

        M.local_yukaltura.loading_panel.setHeader("Loading, please wait...");
        M.local_yukaltura.loading_panel.setBody('<img src="../../local/yukaltura/pix/rel_interstitial_loading.gif" />');
        M.local_yukaltura.loading_panel.render();

        M.local_yukaltura.loading_panel.show();
    },

    hide_loading: function () {
        M.local_yukaltura.loading_panel.hide();
    },

    dataroot: {},

    set_dataroot: function(weblocation) {
        M.local_yukaltura.dataroot = weblocation;
    }

};
