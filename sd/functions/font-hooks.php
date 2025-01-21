<?php
// Inject dispaly=swap to Google Fonts
function google_fonts_ds_inject_display_swap($html) {

    // Remove existing display swaps
    $html = str_replace("&#038;display=swap", "", $html);
	
	// Add font-display=swap as a querty parameter to Google fonts
    $html = str_replace("googleapis.com/css?family", "googleapis.com/css?display=swap&family", $html);
    $html = str_replace("googleapis.com/css2?family", "googleapis.com/css2?display=swap&family", $html);

    // Fix for Web Font Loader
    $html = preg_replace("/(WebFontConfig\['google'\])(.+[\w])(.+};)/", '$1$2&display=swap$3', $html);

    return $html;
  
}

// Capture HTML
function google_fonts_ds_capture_html() {
    ob_start("google_fonts_ds_inject_display_swap");
}
add_action('init', 'google_fonts_ds_capture_html', 1);

// Add font-display:swap using LiteSpeed cache
function google_fonts_ds_litespee_cache($content, $file_type, $urls) {
    if ($file_type === 'css')
        $content =  str_replace('@font-face{','@font-face{font-display:swap;', $content);
    return $content;
}
add_filter('litespeed_optm_cssjs', 'google_fonts_ds_litespee_cache', 10, 3);