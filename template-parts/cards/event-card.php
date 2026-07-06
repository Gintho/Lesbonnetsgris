<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$date     = $args['date'] ?? '';
$month    = $args['month'] ?? '';
$title    = $args['title'] ?? '';
$location = $args['location'] ?? '';
$tone     = $args['tone'] ?? 'pop-blue';
$url      = $args['url'] ?? '#';

$button_variant = 'secondary' === $tone ? 'outline' : 'outline-inverse';
?>
<div class="ds-event-card ds-event-card--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-event-card__date-row">
		<span class="ds-event-card__date"><?php echo esc_html( $date ); ?></span>
		<span class="ds-event-card__month"><?php echo esc_html( $month ); ?></span>
	</div>
	<div class="ds-event-card__body">
		<div class="ds-h3 ds-event-card__title"><?php echo esc_html( $title ); ?></div>
		<div class="ds-event-card__location"><?php echo esc_html( $location ); ?></div>
	</div>
	<a class="ds-button ds-button--<?php echo esc_attr( $button_variant ); ?> ds-button--sm" href="<?php echo esc_url( $url ); ?>">
		<?php esc_html_e( "Voir l'événement", 'bonnets-gris' ); ?>
	</a>
</div>
