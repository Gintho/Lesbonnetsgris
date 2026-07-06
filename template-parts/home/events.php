<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$events = array(
	array(
		'date'     => '12',
		'month'    => __( 'Oct', 'bonnets-gris' ),
		'title'    => __( 'Course des Bonnets Gris', 'bonnets-gris' ),
		'location' => __( 'Paris, Champ de Mars', 'bonnets-gris' ),
		'tone'     => 'pop-blue',
	),
	array(
		'date'     => '23',
		'month'    => __( 'Nov', 'bonnets-gris' ),
		'title'    => __( 'Vente de bonnets tricotés', 'bonnets-gris' ),
		'location' => __( 'Lyon, Place Bellecour', 'bonnets-gris' ),
		'tone'     => 'pop-terracotta',
	),
	array(
		'date'     => '05',
		'month'    => __( 'Déc', 'bonnets-gris' ),
		'title'    => __( 'Soirée de gala annuelle', 'bonnets-gris' ),
		'location' => __( 'Bordeaux', 'bonnets-gris' ),
		'tone'     => 'pop-blue',
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<div class="ds-section__header">
			<h2 class="ds-h1"><?php esc_html_e( 'Les événements à venir', 'bonnets-gris' ); ?></h2>
			<a class="ds-button ds-button--ghost" href="#evenements">
				<?php esc_html_e( 'Voir tout', 'bonnets-gris' ); ?>
			</a>
		</div>
		<div class="ds-cards-grid">
			<?php foreach ( $events as $event ) : ?>
				<?php get_template_part( 'template-parts/cards/event-card', null, $event ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
