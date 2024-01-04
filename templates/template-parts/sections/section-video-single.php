<?php 

global $section;
global $section_multiples;
$section_multiples++;
$video_url = $section['video_url'];
$vimeo_id = $section['vimeo_id'];
$youtube_id = $section['youtube_id'];
$video_image = $section['video_image'];

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
                    <div id="video-container" class="w-fit hero-video"> 
                        <div class="section-video">
                        <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form" aria-label="Video Popup Button"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>
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
                        <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form" aria-label="Video Popup Button"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>                
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
                        <a id="form-init<?php echo '-' . $section_multiples ?>" class="form-init" href="#popup-form" aria-label="Video Popup Button"><img src="<?php echo $video_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" /></a>
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
                </div>
            </div>
        </div>
    </div>
</section>

<script>
let vspopButton<?php echo $section_multiples ?> = document.querySelector('#form-init<?php echo '-' . $section_multiples ?>');
let vspopForm<?php echo $section_multiples ?> = document.querySelector('#popup-form<?php echo '-' . $section_multiples ?>');
let vspopClose<?php echo $section_multiples ?> = document.querySelector('#form-close<?php echo '-' . $section_multiples ?>');
vspopButton<?php echo $section_multiples ?>.addEventListener("click", vspopoverInit<?php echo $section_multiples ?>);
vspopClose<?php echo $section_multiples ?>.addEventListener("click", vspopoverClose<?php echo $section_multiples ?>);
function vspopoverInit<?php echo $section_multiples ?>() {
    console.log('popup-form');
	vspopForm<?php echo $section_multiples ?>.removeAttribute('data-hidden');
}
function vspopoverClose<?php echo $section_multiples ?>() {
	vspopForm<?php echo $section_multiples ?>.setAttribute('data-hidden', '');
    stopAllVideos<?php echo $section_multiples ?>();
}
var stopAllVideos<?php echo $section_multiples ?> = () => { 
  var iframe<?php echo $section_multiples ?> = document.getElementById('video-player<?php echo $section_multiples ?>');
  iframe<?php echo $section_multiples ?>.src = iframe<?php echo $section_multiples ?>.src;
}
</script>