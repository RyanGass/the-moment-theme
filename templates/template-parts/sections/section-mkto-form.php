<?php 
global $section;
?>

<section id="mkto-form-container" class="w-11/12 mx-auto max-w-screen-2xl">
    <script src="//157-RPM-092.mktoweb.com/js/forms2/js/forms2.min.js"></script> 
    <form class="mktoForm" id="mktoForm_<?php echo $section['mkto-form-id']; ?>"></form> <script>MktoForms2.loadForm("//157-RPM-092.mktoweb.com", "157-RPM-092", <?php echo $section['mkto-form-id']; ?>);
    </script>
</section>