<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tones = array( 'orange', 'blue', 'terracotta', 'nude' );

$news_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 4,
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
		<?php if ( $news_query->have_posts() ) : ?>
			<div class="ds-cards-grid ds-cards-grid--news-teaser">
				<?php
				$index = 0;
				while ( $news_query->have_posts() ) :
					$news_query->the_post();
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
					++$index;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p><?php esc_html_e( 'Les actualités arrivent bientôt.', 'bonnets-gris' ); ?></p>
		<?php endif; ?>
	</div>
</section>
