<?php /* Template Name: Resources */ 

$resources = carbon_get_the_post_meta( 'resource_cards' ); 

get_header() ?>
<?php get_template_part('templates/template-parts/banners/global', 'hero'); ?>
	<main>
        <section id="resources-container" class="w-11/12 py-12 mx-auto mb-14 max-w-screen-2xl">
			<?php foreach ( $resources as $resource ) { ?>	
				<?php if ($resource['card_category'] == 'featured') { ?>
					<div id="featured-resource" class="flex items-center">	
						<div class="featured-img lg:basis-1/3" style="background-image:url(<?php echo $resource['card_image'] ?>);"></div>
						<div class="feature-right lg:basis-2/3 p-11 card-content rounded-r-xl">
							<div class="flex items-center card-category"><img src="/wp-content/uploads/2022/10/featured-resource-icon.svg" alt="Icon" width="76" height="76" /><?php echo $resource['card_category'] ?></div>
							<h3 class="card-title"><?php echo $resource['card_title'] ?></h3>
							<div class="card-excerpt"><?php echo $resource['card_excerpt'] ?></div>
							<a href="<?php echo $resource['card_link_url'] ?>" class="button red"><?php echo $resource['card_link_text'] ?></a>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
            <div id="resources-inner">
				<div class="resources-filter">
					<div id="filter-search-input" class="w-full mb-4">
						<input id="filterInput"  class="w-full" placeholder="Search Topics & Keywords"></input>
					</div>
					<div id="filter-checkboxes" class="flex flex-col items-start md:flex-row md:items-center md:items-end ">
						<span>Resource Type:</span>
						<div class="checkbox">
							<label for="ebook">	
							<input type="checkbox" id="ebook" name="ebook" value="eBook" class="category-filter ebook" onclick="filterEbook()">
							<div class="control__indicator"></div>
							<span>eBook</span></label>
						</div>
						<div class="checkbox">
							<label for="guide">
							<input type="checkbox" id="guide" name="guide" value="Guide" class="category-filter guide" onclick="filterGuide()">
							<div class="control__indicator"></div>
							<span>Guide</span></label>
						</div>
						<div class="checkbox">
							<label for="infographic">
							<input type="checkbox" id="infographic" name="infographic" value="Infographic" class="category-filter infographic" onclick="filterInfographic()">
							<div class="control__indicator"></div>
							<span>Infographic</span></label>
						</div>
						<div class="checkbox">
							<label for="video">
							<input type="checkbox" id="video" name="video" value="Video" class="category-filter video" onclick="filterVideo()">
							<div class="control__indicator"></div>
							<span>Video</span></label>
						</div>
						<div class="checkbox">
							<label for="whitepaper">
							<input type="checkbox" id="whitepaper" name="whitepaper" value="Whitepaper" class="category-filter whitepaper" onclick="filterWhitepaper()">
							<div class="control__indicator"></div>
							<span>Whitepaper</span></label>
						</div>
					</div>
				</div>
				<div id="resource-cards">
					<?php foreach ( $resources as $resource ) { ?>
						<?php
							// Category Icon Assignment
							if ($resource['card_category'] == 'ebook') {
								$category_icon = '/wp-content/uploads/2022/10/ebook.svg';
							}
							if ($resource['card_category'] == 'guide') {
								$category_icon = '/wp-content/uploads/2022/10/guide.svg';
							}
							if ($resource['card_category'] == 'infographic') {
								$category_icon = '/wp-content/uploads/2022/10/infographic-icon.svg';
							}
							if ($resource['card_category'] == 'video') {
								$category_icon = '/wp-content/uploads/2022/10/video.svg';
							}
							if ($resource['card_category'] == 'whitepaper') {
								$category_icon = '/wp-content/uploads/2022/10/whitepaper.svg';
							}
						?>
						<?php if ($resource['card_category'] != 'featured') { ?>
							<a class="absolute resource <?php echo $resource['card_category']; ?>" href="<?php echo $resource['card_link_url'] ?>">
								<div class="card-image" style="background-image:url(<?php echo $resource['card_image'] ?>);">
								</div>
								<div class="pt-6 card-content px-11 pb-11">
									<div class="flex items-center card-category"><img src="<?php echo $category_icon ?>" alt="Icon" width="50" height="50" /><?php echo $resource['card_category'] ?></div>
									<h4 class="card-title"><?php echo $resource['card_title'] ?></h4>
									<div class="card-excerpt"><?php echo $resource['card_excerpt'] ?></div>
									<span class="card-link"><?php echo $resource['card_link_text'] ?></span>
								</div>
							</a>
						<?php } ?>
					<?php }; ?>
				</div>	
            </div>
        </section>

		<script>
			let cardsWrapper;
			let cardsWrapperWidth;
			let card;
			let cardsCount;
			let cardsWidth;
			let cardsGutter;
			let cardsHeight;
			let cardsWidthPercent;
			let cardsGutterPercent;

			function resourceGridInit() {
				const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
				if (vw >= 1024) {
					setTimeout(() => {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsGutter = ((cardsWrapperWidth - (cardsWidth * 3)) / 2 * 2) / 2;
					cardsHeight = card.offsetHeight;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i+=3) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + (h.length * cardsGutter) + 'px';
					}

					let q = [];
					for (let r = 0; r <= cardsCount.length; r+=3) {
						if (cardsCount[r] != undefined) {
						cardsCount[r].style.left = '0%';
						}
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + (q.length * cardsGutter) + 'px';
					}

					for (let j = 1; j < cardsCount.length; j+=3) {
						cardsCount[j].style.left = cardsWidthPercent + cardsGutterPercent + '%';
					}
					
					for (let k = 2; k < cardsCount.length; k+=3) {
						cardsCount[k].style.left = (cardsWidthPercent * 2) + (cardsGutterPercent * 2) + '%';
					}

					let p = [];
					for (let l = 0, m = 0, n = 1, o = 2; l <= cardsCount.length; l++, m+=3, n+=3, o+=3) {
						
						p.push(m);
						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
							if (cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l) + 'px';
							}
							if (cardsCount[o] != undefined) {
							cardsCount[o].style.top = (cardsHeight * l) + 'px';
							}
						}
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

						if (l >= 1 && cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

						if (l >= 1 && cardsCount[o] != undefined) {
							cardsCount[o].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 
					} }, 300)
				}


				if (vw < 1024 && vw > 767) {
					setTimeout(() => {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsGutter = ((cardsWrapperWidth - (cardsWidth * 2)) / 2 * 2) / 2;
					cardsHeight = card.offsetHeight;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i+=2) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + (h.length * cardsGutter) + 'px';
					}

					let q = [];
					for (let r = 0; r <= cardsCount.length; r+=2) {
						if (cardsCount[r] != undefined) {
						cardsCount[r].style.left = '0%';
						}
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + (q.length * cardsGutter) + 'px';
					}

					for (let j = 1; j < cardsCount.length; j+=2) {
						cardsCount[j].style.left = '0%';
						cardsCount[j].style.left = cardsWidthPercent + (cardsGutterPercent * 2) + '%';
					}

					let p = [];
					for (let l = 0, m = 0, n = 1; l <= cardsCount.length; l++, m+=2, n+=2) {
						
						p.push(m);
						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
							if (cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l) + 'px';
							}
						}
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

						if (l >= 1 && cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						}  
					} }, 300)
				} 

				if (vw <= 767) {
					setTimeout(() => {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsHeight = card.offsetHeight;
					cardsGutter = 50;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i++) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + (h.length * cardsGutter) + 'px';
					}

					let q = [];
					for (let r = 0; r <= cardsCount.length; r++) {
						if (cardsCount[r] != undefined) {
							cardsCount[r].style.left = '0%';
						}
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + (q.length * cardsGutter) + 'px';
					}

					let p = [];
					for (let l = 0, m = 0; l <= cardsCount.length; l++, m++) {
						
						p.push(m);
						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
						}
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

					} }, 300)
				}
			} window.onload = (resourceGridInit); window.onresize = (resourceGridInit);

			function resourceGridFilter() {
				const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
				if (vw >= 1024) {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsGutter = ((cardsWrapperWidth - (cardsWidth * 3)) / 2 * 2) / 2;
					cardsHeight = card.offsetHeight;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i+=2) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + 'px';
					}

					let q = [];
					for (let r = 0; r < cardsCount.length; r+=3) {
						cardsCount[r].style.left = '0%';
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + 'px';
					}

					for (let j = 2; j < cardsCount.length; j+=3) {
						cardsCount[j].style.left = (cardsWidthPercent * 2) + (cardsGutterPercent * 2) + '%';
					}
					
					for (let k = 1; k < cardsCount.length; k+=3) {
						cardsCount[k].style.left = cardsWidthPercent + cardsGutterPercent + '%';
					}

					let p = [];
					for (let l = 0, m = 0, n = 1, o = 2; l <= cardsCount.length; l++, m+=3, n+=3, o+=3) {

						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
							if (cardsCount[n] != undefined) {
								cardsCount[n].style.top = (cardsHeight * l) + 'px';
							}
							if (cardsCount[o] != undefined) {
								cardsCount[o].style.top = (cardsHeight * l) + 'px';
							}
						} 
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

						if (l >= 1 && cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						}

						if (l >= 1 && cardsCount[o] != undefined) {
							cardsCount[o].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 
					}
				}

				if (vw < 1024 && vw > 767) {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsGutter = ((cardsWrapperWidth - (cardsWidth * 2)) / 2 * 2) / 2;
					cardsHeight = card.offsetHeight;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i+=2) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + 'px';
					}

					let q = [];
					for (let r = 0; r < cardsCount.length; r+=2) {
						cardsCount[r].style.left = '0%';
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + 'px';
					}

					for (let j = 1; j < cardsCount.length; j+=2) {
						cardsCount[j].style.left = (cardsWidthPercent * 2) + (cardsGutterPercent * 2) + '%';
					}
					
					for (let k = 1; k < cardsCount.length; k+=2) {
						cardsCount[k].style.left = cardsWidthPercent + cardsGutterPercent + '%';
					}

					let p = [];
					for (let l = 0, m = 0, n = 1; l <= cardsCount.length; l++, m+=2, n+=2) {

						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
							if (cardsCount[n] != undefined) {
								cardsCount[n].style.top = (cardsHeight * l) + 'px';
							}
							// if (cardsCount[o] != undefined) {
							// 	cardsCount[o].style.top = (cardsHeight * l) + 'px';
							// }
						} 
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

						if (l >= 1 && cardsCount[n] != undefined) {
							cardsCount[n].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						}

						// if (l >= 1 && cardsCount[o] != undefined) {
						// 	cardsCount[o].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						// } 
					}
				}

				if (vw <= 767) {
					cardsWrapper = document.getElementById('resource-cards');
					cardsWrapperWidth = cardsWrapper.offsetWidth;
					card = document.querySelector('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsCount = document.querySelectorAll('.resource:not([style*="display:none"]):not([style*="display: none"])');
					cardsWidth = card.offsetWidth;
					cardsGutter = 50;
					cardsHeight = card.offsetHeight;
					cardsWidthPercent = (cardsWidth / cardsWrapperWidth) * 100;
					cardsGutterPercent = (cardsGutter / cardsWrapperWidth) * 100;

					let h = [];
					for (let i = 0; i <= cardsCount.length - 2; i++) {
						cardsCount[i].style.left = '0%';
						h.push(i);
						cardsWrapper.style.height = (h.length * cardsHeight) + (h.length * cardsGutter) + 'px';
					}

					let q = [];
					for (let r = 0; r < cardsCount.length; r++) {
						cardsCount[r].style.left = '0%';
						q.push(r);
						cardsWrapper.style.height = (q.length * cardsHeight) + (q.length * cardsGutter) + 'px';
					}

					let p = [];
					for (let l = 0, m = 0; l <= cardsCount.length; l++, m++) {

						if (l == 0) {
							cardsCount[m].style.top = (cardsHeight * l) + 'px';
						} 
						
						if (l >= 1 && cardsCount[m] != undefined) {
							cardsCount[m].style.top = (cardsHeight * l + (cardsGutter * l)) + 'px';
						} 

					}
				}
			}

			let ebook = document.getElementById('ebook');
			let guide = document.getElementById('guide');
			let infographic = document.getElementById('infographic');
			let video = document.getElementById('video');
			let whitepaper = document.getElementById('whitepaper');

			let notEbookCards = document.querySelectorAll('.resource:not(.ebook)');
			let ebookCards = document.querySelectorAll('.resource.ebook');
			let notGuideCards = document.querySelectorAll('.resource:not(.guide)');
			let guideCards = document.querySelectorAll('.resource.guide');
			let notInfographicCards = document.querySelectorAll('.resource:not(.infographic)');
			let infographicCards = document.querySelectorAll('.resource.infographic');
			let notVideoCards = document.querySelectorAll('.resource:not(.video)');
			let videoCards = document.querySelectorAll('.resource.video');
			let notWhitepaperCards = document.querySelectorAll('.resource:not(.whitepaper)');
			let whitepaperCards = document.querySelectorAll('.resource.whitepaper');

			// Filter by URL Params
			const queryString = window.location.search;
			const urlParams = new URLSearchParams(queryString);
			let resource_type = urlParams.get('resource-type');
			
			
			switch (resource_type) {
				case 'ebook':
				ebook.checked = true;
				filterEbook();
				break;
				case 'guide':
				guide.checked = true;
				filterGuide();
				break;
				case 'infographic':
				infographic.checked = true;
				filterInfographic();
				break;
				case 'video':
				video.checked = true;
				filterVideo();
				break;
				case 'whitepaper':
				whitepaper.checked = true;
				filterWhitepaper();
				break;	
			}

			function filterEbook() {
				if (ebook.checked) {
					ebook.classList.add('active');
					for (let cards = 0; cards < notEbookCards.length; cards++){
						if (!guide.checked && !infographic.checked && !video.checked && !whitepaper.checked) {
							notEbookCards[cards].style.display = 'none';
						}
					}
					for (let cards = 0; cards < ebookCards.length; cards++){
						ebookCards[cards].style.display = '';
					}
					resourceGridFilter();
				} else {
					ebook.classList.remove('active');
					for (let cards = 0; cards < notEbookCards.length; cards++){
						if (!guide.checked && !infographic.checked && !video.checked && !whitepaper.checked) {
							notEbookCards[cards].style.display = '';
						}

						if (guide.checked && cards < ebookCards.length) {
							ebookCards[cards].style.display = 'none';
						}

						if (infographic.checked && cards < ebookCards.length) {
							ebookCards[cards].style.display = 'none';
						}

						if (video.checked && cards < ebookCards.length) {
							ebookCards[cards].style.display = 'none';
						}

						if (whitepaper.checked && cards < ebookCards.length) {
							ebookCards[cards].style.display = 'none';
						}
						
					}
					resourceGridFilter();
				}
			}

			function filterGuide() {
				if (guide.checked) {
					guide.classList.add('active');
					for (let cards = 0; cards < notGuideCards.length; cards++){
						if (!ebook.checked && !infographic.checked && !video.checked && !whitepaper.checked) {
							console.log('if checked none');
							notGuideCards[cards].style.display = 'none';
						}
					}
					for (let cards = 0; cards < guideCards.length; cards++){
						console.log('if checked show');
						guideCards[cards].style.display = '';
					}
					resourceGridFilter();
				} else {
					guide.classList.remove('active');
					for (let cards = 0; cards < notGuideCards.length; cards++){
						if (!ebook.checked && !infographic.checked && !video.checked && !whitepaper.checked) {
							console.log('else 1');
							notGuideCards[cards].style.display = '';
						}

						if (ebook.checked && cards < guideCards.length) {
							console.log('else 2');
							guideCards[cards].style.display = 'none';
						}

						if (infographic.checked && cards < guideCards.length) {
							console.log('else 3');
							guideCards[cards].style.display = 'none';
						}

						if (video.checked && cards < guideCards.length) {
							console.log('else 4');
							guideCards[cards].style.display = 'none';
						}

						if (whitepaper.checked && cards < guideCards.length) {
							console.log('else 5');
							guideCards[cards].style.display = 'none';
						}
					}
					
					resourceGridFilter();
				}
			}

			function filterInfographic() {
				if (infographic.checked) {
					infographic.classList.add('active');
					for (let cards = 0; cards < notInfographicCards.length; cards++){
						if (!ebook.checked && !guide.checked && !video.checked && !whitepaper.checked) {
							notInfographicCards[cards].style.display = 'none';
						}
					}
					for (let cards = 0; cards < infographicCards.length; cards++){
						infographicCards[cards].style.display = '';
					}
					resourceGridFilter();
				} else {
					infographic.classList.remove('active');
					for (let cards = 0; cards < notInfographicCards.length; cards++){
						if (!ebook.checked && !guide.checked && !video.checked && !whitepaper.checked) {
							notInfographicCards[cards].style.display = '';
						}

						if (ebook.checked && cards < infographicCards.length) {
							infographicCards[cards].style.display = 'none';
						}

						if (guide.checked && cards < infographicCards.length) {
							infographicCards[cards].style.display = 'none';
						}

						if (video.checked && cards < infographicCards.length) {
							infographicCards[cards].style.display = 'none';
						}

						if (whitepaper.checked && cards < infographicCards.length) {
							infographicCards[cards].style.display = 'none';
						}
					}
					resourceGridFilter();
				}
			}

			function filterVideo() {
				if (video.checked) {
					video.classList.add('active');
					for (let cards = 0; cards < notVideoCards.length; cards++){
						if (!ebook.checked && !guide.checked && !infographic.checked && !whitepaper.checked) {
							notVideoCards[cards].style.display = 'none';
						}
					}
					for (let cards = 0; cards < videoCards.length; cards++){
						videoCards[cards].style.display = '';
					}
					resourceGridFilter();
				} else {
					video.classList.remove('active');
					for (let cards = 0; cards < notVideoCards.length; cards++){
						if (!ebook.checked && !guide.checked && !infographic.checked && !whitepaper.checked) {
							notVideoCards[cards].style.display = '';
						}

						if (ebook.checked && cards < videoCards.length) {
							videoCards[cards].style.display = 'none';
						}

						if (guide.checked && cards < videoCards.length) {
							videoCards[cards].style.display = 'none';
						}

						if (infographic.checked && cards < videoCards.length) {
							videoCards[cards].style.display = 'none';
						}

						if (whitepaper.checked && cards < videoCards.length) {
							videoCards[cards].style.display = 'none';
						}
					}
					resourceGridFilter();
				}
			}

			function filterWhitepaper() {
				if (whitepaper.checked) {
					whitepaper.classList.add('active');
					for (let cards = 0; cards < notWhitepaperCards.length; cards++){
						if (!ebook.checked && !guide.checked && !infographic.checked && !video.checked) {
							notWhitepaperCards[cards].style.display = 'none';
						}
					}
					for (let cards = 0; cards < whitepaperCards.length; cards++){
						whitepaperCards[cards].style.display = '';
					}
					resourceGridFilter();
				} else {
					whitepaper.classList.remove('active');
					for (let cards = 0; cards < notWhitepaperCards.length; cards++){
						if (!ebook.checked && !guide.checked && !infographic.checked && !video.checked) {
							notWhitepaperCards[cards].style.display = '';
						}

						if (ebook.checked && cards < whitepaperCards.length) {
							whitepaperCards[cards].style.display = 'none';
						}

						if (guide.checked && cards < whitepaperCards.length) {
							whitepaperCards[cards].style.display = 'none';
						}

						if (infographic.checked && cards < whitepaperCards.length) {
							whitepaperCards[cards].style.display = 'none';
						}

						if (video.checked && cards < whitepaperCards.length) {
							whitepaperCards[cards].style.display = 'none';
						}
					}
					resourceGridFilter();
				}
			}

			// Get input element
			let filterInput = document.getElementById('filterInput');
			// Add event listener
			filterInput.addEventListener('keyup', filterNames);

			function filterNames(){
			
				// Get value of input
				let filterValue = document.getElementById('filterInput').value.toUpperCase();

				// Get names ul
				let resource_cards = document.getElementById('resource-cards');
				// Get lis from ul
				let resource_card = resource_cards.querySelectorAll('a.resource');

				// Loop through collection-item lis
				for(let i = 0;i < resource_card.length;i++){
					let div = resource_card[i].querySelectorAll('div.card-content')[0];
					// If matched
					if(div.innerHTML.toUpperCase().indexOf(filterValue) > -1){
					resource_card[i].style.display = '';
					resourceGridFilter()
					} else {
					resource_card[i].style.display = 'none';
					resourceGridFilter()
					}
				}

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