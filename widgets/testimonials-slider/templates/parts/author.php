<?php if ( ! empty( $item['item_author_name'] ) ) : ?>

if ( ! defined( 'ABSPATH' ) ) exit;
	<div class="stx-e-author">
		<h5 class="stx-e-author-name">
			<?php echo esc_html( $item['item_author_name'] ); ?>
		</h5>
		<?php if ( ! empty( $item['item_author_occupation'] ) ) : ?>
			<span class="stx-e-author-job"><?php echo esc_html( $item['item_author_occupation'] ); ?></span>
		<?php endif; ?>
	</div>
<?php endif; ?>

if ( ! defined( 'ABSPATH' ) ) exit;
