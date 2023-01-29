<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/***
*** Theme Options Page ***
*** Usage: https://carbonfields.net/docs/fields-usage-2/ ***
***/

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
         ->add_tab( __('Site Header'), array(
            Field::make( 'radio', 'utility_menu', 'Use Utility Menu?' )
            ->set_default_value( 'yes' )
            ->add_options( array(
                'no' => 'No',
                'yes' => 'Yes',
            ) ),
            Field::make( 'radio', 'fixed_header', 'Fixed Header?' )
            ->set_default_value( 'no' )
            ->add_options( array(
                'no' => 'No',
                'yes' => 'Yes',
            ) )
        ) )
        ->add_tab( __('Site Footer'), array(
            Field::make( 'text', 'footer_phone', 'Phone Number' ),
            Field::make( 'text', 'footer_tagline', 'Tagline' ),
        ) )
        ->add_tab( __('Social Media'), array(
            Field::make( 'text', 'facebook', 'Facebook URL' ),
            Field::make( 'text', 'linkedin', 'LinkedIn URL' ),
            Field::make( 'text', 'instagram', 'Instagram URL' ),
        ) );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( __DIR__.'../../../vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}