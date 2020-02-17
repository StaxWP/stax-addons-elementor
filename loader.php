<?php

/**
 * Plugin Name: Addons Kit for Elementor - Stax
 * Description:
 * Plugin URI: https://seventhqueen.com
 * Author: SeventhQueen
 * Version: 1.0.0
 * Author URI: https://seventhqueen.com
 *
 * Text Domain: stax-elementor
 * Domain Path: /languages
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'STAX_EL_VERSION', '1.0.0' );

// DEV Mode
define( 'STAX_EL_DEV', true );

define( 'STAX_EL_FILE', __FILE__ );
define( 'STAX_EL_PLUGIN_BASE', plugin_basename( STAX_EL_FILE ) );
define( 'STAX_EL_PATH', plugin_dir_path( STAX_EL_FILE ) );
define( 'STAX_EL_URL', plugins_url( '/', STAX_EL_FILE ) );
define( 'STAX_EL_CORE_PATH', STAX_EL_PATH . 'core/' );
define( 'STAX_EL_WIDGET_PATH', STAX_EL_PATH . 'widgets/' );
define( 'STAX_EL_ENH_PATH', STAX_EL_PATH . 'enhancements/' );
define( 'STAX_EL_WIDGET_URL', STAX_EL_URL . 'widgets/' );
define( 'STAX_EL_ASSETS_URL', STAX_EL_URL . 'assets/' );

// Init plugin
require_once STAX_EL_CORE_PATH . 'Plugin.php';
