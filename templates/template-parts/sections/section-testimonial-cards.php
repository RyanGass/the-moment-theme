<?php
global $section;
$testimonials = $section['crb_testimonials'];
$count = $section['testimonial_number'];
?>

<section id="card-testimonial-slides-container" class="w-11/12 mx-auto mb-24 max-w-screen-2xl">
	<button type="button" onclick="cardPrev()" class="button-nav card-slide-navigation previous"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></button>
	<div class="w-11/12 px-12 m-auto card-slide-inner-container">
        <div id="card-testimonials-repeater" class="flex card-slide-track">
			<?php $i = 1; foreach ( $testimonials as $testimonial ) {
				$image = $testimonial['testimonial_image'];
				$imageID = attachment_url_to_postid( $image );
				$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
				$image_title = get_the_title($imageID);
				if ($count >= $i) { $showSlide = ' card-show-slide'; } else { $showSlide = ''; };
				?>
                <div id="card-slide-block-<?php echo $i ?>" class="card-section-block card-slide-initial card-slide-block<?php echo $showSlide ?>">
                    <div class="h-full area">
                        <div class="flex flex-col items-stretch justify-around h-full text-center inner-area align-center">
                            <img class="mx-auto grow-0" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                            <span class="block my-8 quote-content grow-1"><?php echo $testimonial['testimonial_content']; ?></span>
                            <div class="mt-auto bottom-content">
								<span class="block font-black quote-name-company grow-0"><br><?php echo $testimonial['testimonial_name']; ?><br><?php echo $testimonial['testimonial_company']; ?></span>
								<div id="stars" class="flex justify-center w-full mt-4 grow-0">
									<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="#fc9951">
									<path fill="#fc9951" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="#fc9951">
									<path fill="#fc9951" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="#fc9951">
									<path fill="#fc9951" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="#fc9951">
									<path fill="#fc9951" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="#fc9951">
									<path fill="#fc9951" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
									</svg>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            <?php $i++; }; ?>
		</div>
    </div>
	<button type="button" onclick="cardNext()" class="button-nav card-slide-navigation next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg></button>
</section>
<style>
    .card-slide-inner-container {
        overflow: hidden;
    }
    
    div.card-slide-block {
        display: inline-block;
    }

	.card-slide-navigation svg {
		fill: blue;
		width: 40px;
		height: 40px;
	}
