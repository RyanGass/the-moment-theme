<?php 
global $section;
?>

<section id="free-form-container" class="w-full">
    <div class="container-inner">
        <div class="gutenberg-content not-really-gutenberg-content">
            <div id="free-form-content" class="free-form-content">
                <?php echo apply_filters( 'the_content', $section['content'] ) ?>
            </div>
        </div>
    </div>
</section>