<?php if ( ! empty( $settings['link']['url'] ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	<a itemprop="url" href="<?php echo esc_url( $settings['link']['url'] ); ?>">
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
		<div class="stx-m-icon-holder">
			<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		</div>
<?php if ( ! empty( $settings['link']['url'] ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	</a>
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
