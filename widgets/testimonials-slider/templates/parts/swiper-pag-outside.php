<?php
if ( 'no' !== $settings['slider_pagination'] ) {

	if ( isset( $unique ) && ! empty( $unique ) ) {
		$pagination_classes = 'stx-swiper-pagination-outside swiper-pagination-' . esc_attr( $unique );
	}
	?>
	<div class="swiper-pagination <?php echo esc_attr( $pagination_classes ); ?>"></div>
<?php } ?>
