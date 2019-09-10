<?php get_header(); ?>
<div class="all_layout">
    <!--顶部栏 top-bar-->
    <div class="bar-top">
        <a href=" <?php bloginfo('url'); ?>" class="logo">
            <img src="<?php bloginfo('template_url'); ?>/images/demo.png">
            Nicron
        </a>
        <div class="search_box">
            <form>
                <input class="search_keywords" placeholder="search" value="" name="s">
                <button class="search_button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
        </div>
        <div class="bar-top_right">
            <ul>
                <li class="user">
                    <a class="nav-login no-slide-up" href="javascript:;">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>登陆</span>
                    </a>
                </li>
                <li class="share">
                    <i class="fa fa-share" aria-hidden="true"></i>
                    <span>分享</span>
                </li>
                <li class="contact">
                    <a href="#">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>联系我</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--分享QRcode-->
    <div id="share-qrcode" hidden="hide">
    </div>
    <!--登录弹窗-->
    <div class="login-form no-slide-up">
        <div class="login-header">
            <h3 class="loginlabel">用户登录</h3>
        </div>
        <div class="form">
            <form>
                <div class="input">
                    <label>用户名:</label>
                    <input type="text" class="uname" id="user_login" name="log" value="" aria-describedby="login_error" size="20" autocapitalize="off autocomplete="off" spellcheck="false"
                           placeholder="请使用注册邮箱或手机号登录">
                </div>
                <div class="input">
                    <label>密码:</label>
                    <input type="password" class="upwd" id="user_pass" name="pwd" autocomplete="off" spellcheck="false" aria-describedby="login_error" size="20"
                           placeholder="请输入密码">
                </div>
                <button type="submit" class="btn">登 录</button>
            </form>
        </div>
    </div>
    <div class="login-form-mask"></div>
    <!--背景-->
    <div class="bg">
    </div>
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
                                        <h2 class="article-title"><?php the_title();?></h2>
                                        <div class="article-info">
                                            <span class="article-date"><i class="fa fa-calendar-o" aria-hidden="true"></i>&nbsp;<?php the_time('y-m-d');?></span>
                                            <span class="article-viewer"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;<?php if(function_exists('the_views')) { the_views(); } ?></span>
                                            <span class="article-comments"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;<?php echo(get_comments_number()."条评论");?></span>
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