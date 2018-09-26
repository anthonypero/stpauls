<?php
/*
  Plugin Name: St. Paul's Content Support Settings
  Description: Custom Content Support Settings
  Version: 1.0
  Author: Anthony Pero
  Author URI: http://anthonypero.me
*/

// Add support for Excerpts in Pages
add_post_type_support( 'page', 'excerpt' );