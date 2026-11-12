<?php
/**
 * Cleanup of the Appsero usage tracker bundled until 1.5.1 (used on update and in uninstall.php).
 *
 * @package StaxAddons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Remove the options and the weekly event of the Appsero usage tracker (its slug is the plugin folder name).
 *
 * @param string $slug Plugin folder name.
 *
 * @return void
 */
function stax_el_remove_appsero_data( $slug ) {
	foreach ( [ '_tracking_last_send', '_allow_tracking', '_tracking_notice', '_tracking_skipped' ] as $suffix ) {
		delete_option( $slug . $suffix );
	}

	wp_clear_scheduled_hook( $slug . '_tracker_send_event' );
}
