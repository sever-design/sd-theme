<?php
/*
 * Template required for displaying products
 */

if(is_front_page()) {
	$perPage = 6;
} else {
	$perPage = '-1';
}


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query = new WP_Query( array(
	'post_type' 	=> 'product',
	'post_status' 	=> 'publish',
	'orderby'       => 'date',
	'order'         => 'DESC',
	'posts_per_page' => $perPage,
	'paged' 		=> $paged
) );


function get_cat_filters() {
	$taxonomies = get_terms(array(
		'taxonomy' => 'prod-type',
		'hide_empty' => true
	));

	//var_dump($taxonomies);

	if( !empty($taxonomies) ){
		$out = '';
		$out .= '<a href="#" data-prodtype="type-product" class="btn rounded-btn active">All</a>';
		foreach($taxonomies as $cat) {
			$out .= '<a href="#" data-prodtype="prod-type-'. strtolower($cat->slug) .'" class="btn rounded-btn">'. $cat->name .'</a>';
		}
	}
	
	return $out;
	
	
}

?>

<section id="marketplace" class="tabber-container">
	<?php
	
	/* <h3 class="alt-sectional-title"><?php _e('Living Luxe Marketplace', 'quark'); ?></h3> */
	if( is_front_page() ):
		$hTag = '3';
	else:
		$hTag = '1';
	endif; ?>
		<h<?php echo $hTag;?> class="alt-sectional-title">
		<?php
		
		if( !empty(get_post_meta(25, 'mf_textPageAltHeader' )[0]) ) {
			echo get_post_meta(25, 'mf_textPageAltHeader' )[0];
		} else {
			echo get_the_title(25);
		}
		?>
		</h<?php echo $hTag;?>>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php
				/* if is page Marketplace id:25 */
				if(is_page(25)) { ?>
				<div id="cats" class="filter-links">
					<?php
					echo get_cat_filters();
					?>
				</div>
				<?php } ?>
				
				<div id="posts">

					<ul class="prod-list">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<li <?php post_class(); ?>>
							<a data-post_id="<?php the_ID(); ?>" class="ajax-button blocked-link" href="#"></a>
					<?php
						if ( has_post_thumbnail() ){
					?>
								<a data-post_id="<?php the_ID(); ?>" class="ajax-button post-image" href="#">
									<?php
									if(is_front_page()){
										the_post_thumbnail( 'thumbnail' );
									}else {
										the_post_thumbnail( 'prod_img_big' );
									}
									
									?>
								</a>
					<?php
						}
						/*
						if( !empty( get_post_meta(get_the_ID(), 'll_textPostAltHeader') ) ) { 
						?>
							<h4><?php echo get_post_meta(get_the_ID(), 'll_textPostAltHeader')[0]; ?></h4>
					<?php }*/

							$catNames = get_the_terms(get_the_ID(), 'prod-type');
							//var_dump($catNames);
							
							if ( !empty( $catNames ) ) {
								echo '<h4>'.$catNames[0]->name.'</h4>';
								//$output .= '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
							}

					?>
							<a data-post_id="<?php the_ID(); ?>" class="ajax-button prod-title" href="#"><?php echo the_title(); ?></a>
							<div class="load_here"></div>
						</li>

					<?php endwhile;?>
					</ul>
<?php

/**
 * reset the orignal query
 * we should use this to reset wp_query
 */
wp_reset_query();
?>
				</div>
				<?php quark_content_nav( 'nav-below' ); ?>
			</div>
		</div>
	</div>
</section>