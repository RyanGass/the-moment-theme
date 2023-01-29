<?php 

global $section;
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="text-container" class="w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div id="text-image-repeater" class="feature-wrapper">
            <div class="section-block>">
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
        </div>
    </div>
</section>