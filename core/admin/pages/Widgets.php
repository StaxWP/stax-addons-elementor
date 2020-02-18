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

		add_action( 'wp_ajax_stax_widget_activation', [ $this, 'toggle_widget' ] );
	}

	public function toggle_widget() {
		if ( ! isset( $_POST['action'] ) || $_POST['action'] !== 'stax_widget_activation' ) {
			wp_send_json_error();
		}

		$options = [];

		$widgets = StaxWidgets::instance()->get_widgets();

		foreach ( $widgets as $widget ) {
			$valid = false;

			if ( isset( $_POST[ $widget['slug'] ] ) ) {
				$valid = true;
			}

			if ( ! $valid ) {
				$options[ $widget['slug'] ] = true;
			}
		}

		update_option( '_stax_addons_disabled_widgets', $options );

		exit;
	}

	/**
	 * Panel content
	 */
	public function panel_content() {
		?>
        <div class="ste_box">
            <h2 class="ste_box_title"><?php _e( 'Widgets', 'stax-elementor-kit' ); ?></h2>
            <div class="ste-p-4">
                <form action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="POST" id="modules-form">
                    <ul class="svq-module-list">
						<?php foreach ( StaxWidgets::instance()->get_widgets( false, true ) as $key => $widget ) : ?>
                            <li class="ste-flex ste-items-center ste-justify-between">
                                <div>
                                    <div class="ste-text-md ste-font-bold">
										<?php echo $widget['name'] ?>
                                    </div>
                                </div>
                                <label class="svq-switch" for="module-label-<?php echo $key ?>">
                                    <input type="checkbox" name="<?php echo esc_attr( $widget['slug'] ) ?>"
                                           id="module-label-<?php echo $key ?>"
                                           class="svq-check-input stax-toggle-widget-status" <?php checked( $widget['status'] ) ?>>
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
