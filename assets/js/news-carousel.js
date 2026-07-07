( function () {
	'use strict';

	var carousels = document.querySelectorAll( '.ds-news-carousel' );

	carousels.forEach( function ( carousel ) {
		var track = carousel.querySelector( '.ds-news-carousel__track' );
		var prevBtn = carousel.querySelector( '.ds-news-carousel__arrow--prev' );
		var nextBtn = carousel.querySelector( '.ds-news-carousel__arrow--next' );

		if ( ! track ) {
			return;
		}

		function scrollByAmount( direction ) {
			var item = track.querySelector( '.ds-news-carousel__item' );
			var gap = 20;
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
