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
                <h2 class="right-push-title">最新文章</h2>
                <ul>
                    <?php
                    recent_push()
                    ?>
                </ul>
            </div>
            <div class="hot-articles right-push-switch fade">
                <h2 class="right-push-title">热门文章</h2>
            </div>
            <div class="recent-comments right-push-switch fade">
                <h2 class="right-push-title">最新评论</h2>
            </div>
            <div class="blog-info-layout right-contain">
                <span class="blog-info-title">
                    博客信息
                </span>
                <ul>
                    <li class="blog-info-first blog-info">
                        <span>
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            文章总数<span class="blog-info-content"><?php $count_posts = wp_count_posts();
                            echo $published_posts = $count_posts->publish.'篇'; ?>
                                <span>
                        </span>
                    </li>
                    <li class="blog-info-medium blog-info">
                        <span>
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            网站运行<span class="blog-info-content"><?php echo floor((time()-strtotime("2019-6-27"))/86400); ?>天
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
            <div class="tags right-contain">
                <span class="tag-cloud-title">标签云</span>
                <ul>
                <?php wp_tag_cloud('smallest=14&largest=18&unit=px&number=0&orderby=count&order=DESC');?>
                </ul>
            </div>
        </nav>
    </aside>
</div>