<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <!-- Stylesheets -->
    <link crossorigin="anonymous" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN"
          href="https://lib.baomitu.com/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link crossorigin="anonymous" integrity="sha384-JEAjzZ2SuTugMi1onOeXj5LyblbhGCa1U6TKYniTHW0Xli9SGkchIfxAB227r21a"
          href="https://lib.baomitu.com/github-markdown-css/3.0.1/github-markdown.css" rel="stylesheet">
    <link crossorigin="anonymous" integrity="sha384-t4IGnnWtvYimgcRMiXD2ZD04g28Is9vYsVaHo5LcWWJkoQGmMwGg+QS0mYlhbVv3"
          href="https://lib.baomitu.com/twitter-bootstrap/4.3.1/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css"/>
    <link href="<?php bloginfo('template_url'); ?>/model/">
    <?php wp_head(); ?>
</head>
<title>Nicron's bolg</title>
<body>
<div class="waifu draggable">
    <canvas id="live2d" width="215" height="250"></canvas>
</div>
<div class="container-fluid side-fix">
    <!--顶部栏 top-bar-->
    <nav class="navbar navbar-light navbar-expand-md fixed-top" role="navigation">
        <div class="navbar-header">
            <a href="<?php bloginfo('url'); ?>" class="navbar-brand">
                <img src="<?php bloginfo('template_url'); ?>/images/demo.png">
                Nicron
            </a>
        </div>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mr-auto collapse navbar-collapse" role="search">
            <div class="form-group">
                <input type="text" class="search_box" placeholder="Search">
                <button class="search_button">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
        </form>
        <div class="collapse navbar-collapse bg-fix" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-login no-slide-up nav-link" href="<?php bloginfo('url'); ?>/wp-login.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>登陆</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fa fa-share" aria-hidden="true"></i>
                        <span>分享</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>联系我</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
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