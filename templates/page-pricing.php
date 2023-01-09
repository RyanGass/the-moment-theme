<?php /* Template Name: Pricing */ 

$tiers = carbon_get_the_post_meta( 'crb_pricing_tiers' ); 

get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
	<main>
        <section id="pricing-container" class="w-11/12 mx-auto mb-28 max-w-screen-2xl">
            <h2 class="section-title small ">Next-Level Features. Small Business Pricing.</h2>
            <div id="pricing-inner" class="flex flex-col items-center justify-center">
				<div class="pricing-select">
					<button id="monthly" class="price-toggle">Monthly</button>
					<button id="annual" class="price-toggle active">Annual</button>
					<span id="discount" class="inline">Save 15%</span>
				</div>
				<div id="annual-pricing" class="flex flex-wrap justify-center lg:flex-nowrap price-content-toggle active">
					<?php foreach ( $tiers as $tier ) { 
						$tier_sections = $tier['crb_pricing_tiers_sections'];
						$popular = $tier['most_popular'];
						if ($popular) {
							$most_popular = ' most-popular';
						}
						?>
						<div class="basis-full md:basis-1/2 price-block<?php echo $most_popular ?>">
							<div class="mx-0 sm:mx-4 price-block-inner">
							<?php foreach ( $tier_sections as $tier_section ) { ?>

								<?php switch ( $tier_section['_type'] ) {
									case 'pricing_top':
								?> 
										<h2><?php echo $tier_section['top_title'] ?></h2>
										<div class="top">
											<h3 class="price"><?php echo $tier_section['top_price'] ?></h3>
											<div class="price-content"><?php echo apply_filters( 'the_content', $tier_section['top_content'] ) ?></div>
										</div>
										<hr>
										<div class="demo-cta">
											<a href="/free-service-fusion-demo" class="mx-auto button red">Get a Free Demo</a>
										</div>
								<?php       
										break;
									case 'pricing_features':
								
								?>
										<div class="features">
											<p class="features-title"><?php echo $tier_section['features_title'] ?></p>
											<div class="features-list"><?php echo $tier_section['features_content'] ?></div>
										</div>
								<?php    
										break;
									case 'pricing_more':
								?>    
										<button id="more-detail" class="more-detail-button more-detail-section__button more-detail-section__button--show-more">+ See More Detail</button>
										<div class="more-detail">
											<h3 class="more-detail-section__title"><?php echo $tier_section['more_title'] ?></h3>
											<div class="more-list"><?php echo $tier_section['more_list'] ?></div>
										</div>
								<?php     
										break;
								}     
							?>           
					<?php $most_popular = ''; }; ?>
					</div>
					</div>
					<?php }; ?>
				</div>

				<div id="monthly-pricing" class="flex flex-wrap justify-center lg:flex-nowrap price-content-toggle">
					<?php foreach ( $tiers as $tier ) { 
						$tier_sections = $tier['crb_pricing_tiers_sections'];
						$popular = $tier['most_popular'];
						if ($popular) {
							$most_popular = ' most-popular';
						}
						?>
						<div class="basis-full md:basis-1/2 price-block<?php echo $most_popular ?>">
							<div class="mx-0 sm:mx-4 price-block-inner">
							<?php foreach ( $tier_sections as $tier_section ) { ?>

								<?php switch ( $tier_section['_type'] ) {
									case 'pricing_top':
								?> 
										<h2><?php echo $tier_section['top_title'] ?></h2>
										<div class="top">
											<h3 class="price"><?php echo $tier_section['top_price_monthly'] ?></h3>
											<div class="price-content"><?php echo $tier_section['top_content_monthly'] ?></div>
										</div>
										<hr>
										<div class="demo-cta">
											<a href="/demo/" class="mx-auto button red">Get a Free Demo</a>
										</div>
								<?php       
										break;
									case 'pricing_features':
								
								?>
										<div class="features">
											<p class="features-title"><?php echo $tier_section['features_title'] ?></p>
											<div class="features-list"><?php echo $tier_section['features_content'] ?></div>
										</div>
								<?php    
										break;
									case 'pricing_more':
								?>    
										<button id="more-detail" class="more-detail-button more-detail-section__button more-detail-section__button--show-more">+ See More Detail</button>
										<div class="more-detail">
											<h3 class="more-detail-section__title"><?php echo $tier_section['more_title'] ?></h3>
											<div class="more-list"><?php echo $tier_section['more_list'] ?></div>
										</div>
								<?php     
										break;
								}     
							?>           
					<?php $most_popular = ''; }; ?>
					</div>
					</div>
					<?php }; ?>
				</div>
            </div>
        </section>

		<script>
		priceToggleButtons = document.getElementsByClassName('price-toggle');
		priceToggleContent = document.getElementsByClassName('price-content-toggle');
		for (let i = 0; i < priceToggleButtons.length; i++) {
			priceToggleButtons[i].addEventListener("click", () => {
				for (let j = 0; j < priceToggleButtons.length; j++) {
					if (i == j) {
						priceToggleButtons[j].classList.add("active");
						priceToggleContent[j].classList.remove("active");
					} else {
						priceToggleButtons[j].classList.remove("active");
						priceToggleContent[j].classList.add("active");
					}
				}

			});
		}

		let more = document.getElementsByClassName('more-detail-button');
		let less = document.getElementsByClassName('less-detail-button');
		let detail = document.getElementsByClassName('more-detail')
		for (let k = 0; k < more.length; k++) {
			more[k].addEventListener("click", () => {
				for (let l = 0; l < more.length; l++) {
					if (k == l) {
						detail[l].classList.toggle("more-detail-transition");
						more[l].classList.toggle('hide');
						if (more[l].innerHTML == '+ See More Detail') {
							more[l].innerHTML = '+ See Less Detail';
						} else {
							more[l].innerHTML = '+ See More Detail';
						}
					} else {
						detail[l].classList.remove("more-detail-transition");
						more[l].classList.remove('hide');
						more[l].innerHTML = '+ See More Detail';
					}

					
				}

			});
		}
		</script>

		<?php $section_multiples = 0; while ( have_posts() ) : the_post();
			$sections = carbon_get_the_post_meta( 'crb_sections' );
			global $sections;
			foreach ( $sections as $section ) {
				get_template_part('templates/template-parts/sections/section', 'INDEX'); 
			}
		endwhile; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();