<?php // Blogroll Content 
$post_date = get_the_date('M j, Y');
global $i;
?>

<?php if ($i != 3) : ?>
<article class="w-11/12 mx-auto mt-6 mb-0 text-left bg-white"> 
    <?php if ( has_post_thumbnail() ) { ?>
        <div class="post-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
    <?php } ?>
    <div class="px-6 pt-6 post-categories">
        <?php $category = get_the_category(); 
            for	($c = 0; $c < count($category); $c++) {
            echo '<a class="inline-block px-2 pt-1 text-center text-white uppercase bg-primary" href="'.get_category_link( $category[$c]->term_id ).'" title="'.$category[$c]->cat_name.'"">'.$category[$c]->cat_name.'</a>' ?>
        <?php } ?>
    </div>
    <div class="p-6 post-text">
        <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="unstyled"><?php the_title(); ?></a></h3>
        
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
<?php $i++; endif; ?>
<?php if ($i == 3) : ?>
<article class="w-11/12 mx-auto mt-6 mb-0 text-left text-white bg-primary post-cta-block">
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
<?php $i++; endif; ?>