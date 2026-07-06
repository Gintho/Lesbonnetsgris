<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$name = $args['name'] ?? '';
?>
<div class="ds-partner-card"><?php echo esc_html( $name ); ?></div>
