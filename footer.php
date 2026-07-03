<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer class="site-footer">
		<div class="site-footer__filigree" aria-hidden="true">
			<?php bonnets_gris_heart_pattern(); ?>
		</div>
		<div class="site-footer__columns">
			<div class="site-footer__column">
				<p class="site-footer__link-row">
					<?php bonnets_gris_heart_icon(); ?>
					Ensemble contre les tumeurs cérébrales.
				</p>
			</div>
			<div class="site-footer__column">
				<p class="site-footer__column-title">Agir</p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#don">Faire un don</a></p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#membre">Devenir membre</a></p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#evenements">Participer à un événement</a></p>
			</div>
			<div class="site-footer__column">
				<p class="site-footer__column-title">Ressources</p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#qui-sommes-nous">Qui sommes-nous</a></p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#maladie">La maladie</a></p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#presse">Espace presse</a></p>
			</div>
			<div class="site-footer__column">
				<p class="site-footer__column-title">Restons en lien</p>
				<p class="site-footer__link-row"><?php bonnets_gris_heart_icon(); ?> <a href="#newsletter">Votre e-mail</a></p>
			</div>
		</div>
		<hr class="site-footer__rule">
		<div class="site-footer__bottom">
			<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?> — 100% des dons reversés à l&rsquo;ICM</p>
			<p><a href="#mentions-legales">Mentions légales</a> · <a href="#confidentialite">Confidentialité</a></p>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
