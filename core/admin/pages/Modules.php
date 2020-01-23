<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Modules
 * @package StaxAddons
 */
class Modules {

	/**
	 * @var null
	 */
	public static $instance;


	private $current_slug;

	/**
	 * @return Modules|null
	 */
	public static function instance() {
		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->current_slug = 'modules';

		if ( Plugin::instance()->is_current_page( $this->current_slug ) ) {
			add_filter( 'stax_el_current_slug', [ $this, 'set_page_slug' ] );
			add_filter( 'stax_el_welcome_wrapper_class', [ $this, 'set_wrapper_classes' ] );
			add_action( 'stax_el_' . $this->current_slug . '_page_content', [ $this, 'panel_content' ] );
		}
	}

	/**
	 * @return string
	 */
	public function set_page_slug() {
		return $this->current_slug;
	}

	/**
	 * @return array
	 */
	public function set_wrapper_classes() {
		return [ $this->current_slug ];
	}

	public function panel_content() {
		?>
        <div class="ste_box">
            <h2 class="ste_box_title"><?php _e( 'Modules', 'stax-elementor' ); ?></h2>
            <div class="ste-p-4">
                On/off modules
            </div>
        </div>
		<?php
	}


}

Modules::instance();
