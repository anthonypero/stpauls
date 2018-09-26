<?php
/*
  Plugin Name: St. Paul's Admin Theme Tweaks
  Description: Custom Admin Theme Tweaks
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

function sp_load_admin_styles() {
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css', '', '5.2', 'all');
  wp_enqueue_style('admin-overrides', plugins_url() . '/sp-admin-tweaks/assets/admin.css', '', time(), 'all');
}
 
add_action('admin_init', 'sp_load_admin_styles');

function sp_load_admin_scripts($hook) {
  if ('toplevel_page_sp_theme_options' != $hook) {
    return;
  }
  wp_enqueue_script('admin-social-js', plugins_url() . '/sp-admin-tweaks/assets/theme-settings.js', ['jquery'], time(), true);
  wp_enqueue_media();

}

add_action('admin_enqueue_scripts', 'sp_load_admin_scripts');