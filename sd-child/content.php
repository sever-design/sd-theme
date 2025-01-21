<?php
/**
 * The default template for displaying content on Category / Taxonomy page.
 * Define what parts of posts to display;
 */
$thumbSize = 'large';
$showPostMeta = false;

$showPostExcerpt = true;
$showPostContent = false;

$classes = 'col-lg-12';
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

		<header class="entry-header category-header">
			<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink(); ?>" class="feat-image-link">
				<?php the_post_thumbnail( $thumbSize ); ?>
			</a>
			<?php } ?>
		</header>

		<main class="entry-content post-content">
			<h3 class="entry-title post-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h3>
			<?php if( $showPostExcerpt ) { ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>

				<?php if($showPostMeta){ ?>
				<div class="post-meta">
				<?php 
					sd_posted_on();
					//echo '<div class="views-counter">' . gt_get_post_view() . '</div>'; 
				?>
				</div>
				<?php } ?>
			</div>
			<?php
			}

			if( $showPostContent ) { ?>		
			<div class="entry-content">
				<?php the_content( wp_kses( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quark' ), array( 'span' => array('class' => array() ) ) )); ?>
			</div>
			<?php } ?>
		</main>

		<footer class="entry-meta">
			<?php edit_post_link( esc_html__( 'Edit', 'quark' ) . ' <i class="fa fa-angle-right"></i>', '<div class="edit-link">', '</div>' ); ?>
		</footer>
	</article>