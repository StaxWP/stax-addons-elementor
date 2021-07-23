<div class="stx-section-title-wrapper">
	<?php
	if ( 'above' === $settings['subtitle_position'] ) {
		\StaxAddons\Utils::load_template(
			'widgets/section-title/templates/parts/subtitle',
			[
				'settings' => $settings,
			]
		);
	}

	\StaxAddons\Utils::load_template(
		'widgets/section-title/templates/parts/title',
		[
			'items'    => $items,
			'settings' => $settings,
		]
	);

	if ( 'below' === $settings['subtitle_position'] ) {
		\StaxAddons\Utils::load_template(
			'widgets/section-title/templates/parts/subtitle',
			[
				'settings' => $settings,
			]
		);
	}

	\StaxAddons\Utils::load_template(
		'widgets/section-title/templates/parts/text',
		[
			'settings' => $settings,
		]
	);

	\StaxAddons\Utils::load_template(
		'widgets/section-title/templates/parts/button',
		[
			'settings' => $settings,
		]
	);
	?>
</div>