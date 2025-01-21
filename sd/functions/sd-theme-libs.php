<?php
//Add Styles for Admin Metabox Layout
/*
add_action('admin_head', 'my_custom_styles');
function my_custom_styles() {
  $theme_path = trailingslashit( get_stylesheet_directory_uri() );
  if (is_admin()) {
	$myCssFileSrc = $theme_path . 'css/admin-cpt.css';
	wp_enqueue_style( 'my-adm-css', $myCssFileSrc );
  }
}
*/
add_action('wp_enqueue_scripts', 'my_theme_scripts');
function my_theme_scripts(){
	if( is_admin() ) return;
	wp_deregister_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-core', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array('jquery'), '1.12.1' );
}


/*
 * Enqueue scripts and styles
 */
function sd_scripts_styles() {
	
	$theme_path = trailingslashit( get_stylesheet_directory_uri() );
	
	// For Homepage
	if(is_page() && is_front_page() || is_page_template( 'page-templates/front-page.php' ) ) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-homepage.php' );
		
		if ( file_exists( $fileJS ) ) {
			wp_register_script( 'home-js-files', $theme_path . 'js/script-loader-homepage.php', '', '', true );
		} else {
			wp_register_script( 'home-js-files', $theme_path . 'js/script-loader.php', '', '', true );
		}		
		wp_enqueue_script( 'home-js-files' );
	}
	

	
	//For Catgory / Taxonomy
	elseif( is_category() || is_tax() || is_archive()  ) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-category.php' );
		
		if ( file_exists( $fileJS ) ) {
			wp_register_script( 'category-js-files', $theme_path . 'js/script-loader-category.php', '', '', true );
			wp_enqueue_script( 'category-js-files' );		
		}
	}

	// For Single Page
	elseif(is_page() && !is_front_page() ) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-page.php' );
		
		if ( file_exists( $fileJS ) ) {
			wp_register_script( 'page-js-files', $theme_path . 'js/script-loader-page.php', '', '', true );
		} else {
			wp_register_script( 'home-js-files', $theme_path . 'js/script-loader.php', '', '', true );
		}	
		wp_enqueue_script( 'page-js-files' );
	}
	
	// For Single Post
	elseif(is_single()) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-post.php' );
		
		if ( file_exists( $fileJS ) ) {
			wp_register_script( 'post-js-files', $theme_path . 'js/script-loader-post.php', '', '', true );
		} else {
			wp_register_script( 'home-js-files', $theme_path . 'js/script-loader.php', '', '', true );
		}	
		
		wp_enqueue_script( 'post-js-files' );
	}
	
	// For Error Page 404
	elseif(is_404()) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-404.php' );
		
		if ( file_exists( $fileJS ) ) {
			wp_register_script( '404-js-files', $theme_path . 'js/script-loader-404.php', '', '', true );
			wp_enqueue_script( '404-js-files' );		
		}
	}
	
	else {
		wp_register_script( 'other-js-files', $theme_path . 'js/script-loader.php', '', '', true );
		wp_enqueue_script( 'other-js-files' );
	}

	// For Woo
	if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
		
		$fileJS2 = get_theme_file_path( 'js/script-loader-woocommerce.php' );
		
		if ( file_exists( $fileJS2 ) ) {
			
			wp_enqueue_script( 'woo-js-files', $theme_path . 'js/script-loader-woocommerce.php', '', '', true );
			
		} else {
			wp_register_script( 'woo-js-files', $theme_path . 'js/script-loader.php', '', '', true );
			wp_enqueue_script( 'woo-js-files' );
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'sd_scripts_styles' );


function sd_add_footer_styles() {
	$theme_path = trailingslashit( get_stylesheet_directory_uri() );
	
	/*
	 * Register and enqueue our stylesheets
	 * 
	 * If using a child theme, auto-load the parent theme style.
	 * Props to Justin Tadlock for this recommendation - http://justintadlock.com/archives/2014/11/03/loading-parent-styles-for-child-themes
	 */
	 /*
	if ( is_child_theme() ) {
		wp_enqueue_style( 'parent-style', $theme_path . 'style.css' );
	}
	*/
	// Enqueue the default WordPress stylesheet with theme details
	wp_enqueue_style( 'style', $theme_path . 'css/theme.css', 'all' );
	
	/* To resolve google assessment issues scores related to unused css
	 * split loading of styles depending on loaded WP template
	 * less file size + no unrelated css rules at all
	 *
	 */
	
	if( is_page() && is_front_page() ){
		
		$fileCSS = get_theme_file_path( 'css/theme-frontpage.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme-frontpage.css', 'all');
			wp_enqueue_style( 'theme-frontpage' );
		} else {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme.css', 'all');
		}
	}
	
	elseif( is_page() && is_page_template( 'page-templates/front-page.php' ) ) {
		$fileCSS = get_theme_file_path( 'css/theme-frontpage.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme-frontpage.css', 'all');
			wp_enqueue_style( 'theme-frontpage' );
		} else {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme.css', 'all');
		}		
	}
	
	//for Offer Page
	/*
	elseif( is_page(7141) ) {

		$fileCSS = get_theme_file_path( 'css/theme-offerpage.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-offerpage', $theme_path . 'css/theme-offerpage.css', 'all');
			wp_enqueue_style( 'theme-offerpage' );
		} else {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme.css', 'all');
		}

	}
	*/
	
	elseif( is_category() || is_tag() || is_tax() ){
		
		$fileCSS = get_theme_file_path( 'css/theme-category.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-category', $theme_path . 'css/theme-category.css', 'all');
			wp_enqueue_style( 'theme-category' );
		} else {
			wp_register_style('theme-category', $theme_path . 'css/theme.css', 'all');
		}
	}

	elseif(is_page() && !is_front_page() ){
		
		$fileCSS = get_theme_file_path( 'css/theme-page.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-page', $theme_path . 'css/theme-page.css', 'all');
			wp_enqueue_style( 'theme-page' );
		} else {
			wp_register_style('theme-page', $theme_path . 'css/theme.css', 'all');
		}
	}
	
	elseif(is_single()){
		
		$fileCSS = get_theme_file_path( 'css/theme-post.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-post', $theme_path . 'css/theme-post.css', 'all');
			wp_enqueue_style( 'theme-post' );
		} else {
			wp_register_style('theme-post', $theme_path . 'css/theme.css', 'all');
		}
	}
	
	elseif(is_search()){
		
		$fileCSS = get_theme_file_path( 'css/theme-search.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-search', $theme_path . 'css/theme-search.css', 'all');
			wp_enqueue_style( 'theme-search' );
		} else {
			wp_register_style('theme-search', $theme_path . 'css/theme.css', 'all');
		}
	}
	
	elseif(is_404()) {
		$fileCSS = get_theme_file_path( 'css/theme-404.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-search', $theme_path . 'css/theme-404.css', 'all');
			wp_enqueue_style( 'theme-search' );
		} else {
			wp_register_style('theme-search', $theme_path . 'css/theme.css', 'all');
		}
	}
	
	else {
		wp_register_style('theme-main', $theme_path . 'css/theme.css', 'all');
		wp_enqueue_style( 'theme-main' );
	}
	
	// For Woo
	if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
		
		$fileCSS2 = get_theme_file_path( 'css/theme-woo.css' );
		
		if ( file_exists( $fileCSS2 ) ) {
			wp_register_style( 'theme-woo', $theme_path . 'css/theme-woo.css', 'all' );
			wp_enqueue_style( 'theme-woo' );
		}
	}
	    
};
add_action( 'get_footer', 'sd_add_footer_styles' );
