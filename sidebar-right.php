<div class="sidebar-right-contain sidebar bg-auto">
    <aside class="sidebar-right">
        <nav class="nav-right-contianer">
            <div class="right-push  ">
                <ul>
                    <li class="right-push-tabs rpt1">
                        <i class="fa fa-rss" aria-hidden="true"></i>
                    </li>
                    <li class="right-push-tabs rpt2">
                        <i class="fa fa-fire" aria-hidden="true"></i>
                    </li>
                    <li class="right-push-tabs rpt3">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                    </li>
                </ul>
            </div>
            <div class="recent-articles fade fadein right-switch">
                <span class="right-title">最新文章</span>
                <ul>
                    <?php
                    recent_push();
                    ?>
                </ul>
            </div>
            <div class="hot-articles right-push-switch fade right-switch">
                <span class="right-title">热门文章</span>
                <ul>
                    <?php
                    $popular_posts = new WP_Query(array(
                        'post_type' => array('post'),
                        'showposts' => 5,
                        'orderby' => 'comment_count', //–这个意思就是 取得评论数最多的文章
                        'order' => 'desc'
                    ));
                    ?>
                    <?php while ($popular_posts->have_posts()): $popular_posts->the_post(); ?>
                        <li class="switch-push-li">
                            <a class="switch-push-float" href="<?php the_permalink(); ?>">
                                <img src="<?php echo get_wp_user_avatar_src(get_post(get_the_ID())->post_author); ?>"
                                     class="right-avatar">
                            </a>
                            <div class="clear">
                                <h4 class="switch-push">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <small class="switch-push-time">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                    <?php echo get_comments_number(get_the_ID()); ?>
                                </small>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="recent-comments right-push-switch fade right-switch">
                <span class="right-title">最新评论</span>
                <ul
                    <?php
                    $comments = get_comments('status=approve&number=5&order=desc');
                    foreach ($comments as $comment) :
                        $avatar = "";
                        $output = '<li class="switch-push-li"><a class="switch-push-float" href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . get_avatar($comment->comment_author_email, 40) . '</a>
<div class="clear">
<h4 class="switch-push"><a href="' . esc_url(get_comment_link($comment->comment_ID)) . '">' . $comment->comment_author . '</a></h4>
<small class="switch-push-comment-content">'.mb_strimwidth($comment->comment_content,0,47,"...").'</small>
</div>
</li>';
                        echo $output;
                    endforeach;
                    ?>
                </ul>
            </div>
            <div class="right-contain">
                <span class="blog-info-title">
                    博客信息
                </span>
                <ul>
                    <li class="blog-info-first blog-info">
                        <span>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            文章总数<span class="blog-info-content"><?php $count_posts = wp_count_posts();
                                echo $published_posts = $count_posts->publish . '篇'; ?>
                                <span>
                        </span>
                    </li>
                    <li class="blog-info-medium-top blog-info">
                        <span>
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            网站运行<span
                                    class="blog-info-content"><?php echo floor((time() - strtotime("2019-10-17")) / 86400); ?>天
                            </span>
                        </span>
                    </li>
                    <li class="blog-info-medium-down blog-info">
                        <span>
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            评论总数<span
                                    class="blog-info-content"><?php echo $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments"); ?> 条
                            </span>
                        </span>
                    </li>
                    <li class="blog-info-bottom blog-info">
                        <span>
                            <i class="fa fa-upload" aria-hidden="true"></i>最后更新
                            <span class="blog-info-content">
                            <?php
                            last_update();
                            ?>
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="right-contain">
                <span class="right-title">标签云</span>
                <ul>
                    <?php wp_tag_cloud('smallest=14&largest=18&unit=px&number=0&orderby=count&order=DESC'); ?>
                </ul>
            </div>
            <div class="calender">
                <span class="right-contain">文章归档</span>
                <?php the_widget('WP_Widget_Calendar'); ?>
            </div>
        </nav>
    </aside>
</div>