<meta name="twitter:card" content="summary_large_image">
<?php
if (is_singular()) {
    if (have_posts()) : while (have_posts()) : the_post();
    if (get_post_meta(get_the_ID(), 'description', true)) :
                echo '<meta property="og:description" content="' . mb_substr(get_post_meta(get_the_ID(), 'description', true), 0, 100) . '">';
    echo "\n"; elseif (get_the_excerpt()) :
                echo '<meta property="og:description" content="' . mb_substr(get_the_excerpt(), 0, 100) . '">';
    echo "\n"; else :
                echo '<meta property="og:description" content="' . esc_html(get_theme_mod('description', '')) . '">';
    echo "\n";
    endif;
    endwhile;
    endif;
    echo '<meta property="og:title" content="';
    the_title();
    echo '">';
    echo "\n";
    echo '<meta property="og:url" content="';
    the_permalink();
    echo '">';
    echo "\n";
} else {
    echo '<meta property="og:description" content="';
    echo esc_html(get_theme_mod('description'));
    echo '">';
    echo "\n";
    echo '<meta property="og:title" content="';
    bloginfo('name');
    echo '">';
    echo "\n";
    echo '<meta property="og:url" content="';
    echo esc_url(home_url());
    echo '">';
    echo "\n";
}
if ($post) {
    $str = $post->post_content;
} else {
    $img_url = esc_url(get_template_directory_uri()) . '/dist/img/noimg.png';
    echo '<meta property="og:image" content="' . $img_url . '">';
    echo "\n";
}
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';
if (is_front_page() && esc_url(get_theme_mod('main_img1'))) {
    $img_url = esc_url(get_theme_mod('main_img1'));
    echo '<meta property="og:image" content="' . $img_url . '">';
    echo "\n";
} elseif (is_singular()) {
    if (has_post_thumbnail()) {
        $image_id = get_post_thumbnail_id();
        $image = wp_get_attachment_image_src($image_id, 'full');
        $img_url = $image[0];
        echo '<meta property="og:image" content="' . $image[0] . '">';
        echo "\n";
    } elseif (preg_match($searchPattern, $str, $imgurl) && !is_archive()) {
        $img_url = $imgurl[2];
        echo '<meta property="og:image" content="' . $imgurl[2] . '">';
        echo "\n";
    } elseif (esc_url(get_theme_mod('main_img1'))) {
        $img_url = esc_url(get_theme_mod('main_img1'));
        echo '<meta property="og:image" content="' . $img_url . '">';
        echo "\n";
    } else {
        $img_url = esc_url(get_template_directory_uri()) . '/dist/img/noimg.png';
        echo '<meta property="og:image" content="' . $img_url . '">';
        echo "\n";
    }
} else {
    if (get_header_image()) {
        $img_url = get_header_image();
        echo '<meta property="og:image" content="' . $img_url . '">';
        echo "\n";
    } elseif (esc_url(get_theme_mod('main_img1'))) {
        $img_url = esc_url(get_theme_mod('main_img1'));
        echo '<meta property="og:image" content="' . $img_url . '">';
        echo "\n";
    } else {
        $img_url = esc_url(get_template_directory_uri()) . '/screenshot.png';
        echo '<meta property="og:image" content="' . $img_url . '">';
        echo "\n";
    }
}

?>
<meta property="twitter:domain" content="<?php echo $results[1] ?>">
<meta property="og:image:width" content="<?php echo $width ?>">
<meta property="ogter:image:height" content="<?php echo $height ?>">
<meta property="twitter:site" content="@w_p_forest">