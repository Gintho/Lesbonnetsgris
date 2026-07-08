<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title         = $args['title'] ?? '';
$image         = $args['image'] ?? '';
$date          = $args['date'] ?? '';
$url           = $args['url'] ?? '#';
$tone          = $args['tone'] ?? 'orange';
$category      = $args['category'] ?? '';
$category_slug = $args['category_slug'] ?? '';
$large         = ! empty( $args['large'] );
?>
<article
	class="ds-mosaic-tile ds-mosaic-tile--<?php echo esc_attr( $tone ); ?><?php echo $large ? ' ds-mosaic-tile--large' : ''; ?>"
	<?php echo $category_slug ? 'data-category="' . esc_attr( $category_slug ) . '"' : ''; ?>
>
	<div class="ds-mosaic-tile__image<?php echo $image ? '' : ' is-placeholder'; ?>">
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
	<div class="ds-mosaic-tile__body">
		<?php if ( $category ) : ?>
			<span class="ds-badge ds-mosaic-tile__badge"><?php echo esc_html( $category ); ?></span>
		<?php endif; ?>
		<h3 class="ds-h3 ds-mosaic-tile__title"><?php echo esc_html( $title ); ?></h3>
		<?php if ( $date ) : ?>
			<span class="ds-mosaic-tile__date"><?php echo esc_html( $date ); ?></span>
		<?php endif; ?>
		<a class="ds-mosaic-tile__link" href="<?php echo esc_url( $url ); ?>">
			<?php esc_html_e( 'Lire la suite', 'bonnets-gris' ); ?>
		</a>
	</div>
</article>
