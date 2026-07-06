<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone  = $args['tone'] ?? 'primary';
$items = $args['items'] ?? array();
?>
<div class="ds-stats ds-stats--<?php echo esc_attr( $tone ); ?>">
	<?php foreach ( $items as $item ) : ?>
		<div class="ds-stats__item">
			<div class="ds-stats__value"><?php echo esc_html( $item['value'] ); ?></div>
			<div class="ds-stats__label"><?php echo esc_html( $item['label'] ); ?></div>
		</div>
	<?php endforeach; ?>
</div>
