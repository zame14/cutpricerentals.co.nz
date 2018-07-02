<?php
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
loadVCTemplates();
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700');
    wp_enqueue_style( 'datepicker-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('datepicker-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js');
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

// Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_image_size( 'banner', 2000);

add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}
add_action('admin_init', 'my_general_section');
function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        'Custom Website Settings', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'phone', // Option ID
        'Phone Number', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'phone' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'mobile', // Option ID
        'Mobile Number', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'mobile' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'email', // Option ID
        'Email', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'email' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'address', // Option ID
        'Address', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'address' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'facebook', // Option ID
        'Facebook Link', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'facebook' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'instagram', // Option ID
        'Instagram Link', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'instagram' // Should match Option ID
        )
    );

    add_settings_field( // Option 2
        'booking', // Option ID
        'Quick Booking iframe URL', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'booking' // Should match Option ID
        )
    );


    register_setting('general','phone', 'esc_attr');
    register_setting('general','mobile', 'esc_attr');
    register_setting('general','email', 'esc_attr');
    register_setting('general','address', 'esc_attr');
    register_setting('general','facebook', 'esc_attr');
    register_setting('general','instagram', 'esc_attr');
    register_setting('general','booking', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);

    return $ph;

}

function socialMedia() {
    $html = '
    <ul class="social-media">
        <li><a href="' . get_option('facebook') . '" target="_blank"><span class="fa fa-facebook"></span></a></li>
    </ul>';

    return $html;
}

function book_now_form() {
    $html = '
    <form class="inline-form" role="form" method="post" action="/book-now/">
        <div class="form-group">
            <input type="text" id="pick_up_date" name="pick_up_date" class="form-control datepicker_pickup" placeholder="Pick up Date" /><span class="fa fa-calendar"></span>
        </div>
        <div class="form-group">
            <select class="form-control" id="pick_up_time" name="pick_up_time">' . get_times() . '</select>
        </div> 
        <div class="form-group">
            <input type="text" id="return_date" name="return_date" class="form-control datepicker_return" placeholder="Return Date" /><span class="fa fa-calendar"></span>
        </div>
        <div class="form-group">
            <select class="form-control" id="return_time" name="return_time">' . get_times() . '</select>
        </div> 
        <div class="form-group last">
            <input type="submit" value="BOOK NOW" />
        </div>
        <input name="force_locale" value="en" type="hidden" />
        <input id="pick_up_location" name="pick_up_location" value="2" type="hidden" />
    </form>';

    return $html;
}
add_shortcode('booking_form', 'book_now_form');

/**
 *
 * Get times as option-list.
 *
 * @return string List of times
 */
function get_times( $default = '08:00', $interval = '+15 minutes' ) {

    $output = '';

    $current = strtotime( '00:00' );
    $end = strtotime( '23:59' );

    while( $current <= $end ) {
        $time = date( 'H:i', $current );
        $sel = ( $time == $default ) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'h.i A', $current ) .'</option>';
        $current = strtotime( $interval, $current );
    }

    return $output;
}