<?php /* Template Name: Site Section */

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

                <?php if ( is_parent() ) : ?>

                <aside class="excerpt-list">

                <?php // Loop through child pages

                    $args = [
                        'post_type'         => 'page',
                        'posts_per_page'    => -1,
                        'post_parent'       => $post->ID,
                        'order'             => 'ASC',
                        'orderby'           => 'menu_order'
                    ];

                    $query = new WP_Query( $args ); 
                    
                    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
                    
                    <div class="page-content">

                        <?php get_template_part('templates/excerpt'); ?>

                    </div>

                    <?php endwhile; ?>

                    <?php endif; wp_reset_postdata(); ?>

                </aside>

                <?php endif; ?>

            </section>

            <?php if ( is_active_sidebar( 'single_sidebar' ) || has_children() ) : ?>
            <section class="sidebar">

                <?php get_sidebar(); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>
