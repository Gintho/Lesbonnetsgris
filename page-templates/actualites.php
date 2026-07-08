<?php
/**
 * Template Name: Actualités
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$featured_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => true,
	)
);

$featured_id = 0;

if ( $featured_query->have_posts() ) :
	$featured_query->the_post();
	$featured_id = get_the_ID();
	get_template_part(
		'template-parts/marketing/news-hero',
		null,
		array(
			'eyebrow'     => __( 'À la une', 'bonnets-gris' ),
			'title'       => get_the_title(),
			'subtitle'    => get_the_date(),
			'description' => wp_trim_words( get_the_excerpt(), 30 ),
			'image'       => get_the_post_thumbnail_url( $featured_id, 'large' ),
			'image_alt'   => get_the_title(),
			'cta_label'   => __( "Lire l'article", 'bonnets-gris' ),
			'cta_url'     => get_permalink(),
		)
	);
	wp_reset_postdata();
else :
	get_template_part(
		'template-parts/marketing/news-hero',
		null,
		array(
			'eyebrow'     => __( 'À la une', 'bonnets-gris' ),
			'title'       => __( 'Nos actualités arrivent bientôt', 'bonnets-gris' ),
			'subtitle'    => __( 'Restez connectés', 'bonnets-gris' ),
			'description' => __( 'Les prochains articles, événements et histoires du mouvement seront publiés ici.', 'bonnets-gris' ),
			'image'       => get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ),
			'image_alt'   => __( 'Symbole des Bonnets Gris', 'bonnets-gris' ),
			'cta_label'   => __( 'Faire un don', 'bonnets-gris' ),
			'cta_url'     => '#don',
		)
	);
endif;
?>


<?php
// Category slug -> visual tone for the mosaic tiles below.
$category_tones = array(
	'actualites-cat' => 'orange',
	'evenements-cat' => 'blue',
	'presse-cat'     => 'terracotta',
	'media-cat'      => 'dark',
);

// Filter bar options, in display order. Slugs must match the categories above.
$mosaic_filters = array(
	'all'            => __( 'Tout', 'bonnets-gris' ),
	'actualites-cat' => __( 'Actualités', 'bonnets-gris' ),
	'evenements-cat' => __( 'Événement', 'bonnets-gris' ),
	'presse-cat'     => __( 'Presse', 'bonnets-gris' ),
	'media-cat'      => __( 'Média', 'bonnets-gris' ),
);
?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Tout ce qui fait le mouvement', 'bonnets-gris' ); ?></h2>
		<?php
		$mosaic_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'post_status'         => 'publish',
				'posts_per_page'      => 24,
				'post__not_in'        => $featured_id ? array( $featured_id ) : array(),
				'ignore_sticky_posts' => true,
			)
		);

		if ( $mosaic_query->have_posts() ) :
			?>
			<div class="ds-mosaic-filters" role="group" aria-label="<?php esc_attr_e( 'Filtrer les actualités', 'bonnets-gris' ); ?>">
				<?php foreach ( $mosaic_filters as $filter_slug => $filter_label ) : ?>
					<button
						type="button"
						class="ds-mosaic-filter<?php echo 'all' === $filter_slug ? ' is-active' : ''; ?>"
						data-filter="<?php echo esc_attr( $filter_slug ); ?>"
						aria-pressed="<?php echo 'all' === $filter_slug ? 'true' : 'false'; ?>"
					>
						<?php echo esc_html( $filter_label ); ?>
					</button>
				<?php endforeach; ?>
			</div>
			<div class="ds-mosaic">
				<?php
				$index = 0;
				while ( $mosaic_query->have_posts() ) :
					$mosaic_query->the_post();
					$post_categories = get_the_category();
					$category_name   = $post_categories ? $post_categories[0]->name : '';
					$category_slug   = $post_categories ? $post_categories[0]->slug : '';
					get_template_part(
						'template-parts/cards/mosaic-tile',
						null,
						array(
							'title'         => get_the_title(),
							'image'         => get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ),
							'date'          => get_the_date(),
							'url'           => get_permalink(),
							'tone'          => $category_tones[ $category_slug ] ?? 'orange',
							'category'      => $category_name,
							'category_slug' => $category_slug,
							'large'         => 0 === $index % 5,
						)
					);
					++$index;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<?php
		else :
			?>
			<p><?php esc_html_e( 'Aucun autre contenu pour le moment.', 'bonnets-gris' ); ?></p>
			<?php
		endif;
		?>
	</div>
</section>

<?php
get_template_part(
	'template-parts/marketing/photo-band-cta',
	null,
	array(
		'tone'        => 'nude',
		'eyebrow'     => __( 'Presse', 'bonnets-gris' ),
		'title'       => __( 'Téléchargez notre press kit', 'bonnets-gris' ),
		'description' => __( 'Logo, visuels, chiffres clés et éléments de langage : tout ce qu\'il faut pour parler des Bonnets Gris dans vos articles.', 'bonnets-gris' ),
		'cta_label'   => __( 'Télécharger le press kit', 'bonnets-gris' ),
		'cta_url'     => '#',
	)
);

get_footer();
