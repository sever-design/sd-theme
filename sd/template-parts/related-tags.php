<?php
/*
$terms = get_terms( array(
	'taxonomy' => 'post_tag',
	'hide_empty' => false,
) );
*/

if(!is_single()){
	
	$custom_query = new WP_Query( 
		array( 'cat' => get_query_var('cat') ) 
	);
	
	if ($custom_query->have_posts()) :
		while ($custom_query->have_posts()) : $custom_query->the_post();
			$posttags = get_the_tags();
			if ($posttags) {
				foreach($posttags as $tag) {
					$all_tags[] = $tag->term_id;
				}
			}
		endwhile;
	endif;
	
	
	if(!empty($all_tags)) {
		$tags_arr = array_unique($all_tags);
		$tags_str = implode(",", $tags_arr);
	} else {
		$tags_str = 'any';
	}
	
	

	$args = array(
		'number'    => 0,
		'format'    => 'array',
		'include'   => $tags_str
	);

	$terms = get_tags( $args);
	
	
	
	$counts = $terms_data = array();
	foreach ( (array) $terms as $term ) {
		$counts[ $term->name ]     = $term->count;
		$terms_data[ $term->name ] = $term;
	}

	// Remove temp data from memory
	$terms = array();
	unset( $terms );
	asort( $counts );
	$output = array();
	foreach ( (array) $counts as $term_name => $count ) {
		if ( ! is_object( $terms_data[ $term_name ] ) ) {
			continue;
		}
		$output[]         = $terms_data[ $term_name ];
	}
	$terms = array_reverse($output);
	
} else {
	$terms = wp_get_post_tags(get_the_ID());
	//var_dump($terms);
}

?>
<div class="related-tags">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="aligner">
				<?php
					$postcat = get_the_category( get_the_ID() );
					if ( ! empty( $postcat ) ) {
						if( if_post_in_homes_cats($postcat) && is_single() ) {
							$addClass = 'iverted';
						}
					}
					foreach($terms as $term) {
					?>
						<a href="<?php echo get_tag_link($term->term_id);?>" class="tag-btn <?php echo $addClass; ?>"><span>#<?php echo strtolower($term->name). ' (' . $term->count . ')'; ?></span></a>
					<?php
					}
					
					if(!is_single()){ ?>
					
						<div class="tag-toggler tooltip" title="Show/Hide Tags"></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>