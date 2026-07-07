<?php
/**
 * Template Name: Mentions légales
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title">
	<h1 class="ds-h1"><?php esc_html_e( 'Mentions légales', 'bonnets-gris' ); ?></h1>
</div>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner ds-section__inner--narrow ds-legal">

		<h2 class="ds-h3"><?php esc_html_e( 'Éditeur du site', 'bonnets-gris' ); ?></h2>
		<p>
			<?php esc_html_e( 'Le présent site est édité par l\'association Les Bonnets Gris, association loi 1901.', 'bonnets-gris' ); ?>
		</p>
		<p>
			<?php esc_html_e( 'Siège social : [adresse à compléter]', 'bonnets-gris' ); ?><br />
			<?php esc_html_e( 'Numéro RNA : [à compléter]', 'bonnets-gris' ); ?><br />
			<?php esc_html_e( 'Directeur·rice de la publication : [nom à compléter]', 'bonnets-gris' ); ?><br />
			<?php esc_html_e( 'Contact : [adresse email à compléter]', 'bonnets-gris' ); ?>
		</p>

		<h2 class="ds-h3"><?php esc_html_e( 'Hébergement', 'bonnets-gris' ); ?></h2>
		<p>
			<?php esc_html_e( 'Ce site est hébergé par Automattic Inc. (WordPress.com), 60 29th Street #343, San Francisco, CA 94110, États-Unis.', 'bonnets-gris' ); ?>
		</p>

		<h2 class="ds-h3"><?php esc_html_e( 'Propriété intellectuelle', 'bonnets-gris' ); ?></h2>
		<p>
			<?php esc_html_e( 'L\'ensemble des contenus présents sur ce site (textes, images, logos, symboles) est protégé par le droit d\'auteur. Toute reproduction, représentation ou diffusion, totale ou partielle, sans autorisation préalable de l\'association Les Bonnets Gris, est interdite.', 'bonnets-gris' ); ?>
		</p>

		<h2 class="ds-h3"><?php esc_html_e( 'Données personnelles', 'bonnets-gris' ); ?></h2>
		<p>
			<?php esc_html_e( 'Les données collectées via les formulaires de ce site (newsletter, contact) sont utilisées uniquement par l\'association Les Bonnets Gris dans le cadre de ses missions, et ne sont ni vendues ni cédées à des tiers. Conformément au Règlement Général sur la Protection des Données (RGPD), vous disposez d\'un droit d\'accès, de rectification et de suppression de vos données, que vous pouvez exercer en nous contactant.', 'bonnets-gris' ); ?>
		</p>

		<h2 class="ds-h3"><?php esc_html_e( 'Cookies', 'bonnets-gris' ); ?></h2>
		<p>
			<?php esc_html_e( 'Ce site peut utiliser des cookies techniques nécessaires à son bon fonctionnement. Aucun cookie de suivi publicitaire n\'est utilisé sans votre consentement.', 'bonnets-gris' ); ?>
		</p>

	</div>
</section>

<?php
get_footer();
