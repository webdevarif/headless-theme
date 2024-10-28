<?php
/**
 * Headless Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Headless_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Autoload necessary classes
require_once get_template_directory() . '/autoload.php';

// Load theme constants
require_once get_template_directory() . '/constants.php';

use Inc\Init;

/**
 * Initialize the theme settings.
 */
function activate_headless_theme() {
    Inc\Base\Activator::activate();
}

/**
 * Clean up theme settings.
 */
function deactivate_headless_theme() {
    Inc\Base\Deactivator::deactivate();
}

// Initialize theme services if Init class exists
if (class_exists('Inc\\Init')) {
    Init::register_services();
}

// Call activation function during theme setup
add_action('after_setup_theme', 'activate_headless_theme');

// Optionally call deactivation function when theme is switched
add_action('switch_theme', 'deactivate_headless_theme');
