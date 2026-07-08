<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'cream';
$logo        = $args['logo'] ?? get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' );
$kicker      = $args['kicker'] ?? '';
$eyebrow     = $args['eyebrow'] ?? '';
$title       = $args['title'] ?? '';
$description = $args['description'] ?? '';
$quote       = $args['quote'] ?? '';
$quote_name  = $args['quote_name'] ?? '';

// $description can be a plain string (single paragraph) or an array of
// paragraphs, each optionally ['text' => ..., 'highlight' => true].
$paragraphs = array();
if ( is_array( $description ) ) {
	foreach ( $description as $paragraph ) {
		$paragraphs[] = is_array( $paragraph ) ? $paragraph : array( 'text' => $paragraph );
	}
} elseif ( '' !== $description ) {
	$paragraphs[] = array( 'text' => $description );
}
?>
<?php if ( $kicker ) : ?>
	<div class="ds-section-kicker" aria-hidden="true"><?php echo esc_html( $kicker ); ?></div>
<?php endif; ?>
<div class="ds-origin-story">
	<div class="ds-origin-story__visual ds-origin-story__visual--<?php echo esc_attr( $tone ); ?>">
		<img src="<?php echo esc_url( $logo ); ?>" alt="" />
	</div>
	<div class="ds-origin-story__content">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h2 class="ds-h1"><?php echo esc_html( $title ); ?></h2>
		<?php foreach ( $paragraphs as $paragraph ) : ?>
			<?php
			$paragraph_class = 'ds-origin-story__description';
			if ( ! empty( $paragraph['highlight'] ) ) {
				$paragraph_class .= ' ds-origin-story__description--highlight';
			}
			?>
			<p class="<?php echo esc_attr( $paragraph_class ); ?>"><?php echo esc_html( $paragraph['text'] ?? '' ); ?></p>
		<?php endforeach; ?>
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
