<?php
// Banner Region Template

$featured_image = get_option('default_featured_image');
$lightslider_items = get_option( 'lightslider_items' );
?>

<div class="featured-image front">

<?php 

    $slides = new WP_Query([
        'post_type'             => ['article', 'event'],
        'post_status'           => 'publish',
        'posts_per_page'        => $lightslider_items,
        'meta_query'            => [
            'relationship'      => 'AND',
                [
                    'key'       => 'front_page_rotator',
                    'value'     => 'yes',
                ],
                [
                    'key'       => 'post_image',
                    'value'     => FALSE,
                    'compare'   => '!=',
                ],
        ],
    ]);

    if ( $slides->have_posts() ) : ?>
    
    <ul <?php if ( $lightslider_items > 1 ) echo 'id="lightSlider" '; ?>class="lightslider__list">
    
    <?php while ( $slides->have_posts() ) : $slides->the_post(); 

    $post_image = get_field( 'post_image' );
    $date = get_field( 'event_date' );
    $time = get_field( 'event_time' );
    $timestamp = strtotime($date);
    
    if ($time) {
        $event_date = date( 'F jS, Y', $timestamp);
        $event_date .= ' at ' . $time;
    } else {
        $event_date = date( 'F jS, Y', $timestamp);
    }
?>

        <li class="lightslider__list--item">

            <a href="<?php echo get_the_permalink(); ?>" class="slide" style="background-image: url('<?php echo $post_image['sizes']['sp_slider_lg']; ?>')">

                <div class="slide__info">
                    <div class="slide__top">
                        <h2 class="slide__title"><?php the_title(); ?></h2>
                        <?php if ( $post->post_type == 'event' ) : ?>
                        <div class="slide__event-date"><?php echo $event_date; ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="slide__excerpt">
                        <?php echo mb_strimwidth( get_the_excerpt(), 0, 450, '&hellip;' ); ?>
                    </div>
                </div>
            
            </a>
        </li>


<?php endwhile; ?>

    </ul>

<?php endif; wp_reset_postdata(); ?>
</div>
