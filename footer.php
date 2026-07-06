<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer class="bg-footer">
		<div class="bg-footer__top">
			<div class="bg-footer__brand">
				<div class="bg-footer__brand-name"><?php bloginfo( 'name' ); ?></div>
				<p class="bg-footer__brand-tagline">Ensemble contre les tumeurs cérébrales. Une communauté, pas une association.</p>
			</div>
			<div class="bg-footer__col">
				<span class="bg-footer__col-title">Agir</span>
				<a class="bg-footer__link" href="#" data-donate-open>Faire un don</a>
				<a class="bg-footer__link" href="#">Devenir bénévole</a>
				<a class="bg-footer__link" href="#">Devenir Bonnet Gris</a>
			</div>
			<div class="bg-footer__col">
				<span class="bg-footer__col-title">Découvrir</span>
				<a class="bg-footer__link" href="#">Nos actions</a>
				<a class="bg-footer__link" href="#">Événements</a>
				<a class="bg-footer__link" href="#">Histoires</a>
			</div>
			<div class="bg-footer__col">
				<span class="bg-footer__col-title">Suivre</span>
				<a class="bg-footer__link" href="#">Instagram</a>
				<a class="bg-footer__link" href="#">Facebook</a>
				<a class="bg-footer__link" href="#">Newsletter</a>
			</div>
		</div>
		<div class="bg-footer__bottom">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
