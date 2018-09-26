<div class="wrap theme-options theme-options-social">
    <h1>Theme Options</h1>

    <?php settings_errors(); ?>

    <form action="options.php" method="post">

        <?php settings_fields( 'social_facebook' ); ?>

        <?php do_settings_sections( 'sp_theme_options_social' ); ?>
        <?php submit_button(); ?>

    </form>
</div>