<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Resources Page Custom Fields (page-resources.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options_resources' );
function crb_attach_post_options_resources() {
    Container::make( 'post_meta', __( 'Resources', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/page-resources.php')
        ->add_fields(array(
            Field::make( 'complex', 'resource_cards', 'Resource Cards' )
                ->set_collapsed( true )
                ->add_fields('resource_card', 'Resource Card', array(
                    Field::make( 'image', 'card_image', 'Image' )
                        ->set_value_type( 'url' ),
                    Field::make( 'radio', 'card_category', 'Resource Category' )
                        ->add_options( array(
                            'featured' => 'Featured',
                            'ebook' => 'eBook',
                            'guide' => 'Guide',
                            'infographic' => 'Infographic',
                            'video' => 'Video',
                            'whitepaper' => 'Whitepaper',
                        ) ),
                    Field::make( 'text', 'card_title', 'Title' ),
                    Field::make( 'text', 'card_excerpt', 'Excerpt' ),
                    Field::make( 'text', 'card_link_text', 'Link Text' ),
                    Field::make( 'text', 'card_link_url', 'Link URL' )
                ) )  
        ) );
}