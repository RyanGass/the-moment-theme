<?php
/* Template Name: Industries */ 

get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
	<main>
		<section id="gutenberg-content" class="w-11/12 max-w-screen-lg mx-auto">
			<div class="gutenberg-content"><?php the_content();?></div>
		</section>
		<?php $section_multiples = 0; while ( have_posts() ) : the_post();
			$sections = carbon_get_the_post_meta( 'crb_sections' );
			global $sections;
			foreach ( $sections as $section ) {
				get_template_part('templates/template-parts/sections/section', 'INDEX'); 
			}
		endwhile; ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
