<?php

global $section;
$tabs = $section['tab'];
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
$text_color = $section['bg_theme'];
if ($use_bg_color === 'yes') {
    $bg_color = ' bg-[' . $bg_color . ']';
} else {
    $bg_color = '';
};
?>

<section id="tabs-container" class="w-full <?php echo $bg_color; ?>">
    <div class="container-inner w-full mx-auto max-w-screen-2xl">
        <div class="mx-auto quote-inner">
            <div id="section-quote">
                <div id="section-heading" class="w-full ">
                    <?php if ($section['tabs_pre_heading']) : ?>
                        <div class="pre-heading"><?php echo $section['tabs_pre_heading']; ?></div>
                    <?php endif; ?>
                    <h2 class="heading"><?php echo $section['tabs_heading'] ?></h2>
                    <p class="content"><?php echo $section['tabs_content'] ?></p>
                </div>
                <div id="tab-content">
                    <div id="addon-menu">
                        <div id="myDropdown" class="tab dropdown-content">
                            <?php $i = 1;
                            foreach ($tabs as $tab) {
                                if ($i == 1) {
                                    $activeClass = ' active';
                                } else {
                                    $activeClass = '';
                                } ?>
                                <button class="tablinks<?php echo $activeClass; ?>" onclick="openCity(event, '<?php echo $tab['tab_url']; ?>')"><img src="<?php echo $tab['tab_icon'] ?>" alt="Tab Icon" /><?php echo $tab['tab_text'] ?></button>
                            <?php $i++;
                            } ?>

                        </div>
                        <div class="hr-wrapper flex justify-center">
                            <hr>
                        </div>
                    </div>
                    <div id="slides">
                        <?php $i = 1;
                        foreach ($tabs as $tab) {
                            if ($i == 1) {
                                $activeClass = 'active';
                                $display = 'block';
                            } else {
                                $activeClass = '';
                                $display = 'none';
                            } ?>
                            <div id="<?php echo $tab['tab_url'] ?>" class="tabcontent <?php echo $activeClass; ?>" style="display:<?php echo $display; ?>">
                                <div class="flex w-full m-auto card-gap flex-col">
                                    <div class="tab-heading">
                                        <img src="<?php echo $tab['tab_icon'] ?>" alt="Tab Icon" />
                                        <h3 class="text-left"><?php echo $tab['tab_heading']; ?></h3>
                                    </div>
                                    <p class="text-left"><?php echo $tab['tab_content']; ?></p>
                                    <div><img src="<?php echo $tab['tab_image']; ?>" alt="Field Services"></div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        var dropdown = document.getElementsByClassName("dropdown-content");
        dropdown[0].classList.remove("show");
    }
</script>

<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }
</script>