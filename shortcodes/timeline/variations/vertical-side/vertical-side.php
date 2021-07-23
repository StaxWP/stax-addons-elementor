<?php

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_side' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_side( $variations ) {
		$variations['vertical-side'] = esc_html__( 'Vertical Side', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts', 'qi_addons_for_elementor_filter_timeline_layouts_variation_vertical_side' );
}

if ( ! function_exists( 'qi_addons_for_elementor_filter_timeline_layouts_type_vertical_side' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param string $type
	 * @param string $layout
	 *
	 * @return string
	 */
	function qi_addons_for_elementor_filter_timeline_layouts_type_vertical_side( $layouts ) {

		$layouts['vertical-side'] = 'vertical';

		return $layouts;
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_layouts_type', 'qi_addons_for_elementor_filter_timeline_layouts_type_vertical_side', 10, 2 );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_timeline_vertical_side_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_timeline_vertical_side_options( $options ) {
		$vertical_side = [];

		$side_width = [
			'field_type' => 'slider',
			'name'       => 'vertical_side_side_width',
			'title'      => esc_html__( 'Side Width', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'vw' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 300,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-side-holder' => 'width: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-side',
						'default-value' => 'vertical-side',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$content_width = [
			'field_type' => 'slider',
			'name'       => 'vertical_side_content_width',
			'title'      => esc_html__( 'Content Width', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'vw' ],
			'range'      => [
				'px' => [
					'min' => 0,
					'max' => 300,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-content-holder' => 'width: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-side',
						'default-value' => 'vertical-side',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$item_side_padding = [
			'field_type' => 'slider',
			'name'       => 'vertical_side_item_side_padding',
			'title'      => esc_html__( 'Item Side Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-item-inner' => 'padding: 0 0 0 {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-item.qodef-reverse .qodef-e-item-inner' => 'padding: 0 {{SIZE}}{{UNIT}} 0 0;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-side',
						'default-value' => 'vertical-side',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$image_margin_right = [
			'field_type'  => 'dimensions',
			'name'        => 'vertical_side_image_margins',
			'title'       => esc_html__( 'Image Margins', 'stax-addons-for-elementor' ),
			'description' => esc_html__( 'Left/right margins will be mirrored for items on the right', 'stax-addons-for-elementor' ),
			'size_units'  => [ 'px', '%', 'em' ],
			'responsive'  => true,
			'selectors'   => [
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-side-holder'                             => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
				'{{WRAPPER}} .qodef-timeline-layout--vertical-side .qodef-e-item.qodef-reverse .qodef-e-side-holder' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency'  => [
				'show' => [
					'layout' => [
						'values'        => 'vertical-side',
						'default-value' => 'vertical-side',
					],
				],
			],
			'group'       => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$vertical_side[] = $side_width;
		$vertical_side[] = $content_width;
		$vertical_side[] = $item_side_padding;
		$vertical_side[] = $image_margin_right;

		return array_merge( $options, $vertical_side );
	}

	add_filter( 'qi_addons_for_elementor_filter_timeline_extra_options', 'qi_addons_for_elementor_add_timeline_vertical_side_options' );
}
