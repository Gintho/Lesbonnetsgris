( function () {
	'use strict';

	var carousels = document.querySelectorAll( '[data-carousel]' );

	carousels.forEach( function ( carousel ) {
		var track = carousel.querySelector( '[data-carousel-track]' );
		var prevBtn = carousel.querySelector( '[data-carousel-prev]' );
		var nextBtn = carousel.querySelector( '[data-carousel-next]' );

		if ( ! track ) {
			return;
		}

		function scrollByAmount( direction ) {
			var item = track.querySelector( '[data-carousel-item]' );
			var gap = parseFloat( getComputedStyle( track ).columnGap ) || 0;
			var amount = item ? item.getBoundingClientRect().width + gap : track.clientWidth * 0.8;
			track.scrollBy( { left: direction * amount, behavior: 'smooth' } );
		}

		function updateArrows() {
			if ( ! prevBtn || ! nextBtn ) {
				return;
			}
			var maxScroll = track.scrollWidth - track.clientWidth - 4;
			prevBtn.disabled = track.scrollLeft <= 4;
			nextBtn.disabled = track.scrollLeft >= maxScroll;
		}

		if ( prevBtn ) {
			prevBtn.addEventListener( 'click', function () {
				scrollByAmount( -1 );
			} );
		}
		if ( nextBtn ) {
			nextBtn.addEventListener( 'click', function () {
				scrollByAmount( 1 );
			} );
		}

		track.addEventListener( 'scroll', updateArrows, { passive: true } );
		window.addEventListener( 'resize', updateArrows );
		updateArrows();
	} );
} )();
