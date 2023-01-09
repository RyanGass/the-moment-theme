<?php 
global $section;
$section_image = $section['image'];
$imageID = attachment_url_to_postid( $section_image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$image_shift_up = $section['image_shift_up'];
$heading = $section['heading'];
$popup_form = $section['popup_form'];
$button_url = $section['button_url'];
$button_text = $section['button_text'];
if ($section_image == false) {
	$section_image = '/wp-content/uploads/2022/05/cta-banner-image-2-880x721-1.webp';
	$image_shift = ' shift-true';
} elseif ($section_image == true && $image_shift_up == 'yes') {
	$image_shift = ' shift-top';
} else {
	$image_shift = ' shift-true';
} 
if ($popup_form == 'yes') {
	$button_url = '#popup-form';
} 
?>

<section id="demo-container" class="lg:pt-16<?php echo $image_shift; ?>">
	<div class="relative grid w-11/12 pt-12 pb-12 mx-auto demo-inner xl:pt-24 xl:pb-40 xl:grid-cols-2 max-w-screen-2xl">
		<div id="section-left-content" class="w-full"> 
			<h2 class="w-full mx-auto text-center xl:mx-0 xl:text-left xl:pt-14 section-title"><?php echo $heading ?></h2>
			<a id="form-init" href="<?php echo $button_url; ?>" class="block mx-auto xl:mx-0 button red"><?php echo $button_text; ?></a>
		</div>
		<div id="section-right-content" class="absolute hidden xl:block">
			<img class="mx-auto" src="<?php echo $section_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
		</div>
	</div>
	<?php if ($popup_form == 'yes') { ?>
	<div id="popup-form" data-hidden>
		<div id="form-close"></div>
		<div id="mkto-form-container" class="popover-form">
			<script src="//157-RPM-092.mktoweb.com/js/forms2/js/forms2.min.js"></script> <form id="mktoForm_1019" class="!w- "></form> <script>MktoForms2.loadForm("//157-RPM-092.mktoweb.com", "157-RPM-092", 1019);</script>
		</div>
	</div>
	<?php } ?>
</section>

<style>
	div#mkto-form-container.popover-form {
		background: #fff;
		z-index: 1;
		max-width: 600px;
    	width: 100%;
		position: absolute;
    	top: 15%;;

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
</style>

<?php if ($popup_form == 'yes') { ?>
<script>
let popButton = document.querySelector('#form-init');
let popForm = document.querySelector('#popup-form');
let popClose = document.querySelector('#form-close');
popButton.addEventListener("click", popoverInit);
popClose.addEventListener("click", popoverClose);
function popoverInit() {
	popForm.removeAttribute('data-hidden');
}
function popoverClose() {
	popForm.setAttribute('data-hidden', '');
}
</script>
<?php } ?>