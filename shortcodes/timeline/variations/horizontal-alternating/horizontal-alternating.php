<?php

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_alternating' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_alternating( $variations ) {
		$variations['horizontal-alternating'] = esc_html__( 'Horizontal Alternating', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts', 'qi_addons_for_elementor_filter_timeline_layouts_variation_horizontal_alternating' );
}

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_alternating' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $layouts
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_alternating( $layouts ) {

		$layouts['horizontal-alternating'] = 'horizontal';

		return $layouts;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts_type', 'qi_addons_for_elementor_filter_timeline_layouts_type_horizontal_alternating', 10, 2 );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_timeline_horizontal_alternating_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_timeline_horizontal_alternating_options( $options ) {
		$horizontal_alternating = [];

		$space_from_center = [
			'field_type' => 'slider',
			'name'       => 'horizontal_alternating_space_from_center',
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
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-alternating .qodef-e-top-holder'                                => 'padding: {{SIZE}}{{UNIT}} 0 0;',
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-alternating .qodef-e-content-holder'                             => 'padding: 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-alternating .qodef-e-item.qodef-reverse .qodef-e-top-holder'    => 'padding: 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--horizontal-alternating .qodef-e-item.qodef-reverse .qodef-e-content-holder' => 'padding: {{SIZE}}{{UNIT}} 0 0;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'horizontal-alternating',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$horizontal_alternating[] = $space_from_center;

		return array_merge( $options, $horizontal_alternating );
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_extra_options', 'qi_addons_for_elementor_add_timeline_horizontal_alternating_options' );
}
