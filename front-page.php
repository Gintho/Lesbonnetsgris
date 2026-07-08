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
		'eyebrow'   => bonnets_gris_page_meta( 'front-page', 'manifesto_eyebrow' ),
		'title'     => bonnets_gris_page_meta( 'front-page', 'manifesto_title' ),
		'lines'     => array(
			array(
				'text' => bonnets_gris_page_meta( 'front-page', 'manifesto_line_1' ),
			),
			array(
				'text' => bonnets_gris_page_meta( 'front-page', 'manifesto_line_2' ),
			),
			array(
				'text'      => bonnets_gris_page_meta( 'front-page', 'manifesto_line_3' ),
				'highlight' => true,
			),
		),
		'cta_label' => bonnets_gris_page_meta( 'front-page', 'manifesto_cta' ),
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
				'value' => bonnets_gris_page_meta( 'front-page', 'stat_1_value' ),
				'label' => bonnets_gris_page_meta( 'front-page', 'stat_1_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'front-page', 'stat_2_value' ),
				'label' => bonnets_gris_page_meta( 'front-page', 'stat_2_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'front-page', 'stat_3_value' ),
				'label' => bonnets_gris_page_meta( 'front-page', 'stat_3_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'front-page', 'stat_4_value' ),
				'label' => bonnets_gris_page_meta( 'front-page', 'stat_4_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'front-page', 'stat_5_value' ),
				'label' => bonnets_gris_page_meta( 'front-page', 'stat_5_label' ),
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
		'cta_url'     => bonnets_gris_link( 'boutique' ),
		'cta_target'  => '_blank',
	)
);

get_template_part(
	'template-parts/marketing/reel-testimonial',
	null,
	array(
		'items'     => array(
			array(
				'tone'  => 'nude',
				'quote' => __( 'Je porte le bonnet gris pour tous ceux qu\'on ne voit pas assez. Un post, un partage, ça compte aussi.', 'bonnets-gris' ),
				'name'  => 'Lina',
				'role'  => __( 'Créatrice de contenu, ambassadrice des Bonnets Gris', 'bonnets-gris' ),
			),
			array(
				'tone'  => 'sky',
				'quote' => __( "Je filme mes entraînements pour montrer que courir pour la recherche, c'est accessible à tous.", 'bonnets-gris' ),
				'name'  => 'Maëlle',
				'role'  => __( 'Coureuse et créatrice de contenu', 'bonnets-gris' ),
			),
		),
		'cta_label' => __( 'Voir les témoignages', 'bonnets-gris' ),
		'cta_url'   => home_url( '/actualites/' ),
	)
);

get_template_part( 'template-parts/home/support-ways' );
get_template_part( 'template-parts/marketing/newsletter' );

get_footer();
