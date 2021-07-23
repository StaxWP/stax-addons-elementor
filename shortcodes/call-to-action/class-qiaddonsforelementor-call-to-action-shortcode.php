<?php

if ( ! function_exists( 'qi_addons_for_elementor_add_call_to_action_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function qi_addons_for_elementor_add_call_to_action_shortcode( $shortcodes ) {
		$shortcodes[] = 'QiAddonsForElementor_Call_To_Action_Shortcode';

		return $shortcodes;
	}

	add_filter( 'qi_addons_for_elementor_filter_register_shortcodes', 'qi_addons_for_elementor_add_call_to_action_shortcode' );
}

if ( class_exists( 'QiAddonsForElementor_Shortcode' ) ) {
	class QiAddonsForElementor_Call_To_Action_Shortcode extends QiAddonsForElementor_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'qi_addons_for_elementor_filter_call_to_action_layouts', [] ) );
			$this->set_extra_options( apply_filters( 'qi_addons_for_elementor_filter_call_to_action_extra_options', [] ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( QI_ADDONS_FOR_ELEMENTOR_SHORTCODES_URL_PATH . '/call-to-action' );
			$this->set_base( 'qi_addons_for_elementor_call_to_action' );
			$this->set_name( esc_html__( 'Call to Action', 'stax-addons-for-elementor' ) );
			$this->set_description( esc_html__( 'Shortcode that adds call to action element', 'stax-addons-for-elementor' ) );
			$this->set_category( esc_html__( 'Qi Addons For Elementor', 'stax-addons-for-elementor' ) );
			$this->set_subcategory( esc_html__( 'Typography', 'stax-addons-for-elementor' ) );
			$this->set_demo( 'https://qodeinteractive.com/stax-addons-for-elementor/call-to-action/' );
			$this->set_documentation( 'https://qodeinteractive.com/stax-addons-for-elementor/documentation/#2_call_to_action' );
			$this->set_video( 'https://www.youtube.com/watch?v=1drBNEm8hSo' );
			$this->set_option(
				[
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'stax-addons-for-elementor' ),
				]
			);

			$options_map = qi_addons_for_elementor_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'stax-addons-for-elementor' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => [
						'map_for_page_builder' => $options_map['visibility'],
						'map_for_widget'       => $options_map['visibility'],
					],
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
					'field_type'    => 'textarea',
					'name'          => 'text',
					'title'         => esc_html__( 'Text', 'stax-addons-for-elementor' ),
					'default_value' => qi_addons_for_elementor_get_example_text( 'excerpt_short' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'select',
					'name'       => 'button_below',
					'title'      => esc_html__( 'Button Below', 'stax-addons-for-elementor' ),
					'options'    => [
						''     => esc_html__( 'Default', 'stax-addons-for-elementor' ),
						'1024' => esc_html__( 'Below 1024px', 'stax-addons-for-elementor' ),
						'768'  => esc_html__( 'Below 768px', 'stax-addons-for-elementor' ),
						'680'  => esc_html__( 'Below 680px', 'stax-addons-for-elementor' ),
					],
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'enable_link_overlay',
					'title'         => esc_html__( 'Enable Link Overlay', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				]
			);
			$this->set_option(
				[
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'stax-addons-for-elementor' ),
					'options'       => qi_addons_for_elementor_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'stax-addons-for-elementor' ),
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content .qodef-m-title' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'title_typography',
					'title'      => esc_html__( 'Title Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content .qodef-m-title',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_title_text',
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
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content .qodef-m-text' => 'color: {{VALUE}};',
					],
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'typography',
					'name'       => 'text_typography',
					'title'      => esc_html__( 'Text Typography', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content .qodef-m-text',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'divider',
					'name'       => 'item_divider_style_text_background',
					'title'      => esc_html__( 'Divider', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'background',
					'name'       => 'holder_background',
					'title'      => esc_html__( 'Holder Background', 'stax-addons-for-elementor' ),
					'types'      => [ 'classic', 'gradient', 'video' ],
					'selector'   => '{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-inner',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'border',
					'name'       => 'holder_border',
					'title'      => esc_html__( 'Holder Border', 'stax-addons-for-elementor' ),
					'selector'   => '{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-inner',
					'group'      => esc_html__( 'Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'holder_padding',
					'title'      => esc_html__( 'Holder Padding', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'title_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content .qodef-m-text' => 'margin-top: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'slider',
					'name'       => 'content_padding_right',
					'title'      => esc_html__( 'Content Padding Right', 'stax-addons-for-elementor' ),
					'group'      => esc_html__( 'Spacing Style', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-content' => 'padding-right: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->set_option(
				[
					'field_type' => 'dimensions',
					'name'       => 'button_margin',
					'title'      => esc_html__( 'Button Margin', 'stax-addons-for-elementor' ),
					'size_units' => [ 'px', '%', 'em' ],
					'responsive' => true,
					'selectors'  => [
						'{{WRAPPER}} .qodef-qi-call-to-action .qodef-m-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['button_params']  = $this->generate_button_params( $atts );

			return qi_addons_for_elementor_get_template_part( 'shortcodes/call-to-action', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-qi-call-to-action';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['button_below'] ) ? 'qodef-button-below--' . $atts['button_below'] : '';
			$holder_classes[] = 'yes' === $atts['enable_link_overlay'] ? 'qodef-link-overlay' : '';

			return implode( ' ', $holder_classes );
		}

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				[
					'shortcode_base' => 'qi_addons_for_elementor_button',
					'exclude'        => [ 'custom_class' ],
					'atts'           => $atts,
				]
			);

			return $params;
		}
	}
}
