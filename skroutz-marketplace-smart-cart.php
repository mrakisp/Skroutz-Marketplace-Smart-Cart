<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link               https://github.com/mrakisp
 * @since             1.0.0
 * @package           Skroutz_Marketplace_Smart_Cart
 *
 * @wordpress-plugin
 * Plugin Name:       Skroutz Marketplace Smart Cart
 * Plugin URI:         https://github.com/mrakisp
 * Description:       Accept an order from Skroutz Marketplace and it will be automatically passed into your website orders list reducing the stock of the ordered products and allowing you to keep track of the orders
 * Version:           1.0.0
 * Author:            Akis Paneras
 * Author URI:         https://github.com/mrakisp
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       skroutz-marketplace-smart-cart
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SKROUTZ_MARKETPLACE_SMART_CART_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-skroutz-marketplace-smart-cart-activator.php
 */
function activate_skroutz_marketplace_smart_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skroutz-marketplace-smart-cart-activator.php';
	Skroutz_Marketplace_Smart_Cart_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-skroutz-marketplace-smart-cart-deactivator.php
 */
function deactivate_skroutz_marketplace_smart_cart() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-skroutz-marketplace-smart-cart-deactivator.php';
	Skroutz_Marketplace_Smart_Cart_Deactivator::deactivate();
}


register_activation_hook( __FILE__, 'activate_skroutz_marketplace_smart_cart' );
register_deactivation_hook( __FILE__, 'deactivate_skroutz_marketplace_smart_cart' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-skroutz-marketplace-smart-cart.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_skroutz_marketplace_smart_cart() {

	$plugin = new Skroutz_Marketplace_Smart_Cart();
	$plugin->run();

}
run_skroutz_marketplace_smart_cart();
