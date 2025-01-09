<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Blog Post Custom Fields (single.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
    Container::make( 'post_meta', __( 'Post Options', 'crb' ) )
        ->where( 'post_type', '=', 'post' )
        ->add_fields( array(
            Field::make( 'radio', 'show_toc', 'Show Table of Contents?' )
                ->set_default_value( 'yes' )
                ->add_options( array(
                    'no' => 'No',
                    'yes' => 'Yes',
            ) ),
        ));
}