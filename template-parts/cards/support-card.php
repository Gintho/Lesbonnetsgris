<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'nude';
$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<div class="ds-support-card ds-support-card--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-support-card__color" aria-hidden="true"></div>
	<div class="ds-support-card__panel">
		<h3 class="ds-support-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php if ( $subtitle ) : ?>
			<span class="ds-support-card__subtitle"><?php echo esc_html( $subtitle ); ?></span>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p class="ds-support-card__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--pop-orange ds-support-card__cta" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</div>
