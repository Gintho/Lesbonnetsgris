<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
 * Markup only for now — no submission handler wired up. Once a provider
 * (MailPoet is already installed on the site, or another ESP) is chosen,
 * point this form's action/method at it.
 */
?>
<div class="ds-newsletter" id="newsletter">
	<h2 class="ds-h2 ds-newsletter__title"><?php esc_html_e( 'Rejoignez la communauté des Bonnets Gris', 'bonnets-gris' ); ?></h2>
	<form class="ds-newsletter__form" method="post" action="">
		<label class="screen-reader-text" for="bonnets-gris-newsletter-email"><?php esc_html_e( 'Adresse email', 'bonnets-gris' ); ?></label>
		<input
			class="ds-newsletter__input"
			type="email"
			id="bonnets-gris-newsletter-email"
			name="email"
			placeholder="vous@email.com"
			required
		/>
		<button class="ds-button ds-button--primary" type="submit"><?php esc_html_e( "S'inscrire", 'bonnets-gris' ); ?></button>
	</form>
</div>
