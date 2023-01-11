<?php 
global $section;
$category = $section['post_categories'];
if ($category == 'all') {
	$category = '';
};
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
?>

<?php if ($section['post_style'] == 'one') { ?>
<section id="posts-container" class="pt-0 pb-12">
		<div id="section-header"<?php echo $subtext ?>>
			<h2 class="w-10/12 mx-auto text-center section-title small"><?php echo $section['heading']; ?></h2>
			<?php if ($content) : echo '<p class="w-10/12 mx-auto text-center">' . $section['content'] . '</p>'; endif; ?>
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
		<div id="post-block-wrapper" class="w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php $i = 1; while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article class="w-11/12 mx-auto mt-6 mb-6 text-left bg-white lg:mb-0">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<div class="post-image">
							<?php if ( has_post_thumbnail() ) { ?>
								<img class="w-full" src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" />
							<?php } ?>
						</div>
						<div class="p-6 post-text">
							<h3><?php the_title(); ?></h3>
								<?php  

								$current_post_id = get_the_ID(); // id of current post in the loop
								$permalink = get_permalink( $current_post_id );
								$title = get_the_title( $current_post_id );  

								echo '<p class="blog-excerpt">' . excerpt(15) . '</p><span class="read-more">Keep Reading</span>' ?>
						</div>
					</a>	
				</article>
				<?php $i++; endwhile; wp_reset_query(); ?>
			</div>
			<div class="more-link grid-item">
				<a href="<?php echo $section['button_url']; ?>" class="button link"><?php echo $section['button_text']; ?></a>
			</div>
		</div>
</section>	
<?php } ?>
<?php if ($section['post_style'] == 'two') { ?>
<section id="posts-container" class="pt-0 pb-12 posts-container style-two">
		<div id="section-header"<?php echo $subtext ?>>
			<h2 class="w-10/12 mx-auto text-center section-title small"><?php echo $section['heading']; ?></h2>
			<?php if ($content) : echo '<p class="w-10/12 mx-auto text-center">' . $section['content'] . '</p>'; endif; ?>
		</div>
		<?php

			$query_args = array(
				'posts_per_page' => 2,
				'post_type' => 'post',
				'post_status' => 'publish',
				'category__in' => $category,
			);
			$query = new WP_Query($query_args);
		?>
		<div id="post-block-wrapper" class="w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php $i = 1; while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article class="w-11/12 mx-auto mt-6 mb-6 text-left bg-white lg:mb-0">
					
						
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
						<?php } ?>
						
						
						<div class="px-6 pt-6 post-categories">
							<?php $category = get_the_category(); 
								for	($c = 0; $c < count($category); $c++) {
								echo '<a class="inline-block px-2 pt-1 text-center uppercase bg-primary" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>' ?>
							<?php } ?>
						</div>

						<div class="p-6 post-text">
							<h3><?php the_title(); ?></h3>
							
							<div class="post-meta">
								<span class="post-author text-primary">By <?php the_author(); ?></span>
								<span class="post-date"> / <?php echo $post_date ?></span>
							</div>

							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="button red">
								<?php  

								$current_post_id = get_the_ID(); // id of current post in the loop
								$permalink = get_permalink( $current_post_id );
								$title = get_the_title( $current_post_id );  

								echo 'Continue Reading' ?>
							</a>
						</div>	
				</article>
				<?php $i++; endwhile; wp_reset_query(); ?>
				<article class="w-11/12 mx-auto mt-6 mb-0 text-left bg-primary post-cta-block">
					<div class="subscribe-form-wrapper">
						<h3>Subscribe and stay up to date</h3>
						<div class="subscribe-form">
							<script src="//157-RPM-092.mktoweb.com/js/forms2/js/forms2.min.js"></script>
							<form id="mktoForm_1012" class="!w- "></form> 
							<script>
							MktoForms2.loadForm("//157-RPM-092.mktoweb.com", "157-RPM-092", 1012);
							</script>
						</div>
						<small>Stay up to date on all things Service Fusion</small>
					</div>
				</article>
			</div>
			<div class="more-link grid-item">
				<a href="<?php echo $section['button_url']; ?>" class="button link"><?php echo $section['button_text']; ?></a>
			</div>
		</div>
</section>	
<?php } ?>