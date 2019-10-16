<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css"/>
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/model/">
</head>
<title>Nicron's bolg</title>
<body>
<div class="all_layout side-fix">
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
                    <a href="">
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
                    <input type="text" class="uname" id="user_login" name="log" value="" aria-describedby="login_error"
                           size="20" autocapitalize="off autocomplete=" off" spellcheck="false"
                    placeholder="请使用注册邮箱或手机号登录">
                </div>
                <div class="input">
                    <label>密码:</label>
                    <input type="password" class="upwd" id="user_pass" name="pwd" autocomplete="off" spellcheck="false"
                           aria-describedby="login_error" size="20"
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