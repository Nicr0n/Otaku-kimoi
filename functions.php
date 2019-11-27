<?php
show_admin_bar(false);
/**
 * 左侧边栏打印所有分类
 */
function show_nav()
{
    global $wpdb;
    $request = "SELECT $wpdb->terms.term_id,parent, name FROM $wpdb->terms ";
    $request .= " LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_taxonomy.term_id = $wpdb->terms.term_id ";
    $request .= " WHERE $wpdb->term_taxonomy.taxonomy = 'category' ";
    $request .= " ORDER BY term_id asc";
    $categorys = $wpdb->get_results($request);
    foreach ($categorys as $category) { //输出区域
        if ($category->parent == 0) {
            $output = '<li class="drop-down">
<span class="nav-label" id=' . $category->term_id . '>
' . $category->name . '
</span>' . '<div class="drop-down-content"><ul>
'//打印所有分类下文章
                . get_articles($category->term_id) . '
</ul></div>' . '
</li>';
            echo $output;
        }
    }
}

/**
 * @param $category 分类ID
 * @return string 分类下所有文章
 */
function get_articles($category)
{
    global $wpdb;
    $requset = "SELECT $wpdb->term_relationships.term_taxonomy_id,object_id,$wpdb->posts.post_title,post_status,guid FROM $wpdb->term_relationships ";
    $requset .= "LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->term_relationships.object_id ";
    $requset .= "WHERE term_taxonomy_id='$category'";
    $articles = $wpdb->get_results($requset);
    $output = "";
    foreach ($articles as $article) {
        if ($article->post_status != 'trash') {
            $output .= '<li class="sec-nav">
<a class="nav-label" href="' . $article->guid . '">' . $article->post_title . '</a>
</li>';
        }
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

/**
 * 获取文章的评论人数
 *$postid:文章id
 *$which:返回类型（0或1）为0时返回评论人数，为1时返回评论条数
 */
function count_comments($postid = 0, $which = 0)
{
    $comments = get_comments('status=approve&type=comment&post_id=' . $postid); //获取文章的所有评论
    if ($comments) {
        $i = 0;
        $j = 0;
        $commentusers = array();
        foreach ($comments as $comment) {
            ++$i;
            if ($i == 1) {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
            if (!in_array($comment->comment_author_email, $commentusers)) {
                $commentusers[] = $comment->comment_author_email;
                ++$j;
            }
        }
        $output = array($j, $i);
        $which = ($which == 0) ? 0 : 1;
        return $output[$which]; //返回评论人数
    }
    return 0; //没有评论返回0
}

// 分页代码
function par_pagenavi($range = 3)
{
    global $paged, $wp_query;
    if (!$max_page) {
        $max_page = $wp_query->max_num_pages;
    }
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        if ($paged != 1) {
            echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'>«</a>";
        }
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo "<a href='" . get_pagenum_link($i) . "'";
                    if ($i == $paged) echo " class='current'";
                    echo ">$i</a>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo "<a href='" . get_pagenum_link($i) . "'";
                if ($i == $paged) echo " class='current'";
                echo ">$i</a>";
            }
        }
        next_posts_link(' »');
    }
}

add_action('init', 'do_output_buffer');
function do_output_buffer() {
	ob_start();
}

//mb_strimwidth lowb替代
function ts_strimwidth($str, $start, $width, $trimmarker)
{
    $output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str);
    return $output.$trimmarker;
}


//add post thumbnails
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
}

if (function_exists('add_image_size')) {
    add_image_size('customized-post-thumb', 100, 120);
}

add_filter('wp_tag_cloud', 'colorCloud', 1);

//注册菜单
function register_my_menus() {
    register_nav_menus(
        array(
            'left-menu' => __( '左侧菜单' )
        )
    );
}
add_action( 'init', 'register_my_menus' );
?>
<?php
//自定义评论列表模板
function simple_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li class="comment" id="li-comment-<?php comment_ID(); ?>">
    <div class="media">
        <div class="media-left">
            <?php if (function_exists('get_avatar') && get_option('show_avatars')) {
                echo get_avatar($comment, 48);
            } ?>
        </div>
        <div class="media-body">
            <?php printf(__('<p class="author_name">%s</p>'), get_comment_author_link()); ?>
            <?php if ($comment->comment_approved == '0') : ?>
                <em>评论等待审核...</em><br/>
            <?php endif; ?>
            <?php comment_text(); ?>
        </div>
    </div>
    <div class="comment-metadata">
   			<span class="comment-pub-time">
   				<?php echo get_comment_time('Y-m-d H:i'); ?>
   			</span>
        <span class="comment-btn-reply">
 				<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge($args, array('reply_text' => '回复', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   			</span>
    </div>

    <?php
    }
    ?>