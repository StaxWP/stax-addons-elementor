<?php

namespace StaxAddons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use Elementor\Widget_Base;
use StaxAddons\StaxWidgets;

/**
 * Class Base
 *
 * @package StaxAddons\Widgets
 */
abstract class Base extends Widget_Base {

	/**
	 * Base constructor.
	 *
	 * @param array $data
	 * @param null  $args
	 * @param bool  $resources
	 *
	 * @throws \Exception
	 */
	public function __construct( $data = [], $args = null, $resources = true ) {
		parent::__construct( $data, $args );

		if ( $resources ) {
			$this->register_widget_resources();
		}
	}

	/**
	 * Register widget resources (CSS/JS)
	 *
	 * @param array $dependencies
	 * @param array $extra_scripts
	 */
	public function register_widget_resources( $dependencies = [], $extra_scripts = [] ) {
		foreach ( StaxWidgets::instance()->get_widgets( true ) as $folder => $widget ) {
			if ( $widget['slug'] === $this->get_name() ) {
				$suffix = '.min';

				if ( defined( 'STAX_EL_DEV' ) && STAX_EL_DEV === true ) {
					$suffix = '';
				}

				$js_dep = [ 'jquery' ];

				if ( isset( $dependencies['js'] ) && is_array( $dependencies['js'] ) ) {
					$js_dep = $dependencies['js'];
				}

				foreach ( $extra_scripts as $script ) {
					$js_dep[] = $script['name'];

					wp_register_script(
						$script['name'],
						STAX_EL_WIDGET_URL . $folder . '/' . $script['path'] . '.js',
						$script['depends'],
						STAX_EL_VERSION,
						true
					);
				}

				$widget_script = STAX_EL_WIDGET_PATH . $folder . '/component' . $suffix . '.js';
				$widget_style  = STAX_EL_WIDGET_PATH . $folder . '/component' . $suffix . '.css';

				if ( file_exists( $widget_script ) ) {
					wp_register_script(
						$this->get_widget_script_handle(),
						STAX_EL_WIDGET_URL . $folder . '/component' . $suffix . '.js',
						$js_dep,
						STAX_EL_VERSION,
						true
					);
				}

				if ( file_exists( $widget_style ) ) {
					$css_dep = [];

					if ( isset( $dependencies['css'] ) && is_array( $dependencies['css'] ) ) {
						$css_dep = $dependencies['css'];
					}

					wp_register_style(
						$this->get_widget_style_handle(),
						STAX_EL_WIDGET_URL . $folder . '/component' . $suffix . '.css',
						$css_dep,
						STAX_EL_VERSION,
						'all'
					);
				}
			}
		}
	}

	/**
	 * @return array
	 */
	public function get_categories() {
		return [ 'stax-elementor' ];
	}

	/**
	 * @return array
	 */
	public function get_script_depends() {
		return [ $this->get_widget_script_handle() ];
	}

	/**
	 * @return array
	 */
	public function get_style_depends() {
		return [ $this->get_widget_style_handle() ];
	}

	/**
	 * Content template
	 */
	protected function _content_template() {
	}

	/**
	 * Enqueue resources (CSS/JS)
	 */
	protected function enqueue_resources() {
		wp_enqueue_script( $this->get_widget_script_handle() );
		wp_print_styles( $this->get_widget_style_handle() );
	}

	/**
	 * @return string
	 */
	protected function get_widget_script_handle() {
		return $this->get_name() . '-script';
	}

	/**
	 * @return string
	 */
	protected function get_widget_style_handle() {
		return $this->get_name() . '-style';
	}

}
