<?php
// Main Menu Template
?>

<nav class="main-menu">
    <h2 class="menu-label hidden">Main Menu</h2>

    <?php wp_nav_menu([
            'theme_location'    => 'main-menu',
            'depth'             => 1,
            'container'         => '',
            'menu_class'        => 'main-menu__list',
            'menu_id'           => '',
        ]);
    ?>

    <!-- <ul class="main-menu__list">
        <li class="main-menu__list--item about-us"><a href="#" class="main-menu__list--link">About Us</a></li>
        <li class="main-menu__list--item worship"><a href="#" class="main-menu__list--link">Worship</a></li>
        <li class="main-menu__list--item ministries"><a href="#" class="main-menu__list--link">Ministries</a></li>
        <li class="main-menu__list--item community"><a href="#" class="main-menu__list--link">Community</a></li>
        <li class="main-menu__list--item news"><a href="#" class="main-menu__list--link">News</a></li>
        <li class="main-menu__list--item events"><a href="#" class="main-menu__list--link">Events</a></li>
    </ul> -->
</nav>
