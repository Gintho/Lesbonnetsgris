<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tones = array( 'orange', 'blue', 'terracotta', 'nude' );

$featured_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
	)
);

$featured_id        = 0;
$featured_title     = '';
$featured_date      = '';
$featured_excerpt   = '';
$featured_permalink = '#';

if ( $featured_query->have_posts() ) {
	$featured_query->the_post();
	$featured_id        = get_the_ID();
	$featured_title     = get_the_title();
	$featured_date      = get_the_date();
	$featured_excerpt   = wp_trim_words( get_the_excerpt(), 30 );
	$featured_permalink = get_permalink();
	wp_reset_postdata();
}

$rest_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 8,
		'post__not_in'        => $featured_id ? array( $featured_id ) : array(),
		'ignore_sticky_posts' => true,
	)
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<div class="ds-section__header">
			<h2 class="ds-h1"><?php esc_html_e( 'Nos actualités', 'bonnets-gris' ); ?></h2>
			<a class="ds-button ds-button--ghost" href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>">
				<?php esc_html_e( 'Voir toutes nos actualités', 'bonnets-gris' ); ?>
			</a>
		</div>

		<?php if ( $featured_id || $rest_query->have_posts() ) : ?>
			<div class="ds-news-carousel">
				<div class="ds-news-carousel__track">
					<?php if ( $featured_id ) : ?>
						<div class="ds-news-carousel__item">
							<?php
							get_template_part(
								'template-parts/cards/featured-news-card',
								null,
								array(
									'badge_label' => __( 'À la une', 'bonnets-gris' ),
									'title'       => $featured_title,
									'date'        => $featured_date,
									'description' => $featured_excerpt,
									'cta_label'   => __( "Lire l'article", 'bonnets-gris' ),
									'cta_url'     => $featured_permalink,
								)
							);
							?>
						</div>
					<?php endif; ?>

					<?php
					$index = 0;
					while ( $rest_query->have_posts() ) :
						$rest_query->the_post();
						?>
						<div class="ds-news-carousel__item">
							<?php
							get_template_part(
								'template-parts/cards/news-teaser-card',
								null,
								array(
									'title' => get_the_title(),
									'image' => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ),
									'url'   => get_permalink(),
									'tone'  => $tones[ $index % count( $tones ) ],
								)
							);
							?>
						</div>
						<?php
						++$index;
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="ds-news-carousel__nav">
					<button type="button" class="ds-news-carousel__arrow ds-news-carousel__arrow--prev" aria-label="<?php esc_attr_e( 'Actualités précédentes', 'bonnets-gris' ); ?>">
						<svg width="10" height="16" viewBox="0 0 10 16" fill="none" aria-hidden="true"><path d="M9 1 2 8l7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</button>
					<button type="button" class="ds-news-carousel__arrow ds-news-carousel__arrow--next" aria-label="<?php esc_attr_e( 'Actualités suivantes', 'bonnets-gris' ); ?>">
						<svg width="10" height="16" viewBox="0 0 10 16" fill="none" aria-hidden="true"><path d="m1 1 7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
					</button>
				</div>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Les actualités arrivent bientôt.', 'bonnets-gris' ); ?></p>
		<?php endif; ?>
	</div>
</section>
