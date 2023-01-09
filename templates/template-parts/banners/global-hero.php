<?php
// Variables
$page_id = get_queried_object_id(); // Get the actual page id, not the id of the first post in the loop
$show_hero = carbon_get_post_meta( $page_id, 'show_hero' );
$alignment = carbon_get_post_meta( $page_id, 'alignment' );
$heading = carbon_get_post_meta( $page_id, 'heading' );
$content = carbon_get_post_meta( $page_id, 'content' );
$button_text = carbon_get_post_meta( $page_id, 'button_text' );
$button_url = carbon_get_post_meta( $page_id, 'button_url' );
$button_text = carbon_get_post_meta( $page_id, 'button_text' );
$button_color = carbon_get_post_meta( $page_id, 'button_color' );
$video_url = carbon_get_post_meta( $page_id, 'video_url' );
$video_id = carbon_get_post_meta( $page_id, 'video_id' );
$show_right_image = carbon_get_post_meta( $page_id, 'show_right_image' );
$right_image = carbon_get_post_meta( $page_id, 'right_image' );
$imageID = attachment_url_to_postid( $right_image );
$alt = get_post_meta($imageID, '_wp_attachment_image_alt', TRUE);
$image_title = get_the_title($imageID);
$bg_image = carbon_get_post_meta( $page_id, 'bg_image' );
$bg_overlay = carbon_get_post_meta( $page_id, 'use_bg_overlay');
$show_form = carbon_get_post_meta( $page_id, 'show_banner_form' );
$form_id = carbon_get_post_meta( $page_id, 'banner_form_id' );
$form_style = carbon_get_post_meta($page_id, 'banner_form_style');

// Conditional Logic
if ($alignment == 'center' && $show_right_image == 'no' || is_category() || is_single() || is_page_template('templates/page-chapters.php')) : 
    $mx_auto = 'mx-auto';
    $text_center = 'text-center';
endif;

if ($bg_overlay == 'yes') {
  $use_overlay = ' overlay';
}
?>

<?php if ($bg_image) : ?>
    <style>
    @media screen and (min-width: 64rem) {
        html #banner.global-banner {
            background: url(<?php echo $bg_image ?>) center no-repeat;
            background-size: cover;
        }
    }
    </style>
<?php endif; ?>

