<div class="stx-testimonials-wrapper">
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
