<?php
// Enable support for Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Create an extra image sizes for the Post featured image
add_image_size( 'medium_big', 640, 480, true );
add_image_size( 'slider_img', 1245, 645, true );


// Register the three useful image sizes for use in Add Media modal

add_filter( 'image_size_names_choose', 'sd_add_custom_sizes' );
function sd_add_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'medium_big' => __( 'Medium Big (640x480)' )
	) );
}
