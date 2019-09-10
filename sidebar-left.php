<div class="sidebar-left-contain sidebar col">
    <aside class="sidebar-left">
        <div class="person-info">
            <div class="left-avatar">
                <a href="">
                    <?php echo('<img src='.get_wp_user_avatar_src(1)); ?> width="130" height="130" alt="Nicron" class="avatar avatar-130 wp-user-avatar wp-user-avatar-130 alignnone photo left-avatar">
                </a>
            </div>
            <span class="">Hi,I'm Nicron</span>
        </div>
        <nav class="scroll">
            <ul>
                <li>
                    <span class="nav-font">导航</span>
                </li>
                <li class="homepage">
                    <a class="nav" href="<?php bloginfo('url'); ?>"><i class="fa fa-home nav-icon" aria-hidden="true"></i>首页</a>
                </li>
                <!--导航分类标签输出-->
                <?php show_nav(); ?>
            </ul>
        </nav>
    </aside>
</div>
<div class="waifu droppable">
    <canvas id="live2d" width="215" height="250"></canvas>
</div>