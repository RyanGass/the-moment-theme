<?php // Blogroll Content 
$post_date = get_the_date('M j, Y');
global $i;
?>

<article> 
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
    <?php } ?>
    <div class="post-categories">
        <?php $category = get_the_category(); 
            for	($c = 0; $c < count($category); $c++) {
            echo '<a class="cat-link" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>' ?>
        <?php } ?>
    </div>
    <div class="post-text">
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="unstyled"><?php the_title(); ?></a></h3>
        
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