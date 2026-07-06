<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part(
	'template-parts/marketing/hero',
	null,
	array(
		'tone'            => 'secondary',
		'eyebrow'         => __( 'Ensemble contre les tumeurs cérébrales', 'bonnets-gris' ),
		'title'           => __( 'Le bonnet gris est un symbole.', 'bonnets-gris' ),
		'subtitle'        => __( 'On le porte pour ceux qui se battent. Rejoignez le mouvement, pas juste une cause.', 'bonnets-gris' ),
		'primary_label'   => __( 'Faire un don', 'bonnets-gris' ),
		'primary_url'     => '#don',
		'secondary_label' => __( 'Devenir Bonnet Gris', 'bonnets-gris' ),
		'secondary_url'   => '#mouvement',
	)
);

get_template_part( 'template-parts/home/news-teaser' );

get_template_part( 'template-parts/home/mission' );
get_template_part( 'template-parts/home/missions' );

get_template_part(
	'template-parts/marketing/stats',
	null,
	array(
		'tone'  => 'primary',
		'items' => array(
			array(
				'value' => '2,4M€',
				'label' => __( 'Collectés depuis 2019', 'bonnets-gris' ),
			),
			array(
				'value' => '312',
				'label' => __( 'Familles accompagnées', 'bonnets-gris' ),
			),
			array(
				'value' => '9',
				'label' => __( 'Programmes de recherche financés', 'bonnets-gris' ),
			),
		),
	)
);

get_template_part( 'template-parts/home/events' );
get_template_part( 'template-parts/home/testimonials' );
get_template_part( 'template-parts/home/community' );
get_template_part( 'template-parts/home/partners' );
get_template_part( 'template-parts/home/faq' );
get_template_part( 'template-parts/marketing/newsletter' );

get_footer();
