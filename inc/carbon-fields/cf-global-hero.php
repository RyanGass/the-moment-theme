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
                ->set_default_value( 'center' )
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
            Field::make( 'rich_text', 'content', 'Content' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'text', 'banner_button_text', 'Button Text' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'show_hero',
                        'value' => 'yes',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'text', 'banner_button_url', 'Button URL' )
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
            )) 
            ->add_tab( __('Right Side Options'), array(
            Field::make( 'radio', 'right_content_option', 'Choose Content Type' )
                ->set_default_value( 'none' )    
                ->add_options( array(
                        'none' => 'None',
                        'image' => 'Image',
                        'video' => 'Video',
                        'form' => 'Form',
                    ) ),
            
            Field::make( 'image', 'right_image', 'Side Image' )
                ->set_value_type( 'url' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                    array(
                        'field' => 'right_content_option',
                        'value' => 'image',
                        'compare' => '=',
                    )
                ) ),
            Field::make( 'radio', 'form_type', 'What Type of Form?' )
                    ->add_options( array(
                        'embed' => 'Embed',
                        'mkto' => 'Marketo',
                        'gravity' => 'Gravity Forms',
                        'cf7' => 'Contact Form 7',
                    ) )
                    ->set_conditional_logic( array(
                        'relation' => 'AND',
                        array(
                            'field' => 'right_content_option',
                            'value' => 'form',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'text', 'form_title', 'Form Title' )
                    ->set_conditional_logic( array(
                    'relation' => 'OR',
                        array(
                            'field' => 'right_content_option',
                            'value' => 'form',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'text', 'mkto-form-id', 'Marketo Form ID' )
                    ->set_help_text( 'Ex: 1028' )
                    ->set_conditional_logic( array(
                    'relation' => 'OR',
                        array(
                            'field' => 'form_type',
                            'value' => 'mkto',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'text', 'mkto-account-id', 'Marketo Account ID' )
                    ->set_help_text( 'Ex: 157-RPM-092' )
                    ->set_conditional_logic( array(
                    'relation' => 'OR',
                        array(
                            'field' => 'form_type',
                            'value' => 'mkto',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'textarea', 'embed_code', 'Embed Code' )
                    ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'form_type',
                            'value' => 'embed',
                            'compare' => '=',
                        ),
                        array(
                            'field' => 'right_content_option',
                            'value' => 'form',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'text', 'gf-form-id', 'Gravity Forms ID' )
                    ->set_help_text( 'Ex: 1' )
                    ->set_conditional_logic( array(
                    'relation' => 'OR',
                        array(
                            'field' => 'form_type',
                            'value' => 'gravity',
                            'compare' => '=',
                        )
                    ) ),
                    Field::make( 'text', 'cf-7-form-id', 'Contact Form 7 ID' )
                    ->set_help_text( 'Ex: 70' )
                    ->set_conditional_logic( array(
                    'relation' => 'OR',
                        array(
                            'field' => 'form_type',
                            'value' => 'cf7',
                            'compare' => '=',
                        )
                    ) ),

            Field::make('radio', 'video_service', 'Video Service')
                    ->add_options(array(
                        'youtube' => 'YouTube',
                        'vimeo' => 'Vimeo',
                        'hosted' => 'Hosted'
                    ) )
                    ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'right_content_option',
                            'value' => 'video',
                            'compare' => '=',
                        )
                    ) ),
                Field::make( 'image', 'video_image', 'Screenshot' )
                    ->set_value_type( 'url' )
                    ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'right_content_option',
                            'value' => 'video',
                            'compare' => '=',
                        )
                    ) ),
                Field::make( 'text', 'video_url', 'Video URL' )
                ->set_help_text( 'Ex: /wp-content/themes/theme-name/assets/videos/bbb.mp4' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'video_service',
                            'value' => 'hosted',
                            'compare' => '=',
                        ),
                        array(
                            'field' => 'right_content_option',
                            'value' => 'video',
                            'compare' => '=',
                        )
                    ) ),
                Field::make( 'text', 'vimeo_id', 'Vimeo ID' )
                ->set_help_text( 'Ex: 1084537?h=b1b3ab5aa2' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'video_service',
                            'value' => 'vimeo',
                            'compare' => '=',
                        ),
                        array(
                            'field' => 'right_content_option',
                            'value' => 'video',
                            'compare' => '=',
                        )
                    ) ),
                Field::make( 'text', 'youtube_id', 'Youtube ID')
                ->set_help_text( 'Ex: aqz-KE-bpKQ' )
                ->set_conditional_logic( array(
                    'relation' => 'AND',
                        array(
                            'field' => 'video_service',
                            'value' => 'youtube',
                            'compare' => '=',
                        ),
                        array(
                            'field' => 'right_content_option',
                            'value' => 'video',
                            'compare' => '=',
                        )
                    ) ),
        ) );
}