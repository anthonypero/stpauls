<?php get_template_part('header', 'news'); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content">

        <div class="breadcrumbs gutter__left gutter__right">
            <h2 class="menu-label hidden">You Are Here:</h2>
            <div class="breadcrumbs__trail">
                <span class="breadcrumbs__trail--item">
                    <a href="<?php bloginfo('url'); ?>" class="breadcrumbs__trail--link">
                        Home
                    </a>
                </span>
                <span class="breadcrumbs__trail--item">
                    <a href="<?php echo get_site_url() . '/rectors-blog'; ?>" class="breadcrumbs__trail--link">
                        Rector's Blog
                    </a>
                </span>
                <span class="breadcrumbs__trail--item">
                    <?php echo get_the_title(); ?>
                </span>
            </div>
        </div>

        <div class="flexwrapper gutter__top gutter__bottom gutter__left gutter__right">

            <section class="main-content">

                <article class="page-content">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
                    
                    // Post variables

                    $post_image = get_field( 'post_image' );
                    $post_caption = get_field( 'post_image_caption' );
                    
                    ?>

                    <?php 
    
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

                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <?php get_template_part( 'templates/submitted', 'events' ); ?>

                    <div class="page-body">

                        <?php if ($post_image) : ?>

                        <div class="post-image">

                            <figure>

                                <picture>

                                    <source media="(min-width: 1200px)" srcset="<?php echo $post_image['sizes']['sp_large']; ?>">
                                    <source media="(min-width: 768px)" srcset="<?php echo $post_image['sizes']['sp_medium']; ?>">
                                    <img src="<?php echo $post_image['sizes']['sp_small']; ?>" alt="<?php echo $post_image['alt']; ?>" />

                                </picture>

                                <?php if ($post_caption) : ?>

                                <figcaption>
                                    <?php echo $post_caption; ?>
                                </figcaption>

                                <?php endif; /* closes if ($post_caption) */ ?>

                            </figure>
                            
                        </div>

                        <?php endif; /* closes if ($post_image) */ ?>

                        <div class="event">

                            <div class="event__info">
                                <h3 class="box-heading">Event Information</h3>
                                <div class="event__date">
                                    <div class="event__label">When:</div>
                                    <div class="event__value"><?php echo $event_date; ?></div>
                                </div>
                                <div class="event__location">
                                    <div class="event__label">Where:</div>
                                    <div class="event__value">
                                        
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

                            <div class="event__description"><?php the_content(); ?></div>
                        </div><!-- /.event -->

                    </div><!-- /.page-body -->

                    <?php endwhile; endif; /* closes The Loop */ ?>

                </article>
            </section>

            
            <?php if ( is_active_sidebar( 'single_sidebar' ) || has_children() ) : ?>
            <section class="sidebar">

                <?php get_sidebar(); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>
