<?php get_header(); ?> 
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
<div id="category-wrapper">
	<ul class="blog-topics">
		<li class="topic">Filter by Topics</li>
		<ul>
	<?php 

	$categories = get_categories( array(
		'orderby' => 'name',
		'parent'  => 0
	) );

	foreach ( $categories as $category ) {
		printf( '<li><a href="%1$s">%2$s</a></li>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_html( $category->name )
		);
	}

	?>
		</ul>
	</ul>
</div>
<main class="mt-8">
    <section id="posts-container" class="pt-24 posts-container pb-28 style-two">
		<div id="post-block-wrapper" class="w-11/12 max-w-screen-xl mx-auto">
			<div id="articles-wrapper" class="grid lg:grid-cols-3">
				<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
				<?php query_posts('cat=' . $exclude .'&paged=' . $paged); ?>
				<?php if (have_posts()) : $i = 1; while (have_posts()) : the_post();?>
				<?php get_template_part('templates/template-parts/blog/blog', 'content'); ?>
				<?php endwhile; ?>
			</div>
			<?php get_template_part('templates/template-parts/blog/blog', 'pagination'); ?>
			<?php else : ?>
			<h2>Page not Found</h2>
			<p>We're sorry, but the page you're looking for isn't here.</p>
			<p>Try searching for the page you are looking for or using the navigation in the header or sidebar</p>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer() ?>
<script>
	var body = document.querySelector('body');
	var show_categories = document.querySelector('.blog-topics');

	body.addEventListener("click", function () {
		show_categories.classList.remove('active');
	}, false);
	show_categories.addEventListener("click", function (ev) {
		show_categories.classList.add('active');
		ev.stopPropagation(); //this is important! If removed, both click events will occur
	}, false);
</script>