<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class SSCW_Renderer {

	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		add_action( 'init', array( $this, 'init' ) );

	}

	public function init() {

		add_action( 'woocommerce_shop_loop_item_title', 'sscw_render_countdown', 5 );

	}

	public function enqueue_scripts() {

		wp_enqueue_style( 'sscw_countdown', SSCW_URL . '/assets/css/style.css', array(), SSCW_VERSION );

		wp_enqueue_script( 'jquery.countdown', SSCW_URL . '/assets/js/jquery.countdown.min.js', array( 'jquery' ), SSCW_VERSION );

		wp_enqueue_script( 'sscw_countdown', SSCW_URL . '/assets/js/script.js', array( 'jquery' ), SSCW_VERSION );
		wp_localize_script( 'sscw_countdown', 'sscw_params', array(
			'text_days'  => 'days',
			'text_hours' => 'hours',
			'text_mins'  => 'mins',
			'text_secs'  => 'secs',
		) );

	}
}

return new SSCW_Renderer();