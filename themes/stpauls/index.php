<?php get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content">

        <?php get_template_part('templates/breadcrumb'); ?>

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
            </section>

            
            <?php if ( is_active_sidebar( 'single_sidebar' ) || has_children() ) : ?>
            <section class="sidebar">

                <?php get_sidebar(); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php get_footer(); ?>
