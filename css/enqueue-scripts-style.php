<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
/**
 * Enqueue all scripts
 */
if (!function_exists('ast_scripts')) {
	add_action('wp_enqueue_scripts', 'ast_scripts');
	function ast_scripts()
	{
		wp_enqueue_script('slick.min', get_template_directory_uri() .
			'/assets/js/slick.min.js', array('jquery'), null, false);
		wp_enqueue_script('uikit.min', get_template_directory_uri() .
			'/assets/js/uikit.min.js', array('jquery'), null, false);
		wp_enqueue_script('main', get_template_directory_uri() .
			'/assets/js/main.js', array('jquery'), null, false);
		//		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//			wp_enqueue_script( 'comment-reply' );
		//		}
	}
}
/**
 * Enqueue all styles
 */
if (!function_exists('ast_styles')) {
	add_action('wp_enqueue_scripts', 'ast_styles');
	function ast_styles()
	{
		wp_enqueue_style('ast-style', get_stylesheet_uri());
		wp_enqueue_style('slick', get_template_directory_uri() .
			'/assets/css/slick.css', array(), null, 'all');
		wp_enqueue_style('uikit.min', get_template_directory_uri() .
			'/assets/css/uikit.min.css', array(), null, 'all');
		wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
			array(),
			null,
			'all'
		);
		wp_enqueue_style('kor-style', get_template_directory_uri() .
			'/assets/css/style.min.css', array(), null, 'all');
	}
}
