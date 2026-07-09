<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Generic, config-driven page-meta system.
 *
 * Each entry below declares a set of editable fields for either a specific
 * page template ('template') or the static front page ('front_page' =>
 * true). One meta box is rendered per matching page in the editor; values
 * save via save_post_page with a nonce. Every field's 'default' is the
 * exact string that was hardcoded in the corresponding template before
 * this system existed, so bonnets_gris_page_meta() reproduces the
 * pre-refactor output until an editor actually fills a field in.
 */
function bonnets_gris_page_meta_schema() {
	return array(
		'front-page'          => array(
			'template'   => null,
			'front_page' => true,
			'box_title'  => __( 'Contenu éditorial — Accueil', 'bonnets-gris' ),
			'fields'     => array(
				'manifesto_eyebrow' => array(
					'label'   => __( 'Manifeste — eyebrow', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Notre manifeste', 'bonnets-gris' ),
				),
				'manifesto_title'   => array(
					'label'   => __( 'Manifeste — titre', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Les Bonnets Gris', 'bonnets-gris' ),
				),
				'manifesto_line_1'  => array(
					'label'   => __( 'Manifeste — ligne 1', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Est une association loi 1901 fondée par des femmes touchées personnellement par les tumeurs cérébrales.', 'bonnets-gris' ),
				),
				'manifesto_line_2'  => array(
					'label'   => __( 'Manifeste — ligne 2', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( "Née d'un refus du silence, l'association a pour conviction que l'on peut se battre autrement :", 'bonnets-gris' ),
				),
				'manifesto_line_3'  => array(
					'label'   => __( 'Manifeste — ligne 3 (mise en avant)', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( "Avec de l'énergie, de la lumière et de l'audace.", 'bonnets-gris' ),
				),
				'manifesto_cta'     => array(
					'label'   => __( 'Manifeste — libellé du bouton', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( "Rendre visible l'invisible", 'bonnets-gris' ),
				),
				'stat_1_value'      => array(
					'label'   => __( 'Statistique 1 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '6 000',
				),
				'stat_1_label'      => array(
					'label'   => __( 'Statistique 1 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Nouveaux cas par an', 'bonnets-gris' ),
				),
				'stat_2_value'      => array(
					'label'   => __( 'Statistique 2 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '4 000',
				),
				'stat_2_label'      => array(
					'label'   => __( 'Statistique 2 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Décès par an', 'bonnets-gris' ),
				),
				'stat_3_value'      => array(
					'label'   => __( 'Statistique 3 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '1ère',
				),
				'stat_3_label'      => array(
					'label'   => __( 'Statistique 3 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Cause de mortalité chez les moins de 25 ans', 'bonnets-gris' ),
				),
				'stat_4_value'      => array(
					'label'   => __( 'Statistique 4 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '12',
				),
				'stat_4_label'      => array(
					'label'   => __( 'Statistique 4 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Mois de survie médiane', 'bonnets-gris' ),
				),
				'stat_5_value'      => array(
					'label'   => __( 'Statistique 5 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '0',
				),
				'stat_5_label'      => array(
					'label'   => __( 'Statistique 5 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Progrès thérapeutique', 'bonnets-gris' ),
				),
			),
		),
		'la-maladie.php'      => array(
			'template'  => 'page-templates/la-maladie.php',
			'box_title' => __( 'Contenu éditorial — La Maladie', 'bonnets-gris' ),
			'fields'    => array(
				'hero_title'              => array(
					'label'   => __( 'Titre (H1)', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( "Comprendre, c'est déjà agir.", 'bonnets-gris' ),
				),
				'hero_intro'              => array(
					'label'   => __( 'Introduction', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Voici ce que nous savons des tumeurs cérébrales pédiatriques, et pourquoi la recherche a besoin de nous.', 'bonnets-gris' ),
				),
				'quote_text'              => array(
					'label'   => __( 'Citation en bandeau', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( "Les tumeurs cérébrales sont l'une des premières causes de décès par maladie chez l'enfant en France.", 'bonnets-gris' ),
				),
				'photo_float_description' => array(
					'label'   => __( 'Encart photo — description', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Il existe de nombreux types de tumeurs cérébrales chez l\'enfant, différentes de celles de l\'adulte et nécessitant des traitements spécifiques. Faute de financements suffisants, la recherche dédiée reste largement insuffisante.', 'bonnets-gris' ),
				),
				'stat_1_value'            => array(
					'label'   => __( 'Statistique 1 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '1/2000',
				),
				'stat_1_label'            => array(
					'label'   => __( 'Statistique 1 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Enfant touché avant 15 ans', 'bonnets-gris' ),
				),
				'stat_2_value'            => array(
					'label'   => __( 'Statistique 2 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '~450',
				),
				'stat_2_label'            => array(
					'label'   => __( 'Statistique 2 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Nouveaux cas par an en France', 'bonnets-gris' ),
				),
				'stat_3_value'            => array(
					'label'   => __( 'Statistique 3 — valeur', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => '9',
				),
				'stat_3_label'            => array(
					'label'   => __( 'Statistique 3 — libellé', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Programmes de recherche financés', 'bonnets-gris' ),
				),
				'story_title'             => array(
					'label'   => __( 'Témoignage — titre', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( "L'histoire de Camille", 'bonnets-gris' ),
				),
				'story_paragraph_1'       => array(
					'label'   => __( 'Témoignage — paragraphe 1', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( "Camille est maman d'un enfant suivi pour une tumeur cérébrale depuis 2022. Elle raconte le diagnostic, les premiers mois de traitement, et la façon dont l'entourage et l'association ont changé le quotidien de la famille.", 'bonnets-gris' ),
				),
				'story_paragraph_2'       => array(
					'label'   => __( 'Témoignage — citation', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( "« On n'a rien vu venir. Et pourtant, depuis, on n'a jamais été aussi entourés. »", 'bonnets-gris' ),
				),
				'story_paragraph_3'       => array(
					'label'   => __( 'Témoignage — attribution', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( '— Camille, maman, bénévole depuis 2022', 'bonnets-gris' ),
				),
				'awareness_text'          => array(
					'label'   => __( 'Sensibilisation — texte', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( "Chaque année, nous menons des campagnes de sensibilisation pour faire connaître le symbole du bonnet gris et l'urgence de la recherche. Relayées par nos bénévoles et nos partenaires, elles permettent de toucher un public toujours plus large.", 'bonnets-gris' ),
				),
				'urgency_title'           => array(
					'label'   => __( 'Urgence — titre', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( "L'urgence d'agir", 'bonnets-gris' ),
				),
				'urgency_text'            => array(
					'label'   => __( 'Urgence — texte', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Le manque de financements freine la recherche sur les tumeurs cérébrales pédiatriques. Les chercheurs ont besoin de moyens pour mieux comprendre la maladie et développer des traitements adaptés aux enfants.', 'bonnets-gris' ),
				),
			),
		),
		'qui-sommes-nous.php' => array(
			'template'  => 'page-templates/qui-sommes-nous.php',
			'box_title' => __( 'Contenu éditorial — Qui sommes-nous', 'bonnets-gris' ),
			'fields'    => array(
				'hero_title'          => array(
					'label'   => __( 'Titre (H1)', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Un mouvement qui donne envie.', 'bonnets-gris' ),
				),
				'hero_intro'          => array(
					'label'   => __( 'Introduction', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Les Bonnets Gris est une association loi 1901, portée par des familles, des chercheurs et des bénévoles réunis autour d\'un même symbole.', 'bonnets-gris' ),
				),
				'mission_title'       => array(
					'label'   => __( 'Mission — titre', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Rendre visible, l\'invisible', 'bonnets-gris' ),
				),
				'mission_paragraph_1' => array(
					'label'   => __( 'Mission — paragraphe 1', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Pour rendre plus visible cette maladie dans l\'ombre, Les Bonnets Gris n\'est pas une association de plus. C\'est un mouvement qui donne envie au service d\'une cause trop longtemps invisible.', 'bonnets-gris' ),
				),
				'mission_paragraph_2' => array(
					'label'   => __( 'Mission — paragraphe 2', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Association loi 1901 fondée par des femmes touchées personnellement par les tumeurs cérébrales — épouses et sœurs de malades. Née d\'un refus du silence, l\'association a pour conviction que l\'on peut se battre autrement :', 'bonnets-gris' ),
				),
				'mission_paragraph_3' => array(
					'label'   => __( 'Mission — paragraphe 3 (mise en avant)', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Avec de l\'énergie, de la lumière et de l\'audace.', 'bonnets-gris' ),
				),
			),
		),
		'rejoignez-nous.php'  => array(
			'template'  => 'page-templates/rejoignez-nous.php',
			'box_title' => __( 'Contenu éditorial — Rejoignez-nous', 'bonnets-gris' ),
			'fields'    => array(
				'hero_title' => array(
					'label'   => __( 'Titre (H1)', 'bonnets-gris' ),
					'type'    => 'text',
					'default' => __( 'Mille façons de nous rejoindre.', 'bonnets-gris' ),
				),
				'hero_intro' => array(
					'label'   => __( 'Introduction', 'bonnets-gris' ),
					'type'    => 'textarea',
					'default' => __( 'Don, course, bénévolat, partenariat : chaque geste fait avancer la recherche contre les tumeurs cérébrales pédiatriques.', 'bonnets-gris' ),
				),
			),
		),
	);
}

/**
 * Does the given schema entry apply to this post?
 */
function bonnets_gris_page_meta_matches( $entry, $post ) {
	if ( ! empty( $entry['front_page'] ) ) {
		return 'page' === get_option( 'show_on_front' ) && (int) get_option( 'page_on_front' ) === (int) $post->ID;
	}
	return get_page_template_slug( $post->ID ) === $entry['template'];
}

function bonnets_gris_register_page_meta() {
	foreach ( bonnets_gris_page_meta_schema() as $entry ) {
		foreach ( $entry['fields'] as $key => $field ) {
			register_meta(
				'post',
				'_bonnets_gris_' . $key,
				array(
					'type'              => 'string',
					'single'            => true,
					'show_in_rest'      => false,
					'sanitize_callback' => 'textarea' === $field['type'] ? 'sanitize_textarea_field' : 'sanitize_text_field',
					'auth_callback'     => function () {
						return current_user_can( 'edit_pages' );
					},
				)
			);
		}
	}
}
add_action( 'init', 'bonnets_gris_register_page_meta' );

function bonnets_gris_add_page_meta_boxes( $post ) {
	foreach ( bonnets_gris_page_meta_schema() as $schema_key => $entry ) {
		if ( ! bonnets_gris_page_meta_matches( $entry, $post ) ) {
			continue;
		}
		add_meta_box(
			'bonnets_gris_page_meta_' . $schema_key,
			$entry['box_title'],
			function ( $post ) use ( $schema_key, $entry ) {
				bonnets_gris_render_page_meta_box( $schema_key, $entry, $post );
			},
			'page',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes_page', 'bonnets_gris_add_page_meta_boxes' );

function bonnets_gris_render_page_meta_box( $schema_key, $entry, $post ) {
	wp_nonce_field( 'bonnets_gris_page_meta_' . $schema_key, 'bonnets_gris_page_meta_nonce_' . $schema_key );
	echo '<p>' . esc_html__( 'Les champs laissés vides conservent le texte affiché actuellement (indiqué en filigrane).', 'bonnets-gris' ) . '</p>';
	foreach ( $entry['fields'] as $key => $field ) {
		$meta_key = '_bonnets_gris_' . $key;
		$value    = get_post_meta( $post->ID, $meta_key, true );
		$field_id = 'bonnets-gris-' . $schema_key . '-' . $key;
		echo '<p>';
		printf( '<label for="%1$s"><strong>%2$s</strong></label><br />', esc_attr( $field_id ), esc_html( $field['label'] ) );
		if ( 'textarea' === $field['type'] ) {
			printf(
				'<textarea id="%1$s" name="%2$s" rows="3" class="large-text" placeholder="%3$s">%4$s</textarea>',
				esc_attr( $field_id ),
				esc_attr( $meta_key ),
				esc_attr( $field['default'] ),
				esc_textarea( $value )
			);
		} else {
			printf(
				'<input type="text" id="%1$s" name="%2$s" class="large-text" placeholder="%3$s" value="%4$s" />',
				esc_attr( $field_id ),
				esc_attr( $meta_key ),
				esc_attr( $field['default'] ),
				esc_attr( $value )
			);
		}
		echo '</p>';
	}
}

function bonnets_gris_save_page_meta( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	$post = get_post( $post_id );
	if ( ! $post ) {
		return;
	}

	foreach ( bonnets_gris_page_meta_schema() as $schema_key => $entry ) {
		if ( ! bonnets_gris_page_meta_matches( $entry, $post ) ) {
			continue;
		}
		$nonce_field = 'bonnets_gris_page_meta_nonce_' . $schema_key;
		if ( ! isset( $_POST[ $nonce_field ] ) ||
			! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $nonce_field ] ) ), 'bonnets_gris_page_meta_' . $schema_key ) ) {
			continue;
		}
		foreach ( $entry['fields'] as $key => $field ) {
			$meta_key = '_bonnets_gris_' . $key;
			if ( ! isset( $_POST[ $meta_key ] ) ) {
				continue;
			}
			$raw   = wp_unslash( $_POST[ $meta_key ] );
			$clean = 'textarea' === $field['type'] ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
			update_post_meta( $post_id, $meta_key, $clean );
		}
	}
}
add_action( 'save_post_page', 'bonnets_gris_save_page_meta' );

/**
 * Reads one editorial field, falling back to its schema-declared default
 * (the exact value that was hardcoded before this system existed) when
 * the meta value is empty.
 *
 * @param string   $schema_key One of the top-level keys in
 *                             bonnets_gris_page_meta_schema() (e.g.
 *                             'la-maladie.php', 'front-page').
 * @param string   $field_key  The field key within that schema entry.
 * @param int|null $post_id    Defaults to the current post.
 * @return string
 */
function bonnets_gris_page_meta( $schema_key, $field_key, $post_id = null ) {
	$schema = bonnets_gris_page_meta_schema();
	if ( ! isset( $schema[ $schema_key ]['fields'][ $field_key ] ) ) {
		return '';
	}
	$post_id = $post_id ?? get_the_ID();
	$value   = get_post_meta( $post_id, '_bonnets_gris_' . $field_key, true );
	return '' !== $value ? $value : $schema[ $schema_key ]['fields'][ $field_key ]['default'];
}
