<?php
// Utility Bar Template
?>

<div class="utility">

    <a href="<?php bloginfo('url'); ?>" class="identity">
        <h1 class="identity__site-title"><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></h1>
        <img src="<?php echo get_option('header_logo'); ?>" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" class="identity__logo">
    </a>

    <nav class="utility__menu">
        <h2 class="menu-label hidden">Utility Menu</h2>

        <?php wp_nav_menu([
            'theme_location'    => 'utility-menu',
            'depth'             => 1,
            'container'         => '',
            'menu_class'        => 'utility__menu--list',
            'menu_id'           => '',
        ]);
        ?>

    </nav>
    <div class="login-search">
        <div class="login login-search__item">
            <?php if ( is_user_logged_in() ) : ?>
            <a href="<?php bloginfo('url'); ?>/wp-admin/profile.php" title="My Account">
                <i class="fas fa-user"></i>
            </a>
            <?php endif; ?>
            <?php if ( !is_user_logged_in() ) : ?>
            <a href="<?php bloginfo('url'); ?>/wp-admin" title="Log In to <?php bloginfo('name'); ?>">
                <i class="fas fa-sign-in-alt"></i>
            </a>
            <?php endif; ?>
        </div>
        <div class="search-trigger login-search__item"><a href="/search" id="search-trigger"><i class="fas fa-search"></i></a></div>
    </div>

</div><!-- /.utility -->