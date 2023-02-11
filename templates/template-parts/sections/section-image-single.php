<?php 

global $section;
$image = $section['section_image'];
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="single-image-container" class="single-video w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div id="image-repeater">
            <div class="section-block">
                <div id="section-image">
                    <img src="<?php echo $image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                </div>
                <div id="section-button">
                    <a href="<?php echo $section['button_url'] ?>" class="btn primary"><?php echo $section['button_text'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>