<?php
global $section;
$features = $section['crb_features'];
$image_size = $section['image_size'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<?php $i = 0; 
foreach ( $features as $feature ) { if ($i <= 2) { $i++; } } ?>
<section id="feature-container" class="w-full<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto feature-inner max-w-screen-2xl">
        <div id="section-header"<?php echo $subtext ?>>
            <h2 class="section-title"><?php echo $section['heading']; ?></h2>
            <?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
        </div>
        <div id="features-repeater" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-<?php echo $i ?>">
            <?php foreach ( $features as $feature ) { 
                $image = $feature['featured_image'];
                $imageID = attachment_url_to_postid( $image );
                $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
                $image_title = get_the_title($imageID);
                $button_text = $feature['button_text'];
                ?>
                <div class="mb-6 section-block lg:mb-0">
                    <div class="area">
                        <div class="flex flex-col justify-center text-center inner-area my-3 lg:mb-14 align-center image-size-<?php echo $image_size; ?>">
                            <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                            <?php if ($feature['featured_heading']) : ?>
                                <h3 class="block font-black feature-heading"><?php echo $feature['featured_heading']; ?></h3>
                            <?php endif; ?>
                            <?php if ($feature['featured_content']) : ?>
                                <span class="block mb-4 feature-content"><?php echo $feature['featured_content']; ?></span>
                            <?php endif; ?>
                            <?php if ($feature['button_url']) : ?>
                                <a href="<?php echo $feature['button_url']; ?>" class="block m-auto btn secondary" data-lity><?php echo $button_text ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php }; ?>
        </div>
        <?php if ($section['button_url']) : ?>
            <a href="<?php echo $section['button_url']; ?>" class="mx-auto btn primary"><?php echo $section['button_text']; ?></a>
        <?php endif; ?>
    </div>
</section>