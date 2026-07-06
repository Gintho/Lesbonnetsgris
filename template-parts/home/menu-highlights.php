<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$entries = array(
	array(
		'tone'  => 'nude',
		'logo'  => get_theme_file_uri( 'assets/logo/mark-on-white-orange.png' ),
		'title' => __( 'Nos missions', 'bonnets-gris' ),
		'url'   => home_url( '/missions/' ),
	),
	array(
		'tone'  => 'sky',
		'logo'  => get_theme_file_uri( 'assets/logo/mark-on-white-blue.png' ),
		'title' => __( 'Actualités', 'bonnets-gris' ),
		'url'   => home_url( '/actualites/' ),
	),
	array(
		'tone'  => 'orange',
		'logo'  => get_theme_file_uri( 'assets/logo/mark-on-white-terracotta.png' ),
		'title' => __( 'Communauté', 'bonnets-gris' ),
		'url'   => '#mur',
	),
	array(
		'tone'  => 'terracotta',
		'logo'  => get_theme_file_uri( 'assets/logo/mark-on-white-duo-orange-blue.png' ),
		'title' => __( 'Événements', 'bonnets-gris' ),
		'url'   => '#evenements',
	),
);
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<div class="ds-missions-grid">
			<?php foreach ( $entries as $entry ) : ?>
				<a class="ds-menu-highlight-link" href="<?php echo esc_url( $entry['url'] ); ?>">
					<?php
					get_template_part(
						'template-parts/cards/mission-block',
						null,
						array(
							'tone'  => $entry['tone'],
							'logo'  => $entry['logo'],
							'title' => $entry['title'],
						)
					);
					?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
