<?php
$size = isset( $size ) ? $size : 'thumbnail';

if ( ! empty( $item_author_image ) ) { ?>
	<div class="stx-e-media-image">
		<?php echo wp_get_attachment_image( $item_author_image, $size ); ?>
	</div>
<?php } ?>
