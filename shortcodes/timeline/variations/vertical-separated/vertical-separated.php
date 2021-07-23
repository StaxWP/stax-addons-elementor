<?php

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_separated' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_separated( $variations ) {
		$variations['vertical-separated'] = esc_html__( 'Vertical Separated', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts', 'qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_separated' );
}

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_type_vertical_separated' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $layouts
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_type_vertical_separated( $layouts ) {

		$layouts['vertical-separated'] = 'vertical';

		return $layouts;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts_type', 'qi_addons_for_elementor_filter_timeline_layouts_type_vertical_separated', 10, 2 );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_timeline_vertical_separated_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_timeline_vertical_separated_options( $options ) {
		$vertical_separated = [];

		$side_width = [
			'field_type' => 'slider',
			'name'       => 'vertical_separated_side_width',
			'title'      => esc_html__( 'Sides Width', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'vw' ],
			'range'      => [
				'px' => [
					'min' => 100,
					'max' => 500,
				],
				'%'  => [
					'min' => 1,
					'max' => 50,
				],
				'vw' => [
					'min' => 1,
					'max' => 50,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-side-holder' => 'width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-content-holder' => 'width: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-separated',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$space_from_center = [
			'field_type' => 'slider',
			'name'       => 'vertical_separated_space_from_center',
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
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-side-holder'                                => 'padding: 0 {{SIZE}}{{UNIT}} 0 0;',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-content-holder'                             => 'padding: 0 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-item.qodef-reverse .qodef-e-side-holder'    => 'padding: 0 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-separated .qodef-e-item.qodef-reverse .qodef-e-content-holder' => 'padding: 0 {{SIZE}}{{UNIT}} 0 0;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-separated',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$vertical_separated[] = $side_width;
		$vertical_separated[] = $space_from_center;

		return array_merge( $options, $vertical_separated );
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_extra_options', 'qi_addons_for_elementor_add_timeline_vertical_separated_options' );
}
