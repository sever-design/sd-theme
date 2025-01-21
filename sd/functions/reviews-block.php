<?php
// Add this to your theme's functions.php file
function register_review_block() {
    // Register block script
    wp_register_script(
        'review-block-editor',
        get_template_directory_uri() . '/template-parts/reviews-block/reviews-block.js',
        array('wp-blocks', 'wp-element', 'wp-editor')
    );

    // Register editor styles
    wp_register_style(
        'review-block-editor-style',
        get_template_directory_uri() . '/template-parts/reviews-block/reviews-block-editor.css'
    );

    // Register frontend styles
    wp_register_style(
        'review-block-style',
        get_template_directory_uri() . '/template-parts/reviews-block/reviews-block.css'
    );

    // Register the block
    register_block_type('custom-theme/review-block', array(
        'editor_script' => 'review-block-editor',
        'editor_style' => 'review-block-editor-style',
        'style' => 'review-block-style',
    ));
}
add_action('init', 'register_review_block');
