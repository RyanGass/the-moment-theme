<?php
global $section;
$image = $section['testimonial_image'];;
$imageID = attachment_url_to_postid( $image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="testimonial-single-container" class="w-full<?php echo $bg_color; ?>">
    <div id="testimonial-single-inner" class="container-inner">
        <div class="section-block">
            <div class="area">
                <div class="flex flex-col justify-center text-center inner-area items-center">
                    <img class="mx-auto" src="<?php echo $image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                    <span class="block w-full md:w-1/2 quote-content"><?php echo $section['testimonial_content']; ?></span>
                    <span class="block quote-name-company"><?php echo $section['testimonial_name']; ?> - <?php echo $section['testimonial_company']; ?></span>
                </div>
            </div>
        </div>
    </div>
</section>