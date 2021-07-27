<?php if ( ! empty( $title ) ) : ?>
	<<?php echo esc_attr( $title_tag ); ?> class="qodef-m-title">
		<?php if ( ! empty( $link['url'] ) ) : ?>
			<a itemprop="url" href="<?php echo esc_url( $link['url'] ); ?>">
		<?php endif; ?>
			<?php echo esc_html( $title ); ?>
		<?php if ( ! empty( $link['url'] ) ) : ?>
			</a>
		<?php endif; ?>
	</<?php echo esc_attr( $title_tag ); ?>>
<?php endif; ?>
