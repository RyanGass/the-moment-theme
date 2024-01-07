<?php
global $section;
global $section_multiples;
$section_multiples++;
$features = $section['crb_features'];
$image_size = $section['image_size'];
$count = '5';
$content = $section['content'];
$subtext = $content ? ' class="has-subtext"' : '';
$use_bg_color = $section['use_background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $section['background_color'] . ']'; } else { $bg_color = '';};
?>

<?php $i = 0;;
foreach ( $features as $feature ) { if ($i <= 3) { $i++; } } ?>
<section id="custom-feature-container" class="slider w-full<?php echo $bg_color; ?>">
    <div class="container-inner custom-feature-inner text-center">
        <div id="custom-section-header"<?php echo $subtext ?>>
            <h2 class="custom-section-title"><?php echo $section['heading']; ?></h2>
            <?php if ($content) : echo '<p>' . $section['content'] . '</p>'; endif; ?>
        </div>
        <button id="custom-previous" type="button" onclick="customCardPrev()" class="button-nav custom-card-slide-navigation previous" aria-label="Previous"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></button>
		<div id="custom-inner-container" class="w-full md:w-11/12 m-auto custom-card-slide-inner-container">
            <div id="custom-features-repeater" class="custom-card-slide-track flex">
                <?php $p = 1; $c = 1; foreach ( $features as $feature ) { 
                    $image = $feature['featured_image'];
					$image_hover = $feature['featured_image_hover'];
                    $imageID = attachment_url_to_postid( $image );
                    $alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
                    $image_title = get_the_title($imageID);
                    $button_text = $feature['button_text'];
                    if ($count >= $c) { $showSlide = ' custom-card-show-slide custom-save-card-count inview'; } else { $showSlide = ''; };
                    ?>
                    <div id="custom-card-slide-block-<?php echo $c ?>" class="custom-section-block custom-card-section-block custom-card-slide-initial custom-card-slide-block<?php echo $showSlide ?>">
                        <div class="custom-area h-full">   
                        <div id="custom-form-init-<?php echo $section_multiples; ?>" class="flex flex-col justify-start text-center inner-area align-center h-full custom-image-size-<?php echo $image_size; ?>">
                                <img class="mx-auto" src="<?php echo $image; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
                                <img class="mx-auto custom-image-hover hidden" src="<?php echo $image_hover; ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" />
								<?php if ($feature['featured_heading']) : ?>
                                    <h3 class="block font-black custom-feature-heading"><?php echo $feature['featured_heading']; ?></h3>
                                <?php endif; ?>
                                <?php if ($feature['featured_content']) : ?>
                                    <span class="block custom-feature-content"><?php echo $feature['featured_content']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php $c++; }; ?>
			</div>
        </div>
		<button id="custom-next" type="button" onclick="customCardNext()" class="button-nav custom-card-slide-navigation next" aria-label="Next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg></button>
        <?php if ($section['button_url']) : ?>
            <a href="<?php echo $section['button_url']; ?>" class="custom-section-button mx-auto btn primary"><?php echo $section['button_text']; ?></a>
        <?php endif; ?>
    </div>
</section>
<script>
var customFindMe = document.querySelectorAll('.custom-card-section-block');
var customButtonClickNext = document.getElementById("custom-next");
var customButtonClickPrev = document.getElementById("custom-previous");

document.getElementById("custom-next").addEventListener("click", addInViewClass); 

function addInViewClass() {
// add event on scroll
customFindMe.forEach(element => {
    //for each .thisisatest
    if (customIsInViewport(element)) {
    //if in Viewport
    element.classList.add("draw");
    }
});
}
</script>

<script>
    
// swipe functionality
let $body = document.querySelector('body');
var customElem = document.getElementById('custom-inner-container');
var startX = 0;
var endX = 0;

customElem.addEventListener('touchstart', function (e) {
startX = e.touches[0].clientX;
});

customElem.addEventListener('touchmove', function (e) {
endX = e.touches[0].clientX;
});

customElem.addEventListener('touchend', function () {
var deltaX = endX - startX;

if (deltaX > 50) {
    customCardNext(); // Swipe right
} else if (deltaX < -50) {
    customCardPrev(); // Swipe left
}
});

var customIsInViewport = function (customElem) {
var customDistance = customElem.getBoundingClientRect();
return (
    customDistance.top >= 0 &&
    customDistance.left >= 0 &&
    customDistance.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    customDistance.right <= (window.innerWidth || document.documentElement.clientWidth)
);
};

