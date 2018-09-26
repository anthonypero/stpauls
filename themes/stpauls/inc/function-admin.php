<?php

/**
 * Admin Page Functions
 */

function sp_add_theme_options() {

    // Add Theme Options Section to Admin Menu
    add_menu_page( 
        'Theme Options', 
        'Theme Options', 
        'manage_options', 
        'sp_theme_options', 
        'sp_add_theme_options_page', 
        get_template_directory_uri() . '/images/template-icon.png' 
    );

    // Add Settings Page
    add_submenu_page( 
        'sp_theme_options', 
        'Theme Options', 
        'Settings', 
        'manage_options', 
        'sp_theme_options', 
        'sp_add_theme_options_page' 
    );

    // Add Location Page
    add_submenu_page( 
        'sp_theme_options', 
        'Theme Location Options', 
        'Location Information', 
        'manage_options', 
        'sp_theme_options_location', 
        'sp_add_location_page' 
    );

    // Add Social Media Links Page
    add_submenu_page( 
        'sp_theme_options', 
        'Theme Social Media Options', 
        'Social Media Links', 
        'manage_options', 
        'sp_theme_options_social', 
        'sp_add_social_links_page' 
    );

    // Add Social Media Links Page
    add_submenu_page( 
        'sp_theme_options', 
        'Theme LightSlider Options', 
        'Front Page Slider', 
        'manage_options', 
        'sp_theme_options_lightslider', 
        'sp_add_lightslider_options_page'
    );

    // Activate custom theme settings to save in the database
    add_action( 'admin_init', 'sp_custom_settings' );
}

// Hooks page creaton function into admin_menu
add_action( 'admin_menu', 'sp_add_theme_options' );

// Register custom theme settings in the database
function sp_custom_settings() {

    // Settings Page
    add_settings_section( 'sp-settings', 'Basic Settings', 'sp_settings', 'sp_theme_options' );

    register_setting( 'footer_message', 'header_logo');
    add_settings_field( 'sp-settings-header-logo', 'Header Logo', 'sp_settings_header_logo', 'sp_theme_options', 'sp-settings' );

    register_setting( 'footer_message', 'default_featured_image');
    add_settings_field( 'sp-settings-default-featured-image', 'Default Feature Image', 'sp_settings_default_featured_image', 'sp_theme_options', 'sp-settings' );

    register_setting( 'footer_message', 'sp_site_icon');
    add_settings_field( 'sp-settings-site-icon', 'Site Icon', 'sp_settings_site_icon', 'sp_theme_options', 'sp-settings' );

    register_setting( 'footer_message', 'footer_message' );
    add_settings_field( 'sp-settings-footer-message', 'Footer Message', 'sp_settings_footer_message', 'sp_theme_options', 'sp-settings' );

    // Location Page
    add_settings_section( 'sp-locations', 'Location Information', 'sp_locations', 'sp_theme_options_location' );

    register_setting( 'location_address', 'location_address' );
    add_settings_field( 'sp-locations-street-address', 'Street Address', 'sp_locations_street_address', 'sp_theme_options_location', 'sp-locations' );

    register_setting( 'location_address', 'location_city' );
    add_settings_field( 'sp-locations-city', 'City', 'sp_locations_city', 'sp_theme_options_location', 'sp-locations' );

    register_setting( 'location_address', 'location_state' );
    register_setting( 'location_address', 'location_zip' );
    add_settings_field( 'sp-locations-state-zip', 'State & Zip Code', 'sp_locations_state_zip', 'sp_theme_options_location', 'sp-locations' );

    register_setting( 'location_address', 'location_phone' );
    add_settings_field( 'sp-locations-phone', 'Phone Number', 'sp_locations_phone', 'sp_theme_options_location', 'sp-locations' );

    // Social Links Page
    add_settings_section( 'sp-social', 'Social Media Links', 'sp_social', 'sp_theme_options_social' );

    register_setting( 'social_facebook', 'social_facebook' );
    add_settings_field( 'sp-social-facebook', '<i class="fab fa-facebook-f"></i> Facebook Page', 'sp_social_facebook', 'sp_theme_options_social', 'sp-social' );

    register_setting( 'social_facebook', 'social_twitter' );
    add_settings_field( 'sp-social-twitter', '<i class="fab fa-twitter"></i> Twitter Profile', 'sp_social_twitter', 'sp_theme_options_social', 'sp-social' );

    register_setting( 'social_facebook', 'social_linkedin' );
    add_settings_field( 'sp-social-linkedin', '<i class="fab fa-linkedin-in"></i> LinkedIn Page', 'sp_social_linkedin', 'sp_theme_options_social', 'sp-social' );

    register_setting( 'social_facebook', 'social_youtube' );
    add_settings_field( 'sp-social-youtube', '<i class="fab fa-youtube"></i> Youtube Page', 'sp_social_youtube', 'sp_theme_options_social', 'sp-social' );

    register_setting( 'social_facebook', 'social_instagram' );
    add_settings_field( 'sp-social-instagram', '<i class="fab fa-instagram"></i> Instagram Page', 'sp_social_instagram', 'sp_theme_options_social', 'sp-social' );

    register_setting( 'social_facebook', 'social_google_maps' );
    add_settings_field( 'sp-social-google-maps', '<i class="fas fa-map-marker-alt"></i> Google Maps URL', 'sp_social_google_maps', 'sp_theme_options_social', 'sp-social' );

    // Light Slider Settings Page
    add_settings_section( 'sp-lightslider', 'Front Page Slider', 'sp_lightslider', 'sp_theme_options_lightslider' );

    register_setting( 'lightslider_items', 'lightslider_items' );
    add_settings_field( 'sp-lightslider-items', 'Number of Slides', 'sp_lightslider_items', 'sp_theme_options_lightslider', 'sp-lightslider' );

    register_setting( 'lightslider_items', 'lightslider_duration' );
    add_settings_field( 'sp-lightslider-duration', 'Duration', 'sp_lightslider_duration', 'sp_theme_options_lightslider', 'sp-lightslider' );

    register_setting( 'lightslider_items', 'lightslider_transition_speed' );
    add_settings_field( 'sp-lightslider-transition-speed', 'Transition Speed', 'sp_lightslider_transition_speed', 'sp_theme_options_lightslider', 'sp-lightslider' );

    register_setting( 'lightslider_items', 'lightslider_transition_type' );
    add_settings_field( 'sp-lightslider-transition-type', 'Transition type', 'sp_lightslider_transition_type', 'sp_theme_options_lightslider', 'sp-lightslider' );

}




