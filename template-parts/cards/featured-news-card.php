<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$badge_label = $args['badge_label'] ?? __( 'À la une', 'bonnets-gris' );
$title       = $args['title'] ?? '';
$date        = $args['date'] ?? '';
$description = $args['description'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';
?>
<article class="ds-featured-news-card">
	<span class="ds-badge ds-badge--secondary"><?php echo esc_html( $badge_label ); ?></span>
	<h3 class="ds-featured-news-card__title"><?php echo esc_html( $title ); ?></h3>
	<?php if ( $date ) : ?>
		<span class="ds-featured-news-card__date"><?php echo esc_html( $date ); ?></span>
	<?php endif; ?>
	<?php if ( $description ) : ?>
		<p class="ds-featured-news-card__description"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>
	<?php if ( $cta_label ) : ?>
		<a class="ds-button ds-button--primary ds-button--sm" href="<?php echo esc_url( $cta_url ); ?>">
			<?php echo esc_html( $cta_label ); ?>
		</a>
	<?php endif; ?>
</article>
