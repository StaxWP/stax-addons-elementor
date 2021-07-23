<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_pricing_table_variation_cascading' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_pricing_table_variation_cascading( $variations ) {

		$variations['cascading'] = esc_html__( 'Cascading', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_layouts', 'qi_addons_for_elementor_add_pricing_table_variation_cascading' );
}

if ( ! function_exists( 'qi_addons_for_elementor_pricing_table_cascading_add_extra_options' ) ) {
	function qi_addons_for_elementor_pricing_table_cascading_add_extra_options( $extra_options, $this_shortcode ) {
		$cascading = [];

		$title_background_color = [
			'field_type' => 'color',
			'name'       => 'title_background_color',
			'title'      => esc_html__( 'Title Background Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-title' => 'background-color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'cascading',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
		];

		$title_padding = [
			'field_type' => 'dimensions',
			'name'       => 'title_padding',
			'title'      => esc_html__( 'Title Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'cascading',
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Title Style', 'stax-addons-for-elementor' ),
		];

		$cascading[] = $title_background_color;
		$cascading[] = $title_padding;

		return array_merge( $extra_options, $cascading );
	}

	add_filter( 'qi_addons_for_elementor_filter_pricing_table_extra_options', 'qi_addons_for_elementor_pricing_table_cascading_add_extra_options', 10, 2 );
}
