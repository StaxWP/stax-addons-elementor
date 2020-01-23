<?php

namespace StaxAddons\Widgets\ScrollTop;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Component extends \Elementor\Widget_Base {

	public function get_name() {
		return 'stax-el-scroll-top';
	}

	public function get_title() {
		return __( 'Scroll Top', 'stax-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	protected function _register_controls() {
	}

	protected function render() {
		$settings = $this->get_settings();


	}

	protected function _content_template() {
	}

}
