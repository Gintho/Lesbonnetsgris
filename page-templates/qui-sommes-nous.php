<?php
/**
 * Template Name: Qui sommes-nous
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="ds-page-title ds-page-title--pop-orange">
	<span class="ds-badge ds-badge--on-dark-hero"><?php esc_html_e( 'Qui sommes-nous ?', 'bonnets-gris' ); ?></span>
	<h1 class="ds-h1"><?php echo esc_html( bonnets_gris_page_meta( 'qui-sommes-nous.php', 'hero_title' ) ); ?></h1>
	<p class="ds-page-title__intro">
		<?php echo esc_html( bonnets_gris_page_meta( 'qui-sommes-nous.php', 'hero_intro' ) ); ?>
	</p>
</div>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/about-intro',
			null,
			array(
				'eyebrow'    => __( 'Notre mission', 'bonnets-gris' ),
				'title'      => bonnets_gris_page_meta( 'qui-sommes-nous.php', 'mission_title' ),
				'paragraphs' => array(
					array(
						'text' => bonnets_gris_page_meta( 'qui-sommes-nous.php', 'mission_paragraph_1' ),
					),
					array(
						'text' => bonnets_gris_page_meta( 'qui-sommes-nous.php', 'mission_paragraph_2' ),
					),
					array(
						'text'      => bonnets_gris_page_meta( 'qui-sommes-nous.php', 'mission_paragraph_3' ),
						'highlight' => true,
					),
				),
			)
		);
		?>
	</div>
</section>

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner">
		<div class="ds-section-kicker ds-section-kicker--pop-orange" aria-hidden="true"><?php esc_html_e( 'Notre histoire', 'bonnets-gris' ); ?></div>
		<div class="ds-history-layout">
			<div class="ds-history-layout__timeline">
				<?php if ( is_active_sidebar( 'qui-sommes-nous-frise' ) ) : ?>
					<?php dynamic_sidebar( 'qui-sommes-nous-frise' ); ?>
				<?php else : ?>
					<?php
					get_template_part(
						'template-parts/marketing/timeline',
						null,
						array(
							'items' => array(
								array(
									'year'        => '2021',
									'title'       => __( 'Naissance du mouvement', 'bonnets-gris' ),
									'description' => __( 'Trois femmes, touchées personnellement par la maladie, décident de sortir du silence et de se réunir.', 'bonnets-gris' ),
								),
								array(
									'year'        => '2022',
									'title'       => __( 'Officialisation de l\'association', 'bonnets-gris' ),
									'description' => __( 'Les Bonnets Gris devient une association loi 1901, avec ses premiers statuts et son premier bureau.', 'bonnets-gris' ),
								),
								array(
									'year'        => '2023',
									'title'       => __( 'Premier temps fort de terrain', 'bonnets-gris' ),
									'description' => __( 'Première collecte publique et premiers partenariats avec des équipes soignantes.', 'bonnets-gris' ),
								),
								array(
									'year'        => '2024',
									'title'       => __( 'Premier soutien à la recherche', 'bonnets-gris' ),
									'description' => __( 'Les premiers fonds collectés sont reversés à un programme de recherche sur les tumeurs cérébrales pédiatriques.', 'bonnets-gris' ),
								),
							),
						)
					);
					?>
				<?php endif; ?>
			</div>
			<div class="ds-history-layout__text">
				<p><?php esc_html_e( 'Pour rendre plus visible cette maladie dans l\'ombre, Les Bonnets Gris n\'est pas une association de plus. C\'est un mouvement qui donne envie au service d\'une cause trop longtemps invisible.', 'bonnets-gris' ); ?></p>
				<p><?php esc_html_e( 'Association loi 1901 fondée par des femmes touchées personnellement par les tumeurs cérébrales — épouses et sœurs de malades. Née d\'un refus du silence, l\'association a pour conviction que l\'on peut se battre autrement.', 'bonnets-gris' ); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Notre équipe', 'bonnets-gris' ); ?></h2>

		<h3 class="ds-h3 ds-team-grid__group-title"><?php esc_html_e( 'Le conseil d\'administration', 'bonnets-gris' ); ?></h3>
		<div class="ds-team-grid ds-team-grid--group">
			<?php if ( is_active_sidebar( 'qui-sommes-nous-conseil' ) ) : ?>
				<?php dynamic_sidebar( 'qui-sommes-nous-conseil' ); ?>
			<?php else : ?>
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
			<?php endif; ?>
		</div>

		<h3 class="ds-h3 ds-team-grid__group-title"><?php esc_html_e( 'L\'équipe permanente', 'bonnets-gris' ); ?></h3>
		<div class="ds-team-grid">
			<?php if ( is_active_sidebar( 'qui-sommes-nous-equipe' ) ) : ?>
				<?php dynamic_sidebar( 'qui-sommes-nous-equipe' ); ?>
			<?php else : ?>
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
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner">
		<?php if ( is_active_sidebar( 'qui-sommes-nous-portraits' ) ) : ?>
			<?php dynamic_sidebar( 'qui-sommes-nous-portraits' ); ?>
		<?php else : ?>
			<?php
			get_template_part(
				'template-parts/marketing/founder-spotlight',
				null,
				array(
					'eyebrow' => __( 'Portrait', 'bonnets-gris' ),
					'items'   => array(
						array(
							'tone'  => 'nude',
							'name'  => 'Nora Lefèvre',
							'role'  => __( 'Cofondatrice et présidente', 'bonnets-gris' ),
							'bio'   => __( 'Nora a cofondé Les Bonnets Gris après avoir accompagné une personne de son entourage à travers la maladie. Depuis, elle porte le mouvement au quotidien : elle structure l\'association, va à la rencontre des familles et des chercheurs, et veille à ce que chaque euro collecté serve directement la cause.', 'bonnets-gris' ),
							'quote' => __( 'Ce qui me pousse chaque jour, c\'est de savoir qu\'on n\'est plus seuls face à la maladie.', 'bonnets-gris' ),
						),
						array(
							'tone'  => 'sky',
							'name'  => 'Manon Roussel',
							'role'  => __( 'Cofondatrice', 'bonnets-gris' ),
							'bio'   => __( 'Manon a vu son frère traverser la maladie. Elle a rejoint Nora dès les premiers mois pour donner une structure au mouvement : statuts, premiers partenaires, premières collectes. Aujourd\'hui elle pilote les relations avec les familles accompagnées.', 'bonnets-gris' ),
							'quote' => __( 'On ne voulait plus que les familles se sentent seules face à l\'annonce.', 'bonnets-gris' ),
						),
						array(
							'tone'  => 'terracotta',
							'name'  => 'Sarah Bianchi',
							'role'  => __( 'Cofondatrice', 'bonnets-gris' ),
							'bio'   => __( 'Sarah a accompagné son mari pendant son traitement. Elle porte aujourd\'hui la voix des proches aidants au sein de l\'association et anime le lien avec les équipes soignantes partenaires.', 'bonnets-gris' ),
							'quote' => __( 'Être aidante, c\'est aussi se battre. Notre mouvement leur donne une place.', 'bonnets-gris' ),
						),
					),
				)
			);
			?>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part( 'template-parts/home/partners', null, array( 'tone' => 'cream' ) ); ?>

<?php
if ( is_active_sidebar( 'qui-sommes-nous-cta-closing' ) ) {
	dynamic_sidebar( 'qui-sommes-nous-cta-closing' );
} else {
	get_template_part(
		'template-parts/marketing/closing-cta',
		null,
		array(
			'tone'        => 'white',
			'title'       => __( 'Rejoignez le mouvement', 'bonnets-gris' ),
			'description' => __( 'Don, course, bénévolat, partenariat : il existe mille façons de porter le bonnet gris avec nous.', 'bonnets-gris' ),
			'cta_label'   => __( 'Rejoignez-nous', 'bonnets-gris' ),
			'cta_url'     => home_url( '/rejoignez-nous/' ),
		)
	);
}
?>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner ds-section__inner--narrow">
		<?php get_template_part( 'template-parts/marketing/newsletter' ); ?>
	</div>
</section>

<?php
get_footer();
