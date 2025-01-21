<?php
/*
 * Customize layout for Slides on homepage
 *
 */

$slide_link = isset( $args['slide_link'] ) ? $args['slide_link'] : ''; 
$use_link = isset( $args['use_link'] ) ? $args['use_link'] : 'false';
?>
<div class="slider-item">
	<div class="slider-content">
		<?php echo do_blocks(do_shortcode(get_the_content())); ?>
	</div>
    

    <?php
    // Display the link if 'use_link' is true and the slide link exists
    if ( $use_link === 'true' && !empty( $slide_link ) ) : ?>
        <a href="<?php echo get_the_permalink( $slide_link ); ?>" class="slider-link">
			<?php
			if ( has_post_thumbnail() ) : 
				the_post_thumbnail('medium_big'); 
			endif;
			?>	
		</a>
	<?php else: ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="slider-image">
				<?php the_post_thumbnail('medium_big'); ?>
			</div>
		<?php endif; ?>	
    <?php endif; ?>
</div>