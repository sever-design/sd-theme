<?php
// Add the update check for the theme
function sd_theme_auto_update_check($transient) {
    // Skip the update check if we're on a page with no need for updates
    if (empty($transient->checked)) {
        return $transient;
    }

    // GitHub API URL to check the latest release
    $repo_url = 'https://api.github.com/repos/sever-design/sd-theme/releases/latest';
    $response = wp_remote_get($repo_url);

    if (is_wp_error($response)) {
        return $transient;
    }

    $release = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($release['tag_name'])) {
        // Get the latest release version from GitHub
        $latest_version = $release['tag_name'];
        
        // Get the current theme version
        $current_version = wp_get_theme('sd')->get('Version');

        // If the GitHub version is newer, update the version
        if (version_compare($latest_version, $current_version, '>')) {
            // Set the update data so WordPress knows about the newer version
            $transient->response['sd'] = array(
                'theme' => 'sd', // Theme folder name
                'new_version' => $latest_version,
                'url' => $release['html_url'], // GitHub release page URL
                'package' => $release['zipball_url'] // GitHub zipball URL
            );
        }
    }

    return $transient;
}

add_filter('site_transient_update_themes', 'sd_theme_auto_update_check');

// Add the update API call
function sd_theme_auto_update($upgrader_object, $options) {
    // Check if we are dealing with theme updates
    if ($options['action'] == 'update' && $options['type'] == 'theme') {
        // Get the theme update info
        $theme_slug = 'sd'; // The theme slug
        $theme = wp_get_theme($theme_slug);

        if (isset($options['themes'][$theme_slug])) {
            $theme_update = $options['themes'][$theme_slug];
            
            // If the update is from GitHub, trigger the update from GitHub
            if (isset($theme_update['package']) && strpos($theme_update['package'], 'github.com') !== false) {
                // Download the theme zip file from GitHub
                $theme_zip = download_url($theme_update['package']);
                
                if (is_wp_error($theme_zip)) {
                    return;
                }

                // Unzip the downloaded file to the theme directory
                $result = unzip_file($theme_zip, get_theme_root() . '/' . $theme_slug);

                // Clean up
                @unlink($theme_zip);
            }
        }
    }
}

add_action('upgrader_process_complete', 'sd_theme_auto_update', 10, 2);


function sd_theme_github_update_checker() {
    // GitHub API endpoint for your repository
    $repo_url = 'https://api.github.com/repos/sever-design/sd-theme/releases/latest';

    // Get the latest release data
    $response = wp_remote_get($repo_url);

    if (is_wp_error($response)) {
        error_log('Error fetching GitHub API: ' . $response->get_error_message());
        return;
    }

    $release = json_decode(wp_remote_retrieve_body($response), true);
    
    if (empty($release)) {
        error_log('No release data found.');
        return;
    }

    $latest_version = $release['tag_name']; // Version from GitHub

    // Get current theme version
    $current_version = wp_get_theme('sd')->get('Version');

    // Log the versions for debugging
    error_log("Current Version: " . $current_version);
    error_log("Latest Version: " . $latest_version);

    // Compare versions
    if (version_compare($latest_version, $current_version, '>')) {
        // Log that a new version is available
        error_log('A newer version of the theme is available.');
        // You could trigger a notification or update process here
    }
	
    // Compare versions
    if (version_compare($latest_version, $current_version, '>')) {
        // Display admin notice
        add_action('admin_notices', function() {
            echo '<div class="notice notice-warning is-dismissible">
                    <p><strong>New theme update available!</strong> A newer version of the SD Theme is available. Please update it from GitHub.</p>
                </div>';
        });
    }
}

add_action('admin_init', 'sd_theme_github_update_checker');

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
	

	    

	// For Woo
	elseif ( class_exists( 'woocommerce' ) ) {
		
		$fileJS = get_theme_file_path( 'js/script-loader-woocommerce.php' );
		
		
		if ( file_exists( $fileJS ) ) {
			if(is_woocommerce()) {
				wp_register_script( 'woo-js-files', $theme_path . 'js/script-loader-woocommerce.php', '', '', true );
				wp_enqueue_script( 'woo-js-files' );
			}
		} else {
			wp_register_script( 'woo-js-files', $theme_path . 'js/script-loader.php', '', '', true );
		}
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
	elseif( is_page(7141) ) {

		$fileCSS = get_theme_file_path( 'css/theme-offerpage.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-offerpage', $theme_path . 'css/theme-offerpage.css', 'all');
			wp_enqueue_style( 'theme-offerpage' );
		} else {
			wp_register_style('theme-frontpage', $theme_path . 'css/theme.css', 'all');
		}

	}
	
	elseif( is_category() || is_tag() || is_tax() ){
		
		$fileCSS = get_theme_file_path( 'css/theme-category.css' );
		
		if ( file_exists( $fileCSS ) ) {
			wp_register_style('theme-category', $theme_path . 'css/theme-category.css', 'all');
			wp_enqueue_style( 'theme-category' );
		} else {
			wp_register_style('theme-category', $theme_path . 'css/theme.css', 'all');
		}
	}

	elseif(is_page() && !is_front_page() && is_page_template( 'page-templates/front-page.php' ) ){
		
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

	    
};
add_action( 'get_footer', 'sd_add_footer_styles' );
