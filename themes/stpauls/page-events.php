<?php

get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content <?php if ( ! is_active_sidebar( 'single_sidebar' )) : ?> empty-sidebar<?php endif; ?>">

        <?php if ( sp_page_is_in_menu('main-menu') ) : ?>
        <?php get_template_part('templates/breadcrumb'); ?>
        <?php endif; ?>

        <div class="flexwrapper gutter__top gutter__bottom gutter__left gutter__right">

            <section class="main-content">

                <article class="page-content">

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <h1 class="page-title"><?php the_title(); ?></h1>

                    <div class="page-body">
                        <?php the_content(); ?>
                    </div>

                    <?php endwhile; endif; ?>

                </article>

                <aside class="excerpt-list">

                <?php // Loop through child pages

                    $now = date('Ymd');
                    $paged = get_query_var( 'paged' );
                    $args = [
                        'post_type'         => 'event',
                        'posts_per_page'    => 5,
                        'paged'             => $paged,
                        'order'             => 'ASC',
                        'orderby'           => 'meta_value',
                        'meta_key'          => 'event_date',
                        'meta_type'         => 'DATETIME',
                        'meta_query'        => array(
                            array(
                                'key'       => 'event_date',
                                'compare'   => '>',
                                'value'     => $now,
                                'type'      => 'DATETIME'
                            ),
                        ),
                    ];

                    $query = new WP_Query( $args ); 
                    
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                    
                    ?>
                    
                    <div class="page-content">
                        
                        <?php get_template_part('templates/excerpt', 'event'); ?>

                    </div>

                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php echo paginate_links([
                            'total'         => $query->max_num_pages,
                            'prev_text'     => __('«'),
                            'next_text'     => __('»'),
                        ]); ?>
                    </div>

                    <?php endif; /* Closes $query->have_posts() */ ?>

                </aside>

            </section>

            <?php if ( is_active_sidebar( 'single_sidebar' ) || has_children() ) : ?>
            <section class="sidebar">

                <?php get_sidebar(); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>
