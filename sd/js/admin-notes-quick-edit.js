jQuery(document).ready(function($) {
    // Add custom logic to handle inline editing
    function set_inline_mls_alt_title(id) {
        inlineEditPost.revert(); // Revert the current row so it works like the default
        var $row = $('#post-' + id);
        var mls_alt_title = $row.find('.column-mls_alt_title').text().trim();

        // Pre-fill the Quick Edit form with custom field value
        $('input[name="mls_alt_title"]').val(mls_alt_title);
    }

    // Bind to the Quick Edit button click event
    $(document).on('click', '.editinline', function() {
        var post_id = $(this).closest('tr').attr('id').replace('post-', '');
        set_inline_mls_alt_title(post_id);
    });
});