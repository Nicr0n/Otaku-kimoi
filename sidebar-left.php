<div class="sidebar-left-contain sidebar col">
    <aside class="sidebar-left">
        <div class="person-info">
            <div class="avatar">
                <a href="">
                    <?php echo get_avatar(1, 130); ?>
                </a>
            </div>
            <span class="">Hi,I'm Nicron</span>
        </div>
        <nav class="scroll">
            <ul>
                <li>
                    <span class="nav-font">导航</span>
                </li>
                <li>
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