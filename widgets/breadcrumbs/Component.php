<?php

namespace StaxAddons\Widgets\Breadcrumbs;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use StaxAddons\Widgets\Breadcrumbs\Core\Buddypress_Trail;
use StaxAddons\Widgets\Breadcrumbs\Core\Trail;
use StaxAddons\Widgets\Breadcrumbs\Core\Bbpress_Trail;

use Elementor\Controls_Manager;

use StaxAddons\Widgets\Base;

class Component extends Base {

	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
		$this->require_extra_classes();
	}

	public function get_name() {
		return 'stax-el-breadcrumbs';
	}

	public function get_title() {
		return __( 'Breadcrumbs', 'stax-elementor' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Separator', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label'       => __( 'Icon', 'stax-elementor' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label'     => __( 'Spacing', 'stax-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .stx-separator' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'links_style',
			[
				'label' => __( 'Links', 'stax-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'selector' => '{{WRAPPER}} .stx-breadcrumb-item a.stx-breadcrumb-link',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name'     => 'text_shadow',
				'selector' => '{{WRAPPER}} .stx-breadcrumb-item a.stx-breadcrumb-link',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_link_normal',
			[
				'label' => __( 'Normal', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'link_text_color',
			[
				'label'     => __( 'Text Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-breadcrumb-item a.stx-breadcrumb-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_link_hover',
			[
				'label' => __( 'Hover', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'link_text_color_hover',
			[
				'label'     => __( 'Text Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-breadcrumb-item a.stx-breadcrumb-link:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_link_active',
			[
				'label' => __( 'Active', 'stax-elementor' ),
			]
		);

		$this->add_control(
			'link_text_color_active',
			[
				'label'     => __( 'Text Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-breadcrumb-item.active a.stx-breadcrumb-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'separator_style',
			[
				'label' => __( 'Separator', 'stax-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => __( 'Size', 'stax-elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .stx-separator i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'stax-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .stx-separator i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$this->enqueue_resources();

		$settings = $this->get_settings_for_display();

		$breadcrumb_filter = false;

		if ( function_exists( 'yoast_breadcrumb' ) ) {
			$yoast_breadcrumb = yoast_breadcrumb( '<div class="svq-breadcrumb breadcrumb svq-yoast">', '</div>', 'false' );

			if ( $yoast_breadcrumb ) {
				$breadcrumb_filter = $yoast_breadcrumb;
			}
		}

		$breadcrumb_filter = apply_filters( 'stax_el_breadcrumb_data', $breadcrumb_filter );
		if ( $breadcrumb_filter ) {
			return $breadcrumb_filter;
		}

		$icon = '-';

		if ( $settings['selected_icon']['value'] ) {
			ob_start();
			Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
			$icon = ob_get_clean();
		}

		$args = [
			'separator' => $icon
		];

		if ( function_exists( 'bp_is_active' ) && ! bp_is_blog_page() ) {
			$breadcrumb = new Buddypress_Trail( $args );
		} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			$breadcrumb = new Bbpress_Trail( $args );
		} else {
			$breadcrumb = new Trail( $args );
		}
		?>
        <div class="stx-breadcrumb-wrapper">
			<?php echo $breadcrumb->trail(); ?>
        </div>
		<?php
	}

	protected function _content_template() {
	}

	protected function require_extra_classes() {
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Trail.php';
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Bbpress_Trail.php';
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Buddypress_Trail.php';
	}

}