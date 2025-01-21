<?php
/*
 * This approach removes all HTML comments from the page output, including Gutenberg comments.
 * If you want to strip comments globally (not just for blocks), you can use output buffering:
 */
function strip_html_comments($buffer) {
    return preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
}

function start_output_buffer() {
    ob_start('strip_html_comments');
}

function end_output_buffer() {
    ob_end_flush();
}

add_action('wp_head', 'start_output_buffer', 1);
add_action('wp_footer', 'end_output_buffer', 1);

/*
 * 3. Filter Content for Specific Post Type
 * If you only want to remove block comments for your slides CPT, modify the render_block filter to check the post type:
 */

function remove_block_comments_for_slides($block_content, $block) {
    if (get_post_type() === 'slides') {
        $block_content = preg_replace('/<!--.*?-->/', '', $block_content);
    }
    return $block_content;
}
add_filter('render_block', 'remove_block_comments_for_slides', 10, 2);