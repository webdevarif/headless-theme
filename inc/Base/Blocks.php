<?php

namespace Inc\Base;

class Blocks {
    /**
     * Register hooks when the plugin is loaded.
     */
    public function register() {
        add_action( 'init', [$this, 'registerBlocks'] );
        add_filter( 'block_categories_all', [$this, 'addCustomBlockCategory'], 10, 2 ); // Updated to call a public method
    }

    /**
     * Adds a custom block category.
     *
     * @param array $categories Existing block categories.
     * @param object $post Current post object.
     * @return array Modified block categories.
     */
    public function addCustomBlockCategory($categories, $post) {
        return array_merge(
            $categories,
            [
                [
                    'slug' => 'headless-theme',
                    'title' => __('Headless Theme', 'headless-theme'),
                ]
            ]
        );
    }

    /**
     * Registers blocks using metadata loaded from `block.json` files.
     *
     * @see https://developer.wordpress.org/reference/functions/register_block_type/
     */
    public function registerBlocks() {
        // Array of block directories relative to the build path
        $blocks = [
            'blog-insight',
            'hero-banner'
        ];

        // Loop through each block and register it
        foreach ($blocks as $block) {
            register_block_type( HEADLESS_THEME_ABS_PATH . '/build/blocks/' . $block );
        }
    }
}
