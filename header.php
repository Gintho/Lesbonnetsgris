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
<a class="skip-link" href="#primary"><?php esc_html_e( 'Aller au contenu', 'bonnets-gris' ); ?></a>

<header class="site-header">
	<div class="container">
		<nav class="lbg-nav" aria-label="<?php esc_attr_e( 'Navigation principale', 'bonnets-gris' ); ?>">
			<a class="lbg-nav__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php echo file_get_contents( get_template_directory() . '/assets/logo/logo-lockup-horizontal.svg' ); // phpcs:ignore -- SVG de marque, contenu fixe du thème. ?>
				<span class="visually-hidden"><?php bloginfo( 'name' ); ?></span>
			</a>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'lbg-nav__links',
					'fallback_cb'    => false,
				)
			);
			?>

			<div style="display:flex; align-items:center; gap:var(--space-3);">
				<a class="lbg-btn lbg-btn--primary" href="<?php echo esc_url( home_url( '/don' ) ); ?>">
					<?php esc_html_e( 'Faire un don', 'bonnets-gris' ); ?>
				</a>
				<button class="lbg-nav__toggle" type="button" aria-expanded="false" aria-controls="lbg-mobile-nav" data-lbg-nav-toggle>
					<span class="visually-hidden"><?php esc_html_e( 'Ouvrir le menu', 'bonnets-gris' ); ?></span>
					<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
						<line x1="3" y1="6" x2="21" y2="6"/>
						<line x1="3" y1="12" x2="21" y2="12"/>
						<line x1="3" y1="18" x2="21" y2="18"/>
					</svg>
				</button>
			</div>
		</nav>
	</div>
</header>
