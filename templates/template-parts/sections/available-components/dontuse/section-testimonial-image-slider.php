<?php
global $section;
$testimonials = $section['crb_testimonial_slider'];
$duration = $section['slide_duration'] * 1000;
$navigation = $section['slider_navigation'];
if ($navigation == 'dots' || $navigation == 'both') {
	$slide_display = 'block';
} else { 
	$slide_display = 'none';
}
$text_below = $section['slider_text_location'];
if ($text_below == 'yes') { $tb = ' text-below';} else { $tb = '';};
$bg_overlay = $section['use_bg_overlay'];
// BG Overlay
if ($bg_overlay == 'yes') { $use_overlay = ' overlay'; } else { $use_overlay = ''; }
?>

<section id="testimonial-slides-container" class="w-full p-0 mx-auto<?php echo $tb ?>">
        <div id="testimonial-slide-repeater" class="slide-repeater<?php echo $use_overlay . $tb ?>">
        <?php if ($navigation == 'arrows' || $navigation == 'both') : ?>
			<button type="button" onclick="Prev()" class="button-nav slide-navigation previous" aria-label="Previous"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M192 448c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l137.4 137.4c12.5 12.5 12.5 32.75 0 45.25C208.4 444.9 200.2 448 192 448z"/></svg></button>
		<?php endif; ?>
		<?php $i = 1; foreach ( $testimonials as $testimonial ) { if ($i >= 2) { $closed = 'closed'; } else { $closed = '';}; ?>    
			<div id="slide-<?php echo $i ?>" class="slide-block <?php echo $closed ?>" style="background-image: url(<?php echo $testimonial['testimonial_image']; ?>)">   
				<div class="w-11/12 mx-auto area max-w-screen-2xl">
					<div class="flex flex-col justify-center max-w-screen-lg mx-auto text-center inner-area align-center">
						<span class="block quote-content"><?php echo $testimonial['testimonial_content']; ?></span>
						<span class="block quote-name"><?php echo $testimonial['testimonial_name']; ?></span>
						<span class="block quote-company"><?php echo $testimonial['testimonial_company']; ?></span>
					</div>
				</div>
            </div>
        <?php $i++; }; ?>
		<?php if ($navigation == 'arrows' || $navigation == 'both') : ?>
			<button type="button" onclick="Next()" class="button-nav slide-navigation next" aria-label="Next"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg></button>
		<?php endif; ?>
		<ul id="slide-nav" class="slide-nav" style="display: <?php echo $slide_display ?>;"></ul>
        </div>
		

<script>
// Slider variables setup
let slides = document.querySelectorAll('.slide-block'); // Create an array of slides
let slideid = document.querySelector('.slide-block').id // Create an array of slide ids
let slideButtons = document.getElementsByClassName("slide-button"); // Create an array of slide nav buttons
let sliderPosition = 0; 
let position = 0;


// Create the slider button navigation
for(let i = 1; i <= slides.length; i++) {
	let slideWrapper = document.getElementById('slide-nav'); // Get the nav parent element
	if (i == 1) { slideActive = 'class="button-active slide-button"';} else { slideActive = 'class="slide-button"'; } // Add classes for initial active slide
	slideWrapper.insertAdjacentHTML('beforeend', '<li><button ' + slideActive + ' id="slide-button-' + i + '" aria-controls="slide-' + i + '" onClick="slideToggle(this)" aria-label="Slide Toggle"></button></li>'); // Create the button elements inside the slide-nav
	slideActive = ''; // Reset the active slide variable to stop from adding the active class to all elements in the loop
}

// Function triggered when the slide button element is clicked. 
// Handles slide transitions and toggling button active states
function slideToggle(id) {
	let sliderButtonId = document.getElementById(id.getAttribute("id")).id; // Get the id of the clicked button
	let sliderPositionSlice = sliderButtonId.slice(-1); // Slice the last character of the id and save in a new variable
	position = sliderPositionSlice -= 1; // Need to reset position to match the current "clicked" position - This value is then used by Next()
	sliderPosition = position; // Need to reset sliderPosition to match the current "clicked" position - This value is then used by Next()
	for(let i = 1, s = 0; i <= slides.length; i++, s++) { // setup dual for loop variables and conditions
		slides[s].classList.add('closed'); // add "closed" class to all slides
		document.getElementById(id.getAttribute("aria-controls")).classList.remove('closed'); // remove "close" class from the in focus slide - aria-controls set to the id of the slide.
		document.getElementById('slide-button-' + i).classList.remove('button-active'); // Remove focus from current button 
		document.getElementById(id.getAttribute("id")).classList.add('button-active'); // Add focus to newly clicked button
	}
}

