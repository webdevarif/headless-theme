<?php
namespace Inc\RestAPI;

use \Inc\Base\BaseController;

class GlobalSettings extends BaseController {

    // Register hooks
    public function register() {
        add_action('rest_api_init', [$this, 'registerRoutes']);
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

        // Fetch all color settings from theme modifications
        $headless_mod = get_theme_mod('headless_theme_colors', []);
        
        // Access individual colors with fallbacks if not set
        $primary_1 = isset($headless_mod['primary_1']) ? $headless_mod['primary_1'] : '#33c6f3';
        $primary_2 = isset($headless_mod['primary_2']) ? $headless_mod['primary_2'] : '#33c6f3';
        $secondary_1 = isset($headless_mod['secondary_1']) ? $headless_mod['secondary_1'] : '#75e900';
        $secondary_2 = isset($headless_mod['secondary_2']) ? $headless_mod['secondary_2'] : '#f3ca20';

        return rest_ensure_response([
            'identity' => $identity,
            'header' => $header,
            'footer' => $footer,
            'colors' => [
                'primary-1' => $primary_1,
                'primary-2' => $primary_2,
                'secondary-1' => $secondary_1,
                'secondary-2' => $secondary_2,
            ],
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
