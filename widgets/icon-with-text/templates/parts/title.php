<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tag against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$title_tag = in_array($settings['title_tag'], $allowed_tags, true) ? $settings['title_tag'] : 'h2';
?>
<?php if ( ! empty( $settings['title_text'] ) ) : ?>

	<<?php echo $title_tag; ?> class="stx-m-title">
		<?php if ( ! empty( $settings['title_link']['url'] ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $settings['title_link']['url'] ); ?>">
		<?php endif; ?>
			<span class="stx-m-title-text"><?php echo esc_html( $settings['title_text'] ); ?></span>
		<?php if ( ! empty( $settings['title_link']['url'] ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo $title_tag; ?>>
<?php endif; ?>

