<?php
// 追加設定
function additional_settings($wp_customize)
{
    // オリジ機能削除
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');

    // 事業基本情報*********************************************************************************
    // パネル-------------------------------------
    $wp_customize->add_panel('about', array(
        'title' => '事業基本情報',
        'priority' => 21
    ));
    // セクション-------------------------------------
    $wp_customize->add_section('profile', array(
        'title' => 'プロフィール',
        'panel' => 'about'
    ));
    $wp_customize->add_section('concept', array(
        'title' => 'コンセプト',
        'panel' => 'about'
    ));
    $wp_customize->add_section('access', array(
        'title' => 'アクセス',
        'panel' => 'about'
    ));
    $wp_customize->add_section('seo', array(
        'title' => 'SEO対策',
        'panel' => 'about'
    ));
    $wp_customize->add_section('advanced', array(
        'title' => '高度な設定',
        'priority' => 130
    ));
    // セッティング-------------------------------------
    $wp_customize->add_setting('prof_img');
    $wp_customize->add_setting('name', array(
        'default' => null,
    ));
    $wp_customize->add_setting('history', array(
        'default' => null,
    ));
    $wp_customize->add_setting('introduction', array(
        'default' => null,
    ));
    //-----
    $wp_customize->add_setting('concept_img');
    $wp_customize->add_setting('concept_detail', array(
        'default' => null,
    ));
    //-----
    $wp_customize->add_setting('zipcode', array(
        'default' => null,
    ));
    $wp_customize->add_setting('address', array(
        'default' => null,
    ));
    $wp_customize->add_setting('tel', array(
        'default' => null,
    ));
    $wp_customize->add_setting('email', array(
        'default' => null,
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_setting('map', array(
        'default' => null,
    ));
    //-----
    $wp_customize->add_setting('description', array(
        'default' => null,
    ));
    $wp_customize->add_setting('keywords', array(
        'default' => null,
    ));
    $wp_customize->add_setting('ga_code', array( //Basic
        'default' => null,
    ));
    // 高度----------------------------------------------------------------------------------------
    $wp_customize->add_setting('head_code', array(
        'default' => null,
    ));
    $wp_customize->add_setting('body_open_code', array(
        'default' => null,
    ));
    $wp_customize->add_setting('body_close_code', array(
        'default' => null,
    ));
    // コントロール---------------------------------------
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'prof_img', array(
        'section' => 'profile',
        'settings' => 'prof_img',
        'label' => 'プロフィール写真',
        'description' => '',
        'priority' => 20,
    )));
    $wp_customize->add_control('name', array(
        'section' => 'profile',
        'settings' => 'name',
        'label' => 'お名前',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('history', array(
        'section' => 'profile',
        'settings' => 'history',
        'label' => '経歴',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
    $wp_customize->add_control('introduction', array(
        'section' => 'profile',
        'settings' => 'introduction',
        'label' => '自己紹介',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
    //-----
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'concept_img', array(
        'section' => 'concept',
        'settings' => 'concept_img',
        'label' => 'イメージ写真',
        'description' => '',
        'priority' => 20,
    )));
    $wp_customize->add_control('concept_detail', array(
        'section' => 'concept',
        'settings' => 'concept_detail',
        'label' => '詳細',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
    //-----
    $wp_customize->add_control('zipcode', array(
        'section' => 'access',
        'settings' => 'zipcode',
        'label' => '郵便番号',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('address', array(
        'section' => 'access',
        'settings' => 'address',
        'label' => '住所',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('tel', array(
        'section' => 'access',
        'settings' => 'tel',
        'label' => '電話番号',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('email', array(
        'section' => 'access',
        'settings' => 'email',
        'label' => 'メールアドレス',
        'description' => '',
        'type' => 'email',
        'priority' => 20,
    ));
    $wp_customize->add_control('map', array(
        'section' => 'access',
        'settings' => 'map',
        'label' => 'GoogleMap',
        'description' => '「共有」→「地図を埋め込む」→「HTMLをコピー」して、こちらにペーストしてください。',
        'type' => 'textarea',
        'priority' => 20,
    ));
    //-----
    $wp_customize->add_control('description', array(
        'section' => 'seo',
        'settings' => 'description',
        'label' => '説明・概要',
        'description' => 'ホームページ・お店の説明を短くまとめてください（100字程度）。この文章は、Googleの検索結果に表示されます。',
        'type' => 'textarea',
        'priority' => 20,
    ));
    $wp_customize->add_control('keywords', array(
        'section' => 'seo',
        'settings' => 'keywords',
        'label' => 'ホームページの検索キーワードを入力してください',
        'description' => '地域名, ヨガスタジオ, 少人数制　というふうにコンマで区切ってください。',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('ga_code', array( //Basic
        'section' => 'seo',
        'settings' => 'ga_code',
        'label' => 'Google Analytics',
        'description' => '「管理」→「プロパティ設定」→「トラッキングID」よりUA-から始まるトラッキングIDを入力してください。',
        'type' => 'text',
        'priority' => 20,
    ));
    // 画像*********************************************************************************
    // セクション-------------------------------------
    $wp_customize->add_section('imgs', array(
        'title' => 'ロゴ・メイン画像',
        'priority' => 23
    ));
    // セッティング-------------------------------------
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting('main_img' . $i);
        $wp_customize->add_setting('main_img_sp' . $i);
        $wp_customize->add_setting('link' . $i, array(
            'default' => null,
            'sanitize_callback' => 'esc_url_raw'
        ));
    }
    $wp_customize->add_setting('logo_img');
    // コントロール-------------------------------------
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'main_img' . $i, array(
            'section' => 'imgs',
            'settings' => 'main_img' . $i,
            'label' => 'メイン画像' . $i,
            'description' => 'トップページの横幅いっぱいに表示されます',
            'priority' => 20,
        )));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'main_img_sp' . $i, array(
            'section' => 'imgs',
            'settings' => 'main_img_sp' . $i,
            'label' => 'スマホ用メイン画像' . $i,
            'description' => 'トップページの横幅いっぱいに表示されます',
            'priority' => 20,
        )));
        $wp_customize->add_control('link' . $i, array(
            'section' => 'imgs',
            'settings' => 'link' . $i,
            'label' => '画像' . $i . 'のリンクURL',
            'description' => '',
            'type' => 'text',
            'priority' => 20,
        ));
    }
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_img', array(
        'section' => 'imgs',
        'settings' => 'logo_img',
        'label' => 'ロゴ画像',
        'description' => 'ロゴとしてヘッダーやフッターに表示されます',
        'priority' => 23,
    )));
    // カラー*********************************************************************************
    // セクション-------------------------------------
    $wp_customize->add_section('theme_color', array(
        'title' => 'テーマカラー',
        'priority' => 24
    ));
    // セッティング-------------------------------------
    $wp_customize->add_setting('main_color', array(
        'default' => '#baedff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_setting('accent_color', array(
        'default' => '#e2f28a',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_setting('font_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    // コントロール-------------------------------------
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
        'label' => 'メインカラー',
        'section' => 'theme_color',
        'settings' => 'main_color',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => 'アクセントカラー',
        'section' => 'theme_color',
        'settings' => 'accent_color',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_color', array(
        'label' => 'フォントカラー（メインカラーの上にのる）',
        'description' => 'メインカラーの上にのる文字のカラーです。',
        'section' => 'theme_color',
        'settings' => 'font_color',
    )));
    // カレンダー*********************************************************************************
    // セクション-------------------------------------
    $wp_customize->add_section('calendar', array(
        'title' => 'スケジュール',
        'priority' => 25
    ));
    // セッティング-------------------------------------
    $wp_customize->add_setting('account_id', array(
        'default' => null,
    ));
    $wp_customize->add_setting('schedule', array(
        'default' => null,
    ));
    // コントロール-------------------------------------
    $wp_customize->add_control('schedule', array(
        'section' => 'calendar',
        'settings' => 'schedule',
        'label' => 'スケジュールに関する注意事項',
        'description' => 'トップページのスケジュールセクションに表示されます。',
        'type' => 'textarea',
        'priority' => 20,
    ));
    $wp_customize->add_control('account_id', array(
        'section' => 'calendar',
        'settings' => 'account_id',
        'label' => 'GoogleアカウントのID',
        'description' => 'Googleカレンダーで営業日などを設定してサイトに埋め込むことができます。Googleアカウント「abc@gmail.com」のabcの部分を入力してください。なお、Googleカレンダーの設定にてアクセス権限の一般公開にチェックを入れる必要があります。',
        'type' => 'text',
        'priority' => 20,
    ));
    // SNS*********************************************************************************
    // セクション-------------------------------------
    $wp_customize->add_section('sns', array(
        'title' => 'SNS',
        'priority' => 26
    ));
    // セッティング-------------------------------------
    $wp_customize->add_setting('twitter', array(
        'default' => null,
    ));
    $wp_customize->add_setting('instagram', array(
        'default' => null,
    ));
    $wp_customize->add_setting('facebook', array(
        'default' => null,
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_setting('youtube', array(
        'default' => null,
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_setting('line', array(
        'default' => null,
        'sanitize_callback' => 'esc_url_raw'
    ));
    // コントロール-------------------------------------
    $wp_customize->add_control('twitter', array(
        'section' => 'sns',
        'settings' => 'twitter',
        'label' => 'Twitterのアカウント名（@以下）',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('instagram', array(
        'section' => 'sns',
        'settings' => 'instagram',
        'label' => 'Instagramのユーザーネーム',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('facebook', array(
        'section' => 'sns',
        'settings' => 'facebook',
        'label' => 'FacebookのURL',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('youtube', array(
        'section' => 'sns',
        'settings' => 'youtube',
        'label' => 'YouTubeのURL',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    $wp_customize->add_control('line', array(
        'section' => 'sns',
        'settings' => 'line',
        'label' => 'LINE友達登録のQRコード画面URL',
        'description' => '',
        'type' => 'text',
        'priority' => 20,
    ));
    // 高度----------------------------------------------------------------------------------------
    $wp_customize->add_control('head_code', array(
        'section' => 'advanced',
        'settings' => 'head_code',
        'label' => '&lt;/head&gt;直前',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
    $wp_customize->add_control('body_open_code', array(
        'section' => 'advanced',
        'settings' => 'body_open_code',
        'label' => '&lt;body&gt;直後',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
    $wp_customize->add_control('body_close_code', array(
        'section' => 'advanced',
        'settings' => 'body_close_code',
        'label' => '&lt;/body&gt;直前',
        'description' => '',
        'type' => 'textarea',
        'priority' => 20,
    ));
}
add_action('customize_register', 'additional_settings');
