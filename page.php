<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Service_Fusion_2022
 */
get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
	<main>
		<?php if( '' !== get_post()->post_content ) : ?>
		<section id="gutenberg-content">
			<div class="container-inner">
				<div class="gutenberg-content"><?php the_content();?></div>
			</div>
		</section>
		<?php endif; ?>
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
