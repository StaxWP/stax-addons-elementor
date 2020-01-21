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
//		require_once STAX_EL_CORE_PATH . '/ThemeInfo.php';
//		require_once STAX_EL_CORE_PATH . '/Helper.php';
//		require_once STAX_EL_CORE_PATH . '/carbon/PostOptions.php';
//		require_once STAX_EL_CORE_PATH . '/customizer/BlogOptions.php';
//		require_once STAX_EL_CORE_PATH . '/customizer/CommentsOptions.php';
//		require_once STAX_EL_CORE_PATH . '/customizer/FeaturedContentOptions.php';
//		require_once STAX_EL_CORE_PATH . '/customizer/PerformanceOptions.php';
//		require_once STAX_EL_CORE_PATH . '/customizer/PostListingOptions.php';
//		require_once STAX_EL_CORE_PATH . '/elements/loader.php';
//		require_once STAX_EL_CORE_PATH . '/settings/Settings.php';
//		require_once STAX_EL_CORE_PATH . '/settings/Modules.php';
//		require_once STAX_EL_CORE_PATH . '/settings/modules/AdsManager.php';
	}

}

StaxAddons::instance();
