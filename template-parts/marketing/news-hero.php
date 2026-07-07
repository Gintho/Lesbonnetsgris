<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow     = $args['eyebrow'] ?? '';
$title       = $args['title'] ?? '';
$subtitle    = $args['subtitle'] ?? '';
$description = $args['description'] ?? '';
$image       = $args['image'] ?? '';
$image_alt   = $args['image_alt'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';

$heading_tag = $args['heading_tag'] ?? 'h1';
if ( ! in_array( $heading_tag, array( 'h1', 'h2', 'h3' ), true ) ) {
	$heading_tag = 'h1';
}
?>
<section class="ds-news-hero">
	<div class="ds-news-hero__blocks" aria-hidden="true">
		<span class="ds-news-hero__block ds-news-hero__block--1"></span>
		<span class="ds-news-hero__block ds-news-hero__block--2"></span>
		<span class="ds-news-hero__block ds-news-hero__block--3"></span>
		<span class="ds-news-hero__block ds-news-hero__block--4"></span>
	</div>
	<div class="ds-news-hero__image<?php echo $image ? '' : ' is-placeholder'; ?>">
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>" />
		<?php endif; ?>
	</div>
	<div class="ds-news-hero__card">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--secondary"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<?php printf( '<%1$s class="ds-h1 ds-news-hero__title">%2$s</%1$s>', esc_html( $heading_tag ), esc_html( $title ) ); ?>
		<?php if ( $subtitle ) : ?>
			<p class="ds-news-hero__subtitle"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p class="ds-news-hero__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--primary" href="<?php echo esc_url( $cta_url ); ?>"><?php echo esc_html( $cta_label ); ?></a>
		<?php endif; ?>
	</div>
</section>