var customElem = document.getElementById('custom-inner-container');
var customIsInViewport = function(customElem) {
var customDistance = customElem.getBoundingClientRect();
return (
    customDistance.top >= 0 &&
    customDistance.left >= 0 &&
    customDistance.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    customDistance.right <= (window.innerWidth || document.documentElement.clientWidth)
);
};

</script>

<script>
// Slider variables setup
let customCardslides = document.querySelectorAll('.custom-card-slide-block'); // Create an array of slides
let customCardslideid = document.querySelector('.custom-card-slide-block').id // Create an array of slide ids
let customCardslideButtons = document.getElementsByClassName("custom-card-slide-button"); // Create an array of slide nav buttons
let customCardsliderPosition = 0; 
let customCardposition = 0;

function customCardsizeSlides() {
	// Prep Slides and Containers
	let customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
	let customCardslideTrack = document.querySelector('.custom-card-slide-track');
	let customCardslideContainerWidth = customCardslideContainer.offsetWidth;
	let customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
	let customCardslideInitial = document.querySelectorAll('.custom-card-slide-initial');
	let customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
	let customCardslideBlockContainer = document.getElementById('custom-features-repeater');
	let customCardslideBlock = document.querySelectorAll('.custom-card-slide-block');
	document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCardslideInitial.length) - 48) + "px)"; 
	
	for (let i = 0; i <= customCardslideBlock.length - 1; i++) {
		customCardslideBlock[i].style.width = customCardslideWidth + "px";
		if (i <= customCardslideBlock.length - 1) {
			customCardclone = customCardslideBlock[i].cloneNode(true);
			customCardclone.removeAttribute('id');
			customCardclone.className = 'custom-card-section-block custom-card-slide-block custom-slide-clone';
			document.getElementById('custom-features-repeater').appendChild(customCardclone);
		}

		if (i >= 0) {
			customCardpreclone = customCardslideBlock[i].cloneNode(true);
			customCardpreclone.className = 'custom-card-section-block custom-card-slide-block custom-slide-clone custom-clone-before';
			customCardpreclone.removeAttribute('id');
			let customCardparentdiv = document.getElementById('custom-features-repeater');
			let customCardinsertPreclone = document.getElementById('custom-card-slide-block-1');
			customCardparentdiv.insertBefore(customCardpreclone, customCardinsertPreclone);
		}
	}

	let customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
	customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

	const customVw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

	if (customVw <= 1024 && customVw > 768) {
		customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
		last = customCardslideCount.length - 1;
		for (let c = 0; c <= last; c++) {
			if (c > 1 && c <= last ) {
				customCardslideCount[c].classList.remove('custom-card-show-slide', 'custom-card-slide-initial');
			}
		}

		customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
		customCardslideContainerWidth = customCardslideContainer.offsetWidth;
		customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
		customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
		document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCardslideInitial.length) - 48) + "px)"; 
		customCardslideBlock = document.querySelectorAll('.custom-card-slide-block');
		for (let i = 0; i <= customCardslideBlock.length - 1; i++) {
			customCardslideBlock[i].style.width = customCardslideWidth + "px";
		}
	customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
	customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

	}

	if (customVw <= 768) {
		customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
		
		for (let j = 0; j <= customCardslideCount.length -2; j++) {
			customCardslideCount[j].classList.remove('custom-card-show-slide', 'custom-card-slide-initial');
		}

		customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
		customCardslideContainerWidth = customCardslideContainer.offsetWidth;
		customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
		customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
		document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCardslideInitial.length) - 48) + "px)"; 
		customCardslideBlock = document.querySelectorAll('.custom-card-slide-block');
		for (let i = 0; i <= customCardslideBlock.length - 1; i++) {
			customCardslideBlock[i].style.width = customCardslideWidth + "px";
		}
	customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
	customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

	}

}

