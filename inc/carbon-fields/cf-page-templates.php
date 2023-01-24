<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Chapters Page Custom Fields (page-chapters.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options_template' );
function crb_attach_post_options_template() {
    Container::make( 'post_meta', __( 'Page Sections', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/page-template.php')
        ->add_fields(array(
            Field::make( 'rich_text', 'temlate_intro_content', 'Intro Content' ),
            // Add fields here
        ) );
}