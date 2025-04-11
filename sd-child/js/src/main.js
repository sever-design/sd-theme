/*
 * Google Font Load
 */
WebFontConfig = {
	google: {
		families: [
			'Inter:300,400,500',
			'Lexend:300,400,500&display=swap'
		]
	},
	active: () => {
		sessionStorage.fontsLoaded = true
	}
};

(function() {
	var wf = document.createElement('script');
	wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
	wf.type = 'text/javascript';
	wf.async = 'true';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(wf, s);
})();


function progressBarScroll() {
	let winScroll = document.body.scrollTop || document.documentElement.scrollTop,
			height = document.documentElement.scrollHeight - document.documentElement.clientHeight,
			scrolled = (winScroll / height) * 100;
	document.getElementById("progressBar").style.width = scrolled + "%";
}
/*
window.onscroll = function () {
	progressBarScroll();
};
*/

window.onscroll = function(event) {

	//progressBarScroll();


	jQuery(function ($) {
		$(window).scroll(function() {

			//$("#homevideo video").css("opacity", 1 - $(window).scrollTop() / 500);

			//https://codepen.io/zero_point/pen/YwjgEp
			//var colorPic = Math.round((1-$(window).scrollTop()/500)*255);
        	//$('#masthead .site_contact_phone a').css("color","rgb("+colorPic+","+colorPic+","+colorPic+")");
		});
	});
};


jQuery(function ($) {


	// Initialize Autocomplete for multiple fields
	const inputIds = ["delivery-addr", "shipping-address_1"]; // Add the IDs of the fields you want to apply Autocomplete to

	inputIds.forEach(function(inputId) {
	    const input = document.getElementById(inputId);
	    if (input) {
	        new google.maps.places.Autocomplete(input);
	    }
	});

	/*
	 * Add phone mask to the field type-in phones
	 */

    //var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-##############"}];
	/*
    var phones = [{ "mask": "(###) ###-####"}];
    $('input[type*="tel"]').inputmask({ 
        mask: phones,
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}}
    });
    */

		// Today Date
		/*
		 * https://www.w3schools.com/Jsref/jsref_tolocalestring.asp
		 */
		 /*
		var d = new Date();
			locale = "en-us",
			month = d.toLocaleString(locale, { month: "short" });
			console.log(month);
			var strDate = month + "," + d.getDate() + '/' + d.getFullYear();
				
		$('.today span').text(strDate);
		*/

		/* just to hide visual loading ugly effects with logo */
		//$("#masthead, #footercontainer").show();

			/***********************************/
			/* STICKY HEDAER */
			 /*  jQuery Plugin /js/src/jquery.sticky.js */
			/**********************************/

		$(".h-h.sticky:not(.overlapped) #masthead").sticky({topSpacing:0});	



		/*
		 * LOAD RESIZE event bindings
		 *
		 */
			


			/*
			 * Set height for header .h-h to avoid jump when menu is sticked
			 * toggle screen width same as for mob menu
			 */
			//if( $(window).width() > 1120 ){ 
		/*
				$('.h-h:not(.overlapped').css('height',
					$('.h-h > div').outerHeight() 
				);
				*/
			//}
			/*
			Fix bug with page reload in the middle-scrolled - to show scrolled class
			*/
			var el = $("body");
			var scrollTopPos = document.documentElement.scrollTop;


			if (scrollTopPos === 0) {
				$(el).removeClass("scrolled");
			} else {
				$(el).addClass("scrolled");
			}

			
			/*
			 * Assign Class to header while scrolled
			 */
				var el = $("body");
				var h = 0;
				$(window).scroll(function(event) {
					var scroll = $(window).scrollTop();
					if (scroll > h ) {
						$(el).addClass("scrolled");
					} else {
						$(el).removeClass("scrolled");
					}
				});



		/*
		 * SCROLL RESIZE event bindings
		 *
		 */

		//$(window).on('scroll', function(){



  const sections = document.querySelectorAll('section');
  
  const observerOptions = {
    threshold: 0.3 // Trigger when 10% of the section is visible
  };

  const observer = new IntersectionObserver(function(entries, observer) {
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('inview'); // Add 'inview' when in viewport
      } else {
        entry.target.classList.remove('inview'); // Optionally remove if no longer in viewport
      }
    });
  }, observerOptions);

  sections.forEach(function(section) {
    observer.observe(section);
  });


			/*
					if ($('section').visible()) {
							// The element is visible, do something
						
						//window.setTimeout(function(){
							$(this).addClass('inview');
						//}, 600)
					} else {
							// The element is NOT visible, do something else
					}
			*/

		//});


		/*
		 * Create movable Tooltips - only text
		 * add to all elems .tooltip or directly assigned
		 */
		/*
		$('.tooltip, .nav-menu > li > a').hover(
			function(){
				var attr = $(this).attr('title');
				if (typeof attr !== typeof undefined && attr !== false) {
					// Hover over code
					var title = $(this).attr('title');
					$(this).data('tipText', title).removeAttr('title');
					$('<p class="tooltip"></p>').text(title).appendTo('body').fadeIn('slow');
				}
			},
			function() {
				// Hover out code
				$(this).attr('title', $(this).data('tipText'));
				$('p.tooltip').remove();
			})
			.mousemove(function(e) {
				var mousex = e.pageX; //Get X coordinates
				var mousey = e.pageY + 15; //Get Y coordinates
				$('p.tooltip').css({ top: mousey, left: mousex });
			});
	*/
		/* END Tooltips */



		$('a[href^="#contact"]').on('click', function(){
			
			$('html,body').animate({
				scrollTop: $('#contact-block').offset().top - $('#masthead').outerHeight()
			}, 400);
			/*
			setTimeout(function(){
				$('.cta aside a[href^="#"]').trigger('click');
			}, 800);
			*/
			return false;
			

		});

