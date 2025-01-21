<?php
$fullScreen = true;
?>
<div id="homeslider" class="slider">
	<div class="slider__wrapper <?php if($fullScreen) { echo 'slider__fullscreen';} else { echo 'slider__regular'; } ?>">
		<?php echo do_shortcode('[do_widget id=swifty-img-widget-2 title=false wrap=div]'); ?>
	</div>
</div>