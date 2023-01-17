<?php 
global $section;
$category = $section['post_categories'];
if ($category == 'all') {
	$category = '';
};
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
?>

<section id="posts-container">
		<div id="section-header"<?php echo $subtext ?>>
			<h2 class="w-full lg:w-7/12 mx-auto text-center section-title small"><?php echo $section['heading']; ?></h2>
			<?php if ($content) : echo '<p class="w-full lg:w-7/12 mx-auto text-center">' . $section['content'] . '</p>'; endif; ?>
		</div>
		<?php

			$query_args = array(
				'posts_per_page' => 3,
				'post_type' => 'post',
				'post_status' => 'publish',
				'category__in' => $category,
			);
			$query = new WP_Query($query_args);
		?>
		<div id="post-block-wrapper" class="w-full md:w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php $i = 1; while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article class="w-full md:w-11/12 mx-auto my-6 text-left bg-white lg:mb-0">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="post-image">
							<?php if ( has_post_thumbnail() ) { ?>
								<img class="w-full" src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" />
							<?php } ?>
						</div>
						<div class="post-text">
							<h3><?php the_title(); ?></h3>
								<?php  

								$current_post_id = get_the_ID(); // id of current post in the loop
								$permalink = get_permalink( $current_post_id );
								$title = get_the_title( $current_post_id );  

								echo '<p class="blog-excerpt">' . excerpt(15) . '</p><span class="read-more btn secondary">Keep Reading</span>' ?>
						</div>
					</a>	
				</article>
				<?php $i++; endwhile; wp_reset_query(); ?>
			</div>
			<div class="more-link grid-item">
				<a href="<?php echo $section['button_url']; ?>" class="btn primary mx-auto"><?php echo $section['button_text']; ?></a>
			</div>
		</div>
</section>