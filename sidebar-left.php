<div class="sidebar-left-contain sidebar" id="leftbar">
    <aside class="sidebar-left">
        <div class="person-info">
            <div class="left-avatar">
                <a href="">
                    <?php echo get_avatar('845182672@qq.com', 130, array('class' => array('left-avatar'))); ?>
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
                    <a class="nav-label" href="<?php bloginfo('url'); ?>"><i class="fa fa-home nav-icon"
                                                                             aria-hidden="true"></i>首页</a>
                </li>
                <!--导航分类标签输出-->
                <?php show_nav(); ?>
                <li class="drop-down">
                    <span class="nav-label">
分类
</span>
                    <?php wp_nav_menu(array('theme_location' => 'left-menu',
                        'link_before' => '<span class="nav-label">',
                        'link_after' => '</span>',
                        'container_class'=>'drop-down-content',
                        'menu_class'=>"sec-nav",
                    )); ?>
                </li>
            </ul>
        </nav>
        <div class="waifu droppable">
            <canvas id="live2d" width="215" height="250"></canvas>
        </div>
    </aside>
</div>
