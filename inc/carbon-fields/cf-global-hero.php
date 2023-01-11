<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Hero Banner Custom Fields (page.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_hero_options' );
function crb_attach_hero_options() {
    Container::make( 'post_meta', __( 'Hero Options', 'crb' ) )
    ->where( 'post_type', '=', 'page' )
        ->add_tab( __('Display Options'), array(
            Field::make( 'radio', 'show_hero', 'Show Hero?' )
                ->set_default_value( 'yes' )
                ->add_options( array(
                    'yes' => 'Yes',
                    'no' => 'No',
                )),
            Field::make( 'radio', 'alignment', 'Align Hero Text' )
                ->set_default_value( 'left' )
                ->add_options( array(
                    'left' => 'Left',
                    'center' => 'Center',
                ) )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
        ) )
        ->add_tab( __('Text Options'), array(
            Field::make( 'radio', 'bg_theme', 'Light or Dark Text?' )
                ->set_default_value( 'dark' )
                ->add_options( array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ) )
                ->set_help_text( 'If your background is dark choose "Light" to provide easier to read text' ),
            Field::make( 'text', 'heading', 'Heading' )
                ->set_conditional_logic( array(
                    'relation' => 'AND', 
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'text', 'content', 'Content' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'text', 'button_text', 'Button Text' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'text', 'button_url', 'Button URL' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
        ) )
        ->add_tab( __('Image Options'), array(
            Field::make( 'radio', 'show_bg_image', 'Show Background Image?' )
                ->set_default_value( 'no' )
                ->add_options( array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ) )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'image', 'bg_image', 'Background Image' )
                ->set_value_type( 'url' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_bg_image',
                        'value' => 'yes',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),   
            Field::make( 'radio', 'use_bg_overlay', 'Use Transparent Overlay?' )
                ->set_default_value( 'no' )    
                ->add_options( array(
                        'no' => 'No',
                        'yes' => 'Yes',
                    ) )
                ->set_conditional_logic( array(
                        'relation' => 'AND',
                    array(
                        'field' => 'show_bg_image',
                        'value' => 'yes',
                        'compare' => '=',
                        ),
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ), 
            Field::make( 'radio', 'show_right_image', 'Show Side Image?' )
                ->set_default_value( 'no' )    
                ->add_options( array(
                        'yes' => 'Yes',
                        'no' => 'No',
                    ) )
                ->set_conditional_logic( array(
                        'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'alignment',
                        'value' => 'left',
                        'compare' => '=',
                    ),
                    ) ),
            Field::make( 'image', 'right_image', 'Side Image' )
                ->set_value_type( 'url' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'show_right_image',
                        'value' => 'yes',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'alignment',
                        'value' => 'left',
                        'compare' => '=',
                    ),
                ) ),
        ) );
}