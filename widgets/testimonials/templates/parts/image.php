<?php if ( ! empty( $item['item_author_avatar'] ) ) : ?>
	<div class="stx-e-media-image">
		<?php echo wp_get_attachment_image( $item['item_author_avatar'], 'thumbnail' ); ?>
	</div>
<?php endif; ?>
