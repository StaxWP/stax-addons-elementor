<?php
/**
 * Plugin Name: Elementor Addons, Widgets and Enhancements - Stax
 * Description: Beautiful & Fast add-ons for Elementor. Enhance your site building experience with Stax Elementor Addons
 * Plugin URI: https://staxbuilder.com
 * Author: SeventhQueen
 * Version: 1.1.0
 * Author URI: https://seventhqueen.com
 *
 * Text Domain: stax-addons-for-elementor
 * Domain Path: /languages
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'STAX_EL_VERSION', '1.1.0' );

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

/*
 * Localization
 */
function stax_elementor_load_plugin_textdomain() {
	load_plugin_textdomain( 'stax-addons-for-elementor', false, basename( __DIR__ ) . '/languages/' );
}

add_action( 'plugins_loaded', 'stax_elementor_load_plugin_textdomain' );

// Init plugin
require_once STAX_EL_CORE_PATH . 'Plugin.php';