// Play video on manual click
$('.yt-video-wrapper .play').on('click', function(){
    var $iframe = $(this).next("iframe");
    var oldSrc = $iframe.data("src");
    var newSrc = oldSrc.replace("autoplay=0", "autoplay=1");
    $iframe.attr('src', newSrc);
    $(this).toggleClass('hidden');
    return false;
});

// Automatically trigger autoplay if the .yt-video-wrapper has the class .auto-play-1
$('.yt-video-wrapper.auto-play-1').each(function(){
    var $iframe = $(this).find('iframe');
    var oldSrc = $iframe.data("src");
    var newSrc = oldSrc.replace("autoplay=0", "autoplay=1") + "&mute=1";

    // Set the new source to start autoplay with mute
    $iframe.attr('src', newSrc);

    // Hide the play button (since autoplay is triggered)
    $(this).find('.play').addClass('hidden');
});

    function scrollToAnchor(targetID) {
        var $target = $('#' + targetID); // Select the target element by ID
        if ($target.length) {
            $('html, body').animate({
                scrollTop: $target.offset().top - 150
            }, 800); // Smooth scroll
        }
    }

    // Handle clicks on menu links
    $('.sub-menu li a[href*="#"]').on('click', function (event) {
        event.preventDefault();
        
        var targetHref = $(this).attr('href'); // Get href value
        var urlParts = targetHref.split('#');  // Split into [page, anchor]
        var pagePath = urlParts[0]; // Page part
        var anchorID = urlParts[1]; // Anchor part

        // If user is on Gallery Page (page-id-8), close mobile menu
        if ($('body').hasClass('page-id-8')) {
            $('body').removeClass('mob-menu-opened');
            $('#site-navigation').removeClass('menu-opened');
            $('#mobile-menu-toggler').removeClass('toggled-on');

            // Scroll to anchor without reloading the page
            scrollToAnchor(anchorID);
        } else {
            // Navigate to the new page and store the anchor
            sessionStorage.setItem('scrollToAnchor', anchorID);
            window.location.href = targetHref;
        }
    });

    // Wait for the full page to load before checking anchor
    $(window).on('load', function () {
        var storedAnchor = sessionStorage.getItem('scrollToAnchor');
        if (storedAnchor) {
            sessionStorage.removeItem('scrollToAnchor'); // Clear storage after use

            setTimeout(function () {
                scrollToAnchor(storedAnchor);
            }, 500); // Short delay to ensure everything is rendered
        }
    });
		
		$('#mobile-menu-toggler').on('click', function(){
			$('body').toggleClass('mob-menu-opened');
			$('#site-navigation').toggleClass('menu-opened');
			$(this).toggleClass('toggled-on');
			
		});
		
		$('.menu-close-toggler').on('click', function(){
			$('body').removeClass('mob-menu-opened');
			$('#site-navigation').removeClass('menu-opened');
			$('#mobile-menu-toggler').removeClass('toggled-on');
			
		});

		$('.sub-menu-toggler').on('click', function(){
			$(this).toggleClass('toggled-on');
			$(this).next('.sub-menu').toggleClass('opened');
		});


		$('#contact-block a.buttonme').on('click', function(){
			$(this).parents('form').find('.wpcf7-submit').trigger('click');
			return false;
		});
});
