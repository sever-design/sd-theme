<?php
function custom_wp_login_enqueue_styles() {
    // Get child theme directory URI for the CSS file
    $css_file = get_stylesheet_directory_uri() . '/css/login-style.css';

    // Enqueue the custom login stylesheet
    wp_enqueue_style('custom-wp-login', $css_file, array(), '1.0.0');
}
add_action('login_enqueue_scripts', 'custom_wp_login_enqueue_styles');