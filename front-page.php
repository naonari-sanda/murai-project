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

    <section class="main-menu"><?php get_template_part('main', 'menu'); ?></section>

    <div class="mainvisual">
        <?php get_template_part('functions/slick', 'slide') ?>
    </div>



    <main class="front-main l-960">

    <section class="front-menu">
            <h2 class="front-main__title">レッスン・クラス</h2>
            <ul class="front-menu__items">
                <?php $args = array(
                    'numberposts' => 3,
                    'post_type' => 'menu',
                    'orderby' => 'date',
                    'order' => 'desc'

                );
                $posts = get_posts($args);
                if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>

                        <li>
                            <a href="<?php the_permalink(); ?>" class="front-menu__itemlink">
                                <div class="imgcontainer">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail(); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/noimg.png" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <h3 class="front-menu__title"><?php the_title(); ?></h3>

                            </a>
                        </li>

                    <?php endforeach; ?>
                <?php else : ?>
                    <li class="no-news">
                        <p>メニューはまだありません。</p>
                    </li>
                <?php endif;
                wp_reset_postdata();
                ?>
            </ul>
            <div class="u-right">
                <a href="<?php echo esc_url(home_url('/')); ?>lesson" class="more-btn">もっと見る</a>
            </div>
        </section>

        <section class="front-menu">
            <h2 class="front-main__title">コンセプト</h2>
            <div class="front-concept">
                <div class="imgcontainer">
                    <img src="<?php echo esc_url(get_theme_mod('concept_img')); ?>" alt="">
                </div>
                <div class="front-concept__detail">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1280.000000pt" height="814.000000pt" viewBox="0 0 1280.000000 814.000000" preserveAspectRatio="xMidYMid meet" class="background">
                        <g transform="translate(0.000000,814.000000) scale(0.100000,-0.100000)" stroke="none">
                            <path d="M4155 8124 c-1521 -123 -2390 -238 -3095 -410 -353 -87 -673 -210
