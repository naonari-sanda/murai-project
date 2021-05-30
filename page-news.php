<?php
/*
 Template Name:お知らせ一覧
 */
?>
<!-- 固定ページ用のページネーション -->
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
        <main class="news">
            <h2 class="koteipage-title"><?php the_title(); ?></h2>

            <ul class="items">
                <?php
                $paged = (int) get_query_var('paged'); // $pagedを定義。これがないとページネーションが動かないっぽい
                $wp_query = new WP_Query();
                $param = array(
                    'post_type' => 'news',
                    'paged' => $paged,
                    'posts_per_page' => 20,
                    'orderby'          => 'date',
                    'order'          => 'desc'
                );
                $wp_query->query($param);
                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>

                        <li class="item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_time('Y.m.d'); ?>：<?php the_title(); ?>
                            </a>
                        </li>


                <?php endwhile;


                else :
                    '<li>お知らせはまだありません</li>';
                endif;

                ?>
            </ul>
            <div class="pagination3">
                <?php
                if ($wp_query->max_num_pages > 1) : // ここからページネーション
                    echo paginate_links(array(
                        'base' => get_pagenum_link(1) . '%_%',
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $wp_query->max_num_pages,
                        'next_text' => '次へ',
                        'prev_text' => '前へ'
                    ));
                endif; ?>
            </div>
        </main>
    </section>
    <section class="l-960">
        <div class="l-bottombar">
            <?php dynamic_sidebar('bottombar'); ?>
        </div>
    </section>
</section>
<?php get_footer(); ?>