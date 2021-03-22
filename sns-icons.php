<?php
$twitter = esc_html(get_theme_mod('twitter'));
$instagram = esc_html(get_theme_mod('instagram'));
$facebook = esc_url(get_theme_mod('facebook'));
$youtube = esc_url(get_theme_mod('youtube'));
$line = esc_url(get_theme_mod('line'));
?>
<?php if ($twitter || $instagram || $facebook || $youtube || $line) : ?>
    <div class="sns-icons">
        <?php if ($twitter) : ?>
            <a href="https://twitter.com/<?php echo $twitter; ?>" class="_twitter icon"><i class="fab fa-twitter"></i></a>
        <?php endif; ?>
        <?php if ($instagram) : ?>
            <a href="https://www.instagram.com/<?php echo $instagram; ?>" class="_instagram icon"><i class="fab fa-instagram"></i></a>
        <?php endif; ?>
        <?php if ($facebook) : ?>
            <a href="<?php echo $facebook; ?>" class="icon _facebook"><i class="fab fa-facebook-f"></i></a>
        <?php endif; ?>
        <?php if ($youtube) : ?>
            <a href="<?php echo $youtube; ?>" class="icon _youtube"><i class="fab fa-youtube"></i></a>
        <?php endif; ?>
        <?php if ($line) : ?>
            <a href="<?php echo $line; ?>" class="icon _line"><i class="social-icon icon-line"></i></a>
        <?php endif; ?>
    </div>
<?php endif; ?>