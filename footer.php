<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer class="lbg-footer site-footer">
		<div class="container">
			<div class="lbg-footer__grid">
				<div>
					<?php echo file_get_contents( get_template_directory() . '/assets/logo/logo-mark.svg' ); // phpcs:ignore -- SVG de marque, contenu fixe du thème. ?>
					<p class="text-sm" style="color: var(--color-text-on-dark-muted); max-width: 28ch;">
						<?php esc_html_e( 'Ensemble contre les tumeurs cérébrales.', 'bonnets-gris' ); ?>
					</p>
				</div>

				<div>
					<h2 class="lbg-footer__heading"><?php esc_html_e( 'Agir', 'bonnets-gris' ); ?></h2>
					<ul class="lbg-footer__links">
						<li><a href="<?php echo esc_url( home_url( '/don' ) ); ?>"><?php esc_html_e( 'Faire un don', 'bonnets-gris' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/adhesion' ) ); ?>"><?php esc_html_e( 'Devenir membre', 'bonnets-gris' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/evenements' ) ); ?>"><?php esc_html_e( 'Participer à un événement', 'bonnets-gris' ); ?></a></li>
					</ul>
				</div>

				<div>
					<h2 class="lbg-footer__heading"><?php esc_html_e( 'Ressources', 'bonnets-gris' ); ?></h2>
					<ul class="lbg-footer__links">
						<li><a href="<?php echo esc_url( home_url( '/qui-sommes-nous' ) ); ?>"><?php esc_html_e( 'Qui sommes-nous', 'bonnets-gris' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/la-maladie' ) ); ?>"><?php esc_html_e( 'La maladie', 'bonnets-gris' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/presse' ) ); ?>"><?php esc_html_e( 'Espace presse', 'bonnets-gris' ); ?></a></li>
					</ul>
				</div>

				<div>
					<h2 class="lbg-footer__heading"><?php esc_html_e( 'Restons en lien', 'bonnets-gris' ); ?></h2>
					<form class="lbg-footer__newsletter" method="post" action="#">
						<label class="visually-hidden" for="lbg-newsletter-email"><?php esc_html_e( 'Adresse e-mail', 'bonnets-gris' ); ?></label>
						<input class="lbg-input" type="email" id="lbg-newsletter-email" name="email" placeholder="<?php esc_attr_e( 'Votre e-mail', 'bonnets-gris' ); ?>" required>
						<button class="lbg-btn lbg-btn--primary" type="submit"><?php esc_html_e( "S'inscrire", 'bonnets-gris' ); ?></button>
					</form>
					<label class="lbg-checkbox" style="margin-top: var(--space-3);">
						<input type="checkbox" name="rgpd_optin" required>
						<span><?php esc_html_e( "J'accepte de recevoir les actualités des Bonnets Gris. Désinscription possible à tout moment.", 'bonnets-gris' ); ?></span>
					</label>
					<div class="lbg-footer__social" aria-label="<?php esc_attr_e( 'Réseaux sociaux', 'bonnets-gris' ); ?>">
						<a href="#" aria-label="Instagram">IG</a>
						<a href="#" aria-label="LinkedIn">IN</a>
						<a href="#" aria-label="Facebook">FB</a>
					</div>
				</div>
			</div>

			<div class="lbg-footer__bottom">
				<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> — <?php esc_html_e( '100% des dons reversés à l’ICM', 'bonnets-gris' ); ?></p>
				<div style="display:flex; gap: var(--space-4);">
					<a href="<?php echo esc_url( home_url( '/mentions-legales' ) ); ?>"><?php esc_html_e( 'Mentions légales', 'bonnets-gris' ); ?></a>
					<a href="<?php echo esc_url( home_url( '/confidentialite' ) ); ?>"><?php esc_html_e( 'Confidentialité', 'bonnets-gris' ); ?></a>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
