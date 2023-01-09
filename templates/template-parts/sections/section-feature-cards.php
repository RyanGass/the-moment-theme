<?php
global $section;
$features = $section['crb_features'];
$image_size = $section['image_size'];
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; };
?>

<?php $i = 0; 
foreach ( $features as $feature ) { if ($i <= 2) { $i++; } } ?>
<section id="value-container" class="<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto value-inner max-w-screen-2xl">
        <div id="values-repeater" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo $i ?>">
            <?php foreach ( $features as $feature ) { 
                $image = $feature['featured_image'];
                $imageID = attachment_url_to_postid( $image );
                $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
                $image_title = get_the_title($imageID);
                $button_text = $feature['button_text'];
                if ($button_text) {
                    $button_text;
                } else {
                    $button_text = 'Learn More';
                }
                ?>
                <div class="mb-6 section-block lg:mb-0">
                    <div class="area">
                        <div class="flex flex-col justify-center text-center inner-area my-3 lg:mb-14 align-center image-size-<?php echo $image_size; ?>">
                            <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                            <?php if ($feature['featured_heading']) : ?>
                                <h3 class="block font-black value-heading"><?php echo $feature['featured_heading']; ?></h3>
                            <?php endif; ?>
                            <?php if ($feature['featured_content']) : ?>
                                <span class="block mb-4 value-content"><?php echo $feature['featured_content']; ?></span>
                            <?php endif; ?>
                            <?php if ($feature['button_url']) : ?>
                                <a href="<?php echo $feature['button_url']; ?>" class="block m-auto button red " data-lity><?php echo $button_text ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <?php if ($section['button_url']) : ?>
            <a href="<?php echo $section['button_url']; ?>" class="mx-auto button red"><?php echo $section['button_text']; ?></a>
        <?php endif; ?>
    </div>
</section>