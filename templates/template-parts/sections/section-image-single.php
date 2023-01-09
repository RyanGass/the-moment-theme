<?php 
global $section;
$image = $section['image'];
$imageID = attachment_url_to_postid( $image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
?>

<section id="single-image-container" class="w-full mx-auto my-10 lg:w-8/12 max-w-screen-2xl">
    <?php if ($section['image_url']) : ?>
    <a href="<?php echo $section['image_url'] ?>">
    <?php endif; ?>
        <img src="<?php echo $section['image'] ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
    <?php if ($section['image_url']) : ?>
    </a>
    <?php endif; ?>
</section>