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
            Field::make( 'separator', 'footer_contact_options', 'Contact Options'),
            Field::make( 'text', 'footer_phone', 'Phone Number' ),
            Field::make( 'text', 'footer_tagline', 'Tagline' ),

            Field::make( 'separator', 'footer_background_options', 'Background Options'),
            Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                ->add_options(array(
                    'no' => 'No',
                    'yes' => 'Yes'
                )),
            Field::make( 'color', 'background_color', 'Background Color' )
                ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                ->set_conditional_logic( array(
                'relation' => 'OR',
                    array(
                        'field' => 'use_background_color',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make('radio', 'use_background_image', 'Use Background Image?')
                ->set_default_value( 'no' )
                ->add_options(array(
                    'no' => 'No',
                    'yes' => 'Yes'
                ))
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'use_background_color',
                        'value' => 'no',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'image', 'footer_bg_image', 'Image' )
                ->set_value_type( 'url' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'use_background_color',
                        'value' => 'no',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'use_background_image',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'separator', 'footer_branding', 'Footer Branding' ),
            Field::make( 'image', 'footer_logo', 'Logo' )
                ->set_value_type( 'url' ),
            Field::make( 'text', 'footer_button_text', 'Button Text' ),

            Field::make( 'separator', 'footer_legal_separator', 'Footer Legal' ),
            Field::make( 'rich_text', 'footer_legal', 'Footer Legal'),
        ) )

        ->add_tab( __('Social Media'), array(
            Field::make( 'separator', 'footer_social_options', 'Social Options'),
            Field::make( 'text', 'social_text', 'Social Widget Headline'),
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