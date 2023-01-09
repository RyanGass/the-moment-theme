<!-- Without Numbers -->
<!-- <nav class="pagination">
	<ul class="nolist">
		<li><?php previous_posts_link(); ?></li>
		<li><?php next_posts_link(); ?></li>	
	</ul>
</nav> -->

<!-- With Numbers -->
<nav class="pagination">
	<?php the_posts_pagination( array(
	'screen_reader_text' => ' ', 
    'mid_size'  => 2,
    'prev_text' => __( 'Previous', 'textdomain' ),
    'next_text' => __( 'Next', 'textdomain' ),
) ); ?>
</nav>