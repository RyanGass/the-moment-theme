<?php 
global $section;
$image1 = $section['image_1'];
$image2 = $section['image_2'];
$imageID = attachment_url_to_postid( $image1 );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$imageID2 = attachment_url_to_postid( $image2 );
$alt2 = get_post_meta($imageID2, '_wp_attachment_image_alt', TRUE);
$image_title2 = get_the_title($imageID2);
?>

<section id="double-image-container" class="flex flex-col justify-center w-full mx-auto text-center lg:w-8/12 max-w-screen-2xl md:flex-row">
    <div class="image-1 basis-2/4">
        <?php if ($section['image_1_url']) : ?>
        <a href="<?php echo $section['image_1_url'] ?>">
        <?php endif; ?>
            <img src="<?php echo $image1 ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?> />
        <?php if ($section['image_1_url']) : ?>
        </a>
        <?php endif; ?>
        <div class="img-text">
            <?php if ($section['image_1_heading']) : ?>
            <h2 class="mt-8 dbl-heading"><?php echo $section['image_1_heading'] ?></h2>
            <?php endif; ?>
            <?php if ($section['image_1_text']) : ?>
            <div class="dbl-text"><?php echo $section['image_1_text'] ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="image-2 basis-2/4">
        <?php if ($section['image_2_url']) : ?>
        <a href="<?php echo $section['image_2_url'] ?>">
        <?php endif; ?>
            <img src="<?php echo $image2 ?>" alt="<?php echo $alt2 ?>" title="<?php echo $image_title2 ?> />
        <?php if ($section['image_2_url']) : ?>
        </a>
        <?php endif; ?>
        <div class="img-text">
            <?php if ($section['image_2_heading']) : ?>
            <h2 class="mt-8 dbl-heading"><?php echo $section['image_2_heading'] ?></h2>
            <?php endif; ?>
            <?php if ($section['image_2_text']) : ?>
            <div class="dbl-text"><?php echo $section['image_2_text'] ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>