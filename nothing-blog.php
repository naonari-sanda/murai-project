<!-- <article class="notfound"> -->
<?php if (is_404()) {
    echo '<h2 class="koteipage-title">404エラー</h2>';
} ?>


<p class="notfound-what"><?php if (is_search() || is_archive()) {
    echo '記事が見つかりませんでした。';
} else {
    echo 'ブログの投稿がありません。';
} ?></p>
	<img src="<?php echo esc_url(get_template_directory_uri()) . '/dist/img/404.png'; ?>" class="notfound-img">

<div class="u-center notfound-search">
</div>
<!-- </article> -->