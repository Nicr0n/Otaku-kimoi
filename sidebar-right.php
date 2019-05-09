<div class="sidebar-right-contain sidebar">
    <aside class="sidebar-right">
        <nav class="nav-right-contianer">
            <ul>
                <li>
                    <span>文章总数：<?php $count_posts = wp_count_posts();
                        echo $published_posts = $count_posts->publish; ?>
                    </span>
                    <span>

                    </span>
                </li>
            </ul>
        </nav>
    </aside>
</div>