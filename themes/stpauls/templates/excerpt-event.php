<article class="excerpt-list__row event">

    <div class="flex">

    <?php 
    
    $post_image = get_field( 'post_image' );
    $date = get_field( 'event_date' );
    $time = get_field( 'event_time' );
    $timestamp = strtotime($date);

    $location_name = get_field( 'location_name' );
    $street_address = get_field( 'location_street_address' );
    $city = get_field( 'location_city' );
    $state = get_field( 'location_state' );
    $zip = get_field( 'location_zip' );

    if ($time) {
        $event_date = date( 'F jS, Y', $timestamp);
        $event_date .= ' at ' . $time;
    } else {
        $event_date = date( 'F jS, Y', $timestamp);
    }
    
    ?>


    
        <div class="excerpt-list__row--post-image">

            <?php if ( !empty($post_image) ) : ?>

            <picture>

                <source media="(min-width: 1200px)" srcset="<?php echo $post_image['sizes']['sp_3x2_sm']; ?>">
                <source media="(min-width: 768px)" srcset="<?php echo $post_image['sizes']['sp_3x2_md']; ?>">
                <img src="<?php echo $post_image['sizes']['sp_3x2_sm']; ?>" alt="<?php echo $post_image['alt']; ?>" />

            </picture>

            <?php endif; /* Closes !empty($post_image) */ ?>

            <div class="excerpt-list__row--event-info">
                <h3 class="box-heading">Event Information</h3>
                <div class="excerpt-list__row--date">
                    <div class="excerpt-list__row--label">When:</div>
                    <div class="excerpt-list_row--value"><?php echo $event_date; ?></div>
                </div>
                <div class="excerpt-list__row--location">
                    <div class="excerpt-list__row--label">Where:</div>
                    <div class="excerpt-list_row--value">
                        
                        <?php 
                            echo $location_name;
                            if ( $street_address ) { echo '<br />' . $street_address; }
                            if ( $city ) { echo '<br />' . $city; }
                            if ( $state ) { echo ',&nbsp;' . $state; }
                            if ( $zip ) { echo '&nbsp;' . $zip; }
                        
                        
                        ?>
                
                    </div>
                </div>
            </div>

            
        </div>  

        <div class="excerpt-list__row--info">

            <div class="excerpt-list__row--title header">
                <h2 class="excerpt-list__row--title">
                    <a href="<?php the_permalink(); ?>" class="excerpt-list__row--link" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>

                <?php get_template_part('templates/submitted', 'events'); ?>
            </div>

            <?php the_content(); ?>

            <a href="<?php the_permalink(); ?>" class="excerpt-list__row--readmore btn btn--blue">Read More</a>

        </div>

    </div>

</article> 