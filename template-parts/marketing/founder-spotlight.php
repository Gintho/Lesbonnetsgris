<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$items           = $args['items'] ?? array();
$default_eyebrow = $args['eyebrow'] ?? '';

// Backward-compat: a single spotlight can still be passed as flat args.
if ( empty( $items ) && ! empty( $args['name'] ) ) {
	$items = array(
		array(
			'tone'    => $args['tone'] ?? 'nude',
			'eyebrow' => $args['eyebrow'] ?? '',
			'name'    => $args['name'],
			'role'    => $args['role'] ?? '',
			'bio'     => $args['bio'] ?? '',
			'quote'   => $args['quote'] ?? '',
			'photo'   => $args['photo'] ?? '',
		),
	);
}

$is_multi = count( $items ) > 1;
?>
<div class="ds-founder-carousel" data-carousel>
	<div class="ds-founder-carousel__track" data-carousel-track>
		<?php foreach ( $items as $item ) : ?>
			<?php
			$tone    = $item['tone'] ?? 'nude';
			$eyebrow = $item['eyebrow'] ?? $default_eyebrow;
			$name    = $item['name'] ?? '';
			$role    = $item['role'] ?? '';
			$bio     = $item['bio'] ?? '';
			$quote   = $item['quote'] ?? '';
			$photo   = $item['photo'] ?? '';

			$initials = '';
			foreach ( preg_split( '/\s+/', trim( $name ) ) as $word ) {
				$initials .= mb_substr( $word, 0, 1 );
			}
			$initials = mb_strtoupper( mb_substr( $initials, 0, 2 ) );
			?>
			<div class="ds-founder-carousel__item" data-carousel-item>
				<div class="ds-founder-spotlight">
					<div class="ds-founder-spotlight__visual ds-founder-spotlight__visual--<?php echo esc_attr( $tone ); ?><?php echo $photo ? '' : ' is-placeholder'; ?>">
						<?php if ( $photo ) : ?>
							<img src="<?php echo esc_url( $photo ); ?>" alt="" />
						<?php else : ?>
							<span class="ds-founder-spotlight__initials"><?php echo esc_html( $initials ); ?></span>
						<?php endif; ?>
					</div>
					<div class="ds-founder-spotlight__content">
						<?php if ( $eyebrow ) : ?>
							<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
						<?php endif; ?>
						<h2 class="ds-h1"><?php echo esc_html( $name ); ?></h2>
						<?php if ( $role ) : ?>
							<p class="ds-founder-spotlight__role"><?php echo esc_html( $role ); ?></p>
						<?php endif; ?>
						<?php if ( $bio ) : ?>
							<p class="ds-founder-spotlight__bio"><?php echo esc_html( $bio ); ?></p>
						<?php endif; ?>
						<?php if ( $quote ) : ?>
							<blockquote class="ds-founder-spotlight__quote">
								<p>&laquo;&nbsp;<?php echo esc_html( $quote ); ?>&nbsp;&raquo;</p>
							</blockquote>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php if ( $is_multi ) : ?>
		<div class="ds-founder-carousel__nav">
			<button type="button" class="ds-founder-carousel__arrow ds-founder-carousel__arrow--prev" aria-label="<?php esc_attr_e( 'Portrait précédent', 'bonnets-gris' ); ?>" data-carousel-prev>
				<?php get_template_part( 'template-parts/icons/chevron', null, array( 'direction' => 'prev' ) ); ?>
			</button>
			<button type="button" class="ds-founder-carousel__arrow ds-founder-carousel__arrow--next" aria-label="<?php esc_attr_e( 'Portrait suivant', 'bonnets-gris' ); ?>" data-carousel-next>
				<?php get_template_part( 'template-parts/icons/chevron', null, array( 'direction' => 'next' ) ); ?>
			</button>
		</div>
	<?php endif; ?>
</div>
