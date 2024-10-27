<?php

namespace Inc\Base;

/**
 * Helper functions for video rendering and video identification.
 *
 * This class provides functions to render video players and identify video types.
 *
 * @package    HeadlessTheme
 * @author     Farmer Arif
 * @since      1.0.0
 */
class SvgSupport extends BaseController {

    /**
     * Register hooks for adding and loading page templates.
     */
    public function register() {
        add_filter('mime_types', [$this, 'wgp_mime_types_support'], 99);
    }

    /**
     * Add SVG support to mime types.
     *
     * @param array $mimes Existing mime types.
     * @return array The modified array of mime types with SVG added.
     */
    public function wgp_mime_types_support($mimes) {
        if (!defined('ALLOW_UNFILTERED_UPLOADS')) {
            define('ALLOW_UNFILTERED_UPLOADS', true);
        }
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';

        return $mimes;
    }
}
