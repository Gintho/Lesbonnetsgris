<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$quote = $args['quote'] ?? '';
$name  = $args['name'] ?? '';
$role  = $args['role'] ?? '';
$tone  = $args['tone'] ?? 'nude';
?>
<div class="ds-testimonial-card ds-testimonial-card--<?php echo esc_attr( $tone ); ?>">
	<svg class="ds-testimonial-card__mark" width="30" height="24" viewBox="0 0 30 24" aria-hidden="true" focusable="false">
		<path fill="currentColor" d="M0 24V14.5C0 6 5 .5 12.5 0v5C8 .8 5.5 4 5.5 9H12v15H0Zm17.5 0V14.5C17.5 6 22.5.5 30 0v5c-4.5-.2-7 3-7 8h6.5v15H17.5Z" />
	</svg>
	<p class="ds-h3 ds-testimonial-card__quote"><?php echo esc_html( $quote ); ?></p>
	<div>
		<div class="ds-testimonial-card__name"><?php echo esc_html( $name ); ?></div>
		<div class="ds-testimonial-card__role"><?php echo esc_html( $role ); ?></div>
	</div>
</div>
