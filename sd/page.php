<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Quark
 * @since Quark 1.0
 */

get_header(); ?>

<?php // get_template_part('top','image'); ?>
	<?php
	include( TEMPLATEPATH . '/template-parts/section-title.php' );
	?>
	<div id="primary" class="site-content-inner" role="main">
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php get_template_part( 'loop' ); ?>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>