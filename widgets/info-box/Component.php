<?php

namespace StaxAddons\Widgets\InfoBox;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function get_name() {
		return 'stax-el-info-box';
	}

	public function get_title() {
		return __( 'Info Box', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider sq-widget-label';
	}

	protected function _register_controls() {
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
	}

}
