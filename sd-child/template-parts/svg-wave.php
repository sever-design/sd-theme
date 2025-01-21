	&#homebanner {
		&:after,
		&:before {
			content: '';
			display: block;
			position: absolute;
			
			left: 0;
			z-index: 1;
			width: 100%;
			height: 100%;
			background: $_color_accent;
			background-size: 100% auto;
			clip-path: url(#myClip);

			@include screen(custom, max, 600) {
				display: none;
			}
		}

		&:after {
			bottom: -45px;
		}

		&:before {
			bottom: -75px;
			@include background-gradient(darken($_color_accent,15%), lighten($_color_accent,10%), 'horizontal');
		}
	}

	svg {
		#myClip {
			//transform: scale( calc(1/1400), calc(1/980)) !important;
			transform: scale( 0.00066656001, 0.00088508655) !important;
		}
	}
<div id="homebanner" class="banner">
	<svg width="0" height="0" viewBox="0 0 1980 1480"><defs><clipPath id="myClip" clipPathUnits="objectBoundingBox"><path d="M0.77,903.59c51.61-18.7,110.89-73.83,412.18-17.94,247.49,45.9,312.11,104.18,578.47,104.18,228.54,0,420.9-96.31,509.37-160,0-106.61-1.56-842.85-1.56-969.87C1262.4-140,.77-138.51.77-138.51V903.59Z"/></clipPath></defs></svg>
	<div class="banner <?php if($fullScreen) { echo 'banner__fullscreen';} else { echo 'banner__regular'; } ?>">
		<?php echo do_shortcode('[do_widget id=swifty-img-widget-2 title=false wrap=div]'); ?>
	</div>
</div>