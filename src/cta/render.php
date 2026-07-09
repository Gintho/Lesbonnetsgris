<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$layout          = $attributes['layout'] ?? 'horizontal';
$reverse         = ! empty( $attributes['reverse'] );
$background_type = $attributes['backgroundType'] ?? 'couleur';
$tone            = $attributes['tone'] ?? 'nude';
$media_url       = $attributes['mediaUrl'] ?? '';
$eyebrow         = $attributes['eyebrow'] ?? '';
$title           = $attributes['title'] ?? '';
$description     = $attributes['description'] ?? '';
$cta_label       = $attributes['ctaLabel'] ?? '';
$cta_url         = $attributes['ctaUrl'] ?? '#';
$cta_target      = $attributes['ctaTarget'] ?? '';
$image           = ( 'media' === $background_type ) ? $media_url : '';

if ( 'centre' === $layout ) {
	get_template_part(
		'template-parts/marketing/closing-cta',
		null,
		array(
			'tone'        => $tone,
			'title'       => $title,
			'description' => $description,
			'cta_label'   => $cta_label,
			'cta_url'     => $cta_url,
		)
	);
} elseif ( 'bande-photo' === $layout ) {
	get_template_part(
		'template-parts/marketing/photo-band-cta',
		null,
		array(
			'tone'        => $tone,
			'image'       => $image,
			'eyebrow'     => $eyebrow,
			'title'       => $title,
			'description' => $description,
			'cta_label'   => $cta_label,
			'cta_url'     => $cta_url,
			'cta_target'  => $cta_target,
		)
	);
} else {
	get_template_part(
		'template-parts/marketing/horizontal-push',
		null,
		array(
			'tone'        => $tone,
			'reverse'     => $reverse,
			'image'       => $image,
			'eyebrow'     => $eyebrow,
			'title'       => $title,
			'description' => $description,
			'cta_label'   => $cta_label,
			'cta_url'     => $cta_url,
		)
	);
}
