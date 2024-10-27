<?php
namespace Inc\RestAPI;

use \Inc\Base\BaseController;
use WP_Query;
use WP_REST_Request;

class BlogList extends BaseController {

    // Register hooks
    public function register() {
        add_action('rest_api_init', [$this, 'registerRoutes']);
    }

    // Register the custom REST route
    public function registerRoutes() {
        register_rest_route('wgp/v1', '/blogs', [
            'methods' => 'GET',
            'callback' => [$this, 'getBlogs'],
            'permission_callback' => '__return_true',
            'args' => [
                'per-page' => [
                    'default' => 10,
                    'validate_callback' => function($param) {
                        return is_numeric($param);
                    }
                ],
                'category' => [],
                'tags' => [],
                'author' => [],
                'current-page' => [
                    'default' => 1,
                    'validate_callback' => function($param) {
                        return is_numeric($param);
                    }
                ]
            ]
        ]);
    }

    // Callback for the REST route to get blogs
    public function getBlogs(WP_REST_Request $request) {
        // Retrieving the query parameters
        $per_page = $request->get_param('per-page');
        $categories = (array) $request->get_param('category');
        $tags = (array) $request->get_param('tags');
        $authors = (array) $request->get_param('author');
        $current_page = $request->get_param('current-page');

        // Prepare query arguments
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $per_page,
            'paged' => $current_page,
        ];

        if (!empty($categories)) {
            $args['category_name'] = implode(',', $categories);
        }

        if (!empty($tags)) {
            $args['tag'] = implode(',', $tags);
        }

        if (!empty($authors)) {
            $author_ids = array_map(function($author) {
                $user = get_user_by('slug', $author);
                return $user ? $user->ID : 0;
            }, $authors);
            $args['author__in'] = array_filter($author_ids);
        }

        // WP_Query to get the filtered posts
        $query = new WP_Query($args);

        // Prepare the response data
        $blogs = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                
                // Get the featured image URL
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!$featured_image) {
                    // Provide a placeholder image if no featured image exists
                    $featured_image = 'https://via.placeholder.com/800x600';
                }

                // Get the formatted date
                $publish_date = get_the_date('F j, Y'); // Format like "October 18, 2024"

                $blogs[] = [
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'excerpt' => get_the_excerpt(),
                    'link' => get_permalink(),
                    'author' => get_the_author(),
                    'categories' => get_the_category(),
                    'tags' => get_the_tags(),
                    'featured_image' => $featured_image,
                    'date' => $publish_date,
                ];
            }
            wp_reset_postdata();
        }

        return rest_ensure_response([
            'current_page' => intval($current_page),
            'total_pages' => $query->max_num_pages,
            'blogs' => $blogs,
        ]);
    }
}
