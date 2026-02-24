<?php if ( ! empty( $icon ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	<span class="stx-e-icon">
		<?php \Elementor\Icons_Manager::render_icon( $icon, [ 'aria-hidden' => 'true' ] ); ?>
	</span>
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
