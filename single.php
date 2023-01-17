<?php 
$facebook = carbon_get_theme_option( 'facebook' );
$twitter = carbon_get_theme_option( 'twitter' );
$instagram = carbon_get_theme_option( 'instagram' );
$linkedin = carbon_get_theme_option( 'linkedin' );
?>
<?php get_header(); ?> 
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
<main>
	<section class="relative flex flex-col items-center w-full px-6 mx-auto lg:max-w-3xl lg:block scroll-setter">
		<div id="social-sharing" class="order-2 lg:absolute lg:order-1 -left-32">
			<div id="social-sharing-inner" class="social-sharing-wrapper lg:block" style="position: relative; top: 0px;">
				<p>SHARE</p>
				<div class="flex lg:block social-icon-wrapper">
					<a class="share_facebook" title="facebook" target="popup" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Facebook Share','width=600,height=400')"></a>
					<a class="share_twitter" title="twitter" target="popup" onclick="window.open('https://twitter.com/home?status=The Future of an On-the-Go Workforce That Utilizes Plumbing Dispatch Software+<?php the_permalink(); ?>','Twitter Share','width=600,height=400')"></a>
					<a class="share_linkedin" title="linkedin" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>','LinkedIn Share','width=600,height=400')"></a>
					<a class="share_email" href="mailto:?body=<?php the_permalink(); ?>" title="email"></a>
				</div>
			</div>
    	</div>
		<div id="post-content" class="order-1 float-right max-w-3xl lg:order-2 lg:-mt-14">
			<?php if ( has_post_thumbnail() ) { ?>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="Attorney Portrait">
			<?php } ?>
			<div id="post-meta" class="flex py-12">
				<div class="flex post-author basis-1/2">
					<img class="sm:mr-4" src="/wp-content/uploads/2022/10/SF_Logo_Part_1_large.png" alt="Service Fusion Logo" width="80" />
					<div>
						<span class="uppercase text-light-gray meta-heading">Written By</span> 
						<span class="block text-primary meta-author"><?php the_author(); ?></span>
					</div>
				</div>
				<div class="uppercase post-categories basis-1/2 meta-heading">Topic</span>
					<span class="block text-light-gray">
					<?php $category = get_the_category(); 
						for	($c = 0; $c < count($category); $c++) {
						echo '<a class="text-primary" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>,' ?>
					<?php } ?>
				</div>
			</div>
			<?php the_content();?>
		</div>
		<div id="post-navigation" class="order-3 clear-both">
			<?php the_post_navigation( array(
			'prev_text'   => __( 'Previous Post' ),
			'next_text'   => __( 'Next Post' ),
			) );
			?>
		</div>
	</section>
	<section id="posts-container" class="pt-24 posts-container pb-28 style-two">
		<div id="section-header">
			<h2 class="w-full lg:w-7/12 mx-auto text-center section-title small">Related Posts</h2>
		</div>
		<?php

			$query_args = array(
				'posts_per_page' => 3,
				'post_type' => 'post',
				'post_status' => 'publish',
				// 'category__in' => $category,
			);
			$query = new WP_Query($query_args);
		?>
		<div id="post-block-wrapper" class="w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article class="w-11/12 mx-auto mt-6 mb-0 text-left bg-white">
						
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-image" style="background-image:url(<?php the_post_thumbnail_url('medium'); ?>);"></div>
						<?php } ?>
						
						
						<div class="px-6 pt-6 post-categories">
							<?php $category = get_the_category(); 
								for	($c = 0; $c < count($category); $c++) {
								echo '<a class="inline-block px-2 pt-1 text-center text-white uppercase bg-primary hover:bg-secondary" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>' ?>
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
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>

<script>
	
function socialShareButtonsScroll() {
	const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	const share = document.getElementById('social-sharing-inner');
	if (vw >= 1024) {
		let scrollerTop = document.getElementById("post-content").getBoundingClientRect().top;
		let relatedPosts = document.getElementById('articles-wrapper').getBoundingClientRect().top;
		
		if (relatedPosts <= window.innerHeight) {
			share.style.cssText = 'position:fixed;top:120px;';
		}

		if (relatedPosts > window.innerHeight && scrollerTop <= 0 ) {
			share.style.cssText = 'position:fixed;top:120px;';
		} else {
			share.style.cssText = 'position:relative;top:0;'; 
		}
	}
}

function socialShareButtonsResize() {
	const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	const share = document.getElementById('social-sharing-inner');
	console.log(vw);
	if (vw <= 1023) {
		share.style.cssText = 'position:static;';
	} 
}
window.onscroll = socialShareButtonsScroll;
window.onresize = socialShareButtonsResize;
</script>

<style>
	#social-sharing-inner {
		position: relative;
		-webkit-transition: top .5s;
		transition: top .5s;
	}
</style>