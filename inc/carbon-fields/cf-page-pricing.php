<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Pricing Page Custom Fields (page-pricing.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options_pricing' );
function crb_attach_post_options_pricing() {
    Container::make( 'post_meta', __( 'Pricing Tiers', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'templates/page-pricing.php')
        ->add_fields(array(
            Field::make( 'complex', 'crb_pricing_tiers', 'Pricing Cards' )
                ->set_collapsed( true )
                ->set_min('3')
                ->set_max('3')
                 ->add_fields('price_card', 'Pricing Card', array(
                    Field::make( 'checkbox', 'most_popular', 'Most Popular?' )
                        ->set_option_value( 'yes' ),
                    Field::make( 'complex', 'crb_pricing_tiers_sections', 'New Section' )
                         ->set_collapsed( true )
                    ->add_fields( 'pricing_top', array(
                        Field::make( 'text', 'top_title', 'Title' ),
                        Field::make( 'text', 'top_price', 'Annual Price' ),
                        Field::make( 'text', 'top_price_monthly', 'Monthly Price' ),
                        Field::make( 'rich_text', 'top_content', 'Annual Content' ),
                        Field::make( 'rich_text', 'top_content_monthly', 'Monthly Content' )
                    ) )  
                    ->add_fields( 'pricing_features', array(
                        Field::make( 'text', 'features_title', 'Title' ),
                        Field::make( 'rich_text', 'features_content', 'Features List' )
                    ) )
                    ->add_fields('pricing_more', array(
                        Field::make('text', 'more_title', 'Title' ),
                        Field::make('rich_text', 'more_list', 'List')
                    ))
                ) )
        ) );
}