function customCardREsizeSlides() {
	var prevWidth = window.innerWidth;
	window.addEventListener('resize', function() {
		if (window.innerWidth !== prevWidth ) {	 // don't trigger if height is resized, only width
		
			const customVw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
			
			let customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
			let customCardslideTrack = document.querySelector('.custom-card-slide-track');
			let customCardslideContainerWidth = customCardslideContainer.offsetWidth;
			let customCardslideInitial = document.querySelectorAll('.custom-card-slide-initial');
			let customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
			let customCloneBefore = document.querySelectorAll('.custom-clone-before');
			let customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
			let customCardslideBlock = document.querySelectorAll('.custom-card-slide-block');

			for (let i = 0; i <= customCardslideBlock.length - 1; i++) {
				customCardslideBlock[i].style.width = customCardslideWidth + "px";
				}

			customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
			customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";
			
			if (customVw >= 1024) {
				customLarge = true;
				
				if (customLarge == true) {
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)";
				}; 

				if (customMedium == true && customLarge == true) {
					let newCustomCardSlideCount = document.querySelectorAll('.custom-save-card-count');
					if (customCardslideCount.length != newCustomCardSlideCount.length) {
						for (k = 0; k <= customCardslideCount.length - 1; k++) {
							customCardslideCount[k].nextElementSibling.classList.add('custom-card-show-slide', 'custom-card-slide-initial');
						}
					}

					customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
					customCardslideContainerWidth = customCardslideContainer.offsetWidth;
					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
					customCardslideInitial = document.querySelectorAll('.custom-card-slide-initial');
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= customCardslideBlock.length - 1; l++) {
						customCardslideBlock[l].style.width = customCardslideWidth + "px";
					}

					customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
					customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

					customMedium = false;
				}; 

				if (customSmall == true) {
					customSmall = false;
				};
			}

			
			if (customVw >= 769 && customVw <= 1023) {
				customMedium = true;
				
				if (customLarge == true && customMedium == true) {

					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					last = customCardslideCount.length - 1;
					for (let c = 0; c <= last; c++) {
						if (c > 1 && c <= last ) {
							customCardslideCount[c].classList.remove('custom-card-show-slide', 'custom-card-slide-initial');
						}
					}

					customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
					customCardslideContainerWidth = customCardslideContainer.offsetWidth;
					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
					customCardslideInitial = document.querySelectorAll('.custom-card-slide-initial');
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= customCardslideBlock.length - 1; l++) {
						customCardslideBlock[l].style.width = customCardslideWidth + "px";
					}

					customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
					customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

					customLarge = false;
				}; 

				if (customMedium == true) {
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)";
				}; 

				if (customSmall == true && customMedium == true) {

					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					let newCustomCardSlideCount = document.querySelectorAll('.custom-save-card-count');
					if (customCardslideCount.length != newCustomCardSlideCount.length) {
						for (k = 0; k <= customCardslideCount.length; k++) {
							if (k == customCardslideCount.length - 1 || k == customCardslideCount.length - 2) {
								customCardslideCount[k].nextElementSibling.classList.add('custom-card-show-slide', 'custom-card-slide-initial');
							}
						}
					}

					customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
					customCardslideContainerWidth = customCardslideContainer.offsetWidth;
					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
					customCardslideInitial = document.querySelectorAll('.custom-card-slide-initial');
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)"; 
					for (let l = 0; l <= customCardslideBlock.length - 1; l++) {
						customCardslideBlock[l].style.width = customCardslideWidth + "px";
					}

					customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
					customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

					customSmall = false;
				};
			}

			if (customVw <= 768) {
				customSmall = true;
				
				if (customLarge == true) {
					customLarge = false;
				}; 

				if (customMedium == true && customSmall == true) {

					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					last = customCardslideCount.length - 1;
					for (let c = 0; c <= last; c++) {
						if (c > 0 && c <= last ) {
							customCardslideCount[c].classList.remove('custom-card-show-slide', 'custom-card-slide-initial');
						}
					}
					
					customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
					customCardslideContainerWidth = customCardslideContainer.offsetWidth;
					customCardslideCount = document.querySelectorAll('.custom-card-show-slide');
					customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 			48) + "px)";
					for (let i = 0; i <= customCardslideBlock.length - 1; i++) {
						customCardslideBlock[i].style.width = customCardslideWidth + "px";
					}
					customCardslideBlockWithClones = document.querySelectorAll('.custom-card-slide-block');
					customCardslideTrack.style.width = (customCardslideWidth * customCardslideBlockWithClones.length) + "px";

					customMedium = false;
				}; 

				if (customSmall == true) {
					document.querySelector('.custom-card-slide-track').style.transform = "translate(" + (customCardslideWidth * -(customCloneBefore.length) - 48) + "px)";
				};
			}

			

		}
	});
}

let customLarge;
let customMedium;
let customSmall;
window.addEventListener("load", customCardsizeSlides);
window.addEventListener("resize", customCardREsizeSlides);

