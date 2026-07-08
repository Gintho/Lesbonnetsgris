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

	$manifesto_reveal_path = get_theme_file_path( 'assets/js/manifesto-reveal.js' );
	wp_enqueue_script(
		'bonnets-gris-manifesto-reveal',
		get_theme_file_uri( 'assets/js/manifesto-reveal.js' ),
		array(),
		file_exists( $manifesto_reveal_path ) ? filemtime( $manifesto_reveal_path ) : false,
		true
	);

	$carousel_path = get_theme_file_path( 'assets/js/carousel.js' );
	wp_enqueue_script(
		'bonnets-gris-carousel',
		get_theme_file_uri( 'assets/js/carousel.js' ),
		array(),
		file_exists( $carousel_path ) ? filemtime( $carousel_path ) : false,
		true
	);

	$news_filter_path = get_theme_file_path( 'assets/js/news-filter.js' );
	wp_enqueue_script(
		'bonnets-gris-news-filter',
		get_theme_file_uri( 'assets/js/news-filter.js' ),
		array(),
		file_exists( $news_filter_path ) ? filemtime( $news_filter_path ) : false,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );
