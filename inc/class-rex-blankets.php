<?php
/**
 * Rex Blankets Class
 *
 * @author   Tristan Lopus
 * --Class file adapted from Botique Class
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'RexBlankets' ) ) {

class RexBlankets {
	/**
	 * Setup class.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 99);
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_child_styles' ), 99 );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 99);

	}

	public function scripts() {
		wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/ca0eb767e6.js');
		// wp_enqueue_script( 'rex-jquery', get_template_directory_uri() . '/../storefront-child-rex-blankets/bower_components/jquery/dist/jquery.min.js');
		wp_enqueue_script( 'header-script', get_template_directory_uri() . '/../storefront-child-rex-blankets/assets/js/rex_header_scripts.js');
	}

	/**
	 * Enqueue Storefront Styles
	 * @return void
	 */
	public function enqueue_styles() {
		global $storefront_version;

		wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css', $storefront_version );

	}

	/**
	 * Enqueue Storechild Styles
	 * @return void
	 */
	public function enqueue_child_styles() {
		global $storefront_version;

		/**
		 * Styles
		 */
		wp_style_add_data( 'storefront-child-style', 'rtl', 'replace' );
	}

}

}

return new RexBlankets();
