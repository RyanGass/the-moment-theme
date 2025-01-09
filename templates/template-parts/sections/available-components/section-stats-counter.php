<?php 
global $section;
$stats = $section['stats_blocks'];
$use_bg_color = $section['use_background_color'];
$bg_color = $section['background_color'];
if ($use_bg_color === 'yes') { $bg_color = ' bg-[' . $bg_color . ']'; } else { $bg_color = '';};
?>

<section id="stats-container" class="w-full stats-container<?php echo $bg_color; ?>">
    <div id="stats-inner" class="flex flex-wrap justify-center lg:flex-nowrap container-inner">
      <?php foreach ( $stats as $stat ) {  
          
        $stats_prefix = $stat['prefix'];
        $stats_postfix_plus = $stat['postfix_plus'];
        $stats_postfix_percent = $stat['postfix_percent'];
        $stats_value_measure = $stat['value_measure'];

        if($stats_prefix) : 
          $stats_prefix = '$';
        endif;

        if($stats_postfix_plus) : 
          $stats_post = '+';
        endif;

        if($stats_postfix_percent) : 
          $stats_post = '%';
        endif;

        if($stats_value_measure == 'K') :
          $stats_measure = 'K';
        endif;

        if($stats_value_measure == 'M') :
          $stats_measure = 'M';
        endif;

        if($stats_value_measure == 'B') : 
          $stats_measure = 'B';
        endif;

        $stats_num = $stat['stat_value'];
        $stats_label = $stat['stat_label'];
        $stats_intpart =  $stats_num ;
        $stats_fraction = floatval($stats_num) - intval($stats_intpart);
        $stats_trimmed = ltrim(floatval($stats_fraction), '0.');
        if ($stats_fraction != '0' ) {
          $stats_decimal = '.';
          $stats_intpart = floor( $stats_num );
          $stats_counter_off = '';
        } else {
          $stats_trimmed = '';
          $stats_counter_off = 's';
          $stats_decimal = '';
        };

        ?>

        <div class="clearfix counter wpb_content_element basis-full sm:basis-1/2 lg:basis-1/4">
            <div class="text-center counter-value">
                <span class="pre-post"><?php echo $stats_prefix ?></span>
                <div class="countup pre-number"><?php echo $stats_num ?></div>
                <span class="decimal"><?php echo $stats_decimal ?></span>
                <div class="countup<?php echo $stats_counter_off ?> post-number"><?php echo $stats_trimmed ?></div>
                <span class="pre-post"><?php echo $stats_measure ?><?php echo $stats_post ?></span>
          </div>
            <span class="counter-title"><?php echo $stats_label ?> </span>
        </div>

        <?php 

        // Reset variables
        $stats_prefix = '';
        $stats_intpart = '';
        $stats_decimal = '';
        $stats_counter_off = '';
        $stats_trimmed = '';
        $stats_measure = '';
        $stats_post = '';
        $stats_label = '';

        }; ?>
      </div>
</section>

<script>

/**
 * Count up animation
 */

// How long you want the animation to take, in ms
const animationDuration = 2000;
// Calculate how long each ‘frame’ should last if we want to update the animation 60 times per second
const frameDuration = 1000 / 60;
// Use that to calculate how many frames we need to complete the animation
const totalFrames = Math.round(animationDuration / frameDuration);
// An ease-out function that slows the count as it progresses
const easeOutQuad = (t) => t * (2 - t);

// The animation function, which takes an Element
const animateCountUp = (el) => {
  let frame = 0;
  const countTo = parseInt(el.innerHTML, 10);
  // Start the animation running 60 times per second
  const counter = setInterval(() => {
    frame++;
    // Calculate our progress as a value between 0 and 1
    // Pass that value to our easing function to get our
    // progress on a curve
    const progress = easeOutQuad(frame / totalFrames);
    // Use the progress value to calculate the current count
    const currentCount = Math.round(countTo * progress).toLocaleString();

    // If the current count has changed, update the element
    if (parseInt(el.innerHTML, 10) !== currentCount) {
      el.innerHTML = currentCount;
    }

    // If we’ve reached our last frame, stop the animation
    if (frame === totalFrames) {
      clearInterval(counter);
    }
  }, frameDuration);
};

// Run the animation on all elements with a class of ‘countup’
const runAnimations = () => {
  const countupEls = document.querySelectorAll(".countup");
  countupEls.forEach(animateCountUp);
};

// Initiate animations when in view
document.body.onscroll = function() {
	if (document.getElementById("stats-container").getBoundingClientRect().bottom <= window.innerHeight) {
		document.body.onscroll = "";
		runAnimations();
	}
}

</script>