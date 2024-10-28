<?php

namespace Inc\Base;

use \Inc\Init;
use \Inc\Base\BaseController;

/**
 * Class TemplateTags
 *
 * Handles the loading of templates based on custom post types and conditions.
 *
 * @since 1.0.0
 */
class TemplateTags extends BaseController
{
    /**
     * Load a headless template or fall back to a default template part.
     *
     * @param string $post_type The custom post type (e.g., 'header').
     * @param string $default_template_path The default template part path (e.g., 'template-parts/content').
     * @param int|null $current_page_id The current page ID to evaluate template application.
     */
    public function headless_template($post_type, $default_template_path, $current_page_id = null)
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
                        if (empty($exclude_pages) || !$this->is_current_page_in_list($exclude_pages, $current_page_id)) {
                            the_content();
                            $template_applied = true;
                        }
                        break;

                    case 'specific_pages':
                        if ($this->is_current_page_in_list($selected_pages, $current_page_id)) {
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
     * Private function to check if the provided page ID matches any in the given list.
     *
     * @param array $pages Array of pages to check against.
     * @param int|null $current_page_id The current page ID to compare.
     * @return bool True if the current page is in the list, false otherwise.
     */
    private function is_current_page_in_list(array $pages, $current_page_id): bool
    {
        foreach ($pages as $page) {
            if ((int)$page['value'] === $current_page_id) {
                return true;
            }
        }
        return false;
    }
}
