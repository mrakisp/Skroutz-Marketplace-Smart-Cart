<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link        https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/includes
 * @author     Akis Paneras <panerasakis@gmail.com>
 */
class Skroutz_Marketplace_Smart_Cart_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'skroutz-marketplace-smart-cart',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
