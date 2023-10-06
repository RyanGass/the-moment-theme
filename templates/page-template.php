<?php /* Template Name: Name Goes Here */ 

$sections = carbon_get_the_post_meta( 'ch_sections' );
get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
    <main>
        <section id="page-container">
            <div class="container-inner">
                <!-- add content -->
            </div>
        </section>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();