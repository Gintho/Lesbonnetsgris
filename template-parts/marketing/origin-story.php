<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'cream';
$logo        = $args['logo'] ?? get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' );
$eyebrow     = $args['eyebrow'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$quote       = $args['quote'] ?? '';
$quote_name  = $args['quote_name'] ?? '';
?>
<div class="ds-origin-story">
	<div class="ds-origin-story__visual ds-origin-story__visual--<?php echo esc_attr( $tone ); ?>">
		<img src="<?php echo esc_url( $logo ); ?>" alt="" />
	</div>
	<div class="ds-origin-story__content">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h2 class="ds-h1"><?php echo esc_html( $title ); ?></h2>
		<?php if ( $description ) : ?>
			<p class="ds-origin-story__description"><?php echo esc_html( $description ); ?></p>
		<?php endif; ?>
		<?php if ( $quote ) : ?>
			<blockquote class="ds-origin-story__quote">
				<p>&laquo;&nbsp;<?php echo esc_html( $quote ); ?>&nbsp;&raquo;</p>
				<?php if ( $quote_name ) : ?>
					<cite><?php echo esc_html( $quote_name ); ?></cite>
				<?php endif; ?>
			</blockquote>
		<?php endif; ?>
	</div>
</div>
