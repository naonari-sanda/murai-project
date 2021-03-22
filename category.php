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
        <main class="blog">
            <article class="items">

                <h2 class="koteipage-title"><?php single_cat_title(); ?>一覧</h2>

                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="item">
                            <?php output_category_link(); ?>
                            <a href="<?php the_permalink(); ?>" class="item-link">
                                <div class="imgcontainer">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', array('class' => 'single-img')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="textcontainer">
                                    <h3><?php the_title(); ?></h3>
                                    <time class="article-list-date">
                                        <?php the_time("Y.m.d"); ?>
                                    </time>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="notfound-articles">
                        <?php get_template_part('content', 'not-found'); ?>
                    </div>
                <?php endif; ?>
                <?php if (function_exists("pagination")) pagination($wp_query->max_num_pages); ?>
            </article>
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