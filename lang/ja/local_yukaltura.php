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
 * Language file of YU Kaltura Media Local Libaries.
 *
 * @package    local_yukaltura
 * @copyright  (C) 2016-2019 Yamaguchi University <gh-cc@mlex.cc.yamaguchi-u.ac.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'YU Kaltura Media Local Libraries';
$string['hostedconn'] = 'Kaltura Hosted Solution (SaaS)';
$string['ceconn'] = 'Kaltura CE';
$string['conn_heading_title'] = 'ホスト接続設定';
$string['conn_heading_desc'] = 'システムの種別 (Kaltura CEもしくはKaltura SaaS)を選択し、システムに接続するための認証情報を入力します。';
$string['conn_server'] = '接続サーバ';
$string['conn_server_desc'] = '自前のサーバ（Kaltura CE）かホスティング（Kaltura SaaS）かを選択します。';
$string['server_uri'] = 'サーバURI';
$string['server_uri_desc'] = '接続したいサーバのURIを入力します。もしくはSaaS版のデフォルトのURIを入力します。';
$string['hosted_login'] = 'ログイン名';
$string['hosted_login_desc'] = 'あたながKalturaサイトにログインするために使用するユーザ名です。';
$string['hosted_password'] = 'パスワード';
$string['hosted_password_desc'] = 'あたながKalturaサイトにログインするために使用するパスワードです。';
$string['player_regular_light'] = 'Player light (6709421)';
$string['player_regular_dark'] = 'Player dark (6709411)';
$string['custom_player'] = 'Custom player';
$string['kaltura_player_resource'] = 'Kalturaリソース・プレーヤー';
$string['kaltura_player_resource_desc'] = 'メディア・リソースを再生するために使用されるプレーヤーです。選択されたプレーヤーは新しいメディア・リソースのプレーヤーとして使用されます。「<b>メディア・リソース・プレーヤーの設定を上書き</b>」のチェックがオフのときは利用者の設定が優先されます。';
$string['kaltura_player_resource_custom'] = 'カスタムUIConf';
$string['kaltura_player_resource_custom_desc'] = 'リソース・プレーヤーに独自のUIConfを使用するときにだけUIConfIDを指定します。';
$string['kaltura_player'] = 'Kaltura課題プレーヤー';
$string['kaltura_player_desc'] = '課題に提出されたメディアを再生するために使用されるプレーヤーです。';
$string['kaltura_player_custom'] = 'カスタムUIConf';
$string['kaltura_player_custom_desc'] = '課題プレーヤーに独自のUIConfを使用するときにだけUIConfIDを指定します。';
$string['kaltura_player_mymedia'] = 'Kalturaマイメディア・プレーヤー';
$string['kaltura_player_mymedia_desc'] = 'マイメディアの中でメディアを再生するために使用されるプレーヤーです。このプレーヤーはメディアのプレビューのほか、再生ページのURLや埋め込みコードにも使用されます。';
$string['kaltura_player_mymedia_custom'] = 'カスタムUIConf';
$string['kaltura_player_mymedia_custom_desc'] = 'マイメディア・プレーヤーに独自のUIConfを使用するときにだけUIConfIDを指定します。';
$string['kalmediaassign_upload'] = 'アップロードの許可';
$string['kalmediaassign_upload_desc'] = '学生は課題提出フォームにおいて新しいメディアをアップロードすることが可能です。';
$string['kalmediares_upload'] = 'アップロードの許可';
$string['kalmediares_upload_desc'] = '教師はリソースの設定フォームにおいて新しいメディアをアップロードすることが可能です。';

