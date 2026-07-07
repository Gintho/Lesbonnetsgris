<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = $args['eyebrow'] ?? '';
$title   = $args['title'] ?? '';
$people  = $args['people'] ?? array();
$tones   = array( 'nude', 'sky', 'orange', 'terracotta' );
?>
<section class="ds-section ds-section--white">
	<div class="ds-section__inner">
		<div class="ds-section__header ds-photo-mosaic__header">
			<div>
				<?php if ( $eyebrow ) : ?>
					<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
				<?php endif; ?>
				<h2 class="ds-h1 ds-mission__title"><?php echo esc_html( $title ); ?></h2>
			</div>
		</div>
	</div>
	<div class="ds-photo-mosaic">
		<?php
		foreach ( $people as $index => $name ) :
			$tone  = $tones[ $index % count( $tones ) ];
			$large = ( 0 === $index % 5 );
			?>
			<div class="ds-photo-mosaic__tile<?php echo $large ? ' ds-photo-mosaic__tile--large' : ''; ?>">
				<?php
				get_template_part(
					'template-parts/cards/team-card',
					null,
					array(
						'name' => $name,
						'tone' => $tone,
					)
				);
				?>
			</div>
			<?php
		endforeach;
		?>
	</div>
</section>
