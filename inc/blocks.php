<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the "Les Bonnets Gris" block category ahead of core/plugin categories.
 */
function bonnets_gris_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'bonnets-gris',
				'title' => __( 'Les Bonnets Gris', 'bonnets-gris' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'bonnets_gris_block_categories' );

/**
 * Registers the theme's custom blocks from their compiled build/ directories.
 */
function bonnets_gris_register_blocks() {
	$blocks = array( 'jalon', 'frise', 'membre', 'portraits', 'cta', 'mosaique', 'carte-soutien' );

	foreach ( $blocks as $block ) {
		$path = get_theme_file_path( "build/{$block}" );

		if ( file_exists( "{$path}/block.json" ) ) {
			register_block_type( $path );
		}
	}
}
add_action( 'init', 'bonnets_gris_register_blocks' );
