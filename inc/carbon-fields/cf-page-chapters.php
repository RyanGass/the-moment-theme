<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Chapters Page Custom Fields (page-chapters.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options_chapters' );
function crb_attach_post_options_chapters() {
    Container::make( 'post_meta', __( 'Story Sections', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/page-chapters.php')
        ->add_fields(array(
            Field::make( 'rich_text', 'ch_intro_content', 'Intro Content' ),
            Field::make( 'complex', 'ch_sections', 'Page Sections' )
                ->set_collapsed( true )
                ->add_fields( 'download-mkto-form', 'Download Marketo Form', array(
                    Field::make( 'text', 'download_title', 'Section Title' ),
                    Field::make( 'image', 'download_image', 'Section Image' )
                                ->set_value_type( 'url' ),
                    Field::make( 'text', 'mkto-form-id', 'Marketo Form ID' ),
                ) )
                ->add_fields( 'chapter', 'Chapter', array(
                    Field::make( 'image', 'chapter_image', 'Chapter Image' )
                                ->set_value_type( 'url' ),
                    Field::make( 'text', 'chapter_title', 'Chapter Title' ),
                    Field::make( 'text', 'chapter_intro', 'Chapter Intro' ),
                    Field::make( 'rich_text', 'chapter_content', 'Chapter Content' ),               
                    Field::make( 'complex', 'ch_resources', 'Additional Resources' )
                    ->set_collapsed( true )
                    ->add_fields( 'resource', 'Resource', array(
                        Field::make( 'image', 'resource_image', 'Resource Image' )
                            ->set_value_type( 'url' ),
                        Field::make( 'text', 'resource_description', 'Resource Desicription' ),
                        Field::make( 'text', 'resource_link_text', 'Resource Link Text' ),
                        Field::make( 'text', 'resource_link_url', 'Resource Link URL' ),
                    ))
                ))
        ) );
}