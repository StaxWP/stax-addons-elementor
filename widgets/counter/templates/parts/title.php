<?php if ( ! empty( $settings['title'] ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	<<?php echo esc_attr( $settings['title_tag'] ); ?> class="stx-m-title">
		<?php echo esc_html( $settings['title'] ); ?>
	</<?php echo esc_attr( $settings['title_tag'] ); ?>>
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
