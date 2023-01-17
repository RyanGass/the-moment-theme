<?php 
global $section;
$features = $section['features-2'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
?>

<section id="feature-2-container" class="w-full bg-lightgrey ">
<div class="mx-auto feature-2-inner max-w-screen-2xl">    
    <div id="section-header">    
        <h2 class="w-full lg:w-7/12 mx-auto text-center section-title small"><?php echo $section['section_heading']; ?></h2>
        <?php if ($content) : echo '<p class="w-full lg:w-7/12 mx-auto text-center">' . $section['content'] . '</p>'; endif; ?>
    </div>
    <div id="feature-2-repeater" class="grid w-11/12 m-auto md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ( $features as $feature ) { 
            $image = $feature['image'];
            $imageID = attachment_url_to_postid( $image );
            $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
            $image_title = get_the_title($imageID);
            ?>
            <div class="my-5 section-block">
                <?php if ($feature['link_url']) : ?>
                <a href="<?php echo $feature['link_url']; ?>" class="block m-auto">
                <?php endif; ?>
                <div class="area">
                    <div class="flex flex-col items-center md:pl-8 md:flex-row inner-area">
                        <img class="mb-6 icon md:mb-0" src="<?php echo $image ?>"  alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" width="75" height="75" />
                        <h3 class="block font-black md:ml-4 value-heading"><?php echo $feature['heading']; ?></h3>                        
                    </div>
                </div>
                <?php if ($feature['link_url']) : ?>
                </a>
                <?php endif; ?>
            </div>
        <?php }; ?>
    </div>
</div>
</section>