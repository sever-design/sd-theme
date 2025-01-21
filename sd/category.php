<?php
/**
 * The template for displaying an archive page for Categories.
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>
<?php //get_template_part('top','image'); ?>
<div id="pages">
	<div id="primary" class="site-content-inner home-section inview" role="main">

	<?php
	include( TEMPLATEPATH . '/template-parts/section-title.php' );
	?>
		<div class="container-fluid">
			<div class="row">
				<?php if ( have_posts() ) : ?>
				
					<?php get_template_part( 'loop' ); ?>
				
				<?php // get_sidebar(); ?>
					
				<?php else : ?>
					<div class="col-md-8 offset-md-2">
						<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>
					</div>
				<?php endif; // end have_posts() check ?>
				
			</div>
		</div>
	</div> <!-- /#primary.site-content.row -->

</div>
<?php get_footer(); ?>
