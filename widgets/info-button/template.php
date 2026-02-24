<?php
if ( ! defined( 'ABSPATH' ) ) exit;


\StaxAddons\Utils::load_template(
	'widgets/info-button/templates/' . $settings['layout'],
	[
		'settings' => $settings,
	]
);
