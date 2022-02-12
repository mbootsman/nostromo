<?php

/* Child theme functions */

/* Enqueue child theme stylesheet */
add_action( 'wp_enqueue_scripts', 'nostromo_enqueue_stylesheet' );
function nostromo_enqueue_stylesheet() {
	$theme_version  = wp_get_theme()->get( 'Version' );
	$version_string = is_string( $theme_version ) ? $theme_version : false;
	wp_register_style(
		'twentytwentytwo-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[],
		$version_string
	);
	wp_enqueue_style( 'twentytwentytwo-child-style' );
}

/* Remove webfonts */
add_action( 'wp_loaded', 'nostromo_remove_parent_webfonts' );
function nostromo_remove_parent_webfonts() {
  remove_action( 'wp_head', 'twentytwentytwo_preload_webfonts' );
}

/* Add featured image sizen */
add_image_size( 'featured-image', 960, 248, array( 'left', 'top' ) );


/* Disable lazy loading */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );
