<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Plugin
 * @package StaxAddons
 */
class Plugin {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return Plugin|null
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
		register_activation_hook( __FILE__, [ $this, 'enable_fa4_support' ] );

		require_once STAX_EL_CORE_PATH . '/Utils.php';
		require_once STAX_EL_CORE_PATH . '/StaxWidgets.php';
		require_once STAX_EL_CORE_PATH . '/admin/pages/Base.php';
		require_once STAX_EL_CORE_PATH . '/admin/pages/Dashboard.php';
		require_once STAX_EL_CORE_PATH . '/admin/pages/Widgets.php';
		require_once STAX_EL_CORE_PATH . '/admin/pages/Modules.php';
		require_once STAX_EL_CORE_PATH . '/admin/pages/Templates.php';
		require_once STAX_EL_CORE_PATH . '/admin/Settings.php';

		// Enhancements

		require_once STAX_EL_ENH_PATH . '/Accordion.php';
		require_once STAX_EL_ENH_PATH . '/Counter.php';
	}

	/**
	 * Get plugin slug
	 *
	 * @return string
	 */
	public function get_slug() {
		return 'stax-elementor-addons';
	}

	/**
	 * Check if current page is
	 *
	 * @param $page
	 *
	 * @return bool
	 */
	public function is_current_page( $page ) {
		$page = 'stax-elementor-' . $page;

		return isset( $_GET['page'] ) && $_GET['page'] === $page;
	}

	/**
	 * Enable FontAwesome 4 Support for Elementor
	 */
	public function enable_fa4_support() {
		update_option( 'elementor_load_fa4_shim', 'yes' );
	}

}

Plugin::instance();
