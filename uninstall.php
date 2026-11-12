<?php
/**
 * Uninstall: remove the options of the plugin and what the Appsero usage tracker (bundled until 1.5.1) stored.
 *
 * @package StaxAddons
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

require_once __DIR__ . '/core/remove-appsero.php';

delete_option( '_stax_addons_disabled_widgets' );
delete_option( 'stax_el_version' );

stax_el_remove_appsero_data( dirname( WP_UNINSTALL_PLUGIN ) ); // WP_UNINSTALL_PLUGIN is "<folder>/loader.php".
