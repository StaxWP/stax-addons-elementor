<?php if ( ! empty( $link['url'] ) ) : ?>
	<a itemprop="url" href="<?php echo esc_url( $link['url'] ); ?>">
<?php endif; ?>
		<div class="stx-m-icon-holder">
			<?php \Elementor\Icons_Manager::render_icon( $icon_type, [ 'aria-hidden' => 'true' ] ); ?>
		</div>
<?php if ( ! empty( $link['url'] ) ) : ?>
	</a>
<?php endif; ?>
