<?php
global $section;
$image = $section['testimonial_image'];;
$imageID = attachment_url_to_postid( $image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
?>

<section id="testimonial-single-container" class="w-full bg-lightgrey">
    <div id="testimonial-single-inner" class="mx-auto max-w-screen-2xl">
        <div class="section-block">
            <div class="area">
                <div class="flex flex-col justify-center text-center inner-area items-center">
                    <img class="w-2/6 mx-auto" src="<?php echo $image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                    <span class="block w-full px-8 mx-auto my-8 md:px-0 md:w-1/2 quote-content"><?php echo $section['testimonial_content']; ?></span>
                    <span class="block quote-name-company"><?php echo $section['testimonial_name']; ?> - <?php echo $section['testimonial_company']; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>