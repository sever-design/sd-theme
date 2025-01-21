jQuery(document).ready(function($) {
    // Increase or decrease quantity buttons
    $('body').on('click', '.plus', function() {
        var qty = $(this).siblings('.qty');
        var currentVal = parseInt(qty.val(), 10);
        if (!isNaN(currentVal)) {
            qty.val(currentVal + 1);
        }
    });

    $('body').on('click', '.minus', function() {
        var qty = $(this).siblings('.qty');
        var currentVal = parseInt(qty.val(), 10);
        if (!isNaN(currentVal) && currentVal > 1) {
            qty.val(currentVal - 1);
        }
    });
});