<?php get_header(); ?>
    <?php get_sidebar('left'); ?>
    <div class="content">
        <div class="main-container">
            <div class="center-part">
                <div class="main-title">
                    <span class="main-span">Nicron</span>
                    <span class="moto-span">情难消受美人恩 白雪化蝶舞红尘</span>
                    <span class="small-span">My Kaleidoscope</span>
                </div>
                <div class="blog-post-layout">
                    <!--文章输出区域-->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) :
                            the_post(); ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="bubble">
                                    <div class="bubble-contain">
                                        <div class="bubble-article">
                                            <h2 class="article-title"><?php the_title(); ?></h2>
                                            <div class="article-info">
                                                <span class="article-date"><i class="fa fa-calendar-o"
                                                                              aria-hidden="true"></i><?php the_time('y-m-d'); ?></span>
                                                <span class="article-viewer"><i class="fa fa-eye"
                                                                                aria-hidden="true"></i><?php if (function_exists('the_views')) {
                                                        the_views();
                                                    } ?></span>
                                                <span class="article-comments"><i class="fa fa-commenting-o"
                                                                                  aria-hidden="true"></i><?php echo(get_comments_number() . "条评论"); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php get_sidebar('right'); ?>
        </div>
    </div>
    <?php get_footer(); ?>
</div>