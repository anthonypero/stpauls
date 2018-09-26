<footer class="site-footer">

<div class="site-footer__logo">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 308.36 320.71">
        <path d="M201.59,12c19.7,18.7.43,40.78,9.09,45.48,12.13,6.56,33.76-53.91,47-56.62C265.62-.76,301.4-.3,298.09,3.93c-1.92,2.45-17.69,23.75-19.71,37.89-1.07,7.5-.09,18.51-6.57,29.31-6.06,10.1-18.16,23.73-13.31,31.51,5.23,8.4,41.87-4.9,47.17,16,23,90.91-109.13,202.09-109.13,202.09S218.8,238,207.27,190.92c-12.25-50.07-25.68-29.56-49.79,5-20.8,29.81-41.78,49-60,50-41.43,2.52-60.63,18.69-67.8,24-8.82,6.56-9-1.46-.41-14.94,20.61-32.18,80.36-102.81,98.52-125.3,5.59-6.91,12.54-12.63,3.21-26.2-3.08-4.48,5.9-15-8.52-18C59.9,72.17,0,33.23,0,33.23s75.61-.41,124-9C162.93,17.32,193.28,4.13,201.59,12Z"/>
    </svg>
</div>

<div class="site-footer__church-info">
    <h1 class="church-name"><?php bloginfo('name'); ?></h1>
    <address class="church-address">
        <a href="<?php if (get_option('social_google_maps')) : echo get_option('social_google_maps'); endif; ?>">
        <?php echo get_option('location_address'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;
        <?php echo get_option('location_city'); ?>, <?php echo get_option('location_state'); ?> <?php echo get_option('location_zip'); ?></a>&nbsp;&nbsp;/&nbsp;&nbsp;
        <?php echo get_option('location_phone'); ?>
    </address>
    <div class="church-hours"><?php echo get_option('footer_message'); ?></div>
</div>

<div class="site-footer__social">
    <h2 class="menu-label hidden">Social Media Links</h2>
    <ul class="list site-footer__social--list">

        <?php if ( get_option( 'social_facebook' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_facebook'); ?>" class="list--link site-footer__social--list--link facebook" title="Friend us on Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php if ( get_option( 'social_twitter' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_twitter'); ?>" class="list--link site-footer__social--list--link twitter" title="Follow us on Twitter">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php if ( get_option( 'social_linkedin' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_linkedin'); ?>" class="list--link site-footer__social--list--link linkedin" title="Add us on LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php if ( get_option( 'social_instagram' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_instagram'); ?>" class="list--link site-footer__social--list--link instagram" title="Follow us on Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php if ( get_option( 'social_youtube' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_youtube'); ?>" class="list--link site-footer__social--list--link youtube" title="Watch us on youtube">
                <i class="fab fa-youtube"></i>
            </a>
        </li>
        <?php endif; ?>

        <?php if ( get_option( 'social_google_maps' ) ) : ?>
        <li class="list--item site-footer__social--list--item">
            <a href="<?php echo get_option('social_google_maps'); ?>" class="list--link site-footer__social--list--link google-maps" title="Find us on Google Maps">
                <i class="fas fa-map-marker-alt"></i>
            </a>
        </li>
        <?php endif; ?>

    </ul>
</div>
</footer>

</div>

<footer class="virtuosic-footer">
Site Designed and Developed by <a href="https://virtuosic.me">Virtuosic Media</a>. All rights reserved.
</footer>