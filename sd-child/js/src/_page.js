jQuery(document).ready(function($) {

	/*
	 * LOAD RESIZE event bindings
	 *
	 */
    
	$(window).on('load resize', function(){
		/*
		 * Top Image BG image parallax slide
		 */
		if( $(window).width() > 991 ){
			$('.inner-page #page-top-image').stellar({
				 horizontalOffset: 0,
				 verticalOffset: -400
			});
			//$('.inner-page #maincontentcontainer').css('padding-top', $('#headercontainer #masthead').outerHeight() );
		}
		/* END Stelalr parallax */
	});
	
	var title = document.querySelector('.section-title');
	animateTitles(title);
	
	$.stellar({
		horizontalScrolling: false,
		responsive: true
	});
	
	
});