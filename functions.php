<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bonnets_gris_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'bonnets-gris' ),
		)
	);
}
add_action( 'after_setup_theme', 'bonnets_gris_setup' );

/**
 * Design System — chargement en cascade : tokens > base > composants.
 * L'ordre est une dépendance explicite (chaque fichier consomme les
 * custom properties déclarées dans le précédent).
 */
function bonnets_gris_scripts() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'bonnets-gris-tokens', get_template_directory_uri() . '/assets/css/tokens.css', array(), $theme_version );
	wp_enqueue_style( 'bonnets-gris-base', get_template_directory_uri() . '/assets/css/base.css', array( 'bonnets-gris-tokens' ), $theme_version );
	wp_enqueue_style( 'bonnets-gris-components', get_template_directory_uri() . '/assets/css/components.css', array( 'bonnets-gris-base' ), $theme_version );
	wp_enqueue_style( 'bonnets-gris-style', get_stylesheet_uri(), array( 'bonnets-gris-components' ), $theme_version );

	wp_enqueue_script( 'bonnets-gris-nav', get_template_directory_uri() . '/assets/js/nav.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );

/**
 * Mêmes fondations dans l'éditeur de blocs, pour que ce qu'on voit dans
 * Gutenberg corresponde à ce qui sera rendu côté visiteur.
 */
function bonnets_gris_editor_styles() {
	add_editor_style(
		array(
			'assets/css/tokens.css',
			'assets/css/base.css',
			'assets/css/components.css',
		)
	);
}
add_action( 'after_setup_theme', 'bonnets_gris_editor_styles' );
