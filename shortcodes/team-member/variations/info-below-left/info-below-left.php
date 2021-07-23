<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_variation_info_below_left' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_variation_info_below_left( $variations ) {
		$variations['info-below-left'] = esc_html__( 'Info Below Left', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_layouts', 'qi_addons_for_elementor_add_team_member_variation_info_below_left' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_options_info_below_left' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_options_info_below_left( $options ) {
		$info_below_left_options = [];
		$margin_option           = [
			'field_type' => 'slider',
			'name'       => 'info_below_left_content_margin_top',
			'title'      => esc_html__( 'Content Top Margin', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-qi-team-member.qodef-item-layout--info-below-left .qodef-m-content' => 'margin-top: {{SIZE}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-below-left',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$info_below_left_options[] = $margin_option;

		return array_merge( $options, $info_below_left_options );
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_extra_options', 'qi_addons_for_elementor_add_team_member_options_info_below_left' );
}
