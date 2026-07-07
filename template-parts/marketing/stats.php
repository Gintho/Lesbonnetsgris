<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone      = $args['tone'] ?? 'primary';
$items     = $args['items'] ?? array();
$source    = $args['source'] ?? '';
$cta_label = $args['cta_label'] ?? '';
$cta_url   = $args['cta_url'] ?? '#';
?>
<div class="ds-stats ds-stats--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-stats__items">
		<?php foreach ( $items as $item ) : ?>
			<div class="ds-stats__item">
				<div class="ds-stats__value"><?php echo esc_html( $item['value'] ); ?></div>
				<div class="ds-stats__label"><?php echo esc_html( $item['label'] ); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ( $cta_label || $source ) : ?>
		<div class="ds-stats__footer">
			<?php if ( $cta_label ) : ?>
				<a class="ds-button ds-button--outline-inverse ds-button--sm" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
			<?php if ( $source ) : ?>
				<span class="ds-stats__source"><?php echo esc_html( $source ); ?></span>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
