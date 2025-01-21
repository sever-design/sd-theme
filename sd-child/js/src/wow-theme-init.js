/*
 * WOW.js init for when-in-view-effects
 */

// Helper function for add element box list in WOW
WOW.prototype.addBox = function(element) {
	this.boxes.push(element);
};

// Init WOW.js and get instance
var wow = new WOW();
wow.init();
/* END WOW */

/* re init WOW  */
if ( $('.wow').hasClass('animated') ) {
	$(this).removeClass('animated');
	$(this).removeAttr('style');
	new WOW().init();
}