( function () {
	'use strict';

	if ( window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ) {
		return;
	}

	var elements = Array.prototype.slice.call( document.querySelectorAll( '[data-parallax-speed]' ) );
	if ( ! elements.length ) {
		return;
	}

	var ticking = false;

	function update() {
		ticking = false;
		var viewportHeight = window.innerHeight;

		elements.forEach( function ( el ) {
			var speed = parseFloat( el.getAttribute( 'data-parallax-speed' ) ) || 0;
			var rect = el.getBoundingClientRect();
			var center = rect.top + rect.height / 2;
			var offset = ( viewportHeight / 2 - center ) * speed;
			el.style.transform = 'translate3d(0, ' + offset.toFixed( 1 ) + 'px, 0)';
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
