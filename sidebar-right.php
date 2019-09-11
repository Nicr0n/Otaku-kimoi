<div class="sidebar-right-contain sidebar">
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
            <div class="recent-articles fade fadein">
                <h2>最新文章</h2>
                <ul>
                    <?php
                    recent_push()
                    ?>
                </ul>
            </div>
            <div class="hot-articles right-push-switch fade">
                <h2>热门文章</h2>
            </div>
            <div class="recent-comments right-push-switch fade">
                <h2>最新评论</h2>
            </div>
            <div class="blog-info-layout right-contain">
                <span>
                    博客信息
                </span>
                <ul>
                    <li class="blog-info-first">
                        <span>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            文章总数：<?php $count_posts = wp_count_posts();
                            echo $published_posts = $count_posts->publish; ?>
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            网站运行：<?php echo floor((time()-strtotime("2019-6-27"))/86400); ?>天
                        </span>
                    </li>
                    <li>
                        <span>
                            <i class="fa fa-upload" aria-hidden="true"></i>最后更新：<?php
                            $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')");
                            $last = date('Y年n月j日', strtotime($last[0]->MAX_m));
                            echo $last;
                            ?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="tags right-contain">
                <span class="right-title">博客标签</span>
                <?php show_lable(); ?>
            </div>
        </nav>
    </aside>
</div>