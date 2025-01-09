<?php 
global $section;
$form_type = $section['form_type'];
$form_title = $section['form_title'];
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<?php if ($form_type == 'mkto') : ?>
<section id="mkto-form-container" class="form-container w-full<?php echo $bg_color; ?>">
    <div class="form-inner-wrapper container-inner">
        <h2 class="form-title"><?php echo $form_title ?></h2>
        <script src="//<?php echo $section['mkto-account-id']; ?>.mktoweb.com/js/forms2/js/forms2.min.js"></script> 
        <form class="mktoForm" id="mktoForm_<?php echo $section['mkto-form-id']; ?>"></form> <script>MktoForms2.loadForm("//<?php echo $section['mkto-account-id']; ?>.mktoweb.com", "<?php echo $section['mkto-account-id']; ?>", <?php echo $section['mkto-form-id']; ?>);
        </script>
    </div>
</section>
<?php endif; ?>

<?php if ($form_type == 'gravity') : ?>
<section id="gravity-form-container" class="form-container w-full<?php echo $bg_color; ?>">
    <div class="form-inner-wrapper container-inner">
        <h2 class="form-title"><?php echo $form_title ?></h2>
        <?php echo do_shortcode('[gravityform id="' . $section['gf-form-id'] . '" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice"]') ?>
    </div>
</section>
<?php endif; ?>

<?php if ($form_type == 'cf7') : ?>
<section id="contact-form-container" class="form-container w-full<?php echo $bg_color; ?>">
    <div class="form-inner-wrapper container-inner">
        <h2 class="form-title"><?php echo $form_title ?></h2>
        <?php echo do_shortcode('[contact-form-7 id="' . $section['cf-7-form-id'] . '" title="Contact form 1"]') ?>
    </div>
</section>
<?php endif; ?>

<?php if ($form_type == 'embed') : ?>
<section id="embed-code-container" class="form-container w-full<?php echo $bg_color; ?>">
    <div class="form-inner-wrapper container-inner">
        <h2 class="form-title"><?php echo $form_title ?></h2>
        <?php echo $section['embed_code'] ?>
    </div>
</section>
<?php endif; ?>

<!-- MKTO Account ID: 157-RPM-092 -->