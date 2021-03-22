<?php get_header(); ?>
<section class="l-100">
    <section class="front-mainlogo">
        <h1>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if (esc_url(get_theme_mod('logo_img'))) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('logo_img')); ?>" alt="<?php bloginfo('name'); ?>">
                <?php else : ?>
                    <?php echo bloginfo('name'); ?>
                <?php endif; ?>
            </a>
        </h1>
        <p><?php bloginfo('description'); ?></p>
    </section>
    <?php get_template_part('main', 'menu'); ?>
    <section class="l-960 flex">
        <main class="blogpost">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="single-item">
                        <h1 class="blogpost-title"><?php the_title(); ?></h1>
                        <div class="single-content">
                            <div class="single-imgcontainer">
                                <?php if (has_post_thumbnail()) : ?>
                                    <!-- サムネイル表示 -->
                                    <?php the_post_thumbnail('full', array('class' => 'single-img')); ?>
                                <?php endif; ?>
                            </div>

                            <div class="single-info">
                                <div class="single-info__cat">
                                    <?php
                                            $category = get_the_category();
                                            if (!empty($category)) {
                                                $cat = $category[0];
                                                $cat_name = $cat->name;
                                                $cat_id = $cat->cat_ID;
                                                ?>
                                        <a href="<?php echo esc_url(get_category_link($cat_id)); ?>" class="single-info__cat-link"><?php echo $cat_name; ?></a>
                                    <?php } ?>
                                </div>
                                <div class="single-info__date">投稿日：<time class="single-date"><?php the_time("Y.m.j"); ?></time></div>
                            </div>

                            <div class="single-detail">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>

                <div class="pagenation">
                    <ul class="pagenation-ul">
                        <li class="prev"><?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i> 古い記事へ', true); ?></li>
                        <li class="next"><?php next_post_link('%link', '新しい記事へ <i class="fas fa-chevron-right"></i>', true); ?></li>
                    </ul>
                </div>

                <?php comments_template(); ?>
            <?php else : ?>
                <h2>記事が見つかりませんでした。</h2>
                <p>検索で見つかるかもしれません。</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </main>
        <aside class="sidebar">
            <?php get_template_part('prof', 'sns'); ?>
            <?php dynamic_sidebar('sidebar'); ?>
        </aside>
    </section>
    <section class="l-960">
        <div class="l-bottombar">
            <?php dynamic_sidebar('bottombar'); ?>
        </div>
    </section>
</section>
<?php get_footer(); ?>