<?php if ($show_hero == 'yes' && $show_form == 'no' || is_category() || is_single() || is_search() || is_page_template('templates/page-chapters.php')) : ?>
<section id="banner" class="global-banner<?php echo $use_overlay ?>">
    <div class="flex items-center w-11/12 mx-auto pb-20 pt-32 md:pt-36 lg:pb-28 lg:pt-52 banner-area max-w-screen-2xl <?php if (isset($text_center)) { echo $text_center; } ?>">  
      <div id="banner-left" class="flex flex-col justify-center basis-full lg:basis-7/12">    
          <h1 class="w-full text-white <?php if(isset($mx_auto)) { echo $mx_auto; } ?>">
          <?php  
          if( is_category() ) : single_term_title();
          elseif ( is_search() ) : echo 'Search Results';
          elseif ( is_404() ) : echo 'Hey hey, the page your looking for does not exist';
          elseif ( is_tag() ) : single_tag_title();
          elseif ( isset($heading) && !is_single() ) : echo $heading; 
          else : the_title();
          endif;
          ?></h1>
          <?php if (is_page_template('templates/page-chapters.php')) : ?>
            <div id="social-sharing-inner" class="social-sharing-wrapper lg:block" style="position: relative; top: 0px;">
              <p>SHARE THIS</p>
              <div class="flex lg:block social-icon-wrapper">
                <a class="share_facebook" title="facebook" target="popup" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>','Facebook Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/facebook-f.svg" /></a>
                <a class="share_twitter" title="twitter" target="popup" onclick="window.open('https://twitter.com/home?status=The Future of an On-the-Go Workforce That Utilizes Plumbing Dispatch Software+<?php the_permalink(); ?>','Twitter Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/twitter.svg" /></a>
                <a class="share_linkedin" title="linkedin" target="popup" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>','LinkedIn Share','width=600,height=400')"><img src="/wp-content/uploads/2022/10/linkedin-in.svg" /></a>
              </div>
            </div>
          <?php endif; ?>
          <?php if (is_single()) : $post_date = get_the_date('M j, Y') ?>
          <span id="post-date"><?php echo $post_date ?></span>
          <?php  endif; ?>
          <?php if ($content && !is_category()) : ?>
          <p class="w-full text-white md:w-4/5 lg:w-3/5 description <?php if(isset($mx_auto)) { echo $mx_auto; } ?>"><?php echo $content ?></p>
          <?php endif; ?>
          <?php if ($button_url && !is_category()) : ?>
          <div class="flex items-center hero-buttons">
            <a href="<?php echo $button_url ?>" class="button <?php echo $button_color; ?>"><?php echo $button_text ?></a> 
            <?php if ($video_id) : ?>
            <button onclick="launchLightbox('<?php echo $video_id ?>')" class="video-link"> Watch Video</button>
            <?php endif; ?>
          </div>
          <?php endif; ?>
      </div>
      <div id="banner-right" class="items-center justify-end hidden text-right lg:flex h-fit lg:basis-6/12 ">
      <?php if ($right_image) : ?>  
      <img src="<?php echo $right_image ?>" alt="<?php echo $alt ?>" title="<?php echo $image_title ?>" class="float-right" />
      <?php endif; ?>
      </div>
    </div>
    <?php if ($video_id) : ?>
    <div id="watch-video">
      <div class="vidyard-player-embed" data-uuid="<?php echo $video_id ?>" data-v="4" data-type="lightbox">
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>

<!-- If hero has form -->
<?php if ($show_hero == 'yes' && $show_form == 'yes') : ?>
<section id="banner" class="global-banner form-style-<?php echo $form_style ?>">
    <div class="lg:flex items-center w-11/12 py-24 mx-auto lg:pb-20 lg:pt-32 banner-area max-w-screen-2xl <?php if (isset($text_center)) { echo $text_center; } ?>">  
      <div id="banner-left" class="flex flex-col justify-center basis-full lg:basis-6/12 lg:w-1/2">   
          <h1 class="w-full text-white <?php if(isset($mx_auto)) { echo $mx_auto; } ?>"><?php echo $heading ?></h1>
          <p class="w-full text-white md:w-4/5 lg:w-3/5 description <?php if(isset($mx_auto)) { echo $mx_auto; } ?>"><?php echo $content ?></p>
          <?php if ($button_url) : ?>
          <a href="<?php echo $button_url ?>" class="button <?php echo $button_color; ?>" data-lity><?php echo $button_text ?></a>
          <?php endif; ?>
      </div>
      <div id="banner-right" class="items-center justify-end text-right md:flex h-fit lg:min-h-[600px] md:basis-1/2 lg:basis-6/12 lg:w-1/2">
        <div id="banner-form" class="flex flex-col w-full">
            <div id="banner-form-inner" class="w-full max-w-full p-10 text-center">
                <h2>Schedule a Service Fusion Demo today</h2>
                <div id="form-js"></div>
                <form id="mktoForm_<?php echo $form_id ?>" class="w-full"></form>
                <script>
                document.body.addEventListener('pointermove', () => {
                  var JSLink = "https://157-RPM-092.mktoweb.com/js/forms2/js/forms2.min.js";
                  var JSElement = document.createElement('script');
                  JSElement.src = JSLink;
                  document.getElementById('form-js').appendChild(JSElement);
                  setTimeout(function(){
                    MktoForms2.loadForm("//157-RPM-092.mktoweb.com", "157-RPM-092", <?php echo  $form_id ?>);
                  }, 500); 
                }, { once: true });
                </script>
        </div>
      </div>
    </div>
</section>
<?php endif; ?>

<?php if ($show_hero == 'yes' && $show_form == 'yes' && $form_style == 'multi') : ?>
<script>

