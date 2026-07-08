<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the "Association" settings page (legal identity used on the
 * Mentions légales page) and exposes a small helper
 * (bonnets_gris_association()) so templates never hardcode these values.
 *
 * Defaults match the "[... à compléter]" placeholders that were previously
 * hardcoded in mentions-legales.php — so as long as the options stay
 * unset, the page renders exactly as before.
 */

function bonnets_gris_association_defaults() {
	return array(
		'adresse'   => __( '[adresse à compléter]', 'bonnets-gris' ),
		'rna'       => __( '[à compléter]', 'bonnets-gris' ),
		'directeur' => __( '[nom à compléter]', 'bonnets-gris' ),
		'email'     => __( '[adresse email à compléter]', 'bonnets-gris' ),
	);
}

/**
 * Reads one of the association's legal identity fields.
 *
 * @param string $key One of: adresse, rna, directeur, email.
 * @return string
 */
function bonnets_gris_association( $key ) {
	$defaults = bonnets_gris_association_defaults();
	$value    = get_option( 'bonnets_gris_assoc_' . $key, '' );
	return '' !== $value ? $value : ( $defaults[ $key ] ?? '' );
}

function bonnets_gris_register_association_settings() {
	$fields = array(
		'adresse'   => array(
			'label'    => __( 'Siège social (adresse)', 'bonnets-gris' ),
			'sanitize' => 'sanitize_text_field',
		),
		'rna'       => array(
			'label'    => __( 'Numéro RNA', 'bonnets-gris' ),
			'sanitize' => 'sanitize_text_field',
		),
		'directeur' => array(
			'label'    => __( 'Directeur·rice de la publication', 'bonnets-gris' ),
			'sanitize' => 'sanitize_text_field',
		),
		'email'     => array(
			'label'    => __( 'Email de contact', 'bonnets-gris' ),
			'sanitize' => 'sanitize_text_field',
		),
	);

	foreach ( $fields as $key => $field ) {
		register_setting(
			'bonnets_gris_association',
			'bonnets_gris_assoc_' . $key,
			array(
				'type'              => 'string',
				'sanitize_callback' => $field['sanitize'],
				'default'           => '',
			)
		);
	}

	add_settings_section(
		'bonnets_gris_association_section',
		__( 'Identité légale', 'bonnets-gris' ),
		function () {
			esc_html_e( 'Ces informations apparaissent sur la page Mentions légales. Tant qu\'un champ est laissé vide, le texte "à compléter" reste affiché.', 'bonnets-gris' );
		},
		'bonnets-gris-association'
	);

	foreach ( $fields as $key => $field ) {
		add_settings_field(
			'bonnets_gris_assoc_' . $key,
			$field['label'],
			function () use ( $key ) {
				$value = get_option( 'bonnets_gris_assoc_' . $key, '' );
				printf(
					'<input type="text" class="regular-text" name="%1$s" value="%2$s" />',
					esc_attr( 'bonnets_gris_assoc_' . $key ),
					esc_attr( $value )
				);
			},
			'bonnets-gris-association',
			'bonnets_gris_association_section'
		);
	}
}
add_action( 'admin_init', 'bonnets_gris_register_association_settings' );

function bonnets_gris_add_association_settings_page() {
	add_options_page(
		__( 'Association', 'bonnets-gris' ),
		__( 'Association', 'bonnets-gris' ),
		'manage_options',
		'bonnets-gris-association',
		'bonnets_gris_render_association_settings_page'
	);
}
add_action( 'admin_menu', 'bonnets_gris_add_association_settings_page' );

function bonnets_gris_render_association_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Association', 'bonnets-gris' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'bonnets_gris_association' );
			do_settings_sections( 'bonnets-gris-association' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}
