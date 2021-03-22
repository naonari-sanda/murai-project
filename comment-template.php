<!-- コメントフォームHTML（comment-template.php） -->
<?php
$defaults = array(
    'fields'               => $fields,
    'comment_field'        => '<p class="comment-form-comment">
        <label for="comment">' . _x('Comment', 'noun') . '</label>
        <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
        </p>',
    /** This filter is documented in wp-includes/link-template.php */
    'must_log_in'          => '<p class="must-log-in">' . sprintf(
        /* translators: %s: login URL */
        __('You must be <a href="%s">logged in</a> to post a comment.'),
        wp_login_url(apply_filters('the_permalink', get_permalink($post_id), $post_id))
    ) . '</p>',
    /** This filter is documented in wp-includes/link-template.php */
    'logged_in_as'         => '<p class="logged-in-as">' . sprintf(
        /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
        __('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'),
        get_edit_user_link(),
        /* translators: %s: user name */
        esc_attr(sprintf(__('Logged in as %s. Edit your profile.'), $user_identity)),
        $user_identity,
        wp_logout_url(apply_filters('the_permalink', get_permalink($post_id), $post_id))
    ) . '</p>',
    'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('Your email address will not be published.') . '</span>' . ($req ? $required_text : '') . '</p>',
    'comment_notes_after'  => '',
    'action'               => site_url('/wp-comments-post.php'),
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'class_form'           => 'comment-form',
    'class_submit'         => 'submit',
    'name_submit'          => 'submit',
    'title_reply'          => __('Leave a Reply'),
    'title_reply_to'       => __('Leave a Reply to %s'),
    'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h3>',
    'cancel_reply_before'  => ' <small>',
    'cancel_reply_after'   => '</small>',
    'cancel_reply_link'    => __('Cancel reply'),
    'label_submit'         => __('Post Comment'),
    'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
    'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
    'format'               => 'xhtml',
);
?>