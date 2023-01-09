<?php
global $section;
$affiliations = $section['crb_affiliations'];
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; } else { $bg_color = '';};
?>

<section id="affiliations-container" class="py-10<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto affiliation-inner max-w-screen-2xl">
        <div id="affiliations-repeater" class="flex flex-wrap items-center justify-around w-full">
            <?php foreach ( $affiliations as $affiliation ) :  
                $image = $affiliation['affiliation_image'];
                $imageID = attachment_url_to_postid( $image );
                $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
                $image_title = get_the_title($imageID);
                ?>  
                <div class="section-block basis-1/2 md:basis-1/3 lg:basis-1/6">
                    <div class="area">
                        <div class="flex flex-col justify-center text-center inner-area align-center">
                        <img class="mx-auto mb-5" src="<?php echo $image ?>"  alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>