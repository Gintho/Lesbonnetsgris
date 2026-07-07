<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone        = $args['tone'] ?? 'cream';
$eyebrow     = $args['eyebrow'] ?? '';
$text_before = $args['text_before'] ?? '';
$highlight   = $args['highlight'] ?? '';
$text_after  = $args['text_after'] ?? '';
$cta_label   = $args['cta_label'] ?? '';
$cta_url     = $args['cta_url'] ?? '#';

/**
 * Split a chunk of text into individual words for the scroll-driven reveal.
 * Each word keeps track of whether it belongs to the highlighted phrase.
 */
$bonnets_gris_manifesto_words = static function ( $text, $is_highlight ) {
	$words = preg_split( '/\s+/', trim( $text ) );
	$out   = array();
	foreach ( $words as $word ) {
		if ( '' === $word ) {
			continue;
		}
		$out[] = array(
			'text'      => $word,
			'highlight' => $is_highlight,
		);
	}
	return $out;
};

$words = array_merge(
	$bonnets_gris_manifesto_words( $text_before, false ),
	$bonnets_gris_manifesto_words( $highlight, true ),
	$bonnets_gris_manifesto_words( $text_after, false )
);
?>
<div class="ds-manifesto-track">
	<section class="ds-section ds-section--<?php echo esc_attr( $tone ); ?> ds-manifesto-section">
		<div class="ds-section__inner ds-manifesto">
			<?php if ( $eyebrow ) : ?>
				<span class="ds-eyebrow ds-manifesto__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>
			<p class="ds-manifesto__text">
				<?php
				foreach ( $words as $index => $word ) :
					$classes = 'ds-manifesto__word';
					if ( $word['highlight'] ) {
						$classes .= ' ds-manifesto__word--highlight';
					}
					?><span class="<?php echo esc_attr( $classes ); ?>" data-word-index="<?php echo (int) $index; ?>"><?php echo esc_html( $word['text'] ); ?></span> <?php
				endforeach;
				?>
			</p>
			<?php if ( $cta_label ) : ?>
				<a
					class="ds-button ds-button--outline"
					href="<?php echo esc_url( $cta_url ); ?>"
					data-word-index="<?php echo (int) count( $words ); ?>"
				>
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
</div>
