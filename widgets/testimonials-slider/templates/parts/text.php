<?php if ( ! empty( $item['item_text'] ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	<h3 itemprop="description" class="stx-e-text">
		<?php echo esc_html( $item['item_text'] ); ?>
	</h3>
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
