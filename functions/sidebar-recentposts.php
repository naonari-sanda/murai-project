<?php
// 最近の投稿ウィジェットカスタマイズ--------------------------------------------
class MY_WP_Widget_Recent_Posts extends WP_Widget_Recent_Posts
{

    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title'])) ? $instance['title'] : __('Recent Posts');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
        if (!$number) {
            $number = 5;
        }
        $show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

        $r = new WP_Query(
            apply_filters(
                'widget_posts_args',
                array(
                    'posts_per_page'      => $number,
                    'no_found_rows'       => true,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                ),
                $instance
            )
        );

        if (!$r->have_posts()) {
            return;
        }
        ?>
        <?php echo $args['before_widget']; ?>
        <?php
                if ($title) {
                    echo $args['before_title'] . $title . $args['after_title'];
                }
                ?>
        <ul class="recentposts">
            <?php foreach ($r->posts as $recent_post) : ?>
                <?php
                            $post_title = get_the_title($recent_post->ID);
                            $title      = (!empty($post_title)) ? $post_title : __('(no title)');
                            ?>
                <li class="">
                    <a href="<?php the_permalink($recent_post->ID); ?>" class="">
                        <?php echo $title; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
<?php
        echo $args['after_widget'];
    }
}
