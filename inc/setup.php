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
