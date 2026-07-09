<?php
/**
 * Template Name: La Maladie
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title ds-page-title--pop-orange">
	<span class="ds-badge ds-badge--on-dark-hero"><?php esc_html_e( 'La maladie', 'bonnets-gris' ); ?></span>
	<h1 class="ds-h1"><?php echo esc_html( bonnets_gris_page_meta( 'la-maladie.php', 'hero_title' ) ); ?></h1>
	<p class="ds-page-title__intro">
		<?php echo esc_html( bonnets_gris_page_meta( 'la-maladie.php', 'hero_intro' ) ); ?>
	</p>
</div>

<?php
get_template_part(
	'template-parts/marketing/quote-band',
	null,
	array(
		'tone' => 'dark',
		'text' => bonnets_gris_page_meta( 'la-maladie.php', 'quote_text' ),
	)
);
?>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/photo-float-card',
			null,
			array(
				'tone'        => 'nude',
				'description' => bonnets_gris_page_meta( 'la-maladie.php', 'photo_float_description' ),
				'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
				'cta_url'     => home_url( '/missions/' ),
			)
		);
		?>
	</div>
</section>

<?php
get_template_part(
	'template-parts/marketing/stats',
	null,
	array(
		'tone'  => 'primary',
		'items' => array(
			array(
				'value' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_1_value' ),
				'label' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_1_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_2_value' ),
				'label' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_2_label' ),
			),
			array(
				'value' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_3_value' ),
				'label' => bonnets_gris_page_meta( 'la-maladie.php', 'stat_3_label' ),
			),
		),
	)
);
?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner ds-section__inner--narrow">
		<?php
		get_template_part(
			'template-parts/marketing/story-spotlight',
			null,
			array(
				'tone'       => 'sky',
				'eyebrow'    => __( 'Leur histoire', 'bonnets-gris' ),
				'title'      => bonnets_gris_page_meta( 'la-maladie.php', 'story_title' ),
				'paragraphs' => array(
					bonnets_gris_page_meta( 'la-maladie.php', 'story_paragraph_1' ),
					bonnets_gris_page_meta( 'la-maladie.php', 'story_paragraph_2' ),
					bonnets_gris_page_meta( 'la-maladie.php', 'story_paragraph_3' ),
				),
			)
		);
		?>
	</div>
</section>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner ds-section__inner--narrow ds-closing-block">
		<p class="ds-horizontal-push__description">
			<?php echo esc_html( bonnets_gris_page_meta( 'la-maladie.php', 'awareness_text' ) ); ?>
		</p>
		<a class="ds-button ds-button--outline" href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>">
			<?php esc_html_e( 'En savoir plus', 'bonnets-gris' ); ?>
		</a>
	</div>
</section>

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner ds-section__inner--narrow">
		<h3 class="ds-h2"><?php echo esc_html( bonnets_gris_page_meta( 'la-maladie.php', 'urgency_title' ) ); ?></h3>
		<p class="ds-horizontal-push__description">
			<?php echo esc_html( bonnets_gris_page_meta( 'la-maladie.php', 'urgency_text' ) ); ?>
		</p>
	</div>
</section>

<?php
if ( is_active_sidebar( 'la-maladie-cta-collecte' ) ) {
	dynamic_sidebar( 'la-maladie-cta-collecte' );
} else {
	get_template_part(
		'template-parts/marketing/horizontal-push',
		null,
		array(
			'tone'        => 'orange',
			'eyebrow'     => __( 'Collecte', 'bonnets-gris' ),
			'title'       => __( 'Collecter des dons pour accélérer la recherche', 'bonnets-gris' ),
			'description' => __( 'Grâce à la Course des Bonnets Gris et aux événements organisés par nos bénévoles partout en France, nous collectons des fonds pour financer la recherche.', 'bonnets-gris' ),
			'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
			'cta_url'     => '#evenements',
		)
	);
}

if ( is_active_sidebar( 'la-maladie-cta-recherche' ) ) {
	dynamic_sidebar( 'la-maladie-cta-recherche' );
} else {
	get_template_part(
		'template-parts/marketing/horizontal-push',
		null,
		array(
			'tone'        => 'sky',
			'reverse'     => true,
			'eyebrow'     => __( 'Recherche', 'bonnets-gris' ),
			'title'       => __( 'Mobiliser et fédérer les acteurs de la recherche', 'bonnets-gris' ),
			'description' => __( 'Depuis 2019, nous mobilisons chercheurs, familles et bénévoles autour d\'un même mouvement, en soutenant des programmes de recherche et en favorisant les échanges entre équipes scientifiques.', 'bonnets-gris' ),
			'cta_label'   => __( 'En savoir plus', 'bonnets-gris' ),
			'cta_url'     => home_url( '/missions/' ),
		)
	);
}

get_template_part( 'template-parts/home/support-ways' );

get_footer();
