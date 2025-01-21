<?php
/*
 * http://www.ravelrumba.com/blog/css-js-concatenation-versioning-php/
 */
header('Content-type: application/javascript');

$jsfiles = array(
	// Load Modernizr at the top of the document, which enables HTML5 elements and feature detects
	dirname(__FILE__) . '/modernizr-2.8.3-min.js',
	dirname(__FILE__) . '/device-min.js',
	dirname(__FILE__) . '/font-awesome-6-bd715804f9-min.js',
	//dirname(__FILE__) . '/jquery.stellar.min.js',
	//dirname(__FILE__) . '/jquery.inview.js',
	//dirname(__FILE__) . '/jquery.cookie.js',
	//dirname(__FILE__) . '/scrollspy-min.js',
	//dirname(__FILE__) . '/wow.min.js',
	//dirname(__FILE__) . '/typewriter-effect.min.js',
	//dirname(__FILE__) . '/jquery.flexslider.js',
	//dirname(__FILE__) . '/jquery.liMarquee.js',
	dirname(__FILE__) . '/jquery.viewportchecker-min.js',
	dirname(__FILE__) . '/jquery.ba-throttle-debounce-min.js',
	dirname(__FILE__) . '/jquery.visible-min.js',
	dirname(__FILE__) . '/waypoints-min.js',
	//dirname(__FILE__) . '/owl.carousel.min.js',
	//dirname(__FILE__) . '/rellax.min.js', /* <-- cool lib - https://github.com/dixonandmoe/rellax */
	//dirname(__FILE__) . '/TweenMax.min.js',
	//dirname(__FILE__) . '/TweenLite.min.js',
	//dirname(__FILE__) . '/letters-glitch.js',
	//dirname(__FILE__) . '/_locations.js',
	dirname(__FILE__) . '/jquery.sticky-min.js',
	dirname(__FILE__) . '/jquery.actual-min.js',	
	dirname(__FILE__) . '/main-min.js',
	//dirname(__FILE__) . '/_page.js',
);

foreach ($jsfiles as $jsfile) {
	include($jsfile);
}