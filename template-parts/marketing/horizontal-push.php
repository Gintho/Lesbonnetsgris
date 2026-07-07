<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'nude';
$reverse     = ! empty( $args['reverse'] );
$eyebrow     = $args['eyebrow'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<div class="ds-horizontal-push<?php echo $reverse ? ' ds-horizontal-push--reverse' : ''; ?>">
	<div class="ds-horizontal-push__visual ds-horizontal-push__visual--<?php echo esc_attr( $tone ); ?>" aria-hidden="true"></div>
	<div class="ds-horizontal-push__content">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral ds-horizontal-push__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h3 class="ds-h2"><?php echo esc_html( $title ); ?></h3>
		<?php if ( $description ) : ?>
			<p class="ds-horizontal-push__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--pop-orange ds-horizontal-push__cta" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</div>
