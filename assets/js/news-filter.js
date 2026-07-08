( function () {
	'use strict';

	var bars = document.querySelectorAll( '.ds-mosaic-filters' );

	bars.forEach( function ( bar ) {
		var mosaic = bar.nextElementSibling;
		if ( ! mosaic || ! mosaic.classList.contains( 'ds-mosaic' ) ) {
			return;
		}

		var buttons = bar.querySelectorAll( '.ds-mosaic-filter' );
		var tiles = mosaic.querySelectorAll( '.ds-mosaic-tile' );

		buttons.forEach( function ( button ) {
			button.addEventListener( 'click', function () {
				var filter = button.getAttribute( 'data-filter' );

				buttons.forEach( function ( otherButton ) {
					var isActive = otherButton === button;
					otherButton.classList.toggle( 'is-active', isActive );
					otherButton.setAttribute( 'aria-pressed', isActive ? 'true' : 'false' );
				} );

				tiles.forEach( function ( tile ) {
					var matches = 'all' === filter || tile.getAttribute( 'data-category' ) === filter;
					tile.classList.toggle( 'is-hidden', ! matches );
				} );
			} );
		} );
	} );
} )();
