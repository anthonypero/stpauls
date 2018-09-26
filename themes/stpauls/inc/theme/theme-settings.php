<div class="wrap theme-options theme-options-settings">
    <h1>Theme Options</h1>

    <?php settings_errors(); ?>

    <form action="options.php" method="post">

        <?php settings_fields( 'footer_message' ); ?>

        <?php do_settings_sections( 'sp_theme_options' ); ?>
        <?php submit_button(); ?>

    </form>
</div>