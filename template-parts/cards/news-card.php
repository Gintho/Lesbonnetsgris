<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title   = $args['title'] ?? '';
$excerpt = $args['excerpt'] ?? '';
$image   = $args['image'] ?? '';
$date    = $args['date'] ?? '';
$url     = $args['url'] ?? '#';
?>
<article class="ds-news-card">
	<?php if ( $image ) : ?>
		<div class="ds-news-card__image">
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		</div>
	<?php endif; ?>
	<div class="ds-news-card__body">
		<?php if ( $date ) : ?>
			<span class="ds-news-card__date"><?php echo esc_html( $date ); ?></span>
		<?php endif; ?>
		<h3 class="ds-h3 ds-news-card__title"><?php echo esc_html( $title ); ?></h3>
		<?php if ( $excerpt ) : ?>
			<p class="ds-news-card__excerpt"><?php echo esc_html( $excerpt ); ?></p>
		<?php endif; ?>
		<a class="ds-button ds-button--ghost ds-button--sm ds-news-card__link" href="<?php echo esc_url( $url ); ?>">
			<?php esc_html_e( 'Lire la suite', 'bonnets-gris' ); ?>
		</a>
	</div>
</article>
