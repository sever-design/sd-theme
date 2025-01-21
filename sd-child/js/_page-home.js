/*

var controller = new ScrollMagic.Controller();

jQuery(function ($) { // wait for document ready
	var tween = TweenMax.to(".rotator", 1, {rotation: 360, ease: Linear.easeNone});
	// build scene
	var scene = new ScrollMagic.Scene({triggerElement: "#home-group", duration: "100%", triggerHook: 0.2})
					.setPin(".rotator")
					.setTween(tween)
					//.addIndicators({name: "1 (duration: 100%)"}) // add indicators (requires plugin)
					.addTo(controller);
});

*/


var resolvedPromise = typeof Promise == 'undefined' ? null : Promise.resolve();
var nextTick = resolvedPromise ? function(fn) { resolvedPromise.then(fn); } : function(fn) { setTimeout(fn); };



jQuery(function ($) {
	/*
	var animateBackground = function(){
		$('#reviews .reviews-scroll-bg-wrapper')
			//.css("background-position","0px 0px")
			.animate({ 
				'background-position-x': "+=100px",
			},
			10000,
			'linear',
			function(){
				animateBackground(); // recursive call back
			}
		)};

	$(function(){
		animateBackground(); // initial call that starts everything off
	});
	*/
	nextTick(function() {

		$('#testimonials ul').addClass('owl-carousel').owlCarousel({
			loop:true,
			slideBy: 1,
			items:1,
			autoplay: true,
			autoplaySpeed: 300,
			slideSpeed: 3500,
			autoplayHoverPause: true,
			dots: true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:1,
				},
				1000:{
					items:1,
				}
			}
		});
	});
});