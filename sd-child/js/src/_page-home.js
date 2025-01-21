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
/*
class CountUp {
  constructor(triggerEl, counterEl) {
  const counter = document.querySelector(counterEl)
  const trigger = document.querySelector(triggerEl)
  let num = 0
  const decimals = counter.dataset.decimals

  const countUp = () => {
    if (num < counter.dataset.stop)
      
      // Do we want decimals?
      if (decimals) {
        num += 0.01
        counter.textContent = new Intl.NumberFormat('en-GB', { 
          minimumFractionDigits: 2,
          maximumFractionDigits: 2 
}).format(num)
   }
    else {
      // No decimals
      num++
      counter.textContent = num
    }
  }
  
  const observer = new IntersectionObserver((el) => {
    if (el[0].isIntersecting) {
      const interval = setInterval(() => {
        (num < counter.dataset.stop) ? countUp() : clearInterval(interval)
      }, counter.dataset.speed)
    }
  }, { threshold: [0] })

  observer.observe(trigger)
  }
}

// Initialize any number of counters:
new CountUp('#start1', '#counter1')
new CountUp('#start2', '#counter2')
new CountUp('#start3', '#counter3')
*/

//window.addEventListener('load', function(){
/*
var videos = document.getElementsByTagName("video");

function checkScroll() {
    var fraction = 0.1; // Play when 10% of the player is visible.

    for(var i = 0; i < videos.length; i++) {

        var video = videos[i];

        var x = video.offsetLeft, y = video.offsetTop, w = video.offsetWidth, h = video.offsetHeight, r = x + w, //right
            b = y + h, //bottom
            visibleX, visibleY, visible;

            visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
            visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));

            visible = visibleX * visibleY / (w * h);

            if (visible < fraction) {
                video.play();
            } else {
                video.pause();
            }

    }

}

window.addEventListener('scroll', checkScroll, false);
window.addEventListener('resize', checkScroll, false);
*/
jQuery(function ($) {
/*
	$('#about .kt-accordion-inner-wrap .wp-block-kadence-pane').addClass('wow fadeIn');
	$('#services .widget-title').addClass('wow fadeIn');


	$('#about .kt-accordion-inner-wrap .wp-block-kadence-pane').each(function(i){
		$(this).attr("data-wow-delay", i * 0.35 + 's');
	});
*/
    // Check if there are more than 6 items
    const limit = 6; // Set the number of items to show initially

    $('.col-content').each(function () {
        const $thisColContent = $(this); // Target the current .col-content
        const $columns = $thisColContent.find('> div > div.wp-block-kadence-column'); // Find columns in the current .col-content

        // Only apply logic if there are more than 6 items
        if ($columns.length > limit) {
            // Hide all items after the 6th
            $columns.slice(limit).hide();

            // Add the "Show More" button after the last initially visible element
            $columns.eq(limit).after('<p class="buttonme"><a class="show-more-less">Show More</a></p>');

            // Add click event to the button
            $thisColContent.find('.show-more-less').on('click', function () {
                const $button = $(this);

                if ($button.text() === 'Show More') {
                    // Show all elements and change button text to "Show Less"
                    $columns.slice(limit).slideDown();
                    $button.text('Show Less');
                } else {
                    // Hide elements after the 6th and change button text to "Show More"
                    $columns.slice(limit).slideUp();
                    $button.text('Show More');
                }
            });
        }
    });

/*
	$('#our-proccess ul li').addClass('wow fadeInUp').each(function(i){
		i = i + 0.1;
		$(this).attr("data-wow-delay", i * 0.3 + 's');
	});
*/
//SLIDER 360
/*
	    var your_variable = $('.slider360').ThreeSixty({
	        totalFrames: 6, // total Integer of images
	        endFrame: 30, // the end frame of auto spin animation, making the next image the one that starts
	        currentFrame: 1, // the start frame of autospin
	        imgList: '.threesixty_images', // selector for image list
	        progress: '.spinner', // selector to show the loading progress
	        imagePath:'/wp-content/themes/sd-child/images/slider3600-images/', // path to images
	        filePrefix: '', // file prefix if any
	        ext: '.jpg', // image extension
	        height: 714,
	        width: 1071,
	        disableSpin: false, // to disable auto spin animation
	        zeroPadding: false, // if your image files are zero padded
	        navigation: true, // default navigation bar
	        position: 'bottom-center' // positioning for your navigation
	    });

        $(".custom-play").on("click", function() {
            t.play()
        });
        $(".custom-stop").on("click", function() {
            t.stop()
        });
        $(".custom-next").on("click", function() {
            t.next()
        });
        $(".custom-back").on("click", function() {
            t.previous()
        });
        $(".custom-fullscreen").on("click", function() {
           // t.fullscreen()
        });
*/
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
		/*
		$('.counterup').counterUp({
			delay: 10,
			time: 1000
		});
		*/



/*
		mainSlider = $('#homeslider ul.swifty_imgwidget_ul').addClass('owl-carousel');

		mainSlider.owlCarousel({
			loop:true,
			slideBy: 1,
			items:1,
			autoplay: false,
			loorp: true,
			margin: 0,
			autoplaySpeed: 300,
			slideSpeed: 3500,
			autoplayHoverPause: true,
			dots: false,
			nav: true,
			lazyLoad:true,
			responsiveClass:true,
			navText : ['<span><img src=""></span>','<span><img src=""></span>'],
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
				1100:{
					items:1,
				},
				1200:{
					items:1,
				},
				1980:{
					items:1,
				},
				5500:{
					items:1,
				}

			}
		});


		    $('.owl-prev').find('img').attr('src', $(".owl-item.active").prev().find("li").attr('data-navipicture') );
		    $('.owl-next').find('img').attr('src', $(".owl-item.active").next().find("li").attr('data-navipicture') );

		    

		  mainSlider.on('changed.owl.carousel', function(property) {
		    var current = property.item.index;
		    console.log(current);
		    var prev = $(property.target).find(".owl-item").eq(current).prev().find("li").attr('data-navipicture');
		    var next = $(property.target).find(".owl-item").eq(current).next().find("li").attr('data-navipicture');

		    $('.owl-prev').find('img').attr('src', prev);
		    $('.owl-next').find('img').attr('src', next);
		  });
*/
		  /*
			$('.owl-next').on('click', function() {
			  mainSlider.trigger('next.owl.carousel', [300]);
			  return false;
			});

			$('.owl-prev').on('click', function() {
			  mainSlider.trigger('prev.owl.carousel', [300]);
			  return false;
			});	
			*/
/*
		$('#testi ul.testi').addClass('owl-carousel').owlCarousel({
			loop:true,
			slideBy: 1,
			items:3,
			//animateOut: 'slideOutDown',
    		//animateIn: 'flipInX',
			autoplay: true,
			loop: true,
    mouseDrag: false,
    touchDrag: false,
			margin: 25,
			autoplaySpeed: 300,
			slideSpeed: 3500,
			autoplayHoverPause: true,
			dots: true,
			nav: false,
			lazyLoad:true,
			responsiveClass:true,
			navText : ["<span></span>","<span></span>"],
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:2,
				},
				1100:{
					items:2,
				},
				1200:{
					items:3,
				}
			}
		});
*/
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
		var owl = $('#services #ccchildpages-1');
		owl.addClass('owl-carousel').owlCarousel({
			loop:true,
			slideBy: 1,
			items: 2.5,
			//center: true,
			margin: 20,
			//stagePadding: 50,
			//animateOut: 'slideOutUp',
    		//animateIn: 'slideInUp',
			autoplay: true,
			mouseDrag: true,
			touchDrag: true,
			loop: true,
			autoplaySpeed: 300,
			slideSpeed: 3500,
			autoplayHoverPause: true,
			dots: false,
			nav: true,
			lazyLoad:true,
			responsiveClass:true,
			navText : ["<span></span>","<span></span>"],
			responsive:{
				0:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:2,
				},
				1100:{
					items:2,
				},
				1200:{
					items:2.5,
				}
			}
		});

		/*
		owl.on('mousewheel', '.owl-stage', function (e) {
		    if (e.deltaY>0) {
		        owl.trigger('next.owl');
		    } else {
		        owl.trigger('prev.owl');
		    }
		    e.preventDefault();
		});
		*/

/** SYNC 2 sliders*/
/*

		var slider1FirstSlideIndex; // to determine clone
		var prevIndex = 0; // to determine the direction

		var owl1 = $('#land__slider-reviews #carousel');
		owl1.addClass('owl-carousel').owlCarousel({
			loop:true,
			slideBy: 1,
			items:1,
			//animateOut: 'slideOutUp',
    		//animateIn: 'slideInUp',
			autoplay: true,
			mouseDrag: true,
			touchDrag: true,
			loop: true,
			margin: 0,
			autoplaySpeed: 300,
			slideSpeed: 3000,
			autoplayHoverPause: true,
			dots: true,
			nav: true,
			lazyLoad:true,
			responsiveClass:true,
			onInitialized: function(event) {
				slider1FirstSlideIndex = event.item.index; // to determine clone
			},
			onTranslate: function(event) {
				sliderSync(event);
			},
			navText : ["<span><i class='fa fa-angle-left'></i></span>","<span><i class='fa fa-angle-right'></i></span>"],
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
				1100:{
					items:1,
				},
				1200:{
					items:1,
				}
			}
		});

		function sliderSync(event) {
			var index = event.item.index;
			var loop = event.relatedTarget.options.loop;
			var slider2CloneCount = owl2.find('.owl-item.cloned').length / 2;

			if(loop) {
				if(index < slider1FirstSlideIndex) { // if active slide is clone
					owl2.trigger('prev.owl.carousel');
				} else {
					if(event.item.count === 2 && event.item.index === 2 && prevIndex === 3) { // if two slides and trigger = next
						owl2.trigger('next.owl.carousel');
					} else {
						owl2.trigger('to.owl.carousel', index - slider2CloneCount);
					}
				}

				prevIndex = event.item.index; // to determine the direction

			} else {
				owl2.trigger('to.owl.carousel', index);
			}
		}

		var owl2 = $('#land__slider-reviews #carousel2');
		owl2.addClass('owl-carousel').owlCarousel({
			loop:true,
			slideBy: 1,
			items:1,
			//animateOut: 'slideOutUp',
    		//animateIn: 'slideInUp',
			autoplay: false,
			mouseDrag: false,
			touchDrag: false,
			pullDrag: false,
			loop: true,
			margin: 0,
			autoplaySpeed: 300,
			slideSpeed: 3000,
			autoplayHoverPause: false,
			dots: true,
			nav: false,
			lazyLoad:true,
			responsiveClass:true,
			navText : ["<span><i class='fa fa-angle-left'></i></span>","<span><i class='fa fa-angle-right'></i></span>"],
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
				1100:{
					items:1,
				},
				1200:{
					items:1,
				}
			}
		});
*/

});
	
