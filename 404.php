<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Service_Fusion_2022
 */

get_header() ?>

<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
<main>
	<section id="posts-container">
		<h2>While you're here, check out some of our latest blog posts</h2>
		<?php

			$query_args = array(
				'posts_per_page' => 3,
				'post_type' => 'post',
				'post_status' => 'publish',
				'category__in' => $category,
			);
			$query = new WP_Query($query_args);
		?>
		<div id="post-block-wrapper">
			<div id="articles-wrapper" class="grid lg:grid-cols-3 gap-6">
				<?php $i = 1; while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="post-image">
							<?php if ( has_post_thumbnail() ) { ?>
								<img class="w-full" src="<?php the_post_thumbnail_url('medium'); ?>" alt="Featured Image" />
							<?php } ?>
						</div>
						<div class="post-text">
							<h3><?php the_title(); ?></h3>
								<?php  

								$current_post_id = get_the_ID(); // id of current post in the loop
								$permalink = get_permalink( $current_post_id );
								$title = get_the_title( $current_post_id );  

								echo '<p class="blog-excerpt">' . excerpt(15) . '</p><span class="btn primary read-more">Keep Reading</span>' ?>
						</div>
					</a>	
				</article>
				<?php $i++; endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</section>	
</main>
<?php
get_footer();