// Stores Settings Page message in this function
function sp_settings() {
    echo 'Upload various images and icons here, and set the message displayed in the Footer.';
}

// Create Header Logo Upload
function sp_settings_header_logo() {
    $header_logo = get_option( 'header_logo' );
    echo    '<input 
                type="button" 
                class="button button-secondary" 
                id="upload-header-logo"
                value="Upload header logo"
            />';
    echo    '<input 
                type="hidden" 
                id="header-logo" 
                name="header_logo" 
                value="' . $header_logo . '" 
            />';
    if ($header_logo) {
        echo    '<div   id="header-logo-preview" 
                        class="image-thumb header-logo-thumb"
                        style="background-image: url(' . $header_logo .')"
                    >
                </div>';
    }
}

// Create Default Featured Image Upload
function sp_settings_default_featured_image() {
    $default_featured_image = get_option( 'default_featured_image' );
    echo    '<input 
                type="button" 
                class="button button-secondary" 
                id="upload-default-featured-image" 
                value="Upload default featured image"
            />';
    echo    '<input 
                type="hidden" 
                id="default-featured-image" 
                name="default_featured_image" 
                value="' . $default_featured_image . '" 
            />';
    if ($default_featured_image) {
        echo    '<div   id="default-featured-image-preview" 
                        class="image-thumb default-featured-image-thumb"
                        style="background-image: url(' . $default_featured_image .')"
                    >
                </div>';
    }
}

// Create Site Icon Upload
function sp_settings_site_icon() {
    $sp_site_icon = get_option( 'sp_site_icon' );
    echo    '<input 
                type="button" 
                class="button button-secondary" 
                id="upload-sp-site-icon" 
                value="Upload site icon" 
            />';
    echo    '<input 
                type="hidden" 
                id="sp-site-icon" 
                name="sp_site_icon" 
                value="' . $sp_site_icon . '" 
            />';
    if ($sp_site_icon) {
        echo    '<div   id="sp-site-icon-preview" 
                        class="image-thumb sp-site-icon-thumb" 
                        style="background-image: url(' . $sp_site_icon .')"
                    >
                </div>';
    }
}

// Create Footer Message Form Field
function sp_settings_footer_message() {
    $footer_message = esc_attr( get_option( 'footer_message' ) );
    echo    '<input 
                type="text" 
                name="footer_message" 
                value="' . $footer_message . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="Enter your footer message here."
            />';
}




// Stores Location Page message in this function
function sp_locations() {
    echo 'Add your location information with this form.';
}

// Create Street Address Form Field
function sp_locations_street_address() {
    $street_address = esc_attr( get_option( 'location_address' ) );
    echo    '<input 
                type="text" 
                name="location_address" 
                value="' . $street_address . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="7777 Pleasant Ave"
            />';
}

// Create City Form Field
function sp_locations_city() {
    $location_city = esc_attr( get_option( 'location_city' ) );
    echo    '<input 
                type="text" 
                name="location_city" 
                value="' . $location_city . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="Pleasantville"
            />';
}

