<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$ways = array(
	array(
		'tone'        => 'nude',
		'title'       => __( 'Faire un don', 'bonnets-gris' ),
		'subtitle'    => __( 'Un geste simple, un impact réel', 'bonnets-gris' ),
		'description' => __( 'Chaque don finance directement la recherche et l\'accompagnement des familles.', 'bonnets-gris' ),
		'cta_label'   => __( 'Faire un don', 'bonnets-gris' ),
		'cta_url'     => '#don',
	),
	array(
		'tone'        => 'sky',
		'title'       => __( 'Adhérer', 'bonnets-gris' ),
		'subtitle'    => __( 'Rejoindre le mouvement', 'bonnets-gris' ),
		'description' => __( 'Devenez membre et portez le symbole du bonnet gris à nos côtés, toute l\'année.', 'bonnets-gris' ),
		'cta_label'   => __( 'Devenir Bonnet Gris', 'bonnets-gris' ),
		'cta_url'     => '#mouvement',
	),
	array(
		'tone'        => 'terracotta',
		'title'       => __( 'Mécénat', 'bonnets-gris' ),
		'subtitle'    => __( 'Pour les entreprises', 'bonnets-gris' ),
		'description' => __( 'Associez votre entreprise à un mouvement qui rassemble familles, chercheurs et bénévoles.', 'bonnets-gris' ),
		'cta_label'   => __( 'Devenir partenaire', 'bonnets-gris' ),
		'cta_url'     => '#partenaire',
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Nous soutenir', 'bonnets-gris' ); ?></h2>
		<div class="ds-support-grid">
			<?php if ( is_active_sidebar( 'accueil-soutien' ) ) : ?>
				<?php dynamic_sidebar( 'accueil-soutien' ); ?>
			<?php else : ?>
				<?php foreach ( $ways as $way ) : ?>
					<?php get_template_part( 'template-parts/cards/support-card', null, $way ); ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
