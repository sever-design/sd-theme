<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeIn'); ?>>

		<div class="entry-header">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" class="gallery-feat-image-link">
					<?php the_post_thumbnail( 'post_feature_full_width' ); ?>
				</a>
			<?php } ?>
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" class="heading-link">
					<span><?php the_title(); ?></span>
				</a>
			</h3>
		</div> <!-- /.entry-header -->

	</article> <!-- /#post -->
