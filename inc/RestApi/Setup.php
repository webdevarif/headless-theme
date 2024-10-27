<?php

namespace Inc\RestAPI;

class Setup {
    /**
     * Registers actions to initialize the theme features.
     *
     * @since 1.0.0
     */
    public function register() {
        // Register the init method to be called when the theme setup occurs
        add_action('after_setup_theme', [$this, 'init']);
    }

    /**
     * Initialize the theme.
     *
     * Fired by `after_setup_theme` action hook.
     *
     * @since 1.0.0
     */
    public function init() {
        // Instantiate each API block and register it
        $this->register_APIBlocks([
            FluentForm::class,
            GlobalSettings::class,
            PageDetails::class,
            BlogList::class,
        ]);
    }

    /**
     * Registers the given API block classes.
     *
     * @param array $blocks List of block class names.
     */
    private function register_APIBlocks(array $blocks) {
        foreach ($blocks as $block_class) {
            if (class_exists($block_class)) {
                $block = new $block_class();
                if (method_exists($block, 'register')) {
                    $block->register();
                }
            }
        }
    }
}
