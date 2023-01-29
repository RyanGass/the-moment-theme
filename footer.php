<?php 
$facebook = carbon_get_theme_option('facebook');
$instagram = carbon_get_theme_option('instagram');
$linkedin = carbon_get_theme_option('linkedin');
$phone_number = carbon_get_theme_option('footer_phone');
$tagline = carbon_get_theme_option('footer_tagline');
?>
</main>

</div>

<footer id="footer" class="" role="contentinfo">
	<div id="footer-inner" class="flex flex-col items-center md:justify-between w-11/12 mx-auto max-w-screen-2xl site-footer md:flex-row ">
		<div id="footer-left">	
			<div id="footer-logo"><?php the_custom_logo(); ?></div>
			<div id="footer-tagline"><?php echo $tagline ?></div>
			<div id="footer-phone"><a href="tel:<?php echo $phone_number ?>"><?php echo $phone_number ?></a></div>
			<div id="footer-socials">
				<h4>Follow Us!</h4>
				<a href="<?php echo $facebook; ?>" class="facebook" title="facebook">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
				</a>
				<a href="<?php echo $linkedin; ?>" class="linkedin" title="linkedin">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
				</a>
				<a href="<?php echo $instagram; ?>" class="instagram" title="instagram">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
				</a>
			</div>
		</div>
		<div id="footer-right">
			<div id="footer-nav-row" class="products-nav">
				<h4>Footer Menu 1</h4>
				<?php wp_nav_menu
						( array( 
							'container_class' => '',
							'menu_class'      => '',
							'theme_location' => 'footer-menu-1',
							'li_class'        => '',
						) ); ?>
			</div>
			<div id="footer-nav-row" class="resources-nav">
				<h4>Footer Menu 2</h4>
				<?php wp_nav_menu
						( array( 
							'container_class' => '',
							'menu_class'      => '',
							'theme_location' => 'footer-menu-2',
							'li_class'        => '',
						) ); ?>
			</div>
			<div id="footer-nav-row" class="company-nav">
				<h4>Footer Menu 3</h4>
				<?php wp_nav_menu
						( array( 
							'container_class' => '',
							'menu_class'      => '',
							'theme_location' => 'footer-menu-3',
							'li_class'        => '',
						) ); ?>
			</div>
		</div>
	</div>
	<div id="footer-bottom">
		<div class="footer-legal">
			&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?> | All rights reserved.<br>
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
 <!-- Start VWO Async SmartCode -->
<script type="text/javascript">
window._vwo_code = window._vwo_code || (function(){
var account_id=635355,
version=1.1,
settings_tolerance=2000,
library_tolerance=2500,
use_existing_jquery=false,
is_spa=1,
hide_element='body',
/* DO NOT EDIT BELOW THIS LINE */
f=false,d=document,code={use_existing_jquery:function(){return use_existing_jquery},library_tolerance:function(){return library_tolerance},finish:function(){if(!f){f=true;var e=d.getElementById('_vis_opt_path_hides');if(e)e.parentNode.removeChild(e)}},finished:function(){return f},load:function(e){var t=d.createElement('script');t.fetchPriority='high';t.src=e;t.type='text/javascript';t.innerText;t.onerror=function(){_vwo_code.finish()};d.getElementsByTagName('head')[0].appendChild(t)},init:function(){window.settings_timer=setTimeout(function(){_vwo_code.finish()},settings_tolerance);var e=d.createElement('style'),t=hide_element?hide_element+'{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}':'',i=d.getElementsByTagName('head')[0];e.setAttribute('id','_vis_opt_path_hides');e.setAttribute('type','text/css');if(e.styleSheet)e.styleSheet.cssText=t;else e.appendChild(d.createTextNode(t));i.appendChild(e);this.load('https://dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&f='+ +is_spa+'&r='+Math.random()+'&vn='+version);return settings_timer}};window._vwo_settings_timer = code.init();return code;}());
</script>
<!-- End VWO Async SmartCode -->
<!-- Begin: $EC -->
<script>
document.body.addEventListener('pointermove', () => {
setTimeout(function(){
(function(){var e = document.createElement('script'); 
e.type="text/javascript";e.async=true; 
e.src="//evercommercemarketing.s3.amazonaws.com/ec.min.js"; 
document.body.appendChild(e);})();
}, 500);
}, { once: true });
</script>
<!-- End: $EC -->
</body>
</html>
