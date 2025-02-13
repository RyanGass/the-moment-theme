<?php // When using an "available component", move the section file into the "sections" directory so it's easy to see which sections are being used. Comment out any unused "case" inside the switch statement
	global $section;
	switch ( $section['_type'] ) {
		case 'section-template':
		
			get_template_part('templates/template-parts/sections/section', 'STARTER-TEMPLATE');
			
			break;
		case 'text-image':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'text-image');
			
			break;
		case 'text-video':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'text-video');
			
			break;
		case 'text-button':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'text-button');
			
			break;
		case 'free-form':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'free-form');
			
			break;
		case 'accolades':

			get_template_part('templates/template-parts/sections/available-components/section', 'accolades');

			break;
		case 'feature-cards':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'feature-cards');
			
			break;
		case 'testimonial-single':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'testimonial-single');
			
			break;
		case 'recent-posts':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'recent-posts');
			
			break;
		case 'form':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'form');
			
			break;
		case 'video-single':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'video-single');
			
			break;
		case 'image-single':
		
			get_template_part('templates/template-parts/sections/available-components/section', 'image-single');
			
			break;
		case 'faq-section':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'faq');
			
			break;
		case 'stats-counter-section':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'stats-counter');
			
			break;
		case 'blockquote':
			
			get_template_part('templates/template-parts/sections/available-components/section', 'blockquote');
			
			break;
	}

?>
		