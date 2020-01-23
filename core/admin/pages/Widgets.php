<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Widgets
 * @package StaxAddons
 */
class Widgets extends Base {

	/**
	 * Settings constructor.
	 */
	public function __construct() {
		$this->current_slug = 'widgets';

		if ( Plugin::instance()->is_current_page( $this->current_slug ) ) {
			add_filter( 'stax_el_current_slug', [ $this, 'set_page_slug' ] );
			add_filter( 'stax_el_welcome_wrapper_class', [ $this, 'set_wrapper_classes' ] );
			add_action( 'stax_el_' . $this->current_slug . '_page_content', [ $this, 'panel_content' ] );
		}
	}

	public function panel_content() {
		?>
        <div class="ste_box">
            <h2 class="ste_box_title"><?php _e( 'Widgets', 'stax-elementor' ); ?></h2>
            <div class="ste-p-4">
                <form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="POST" id="modules-form">
                    <ul class="svq-module-list">
						<?php foreach ( StaxWidgets::instance()->get_widgets() as $key => $widget ) : ?>
                            <li class="ste-flex ste-items-center ste-justify-between ste-mb-6">
                                <div>
                                    <div class="ste-text-lg ste-font-bold">
										<?php echo $widget['name'] ?>
                                    </div>
                                </div>
                                <label class="svq-switch" for="module-label-<?php echo $key ?>">
                                    <input type="checkbox" name="<?php echo esc_attr( $widget['slug'] ) ?>"
                                           id="module-label-<?php echo $key ?>"
                                           class="svq-check-input toggle-module-status" <?php checked( $widget['status'] ) ?>>
                                    <span class="svq-slider"></span>
                                </label>
                            </li>
						<?php endforeach; ?>
                    </ul>

                    <input type="hidden" name="action" value="stax_widget_activation">
                </form>
            </div>
        </div>
		<?php
	}

}

Widgets::instance();
