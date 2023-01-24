<?php /* Template Name: Name Goes Here */ 

$sections = carbon_get_the_post_meta( 'ch_sections' );
$ch_intro_content = carbon_get_the_post_meta( 'ch_intro_content' ); 
$ch_number = 0;
$toc_ch_number = 0;
$nav_ch_number = 1;
get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
	<main>
        <section id="ch-intro-container" class="bg-[#f4f4f4]">
            <div class="w-11/12 max-w-screen-lg pt-24 mx-auto text-center ch-intro-inner">
            <?php echo apply_filters( 'the_content', $ch_intro_content ) ?>
            </div>
        </section>
        <section id="chapter-toc" class="w-11/12 max-w-screen-xl pt-24 mx-auto">
            <h2 class="mb-12 text-center ">Chapters</h2>
            <div id="chapter-toc-container" class="flex flex-wrap">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php

                // Chapter TOC
                foreach ( $sections as $section ) {
                    switch ( $section['_type'] ) {
                        case 'chapter':
                        
                        get_template_part('templates/template-parts/sections/chapters/section', 'chapters-toc');
                        
                        break;

                    }
                }
                endwhile; 
                ?>
            </div>
        </section>
        
        <?php while ( have_posts() ) : the_post();
            foreach ( $sections as $section ) {
                switch ( $section['_type'] ) {
                    case 'chapter':
                    
                    get_template_part('templates/template-parts/sections/chapters/section', 'chapter');
                    
                    break;

                    case 'download-mkto-form':
                    
                    get_template_part('templates/template-parts/sections/chapters/section', 'download-form');
                    
                    break;
                }
            }
        ?>
        <?php endwhile; ?>
        <style>
            div#bottom-chapter-nav {
                height: 50px;
                width: 100%;
                position: fixed;
                z-index: 999;
                background: #fff;
                bottom: 0;
                transition: bottom .5s;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .ch-nav-left {
                display: flex;
                align-items: center;
            }

            div#bottom-chapter-nav.hide {
                 bottom: -50px;
            }

            .ch-nav-hamb{
                cursor: pointer;
                margin: 0 20px;
                display: block;
            }
            
            .ch-nav-hamb-line {
                background: #EF3F42;
                display: block;
                height: 3px;
                position: relative;
                width: 24px;
            
            } 
            
            .ch-nav-hamb-line::before,
            .ch-nav-hamb-line::after{
                background: #EF3F42;
                content: '';
                display: block;
                height: 100%;
                position: absolute;
                transition: all .2s ease-out;
                width: 100%;
            }
            .ch-nav-hamb-line::before{
                top: 7px;
            }
            .ch-nav-hamb-line::after{
                top: -7px;
            }
            #ch-nav-num {
                color: #EF3F42;
                font-weight: bold;
                font-size: 21px;
            }

            #ch-nav-title {
                font-size: 21px;
            }

            #ch-nav-title span.sep {
                display: inline-block;
                margin: 0 10px;
            }

            div#ch-nav-text {
                display: flex;
                align-items: center;
            }

            div#mkto-form-container.popover-form {
                background: #fff;
                z-index: 1;
                width: 100%;
                position: absolute;
                top: 0;
                bottom: 0;
            }

            div#mkto-form-container.popover-form div#chapter-toc-container {
                top: 50%;
                transform: translateY(-50%);
                position: relative;
            }

            #popup-form[data-hidden] {
                display: none;
            }
            #popup-form {
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

            div#form-close {
                position: fixed;
                width: 100vw;
                height: 100vh;
                z-index: 0;
            }

            #ch-nav-download.ch-nav-right a {
                position: relative;
                border-radius: 0;
                margin: 0;
                padding-left: 50px;
            }

            #ch-nav-download.ch-nav-right a:before {
                content: '';
                position: absolute;
                left: 10%;
                top: 50%;
                transform: translateY(-50%);
                background-image: url(/wp-content/uploads/2022/11/download-solid.svg);
                width: 15px;
                height: 15px;
            }
        </style>
		   
    <div id="bottom-chapter-nav" class="hide">
        <div class="ch-nav-left">
            <a href="#popup-form" id="form-init"><label class="ch-nav-hamb"><span class="ch-nav-hamb-line"></span></label></a>
            <div id="ch-nav-text">
                <span id="ch-nav-num">Chapter 1</span>
                <span id="ch-nav-title">Replace</span>
            </div>
        </div>
        <div id="ch-nav-download" class="ch-nav-right"><a href="#mkto-form-container" class="button red">Download Now!</a></div>
    </div>

    <div id="popup-form" data-hidden>
		<div id="form-close"></div>
		<div id="mkto-form-container" class="popover-form">
            <div id="chapter-toc-container" class="flex flex-wrap">
            <?php foreach ( $sections as $section ) { 
                switch ( $section['_type'] ) {
                        case 'chapter': ?>	
                        <a href="#chapter-<?php echo $nav_ch_number ?>" class="block basis-full md:basis-1/2 lg:basis-1/3 chapter">
                            <div class="chapter-block">
                                <h3 class="ch-number text-primary">Chapter <?php echo $nav_ch_number ?></h3>
                                <p class="ch-title"><?php echo $section['chapter_title'] ?></p>
                                <div class="chapter-overlay" style="background-image:url('<?php echo $section['chapter_image'] ?>');">
                                    <div class="ch-number">View Chapter <?php echo $nav_ch_number ?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#fff" d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
            <?php $nav_ch_number++; } ?>
            </div>
        </div>
	</div>

    <script>

        let popButton = document.querySelector('#form-init');
        let popForm = document.querySelector('#popup-form');
        let popClose = document.querySelector('#form-close');
        let popChapterClick = document.querySelectorAll('#popup-form .chapter');
        popButton.addEventListener("click", popoverInit);
        popClose.addEventListener("click", popoverClose);
        for (let i = 0; i < popChapterClick.length; i++) {
            console.log(i);
            popChapterClick[i].addEventListener("click", popoverClose);
        } 
        
        function popoverInit() {
            popForm.removeAttribute('data-hidden');
        }
        function popoverClose() {
            popForm.setAttribute('data-hidden', '');
        }

        let ch_nav_wrapper = document.getElementById("bottom-chapter-nav");
        let ch_text = document.getElementById("ch-nav-text");
        console.log(ch_text);
        let ch1 = document.getElementById("chapter-1");
        let ch1_title = document.querySelector('#chapter-1 .ch-title').innerHTML;
        let ch2 = document.getElementById("chapter-2");
        let ch2_title = document.querySelector('#chapter-2 .ch-title').innerHTML;
        let ch3 = document.getElementById("chapter-3");
        let ch3_title = document.querySelector('#chapter-3 .ch-title').innerHTML;
        let ch4 = document.getElementById("chapter-4");
        let ch4_title = document.querySelector('#chapter-4 .ch-title').innerHTML;
        let ch5 = document.getElementById("chapter-5");
        let ch5_title = document.querySelector('#chapter-5 .ch-title').innerHTML;
        let ch6 = document.getElementById("chapter-6");
        let ch6_title = document.querySelector('#chapter-6 .ch-title').innerHTML;
        let ch7 = document.getElementById("chapter-7");
        let ch7_title = document.querySelector('#chapter-7 .ch-title').innerHTML;

        document.body.onscroll = function () {
            if (ch1.getBoundingClientRect().top <= window.innerHeight && ch1.getBoundingClientRect().bottom >= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 1</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch1_title + '</span>';
                
            }

            if (ch2.getBoundingClientRect().top <= window.innerHeight && ch1.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 2</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch2_title + '</span>';
            }

            if (ch3.getBoundingClientRect().top <= window.innerHeight && ch2.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 3</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch3_title + '</span>';
            }

            if (ch4.getBoundingClientRect().top <= window.innerHeight && ch3.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 4</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch4_title + '</span>';
            }

            if (ch5.getBoundingClientRect().top <= window.innerHeight && ch4.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 5</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch5_title + '</span>';
            }

            if (ch6.getBoundingClientRect().top <= window.innerHeight && ch5.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 6</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch6_title + '</span>';
            }

            if (ch7.getBoundingClientRect().top <= window.innerHeight && ch6.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.remove('hide');
                ch_text.innerHTML = '<span id="ch-nav-num">Chapter 7</span><span id="ch-nav-title"> <span class="sep">|</span> ' + ch7_title + '</span>';
            } 

            if (ch1.getBoundingClientRect().top >= window.innerHeight) {
                ch_nav_wrapper.classList.add('hide');
            }

            if (ch7.getBoundingClientRect().bottom <= window.innerHeight) {
                ch_nav_wrapper.classList.add('hide');
            }
        }


		</script>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();