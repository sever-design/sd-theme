<?php
/*
$terms = get_terms( array(
	'taxonomy' => 'post_tag',
	'hide_empty' => false,
) );
*/


$custom_query = new WP_Query( 
array( 
    'cat' => get_query_var('cat') 
  ) 
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
	'format'    => 'array',
	'include'   => $tags_str
);
//wp_tag_cloud($args);
// or use  <?php $my_tags = wp_tag_cloud( 'format=array' );


$terms = get_terms( $args);

?>
<div class="related-posts">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<h3 class="related-posts title">Related Articles</h3>
			</div>
		<?php
		foreach($terms as $term) {
			$page_tags[] = $term->slug;
		}
		
		$category = get_queried_object();
		//echo $category->term_id;
		
		//var_dump($page_tags);
		
		if(!is_single()){
			$posts_per_page = 6;
		} else{
			$posts_per_page = 3;
		}
			
		$args = array(
			'tag' => $page_tags,
			'posts_per_page' => $posts_per_page,
			'category__not_in' => $category->term_id,
		);
		$query = new WP_Query($args);
		
		if ($query->have_posts()) :
			$i = 0;
			while ($query->have_posts()) : $query->the_post();
				$i++;
			?>
				<div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
					<div class="post_wrapper grid_<?php echo $i; ?>">
						<div class="post-content">
							
							<div class="post_image">
								<?php
								$size = 'medium_large';
								?>
								<a href="<?php echo get_permalink($query->ID); ?>">
									<img src="<?php echo get_the_post_thumbnail_url($query->ID, $size); ?>" alt="<?php echo get_the_title($query->ID); ?>" />
								</a>
							</div>
							
							<div class="post_title">
								<h3>
									<a href="<?php echo get_permalink($query->ID); ?>">
										<?php echo get_the_title($query->ID); ?>
									</a>
								</h3>
							</div>
							<div class="post_tags">
								<?php
								$posttags = get_the_tags();
								if ($posttags) {
									foreach($posttags as $tag) {
										?>
										<a href="<?php echo get_tag_link($tag->term_id);?>" class="tag-btn iverted tooltip" title="View Posts Tagged #<?php echo $tag->name; ?>"><span>#<?php echo strtolower($tag->name); ?></span></a>
										<?php
									}
								}
								?>
							</div>
							<?php /*
							<div class="post_excerpt">
								<?php
								//echo $word_limit;
								echo wp_trim_words( apply_filters('the_excerpt', $query->post_excerpt), $word_limit, '...' ); ?>
							</div>
							
							<div class="post_author">
								<?php // <span>By <?php echo get_the_author_meta( 'display_name' , $query->post_author ); ?></span> ?>
								<a href="<?php echo get_permalink($query->ID); ?>">Read More</a>
							</div>
							*/ ?>
						</div>
					</div>
				</div>
		<?php endwhile; ?>
		<?php endif; wp_reset_query(); ?>
		</div>
	</div>
</div>