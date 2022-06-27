<?php

/**
 * Fired during plugin activation
 *
 * @link        https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/includes
 * @author     Akis Paneras <panerasakis@gmail.com>
 */
class Skroutz_Marketplace_Smart_Cart_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		if ( ! current_user_can( 'activate_plugins' ) ) return;

		global $wpdb;
	
		if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'smart-cart-orders-endpoint'", 'ARRAY_A' )) {
			
			$current_user = wp_get_current_user();
			
			// create post object
			$page = array(
			'post_title'  => __( 'Smart Cart Orders Endpoint' ),
			'post_status' => 'publish',
			'post_author' => $current_user->ID,
			'post_type'   => 'page',
			);
			
			// insert the post into the database
			wp_insert_post( $page );
		}
		
	}

}
