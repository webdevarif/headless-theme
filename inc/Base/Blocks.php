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
        register_block_type( HEADLESS_THEME_URL_PATH . '/build/blog-insight' );
        register_block_type( HEADLESS_THEME_URL_PATH . '/build/hero-banner' );
    }
}
