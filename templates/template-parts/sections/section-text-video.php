<?php 

global $section;
$video_alignment = $section['video_alignment'];
$video_url = $section['video_url'];
$vimeo_id = $section['vimeo_id'];
$youtube_id = $section['youtube_id'];

$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="video-container" class="w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div id="video-repeater">
            <div class="section-block section-align-<?php echo esc_attr($video_alignment); ?>">
                <div id="section-image" class="section-video">
                    <?php if ($video_url) : ?>    
                    <video class="responsive-iframe" controls>
                        <source src="<?php echo $video_url ?>" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                    <?php endif; ?>
                    <?php if ($vimeo_id) : ?> 
                    <iframe class="responsive-iframe" src="https://player.vimeo.com/video/<?php echo $vimeo_id ?>"></iframe>
                    <?php endif; ?>
                    <?php if ($youtube_id) : ?>
                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $youtube_id ?>"></iframe>
                    <?php endif; ?>
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
                    <a href="<?php echo $section['button_url']; ?>" class="btn primary" data-lity><?php echo $section['button_text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>