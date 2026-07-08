<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$quote = $args['quote'] ?? '';
$name  = $args['name'] ?? '';
$role  = $args['role'] ?? '';
$tone  = $args['tone'] ?? 'nude';
?>
<div class="ds-testimonial-card ds-testimonial-card--<?php echo esc_attr( $tone ); ?>">
	<?php get_template_part( 'template-parts/icons/quote-mark' ); ?>
	<p class="ds-h3 ds-testimonial-card__quote"><?php echo esc_html( $quote ); ?></p>
	<div>
		<div class="ds-testimonial-card__name"><?php echo esc_html( $name ); ?></div>
		<div class="ds-testimonial-card__role"><?php echo esc_html( $role ); ?></div>
	</div>
</div>
