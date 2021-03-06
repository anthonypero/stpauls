<?php
/*
  Plugin Name: St. Paul's News Articles
  Description: Custom News Post Type
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

function sp_create_posttype_article() {
    // Register Custom Post Type
    register_post_type( 'article', [
        'labels'                    => [
            'name'                  => 'Articles',
            'singular_name'         => 'Article',
            'add_new'               => 'Add New Article',
            'add_new_item'          => 'Add New Article',
            'edit_item'             => 'Edit Article',
            'new_item'              => 'New Article',
            'view_item'             => 'View Article',
            'view_items'            => 'View Articles',
            'search_items'          => 'Search Articles',
            'not_found'             => 'No Articles Found',
            'not_found_in_trash'    => 'No Articles found in Trash',
            'parent_item_colon'     => 'Parent:',
            'all_items'             => 'All Articles',
            'archives'              => 'News Archives',
            'attributes'            => 'Article Attributes',
            'uploaded_to_this_item' => 'Uploaded to this Article',
            'insert_into_item'      => 'Insert into Article',
            'featured_image'        => 'Featured Image for this Article',
            'menu_name'             => 'News',
        ],
        'public'                    => true,
        'menu_position'             => 20,
        'menu_icon'                 => plugins_url() . '/sp-articles/assets/news.png',
        'capability_type'           => 'post',
        'hierarchical'              => false,
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
            //'page-attributes',
            //'post-formats'

        ],
        'has_archive'               => false,
        'taxonomies'                => [ 'category', 'post_tag' ],
        // 'rewrite'                   => [
        //     'slug'                  => 'archive/news',
        //     'with_front'            => false,
        //     'feeds'                 => true,
        //     'pages'                 => true,
        // ],
        'delete_with_user'          => false,
    ]);
}

add_action( 'init', 'sp_create_posttype_article');

function sp_articles_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    sp_create_posttype_article();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'sp_articles_rewrite_flush' );

function sp_news_admin_style() {
    wp_enqueue_style('admin-styles', plugins_url().'/sp-articles/assets/admin.css');
  }

add_action('admin_enqueue_scripts', 'sp_news_admin_style');