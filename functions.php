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












// /**
//  * Set the content width in pixels, based on the theme's design and stylesheet.
//  *
//  * Priority 0 to make it available to lower priority callbacks.
//  *
//  * @global int $content_width
//  */
// function headless_theme_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'headless_theme_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'headless_theme_content_width', 0 );

// /**
//  * Register widget area.
//  *
//  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
//  */
// function headless_theme_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'headless-theme' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'headless-theme' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'headless_theme_widgets_init' );

// /**
//  * Enqueue scripts and styles.
//  */
// function headless_theme_scripts() {
// 	wp_enqueue_style( 'headless-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'headless-theme-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'headless-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'headless_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
// require get_template_directory() . '/includes/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/includes/customizer.php';

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_template_directory() . '/includes/woocommerce.php';
// }
