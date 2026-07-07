<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$name  = $args['name'] ?? '';
$role  = $args['role'] ?? '';
$tone  = $args['tone'] ?? 'nude';
$photo = $args['photo'] ?? '';

$initials = '';
foreach ( preg_split( '/\s+/', trim( $name ) ) as $word ) {
	$initials .= mb_substr( $word, 0, 1 );
}
$initials = mb_strtoupper( mb_substr( $initials, 0, 2 ) );
?>
<div class="ds-team-card">
	<div class="ds-team-card__photo ds-team-card__photo--<?php echo esc_attr( $tone ); ?><?php echo $photo ? '' : ' is-placeholder'; ?>">
		<?php if ( $photo ) : ?>
			<img src="<?php echo esc_url( $photo ); ?>" alt="" />
		<?php else : ?>
			<span class="ds-team-card__initials"><?php echo esc_html( $initials ); ?></span>
		<?php endif; ?>
	</div>
	<div class="ds-team-card__name"><?php echo esc_html( $name ); ?></div>
	<?php if ( $role ) : ?>
		<div class="ds-team-card__role"><?php echo esc_html( $role ); ?></div>
	<?php endif; ?>
</div>
