<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="ds-section ds-section--sky">
	<div class="ds-section__inner ds-mission__grid">
		<div>
			<span class="ds-badge ds-badge--secondary"><?php esc_html_e( 'Notre mission', 'bonnets-gris' ); ?></span>
			<h2 class="ds-h1 ds-mission__title">
				<?php esc_html_e( 'On ne fait pas un don.', 'bonnets-gris' ); ?><br />
				<?php esc_html_e( 'On rejoint un mouvement.', 'bonnets-gris' ); ?>
			</h2>
			<p class="ds-mission__text">
				<?php esc_html_e( 'Depuis 2019, les Bonnets Gris tricotent, courent et se rassemblent pour financer la recherche contre les tumeurs cérébrales pédiatriques. Chaque bonnet porté est un signe de reconnaissance entre familles, chercheurs et bénévoles.', 'bonnets-gris' ); ?>
			</p>
			<div class="ds-mission__actions">
				<a class="ds-button ds-button--primary" href="#histoire"><?php esc_html_e( 'Notre histoire', 'bonnets-gris' ); ?></a>
				<a class="ds-button ds-button--outline" href="#benevole"><?php esc_html_e( 'Devenir bénévole', 'bonnets-gris' ); ?></a>
			</div>
		</div>
		<div class="ds-mission__visual">
			<img
				src="<?php echo esc_url( get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ) ); ?>"
				alt="<?php esc_attr_e( 'Symbole des Bonnets Gris', 'bonnets-gris' ); ?>"
			/>
		</div>
	</div>
</section>
