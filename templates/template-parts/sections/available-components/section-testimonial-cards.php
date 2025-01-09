<?php
global $section;
$testimonials = $section['crb_testimonials'];
$count = $section['testimonial_number'];
$content = $section['content'];
if ($content) { $subtext = ' class="has-subtext"'; };
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="card-testimonial-slides-container" class="w-full testimonial-container<?php echo $bg_color; ?>">
	<div id="section-header"<?php echo $subtext ?>>
		<h2 class="section-title"><?php echo $section['heading']; ?></h2>
		<?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
	</div>
	<div class="container-inner">
		<button type="button" onclick="cardPrev()" class="button-nav card-slide-navigation previous" aria-label="Previous"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></button>
		<div id="inner-container" class="w-full md:w-11/12 m-auto card-slide-inner-container">
			<div id="card-testimonials-repeater" class="flex card-slide-track">
				<?php $i = 1; foreach ( $testimonials as $testimonial ) {
					$image = $testimonial['testimonial_image'];
					$imageID = attachment_url_to_postid( $image );
					$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
					$image_title = get_the_title($imageID);
					if ($count >= $i) { $showSlide = ' card-show-slide save-card-count'; } else { $showSlide = ''; };
					?>
					<div id="card-slide-block-<?php echo $i ?>" class="card-section-block card-slide-initial card-slide-block<?php echo $showSlide ?>">
						<div class="h-full area">
							<div class="flex flex-col items-stretch justify-around h-full text-center inner-area align-center">
								<img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
								<span class="block quote-content"><?php echo $testimonial['testimonial_content']; ?></span>
								<div class="mt-auto bottom-content">
									<span class="block quote-name-company"><span class="name block"><?php echo $testimonial['testimonial_name']; ?></span><span class="company block"><?php echo $testimonial['testimonial_company']; ?></span></span>
								</div>
							</div>
						</div>
					</div>
				<?php $i++; }; ?>
			</div>
		</div>
		<button type="button" onclick="cardNext()" class="button-nav card-slide-navigation next" aria-label="Next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg></button>
		</div>
</section>
<script>
// swipe functionality
let $t_body = document.querySelector('body');
var t_customElem = document.getElementById('inner-container');
var t_startX = 0;
var t_endX = 0;

t_customElem.addEventListener('touchstart', function (e) {
t_startX = e.touches[0].clientX;
});

t_customElem.addEventListener('touchmove', function (e) {
t_endX = e.touches[0].clientX;
});

