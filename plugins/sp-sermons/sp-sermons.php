<?php
/*
  Plugin Name: St. Paul's Sermons
  Description: Custom Sermon Post Type
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

function sp_create_posttype_sermon() {
    // Register Custom Post Type
    register_post_type( 'sermon', [
        'labels'                    => [
            'name'                  => 'Sermons',
            'singular_name'         => 'Sermon',
            'add_new'               => 'Add New Sermon',
            'add_new_item'          => 'Add New Sermon',
            'edit_item'             => 'Edit Sermon',
            'new_item'              => 'New Sermon',
            'view_item'             => 'View Sermon',
            'view_items'            => 'View Sermons',
            'search_items'          => 'Search Sermons',
            'not_found'             => 'No Sermons Found',
            'not_found_in_trash'    => 'No Sermons found in Trash',
            'parent_item_colon'     => 'Parent:',
            'all_items'             => 'All Sermons',
            'archives'              => 'Sermon Archive',
            'attributes'            => 'Sermon Attributes',
            'uploaded_to_this_item' => 'Uploaded to this Sermon',
            'insert_into_item'      => 'Insert into Sermon',
            'featured_image'        => 'Featured Image for this Sermon',
            'menu_name'             => 'Sermons',
        ],
        'public'                    => true,
        'menu_position'             => 20,
        'menu_icon'                 => plugins_url() . '/sp-sermons/assets/sermons.png',
        'capability_type'           => 'post',
        'hierarchical'              => false,
        'supports'                  => [

            // Uncomment what you want to use

            'title',
            // 'editor',
            //'author',
            // 'thumbnail',
            'excerpt',
            //'trackbacks',
            //'custom-fields',
            //'comments',
            'revisions',
            //'page-attributes',
            //'post-formats'

        ],
        'has_archive'               => true,
        'taxonomies'                => [ 'category', 'post_tag' ],
        'rewrite'                   => [
            'slug'                  => 'connect/sermons',
            'with_front'            => false,
            'feeds'                 => true,
            'pages'                 => true,
        ],
        'delete_with_user'          => false,
    ]);
}

add_action( 'init', 'sp_create_posttype_sermon');

function sp_sermons_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    sp_create_posttype_sermon();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'sp_sermons_rewrite_flush' );

function sp_sermon_admin_style() {
    wp_enqueue_style('admin-styles', plugins_url().'/sp-sermons/assets/admin.css');
  }

add_action('admin_enqueue_scripts', 'sp_sermon_admin_style');