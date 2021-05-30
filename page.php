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
        <main class="koteipage">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="">
                        <h1 class="koteipage-title"><?php the_title(); ?></h1>

                        <div class="page-detail">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>

                <?php comments_template(); ?>
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