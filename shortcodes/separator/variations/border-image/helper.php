<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_separator_variation_border_image' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_separator_variation_border_image( $variations ) {
		$variations['border-image'] = esc_html__( 'Border Image', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_separator_layouts', 'qi_addons_for_elementor_add_separator_variation_border_image' );
}

if ( ! function_exists( 'qi_addons_for_elementor_separator_border_image_add_extra_options' ) ) {
	function qi_addons_for_elementor_separator_border_image_add_extra_options( $extra_options ) {
		$border_image = [];

		$border_image_src = [
			'field_type'    => 'image',
			'name'          => 'separator_border_image',
			'title'         => esc_html__( 'Border Image', 'stax-addons-for-elementor' ),
			'default_value' => [],
			'dependency'    => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'border-image' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'         => esc_html__( 'Border Image', 'stax-addons-for-elementor' ),
		];

		$border_image_size = [
			'field_type' => 'select',
			'name'       => 'separator_border_image_size',
			'title'      => esc_html__( 'Border Image Size', 'stax-addons-for-elementor' ),
			'options'    => [
				'auto'    => esc_html__( 'Auto', 'stax-addons-for-elementor' ),
				'cover'   => esc_html__( 'Cover', 'stax-addons-for-elementor' ),
				'contain' => esc_html__( 'Contain', 'stax-addons-for-elementor' ),
			],
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-line' => 'background-size: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'border-image' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Border Image', 'stax-addons-for-elementor' ),
		];

		$border_image_position = [
			'field_type' => 'select',
			'name'       => 'separator_border_image_position',
			'title'      => esc_html__( 'Border Image Position', 'stax-addons-for-elementor' ),
			'options'    => [
				'left'   => esc_html__( 'Left', 'stax-addons-for-elementor' ),
				'center' => esc_html__( 'Center', 'stax-addons-for-elementor' ),
				'right'  => esc_html__( 'Right', 'stax-addons-for-elementor' ),
			],
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-line' => 'background-position: top {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'separator_layout'            => [
						'values'        => [ 'border-image' ],
						'default_value' => 'standard',
					],
					'separator_border_image_size' => [
						'values'        => [ 'auto', 'contain' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Border Image', 'stax-addons-for-elementor' ),
		];

		$border_image_repeat = [
			'field_type' => 'select',
			'name'       => 'separator_border_image_select',
			'title'      => esc_html__( 'Border Image Repeat', 'stax-addons-for-elementor' ),
			'options'    => [
				'round'     => esc_html__( 'Round', 'stax-addons-for-elementor' ),
				'repeat'    => esc_html__( 'Repeat', 'stax-addons-for-elementor' ),
				'space'     => esc_html__( 'Space', 'stax-addons-for-elementor' ),
				'no-repeat' => esc_html__( 'None', 'stax-addons-for-elementor' ),
			],
			'selectors'  => [
				'{{WRAPPER}} .qodef-m-line' => 'background-repeat: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'separator_layout' => [
						'values'        => [ 'border-image' ],
						'default_value' => 'standard',
					],
				],
			],
			'group'      => esc_html__( 'Border Image', 'stax-addons-for-elementor' ),
		];

		$border_image[] = $border_image_src;
		$border_image[] = $border_image_size;
		$border_image[] = $border_image_position;
		$border_image[] = $border_image_repeat;

		return array_merge( $extra_options, $border_image );
	}

	add_filter( 'qi_addons_for_elementor_filter_separator_extra_options', 'qi_addons_for_elementor_separator_border_image_add_extra_options' );
}
