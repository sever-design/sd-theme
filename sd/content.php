<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeIn'); ?>>

		<header class="entry-header <?php if(is_category()): echo 'category-title'; endif ?>">
			<?php if ( is_single() ) { ?>
				<?php /* <h1 class="entry-title"><?php the_title(); ?></h1> */ ?>
			<?php }
			else { ?>
				<h3 class="entry-title category-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<?php the_title(); ?>
					</a>
				</h3>

			<?php } // is_single() ?>
			
			<?php if ( has_post_thumbnail() && !is_home() && !is_single() ) { ?>
				<a href="<?php the_permalink(); ?>" class="feat-image-link">
					<?php the_post_thumbnail( 'post_feature_full_width' ); ?>
				</a>
			<?php } ?>
		</header> <!-- /.entry-header -->

		<?php if ( is_search() || is_category() || is_tag() || is_home() ) { // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>

				<?php if(is_home()){ ?>
				<div class="blog-meta">
				<?php 
					sd_posted_on();
					//echo '<div class="views-counter">' . gt_get_post_view() . '</div>'; 
				?>
				</div>
				<?php 
				} ?>
			</div> <!-- /.entry-summary -->
		<?php }	else { ?>
			<div class="entry-content">
			
				<?php
					the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ), array( 'span' => array('class' => array() ) ) ));
				?>
			
			</div> <!-- /.entry-content -->
		<?php } ?>

		<footer class="entry-meta">

			<?php edit_post_link( esc_html__( 'Edit', 'quark' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
			
		</footer> <!-- /.entry-meta -->
	</article> <!-- /#post -->
