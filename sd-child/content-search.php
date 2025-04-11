<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package Quark
 * @since Quark 1.0
 */

//Wheather show featured image in Single Post On/Off
$showFeaturedImage = true;
//Wheather to show Excerpt on Single Post On/Off
$showExcerpt = true;
//Wheather to show Post Publishing Date On/off
$showPostDate = false;
//Wheather to show Post Edit
$showAdminEditLink = true;
//default image size if shown
$thumbSize = 'vert_tall_img';
/****
 * TOP TITLE - FYI: Title is also presented in TO BANNER SECTION
 ****/
// Use heading title for Category
$useTitle = true;
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<header class="entry-header post-header">
				<?php if ( has_post_thumbnail() && $showFeaturedImage ) { ?>
					<div class="feat-image-link">
						<a href="<?php echo get_the_permalink(); ?>" rel="search">
							<?php the_post_thumbnail( $thumbSize ); ?>
						</a>
					</div>
				<?php } ?>
			</header> <?php /* single post header */ ?>

			<?php if ( $showExcerpt ): ?>
			<main class="entry-content post-excerpt">
				<h3 class="title title-sep">
					<span>
						<a href="<?php echo get_the_permalink(); ?>" rel="search">
							<?php echo get_the_title(); ?>
						</a>
					</span>
				</h3>
				<div class="content">
					<?php echo apply_filters( 'the_content', get_the_excerpt() ); ?>
					<a href="<?php echo get_the_permalink(); ?>" rel="search">Read More</a>
				</div>

				<?php if($showPostDate): ?>
				<div class="post-meta">
					<?php sd_posted_on(); ?>
				</div>
				<?php endif; ?>
			</main>
			<?php endif; //end showExcerpt ?>
		
	</article> <!-- /#post -->
