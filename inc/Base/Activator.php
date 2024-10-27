<?php

namespace Inc\Base;

/**
 * Fired during plugin activation
 *
 * @link       https://webdeveloperarif.com/
 * @since      1.0.0
 *
 * @package    HeadlessTheme
 * @subpackage HeadlessTheme/inc
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    HeadlessTheme
 * @subpackage HeadlessTheme/inc
 * @author     Farmer Arif
 */
class Activator {
	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		flush_rewrite_rules();
	}
}