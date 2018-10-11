<article class="excerpt-list__row staff__member">

<?php
// Get variables
$staff_portrait = get_field('staff_portrait');

?>
<?php if ( $staff_portrait ) : ?>
    <div class="staff__member--photo excerpt-list__row--post-image">
        <img src="<?php echo $staff_portrait['sizes']['sp_thumb']; ?>" />
        <div class="staff__member--contact">

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

            <?php if ( get_field( 'staff_contact_form_id' ) ) : ?>
            <div class="staff__member--contact__item contact">
                <a href="<?php the_permalink(); ?>#contact-form" title="Send an Email">
                    <i class="far fa-envelope-open"></i>
                    <span class="hidden label">Send an Email</span>
                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>

<?php endif; ?>

    <div class="staff__member--info excerpt-list__row--info">

        <h3 class="staff__member--name">
            <a href="<?php the_permalink(); ?>" title="Read more about <?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
            <span class="staff__member--position"> / <?php echo get_field( 'staff_position' ); ?></span>
        </h3>

        <?php if ( get_field( 'staff_facebook' ) ) : ?>
        <div class="staff__member--phone">
            <i class="fas fa-phone-square"></i>
            <?php echo get_field( 'staff_phone_number' ); ?>
        </div>
        <?php endif; ?>

        <div class="staff__member--bio"><?php the_excerpt(); ?></div>

        <div class="staff__member--footer">
            
            <div class="staff__member--readmore">
                <a href="<?php the_permalink(); ?>" title="Read more about <?php the_title(); ?>">
                    Read More
                </a>
            </div>
        </div>
    </div>

</article>