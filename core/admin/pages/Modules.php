<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Modules
 * @package StaxAddons
 */
class Modules extends Base {

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->current_slug = 'modules';

		if ( Plugin::instance()->is_current_page( $this->current_slug ) ) {
			add_filter( STAX_EL_HOOK_PREFIX . 'current_slug', [ $this, 'set_page_slug' ] );
			add_filter( STAX_EL_HOOK_PREFIX . 'welcome_wrapper_class', [ $this, 'set_wrapper_classes' ] );
			add_action( STAX_EL_HOOK_PREFIX . $this->current_slug . '_page_content', [ $this, 'panel_content' ] );
		}

		add_filter( STAX_EL_HOOK_PREFIX . 'admin_menu', [ $this, 'add_menu_item' ] );
	}

	public function panel_content() {
		Utils::load_template( 'core/admin/pages/templates/modules', [
			'modules' => []
		] );
	}

	public function add_menu_item( $menu ) {
		$menu[] = [
			'name'     => __( 'Modules', 'stax-addons-for-elementor' ),
			'link'     => admin_url( 'admin.php?page=' . STAX_EL_SLUG_PREFIX . $this->current_slug ),
			'priority' => 5
		];

		return $menu;
	}

}

Modules::instance();