$string['conn_status_title'] = '接続ステータス';
$string['conn_success'] = '認証情報を使用してログインに成功しました。';
$string['conn_failed'] = 'ログインできません。認証情報と接続設定を確認した後、再度接続を試みてください。';
$string['test_connection'] = 'Kalturaサーバへのテスト接続';
$string['click_test_button'] = 'ボタンをクリックして接続テストを行ってください。';
$string['start'] = '開始';
$string['flashminimum'] = 'バージョン9以降のFlashプレーヤーが必要です。 <a href=\"http://get.adobe.com/flashplayer/\">フラッシュプレーヤーを更新してください。</a>';
$string['upload_successful'] = 'メディアは正常にアップロードされました。保存／送信を忘れないでください。';
$string['media_converting'] = 'メディアは変換中です。また後で状態を確認してください。';
$string['conn_failed_alt'] = 'Kalturaサーバは現在利用できません。管理者にお問い合わせください。';
$string['player_resource_override'] = 'メディア・リソース・プレーヤーの設定を上書き';
$string['player_resource_override_desc'] = '個々のメディアリソースプレーヤーの選択を上書きするには、このオプションをオンにします。これにより。すべてのメディア・リソースのプレーヤーが「Kalturaリソース・プレーヤー」の設定で上書きされます。';
$string['enable_html5'] = 'HTML5フレーバーを許可';
$string['enable_html5_desc'] = 'Kalturaメディアを再生するときにHTML5フレーバーを有効にする場合はこの設定を有効にします。';
$string['media_error'] = 'メディアの処理途中でエラーが発生しました。他のメディアをお試しください。';
$string['media_bad'] = 'このメディアは使用しないでください。';
$string['kaltura_general'] = '共通設定';
$string['kaltura_kalmediapres_title'] = 'Kalturaメディア・プレゼンテーションの設定';
$string['kaltura_kcw_title'] = 'Kaltura Content Wizard (KCW) の設定';
$string['kaltura_kalmediares_title'] = 'Kalturaメディア・リソースの設定';
$string['kaltura_kalmediaassign_title'] = 'Kalturaメディア課題の設定';
$string['filter_player_width'] = '埋め込みプレーヤーの幅';
$string['filter_player_width_desc'] = '埋め込まれるプレーヤーの幅です。';
$string['filter_player_height'] = '埋め込みプレーヤーの高さ';
$string['filter_player_height_desc'] = '埋め込まれるプレーヤーの高さです。';
$string['filter_player'] = '埋め込みプレーヤー';
$string['filter_player_desc'] = 'メディアの埋め込みに使用されるプレーヤーです。';
$string['filter_custom'] = 'カスタム埋め込みUIConf ID';
$string['filter_custom_desc'] = '埋め込みプレーヤーに独自のUIConfを使用するときにだけUIConfIDを指定します。';
$string['player_filter'] = '埋め込みプレーヤー';
$string['player_filter_desc'] = 'ページにメディアを埋め込むときにKalturaフィルタープラグインによって使用されるプレーヤーです。';
$string['kaltura_filter_title'] = 'ファイルピッカ（Kalturaフィルタ）で使用される埋め込みプレーヤー。';
$string['kaltura_mymedia_title'] = 'マイメディアの設定';
$string['nine'] = '9';
$string['eighteen'] = '18';
$string['twentyone'] = '21';
$string['twentyfour'] = '24';
$string['twentyseven'] = '27';
$string['thirty'] = '30';
$string['mymedia_items_per_page'] = 'ページごとのメディア数';
$string['mymedia_items_per_page_desc'] = '1ページに表示するメディアの数';
$string['mymedia_limited_access'] = 'アクセス制限';
$string['mymedia_limited_access_desc'] = 'マイメディアへのアクセスに制限を設けます。';
$string['mymedia_access_rule'] = 'アクセスチェックルール';
$string['mymedia_access_rule_desc'] = '選択されたルールはマイメディアへのアクセス権限の確認に使用されます。';
$string['mymedia_contain_firstname'] = '名にキーワードを含む';
$string['mymedia_not_contain_firstname'] = '名にキーワードを含まない';
$string['mymedia_contain_lastname'] = '姓にキーワードを含む';
$string['mymedia_not_contain_lastname'] = '姓にキーワードを含まない';
$string['mymedia_contain_email'] = 'メールアドレスにキーワードを含む';
$string['mymedia_not_contain_email'] = 'メールアドレスにキーワードを含まない';
$string['mymedia_access_keyword'] = 'キーワード';
$string['mymedia_access_keyword_desc'] = 'このキーワードを含む（または含まない）ユーザーは、マイメディアを使用できます。';
$string['enable_webcam'] = 'Webカメラ録画を許可';
$string['enable_webcam_desc'] = 'Webカメラによる録画とアップロードを有効にするには、この設定をオンにします。';
$string['application_name'] = 'アプリケーション名';
$string['application_name_desc'] = 'アプリケーション名は、Kalturaサーバーに報告され、ユーザーレベルのレポートでアプリケーションごとの集計に使用される名前です。';
$string['player_mymedia_screen_recorder'] = 'Default screen recorder widget (9780761)';
$string['kaltura_reports'] = 'Kalturaレポート';
$string['kaltura_kalreports_heading'] = 'Kalturaレポートの設定';
$string['report_server_uri'] = 'レポートサーバのURI';
$string['report_server_uri_desc'] = 'KalturaレポートサーバのURIを入力してください。';
$string['kalmediaassign_player_height'] = 'プレーヤーの高さ';
$string['kalmediaassign_player_height_desc'] = 'プレーヤーの中でメディアがカットされてしまう場合、この設定は自動的に調整されます。';
$string['kalmediaassign_player_width'] = 'プレーヤーの幅';
$string['kalmediaassign_player_width_desc'] = 'プレーヤーの中でメディアがカットされてしまう場合、この設定は自動的に調整されます。';

