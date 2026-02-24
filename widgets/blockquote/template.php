<?php
if ( ! defined( 'ABSPATH' ) ) exit;

\StaxAddons\Utils::load_template(
	'widgets/blockquote/templates/' . $template,
	[
		'settings' => $settings,
	]
);
