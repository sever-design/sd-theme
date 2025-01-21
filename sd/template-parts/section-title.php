	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php
				if( is_front_page() ) {
				?>
				<h2 class="sectional-title"><?php echo get_cat_name( $category ); ?>
					<div class="sectional-description"><?php echo category_description($category); ?></div>
				</h2>
				<?php
				}
				
				if(is_category()){
					$category = get_queried_object();
					
				?>
					<h1 class="cat-title sectional-title inview"><?php echo get_cat_name( $category->term_id); ?>
						<div class="sectional-description"><?php echo category_description($category->term_id); ?></div>
					</h1>
				<?php
				}
				
				if( is_page() && !is_front_page() ) {
				?>
					<h1 class="cat-title sectional-title inview"><?php echo get_the_title(get_the_ID()); ?></h1>
				<?php
				}
				
				if(is_tag()){
				?>
					<h1 class="cat-title sectional-title tag-title inview"><?php printf( esc_html__( 'Tagged: %s', 'quark' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
					<?php if ( tag_description() ) { // Show an optional tag description ?>
						<div class="sectional-description"><?php echo tag_description(); ?></div>
					<?php } ?>
					</h1>						
				<?php
				}
				?>
			</div>
		</div>
	</div>

				