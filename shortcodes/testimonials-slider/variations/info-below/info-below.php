<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_slider_variation_info_below' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_slider_variation_info_below( $variations ) {
		$variations['info-below'] = esc_html__( 'Info Below', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_slider_layouts', 'qi_addons_for_elementor_add_testimonials_slider_variation_info_below' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_slider_info_below_options' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_slider_info_below_options( $options ) {
		$info_below = [];

		$author_position = [
			'field_type' => 'slider',
			'name'       => 'info_below_author_position_margin_top',
			'title'      => esc_html__( 'Item Author Occupation Margin Top', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-below .qodef-e-author-job' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-below',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$image_margin_bottom = [
			'field_type' => 'slider',
			'name'       => 'info_below_image_margin_bottom',
			'title'      => esc_html__( 'Item Image Margin Bottom', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-below .qodef-e-media-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-below',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$quote_margin_bottom = [
			'field_type' => 'slider',
			'name'       => 'info_below_quote_margin_bottom',
			'title'      => esc_html__( 'Quote Margin Bottom', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-below .qodef-e-quote' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-below',
						'default-value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$info_below[] = $author_position;
		$info_below[] = $image_margin_bottom;
		$info_below[] = $quote_margin_bottom;

		return array_merge( $options, $info_below );
	}

	add_filter( 'qi_addons_for_elementor_filter_testimonials_slider_extra_options', 'qi_addons_for_elementor_add_testimonials_slider_info_below_options' );
}
