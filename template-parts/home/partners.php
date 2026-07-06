<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$partners = array( 'Fondation ABC', 'Groupe Meridia', 'CHU Saint-Loup', 'Banque Nova', 'Studio Linéa', 'Aéro Partners' );
$tones    = array( 'rose', 'sky', 'orange', 'terracotta' );
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Nos partenaires', 'bonnets-gris' ); ?></h2>
		<div class="ds-partners-grid">
			<?php foreach ( $partners as $partner ) : ?>
				<?php
				get_template_part(
					'template-parts/cards/partner-card',
					null,
					array(
						'name' => $partner,
						'tone' => $tones[ array_rand( $tones ) ],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
