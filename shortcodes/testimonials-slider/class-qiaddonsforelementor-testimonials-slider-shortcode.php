<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_testimonials_slider_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_testimonials_slider_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Testimonials_Slider_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_testimonials_slider_shortcode' );
}

if ( class_exists( 'QiAddonsForElementor_Slider_Shortcode' ) ) {
	class QiAddonsForElementor_Testimonials_Slider_Shortcode extends QiAddonsForElementor_Slider_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'qi_addons_for_elementor_filter_testimonials_slider_layouts', [] ) );
			$this->set_extra_options( apply_filters( 'qi_addons_for_elementor_filter_testimonials_slider_extra_options', [] ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/testimonials-slider' );
			$this->set_base( 'qi_addons_for_elementor_testimonials_slider' );
			$this->set_name( esc_html__( 'Testimonials Carousel', 'stax-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that displays carousel of testimonials', 'stax-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'stax-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Business', 'stax-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/stax-addons-for-elementor/testimonials-carousel/' );
			$this->set_documentation( 'https://qodeinteractive.com/stax-addons-for-elementor/documentation/#7_testimonials_carousel' );
			$this->set_option(
				[
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'stax-addons-for-elementor' ),
				]
			);
			$this->map_slider_options(
				[
					'exclude_option' => [ 'images_proportion' ],
				]
			);

			$placeholder = get_option( 'qi_addons_for_elementor_placeholder_image' );

			$this->set_option(
				[
					'field_type'    => 'repeater',
					'name'          => 'children',
					'title'         => esc_html__( 'Items', 'stax-addons-for-elementor' ),
					'default_value' => [
						[
							'item_title'             => esc_html__( 'Example Title 1', 'stax-addons-for-elementor' ),
							'item_text'              => qi_addons_for_elementor_get_example_text( 'excerpt_short' ),
							'item_author'            => esc_html__( 'Author', 'stax-addons-for-elementor' ),
							'item_author_image'      => $placeholder,
							'item_author_occupation' => esc_html__( 'occupation', 'stax-addons-for-elementor' ),
						],
						[
							'item_title'             => esc_html__( 'Example Title 2', 'stax-addons-for-elementor' ),
							'item_text'              => qi_addons_for_elementor_get_example_text( 'excerpt_short' ),
							'item_author'            => esc_html__( 'Author', 'stax-addons-for-elementor' ),
							'item_author_image'      => $placeholder,
							'item_author_occupation' => esc_html__( 'occupation', 'stax-addons-for-elementor' ),
						],
						[
							'item_title'             => esc_html__( 'Example Title 3', 'stax-addons-for-elementor' ),
							'item_text'              => qi_addons_for_elementor_get_example_text( 'excerpt_short' ),
							'item_author'            => esc_html__( 'Author', 'stax-addons-for-elementor' ),
							'item_author_image'      => $placeholder,
							'item_author_occupation' => esc_html__( 'occupation', 'stax-addons-for-elementor' ),
						],
					],
					'items'         => [
						[
							'field_type'    => 'text',
							'name'          => 'item_title',
							'title'         => esc_html__( 'Title', 'stax-addons-for-elementor' ),
							'default_value' => esc_html__( 'Example Title', 'stax-addons-for-elementor' ),
						],
						[
							'field_type'    => 'textarea',
							'name'          => 'item_text',
							'title'         => esc_html__( 'Text', 'stax-addons-for-elementor' ),
							'default_value' => qi_addons_for_elementor_get_example_text( 'excerpt_short' ),
						],
						[
							'field_type'    => 'text',
							'name'          => 'item_author',
							'title'         => esc_html__( 'Author', 'stax-addons-for-elementor' ),
							'default_value' => esc_html__( 'Author', 'stax-addons-for-elementor' ),
						],
						[
							'field_type'    => 'text',
							'name'          => 'item_author_occupation',
							'title'         => esc_html__( 'Author Occupation', 'stax-addons-for-elementor' ),
							'default_value' => esc_html__( 'occupation', 'stax-addons-for-elementor' ),
						],
						[
							'field_type'    => 'image',
							'name'          => 'item_author_image',
							'title'         => esc_html__( 'Author Image', 'stax-addons-for-elementor' ),
							'default_value' => $placeholder,
						],
						[
							'field_type' => 'color',
							'name'       => 'item_title_color',
							'title'      => esc_html__( 'Title Color', 'stax-addons-for-elementor' ),
							'selectors'  => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .qodef-e-title' => 'color: {{VALUE}};',
							],
						],
						[
							'field_type' => 'color',
							'name'       => 'item_text_color',
							'title'      => esc_html__( 'Text Color', 'stax-addons-for-elementor' ),
							'selectors'  => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .qodef-e-text' => 'color: {{VALUE}};',
							],
						],
						[
							'field_type' => 'color',
							'name'       => 'item_author_color',
							'title'      => esc_html__( 'Author Color', 'stax-addons-for-elementor' ),
							'selectors'  => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .qodef-e-author-name' => 'color: {{VALUE}};',
							],
						],
						[
							'field_type' => 'color',
							'name'       => 'item_author_occupation_color',
							'title'      => esc_html__( 'Author Occupation Color', 'stax-addons-for-elementor' ),
							'selectors'  => [
								'{{WRAPPER}} {{CURRENT_ITEM}} .qodef-e-author-job' => 'color: {{VALUE}};',
							],
						],
						[
							'field_type'  => 'background',
							'name'        => 'item_background',
							'title'       => esc_html__( 'Boxed Background', 'stax-addons-for-elementor' ),
							'types'       => [ 'classic', 'gradient' ],
							'selector'    => '{{WRAPPER}} .qodef-item-layout--boxed {{CURRENT_ITEM}} .qodef-e-inner',
							'description' => esc_html__( 'This background will be used on "boxed" layout only', 'stax-addons-for-elementor' ),
						],
					],
				]
			);

			$this->set_option(
				[
					'field_type'    => 'icons',
					'name'          => 'item_quote_icon',
					'title'         => esc_html__( 'Quote Icon', 'stax-addons-for-elementor' ),
					'default_value' => [],
					'group'         => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'item_quote_color',
					'title'      => esc_html__( 'Quote Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-quote' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'item_quote_font_size',
					'title'      => esc_html__( 'Quote Size', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', 'em' ],
					'range'      => [
						'px' => [
							'min' => 0,
							'max' => 300,
						],
					],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-quote' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Quote Style', 'stax-addons-for-elementor' ),
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
						'{{WRAPPER}} .qodef-e-title' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'title_typography',
					'title'      => esc_html__( 'Title Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-e-title',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'title_margin_bottom',
					'title'      => esc_html__( 'Title Margin Bottom', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'item_text_tag',
					'title'         => esc_html__( 'Text Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h3',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'item_text_color',
					'title'      => esc_html__( 'Text Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-text' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'item_text_typography',
					'title'      => esc_html__( 'Text Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-e-text',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'item_author_tag',
					'title'         => esc_html__( 'Author Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag', false ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'item_author_color',
					'title'      => esc_html__( 'Author Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-author-name' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'item_author_typography',
					'title'      => esc_html__( 'Author Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-e-author-name',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'item_author_occupation_color',
					'title'      => esc_html__( 'Author Occupation Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-author-job' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'item_author_occupation_typography',
					'title'      => esc_html__( 'Author Occupation Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-e-author-job',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'text_margin_bottom',
					'title'      => esc_html__( 'Item Text Margin Bottom', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'text_padding',
					'title'      => esc_html__( 'Item Text padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-e-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);

			$this->map_layout_options(
				[
					'layouts'        => $this->get_layouts(),
					'exclude_option' => [ 'title_tag', 'title_color', 'title_hover_color', 'title_typography' ],
				]
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['unique']         = wp_unique_id();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['slider_attr']    = $this->get_slider_data( $atts );

			$atts['this_shortcode'] = $this;

			return qi_addons_for_elementor_get_template_part( 'shortcodes/testimonials-slider', 'templates/content', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-testimonials-slider';
			$holder_classes[] = '1' === $atts['columns'] ? 'qodef--one-column' : '';

			$slider_classes = $this->get_slider_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $slider_classes );

			return implode( ' ', $holder_classes );
		}

		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$slider_item_classes = $this->get_slider_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $slider_item_classes );

			return implode( ' ', $item_classes );
		}
	}
}
