<?php
vc_map( array(
    "name"                    => __( "Contact Details" ),
    "base"                    => "contact_details",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'contact_details', 'contactDetails' );

function contactDetails() {
    $html = '
    <h2>' . get_bloginfo('name') . '</h2>
    <address>' . get_option('address') . '</address>
    <ul class="contact-details">
        <li class="mobile"><a href="tel:' . formatPhoneNumber(get_option('mobile')) . '">' . get_option('mobile') . '</a></li>
        <li class="phone"><a href="tel:' . formatPhoneNumber(get_option('phone')) . '">' . get_option('phone') . '</a></li>
        <li class="email"><a href="mailto:' . get_option('email') . '">' . get_option('email') . '</a></li>
    </ul>';

    return $html;
}