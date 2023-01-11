<?php 

global $section;
$image_alignment = $section['image_alignment'];
$image = $section['image'];
$columns = $section['two_columns'];
if ($columns === 'yes') { $columns = ' two-col'; } else { $columns = '';};
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; } else { $bg_color = '';};
$imageID = attachment_url_to_postid( $image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
?>

<section id="text-image-container" class="w-full<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto max-w-screen-2xl">
        <div id="text-image-repeater" class="feature-wrapper<?php echo $columns ?>">
            <div class="section-block section-align-<?php echo $image_alignment; ?>">
                <div id="section-image" class="section-image">
                    <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                </div>
                <div id="section-content"  class="section-content" >
                    <?php if ($section['pre_heading']) : ?>
                    <h5><?php echo $section['pre_heading']; ?></h5>
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
            <?php if ($columns === ' two-col') : ?>
            <div class="section-block section-align-<?php echo $image_alignment; ?>">
                <div id="section-image" class="section-image">
                    <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                </div>
                <div id="section-content"  class="section-content" >
                    <h2 class="section-title"><?php echo $section['heading_2col']; ?></h2>
                    <?php if ($section['content_2col']) : ?>
                    <div class="section-text"><?php echo $section['content_2col']; ?></div>
                    <?php endif; ?>
                    <?php if ($section['button_url_2col']) : ?>
                    <a href="<?php echo $section['button_url_2col']; ?>" class="button red" data-lity><?php echo $section['button_text_2col']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>