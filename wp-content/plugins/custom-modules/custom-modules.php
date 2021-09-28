<?php

/**
 * Plugin Name: Custom Modules
 * Plugin URI: http://www.saltwaterco.com
 * Description: Custom modules made by Saltwater
 * Version: 1.0
 * Author: Alex Davis
 * Author URI: https://www.saltwaterco.com
 */
define( 'CUSTOM_DIR', plugin_dir_path( __FILE__ ) );
define( 'CUSTOM_URL', plugins_url( '/', __FILE__ ) );

function custom_modules_examples() {
    if ( class_exists( 'FLBuilder' ) ) {
        require_once 'hero/hero.php';
        require_once 'featured-text/featured-text.php';
        require_once 'testimonials/testimonials.php';
        require_once 'location/location.php';
        require_once 'accordion/accordion.php';
        require_once 'providers-list/providers-list.php';
    }
}
add_action( 'init', 'custom_modules_examples' );