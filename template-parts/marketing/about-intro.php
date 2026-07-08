<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow    = $args['eyebrow'] ?? '';
$title      = $args['title'] ?? '';
$paragraphs = $args['paragraphs'] ?? array();
?>
<div class="ds-about-intro">
	<div class="ds-about-intro__label">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<?php if ( $title ) : ?>
			<h2 class="ds-h1"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
	</div>
	<div class="ds-about-intro__body">
		<?php foreach ( $paragraphs as $paragraph ) : ?>
			<p><?php echo esc_html( $paragraph ); ?></p>
		<?php endforeach; ?>
	</div>
</div>
