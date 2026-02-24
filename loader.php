<?php
/**
 * Plugin Name: Stax Addons for Elementor
 * Description: Beautiful & Fast add-ons for Elementor. Lightweight widgets and enhancements by StaxWP.
 * Plugin URI: https://staxwp.com
 * Author: StaxWP
 * Version: 1.5.0
 * Author URI: https://staxwp.com
 * Requires Plugins: elementor
 *
 * Elementor tested up to: 3.25
 * Elementor Pro tested up to: 3.25
 *
 * Text Domain: stax-addons-for-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'STAX_EL_VERSION', '1.5.0' );
define( 'STAX_EL_DOMAIN', 'stax-addons-for-elementor' );
define( 'STAX_EL_HOOK_PREFIX', 'stax_el_' );
define( 'STAX_EL_SLUG_PREFIX', 'stax-elementor-' );

define( 'STAX_EL_FILE', __FILE__ );
define( 'STAX_EL_PLUGIN_BASE', plugin_basename( STAX_EL_FILE ) );
define( 'STAX_EL_PATH', plugin_dir_path( STAX_EL_FILE ) );
define( 'STAX_EL_URL', plugins_url( '/', STAX_EL_FILE ) );
define( 'STAX_EL_CORE_PATH', STAX_EL_PATH . 'core/' );
define( 'STAX_EL_WIDGET_PATH', STAX_EL_PATH . 'widgets/' );
define( 'STAX_EL_ENH_PATH', STAX_EL_PATH . 'enhancements/' );
define( 'STAX_EL_EXTRA_PATH', STAX_EL_PATH . 'extra/' );
define( 'STAX_EL_WIDGET_URL', STAX_EL_URL . 'widgets/' );
define( 'STAX_EL_ASSETS_URL', STAX_EL_URL . 'assets/' );

if ( file_exists( STAX_EL_PATH . 'vendor/autoload.php' ) ) {
	require STAX_EL_PATH . 'vendor/autoload.php';
}

// Init plugin
require_once STAX_EL_CORE_PATH . 'Plugin.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_stax_addons_for_elementor() {

	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once __DIR__ . '/vendor/appsero/client/src/Client.php';
	}

	$client = new Appsero\Client( '4b0c9337-336f-40f4-a089-37a2481a2655', 'Stax Addons for Elementor', __FILE__ );

	// Active insights
	$client->insights()->init();

}

add_action( 'init', 'appsero_init_tracker_stax_addons_for_elementor' );
