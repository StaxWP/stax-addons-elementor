<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_section_title_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_section_title_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Section_Title_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_section_title_shortcode' );
}

if ( class_exists( 'QiAddonsForElementor_Shortcode' ) ) {
	class QiAddonsForElementor_Section_Title_Shortcode extends QiAddonsForElementor_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/section-title' );
			$this->set_base( 'qi_addons_for_elementor_section_title' );
			$this->set_name( esc_html__( 'Section Title', 'stax-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that adds section title element', 'stax-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'stax-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Typography', 'stax-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/stax-addons-for-elementor/section-title/' );
			$this->set_documentation( 'https://qodeinteractive.com/stax-addons-for-elementor/documentation/#0_section_title' );
			$this->set_video( 'https://www.youtube.com/watch?v=fO41Kwhkkgs' );
			$this->set_option(
				[
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'title',
					'title'         => esc_html__( 'Title', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text( 'title' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'text',
					'name'          => 'subtitle',
					'title'         => esc_html__( 'Subtitle', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text( 'subtitle' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'select',
					'name'       => 'subtitle_position',
					'title'      => esc_html__( 'Subtitle Position', 'stax-addons-for-elementor' ),
					'options'    => [
						'above' => esc_html__( 'Above Title', 'stax-addons-for-elementor' ),
						'below' => esc_html__( 'Below Title', 'stax-addons-for-elementor' ),
					],
				]
			);
			$this->set_option(
				[
					'field_type'    => 'html',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text(),
				]
			);
			$this->set_option(
				[
					'field_type'  => 'text',
					'name'        => 'line_break_positions',
					'title'       => esc_html__( 'Positions of Line Break', 'stax-addons-for-elementor' ),
					'dynamic'     => false,
					'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break in title. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'disable_title_break_words',
					'title'         => esc_html__( 'Disable Title Line Break', 'stax-addons-for-elementor' ),
					'description'   => esc_html__( 'Enabling this option will disable title line breaks for screen size 1024 and lower', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				]
			);
			$this->set_option(
				[
					'field_type'  => 'text',
					'name'        => 'decoration_positions',
					'title'       => esc_html__( 'Positions of Decorated Words', 'stax-addons-for-elementor' ),
					'dynamic'     => false,
					'description' => esc_html__( 'Enter the positions of the words which you would like to be decorated in title. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a decoration, you would enter "1,3,4")', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'  => 'text',
					'name'        => 'color_positions',
					'title'       => esc_html__( 'Positions of Different Colored Words', 'stax-addons-for-elementor' ),
					'dynamic'     => false,
					'description' => esc_html__( 'Enter the positions of the words which you would like to be in different color in title. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a different color, you would enter "1,3,4")', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'link',
					'name'       => 'link',
					'title'      => esc_html__( 'Link in Title', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'  => 'text',
					'name'        => 'link_positions',
					'title'       => esc_html__( 'Positions of Link in Title', 'stax-addons-for-elementor' ),
					'dynamic'     => false,
					'description' => esc_html__( 'Enter the position, or start and end position of the words which you would like to include in link. Separate the positions with commas (e.g. if you would like the first and second word to be a link, you would enter "1,2")', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'text_link_underline',
					'title'         => esc_html__( 'Text Link Underline', 'stax-addons-for-elementor' ),
					'options'       => [
						'no'                => esc_html__( 'None', 'stax-addons-for-elementor' ),
						'underline'         => esc_html__( 'Underline', 'stax-addons-for-elementor' ),
						'underline-thick'   => esc_html__( 'Thick Underline', 'stax-addons-for-elementor' ),
						'underline-initial' => esc_html__( 'Initial Underline', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'no',
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'enable_button',
					'title'         => esc_html__( 'Enable Button', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				]
			);
			$this->set_option(
				[
					'field_type' => 'choose',
					'name'       => 'alignment',
					'title'      => esc_html__( 'Alignment', 'stax-addons-for-elementor' ),
					'options'    => qi_addons_for_elementor_get_select_type_options_pool( 'alignment_icons', false ),
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title' => 'text-align: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_alignment',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h2',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-title' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'title_typography',
					'title'      => esc_html__( 'Title Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-section-title .qodef-m-title',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'color',
					'name'          => 'title_different_color',
					'title'         => esc_html__( 'Title Different Color', 'stax-addons-for-elementor' ),
					'selectors'     => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-e-colored' => 'color: {{VALUE}};',
					],
					'default_value' => '#bababa',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'title_decoration',
					'title'         => esc_html__( 'Title Different Decoration', 'stax-addons-for-elementor' ),
					'options'       => [
						'underline' => esc_html__( 'Underline', 'stax-addons-for-elementor' ),
						'italic'    => esc_html__( 'Italic', 'stax-addons-for-elementor' ),
						'bold'      => esc_html__( 'Bold', 'stax-addons-for-elementor' ),
					],
					'default_value' => 'italic',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'title_link_underline_draw',
					'title'         => esc_html__( 'Title Link Underline Draw', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'yes_no', false ),
					'default_value' => 'yes',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_title',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-subtitle' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'subtitle_typography',
					'title'      => esc_html__( 'Subtitle Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-section-title .qodef-m-subtitle',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_subtitle',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title > .qodef-m-text' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'text_typography',
					'title'      => esc_html__( 'Text Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-section-title > .qodef-m-text',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'title_margin',
					'title'      => esc_html__( 'Title Margin', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'subtitle_margin_top',
					'title'      => esc_html__( 'Subtitle Margin Top', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-subtitle' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title > .qodef-m-text' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_margin',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'subtitle_padding',
					'title'      => esc_html__( 'Subtitle Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'text_padding',
					'title'      => esc_html__( 'Text Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title > .qodef-m-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_padding',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'button_margin_top',
					'title'      => esc_html__( 'Button Margin Top', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-section-title .qodef-m-button' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
					'dependency' => [
						'show' => [
							'enable_button' => [
								'values'        => 'yes',
								'default_value' => 'no',
							],
						],
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->import_shortcode_options(
				[
					'shortcode_base'    => 'qi_addons_for_elementor_button',
					'exclude'           => [ 'custom_class' ],
					'additional_params' => [
						'nested_group' => esc_html__( 'Button', 'stax-addons-for-elementor' ),
					],
				]
			);
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );
			$atts['title']          = $this->get_modified_title( $atts );

			return qi_addons_for_elementor_get_template_part( 'shortcodes/section-title', 'templates/section-title', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-section-title';
			$holder_classes[] = 'yes' === $atts['disable_title_break_words'] ? 'qodef-title-break--disabled' : '';
			$holder_classes[] = ! empty( $atts['title_decoration'] ) ? 'qodef-decoration--' . esc_attr( $atts['title_decoration'] ) : '';
			$holder_classes[] = ! empty( $atts['text_link_underline'] ) && ( 'no' !== $atts['text_link_underline'] ) ? 'qodef-text-link--' . esc_attr( $atts['text_link_underline'] ) : '';
			$holder_classes[] = 'yes' === $atts['title_link_underline_draw'] ? 'qodef-link--underline-draw' : '';

			return implode( ' ', $holder_classes );
		}

		private function get_modified_title( $atts ) {
			$title = $atts['title'];

			if ( ! empty( $title ) ) {
				$split_title = explode( ' ', $title );

				if ( ! empty( $atts['decoration_positions'] ) ) {
					$decoration_positions = explode( ',', str_replace( ' ', '', $atts['decoration_positions'] ) );

					foreach ( $decoration_positions as $key => $position ) {
						$position   = intval( $position );
						$before_pos = - 1;
						$after_pos  = - 1;

						if ( $key > 0 ) {
							$before_pos = intval( $decoration_positions[ $key - 1 ] );
						}

						if ( $key < count( $decoration_positions ) - 1 ) {
							$after_pos = intval( $decoration_positions[ $key + 1 ] );
						}

						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$current_title_part = $split_title[ $position - 1 ];

							if ( -1 === $before_pos || $before_pos + 1 !== $position ) {
								$current_title_part = '<span class="qodef-e-decorated">' . $current_title_part;
							}

							if ( -1 === $after_pos || $after_pos - 1 !== $position ) {
								$current_title_part .= '</span>';
							}

							$split_title[ $position - 1 ] = $current_title_part;
						}
					}
				}

				if ( ! empty( $atts['color_positions'] ) ) {
					$color_positions = explode( ',', str_replace( ' ', '', $atts['color_positions'] ) );

					foreach ( $color_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = '<span class="qodef-e-colored">' . $split_title[ $position - 1 ] . '</span>';
						}
					}
				}

				if ( ! empty( $atts['link_positions'] ) && ! empty( $atts['link']['url'] ) ) {
					$link_positions = explode( ',', str_replace( ' ', '', $atts['link_positions'] ) );

					if ( count( $link_positions ) === 2 ) {
						$begin = intval( $link_positions[0] );
						$end   = intval( $link_positions[1] );
						if ( ! empty( $split_title[ $begin - 1 ] ) && ! empty( $split_title [ $end - 1 ] ) ) {
							$split_title[ $begin - 1 ] = '<a class="qodef-e-link" href="' . esc_url( $atts['link']['url'] ) . '" ' . qi_addons_for_elementor_framework_get_inline_attrs( qi_addons_for_elementor_get_link_attributes( $atts['link'] ) ) . '>' . $split_title[ $begin - 1 ];
							$split_title[ $end - 1 ]   = $split_title[ $end - 1 ] . '</a>';
						}
					} else {
						foreach ( $link_positions as $position ) {
							$position = intval( $position );

							if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
								$split_title[ $position - 1 ] = '<a class="qodef-e-link" href="' . esc_url( $atts['link']['url'] ) . '" ' . qi_addons_for_elementor_framework_get_inline_attrs( qi_addons_for_elementor_get_link_attributes( $atts['link'] ) ) . '>' . $split_title[ $position - 1 ] . '</a>';
							}
						}
					}
				}

				if ( ! empty( $atts['line_break_positions'] ) ) {
					$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );

					foreach ( $line_break_positions as $position ) {
						$position = intval( $position );
						if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
							$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
						}
					}
				}

				$title = implode( ' ', $split_title );
			}

			return $title;
		}

		private function generate_button_params( $atts ) {

			if ( 'yes' === $atts['enable_button'] ) {
				return $this->populate_imported_shortcode_atts(
					[
						'shortcode_base' => 'qi_addons_for_elementor_button',
						'exclude'        => [ 'custom_class' ],
						'atts'           => $atts,
					]
				);
			}

			return [];
		}
	}
}
