<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Plugins
 * @package StaxAddons
 */
class Plugins extends Base {

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->current_slug = 'plugins';

		if ( Plugin::instance()->is_current_page( $this->current_slug ) ) {
			add_filter( STAX_EL_HOOK_PREFIX . 'current_slug', [ $this, 'set_page_slug' ] );
			add_filter( STAX_EL_HOOK_PREFIX . 'welcome_wrapper_class', [ $this, 'set_wrapper_classes' ] );
			add_action( STAX_EL_HOOK_PREFIX . $this->current_slug . '_page_content', [ $this, 'panel_content' ] );
		}

		add_filter( STAX_EL_HOOK_PREFIX . 'admin_menu', [ $this, 'add_menu_item' ] );
		add_action( 'admin_post_stax_plugin_activation', [ $this, 'toggle_plugins' ] );
	}

	public function toggle_plugins() {
		if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'stax_plugin_activation' ) {
			wp_redirect( admin_url( 'admin.php?page=' . STAX_EL_SLUG_PREFIX . $this->current_slug ) );
		}

		wp_redirect( admin_url( 'admin.php?page=' . STAX_EL_SLUG_PREFIX . $this->current_slug ) );
		exit();
	}

	/**
	 * Panel content
	 */
	public function panel_content() {
		Utils::load_template( 'core/admin/pages/templates/plugins', [
			'plugins' => []
		] );
	}

	public function add_menu_item( $menu ) {
		$menu[] = [
			'name'     => __( 'Plugins', 'stax-addons-for-elementor' ),
			'link'     => admin_url( 'admin.php?page=' . STAX_EL_SLUG_PREFIX . $this->current_slug ),
			'priority' => 3
		];

		return $menu;
	}

}

Plugins::instance();