<?php

if(!is_category()){
	
		
	//$topImage = get_field( 'header_image' );
	if( !empty($topImage) ){ 
		$backImage = $topImage['url'];
	}else{
		$backImage = get_the_post_thumbnail_url(get_the_ID(),'full');
		
	}
} else {
	
	
		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;
	
		$attachment_id = get_option('categoryimage_'.$cat_id);
	
		$backImage = wp_get_attachment_image_src($attachment_id, "full", false);
		$backImage = $backImage[0];
	
	
}

$useTitle = true;
?>

		<div id="page-top-image" <?php echo 'style="background-image:url(\''.$backImage.'\');"'; ?> data-stellar-background-ratio="0.5">
			<div class="opacity-lvl">

				<div class="container">
					<div class="row">
						<div class="col-md-12 align-self-center">
						
						<?php
						if( $useTitle ) {
							get_template_part('/template-parts/section', 'title');
						}
						?>
						
							<?php if( is_category() ): ?>
								<h1 class="section-title"><?php echo get_the_category_by_ID($cat_id); ?></h1>
							<?php else: ?>
								<h1 class="section-title"><?php echo get_the_title(get_the_ID()); ?></h1>
							<?php endif; */?>
							
							<?php if ( function_exists('yoast_breadcrumb') ) { ?>
								<div class="breadcrumbs-wrapper">
									<?php  yoast_breadcrumb( '<div id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">','</div>' ); ?>
								</div>
							<?php } ?>						
						</div>
					</div>
				</div>
			
			
			</div>
		</div>
