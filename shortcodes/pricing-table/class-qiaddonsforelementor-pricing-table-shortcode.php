<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_pricing_table_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_pricing_table_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Pricing_Table_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_pricing_table_shortcode' );
}

if ( class_exists( 'QiAddonsForElementor_Shortcode' ) ) {
	class QiAddonsForElementor_Pricing_Table_Shortcode extends QiAddonsForElementor_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'qi_addons_for_elementor_filter_pricing_table_layouts', [] ) );
			$this->set_extra_options( apply_filters( 'qi_addons_for_elementor_filter_pricing_table_extra_options', [], $this ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/pricing-table' );
			$this->set_base( 'qi_addons_for_elementor_pricing_table' );
			$this->set_name( esc_html__( 'Pricing Table', 'stax-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that adds pricing table element', 'stax-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'stax-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Business', 'stax-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/stax-addons-for-elementor/pricing-table/' );
			$this->set_documentation( 'https://qodeinteractive.com/stax-addons-for-elementor/documentation/#2_pricing_table' );
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
					'default_value' => 'standard',
					'visibility'    => [ 'map_for_page_builder' => $options_map['visibility'] ],
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'featured_table',
					'title'         => esc_html__( 'Featured Table', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
				]
			);
			$this->set_option(
				[
					'field_type' => 'choose',
					'name'       => 'alignment',
					'title'      => esc_html__( 'Alignment', 'stax-addons-for-elementor' ),
					'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false, [ 'right' ] ),
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-pricing-table' => 'text-align: {{VALUE}};',
						'{{WRAPPER}} .qodef-period--side:not(.qodef-layout--simple) .qodef-m-price' => 'justify-content: {{VALUE}};',
						'{{WRAPPER}} .qodef-period--bottom:not(.qodef-layout--simple) .qodef-m-price' => 'align-items: {{VALUE}};',
					],
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'table_background_color',
					'title'      => esc_html__( 'Background Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-pricing-table' => 'background-color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'border',
					'name'       => 'table_border',
					'title'      => esc_html__( 'Border', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-pricing-table',
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
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
					'field_type' => 'select',
					'name'       => 'title_tag',
					'title'      => esc_html__( 'Title Tag', 'stax-addons-for-elementor' ),
					'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag' ),
					'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-title' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'title_typography',
					'title'      => esc_html__( 'Title Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-title',
					'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'title_margin',
					'title'      => esc_html__( 'Title Margin', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type'    => 'number',
					'name'          => 'price',
					'title'         => esc_html__( 'Price', 'stax-addons-for-elementor' ),
					'default_value' => 35,
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'price_color',
					'title'      => esc_html__( 'Price Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-value' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'price_typography',
					'title'      => esc_html__( 'Price Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-price-value',
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'currency',
					'title'         => esc_html__( 'Currency', 'stax-addons-for-elementor' ),
					'default_value' => '$',
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'currency_color',
					'title'      => esc_html__( 'Currency Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-currency' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'currency_typography',
					'title'      => esc_html__( 'Currency Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-price-currency',
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'period',
					'title'         => esc_html__( 'Period', 'stax-addons-for-elementor' ),
					'default_value' => '/mo',
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'period_position',
					'title'         => esc_html__( 'Period Position', 'stax-addons-for-elementor' ),
					'options'       => [
						'side'   => esc_html__( 'Side', 'stax-addons-for-elementor' ),
						'bottom' => esc_html__( 'Bottom', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'side',
					'group'         => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'period_color',
					'title'      => esc_html__( 'Period Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-period' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'period_typography',
					'title'      => esc_html__( 'Period Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-price-period',
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'price_margin',
					'title'      => esc_html__( 'Price Margin', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'currency_margin',
					'title'      => esc_html__( 'Currency Margin', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-currency' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'period_margin',
					'title'      => esc_html__( 'Period Margin', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-price-period' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Price Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'label',
					'title'         => esc_html__( 'Label', 'stax-addons-for-elementor' ),
					'default_value' => esc_html__( 'New', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'label_type',
					'title'         => esc_html__( 'Label Type', 'stax-addons-for-elementor' ),
					'options'       => [
						'badge'  => esc_html__( 'Badge', 'stax-addons-for-elementor' ),
						'ribbon' => esc_html__( 'Ribbon', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'badge',
					'group'         => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'label_color',
					'title'      => esc_html__( 'Label Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-label' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'label_background_color',
					'title'      => esc_html__( 'Label Background Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-label' => 'background-color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'label_typography',
					'title'      => esc_html__( 'Label Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-label',
					'group'      => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'label_padding',
					'title'      => esc_html__( 'Label Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'label_border_radius',
					'title'      => esc_html__( 'Label Border Radius', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-label-type--badge .qodef-m-label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'dependency' => [
						'show' => [
							'label_type' => [
								'values'        => 'badge',
								'default_value' => 'badge',
							],
						],
					],
					'group'      => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'         => 'dimensions',
					'name'               => 'label_position',
					'title'              => esc_html__( 'Label Position', 'stax-addons-for-elementor' ),
					'size_units'         => [ 'px', '%', 'em' ],
					'allowed_dimensions' => [ 'top', 'right' ],
					'responsive'         => true,
					'selectors'          => [
						'{{WRAPPER}} .qodef-m-label' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
					],
					'group'              => esc_html__( 'Label Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'select',
					'name'       => 'enable_separator',
					'title'      => esc_html__( 'Enable Separator', 'stax-addons-for-elementor' ),
					'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
				]
			);

			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'list_type',
					'title'         => esc_html__( 'List Type', 'stax-addons-for-elementor' ),
					'options'       => [
						'unordered' => esc_html__( 'Unordered', 'stax-addons-for-elementor' ),
						'ordered'   => esc_html__( 'Ordered', 'stax-addons-for-elementor' ),
						'none'      => esc_html__( 'None', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'unordered',
					'group'         => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'list_style_position',
					'title'         => esc_html__( 'List Style Position', 'stax-addons-for-elementor' ),
					'options'       => [
						'outside' => esc_html__( 'Outside', 'stax-addons-for-elementor' ),
						'inside'  => esc_html__( 'Inside', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'inside',
					'group'         => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'icons',
					'name'          => 'icon',
					'title'         => esc_html__( 'Items Icon', 'stax-addons-for-elementor' ),
					'dependency'    => [
						'show' => [
							'list_type' => [
								'values'        => 'unordered',
								'default_value' => 'unordered',
							],
						],
					],
					'default_value' => [],
					'group'         => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'icon_color',
					'title'      => esc_html__( 'Items Icon Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-item .qodef-e-icon' => 'color: {{VALUE}};',
					],
					'dependency' => [
						'show' => [
							'list_type' => [
								'values'        => 'unordered',
								'default_value' => 'unordered',
							],
						],
					],
					'group'      => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'icon_size',
					'title'      => esc_html__( 'Items Icon Size', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-item .qodef-e-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'dependency' => [
						'show' => [
							'list_type' => [
								'values'        => 'unordered',
								'default_value' => 'unordered',
							],
						],
					],
					'group'      => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'icon_margin_right',
					'title'      => esc_html__( 'Items Icon Margin Right', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', 'em', '%' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-item .qodef-e-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
					],
					'dependency' => [
						'show' => [
							'list_type' => [
								'values'        => 'unordered',
								'default_value' => 'unordered',
							],
						],
					],
					'group'      => esc_html__( 'List Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'repeater',
					'name'          => 'children',
					'title'         => esc_html__( 'Items', 'stax-addons-for-elementor' ),
					'default_value' => [
						[
							'item_text' => esc_html__( 'Lorem ipsum dolor et sit amet', 'stax-addons-for-elementor' ),
						],
						[
							'item_text' => esc_html__( 'Lorem ipsum dolor et sit amet', 'stax-addons-for-elementor' ),
						],
						[
							'item_text' => esc_html__( 'Lorem ipsum dolor et sit amet', 'stax-addons-for-elementor' ),
						],
					],
					'items'         => [
						[
							'field_type'    => 'text',
							'name'          => 'item_text',
							'title'         => esc_html__( 'Text', 'stax-addons-for-elementor' ),
							'default_value' => esc_html__( 'Lorem ipsum dolor et sit amet', 'stax-addons-for-elementor' ),
						],
						[
							'field_type'    => 'select',
							'name'          => 'item_excluded',
							'title'         => esc_html__( 'Excluded', 'stax-addons-for-elementor' ),
							'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
							'default_value' => 'no',
						],
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'item_color',
					'title'      => esc_html__( 'Items Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-content' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Items Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'excluded_item_color',
					'title'      => esc_html__( 'Excluded Items Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-content .qodef--excluded' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Items Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'items_typography',
					'title'      => esc_html__( 'Items Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-m-content',
					'group'      => esc_html__( 'Items Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->import_shortcode_options(
				[
					'shortcode_base'    => 'qi_addons_for_elementor_button',
					'exclude'           => [ 'custom_class' ],
					'additional_params' => [
						'nested_group' => esc_html__( 'Button', 'stax-addons-for-elementor' ),
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'table_padding',
					'title'      => esc_html__( 'Table Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-pricing-table .qodef-m-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'dependency' => [
						'hide' => [
							'layout' => [
								'values'        => 'with-icon',
								'default_value' => 'standard',
							],
						],
					],
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'table_content_padding',
					'title'      => esc_html__( 'Table Content Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-pricing-table .qodef-m-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'dependency' => [
						'hide' => [
							'layout' => [
								'values'        => 'with-icon',
								'default_value' => 'standard',
							],
						],
					],
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'item_margin_bottom',
					'title'      => esc_html__( 'Item Margin Bottom', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-content li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Items Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'button_margin_top',
					'title'      => esc_html__( 'Button Margin Top', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-m-button .qodef-qi-button' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->import_shortcode_options(
				[
					'shortcode_base'    => 'qi_addons_for_elementor_separator',
					'exclude'           => [ 'custom_class' ],
					'additional_params' => [
						'nested_group' => esc_html__( 'Separator', 'stax-addons-for-elementor' ),
					],
				]
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']   = $this->get_holder_classes( $atts );
			$atts['button_params']    = $this->generate_button_params( $atts );
			$atts['list_tag']         = ( 'unordered' === $atts['list_type'] ) ? 'ul' : 'ol';
			$atts['items']            = $this->parse_repeater_items( $atts['children'] );
			$atts['separator_params'] = $this->generate_separator_params( $atts );

			return qi_addons_for_elementor_get_template_part( 'shortcodes/pricing-table', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-pricing-table';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['featured_table'] ) && 'yes' === $atts['featured_table'] ? 'qodef-status--featured' : 'qodef-status--regular';
			$holder_classes[] = ! empty( $atts['list_style_position'] ) ? 'qodef-list-style--' . $atts['list_style_position'] : '';
			$holder_classes[] = ! empty( $atts['list_type'] ) ? 'qodef-list-type--' . $atts['list_type'] : '';
			$holder_classes[] = ! empty( $atts['list_type'] ) && ( 'unordered' === $atts['list_type'] ) && ! empty( $atts['icon']['value'] ) ? 'qodef-list-style-icon' : '';
			$holder_classes[] = ! empty( $atts['label_type'] ) ? 'qodef-label-type--' . $atts['label_type'] : '';
			$holder_classes[] = ! empty( $atts['period_position'] ) ? 'qodef-period--' . $atts['period_position'] : '';

			return implode( ' ', $holder_classes );
		}

		private function generate_button_params( $atts ) {
			$params = [];

			if ( ! empty( $atts['button_text'] ) || ! empty( $atts['button_icon']['value'] ) ) {
				$params = $this->populate_imported_shortcode_atts(
					[
						'shortcode_base' => 'qi_addons_for_elementor_button',
						'exclude'        => [ 'custom_class' ],
						'atts'           => $atts,
					]
				);
			}

			return $params;
		}
		private function generate_separator_params( $atts ) {
			$params = [];

			if ( 'yes' === $atts['enable_separator'] ) {
				$params = $this->populate_imported_shortcode_atts(
					[
						'shortcode_base' => 'qi_addons_for_elementor_separator',
						'exclude'        => [ 'custom_class' ],
						'atts'           => $atts,
					]
				);
			}

			return $params;
		}
	}
}
