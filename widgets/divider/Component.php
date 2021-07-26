<?php

namespace StaxAddons\Widgets\Divider;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function get_name() {
		return 'stax-el-divider';
	}

	public function get_title() {
		return __( 'Divider', 'stax-addons-for-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider sq-widget-label';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/divider/template',
			[
				'settings' => $settings,
			]
		);
	}

}
