<?php
// The Sidebar Template
?>

<div class="block secondary-menu icon icon-link">

    <h2 class="block__title">Quick Links</h2>

    <?php wp_nav_menu([
            'theme_location'    => 'quicklinks-menu',
            'depth'             => 1,
            'container'         => '',
            'menu_class'        => 'list',
            'menu_id'           => '',
        ]);
    ?>


</div><!-- /.block -->

<?php dynamic_sidebar( 'fp_sidebar' ); ?>