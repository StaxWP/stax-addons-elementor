<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_interactive_banner_variation_revealing' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_interactive_banner_variation_revealing( $variations ) {
		$variations['revealing'] = esc_html__( 'Revealing', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_interactive_banner_layouts', 'qi_addons_for_elementor_add_interactive_banner_variation_revealing' );
}
if ( ! function_exists( 'qi_addons_for_elementor_add_interactive_banner_options_revealing' ) ) {
	function qi_addons_for_elementor_add_interactive_banner_options_revealing( $options ) {
		$revealing_options = [];

		$margin_bottom = [
			'field_type' => 'slider',
			'name'       => 'image_switch_text_margin_bottom',
			'title'      => esc_html__( 'Text Margin Bottom', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-layout--revealing .qodef-m-content-inner > .qodef-m-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'revealing',
						'default_value' => '',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$revealing_options[] = $margin_bottom;

		return array_merge( $options, $revealing_options );
	}

	add_filter( 'qi_addons_for_elementor_filter_interactive_banner_extra_options', 'qi_addons_for_elementor_add_interactive_banner_options_revealing' );
}
