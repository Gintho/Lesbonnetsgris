<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone       = $args['tone'] ?? 'sky';
$video      = $args['video'] ?? '';
$eyebrow    = $args['eyebrow'] ?? '';
$title      = $args['title'] ?? '';
$paragraphs = $args['paragraphs'] ?? array();
?>
<div class="ds-story-spotlight">
	<div class="ds-story-spotlight__media ds-story-spotlight__media--<?php echo esc_attr( $tone ); ?><?php echo $video ? '' : ' is-placeholder'; ?>">
		<?php if ( $video ) : ?>
			<video src="<?php echo esc_url( $video ); ?>" playsinline muted loop></video>
		<?php endif; ?>
		<span class="ds-story-spotlight__play" aria-hidden="true">
			<svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21 11.27a1.5 1.5 0 0 1 0 2.6L2.5 24.6A1.5 1.5 0 0 1 .25 23.3V2.7A1.5 1.5 0 0 1 2.5 1.4L21 11.27Z" fill="currentColor" />
			</svg>
		</span>
	</div>
	<div class="ds-story-spotlight__content">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<h2 class="ds-h2"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php foreach ( $paragraphs as $paragraph ) : ?>
			<p class="ds-story-spotlight__paragraph"><?php echo esc_html( $paragraph ); ?></p>
		<?php endforeach; ?>
	</div>
</div>
