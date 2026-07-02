<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>

<main id="primary" class="site-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			the_title( '<h2>', '</h2>' );
			the_content();
		endwhile;
	else :
		esc_html_e( 'Aucun contenu trouvé.', 'bonnets-gris' );
	endif;
	?>
</main>

<?php get_footer(); ?>
