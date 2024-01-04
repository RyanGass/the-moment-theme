<?php 

global $section;
$use_bg_image = $section['use_background_image'];
$bg_image = $section['cta_bg_image'];
if ($use_bg_image === 'yes') { $bg_image = ' style="background-image:url( ' . $bg_image . ');" '; } else { $bg_image = '';};
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="text-container" class="w-full<?php echo $bg_color; ?>"<?php echo $bg_image; ?>>
    <div class="container-inner">
        <div id="text-image-repeater" class="feature-wrapper">
            <div class="section-block flex <?php echo $section['section_layout']; ?>">
                <div id="section-content"  class="section-content" >
                    <?php if ($section['pre_heading']) : ?>
                    <div class="h5"><?php echo $section['pre_heading']; ?></div>
                    <?php endif; ?>    
                    <h2 class="section-title"><?php echo $section['heading']; ?></h2>
                    <?php if ($section['content']) : ?>
                    <div class="section-text"><?php echo apply_filters( 'the_content', $section['content'] ) ?></div>
                    <?php endif; ?>
                </div>
                <div id="section-buttons">
                    <?php if ($section['button_url']) : ?>
                    <a href="<?php echo $section['button_url']; ?>" class="btn primary" data-lity><?php echo $section['button_text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>