<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

$logo_url = get_stylesheet_directory_uri() . '/assets/images/logo/mark-on-white-duo-orange-blue.png';

$events = array(
	array(
		'date'     => '12',
		'month'    => 'Oct',
		'title'    => 'Course des Bonnets Gris',
		'location' => 'Paris, Champ de Mars',
		'tone'     => 'pop-blue',
	),
	array(
		'date'     => '23',
		'month'    => 'Nov',
		'title'    => 'Vente de bonnets tricotés',
		'location' => 'Lyon, Place Bellecour',
		'tone'     => 'pop-terracotta',
	),
	array(
		'date'     => '05',
		'month'    => 'Déc',
		'title'    => 'Soirée de gala annuelle',
		'location' => 'Bordeaux',
		'tone'     => 'pop-blue',
	),
);

$testimonials = array(
	array(
		'tone'  => '',
		'quote' => "On n'est jamais seul quand on porte le bonnet gris.",
		'name'  => 'Camille',
		'role'  => 'Maman, bénévole depuis 2022',
	),
	array(
		'tone'  => 'sky',
		'quote' => "Chaque course, c'est un peu plus d'espoir pour nos enfants.",
		'name'  => 'Marc',
		'role'  => 'Coureur, 3 courses',
	),
	array(
		'tone'  => 'cream',
		'quote' => 'Le mur des Bonnets Gris, c\'est notre famille élargie.',
		'name'  => 'Inès',
		'role'  => 'Chercheuse soutenue',
	),
);

$community_names = array( 'Léa', 'Tom', 'Ana', 'Yanis', 'Chloé', 'Nael', 'Sofia', 'Hugo', 'Zoé', 'Adam', 'Mila', 'Léo', 'Inès', 'Noa', 'Jade', 'Kylian' );
$heart_vars      = array( '--heart-1', '--heart-2', '--heart-3', '--heart-4', '--heart-5' );

$partners = array( 'Fondation ABC', 'Groupe Meridia', 'CHU Saint-Loup', 'Banque Nova', 'Studio Linéa', 'Aéro Partners' );

$faqs = array(
	array(
		'question' => 'Comment faire un don ?',
		'answer'   => 'En ligne en 2 minutes, par carte ou virement. 100% sécurisé.',
	),
	array(
		'question' => 'Où va mon argent ?',
		'answer'   => 'Directement à la recherche sur les tumeurs cérébrales pédiatriques et au soutien des familles.',
	),
	array(
		'question' => 'Comment devenir bénévole ?',
		'answer'   => "Rejoignez une antenne locale ou proposez d'organiser un événement près de chez vous.",
	),
	array(
		'question' => "Qu'est-ce qu'un Bonnet Gris ?",
		'answer'   => 'Un membre de la communauté — donateur, bénévole, famille ou chercheur — qui porte le symbole du mouvement.',
	),
);
?>

