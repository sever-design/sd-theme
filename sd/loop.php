<?php
while ( have_posts() ) : the_post();
	if( is_category() || is_tag() || is_home() || is_tax() ){
		get_template_part( 'content' );
	} elseif ( is_single() ){
		get_template_part( 'content', 'post' );
	} elseif( is_page() ){
		get_template_part( 'content', 'page' );
	} elseif(is_search()) {
		get_template_part( 'content', 'search' );
	}
endwhile;
if( !is_home() ) {
	sd_content_nav( 'nav-below' );
}