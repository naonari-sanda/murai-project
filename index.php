<!-- ブログ記事一覧 -->
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
        <p class="fc"><?php bloginfo('description'); ?></p>
    </section>
    <?php get_template_part('main', 'menu'); ?>
    <section class="l-960 flex">
        <main class="blog">
            <article class="items">
                <?php
                $paged = (int) get_query_var('paged');
                $args = array(
                    // 'posts_per_page' => 20,
                    'paged' => $paged,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'post_type' => 'post',
                    'post_status' => 'publish'
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
                        ?>

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
                                    <h2><?php the_title(); ?></h2>
                                    <time class="article-list-date">
                                        <?php the_time("Y.m.d"); ?>
                                    </time>
                                </div>
                            </a>
                        </div>

                    <?php
                        endwhile; // ループの終了
                        ?>
                <?php else : ?>
                    <div class="notfound-articles">
                        <?php get_template_part('nothing', 'blog'); ?>
                    </div>
                <?php endif; ?>
                <div class="pagination3">
                    <?php
                    if ($the_query->max_num_pages > 1) {
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => 'page/%#%/',
                            'current' => max(1, $paged),
                            'total' => $the_query->max_num_pages
                        ));
                    }
                    ?>
                </div>
                <?php wp_reset_postdata(); ?>
            </article>
        </main>
    </section>
    <section class="l-960">
        <div class="l-bottombar">
            <?php dynamic_sidebar('bottombar'); ?>
        </div>
    </section>
</section>
<?php get_footer(); ?>