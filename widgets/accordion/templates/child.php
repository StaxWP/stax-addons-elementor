<<?php echo esc_attr( $title_tag ); ?> class="stx-e-title-holder">
	<span class="stx-e-title"><?php echo esc_html( $item_title ); ?></span>
	<span class="stx-e-mark">
		<span class="stx-icon--plus">
			<?php
			if ( isset( $icon_open ) && ! empty( $icon_open['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'settings' => $settings,
					]
				);
			} else {
				?>
				+
				<?php
			}
			?>
		</span>
		<span class="stx-icon--minus">
			<?php
			if ( isset( $icon_close ) && ! empty( $icon_close['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'settings' => $settings,
					]
				);
			} else {
				?>
				-
				<?php
			}
			?>
		</span>
	</span>
</<?php echo esc_attr( $title_tag ); ?>>
<div class="stx-e-content">
	<div class="stx-e-content-inner">
		<?php echo esc_html( $item_content ); ?>
	</div>
</div>