</style>
<script>
		// Slider variables setup
		let cardslides = document.querySelectorAll('.card-slide-block'); // Create an array of slides
		let cardslideid = document.querySelector('.card-slide-block').id // Create an array of slide ids
		let cardslideButtons = document.getElementsByClassName("card-slide-button"); // Create an array of slide nav buttons
		let cardsliderPosition = 0; 
		let cardposition = 0;

        function cardsizeSlides() {
            // Prep Slides and Containers
            let cardslideContainer = document.querySelector('.card-slide-inner-container');
            let cardslideTrack = document.querySelector('.card-slide-track');
            let cardslideContainerWidth = cardslideContainer.offsetWidth;
			let cardslideCount = document.querySelectorAll('.card-show-slide');
			let cardslideInitial = document.querySelectorAll('.card-slide-initial');
            let cardslideWidth = cardslideContainerWidth / cardslideCount.length;
			let cardslideBlockContainer = document.getElementById('card-testimonials-repeater');
            let cardslideBlock = document.querySelectorAll('.card-slide-block');
			document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
			
            for (let i = 0; i <= cardslideBlock.length - 1; i++) {
                cardslideBlock[i].style.width = cardslideWidth + "px";
				if (i <= cardslideBlock.length - 1) {
					cardclone = cardslideBlock[i].cloneNode(true);
					cardclone.removeAttribute('id');
					cardclone.className = 'card-section-block card-slide-block slide-clone';
					document.getElementById('card-testimonials-repeater').appendChild(cardclone);
				}

				if (i >= 0) {
					cardpreclone = cardslideBlock[i].cloneNode(true);
					cardpreclone.className = 'card-section-block card-slide-block slide-clone';
					cardpreclone.removeAttribute('id');
					let cardparentdiv = document.getElementById('card-testimonials-repeater');
					let cardinsertPreclone = document.getElementById('card-slide-block-1');
					cardparentdiv.insertBefore(cardpreclone, cardinsertPreclone);
				}
            }

			let cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
            cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

			const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

			if (vw <= 1024 && vw > 768) {
				cardslideCount = document.querySelectorAll('.card-show-slide');
				last = cardslideCount.length - 1;
				cardslideCount[last].classList.remove('card-show-slide', 'card-slide-initial');

				cardslideContainer = document.querySelector('.card-slide-inner-container');
				cardslideContainerWidth = cardslideContainer.offsetWidth;
				cardslideCount = document.querySelectorAll('.card-show-slide');
				cardslideWidth = cardslideContainerWidth / cardslideCount.length;
				document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
				cardslideBlock = document.querySelectorAll('.card-slide-block');
				for (let i = 0; i <= cardslideBlock.length - 1; i++) {
					cardslideBlock[i].style.width = cardslideWidth + "px";
				}
			cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
            cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

			}

			if (vw <= 768) {
				console.log('i am <= 768px')
				cardslideCount = document.querySelectorAll('.card-show-slide');
				
				for (let j = 0; j <= cardslideCount.length -2; j++) {
					cardslideCount[j].classList.remove('card-show-slide', 'card-slide-initial');
				}

				cardslideContainer = document.querySelector('.card-slide-inner-container');
				cardslideContainerWidth = cardslideContainer.offsetWidth;
				cardslideCount = document.querySelectorAll('.card-show-slide');
				cardslideWidth = cardslideContainerWidth / cardslideCount.length;
				document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
				cardslideBlock = document.querySelectorAll('.card-slide-block');
				for (let i = 0; i <= cardslideBlock.length - 1; i++) {
					cardslideBlock[i].style.width = cardslideWidth + "px";
				}
			cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
            cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

			}

        }

		function cardREsizeSlides() {
			//console.log('not in a media query');
			const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
			
			let cardslideContainer = document.querySelector('.card-slide-inner-container');
			let cardslideTrack = document.querySelector('.card-slide-track');
			let cardslideContainerWidth = cardslideContainer.offsetWidth;
			let cardslideInitial = document.querySelectorAll('.card-slide-initial');
			let cardslideCount = document.querySelectorAll('.card-show-slide');
			let cardslideWidth = cardslideContainerWidth / cardslideCount.length;
			let cardslideBlock = document.querySelectorAll('.card-slide-block');

			for (let i = 0; i <= cardslideBlock.length - 1; i++) {
                cardslideBlock[i].style.width = cardslideWidth + "px";
            }

			cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
            cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

			if (vw >= 1024) {
				console.log('>= 1024');

				if (cardslideCount.length == 3) { // md
					console.log('cardslideCount.length == 3');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
				}

				if (cardslideCount.length == 2 && lgonce != true) {
					console.log('cardslideCount.length == 2 && lgonce != true');
					for (k = 0; k <= cardslideCount.length; k++) {
						if (k == cardslideCount.length - 1) {
							test = cardslideCount[k].nextElementSibling.classList.add('card-show-slide', 'card-slide-initial');;
						}
					}

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					cardslideInitial = document.querySelectorAll('.card-slide-initial');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
					for (let l = 0; l <= cardslideBlock.length - 1; l++) {
						cardslideBlock[l].style.width = cardslideWidth + "px";
					}

					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

					lgonce = true;
					mdonce = '';
				}

				if (cardslideCount.length == 3 && mdonce != true) {
					console.log('cardslideCount.length == 3 && mdonce != true');
					cardslideCount = document.querySelectorAll('.card-show-slide');
					last = cardslideCount.length - 1;
					cardslideCount[last].classList.remove('card-show-slide', 'card-slide-initial');
					
					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length) - 48) + "px)"; 
					for (let i = 0; i <= cardslideBlock.length - 1; i++) {
						cardslideBlock[i].style.width = cardslideWidth + "px";
					}
					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";
					mdonce = true;
					lgonce = '';
				}
			}

			
			if (vw >= 769 && vw <= 1023) {
				console.log('>= 769 && <= 1023');
				
				if (cardslideCount.length == 2 && mdonce != true && smonce != true) { // lg
					console.log('cardslideCount.length == 2 && mdonce != true && smonce != true');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 2) - 48) + "px)";
					smonce = true;
				}
				if (cardslideCount.length == 2 && mdonce != true && smonce == true) { // lg
					console.log('cardslideCount.length == 2 && mdonce != true && smonce == true');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 1) - 48) + "px)"; 
					smonce = undefined;
				}
				if (cardslideCount.length == 1 && mdonce != true && smonce == true && gt == true) { // lg
					console.log('cardslideCount.length == 1 && mdonce != true && smonce == true && gt == true');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 2) - 48) + "px)"; 
					smonce = undefined;
				}
				if (cardslideCount.length == 1 && mdonce == true && smonce == true && gt == true) { // lg
					console.log('cardslideCount.length == 1 && mdonce == true && smonce == true && gt == true');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 2) - 48) + "px)"; 
					smonce = undefined;
				}
				if (cardslideCount.length == 2 && mdonce == true) { // sm
					console.log('cardslideCount.length == 2 && mdonce == true');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 1) - 48) + "px)"; 
				}
				
				if (cardslideCount.length == 1 && smonce != true) {
					console.log('cardslideCount.length == 1 && smonce != true');
					for (k = 0; k <= cardslideCount.length; k++) {
						if (k == cardslideCount.length - 1) {
							test = cardslideCount[k].nextElementSibling.classList.add('card-show-slide', 'card-slide-initial');;
						}
					}

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					cardslideInitial = document.querySelectorAll('.card-slide-initial');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 1) - 48) + "px)"; 
					for (let l = 0; l <= cardslideBlock.length - 1; l++) {

						cardslideBlock[l].style.width = cardslideWidth + "px";

					}

					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";
				
					smonce = '';
					once = '';
				}
			}

			if (vw <= 768) {
				console.log('<= 768');
				
				if (cardslideCount.length == 1 && once == true) { // sm
					console.log('cardslideCount.length == 1');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 2) - 48) + "px)"; 
				}
				
				if (cardslideCount.length == 2 && once != true) {
					console.log('cardslideCount.length == 2 && once != true');
					cardslideCount = document.querySelectorAll('.card-show-slide');
					last = cardslideCount.length - 1;
					cardslideCount[last].classList.remove('card-show-slide', 'card-slide-initial');

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cardslideInitial.length + 1) - 48) + "px)"; 
					for (let i = 0; i <= cardslideBlock.length - 1; i++) {
						cardslideBlock[i].style.width = cardslideWidth + "px";
					}
					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";
					once = true;
				}

				if (cardslideCount.length == 1 && once != true) {
					console.log('cardslideCount.length == 1 && once != true');
					gt = true;
				}
			}
		}
		let lgonce;
		let mdonce;
		let smonce;
		let once;
		let gt;
        window.addEventListener("load", cardsizeSlides);
        window.addEventListener("resize", cardREsizeSlides);

		// Dragable
		// let sliderContainer = document.querySelector('.card-slide-inner-container');
		// let innerSlider = document.querySelector('.card-slide-track');

		// let pressed = false;
		// let startX;
		// let x;

		// innerSlider.addEventListener("mousedown", (e) => {
		// 	pressed = true;
		// 	startXtransform = document.querySelector('.card-slide-track').style.transform;
        //     startX = -startXtransform.replace(/[^\d.]/g, '');
		// 	innerSlider = document.querySelector('.card-slide-track');
		// 	x = e.pageX;
		// 	y = window.innerWidth - innerSlider.getBoundingClientRect().right;
		// 	sliding = x - 1;
		// 	console.log('pageX: ' + x);
		// 	console.log('startX: ' + startX);
		// 	console.log('========');
		// });

		// sliderContainer.addEventListener("mouseenter", () => {
		// 	//sliderContainer.style.cursor = "grab";
		// });

		// sliderContainer.addEventListener("mouseup", () => {
		// 	//sliderContainer.style.cursor = "grab";
		// 	pressed = false;
		// });


		// sliderContainer.addEventListener("mousemove", (e) => {
		// 	if (!pressed) return;
		// 	e.preventDefault();
		// 	y = sliderContainer.offsetLeft;
		// 	x = e.pageX - startX;
		// 	diff = x - startX;
		// 	trans = e.pageX + diff;
		// 	console.log('startX: ' + startX);
		// 	console.log('diff: ' + diff);
		// 	console.log('trans: ' + trans);
		// 	console.log('========');

		// 	if (x < startX - 1) {
		// 		console.log('dragging left');
		// 		//Prev();
		// 		document.querySelector('.card-slide-track').style.transform = 'translate(' + x + 'px)';
		// 	}

		// 	if (x > startX) {
		// 		console.log('dragging right');
		// 		//Next();
		// 		document.querySelector('.card-slide-track').style.transform = 'translate(' + -x + 'px)';
		// 	}
			
		// 	//innerSlider.style.transform = `translate(${x + sliding}px)`;
		// });

		// Create the slider button navigation
		// for(let i = 1; i <= cardslides.length; i++) {
		// 	let cardslideWrapper = document.getElementById('card-slide-nav'); // Get the nav parent element
		// 	if (i == 1) { cardslideActive = 'class="button-active card-slide-button"';} else { cardslideActive = 'class="card-slide-button"'; } // Add classes for initial active slide
		// 	cardslideWrapper.insertAdjacentHTML('beforeend', '<li><button ' + cardslideActive + ' id="card-slide-button-' + i + '" aria-controls="slide-' + i + '" onClick="slideToggle(this)"></button></li>'); // Create the button elements inside the card-slide-nav
		// 	cardslideActive = ''; // Reset the active slide variable to stop from adding the active class to all elements in the loop
		// }

		// Function triggered when the slide button element is clicked. 
		// Handles slide transitions and toggling button active states
		function cardslideToggle(id) {
			let cardsliderButtonId = document.getElementById(id.getAttribute("id")).id; // Get the id of the clicked button
			let cardsliderPositionSlice = cardsliderButtonId.slice(-1); // Slice the last character of the id and save in a new variable
			cardposition = cardsliderPositionSlice -= 1; // Need to reset position to match the current "clicked" position - This value is then used by Next()
			cardsliderPosition = cardposition; // Need to reset sliderPosition to match the current "clicked" position - This value is then used by Next()
			for(let i = 1, s = 0; i <= cardslides.length; i++, s++) { // setup dual for loop variables and conditions
				cardslides[s].classList.add('closed'); // add "closed" class to all slides
				document.getElementById(id.getAttribute("aria-controls")).classList.remove('closed'); // remove "close" class from the in focus slide - aria-controls set to the id of the slide.
				document.getElementById('card-slide-button-' + i).classList.remove('button-active'); // Remove focus from current button 
				document.getElementById(id.getAttribute("id")).classList.add('button-active'); // Add focus to newly clicked button
			}
		}
	
		// Transition slides
		function cardhideSlide() {
			cardslides[cardposition].classList.remove('closed'); // Show the new slide
			for (let i = 0; i < cardslides.length; i++) {
				if (i !== cardposition) cardslides[i].classList.add('closed'); // Hide the current slide
			}
		}

		// Check current slide position and how to set the next slide
		function cardcontrol() {
			if (cardposition >= 0 && cardposition < cardslides.length) { // Current position is not first and not last
				cardhideSlide();
			} else if (cardposition === cardslides.length) { // Current slide position is last
				cardposition = 0; // Reset position to first slide
				cardhideSlide();
			} else {
				// There is no else
			}
		}

		// Transition active button
		// function cardbuttonToggle() {
		// 	cardslideButtons[cardsliderPosition].classList.add('button-active');
		// 	for (let s = 0; s < cardslides.length; s++) {
		// 		if (s !== cardsliderPosition) cardslideButtons[s].classList.remove('button-active');
		// 	}
		// }
	
		
		// Check active button position and how to set the next button
		// function cardbuttonControl() {
		// 	if (cardsliderPosition >= 0 && cardsliderPosition < cardslides.length) { // Current position is not first and not last
		// 		cardbuttonToggle();
		// 	} else if (cardsliderPosition === cardslides.length) { // Current active button position is last
		// 		cardsliderPosition = 0; // Reset position to first slide
		// 		cardbuttonToggle();
		// 	} else {
		// 		// There is no else
		// 	}
		// }
	
		// Previous can be used if creating prev/next buttons
		function cardPrev() {

			if (cardposition === 0) {
				cardposition = 3;
				cardsliderPosition = 3;
			} else {	
				cardposition--;
				cardsliderPosition--;
			}
			
			let cardslideContainer = document.querySelector('.card-slide-inner-container');
            let cardslideContainerWidth = document.getElementById('card-testimonials-repeater').style.width.replace(/[^\d.]/g, '');
			let cardslideCount = document.querySelectorAll('.card-slide-block');
            let cardslideWidth = cardslideContainerWidth / cardslideCount.length;
            let cardtransformStyle = document.querySelector('.card-slide-track').style.transform;
            let cardtranslateX = cardtransformStyle.replace(/[^\d.]/g, '');
            cardtranslateInc = -(+cardtranslateX) - cardslideWidth;

            if (cardposition > 0) {
				document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + cardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + cardslideContainerWidth + "px";
			} 

			if (cardposition == 0) {
				document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + cardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + cardslideContainerWidth + "px;";
				setTimeout(function(){ document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + -(cardslideWidth * cardslides.length + 48) + "px); width: " + cardslideContainerWidth + "px;"; }, 300);
			}
			
			cardcontrol();
			//cardbuttonControl()
		}
	
		// Parent function to advance slides and slide buttons
		function cardNext() {
			cardposition++; // Advances counter to target the next slide
			cardsliderPosition++; // Advances counter to target next slide button

            let cardslideContainer = document.querySelector('.card-slide-inner-container');
            let cardslideContainerWidth = document.getElementById('card-testimonials-repeater').style.width.replace(/[^\d.]/g, '');
			let cardslideCount = document.querySelectorAll('.card-slide-block');
            let cardslideWidth = cardslideContainerWidth / cardslideCount.length;
            let cardtransformStyle = document.querySelector('.card-slide-track').style.transform;
            let cardtranslateX = cardtransformStyle.replace(/[^\d.]/g, '');
            cardtranslateInc = -(+cardtranslateX) + cardslideWidth;

            if (cardposition <= (cardslides.length - 1)) {
				document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + cardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + cardslideContainerWidth + "px";
			} 

			if (cardposition == cardslides.length) {
				document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + cardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + cardslideContainerWidth + "px;";
				setTimeout(function(){ document.querySelector('.card-slide-track').style.cssText = "transform: translate(" + -(cardslideWidth * cardslides.length + 48) + "px); width: " + cardslideContainerWidth + "px;"; }, 300);
			}

            cardcontrol(); // Advance the active slide
			//cardbuttonControl() // Advance the active slide button
		}

		// Create a timer that calls Next() every 5 seconds
		//var myTimer = setInterval(Next, 5000);

		// Pause the slider when on mouseover
		cardsource = document.getElementById('testimonial-slides-container');
		//source.addEventListener("mouseover", function(){ clearInterval(myTimer)});
		
		// Start a new timer on mouse out
		//source.addEventListener("mouseout", function(){ myTimer = setInterval(Next, 5000);});
        </script>
        