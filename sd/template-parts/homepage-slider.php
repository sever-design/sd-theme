<?php
/* Old homepage -> Became About Us*/
if(is_page(461)): ?>
	<div id="slider-section">
		<?php echo do_shortcode('[do_widget id=swifty-img-widget-9 title=false]'); ?>
	</div>
<?php endif; ?>	

<?php
/* New Homepage*/
if(is_page(4104)):
	get_template_part( 'template-parts/slider' );
endif;
?>
