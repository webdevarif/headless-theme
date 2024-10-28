<?php

namespace Inc\Base;

use \Inc\Init;
use \Inc\Base\BaseController;

/**
 * Class TemplateTags
 *
 * Handles the enqueuing of scripts and styles for admin, frontend, and shared use.
 *
 * @since 1.0.0
 */
class TemplateTags extends BaseController
{
    /**
     * Register enqueue hooks for admin and frontend.
     */
    public function register()
    {
        add_action('init', [$this, 'check_and_load_template']);
    }

    /**
     * Function to check and load the appropriate template.
     */
    public function check_and_load_template()
    {
        // Example call to load headless templates.
        // Replace 'header' and 'template-parts/content' with actual values as needed.
        $this->headless_template('header', 'template-parts/content');
    }

    /**
     * Load a headless template or fall back to a default template part.
     *
     * @param string $post_type The custom post type (e.g., 'header').
     * @param string $default_template_path The default template part path (e.g., 'template-parts/content').
     */
    public function headless_template($post_type, $default_template_path)
    {
        $args = [
            'post_type' => 'headless_templates',
            'meta_query' => [[
                'key' => 'template_type',
                'value' => $post_type,
                'compare' => '='
            ]],
        ];

        $templates_query = new \WP_Query($args);

        if ($templates_query->have_posts()) {
            while ($templates_query->have_posts()) {
                $templates_query->the_post();

                $display_option = get_post_meta(get_the_ID(), 'template_display_option', true)['value'] ?? '';
                $selected_pages = get_post_meta(get_the_ID(), 'template_selected_pages', true) ?: [];
                $exclude_pages = get_post_meta(get_the_ID(), 'template_exclude_pages', true) ?: [];

                $template_applied = false;

                switch ($display_option) {
                    case 'entire_site':
                        if (empty($exclude_pages) || !$this->is_current_page_in_list($exclude_pages)) {
                            the_content();
                            $template_applied = true;
                        }
                        break;

                    case 'specific_pages':
                        if ($this->is_current_page_in_list($selected_pages)) {
                            the_content();
                            $template_applied = true;
                        }
                        break;
                }

                if ($template_applied) {
                    break;
                }
            }

            wp_reset_postdata(); // Reset the global post object
        } else {
            // Template not found, load default template
            get_template_part($default_template_path);
        }
    }

    /**
     * Private function to check if the current page matches any in the provided list.
     *
     * @param array $pages Array of pages to check against.
     * @return bool True if the current page is in the list, false otherwise.
     */
    private function is_current_page_in_list(array $pages): bool
    {
        foreach ($pages as $page) {
            if (is_page($page['value'])) {
                return true;
            }
        }
        return false;
    }
}
