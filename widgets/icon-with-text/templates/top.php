<div class="stx-icon-with-text stx-variation-top">
	<?php if ( isset( $settings['icon'] ) && ! empty( $settings['icon']['value'] ) ) : ?>
		<div class="stx-m-icon-wrapper">
			<?php
			\StaxAddons\Utils::load_template(
				'widgets/icon-with-text/templates/parts/icon',
				[
					'settings' => $settings,
				]
			);
			?>
		</div>
	<?php endif; ?>
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/separator',
			[
				'settings' => $settings,
			]
		);

		\StaxAddons\Utils::load_template(
			'widgets/icon-with-text/templates/parts/title',
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