<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tag against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$text_tag = in_array($settings['text_tag'], $allowed_tags, true) ? $settings['text_tag'] : 'p';
?>
<div class="stx-typeout-text-wrapper" data-strings="<?php echo esc_attr( $items ); ?>" data-cursor="<?php echo esc_attr( $settings['separator'] ); ?>">
	<<?php echo $text_tag; ?> class="stx-m-text">
		<?php if ( ! empty( $settings['text'] ) ) : ?>
			<?php echo esc_html( $settings['text'] ); ?>
		<?php endif; ?>
		<?php if ( $settings['new_line'] ) : ?>
			<br />
		<?php endif; ?>
		<span class="stx-typeout-holder">
			<span class="stx-typeout"></span>
		</span>
	</<?php echo $text_tag; ?>>
</div>
