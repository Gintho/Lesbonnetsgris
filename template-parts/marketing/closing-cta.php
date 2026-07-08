<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'white';
$logo        = $args['logo'] ?? get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' );
$logo_alt    = $args['logo_alt'] ?? __( 'Symbole des Bonnets Gris', 'bonnets-gris' );
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<section class="ds-section ds-section--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-section__inner ds-section__inner--narrow ds-closing-block">
		<img
			class="ds-closing-block__logo"
			src="<?php echo esc_url( $logo ); ?>"
			alt="<?php echo esc_attr( $logo_alt ); ?>"
		/>
		<?php if ( $title ) : ?>
			<h2 class="ds-h1"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<p class="ds-horizontal-push__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $cta_label ) : ?>
			<a class="ds-button ds-button--pop-orange" href="<?php echo esc_url( $cta_url ); ?>">
				<?php echo esc_html( $cta_label ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
