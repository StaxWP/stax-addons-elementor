<?php

$wrapper_classes   = [];
$wrapper_classes[] = 'stx-layout-' . $settings['layout'];
$wrapper_classes[] = 'stx-grid';
$wrapper_classes[] = 'stx-columns-small-' . $settings['columns_mobile'];
$wrapper_classes[] = 'stx-columns-medium-' . $settings['columns_tablet'];
$wrapper_classes[] = 'stx-columns-large-' . $settings['columns'];
$wrapper_classes   = implode( ' ', $wrapper_classes );

?>

<div class="stx-testimonials-wrapper <?php echo esc_attr( $wrapper_classes ); ?>">
	<div class="stx-grid-inner stx-clear">
		<?php
		foreach ( $settings['items'] as $item ) {
			$item['item_classes'] = 'elementor-repeater-item-' . $item['_id'];

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/' . $settings['layout'],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
		}
		?>
	</div>
</div>
