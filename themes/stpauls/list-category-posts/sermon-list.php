<?php
/*
Plugin Name: List Category Posts - Template "Default"
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano
Author URI: http://picandocodigo.net http://radoviny.net
*/

/*
Copyright 2009 Radek Uldrych (email : verex@centrum.cz)
Copyright 2009-2015 Fernando Briano (http://picandocodigo.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any
later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301
USA
*/

/**
* The format for templates changed since version 0.17.  Since this
* code is included inside CatListDisplayer, $this refers to the
* instance of CatListDisplayer that called this file.
*/

/* This is the string which will gather all the information.*/
$lcp_display_output = '';

//Add 'starting' tag. Here, I'm using an unordered list (ul) as an example:
$lcp_display_output .= '<section class="lcp_catlist list sermon-list excerpt-list"><div class="page-content">';

/* Posts Loop
 *
 * The code here will be executed for every post in the category.  As
 * you can see, the different options are being called from functions
 * on the $this variable which is a CatListDisplayer.
 *
 * CatListDisplayer has a function for each field we want to show.  So
 * you'll see get_excerpt, get_thumbnail, etc.  You can now pass an
 * html tag as a parameter. This tag will sorround the info you want
 * to display. You can also assign a specific CSS class to each field.
*/
global $post;
while ( have_posts() ):
  the_post();

  // Start an article for each post:
  $lcp_display_output .= '<article class="excerpt-list__row flex">';

  $post_image = get_field('post_image'); 
  $audio = get_field('sermon_audio_upload');

  // Print the image if it exists
    
  if ( !empty($post_image) ) {

    $lcp_display_output .= '<div class="excerpt-list__row--post-image">';
    $lcp_display_output .=    '<picture>';
    $lcp_display_output .=      '<source media="(min-width: 1200px)" srcset="' . $post_image['sizes']['sp_3x2_sm'] . '">';
    $lcp_display_output .=      '<source media="(min-width: 768px)" srcset="' . $post_image['sizes']['sp_3x2_md'] . '">';
    $lcp_display_output .=      '<img src="' . $post_image['sizes']['sp_3x2_sm'] . '" alt="' . $post_image['alt'] . '" />';
    $lcp_display_output .=    '</picture>';
    $lcp_display_output .= '</div>';

  }

  // The Post Info block
  $lcp_display_output .= '<div class="excerpt-list__row--info">';

  // Display the title
  $lcp_display_output .=    '<h2 class="excerpt-list__row--title">';
  $lcp_display_output .=      '<a href="' . get_the_permalink() . '" class="excerpt-list__row--link" title="' . get_the_title() . '">' . get_the_title() . '</a>';
  $lcp_display_output .=    '</h2>';

  // Post Date
  $lcp_display_output .=    '<div class="submitted">' . get_the_date( 'F jS, Y' ) . '</div>';
  $lcp_display_output .=    '<p>' . get_the_excerpt() . '</p><p></p>';

if ($audio) {
  $lcp_display_output .=    '<audio controls><source src="' . $audio . '" type="audio/mpeg"></audio>';
}
  $lcp_display_output .= '</div>';



  //Close li tag
  $lcp_display_output .= '</article>';
endwhile;

// Close the wrapper I opened at the beginning:
$lcp_display_output .= '</div></section>';

//Pagination
$lcp_display_output .= '<div class="pagination">' . $this->get_pagination() . '</div>';

$this->lcp_output = $lcp_display_output;