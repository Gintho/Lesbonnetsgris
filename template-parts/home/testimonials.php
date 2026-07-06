<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = array(
	array(
		'tone'  => 'nude',
		'quote' => __( "On n'est jamais seul quand on porte le bonnet gris.", 'bonnets-gris' ),
		'name'  => 'Camille',
		'role'  => __( 'Maman, bénévole depuis 2022', 'bonnets-gris' ),
	),
	array(
		'tone'  => 'sky',
		'quote' => __( 'Chaque course, c\'est un peu plus d\'espoir pour nos enfants.', 'bonnets-gris' ),
		'name'  => 'Marc',
		'role'  => __( 'Coureur, 3 courses', 'bonnets-gris' ),
	),
	array(
		'tone'  => 'cream',
		'quote' => __( 'Le mur des Bonnets Gris, c\'est notre famille élargie.', 'bonnets-gris' ),
		'name'  => 'Inès',
		'role'  => __( 'Chercheuse soutenue', 'bonnets-gris' ),
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Les histoires', 'bonnets-gris' ); ?></h2>
		<div class="ds-cards-grid">
			<?php foreach ( $testimonials as $testimonial ) : ?>
				<?php get_template_part( 'template-parts/cards/testimonial-card', null, $testimonial ); ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
