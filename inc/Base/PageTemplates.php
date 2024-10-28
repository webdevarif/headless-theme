<?php

namespace Inc\Base;

class PageTemplates {

    /**
     * Register hooks for adding and loading page templates.
     */
    public static function register() {
        add_filter('theme_page_templates', [self::class, 'wgp_add_template_to_page_templates']);
        add_filter('template_include', [self::class, 'wgp_load_full_width_template']);
    }

    /**
     * Adds the custom template to the list of available templates.
     *
     * @param array $post_templates The existing page templates.
     * @return array Modified page templates.
     */
    public static function wgp_add_template_to_page_templates($post_templates) {
        $post_templates['templates/full-width.php'] = __('Full Width');
        return $post_templates;
    }

    /**
     * Loads the full width template when selected in page attributes.
     *
     * @param string $template The path to the template being loaded.
     * @return string Path to the full width template if selected, otherwise the original template.
     */
    public static function wgp_load_full_width_template($template) {
        if (is_page_template('templates/full-width.php')) {
            return HEADLESS_THEME_TEMPLATES_PATH . '/full-width.php';
        }
        return $template;
    }
}
