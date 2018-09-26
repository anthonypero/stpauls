<?php 

get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content">

        <?php if ( sp_page_is_in_menu('main-menu') ) : ?>
        <?php get_template_part('templates/breadcrumb'); ?>
        <?php endif; ?>

        <div class="flexwrapper gutter__top gutter__bottom gutter__left gutter__right">

            <section class="main-content">

                <div class="page-content">

                    <h1 class="page-title"><?php echo get_the_archive_title(); ?></h1>

                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); 
                    
                    $post_type = get_post_type();
                    
                    ?>

                    <div class="excerpt-list">

                        <?php get_template_part('templates/excerpt', $post_type); ?>

                    </div>

                    <?php endwhile; else : ?>
                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>

                </div>

                <div class="pagination">
                        <?php echo paginate_links([
                            'prev_text'     => __('«'),
                            'next_text'     => __('»'),
                        ]); ?>
                    </div>
            </section>

        </div>
    </main>

    <?php get_footer(); ?>
