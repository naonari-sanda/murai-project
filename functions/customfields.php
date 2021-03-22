<?php

// カスタム投稿タイプ用カスタムフィールド 

function menu_momentum()
{
    $keyname = 'menu_momentum';
    global $post;
    // 保存されているカスタムフィールドの値を取得
    $get_value = get_post_meta($post->ID, $keyname, true);

    // selectの値
    $data = ['★☆☆☆☆', '★★☆☆☆', '★★★☆☆', '★★★★☆', '★★★★★'];

    // nonceの追加
    wp_nonce_field('action-' . $keyname, 'nonce-' . $keyname);

    // HTMLの出力
    echo '<select name="' . $keyname . '">';
    echo '<option value="">-----</option>';
    foreach ($data as $d) {
        $selected = '';
        if ($d === $get_value) $selected = ' selected';
        echo '<option value="' . $d . '"' . $selected . '>' . $d . '</option>';
    }
    echo '</select>';
}
function menu_target()
{
    global $post;
    echo '<input style="width: 100%;" type="text" name="menu_target" value="' . get_post_meta($post->ID, 'menu_target', true) . '">';
}
function menu_desc()
{
    global $post;
    echo '<textarea style="width: 100%; height: 100px;" name="menu_desc">' . get_post_meta($post->ID, 'menu_desc', true) . '</textarea>';
}
function menu_detail()
{
    global $post;
    echo '<textarea style="width: 100%; height: 150px;" name="menu_detail">' . get_post_meta($post->ID, 'menu_detail', true) . '</textarea>';
}


// シングルページカスタムフィールド 

function description()
{
    global $post;
    echo '<textarea style="width: 100%; height: 80px;" name="description">' . get_post_meta($post->ID, 'description', true) . '</textarea>';
}
// 投稿内容の更新と保存
function save_postdata($post_id)
{

    $menu_momentum = '';
    $menu_target = '';
    $menu_desc = '';
    $menu_detail = '';
    $description = '';

    if (!empty($_POST['menu_momentum'])) {
        $menu_momentum = $_POST['menu_momentum'];
    }
    if ($menu_momentum != get_post_meta($post_id, 'menu_momentum', true)) {
        update_post_meta($post_id, 'menu_momentum', $menu_momentum);
    } elseif ($menu_momentum == '') {
        delete_post_meta($post_id, 'menu_momentum', get_post_meta($post_id, 'menu_momentum', true));
    }

    if (!empty($_POST['menu_target'])) {
        $menu_target = $_POST['menu_target'];
    }
    if ($menu_target != get_post_meta($post_id, 'menu_target', true)) {
        update_post_meta($post_id, 'menu_target', $menu_target);
    } elseif ($menu_target == '') {
        delete_post_meta($post_id, 'menu_target', get_post_meta($post_id, 'menu_target', true));
    }

    if (!empty($_POST['menu_desc'])) {
        $menu_desc = $_POST['menu_desc'];
    }
    if ($menu_desc != get_post_meta($post_id, 'menu_desc', true)) {
        update_post_meta($post_id, 'menu_desc', $menu_desc);
    } elseif ($menu_desc == '') {
        delete_post_meta($post_id, 'menu_desc', get_post_meta($post_id, 'menu_desc', true));
    }

    if (!empty($_POST['menu_detail'])) {
        $menu_detail = $_POST['menu_detail'];
    }
    if ($menu_detail != get_post_meta($post_id, 'menu_detail', true)) {
        update_post_meta($post_id, 'menu_detail', $menu_detail);
    } elseif ($menu_detail == '') {
        delete_post_meta($post_id, 'menu_detail', get_post_meta($post_id, 'menu_detail', true));
    }

    if (!empty($_POST['description'])) {
        $description = $_POST['description'];
    }
    if ($description != get_post_meta($post_id, 'description', true)) {
        update_post_meta($post_id, 'description', $description);
    } elseif ($description == '') {
        delete_post_meta($post_id, 'description', get_post_meta($post_id, 'description', true));
    }
}
