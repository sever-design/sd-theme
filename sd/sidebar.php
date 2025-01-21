<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Quark
 * @since Quark 1.0
 */
?>

		<div id="secondary" class="sidebar" role="complementary">
			<div class="stickem-container">
				<div class="stickem">
				<?php
				do_action( 'before_sidebar' );
				?>
				
				<?php dynamic_sidebar('sidebar-main') ?>
				</div>
			</div>
		</div> <!-- /#secondary.widget-area -->


