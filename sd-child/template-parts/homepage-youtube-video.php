<?php
$fullScreen = false;
?>
<div id="homevideo">
	<div class="video <?php if($fullScreen) { echo 'video__full_screen';} else { echo 'video__regular'; } ?>">
		<div class="video__wrapper">
			<?php echo do_shortcode('[ytvideo video_id="vJt_9-ZYuQE" autoplay="true" loop="true"]'); ?>
		</div>
	</div>
</div>
