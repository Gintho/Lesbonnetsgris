export function getInitials( name ) {
	return name
		.trim()
		.split( /\s+/ )
		.filter( Boolean )
		.map( ( word ) => word.charAt( 0 ) )
		.join( '' )
		.toUpperCase()
		.slice( 0, 2 );
}
