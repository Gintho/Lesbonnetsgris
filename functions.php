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

function bonnets_gris_heart_icon( $size = 14, $color = 'currentColor' ) {
	printf(
		'<svg class="heart-mark" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="%2$s" aria-hidden="true"><path d="M12 21s-7.5-4.7-10.2-9.3C.1 8.8 1 5.2 4.2 4c2-.8 4.2 0 5.8 2 1.6-2 3.8-2.8 5.8-2 3.2 1.2 4.1 4.8 2.4 7.7C19.5 16.3 12 21 12 21z"/></svg>',
		absint( $size ),
		esc_attr( $color )
	);
}

function bonnets_gris_heart_pattern( $count = 24 ) {
	echo '<svg class="heart-filigree" viewBox="0 0 1200 304" fill="none" aria-hidden="true">';
	for ( $i = 0; $i < $count; $i++ ) {
		$x       = ( $i * 197 ) % 1200;
		$y       = ( $i * 89 ) % 304;
		$scale   = 0.6 + ( ( $i * 37 ) % 100 ) / 100;
		$opacity = 0.06 + ( ( $i * 13 ) % 10 ) / 100;
		printf(
			'<path transform="translate(%1$d %2$d) scale(%3$s)" opacity="%4$s" d="M12 21s-7.5-4.7-10.2-9.3C.1 8.8 1 5.2 4.2 4c2-.8 4.2 0 5.8 2 1.6-2 3.8-2.8 5.8-2 3.2 1.2 4.1 4.8 2.4 7.7C19.5 16.3 12 21 12 21z" fill="white"/>',
			(int) $x,
			(int) $y,
			esc_attr( $scale ),
			esc_attr( $opacity )
		);
	}
	echo '</svg>';
}

function bonnets_gris_mosaic_background( $columns = 16, $rows = 8 ) {
	$palette = array( '#c1502e', '#2e4468', '#1c2b45', '#ac4729', '#7c8e6c', '#cb420d', '#f2642d', '#e3a98c' );
	echo '<div class="mosaic-background" aria-hidden="true">';
	for ( $i = 0; $i < $columns * $rows; $i++ ) {
		$color = $palette[ ( $i * 5 + intdiv( $i, $columns ) * 3 ) % count( $palette ) ];
		printf( '<div class="mosaic-tile" style="background-color:%s"></div>', esc_attr( $color ) );
	}
	echo '</div>';
}

function bonnets_gris_silhouette() {
	?>
	<svg class="hero-silhouette" viewBox="0 0 300 320" fill="none" aria-hidden="true" preserveAspectRatio="xMidYMax slice">
		<ellipse cx="150" cy="70" rx="58" ry="65" fill="rgba(10,15,26,0.4)" />
		<path d="M40 320c0-70 35-125 110-125s110 55 110 125z" fill="rgba(10,15,26,0.4)" />
		<path d="M228 165c18 6 32 22 34 55" stroke="rgba(10,15,26,0.4)" stroke-width="10" stroke-linecap="round" />
	</svg>
	<?php
}

function bonnets_gris_scripts() {
	wp_enqueue_style( 'bonnets-gris-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;1,600&family=Inter:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'bonnets-gris-style', get_stylesheet_uri(), array( 'bonnets-gris-fonts' ), '0.2.0' );
}
add_action( 'wp_enqueue_scripts', 'bonnets_gris_scripts' );
