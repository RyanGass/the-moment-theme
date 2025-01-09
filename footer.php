<?php 
/* Footer Contact */
$phone_number = carbon_get_theme_option('footer_phone');
$tagline = carbon_get_theme_option('footer_tagline');

/* Footer Branding */
$logo = carbon_get_theme_option('footer_logo');

/* Footer Social */
$social_text = carbon_get_theme_option('social_text');
$facebook = carbon_get_theme_option('facebook');
$instagram = carbon_get_theme_option('instagram');
$linkedin = carbon_get_theme_option('linkedin');

/* Footer Background */
$use_bg_image = carbon_get_theme_option('use_background_image');
$bg_image = 'background-image: url(' . carbon_get_theme_option('footer_bg_image') . ');';
$use_bg_color = carbon_get_theme_option('use_background_color');
$bg_color = carbon_get_theme_option('background_color');
if ($use_bg_color === 'yes') { $bg_color = 'background-color:' . $bg_color . ';'; } else { $bg_color = '';};

/* Legal */
$footer_legal = carbon_get_theme_option('footer_legal');
?>
</main>

</div>

<footer id="footer" class="" style="<?php echo $bg_image; ?><?php echo $bg_color; ?>" role="contentinfo">
	<div id="footer-inner" class="flex flex-col items-center md:justify-between w-11/12 mx-auto max-w-screen-2xl site-footer md:flex-row ">
		<div id="footer-left">	
			<div id="footer-logo"><?php if ( $logo ) { ?>
					<div class="text-lg uppercase">
						<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
							<img src="<?php echo $logo; ?>" alt="Footer Logo">
						</a>
					</div>
				<?php } else { ?>
					<div class="text-lg uppercase">
						<a href="<?php echo get_bloginfo( 'url' ); ?>" class="text-lg font-extrabold uppercase">
							<?php echo get_bloginfo( 'name' ); ?>
						</a>
					</div>

					<p class="text-sm font-light">
						<?php echo get_bloginfo( 'description' ); ?>
					</p>

				<?php } ?></div>
			<div id="footer-tagline"><?php echo $tagline ?></div>
			<div id="footer-phone"><a href="tel:<?php echo $phone_number ?>" aria-label="Click to call phone number"><?php echo $phone_number ?></a></div>
			<div id="footer-socials">
				<h4><?php echo $social_text ?></h4>
				<?php if ($facebook) : ?>
				<a href="<?php echo $facebook; ?>" class="facebook" title="facebook">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
				</a>
				<?php endif; ?>
				<?php if ($linkedin) : ?>
				<a href="<?php echo $linkedin; ?>" class="linkedin" title="linkedin">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
				</a>
				<?php endif; ?>
				<?php if ($instagram) : ?>
				<a href="<?php echo $instagram; ?>" class="instagram" title="instagram">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
				</a>
				<?php endif; ?>
			</div>
		</div>
		<div id="footer-right">
			<div id="footer-nav-row" class="products-nav">
				<?php wp_nav_menu
						( array( 
							'container_class' => '',
							'menu_class'      => '',
							'theme_location' => 'footer-menu',
							'li_class'        => '',
						) ); ?>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="footer-legal">
			&copy; <?php echo date_i18n( 'Y' );?> - <span class="primary"><?php echo get_bloginfo( 'name' );?></span>. <?php echo $footer_legal; ?><br>
		</div>
	</div>
</footer>

</div>  <!-- end #wrapper -->
<button onclick="scrollToTop()" class="scroll-top"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M201.4 137.4c12.5-12.5 32.8-12.5 45.3 0l160 160c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 205.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l160-160z"/></svg></button>
<script>
function scrollToTop() {
  window.scroll({top: 0, left: 0, behavior: 'smooth'});
}
function trackScroll() {
	let scroller = document.querySelector('.scroll-top');
	if (window.pageYOffset > 50) {
		scroller.style.visibility = 'visible';
	} else {
		scroller.style.visibility = 'hidden';
	}
}
window.addEventListener('scroll', trackScroll);
</script>
<?php wp_footer(); ?>
<script>
setTimeout(function(){
	function launchLightbox(val) {
		var players = VidyardV4.api.getPlayersByUUID(val);
		var player = players[0];
		player.showLightbox();
	}
}, 2500); 
</script>
<script>
// Close main nav when mobile nav item is clicked. 

document.addEventListener('DOMContentLoaded', function () {
  // Get all anchor links with an href attribute containing '#'
  const anchorLinks = document.querySelectorAll('a[href*="#"]');

  // Get the checkbox input with classname '.side-menu'
  const sideMenuCheckbox = document.querySelector('.side-menu');

  // Add a click event listener to each anchor link
  anchorLinks.forEach(link => {
    link.addEventListener('click', function (event) {
      // Check if the href attribute contains '#'
      if (link.href.includes('#')) {
        // Uncheck the checkbox
        sideMenuCheckbox.checked = false;
      }
    });
  });
});
</script>
</body>
</html>
