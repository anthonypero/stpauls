<?php

/**
 * Functions File
 */

// Loads Admin Section Functions
require get_template_directory(  ) . '/inc/function-admin.php';

// Loads Featured Image Support and custom sizes
require get_template_directory(  ) . '/inc/function-thumbnails.php';

// Loads Custom Menus and Registers them in the Database
require get_template_directory(  ) . '/inc/function-menus.php';

// Loads Breadcrumb Function
require get_template_directory(  ) . '/inc/function-breadcrumbs.php';

// Style and Script support
function sp_theme_load_styles() {
    wp_enqueue_style( 'sp-styles', get_stylesheet_directory_uri() . '/css/style.css', [], time(), 'all' );
    wp_enqueue_style( 'Google-Fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,500,700|Roboto:300i,300,400i,400,700i,700', [], null, 'all');
    wp_enqueue_style( 'font-awesome-5', get_stylesheet_directory_uri() . '/css/all.min.css', [], '5.2', 'all' );

    if ( is_front_page() ) {

        wp_enqueue_script('google-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', NULL, '1.11.0', true);
        wp_enqueue_script( 'light-slider', get_stylesheet_directory_uri() . '/js/lightslider.min.js', [ 'google-jquery' ], '1.1.6', true );
    }
}

add_action( 'wp_enqueue_scripts', 'sp_theme_load_styles' );

function sp_login_stylesheet() {
    wp_enqueue_style( 'sp-login-styles', get_stylesheet_directory_uri() . '/css/login.css', [], time(), 'all' );
}

add_action( 'login_enqueue_scripts', 'sp_login_stylesheet' );

// Check if Page is in a Menu

function sp_page_is_in_menu( $menu = null, $object_id = null ) {

    $menu_object = wp_get_nav_menu_items( esc_attr( $menu ) );
    if( ! $menu_object )
        return false;

    $menu_items = wp_list_pluck( $menu_object, 'object_id' );

    if( !$object_id ) {
        global $post;
        $object_id = get_queried_object_id();
    }

    return in_array( (int) $object_id, $menu_items );

}

// Register Sidebars and Widget Areas

function sp_register_widget_area() {
    register_sidebar([
        'name'          => 'Sidebar',
        'id'            => 'single_sidebar',
        'description'   => 'Single Sidebar displays to the right of the Content area on desktops, and below the content area on Mobile',
        'class'         => 'single-sidebar',
        'before_widget' => '<div class="block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="block__title">',
        'after_title'   => '</h2>',
    ]);
    register_sidebar([
        'name'          => 'Frontpage Sidebar',
        'id'            => 'fp_sidebar',
        'description'   => 'Frontpage Sidebar displays on the front page to the right of the Content area on desktops, and below the content area on Mobile',
        'class'         => 'fp-sidebar',
        'before_widget' => '<div class="block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="block__title">',
        'after_title'   => '</h2>',
    ]);
    register_sidebar([
        'name'          => 'Frontpage Post Content',
        'id'            => 'fp_post_content',
        'description'   => 'Frontpage Post Content displays on the front page beneath the content area and the sidebar',
        'class'         => 'fp-popst-content',
        'before_widget' => '<div class="block">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="block__title">',
        'after_title'   => '</h2>',
    ]);
}

add_action( 'widgets_init', 'sp_register_widget_area' );

// Test if current page has children or is a child

function has_children() {
    global $post;

    $children = get_pages( array( 'child_of' => $post->ID ) );
    if( count( $children ) == 0 && $post->post_parent == 0 ) {
        return false;
    } else {
        return true;
    }
}

// Test if current page is parent

function is_parent() {
    global $post;

    $children = get_pages( [ 'child_of' => $post->ID ] );
    if ( count( $children ) == 0 ) {
        return false;
    } else {
        return true;
    }
}

// Add Custom Post Types to Archive pages

function sp_add_custom_types( $query ) {

    // if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    //   $query->set( 'post_type', array(
    //    'post', 'nav_menu_item', 'article', 'event', 'staff', 'sermon'
    //       ));
    //     return $query;
    //   }

// add condition to make sure it's the the main query
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) && $query->is_main_query() ) {
        $query->set( 'post_type', array(
            'post', 'nav_menu_item', 'article', 'acf-field', 'acf-field-group', 'event', 'staff', 'sermon'
        ));
        return $query;
    }
}

add_filter( 'pre_get_posts', 'sp_add_custom_types' );

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');

/* Replace Login Logo Link */

function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
    
function my_login_logo_url_title() {
    return "Return to St. Paul's";
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );