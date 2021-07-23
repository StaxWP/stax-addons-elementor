<div class="stx-layout-info-below <?php echo esc_attr( $item['item_classes'] ); ?>">
	<div class="stx-e-inner">
		<div class="stx-e-content">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/quote',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/title',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/text',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/image',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);

			\StaxAddons\Utils::load_template(
				'widgets/testimonials/templates/parts/author',
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
			?>
		</div>
	</div>
</div>