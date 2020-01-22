<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class StaxAddons
 * @package StaxAddons
 */
class StaxAddons {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return StaxAddons|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * StaxAddons constructor.
	 */
	public function __construct() {
		require_once STAX_EL_CORE_PATH . '/Modules.php';

		add_action( 'admin_menu', [ $this, 'register_menu' ], 20 );
	}

	public function get_slug() {
		return 'stax-elementor-addons';
	}

	public function register_menu() {
		add_menu_page(
			esc_html__( 'STAX Addons Settings', 'stax-elementor' ),
			esc_html__( 'Elementor Addons', 'stax-elementor' ),
			'manage_options',
			$this->get_slug(),
			'',
			'',
			'58.7'
		);
	}

}

StaxAddons::instance();
