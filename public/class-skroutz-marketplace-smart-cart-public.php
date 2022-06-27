<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link        https://github.com/mrakisp
 * @since      1.0.0
 *
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Skroutz_Marketplace_Smart_Cart
 * @subpackage Skroutz_Marketplace_Smart_Cart/public
 * @author     Akis Paneras <panerasakis@gmail.com>
 */
class Skroutz_Marketplace_Smart_Cart_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function process_order() {
		include_once( 'partials/skroutz-marketplace-smart-cart-public-display.php' );
	}
	
	public function no_index_page(){

		if(is_page("smart-cart-orders-endpoint")){
			echo '<meta name="robots" content="noindex, nofollow" />';
			if ( $_SERVER['REQUEST_METHOD'] == 'GET' || strpos( $_SERVER['HTTP_USER_AGENT'] , 'Skroutz') == false){
				?>
					<script>
						window.location = "/";
					</script>
				<?php
			}
		}
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Skroutz_Marketplace_Smart_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Skroutz_Marketplace_Smart_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/skroutz-marketplace-smart-cart-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Skroutz_Marketplace_Smart_Cart_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Skroutz_Marketplace_Smart_Cart_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/skroutz-marketplace-smart-cart-public.js', array( 'jquery' ), $this->version, false );

	}

}
