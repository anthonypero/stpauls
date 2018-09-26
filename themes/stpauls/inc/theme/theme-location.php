<div class="wrap theme-options theme-options-location">
    <h1>Theme Options</h1>

    <?php settings_errors(); ?>

    <form action="options.php" method="post">

        <?php settings_fields( 'location_address' ); ?>

        <?php do_settings_sections( 'sp_theme_options_location' ); ?>
        <?php submit_button(); ?>

    </form>
</div>