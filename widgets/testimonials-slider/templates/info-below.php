<div class="swiper-slide <?php echo esc_attr( 'elementor-repeater-item-' . $item['_id'] ); ?>">
	<div class="stx-e-inner">
		<?php
		\StaxAddons\Utils::load_template(
			'widgets/testimonials-slider/templates/parts/image',
			[
				'item'     => $item,
				'settings' => $settings,
			]
		);
		?>
		<div class="stx-e-content">
			<?php
			\StaxAddons\Utils::load_templates(
				[
					'widgets/testimonials-slider/templates/parts/quote',
					'widgets/testimonials-slider/templates/parts/title',
					'widgets/testimonials-slider/templates/parts/text',
					'widgets/testimonials-slider/templates/parts/author',
				],
				[
					'item'     => $item,
					'settings' => $settings,
				]
			);
			?>
		</div>
	</div>
</div>
