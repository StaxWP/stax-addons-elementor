<?php

namespace StaxAddons;

use Elementor\Widget_Base;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class StaxWidgets
 * @package StaxAddons
 */
class StaxWidgets {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @return StaxWidgets|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * StaxAddons constructor.
	 */
	public function __construct() {
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_elementor_category' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	/**
	 * Get widgets
	 *
	 * @param bool $active
	 *
	 * @return array
	 */
	public function get_widgets( $active = false ) {
		$widgets = [];

		$widgets['heading'] = [
			'name'   => 'Heading',
			'slug'   => 'stax-el-heading',
			'status' => true
		];

		// Remove disabled widgets
		if ( $active ) {
			$disabled_widgets = get_option( '_stax_addons_disabled_widgets', [] );
			foreach ( $widgets as $k => $widget ) {
				if ( isset( $disabled_widgets[ $widget['name'] ] ) ) {
					unset( $widgets[ $k ] );
				}
			}
		}

		return $widgets;
	}

	/**
	 * Register Elementor widgets
	 */
	public function register_widgets() {
		// get our own widgets up and running:
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( Widget_Base::class ) && class_exists( Plugin::class ) && is_callable( Plugin::class, 'instance' ) ) {
			$elementor = \Elementor\Plugin::instance();

			if ( isset( $elementor->widgets_manager ) && method_exists( $elementor->widgets_manager, 'register_widget_type' ) ) {

				$elements = $this->get_widgets();
				foreach ( $elements as $k => $element ) {
					if ( $widget_file = $this->get_widget_file( $k ) ) {

						require_once $widget_file;
						$class_name = '\StaxAddons\Widgets\\' . $element['name'] . '\Component';
						$elementor->widgets_manager->register_widget_type( new $class_name );
					}
				}
			}
		}
	}

	/**
	 * Register new Elementor category
	 */
	public function register_elementor_category() {
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( Widget_Base::class ) && class_exists( Plugin::class ) && is_callable( Plugin::class, 'instance' ) ) {
			\Elementor\Plugin::instance()->elements_manager->add_category(
				'stax-elementor',
				[
					'title' => 'Stax Elements',
					'icon'  => 'fa fa-plug'
				]
			);
		}
	}

	/**
	 * Get widget file path
	 *
	 * @param $folder
	 *
	 * @return bool|string
	 */
	public function get_widget_file( $folder ) {
		$template_file = STAX_EL_WIDGET_PATH . $folder . '/Component.php';

		if ( $template_file && is_readable( $template_file ) ) {
			return $template_file;
		}

		return false;
	}

}

StaxWidgets::instance();
