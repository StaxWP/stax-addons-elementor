<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="stx-divider-wrapper">
	<?php
	\StaxAddons\Utils::load_template(
		'widgets/divider/templates/' . $settings['layout'],
		[
			'settings' => $settings,
		]
	);
	?>
</div>
