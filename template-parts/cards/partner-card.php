<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$name = $args['name'] ?? '';
$tone = $args['tone'] ?? 'rose';
?>
<div class="ds-partner-card ds-partner-card--<?php echo esc_attr( $tone ); ?>">
	<span class="ds-partner-card__name"><?php echo esc_html( $name ); ?></span>
</div>
