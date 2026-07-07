( function () {
	'use strict';

	var track = document.querySelector( '.ds-manifesto-track' );
	if ( ! track ) {
		return;
	}

	if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var targets = Array.prototype.slice.call( track.querySelectorAll( '[data-word-index]' ) );
	if ( ! targets.length ) {
		return;
	}

	var total = targets.length;
	var band = 1 / total;
	var dimOpacity = 0.25;
	var ticking = false;

	function update() {
		ticking = false;

		var rect = track.getBoundingClientRect();
		var scrollable = rect.height - window.innerHeight;
		var progress = scrollable > 0 ? -rect.top / scrollable : 0;
		progress = Math.max( 0, Math.min( 1, progress ) );

		targets.forEach( function ( el, index ) {
			var threshold = index / total;
			var wordProgress = ( progress - threshold ) / band;
			wordProgress = Math.max( 0, Math.min( 1, wordProgress ) );
			var opacity = dimOpacity + ( 1 - dimOpacity ) * wordProgress;
			el.style.opacity = opacity.toFixed( 2 );
		} );
	}

	function requestTick() {
		if ( ! ticking ) {
			window.requestAnimationFrame( update );
			ticking = true;
		}
	}

	window.addEventListener( 'scroll', requestTick, { passive: true } );
	window.addEventListener( 'resize', requestTick );
	update();
} )();
