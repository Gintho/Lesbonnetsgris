<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<nav class="bg-navbar">
		<a class="bg-navbar__brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<div class="bg-navbar__links">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'link_before'    => '',
						'link_after'     => '',
						'walker'         => new Bonnets_Gris_Nav_Walker(),
					)
				);
			} else {
				bonnets_gris_nav_fallback();
			}
			?>
			<button type="button" class="bg-btn bg-btn--primary bg-btn--sm" data-donate-open>Faire un don</button>
		</div>
	</nav>
</header>

<div class="bg-modal-overlay" data-donate-modal>
	<div class="bg-modal" role="dialog" aria-modal="true" aria-labelledby="bg-donate-title">
		<button type="button" class="bg-modal__close" data-donate-close aria-label="Fermer">×</button>
		<h3 id="bg-donate-title" class="ds-h3 bg-modal__title">Choisissez votre don</h3>
		<div class="bg-modal__body">
			<div class="bg-donate-amounts">
				<button type="button" class="bg-donate-amount" data-amount="25">25€</button>
				<button type="button" class="bg-donate-amount is-selected" data-amount="50">50€</button>
				<button type="button" class="bg-donate-amount" data-amount="100">100€</button>
			</div>
			<label class="bg-input">
				<span class="bg-input__label">Email</span>
				<input class="bg-input__field" type="email" placeholder="vous@email.com">
			</label>
			<div style="margin-top: 20px;">
				<button type="button" class="bg-btn bg-btn--primary" data-donate-submit>Faire un don de 50€</button>
			</div>
		</div>
	</div>
</div>

<div class="bg-toast-region" data-toast-region>
	<div class="bg-toast bg-toast--primary">
		<span data-toast-text></span>
		<button type="button" class="bg-toast__close" aria-label="Fermer">×</button>
	</div>
</div>
