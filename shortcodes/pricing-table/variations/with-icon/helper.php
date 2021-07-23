<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_pricing_table_variation_with_icon' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_pricing_table_variation_with_icon( $variations ) {

		$variations['with-icon'] = esc_html__( 'With Icon', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_layouts', 'qi_addons_for_elementor_add_pricing_table_variation_with_icon' );
}

if ( ! function_exists( 'qi_addons_for_elementor_pricing_table_with_icon_add_extra_options' ) ) {
	function qi_addons_for_elementor_pricing_table_with_icon_add_extra_options( $extra_options ) {
		$with_icon = [];

		$icon = [
			'field_type' => 'icons',
			'name'       => 'with_icon_icon',
			'title'      => esc_html__( 'Icon', 'stax-addons-for-elementor' ),
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
		];

		$icon_color = [
			'field_type' => 'color',
			'name'       => 'with_icon_icon_color',
			'title'      => esc_html__( 'Icon Color', 'stax-addons-for-elementor' ),
			'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-title-icon' => 'color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
		];

		$icon_size = [
			'field_type' => 'slider',
			'name'       => 'with_icon_icon_size',
			'title'      => esc_html__( 'Icon Size', 'stax-addons-for-elementor' ),
			'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-title-icon' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
		];

		$top_padding = [
			'field_type' => 'dimensions',
			'name'       => 'with_icon_top_area_padding',
			'title'      => esc_html__( 'Top Area Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--with-icon .qodef-m-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
		];

		$item_padding = [
			'field_type' => 'dimensions',
			'name'       => 'with_icon_item_padding',
			'title'      => esc_html__( 'Item Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--with-icon .qodef-m-content .qodef-e-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
		];

		$item_border_color = [
			'field_type' => 'color',
			'name'       => 'with_icon_item_border_color',
			'title'      => esc_html__( 'Item Border Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--with-icon .qodef-m-content .qodef-e-item' => 'border-top-color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
		];

		$item_border_width = [
			'field_type' => 'number',
			'name'       => 'with_icon_item_border_width',
			'title'      => esc_html__( 'Item Border Width (px)', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--with-icon .qodef-m-content .qodef-e-item' => 'border-top-width: {{VALUE}}px;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
		];

		$item_border_style = [
			'field_type' => 'select',
			'name'       => 'with_icon_item_border_style',
			'title'      => esc_html__( 'Item Border Style', 'stax-addons-for-elementor' ),
			'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'border_style' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--with-icon .qodef-m-content .qodef-e-item' => 'border-top-style: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'with-icon',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Table Style', 'stax-addons-for-elementor' ),
		];

		$with_icon[] = $icon;
		$with_icon[] = $icon_color;
		$with_icon[] = $icon_size;
		$with_icon[] = $top_padding;
		$with_icon[] = $item_padding;
		$with_icon[] = $item_border_color;
		$with_icon[] = $item_border_width;
		$with_icon[] = $item_border_style;

		return array_merge( $extra_options, $with_icon );
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_extra_options', 'qi_addons_for_elementor_pricing_table_with_icon_add_extra_options' );
}
