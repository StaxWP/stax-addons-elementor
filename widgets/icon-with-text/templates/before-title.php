<div class="stx-icon-with-text stx-variation-before-title">
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/title-with-icon',
			[
				'settings' => $settings,
			]
		);

		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/separator',
			[
				'settings' => $settings,
			]
		);

		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/text',
			[
				'settings' => $settings,
			]
		);

		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/button',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
</div>
