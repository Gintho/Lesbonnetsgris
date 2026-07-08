<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'nude';
$image       = $args['image'] ?? '';
$image_alt   = $args['image_alt'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<div class="ds-photo-float">
	<div class="ds-photo-float__media ds-photo-float__media--<?php echo esc_attr( $tone ); ?><?php echo $image ? '' : ' is-placeholder'; ?>">
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
		<?php endif; ?>
	</div>
	<div class="ds-photo-float__card">
		<?php if ( $description ) : ?>
			<p class="ds-photo-float__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--outline" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</div>
