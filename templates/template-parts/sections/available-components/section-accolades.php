<?php

global $section;
$accolades = $section['accolade_images'];
$use_bg_image = $section['use_background_image'];
$bg_image = $section['cta_bg_image'];
if ($use_bg_image === 'yes') {
    $bg_image = ' style="background-image:url( ' . $bg_image . ');" ';
} else {
    $bg_image = '';
};
?>

<section id="accolades-container" class="w-full" <?php echo $bg_image; ?>>
    <div class="container-inner">
        <div class="section-block">
            <div id="section-content" class="section-content text-center m-auto">
                <?php if ($section['acc_pre_heading']) : ?>
                    <div class="pre-heading"><?php echo $section['acc_pre_heading']; ?></div>
                <?php endif; ?>
                <h2 class="heading"><?php echo $section['acc_heading']; ?></h2>
                <?php if ($section['acc_content']) : ?>
                    <div class="content"><?php echo apply_filters('the_content', $section['acc_content']) ?></div>
                <?php endif; ?>
            </div>
            <div id="accolades">
                <?php foreach ($accolades as $accolade) { ?>
                    <div class="image">
                        <img src="<?php echo $accolade['acc_image']; ?>" alt="Award / Recognition Logo">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>