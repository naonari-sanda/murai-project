<!-- <article class="notfound"> -->
<?php if (is_404()) echo '<h2 class="koteipage-title">404エラー</h2>' ?>


<p class="notfound-what"><?php if (is_search() || is_archive()) {
								echo '記事が見つかりませんでした。';
							} else {
								echo 'お探しのページが見つかりませんでした。';
							} ?></p>
<?php if (is_search()) : ?>

	<img src="<?php echo esc_url(get_template_directory_uri()) . '/dist/img/nocontent.png'; ?>" class="notfound-img">
	<p class="notfound-how">指定されたキーワードでは記事が見つかりませんでした。別のキーワード、もしくはカテゴリーから記事をお探しください。</p>

<?php elseif (is_archive()) : ?>

	<p class="notfound-how">まだ記事が投稿されていません。以下でキーワードやカテゴリーから記事を探すことができます。</p>

<?php else : ?>

	<img src="<?php echo esc_url(get_template_directory_uri()) . '/dist/img/404.png'; ?>" class="notfound-img">
	<p class="notfound-how">お探しのページは「すでに削除されている」、「アクセスしたアドレスが異なっている」などの理由で見つかりませんでした。以下でキーワードやカテゴリーから記事を探すことができます。</p>

<?php endif; ?>

<div class="u-center notfound-search">
	<?php get_search_form(); ?>
</div>
<!-- </article> -->