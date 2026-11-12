<?php
/**
 * Plugin Name: Stax Addons for Elementor
 * Description: Beautiful & Fast add-ons for Elementor. Lightweight widgets and enhancements by StaxWP.
 * Plugin URI: https://staxwp.com
 * Author: StaxWP
 * Version: 1.5.1
 * Author URI: https://staxwp.com
 * Requires Plugins: elementor
 *
 * Elementor tested up to: 4.2.4
 * Elementor Pro tested up to: 4.2.4
 *
 * Text Domain: stax-addons-for-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'STAX_EL_VERSION', '1.5.1' );
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

// Init plugin
require_once STAX_EL_CORE_PATH . 'Plugin.php';
require_once STAX_EL_CORE_PATH . 'remove-appsero.php';

/**
 * Once per version: remove what the Appsero usage tracker (bundled until 1.5.1) stored on the site.
 *
 * @return void
 */
function stax_el_maybe_upgrade() {
	if ( STAX_EL_VERSION === get_option( 'stax_el_version' ) ) {
		return;
	}

	stax_el_remove_appsero_data( dirname( STAX_EL_PLUGIN_BASE ) );

	update_option( 'stax_el_version', STAX_EL_VERSION );
}

add_action( 'init', 'stax_el_maybe_upgrade' );

