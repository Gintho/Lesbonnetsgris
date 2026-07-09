<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_multi = count( $block->parsed_block['innerBlocks'] ?? array() ) > 1;
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'ds-founder-carousel' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> data-carousel>
	<div class="ds-founder-carousel__track" data-carousel-track>
		<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
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
