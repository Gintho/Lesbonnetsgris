<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<main id="primary" class="site-main front-page">

	<section class="hero" id="accueil">
		<?php bonnets_gris_mosaic_background(); ?>
		<?php bonnets_gris_silhouette(); ?>

		<nav class="hero__nav">
			<p class="hero__logo"><?php bloginfo( 'name' ); ?></p>
			<div class="hero__nav-links">
				<a href="#qui-sommes-nous">Qui sommes-nous</a>
				<a href="#maladie">La maladie</a>
				<a href="#evenements">Événements</a>
			</div>
		</nav>

		<a href="#don" class="hero__donate-tab">Faire un don</a>

		<div class="hero__content">
			<p class="hero__eyebrow">11 personnes meurent chaque jour d&rsquo;une tumeur cérébrale en France</p>
			<h1 class="hero__title">Ce soir, rejoins ceux qui refusent que ça continue.</h1>
		</div>

		<a href="#mission" class="hero__scroll-cue">Découvrir ↓</a>
	</section>

	<section class="ticker" aria-hidden="true">
		<div class="ticker__row">
			<?php for ( $i = 0; $i < 6; $i++ ) : ?>
				<p>ENSEMBLE CONTRE LES TUMEURS CÉRÉBRALES&nbsp;&nbsp;✦</p>
			<?php endfor; ?>
		</div>
	</section>

	<section class="mission" id="mission">
		<div class="mission__photo">
			<p class="photo-label">PHOTO — portrait équipe</p>
		</div>
		<div class="mission__text">
			<h2>Notre mission</h2>
			<p>Les Bonnets Gris financent la recherche contre les tumeurs cérébrales à l&rsquo;Institut du Cerveau — 100% des dons reversés. Nous ne communiquons pas par la culpabilité&nbsp;: nous transformons l&rsquo;énergie collective, les défis sportifs et la générosité en espoir actif.</p>
			<div class="mission__actions">
				<a href="#don" class="button button--primary">Faire un don</a>
				<a href="#membre" class="button button--secondary">Devenir membre</a>
			</div>
		</div>
	</section>

	<div class="section-divider">
		<?php bonnets_gris_heart_icon( 27, '#ac4729' ); ?>
	</div>

	<section class="impact">
		<div class="impact__tab-photo">
			<div class="impact__sidebar-tab">
				<p class="impact__sidebar-label">Notre impact</p>
				<a href="#rapport" class="button button--tab">Voir le rapport →</a>
			</div>
			<div class="impact__photo">
				<p class="photo-label">PHOTO — événement, mouvement collectif</p>
			</div>
		</div>
		<div class="impact__stats">
			<h2>Rendre visible l&rsquo;invisible</h2>
			<div class="impact-counter">
				<div class="impact-counter__item">
					<p class="impact-counter__value">128 450 €</p>
					<p class="impact-counter__label">Collectés depuis le lancement</p>
				</div>
				<div class="impact-counter__item">
					<p class="impact-counter__value">1 284</p>
					<p class="impact-counter__label">Membres actifs</p>
				</div>
				<div class="impact-counter__item">
					<p class="impact-counter__value">12</p>
					<p class="impact-counter__label">Chercheurs financés</p>
				</div>
			</div>
		</div>
	</section>

	<section class="testimonial">
		<div class="testimonial__quote">
			<p class="testimonial__mark">&ldquo;</p>
			<p class="testimonial__text">Depuis que j&rsquo;ai rejoint les Bonnets Gris, je ne me sens plus seule face à la maladie de mon fils.</p>
			<p class="testimonial__author">Sophie M. — Maman adhérente depuis 2024</p>
			<div class="testimonial__badge">
				<span class="testimonial__badge-tag">ICM</span>
				<span>100% des dons reversés à l&rsquo;Institut du Cerveau</span>
			</div>
		</div>
		<div class="testimonial__photo">
			<p class="photo-label">PHOTO — Sophie M. (consentement à tracer avant publication)</p>
		</div>
	</section>

	<div class="section-divider section-divider--alt">
		<?php bonnets_gris_heart_icon( 27, '#ac4729' ); ?>
	</div>

	<section class="engagement" id="engagement">
		<h2>Trois façons d&rsquo;agir, maintenant</h2>
		<div class="engagement__cards">
			<article class="engagement-card">
				<span class="engagement-card__icon">♥</span>
				<h3>Faire un don</h3>
				<p>3 clics, ponctuel ou mensuel. 100% reversé à l&rsquo;ICM.</p>
				<a href="#don">Donner →</a>
			</article>
			<article class="engagement-card">
				<span class="engagement-card__icon">⬡</span>
				<h3>Devenir membre</h3>
				<p>Rejoins l&rsquo;identité « Bonnet Gris » et le mouvement.</p>
				<a href="#membre">Adhérer →</a>
			</article>
			<article class="engagement-card">
				<span class="engagement-card__icon">⚑</span>
				<h3>Créer une cagnotte</h3>
				<p>Transforme ton défi sportif en recherche financée.</p>
				<a href="#cagnotte">Créer →</a>
			</article>
		</div>
	</section>

</main>

<?php get_footer(); ?>
