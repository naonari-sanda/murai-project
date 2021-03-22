<?php

// Gutenberg対応
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package WordPress 5.0 or Gutenberg Plugin
 * License: GPLv2 or later
 * 参考 https://nendeb.com/741
 */
function wpforest_theme_support_setup()
{

    // Default block styles Gutenberg
    add_theme_support('wp-block-styles');

    // Wide Alignment Gutenberg
    // add_theme_support('align-wide');
}
add_action('after_setup_theme', 'wpforest_theme_support_setup');


function wpforest_block_editor_styles()
{
    wp_enqueue_style('wpforest-block-editor-styles', get_theme_file_uri('/dist/css/gutenberg.min.css'), false, '1.0', 'all');
}
add_action('enqueue_block_editor_assets', 'wpforest_block_editor_styles');


// 他のfunctions読み込み-------------------------------------------------------------------------------
// サイドバーウィジェット
require 'functions/sidebar-recentposts.php';
require 'functions/sidebar-archive.php';
require 'functions/sidebar-categories.php';
require 'functions/sidebar-tag.php';
// // カスタマイズとウィジェット
require 'functions/additional-setting.php';
// functions
require 'functions/functions.php';
// require 'functions/toc.php';

// カスタマイズドウィジェット呼び出し
function wp_my_widget_register()
{
    unregister_widget('WP_Widget_Recent_Posts');
    register_widget('MY_WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Archives');
    register_widget('MY_WP_Widget_Archives');
    unregister_widget('WP_Widget_Categories');
    register_widget('MY_WP_Widget_Categories');
    unregister_widget('WP_Widget_Tag_Cloud');
    register_widget('MY_WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'wp_my_widget_register');

// サイドバー（カテゴリー・アーカイブの記事数）
function optimize_entry_count($default, $args)
{
    $replaced = preg_replace('/<\/a> \(([0-9,]*)\)/', ' <span class="sidebar-recentposts__count">(${1})</span></a>', $default);
    if ($replaced) {
        return $replaced;
    } else {
        return $default;
    }
}
add_filter('wp_list_categories', 'optimize_entry_count', 10, 2);

function optimize_entry_count_archive($default)
{
    $replaced = preg_replace('/<\/a>&nbsp;\(([0-9,]*)\)/', ' <span class="sidebar-archive__count">(${1})</span></a>', $default);
    if ($replaced) {
        return $replaced;
    } else {
        return $default;
    }
}
add_filter('get_archives_link', 'optimize_entry_count_archive', 10, 2);

// カスタムヘッダー-------------------------------------------------------------------------------------
$custom_header = array(
    'header-text' => true,
    'default-image' => '',
);
// カスタムヘッダーを有効にする
add_theme_support('custom-header', $custom_header);
// アイキャッチ有効
add_theme_support('post-thumbnails');

// *********************************************************************************

// メニュー使用を有効にする
register_nav_menu('mainmenu', 'メインメニュー');
register_nav_menu('footermenu', 'フッターメニュー');

// *********************************************************************************

// ページネーション
function pagination($pages = '', $range = 2)
{

    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) $paged = 1;

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class=\"pagenation2\">\n";
        echo "<ul>\n";

        if ($paged > 1) echo "<li class=\"prev\"><a href='" . get_pagenum_link($paged - 1) . "'><i class='fas fa-chevron-left'></i></a></li>\n";

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ? "<li><a class=\"active\">" . $i . "</a></li>\n" : "<li><a href ='" . get_pagenum_link($i) . "'>" . $i . "</a></li>\n";
            }
        }
        if ($paged < $pages) echo "<li class=\"next\"><a href=\"" . get_pagenum_link($paged + 1) . "\"> <i class='fas fa-chevron-right'></i></a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
    }
}

// 固定ページのページネーション
add_filter('redirect_canonical', 'my_disable_redirect_canonical');
function my_disable_redirect_canonical($redirect_url)
{

    if (is_archive()) {
        $subject = $redirect_url;
        $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
        preg_match($pattern, $subject, $matches);

        if ($matches) {
            //リクエストURLに「/page/」があれば、リダイレクトしない。
            $redirect_url = false;
            return $redirect_url;
        }
    }
}
// *********************************************************************************
// ウィジェットエリア作成
add_action('widgets_init', 'widget_area');
function widget_area()
{
    register_sidebar(array(
        'name' => 'サイドバー',
        'id' => 'sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title fc">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'ボトムバー',
        'id' => 'bottombar',
        'before_widget' => '<div class="sidebar-widget bottombar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title fc">',
        'after_title' => '</h3>'
    ));
}


// *********************************************************************************

function title_setup()
{
    // タイトルタグを動的に出力してくれる
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'title_setup');

// セパレーター変更
function custom_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('document_title_separator', 'custom_title_separator');

// *********************************************************************************
// カスタム投稿タイプ
add_action('init', 'create_post_type');
function create_post_type()
{
    register_post_type('menu', [
        'labels' => [
            'name'          => 'レッスン',
            'singular_name' => 'menu',
        ],
        'public'        => true,
        'has_archive'   => false,
        'menu_position' => 5,
        'show_in_rest'  => true,
        'supports'           => array('title',  'thumbnail')
    ]);
    register_post_type('news', [
        'labels' => [
            'name'          => 'お知らせ',
            'singular_name' => 'news',
        ],
        'public'        => true,
        'has_archive'   => false,
        'menu_position' => 5,
        'show_in_rest'  => true,
        'supports'           => array('title',  'thumbnail', 'editor')
    ]);
}

// *********************************************************************************

// カスタム投稿タイプへのカスタムフィールド

add_action('admin_menu', 'add_custom_fields');
add_action('save_post', 'save_postdata');
// カスタムフィールド設定情報
function add_custom_fields()
{
    add_meta_box('menu_momentum', '運動量', 'menu_momentum', 'menu', 'normal');
    add_meta_box('menu_target', '対象者', 'menu_target', 'menu', 'normal');
    add_meta_box('menu_desc', '概要', 'menu_desc', 'menu', 'normal');
    add_meta_box('menu_detail', '内容・説明', 'menu_detail', 'menu', 'normal');

    add_meta_box('description', '検索結果に表示される説明文（目安100字）', 'description', 'post', 'normal');
}

require 'functions/customfields.php';
// *********************************************************************************
add_action('wp_head', 'head_customizer_code', 99);
add_action('wp_body_open', 'body_open_customizer_code', 1);
add_action('wp_footer', 'body_close_customizer_code', 99);
function head_customizer_code()
{
    $head_code = get_theme_mod('head_code');
    echo $head_code;
}

function body_open_customizer_code()
{
    $body_open_code = get_theme_mod('body_open_code');
    echo $body_open_code;
}

function body_close_customizer_code()
{
    $body_close_code = get_theme_mod('body_close_code');
    echo $body_close_code;
}
// *********************************************************************************
// reCAPTCHAの表示
add_action('wp_enqueue_scripts', function () {
    if (is_page('contact')) return;
    wp_deregister_script('google-recaptcha');
});
// *********************************************************************************
require 'update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://wp-forest.com/update-checker/check/wp-forest-theme-bella-rpqq3vml.json',
    __FILE__,
    'Bella'
);
