<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow      = $attributes['eyebrow'] ?? '';
$title        = $attributes['title'] ?? '';
$inner_blocks = $block->parsed_block['innerBlocks'] ?? array();
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<div class="ds-section__header ds-photo-mosaic__header">
			<div>
				<?php if ( $eyebrow ) : ?>
					<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
				<?php endif; ?>
				<h2 class="ds-h1 ds-mission__title"><?php echo esc_html( $title ); ?></h2>
			</div>
		</div>
	</div>
	<div class="ds-photo-mosaic">
		<?php foreach ( $inner_blocks as $index => $inner_block ) : ?>
			<div class="ds-photo-mosaic__tile<?php echo ( 0 === $index % 5 ) ? ' ds-photo-mosaic__tile--large' : ''; ?>">
				<?php echo render_block( $inner_block ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>
