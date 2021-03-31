<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo esc_html(get_theme_mod('keywords', '')); ?>">
    <?php
    if (is_singular()) { //投稿・固定ページの場合
        if (have_posts()) : while (have_posts()) : the_post();
                if (get_post_meta(get_the_ID(), 'description', true)) :
                    echo '<meta name="description" content="' . mb_substr(get_post_meta(get_the_ID(), 'description', true), 0, 100) . '">';
                    echo "\n";
                elseif (get_the_excerpt()) :
                    echo '<meta name="description" content="' . mb_substr(get_the_excerpt(), 0, 100) . '">';
                    echo "\n"; //抜粋を表示
                else :
                    echo '<meta name="description" content="' . esc_html(get_theme_mod('description', '')) . '">';
                    echo "\n";
                endif;
            endwhile;
        endif;
    } else { //単一記事ページページ以外の場合（アーカイブページやホームなど）
        echo '<meta name="description" content="';
        echo esc_html(get_theme_mod('description'));
        echo '">';
    }
    ?>
    <meta name="title" content="<?php wp_title('｜', true, 'right');
                                bloginfo('name'); ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <?php if (esc_html(get_theme_mod('ga_code'))) : ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_html(get_theme_mod('ga_code')); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '<?php echo esc_html(get_theme_mod('ga_code')); ?>');
        </script>
    <?php endif; ?>

    <!-- twitter card -->
    <?php require('twitter-card.php'); ?>

    <!-- jQuery -->
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/jQuery/3.5.1.min.js"></script>

    <!-- slick -->
    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/slick/slick.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/slick/slick-theme.css">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/dist/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="loading">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" r="0" fill="none" stroke="#0074a5" stroke-width="2">
                <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline" begin="-0.5s"></animate>
                <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline" begin="-0.5s"></animate>
            </circle>
            <circle cx="50" cy="50" r="0" fill="none" stroke="#e0c057" stroke-width="2">
                <animate attributeName="r" repeatCount="indefinite" dur="1s" values="0;40" keyTimes="0;1" keySplines="0 0.2 0.8 1" calcMode="spline"></animate>
                <animate attributeName="opacity" repeatCount="indefinite" dur="1s" values="1;0" keyTimes="0;1" keySplines="0.2 0 0.8 1" calcMode="spline"></animate>
            </circle>
        </svg>
    </div>