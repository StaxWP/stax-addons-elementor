<div class="">
	<?php
	foreach ( $items as $item ) {
		$item['title_tag']  = $title_tag;
		$item['icon_open']  = $icon_open;
		$item['icon_close'] = $icon_close;

		\StaxAddons\Utils::load_template(
			'widgets/accordion/templates/child',
			[
				'settings' => $settings,
			]
		);
	}
	?>
</div>
