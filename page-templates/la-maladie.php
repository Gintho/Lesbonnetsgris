<?php
/**
 * Template Name: La Maladie
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title">
	<h1 class="ds-h1"><?php esc_html_e( 'La maladie', 'bonnets-gris' ); ?></h1>
	<p class="ds-page-title__intro">
		<?php esc_html_e( 'Comprendre les tumeurs cérébrales pédiatriques, c\'est déjà agir. Voici ce que nous savons, et pourquoi la recherche a besoin de nous.', 'bonnets-gris' ); ?>
	</p>
</div>

<?php
get_template_part(
	'template-parts/marketing/quote-band',
	null,
	array(
		'tone' => 'dark',
		'text' => __( 'Les tumeurs cérébrales sont l\'une des premières causes de décès par maladie chez l\'enfant en France.', 'bonnets-gris' ),
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
				'description' => __( 'Il existe de nombreux types de tumeurs cérébrales chez l\'enfant, différentes de celles de l\'adulte et nécessitant des traitements spécifiques. Faute de financements suffisants, la recherche dédiée reste largement insuffisante.', 'bonnets-gris' ),
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
				'value' => '1/2000',
				'label' => __( 'Enfant touché avant 15 ans', 'bonnets-gris' ),
			),
			array(
				'value' => '~450',
				'label' => __( 'Nouveaux cas par an en France', 'bonnets-gris' ),
			),
			array(
				'value' => '9',
				'label' => __( 'Programmes de recherche financés', 'bonnets-gris' ),
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
				'title'      => __( 'L\'histoire de Camille', 'bonnets-gris' ),
				'paragraphs' => array(
					__( 'Camille est maman d\'un enfant suivi pour une tumeur cérébrale depuis 2022. Elle raconte le diagnostic, les premiers mois de traitement, et la façon dont l\'entourage et l\'association ont changé le quotidien de la famille.', 'bonnets-gris' ),
					__( '« On n\'a rien vu venir. Et pourtant, depuis, on n\'a jamais été aussi entourés. »', 'bonnets-gris' ),
					__( '— Camille, maman, bénévole depuis 2022', 'bonnets-gris' ),
				),
			)
		);
		?>
	</div>
</section>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner ds-section__inner--narrow ds-closing-block">
		<p class="ds-horizontal-push__description">
			<?php esc_html_e( 'Chaque année, nous menons des campagnes de sensibilisation pour faire connaître le symbole du bonnet gris et l\'urgence de la recherche. Relayées par nos bénévoles et nos partenaires, elles permettent de toucher un public toujours plus large.', 'bonnets-gris' ); ?>
		</p>
		<a class="ds-button ds-button--outline" href="<?php echo esc_url( home_url( '/actualites/' ) ); ?>">
			<?php esc_html_e( 'En savoir plus', 'bonnets-gris' ); ?>
		</a>
	</div>
</section>

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner ds-section__inner--narrow">
		<h3 class="ds-h2"><?php esc_html_e( "L'urgence d'agir", 'bonnets-gris' ); ?></h3>
		<p class="ds-horizontal-push__description">
			<?php esc_html_e( 'Le manque de financements freine la recherche sur les tumeurs cérébrales pédiatriques. Les chercheurs ont besoin de moyens pour mieux comprendre la maladie et développer des traitements adaptés aux enfants.', 'bonnets-gris' ); ?>
		</p>
	</div>
</section>

<?php
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

get_template_part( 'template-parts/home/support-ways' );

get_footer();