<main id="primary" class="site-main">

	<section class="bg-hero bg-hero--secondary">
		<span class="bg-badge bg-badge--on-color-light">Ensemble contre les tumeurs cérébrales</span>
		<h1 class="ds-display-xxl bg-hero__title">Le bonnet gris est un symbole.</h1>
		<p class="bg-hero__subtitle">On le porte pour ceux qui se battent. Rejoignez le mouvement, pas juste une cause.</p>
		<div class="bg-hero__actions">
			<button type="button" class="bg-btn bg-btn--primary" data-donate-open>Faire un don</button>
			<button type="button" class="bg-btn bg-btn--outline">Devenir Bonnet Gris</button>
		</div>
	</section>

	<div class="bg-stats">
		<div class="bg-stats__item">
			<div class="ds-display-xxl bg-stats__value">2,4M€</div>
			<div class="bg-stats__label">Collectés depuis 2019</div>
		</div>
		<div class="bg-stats__item">
			<div class="ds-display-xxl bg-stats__value">312</div>
			<div class="bg-stats__label">Familles accompagnées</div>
		</div>
		<div class="bg-stats__item">
			<div class="ds-display-xxl bg-stats__value">9</div>
			<div class="bg-stats__label">Programmes de recherche financés</div>
		</div>
	</div>

	<section class="bg-section" style="background: var(--white);">
		<div class="bg-section__inner bg-mission__grid">
			<div>
				<span class="bg-badge bg-badge--secondary">Notre mission</span>
				<h2 class="ds-h1" style="margin-top: 20px; margin-bottom: 20px;">On ne fait pas un don. <br>On rejoint un mouvement.</h2>
				<div class="bg-mission__copy">
					<p>Depuis 2019, les Bonnets Gris tricotent, courent et se rassemblent pour financer la recherche contre les tumeurs cérébrales pédiatriques. Chaque bonnet porté est un signe de reconnaissance entre familles, chercheurs et bénévoles.</p>
				</div>
				<div class="bg-mission__actions">
					<button type="button" class="bg-btn bg-btn--primary">Notre histoire</button>
					<button type="button" class="bg-btn bg-btn--outline">Devenir bénévole</button>
				</div>
			</div>
			<div class="bg-mission__figure">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="Les Bonnets Gris — bonnet et deux cœurs">
			</div>
		</div>
	</section>

	<section class="bg-section" style="background: var(--white);">
		<div class="bg-section__inner">
			<div class="bg-section__head">
				<h2 class="ds-h1">Les événements à venir</h2>
				<button type="button" class="bg-btn bg-btn--ghost">Voir tout</button>
			</div>
			<div class="bg-events__grid">
				<?php foreach ( $events as $event ) : ?>
					<div class="bg-event-card bg-event-card--<?php echo esc_attr( $event['tone'] ); ?>">
						<div class="bg-event-card__date">
							<span class="bg-event-card__day"><?php echo esc_html( $event['date'] ); ?></span>
							<span class="bg-event-card__month"><?php echo esc_html( $event['month'] ); ?></span>
						</div>
						<div class="bg-event-card__body">
							<div class="ds-h3 bg-event-card__title"><?php echo esc_html( $event['title'] ); ?></div>
							<div class="bg-event-card__location"><?php echo esc_html( $event['location'] ); ?></div>
						</div>
						<button type="button" class="bg-btn bg-btn--outline-inverse bg-btn--sm">Voir l'événement</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="bg-section" style="background: var(--white);">
		<div class="bg-section__inner">
			<h2 class="ds-h1" style="margin-bottom: 40px;">Les histoires</h2>
			<div class="bg-testimonials__grid">
				<?php foreach ( $testimonials as $t ) : ?>
					<div class="bg-testimonial-card<?php echo $t['tone'] ? ' bg-testimonial-card--' . esc_attr( $t['tone'] ) : ''; ?>">
						<svg class="bg-testimonial-card__quote-mark" width="30" height="24" viewBox="0 0 30 24"><path d="M0 24V14.5C0 6 5 .5 12.5 0v5C8 .8 5.5 4 5.5 9H12v15H0Zm17.5 0V14.5C17.5 6 22.5.5 30 0v5c-4.5-.2-7 3-7 8h6.5v15H17.5Z"/></svg>
						<p class="ds-h3 bg-testimonial-card__quote"><?php echo esc_html( $t['quote'] ); ?></p>
						<div>
							<div class="bg-testimonial-card__name"><?php echo esc_html( $t['name'] ); ?></div>
							<div class="bg-testimonial-card__role"><?php echo esc_html( $t['role'] ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="bg-section" style="background: var(--orange-pop);">
		<div class="bg-section__inner">
			<div class="bg-section__head">
				<div>
					<span class="bg-badge bg-badge--dark">Le mur des Bonnets Gris</span>
					<h2 class="ds-h1" style="color: #fff; margin-top: 16px;">La communauté, en un coup d'œil</h2>
				</div>
				<button type="button" class="bg-btn bg-btn--outline-inverse">Rejoindre le mur</button>
			</div>
			<div class="bg-community__grid">
				<?php foreach ( $community_names as $i => $name ) : ?>
					<div class="bg-community-card">
						<svg class="bg-community-card__heart" width="30" height="26" viewBox="0 0 34 30" style="fill: var(<?php echo esc_attr( $heart_vars[ $i % count( $heart_vars ) ] ); ?>);"><path d="M17 30C8 23 0 17 0 9.5 0 4 4 0 9 0c3.2 0 6 1.7 8 4.5C19 1.7 21.8 0 25 0c5 0 9 4 9 9.5C34 17 26 23 17 30Z"/></svg>
						<div class="bg-community-card__name"><?php echo esc_html( $name ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="bg-section" style="background: var(--white);">
		<div class="bg-section__inner">
			<h2 class="ds-h1" style="margin-bottom: 40px;">Nos partenaires</h2>
			<div class="bg-partners__grid">
				<?php foreach ( $partners as $partner ) : ?>
					<div class="bg-partner-card"><?php echo esc_html( $partner ); ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="bg-section bg-faq" style="background: var(--white);">
		<div class="bg-faq__inner">
			<h2 class="ds-h1" style="margin-bottom: 32px;">Questions fréquentes</h2>
			<div class="bg-accordion">
				<?php foreach ( $faqs as $faq ) : ?>
					<div class="bg-accordion__item">
						<button type="button" class="bg-accordion__trigger">
							<?php echo esc_html( $faq['question'] ); ?>
							<span class="bg-accordion__icon">+</span>
						</button>
						<p class="bg-accordion__panel"><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<div class="bg-newsletter">
		<h2 class="ds-h2 bg-newsletter__title">Rejoignez la communauté des Bonnets Gris</h2>
		<form class="bg-newsletter__form" data-newsletter-form>
			<input class="bg-newsletter__input" type="email" required placeholder="vous@email.com">
			<button type="submit" class="bg-btn bg-btn--primary">S'inscrire</button>
		</form>
	</div>

</main>

<?php get_footer(); ?>
