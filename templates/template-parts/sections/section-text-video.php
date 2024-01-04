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
$vimeo_id = $section['vimeo_id'];
$youtube_id = $section['youtube_id'];
$video_image = $section['video_image'];
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; };
?>

<section id="video-container" class="w-full<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto max-w-screen-2xl">
        <div id="video-repeater">
            <div class="section-block section-align-<?php echo esc_attr($video_alignment); ?> video-placement-<?php echo esc_attr($video_placement); ?>">
            <?php if ($video_url) : ?> 
                <div id="video-container" class="w-fit hero-video"> 
                    <div class="section-video">
                    <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>
                    </div>  
                </div>

                <div id="popup-form<?php echo '-' . $section_multiples ?>" class="popup-form" data-hidden>
                    <div id="form-close<?php echo '-' . $section_multiples ?>" class="form-close"></div>
                    <div id="form-outer-wrapper">
                        <div id="form-container" class="popover-form">
                            <iframe loading="lazy" id="video-player<?php echo $section_multiples ?>" class="responsive-iframe" src="<?php echo $video_url ?>" sandbox></iframe>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($vimeo_id) : ?> 
                <div id="video-container" class="w-fit hero-video"> 
                    <div class="section-video">
                    <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>                
                    </div>
                </div>

                <div id="popup-form<?php echo '-' . $section_multiples ?>" class="popup-form" data-hidden>
                    <div id="form-close<?php echo '-' . $section_multiples ?>" class="form-close"></div>
                    <div id="form-outer-wrapper">
                        <div id="form-container" class="popover-form">
                            <iframe loading="lazy" id="video-player<?php echo $section_multiples ?>" class="responsive-iframe" src="https://player.vimeo.com/video/<?php echo $vimeo_id ?>?enablejsapi=1"></iframe>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($youtube_id) : ?>
                <div id="video-container" class="w-fit"> 
                    <div class="section-video">
                    <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>
                    </div>
                </div>

                <div id="popup-form<?php echo '-' . $section_multiples ?>" class="popup-form" data-hidden>
                    <div id="form-close<?php echo '-' . $section_multiples ?>" class="form-close"></div>
                    <div id="form-outer-wrapper">
                        <div id="form-container" class="popover-form">
                        <iframe loading="lazy" id="video-player<?php echo $section_multiples ?>" class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $youtube_id ?>"></iframe>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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