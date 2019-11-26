<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php get_sidebar('left'); ?>
    <div class="content">
        <div class="main-container d-flex">
            <div class="center-part">
                <div class="single-post-layout">
                    <!--文章输出区域-->
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) :
                            the_post(); ?>
                            <header class="main-title">
                                <h1 class="single-title"><?php the_title(); ?></h1>
                                <ul class="single-meta">
                                    <li><i class="fa fa-user" aria-hidden="true"></i><?php the_author(); ?></li>
                                    <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_date(); ?></li>
                                    <li><i class="fa fa-eye"
                                           aria-hidden="true"></i><?php if (function_exists('the_views')) {
                                            the_views();
                                        } ?></li>
                                    <li><i class="fa fa-comment"
                                           aria-hidden="true"></i><?php count_comments(the_ID(), 1) ?>条评论
                                    </li>
                                    <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_tags(); ?></li>
                                </ul>
                            </header>
                            <div class="single-head">
                                <ul class="single-nav">
                                    <li><a href="<?php echo home_url(); ?>">首页 </a></li>
                                    <li>/</li>
                                    <li><?php the_category(); ?></li>
                                    <li>/</li>
                                    <li>正文</li>
                                </ul>
                            </div>
                            <div class="single-content">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo '<div class="thumbnail">';
                                    the_post_thumbnail();
                                    echo "</div>";
                                }
                                ?>
                                <div class="single-content-article markdown-body">
                                    <?php
                                    the_content();
                                    ?>
                                </div>
                            </div>
                            <div class="single-comments">
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php get_sidebar('right'); ?>
        </div>
    </div>
<?php get_footer(); ?>