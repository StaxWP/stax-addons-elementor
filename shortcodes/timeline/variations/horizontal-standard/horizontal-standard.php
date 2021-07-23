<?php

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_standard( $variations ) {
		$variations['horizontal-standard'] = esc_html__( 'Horizontal Standard', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts', 'qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_standard' );
}

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $layouts
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_standard( $layouts ) {

		$layouts['horizontal-standard'] = 'horizontal';

		return $layouts;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts_type', 'qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_standard', 10, 2 );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_timeline_horizontal_standard_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_timeline_horizontal_standard_options( $options ) {
		$horizontal_standard = [];

		$space_from_center = [
			'field_type' => 'slider',
			'name'       => 'horizontal_standard_space_from_center',
			'title'      => esc_html__( 'Space From Center', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 500,
				],
				'%'  => [
					'min' => 1,
					'max' => 40,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-standard .qodef-e-top-holder'     => 'padding: 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-standard .qodef-e-content-holder' => 'padding: {{SIZE}}{{UNIT}} 0 0;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'horizontal-standard',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$horizontal_standard[] = $space_from_center;

		return array_merge( $options, $horizontal_standard );
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_extra_options', 'qi_addons_for_elementor_add_timeline_horizontal_standard_options' );
}
