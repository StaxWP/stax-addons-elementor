<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! empty( $item['item_title'] ) ) : ?>
	<h2 class="stx-e-title">
		<?php echo esc_html( $item['item_title'] ); ?>
	</h2>
	<?php
endif;
