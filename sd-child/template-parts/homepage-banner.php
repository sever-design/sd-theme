<?php
$fullScreen = true;
?>
<div id="homebanner" class="banner">
	<div class="banner <?php if($fullScreen) { echo 'banner__fullscreen';} else { echo 'banner__regular'; } ?>">
		<?php echo do_shortcode('[do_widget id=swifty-img-widget-2 title=false wrap=div]'); ?>
	</div>
</div>