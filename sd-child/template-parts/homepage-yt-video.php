<?php
$fullScreen = false;
?>
<div id="homevideo">
	<div class="video yt-video <?php if($fullScreen) { echo 'video__full_screen';} else { echo 'video__regular'; } ?>">
		<div class="video__wrapper">
			<?php echo do_shortcode('[ytvideo video_id="L_LUpnjgPso" autoplay="true" loop="true"]'); ?>
			<div class="content">
				<?php echo do_shortcode('[do_widget id=custom_html-2 title=false wrap=div]'); ?>
			</div>
		</div>
	</div>
</div>