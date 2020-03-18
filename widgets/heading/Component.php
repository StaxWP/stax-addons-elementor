<?php

namespace StaxAddons\Widgets\Heading;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Control_Media;

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function get_name() {
		return 'stax-el-heading';
	}

	public function get_title() {
		return __( 'Heading (Stax)', STAX_EL_DOMAIN );
	}

	public function get_icon() {
		return 'sq-icon-title sq-widget-label';
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'title_section',
			[
				'label' => __( 'Title', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Text', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::TEXT,
				'description' => __( 'Highlight title words by wrapping them in curly brackets like {{beautiful}}', STAX_EL_DOMAIN ),
				'label_block' => true,
				'placeholder' => __( 'Tips to {{grow}} your business', STAX_EL_DOMAIN ),
				'default'     => __( 'Tips to {{grow}} your business', STAX_EL_DOMAIN ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => __( 'HTML Tag', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'title_ornament',
			[
				'label'   => __( 'Show line', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''                => __( 'None', STAX_EL_DOMAIN ),
					'stx-line-before' => __( 'Before', STAX_EL_DOMAIN ),
					'stx-line-after'  => __( 'After', STAX_EL_DOMAIN ),
					'stx-line-both'   => __( 'Before & After', STAX_EL_DOMAIN )
				],
				'default' => ''
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => __( 'Subtitle', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'subtitle_show',
			[
				'label'   => __( 'Show', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Text', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Learn from the market leaders', STAX_EL_DOMAIN ),
				'default'     => __( 'Learn from the market leaders', STAX_EL_DOMAIN ),
				'condition'   => [
					'subtitle_show' => 'yes'
				],
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'subtitle_position',
			[
				'label'     => __( 'Position', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'after_title',
				'options'   => [
					'before_title' => __( 'Before Title', STAX_EL_DOMAIN ),
					'after_title'  => __( 'After Title', STAX_EL_DOMAIN ),
				],
				'condition' => [
					'subtitle_show' => 'yes'
				]
			]
		);

		$this->add_control(
			'subtitle_tag',
			[
				'label'     => __( 'HTML Tag', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
					'p'    => 'p',
				],
				'default'   => 'h3',
				'condition' => [
					'subtitle_show' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'description_section',
			[
				'label' => __( 'Description', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'description_section_show',
			[
				'label'   => __( 'Show', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Text', STAX_EL_DOMAIN ),
				'type'        => Controls_Manager::WYSIWYG,
				'rows'        => 10,
				'label_block' => true,
				'default'     => __( 'Read more below and start learning new techniques to grow your business. Real examples from real people!', STAX_EL_DOMAIN ),
				'placeholder' => __( 'Description', STAX_EL_DOMAIN ),
				'condition'   => [
					'description_section_show' => 'yes'
				],
				'dynamic'     => [
					'active' => true,
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'separator_section',
			[
				'label' => __( 'Separator', STAX_EL_DOMAIN ),
			]
		);

		$this->add_control(
			'show_separator', [
				'label'   => __( 'Show', STAX_EL_DOMAIN ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'separator_position',
			[
				'label'     => __( 'Position', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'top'    => __( 'Top', STAX_EL_DOMAIN ),
					'before' => __( 'Before Title', STAX_EL_DOMAIN ),
					'after'  => __( 'After Title', STAX_EL_DOMAIN ),
					'bottom' => __( 'Bottom', STAX_EL_DOMAIN ),
				],
				'default'   => 'after',
				'condition' => [
					'show_separator' => 'yes',
				],
			]
		);

		$this->add_control(
			'separator_style',
			[
				'label'     => __( 'Style', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'stx-one-line'         => __( 'One line', STAX_EL_DOMAIN ),
					'stx-glow'             => __( 'Glow line', STAX_EL_DOMAIN ),
					'stx-gradient'         => __( 'Gradient', STAX_EL_DOMAIN ),
					'stx-donotcross'       => __( 'Cross line', STAX_EL_DOMAIN ),
					'stx-separator-custom' => __( 'Custom', STAX_EL_DOMAIN ),
				],
				'default'   => 'stx-one-line',
				'condition' => [
					'show_separator' => 'yes',
				],
			]
		);

		$this->add_control(
			'separator_image',
			[
				'label'     => __( 'Choose Image', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => '',
				],
				'condition' => [
					'show_separator'  => 'yes',
					'separator_style' => 'stx-separator-custom',
				],
				'dynamic'   => [
					'active' => true,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'separator_image_size',
				'default'   => 'large',
				'condition' => [
					'show_separator'  => 'yes',
					'separator_style' => 'stx-separator-custom',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'General', STAX_EL_DOMAIN ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_align',
			[
				'label'        => __( 'Alignment', STAX_EL_DOMAIN ),
				'type'         => Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => __( 'Left', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-center',
					],
					'right'  => [
						'title' => __( 'Right', STAX_EL_DOMAIN ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section_style', [
				'label' => __( 'Title', STAX_EL_DOMAIN ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'title_shadow',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title',
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => __( 'Margin', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_hr',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'title_line_width',
			[
				'label'     => __( 'Line Width', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'   => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span:before, {{WRAPPER}} .stx-title-wrapper .stx-title > span:after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_ornament!' => ''
				]
			]
		);

		$this->add_control(
			'title_line_height',
			[
				'label'     => __( 'Line Height', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 2,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span:before, {{WRAPPER}} .stx-title-wrapper .stx-title > span:after' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_ornament!' => ''
				]
			]
		);

		$this->add_control(
			'title_line_spacing',
			[
				'label'     => __( 'Spacing', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span:before' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span:after'  => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'title_ornament!' => ''
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'title_light_color',
				'label'     => __( 'Background', STAX_EL_DOMAIN ),
				'types'     => [ 'classic', 'gradient' ],
				'selector'  => '{{WRAPPER}} .stx-title-wrapper .stx-title > span:before, {{WRAPPER}} .stx-title-wrapper .stx-title > span:after',
				'condition' => [
					'title_ornament!' => ''
				]
			]
		);

		$this->add_responsive_control(
			'title_line_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span:before, {{WRAPPER}} .stx-title-wrapper .stx-title > span:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'title_ornament!' => ''
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'highlighted_section_title_style', [
				'label' => __( 'Title highlight', STAX_EL_DOMAIN ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'highlighted_title_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#FF5555',
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'highlighted_title_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'highlighted_title_shadow',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight',
			]
		);

		$this->add_responsive_control(
			'highlighted_title_secondary_spacing',
			[
				'label'      => __( 'Padding', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'highlighted_title_secondary_bg',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight',
			]
		);

		$this->add_control(
			'highlighted_title_secondary_border_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title span.stx-highlight' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_section_style', [
				'label'     => __( 'Subtitle', STAX_EL_DOMAIN ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle_show' => 'yes',
					'subtitle!'     => ''
				]
			]
		);

		$this->add_responsive_control(
			'subtitle_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-subtitle',
			]
		);

		$this->add_responsive_control(
			'subtitle_margin',
			[
				'label'      => __( 'Margin', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'subtitle_secondary_bg',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-subtitle',
			]
		);

		$this->add_control(
			'subtitle_border_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-subtitle' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'description_section_style', [
				'label'     => __( 'Description', STAX_EL_DOMAIN ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'description_section_show' => 'yes',
					'description!'             => ''
				]
			]
		);

		$this->add_responsive_control(
			'description_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-description p, {{WRAPPER}} .stx-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .stx-description p, {{WRAPPER}} .stx-description',
			]
		);

		$this->add_responsive_control(
			'description_margin',
			[
				'label'      => __( 'Margin', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'separator_section_style', [
				'label'     => __( 'Separator', STAX_EL_DOMAIN ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_separator' => 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'separator_width',
			[
				'label'      => __( 'Width', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .stx-separator-wrapper .stx-divider' => 'width: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'separator_style!' => 'stx-separator-custom'
				]
			]
		);

		$this->add_control(
			'separator_one_line_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-one-line:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'separator_style' => 'stx-one-line'
				]
			]
		);

		$this->add_control(
			'separator_one_line_height',
			[
				'label'     => __( 'Height', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-one-line:before' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'separator_style' => 'stx-one-line'
				]
			]
		);

		$this->add_responsive_control(
			'separator_one_line_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-divider.stx-one-line:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'separator_style' => 'stx-one-line'
				]
			]
		);

		$this->add_control(
			'separator_glow_height',
			[
				'label'     => __( 'Height', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-glow:before' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'separator_style' => 'stx-glow'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'separator_glow_color',
				'label'     => __( 'Background', STAX_EL_DOMAIN ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .stx-divider.stx-glow:before',
				'condition' => [
					'separator_style' => 'stx-glow'
				]
			]
		);

		$this->add_responsive_control(
			'separator_glow_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-divider.stx-glow:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'separator_style' => 'stx-glow'
				]
			]
		);

		$this->add_control(
			'separator_gradient_height',
			[
				'label'     => __( 'Height', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-gradient:before' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'separator_style' => 'stx-gradient'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'separator_gradient_color',
				'label'     => __( 'Background', STAX_EL_DOMAIN ),
				'types'     => [ 'gradient' ],
				'selector'  => '{{WRAPPER}} .stx-divider.stx-gradient:before',
				'condition' => [
					'separator_style' => 'stx-gradient'
				]
			]
		);

		$this->add_responsive_control(
			'separator_gradient_radius',
			[
				'label'      => __( 'Border Radius', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-divider.stx-gradient:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'  => [
					'separator_style' => 'stx-gradient'
				]
			]
		);

		$this->add_control(
			'separator_donotcross_height',
			[
				'label'     => __( 'Height', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-donotcross' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'separator_style' => 'stx-donotcross'
				]
			]
		);

		$this->add_control(
			'separator_donotcross_color', [
				'label'     => __( 'Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-donotcross' => 'background: {{VALUE}};',
				],
				'condition' => [
					'separator_style' => 'stx-donotcross'
				]
			]
		);

		$this->add_control(
			'separator_donotcross_gap_color', [
				'label'     => __( 'Gap Color', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-donotcross:before' => 'background: {{VALUE}};',
				],
				'condition' => [
					'separator_style' => 'stx-donotcross'
				]
			]
		);

		$this->add_control(
			'separator_donotcross_gap_size',
			[
				'label'     => __( 'Gap Size', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-donotcross:before' => 'padding: {{SIZE}}{{UNIT}} 0;',
				],
				'condition' => [
					'separator_style' => 'stx-donotcross'
				]
			]
		);

		$this->add_control(
			'separator_donotcross_gap_rotate',
			[
				'label'     => __( 'Gap Rotate', STAX_EL_DOMAIN ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 180,
						'step' => 1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 45,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-divider.stx-donotcross:before' => 'transform: rotate({{SIZE}}deg);',
				],
				'condition' => [
					'separator_style' => 'stx-donotcross'
				]
			]
		);

		$this->add_responsive_control(
			'separator_margin',
			[
				'label'      => __( 'Margin', STAX_EL_DOMAIN ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-separator-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'stx-title-wrapper' );

		?>

        <div <?php echo $this->get_render_attribute_string( 'wrapper' ); ?>>
			<?php

			$this->show_separator( 'top' );
			$this->show_subtitle( 'before_title' );
			$this->show_separator( 'before' );

			?>

			<?php

			if ( ! empty( $settings['title'] ) ) {
				echo '<' . $settings['title_tag'] . ' class="stx-title"><span class="' . esc_attr__( $settings['title_ornament'] ) . '">
					' . \StaxAddons\Utils::curly( $settings['title'] ) . '
				</span></' . $settings['title_tag'] . '>';
			}

			?>

			<?php

			$this->show_separator( 'after' );
			$this->show_subtitle( 'after_title' );

			if ( ! empty( $settings['description'] ) && $settings['description_section_show'] === 'yes' ) {
				?>
                <div class="stx-description"><?php echo $settings['description']; ?></div>
				<?php
			}

			?>

			<?php $this->show_separator( 'bottom' ); ?>

        </div>
		<?php
	}

	protected function show_separator( $position ) {
		$settings = $this->get_settings_for_display();

		$image_html = '';

		if ( ! empty( $settings['separator_image']['url'] ) ) {
			$this->add_render_attribute( 'image', 'src', $settings['separator_image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['separator_image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['separator_image'] ) );

			$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'separator_image_size', 'separator_image' );
		}

		if ( $settings['separator_style'] !== 'stx-separator-custom' ) {
			$separator = $settings['show_separator'] === 'yes' ? '<div class="stx-separator-wrapper"><div class="stx-divider ' . $settings['separator_style'] . '"></div></div>' : '';
		} else {
			$separator = $settings['show_separator'] === 'yes' ? '<div class="stx-separator-wrapper ' . $settings['separator_style'] . '"><div class="' . $settings['separator_style'] . '">' . $image_html . '</div></div>' : '';
		}

		if ( $settings['separator_position'] === $position ) {
			echo $separator;
		}
	}

	protected function show_subtitle( $position ) {
		$settings = $this->get_settings_for_display();

		if ( $settings['subtitle_position'] === $position && ! empty( $settings['subtitle'] ) && $settings['subtitle_show'] === 'yes' ) {
			echo '<' . $settings['subtitle_tag'] . ' class="stx-subtitle">' . esc_html( $settings['subtitle'] ) . '</' . $settings['subtitle_tag'] . '>';
		}
	}

}
