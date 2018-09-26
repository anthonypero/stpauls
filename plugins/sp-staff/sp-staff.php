<?php
/*
  Plugin Name: St. Paul's Staff
  Description: Custom Staff Post Type
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

// Add Custom Taxonomy for Staff
 
function sp_staff_categories() {
    
    register_taxonomy( 'staff_type', ['staff'], [
        'hierarchical'          => true,
        'labels'                => [
            'name'              => _x( 'Staff Type', 'taxonomy general name' ),
            'singular_name'     => _x( 'Staff Type', 'taxonomy singular name' ),
            'search_items'      =>  __( 'Search Staff Types' ),
            'all_items'         => __( 'All Staff Types' ),
            'parent_item'       => __( 'Parent Type' ),
            'parent_item_colon' => __( 'Parent Type:' ),
            'edit_item'         => __( 'Edit Type' ), 
            'update_item'       => __( 'Update Type' ),
            'add_new_item'      => __( 'Add New Type' ),
            'new_item_name'     => __( 'New Type Name' ),
            'menu_name'         => __( 'Staff Types' ),
        ], 
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
        'rewrite'               => [ 'slug' => 'staff-type' ],
    ]);
}

add_action( 'init', 'sp_staff_categories', 0 );

// Create Staff Post Type

function sp_create_posttype_staff() {
    // Register Custom Post Type
    register_post_type( 'staff', [
        'labels'                    => [
            'name'                  => 'Staff',
            'singular_name'         => 'Staff',
            'add_new'               => 'Add New Staff Member',
            'add_new_item'          => 'Add New Staff Member',
            'edit_item'             => 'Edit Staff Member',
            'new_item'              => 'New Staff Member',
            'view_item'             => 'View Staff Member',
            'view_items'            => 'View Staff',
            'search_items'          => 'Search Staff',
            'not_found'             => 'No Staff Found',
            'not_found_in_trash'    => 'No Staff found in Trash',
            'parent_item_colon'     => 'Parent:',
            'all_items'             => 'All Staff',
            'archives'              => 'Staff Archive',
            'attributes'            => 'Staff Attributes',
            'uploaded_to_this_item' => 'Uploaded to this Staff Member',
            'insert_into_item'      => 'Insert into Staff Member',
            'featured_image'        => 'Featured Image for this Staff Member',
            'menu_name'             => 'Staff',
        ],
        'public'                    => true,
        'menu_position'             => 21,
        'menu_icon'                 => plugins_url() . '/sp-staff/assets/staff.png',
        'capability_type'           => 'post',
        'hierarchical'              => false,
        'taxonomy'                  => ['staff_type'],
        'supports'                  => [

            // Uncomment what you want to use

            'title',
            'editor',
            //'author',
            // 'thumbnail',
            'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'comments',
            'revisions',
            'page-attributes',
            //'post-formats'

        ],
        'has_archive'               => false,
        'rewrite'                   => [
            'slug'                  => 'about/our-staff',
            'with_front'            => false,
            'feeds'                 => false,
            'pages'                 => true,
        ],
        'delete_with_user'          => false,
    ]);
}

add_action( 'init', 'sp_create_posttype_staff');

function sp_staff_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    sp_create_posttype_staff();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'sp_staff_rewrite_flush' );

function sp_staff_admin_style() {
    wp_enqueue_style('admin-styles', plugins_url().'/sp-staff/assets/admin.css');
  }

add_action('admin_enqueue_scripts', 'sp_staff_admin_style');