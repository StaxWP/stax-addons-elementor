<div class="stx-counter-wrapper" data-start-digit="<?php echo (int) esc_html( $settings['start-digit'] ); ?>" data-end-digit="<?php echo (int) esc_html( $settings['end-digit'] ); ?>">
	<div class="stx-m-digit-wrapper">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/divider/templates/parts/digit',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
	<?php
	\StaxAddons\Utils::load_template(
		'widgets/divider/templates/parts/separator',
		[
			'settings' => $settings,
		]
	);
	?>
	<div class="stx-m-content">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/divider/templates/parts/title',
			[
				'settings' => $settings,
			]
		);

		\StaxAddons\Utils::load_template(
			'widgets/divider/templates/parts/text',
			[
				'settings' => $settings,
			]
		);
		?>
	</div>
</div>
