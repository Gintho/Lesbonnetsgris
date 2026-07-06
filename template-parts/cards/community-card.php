<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$name        = $args['name'] ?? '';
$heart_index = ( $args['heart_index'] ?? 0 ) % 5 + 1;
?>
<div class="ds-community-card ds-community-card--heart-<?php echo esc_attr( $heart_index ); ?>">
	<svg class="ds-community-card__heart" width="30" height="26" viewBox="0 0 34 30" aria-hidden="true" focusable="false">
		<path d="M17 30C8 23 0 17 0 9.5 0 4 4 0 9 0c3.2 0 6 1.7 8 4.5C19 1.7 21.8 0 25 0c5 0 9 4 9 9.5C34 17 26 23 17 30Z" />
	</svg>
	<div class="ds-community-card__name"><?php echo esc_html( $name ); ?></div>
</div>
