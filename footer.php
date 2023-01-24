<?php 
$fbutton1_text = carbon_get_theme_option('footer_button_1_text');
$fbutton1_url = carbon_get_theme_option('footer_button_1_url');
$fbutton2_text = carbon_get_theme_option('footer_button_2_text');
$fbutton2_url = carbon_get_theme_option('footer_button_2_url');
?>
</main>

</div>

<footer id="footer" class="" role="contentinfo">
	<div id="footer-inner" class="flex flex-col items-center md:justify-between w-11/12 mx-auto max-w-screen-2xl site-footer md:flex-row ">
		<div id="footer-left" class="lg:basis-1/3">	
			<?php the_custom_logo(); ?>
		</div>
		<div id="footer-right" class="lg:basis-2/3">
			<div id="footer-nav-row">
				<?php wp_nav_menu
						( array( 
							'container_class' => '',
							'menu_class'      => 'flex w-full',
							'theme_location' => 'footer',
							'li_class'        => '',
						) ); ?>
			</div>
			<div class="footer-legal">
				&copy; <?php echo date_i18n( 'Y' );?> - <?php echo get_bloginfo( 'name' );?>
			</div>
		</div>
	</div>
</footer>

</div>  <!-- end #wrapper -->

<?php wp_footer(); ?>

<?php 
// Only load VidYard script if needed on page
$sections = carbon_get_the_post_meta( 'crb_sections' );
$js_once = true;
foreach ( $sections as $section ) :
if ($section['video'] && $js_once == true) : ?>
<script>
	// setTimeout(function(){

	// 	var JSLink = "https://play.vidyard.com/embed/v4.js";
	// 	var JSElement = document.createElement('script');
	// 	JSElement.src = JSLink;
	// 	document.getElementsByTagName('head')[0].appendChild(JSElement);

	// }, 2500); 

</script>

<?php $js_once = false; endif; endforeach; ?>

<?php 
$page_id = get_queried_object_id();
$video_id = carbon_get_post_meta( $page_id, 'video_id' );
if ($video_id) : ?>
<script>
setTimeout(function(){

	var JSLink = "https://play.vidyard.com/embed/v4.js";
	var JSElement = document.createElement('script');
	JSElement.src = JSLink;
	document.getElementsByTagName('head')[0].appendChild(JSElement);

}, 2500); 

function launchLightbox(val) {
	var players = VidyardV4.api.getPlayersByUUID(val);
	var player = players[0];
	player.showLightbox();
}
</script>
<?php endif ?>
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
