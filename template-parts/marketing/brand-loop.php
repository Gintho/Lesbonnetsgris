<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone    = $args['tone'] ?? 'cream';
$gif     = $args['gif'] ?? '';
$gif_alt = $args['gif_alt'] ?? '';
$text    = $args['text'] ?? '';
?>
<section class="ds-section ds-section--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-section__inner ds-brand-loop">
		<?php if ( $text ) : ?>
			<h1 class="ds-display-xxl ds-brand-loop__text"><?php echo esc_html( $text ); ?></h1>
		<?php endif; ?>
		<?php if ( $gif ) : ?>
			<img
				class="ds-brand-loop__gif"
				src="<?php echo esc_url( $gif ); ?>"
				alt="<?php echo esc_attr( $gif_alt ); ?>"
				width="220"
				height="220"
				loading="lazy"
			/>
		<?php endif; ?>
	</div>
</section>
