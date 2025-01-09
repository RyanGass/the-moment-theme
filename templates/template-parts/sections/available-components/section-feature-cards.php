<?php
global $section;
$features = $section['crb_features'];
$image_size = $section['image_size'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; } else { $subtext = ''; };
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<?php $i = 0; $p = 10;
foreach ( $features as $feature ) { if ($i <= 3) { $i++; } } ?>
<section id="feature-container" class="w-full<?php echo $bg_color; ?>">
    <div class="container-inner feature-inner">
        <div id="section-header"<?php echo $subtext ?>>
            <h2 class="section-title"><?php echo $section['heading']; ?></h2>
            <?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
        </div>
        <?php if ($i == 1) { $md_grid = 'md:grid-cols-1'; } else { $md_grid = 'md:grid-cols-2'; } ?>
        <div id="features-repeater" class="grid grid-cols-1 <?php echo $md_grid ?> lg:grid-cols-<?php echo $i ?>">
            <?php foreach ( $features as $feature ) { 
                $image = $feature['featured_image'];
                $imageID = attachment_url_to_postid( $image );
                $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
                $image_title = get_the_title($imageID);
                $button_text = $feature['button_text'];
                ?>
                <div class="section-block">
                    <div class="area h-full">   
                    <div id="form-init-<?php echo $p; ?>" class="cursor-pointer flex flex-col justify-evenly text-center inner-area align-center h-full image-size-<?php echo $image_size; ?>">
                            <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                            <?php if ($feature['featured_heading']) : ?>
                                <h3 class="block font-black feature-heading"><?php echo $feature['featured_heading']; ?></h3>
                            <?php endif; ?>
                            <?php if ($feature['button_url']) : ?>
                                <a href="<?php echo $feature['button_url']; ?>" class="block m-auto btn primary" data-lity><?php echo $button_text ?></a>
                            <?php endif; ?>
                        </div>
                        <div id="popup-form-<?php echo $p; ?>" class="popup-form" data-hidden>
                            <div id="form-close-<?php echo $p; ?>" class="form-close"></div>
                            <div id="mkto-form-container" class="popover-form">
                                <?php if ($feature['add_featured_content']) : ?>
                                    <span class="block feature-content"><?php echo $feature['add_featured_content']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $p++; }; ?>
        </div>
        <?php if ($section['button_url']) : ?>
            <a href="<?php echo $section['button_url']; ?>" class="section-button mx-auto btn primary"><?php echo $section['button_text']; ?></a>
        <?php endif; ?>
    </div>
</section>

<style>
	div#mkto-form-container.popover-form {
		background: #fff;
		z-index: 1;
		max-width: 600px;
    	width: 100%;
        padding: var(--space-4);

	}

	.popup-form[data-hidden] {
		display: none;
	}
	.popup-form {
		position: fixed;
		width: 100vw;
		height: 100vh;
		background-color: rgba(0,0,0,.9);
		color: #fff;
		top: 0;
		left: 0;
		z-index: 998;
		font-size: 55px;
		display: flex;
		justify-content: center;
		align-items: center;
		overflow: scroll;
	}

	div.form-close {
		position: fixed;
		width: 100vw;
		height: 100vh;
		z-index: 0;
	}
</style>

<?php $q = 10; foreach ( $features as $feature ) { ?>
<script>
let popButton<?php echo $q; ?> = document.querySelector('#form-init-<?php echo $q; ?>');
let popForm<?php echo $q; ?> = document.querySelector('#popup-form-<?php echo $q; ?>');
let popClose<?php echo $q; ?> = document.querySelector('#form-close-<?php echo $q; ?>');
popButton<?php echo $q; ?>.addEventListener("click", popoverInit<?php echo $q; ?>);
popClose<?php echo $q; ?>.addEventListener("click", popoverClose<?php echo $q; ?>);
function popoverInit<?php echo $q; ?>() {
	popForm<?php echo $q; ?>.removeAttribute('data-hidden');
}
function popoverClose<?php echo $q; ?>() {
	popForm<?php echo $q; ?>.setAttribute('data-hidden', '');
}
</script>
<?php $q++; }; ?>