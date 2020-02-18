<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Templates
 * @package StaxAddons
 */
class Templates extends Base {

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->current_slug = 'templates';

		if ( Plugin::instance()->is_current_page( $this->current_slug ) ) {
			add_filter( 'stax_el_current_slug', [ $this, 'set_page_slug' ] );
			add_filter( 'stax_el_welcome_wrapper_class', [ $this, 'set_wrapper_classes' ] );
			add_action( 'stax_el_' . $this->current_slug . '_page_content', [ $this, 'panel_content' ] );
		}
	}

	public function panel_content() {
		?>
        <div class="ste_box">
            <h2 class="ste_box_title"><?php _e( 'Templates', 'stax-addons-for-elementor' ); ?></h2>
            <div class="ste-p-4">
                templates
            </div>
        </div>
		<?php
	}

}

Templates::instance();
