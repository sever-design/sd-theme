<section id="services" class="promo-box">
<?php
/* remove current page from layout */
$currentToExclude = array();
array_push($currentToExclude, get_the_ID());

$pages = array(17,19,21,23,25);

$del_val = get_the_ID();

$key = array_search($del_val, $pages);
if (false !== $key) {
    unset($pages[$key]);
}

//var_dump($pages);

$args = array(
	'post_type'    => 'page',
	'sort_order'   => 'ASC',
	'sort_column' => 'menu_order',
	'include'      => $pages,
);


$service_pages = get_pages( $args );

//var_dump($service_pages);

	if ( $service_pages ) :?>
		<div class="pages">
		<?php
		$i = 0;
		foreach ( $service_pages as $pageChild ) : setup_postdata( $pageChild );
			$i++;
			//$serv_icon= rwmb_meta('sd_serviceIcon', $pageChild->ID);
			$serv_icon = get_post_meta( $pageChild->ID, 'sd_serviceIcon', true );
			$icon_src = wp_get_attachment_image_src($serv_icon)[0];
			
			$feat_img = get_the_post_thumbnail_url($pageChild->ID, 'full');
			

			
			?>
			<img src="<?php echo $feat_img; ?>" alt="<?php echo $pageChild->post_title; ?>" class="dsk-image <?php if($i == 1) { echo 'first'; } ?>" />
			<div class="page">
				<img src="<?php echo $feat_img; ?>" alt="<?php echo $pageChild->post_title; ?>" class="mob-image" />
				
				<h3>
					<a href="<?php echo get_permalink($pageChild->ID); ?>"  title="<?php echo $pageChild->post_title; ?>">
						<span class="text-wrapper">
							<span class="text">
								<span class="hor-top"></span>
								<span class="hor-bottom"></span>
								<img src="<?php echo $icon_src; ?>" alt="<?php echo $pageChild->post_title; ?>" />
								<span class="title"><?php echo $pageChild->post_title; ?></span>
								<span class="readmore">read more</span>
							</span>
						</span>
					</a>
				</h3>
			
            </div>
		<?php endforeach;?>
        </div>
	<?php endif; ?>
	<?php /*
	<div id="current-promo">
		<?php echo do_shortcode('[do_widget id=custom_html-11 title=false]'); ?>
	</div>
	*/ ?>
</section>