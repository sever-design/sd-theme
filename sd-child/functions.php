<?php
/**
 * Check if Contact Form 7 Shortcode Exists
 * 
 * Only checks content for the `[contact-form-7]` shortcode in 
 * singular post types. Defaults to false for other templates.
 * 
 * @param int|null $post_id Optional. Post ID to check, otherwise 
 * it grabs it from the global `$post` object.
 * @return bool True if shortcode was found. False otherwise.

   to wp-config.php

/** Contact Form 7: disable asset loading on frontend */
//define('WPCF7_LOAD_JS', false);
//define('WPCF7_LOAD_CSS', false);


function au_cf7_shortcode_exists($post_id = null){
    if (!is_null($post_id) || (is_singular() && class_exists('WPCF7'))) {
        if (is_null($post_id)) {
            global $post;
            $post_id = $post->ID;
        }
        return strpos(get_post_field('post_content', $post_id), '[contact-form-7 ') !== false;
    }
    return false;
}

/**
 * Disable Contact Form 7's Recaptcha when form is not on page
 */
add_action('wp_enqueue_scripts', function () {
    if (!au_cf7_shortcode_exists()) {
        remove_action('wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 20, 0);
    }
}, 1, 0);

/**
 * Enable Contact Form 7's assets when form is on page
 */
add_action('wp_enqueue_scripts', function () {
    if (au_cf7_shortcode_exists()) {
        if (function_exists('wpcf7_enqueue_scripts')) {
            wpcf7_enqueue_scripts();
        }
        if (function_exists('wpcf7_enqueue_styles')) {
            wpcf7_enqueue_styles();
        }
    }
}, 20, 0);

/*
Generate URLs in json for penthouse to create critical path CSS
*/
/*
function list_pages(){
    // Not copy and paste safe, please read
    // This sets up what we want to fetch from the database
    // All the posts, pages, and any other custom post types
    // Setting 'posts_per_page' to -1 give you all the matches in the db
     $args = array('post_type' => array( 'post', 'page'), 'posts_per_page' => -1 );

     // Go get what we want
     $query  = new WP_Query($args);

		$data = null;
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				
				$slugPostfix = '-criticalcss';
				
				$slug = get_post_field( 'post_name', get_the_ID() );
				$link = get_the_permalink();
				
			
				$data[] = array('link' => $link, 'name' => $slug . $slugPostfix);
				
			}
		}
		wp_reset_postdata();
		
		
		$dir_to_save = get_stylesheet_directory();
		//echo $dir_to_save;

		if ($data != null) {
			echo json_encode(array('success' => true, 'data' => $data), JSON_UNESCAPED_SLASHES);
			file_put_contents($dir_to_save . '/criticalcss-pagelist.json', json_encode($data,JSON_UNESCAPED_SLASHES));
		} else {
			echo json_encode(array('success' => false, 'msg' => 'post not found'));
		}
		wp_die();
}

list_pages();

add_action('wp_ajax_get_post', 'get_post');
add_action('wp_ajax_nopriv_get_post', 'get_post');
*/

/* **************************** */




add_action( 'get_footer', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
	
    $parenthandle = 'style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        '',
		true
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        '',
		true
    );
}



function sd_theme_add_image_sizes() {
	
		//New Way of Widgets - include this 
		//wp_enqueue_script('jquery-ui-widget'); 
		
		//Use OLD way of widgets - preferable
		remove_theme_support( 'widgets-block-editor' );		
		// Disables the block editor from managing widgets in the Gutenberg plugin.
		add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
		// Disables the block editor from managing widgets.
		add_filter( 'use_widgets_block_editor', '__return_false' );

		// Create an extra image sizes for the Post featured image
		add_image_size( 'medium_big', 640, 480, true );
		add_image_size( 'vert_tall_img', 450, 600, true );
		add_image_size( 'wide_image', 895, 620, true );
		
		// Register the three useful image sizes for use in Add Media modal
		function sd_add_custom_sizes_child( $sizes ) {
			return array_merge( $sizes, array(
				'vert_tall_img'					=> __( 'Vert Tall (450x600)' ),
				'wide_image'					=> __( 'Wide Image (895x620)' ),
				'medium_big' 					=> __( 'Medium Big (640x480)' )				
			) );
		}
		add_filter( 'image_size_names_choose', 'sd_add_custom_sizes_child' );
}
add_action( 'after_setup_theme', 'sd_theme_add_image_sizes' );


/***************************************
 * Dequeue JavaScript or Stylesheet.
 */
function pu_dequeue_style() {
    // Run the dequeue script with the handle of the JavaScript file
    //wp_dequeue_script( $handle );

    // Run the dequeue style with the handle of the CSS file
    wp_dequeue_style( 'kadence-blocks-btn' );
    wp_deregister_style( 'kadence-blocks-btn' );
	
    wp_dequeue_style( 'kadence-blocks-form' );
    wp_deregister_style( 'kadence-blocks-form' );
	
    wp_dequeue_style( 'kadence-blocks-testimonials' );
    wp_deregister_style( 'kadence-blocks-testimonials' );
	
	wp_dequeue_style( 'kadence-blocks-restaurant-menu' );
    wp_deregister_style( 'kadence-blocks-restaurant-menu' );
	
	wp_dequeue_style( 'kadence-blocks-countdown' );
    wp_deregister_style( 'kadence-blocks-countdown' );
	
	wp_dequeue_style( 'contact-form-7-rtl' );
    wp_deregister_style( 'contact-form-7-rtl' );
	
    wp_dequeue_style( 'swifty-img-widget-widget-styles' );
    wp_deregister_style( 'swifty-img-widget-widget-styles' );
	
	wp_dequeue_style('grw_css');
	
	//wp_deregister_style( 'contact-form-7' );
	wp_dequeue_style('contact-form-7');
	
	wp_deregister_style( 'wpsm_ac-font-awesome-front' );
	wp_dequeue_style('wpsm_ac-font-awesome-front');
}
add_action( 'wp_enqueue_scripts', 'pu_dequeue_style', 100 );

/* Move CF7 styles and JS to footer */
add_action('get_footer', 'load_wpcf7_scripts');
function load_wpcf7_scripts() {
    if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
      wpcf7_enqueue_scripts();
    }
    if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
      wpcf7_enqueue_styles();
    }
}

/* Prevent Metabox undefined Func Error */
if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}

function discover_scripts() {
    // Registered styles
    //var_dump(wp_styles()->registered);

    // Queued styles
	//var_dump(wp_styles()->queue);

    // Registered scripts
    //var_dump(wp_scripts()->registered);

    // Queued scripts
    //var_dump(wp_scripts()->queue);
}
add_action( 'wp_enqueue_scripts', 'discover_scripts', 100 );
