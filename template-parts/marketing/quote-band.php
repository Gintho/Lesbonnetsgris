<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$text = $args['text'] ?? '';
$tone = $args['tone'] ?? 'dark';
?>
<div class="ds-quote-band ds-quote-band--<?php echo esc_attr( $tone ); ?>">
	<p class="ds-h1 ds-quote-band__text"><?php echo esc_html( $text ); ?></p>
</div>
