<?php
/**
* Registers styles & scripts
* Author: DevSpark Team
*
* @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
* @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
*/

// Enqueue scripts
add_action('init', 'wp_theme_header_scripts');

function wp_theme_header_scripts() {
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        wp_register_script('mainscript', get_template_directory_uri() . '/assets/public/js/frontend.js', array('jquery'), null, true);
        wp_enqueue_script('mainscript');
    }
}

// Enqueue styles
add_action('wp_enqueue_scripts', 'wp_theme_styles');

function wp_theme_styles()
{
    wp_register_style('wp_theme', get_template_directory_uri() . '/assets/public/css/frontend.css', array(), null, 'all');
    wp_enqueue_style('wp_theme');
}