<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$eyebrow = $args['eyebrow'] ?? '';
$name    = $args['name'] ?? '';
$role    = $args['role'] ?? '';
$bio     = $args['bio'] ?? '';
$quote   = $args['quote'] ?? '';
$photo   = $args['photo'] ?? '';
$tone    = $args['tone'] ?? 'nude';

$initials = '';
foreach ( preg_split( '/\s+/', trim( $name ) ) as $word ) {
	$initials .= mb_substr( $word, 0, 1 );
}
$initials = mb_strtoupper( mb_substr( $initials, 0, 2 ) );
?>
<div class="ds-founder-spotlight">
	<div class="ds-founder-spotlight__visual ds-founder-spotlight__visual--<?php echo esc_attr( $tone ); ?><?php echo $photo ? '' : ' is-placeholder'; ?>">
		<?php if ( $photo ) : ?>
			<img src="<?php echo esc_url( $photo ); ?>" alt="" />
		<?php else : ?>
			<span class="ds-founder-spotlight__initials"><?php echo esc_html( $initials ); ?></span>
		<?php endif; ?>
	</div>
	<div class="ds-founder-spotlight__content">
		<?php if ( $eyebrow ) : ?>
			<span class="ds-badge ds-badge--neutral"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>
		<h2 class="ds-h1"><?php echo esc_html( $name ); ?></h2>
		<?php if ( $role ) : ?>
			<p class="ds-founder-spotlight__role"><?php echo esc_html( $role ); ?></p>
		<?php endif; ?>
		<?php if ( $bio ) : ?>
			<p class="ds-founder-spotlight__bio"><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>
		<?php if ( $quote ) : ?>
			<blockquote class="ds-founder-spotlight__quote">
				<p>&laquo;&nbsp;<?php echo esc_html( $quote ); ?>&nbsp;&raquo;</p>
			</blockquote>
		<?php endif; ?>
	</div>
</div>
