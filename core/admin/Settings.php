<?php

namespace StaxAddons;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Settings
 * @package StaxAddons
 */
class Settings {

	/**
	 * @var null
	 */
	public static $instance;

	/**
	 * @var string
	 */
	private $current_slug = '';

	/**
	 * @return Settings|null
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
		add_action( 'admin_menu', [ $this, 'register_menu' ], 20 );
		add_action( 'admin_menu', [ $this, 'admin_menu_change_name' ], 200 );
		add_action( 'admin_enqueue_scripts', [ $this, 'settings_template_scripts' ] );

		add_action( 'stax_el_menu_panel_action', [ $this, 'settings_template_actions' ] );
	}

	/**
	 * Register admin menu
	 */
	public function register_menu() {
		add_menu_page(
			__( 'STAX Elementor Dashboard', 'stax-addons-for-elementor' ),
			__( 'Elementor Addons', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-widgets', /*Plugin::instance()->get_slug(),*/
			[ $this, 'settings_template' ],
			'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxNTM2IDE1MzYiPjxkZWZzPjxzdHlsZT4uYXtmaWxsOiMyMzFmMjA7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5icDwvdGl0bGU+PHBhdGggY2xhc3M9ImEiIGQ9Ik02MjIsMzM0LjExaDBMODQyLjkxLDE5OS41NGM4LjI2LTUsMTMuNi0xMi4zOCwxNC42NC0yMC4xNC44Ny02LjUtMS4yMy0xMi42NS02LjA4LTE3Ljc5LTYuNTctNy0xNi43NC0xMC41NS0yNy4zMy0xMC41NWE0NS44Niw0NS44NiwwLDAsMC0yMy43NCw2LjUyTDU3OS41MiwyOTIuMTVjLTguMjcsNS0xMy42LDEyLjM4LTE0LjY1LDIwLjE0LS44Nyw2LjUsMS4yNCwxMi42NSw2LjA5LDE3Ljc4QzU4Mi41OSwzNDIuMzgsNjA1LjUsMzQ0LjE5LDYyMiwzMzQuMTFaIi8+PHBhdGggY2xhc3M9ImEiIGQ9Ik03NzMsMTM1OS43NGMxNy4yNiwwLDMxLjMtMTQuNTQsMzEuMy0zMi40MVY3OTIuNWwyLjQ0LTEuNDYsNDQ3LjA5LTI2NmMxNS04Ljk0LDIwLjE3LTI4Ljg0LDExLjQ4LTQ0LjM2YTMxLjI2LDMxLjI2LDAsMCwwLTE5LjI0LTE1LjEyLDMwLjE5LDMwLjE5LDAsMCwwLTIzLjQzLDMuMjhMNzczLDczNi4zNmwtMi41Ni0xLjUyLTQ0Ny4wOC0yNjZhMzAuMTgsMzAuMTgsMCwwLDAtMjMuNDUtMy4yNywzMS4yLDMxLjIsMCwwLDAtMTkuMjIsMTUuMTFDMjcyLDQ5Ni4yLDI3Ny4xMyw1MTYuMSwyOTIuMTYsNTI1TDc0MS42OCw3OTIuNXY1MzQuODNDNzQxLjY4LDEzNDUuMiw3NTUuNzMsMTM1OS43NCw3NzMsMTM1OS43NFoiLz48cGF0aCBjbGFzcz0iYSIgZD0iTTEzOTEuNDYsMTE4NS43YTk5LjE0LDk5LjE0LDAsMCwwLDQ5LjMzLTg1LjU5Vjg1MC40N2EzMS45MiwzMS45MiwwLDEsMC02My44MywwdjI0OS42NGEzNSwzNSwwLDAsMS0xNy40LDMwLjJsLTU3NC4xNSwzMzIuMWEzNC44NywzNC44NywwLDAsMS0zNC44MiwwbC01NzQuMTUtMzMyLjFhMzUsMzUsMCwwLDEtMTcuNC0zMC4yVjQzNS45YTM1LDM1LDAsMCwxLDE3LjQtMzAuMkw3NTAuNiw3My42YTM0LjgzLDM0LjgzLDAsMCwxLDM0LjgxLDBsNTc0LjE1LDMzMi4xYTM1LDM1LDAsMCwxLDE3LjQsMzAuMnYyNDJhMzEuOTIsMzEuOTIsMCwxLDAsNjMuODMsMHYtMjQyYTk5LjE1LDk5LjE1LDAsMCwwLTQ5LjMzLTg1LjZMODE3LjMyLDE4LjJhOTguNzIsOTguNzIsMCwwLDAtOTguNjMsMEwxNDQuNTQsMzUwLjNhOTkuMTcsOTkuMTcsMCwwLDAtNDkuMzMsODUuNnY2NjQuMmE5OS4xNSw5OS4xNSwwLDAsMCw0OS4zMyw4NS42bDU3NC4xNCwzMzIuMWE5OC43NCw5OC43NCwwLDAsMCw5OC42NCwwWiIvPjwvc3ZnPg==',
			'58.7'
		);

		/*add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Widgets Settings', 'stax-addons-for-elementor' ),
			__( 'Widgets', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-widgets',
			[ $this, 'settings_template' ]
		);*/

		/*add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Modules Settings', 'stax-addons-for-elementor' ),
			__( 'Modules', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-modules',
			[ $this, 'settings_template' ]
		);*/

		/*add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Templates', 'stax-addons-for-elementor' ),
			__( 'Templates', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-templates',
			[ $this, 'settings_template' ]
		);*/

		/*add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Support', 'stax-addons-for-elementor' ),
			__( 'Support', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-support',
			[ $this, 'external_redirect_handler' ]
		);*/

		/*add_submenu_page(
			Plugin::instance()->get_slug(),
			'',
			'<span class="dashicons dashicons-star-filled" style="font-size: 17px"></span> ' . __( 'Go Pro', 'stax-addons-for-elementor' ),
			'manage_options',
			'stax-elementor-pro',
			[ $this, 'external_redirect_handler' ]
		);*/

	}

	/**
	 * Change fist menu item name
	 */
	public function admin_menu_change_name() {
		global $submenu;

		if ( isset( $submenu[ Plugin::instance()->get_slug() ] ) ) {
			$submenu[ Plugin::instance()->get_slug() ][0][0] = __( 'Dashboard', 'stax-addons-for-elementor' );
		}
	}

	/**
	 * Settings template
	 */
	public function settings_template() {
		$site_url      = apply_filters( 'stax_el_admin_site_url', 'https://seventhqueen.com' );
		$wrapper_class = apply_filters( 'stax_el_welcome_wrapper_class', [ $this->current_slug ] );

		?>
        <div class="sqp_stax_el_options wrap ste-m-0 <?php echo esc_attr( implode( ' ', $wrapper_class ) ); ?>">
            <div class="ste-bg-white ste-py-5 ste-mb-5 ste-shadow">
                <div class="ste-container ste-mx-auto ste-px-5 ste-flex ste-flex-wrap ste-justify-between ste-items-center">
                    <div class="ste-text-left">
                        <a href="<?php echo esc_url( $site_url ); ?>" target="_blank" rel="noopener"
                           class="ste-text-base ste-flex ste-items-center ste-content-center ste-no-underline">
                            <img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/img/logo-black.png' ) ); ?>"
                                 class="ste-border-0 ste-w-32" alt="STAX - Addons for Elementor">
                            <span class="ste-bg-gray-300 ste-text-gray-600 ste-ml-4 ste-px-2 ste-py-1 ste-text-xs ste-rounded ste-no-underline"><?php echo STAX_EL_VERSION; ?></span>
                        </a>
                    </div>
                </div>
            </div>

			<?php do_action( 'stax_el_menu_panel_action' ); ?>
        </div>
		<?php
	}

	/**
	 * Settings template actions
	 */
	public function settings_template_actions() {
		$current_slug = apply_filters( 'stax_el_current_slug', $this->current_slug );
		require( STAX_EL_CORE_PATH . 'admin/templates/actions.php' );
	}

	/**
	 * Load scripts & styles
	 */
	public function settings_template_scripts() {
		wp_register_style(
			'stax-addons-tw',
			STAX_EL_ASSETS_URL . 'css/admin.css',
			[],
			STAX_EL_VERSION,
			'all'
		);

		wp_register_script(
			'stax-addons-js',
			STAX_EL_ASSETS_URL . 'js/admin.js',
			[ 'jquery' ],
			STAX_EL_VERSION,
			true
		);

		wp_enqueue_style( 'stax-addons-tw' );
		wp_enqueue_script( 'stax-addons-js' );

	}

	/**
	 * External redirect handler
	 */
	public function external_redirect_handler() {
		if ( empty( $_GET['page'] ) ) {
			return;
		}

		if ( 'stax-elementor-pro' === $_GET['page'] ) {
			wp_redirect( 'https://seventhqueen.com' );
			die;
		}

		if ( 'stax-elementor-support' === $_GET['page'] ) {
			wp_redirect( 'https://my.seventhqueen.com' );
			die;
		}
	}

}

Settings::instance();
