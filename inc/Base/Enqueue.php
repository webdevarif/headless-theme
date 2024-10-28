<?php

namespace Inc\Base;

use \Inc\Init;
use \Inc\Base\BaseController;

/**
 * Class Enqueue
 *
 * Handles the enqueuing of scripts and styles for admin, frontend, and shared use.
 *
 * @since 1.0.0
 */
class Enqueue extends BaseController
{
    /**
     * Register enqueue hooks for admin and frontend.
     */
    public function register()
    {
        // Hook admin-specific scripts and styles
        add_action('admin_enqueue_scripts', [$this, 'admin_scripts']);
        
        // Hook block editor scripts and styles
        add_action('enqueue_block_editor_assets', [$this, 'block_editor_assets']);

        // Only enqueue frontend scripts if not in admin area
        if (!is_admin()) $this->frontend_enqueue();
    }
    
    /**
     * Enqueue scripts and styles for the admin panel.
     */
    public function admin_scripts()
    {
        // Enqueue admin CSS
        wp_enqueue_style(
            Init::prefix() . '-admin-style',
            Init::assets_url() . '/css/Admin/admin.css',
            [],
            Init::version()
        );

        // Enqueue admin JavaScript
        wp_enqueue_script(
            Init::prefix() . '-admin-script',
            Init::assets_url() . '/js/Admin/admin.js',
            [],
            Init::version(),
            true
        );
    }

    /**
     * Enqueue editor-specific styles for the block editor.
     */
    public function block_editor_assets()
    {
        // Determine file suffix based on environment (minified for production)
        $suffix = $this->is_production() ? '.min' : '';
        $asset_file = include( get_stylesheet_directory() . '/build/index.asset.php');
    
        // Register editor SCRIPTS
        wp_enqueue_script(
            Init::prefix() . '-editor-scripts',
            get_stylesheet_directory_uri() . '/build/index.js',
            $asset_file['dependencies'],
            $asset_file['version']
        );
    
        // Register editor CSS
        wp_register_style(
            Init::prefix() . '-editor-style',
            Init::assets_url() . "/css/Editor/editor{$suffix}.css",
            [],
            Init::version()
        );
    
        // Enqueue editor CSS after registering
        wp_enqueue_style(Init::prefix() . '-editor-style');
        wp_enqueue_scripts(Init::prefix() . '-editor-scripts',);
        
    }

    /**
     * Enqueue scripts and styles for the frontend.
     */
    private function frontend_enqueue()
    {
        // Determine file suffix based on environment (minified for production)
        $suffix = $this->is_production() ? '.min' : '';

        // Enqueue frontend CSS
        wp_enqueue_style(
            Init::prefix() . '-style',
            Init::assets_url() . "/css/Frontend/style{$suffix}.css",
            [],
            Init::version()
        );

        // Enqueue frontend JavaScript with jQuery as a dependency
        wp_enqueue_script(
            Init::prefix() . '-script',
            Init::assets_url() . "/js/Frontend/main{$suffix}.js",
            ['jquery'],
            Init::version(),
            true
        );
    }
 
    /**
     * Determine whether the current environment is production.
     *
     * @return bool True if environment is production.
     */
    private function is_production()
    {
        // Check a constant to determine the environment setting
        return defined('WP_ENV') && WP_ENV === 'production';
    }
}
