<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bonnets_gris_footer_link_attributes( $atts ) {
	$atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ds-footer__link' : 'ds-footer__link';
	return $atts;
}

// External/social links live outside the editable "Menu principal" —
// kept separate so wp-admin menu edits can't accidentally drop them.
$footer_secondary_columns = array(
	__( 'Nous rejoindre', 'bonnets-gris' ) => array(
		array(
			'label' => __( 'Rejoignez-nous', 'bonnets-gris' ),
			'url'   => home_url( '/rejoignez-nous/' ),
		),
		array(
			'label'    => __( 'Faire un don', 'bonnets-gris' ),
			'url'      => 'https://institutducerveau.org/faire-don-ponctuel',
			'external' => true,
		),
		array(
			'label'    => __( 'Boutique', 'bonnets-gris' ),
			'url'      => 'https://loirparis.fr/',
			'external' => true,
		),
	),
	__( 'Suivre', 'bonnets-gris' )         => array(
		array(
			'label'    => 'Instagram',
			'url'      => 'https://www.instagram.com/',
			'external' => true,
		),
		array(
			'label'    => 'Facebook',
			'url'      => 'https://www.facebook.com/',
			'external' => true,
		),
		array(
			'label' => __( 'Newsletter', 'bonnets-gris' ),
			'url'   => home_url( '/#newsletter' ),
		),
	),
);

$organization_schema = array(
	'@context'    => 'https://schema.org',
	'@type'       => 'NGO',
	'name'        => get_bloginfo( 'name' ),
	'url'         => home_url( '/' ),
	'logo'        => get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ),
	'description' => __( 'Ensemble contre les tumeurs cérébrales. Une communauté, pas une association.', 'bonnets-gris' ),
);
?>
<footer class="ds-footer">
	<div class="ds-footer__top">
		<div class="ds-footer__brand">
			<div class="ds-footer__brand-name"><?php bloginfo( 'name' ); ?></div>
			<p class="ds-footer__brand-tagline"><?php esc_html_e( 'Ensemble contre les tumeurs cérébrales. Une communauté, pas une association.', 'bonnets-gris' ); ?></p>
		</div>

		<nav class="ds-footer__col" aria-label="<?php esc_attr_e( "Pages de l'association", 'bonnets-gris' ); ?>">
			<span class="ds-footer__col-title"><?php esc_html_e( "L'association", 'bonnets-gris' ); ?></span>
			<?php
			add_filter( 'nav_menu_link_attributes', 'bonnets_gris_footer_link_attributes' );
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '<ul class="ds-footer__menu-list">%3$s</ul>',
					'fallback_cb'    => false,
				)
			);
			remove_filter( 'nav_menu_link_attributes', 'bonnets_gris_footer_link_attributes' );
			?>
		</nav>

		<?php foreach ( $footer_secondary_columns as $column_title => $links ) : ?>
			<nav class="ds-footer__col" aria-label="<?php echo esc_attr( $column_title ); ?>">
				<span class="ds-footer__col-title"><?php echo esc_html( $column_title ); ?></span>
				<ul class="ds-footer__menu-list">
					<?php foreach ( $links as $link ) : ?>
						<li>
							<a
								class="ds-footer__link"
								href="<?php echo esc_url( $link['url'] ); ?>"
								<?php echo ! empty( $link['external'] ) ? 'target="_blank" rel="noopener"' : ''; ?>
							>
								<?php echo esc_html( $link['label'] ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endforeach; ?>
	</div>
	<div class="ds-footer__bottom">
		&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		&middot;
		<a class="ds-footer__link" href="<?php echo esc_url( home_url( '/mentions-legales/' ) ); ?>">
			<?php esc_html_e( 'Mentions légales', 'bonnets-gris' ); ?>
		</a>
	</div>
	<script type="application/ld+json"><?php echo wp_json_encode( $organization_schema ); ?></script>
</footer>
