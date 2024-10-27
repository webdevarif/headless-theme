<?php

namespace Inc;

/**
 * Theme initialization class for Headless CMS functionality.
 *
 * @link https://webdeveloperarif.com/
 * @since 1.0.0
 */
final class Init 
{
    /**
     * Return the theme title.
     *
     * @return string Escaped theme title
     */
    static function title() {
        return esc_html__('Headless Theme', 'headless-theme');
    }

    /**
     * Get the theme URL.
     *
     * @return string Theme URL
     */
    static function theme_url() {
        return get_template_directory_uri();
    }

    /**
     * Get the absolute path of the theme.
     *
     * @return string Theme path
     */
    static function theme_path() {
        return get_template_directory();
    }

    /**
     * Get the URL to theme assets.
     *
     * @return string Assets URL
     */
    static function assets_url() {
        return self::theme_url() . '/assets';
    }

    /**
     * Retrieve the theme version.
     *
     * @return string Theme version
     */
    static function version() {
        return wp_get_theme()->get('Version');
    }

    /**
     * Obtain the theme prefix.
     *
     * @return string Theme prefix
     */
    static function prefix() {
        return 'headless_';
    }
    
    /**
     * Load an Elementor template part with parameters.
     *
     * @param string $slug  Template slug name
     * @param string $name  Template name (optional)
     * @param array  $params Parameters to pass to the template
     * @return string Template content
     */
    static function get_template_part($slug, $name = null, $params = []) {
        $template = self::locate_template($slug, $name);
        return ($template && file_exists($template)) ? self::load_template($template, $params) : '';
    }

    /**
     * Locate the appropriate template file within the theme.
     *
     * @param string $slug Template slug
     * @param string $name Template name (optional)
     * @return string Template path
     */
    private static function locate_template($slug, $name) {
        $templates = ($name) ? ["{$slug}-{$name}.php", "{$slug}.php"] : ["{$slug}.php"];
        return locate_template($templates);
    }
    
    /**
     * Load a template file and extract parameters.
     *
     * @param string $template Template file path
     * @param array  $params   Parameters to extract for template
     * @return string Buffered template content
     */
    private static function load_template($template, $params) {
        ob_start();
        extract($params);
        include $template;
        return ob_get_clean();
    }

    /**
     * Retrieve list of service classes.
     *
     * @return array List of service class names
     */
    public static function get_services() {
        return [
            Base\Enqueue::class,
            Base\PageTemplates::class,
            Base\SvgSupport::class,
            Base\Customizer::class,
            Base\Blocks::class,
            
            // AdminMenu\Welcome::class,
            // AdminMenu\OptionsPages::class,
            
            // Rest API
            RestAPI\Setup::class,
        ];
    }

    /**
     * Register and initialize service classes.
     */
    public static function register_services() {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Instantiate a service class.
     *
     * @param string $class Service class name
     * @return object New instance of the service class
     */
    private static function instantiate($class) {
        return new $class();
    }
}
