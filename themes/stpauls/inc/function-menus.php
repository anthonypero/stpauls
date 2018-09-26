<?php

// Register Menus in the Database

function sp_register_menus() {
    register_nav_menus([
        'main-menu'         => __( 'Main Menu' ),
        'utility-menu'      => __( 'Utility Menu' ),
        'quicklinks-menu'      => __( 'QuickLinks Menu' )
    ]);
}

add_action( 'init', 'sp_register_menus' );

// Adds proper classes to list-items in the Utility Menu

function sp_utility_menu_classes( $classes, $item, $args ) {

    if( $args->theme_location == 'utility-menu') {
      $classes[] = 'utility__menu--list--item';
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'sp_utility_menu_classes', 1, 3);

// Adds proper classes to links in the Utility Menu

function sp_utility_menu_link_classes( $atts, $item, $args ) {
    if ( $args->theme_location == 'utility-menu' ) {
        $atts['class'] = 'utility__menu--list--link';
    }
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'sp_utility_menu_link_classes', 10, 3 );

// Adds proper classes to list-items in the Utility Menu

function sp_main_menu_classes( $classes, $item, $args ) {

    if( $args->theme_location == 'main-menu') {
      $classes[] = 'main-menu__list--item';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'sp_main_menu_classes', 1, 3 );

// Adds proper classes to links in the Utility Menu

function sp_main_menu_link_classes( $atts, $item, $args ) {
    if ( $args->theme_location == 'main-menu' ) {
        $atts['class'] = 'main-menu__list--link';
    }
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'sp_main_menu_link_classes', 10, 3 );

// Replace classes in Secondary Menu 

function sp_replace_secondary_list_item_classes($output, $r, $pages) {
    $output = str_replace( 'page_item', 'list--item', $output );
    $output = str_replace( '<a', '<a class="list--link"', $output );
    return $output;
}

add_filter( 'wp_list_pages', 'sp_replace_secondary_list_item_classes', 10, 3 );

// Adds proper classes to links in the Utility Menu

function sp_quicklinks_menu_link_classes( $atts, $item, $args ) {
    if ( $args->theme_location == 'quicklinks-menu' ) {
        $atts['class'] = 'quicklinks__menu--list--link list--link';
    }
    return $atts;
}

add_filter( 'nav_menu_link_attributes', 'sp_quicklinks_menu_link_classes', 10, 3 );

// Adds proper classes to list-items in the QuickLinks Menu

function sp_quicklinks_menu_classes( $classes, $item, $args ) {

    if( $args->theme_location == 'quicklinks-menu') {
      $classes[] = 'quicklinks__menu--list--item list--item';
    }

    return $classes;
}

add_filter( 'nav_menu_css_class', 'sp_quicklinks_menu_classes', 1, 3 );