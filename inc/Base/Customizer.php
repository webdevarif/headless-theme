<?php

namespace Inc\Base;

use \Inc\Init;
use \Inc\Base\BaseController;

/**
 * Class Customizer
 *
 * Handles the theme setup and support for various WordPress features.
 *
 * @since 1.0.0
 */
class Customizer extends BaseController
{
    /**
     * Register enqueue hooks for theme setup.
     */
    public function register()
    {
        add_action('customize_register', [$this, 'headless_theme_setup']);
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    public function headless_theme_setup($wp_customize) {
        // Primary Color 1
        $wp_customize->add_setting('primary_color_1', [
            'default'   => '#33c6f3',
            'transport' => 'refresh',
        ]);
    
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'primary_color_1', [
            'label'    => __('Primary Color 1', 'your-theme-textdomain'),
            'section'  => 'colors',
            'settings' => 'primary_color_1',
        ]));
        // Primary Color 2
        $wp_customize->add_setting('primary_color_2', [
            'default'   => '#33c6f3',
            'transport' => 'refresh',
        ]);
    
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'primary_color_2', [
            'label'    => __('Primary Color 2', 'your-theme-textdomain'),
            'section'  => 'colors',
            'settings' => 'primary_color_2',
        ]));
    
        // Secondary Color 1
        $wp_customize->add_setting('secondary_color_1', [
            'default'   => '#75e900',
            'transport' => 'refresh',
        ]);
    
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'secondary_color_1', [
            'label'    => __('Secondary Color 1', 'your-theme-textdomain'),
            'section'  => 'colors',
            'settings' => 'secondary_color_1',
        ]));
    
        // Secondary Color 2
        $wp_customize->add_setting('secondary_color_2', [
            'default'   => '#f3ca20',
            'transport' => 'refresh',
        ]);
    
        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'secondary_color_2', [
            'label'    => __('Secondary Color 2', 'your-theme-textdomain'),
            'section'  => 'colors',
            'settings' => 'secondary_color_2',
        ]));
    }
    
}