document.body.addEventListener('pointermove', () => {
  setTimeout(function(){
    
    (function(){
      // Exit if no Mkto Forms
      if (typeof MktoForms2 == 'undefined') {
        return false;
      }

      MktoForms2.whenReady(function(form){
        // Get all our constants & do some setup
        const jQuery = MktoForms2.$;
        const rows = document.querySelectorAll('.mktoFormRow');
        const backBtnHTML = "<a class='mktoButton mktomsf_back' role='button' tabindex='-1'>Back</a>";
        const nextBtnHTML = "<a class='mktoButton mktomsf_next' role='button' tabindex='-1'>Next</a>";
        const progressBarHTML = "<div class='mktoProgressBarContainer'><div class='progressBar' role='progressbar' max='100' value='0' aria-valuenow=''></div></div>";
        const submitBtn = document.querySelector('.mktoButton[type=submit]');
        // Insert back & next buttons
        document.querySelector('.mktoButtonRow > span').insertAdjacentHTML('afterbegin', nextBtnHTML);
        document.querySelector('.mktoButtonRow > span').insertAdjacentHTML('afterbegin', backBtnHTML);
        document.querySelector('form.mktoForm').insertAdjacentHTML('afterbegin', progressBarHTML);
        // Grab newly inserted elements
        const backBtn = document.querySelector('.mktoButton.mktomsf_back');
        const nextBtn = document.querySelector('.mktoButton.mktomsf_next');
        const progBar = document.querySelector('.mktoProgressBarContainer .progressBar');
        // Hide submit button
        submitBtn.classList.add('hidden');

        let current = 0; // current step out of all possible steps
        let progress = 1; // current step out of users progression through the visible fields (plus one as this is a visual cue, not technical count)
        // Set the field count to 1 less than row count (used to prevent users form clicking "next" too many times)
        const fieldCount = rows.length-1;

        // Initiate
        init();

        function updateProgress() {
          // Update visible field count (this can change based on mktoForm visibility rules)
          let visibleFields = document.querySelectorAll('.mktoFieldWrap').length;
          // Use current progression (number of fields deep they are) and visible fields to determine % progression
          let width = ((progress)/(visibleFields)) * 100;
          // Update progress bar
          progBar.ariaValueNow = width;
          progBar.style.width = width+'%';
        }

        function isValid() {
          // Default to false
          let isValid = false;

          // Get the element which carries validation classes (this is based on field type)
          let field = document.querySelector('[data-field-id="field-'+current+'"] .mktoRadioList') || document.querySelector('[data-field-id="field-'+current+'"] .mktoCheckboxList') || document.querySelector('[data-field-id="field-'+current+'"] .mktoField');

          // Remove focus, forces Marketo to run validation
          field.blur();

          // If this is a required field
          if (field.classList.contains('mktoRequired')) {
            // Store validity based on mkto validation class
            isValid = field.classList.contains('mktoValid');
          } else if (field.classList.contains('mktoInvalid')) {
            isValid = false; // false if not a required field, but is invalid
          } else {
            isValid = true; // true if not a required field & not invalid
          }
          if (!isValid) showError(field);
          return isValid;
        }

        function showError(field) {
          // Display for field type specific messages
          if (field.classList.contains('mktoUrlField')) {
            form.showErrorMessage('Must be a url. http://www.example.com/', jQuery(field));
          } else if (field.classList.contains('mktoTelField')) {
            form.showErrorMessage('Must be a phone number.', jQuery(field));
          } else if (field.classList.contains('mktoEmailField')) {
            form.showErrorMessage('Must be valid email.', jQuery(field));
          } else if (field.classList.contains('mktoRequired')) {
            form.showErrorMessage('This field is required.', jQuery(field));
          }
        }
        
        function handleBack() {
          if (current > 0) {
            // Show the next button, hide submit button
            submitBtn.classList.add('hidden');
            nextBtn.classList.remove('hidden');

            // Hide current field, reduce current state
            rows[current].classList.replace('active', 'inactive');
            current--;
            progress--;
            // Check if new current field is a placeholder (this handles "visibility rules")
            if (hasPlaceholder()) {
              // if so, decrease current state until we find a real field
              while (document.querySelector('[data-field-id="field-'+current+'"] > div').classList.contains('mktoPlaceholder')) {
                current--;
              }
            }
            // Show new current
            rows[current].classList.replace('inactive', 'active');
          }
          let field = document.querySelector('[data-field-id="field-'+current+'"] .mktoRadioList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoCheckboxList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoField');
          field.focus();
          backBtn.blur();
          updateProgress();
        }

        function handleNext() {
          // If we're not at the end && the field is valid
          if (current < fieldCount && isValid()) {
            // Hide current, increase current state
            rows[current].classList.replace('active', 'inactive');
            current++;
            progress++;
            // Check if new current field is a placeholder (this handles "visibility rules")
            if (hasPlaceholder()) {
              // if so, increase current state until we find a real field
              while (document.querySelector('[data-field-id="field-'+current+'"] > div').classList.contains('mktoPlaceholder')) {
                current++;
              }
            }
            // Show new current
            rows[current].classList.replace('inactive', 'active');

            // If we're on the last field, hide next button and show submit button
            if (current === fieldCount) {
              submitBtn.classList.remove('hidden');
              nextBtn.classList.add('hidden');
            }
          }

          let field = document.querySelector('[data-field-id="field-'+current+'"] .mktoRadioList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoCheckboxList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoField');
          field.focus();
          nextBtn.blur();
          updateProgress();
        }

        function hasPlaceholder() {
          // Checks to see whether a mktoRow contains a mktoPlaceholder (to handle mkto form visibility rules)
          return document.querySelector('[data-field-id="field-'+current+'"] > div').classList.contains('mktoPlaceholder');
        }
        
        function init() {

          // Add Event Listeners
          backBtn.addEventListener('click', handleBack);
          nextBtn.addEventListener('click', handleNext);

          // Keyboard Nav
          document.addEventListener('keydown', function(e){
            // Get the current input field
            var field = document.querySelector('[data-field-id="field-'+current+'"] .mktoRadioList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoCheckboxList input') || document.querySelector('[data-field-id="field-'+current+'"] .mktoField');

            // Check current field has focus (so we're not controling tab of other elements on the page)
            if (field == document.activeElement) {
              // Moving forward
              if ((e.key == 'Tab' && !(e.shiftKey && e.key == 'Tab')) || 
                  (e.key == 'Enter' && !(e.shiftKey && e.key == 'Enter'))) {
                e.preventDefault();
                // Check if they're progressing to submit
                if (nextBtn.classList.contains('hidden')) {
                  if (form.submittable()) {
                    form.submit();
                  }
                } else {
                  handleNext();
                }
              }
              // Moving backward
              if (e.key == 'Tab' && (e.shiftKey && e.key == 'Tab')) {
                e.preventDefault();
                handleBack();
              }
            }
          }, false);

          // Collect all rows as jQuery els
          var $rows = jQuery(".mktoForm").children(".mktoFormRow");

          // Collect all unique class names
          var $classNames = $rows.map(function() {
              return this.className;
          });
          $classNames = jQuery.unique($classNames.get());

          // Find all marketoRows with same class and wrap them
          jQuery.each($classNames, function(i, className) {
              $rows.filter(function() {
                  return jQuery(this).hasClass(className);
              }).wrapAll("<div class='mktoMsfWrap'></div>");
          });

          // Add data attributes & classes to show/hide fields
          for (let i=0; i<rows.length; i++) {
            let row = rows[i];
            row.classList.add('inactive');
            row.dataset.fieldId = 'field-'+i;
            if (i===0) row.classList.replace('inactive','active'); // Display first field
          }
        }
        updateProgress();
      });
    })();
  }, 500); 
}, { once: true });
</script>
<?php endif; ?>
