<?php

namespace StaxAddons\Widgets\InfoButton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;

use StaxAddons\Widgets\Base;
use StaxAddons\Utils;

class Component extends Base {

	public function get_name() {
		return 'stax-el-info-button';
	}

	public function get_title() {
		return __( 'Info Button', 'stax-addons-for-elementor' );
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

		$this->start_controls_section(
			'style_container_section',
			[
				'label' => __( 'Container', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$this->enqueue_resources();

		$settings = $this->get_settings_for_display();

		Utils::load_template(
			'widgets/info-button/template',
			[
				'settings' => $settings,
			]
		);
	}

}
