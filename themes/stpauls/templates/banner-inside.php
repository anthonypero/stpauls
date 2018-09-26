<?php
// Banner Region Template

if ( has_post_thumbnail( get_the_ID() ) ) {

    $featured_image = get_the_post_thumbnail_url( $post->ID, 'sp_banner' );

} else {

    $featured_image = get_option('default_featured_image');

}

?>

<div class="featured-image" style="background-image: url('<?php echo $featured_image; ?>')"></div>