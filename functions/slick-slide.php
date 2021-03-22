<div class="front-mainimgcontainer">
    <?php
    $main_img1 = esc_url(get_theme_mod('main_img1'));
    $main_img2 = esc_url(get_theme_mod('main_img2'));
    $main_img3 = esc_url(get_theme_mod('main_img3'));

    $main_img_sp1 = esc_url(get_theme_mod('main_img_sp1'));
    $main_img_sp2 = esc_url(get_theme_mod('main_img_sp2'));
    $main_img_sp3 = esc_url(get_theme_mod('main_img_sp3'));


    ?>
    <div class="slick-imgs _pc">
        <a href="<?php echo esc_url(get_theme_mod('link1')); ?>" class="slick-imgcontainer">
            <img src="<?php echo esc_url(get_theme_mod('main_img1')); ?>" alt="" class="slick-img">
        </a>
        <?php if ($main_img2) : ?>
            <a href="<?php echo esc_url(get_theme_mod('link2')); ?>" class="slick-imgcontainer">
                <img src="<?php echo esc_url(get_theme_mod('main_img2')); ?>" alt="" class="slick-img">
            </a>
        <?php endif; ?>
        <?php if ($main_img3) : ?>
            <a href="<?php echo esc_url(get_theme_mod('link3')); ?>" class="slick-imgcontainer">
                <img src="<?php echo esc_url(get_theme_mod('main_img3')); ?>" alt="" class="slick-img">
            </a>
        <?php endif; ?>
    </div>

    <div class="slick-imgs _sp">
        <a href="<?php echo esc_url(get_theme_mod('link1')); ?>" class="slick-imgcontainer">
            <?php if ($main_img_sp1) : ?>
                <img src="<?php echo esc_url(get_theme_mod('main_img_sp1')); ?>" alt="" class="slick-img">
            <?php else : ?>
                <img src="<?php echo esc_url(get_theme_mod('main_img1')); ?>" alt="" class="slick-img">
            <?php endif; ?>
        </a>
        <?php if ($main_img2 || $main_img_sp2) : ?>
            <a href="<?php echo esc_url(get_theme_mod('link2')); ?>" class="slick-imgcontainer">
                <?php if ($main_img_sp2) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('main_img_sp2')); ?>" alt="" class="slick-img">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_mod('main_img2')); ?>" alt="" class="slick-img">
                <?php endif; ?>
            </a>
        <?php endif; ?>
        <?php if ($main_img3 || $main_img_sp3) : ?>
            <a href="<?php echo esc_url(get_theme_mod('link3')); ?>" class="slick-imgcontainer">
                <?php if ($main_img_sp3) : ?>
                    <img src="<?php echo esc_url(get_theme_mod('main_img_sp3')); ?>" alt="" class="slick-img">
                <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_mod('main_img3')); ?>" alt="" class="slick-img">
                <?php endif; ?>
            </a>
        <?php endif; ?>
    </div>
</div>