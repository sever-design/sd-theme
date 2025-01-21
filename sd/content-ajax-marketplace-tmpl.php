<?php
/*
 * Template loaded by ajax call for prod layout
 */
?>

<div class="product-container ajax-prod-info prod-<?php the_ID(); ?>">
	<div class="post-image">
<?php if ( has_post_thumbnail() ){ ?>
		<?php the_post_thumbnail( 'large' ); ?>
<?php }	?>
	</div>
	<div class="post-info">
	<?php /*if( !empty( get_post_meta(get_the_ID(), 'll_textPostAltHeader') ) ) { ?>
		<h4><?php echo get_post_meta(get_the_ID(), 'll_textPostAltHeader')[0]; ?></h4>
	<?php } */?>
	
	<?php
		$catNames = get_the_terms(get_the_ID(), 'prod-type');
		//var_dump($catNames);
		
		if ( !empty( $catNames ) ) {
			echo '<h4>'.$catNames[0]->name.'</h4>';
			//$output .= '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
		}
	?>

		<h3><?php echo the_title(); ?></h3>
		<div class="summary">
			<?php the_content(); ?>
		<?php if( !empty( get_post_meta(get_the_ID(), 'll_prodURL') ) ) { ?>
			<a href="<?php echo get_post_meta(get_the_ID(), 'll_prodURL')[0]; ?>" target="_blank" class="ext-link"></a>
		<?php } ?>
		</div>
	</div>
	<div class="closer"><i class="fa fa-close"></i></div>
</div>