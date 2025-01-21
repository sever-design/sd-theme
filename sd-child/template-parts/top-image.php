<?php

if(!is_category()){
	
	if (is_home()) {
		$page_for_posts_id = get_option('page_for_posts');
		
		if (has_post_thumbnail($page_for_posts_id)) {
			$backImage = wp_get_attachment_url(get_post_thumbnail_id($page_for_posts_id, 'full'));
		}
	} elseif (is_front_page()) {
		if (has_post_thumbnail(get_the_ID())) {
			$backImage = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID(), 'full'));
		}
	} else {
		
		if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
			$pageID = wc_get_page_id('shop');
		} else {
			$pageID = get_the_ID();
		}
		$backImage = get_the_post_thumbnail_url($pageID, 'full');	
		
	}
	
} else {
	$category = get_category( get_query_var( 'cat' ) );
	$cat_id = $category->cat_ID;

	$attachment_id = get_option('categoryimage_'.$cat_id);

	$backImage = wp_get_attachment_image_src($attachment_id, "full", false);
	$backImage = $backImage[0];
}

if(empty($backImage)) {
	$bg = 'no-set-bg';
} else {
	$bg = 'bg-image';
}

$useTitle = true;

$showExcerpt = true;
?>

		<div id="page-top-image" class="image">
			<div class="bg <?php echo $bg; ?>" <?php echo 'style="background-image:url(\''.$backImage.'\');"'; ?> data-stellar-background-ratio="0.5">
				<div class="opacity-lvl">
					<div class="container-wrapper">
						<div class="container">
							<div class="row">
								<div class="col-md-12 align-self-center">
									<?php
									//show titile based on settings
									if( $useTitle ) {
										get_template_part('/template-parts/section', 'title');
									}
									?>
									<?php
									//show breadcrumbs if enadled in Yoast
									if ( function_exists('yoast_breadcrumb') ) { ?>
										<div class="breadcrumbs-wrapper">
											<?php  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' ); ?>
										</div>
									<?php } ?>
									<?php
									//show page excerpt based on settings
									if( $showExcerpt ) { ?>
										<div class="page-excerpt">
											<?php echo apply_filters('the_content', get_the_excerpt()); ?>
										</div>									
									<?php } ?>
								</div>
							</div>
						</div>
					</div>			
				</div>
			</div>
		</div>
