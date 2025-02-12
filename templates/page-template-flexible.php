<?php /* Template Name: Name Goes Here */ 

/* This template is for pages that use flexible content */

global $section;
$pre_heading = $section['pre_heading'];
$heading = $section['heading'];
$header_content = $section['header_content'];
$image = $section['image'];
$repeater = $section['repeater'];
$btn_text = $section['button_text'];
$btn_url = $section['button_url'];

get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
    <main>
        <section id="page-container">
            <div class="container-inner">
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
            </div>
        </section>
    </main>

<?php
get_sidebar();
get_footer();