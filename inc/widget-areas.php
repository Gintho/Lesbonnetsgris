<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the block-editable zones used to make the "Qui sommes-nous"
 * timeline, team and founder portraits administrable via custom blocks.
 */
function bonnets_gris_register_sidebars() {
	$areas = array(
		'qui-sommes-nous-frise'     => __( 'Qui sommes-nous — Frise chronologique', 'bonnets-gris' ),
		'qui-sommes-nous-conseil'   => __( "Qui sommes-nous — Conseil d'administration", 'bonnets-gris' ),
		'qui-sommes-nous-equipe'    => __( 'Qui sommes-nous — Équipe permanente', 'bonnets-gris' ),
		'qui-sommes-nous-portraits' => __( 'Qui sommes-nous — Portraits des fondatrices', 'bonnets-gris' ),
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
