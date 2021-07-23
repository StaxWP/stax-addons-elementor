<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_separator_variation_with_icon' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_separator_variation_with_icon( $variations ) {
		$variations['with-icon'] = esc_html__( 'With Icon', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_separator_layouts', 'qi_addons_for_elementor_add_separator_variation_with_icon' );
}

if ( ! function_exists( 'qi_addons_for_elementor_separator_with_icon_add_extra_options' ) ) {
	function qi_addons_for_elementor_separator_with_icon_add_extra_options( $extra_options ) {
		$with_icon = [];

		$icon_field = [
			'field_type' => 'icons',
			'name'       => 'separator_icon',
			'title'      => esc_html__( 'Separator Icon', 'stax-addons-for-elementor' ),
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'with-icon' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Icon', 'stax-addons-for-elementor' ),
		];

		$icon_color = [
			'field_type' => 'color',
			'name'       => 'separator_icon_color',
			'title'      => esc_html__( 'icon Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-separator-icon' => 'color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'with-icon' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
		];

		$icon_font_size = [
			'field_type' => 'slider',
			'name'       => 'separator_icon_font_size',
			'title'      => esc_html__( 'Icon Font Size', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-separator-icon' => 'font-size: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'with-icon' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
		];

		$icon_margin = [
			'field_type' => 'dimensions',
			'name'       => 'separator_icon_margin',
			'title'      => esc_html__( 'Icon Margin', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-separator-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

			],
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'with-icon' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Icon Style', 'stax-addons-for-elementor' ),
		];

		$with_icon[] = $icon_field;
		$with_icon[] = $icon_color;
		$with_icon[] = $icon_font_size;
		$with_icon[] = $icon_margin;

		return array_merge( $extra_options, $with_icon );
	}

	add_filter( 'qi_addons_for_elementor_filter_separator_extra_options', 'qi_addons_for_elementor_separator_with_icon_add_extra_options' );
}