// Function triggered when the custom slide button element is clicked.
// Handles custom slide transitions and toggling button active states
function customCardslideToggle(id) {
	let customCardsliderButtonId = document.getElementById(id.getAttribute("id")).id;
	let customCardsliderPositionSlice = customCardsliderButtonId.slice(-1);
	customCardposition = customCardsliderPositionSlice -= 1;
	customCardsliderPosition = customCardposition;
	for(let i = 1, s = 0; i <= customCardslides.length; i++, s++) {
		customCardslides[s].classList.add('closed');
		document.getElementById(id.getAttribute("aria-controls")).classList.remove('closed');
		document.getElementById('custom-card-slide-button-' + i).classList.remove('button-active');
		document.getElementById(id.getAttribute("id")).classList.add('button-active');
	}
}

// Transition custom slides
function customCardhideSlide() {
	customCardslides[customCardposition].classList.remove('closed');
	for (let i = 0; i < customCardslides.length; i++) {
		if (i !== customCardposition) customCardslides[i].classList.add('closed');
	}
}

// Check current custom slide position and how to set the next custom slide
function customCardcontrol() {
	if (customCardposition >= 0 && customCardposition < customCardslides.length) {
		customCardhideSlide();
	} else if (customCardposition === customCardslides.length) {
		customCardposition = 0;
		customCardhideSlide();
	} else {
		// There is no else
	}
}

// Previous can be used if creating prev/next buttons
function customCardPrev() {
	if (customCardposition === 0) {
		customCardposition = customCardslides.length - 1;
		customCardsliderPosition = customCardslides.length - 1;
	} else {
		customCardposition--;
		customCardsliderPosition--;
	}
	
	let customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
	let customCardslideContainerWidth = document.getElementById('custom-features-repeater').style.width.replace(/[^\d.]/g, '');
	let customCardslideCount = document.querySelectorAll('.custom-card-slide-block');
	let customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
	let customCardtransformStyle = document.querySelector('.custom-card-slide-track').style.transform;
	let customCardtranslateX = customCardtransformStyle.replace(/[^\d.]/g, '');
	customCardtranslateInc = -(+customCardtranslateX) - customCardslideWidth;

	if (customCardposition > 0) {
		document.querySelector('.custom-card-slide-track').style.cssText = "transform: translate(" + customCardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + customCardslideContainerWidth + "px";
	} 

	if (customCardposition == 0) {
		document.querySelector('.custom-card-slide-track').style.cssText = "transform: translate(" + customCardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + customCardslideContainerWidth + "px;";
		setTimeout(function(){ 
			let customCardshowCount = document.querySelectorAll('.custom-card-show-slide');
			document.querySelector('.custom-card-slide-track').style.cssText = "transform: translate(" + -(customCardslideWidth * customCardslides.length + 48) + "px); width: " + customCardslideContainerWidth + "px;";
		}, 300);
	}
	
	customCardcontrol();
}

// Parent function to advance custom slides and custom slide buttons
function customCardNext() {
	customCardposition++;
	customCardsliderPosition++;

	let customCardslideContainer = document.querySelector('.custom-card-slide-inner-container');
	let customCardslideContainerWidth = document.getElementById('custom-features-repeater').style.width.replace(/[^\d.]/g, '');
	let customCardslideCount = document.querySelectorAll('.custom-card-slide-block');
	let customCardslideWidth = customCardslideContainerWidth / customCardslideCount.length;
	let customCardtransformStyle = document.querySelector('.custom-card-slide-track').style.transform;
	let customCardtranslateX = customCardtransformStyle.replace(/[^\d.]/g, '');
	customCardtranslateInc = -(+customCardtranslateX) + customCardslideWidth;

	if (customCardposition <= (customCardslides.length - 1)) {
		document.querySelector('.custom-card-slide-track').style.cssText = "transform: translate(" + customCardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + customCardslideContainerWidth + "px";
	} 

	if (customCardposition == customCardslides.length) {
		document.querySelector('.custom-card-slide-track').style.cssText = "transform: translate(" + customCardtranslateInc + "px); -webkit-transition: transform .3s; transition: transform .3s; width: " + customCardslideContainerWidth + "px;";
		setTimeout(function(){ 
			let customCardshowCount = document.querySelectorAll('.custom-card-show-slide');
			document.querySelector
        			('.custom-card-slide-track').style.cssText = "transform: translate(" + -(customCardslideWidth * customCardslides.length + 48) + "px); width: " + customCardslideContainerWidth + "px;"; 
		}, 300);
	}

	customCardcontrol();
}

</script>


