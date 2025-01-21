var retina = window.devicePixelRatio;
console.log(retina);

/* Async Load Google Fonts */
/*
WebFontConfig = {
	google: { families: [ 'Lato:300,400,700,900' ] }
};
(function() {
	var wf = document.createElement('script');
	wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();
*/

/* Check whether screen is hi-dens or retina */
function isHighDensity(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
    console.log('hi-dens disp');
}

function isRetina(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx), only screen and (min-resolution: 75.6dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min--moz-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)').matches)) || (window.devicePixelRatio && window.devicePixelRatio >= 2)) && /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
    console.log('retina');
}

// WOW.js
//Helper function for add element box list in WOW
WOW.prototype.addBox = function(element) {
	this.boxes.push(element);
};

// Init WOW.js and get instance
var wow = new WOW();
wow.init();



jQuery( document ).ready( function( $ ) {

	$('#portfolio #pf-toggler-links li:first-child a, #portfolio .portfolio__image__item:first-child').toggleClass('active');

	$('#portfolio #pf-toggler-links a').on('click', function(){

		$('#portfolio .portfolio__image__item').removeClass('active');

		$('#portfolio #pf-toggler-links li a').removeClass('active');

		$(this).addClass('active');
		
		var postID = $(this).attr('id');
		
		$('#portfolio #desktop #'+ postID).toggleClass('active');
		$('#portfolio #mobile #'+ postID + '-mob').toggleClass('active');
		 
		
		return false;
	});

/* auto scroll pf image
	$( window ).on( 'load', function(){
		$( '.dragscroll' ).scrollImage();
	})
*/

	

	// Attach scrollSpy to .wow elements for detect view exit events,
	// then reset elements and add again for animation
	$('.wow').on('scrollSpy:exit', function() {
	$(this).css({
	  'visibility': 'hidden',
	  'animation-name': 'none'
	}).removeClass('animated');
		wow.addBox(this);
	}).scrollSpy();

	/* add class to div while scrolled */
    var header = $("#masthead #site-top-nav");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
		var h =  $('.header-nav-wrapper').outerHeight();
        if (scroll > h ) {
            $('#site-top-nav').addClass("fixed");
        } else {
            $('#site-top-nav').removeClass("fixed");
        }
    });

    $('#services .ccpage_linked_title a').wrapInner('<span></span>');

	$(window).on('load', function() {

		/* main slider */
		$('#testimonials #testi-wrapper').flexslider({
			selector: "ul > li",
			animation: "slide",
			animationLoop: true,
			slideshow: true,
			useCSS: true,
			directionNav: false,
			controlNav: true,
			pauseOnHover: false,
			minItems: 1,
			maxItems:1,
			itemMargin: 0,
			slideshowSpeed: 4500
		});

		/* Textual slider upon main slider */
		$('.home-slider__textual-slider-container .textwidget').flexslider({
			selector: "ul > li",
			animation: "fade",
			animationLoop: true,
			slideshow: true,
			useCSS: true,
			directionNav: false,
			controlNav: false,
			pauseOnHover: false,
			minItems: 1,
			maxItems:1,
			itemMargin: 0,
			slideshowSpeed: 4000
		});

		/* Portfolio slider */
		$('#portfolio .portfolio__image__item').flexslider({
			selector: "ul > li",
			animation: "fade",
			animationLoop: true,
			slideshow: true,
			useCSS: true,
			directionNav: true,
			controlNav: false,
			pauseOnHover: true,
			minItems: 1,
			maxItems:1,
			itemMargin: 0,
			slideshowSpeed: 4000
		});

	});

});