<?php
/**
 * Template Name: Qui sommes-nous
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title">
	<h1 class="ds-h1"><?php esc_html_e( 'Qui sommes-nous ?', 'bonnets-gris' ); ?></h1>
	<p class="ds-page-title__intro">
		<?php esc_html_e( 'Les Bonnets Gris est une association loi 1901, portée par des familles, des chercheurs et des bénévoles réunis autour d\'un même symbole.', 'bonnets-gris' ); ?>
	</p>
</div>

<?php
get_template_part(
	'template-parts/marketing/quote-band',
	null,
	array(
		'tone' => 'primary',
		'text' => __( 'On ne choisit pas ce qui nous arrive. On choisit ce qu\'on en fait, ensemble.', 'bonnets-gris' ),
	)
);
?>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/origin-story',
			null,
			array(
				'tone'        => 'cream',
				'eyebrow'     => __( 'Notre histoire', 'bonnets-gris' ),
				'title'       => __( 'Un bonnet, un symbole, un mouvement', 'bonnets-gris' ),
				'description' => __( 'Tout commence en 2019, autour d\'un bonnet tricoté à la main pour tenir chaud à un enfant pendant ses traitements. Ce geste simple devient un symbole : celui de la chaleur qu\'on peut s\'offrir quand la vie se complique. Des familles, des soignants et des bénévoles s\'en emparent, et Les Bonnets Gris voit le jour.', 'bonnets-gris' ),
				'quote'       => __( 'On voulait que chaque enfant sente qu\'on pense à lui, même dans les moments difficiles.', 'bonnets-gris' ),
				'quote_name'  => __( 'Nora, cofondatrice des Bonnets Gris', 'bonnets-gris' ),
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
		'tone'  => 'dark',
		'items' => array(
			array(
				'value' => '01',
				'label' => __( 'On comprend : on s\'informe et on écoute les familles', 'bonnets-gris' ),
			),
			array(
				'value' => '02',
				'label' => __( 'On agit : on court, on collecte, on sensibilise', 'bonnets-gris' ),
			),
			array(
				'value' => '03',
				'label' => __( 'On avance : ensemble, un pas après l\'autre', 'bonnets-gris' ),
			),
		),
	)
);
?>

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner ds-section__inner--narrow">
		<p class="ds-horizontal-push__description">
			<?php esc_html_e( 'Les Bonnets Gris est entièrement portée par des bénévoles. Notre objectif : financer la recherche contre les tumeurs cérébrales pédiatriques et accompagner les familles concernées, partout en France.', 'bonnets-gris' ); ?>
		</p>
	</div>
</section>

<?php get_template_part( 'template-parts/home/missions' ); ?>

<?php get_template_part( 'template-parts/home/events' ); ?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Le conseil d\'administration', 'bonnets-gris' ); ?></h2>
		<div class="ds-team-grid">
			<?php
			$board = array(
				array(
					'name' => 'Nora Lefèvre',
					'role' => __( 'Présidente', 'bonnets-gris' ),
					'tone' => 'nude',
				),
				array(
					'name' => 'Karim Benali',
					'role' => __( 'Trésorier', 'bonnets-gris' ),
					'tone' => 'sky',
				),
				array(
					'name' => 'Élise Dubreuil',
					'role' => __( 'Secrétaire générale', 'bonnets-gris' ),
					'tone' => 'orange',
				),
				array(
					'name' => 'Thomas Rivière',
					'role' => __( 'Membre du bureau', 'bonnets-gris' ),
					'tone' => 'terracotta',
				),
			);
			foreach ( $board as $member ) :
				get_template_part( 'template-parts/cards/team-card', null, $member );
			endforeach;
			?>
		</div>
	</div>
</section>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'L\'équipe permanente', 'bonnets-gris' ); ?></h2>
		<div class="ds-team-grid">
			<?php
			$team = array(
				array(
					'name' => 'Camille Fabre',
					'role' => __( 'Directrice générale', 'bonnets-gris' ),
					'tone' => 'sky',
				),
				array(
					'name' => 'Yanis Cherif',
					'role' => __( 'Responsable communication', 'bonnets-gris' ),
					'tone' => 'orange',
				),
				array(
					'name' => 'Inès Moreau',
					'role' => __( 'Chargée de missions recherche', 'bonnets-gris' ),
					'tone' => 'terracotta',
				),
				array(
					'name' => 'Hugo Blanchard',
					'role' => __( 'Coordinateur des événements', 'bonnets-gris' ),
					'tone' => 'nude',
				),
			);
			foreach ( $team as $member ) :
				get_template_part( 'template-parts/cards/team-card', null, $member );
			endforeach;
			?>
		</div>
	</div>
</section>

<?php
get_template_part(
	'template-parts/marketing/horizontal-push',
	null,
	array(
		'tone'        => 'nude',
		'eyebrow'     => __( 'Bénévolat', 'bonnets-gris' ),
		'title'       => __( 'Des bénévoles au grand cœur', 'bonnets-gris' ),
		'description' => __( 'Chaque année, des dizaines de bénévoles donnent de leur temps pour organiser nos courses, animer nos collectes et représenter le mouvement sur le terrain.', 'bonnets-gris' ),
		'cta_label'   => __( 'Devenir bénévole', 'bonnets-gris' ),
		'cta_url'     => home_url( '/rejoignez-nous/#mouvement' ),
	)
);

get_template_part( 'template-parts/home/partners' );
?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Elles et ils soutiennent notre cause', 'bonnets-gris' ); ?></h2>
		<div class="ds-cards-grid">
			<?php
			$personalities = array(
				array(
					'tone'  => 'nude',
					'quote' => __( 'Porter le bonnet gris, c\'est dire qu\'on n\'oublie personne.', 'bonnets-gris' ),
					'name'  => 'Léa Vasseur',
					'role'  => __( 'Marraine des Bonnets Gris', 'bonnets-gris' ),
				),
				array(
					'tone'  => 'sky',
					'quote' => __( 'Cette association avance vite, avec le cœur et avec méthode.', 'bonnets-gris' ),
					'name'  => 'Adam Girard',
					'role'  => __( 'Parrain des Bonnets Gris', 'bonnets-gris' ),
				),
				array(
					'tone'  => 'cream',
					'quote' => __( 'Chaque euro collecté se voit dans les laboratoires, très concrètement.', 'bonnets-gris' ),
					'name'  => 'Sofia Anton',
					'role'  => __( 'Ambassadrice des Bonnets Gris', 'bonnets-gris' ),
				),
			);
			foreach ( $personalities as $personality ) :
				get_template_part( 'template-parts/cards/testimonial-card', null, $personality );
			endforeach;
			?>
		</div>
	</div>
</section>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner ds-section__inner--narrow ds-closing-block">
		<img
			class="ds-closing-block__logo"
			src="<?php echo esc_url( get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ) ); ?>"
			alt="<?php esc_attr_e( 'Symbole des Bonnets Gris', 'bonnets-gris' ); ?>"
		/>
		<h2 class="ds-h1"><?php esc_html_e( 'Rejoignez le mouvement', 'bonnets-gris' ); ?></h2>
		<p class="ds-horizontal-push__description">
			<?php esc_html_e( 'Don, course, bénévolat, partenariat : il existe mille façons de porter le bonnet gris avec nous.', 'bonnets-gris' ); ?>
		</p>
		<a class="ds-button ds-button--pop-orange" href="<?php echo esc_url( home_url( '/rejoignez-nous/' ) ); ?>">
			<?php esc_html_e( 'Rejoignez-nous', 'bonnets-gris' ); ?>
		</a>
	</div>
</section>

<?php
get_footer();
