<?php 
global $section;
global $section_multiples;
$section_multiples++;
$slides = $section['sticky_feature_cards'];
?>

<section id="sticky-features-container<?php echo '-' . $section_multiples ?>" class="w-11/12 pb-12 mx-auto max-w-screen-2xl sticky-features-container lg:pb-24">
    <div id="sticky-slide-feature" class="flex flex-wrap justify-center 2xl:flex-nowrap "> 
        <?php foreach ( $slides as $slide ) {
            $image = $slide['image']; 
            $imageID = attachment_url_to_postid( $image );
            $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
            $image_title = get_the_title($imageID);
        ?>
        <div class="sticky-slide-block"> 
            <img class="slide-image" src="<?php echo $image ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>" />
            <h3><?php echo $slide['heading'] ?></h3>
            <div><?php echo $slide['sticky_feature_list'] ?></div>
        </div>
        <?php } ?>
    </div>
    <?php if($section['button_url']) :?>
    <a href="<?php echo $section['button_url'] ?>" class="md:m-auto button red"><?php echo $section['button_text'] ?></a>
    <?php endif; ?>
</section>