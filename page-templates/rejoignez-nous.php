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
	<h1 class="ds-h1"><?php esc_html_e( 'Mille façons de nous rejoindre.', 'bonnets-gris' ); ?></h1>
	<p class="ds-page-title__intro">
		<?php esc_html_e( 'Don, course, bénévolat, partenariat : chaque geste fait avancer la recherche contre les tumeurs cérébrales pédiatriques.', 'bonnets-gris' ); ?>
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
		'cta_url'     => 'https://institutducerveau.org/faire-don-ponctuel',
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
?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner ds-section__inner--narrow ds-closing-block">
		<img
			class="ds-closing-block__logo"
			src="<?php echo esc_url( get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ) ); ?>"
			alt="<?php esc_attr_e( 'Symbole des Bonnets Gris', 'bonnets-gris' ); ?>"
		/>
		<h2 class="ds-h1"><?php esc_html_e( 'Pourquoi les Bonnets Gris ?', 'bonnets-gris' ); ?></h2>
		<p class="ds-horizontal-push__description">
			<?php esc_html_e( 'Les Bonnets Gris financent la recherche contre les tumeurs cérébrales pédiatriques et rassemblent une communauté de familles, chercheurs et bénévoles partout en France.', 'bonnets-gris' ); ?>
		</p>
		<a class="ds-button ds-button--pop-orange" href="<?php echo esc_url( home_url( '/missions/' ) ); ?>">
			<?php esc_html_e( 'En savoir plus', 'bonnets-gris' ); ?>
		</a>
	</div>
</section>

<?php
get_footer();
