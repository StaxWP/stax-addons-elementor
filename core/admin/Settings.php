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
			__( 'STAX Elementor Dashboard', 'stax-elementor' ),
			__( 'Elementor Addons', 'stax-elementor' ),
			'manage_options',
			Plugin::instance()->get_slug(),
			[ $this, 'settings_template' ],
			'',
			'58.7'
		);

		add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Widgets Settings', 'stax-elementor' ),
			__( 'Widgets', 'stax-elementor' ),
			'manage_options',
			'stax-elementor-widgets',
			[ $this, 'settings_template' ]
		);

		add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Modules Settings', 'stax-elementor' ),
			__( 'Modules', 'stax-elementor' ),
			'manage_options',
			'stax-elementor-modules',
			[ $this, 'settings_template' ]
		);

		add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Templates', 'stax-elementor' ),
			__( 'Templates', 'stax-elementor' ),
			'manage_options',
			'stax-elementor-templates',
			[ $this, 'settings_template' ]
		);

		add_submenu_page(
			Plugin::instance()->get_slug(),
			__( 'STAX Elementor Support', 'stax-elementor' ),
			__( 'Support', 'stax-elementor' ),
			'manage_options',
			'stax-elementor-support',
			[ $this, 'external_redirect_handler' ]
		);

		add_submenu_page(
			Plugin::instance()->get_slug(),
			'',
			'<span class="dashicons dashicons-star-filled" style="font-size: 17px"></span> ' . __( 'Go Pro', 'stax-elementor' ),
			'manage_options',
			'stax-elementor-pro',
			[ $this, 'external_redirect_handler' ]
		);

	}

	/**
	 * Change fist menu item name
	 */
	public function admin_menu_change_name() {
		global $submenu;

		if ( isset( $submenu[ Plugin::instance()->get_slug() ] ) ) {
			$submenu[ Plugin::instance()->get_slug() ][0][0] = __( 'Dashboard', 'stax-elementor' );
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
			wp_redirect( 'https://seventhqueen.com' );
			die;
		}
	}

}

Settings::instance();
