<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = array(
	array(
		'question' => __( 'Comment faire un don ?', 'bonnets-gris' ),
		'answer'   => __( 'En ligne en 2 minutes, par carte ou virement. 100% sécurisé.', 'bonnets-gris' ),
	),
	array(
		'question' => __( 'Où va mon argent ?', 'bonnets-gris' ),
		'answer'   => __( 'Directement à la recherche sur les tumeurs cérébrales pédiatriques et au soutien des familles.', 'bonnets-gris' ),
	),
	array(
		'question' => __( 'Comment devenir bénévole ?', 'bonnets-gris' ),
		'answer'   => __( 'Rejoignez une antenne locale ou proposez d\'organiser un événement près de chez vous.', 'bonnets-gris' ),
	),
	array(
		'question' => __( 'Qu\'est-ce qu\'un Bonnet Gris ?', 'bonnets-gris' ),
		'answer'   => __( 'Un membre de la communauté — donateur, bénévole, famille ou chercheur — qui porte le symbole du mouvement.', 'bonnets-gris' ),
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner ds-section__inner--narrow">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Questions fréquentes', 'bonnets-gris' ); ?></h2>
		<div class="ds-accordion">
			<?php foreach ( $items as $item ) : ?>
				<details class="ds-accordion__item">
					<summary class="ds-accordion__trigger">
						<span><?php echo esc_html( $item['question'] ); ?></span>
						<span class="ds-accordion__icon" aria-hidden="true">+</span>
					</summary>
					<p class="ds-accordion__panel"><?php echo esc_html( $item['answer'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>
