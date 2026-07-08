<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$direction = $args['direction'] ?? 'next';
$path      = 'prev' === $direction ? 'M9 1 2 8l7 7' : 'm1 1 7 7-7 7';
?>
<svg width="10" height="16" viewBox="0 0 10 16" fill="none" aria-hidden="true"><path d="<?php echo esc_attr( $path ); ?>" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
