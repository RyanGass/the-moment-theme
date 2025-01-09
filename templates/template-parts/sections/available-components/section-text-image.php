<?php 

global $section;
$image_alignment = $section['image_alignment'];
$image = $section['image'];
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
$imageID = attachment_url_to_postid( $image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
?>

<section id="text-image-container" class="w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div id="text-image-repeater" class="feature-wrapper">
            <div class="section-block section-align-<?php echo $image_alignment; ?>">
                <div id="section-image" class="section-image">
                    <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                </div>
                <div id="section-content"  class="section-content" >
                    <?php if ($section['pre_heading']) : ?>
                    <div class="h5"><?php echo $section['pre_heading']; ?></div>
                    <?php endif; ?>    
                    <h2 class="section-title"><?php echo $section['heading']; ?></h2>
                    <?php if ($section['content']) : ?>
                    <div class="section-text"><?php echo apply_filters( 'the_content', $section['content'] ) ?></div>
                    <?php endif; ?>
                    <?php if ($section['button_url']) : ?>
                    <a href="<?php echo $section['button_url']; ?>" class="btn primary" data-lity><?php echo $section['button_text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>