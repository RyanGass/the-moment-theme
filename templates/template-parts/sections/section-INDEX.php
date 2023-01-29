<?php       
                global $section;
                switch ( $section['_type'] ) {
					case 'text-image':
					
						get_template_part('templates/template-parts/sections/section', 'text-image');
						
						break;
					case 'text-video':
					
						get_template_part('templates/template-parts/sections/section', 'text-video');
						
						break;
					case 'text-button':
					
						get_template_part('templates/template-parts/sections/section', 'text-button');
						
						break;
					case 'feature-cards':
						
						get_template_part('templates/template-parts/sections/section', 'feature-cards');
						
						break;
					case 'features-2':
						
						get_template_part('templates/template-parts/sections/section', 'feature-cards-2');
						
						break;
					case 'testimonial-cards':
						
						get_template_part('templates/template-parts/sections/section', 'testimonial-cards');
						
						break;
					case 'testimonial-image-slider':
						
						get_template_part('templates/template-parts/sections/section', 'testimonial-image-slider');
						
						break;
					case 'testimonial-single':
						
						get_template_part('templates/template-parts/sections/section', 'testimonial-single');
						
						break;
					case 'recent-posts':
						
						get_template_part('templates/template-parts/sections/section', 'recent-posts');
						
						break;
					case 'form':
						
						get_template_part('templates/template-parts/sections/section', 'form');
						
						break;
					case 'video-single':
					
						get_template_part('templates/template-parts/sections/section', 'video-single');
						
						break;
					case 'faq-section':
						
						get_template_part('templates/template-parts/sections/section', 'faq');
						
						break;
					case 'stats-counter-section':
						
						get_template_part('templates/template-parts/sections/section', 'stats-counter');
						
						break;
					case 'blockquote':
						
						get_template_part('templates/template-parts/sections/section', 'blockquote');
						
						break;
				}
			
			?>
		