t_customElem.addEventListener('touchend', function () {
var t_deltaX = t_endX - t_startX;

if (t_deltaX > 50) {
    cardNext(); // Swipe right
} else if (t_deltaX < -50) {
    cardPrev(); // Swipe left
}
});
// Slider variables setup
let cardslides = document.querySelectorAll('.card-slide-block'); // Create an array of slides
// let cardslideid = document.querySelector('.card-slide-block').id // Create an array of slide ids
// let cardslideButtons = document.getElementsByClassName("card-slide-button"); // Create an array of slide nav buttons
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
			cardpreclone.className = 'card-section-block card-slide-block slide-clone clone-before';
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
		for (let c = 0; c <= last; c++) {
			if (c > 1 && c <= last ) {
				cardslideCount[c].classList.remove('card-show-slide', 'card-slide-initial');
			}
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

	if (vw <= 768) {
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
	var prevWidth = window.innerWidth;
	window.addEventListener('resize', function() {
		if (window.innerWidth !== prevWidth ) {	 // don't trigger if height is resized, only width

			const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
			
			let cardslideContainer = document.querySelector('.card-slide-inner-container');
			let cardslideTrack = document.querySelector('.card-slide-track');
			let cardslideContainerWidth = cardslideContainer.offsetWidth;
			let cardslideInitial = document.querySelectorAll('.card-slide-initial');
			let cardslideCount = document.querySelectorAll('.card-show-slide');
			let cloneBefore = document.querySelectorAll('.clone-before');
			let cardslideWidth = cardslideContainerWidth / cardslideCount.length;
			let cardslideBlock = document.querySelectorAll('.card-slide-block');

			for (let i = 0; i <= cardslideBlock.length - 1; i++) {
				cardslideBlock[i].style.width = cardslideWidth + "px";
			}

			cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
			cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";
			
			if (vw >= 1024) {
				large = true;
				
				if (large == true) {
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)";
				}; 

				if (medium == true && large == true) {
					let newCardSlideCount = document.querySelectorAll('.save-card-count');
					if (cardslideCount.length != newCardSlideCount.length) {
						for (k = 0; k <= cardslideCount.length - 1; k++) {
							cardslideCount[k].nextElementSibling.classList.add('card-show-slide', 'card-slide-initial');;
						}
					}

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					cardslideInitial = document.querySelectorAll('.card-slide-initial');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= cardslideBlock.length - 1; l++) {
						cardslideBlock[l].style.width = cardslideWidth + "px";

					}

					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

					medium = false;
				}; 

				if (small == true) {
					small = false;
				};
			}

			
			if (vw >= 769 && vw <= 1023) {
				medium = true;
				
				if (large == true && medium == true) {

					cardslideCount = document.querySelectorAll('.card-show-slide');
					last = cardslideCount.length - 1;
					for (let c = 0; c <= last; c++) {
						if (c > 1 && c <= last ) {
							cardslideCount[c].classList.remove('card-show-slide', 'card-slide-initial');
						}
					}

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					cardslideInitial = document.querySelectorAll('.card-slide-initial');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= cardslideBlock.length - 1; l++) {
						cardslideBlock[l].style.width = cardslideWidth + "px";

					}

					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

					large = false;
				}; 

				if (medium == true) {
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)";
				}; 

				if (small == true && medium == true) {

					cardslideCount = document.querySelectorAll('.card-show-slide');
					let newCardSlideCount = document.querySelectorAll('.save-card-count');
					if (cardslideCount.length != newCardSlideCount.length) {
						for (k = 0; k <= cardslideCount.length; k++) {
							if (k == cardslideCount.length - 1 || k == cardslideCount.length - 2) {
								cardslideCount[k].nextElementSibling.classList.add('card-show-slide', 'card-slide-initial');;
							}
						}
					}

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					cardslideInitial = document.querySelectorAll('.card-slide-initial');
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= cardslideBlock.length - 1; l++) {
						cardslideBlock[l].style.width = cardslideWidth + "px";

					}

					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

					small = false;
				};
			}

			if (vw <= 768) {
				small = true;
				
				if (large == true) {
					large = false;
				}; 

				if (medium == true && small == true) {

					cardslideCount = document.querySelectorAll('.card-show-slide');
					last = cardslideCount.length - 1;
					for (let c = 0; c <= last; c++) {
						if (c > 0 && c <= last ) {
							cardslideCount[c].classList.remove('card-show-slide', 'card-slide-initial');
						}
					}
					

					cardslideContainer = document.querySelector('.card-slide-inner-container');
					cardslideContainerWidth = cardslideContainer.offsetWidth;
					cardslideCount = document.querySelectorAll('.card-show-slide');
					cardslideWidth = cardslideContainerWidth / cardslideCount.length;
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)"; 
					for (let i = 0; i <= cardslideBlock.length - 1; i++) {
						cardslideBlock[i].style.width = cardslideWidth + "px";
					}
					cardslideBlockWithClones = document.querySelectorAll('.card-slide-block');
					cardslideTrack.style.width = (cardslideWidth * cardslideBlockWithClones.length) + "px";

					medium = false;
				}; 

				if (small == true) {
					document.querySelector('.card-slide-track').style.transform = "translate(" + (cardslideWidth * -(cloneBefore.length) - 48) + "px)";
				};
			}
		}
	});
}
let large;
let medium;
let small;
window.addEventListener("load", cardsizeSlides);
window.addEventListener("resize", cardREsizeSlides);

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

// Previous can be used if creating prev/next buttons
function cardPrev() {

	if (cardposition === 0) {
		cardposition = cardslides.length - 1;
		cardsliderPosition = cardslides.length - 1;
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
}

</script>
        