// Create State & Zip Form Field
function sp_locations_state_zip() {
    $location_state = esc_attr( get_option( 'location_state' ) );
    echo    '<input 
                type="text" 
                name="location_state" 
                value="' . $location_state . '" 
                size="10" 
                placeholder="PA"
            />';
    
    $location_zip = esc_attr( get_option( 'location_zip' ) );
    echo    '<input 
                type="text" 
                name="location_zip" 
                value="' . $location_zip . '" 
                size="10" 
                placeholder="28052"
            />';
}

// Create Phone Number Form Field
function sp_locations_phone() {
    $location_phone = esc_attr( get_option( 'location_phone' ) );
    echo    '<input 
                type="text" 
                name="location_phone" 
                value="' . $location_phone . '" 
                size="20" 
                placeholder="(555) 555-5555"
            />';
}



// Stores Social Media Links Page message in this function
function sp_social() {
    echo 'Add your location information with this form.';
}

// Create Facebook Form Field
function sp_social_facebook() {
    echo    '<input 
                type="text" 
                name="social_facebook" 
                value="' . get_option('social_facebook') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="http://www.facebook.com/yourprofile"
            />';
}

// Create Twitter Form Field
function sp_social_twitter() {
    echo    '<input 
                type="text" 
                name="social_twitter" 
                value="' . get_option('social_twitter') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="http://www.twitter.com/yourprofile"
            />';
}

// Create LinkedIn Form Field
function sp_social_linkedin() {
    echo    '<input 
                type="text" 
                name="social_linkedin" 
                value="' . get_option('social_linkedin') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="http://www.linkedin.com/yourprofile"
            />';
}

// Create YouTube Form Field
function sp_social_youtube() {
    echo    '<input 
                type="text" 
                name="social_youtube" 
                value="' . get_option('social_youtube') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="http://www.youtube.com/yourprofile"
            />';
}

// Create Instagram Form Field
function sp_social_instagram() {
    echo    '<input 
                type="text" 
                name="social_instagram" 
                value="' . get_option('social_instagram') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="http://www.instagram.com/yourprofile"
            />';
}

// Create Google Mapes Form Field
function sp_social_google_maps() {
    echo    '<input 
                type="text" 
                name="social_google_maps" 
                value="' . get_option('social_google_maps') . '" 
                size="80" 
                style="max-width: 100%" 
                placeholder="Bring your location up in google maps and copy the URL. Paste it here."
            />';
}



// Stores LightSlider Settings message in this function
function sp_lightslider() {
    echo 'Use this form to change settings on your Front Page LightSlider.';
}

// Create LightSlider Items Form Field
function sp_lightslider_items() {
    $lightslider_items = esc_attr( get_option( 'lightslider_items' ) );
    echo    '<input 
                type="text" 
                name="lightslider_items" 
                value="' . $lightslider_items . '" 
                size="3"
                placeholder="5"
            />
            <p class="description">This number sets a limit for how many posts will be displayed in the Slider.</p>';
}

// Create LightSlider Duration Form Field
function sp_lightslider_duration() {
    $lightslider_duration = esc_attr( get_option( 'lightslider_duration' ) );
    echo    '<input 
                type="text" 
                name="lightslider_duration" 
                value="' . $lightslider_duration . '" 
                size="4"
                placeholder="4000"
            />
            <p class="description">Enter the length of time you want each slide to stay on the screen before transitioning in milliseconds.</p>';
}

// Create LightSlider Transition Speed Form Field
function sp_lightslider_transition_speed() {
    $lightslider_transition_speed = esc_attr( get_option( 'lightslider_transition_speed' ) );
    echo    '<input 
                type="text" 
                name="lightslider_transition_speed" 
                value="' . $lightslider_transition_speed . '" 
                size="4"
                placeholder="700"
            />
            <p class="description">Set the speed of each slide transition in milliseconds.</p>';
}

// Create LightSlider Transition Type Form Field
function sp_lightslider_transition_type() {
    $lightslider_transition_type = esc_attr( get_option( 'lightslider_transition_type' ) );
    echo    '<input 
                type="text" 
                name="lightslider_transition_type" 
                value="' . $lightslider_transition_type . '" 
                size="10"
                placeholder="fade"
            />
            <p class="description">Select the transition type. Options are <strong>slide</strong> or <strong>fade</strong>.</p>';
}


// Includes code for Theme Settings page
function sp_add_theme_options_page() {
    require_once( get_template_directory() . '/inc/theme/theme-settings.php');
}

//Includes code for Location page
function sp_add_location_page() {
    require_once( get_template_directory() . '/inc/theme/theme-location.php');
}

// Includes code for Social Media Links
function sp_add_social_links_page() {
    require_once( get_template_directory() . '/inc/theme/theme-social.php');
}

// Includes code for LightSlider Settings
function sp_add_lightslider_options_page() {
    require_once( get_template_directory() . '/inc/theme/theme-lightslider.php');
}