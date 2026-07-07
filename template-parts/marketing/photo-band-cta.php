<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'terracotta';
$image       = $args['image'] ?? '';
$eyebrow     = $args['eyebrow'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
$cta_target  = $args['cta_target'] ?? '';
?>
<section class="ds-photo-band">
	<div class="ds-photo-band__visual ds-photo-band__visual--<?php echo esc_attr( $tone ); ?><?php echo $image ? '' : ' is-placeholder'; ?>">
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
	<div class="ds-photo-band__card">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--dark"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h2 class="ds-h1"><?php echo esc_html( $title ); ?></h2>
		<?php if ( $description ) : ?>
			<p class="ds-photo-band__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a
				class="ds-button ds-button--primary"
				href="<?php echo esc_url( $cta_url ); ?>"
				<?php echo $cta_target ? 'target="' . esc_attr( $cta_target ) . '" rel="noopener"' : ''; ?>
			>
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
