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
            <div class="blog-info right-contain">
                <span>文章总数：<?php $count_posts = wp_count_posts();
                    echo $published_posts = $count_posts->publish; ?>
                </span>
            </div>
            <div class="tags right-contain">
                <span class="right-title">博客标签</span>
                <?php show_lable(); ?>
            </div>
        </nav>
    </aside>
</div>