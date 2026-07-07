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

	$components_path = get_theme_file_path( 'assets/css/components.css' );
	wp_enqueue_style(
		'bonnets-gris-components',
		get_theme_file_uri( 'assets/css/components.css' ),
		array( 'bonnets-gris-design-system' ),
		file_exists( $components_path ) ? filemtime( $components_path ) : false
	);

	wp_enqueue_style(
		'bonnets-gris-style',
		get_stylesheet_uri(),
		array( 'bonnets-gris-components' ),
		wp_get_theme()->get( 'Version' )
	);

	$parallax_path = get_theme_file_path( 'assets/js/parallax.js' );
	wp_enqueue_script(
		'bonnets-gris-parallax',
		get_theme_file_uri( 'assets/js/parallax.js' ),
		array(),
		file_exists( $parallax_path ) ? filemtime( $parallax_path ) : false,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );
