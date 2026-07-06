<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bonnets_gris_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	register_nav_menus(
		array(
			'primary' => __( 'Menu principal', 'bonnets-gris' ),
		)
	);
}
add_action( 'after_setup_theme', 'bonnets_gris_setup' );

function bonnets_gris_scripts() {
	$theme_uri = get_stylesheet_directory_uri();

	wp_enqueue_style( 'bonnets-gris-tokens', $theme_uri . '/assets/css/tokens.css', array(), '0.2.0' );
	wp_enqueue_style( 'bonnets-gris-components', $theme_uri . '/assets/css/components.css', array( 'bonnets-gris-tokens' ), '0.2.0' );
	wp_enqueue_style( 'bonnets-gris-home', $theme_uri . '/assets/css/home.css', array( 'bonnets-gris-components' ), '0.2.0' );
	wp_enqueue_style( 'bonnets-gris-style', get_stylesheet_uri(), array( 'bonnets-gris-home' ), '0.2.0' );

	wp_enqueue_script( 'bonnets-gris-main', $theme_uri . '/assets/js/main.js', array(), '0.2.0', true );
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );

/**
 * Renders the "Menu principal" links with the design system's link class.
 */
class Bonnets_Gris_Nav_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$output .= sprintf(
			'<a class="bg-navbar__link" href="%s">%s</a>',
			esc_url( $item->url ),
			esc_html( $item->title )
		);
	}
}

/**
 * Static fallback nav links matching the design handoff, shown until a
 * "Menu principal" is assigned in Apparence > Menus.
 */
function bonnets_gris_nav_fallback() {
	$links = array(
		'Nos actions'  => '#',
		'Événements'   => '#',
		'Communauté'   => '#',
		'Blog'         => '#',
	);
	foreach ( $links as $label => $url ) {
		printf(
			'<a class="bg-navbar__link" href="%s">%s</a>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
}
