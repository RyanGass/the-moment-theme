<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

// Default Page Custom Fields (page.php)

add_action( 'carbon_fields_register_fields', 'crb_attach_post_options' );
function crb_attach_post_options() {
    // For Recent Posts
    $all_categories = array('all' => 'All Categories');
    $categories = get_categories('orderby=name&hide_empty=0');
    foreach ($categories as $category):
        $catids = $category->term_id;
        $catname = $category->name;
        $all_categories[$catids] = $catname;
    endforeach;
    Container::make( 'post_meta', __( 'Page Sections', 'crb' ) )
        ->where( 'post_type', '=', 'page' )
        ->where( 'post_template', '=', 'default')
        ->or_where( 'post_template', '=', 'templates/page-pricing.php')
        ->or_where( 'post_template', '=', 'templates/page-resources.php')
        ->or_where( 'post_template', '=', 'templates/page-industries.php')
        ->add_fields( array(
            Field::make( 'complex', 'crb_sections', 'Sections' )
                ->set_collapsed( true )

                // Text w/ Image
                ->add_fields( 'text-image', 'Text w/ Image', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'radio', 'image_alignment', 'Set Image Alignment' )
                        ->add_options( array(
                            'left' => 'Left',
                            'right' => 'Right',
                        ) ),
                    Field::make( 'text', 'pre_heading', 'Pre Heading' ),
                    Field::make( 'text', 'heading', 'Heading' ),
                    Field::make( 'rich_text', 'content', 'Content' ),
                    Field::make( 'image', 'image', 'Image' )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'button_text', 'Button Text' ),
                    Field::make( 'text', 'button_url', 'Button URL' ),
                ) )

                // Text w/ Video
                ->add_fields( 'text-video', 'Text w/ Video', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'radio', 'video_alignment', 'Set Video Alignment' )
                    ->add_options( array(
                        'left' => 'Left',
                        'right' => 'Right',
                        'center' => 'Center',
                    ) ),
                    Field::make( 'text', 'pre_heading', 'Pre Heading' ),
                    Field::make( 'text', 'heading', 'Heading' ),
                    Field::make( 'rich_text', 'content', 'Content' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_alignment',
                                'value' => 'right',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'video_alignment',
                                'value' => 'left',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make('radio', 'video_service', 'Video Service')
                        ->add_options(array(
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'hosted' => 'Hosted'
                        )),
                    Field::make( 'image', 'video_image', 'Screenshot' )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'video_url', 'Video URL' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'hosted',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'vimeo_id', 'Vimeo ID' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'vimeo',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'youtube_id', 'Youtube ID')
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'youtube',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'button_text', 'Button Text' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_alignment',
                                'value' => 'right',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'video_alignment',
                                'value' => 'left',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'button_url', 'Button URL' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_alignment',
                                'value' => 'right',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'video_alignment',
                                'value' => 'left',
                                'compare' => '=',
                            )
                        ) ),
                ) )

                // Text w/ Button
                ->add_fields( 'text-button', 'Text w/ Button', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'pre_heading', 'Pre Heading' ),
                    Field::make( 'text', 'heading', 'Heading' ),
                    Field::make( 'rich_text', 'content', 'Content' ),
                    Field::make( 'text', 'button_text', 'Button Text' ),
                    Field::make( 'text', 'button_url', 'Button URL' ),
                ) )
                
                // Feature Cards
                ->add_fields( 'feature-cards', 'Feature Cards', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'heading', 'Section Heading' ),
                    Field::make( 'text', 'content', 'Section Content' ),
                    Field::make( 'radio', 'image_size', 'Image Size' )
                        ->add_options( array(
                            'sm' => 'Small',
                            'md' => 'Medium',
                            'full' => 'Full',
                        ) ),
                    Field::make( 'complex', 'crb_features', 'Feature Cards' )
                        ->set_collapsed( true )
                        ->add_fields( 'feature-card', 'Feature Card', array(
                            Field::make( 'image', 'featured_image', 'Image' )
                                ->set_value_type( 'url' ),
                            Field::make( 'text', 'featured_heading', 'Heading' ),
                            Field::make( 'textarea', 'featured_content', 'Content' ),
                            Field::make( 'text', 'button_url', 'Button URL' ),
                            Field::make( 'text', 'button_text', 'Button Text' )
                        ) ),
                    Field::make( 'text', 'button_text', 'Section Button Text' ),
                    Field::make( 'text', 'button_url', 'Section Button URL' )
                ) )

                // Feature Cards Style 2
                ->add_fields( 'features-2', 'Feature Cards 2', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'heading', 'Section Heading' ),
                    Field::make( 'text', 'content', 'Section Content' ),
                    Field::make( 'complex', 'features-2', 'Features' )
                        ->set_collapsed( true )
                        ->set_min('3')
                        ->set_max('6')
                        ->add_fields( 'feature', 'Feature', array(
                            Field::make( 'image', 'image', 'Image' )
                                ->set_value_type( 'url' ),
                            Field::make( 'text', 'heading', 'Heading' ),
                            Field::make( 'text', 'link_url', 'Button URL' )
                        ) )
                ) )

                // Testimonial Cards
                ->add_fields( 'testimonial-cards', 'Testimonial Cards', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'heading', 'Section Heading' ),
                    Field::make( 'text', 'content', 'Section Content' ),
                    Field::make( 'radio', 'testimonial_number', 'How Many Testimonials to Show' )
                            ->add_options( array(
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                            ) ),
                    Field::make( 'complex', 'crb_testimonials', 'Testimonial Cards' )
                        ->set_collapsed( true )
                        ->set_min('2')
                        ->add_fields( 'testimonial-card', 'Testimonial Card', array(
                            Field::make( 'image', 'testimonial_image', 'Image' )
                                ->set_value_type( 'url' ),
                            Field::make( 'textarea', 'testimonial_content', 'Content' ),
                            Field::make( 'text', 'testimonial_name', 'Name' ),
                            Field::make( 'text', 'testimonial_company', 'Company' )
                        ) )
                ) )

                // Image/Text Slider
                ->add_fields( 'testimonial-image-slider', 'Testimonial Image Slider', array(
                    Field::make( 'radio', 'use_bg_overlay', 'Use Transparent Overlay?' )
                    ->set_default_value( 'no' )    
                    ->add_options( array(
                            'no' => 'No',
                            'yes' => 'Yes',
                        ) ),
                    Field::make( 'radio', 'slider_navigation', 'Slider Navigation' )
                            ->add_options( array(
                                'dots' => 'Dots',
                                'arrows' => 'Arrows',
                                'both' => 'Both',
                            ) ),
                    Field::make( 'radio', 'slider_text_location', 'Text Below Images?' )
                            ->add_options( array(
                                'no' => 'No',
                                'yes' => 'Yes',
                            ) ),
                    Field::make( 'text', 'slide_duration', 'Slide Duration (Seconds)' ),
                    Field::make( 'complex', 'crb_testimonial_slider', 'Testimonial Slider' )
                        ->set_collapsed( true )
                        ->add_fields( 'testimonial-slide', 'Testimonial Slide', array(
                            Field::make( 'image', 'testimonial_image', 'Image' )
                                ->set_value_type( 'url' ),
                            Field::make( 'textarea', 'testimonial_content', 'Quote' ),
                            Field::make( 'text', 'testimonial_name', 'Name' ),
                            Field::make( 'text', 'testimonial_company', 'Company' ),
                        ) )
                ) )

                // Testimonial Single
                ->add_fields( 'testimonial-single', 'Testimonial Single', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'image', 'testimonial_image', 'Image' )
                        ->set_value_type( 'url' ),
                    Field::make( 'textarea', 'testimonial_content', 'Content' ),
                    Field::make( 'text', 'testimonial_name', 'Name' ),
                    Field::make( 'text', 'testimonial_company', 'Company' ) 
                ) )

                // Contact Form / Marketo Form
                ->add_fields( 'form', 'Contact Form', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'radio', 'form_type', 'What Type of Form?' )
                                ->add_options( array(
                                    'embed' => 'Embed',
                                    'mkto' => 'Marketo',
                                    'gravity' => 'Gravity Forms',
                                    'cf7' => 'Contact Form 7'
                            ) ),
                            Field::make( 'text', 'form_title', 'Form Title' ),
                            Field::make( 'text', 'mkto-form-id', 'Marketo Form ID' )
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
                            'relation' => 'OR',
                                array(
                                    'field' => 'form_type',
                                    'value' => 'embed',
                                    'compare' => '=',
                                )
                            ) ),
                            Field::make( 'text', 'gf-form-id', 'Gravity Forms ID' )
                            ->set_conditional_logic( array(
                            'relation' => 'OR',
                                array(
                                    'field' => 'form_type',
                                    'value' => 'gravity',
                                    'compare' => '=',
                                )
                            ) ),
                            Field::make( 'text', 'cf-7-form-id', 'Contact Form 7 ID' )
                            ->set_conditional_logic( array(
                            'relation' => 'OR',
                                array(
                                    'field' => 'form_type',
                                    'value' => 'cf7',
                                    'compare' => '=',
                                )
                            ) ),
                ) )

                // Recent Posts
                ->add_fields( 'recent-posts', 'Recent Posts', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'select', 'post_categories', 'Show Categories' )
                        ->add_options( $all_categories ),
                    Field::make( 'text', 'heading', 'Section Heading' ),
                    Field::make( 'text', 'content', 'Section Content' ),
                    Field::make( 'text', 'button_text', 'Section Button Text' ),
                    Field::make( 'text', 'button_url', 'Section Button URL' )
                ) )

                // Video Single
                ->add_fields( 'video-single', 'Single Video', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make('radio', 'video_service', 'Video Service')
                        ->add_options(array(
                            'youtube' => 'YouTube',
                            'vimeo' => 'Vimeo',
                            'hosted' => 'Hosted'
                        )),
                    Field::make( 'image', 'video_image', 'Screenshot' )
                        ->set_value_type( 'url' ),
                    Field::make( 'text', 'video_url', 'Video URL' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'hosted',
                                'compare' => '=',
                            )
                        ) )
                    ->set_help_text( 'Ex: /wp-content/themes/briostack/assets/videos/bbb.mp4' ),
                    Field::make( 'text', 'vimeo_id', 'Vimeo ID' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'vimeo',
                                'compare' => '=',
                            )
                        ) )
                    ->set_help_text( 'Ex: aqz-KE-bpKQ' ),
                    Field::make( 'text', 'youtube_id', 'Youtube ID')
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_service',
                                'value' => 'youtube',
                                'compare' => '=',
                            )
                        ) )
                    ->set_help_text( 'Ex: aqz-KE-bpKQ' ),
                    Field::make( 'text', 'button_text', 'Button Text' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_alignment',
                                'value' => 'right',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'video_alignment',
                                'value' => 'left',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'button_url', 'Button URL' )
                    ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'video_alignment',
                                'value' => 'right',
                                'compare' => '=',
                            ),
                            array(
                                'field' => 'video_alignment',
                                'value' => 'left',
                                'compare' => '=',
                            )
                        ) ),
                ) )

                // FAQ Section
                ->add_fields( 'faq-section', 'FAQs', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'heading', 'Section Heading' ),
                    Field::make( 'text', 'content', 'Section Content' ),
                    Field::make( 'complex', 'faq_cards', 'FAQ Cards' )
                        ->set_collapsed( true )
                        ->add_fields( 'faq-card', 'Q & A', array(
                            Field::make( 'text', 'faq_question', 'Question' ),
                            Field::make( 'textarea', 'faq_answer', 'Answer' )
                        ) )
                ) )

                // Stats Counter Section
                ->add_fields( 'stats-counter-section', 'Stats Counter', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'complex', 'stats_blocks', 'Stats Blocks' )
                        ->set_collapsed( true )
                        ->add_fields( 'stats-block', 'Stats Block', array(
                            Field::make( 'text', 'stat_value', 'Stat Value' ),
                            Field::make( 'text', 'stat_label', 'Stat Label' ),
                            Field::make( 'checkbox', 'prefix', 'Prefix with $' ),
                            Field::make( 'checkbox', 'postfix_plus', 'Postfix with +' ),
                            Field::make( 'checkbox', 'postfix_percent', 'Postfix with %' ),
                            Field::make( 'radio', 'value_measure', 'Value Measure' )
                                ->add_options( array(
                                    'K' => 'Thousand (K)',
                                    'M' => 'Million (M)',
                                    'B' => 'Billion (B)',
                                    'N' => 'None',
                                ) )
                        ) )
                ) )

                // BlockQuote
                ->add_fields( 'blockquote', 'Blockquote', array(
                    Field::make('radio', 'use_background_color', 'Use Backgrond Color?')
                        ->add_options(array(
                            'no' => 'No',
                            'yes' => 'Yes'
                        )),
                    Field::make( 'color', 'background_color', 'Background Color' )
                        ->set_palette( array( '#960F0F', '#818285', '#EEEEEE', '#333333', '#101010' ) )
                        ->set_conditional_logic( array(
                        'relation' => 'OR',
                            array(
                                'field' => 'use_background_color',
                                'value' => 'yes',
                                'compare' => '=',
                            )
                        ) ),
                    Field::make( 'text', 'quote_text', 'Quote Text' ),
                    Field::make( 'text', 'quote_cite', 'Quote Cite' ),
                ) )
                
        ) );

}