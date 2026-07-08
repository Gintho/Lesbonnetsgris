<?php
/**
 * Template Name: Rejoignez-nous
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title ds-page-title--pop-orange">
	<span class="ds-badge ds-badge--on-dark-hero"><?php esc_html_e( 'Rejoignez-nous', 'bonnets-gris' ); ?></span>
	<h1 class="ds-h1"><?php echo esc_html( bonnets_gris_page_meta( 'rejoignez-nous.php', 'hero_title' ) ); ?></h1>
	<p class="ds-page-title__intro">
		<?php echo esc_html( bonnets_gris_page_meta( 'rejoignez-nous.php', 'hero_intro' ) ); ?>
	</p>
</div>

<?php
get_template_part(
	'template-parts/marketing/quote-band',
	null,
	array(
		'tone' => 'primary',
		'text' => __( 'Chaque soutien compte, quelle que soit sa forme.', 'bonnets-gris' ),
	)
);

get_template_part(
	'template-parts/marketing/photo-band-cta',
	null,
	array(
		'tone'        => 'orange',
		'eyebrow'     => __( 'Un geste qui compte', 'bonnets-gris' ),
		'title'       => __( 'Faire un don', 'bonnets-gris' ),
		'description' => __( 'En faisant un don, vous soutenez concrètement la recherche pour que les enfants soient mieux soignés.', 'bonnets-gris' ),
		'cta_label'   => __( 'Faire un don', 'bonnets-gris' ),
		'cta_url'     => bonnets_gris_link( 'don' ),
		'cta_target'  => '_blank',
	)
);

get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'orange',
		'eyebrow'     => __( 'Courir', 'bonnets-gris' ),
		'title'       => __( 'Courir pour la cause', 'bonnets-gris' ),
		'description' => __( 'La Course des Bonnets Gris est ouverte à toutes et tous. Chaque dossard couru finance directement la recherche contre les tumeurs cérébrales pédiatriques.', 'bonnets-gris' ),
		'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'     => '#evenements',
	)
);

get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'sky',
		'reverse'     => true,
		'eyebrow'     => __( 'Collecter', 'bonnets-gris' ),
		'title'       => __( 'Organiser une collecte', 'bonnets-gris' ),
		'description' => __( 'Rassemblez votre entourage autour d\'un événement sportif, culturel ou festif. Vous pouvez aussi lancer votre propre cagnotte pour un défi personnel.', 'bonnets-gris' ),
		'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'     => '#don',
	)
);

get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'terracotta',
		'eyebrow'     => __( 'Bénévolat', 'bonnets-gris' ),
		'title'       => __( 'Devenir bénévole', 'bonnets-gris' ),
		'description' => __( 'Selon vos disponibilités et vos envies, donnez de votre temps lors de nos événements. Votre engagement fait avancer le mouvement.', 'bonnets-gris' ),
		'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'     => '#mouvement',
	)
);

get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'nude',
		'reverse'     => true,
		'eyebrow'     => __( 'Entreprises', 'bonnets-gris' ),
		'title'       => __( 'Devenir partenaire', 'bonnets-gris' ),
		'description' => __( 'Mécénat de compétences, soutien financier, produits solidaires : votre entreprise peut nous aider de multiples façons.', 'bonnets-gris' ),
		'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'     => '#partenaire',
	)
);

get_template_part(
	'template-parts/marketing/closing-cta',
	null,
	array(
		'tone'        => 'cream',
		'title'       => __( 'Pourquoi les Bonnets Gris ?', 'bonnets-gris' ),
		'description' => __( 'Les Bonnets Gris financent la recherche contre les tumeurs cérébrales pédiatriques et rassemblent une communauté de familles, chercheurs et bénévoles partout en France.', 'bonnets-gris' ),
		'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
		'cta_url'     => home_url( '/missions/' ),
	)
);
?>

<?php
get_footer();
