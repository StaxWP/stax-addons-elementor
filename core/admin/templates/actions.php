<div class="ste-container ste-mx-auto ste-px-4">
	<div class="ste-flex ste-flex-wrap ste-overflow-hidden">
		<div class="ste-w-full ste-overflow-hidden">
			<h1 class="screen-reader-text">
				<?php esc_html_e( 'Stax - Elementor Addons Kit', 'typer' ); ?>
			</h1>
			<?php do_action( 'stax_el_' . $current_slug . '_page_content_before' ); ?>

			<?php do_action( 'stax_el_' . $current_slug . '_page_content' ); ?>

			<?php do_action( 'stax_el_' . $current_slug . '_page_content_after' ); ?>
		</div>
	</div>
</div>
