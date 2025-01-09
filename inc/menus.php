<?php

/***
*** Menu Support ***
***/

function menu_theme_setup() {
	add_theme_support( 'menus' );
}
add_action('after_setup_theme', 'menu_theme_setup' );

/***
*** Register Menus ***
***/

function register_my_menus() {
  register_nav_menus(
    array(
        'primary' => __( 'Primary Menu', 'theme-name' ),
        'footer-menu' => __( 'Footer Menu', 'theme-name' ),
        'utility' => __( 'Utility Menu', 'theme-name' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

/***
*** wp_nav_menu() enhancements ***
***/

// Adds option 'li_class' to 'wp_nav_menu() array $args'

function theme_name_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'theme_name_nav_menu_add_li_class', 10, 4 );

// Adds option 'submenu_class' to 'wp_nav_menu() array $args'

function theme_name_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'theme_name_nav_menu_add_submenu_class', 10, 3 );
