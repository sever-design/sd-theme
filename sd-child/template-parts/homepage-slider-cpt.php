<?php
$fullScreen = false;
?>
<div id="homeslider" class="slider">
	<div class="slider__wrapper <?php if($fullScreen) { echo 'slider__fullscreen';} else { echo 'slider__regular'; } ?>">
		<?php echo do_shortcode('[sd_cpt_slider group="Homepage Main Slider"]'); ?>
	</div>
</div>