<?php

namespace Inc\RestAPI;

use \Inc\Base\BaseController;
use \WP_Error;
use \WP_REST_Request;
// Assuming autoload or correct path inclusion for the TemplateTags class
use Inc\Base\TemplateTags;

class PageDetails extends BaseController {

    /**
     * Register hooks for the REST API.
     */
    public function register() {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    /**
     * Register the custom REST routes.
     */
    public function registerRoutes() {
        // Route for frontpage data
        register_rest_route('headless-theme/v1', '/page', [
            'methods' => 'GET',
            'callback' => [$this, 'getFrontPage'],
            'permission_callback' => '__return_true',  // Allow all requests (can be customized)
        ]);

        // Dynamic route for specific page by slug
        register_rest_route('headless-theme/v1', '/page/(?P<slug>[a-zA-Z0-9-]+)', [
            'methods' => 'GET',
            'callback' => [$this, 'getPageBySlug'],
            'args' => [
                'slug' => [
                    'required' => true,
                ],
            ],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Callback function to handle the front page REST request.
     *
     * @return array|\WP_Error The filtered front page data or an error message.
     */
    public function getFrontPage() {
        $frontpage_id = get_option('page_on_front');

        if (empty($frontpage_id)) {
            return new WP_Error('no_frontpage', __('Front page not set'), ['status' => 404]);
        }

        $request = new WP_REST_Request('GET', '/wp/v2/pages/' . $frontpage_id);
        $response = rest_do_request($request);

        if ($response->is_error()) {
            return new WP_Error('rest_error', __('Could not retrieve front page data'), ['status' => 500]);
        }

        $data = $response->get_data();

        return $this->filterPageData($data);
    }

    /**
     * Callback function to retrieve page data by slug.
     *
     * @param WP_REST_Request $request The REST request object.
     * @return array|\WP_Error The filtered page data or an error message.
     */
    public function getPageBySlug(WP_REST_Request $request) {
        $slug = $request['slug'];

        $args = [
            'name' => $slug,
            'post_type' => 'page',
            'post_status' => 'publish',
            'numberposts' => 1,
        ];

        $page = get_posts($args);

        if (empty($page) || !isset($page[0])) {
            return new WP_Error('no_page_found', __('No page found with this slug'), ['status' => 404]);
        }

        $page_id = $page[0]->ID;
        $request = new WP_REST_Request('GET', '/wp/v2/pages/' . $page_id);
        $response = rest_do_request($request);

        if ($response->is_error()) {
            return new WP_Error('rest_error', __('Could not retrieve page data'), ['status' => 500]);
        }

        $data = $response->get_data();

        return $this->filterPageData($data);
    }

    /**
     * Filter page data to include specific fields.
     *
     * @param array $data Raw page data.
     * @return array Filtered data.
     */
    private function filterPageData($data) {
        // Instantiate the TemplateTags class
        $template_tags = new TemplateTags();

        // Capture header content
        ob_start();
        // Call the headless_template method, providing the necessary parameters
        $template_tags->headless_template('header', 'template-parts/default-header', $data['id'] ?? null);
        $header_content = ob_get_clean();

        // Capture footer content
        ob_start();
        // Call the headless_template method, providing the necessary parameters
        $template_tags->headless_template('footer', 'template-parts/default-footer', $data['id'] ?? null);
        $footer_content = ob_get_clean();

        return [
            'status' => 200,
            'id' => $data['id'] ?? null,
            'title' => $data['title']['rendered'] ?? null,
            'slug' => $data['slug'] ?? null,
            'content' => '<div class="site-main">' . ($data['content']['rendered'] ?? '') . '</div>' ?? null,
            'header' => $header_content,
            'footer' => $footer_content,
            'featured_media' => $data['featured_media'] ?? null,
        ];
    }
}
