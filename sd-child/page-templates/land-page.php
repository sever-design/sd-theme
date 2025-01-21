<?php
/**
 * Template Name: Landing Page Template
 */

get_header(); ?>
	<?php get_template_part('template-parts/homepage','banner'); ?>
	<section id="about-us">
		
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		
	</section>


<?php get_footer(); ?>
