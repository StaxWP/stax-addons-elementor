<?php

namespace StaxAddons\Widgets\Breadcrumbs;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function get_name() {
		return 'stax-el-breadcrumbs';
	}

	public function get_title() {
		return __( 'Breadcrumbs', 'stax-elementor' );
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
		$this->enqueue_resources();

		$settings = $this->get_settings();


	}

	protected function _content_template() {
	}

}
