<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tag against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$title_tag = in_array($settings['title_tag'], $allowed_tags, true) ? $settings['title_tag'] : 'h3';
?>
<<?php echo $title_tag; ?> class="stx-e-title-holder">
	<span class="stx-e-title"><?php echo esc_html( $item['item_title'] ); ?></span>
	<span class="stx-e-mark">
		<span class="stx-icon--plus">
			<?php
			if ( isset( $settings['icon_open'] ) && ! empty( $settings['icon_open']['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'icon' => $settings['icon_open'],
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
			if ( isset( $settings['icon_close'] ) && ! empty( $settings['icon_close']['value'] ) ) {
				\StaxAddons\Utils::load_template(
					'widgets/accordion/templates/parts/icon',
					[
						'icon' => $settings['icon_close'],
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
</<?php echo $title_tag; ?>>
<div class="stx-e-content">
	<div class="stx-e-content-inner">
		<?php echo esc_html( $item['item_content'] ); ?>
	</div>
</div>
