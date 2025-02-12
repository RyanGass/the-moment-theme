<?php /* Template Name: Practice Areas (ind) */ 

// This will allow you to pull values that are set on a page that uses flexible content, like the homepage
$page_id = 6;
$sections = carbon_get_post_meta($page_id, 'crb_sections');
$stories = [];
foreach ($sections as $section) {
    if ($section['_type'] === 'stories') {
        $stories_heading = $section['heading'];
        $stories_header_content = $section['header_content'];
        $stories = $section['stories'];
        $stories_btn_text = $section['button_text'];
        $stories_btn_url = $section['button_url'];
    }
}

// These create variables pulled directly from the custom template tabs. In this case cf-page-template.php
$pre_heading = carbon_get_the_post_meta('pre_heading');
$heading = carbon_get_the_post_meta('heading');
$header_content = carbon_get_the_post_meta('header_content');
$image = carbon_get_the_post_meta('image');
$repeater = carbon_get_the_post_meta('repeater');
$btn_text = carbon_get_the_post_meta('button_text');
$btn_url = carbon_get_the_post_meta('button_url');

get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
<main>
    <section id="section-container" class="w-full">
        <div class="container-inner">
            <div id="section-header">
                <div class="section-pre-heading"><?php echo $pre_heading; ?></div>
                <h2 class="section-heading"><?php echo $heading; ?></h2>
                <div class="section-heading-content"><?php echo $header_content; ?></div>
            </div>
            <div id="section-image"><img src="<?php echo $image; ?>" alt="Section Image"></div>
            <div id="repeater-wrapper">
                <?php foreach ($repeater as $item) { ?>
                    <div class="item-card">
                        <div class="item-image">
                            <img src="<?php echo $item['image']; ?>" alt="Repeater Card Image">
                        </div>
                        <div class="item-text">
                            <h3 class="item-heading"><?php echo $item['heading']; ?></h3>
                            <p class="item-content"><?php echo $item['content']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="section-buttons">
                <a href="<?php echo $btn_url; ?>" class="btn tertiary"><?php echo $btn_text; ?></a>
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();