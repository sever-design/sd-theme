<?php
$terms = get_tags([
    'taxonomy' => 'post_tag',
    'selectionby' => 'count',
    'selection' => 'DESC',
]);

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
?>
<div class="all-related-tags">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<h3 class="tag-heading">Other Tags:</h3>
				<div style="text-align: justify;">
				<?php foreach($terms as $term) { ?>
					<a href="<?php echo get_tag_link($term->term_id);?>" class="tag-btn iverted"><span>#<?php echo strtolower($term->name) . ' (' . $term->count . ')' ; ?></span></a>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>