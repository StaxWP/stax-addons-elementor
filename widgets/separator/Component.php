<?php

namespace StaxAddons\Widgets\Separator;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function get_name() {
		return 'stax-el-separator';
	}

	public function get_title() {
		return __( 'Separator', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider sq-widget-label';
	}

	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	protected function _register_controls() {
	}

	protected function render() {
		parent::render();

		$settings = $this->get_settings_for_display();
	}

}
