<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'cream';
$eyebrow     = $args['eyebrow'] ?? '';
$text_before = $args['text_before'] ?? '';
$highlight   = $args['highlight'] ?? '';
$text_after  = $args['text_after'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<section class="ds-section ds-section--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-section__inner ds-manifesto">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-eyebrow ds-manifesto__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<p class="ds-manifesto__text">
			<?php echo esc_html( $text_before ); ?>
			<?php if ( $highlight ) : ?>
				<span class="ds-manifesto__highlight"><?php echo esc_html( $highlight ); ?></span>
			<?php endif; ?>
			<?php echo esc_html( $text_after ); ?>
		</p>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--outline" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
