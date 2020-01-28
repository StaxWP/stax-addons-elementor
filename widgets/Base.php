<?php

namespace StaxAddons\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

use StaxAddons\StaxWidgets;

/**
 * Class Base
 * @package StaxAddons\Widgets
 */
abstract class Base extends \Elementor\Widget_Base {

	/**
	 * Base constructor.
	 *
	 * @param array $data
	 * @param null $args
	 *
	 * @throws \Exception
	 */
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		$this->register_widget_resources();
	}

	/**
	 * Register widget resources (CSS/JS)
	 */
	public function register_widget_resources() {
		foreach ( StaxWidgets::instance()->get_widgets( true ) as $folder => $widget ) {
			if ( $widget['slug'] === $this->get_name() ) {
				$suffix = '.min';

				if ( defined( 'STAX_EL_DEV' ) && STAX_EL_DEV === true ) {
					$suffix = '';
				}

				$widget_script = STAX_EL_WIDGET_PATH . $folder . '/component' . $suffix . '.js';
				$widget_style  = STAX_EL_WIDGET_PATH . $folder . '/component' . $suffix . '.css';


				if ( file_exists( $widget_script ) ) {
					wp_register_script(
						$this->get_widget_script_handle(),
						STAX_EL_WIDGET_URL . $folder . '/component' . $suffix . '.js',
						[ 'jquery' ],
						STAX_EL_VERSION,
						true
					);
				}

				if ( file_exists( $widget_style ) ) {
					wp_register_style(
						$this->get_widget_style_handle(),
						STAX_EL_WIDGET_URL . $folder . '/component' . $suffix . '.css',
						[],
						STAX_EL_VERSION,
						'all'
					);
				}
			}
		}
	}

	/**
	 * Enqueue resources (CSS/JS)
	 */
	protected function enqueue_resources() {
		wp_enqueue_script( $this->get_widget_script_handle() );
		wp_enqueue_style( $this->get_widget_style_handle() );
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
