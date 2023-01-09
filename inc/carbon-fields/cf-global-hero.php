<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Hero Banner Custom Fields (page.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_hero_options' );
function crb_attach_hero_options() {
    Container::make( 'post_meta', __( 'Hero Options', 'crb' ) )
    ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'radio', 'show_hero', 'Show Hero?' )
                ->set_default_value( 'yes' )
                ->add_options( array(
                    'yes' => 'Yes',
                    'no' => 'No',
                ) ),
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
            Field::make( 'radio', 'button_color', 'Button Color' )
                ->set_default_value( 'white' )
                ->add_options( array(
                    'white' => 'White',
                    'red' => 'Red',
                    'blue' => 'Blue',
                ) ),
            Field::make( 'text', 'video_id', 'Video ID' ),
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
                        )
                    ) ),
            Field::make( 'image', 'right_image', 'Side Image' )
                ->set_value_type( 'url' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_right_image',
                        'value' => 'yes',
                        'compare' => '=',
                    ),
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),

            Field::make( 'radio', 'show_banner_form', 'Show Form?' )
                ->set_default_value( 'no' )    
                ->add_options( array(
                        'yes' => 'Yes',
                        'no' => 'No',
                    ) ),
            Field::make( 'radio', 'banner_form_style', 'Choose Form Style' )
                ->set_default_value( 'no' )    
                ->add_options( array(
                        'full' => 'Full',
                        'multi' => 'Multi-Step',
                    ) ),
            Field::make( 'text', 'banner_form_id', 'Form ID' )
                ->set_conditional_logic( array(
                        'relation' => 'AND',
                        array(
                            'field' => 'show_banner_form',
                            'value' => 'yes',
                            'compare' => '=',
                        )
                    ) ),
        ) );
}