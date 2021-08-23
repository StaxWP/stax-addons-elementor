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
		return 'stx-icon-divider sq-widget-label';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'stax-addons-for-elementor' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => __( 'Layout', 'stax-addons-for-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'standard',
				'options' => [
					'standard'     => __( 'Standard', 'stax-addons-for-elementor' ),
					'with-icon'    => __( 'With Icon', 'stax-addons-for-elementor' ),
					'border-image' => __( 'Border Image', 'stax-addons-for-elementor' ),
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'stax-addons-for-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'condition'   => [
					'layout' => 'with-icon',
				],
			]
		);

		$this->add_control(
			'border_image',
			[
				'label'     => __( 'Choose Image', 'stax-addons-for-elementor' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => [
					'layout' => 'border-image',
				],
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
