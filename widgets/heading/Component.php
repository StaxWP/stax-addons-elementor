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
		return __( 'Heading', 'stax-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Text', 'stax-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Highlight title words by wrapping them in curly brackets like {{beautiful}}', 'stax-elementor' ),
				'label_block' => true,
				'placeholder' => esc_html__( 'Tips to {{grow}} your business', 'stax-elementor' ),
				'default'     => esc_html__( 'Tips to {{grow}} your business', 'stax-elementor' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'stax-elementor' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => esc_html__( 'Subtitle', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'subtitle_show',
			[
				'label'   => esc_html__( 'Show', 'stax-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Text', 'stax-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Learn from the market leaders', 'stax-elementor' ),
				'default'     => esc_html__( 'Learn from the market leaders', 'stax-elementor' ),
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
				'label'     => esc_html__( 'Position', 'stax-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'after_title',
				'options'   => [
					'before_title' => esc_html__( 'Before Title', 'stax-elementor' ),
					'after_title'  => esc_html__( 'After Title', 'stax-elementor' ),
				],
				'condition' => [
					'subtitle_show' => 'yes'
				]
			]
		);

		$this->add_control(
			'subtitle_tag',
			[
				'label'     => esc_html__( 'HTML Tag', 'stax-elementor' ),
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
				'label' => esc_html__( 'Description', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'description_section_show',
			[
				'label'   => esc_html__( 'Show', 'stax-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Text', 'stax-elementor' ),
				'type'        => Controls_Manager::WYSIWYG,
				'rows'        => 10,
				'label_block' => true,
				'default'     => esc_html__( 'Read more below and start learning new techniques to grow your business. Real examples from real people!', 'stax-elementor' ),
				'placeholder' => esc_html__( 'Description', 'stax-elementor' ),
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
				'label' => esc_html__( 'Separator', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'show_separator', [
				'label'   => esc_html__( 'Show', 'stax-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'separator_position',
			[
				'label'     => esc_html__( 'Position', 'stax-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'top'    => esc_html__( 'Top', 'elementor' ),
					'before' => esc_html__( 'Before Title', 'elementor' ),
					'after'  => esc_html__( 'After Title', 'elementor' ),
					'bottom' => esc_html__( 'Bottom', 'elementor' ),
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
				'label'     => esc_html__( 'Style', 'stax-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'stx-separator-dotted'       => esc_html__( 'Dotted', 'elementor' ),
					'stx-separator-solid'        => esc_html__( 'Solid', 'elementor' ),
					'stx-separator-solid-star'   => esc_html__( 'Solid with star', 'elementor' ),
					'stx-separator-solid-bullet' => esc_html__( 'Solid with bullet', 'elementor' ),
					'stx-separator-custom'       => esc_html__( 'Custom', 'elementor' ),
				],
				'default'   => 'stax-elementor-border-divider ekit-dotted',
				'condition' => [
					'show_separator' => 'yes',
				],
			]
		);

		$this->add_control(
			'separator_image',
			[
				'label'     => esc_html__( 'Choose Image', 'stax-elementor' ),
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
				'label' => esc_html__( 'General', 'stax-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_align',
			[
				'label'   => esc_html__( 'Alignment', 'stax-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'stx-align-left'   => [
						'title' => esc_html__( 'Left', 'stax-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'stx-align-center' => [
						'title' => esc_html__( 'Center', 'stax-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'stx-align-right'  => [
						'title' => esc_html__( 'Right', 'stax-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default' => 'text_left',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_section_style', [
				'label' => esc_html__( 'Title', 'stax-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'title_color', [
				'label'     => esc_html__( 'Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title' => 'color: {{VALUE}};',
				],
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
				'label'      => esc_html__( 'Margin', 'stax-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'highlighted_section_title_style', [
				'label' => esc_html__( 'Title highlight', 'stax-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'highlighted_title_color', [
				'label'     => esc_html__( 'Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#FF5555',
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'highlighted_title_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title > span',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'highlighted_title_shadow',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title > span',
			]
		);

		$this->add_responsive_control(
			'highlighted_title_secondary_spacing',
			[
				'label'      => esc_html__( 'Padding', 'stax-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'highlighted_title_secondary_bg',
				'selector' => '{{WRAPPER}} .stx-title-wrapper .stx-title > span',
			]
		);

		$this->add_control(
			'highlighted_title_secondary_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'stax-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-title > span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'subtitle_section_style', [
				'label'     => esc_html__( 'Subtitle', 'stax-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'subtitle_show' => 'yes',
					'subtitle!'     => ''
				]
			]
		);

		$this->add_responsive_control(
			'subtitle_color', [
				'label'     => esc_html__( 'Color', 'stax-elementor' ),
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
				'label'      => esc_html__( 'Margin', 'stax-elementor' ),
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
				'label'      => esc_html__( 'Border Radius', 'stax-elementor' ),
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
				'label'     => esc_html__( 'Description', 'stax-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'description_section_show' => 'yes',
					'description!'             => ''
				]
			]
		);

		$this->add_responsive_control(
			'description_color', [
				'label'     => esc_html__( 'Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .stx-title-wrapper p',
			]
		);

		$this->add_responsive_control(
			'description_margin',
			[
				'label'      => esc_html__( 'Margin', 'stax-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'separator_section_style', [
				'label'     => esc_html__( 'Separator', 'stax-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_separator' => 'yes'
				]
			]
		);
		$this->add_responsive_control(
			'separator_width',
			[
				'label'     => esc_html__( 'Width', 'stax-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default'   => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider'                           => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider.stax-elementor-style-long' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-star'                              => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'separator_style!' => 'stx-separator-custom'
				]
			]
		);

		$this->add_responsive_control(
			'separator_height',
			[
				'label'     => esc_html__( 'Height', 'stax-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default'   => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider, {{WRAPPER}} .stax-elementor-border-divider::before' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider.stax-elementor-style-long'                           => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-star'                                                        => 'height: {{SIZE}}{{UNIT}};',

				],
				'condition' => [
					'separator_style!' => 'stx-separator-custom'
				]
			]
		);

		$this->add_responsive_control(
			'separator_margin',
			[
				'label'      => esc_html__( 'Margin', 'stax-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .stx-title-wrapper .stx-separator-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'separator_color', [
				'label'     => esc_html__( 'Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider'                           => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{VALUE}} 100%);',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider:before'                    => 'background-color: {{VALUE}};box-shadow: 9px 0px 0px 0px {{VALUE}}, 18px 0px 0px 0px {{VALUE}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-divider.stax-elementor-style-long' => 'color: {{VALUE}};',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-star'                              => 'background: linear-gradient(90deg, {{VALUE}} 0%, {{VALUE}} 38%, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0) 62%, {{VALUE}} 62%, {{VALUE}} 100%);',
					'{{WRAPPER}} .stx-title-wrapper .stax-elementor-border-star:after'                        => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'separator_style!' => 'stx-separator-custom'
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$this->enqueue_resources();

		$settings = $this->get_settings_for_display();

		$image_html = '';

		if ( ! empty( $settings['separator_image']['url'] ) ) {
			$this->add_render_attribute( 'image', 'src', $settings['separator_image']['url'] );
			$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['separator_image'] ) );
			$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['separator_image'] ) );

			$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'separator_image_size', 'separator_image' );
		}

		$separator = '';
		if ( $settings['separator_style'] !== 'stx-separator-custom' ) {
			$separator = $settings['show_separator'] === 'yes' ? '<div class="stx-separator-wrapper ' . $settings['separator_style'] . '"><div class="' . $settings['separator_style'] . '"></div></div>' : '';
		} else {
			$separator = $settings['show_separator'] === 'yes' ? '<div class="stx-separator-wrapper ' . $settings['separator_style'] . '"><div class="' . $settings['separator_style'] . '">' . $image_html . '</div></div>' : '';
		}

		echo '<div class="stx-title-wrapper ' . $settings['title_align'] . ' tablet-' . $settings['title_align_tablet'] . ' mobile-' . $settings['title_align_mobile'] . '">';

		if ( $settings['separator_position'] === 'top' ) {
			echo $separator;
		}

		if ( $settings['subtitle_position'] === 'before_title' && ! empty( $settings['subtitle'] ) && $settings['subtitle_show'] === 'yes' ) {
			echo '<' . $settings['subtitle_tag'] . ' class="stx-subtitle">' . esc_html( $settings['subtitle'] ) . '</' . $settings['subtitle_tag'] . '>';
		}

		if ( $settings['separator_position'] === 'before' ) {
			echo $separator;
		}

		if ( ! empty( $settings['title'] ) ) {
			echo '<' . $settings['title_tag'] . ' class="stx-title">
					' . \StaxAddons\Utils::curly( $settings['title'] ) . '
				</' . $settings['title_tag'] . '>';
		}

		if ( $settings['separator_position'] === 'after' ) {
			echo $separator;
		}

		if ( $settings['subtitle_position'] === 'after_title' && ! empty( $settings['subtitle'] ) && $settings['subtitle_show'] === 'yes' ) {
			echo '<' . $settings['subtitle_tag'] . ' class="stx-subtitle ' . $sub_title_border . '">' . esc_html( $settings['subtitle'] ) . '</' . $settings['subtitle_tag'] . '>';
		}

		if ( ! empty( $settings['description'] ) && $settings['description_section_show'] === 'yes' ) {
			echo \StaxAddons\Utils::curly( $settings['description'] );
		}

		if ( $settings['separator_position'] === 'bottom' ) {
			echo $separator;
		}

		echo '</div>';
	}

	protected function _content_template() {
	}

}
