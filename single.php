<?php 
$facebook = carbon_get_theme_option( 'facebook' );
$twitter = carbon_get_theme_option( 'twitter' );
$instagram = carbon_get_theme_option( 'instagram' );
$linkedin = carbon_get_theme_option( 'linkedin' );
$toc = carbon_get_the_post_meta('show_toc');
if ($toc == 'yes') { $toc_on = ' toc-width'; } else { $toc_on = '';};
?>
<?php get_header(); ?> 
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
<main>
	<section id="blog-post-wrapper" class="relative flex flex-col items-center w-full mx-auto lg:max-w-3xl lg:block scroll-setter<?php echo $toc_on ?>">
		<div id="social-sharing" class="lg:absolute">
			<div id="social-sharing-inner" class="social-sharing-wrapper lg:block" style="position: relative; top: 0px;">
				<div class="flex lg:block social-icon-wrapper">
					<a class="share_facebook" title="facebook" target="popup" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Facebook Share','width=600,height=400')">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
					</a>
					<a class="share_twitter" title="twitter" target="popup" onclick="window.open('https://twitter.com/home?status=The Future of an On-the-Go Workforce That Utilizes Plumbing Dispatch Software+<?php the_permalink(); ?>','Twitter Share','width=600,height=400')">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
					</a>
					<a class="share_linkedin" title="linkedin" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>','LinkedIn Share','width=600,height=400')">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
					</a>
				</div>
			</div>
    	</div>
		<div id="post-content" class="float-right max-w-full">
			<?php if ( has_post_thumbnail() ) { ?>
				<img src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" class="featured-image">
			<?php } ?>
			<?php the_content();?>
			<!-- Post Author Box -->
            <?php 
                $author_id = $post->post_author;
                $headshot = carbon_get_user_meta( $author_id, 'headshot' );
                $bio_content = carbon_get_user_meta( $author_id, 'bio_content' );
                $display_name = carbon_get_user_meta( $author_id, 'display_name' );
            ?>
            <div id="post-author" class="grid-container-12">
				<div id="author-image">
                	<img src="<?php echo $headshot; ?>" alt="Author Photo" />
				</div>
				<div id="author-content">
					<h4 id="author-name"><?php echo $display_name; ?></h4>
					<?php echo $bio_content; ?>
				</div>
            </div>
            <!-- End Post Author Box -->
		</div>
		<div id="post-toc" class="lg:absolute<?php echo $toc_on; ?>">
			<div id="post-toc-inner">
				<h5>Navigation</h5>
				<ul id="toc-list">
				
				</ul>
			</div>
		</div>
	</section>
	<section id="posts-container" class="clear-both posts-container">
		<div id="section-header">
			<h2 class="w-full lg:w-7/12 mx-auto text-center section-title small">Related Posts</h2>
		</div>
		<?php
			global $post;
			$cats = wp_get_post_categories( get_the_ID(), array( 'fields' => 'ids' ) );
			$category_id = $cats[0];

			$query_args = array(
				'posts_per_page' => 3,
				'post_type' => 'post',
				'post_status' => 'publish',
				'category__in' => $category_id,
			);
			$query = new WP_Query($query_args);
		?>
		<div id="post-block-wrapper" class="w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php while($query->have_posts()) : $query->the_post(); $post_date = get_the_date('M j, Y'); ?>	
				<article class="w-11/12 mx-auto">
						
						<div class="post-image">
							<?php if ( has_post_thumbnail() ) { ?>
								<img class="w-full" src="<?php the_post_thumbnail_url(); ?>" alt="Featured Image" />
							<?php } ?>
						</div>
						
						
						<!-- <div class="post-categories">
							<?php //$category = get_the_category(); 
								//for	($c = 0; $c < count($category); $c++) {
								//echo '<a class="inline-block" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>' ?>
							<?php //} ?>
						</div> -->

						<div class="post-text">
							<h3><?php the_title(); ?></h3>
							
							<div class="post-meta">
								<span class="post-author">By <?php the_author(); ?></span>
								<span class="post-date"> / <?php echo $post_date ?></span>
							</div>

							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn primary">
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

function toc() {
	let collectHeadings = document.querySelectorAll('#post-content h2');
	let collectHeadingsText;
	let tocList = document.getElementById('toc-list');
	let tocListItem;
	let anchor;
	
	for (let i = 0; i < collectHeadings.length; i++) {
		anchor = document.createElement('span');
		anchor.setAttribute('id', 'toc-' + i);
		anchor.setAttribute('class', 'toc-anchor');
		collectHeadings[i].parentNode.insertBefore(anchor, collectHeadings[i]);
		//collectHeadings[i].setAttribute('id', 'toc-' + i);
		tocListItem = document.createElement('li');
		tocListItemA = document.createElement('a');
		tocList.append(tocListItem);
		tocListItem.append(tocListItemA);
		tocListItemA.setAttribute('href', '#toc-' + i);
		tocListItemA.innerText = collectHeadings[i].innerText;
		
		
	}
} window.onload = toc;
	
function socialShareButtonsScroll() {
	const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	const share = document.getElementById('social-sharing-inner');
	const shareOuter = document.getElementById('social-sharing');
	const toc = document.getElementById('post-toc-inner');
	const tocOuter = document.getElementById('post-toc');
	const header_pos = document.querySelector('header');
	if (vw >= 1024) {
		let scrollerTop = document.getElementById("post-content").getBoundingClientRect().top;
		let relatedPosts = document.getElementById('articles-wrapper').getBoundingClientRect().top;

		if (relatedPosts > window.innerHeight && scrollerTop <= 0 && header_pos.classList.contains('fixed') ) {
			share.style.cssText = 'position:fixed;top:120px;';
			toc.style.cssText = 'position:fixed;top:120px;';
		} else if (relatedPosts > window.innerHeight && scrollerTop <= 0 && header_pos.classList.contains('relative') ) {
			share.style.cssText = 'position:fixed;top:0px;';
			toc.style.cssText = 'position:fixed;top:0px;';
		} else {
			share.style.cssText = 'position:relative;top:0;';
			toc.style.cssText = 'position:relative;top:0;';
		}
	}
}

function socialShareButtonsResize() {
	const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
	const share = document.getElementById('social-sharing-inner');
	const toc = document.getElementById('post-toc-inner');
	console.log(vw);
	if (vw <= 1023) {
		share.style.cssText = 'position:static;';
		toc.style.cssText = 'position:static;';
	} 
}
window.onscroll = socialShareButtonsScroll;
window.onresize = socialShareButtonsResize;
</script>

<style>
	#post-toc {
		right: 105%;
    	display: flex;
    	justify-content: end;
		width: 350px!important;
	}
	#social-sharing {
		left: 105%;
		display: flex;
    	justify-content: start;
	}
	#social-sharing-inner,
	#post-toc-inner {
		position: relative;
		-webkit-transition: top .5s;
		transition: top .5s;
	}
</style>