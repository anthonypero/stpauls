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

    <div class="main-menu__overlay"></div>
</nav>
