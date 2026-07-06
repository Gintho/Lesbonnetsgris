<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bonnets_gris_scripts() {
	$design_system_path = get_theme_file_path( 'assets/css/design-system.css' );
	wp_enqueue_style(
		'bonnets-gris-design-system',
		get_theme_file_uri( 'assets/css/design-system.css' ),
		array(),
		file_exists( $design_system_path ) ? filemtime( $design_system_path ) : false
	);

	wp_enqueue_style(
		'bonnets-gris-style',
		get_stylesheet_uri(),
		array( 'bonnets-gris-design-system' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );
