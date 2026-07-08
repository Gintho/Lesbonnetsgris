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
	<span class="ds-badge ds-badge--neutral"><?php esc_html_e( 'Qui sommes-nous ?', 'bonnets-gris' ); ?></span>
	<h1 class="ds-h1"><?php esc_html_e( 'Un mouvement qui donne envie.', 'bonnets-gris' ); ?></h1>
	<p class="ds-page-title__intro">
		<?php esc_html_e( 'Les Bonnets Gris est une association loi 1901, portée par des familles, des chercheurs et des bénévoles réunis autour d\'un même symbole.', 'bonnets-gris' ); ?>
	</p>
</div>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/about-intro',
			null,
			array(
				'eyebrow'     => __( 'Notre mission', 'bonnets-gris' ),
				'title'       => __( 'Rendre visible, l\'invisible', 'bonnets-gris' ),
				'paragraphs'  => array(
					__( 'Les Bonnets Gris est entièrement portée par des bénévoles. Notre objectif : financer la recherche contre les tumeurs cérébrales pédiatriques et accompagner les familles concernées, partout en France.', 'bonnets-gris' ),
					__( 'On avance avec de l\'énergie, de la lumière et de l\'audace — jamais seuls, jamais dans le silence.', 'bonnets-gris' ),
				),
			)
		);
		?>
	</div>
</section>

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/origin-story',
			null,
			array(
				'tone'        => 'nude',
				'kicker'      => __( 'Notre histoire', 'bonnets-gris' ),
				'title'       => __( 'Les Bonnets Gris', 'bonnets-gris' ),
				'description' => array(
					array(
						'text' => __( 'Pour rendre plus visible cette maladie dans l\'ombre, Les Bonnets Gris n\'est pas une association de plus. C\'est un mouvement qui donne envie au service d\'une cause trop longtemps invisible.', 'bonnets-gris' ),
					),
					array(
						'text' => __( 'Association loi 1901 fondée par des femmes touchées personnellement par les tumeurs cérébrales — épouses et sœurs de malades. Née d\'un refus du silence, l\'association a pour conviction que l\'on peut se battre autrement :', 'bonnets-gris' ),
					),
					array(
						'text'      => __( 'Avec de l\'énergie, de la lumière et de l\'audace.', 'bonnets-gris' ),
						'highlight' => true,
					),
				),
			)
		);
		?>
	</div>
</section>

<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<h2 class="ds-h1 ds-section__title"><?php esc_html_e( 'Notre équipe', 'bonnets-gris' ); ?></h2>

		<h3 class="ds-h3 ds-team-grid__group-title"><?php esc_html_e( 'Le conseil d\'administration', 'bonnets-gris' ); ?></h3>
		<div class="ds-team-grid ds-team-grid--group">
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

		<h3 class="ds-h3 ds-team-grid__group-title"><?php esc_html_e( 'L\'équipe permanente', 'bonnets-gris' ); ?></h3>
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

<section class="ds-section ds-section--sky">
	<div class="ds-section__inner">
		<?php
		get_template_part(
			'template-parts/marketing/founder-spotlight',
			null,
			array(
				'tone'    => 'nude',
				'eyebrow' => __( 'Portrait', 'bonnets-gris' ),
				'name'    => 'Nora Lefèvre',
				'role'    => __( 'Cofondatrice et présidente', 'bonnets-gris' ),
				'bio'     => __( 'Nora a cofondé Les Bonnets Gris après avoir accompagné une personne de son entourage à travers la maladie. Depuis, elle porte le mouvement au quotidien : elle structure l\'association, va à la rencontre des familles et des chercheurs, et veille à ce que chaque euro collecté serve directement la cause.', 'bonnets-gris' ),
				'quote'   => __( 'Ce qui me pousse chaque jour, c\'est de savoir qu\'on n\'est plus seuls face à la maladie.', 'bonnets-gris' ),
			)
		);
		?>
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

<section class="ds-section ds-section--cream">
	<div class="ds-section__inner ds-section__inner--narrow">
		<?php get_template_part( 'template-parts/marketing/newsletter' ); ?>
	</div>
</section>

<?php
get_footer();
