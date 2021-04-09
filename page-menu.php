<?php
/*
 Template Name:レッスン一覧
 */
?>
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

    <section class="l-960 notfront">
        <main class="menus">
            <h2 class="koteipage-title"><?php the_title(); ?></h2>

            <ul class="items">
                <?php
                $args = array(
                    'post_type' => 'menu',
                    'posts_per_page' => -1,
                    'orderby'          => 'date',
                    'order'          => 'asc'
                );
                $post_list = get_posts($args);
                if ($post_list) {
                    foreach ($post_list as $post) : setup_postdata($post);
                ?>

                        <li class="item">
                            <div>
                                <div class="imgcontainer">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="textcontainer">
                                    <h3 class="item-title"><?php the_title(); ?></h3>

                                    <p class="item-desc"><?php echo get_post_meta(($post->ID), 'menu_desc', true); ?></p>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="link-cover">
                                <p class="go-detail">詳細を見る</p>
                            </a>
                        </li>

                <?php endforeach;
                    wp_reset_query();
                }; ?>
            </ul>
            <div class="add_btn_box">

                <a href="<?php echo esc_url(home_url('/')); ?>contact" class="booking-btn bg_a fc add_btn">お問い合わせ</a>
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