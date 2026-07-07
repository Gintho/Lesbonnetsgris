<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone       = $args['tone'] ?? 'primary';
$items      = $args['items'] ?? array();
$source     = $args['source'] ?? '';
$cta_label  = $args['cta_label'] ?? '';
$cta_url    = $args['cta_url'] ?? '#';
$pale_cards = ! empty( $args['pale_cards'] );
$pale_tones = array( 'nude', 'sky', 'cream', 'nude-deep', 'sky-deep' );
?>
<div class="ds-stats ds-stats--<?php echo esc_attr( $tone ); ?>">
	<div class="ds-stats__items">
		<?php foreach ( $items as $index => $item ) : ?>
			<?php
			$item_class = 'ds-stats__item';
			if ( $pale_cards ) {
				$item_class .= ' ds-stats__item--card ds-stats__item--' . $pale_tones[ $index % count( $pale_tones ) ];
			}
			?>
			<div class="<?php echo esc_attr( $item_class ); ?>">
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
