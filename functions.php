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
</span>'.'<ul class="drop-down-content">
'//打印所有分类下文章
.get_articles($category->term_id).'
</ul>'.'
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
    $requset = "SELECT $wpdb->term_relationships.term_taxonomy_id,object_id,$wpdb->posts.post_title FROM $wpdb->term_relationships ";
    $requset .= "LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->term_relationships.object_id ";
    $requset .= "WHERE term_taxonomy_id='$category'";
    $articles = $wpdb->get_results($requset);
    $output = "";
    foreach ($articles as $article){
        $output .= '<li class="nav sec-nav">
'.$article->post_title.'
</li>';
}
    return $output;
}