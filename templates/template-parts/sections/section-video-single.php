<?php 

global $section;
$video_url = $section['video_url'];
$vimeo_id = $section['vimeo_id'];
$youtube_id = $section['youtube_id'];

$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="video-container" class="single-video w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div id="video-repeater">
            <div class="section-block">
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
            </div>
        </div>
    </div>
</section>