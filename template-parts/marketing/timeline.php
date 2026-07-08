<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = $args['items'] ?? array();
?>
<ol class="ds-timeline">
	<?php foreach ( $items as $item ) : ?>
		<li class="ds-timeline__item">
			<div class="ds-timeline__marker" aria-hidden="true"></div>
			<div class="ds-timeline__content">
				<div class="ds-timeline__year"><?php echo esc_html( $item['year'] ?? '' ); ?></div>
				<h3 class="ds-h3 ds-timeline__title"><?php echo esc_html( $item['title'] ?? '' ); ?></h3>
				<?php if ( ! empty( $item['description'] ) ) : ?>
					<p class="ds-timeline__description"><?php echo esc_html( $item['description'] ); ?></p>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ol>
