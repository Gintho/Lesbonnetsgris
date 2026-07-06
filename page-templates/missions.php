<?php
/**
 * Template Name: Missions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part(
	'template-parts/marketing/hero',
	null,
	array(
		'tone'     => 'secondary',
		'eyebrow'  => __( 'Ce que nous faisons', 'bonnets-gris' ),
		'title'    => __( 'Nos missions', 'bonnets-gris' ),
		'subtitle' => __( 'Quatre façons de faire avancer le mouvement, ensemble.', 'bonnets-gris' ),
	)
);

get_template_part( 'template-parts/home/missions' );

get_footer();
