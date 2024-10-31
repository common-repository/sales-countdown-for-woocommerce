<?php
/*
Plugin Name: Sales Countdown for WooCommerce
Plugin URI: http://saturnplugins.com
Description: WordPress plugin to show countdown on sale product
Author: SaturnPlugins
Version: 1.0.0
Author URI: http://saturnplugins.com/
*/

class SSCW_Countdown {

	protected static $_instance = null;

	public function __construct() {
		define( 'SSCW_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'SSCW_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ) );
		define( 'SSCW_VERSION', '1.0.0' );

		load_plugin_textdomain( 'woocommerce-sales-countdown', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		require_once( SSCW_PATH . '/inc/core-functions.php' );
		require_once( SSCW_PATH . '/inc/template-functions.php' );

		if ( ! is_admin() ) {
			include_once( SSCW_PATH . '/inc/class-sscw-render.php' );
		}
	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	public function template_path() {
		return apply_filters( 'sscw_template_path', 'sscw/' );
	}
}

function SSCW() {
	return SSCW_Countdown::instance();
}

add_action( 'plugins_loaded', 'sscw_init' );
function sscw_init() {
	if ( function_exists( 'WC' ) ) {
		$GLOBALS['SSCW_Instance'] = SSCW();
	}
}
