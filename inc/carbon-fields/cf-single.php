<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Blog Post Custom Fields (single.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->where( 'post_type', '=', 'post' )
        ->show_on_category('services')
        ->add_fields( array(
            Field::make( 'text', 'crb_venue', 'Venue' ),
            Field::make( 'complex', 'crb_page_section' )
            ->add_fields( 'image-left', array(
                Field::make( 'image', 'image' ),
                Field::make( 'text', 'caption' ),
            ) )
            ->add_fields( 'image-right', array(
                Field::make( 'file', 'video' ),
                Field::make( 'text', 'title' ),
                Field::make( 'text', 'length' ),
            ) )
        ) );
}
