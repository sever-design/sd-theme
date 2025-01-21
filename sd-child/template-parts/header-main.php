<?php 
/*
 * Header main layout
 */

$addStickyHeaderClass = true;
$isHeaderOverlapped = false;


?>
<div class="h-h <?php if( $addStickyHeaderClass ) echo 'sticky'; if( $isHeaderOverlapped ) echo ' overlapped'; ?>">
	<div id="masthead" role="banner" class="main-header layout-styles__s01">
		<div class="main-header__nav-bar">
			<div class="main-header__nav-wrapper">
				<?php get_template_part('template-parts/header','logo'); ?>
				<?php get_template_part('template-parts/header','nav'); ?>
				<?php get_template_part('template-parts/header','btns'); ?>
			</div>
		</div>
		<div class="main-header__contact-bar">
			<div class="main-header__nav-wrapper">
				<?php get_template_part('template-parts/header','contacts'); ?>
			</div>
		</div>
		<div class="progress-container">
			<div class="progress-bar" id="progressBar"></div>
		</div>
	</div>
</div>
