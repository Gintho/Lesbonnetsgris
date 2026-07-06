<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$names = array( 'Léa', 'Tom', 'Ana', 'Yanis', 'Chloé', 'Nael', 'Sofia', 'Hugo', 'Zoé', 'Adam', 'Mila', 'Léo', 'Inès', 'Noa', 'Jade', 'Kylian' );
?>
<section class="ds-section ds-section--orange">
	<div class="ds-section__inner">
		<div class="ds-section__header">
			<div>
				<span class="ds-badge ds-badge--dark"><?php esc_html_e( 'Le mur des Bonnets Gris', 'bonnets-gris' ); ?></span>
				<h2 class="ds-h1 ds-mission__title"><?php esc_html_e( 'La communauté, en un coup d\'œil', 'bonnets-gris' ); ?></h2>
			</div>
			<a class="ds-button ds-button--outline-inverse" href="#mur"><?php esc_html_e( 'Rejoindre le mur', 'bonnets-gris' ); ?></a>
		</div>
		<div class="ds-community-grid">
			<?php foreach ( $names as $index => $name ) : ?>
				<?php
				get_template_part(
					'template-parts/cards/community-card',
					null,
					array(
						'name'        => $name,
						'heart_index' => $index,
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
