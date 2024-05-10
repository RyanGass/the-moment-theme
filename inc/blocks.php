<?php 

/***
*** Blocks Theme Support ***
*** Usage: https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/ ***
***/

function blocks_theme_setup() {
    add_theme_support( 'align-wide'); // Image width support
    add_theme_support( 'align-full'); // Image width support
}
add_action( 'after_setup_theme', 'blocks_theme_setup' );

/***
*** Restrict Allowed Block Types in the Editor ***
*** Usage: https://developer.wordpress.org/block-editor/reference-guides/core-blocks/ ***
***/

function wpcc_allowed_block_types() {
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/quote',
		'core/list',
		'core/list-item',
		'core/shortcode',
		'core/video',
		'core/separator',
		'core/spacer',
		'core/embed',
		'core/table',
		'gravityforms/form',
		'core/buttons',
		'core/html',
		'core/columns',
	);
}
add_filter( 'allowed_block_types', 'wpcc_allowed_block_types' );