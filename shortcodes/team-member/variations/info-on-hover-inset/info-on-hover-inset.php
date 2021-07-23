<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_variation_info_on_hover_inset' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_variation_info_on_hover_inset( $variations ) {
		$variations['info-on-hover-inset'] = esc_html__( 'Info on Hover Inset', 'stax-addons-for-elementor' );

		return $variations;
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_layouts', 'qi_addons_for_elementor_add_team_member_variation_info_on_hover_inset' );
}

if ( ! function_exists( 'qi_addons_for_elementor_add_team_member_options_info_on_hover_inset' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_team_member_options_info_on_hover_inset( $options ) {
		$info_on_hover_inset_options = [];

		$text = [
			'field_type' => 'textarea',
			'name'       => 'info_on_hover_inset_text',
			'title'      => esc_html__( 'Text', 'stax-addons-for-elementor' ),
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
		];

		$text_color = [
			'field_type' => 'color',
			'name'       => 'info_on_hover_inset_text_color',
			'title'      => esc_html__( 'Text Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-text' => 'color: {{VALUE}};',
			],
			'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
		];

		$text_typography = [
			'field_type' => 'typography',
			'name'       => 'info_on_hover_inset_typography',
			'title'      => esc_html__( 'Text Typography', 'stax-addons-for-elementor' ),
			'selector'   => '{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-text',
			'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
		];

		$text_margin_bottom = [
			'field_type' => 'slider',
			'name'       => 'info_on_hover_inset_margin_bottom',
			'title'      => esc_html__( 'Text Margin Bottom', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			],
			'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
		];

		$background_color = [
			'field_type' => 'color',
			'name'       => 'info_on_hover_inset_background_color',
			'title'      => esc_html__( 'Content Background Color', 'stax-addons-for-elementor' ),
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-content' => 'background-color: {{VALUE}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$vertical_aligment = [
			'field_type'    => 'select',
			'name'          => 'info_on_hover_inset_content_vertical_align',
			'title'         => esc_html__( 'Content Vertical Alignment', 'stax-addons-for-elementor' ),
			'options'       => [
				'flex-start' => esc_html__( 'Top', 'stax-addons-for-elementor' ),
				'center'     => esc_html__( 'Middle', 'stax-addons-for-elementor' ),
				'flex-end'   => esc_html__( 'Bottom', 'stax-addons-for-elementor' ),
			],
			'default_value' => 'center',
			'selectors'     => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-content' => 'justify-content: {{VALUE}};',
			],
			'dependency'    => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'         => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$horizontal_alignment = [
			'field_type'    => 'choose',
			'name'          => 'info_on_hover_inset_content_horizontal_align',
			'title'         => esc_html__( 'Content Horizontal Alignment', 'stax-addons-for-elementor' ),
			'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false ),
			'default_value' => 'center',
			'selectors'     => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-content' => 'text-align: {{VALUE}};',
			],
			'dependency'    => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'         => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$content_padding = [
			'field_type' => 'dimensions',
			'name'       => 'info_on_hover_inset_content_padding',
			'title'      => esc_html__( 'Content Padding', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$content_positioning = [
			'field_type' => 'dimensions',
			'name'       => 'info_on_hover_inset_content_positioning',
			'title'      => esc_html__( 'Content Positioning', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-content' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];
		$content_offset      = [
			'field_type' => 'slider',
			'name'       => 'info_on_hover_inset_content_inset',
			'title'      => esc_html__( 'Content Background Inner Offset', 'stax-addons-for-elementor' ),
			'size_units' => [ 'px', '%', 'em' ],
			'responsive' => true,
			'selectors'  => [
				'{{WRAPPER}} .qodef-item-layout--info-on-hover-inset .qodef-m-inner:hover .qodef-m-content' => 'clip-path: inset({{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}});',
			],
			'dependency' => [
				'show' => [
					'layout' => [
						'values'        => 'info-on-hover-inset',
						'default_value' => 'default',
					],
				],
			],
			'group'      => esc_html__( 'Content Style', 'stax-addons-for-elementor' ),
		];

		$info_on_hover_inset_options[] = $text;
		$info_on_hover_inset_options[] = $text_color;
		$info_on_hover_inset_options[] = $text_typography;
		$info_on_hover_inset_options[] = $text_margin_bottom;
		$info_on_hover_inset_options[] = $background_color;
		$info_on_hover_inset_options[] = $vertical_aligment;
		$info_on_hover_inset_options[] = $horizontal_alignment;
		$info_on_hover_inset_options[] = $content_padding;
		$info_on_hover_inset_options[] = $content_positioning;
		$info_on_hover_inset_options[] = $content_offset;

		return array_merge( $options, $info_on_hover_inset_options );
	}

	add_filter( 'qi_addons_for_elementor_filter_team_member_extra_options', 'qi_addons_for_elementor_add_team_member_options_info_on_hover_inset' );
}
