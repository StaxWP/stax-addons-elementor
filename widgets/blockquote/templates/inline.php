<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tag against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$text_tag = in_array($settings['text_tag'], $allowed_tags, true) ? $settings['text_tag'] : 'h4';
?>
<div class="stx-blockquote-wrapper">
	<?php if ( ! empty( $settings['text'] ) ) : ?>
		<<?php echo $text_tag; ?> class="stx-m-text">
			<?php if ( isset( $settings['icon'] ) && ! empty( $settings['icon']['value'] ) ) : ?>
				<span class="stx-m-icon">
					<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</span>
			<?php endif; ?>
			<?php echo esc_html( $settings['text'] ); ?>
		</<?php echo $text_tag; ?>>
	<?php endif; ?>
</div>
