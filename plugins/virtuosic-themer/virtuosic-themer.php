<?php
/*
  Plugin Name: Virtuosic Themer
  Description: Adds a floating pallette that identifies the currently loaded template
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

function virtuosic_add_theme_info() {

    function virtuosic_theme_info() {
        $file = debug_backtrace();
        $file = $file[0]['file'];
        $file = substr(strrchr($file, '/'), 1);

        $theme_info = '<div class="theme--message">';
        $theme_info .= $file;
        $theme_info .= '</div>';

        echo $theme_info;
    }

}

add_action('init', 'virtuosic_add_theme_info');

function virtuosic_add_vti_css() {
    wp_enqueue_style('vti-css', plugins_url('assets/vti.css', __FILE__), [], '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'virtuosic_add_vti_css');