# YU Kaltura Media Package
"YU Kaltura Media Package" is a third-party's Kaltura plugin package for Moodle 2.9 or later. This package is developed by the Media and Information Technology Center, Yamaguchi University. By using this package, users can upload media to the Kaltura server, and easily embed the media in Moodle courses. Moreover, this package provides some useful functions. Since this package does not require Kaltura Application Framework (KAF), can work with Kaltura Community Edition (CE) and other editions.

In order to use this package, administrators must install "[YU Kaltura Media Local Libraries](https://moodle.org/plugins/local_yukaltura)" and "[YU Kaltura Media Gallery](https://moodle.org/plugins/local_yumymedia)".
These plugins provide functions such as uploading, playing back and deleting media files to users.

In addition, the administrators can install "[YU Kaltura Media Assignment](https://moodle.org/plugins/mod_kalmediaassign)" and "[YU Kaltura Media Resource](https://moodle.org/plugins/mod_kalmediares)".
These plugins provide teachers ability of creating resource and activity modules which use kaltura media in their Moodle courses.

Please note that there is a chance this module will not work on some Moodle environment. Also, this package is only available in English. Stay tuned to future versions for other language supports.

Original plugin package ("Kaltura Video Package") has better functions than ours and is easy to use. So that, for customers of the "Kaltura SaaS Edition", use the original plugin package is the better.

YU Kaltura Media Local Libraries for Moodle
------

This plugin provides libraries and APIs and power other "YU Kaltura Media Package" plugins.
This plugin is updated with stable releases. To follow active development on GitHub, click [here](https://github.com/YU-MITC/moodle-local_yukaltura/).

Requirements
------

* PHP5.3 or greater.
* Web browsers must support the JavaScript and HTML5.
* System administrators must use the same communication protocol for all routes (between the web browser and the Moodle, between the Moodle and the Kaltura, and between the web browser and the Kaltura). It is better to use HTTPS as the communication protocol.
* Administrators must not delete "Default" access control profile from their Kaltura server. If they delete the "Default" profile, they must create new profile named "Default" before install our plugins.

Supported themes
-----

* Clean
* Boost (version 1.1.7 and later)

This plugin package might be able to work with other themes.

Installation
------

Unzip this plugin, and copy the directory (local/yukaltura) under moodle root directory (ex. /moodle).
Installation will be completed after you log in as an administrator and access the notification menu.

How to use
------

User's guide, click [here](http://www.cc.yamaguchi-u.ac.jp/guides/cas/plugins/userguide_version1.1.pdf).

Now, we wrote sections about installation, initial configuration (local_yukaltura) and summary of "My Media" (local_yumymedia), summary of "YU Kaltura Media Resource" (mod_kalmediares).

Rest sections will be written soon...

Targeted Moodle versions
------

Moodle 2.9, 3.0, 3.1, 3.2, 3.3, 3.4, 3.5

Branches
------

* MOODLE_29_STABLE -> Moodle2.9 branch
* MOODLE_30_STABLE -> Moodle3.0 branch
* MOODLE_31_STABLE -> Moodle3.1 branch
* MOODLE_32_STABLE -> Moodle3.2 branch
* MOODLE_33_STABLE -> Moodle3.3 branch
* MOODLE_34_STABLE -> Moodle3.4 branch
* MOODLE_35_STABLE -> Moodle3.5 branch

First clone the repository with "git clone", then "git checkout MOODLE_29_STABLE(branch name)" to switch branches.

Warning
------

* We are not responsible for any problem caused by this software. 
* This software follows the license policy of Moodle (GNU GPL v3).
* "Kaltura" is the registered trademark of the Kaltura Inc.
* Web-camera recording function in "My Media" supports the Mozilla Firefox, Google Chrome, Opera and Safari. For smartphones and tablets, you can record and upload movies through a normal media uploader.
