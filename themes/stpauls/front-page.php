<?php // Front Page Template

get_header('front'); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} ?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content <?php if (!dynamic_sidebar( 'single_sidebar' )) : ?> empty-sidebar<?php endif; ?>">

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

            <?php if ( is_active_sidebar( 'fp_sidebar' ) ) : ?>
            <section class="sidebar fp-sidebar">

                <?php get_sidebar( 'fp' ); ?>

            </section><!-- /.sidebar -->
            <?php endif; ?>

        </div>
    </main>

    <?php if ( is_active_sidebar( 'fp_post_content' ) ) : ?>

    <section class="gutter__top gutter__bottom gutter__left gutter__right post-content">

        <div class="flexwrapper gutter__top  gutter__left gutter__right">

            <?php dynamic_sidebar( 'fp_post_content' ); ?>

        </div>

    </section>

    <?php endif; ?>

    <?php get_footer('front'); ?>
