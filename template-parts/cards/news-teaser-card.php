<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = $args['title'] ?? '';
$image = $args['image'] ?? '';
$url   = $args['url'] ?? '#';
$tone  = $args['tone'] ?? 'orange';
?>
<article class="ds-news-teaser-card ds-news-teaser-card--<?php echo esc_attr( $tone ); ?>">
	<?php if ( $image ) : ?>
		<div class="ds-news-teaser-card__image">
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		</div>
	<?php endif; ?>
	<div class="ds-news-teaser-card__body">
		<h3 class="ds-h3 ds-news-teaser-card__title"><?php echo esc_html( $title ); ?></h3>
		<a class="ds-news-teaser-card__link" href="<?php echo esc_url( $url ); ?>">
			<?php esc_html_e( 'Lire la suite', 'bonnets-gris' ); ?>
		</a>
	</div>
</article>
