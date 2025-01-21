<?php
/**
 * Register widgetized areas
 *
 * @since Quark 1.0
 *
 * @return void
 */
function quark_widgets_init() {
	register_sidebar( array(
			'name' => esc_html__( 'Sidebar', 'quark' ),
			'id' => 'sidebar-main',
			'description' => esc_html__( '', 'quark' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
	register_sidebar( array(
			'name' => 'Header Sidebar',
			'id' => 'sidebar-header-1',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
	register_sidebar( array(
			'name' => 'Single Post Sidebar',
			'id' => 'sidebar-single-post',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
		
	register_sidebar( array(
			'name' => 'Homepage',
			'id' => 'sidebar-homepage',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title"><span>',
			'after_title' => '</span></h3>'
		) );


	register_sidebar( array(
			'name' => 'Footer',
			'id' => 'sidebar-footer-2',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
}
add_action( 'widgets_init', 'quark_widgets_init' );
