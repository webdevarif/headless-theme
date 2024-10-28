<?php

namespace Inc\Base;

class Blocks {
    /**
     * Register hooks when the plugin is loaded.
     */
    public function register() {
        add_action( 'init', [$this, 'registerBlocks'] );
    }

    /**
     * Registers the block using the metadata loaded from the `block.json` file.
     * Behind the scenes, it registers also all assets so they can be enqueued
     * through the block editor in the corresponding context.
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
