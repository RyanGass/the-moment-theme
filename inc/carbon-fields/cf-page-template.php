<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Custom Fields (page-template.php)

add_action( 'carbon_fields_register_fields', 'page_template_options_template' );
function page_template_options_template() {
    Container::make( 'post_meta', __( 'Page Sections', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/page-template.php')
        ->add_fields(array(
                Field::make( 'text', 'pre_heading', 'Pre Heading' ),
                Field::make( 'text', 'heading', 'Heading' ),
                Field::make( 'rich_text', 'header_content', 'Content' ),
                Field::make( 'image', 'image', 'Image' )
                            ->set_value_type( 'url' ),
                Field::make( 'complex', 'repeater', 'Repeater' )
                    ->set_collapsed( true )
                    ->add_fields( 'row', 'Row', array(
                        Field::make( 'image', 'image', 'Image' )
                            ->set_value_type( 'url' ),
                        Field::make( 'text', 'heading', 'Heading' ),
                        Field::make( 'text', 'content', 'Content' ),
                    ) ),
                Field::make( 'text', 'button_text', 'Button Text' ),
                Field::make( 'text', 'button_url', 'Button URL' ),
            ) );
}