<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$missions = array(
	array(
		'tone'        => 'nude',
		'logo'        => get_theme_file_uri( 'assets/logo/mark-on-white-orange.png' ),
		'title'       => __( 'Financer', 'bonnets-gris' ),
		'description' => __( 'Financer des programmes de recherche contre les tumeurs cérébrales pédiatriques.', 'bonnets-gris' ),
	),
	array(
		'tone'        => 'sky',
		'logo'        => get_theme_file_uri( 'assets/logo/mark-on-white-blue.png' ),
		'title'       => __( 'Mobiliser', 'bonnets-gris' ),
		'description' => __( 'Mobiliser une communauté de coureurs, tricoteuses et bénévoles partout en France.', 'bonnets-gris' ),
	),
	array(
		'tone'        => 'orange',
		'logo'        => get_theme_file_uri( 'assets/logo/mark-on-white-terracotta.png' ),
		'title'       => __( 'Sensibiliser', 'bonnets-gris' ),
		'description' => __( 'Sensibiliser le grand public au symbole du bonnet gris et à sa signification.', 'bonnets-gris' ),
	),
	array(
		'tone'        => 'terracotta',
		'logo'        => get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ),
		'title'       => __( 'Rassembler', 'bonnets-gris' ),
		'description' => __( 'Rassembler familles, chercheurs et donateurs autour d\'un même mouvement.', 'bonnets-gris' ),
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Nos missions', 'bonnets-gris' ); ?></h2>
		<div class="ds-missions-grid">
			<?php foreach ( $missions as $mission ) : ?>
				<?php get_template_part( 'template-parts/cards/mission-block', null, $mission ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
