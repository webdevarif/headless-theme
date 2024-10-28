<?php

namespace Inc\AdminMenu;

use \Inc\Base\BaseController;

class Templates extends BaseController {

    public function register() {
        // Hook into the init action
        add_action( 'init', [ $this, 'registerCustomPostType' ] );
        add_action('admin_menu', [$this, 'addMenus']);
        add_action('init', [$this, 'registerTemplatesMeta']);
        // add_action('admin_enqueue_scripts', [$this, 'enqueueAdminScripts']);


        // Add columns to the templates list table
        add_filter('manage_headless_templates_posts_columns', [$this, 'setCustomColumns']);
        add_action('manage_headless_templates_posts_custom_column', [$this, 'customColumnContent'], 10, 2);
        
    }

    public function registerCustomPostType() {       
        $labels = [
            'name'               => _x( 'Templates', 'post type general name', 'headless-theme' ),
            'singular_name'      => _x( 'Template', 'post type singular name', 'headless-theme' ),
            'menu_name'          => _x( 'Templates', 'admin menu', 'headless-theme' ),
            'name_admin_bar'     => _x( 'Template', 'add new on admin bar', 'headless-theme' ),
            'add_new'            => _x( 'Add New', 'template', 'headless-theme' ),
            'add_new_item'       => __( 'Add New Template', 'headless-theme' ),
            'new_item'           => __( 'New Template', 'headless-theme' ),
            'edit_item'          => __( 'Edit Template', 'headless-theme' ),
            'view_item'          => __( 'View Template', 'headless-theme' ),
            'all_items'          => __( 'All Templates', 'headless-theme' ),
            'search_items'       => __( 'Search Templates', 'headless-theme' ),
            'parent_item_colon'  => __( 'Parent Templates:', 'headless-theme' ),
            'not_found'          => __( 'No templates found.', 'headless-theme' ),
            'not_found_in_trash' => __( 'No templates found in Trash.', 'headless-theme' )
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true, // Ensures the post type is publicly accessible
            'publicly_queryable' => true,
            'show_ui'            => true, // Displays the UI in the admin area
            'show_in_menu'       => false, // Ensures it shows in the admin menu
            'query_var'          => true,
            'rewrite'            => [ 'slug' => 'headless-theme-template' ],
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null, // Position in the menu; you might want to change this
            'supports'           => [ 'title', 'editor', 'custom-fields' ],
            'show_in_rest'       => true // Enable Gutenberg editor by allowing REST API
        ];

        register_post_type('headless_templates', $args);
    }

    public function addMenus(){
        add_submenu_page(
            'headless-theme', // Parent slug linked to the post type
            'Templates',                        // Page title
            'Templates',                        // Menu title
            'manage_options',                       // Capability
            'edit.php?post_type=headless_templates' // Linking directly to the post type
        );
    }

    public function registerTemplatesMeta(){
        register_post_meta('headless_templates', 'template_display_option', [
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
        ]);
    
        register_post_meta('headless_templates', 'template_selected_pages', [
            'type' => 'array',
            'single' => true,
            'show_in_rest' => [
                'schema' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                    ],
                ],
            ],
        ]);
    
        register_post_meta('headless_templates', 'template_exclude_pages', [
            'type' => 'array',
            'single' => true,
            'show_in_rest' => [
                'schema' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                    ],
                ],
            ],
        ]);
    
        register_post_meta('headless_templates', 'template_type', [
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
        ]);
    }
    

    public function setCustomColumns($columns) {
        // Remove the date column
        unset($columns['date']);
        
        // Add new columns
        $columns['template_type'] = __('Template Type', 'headless-theme');
        $columns['display_on_data'] = __('Display On Data', 'headless-theme');
        
        // Re-add the date column
        $columns['date'] = __('Date', 'headless-theme');

        return $columns;
    }

    public function customColumnContent($column, $post_id) {
        switch ($column) {
            case 'template_type':
                // Retrieve custom field data or set default value
                $templateType = get_post_meta($post_id, 'template_type', true);
                echo !empty($templateType) ? esc_html($templateType) : __('N/A', 'headless-theme');
                break;
            
            case 'display_on_data':
                // Retrieve custom field data or set default value
                $displayOnData = get_post_meta($post_id, 'template_display_option', true);
                echo !empty($displayOnData) ? esc_html($displayOnData) : __('N/A', 'headless-theme');
                break;
        }
    }

}