-823 -318 -193 -137 -270 -297 -222 -462 54 -190 205 -312 565 -457 289 -117
667 -228 1610 -472 1200 -310 1696 -488 1873 -671 44 -46 46 -66 10 -100 -111
-103 -339 -190 -1068 -409 -639 -192 -864 -270 -1090 -381 -249 -121 -400
-243 -466 -379 -29 -58 -35 -83 -38 -152 -6 -141 46 -251 184 -388 200 -200
507 -342 1058 -490 230 -61 298 -77 892 -210 1088 -244 1592 -399 2070 -640
458 -230 744 -464 992 -811 161 -227 259 -328 464 -482 354 -265 909 -504
1533 -658 733 -182 1568 -264 2286 -224 1087 61 1762 351 1891 815 23 82 18
256 -10 345 -65 211 -200 410 -422 625 -491 475 -1357 866 -2649 1198 -466
120 -863 206 -1875 407 -1258 250 -1610 338 -1857 461 -133 67 -193 139 -167
200 17 44 83 93 190 143 134 63 254 103 626 207 431 120 535 152 673 205 348
136 509 289 510 485 2 423 -618 732 -2190 1089 -381 87 -510 114 -1480 310
-952 192 -1095 223 -1400 299 -281 71 -514 145 -625 200 -90 45 -103 54 -128
93 -108 169 288 394 1018 576 338 85 831 177 1235 232 192 26 216 34 241 74
49 81 -10 168 -113 165 -24 -1 -115 -7 -203 -15z" />
                        </g>
                    </svg>

                    <p class="concept"><?php echo nl2br(esc_html(get_theme_mod('concept_detail'))); ?></p>
                </div>
            </div>
            <div class="u-right">
                <a href="<?php echo esc_url(home_url('/')); ?>about" class="more-btn">もっと見る</a>
            </div>
        </section>

        <section class="front-menu">
        <h2 class="front-main__title">講師紹介</h2>
            <div class="profile">
            <section class="prof-detail">
                    <div class="imgcontainer">
                            <img src="<?php echo esc_url(get_theme_mod('prof_img')) ?>" alt="<?php bloginfo(esc_html(get_theme_mod('name'))); ?>">
                    </div>
                    <div class="prof-history">
                            <p class="name"><?php echo esc_html(get_theme_mod('name')) ?></p>
                        <p class="history"><?php echo nl2br(esc_html(get_theme_mod('history'))); ?></p>
                    </div>
                </section>
            </div>
            <div class="u-right">
                <a href="<?php echo esc_url(home_url('/')); ?>about" class="more-btn">もっと見る</a>
            </div>
        </section>


        <section class="front-menu">
        <h2 class="front-main__title front-insta"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/320px-Instagram.png" alt=""></h2>
            <div class="profile">
            
            <?php echo do_shortcode("[instagram-feed num=3]"); ?>
            </div>
            <div class="u-right">
                <!-- <a href="<?php echo esc_url(home_url('/')); ?>about" class="more-btn">もっと見る</a> -->
            </div>
        </section>


        <section class="front-menu">
            <h2 class="front-main__title">お知らせ</h2>
            <ul class="front-news__items">
                <?php $args = array(
                    'numberposts' => 5,                //表示（取得）する記事の数
                    'post_type' => 'news',   //投稿タイプの指定
                    'orderby' => 'date',
                    'order' => 'desc'
                );
                $posts = get_posts($args);
                if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_time('Y.m.d'); ?>：<?php the_title(); ?></a></li>
                    <?php endforeach; ?>
                <?php else : //記事が無い場合
                ?>
                    <li>
                        <p>お知らせはまだありません。</p>
                    </li>
                <?php endif;
                wp_reset_postdata(); //クエリのリセット
                ?>
            </ul>
            <div class="u-right">
                <a href="<?php echo esc_url(home_url('/')); ?>news" class="more-btn">もっと見る</a>
            </div>
        </section>

        <section class="front-schedule">
            <h2 class="front-main__title">スケジュール</h2>
            <div class="twecolpc-flex">
                <div class="calendar-container">

                <ul class="parent_ul">
                    <li class="parent_li"><p class="week">月曜日</p><ul class="child_ul">
                        <li class="child_li">15:30〜16:30  キッズクラス</li>
                        <li class="child_li">16:30〜17:30  ジュニア① 基礎クラス</li>
                    </ul></li>
                    <li class="parent_li"><p class="week">金曜日</p><ul class="child_ul">
                        <li class="child_li">16:00〜17:00  キッズクラス</li>
                        <li class="child_li">17:00〜18:00  ジュニア① 基礎クラス</li>
                    </ul></li>
                </ul>
                    <!-- <div style="border: 0" frameborder="0" scrolling="no"><?php /* echo do_shortcode("[my_calendar]"); */?></div> -->
                </div>
                <!-- <div class="formbtn-container">
                    <p class="schedule-attention"><?php /* echo nl2br(esc_html(get_theme_mod('schedule'))); */?></p>
                    <div class="btns">

                        <a href="<?php /* echo esc_url(home_url('/')); */?>contact" class="contact-btn bg_a fc" style="margin: 0 auto">お問合わせ</a>
                    </div>
                </div> -->
            </div>
        </section>

        <?php if (get_theme_mod('map')) : ?>
            <section class="front-access">
                <h2 class="front-main__title">アクセス</h2>
                <div class="twecolpc-flex">
                    <div class="front-access__map">
                        <?php echo get_theme_mod('map'); ?>
                    </div>
                    <?php
                    $zip = esc_html(get_theme_mod('zipcode', ''));
                    $address = esc_html(get_theme_mod('address', ''));
                    $tel = esc_html(get_theme_mod('tel', ''));
                    $email = esc_html(get_theme_mod('email', ''));
                    $name = esc_html(get_theme_mod('name', ''));
                    ?>
                    <div class="front-access__detail">
                        <div class="access">
                            <h3 class="name">
                                <?php if (esc_url(get_theme_mod('logo_img'))) : ?>
                                    <img src="<?php echo esc_url(get_theme_mod('logo_img')); ?>" alt="<?php bloginfo('name'); ?>">
                                <?php else : ?>
                                    <?php echo bloginfo('name'); ?>
                                <?php endif; ?>
                            </h3>
                            <?php if ($address) : ?>
                                <div class="address">
                                    <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'address') ?></div>
                                    <span><?php echo $address; ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($tel) : ?>
                                <div class="tel">
                                    <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'tel') ?></div>
                                    <a href="tel:090-8537-9734"><?php echo $tel; ?></a></span>
                                </div>
                            <?php endif; ?>
                            <?php if ($email) : ?>
                                <div class="email">
                                    <div class="access-iconcontainer icon"><?php get_template_part('icons/icon', 'mail') ?></div>
                                    <span><?php echo $email . '（村井）'; ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="email">
                                <div class="access-iconcontainer icon"></div>
                                <span style="color: red;">事前にお電話、もしくはメールにてご予約の上お越しください。</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="u-right">
                    <a href="<?php echo esc_url(home_url('/')); ?>access" class="more-btn">もっと見る</a>
                </div>
            </section>
            <section class="front-menu">
                <h2 class="front-main__title">お問い合わせ</h2>

                <div class="add_btn_box">
<p class="contact-p">お気軽にご相談ください</p>
                    <a href="<?php echo esc_url(home_url('/')); ?>contact" class="booking-btn bg_a fc add_btn">お問い合わせ</a>
                </div>
            </section>
        <?php endif; ?>


    </main>
</section>
<?php get_footer(); ?>