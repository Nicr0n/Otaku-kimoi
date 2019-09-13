<?php
show_admin_bar(false);
/**
 * 左侧边栏打印所有分类
 */
function show_nav()
{
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { //输出区域
        $output = '<li class="drop-down">
<span class="nav" id=' . $category->term_id . '>
' . $category->name . '
</span>' . '<ul class="drop-down-content">
'//打印所有分类下文章
            . get_articles($category->term_id) . '
</ul>' . '
</li>';
        echo $output;
    }
}

/**
 * @param $category 分类ID
 * @return string 分类下所有文章
 */
function get_articles($category)
{
    global $wpdb;
    $requset = "SELECT $wpdb->term_relationships.term_taxonomy_id,object_id,$wpdb->posts.post_title,guid FROM $wpdb->term_relationships ";
    $requset .= "LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->term_relationships.object_id ";
    $requset .= "WHERE term_taxonomy_id='$category'";
    $articles = $wpdb->get_results($requset);
    $output = "";
    foreach ($articles as $article) {
        $output .= '<li class="sec-nav">
<a class="nav" href="' . $article->guid . '">' . $article->post_title . '</a>
</li>';
    }
    return $output;
}

//显示本站所有标签
function show_lable()
{
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'post_tag' ";
    $request .= " ORDER BY term_id asc";
    $labels = $wpdb->get_results($request);
    foreach ($labels as $label) {
        $output = '<a class="label">' . $label->name . '</a>';
        echo $output;
    }
}

//推送本站最新的5篇文章
function recent_push()
{
    $args = array('numberposts' => 5);
    $recent_posts = wp_get_recent_posts($args);
    foreach ($recent_posts as $recent) {
        echo '<li class="switch-push-li">
<a class="switch-push-float" href="' . get_permalink($recent["ID"]) . '">' . '<img src=' . get_wp_user_avatar_src($recent["post_author"]) . ' class="right-avatar">' . '</a>' . '
<div class="clear"><h4 class="switch-push"><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></h4>' . '<small class="switch-push-time"><i class="fa fa-calendar-o" aria-hidden="true"></i>' . date("Y.m.d", strtotime($recent["post_modified"])) . '</small>' . '
</div></li>';
    }
    wp_reset_query();
}

function recent_comments_push()
{

}

    function last_update()
    {
        global $wpdb;
        date_default_timezone_set('Etc/GMT-8');
        $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");
        $last = strtotime($last[0]->MAX_m);
        $now = time();
        $time = ceil(($now - $last));
        if ($time < 60) {
            echo $time . '秒前';
        } elseif ($time < 3600 && $time >= 60) {
            echo (ceil($time / 60)) . '分钟前';
        } elseif ($time < 86400 && $time >= 3600) {
            echo (ceil($time / 3600)) . '小时前';
        } elseif ($time >= 86400) {
            echo (ceil($time / 86400)) . '天前';
        }
    }

//彩色标签云
    function colorCloud($text)
    {
        $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
        return $text;
    }

    function colorCloudCallback($matches)
    {
        $text = $matches[1];
        $pattern = '/class="/';
        $text = preg_replace($pattern, "class=\"tag-cloud ", $text);
        return "<a $text>";
    }

    add_filter('wp_tag_cloud', 'colorCloud', 1);
    ?>