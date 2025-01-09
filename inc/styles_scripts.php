<?php

/***
*** Dequeue jQuery from front-end ***
***/

function removejQuery() {
	if ( !is_admin() ) { wp_deregister_script('jquery'); }
}
add_action('init', 'removejQuery');

/***
*** Enqueue theme assets ***
***/

function theme_name_enqueue_scripts() {
	wp_enqueue_style( 'theme-name', get_template_directory_uri() . '/styles_scripts/dist/_site.css', array(), null );
	wp_enqueue_script( 'theme-name', get_template_directory_uri() . '/styles_scripts/dist/scripts.js', array(), null);
}
add_action( 'wp_enqueue_scripts', 'theme_name_enqueue_scripts' );

/***
*** Enqueue Custom Admin JS/CSS ***
***/

function admin_scripts() {
  wp_enqueue_script('admin-scripts', get_template_directory_uri().'/inc/admin-settings/admin.js', array(), null);
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/admin-settings/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_scripts');