<?php

namespace Inc\Base;

/**
 * Fired during plugin activation
 *
 * @link       https://webdeveloperarif.com/
 * @since      1.0.0
 *
 * @package    HeadlessTheme
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    HeadlessTheme
 * @author     Farmer Arif
 */

 use Inc\Init;

class BaseController 
{
    public function __construct(){}

	public function activated( string $key )
	{
		$option = get_option( Init::prefix() );

		return isset( $option[ $key ] ) ? $option[ $key ] : false;
	}
}