<?php

namespace StaxAddons\Widgets\Button;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function get_name() {
		return 'stax-el-button';
	}

	public function get_title() {
		return __( 'Button (Stax)', STAX_EL_DOMAIN );
	}

	public function get_icon() {
		return 'sq-icon-button sq-widget-label';
	}

	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Click here', STAX_EL_DOMAIN ),
				'placeholder' => __( 'Click here', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Link', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', STAX_EL_DOMAIN ),
				'default'     => [
					'url' => '#',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'        => __( 'Alignment', STAX_EL_DOMAIN ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'    => [
						'title' => __( 'Left', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => __( 'Center', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'   => [
						'title' => __( 'Right', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
			]
		);

		$this->add_control(
			'size',
			[
				'label'          => __( 'Size', 'elementor' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => 'sm',
				'options'        => [
					'xs' => __( 'Extra Small', 'elementor' ),
					'sm' => __( 'Small', 'elementor' ),
					'md' => __( 'Medium', 'elementor' ),
					'lg' => __( 'Large', 'elementor' ),
					'xl' => __( 'Extra Large', 'elementor' ),
				],
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label'            => __( 'Icon', STAX_EL_DOMAIN ),
				'type'             => Controls_Manager::ICONS,
				'label_block'      => true,
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label'     => __( 'Icon Position', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => [
					'left'  => __( 'Before', STAX_EL_DOMAIN ),
					'right' => __( 'After', STAX_EL_DOMAIN ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label'     => __( 'Icon Spacing', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .stx-btn .stx-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-btn .stx-icon-left'  => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label'   => __( 'View', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'button_css_id',
			[
				'label'       => __( 'Button ID', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => '',
				'title'       => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', STAX_EL_DOMAIN ),
				'label_block' => false,
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', STAX_EL_DOMAIN ),
				'separator'   => 'before',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', STAX_EL_DOMAIN ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'text_shadow',
				'selector' => '{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .stx-btn',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label'     => __( 'Text Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus'                 => 'color: {{VALUE}};',
					'{{WRAPPER}} a.stx-btn:hover svg, {{WRAPPER}} .stx-btn:hover svg, {{WRAPPER}} a.stx-btn:focus svg, {{WRAPPER}} .stx-btn:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label'     => __( 'Background Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => __( 'Border Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} a.stx-btn:hover, {{WRAPPER}} .stx-btn:hover, {{WRAPPER}} a.stx-btn:focus, {{WRAPPER}} .stx-btn:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'button_hover_box_shadow',
				'selector' => '{{WRAPPER}} .stx-btn:hover',
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', STAX_EL_DOMAIN ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'border',
				'selector'  => '{{WRAPPER}} .stx-btn',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label'      => __( 'Padding', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} a.stx-btn, {{WRAPPER}} .stx-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'icon', 'class', 'stx-btn-icon' );

		if ( $settings['selected_icon']['value'] ) {
			$this->add_render_attribute( 'icon', 'class', 'stx-icon-' . $settings['icon_align'] );
		}

		$this->add_render_attribute( 'button', 'role', 'button' );
		$this->add_render_attribute( 'button', 'class', 'stx-btn' );
		$this->add_render_attribute( 'button', 'class', 'stx-btn-' . $settings['size'] );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
		}

		if ( $settings['link']['is_external'] ) {
			$this->add_render_attribute( 'button', 'target', '_blank' );
		}

		if ( $settings['link']['nofollow'] ) {
			$this->add_render_attribute( 'button', 'rel', 'nofollow' );
		}

		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		?>

        <div class="stx-btn-wrapper">
            <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
		        <span class="stx-btn-content-wrapper">
			        <span <?php echo $this->get_render_attribute_string( 'icon' ); ?>>
                        <?php if ( $settings['selected_icon']['value'] ) : ?>
	                        <?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        <?php endif; ?>
                    </span>
		            <span class="stx-btn-text"><?php echo $settings['text']; ?></span>
		        </span>
            </a>
        </div>

		<?php
	}

}