$string['kalmediaassign_popup_player_height'] = 'ポップアップ・プレーヤーの高さ';
$string['kalmediaassign_popup_player_height_desc'] = 'プレーヤーの中でメディアがカットされてしまう場合、この設定は自動的に調整されます。';
$string['kalmediaassign_popup_player_width'] = 'ポップアップ・プレーヤーの幅';
$string['kalmediaassign_popup_player_width_desc'] = 'プレーヤーの中でメディアがカットされてしまう場合は、の設定は自動的に調整されます。';

$string['enable_reports'] = 'レポートの許可';
$string['enable_reports_desc'] = 'Kalturaレポートは、Falcon以降のKalturaサーバに対応しています。';
$string['internal_ipaddress'] = '内部IPアドレス';
$string['internal_ipaddress_desc'] = '学校／組織の内部限定IPアドレスもしくはサブネットの共通設定です。例えば、IPアドレスは「192.168.1.1」のように、サブネットは「192.168.1.0/24」のように書きます。複数のIPアドレスやサブネットを指定する場合、要素の間を半角スペースで区切ります。';

// Copy string from repository.
$string['connection_status'] = '接続ステータス';
$string['connected'] = 'Kalturaとの接続に成功';
$string['not_connected'] = 'Kalturaとの接続に失敗';
$string['rootcategory'] = 'ルートカテゴリのパス';
$string['rootcategory_desc'] = '<p>KMCにおいてMoodleユーザのカテゴリをまとめて管理するためのルートカテゴリを設定します。例えば、「Sites>My Moodle Site」と設定した場合、KMCでは「Sites」というカテゴリが作成され、その配下に「My Moodle Site」というカテゴリが作成されます。すべてのMoodleユーザのカテゴリは、「My Moodle Site」のサブカテゴリとして作成されます。</p>';
$string['rootcategory_warning'] = 'ルートカテゴリはすでに設定されています。名前を変更すると、KMC上のすべてのMoodleコースカテゴリに関連するデータが失われます。';
$string['rootcategory_created'] = 'ルートカテゴリは「<b>{$a}</b>」のように作成されました。';
$string['rootcategory_create'] = 'ルートカテゴリを指定してください。';
$string['unable_to_create'] = '「 <b>{$a}</b>」というルートカテゴリを作成できません。別のカテゴリ名を使用してください。';
$string['resetroot'] = 'ルートカテゴリのリセット';
$string['confirm_category_reset'] = '<p></p>ルートカテゴリをリセットしますか？<p>この操作を実行するとMoodle内のすべてのメディア共有情報やメディアの利用情報が削除されます。</p><p>誤って「続行」をクリックしてしまった場合は、ルートカテゴリのパスを元の値に設定すると、情報を復旧することができます。</p><p>慎重に選択してください。</p>';
$string['category_reset_complete'] = '<b>ルートカテゴリはリセットされました。</b>';

