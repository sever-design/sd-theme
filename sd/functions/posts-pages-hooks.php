<?php
/*
 * Add Post formats if needed
*/
function sd_add_post_formats() {
    add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link' ) );
}
 
add_action( 'after_setup_theme', 'sd_add_post_formats', 20 );

/*
 * Ajax Loading of post by ID
 * additional JS AJAXify script - in main.js 
 */

function sd_ajax_load_more(){
    //load more posts
    $post_id = $_POST["post_id"];

	$query = new WP_Query( array(
		'p' => $post_id,
		'post_type' => 'any'
	) );

	if( $query->have_posts() ):
		while( $query->have_posts() ): $query->the_post();
			/* put template name here */
			get_template_part('content', 'ajax-tmpl');
		endwhile;
	endif;

	wp_reset_postdata();
	die();
}
add_action( 'wp_ajax_nopriv_ajax_load_more', 'sd_ajax_load_more' );
add_action( 'wp_ajax_ajax_load_more', 'sd_ajax_load_more' );


/*
 * Add Excerpt to Pages
 *
 */
function sd_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'sd_add_excerpts_to_pages' );


/*
 * Check if page is parent 
 * @ Return True if has children or False if no
 */
function sd_is_my_page_parent() {
	global $post;
	$children = get_pages('child_of='.$post->ID);
	if( count( $children ) > 0 ) {
		$parent = true;
	} else {
		$parent = false;
	}
	return $parent;
}


/*
 * Helper func for getting N posts from cat by ID
 * Retrieves an array of the latest posts, or posts matching the given criteria.
 * Returns Array of post objects or post IDs.
 */
function sd_get_posts_from_cat($cat_id, $num, $post_type ) {

	// Set the arguments for the query
	$args = array( 
		//'numberposts'		=> -1, // -1 is for all
		'post_type'		=> $post_type, // or 'post', 'page'
		'orderby' 		=> 'title', // or 'date', 'rand'
		'order' 		=> 'ASC', // or 'DESC'
		'category' 		=> $cat_id,
		'posts_per_page'	=> $num,
		'post_status'		=> 'publish',
		//'exclude'		=> get_the_ID()
		// ...
		// http://codex.wordpress.org/Template_Tags/get_posts#Usage
	);

	return get_posts($args);
}




/**
 * Prints HTML with meta information for current post: categories, tags, permalink
 * Show Tags
 *
 */
if ( ! function_exists( 'sd_entry_meta' ) ) {
	function sd_entry_meta() {
		// Return the Tags as a list
		$tag_list = "";
		if ( get_the_tag_list() ) {
			$tag_list = get_the_tag_list( '<span class="post-tags">', ' ', '</span>' );
		}

		// Translators: 1 is tag
		if ( $tag_list ) {
			printf( wp_kses( __( '<i class="fa fa-tag"></i> %1$s', 'sd' ), array( 'i' => array( 'class' => array() ) ) ), $tag_list );
		}
	}
}


/*
 * Change default text (More...)  to own in content using read-more editor's tag
 *
 */

function sd_wrap_readmore($more_link) {
	//Check if link contains default (more...), if it does replace with Read More
	if (preg_match('(more&hellip;)', $more_link)) {
		$more_link = str_replace('(more&hellip;)', 'Read More', $more_link);
	}

	return '<div class="read-more-wrapper">' . $more_link . '</div>';
}

add_filter('the_content_more_link', 'sd_wrap_readmore');

/**
 * Change the "read more..." link so it links to the top of the page rather than part way down
 * @param string The 'Read more' link
 * @return string The link to the post url without the more tag appended on the end
 */
function sd_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'sd_remove_more_jump_link' );

/**
 * Returns a "Continue Reading" link for excerpts
 * @return string The 'Continue reading' link
 */
