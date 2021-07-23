<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_variation_info_on_hover' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_variation_info_on_hover( $variations ) {
		$variations['info-on-hover'] = esc_html__( 'Info on Hover', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_layouts', 'qi_addons_for_elementor_add_team_member_variation_info_on_hover' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_options_info_on_hover' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_options_info_on_hover( $options ) {
		$info_on_hover_options = [];
		$background_color      = [
			'field_type' => 'color',
			'name'       => 'info_on_hover_background_color',
			'title'      => esc_html__( 'Content Background Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-qi-team-member.qodef-item-layout--info-on-hover .qodef-m-content' => 'background-color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$vertical_aligment = [
			'field_type'    => 'select',
			'name'          => 'info_on_hover_content_vertical_align',
			'title'         => esc_html__( 'Content Vertical Alignment', 'stax-addons-for-elementor' ),
			'options'       => [
				'flex-start' => esc_html__( 'Top', 'stax-addons-for-elementor' ),
				'center'     => esc_html__( 'Middle', 'stax-addons-for-elementor' ),
				'flex-end'   => esc_html__( 'Bottom', 'stax-addons-for-elementor' ),
			],
			'default_value' => 'center',
			'selectors'     => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover .qodef-m-content' => 'justify-content: {{VALUE}};',
			],
			'dependency'    => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover',
						'default_value' => 'default',
					],
				],
			],
			'group'         => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$horizontal_alignment = [
			'field_type'    => 'choose',
			'name'          => 'info_on_hover_content_horizontal_align',
			'title'         => esc_html__( 'Content Horizontal Alignment', 'stax-addons-for-elementor' ),
			'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false ),
			'default_value' => 'left',
			'selectors'     => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover .qodef-m-content' => 'text-align: {{VALUE}};',
			],
			'dependency'    => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover',
						'default_value' => 'default',
					],
				],
			],
			'group'         => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$content_padding = [
			'field_type' => 'dimensions',
			'name'       => 'info_on_hover_content_padding',
			'title'      => esc_html__( 'Content Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover .qodef-m-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$info_on_hover_options[] = $background_color;
		$info_on_hover_options[] = $vertical_aligment;
		$info_on_hover_options[] = $horizontal_alignment;
		$info_on_hover_options[] = $content_padding;

		return array_merge( $options, $info_on_hover_options );
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_extra_options', 'qi_addons_for_elementor_add_team_member_options_info_on_hover' );
}
