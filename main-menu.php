<header class="header-l">
    <nav id="menu-nav" class="mainmenu-pc">
        <?php wp_nav_menu(array(
            'theme_location' => 'mainmenu',
            'container' => '', //nav
            'depth' => 1,
            'items_wrap' => '<ul class="menu">%3$s</ul>'

        )); ?>
    </nav>
</header>

<header class="header-s bg_m">
    <div class="header-s__flex">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-s__logo">
            <?php if (esc_url(get_theme_mod('logo_img'))) : ?>
                <img src="<?php echo esc_url(get_theme_mod('logo_img')); ?>" alt="<?php bloginfo('name'); ?>">
            <?php else : ?>
                <h1 class="name"><?php echo bloginfo('name'); ?></h1>
            <?php endif; ?>
        </a>
        <div class="drawer">
            <input type="checkbox" id="menu" style="display: none;">
            <label for="menu" class="hamburger fc"><i class="fas fa-bars"></i></label>
            <nav id="menu-nav" class="nav">
                <label for="menu" class="close"><i class="fas fa-times"></i></label>
                <?php wp_nav_menu(array(
                    'theme_location' => 'mainmenu',
                    'container' => '', //nav
                    'depth' => 2,
                    'items_wrap' => '<ul class="sp-menu">%3$s</ul>'

                )); ?>
            </nav>
        </div>
    </div>
</header>