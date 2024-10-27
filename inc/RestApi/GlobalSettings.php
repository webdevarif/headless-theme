<?php
namespace Inc\RestAPI;

use \Inc\Base\BaseController;

class GlobalSettings extends BaseController {

    // Register hooks
    public function register() {
        add_action('rest_api_init', [$this, 'registerRoutes']);
        add_action('after_setup_theme', [$this, 'setup_theme']);
        add_action( 'customize_register', [$this, 'customize_register'] );
    }

    // Register the custom REST route
    public function registerRoutes() {
        register_rest_route('headless-theme/v1', '/global-settings', [
            'methods' => 'GET',
            'callback' => [$this, 'getGlobalSettings'],
            'permission_callback' => '__return_true',
        ]);
    }

    // Callback for the REST route to get global settings
    public function getGlobalSettings() {
        $identity = $this->getSiteIdentity();
        $header = $this->captureTemplateOutput(HEADLESS_THEME_URL_PATH . 'header.php');
        $footer = $this->captureTemplateOutput(HEADLESS_THEME_URL_PATH . 'footer.php');
        $suffix = $this->is_production() ? '.min' : '';

        return rest_ensure_response([
            'identity' => $identity,
            'header' => $header,
            'footer' => $footer,
            'styleCss' => HEADLESS_THEME_ASSETS_URL_PATH . "/css/style{$suffix}.css", // Corrected usage of quotes
        ]);
    }

    // Helper method to get site identity information
    private function getSiteIdentity() {
        return [
            'logo' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
            'favicon' => esc_url(get_site_icon_url()),
            'siteTitle' => get_bloginfo('name'),
            'tagLine' => get_bloginfo('description'),
        ];
    }

    // Capture template output
    private function captureTemplateOutput($templatePath) {
        ob_start();
        if (file_exists($templatePath)) {
            include $templatePath;
        }
        return ob_get_clean();
    }

    // Setup Default Theme
    public function setup_theme() {
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
    
    /**
     * Digital Farmers Theme Customizer
     *
     * @package HeadlessCMS
     */

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    function customize_register( $wp_customize ) {}

    
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
