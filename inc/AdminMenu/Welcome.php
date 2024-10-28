<?php

namespace Inc\AdminMenu;

use \Inc\Base\BaseController;

class Welcome extends BaseController {
    
    // Register hooks for the admin menu
    public function register() {
        add_action('admin_menu', [$this, 'addMenus']);
    }
    
    // Add the main and submenu items to the WordPress admin
    public function addMenus() {
        add_menu_page(
            'Headless Theme Settings', // Page title
            'Theme Settings',             // Menu title
            'manage_options',         // Capability
            'headless-theme',        // Menu slug
            [$this, 'displayWelcome'],// Callable function
            HEADLESS_THEME_ASSETS_URL_PATH . '/img/favicon.png',                // Icon URL
            70                        // Position
        );

        add_submenu_page(
            'headless-theme',        // Parent slug
            'Welcome',                // Page title
            'Welcome',                // Menu title
            'manage_options',         // Capability
            'headless-theme',        // Menu slug (same as parent)
            [$this, 'displayWelcome'] // Callable function
        );
    }
    
    // Display content on the welcome page
    public function displayWelcome() {
        echo '<h1>Hello Welcome</h1>';
    }
}
