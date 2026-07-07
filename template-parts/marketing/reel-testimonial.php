<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tone      = $args['tone'] ?? 'nude';
$quote     = $args['quote'] ?? '';
$name      = $args['name'] ?? '';
$role      = $args['role'] ?? '';
$video     = $args['video'] ?? '';
$cta_label = $args['cta_label'] ?? '';
$cta_url   = $args['cta_url'] ?? '#';
?>
<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<div class="ds-reel-testimonial">
			<div class="ds-reel-testimonial__video ds-reel-testimonial__video--<?php echo esc_attr( $tone ); ?><?php echo $video ? '' : ' is-placeholder'; ?>">
				<?php if ( $video ) : ?>
					<video src="<?php echo esc_url( $video ); ?>" playsinline muted loop></video>
				<?php endif; ?>
				<span class="ds-reel-testimonial__play" aria-hidden="true">
					<svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M21 11.27a1.5 1.5 0 0 1 0 2.6L2.5 24.6A1.5 1.5 0 0 1 .25 23.3V2.7A1.5 1.5 0 0 1 2.5 1.4L21 11.27Z" fill="currentColor" />
					</svg>
				</span>
				<span class="ds-badge ds-badge--dark ds-reel-testimonial__badge"><?php esc_html_e( 'Reel', 'bonnets-gris' ); ?></span>
			</div>
			<div class="ds-reel-testimonial__content">
				<svg class="ds-testimonial-card__mark" width="30" height="24" viewBox="0 0 30 24" aria-hidden="true" focusable="false">
					<path fill="currentColor" d="M0 24V14.5C0 6 5 .5 12.5 0v5C8 .8 5.5 4 5.5 9H12v15H0Zm17.5 0V14.5C17.5 6 22.5.5 30 0v5c-4.5-.2-7 3-7 8h6.5v15H17.5Z" />
				</svg>
				<p class="ds-h2 ds-reel-testimonial__quote"><?php echo esc_html( $quote ); ?></p>
				<div>
					<div class="ds-testimonial-card__name"><?php echo esc_html( $name ); ?></div>
					<div class="ds-testimonial-card__role"><?php echo esc_html( $role ); ?></div>
				</div>
				<?php if ( $cta_label ) : ?>
					<a class="ds-button ds-button--outline ds-reel-testimonial__cta" href="<?php echo esc_url( $cta_url ); ?>">
						<?php echo esc_html( $cta_label ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
