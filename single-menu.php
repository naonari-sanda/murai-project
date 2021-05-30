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
        <main class="single-menu">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article>
                        <h1 class="koteipage-title"><?php the_title(); ?></h1>
                        <div class="imgcontainer">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'img')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.png" alt="">
                            <?php endif; ?>
                        </div>

                        <section class="textcontainer">
                            <h2 class="desc-title">内容</h2>

                            <p class="desc"><?php echo nl2br(get_post_meta(($post->ID), 'menu_desc', true)); ?></p>
                            <h2 class="detail-title">詳細</h2>
                            <p class="detail"><?php echo nl2br(get_post_meta(($post->ID), 'menu_detail', true)); ?></p>
                        </section>

                        <a href="<?php echo esc_url(home_url('/')); ?>contact" class="booking-btn bg_a fc">お問い合わせ</a>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <h2>記事が見つかりませんでした。</h2>
                <p>検索で見つかるかもしれません。</p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </main>
     
    </section>
    <section class="l-960">
        <div class="l-bottombar">
            <?php dynamic_sidebar('bottombar'); ?>
        </div>
    </section>
</section>
<?php get_footer(); ?>