// Properties panel.
$string['media_properties'] = 'メディア・プロパティ';
$string['media_prop_header'] = 'メディア・プロパティ';
$string['media_prop_name'] = '名前:';
$string['media_prop_player'] = 'プレーヤーのデザイン:';
$string['media_prop_dimensions'] = 'プレーヤーの寸法:';
$string['media_prop_size'] = 'プレーヤーのサイズ:';
$string['media_prop_size_large'] = 'Large (400x365)';
$string['media_prop_size_small'] = 'Small (260x260)';
$string['media_prop_size_custom'] = 'Custom size';
$string['custom_player'] = 'カスタムプレーヤー';
$string['invalid_name'] = '名前には不適切な文字が使用されています。';
$string['empty_size'] = 'カスタムプレーヤーのサイズ(幅,高さ)を入力してください。';
$string['invalid_custom_size'] = 'カスタムプレーヤーのサイズが不適切です。';
$string['invalid_size'] = 'プレーヤーのサイズが不適切です。';

// Simple selector.
$string['selected_media'] = '選択されたメディア';

$string['upload_media'] = 'メディアのアップロード';
$string['record_media'] = 'Webカメラからのアップロード';

// Troubles.
$string['no_media'] = 'メディアがありません。';
$string['problem_viewing'] = 'ページの表示中に問題が発生しました。再度お試し頂くか管理者に連絡してください。';
$string['permission_disable'] = 'あなたにはKalturaメディアを使用する権限がありません。';

// Screen recorder.
$string['screenrecorder'] = 'スクリーンレコーダー';
$string['loadingwait'] = '読み込み中です。しばらくお待ちください。';

// Capabilities.
$string['yukaltura:view_report'] = 'Kalturaレポートを表示する。';
$string['yukaltura:view_selector'] = 'Kalturaメディアを表示する。';
$string['yukaltura:search_selector'] = 'Kalturaメディアを検索する。';

// Search.
$string['search'] = '検索';
$string['search_clear'] = 'クリア';
$string['search_text_tooltip'] = 'メディアの名称もしくはタグを入力してください。';

// Sorting.
$string['sortby'] = '並べ替え';
$string['mostrecent'] = '新しい順';
$string['oldest'] = '古い順';
$string['medianameasc'] = '名前順 (辞書順)';
$string['medianamedesc'] = '名前順 (逆順)';

// Kaltura reports.
$string['kaltura_report_navbar'] = 'Kalturaコース・メディア・レポート';
$string['header_kaltura_reports'] = 'Kalturaレポート';
$string['no_capability'] = 'あたなにはこのレポートを閲覧する権限がありません。';
$string['report_disabled'] = 'Kalturaレポートは無効になっています。Kalturaメディアパッケージのローカルプラグインで有効にしてください。';
$string['kaltura_course_reports'] = 'Kalturaコース・メディア・レポート';
$string['clear'] = 'クリア';
$string['course_name'] = 'コース名:';
$string['found_course'] = '{$a} 件のコースが見つかりました:';
$string['no_recent_course'] = '最近閲覧されたコースはありません。';
$string['no_course_result'] = '{$a} というコースは見つかりません。';
$string['recent_course_view'] = '最近閲覧されたコース:';
$string['recent_courses_display_limit'] = '最近閲覧されたコースの最大表示数';
$string['recent_courses_display_limit_desc'] = '最近閲覧されたコースの表示数の制限';
$string['search'] = '検索';
$string['search_courses_display_limit'] = 'コース検索の最大表示数';
$string['search_courses_display_limit_desc'] = 'コース検索結果の表示数の制限';
$string['repo_not_installed'] = 'このファイルを表示するためにはKalturaリポジトリをインストールする必要があります。';
