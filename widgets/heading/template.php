<?php if ( ! defined( 'ABSPATH' ) ) exit; 

// Validate HTML tags against whitelist to prevent XSS
$allowed_tags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];
$title_tag = in_array($settings['title_tag'], $allowed_tags, true) ? $settings['title_tag'] : 'h2';
?>
<div <?php echo $wrapper_attribute; ?>>
	<?php

	echo $separator_top;
	echo $subtitle_before_title;
	echo $separator_before;

	?>

	<?php

	if ( ! empty( $settings['title'] ) ) {
		echo '<' . $title_tag . ' class="stx-title"><span class="' . esc_attr__( $settings['title_ornament'] ) . '">
            ' . \StaxAddons\Utils::curly( $settings['title'] ) . '
        </span></' . $title_tag . '>';
	}

	?>

	<?php

	echo $separator_after;
	echo $subtitle_after_title;

	if ( ! empty( $settings['description'] ) && $settings['description_section_show'] === 'yes' ) {
		?>
		<div class="stx-description"><?php echo $settings['description']; ?></div>
		<?php
	}

	?>

	<?php echo $separator_bottom; ?>

</div>
