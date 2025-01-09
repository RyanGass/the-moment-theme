<?php 

global $section;
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="blockquote-container" class="w-full<?php echo $bg_color; ?>">
    <div class="container-inner">
        <div class="max-w-screen-md mx-auto quote-inner">
            <blockquote class="quote-text">
                <svg class="left-quote" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 134 99.7" style="enable-background:new 0 0 134 99.7;" xml:space="preserve">
                <g id="quote_front" transform="translate(214.659 141.924) rotate(180)">
                    <path id="Path_352" class="st0" d="M181.2,108.1c-4-1-7.3-1.6-10.3-2.6c-10.7-3.7-17.1-11.2-18.9-22.5c-1.2-8-0.7-15.8,2.5-23.2
                        c4.6-10.8,13-16.8,24.7-17.4c12.8-0.7,23.2,3.9,29.8,15.2c6,10.3,6.7,21.7,4.8,33.1c-3.9,22.8-16.5,39.2-37.5,48.8
                        c-8.7,4-9.3,3.5-12-5.5c-0.6-1.3-0.1-2.9,1.3-3.6c5.6-3.9,10.2-9,13.3-15.1C179.7,113,180.6,110.6,181.2,108.1z"/>
                    <path id="Path_353" class="st0" d="M110.5,108.1c-4-1-7.3-1.6-10.3-2.6C89.4,101.8,83,94.3,81.2,83c-1.2-8-0.7-15.8,2.5-23.2
                        c4.6-10.8,13-16.8,24.7-17.4c12.8-0.7,23.2,3.9,29.8,15.2c6,10.3,6.7,21.7,4.8,33.1c-3.9,22.8-16.5,39.2-37.5,48.8
                        c-8.7,4-9.3,3.5-12-5.5c-0.6-1.3-0.1-2.9,1.2-3.6c5.6-3.9,10.2-9,13.3-15.1C109,113,109.8,110.6,110.5,108.1z"/>
                </g>
                </svg>    
                <?php echo $section['quote_text'] ?>
                <svg class="right-quote" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 134 99.7" style="enable-background:new 0 0 134 99.7;" xml:space="preserve">
                <g id="quote_front" transform="translate(214.659 141.924) rotate(180)">
                    <path id="Path_352" class="st0" d="M181.2,108.1c-4-1-7.3-1.6-10.3-2.6c-10.7-3.7-17.1-11.2-18.9-22.5c-1.2-8-0.7-15.8,2.5-23.2
                        c4.6-10.8,13-16.8,24.7-17.4c12.8-0.7,23.2,3.9,29.8,15.2c6,10.3,6.7,21.7,4.8,33.1c-3.9,22.8-16.5,39.2-37.5,48.8
                        c-8.7,4-9.3,3.5-12-5.5c-0.6-1.3-0.1-2.9,1.3-3.6c5.6-3.9,10.2-9,13.3-15.1C179.7,113,180.6,110.6,181.2,108.1z"/>
                    <path id="Path_353" class="st0" d="M110.5,108.1c-4-1-7.3-1.6-10.3-2.6C89.4,101.8,83,94.3,81.2,83c-1.2-8-0.7-15.8,2.5-23.2
                        c4.6-10.8,13-16.8,24.7-17.4c12.8-0.7,23.2,3.9,29.8,15.2c6,10.3,6.7,21.7,4.8,33.1c-3.9,22.8-16.5,39.2-37.5,48.8
                        c-8.7,4-9.3,3.5-12-5.5c-0.6-1.3-0.1-2.9,1.2-3.6c5.6-3.9,10.2-9,13.3-15.1C109,113,109.8,110.6,110.5,108.1z"/>
                </g>
                </svg>   
            </blockquote>
            <cite class="quote-author"><?php echo $section['quote_cite'] ?></cite>
        </div>
    </div>
</section>