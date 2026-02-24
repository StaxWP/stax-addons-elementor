<?php

if ( ! defined( 'ABSPATH' ) ) exit;

\StaxAddons\Utils::load_template(
	'widgets/icon-with-text/templates/' . $settings['layout'],
	[
		'settings' => $settings,
	]
);
