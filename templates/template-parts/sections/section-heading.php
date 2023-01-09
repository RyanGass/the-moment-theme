<?php
global $section;
$heading_size = $section['heading_size'];
$heading = $section['heading'];
$content = $section['content'];
if ($content) { $subtext = ' has-subtext'; };
if ($heading) { $noheading = ' has-heading'; } else { $noheading = ' no-heading';};
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; } else { $bg_color = '';};
?>

<section id="heading-container" class="<?php echo $bg_color ?>">
    <div id="section-header" class="w-11/12 mx-auto max-w-screen-2xl<?php echo $subtext ?>">
        <?php if ($heading_size == 'h2') : ?>  
            <h2 class="text-center section-title"><?php echo $heading ?></h2>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>

        <?php if ($heading_size == 'h3') : ?>  
            <h3 class="text-center section-title"><?php echo $heading ?></h3>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>

        <?php if ($heading_size == 'h4') : ?>  
            <h4 class="text-center section-title"><?php echo $heading ?></h4>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>

        <?php if ($heading_size == 'h5') : ?>  
            <h5 class="section-title"><?php echo $heading ?></h5>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>

        <?php if ($heading_size == 'h6') : ?>  
            <h6 class="text-center section-title"><?php echo $heading ?></h6>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>
        <?php if ($heading_size == 'none') : ?>
            <p class="text-center"><?php echo $content ?></p>
        <?php endif; ?>
    </div>
</section>