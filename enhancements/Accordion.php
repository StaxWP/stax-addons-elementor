<?php

namespace StaxAddons\Enhancements;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Class Accordion
 * @package StaxAddons\Enhancements
 */
class Accordion {

	/**
	 * @var
	 */
	public static $instance;

	/**
	 * @return Accordion|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function __construct() {
		add_action( 'elementor/element/before_section_end', static function ( $element, $section_id, $args ) {
			if ( $element->get_name() === 'image-gallery' && $section_id === 'section_gallery' ) {

				$element->add_control(
					'image_stretch',
					[
						'label'   => __( 'Image Stretch', 'elementor' ),
						'type'    => \Elementor\Controls_Manager::SELECT,
						'default' => 'no',
						'options' => [
							'no'  => __( 'No', 'elementor' ),
							'yes' => __( 'Yes', 'elementor' ),
						],
					]
				);

			}
		}, 10, 3 );
	}

}

Accordion::instance();
