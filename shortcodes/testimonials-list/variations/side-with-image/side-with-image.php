<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_list_variation_side_with_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_list_variation_side_with_image( $variations ) {
		$variations['side-with-image'] = esc_html__( 'Side With Image', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_list_layouts', 'qi_addons_for_elementor_add_testimonials_list_variation_side_with_image' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_list_side_with_image_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_list_side_with_image_options( $options ) {
		$side_with_image = [];

		$side_width = [
			'field_type' => 'slider',
			'name'       => 'side_with_image_side_width',
			'title'      => esc_html__( 'Side Width', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'vw' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-side' => 'width: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
		];

		$image_border_radius = [
			'field_type' => 'dimensions',
			'name'       => 'side_with_image_image_border_radius',
			'title'      => esc_html__( 'Image Border Radius', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-side .qodef-e-media-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};;',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
		];

		$side_margin_right = [
			'field_type' => 'slider',
			'name'       => 'side_with_image_side_margin_right',
			'title'      => esc_html__( 'Item Side Margin Right', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'range'      => [
				'px' => [
					'min' => 10,
					'max' => 300,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-side' => 'margin-right: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$author_position = [
			'field_type' => 'slider',
			'name'       => 'side_with_image_author_position_margin_top',
			'title'      => esc_html__( 'Item Author Occupation Margin Top', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-author-job' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$quote_background_color = [
			'field_type' => 'color',
			'name'       => 'side_with_image_quote_background_color',
			'title'      => esc_html__( 'Quote Background Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-quote' => 'background-color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
		];

		$quote_box_size = [
			'field_type' => 'slider',
			'name'       => 'side_with_image_quote_box_size',
			'title'      => esc_html__( 'Quote Box Size', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'range'      => [
				'px' => [
					'min' => 1,
					'max' => 100,
				],
			],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-quote' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
		];

		$quote_border_radius = [
			'field_type' => 'dimensions',
			'name'       => 'side_with_image_quote_border_radius',
			'title'      => esc_html__( 'Quote Border Radius', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-quote' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
		];

		$quote_positions = [
			'field_type'         => 'dimensions',
			'name'               => 'side_with_image_quote_position',
			'title'              => esc_html__( 'Quote Position', 'stax-addons-for-elementor' ),
			'size_units'         => [ 'px', '%', 'em' ],
			'allowed_dimensions' => [ 'bottom', 'right' ],
			'responsive'         => true,
			'selectors'          => [
				'{{WRAPPER}} .qodef-item-layout--side-with-image .qodef-e-quote' => 'bottom: {{BOTTOM}}{{UNIT}}; right: {{RIGHT}}{{UNIT}};',
			],
			'dependency'         => [
				'show' => [
					'layout' => [
						'values'        => 'side-with-image',
						'default-value' => '',
					],
				],
			],
			'group'              => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
		];

		$side_with_image[] = $side_width;
		$side_with_image[] = $image_border_radius;
		$side_with_image[] = $side_margin_right;
		$side_with_image[] = $author_position;
		$side_with_image[] = $quote_positions;
		$side_with_image[] = $quote_background_color;
		$side_with_image[] = $quote_box_size;
		$side_with_image[] = $quote_border_radius;

		return array_merge( $options, $side_with_image );
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_list_extra_options', 'qi_addons_for_elementor_add_testimonials_list_side_with_image_options' );
}
