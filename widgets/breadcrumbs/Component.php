<?php

namespace StaxAddons\Widgets\Breadcrumbs;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use StaxAddons\Widgets\Breadcrumbs\Core\Buddypress_Trail;
use StaxAddons\Widgets\Breadcrumbs\Core\Trail;
use StaxAddons\Widgets\Breadcrumbs\Core\Bbpress_Trail;

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
	}

	protected function render() {
		$this->enqueue_resources();

		$settings = $this->get_settings();

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

		if ( function_exists( 'bp_is_active' ) && ! bp_is_blog_page() ) {
			$breadcrumb = new Buddypress_Trail( [] );
		} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			$breadcrumb = new Bbpress_Trail( [] );
		} else {
			$breadcrumb = new Trail( [] );
		}

		echo $breadcrumb->trail();
	}

	protected function _content_template() {
	}

	protected function require_extra_classes() {
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Trail.php';
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Bbpress_Trail.php';
		require_once STAX_EL_PATH . '/widgets/breadcrumbs/core/Buddypress_Trail.php';
	}

}
