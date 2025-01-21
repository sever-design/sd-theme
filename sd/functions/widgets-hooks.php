<?php
/*
 * Allow html tags in Widget Titles
 */
function sd_html_widget_title( $title ) {
    //HTML tag opening/closing brackets
    $title = str_replace( '[', '<', $title );
    $title = str_replace( '[/', '</', $title );
    $title = str_replace( ']', '>', $title );

    return $title;
}
add_filter( 'widget_title', 'sd_html_widget_title' );
