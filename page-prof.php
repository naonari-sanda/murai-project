<?php
/*
 Template Name:プロフィール
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
        <main class="profile">
            <h2 class="koteipage-title"><?php the_title(); ?></h2>

            <?php
            $name = esc_html(get_theme_mod('name'));
            $prof_img = esc_url(get_theme_mod('prof_img'));
            $history = esc_html(get_theme_mod('history'));
            $introduction = esc_html(get_theme_mod('introduction'));
            ?>

            <section class="prof-detail">
                <div class="imgcontainer">
                    <?php if ($prof_img) : ?>
                        <img src="<?php echo  $prof_img; ?>" alt="<?php bloginfo('name'); ?>">
                    <?php else : ?>
                        <img src="<?php echo esc_url(get_theme_mod('concept_img')); ?>" alt="<?php bloginfo('name'); ?>">
                    <?php endif; ?>
                </div>
                <div class="prof-history">
                    <?php if ($name) : ?>
                        <p class="name"><?php echo $name; ?></p>
                    <?php else : ?>
                        <p class="name"><?php bloginfo('name'); ?></p>
                    <?php endif; ?>
                    <p class="history"><?php echo nl2br($history); ?></p>
                </div>
            </section>

            <p class="prof-intro"><?php echo nl2br($introduction); ?></p>
            <div class="add_btn_box">

                <a href="<?php echo esc_url(home_url('/')); ?>contact" class="booking-btn bg_a fc add_btn">お問い合わせ</a>
            </div>
        </main>
    </section>
</section>
<?php get_footer(); ?>