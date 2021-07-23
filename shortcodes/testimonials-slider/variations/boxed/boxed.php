<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_slider_variation_boxed' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_slider_variation_boxed( $variations ) {
		$variations['boxed'] = esc_html__( 'Boxed', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_slider_layouts', 'qi_addons_for_elementor_add_testimonials_slider_variation_boxed' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_slider_boxed_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_slider_boxed_options( $options ) {
		$boxed = [];

		$author_position = [
			'field_type' => 'slider',
			'name'       => 'boxed_author_position_margin_top',
			'title'      => esc_html__( 'Item Author Occupation Margin Top', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-author-job' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$image_margin_bottom = [
			'field_type' => 'slider',
			'name'       => 'boxed_image_margin_bottom',
			'title'      => esc_html__( 'Item Image Margin Bottom', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-media-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$quote_positions = [
			'field_type'         => 'dimensions',
			'name'               => 'boxed_quote_position',
			'title'              => esc_html__( 'Quote Position', 'stax-addons-for-elementor' ),
			'size_units'         => [ 'px', '%', 'em' ],
			'allowed_dimensions' => [ 'top', 'right' ],
			'responsive'         => true,
			'selectors'          => [
				'{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-quote' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
			],
			'dependency'         => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'              => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
		];

		$padding = [
			'field_type' => 'dimensions',
			'name'       => 'boxed_padding',
			'title'      => esc_html__( 'Boxed Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
		];

		$image_border_radius = [
			'field_type' => 'dimensions',
			'name'       => 'boxed_image_border_radius',
			'title'      => esc_html__( 'Image Border Radius', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-media-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
		];

		$image_background = [
			'field_type' => 'background',
			'name'       => 'boxed_item_background',
			'title'      => esc_html__( 'Item Background', 'stax-addons-for-elementor' ),
			'types'      => [ 'classic', 'gradient', 'video' ],
			'selector'   => '{{WRAPPER}} .qodef-item-layout--boxed .qodef-e-inner',
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'boxed',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
		];

		$boxed[] = $author_position;
		$boxed[] = $image_margin_bottom;
		$boxed[] = $quote_positions;
		$boxed[] = $padding;
		$boxed[] = $image_border_radius;
		$boxed[] = $image_background;

		return array_merge( $options, $boxed );
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_slider_extra_options', 'qi_addons_for_elementor_add_testimonials_slider_boxed_options' );
}
