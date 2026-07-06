<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$footer_columns = array(
	__( 'Agir', 'bonnets-gris' )       => array(
		__( 'Faire un don', 'bonnets-gris' )        => '#',
		__( 'Devenir bénévole', 'bonnets-gris' )    => '#',
		__( 'Devenir Bonnet Gris', 'bonnets-gris' ) => '#',
	),
	__( 'Découvrir', 'bonnets-gris' )  => array(
		__( 'Nos actions', 'bonnets-gris' ) => '#',
		__( 'Événements', 'bonnets-gris' )  => '#',
		__( 'Histoires', 'bonnets-gris' )   => '#',
	),
	__( 'Suivre', 'bonnets-gris' )     => array(
		'Instagram'                        => '#',
		'Facebook'                         => '#',
		__( 'Newsletter', 'bonnets-gris' ) => '#',
	),
);
?>
<footer class="ds-footer">
	<div class="ds-footer__top">
		<div class="ds-footer__brand">
			<div class="ds-footer__brand-name"><?php bloginfo( 'name' ); ?></div>
			<p class="ds-footer__brand-tagline"><?php esc_html_e( 'Ensemble contre les tumeurs cérébrales. Une communauté, pas une association.', 'bonnets-gris' ); ?></p>
		</div>
		<?php foreach ( $footer_columns as $column_title => $links ) : ?>
			<div class="ds-footer__col">
				<span class="ds-footer__col-title"><?php echo esc_html( $column_title ); ?></span>
				<?php foreach ( $links as $label => $url ) : ?>
					<a class="ds-footer__link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="ds-footer__bottom">
		&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
	</div>
</footer>
