<?php
$separator_image = isset( $settings['border-image'] ) ? 'background-image: url(' . wp_get_attachment_image_url( $settings['border-image'], 'full' ) . ')' : '';
?>
<div class="stx-divider-border-image">
	<div class="stx-m-line" style="<?php echo esc_attr( $separator_image ); ?>"></div>
</div>
