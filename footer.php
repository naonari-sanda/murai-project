<footer id="footer" class="footer bg_m">
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
    <?php get_template_part('sns', 'icons'); ?>
    <nav id="menu-nav" class="footer-nav">
        <?php wp_nav_menu(array(
            'theme_location' => 'footermenu',
            'container' => '', //nav
            'depth' => 1,
            'items_wrap' => '<ul class="">%3$s</ul>'

        )); ?>
    </nav>
    <p class="footer-copyright fc">&copy; <?php echo  bloginfo('name'); ?> <?php echo date('Y'); ?> All rights reserved.</p>

</footer>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/js/main.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>