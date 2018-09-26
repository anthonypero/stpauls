<?php get_header(); 

if ( function_exists('virtuosic_theme_info') ) {
    virtuosic_theme_info();
} 

// Variable

$staff_portrait = get_field( 'staff_portrait' );

?>

    <main class="gutter__top gutter__bottom gutter__left gutter__right site-content">

        <div class="breadcrumbs gutter__left gutter__right">
            <h2 class="menu-label hidden">You Are Here:</h2>
            <div class="breadcrumbs__trail">
                <span class="breadcrumbs__trail--item"><a href="<?php bloginfo('url'); ?>" class="breadcrumbs__trail--link">Home</a></span>
                <span class="breadcrumbs__trail--item"><a href="<?php echo get_the_permalink( '58' ); ?>" class="breadcrumbs__trail--link"><?php echo get_the_title( '58' ); ?></a></span>
                <span class="breadcrumbs__trail--item"><a href="<?php echo get_the_permalink( '74' ); ?>" class="breadcrumbs__trail--link"><?php echo get_the_title( '74' ); ?></a></span>
                <span class="breadcrumbs__trail--item"><?php echo get_the_title(); ?></span>
            </div>
        </div>

        <div class="flexwrapper gutter__top gutter__bottom gutter__left gutter__right">

            <section class="main-content staff page-content">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <h1 class="page-title"><?php the_title(); ?>
                <span class="staff__member--position"> / <?php echo get_field( 'staff_position' ); ?></span>
                </h1>

                <article class="page-content">

                    <aside class="staff__photo">

                        <img src="<?php echo $staff_portrait['sizes']['sp_2x3_md']; ?>" />
                        <div class="staff__member--contact staff__contact">

                            <?php if ( get_field( 'staff_facebook' ) ) : ?>
                            <div class="staff__member--contact__item facebook">
                                <a href="<?php echo get_field( 'staff_facebook' ); ?>" title="Follow on Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    <span class="hidden label">Follow on Facebook</span>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if ( get_field( 'staff_twitter' ) ) : ?>
                            <div class="staff__member--contact__item twitter">
                                <a href="<?php echo get_field( 'staff_twitter' ); ?>" title="Follow on twitter">
                                    <i class="fab fa-twitter"></i>
                                    <span class="hidden label">Follow on Twitter</span>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if ( get_field( 'staff_instagram' ) ) : ?>
                            <div class="staff__member--contact__item instagram">
                                <a href="<?php echo get_field( 'staff_instagram' ); ?>" title="Follow on instagram">
                                    <i class="fab fa-instagram"></i>
                                    <span class="hidden label">Follow on Instagram</span>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if ( get_field( 'staff_linkedin' ) ) : ?>
                            <div class="staff__member--contact__item linkedin">
                                <a href="<?php echo get_field( 'staff_linkedin' ); ?>" title="Follow on linkedin">
                                    <i class="fab fa-linkedin"></i>
                                    <span class="hidden label">Follow on LinkedIn</span>
                                </a>
                            </div>
                            <?php endif; ?>

                        </div>

                        <div class="staff__phone">
                            <i class="fas fa-phone-square"></i>
                            <?php echo get_field( 'staff_phone_number' ); ?>
                        </div>

                    </aside>


                    <div class="page-body">
                        <?php the_content(); ?>

                        <div class="staff__contact-form">
                            <h2 class="contact-form__header">Send a Message</h2>
                            <?php echo do_shortcode( '[wpforms id="' . get_field( 'staff_contact_form_id') . '"]' ); ?>
                        </div>

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