// Transition slides
function hideSlide() {
	slides[position].classList.remove('closed'); // Show the new slide
	for (let i = 0; i < slides.length; i++) {
		if (i !== position) slides[i].classList.add('closed'); // Hide the current slide
	}
}

// Check current slide position and how to set the next slide
function control() {
	if (position >= 0 && position < slides.length) { // Current position is not first and not last
		hideSlide();
	} else if (position === slides.length) { // Current slide position is last
		position = 0; // Reset position to first slide
		hideSlide();
	} else {
		// There is no else
	}
}

// Transition active button
function buttonToggle() {
	slideButtons[sliderPosition].classList.add('button-active');
	for (let s = 0; s < slides.length; s++) {
		if (s !== sliderPosition) slideButtons[s].classList.remove('button-active');
	}
}


// Check active button position and how to set the next button
function buttonControl() {
	if (sliderPosition >= 0 && sliderPosition < slides.length) { // Current position is not first and not last
		buttonToggle();
	} else if (sliderPosition === slides.length) { // Current active button position is last
		sliderPosition = 0; // Reset position to first slide
		buttonToggle();
	} else {
		// There is no else
	}
}

// Previous can be used if creating prev/next buttons
function Prev() {
	if (position === 0) {
		position = slides.length - 1;
		sliderPosition = slides.length - 1;
	} else {	
		position--;
		sliderPosition--;
	}
	control();
	buttonControl()
}

// Parent function to advance slides and slide buttons
function Next() {
	position++; // Advances counter to target the next slide
	sliderPosition++; // Advances counter to target next slide button
	control(); // Advance the active slide
	buttonControl() // Advance the active slide button
}

// Create a timer that calls Next() every 5 seconds
var myTimer = setInterval(Next, 5000);

// Pause the slider when on mouseover
source = document.getElementById('testimonial-slides-container');
source.addEventListener("mouseover", function(){ clearInterval(myTimer)});

// Start a new timer on mouse out
source.addEventListener("mouseout", function(){ myTimer = setInterval(Next, <?php echo $duration ?>);});
</script>
</section>

<style>
/***
*** Section Image slider ***
***/

section#testimonial-slides-container {
  div.slide-block {
    @apply pb-24 pt-20 md:pb-40 md:pt-40 lg:pt-72;
  }
}
</style>

<?php
// Image/Text Slider
->add_fields( 'testimonial-image-slider', 'Testimonial Image Slider', array(
	Field::make( 'radio', 'use_bg_overlay', 'Use Transparent Overlay?' )
	->set_default_value( 'no' )    
	->add_options( array(
			'no' => 'No',
			'yes' => 'Yes',
		) ),
	Field::make( 'radio', 'slider_navigation', 'Slider Navigation' )
			->add_options( array(
				'dots' => 'Dots',
				'arrows' => 'Arrows',
				'both' => 'Both',
			) ),
	Field::make( 'radio', 'slider_text_location', 'Text Below Images?' )
			->add_options( array(
				'no' => 'No',
				'yes' => 'Yes',
			) ),
	Field::make( 'text', 'slide_duration', 'Slide Duration (Seconds)' ),
	Field::make( 'complex', 'crb_testimonial_slider', 'Testimonial Slider' )
		->set_collapsed( true )
		->add_fields( 'testimonial-slide', 'Testimonial Slide', array(
			Field::make( 'image', 'testimonial_image', 'Image' )
				->set_value_type( 'url' ),
			Field::make( 'textarea', 'testimonial_content', 'Quote' ),
			Field::make( 'text', 'testimonial_name', 'Name' ),
			Field::make( 'text', 'testimonial_company', 'Company' ),
		) )
) )
?>