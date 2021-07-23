<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_pricing_table_variation_vertical_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_pricing_table_variation_vertical_image( $variations ) {

		$variations['vertical-image'] = esc_html__( 'Vertical Image', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_layouts', 'qi_addons_for_elementor_add_pricing_table_variation_vertical_image' );
}

if ( ! function_exists( 'qi_addons_for_elementor_pricing_table_vertical_image_add_extra_options' ) ) {
	function qi_addons_for_elementor_pricing_table_vertical_image_add_extra_options( $extra_options ) {
		$vertical_image = [];

		$vertical_image_src = [
			'field_type' => 'image',
			'name'       => 'vertical_image',
			'title'      => esc_html__( 'Vertical Image', 'stax-addons-for-elementor' ),
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-image',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Vertical Image', 'stax-addons-for-elementor' ),
		];

		$vertical_image_proportions = [
			'field_type'    => 'select',
			'name'          => 'vertical_image_proportion',
			'default_value' => 'full',
			'title'         => esc_html__( 'Image Proportions', 'stax-addons-for-elementor' ),
			'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'list_image_dimension', false, [ 'custom' ] ),
			'dependency'    => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-image',
						'default_value' => 'standard',
					],
				],
			],
			'group'         => esc_html__( 'Vertical Image', 'stax-addons-for-elementor' ),
		];

		$vertical_image_width = [
			'field_type' => 'slider',
			'name'       => 'vertical_image_width',
			'title'      => esc_html__( 'Vertical Image Width', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'vw' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-vertical-image-holder' => 'width: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-image',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Vertical Image', 'stax-addons-for-elementor' ),
		];

		$vertical_image[] = $vertical_image_src;
		$vertical_image[] = $vertical_image_proportions;
		$vertical_image[] = $vertical_image_width;

		return array_merge( $extra_options, $vertical_image );
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_extra_options', 'qi_addons_for_elementor_pricing_table_vertical_image_add_extra_options' );
}
