<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part(
	'template-parts/marketing/manifesto',
	null,
	array(
		'tone'      => 'cream',
		'eyebrow'   => __( 'Notre manifeste', 'bonnets-gris' ),
		'title'     => __( 'Les Bonnets Gris', 'bonnets-gris' ),
		'lines'     => array(
			array(
				'text' => __( 'Est une association loi 1901 fondée par des femmes touchées personnellement par les tumeurs cérébrales.', 'bonnets-gris' ),
			),
			array(
				'text' => __( "Née d'un refus du silence, l'association a pour conviction que l'on peut se battre autrement :", 'bonnets-gris' ),
			),
			array(
				'text'      => __( "Avec de l'énergie, de la lumière et de l'audace.", 'bonnets-gris' ),
				'highlight' => true,
			),
		),
		'cta_label' => __( "Rendre visible l'invisible", 'bonnets-gris' ),
		'cta_url'   => home_url( '/missions/' ),
	)
);

get_template_part(
	'template-parts/marketing/photo-mosaic-banner',
	null,
	array(
		'eyebrow' => __( 'La communauté', 'bonnets-gris' ),
		'title'   => __( 'Un mouvement, des visages', 'bonnets-gris' ),
		'people'  => array( 'Léa', 'Tom', 'Ana', 'Yanis', 'Chloé', 'Nael', 'Sofia', 'Hugo', 'Zoé', 'Adam', 'Mila', 'Léo' ),
	)
);

get_template_part(
	'template-parts/marketing/stats',
	null,
	array(
		'tone'       => 'primary',
		'pale_cards' => true,
		'items'      => array(
			array(
				'value' => '6 000',
				'label' => __( 'Nouveaux cas par an', 'bonnets-gris' ),
			),
			array(
				'value' => '4 000',
				'label' => __( 'Décès par an', 'bonnets-gris' ),
			),
			array(
				'value' => '1ère',
				'label' => __( 'Cause de mortalité chez les moins de 35 ans', 'bonnets-gris' ),
			),
			array(
				'value' => '12',
				'label' => __( 'Mois de survie médiane', 'bonnets-gris' ),
			),
			array(
				'value' => '0',
				'label' => __( 'Progrès thérapeutique en 30 ans', 'bonnets-gris' ),
			),
		),
		'source'     => __( 'Sources : ARS - INCa - ICM', 'bonnets-gris' ),
		'cta_label'  => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'    => home_url( '/la-maladie/' ),
	)
);

get_template_part( 'template-parts/home/news-teaser' );

get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'sky',
		'eyebrow'     => __( "S'engager", 'bonnets-gris' ),
		'title'       => __( 'Rejoignez le mouvement', 'bonnets-gris' ),
		'description' => __( 'Courir, collecter, donner de son temps ou devenir partenaire : il existe mille façons de porter le bonnet gris avec nous.', 'bonnets-gris' ),
		'cta_label'   => __( 'Découvrir comment nous rejoindre', 'bonnets-gris' ),
		'cta_url'     => home_url( '/rejoignez-nous/' ),
	)
);

get_template_part(
	'template-parts/marketing/photo-band-cta',
	null,
	array(
		'tone'        => 'terracotta',
		'eyebrow'     => __( 'Le symbole', 'bonnets-gris' ),
		'title'       => __( 'Portez le bonnet gris', 'bonnets-gris' ),
		'description' => __( "Un bonnet, c'est plus qu'un accessoire : c'est une façon de dire qu'on est solidaires. Retrouvez-le sur notre boutique solidaire.", 'bonnets-gris' ),
		'cta_label'   => __( 'Découvrir la boutique', 'bonnets-gris' ),
		'cta_url'     => 'https://loirparis.fr/',
		'cta_target'  => '_blank',
	)
);

get_template_part(
	'template-parts/marketing/reel-testimonial',
	null,
	array(
		'tone'  => 'nude',
		'quote' => __( 'Je porte le bonnet gris pour tous ceux qu\'on ne voit pas assez. Un post, un partage, ça compte aussi.', 'bonnets-gris' ),
		'name'  => 'Lina',
		'role'  => __( 'Créatrice de contenu, ambassadrice des Bonnets Gris', 'bonnets-gris' ),
	)
);

get_template_part( 'template-parts/home/support-ways' );
get_template_part( 'template-parts/marketing/newsletter' );

get_footer();
