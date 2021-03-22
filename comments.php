<div id="comments" class="comments">
    <!-- コメント -->
    <?php if (have_comments()) : //コメントがあったらコメントリストを表示する 
        ?>
        <ol class="comments-list">
            <!-- コメントリストを読み込む -->
            <?php wp_list_comments(array(
                    'walker'            => null,
                    'max_depth'         => '',
                    'style'             => 'li',
                    'callback'          => null,
                    'end-callback'      => null,
                    'type'              => 'all',
                    'reply_text'        => '返信する',
                    'page'              => '',
                    'per_page'          => '',
                    'avatar_size'       => 32,
                    'reverse_top_level' => null,
                    'reverse_children'  => '',
                    'format'            => 'html5',
                    'short_ping'        => false,
                    'echo'              => true
                )); ?>
        </ol>
        <div class="pagination3">
            <?php paginate_comments_links(); ?>
        </div>
    <?php endif; ?>
    <!-- コメントフォーム -->
    <div class="bg-base">
        <?php comment_form(); ?>
    </div>
</div>