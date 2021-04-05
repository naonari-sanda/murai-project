<?php
/*
 Template Name:アクセス
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

    <section>
        <main class="access">
            <div class="l-960 notfront">
                <h2 class="koteipage-title"><?php the_title(); ?></h2>

                <?php
                $name = esc_html(get_theme_mod('name'));
                $zip = esc_html(get_theme_mod('zipcode'));
                $address = esc_html(get_theme_mod('address'));
                $tel = esc_html(get_theme_mod('tel'));
                $email = esc_html(get_theme_mod('email'));
                $map = get_theme_mod('map');
                ?>

                <section class="access-detail">
                    <div class="studioname">
                        <?php if (esc_url(get_theme_mod('logo_img'))) : ?>
                            <img src="<?php echo esc_url(get_theme_mod('logo_img')); ?>" alt="<?php bloginfo('name'); ?>">
                        <?php else : ?>
                            <?php echo bloginfo('name'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="access-info">

                        <?php if ($address) : ?>
                            <div class="address">
                                <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'address') ?></div>
                                <span>〒<?php echo $zip; ?><br /><?php echo $address; ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ($tel) : ?>
                            <div class="tel">
                                <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'tel') ?></div>

                                <a href="tel:090-8537-9734"><?php echo $tel; ?></a>（お困りの方はこちらにお電話ください）</span>
                            </div>
                        <?php endif; ?>
                        <?php if ($email) : ?>
                            <div class="email">
                                <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'mail') ?></div>
                                <span><?php echo $email; ?></span>
                            </div>
                        <?php endif; ?>
                        <div class="btns">

                            <a href="<?php echo esc_url(home_url('/')); ?>contact" style="margin: 0 auto" class="contact-btn bg_a fc">お問合わせ</a>
                        </div>
                    </div>
                </section>
            </div>

            <div class="map"><?php echo $map; ?></div>

        </main>
    </section>
</section>
<?php get_footer(); ?>