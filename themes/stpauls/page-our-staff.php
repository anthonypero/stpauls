<?php get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content">

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

                <section class="staff page-content">

                    <a name="clergy"></a>

                    <div class="staff__group staff__group--clergy">

                        <h2 class="staff__group--title">Our Clergy</h2>
                        <?php if ( term_description( 3, 'staff_type' ) ) : ?>
                        <div class="staff-type__description">
                            <?php echo term_description( 3, 'staff_type'); ?>
                        </div>
                        <?php endif; ?>

                        <?php $query = new WP_Query([
                            'post_type'         => 'staff',
                            'posts_per_page'    => -1,
                            'tax_query'         => [[
                                'taxonomy'      => 'staff_type',
                                'field'         => 'slug',
                                'terms'         => 'clergy'
                            ]],
                            'orderby'           => 'menu_order',
                            'order'             => 'ASC',
                        ]);

                        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                        
                        ?>

                        <?php get_template_part('templates/excerpt', 'staff'); ?>

                        <?php endwhile; endif; wp_reset_postdata(); ?>

                    </div>

                    <a name="staff"></a>

                    <div class="staff__group staff__group--staff">

                        <h2 class="staff__group--title">Our Staff</h2>
                        <?php if ( term_description( 4, 'staff_type' ) ) : ?>
                        <div class="staff-type__description">
                            <?php echo term_description( 4, 'staff_type'); ?>
                        </div>
                        <?php endif; ?>

                        <?php $query = new WP_Query([
                            'post_type'         => 'staff',
                            'posts_per_page'    => -1,
                            'tax_query'         => [[
                                'taxonomy'      => 'staff_type',
                                'field'         => 'slug',
                                'terms'         => 'staff'
                            ]],
                            'orderby'           => 'menu_order',
                            'order'             => 'ASC',
                        ]);

                        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                        
                        ?>

                        <?php get_template_part('templates/excerpt', 'staff'); ?>

                        <?php endwhile; endif; wp_reset_postdata(); ?>

                    </div>

                    <a name="vestry"></a>

                    <div class="staff__group staff__group--vestry">

                        <h2 class="staff__group--title">Our Vestry</h2>
                        <?php if ( term_description( 2, 'staff_type' ) ) : ?>
                        <div class="staff-type__description">
                            <?php echo term_description( 2, 'staff_type'); ?>
                        </div>
                        <?php endif; ?>

                        <?php $query = new WP_Query([
                            'post_type'         => 'staff',
                            'posts_per_page'    => -1,
                            'tax_query'         => [[
                                'taxonomy'      => 'staff_type',
                                'field'         => 'slug',
                                'terms'         => 'vestry'
                            ]],
                            'orderby'           => 'menu_order',
                            'order'             => 'ASC',
                        ]);

                        if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
                        
                        ?>

                        <?php get_template_part('templates/excerpt', 'staff'); ?>

                        <?php endwhile; endif; wp_reset_postdata(); ?>

                    </div>
                    
                </section>

            </section>

            
            <?php if ( is_active_sidebar( 'single_sidebar' ) || has_children() ) : ?>
            <section class="sidebar">

                <?php get_sidebar(); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>
