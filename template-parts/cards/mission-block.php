<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'orange';
$logo        = $args['logo'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
?>
<div class="ds-mission-block ds-mission-block--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-mission-block__visual">
		<span class="ds-mission-block__color" aria-hidden="true"></span>
		<span class="ds-mission-block__logo">
			<img src="<?php echo esc_url( $logo ); ?>" alt="" />
		</span>
	</div>
	<h3 class="ds-mission-block__title"><?php echo esc_html( $title ); ?></h3>
	<?php if ( $description ) : ?>
		<p class="ds-mission-block__description"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>
</div>
