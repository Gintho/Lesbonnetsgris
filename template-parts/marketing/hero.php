<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone             = $args['tone'] ?? 'pop-blue';
$eyebrow          = $args['eyebrow'] ?? '';
$title            = $args['title'] ?? '';
$subtitle         = $args['subtitle'] ?? '';
$primary_label    = $args['primary_label'] ?? '';
$primary_url      = $args['primary_url'] ?? '#';
$secondary_label  = $args['secondary_label'] ?? '';
$secondary_url    = $args['secondary_url'] ?? '#';

$is_light_bg        = 'secondary' === $tone;
$eyebrow_badge_mod  = $is_light_bg ? 'ds-badge--on-light-hero' : 'ds-badge--on-dark-hero';
$secondary_variant  = $is_light_bg ? 'outline' : 'outline-inverse';
?>
<section class="ds-hero ds-hero--<?php echo esc_attr( $tone ); ?>">
	<?php if ( $eyebrow ) : ?>
		<span class="ds-badge <?php echo esc_attr( $eyebrow_badge_mod ); ?>"><?php echo esc_html( $eyebrow ); ?></span>
	<?php endif; ?>
	<h1 class="ds-display-xxl ds-hero__title"><?php echo esc_html( $title ); ?></h1>
	<?php if ( $subtitle ) : ?>
		<p class="ds-hero__subtitle"><?php echo esc_html( $subtitle ); ?></p>
	<?php endif; ?>
	<div class="ds-hero__actions">
		<?php if ( $primary_label ) : ?>
			<a class="ds-button ds-button--primary" href="<?php echo esc_url( $primary_url ); ?>"><?php echo esc_html( $primary_label ); ?></a>
		<?php endif; ?>
		<?php if ( $secondary_label ) : ?>
			<a class="ds-button ds-button--<?php echo esc_attr( $secondary_variant ); ?>" href="<?php echo esc_url( $secondary_url ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
		<?php endif; ?>
	</div>
</section>
