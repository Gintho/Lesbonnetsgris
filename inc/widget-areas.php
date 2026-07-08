<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the block-editable zones used to make repeated/hardcoded
 * marketing sections administrable via custom blocks, across every page.
 */
function bonnets_gris_register_sidebars() {
	$areas = array(
		// Qui sommes-nous.
		'qui-sommes-nous-frise'           => __( 'Qui sommes-nous — Frise chronologique', 'bonnets-gris' ),
		'qui-sommes-nous-conseil'         => __( "Qui sommes-nous — Conseil d'administration", 'bonnets-gris' ),
		'qui-sommes-nous-equipe'          => __( 'Qui sommes-nous — Équipe permanente', 'bonnets-gris' ),
		'qui-sommes-nous-portraits'       => __( 'Qui sommes-nous — Portraits des fondatrices', 'bonnets-gris' ),
		'qui-sommes-nous-cta-closing'     => __( 'Qui sommes-nous — CTA de fin de page', 'bonnets-gris' ),
		// Accueil.
		'accueil-mosaique'                => __( 'Accueil — Mosaïque de photos', 'bonnets-gris' ),
		'accueil-cta-rejoignez-mouvement' => __( 'Accueil — CTA "Rejoignez le mouvement"', 'bonnets-gris' ),
		'accueil-cta-symbole'             => __( 'Accueil — CTA "Le symbole"', 'bonnets-gris' ),
		'accueil-soutien'                 => __( 'Accueil — Cartes "Nous soutenir"', 'bonnets-gris' ),
		// La Maladie.
		'la-maladie-cta-collecte'         => __( 'La Maladie — CTA "Collecte"', 'bonnets-gris' ),
		'la-maladie-cta-recherche'        => __( 'La Maladie — CTA "Recherche"', 'bonnets-gris' ),
		// Rejoignez-nous.
		'rejoignez-nous-cta-don'          => __( 'Rejoignez-nous — CTA "Faire un don"', 'bonnets-gris' ),
		'rejoignez-nous-cta-courir'       => __( 'Rejoignez-nous — CTA "Courir"', 'bonnets-gris' ),
		'rejoignez-nous-cta-collecte'     => __( 'Rejoignez-nous — CTA "Organiser une collecte"', 'bonnets-gris' ),
		'rejoignez-nous-cta-benevole'     => __( 'Rejoignez-nous — CTA "Devenir bénévole"', 'bonnets-gris' ),
		'rejoignez-nous-cta-partenaire'   => __( 'Rejoignez-nous — CTA "Devenir partenaire"', 'bonnets-gris' ),
		'rejoignez-nous-cta-closing'      => __( 'Rejoignez-nous — CTA de fin de page', 'bonnets-gris' ),
	);

	foreach ( $areas as $id => $name ) {
		register_sidebar(
			array(
				'id'            => $id,
				'name'          => $name,
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '',
				'after_title'   => '',
			)
		);
	}
}
add_action( 'widgets_init', 'bonnets_gris_register_sidebars' );
