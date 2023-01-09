<?php 

global $section;
$bg_color = $section['grey_background'];
if ($bg_color === 'yes') { $bg_color = ' bg-sectionbg'; };
?>

<section id="blockquote-container" class="w-full<?php echo $bg_color; ?>">
    <div class="w-11/12 mx-auto max-w-screen-2xl">
        <div class="max-w-screen-md mx-auto quote-inner">
            <blockquote class="quote-text">
                <img class="left-quote" src="/wp-content/uploads/2022/11/quote-front.svg" alt="Quotation Mark" />    
                <?php echo $section['quote_text'] ?>
                <img class="right-quote" src="/wp-content/uploads/2022/11/quote-front.svg" alt="Quotation Mark" />
            </blockquote>
            <cite class="quote-author"><?php echo $section['quote_cite'] ?></cite>
        </div>
    </div>
</section>