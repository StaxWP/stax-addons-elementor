<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_info_cards_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_info_cards_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Info_Cards_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_info_cards_shortcode' );
}

if ( class_exists( 'QiAddonsForElementor_Shortcode' ) ) {
	class QiAddonsForElementor_Info_Cards_Shortcode extends QiAddonsForElementor_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'qi_addons_for_elementor_filter_info_cards_layouts', [] ) );

			$options_map   = qi_addons_for_elementor_get_variations_options_map( $this->get_layouts() );
			$default_value = $options_map['default_value'];

			$this->set_extra_options( apply_filters( 'qi_addons_for_elementor_filter_info_cards_extra_options', [], $default_value ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/info-cards' );
			$this->set_base( 'qi_addons_for_elementor_info_cards' );
			$this->set_name( esc_html__( 'Info Box', 'stax-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that adds info box element', 'stax-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'stax-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Business', 'stax-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/stax-addons-for-elementor/info-box/' );
			$this->set_documentation( 'https://qodeinteractive.com/stax-addons-for-elementor/documentation/#4_info_box' );
			$this->set_necessary_styles( qi_addons_for_elementor_icon_necessary_styles() );

			$this->set_option(
				[
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'stax-addons-for-elementor' ),
				]
			);
			$options_map = qi_addons_for_elementor_get_variations_options_map( $this->get_layouts() );
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => [ 'map_for_page_builder' => $options_map['visibility'] ],
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'subtitle',
					'title'         => esc_html__( 'Subtitle', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text( 'subtitle' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text( 'title' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'textarea',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text(),
				]
			);
			$this->set_option(
				[
					'field_type' => 'icons',
					'name'       => 'icon_type',
					'title'      => esc_html__( 'Icon Type', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'link',
					'name'       => 'link',
					'title'      => esc_html__( 'Link', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'select',
					'name'       => 'enable_link_overlay',
					'title'      => esc_html__( 'Enable Link Overlay', 'stax-addons-for-elementor' ),
					'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'yes_no', false ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'min_height',
					'title'      => esc_html__( 'Min Height', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', 'vh' ],
					'range'      => [
						'px' => [
							'min' => 0,
							'max' => 500,
						],
					],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards' => 'min-height: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'vertical_alignment',
					'title'         => esc_html__( 'Content Vertical Alignment', 'stax-addons-for-elementor' ),
					'options'       => [
						'flex-start' => esc_html__( 'Top', 'stax-addons-for-elementor' ),
						'center'     => esc_html__( 'Middle', 'stax-addons-for-elementor' ),
						'flex-end'   => esc_html__( 'Bottom', 'stax-addons-for-elementor' ),
					],
					'selectors'     => [
						'{{WRAPPER}} .qodef-qi-info-cards' => 'justify-content: {{VALUE}};',
					],
					'default_value' => 'flex-start',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'choose',
					'name'          => 'alignment',
					'title'         => esc_html__( 'Alignment', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false ),
					'selectors'     => [
						'{{WRAPPER}} .qodef-qi-info-cards' => 'text-align: {{VALUE}};',
					],
					'default_value' => 'center',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_align_background',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'start_controls_tabs',
					'name'       => 'background_style_tabs',
					'title'      => esc_html__( 'Background Start', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'start_controls_tab',
					'name'       => 'background_tab_normal',
					'title'      => esc_html__( 'Normal', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'background',
					'name'       => 'holder_background',
					'title'      => esc_html__( 'Holder Background', 'stax-addons-for-elementor' ),
					'types'      => [ 'classic', 'gradient', 'video' ],
					'selector'   => '{{WRAPPER}} .qodef-qi-info-cards',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'end_controls_tab',
					'name'       => 'background_tab_normal_end',
					'title'      => esc_html__( 'Normal End', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'start_controls_tab',
					'name'       => 'background_tab_hover',
					'title'      => esc_html__( 'Hover', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'holder_background_hover',
					'title'      => esc_html__( 'Hover Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards:hover' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->set_option(
				[
					'field_type' => 'end_controls_tab',
					'name'       => 'background_tab_hover_end',
					'title'      => esc_html__( 'Hover End', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'end_controls_tabs',
					'name'       => 'background_style_tabs_end',
					'title'      => esc_html__( 'Icon End', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_background_title',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h2',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-title' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'title_hover_color',
					'title'      => esc_html__( 'Title Hover Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-title:hover' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'title_typography',
					'title'      => esc_html__( 'Title Typography', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-title',
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_title_subtitle',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-subtitle' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'subtitle_typography',
					'title'      => esc_html__( 'Subtitle Typography', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-subtitle',
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_subtitle_text',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-content .qodef-m-text' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'text_typography',
					'title'      => esc_html__( 'Text Typography', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-content .qodef-m-text',
				]
			);
			$this->set_option(
				[
					'field_type'    => 'choose',
					'name'          => 'icon_alignment',
					'title'         => esc_html__( 'Icon Alignment', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false ),
					'selectors'     => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-wrapper' => 'text-align: {{VALUE}};',
					],
					'default_value' => 'center',
					'group'         => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'icon_size',
					'title'      => esc_html__( 'Icon Size', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', 'em' ],
					'range'      => [
						'px' => [
							'min' => 0,
							'max' => 300,
						],
					],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards.qodef--icon-pack .qodef-m-icon-holder'        => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .qodef-qi-info-cards.qodef--custom-icon .qodef-m-icon-wrapper svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'icon_color',
					'title'      => esc_html__( 'Icon Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-holder'   => 'color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-holder a' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'icon_hover_color',
					'title'      => esc_html__( 'Icon Hover Color', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-holder:hover'                => 'color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-holder a:hover'              => 'color: {{VALUE}};',
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-title:hover .qodef-m-icon-holder' => 'color: {{VALUE}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'holder_padding',
					'title'      => esc_html__( 'Holder Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}}  .qodef-qi-info-cards' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_spacing_holder_text',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'subtitle_margin_bottom',
					'title'      => esc_html__( 'Subtitle Margin Bottom', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'title_margin_bottom',
					'title'      => esc_html__( 'Title Margin Bottom', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'text_margin_bottom',
					'title'      => esc_html__( 'Text Margin Bottom', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-content .qodef-m-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'text_padding',
					'title'      => esc_html__( 'Text Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-content .qodef-m-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_spacing_text_icon',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'icon_margin',
					'title'      => esc_html__( 'Icon Margin', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-info-cards .qodef-m-icon-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->import_shortcode_options(
				[
					'shortcode_base'    => 'qi_addons_for_elementor_button',
					'exclude'           => [ 'custom_class', 'button_link' ],
					'additional_params' => [
						'nested_group' => esc_html__( 'Button', 'stax-addons-for-elementor' ),
					],
				]
			);
			$this->map_extra_options();
		}

		public function load_assets() {
			parent::load_assets();

			qi_addons_for_elementor_icon_load_assets();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );

			return qi_addons_for_elementor_get_template_part( 'shortcodes/info-cards', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-info-cards';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = 'yes' === $atts['enable_link_overlay'] ? 'qodef-link-overlay' : '';

			$icon_class = '';

			if ( ! empty( $atts['icon_type']['value'] ) ) {
				if ( is_string( $atts['icon_type']['value'] ) ) {
					$icon_class = 'icon-pack';
				} else {
					$icon_class = 'custom-icon';
				}
			}

			$holder_classes[] = 'qodef--' . $icon_class;

			$holder_classes = apply_filters( 'qi_addons_for_elementor_filter_info_cards_variation_classes', $holder_classes, $atts );

			return implode( ' ', $holder_classes );
		}

		private function generate_button_params( $atts ) {

			if ( ! empty( $atts['link']['url'] ) ) {
				$atts['button_link'] = $atts['link'];

				return $this->populate_imported_shortcode_atts(
					[
						'shortcode_base' => 'qi_addons_for_elementor_button',
						'exclude'        => [ 'custom_class' ],
						'atts'           => $atts,
					]
				);
			}

			return [];
		}
	}
}
