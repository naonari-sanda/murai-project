<?php
// ブログ一覧ページ記事毎のカテゴリーリンク取得
if (!function_exists('output_category_link')) {
    function output_category_link()
    {
        $cat = get_the_category();
        if (!$cat) {
            return false;
        }
        $cat = $cat[0];
        $catId = $cat->cat_ID;
        $catName = esc_attr($cat->cat_name);
        $catLink = esc_url(get_category_link($catId));
        if ($catLink && $catName) {
            echo '<a class="article-each-cat bg_m fc" href="' . $catLink . '">' . $catName . '</a>';
        }
    }
}

// ショートコード----------------------------------------------------------------
add_shortcode('gc', 'g_calender');
function g_calender()
{
    if (get_theme_mod('account_id')) {
        $calendar = '<div class="calendar-container"><iframe src="https://calendar.google.com/calendar/embed?src=' . get_theme_mod("account_id") . '%40gmail.com&ctz=Asia%2FTokyo" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe></div>';
        return $calendar;
    } else {
        return '<p>Googleカレンダーのアカウントが登録されていません。</p>';
    }
}

// アーカイブタイトル取得-----------------------------------------------------------------------
function get_archive_title()
{
    //アーカイブページじゃない場合、 false を返す
    if (!is_archive()) return false;

    //日付アーカイブページなら
    if (is_date()) {
        if (is_year()) {
            $date_name = get_query_var('year') . '年';
        } elseif (is_month()) {
            $date_name = get_query_var('year') . '年' . get_query_var('monthnum') . '月';
        } else {
            $date_name = get_query_var('year') . '年' . get_query_var('monthnum') . '月' . get_query_var('day') . '日';
        }
        return $date_name;
    }
}
// css-----------------------------------------------------------------------
function theme_customize_css()
{
    //cssのカラー指定
    $main = get_theme_mod('main_color', '#baedff');
    // $base = get_theme_mod('base_color', '#ffffff');
    $accent = get_theme_mod('accent_color', '#e2f28a');
    $font = get_theme_mod('font_color', '#333333');

    // rgb算出
    $main_red = hexdec(substr($main, 1, 2));
    $main_green = hexdec(substr($main, 3, 2));
    $main_blue = hexdec(substr($main, 5, 2));
    $main_rgb = $main_red . "," . $main_green . "," . $main_blue;
    $main_dark = ($main_red - 50) . "," . ($main_green - 50) . "," . ($main_blue - 50);
    $main_light = ($main_red + 100) . "," . ($main_green + 100) . "," . ($main_blue + 100);

    $accent_red = hexdec(substr($accent, 1, 2));
    $accent_green = hexdec(substr($accent, 3, 2));
    $accent_blue = hexdec(substr($accent, 5, 2));
    $accent_rgb = $accent_red . "," . $accent_green . "," . $accent_blue;
    $accent_dark = ($accent_red - 50) . "," . ($accent_green - 50) . "," . ($accent_blue - 50);
    $accent_light = ($accent_red + 100) . "," . ($accent_green + 100) . "," . ($accent_blue + 100);

    ?>
    <style type="text/css">
        .bg_m {
            background-color: <?php echo $main; ?>;
        }

        .bg_a {
            background-color: <?php echo $accent; ?>;
        }

        .bg_mtp {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.3);
        }

        .fc {
            color: <?php echo $font; ?>;
        }

        .bg_mp {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.5);
        }

        /* メインメニュー */

        /* フロントページ */
        /* お知らせ */
        .front-news__items {
            -webkit-box-shadow: inset 0px 0px 3px 2px rgba(<?php echo $main_rgb; ?>, 1);
            -moz-box-shadow: inset 0px 0px 3px 2px rgba(<?php echo $main_rgb; ?>, 1);
            box-shadow: inset 0px 0px 3px 2px rgba(<?php echo $main_rgb; ?>, 1);
        }

        /* コンセプト */
        .front-concept__detail>svg.background {
            fill: rgba(<?php echo $main_rgb; ?>, 0.5);

        }

        /* アクセス */
        .access-iconcontainer>svg {
            fill: <?php echo $font; ?>;
        }

        /* お知らせ一覧ページ */
        .news>ul.items>li.item {
            background: rgba(<?php echo $main_rgb; ?>, 0.2);
            border-left: solid 5px <?php echo $main; ?>;
            border-bottom: solid 3px #d7d7d7;
            transition: all .3s;
        }

        .news>ul.items>li.item:hover {
            background: rgba(<?php echo $accent_rgb; ?>, 0.2);
            border-left: solid 5px <?php echo $accent; ?>;
            border-bottom: solid 3px #d7d7d7;
            transition: all .3s;
        }


        /* SVG */
        .svg-text {
            fill: <?php echo $font; ?>;
        }

        /* 記事詳細 */
        .blogpost-title::before {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.5);
        }

        /* ----------- */
        .footer-nav>ul>li>a {
            color: <?php echo $font; ?>;
        }




        .ulm-a>li>a::before {
            background-color: <?php echo $main; ?>;
        }


        .list_a>li>a {
            color: <?php echo $font; ?>;
        }

        .bg_fc {
            background-color: <?php echo $font; ?>;
            color: <?php echo $main; ?>;
        }

        /* rightbar */
        .widget-title {
            background-color: <?php echo $main; ?>;
        }

        .recentposts>li:not(:last-child),
        .archives>li:not(:last-child),
        .categories>li:not(:last-child) {
            border-bottom: 1px solid <?php echo $main; ?>;
        }

        .recentposts>li>a:hover,
        .archives>li>a:hover,
        .categories>li>a:hover,
        .tag-cloud-link {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.1);

        }


        /* ---------------- */
        .hover_mul>li>a::after {
            border-bottom: 1px solid <?php echo $main; ?>;
        }



        .border-acc__double {
            border-top: 3px solid <?php echo $main; ?>;
            border-bottom: 3px solid <?php echo $main; ?>;
        }

        /* 検索フォーム */
        .searchform-input {
            border: 1px solid <?php echo $main; ?>;
        }

        .searchform-btn>button {
            color: <?php echo  $font; ?>;
            background-color: <?php echo $main; ?>;
            border: 1px solid <?php echo $main; ?>;
        }

        /* ページ、シングル詳細 */
        .page-detail h2,
        .single-detail h2 {
            border-top: 3px solid <?php echo $main; ?>;
            border-bottom: 3px solid <?php echo $main; ?>;
        }

        .page-detail h3,
        .single-detail h3 {
            border-bottom: 3px solid <?php echo $main; ?>;
        }

        .page-detail h4,
        .single-detail h4 {
            border-bottom: 3px double <?php echo $main; ?>;
        }

        .page-detail h5,
        .single-detail h5 {
            border-bottom: 1px solid <?php echo $main; ?>;
        }

        .wp-block-table>table>tbody>tr td:first-child {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.1);
        }

        .wp-block-quote {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.3);
        }

        .wp-block-button__link {
            background-color: <?php echo $main; ?>;
            color: <?php echo $font; ?>;
        }

        .wp-block-pullquote {
            border-top: 5px solid <?php echo $main; ?>;
            border-bottom: 5px solid <?php echo $main; ?>;
        }

        .single-info__cat-link {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.5);

        }

        /* コメントフォーム */
        .comment-form-comment textarea:focus,
        .comment-form-author>input:focus,
        .comment-form-email>input:focus,
        .comment-form-url>input:focus {
            border: 3px solid rgba(<?php echo $main_rgb; ?>, 0.5);
        }

        .comment-form .form-submit>.submit {
            background-color: <?php echo $main; ?>;
            color: <?php echo $font; ?>;

        }

        .comments-list li.depth-1 {
            border-bottom: 1px solid <?php echo $main; ?>;
        }

        .comments-list li.depth-1>.comment-body {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.1);
        }

        .comment-reply-link {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.5);
        }


        /* コンタクトフォーム */
        .contactform-btn,
        .bookingform-btn {
            background-color: <?php echo $main; ?>;
            color: <?php echo $font; ?>;
        }

        .contactform-name,
        .contactform-email,
        .contactform-subject,
        .contactform-message {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.1);

        }

        .contactform-name:focus,
        .contactform-email:focus,
        .contactform-subject:focus,
        .contactform-message:focus {
            border: 3px solid rgba(<?php echo $main_rgb; ?>, 0.5);
        }

        .bookingform-table {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.1);
        }

        .bookingform-table>tbody>tr:not(:last-child) {
            border-bottom: 1px solid rgba(<?php echo $main_rgb; ?>, 0.5)
        }

        .bookingform-name:focus,
        .bookingform-subject:focus,
        .bookingform-email:focus,
        .bookingform-tel:focus,
        .bookingform-message1:focus,
        .bookingform-message2:focus {
            border: 3px solid rgba(<?php echo $main_rgb; ?>, 0.5);

        }

        label[for="file"] {
            background-color: rgba(<?php echo $main_rgb; ?>, 0.5);
            color: <?php echo $font; ?>;
        }

        label[for="file"]::before {
            background-color: <?php echo $main; ?>;
            color: <?php echo $font; ?>;
        }

        /* ページネーション  */
        .pagenation2>ul>li>a,
        .page-numbers {
            background-color: <?php echo $main; ?>;
            color: <?php echo $font; ?>;

        }

        .pagenation2>ul>li>a:hover,
        .page-numbers:hover {
            background-color: rgba(<?php echo $accent_rgb; ?>, 0.3);
        }

        .pagenation2>ul>li>a.active,
        .current {
            background-color: <?php echo $accent; ?>;
            color: <?php echo $font; ?>;

        }
    </style>
<?php }
add_action('wp_head', 'theme_customize_css');
