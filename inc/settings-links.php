<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the "Liens de l'association" settings page and exposes a small
 * helper (bonnets_gris_link()) so templates never hardcode these URLs.
 *
 * Defaults match the URLs that were previously hardcoded in navbar.php,
 * footer.php, front-page.php and rejoignez-nous.php — so as long as the
 * options stay unset, every template renders exactly as before.
 */

function bonnets_gris_link_defaults() {
	return array(
		'boutique'  => 'https://loirparis.fr/',
		'don'       => 'https://institutducerveau.org/faire-don-ponctuel',
		'instagram' => 'https://www.instagram.com/',
		'facebook'  => 'https://www.facebook.com/',
	);
}

/**
 * Reads one of the association's shared links.
 *
 * @param string $key One of: boutique, don, instagram, facebook.
 * @return string
 */
function bonnets_gris_link( $key ) {
	$defaults = bonnets_gris_link_defaults();
	$value    = get_option( 'bonnets_gris_link_' . $key, '' );
	return '' !== $value ? $value : ( $defaults[ $key ] ?? '' );
}

function bonnets_gris_register_link_settings() {
	$defaults = bonnets_gris_link_defaults();

	foreach ( $defaults as $key => $default_url ) {
		register_setting(
			'bonnets_gris_links',
			'bonnets_gris_link_' . $key,
			array(
				'type'              => 'string',
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
			)
		);
	}

	add_settings_section(
		'bonnets_gris_links_section',
		__( 'Liens de l\'association', 'bonnets-gris' ),
		function () {
			esc_html_e( 'Ces liens sont utilisés à plusieurs endroits du site (menu, pied de page, pages Accueil et Rejoignez-nous). Les modifier ici les met à jour partout en une seule fois.', 'bonnets-gris' );
		},
		'bonnets-gris-links'
	);

	$fields = array(
		'boutique'  => __( 'Boutique solidaire', 'bonnets-gris' ),
		'don'       => __( 'Faire un don', 'bonnets-gris' ),
		'instagram' => __( 'Instagram', 'bonnets-gris' ),
		'facebook'  => __( 'Facebook', 'bonnets-gris' ),
	);

	foreach ( $fields as $key => $label ) {
		add_settings_field(
			'bonnets_gris_link_' . $key,
			$label,
			function () use ( $key, $defaults ) {
				$value = get_option( 'bonnets_gris_link_' . $key, '' );
				printf(
					'<input type="url" class="regular-text" name="%1$s" value="%2$s" placeholder="%3$s" />',
					esc_attr( 'bonnets_gris_link_' . $key ),
					esc_attr( $value ),
					esc_attr( $defaults[ $key ] )
				);
			},
			'bonnets-gris-links',
			'bonnets_gris_links_section'
		);
	}
}
add_action( 'admin_init', 'bonnets_gris_register_link_settings' );

function bonnets_gris_add_links_settings_page() {
	add_options_page(
		__( 'Liens de l\'association', 'bonnets-gris' ),
		__( 'Liens de l\'association', 'bonnets-gris' ),
		'manage_options',
		'bonnets-gris-links',
		'bonnets_gris_render_links_settings_page'
	);
}
add_action( 'admin_menu', 'bonnets_gris_add_links_settings_page' );

function bonnets_gris_render_links_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Liens de l\'association', 'bonnets-gris' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'bonnets_gris_links' );
			do_settings_sections( 'bonnets-gris-links' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}
