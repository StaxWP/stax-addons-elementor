<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tag against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$subtitle_tag = in_array($settings['subtitle_tag'], $allowed_tags, true) ? $settings['subtitle_tag'] : 'h3';
?>
<?php if ( ! empty( $settings['subtitle'] ) ) : ?>

	<<?php echo $subtitle_tag; ?> class="stx-m-subtitle">
		<?php echo esc_html( $settings['subtitle'] ); ?>
	</<?php echo $subtitle_tag; ?>>
<?php endif; ?>

