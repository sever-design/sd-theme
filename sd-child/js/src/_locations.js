jQuery(document).ready(function($) {
   /*
     * World Pin Locations
     */
	/* Move Stars */
	$('#locations').mousemove(function(e){
		var amountMovedX = (e.pageX * -1 / 500);
		var amountMovedY = (e.pageY * -1 / 500);
		$(this).find('.bg').css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');
	});
	

	/* light move of the world */
	var $moveable = $('.moveable');
	$(document).mousemove(function(e){
		var amountMovedX = (e.pageX * + 1 / 300);
		var amountMovedY = (e.pageY * + 1 / 300);
		$moveable.css('transform', 'translate(' + amountMovedX + 'px, ' + amountMovedY + 'px', '0)');
	});
	
	/* location tabs actions */
	$('#location .__location-name').on('click', function(){
		var selectedLocation = $(this).data("locationid");
		$('#location .__location-name').removeClass('active');
		$(this).addClass('active');
		$('.map-world-inner').find(".__map-world-slide").removeClass('active')
		.animate({
			opacity: 0
		}, 300, function(){
			$(this).css('z-index', 0)
		});
		
		$('.map-world-inner').find(".__map-world-slide[data-locationid='" + selectedLocation + "']").addClass('active')
		.animate({
			opacity: 1
		}, 300, function(){
			$(this).css('z-index', 2)
		});
	});
	
	//$('#location .__location-name:first-child').trigger( "click" );
	
	/* emulate click on night tab after 12 hrs */
	/* https://stackoverflow.com/questions/28835495/jquery-show-hide-div-depending-on-day-and-time */
	var d = new Date();
	//var dayOfWeek = d.getDay();
	var hour = d.getHours();
	var mins = d.getMinutes();
	var status = 'open';

	if (hour >= 6 && hour <= 18){
		$('#location .__location-name.day').trigger( "click" );
	}else{
		$('#location .__location-name.night').trigger( "click" );
	}

	/*
	DEV mode to get proper position on stop dragging	
	*/
	/*
	$('#map-world .__map-world-slide .__map-marker').draggable({
		
		revert: "invalid",
		drag: function() {
			$('p.tooltip').text('We better stay where we are! Thanx!');
		}

		stop: function(  ) {
		   
			var l = ( 100 * parseFloat($(this).position().left / parseFloat($(this).parent().width())) ) + "%" ;
			var t = ( 100 * parseFloat($(this).position().top / parseFloat($(this).parent().height())) ) + "%" ;
			$(this).css("left", l);
			$(this).css("top", t);
		}
	
	});
	*/
	
	
	/* location pin actions */
	$('#map-world .__map-world-slide .__map-marker').on('click', function(){
	
		$('#map-world .__map-world-slide .__map-marker').removeClass('active');
		$(this).addClass('active');
		
		/* create data array from clicked elem */
		var pinPlace = $(this).data('locationplace');
		var pinDetails = $(this).data('address');
		var pinImage = $(this).data('locationimg');
		var pinLocationID = $(this).data('locationid');
		
			$('#map-location-details .location-detail-data #location-name')
				.animate({
					'opacity': '0'
				}, {
					step: function (fx) {
						$(this).css({"transform": "translate3d(0px, -110%, 0px)"});
					},
					duration: 300,
					easing: 'linear',
					queue: false,
					complete: function () {
						
						$(this).text(pinPlace).css({"transform": "translate3d(0, 0, 0)", 'opacity':'1'});
					}
				}, 'linear');
			
			$('#map-location-details .location-detail-data a.location-phone').attr('href', 'tel:' + pinDetails);
			
			$('#map-location-details .location-detail-data #location-details')
				.animate({
					'opacity': '0'
				}, {
					step: function (fx) {
						$(this).css({"transform": "translate3d(0px, -110%, 0px)"});
					},
					duration: 450,
					easing: 'linear',
					queue: false,
					complete: function () {
						
						$(this).text(pinDetails).css({"transform": "translate3d(0, 0, 0)", 'opacity':'1'});
					}
				}, 'linear');
			$('#map-location-details .location-detail-image img')
			.fadeOut(150, function() {
				$(this).attr('src', pinImage );
			})
			.fadeIn(400);
			
			$('#location-services > aside')
				.animate({
					'opacity': '0'
				}, {
					step: function (fx) {
						$(this).css({"transform": "translate3d(0px, 110%, 0px)"});
					},
					duration: 450,
					easing: 'linear',
					queue: false,
					
					complete: function () {
						
						$(this).css({'position':'absolute'}).addClass('hidden');
					}
					
				}, 'linear');
			
			
			$('#location-services > aside[class*=' + pinLocationID + ']')
				.animate({
					'opacity': '0'
				}, {
					step: function (fx) {
						$(this).removeClass('hidden');
					},
					duration: 450,
					easing: 'linear',
					queue: false,
					complete: function () {
						
						$(this).css({"transform": "translate3d(0, 0, 0)", 'position':'relative', 'opacity':'1'});
					}
				}, 'linear');
			
		
	});
	
	$('#map-world .__map-world-slide.active .__map-marker:first-child').trigger( "click" );

});