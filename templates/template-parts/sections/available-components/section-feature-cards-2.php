<?php 
global $section;
$features = $section['features-2'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext" '; } else { $subtext = '';};
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="feature-2-container" class="w-full<?php echo $bg_color; ?>">
<div class="feature-2-inner container-inner">    
    <div id="section-header"<?php echo $subtext ?>>
        <h2 class="section-title"><?php echo $section['heading']; ?></h2>
        <?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
    </div>
    <div id="feature-2-repeater" class="grid w-11/12 m-auto md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ( $features as $feature ) { 
            $image = $feature['image'];
            $imageID = attachment_url_to_postid( $image );
            $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
            $image_title = get_the_title($imageID);
            ?>
            <div class="section-block">
                <?php if ($feature['link_url']) : ?>
                <a href="<?php echo $feature['link_url']; ?>" class="block m-auto">
                <?php endif; ?>
                <div class="area">
                    <div class="flex flex-col items-center md:flex-row inner-area">
                        <img class="icon" src="<?php echo $image ?>"  alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" width="75" height="75" />
                        <h3 class="block font-black value-heading"><?php echo $feature['heading']; ?></h3>                        
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