function sd_continue_reading_link() {
	return ' &hellip;<p class="more-link-wrapper"><a class="more-link" href="'. esc_url( get_permalink() ) . '">' . wp_kses( __( '', 'sd' ), array( 'span' => array( 'class' => array() ) ) ) . '</a></p>';
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with the sd_continue_reading_link().
 *
 * @param string Auto generated excerpt
 * @return string The filtered excerpt
 */
function sd_auto_excerpt_more( $more ) {
	return sd_continue_reading_link();
}
add_filter( 'excerpt_more', 'sd_auto_excerpt_more' );


function sd_the_post_thumbnail_caption() {
	global $post;
	$thumbnail_id = get_post_thumbnail_id($post->ID);
	$thumbnail_image = get_posts(array(
		'p' => $thumbnail_id,
		'post_type' => 'attachment')
	);
 
	if ($thumbnail_image && isset($thumbnail_image[0])) {
		echo '<figcaption class="image-caption">'.$thumbnail_image[0]->post_excerpt.'</figcaption>';
	}
}


/*
 * Prints HTML with meta information for current post: author and date
 * uses Font Awesome 4.0 icons 
 */
if ( ! function_exists( 'sd_posted_on' ) ) {
	function sd_posted_on() {
		$post_icon = '';
		switch ( get_post_format() ) {
			case 'aside':
				$post_icon = 'fa-file-o';
				break;
			case 'audio':
				$post_icon = 'fa-volume-up';
				break;
			case 'chat':
				$post_icon = 'fa-comment';
				break;
			case 'gallery':
				$post_icon = 'fa-camera';
				break;
			case 'image':
				$post_icon = 'fa-picture-o';
				break;
			case 'link':
				$post_icon = 'fa-link';
				break;
			case 'quote':
				$post_icon = 'fa-quote-left';
				break;
			case 'status':
				$post_icon = 'fa-user';
				break;
			case 'video':
				$post_icon = 'fa-video-camera';
				break;
			default:
				$post_icon = 'fa-calendar';
				break;
		}

		// Translators: 1: Icon 2: Permalink 3: Post date and time 4: Publish date in ISO format 5: Post date
		$date = sprintf( '<i class="fa %1$s"></i> <a href="%2$s" title="Posted %3$s" rel="bookmark"><time class="entry-date" datetime="%4$s" itemprop="datePublished">%5$s</time></a>',
			$post_icon,
			esc_url( get_permalink() ),
			sprintf( esc_html__( '%1$s @ %2$s', 'quark' ), esc_html( get_the_date() ), esc_attr( get_the_time() ) ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		// Translators: 1: Date link 2: Author link 3: Categories 4: No. of Comments
		$author = sprintf( '<i class="fa fa-pencil"></i> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( esc_html__( 'View all posts by %s', 'quark' ), get_the_author() ) ),
			get_the_author()
		);

		// Return the Categories as a list
		$categories_list = get_the_category_list( esc_html__( ' ', 'quark' ) );

		// Translators: 1: Permalink 2: Title 3: No. of Comments
		$comments = sprintf( '<span class="comments-link"><i class="fa fa-comment"></i> <a href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_comments_link() ),
			esc_attr( esc_html__( 'Comment on ' . the_title_attribute( 'echo=0' ) ) ),
			( get_comments_number() > 0 ? sprintf( _n( '%1$s Comment', '%1$s Comments', get_comments_number(), 'quark' ), get_comments_number() ) : esc_html__( 'No Comments', 'quark' ) )
		);

		// Translators: 1: Date 2: Author 3: Categories 4: Comments
		
		printf( wp_kses(
				__( '<div class="header-meta"><span class="post-date">%1$s</span><span class="post-author">%2$s</span><span class="post-categories">%3$s</span>%4$s</div>', 'quark' ),
				array( 
					'div' => array ( 
						'class' => array()
					), 
					'span' => array( 
						'class' => array()
					)
				)
			),
			$date,
			$author,
			$categories_list,
			$comments,
			( is_search() ? '' : $comments )
		);
		
	}
}


