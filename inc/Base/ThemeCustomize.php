<?php

namespace Inc\Base;

use \Inc\Init;
use \Inc\Base\BaseController;

/**
 * Class ThemeCustomize
 *
 * Handles the theme setup and support for various WordPress features.
 *
 * @since 1.0.0
 */
class ThemeCustomize extends BaseController
{
    /**
     * Register enqueue hooks for theme setup.
     */
    public function register()
    {
        add_action('after_setup_theme', [$this, 'headless_theme_setup']);
        add_action('customize_register', [$this, 'headless_theme_customize_register']);
    }

    // Setup Default Theme
    public function headless_theme_setup() {
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    public function headless_theme_customize_register($wp_customize) {
        // Add a new section for the Headless Theme Colors
        $wp_customize->add_section('headless_theme_colors', [
            'title'    => __('Headless Theme Colors', 'headless-theme'),
            'priority' => 30,
        ]);

        // Define the settings array keys
        $color_keys = [
            'primary_1' => __('Primary Color 1', 'headless-theme'),
            'primary_2' => __('Primary Color 2', 'headless-theme'),
            'secondary_1' => __('Secondary Color 1', 'headless-theme'),
            'secondary_2' => __('Secondary Color 2', 'headless-theme'),
        ];

        // Default color values
        $default_colors = [
            'primary_1' => '#33c6f3',
            'primary_2' => '#33c6f3',
            'secondary_1' => '#75e900',
            'secondary_2' => '#f3ca20',
        ];

        // Loop through each color setting
        foreach ($color_keys as $key => $label) {
            $setting_id = "headless_theme_colors[$key]";

            $wp_customize->add_setting($setting_id, [
                'default'   => $default_colors[$key],
                'type'      => 'theme_mod', // Store it in theme_mod instead of option
                'transport' => 'refresh',
            ]);

            $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, $setting_id, [
                'label'    => $label,
                'section'  => 'headless_theme_colors',
                'settings' => $setting_id,
            ]));
        }
    }

}
