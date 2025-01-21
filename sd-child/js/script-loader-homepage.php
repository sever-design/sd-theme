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
	dirname(__FILE__) . '/jquery.phonemask-min.js',
	//dirname(__FILE__) . '/jquery.stellar-min.js',
	//dirname(__FILE__) . '/jquery.inview-min.js',
	//dirname(__FILE__) . '/jquery.cookie-min.js',
	//dirname(__FILE__) . '/scrollspy-min.js',
	//dirname(__FILE__) . '/wow-min.js',
	//dirname(__FILE__) . '/typewriter-effect-min.js',
	//dirname(__FILE__) . '/jquery.flexslider-min.js',
	//dirname(__FILE__) . '/jquery.liMarquee-min.js',
	//dirname(__FILE__) . '/smoothscroll-min.js',
	dirname(__FILE__) . '/aos-min.js',
	//dirname(__FILE__) . '/jquery.viewportchecker-min.js',
	//dirname(__FILE__) . '/jquery.ba-throttle-debounce-min.js',
	//dirname(__FILE__) . '/jquery.visible-min.js',
	//dirname(__FILE__) . '/waypoints-min.js',
	//dirname(__FILE__) . '/jquery.counterup-min.js',	
	//dirname(__FILE__) . '/owl.carousel-min.js',
	//dirname(__FILE__) . '/rellax-min.js', /* <-- cool lib - https://github.com/dixonandmoe/rellax */
	//dirname(__FILE__) . '/scrollmagic-min.js',
	//dirname(__FILE__) . '/morphsvgplugin-min.js',
	//dirname(__FILE__) . '/tweenmax-min.js',
	//dirname(__FILE__) . '/tweenlite-min.js',
	//dirname(__FILE__) . '/timelinelite-min.js',
	//dirname(__FILE__) . '/letters-glitch-min.js',
	//dirname(__FILE__) . '/debug.addIndicators-min.js',
	//dirname(__FILE__) . '/animation.gsap-min.js',	
	//dirname(__FILE__) . '/jquery.mousewheel-min.js',
	dirname(__FILE__) . '/_page-home-min.js',
	//dirname(__FILE__) . '/jquery.actual-min.js',
	dirname(__FILE__) . '/jquery.sticky-min.js',
	dirname(__FILE__) . '/main-min.js',
	
	//dirname(__FILE__) . '/dev/_cumulative-layout-shift.js',
);

// Check if running on localhost or 127.0.0.1
if ($_SERVER['SERVER_ADDR'] === '127.0.0.1' || $_SERVER['SERVER_NAME'] === 'localhost') {
    $jsfiles[] = dirname(__FILE__) . '/dev/_countdom.js';
}

foreach ($jsfiles as $jsfile) {
	include($jsfile);
}

