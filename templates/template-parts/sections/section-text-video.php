<?php 

global $section;
global $section_multiples;
$section_multiples++;
$video_alignment = $section['video_alignment'];
$video_placement = $section['video_placement'];
$video = $section['video'];
$imageID = attachment_url_to_postid( $video );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$video_id = $section['video_id'];
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; };
?>

<section id="video-container" class="w-full<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto max-w-screen-2xl">
        <div id="video-repeater">
            <div class="section-block section-align-<?php echo esc_attr($video_alignment); ?> video-placement-<?php echo esc_attr($video_placement); ?>">
                <div id="section-image" class="section-image">
                    <img  style="width: 100%; margin: auto; display: block;"  class="mx-auto vidyard-player-embed"  src="<?php echo $video ?>"  data-uuid="<?php echo $video_id ?>"  data-v="4"  data-type="lightbox" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                </div>
                <div id="section-content"  class="section-content" >
                    <?php if ($section['pre_heading']) : ?>
                    <h3><?php echo $section['pre_heading']; ?></h3>
                    <?php endif; ?>
                    <h2 class="section-title"><?php echo $section['heading']; ?></h2>
                    <?php if ($section['content']) : ?>
                    <div class="section-text"><?php echo apply_filters( 'the_content', $section['content'] ) ?></div>
                    <?php endif; ?>
                    <?php if ($section['button_url']) : ?>
                    <a href="<?php echo $section['button_url']; ?>" class="button red" data-lity><?php echo $section['button_text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>