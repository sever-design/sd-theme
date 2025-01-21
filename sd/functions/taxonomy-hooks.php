<?php
/*
 * Exlude category from dispalying on blogpage
 *
 */
function sd_exclude_category_from_home( $query ) {
	
	//assing cat IDs here for mutli cats use '-5, -9, -23'
	$to_exclude = '';
	
	if ( $query->is_home() && $query->is_main_query() && !empty($to_exclude) ) {
			$query->set( 'cat', $to_exclude );
	        }
	}
add_action( 'pre_get_posts', 'sd_exclude_category_from_home' );



/*
 * Add custom taxonomy terms name to body class in single post
 * 
 */
function sd_add_taxonomy_in_body_class( $classes ){
  if( is_singular() ) {
	$taxonomy_name = 'custom-taxonomy'; // Edit here
	global $post;
	$custom_terms = get_the_terms($post->ID, $taxonomy_name);
	if ($custom_terms) {
	  foreach ($custom_terms as $custom_term) {
		if( empty($custom_term->slug) ) {
			$classes[] = 'term-none';
		} else {
			$classes[] = 'term-' . $custom_term->slug;
		}
	  }
	}
  }
  return $classes;
}
add_filter( 'body_class', 'sd_add_taxonomy_in_body_class' );



/*
 * Adding template for single-TAXONOMYNAME
 */
function sd_single_template_terms($template) {
    foreach( (array) wp_get_object_terms(get_the_ID(), get_taxonomies(array('public' => true, '_builtin' => false))) as $term ) {
        if ( file_exists(TEMPLATEPATH . "/single-{$term->taxonomy}.php") )
            return TEMPLATEPATH . "/single-{$term->taxonomy}.php";
    }
	//var_dump($term);
    return $template;
}
add_filter('single_template', 'sd_single_template_terms');
