<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone      = $args['tone'] ?? 'cream';
$eyebrow   = $args['eyebrow'] ?? '';
$title     = $args['title'] ?? '';
$lines     = $args['lines'] ?? array();
$cta_label = $args['cta_label'] ?? '';
$cta_url   = $args['cta_url'] ?? '#';

/**
 * Split a chunk of text into individual words for the scroll-driven reveal.
 */
$bonnets_gris_manifesto_words = static function ( $text ) {
	$words = preg_split( '/\s+/', trim( $text ) );
	$out   = array();
	foreach ( $words as $word ) {
		if ( '' !== $word ) {
			$out[] = $word;
		}
	}
	return $out;
};

$word_index = 0;
?>
<div class="ds-manifesto-track">
	<section class="ds-section ds-section--<?php echo esc_attr( $tone ); ?> ds-manifesto-section">
		<div class="ds-section__inner ds-manifesto">
			<?php if ( $eyebrow ) : ?>
				<span class="ds-badge ds-badge--secondary ds-manifesto__eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<?php endif; ?>

			<h1 class="ds-manifesto__title">
				<?php
				foreach ( $bonnets_gris_manifesto_words( $title ) as $word ) :
					?><span class="ds-manifesto__word" data-word-index="<?php echo (int) $word_index; ?>"><?php echo esc_html( $word ); ?></span> <?php
					++$word_index;
				endforeach;
				?>
			</h1>

			<?php foreach ( $lines as $line ) : ?>
				<?php
				$line_text      = $line['text'] ?? '';
				$line_highlight = ! empty( $line['highlight'] );
				$word_class     = 'ds-manifesto__word' . ( $line_highlight ? ' ds-manifesto__word--highlight' : '' );
				?>
				<p class="ds-manifesto__line">
					<?php
					foreach ( $bonnets_gris_manifesto_words( $line_text ) as $word ) :
						?><span class="<?php echo esc_attr( $word_class ); ?>" data-word-index="<?php echo (int) $word_index; ?>"><?php echo esc_html( $word ); ?></span> <?php
						++$word_index;
					endforeach;
					?>
				</p>
			<?php endforeach; ?>

			<?php if ( $cta_label ) : ?>
				<a
					class="ds-button ds-button--outline"
					href="<?php echo esc_url( $cta_url ); ?>"
					data-word-index="<?php echo (int) $word_index; ?>"
				>
					<?php echo esc_html( $cta_label ); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
</div>
