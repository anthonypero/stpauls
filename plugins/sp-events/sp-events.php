<?php
/*
  Plugin Name: St. Paul's Events
  Description: Custom Event Post Type
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

function sp_create_posttype_event() {
    // Register Custom Post Type
    register_post_type( 'event', [
        'labels'                    => [
            'name'                  => 'Events',
            'singular_name'         => 'Event',
            'add_new'               => 'Add New Event',
            'add_new_item'          => 'Add New Event',
            'edit_item'             => 'Edit Event',
            'new_item'              => 'New Event',
            'view_item'             => 'View Event',
            'view_items'            => 'View Events',
            'search_items'          => 'Search Events',
            'not_found'             => 'No Events Found',
            'not_found_in_trash'    => 'No Events found in Trash',
            'parent_item_colon'     => 'Parent:',
            'all_items'             => 'All Events',
            'archives'              => 'Event Archives',
            'attributes'            => 'Event Attributes',
            'uploaded_to_this_item' => 'Uploaded to this Event',
            'insert_into_item'      => 'Insert into Event',
            'featured_image'        => 'Featured Image for this Event',
            'menu_name'             => 'Events',
        ],
        'public'                    => true,
        'menu_position'             => 20,
        'menu_icon'                 => 'dashicons-calendar-alt',
        'capability_type'           => 'post',
        'hierarchical'              => false,
        'supports'                  => [

            // Uncomment what you want to use

            'title',
            'editor',
            // 'author',
            // 'thumbnail',
            'excerpt',
            // 'trackbacks',
            // 'custom-fields',
            // 'comments',
            'revisions',
            // 'page-attributes',
            // 'post-formats'

        ],
        'has_archive'               => false,
        'taxonomies'                => [ 'category', 'post_tag' ],
        // 'rewrite'                   => [
        //     'slug'                  => 'events',
        //     'with_front'            => false,
        //     'feeds'                 => true,
        //     'pages'                 => true,
        // ],
        'delete_with_user'          => false,
    ]);
}

add_action( 'init', 'sp_create_posttype_event');

function sp_events_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    sp_create_posttype_event();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'sp_events_rewrite_flush' );