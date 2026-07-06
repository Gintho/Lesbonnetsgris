<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bonnets_gris_navbar_link_attributes( $atts ) {
	$atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ds-navbar__link' : 'ds-navbar__link';
	return $atts;
}
?>
<nav class="ds-navbar">
	<a class="ds-navbar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
	<div class="ds-navbar__links">
		<?php
		add_filter( 'nav_menu_link_attributes', 'bonnets_gris_navbar_link_attributes' );
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => false,
				'items_wrap'     => '%3$s',
				'fallback_cb'    => false,
			)
		);
		remove_filter( 'nav_menu_link_attributes', 'bonnets_gris_navbar_link_attributes' );
		?>
		<a class="ds-button ds-button--primary ds-button--sm" href="#don"><?php esc_html_e( 'Faire un don', 'bonnets-gris' ); ?></a>
	</div>
</nav>
