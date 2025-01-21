<div class="section-title-wrapper product-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
			<?php if ( has_post_thumbnail() ) { ?>
				<picture class="featured-image">
					<?php the_post_thumbnail( 'vert_tall_img' ); ?>
					<figcaption><?php echo get_post(get_post_thumbnail_id())->post_content; ?></figcaption>
				</picture>
			<?php } ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 align-self-stretch">
				<div class="page-prod-heading">
					<h1 class="cat-title sectional-title inview"><span><?php echo get_the_title(get_the_ID()); ?></span></h1>				
					<div class="page-excerpt">
						<?php
						$post_id = get_the_ID();
						$post = get_post( $post_id );
						echo apply_filters( 'the_content', $post->post_excerpt );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>