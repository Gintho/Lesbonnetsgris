<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items = $args['items'] ?? array();

// Backward-compat: a single reel can still be passed as flat args.
if ( empty( $items ) && ! empty( $args['quote'] ) ) {
	$items = array(
		array(
			'tone'  => $args['tone'] ?? 'nude',
			'quote' => $args['quote'],
			'name'  => $args['name'] ?? '',
			'role'  => $args['role'] ?? '',
			'video' => $args['video'] ?? '',
		),
	);
}

$cta_label = $args['cta_label'] ?? '';
$cta_url   = $args['cta_url'] ?? '#';
$is_multi  = count( $items ) > 1;
?>
<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<div class="ds-reel-testimonial-grid<?php echo $is_multi ? ' ds-reel-testimonial-grid--multi' : ''; ?>">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$tone  = $item['tone'] ?? 'nude';
				$quote = $item['quote'] ?? '';
				$name  = $item['name'] ?? '';
				$role  = $item['role'] ?? '';
				$video = $item['video'] ?? '';
				?>
				<div class="ds-reel-testimonial">
					<div class="ds-reel-testimonial__video ds-reel-testimonial__video--<?php echo esc_attr( $tone ); ?><?php echo $video ? '' : ' is-placeholder'; ?>">
						<?php if ( $video ) : ?>
							<video src="<?php echo esc_url( $video ); ?>" playsinline muted loop></video>
						<?php endif; ?>
						<span class="ds-reel-testimonial__play" aria-hidden="true">
							<?php get_template_part( 'template-parts/icons/play-button' ); ?>
						</span>
						<span class="ds-badge ds-badge--dark ds-reel-testimonial__badge"><?php esc_html_e( 'Reel', 'bonnets-gris' ); ?></span>
					</div>
					<div class="ds-reel-testimonial__content">
						<?php get_template_part( 'template-parts/icons/quote-mark' ); ?>
						<p class="ds-h2 ds-reel-testimonial__quote"><?php echo esc_html( $quote ); ?></p>
						<div>
							<div class="ds-testimonial-card__name"><?php echo esc_html( $name ); ?></div>
							<div class="ds-testimonial-card__role"><?php echo esc_html( $role ); ?></div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php if ( $cta_label ) : ?>
			<div class="ds-reel-testimonial__cta-wrap">
				<a class="ds-button ds-button--outline" href="<?php echo esc_url( $cta_url ); ?>">
					<?php echo esc_html( $cta_label ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
