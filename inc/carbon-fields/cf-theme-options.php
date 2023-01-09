<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Theme Options Page

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
         ->add_tab( __('Tab 1'), array(
            Field::make( 'text', 'tab_1_field_name', 'Field Label' ),
        ) )
        ->add_tab( __('Tab 2'), array(
            Field::make( 'text', 'tab_2_field_name', 'Field Label' ),
        ) )
        ->add_tab( __('Tab 3'), array(
            Field::make( 'text', 'tab_3_field_name', 'Field Label' ),
        ) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( __DIR__.'../../../vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}